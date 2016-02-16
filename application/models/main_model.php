<?php Class Main_model extends CI_Model
{
   public function get_data($from,$to,$depart_date,$departure_time)
	{

      $from_station_code=$this->get_station_code($from);
      $to_station_code=$this->get_station_code($to);

      $my_depart_date = explode("/", $depart_date);
      $converted_depart_date = $my_depart_date[2]."-".$my_depart_date[0]."-".$my_depart_date[1];

      // $my_return_date = explode("/", $return_date);
      // $converted_return_date = $my_return_date[2]."-".$my_return_date[0]."-".$my_return_date[1];

      if ($departure_time="NO_TIME") 
      {
		$this->db->where('origin',$from_station_code);
		$this->db->where('destination',$to_station_code);
		$this->db->where('departure_date',$converted_depart_date);

		$search_result=$this->db->get('schedule');

      }

      else
      {
		$this->db->where('origin',$from_station_code);
		$this->db->where('destination',$to_station_code);
		$this->db->where('departure_date',$converted_depart_date);
		$this->db->where('departure_time',$depart_time);

		$search_result=$this->db->get('schedule');

      }      

      return $search_result->result();

		
    }
    public function get_data_login($from,$to,$depart_date,$return_date)
	{

      $from_station_code=$this->get_station_code($from);
      $to_station_code=$this->get_station_code($to);

      $my_depart_date = explode("/", $depart_date);
      $converted_depart_date = $my_depart_date[2]."-".$my_depart_date[0]."-".$my_depart_date[1];

      $my_return_date = explode("/", $return_date);
      $converted_return_date = $my_return_date[2]."-".$my_return_date[0]."-".$my_return_date[1];

      $this->db->where('origin',$from_station_code);
      $this->db->where('destination',$to_station_code);
      $this->db->where('departure_date',$converted_depart_date);
      $this->db->where('arrival_date',$converted_return_date);

      $search_result=$this->db->get('schedule');

      return $search_result->result();

		
    }


    function  get_station_code($param1='')
    {
    	$this->db->where('station_name',$param1);
        $station_code=$this->db->get('stations');
          foreach ($station_code->result() as $row)

		   {

		      $station_code=$row->station_code;
		      return $station_code; 
		   }

    }

	    public function  get_station_name($param1='')
	    {
	    	$this->db->where('station_code',$param1);
	        $station_code=$this->db->get('stations');
	          foreach ($station_code->result() as $row)

			   {

			      $station_name=$row->station_name;
			      return $station_name; 
			   }

	    }
	    
	    public function get_cities()
	    {
	    	$q= $this->db->get('stations');
	    	return $q->result();
	    }

	    //Translate station codes into station names.
	   	public function get_station($code)
	    {
	    	$station= $this->db->get_where(
						'stations',
						array('station_code'=>$code)
						);

	    	if($station->num_rows() > 0)
		   	{
		   		return $station->row()->station_name;
		   	}
	    }

	   	public function get_passenger($id)
	    {
	    	$passenger= $this->db->get_where(
						'users',
						array('id_no'=>$id)
						);

	    	if($passenger->num_rows() > 0)
		   	{
		   		return $passenger->row()->name;
		   	}
	    }

	    public function get_scheduled_journey($schedule_id)
	    {
	    	$the_journey= $this->db->get_where(
						'schedule',
						array('schedule_id'=>$schedule_id)
						);

	    	if($the_journey->num_rows() > 0)
		   	{
		   		$station_of_origin = $this->get_station($the_journey->row()->origin);
		   		$destination_station = $this->get_station($the_journey->row()->destination);
		   		return $station_of_origin."-".$destination_station;
		   	}
	    }

	    //Bus Image
	   	function get_the_bus($plate)
	    {

	    	$bus_image= $this->db->get_where(
	    							'fleet',
	    							array('bus_reg_no'=>$plate));

	    	if($bus_image->num_rows() > 0)
		   	{
		   		return $bus_image->row()->picture;
		   	}
	    }

	    //Buses
	    public  function get_buses($bus_company)
	    {
	    	$this->db->where('bus_company',$bus_company);
	    	$this_bus_company=$this->db->get('fleet');
	    	return $this_bus_company->result();
	    }



	    public function users_reservation($details)
	    { 
	        $this->db->insert('users',$details);
			return "Successful";	        
                       
	    }
		     public function users_sitting($setpos)
		    {
		    	$this->db->insert('position',$setpos);
		    	return "worked";
		    }
        
        public function get_sitting_position($pos)
        {   $this->db->where('pos_id',$pos);
        	$search_position=$this->db->get('position');

            

             foreach ($search_position->result() as $row)

			   {

			      $search_position=$row->posit;
			      return $search_position; 
			   }


         }
	     public function users_booking($bookingdata)
        
	    {   
	        $this->db->insert('bookings',$bookingdata);
			 return "Successful1";	        
                       
	    }
	    public function clear_position_table($pos_seat)
	    {  $this->db->where('pos_id',$pos_seat);
           $this->db->delete('position');

           return "worked";
	    }
	    public function get_booked_seats($randon_id)
	    {   
	    	 $this->db->where('booking_id',$randon_id);
	    	$booked_seats=$this->db->get('bookings');
	    	$array=array();
	    	foreach ($booked_seats->result_array() as $row) 
	    	{
	    		// $array[]=$row->sitting_position;
	    		return $row['sitting_position'];
	    	}

	    	// return $array;
	    }
	    public function get_allseats($vehicle_sch)
	    {   $this->db->where('journey_details',$vehicle_sch);
            $all_seats=$this->db->get('bookings');
            	
	    	$array=array();
	    	foreach ($all_seats->result_array() as $row) 
	    	{
	    		$array[]=$row['sitting_position'];
	    		
	    	} 
               return  $array;
	    }

	    public function get_company($reg_no)
	    {
	        $the_company = $this->db->get_where(
	                                            'bus_companies',
	                                            array('reg_no'=>$reg_no)
	                                            );

	        if($the_company->num_rows>0)
	        {
	            return $the_company->row()->company_name;
	        }
	    }

	    public function get_bus_schedule_history($reg_no)
	    {
	        $the_company = $this->db->get_where(
	                                            'schedule',
	                                            array('bus'=>$reg_no)
	                                            );

	        if($the_company->num_rows>0)
	        {
	            return $the_company->result();
	        }

	        else
	        {
	        	return "No Data";
	        }
	    }

	    public function get_bus_booking_history($reg_no)
	    {
    		$query = $this->db->get_where(
                                        'schedule',
                                        array('bus'=>$reg_no)
                                        );

	        if($query->num_rows>0)
	        {
	        	$journey = $query->row()->schedule_id;
		        $the_bookings = $this->db->get_where(
		                                            'bookings',
		                                            array('journey_details'=>$journey)
		                                            );
	            return $the_bookings->result();
	        }

	       	else
	        {
	        	return "No Data";
	        }
	    }

	    public function get_login_data($userid)
	    {
	    	$user_details = $this->db->get_where(
	                                            'users',
	                                            array('id_no'=>$userid)
	                                            );

	        if($user_details->num_rows>0)
	        {
	            return $user_details->result();
	        }

	        else
	        {
	        	return "No Datah";
	        }

	    }

	    public function profile_image($the_id)
    	{
	        $exists = $this->db->get_where('users',array('id_no'=>$the_id));

	        if(($exists->num_rows())>0)
	        {
	           return $exists->row()->image;

	        }
	        
	        else
	        {
	            return "Error";
	        
	        }   


    	}

    	public function bus_companies()
    	{
	        $data= $this->db->get('bus_companies');
	        return $data->result();

    	}

    	public function the_users()
    	{
	        $this->db->get_where('users',array('user_status'=>"REGISTERED"));
	        if($data->num_rows()>0)
	        {
	        	return $data->result();
	        }

    	}

    	public function payment_pesapal($details){
    	$this->db->insert('pesapal',$details);
			return "Successful";
    	
    	}


	   	
}

