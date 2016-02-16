<?php Class userdata extends CI_Model
{
    public function get_bookingdata($user_logged_in)
    {        
           
            // $this->db->where('passenger',$user_logged_in);
            // $userdata = $this->db->get('bookings');               

            $this->db->select('*');
            $this->db->from('bookings a'); 
            $this->db->join('schedule b', 'b.schedule_id=a.journey_details', 'left');
            $this->db->where('a.passenger',$user_logged_in);
            $userdata=$this->db->get();

            // $station_name =get_station_name( array('origin'=>$data['origin']));
            return $userdata->result();
    }

    public function deactivate_user_account($status,$id)
    {
        $this->db->where('id_no',$id);
        $this->db->update('users',$status);

        return "SUCCESS";

    }
}
?>