<?php 
Class Messages extends CI_Model
{
    
    /// for new messages
    public function new_message($data)
    {
        if($data['receiver']=="")
        {
            return "NO RECEIVER";
        }

        else
        {
            if($data['title']=="")
            {
                return "NO TITLE";
            }

            else
            {
                if($data['body']=="")
                {
                    return "NO BODY";
                }

                else
                {   
                    $this->db->where('sender',$data['sender']);
                    $this->db->where('receiver',$data['receiver']);
                    $this->db->where('title',$data['title']);
                    $this->db->where('body',$data['body']);
                    $this->db->where('attachment',$data['attachment']);
                    $exists=$this->db->get('messages');
                    
                    if($exists->num_rows()>0)
                    {
                        return "EMAIL ALREADY SENT";
                    }
                    else
                    {
                        $this->db->insert('messages',$data);         

                        return "SUCCESS";

                    }
                }
            }
        }
        
    }

    /// for listing sent messages
    public function list_messages($id)
    {
        $this->db->where('sender',$id);
        $the_messages=$this->db->get('messages');
        return $the_messages->result();

    }

    /// for listing received messages
    public function list_my_messages($id)
    {   
        $where = "receiver = '$id' OR receiver = '00000000'";
        $this->db->where($where);
        $the_messages=$this->db->get('messages');
        return $the_messages->result();

    }

    // for listing a particular message
    public function individual_message($id)
    {
        $this_message= $this->db->get_where(
                                    'messages',
                                    array('message_id'=>$id)
                                    );

        if($this_message->num_rows() > 0)
        {
            return $this_message->row()->sender."/".$this_message->row()->date_posted."/".$this_message->row()->title."/".$this_message->row()->body."/".$this_message->row()->attachment;
        }

    }

    //For getting bus companies
    public function get_bus_companies()
    {
        $the_companies=$this->db->get('bus_companies');
        return $the_companies->result();

    }

    //For getting bus companies
    public function get_users()
    {
        $the_users=$this->db->get('users');
        return $the_users->result();

    }

    //For getting bus companies
    public function get_name($id)
    {
        $user= $this->db->get_where(
                    'users',
                    array('id_no'=>$id)
                    );

        if($user->num_rows() > 0)
        {
            return $user->row()->name;
        }
        else
        {
            $bus_company= $this->db->get_where(
                    'bus_companies',
                    array('reg_no'=>$id)
                    );
            if($bus_company->num_rows() > 0)
            {
                return $bus_company->row()->company_name;
            }
        }

    }

    public function get_received_count($the_id)
    {
        $where = "receiver = '$the_id' OR receiver = '00000000' AND status = 'NEW'";
        $this->db->where($where);
        $my_messages= $this->db->get('messages');
        if($my_messages->num_rows() > 0)
        {
            return $my_messages->num_rows();
        }
    }

    public function messages_as_notifications($the_id)
    {
        $where = "receiver = '$the_id' OR receiver = '00000000' AND status = 'NEW'";
        $this->db->where($where);
        $this->db->where('status',"NEW");
        $my_messages=$this->db->get('messages');
        return $my_messages->result();
    }

    public function sender_image($the_id)
    {
        $exists = $this->db->get_where('users',array('id_no'=>$the_id));

        if(($exists->num_rows())>0)
        {
           return $exists->row()->image."/"."PREMIUM USER";
        }
        
        else
        {
           $query = $this->db->get_where('bus_companies',array('reg_no'=>$the_id));
           if(($query->num_rows())>0)
           {
                return $query->row()->image."/"."BUS COMPANY";
           }
        
        }   


    }
}
?>