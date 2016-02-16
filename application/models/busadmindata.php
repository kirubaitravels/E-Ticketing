<?php 
Class Busadmindata extends CI_Model
{
	
	public function bus_schedule($schedule_data)
	{
          $schedule_exists = $this->db->get_where('schedule',array('bus'=>$schedule_data['bus'],'origin'=>$schedule_data['origin'],'destination'=>$schedule_data['destination'],'departure_date'=>$schedule_data['departure_date'],'departure_time'=>$schedule_data['departure_time']));

          if(($schedule_exists->num_rows())>0)
          {
            return "SCHEDULE EXISTS";

          }
          else
          {
			$this->db->insert('schedule',$schedule_data);			
			
			return "SUCCESS";
          }		

	}

    public function schedule_count()
    {
        $count = $this->db->count_all_results('schedule');
        return $count; 
    }

    public function booking_count()
    {
        $count = $this->db->count_all_results('bookings');
        return $count; 
    }

	public function new_fleet($fleet_data)
	{
		$bus_exists = $this->db->get_where('fleet',array('bus_reg_no'=>$fleet_data['bus_reg_no']));

		if(($bus_exists->num_rows())>0)
        {
           return "BUS EXISTS";

        }
        
        else
        {
			$this->db->insert('fleet',$fleet_data);			
		
			return "SUCCESS";
		
        }	


	}

	public function get_company_bookings($company)
    {   
        $the_bookings= $this->db->get_where(
                                'bookings',
                                array('bus_company'=>$company));

        if($the_bookings->num_rows()>0)
        {
            return $the_bookings->result();
        }


    }

    public function get_company_tickets($company)
    {   
        $the_tickets= $this->db->get_where(
                                'tickets',
                                array('bus_company'=>$company));

        if($the_tickets->num_rows()>0)
        {

            return $the_tickets->result();
        }

    }

    public function get_passenger_id($booking)
    {
        $the_id = $this->db->get_where(
                            'bookings',
                            array('booking_id'=>$booking));
        if($the_id->num_rows()>0)
        {
            return $the_id->row()->passenger;
        }
    }

    //Get Company Details for subscription renewal
    public function get_company_details($reg_no)
    {
        $the_company = $this->db->get_where(
                                            'bus_companies',
                                            array('reg_no'=>$reg_no)
                                            );

        if($the_company->num_rows>0)
        {
            return $the_company->result();
        }
    }

    //Get Company Details for subscription renewal
    public function get_company_email($reg_no)
    {
        $the_company_email = $this->db->get_where(
                                            'login',
                                            array('bus_company_id'=>$reg_no)
                                            );

        if($the_company_email->num_rows>0)
        {
            return $the_company_email->row()->email;
        }
    }

    //Buses
    public  function get_buses($bus_company)
    {
    	$this->db->where('bus_company',$bus_company);
    	$this_bus_company=$this->db->get('fleet');
    	return $this_bus_company->result();
    }

    public function get_cities()
    {
    	$q= $this->db->get('stations');
    	return $q->result();
    }

    public function get_schedules($company)
    {   
    	$the_schedule= $this->db->get_where(
    							'schedule',
    							array('bus_company'=>$company));

        if($the_schedule->num_rows()>0)
        {
            return $the_schedule->result();
        }
    }

   	//Detailed bus info
   	public function get_bus_details($bus)
    {
    	$this->db->where('bus_reg_no',$bus);
    	$this_bus=$this->db->get('fleet');
    	return $this_bus->result();
    }

    public function get_subscription_status($company)
    {   
        $the_status= $this->db->get_where(
                                'bus_companies',
                                array('reg_no'=>$company));

        if($the_status->num_rows() > 0)
        {

            return $the_status->row()->subscription_status.",".$the_status->row()->subscription_date.",".$the_status->row()->subscription_period;
        }
    }

    public function get_schedule_details($id)
    {   
        $the_schedule= $this->db->get_where(
                                'schedule',
                                array('schedule_id'=>$id));

        if($the_schedule->num_rows()>0)
        {
            return $the_schedule->result();
        }
    }

    public function bus_capacity($my_bus)
    {   
        $the_bus_details= $this->db->get_where(
                                'fleet',
                                array('bus_reg_no'=>$my_bus));

        if($the_bus_details->num_rows()>0)
        {
            return $the_bus_details->row()->capacity;
        }
    }

    public function get_routes()
    {
        $the_route = $this->db->get('schedule');
        return $the_route->result();
    }

    public function get_company_stats($company)
    {
        $the_schedule_details= $this->db->get_where(
                                'schedule',
                                array('bus_company'=>$company));

        // if($the_schedule_details->num_rows()>0)
        // {
        $number = $the_schedule_details->num_rows();
        // }
        
        $total = $this->db->count_all_results('schedule');

        $percentage = ($number/$total)*100;

        /* Get Bookings Stat */

        $the_booking_details= $this->db->get_where(
                                'bookings',
                                array('bus_company'=>$company));

        // if($the_booking_details->num_rows()>0)
        // {
        $bookings_number = $the_booking_details->num_rows();
        // }
        
        $total1 = $this->db->count_all_results('bookings');

        $percentage1 = ($bookings_number/$total1)*100;

        return $percentage.",".$percentage1;
    }

    public function profile_image($company)
    {
        $exists = $this->db->get_where('bus_companies',array('reg_no'=>$company));

        if(($exists->num_rows())>0)
        {
           return $exists->row()->image;

        }
        
        else
        {
            return "Error";
        
        }   


    }

    /// for checking in a passenger
    public function check_in_passenger($details,$serialNo)
    {

        $this->db->where('serial_no',$serialNo);
        $this->db->update('tickets',$details);

        return "SUCCESS";


    }

    public function deactivate_company_account($status,$id)
    {
        $this->db->where('reg_no',$id);
        $this->db->update('bus_companies',$status);

        return "SUCCESS";

    }

}

?>