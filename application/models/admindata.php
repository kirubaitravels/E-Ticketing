<?php Class admindata extends CI_Model
{
	
    public function get_stations()
    {
        $the_stations = $this->db->get('stations');
        return $the_stations->result();
    }

    public function stations_count()
    {
        $count = $this->db->count_all_results('stations');
        return $count; 
    }

    public function add_station($data)
    {
          $station_exists = $this->db->get_where('stations',array('station_name'=>$data['station_name']));

          if(($station_exists->num_rows())>0)
          {
            return "THE STATION EXISTS";

          }
          else
          {
            $this->db->insert('stations',$data);           
            
            return "SUCCESS";
          }     


    }

    public function get_bookings()
    {
        $the_bookings = $this->db->get('bookings');
        return $the_bookings->result();
    }

    public function get_schedules()
    {
        $the_schedules = $this->db->get('schedule');
        return $the_schedules->result();
    }

    public function get_user_details($userId)
    {
        $the_user= $this->db->get_where(
                    'users',
                    array('id_no'=>$userId)
                    );

        if($the_user->num_rows() > 0)
        {
            $the_user_email= $this->db->get_where(
                    'login',
                    array('user_id'=>$userId)
                    );
            if($the_user_email->num_rows() >0)
            {
                return $the_user->row()->id_no.",".$the_user->row()->name.",".$the_user->row()->gender.",".$the_user->row()->mobile_no.",".$the_user_email->row()->email;
            }

            //Check for user email from unregistered users table
            else
            {

            }
            
        }
    }

    public function get_registered_users()
    {
        $the_users= $this->db->get_where(
                    'users',
                    array('user_status'=>"REGISTERED")
                    );

        if($the_users->num_rows() > 0)
        {
            return $the_users->result();
        }
    }

    public function get_other_users()
    {
        $the_users= $this->db->get_where(
                    'users',
                    array('user_status'=>"")
                    );

        if($the_users->num_rows() > 0)
        {
            return $the_users->result();
        }
    }

    public function get_email($id)
    {
        $user= $this->db->get_where(
                    'login',
                    array('user_id'=>$id)
                    );

        if($user->num_rows() > 0)
        {
            return $user->row()->email;
        }
    }

    public function get_companies()
    {
        $the_companies = $this->db->get('bus_companies');
        return $the_companies->result();
    }

    public function get_buses()
    {
        $the_buses = $this->db->get('fleet');
        return $the_buses->result();
    }
}

?>