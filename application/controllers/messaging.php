<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

      class messaging extends CI_Controller 
      {
           function __construct()
            {
               parent::__construct();
               $this->load->model('admindata','',TRUE);
               $this->load->model('main_model','',TRUE);
               $this->load->model('busadmindata','',TRUE);
               $this->load->model('users');
               $this->load->model('messages');
            }

          /// for checking in a passenger
          public function new_message()
          {
              $pic_name = "attachment";
              $config['upload_path'] = './attachments/';
              $config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|jpeg';
              $config['max_size'] = '10240';

              $this->load->library('upload', $config);     

              if ($this->upload->do_upload($pic_name))
              {
                $file_upload1 = array('upload_data' => $this->upload->data());
                $item = $file_upload1['upload_data']['file_name'];
              }
              else
              {
                $item = "";
              }

              $receiver = $this->input->post('receiver');
              $title = $this->input->post('title');
              $body = $this->input->post('body');

              if(($this->session->userdata('account_type'))=="BUS COMPANY")
              {
                $user = $this->session->userdata('bus_company_id');
              }
              else
              {
                $user = $this->session->userdata('user_id');
              }

              $messageDetails= array(
                              'receiver'=>$receiver,
                              'title'=>$title,
                              'body'=>$body,
                              'attachment'=>$item,
                              'sender'=>$user,
                              'date_posted'=>date('Y-m-d H:i:s'),
                              'status'=>"NEW"
                              );

              $result = $this->messages->new_message($messageDetails);

              if($result == "SUCCESS")
              {
                  echo "1";
                  //echo "<span style ='color:green'>Your message has been sent</span>";
                  //redirect('messaging/messages','refresh');
              
              }

              else if($result == "NO RECEIVER")
              {
                echo "2";
                //echo "<span style ='color:red'>Enter a receiver</span>";
              }

              else if($result == "NO TITLE")
              {
                echo "3";
                //echo "<span style ='color:red'>There is no message title. Enter a title</span>";
              }

              else if($result == "NO BODY")
              {
                echo "4";
                //echo "<span style ='color:red'>There is no message. Enter a message</span>";
              }

              else if($result == "EMAIL ALREADY SENT")
              {
                echo "5";
                //echo "<span style ='color:blue'>Email already sent</span>";
              }

        }

        public function messages()
        {
          if(($this->session->userdata('account_type'))=="BUS COMPANY")
          {
            $user = $this->session->userdata('bus_company_id');
          }
          else
          {
            $user = $this->session->userdata('user_id');
          }
          $data['received_messages']=$this->messages->list_my_messages($user);
          $data['sent_messages']=$this->messages->list_messages($user);
          $data['bus_companies']=$this->messages->get_bus_companies();
          $data['the_users']=$this->messages->get_users();
          //       (
          //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
          //       );

          $this->load->helper(array('form'));
          $this->load->view('userpagesheader');
          $this->load->view('messages',$data);
          $this->load->view('userpagefooter');
        }

        public function my_messages()
        {
          if(($this->session->userdata('account_type'))=="BUS COMPANY")
          {
            $user = $this->session->userdata('bus_company_id');
          }
          else
          {
            $user = $this->session->userdata('user_id');
          }
          $data['received_messages']=$this->messages->list_my_messages($user);
          $data['sent_messages']=$this->messages->list_messages($user);
          //       (
          //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
          //       );

          $this->load->helper(array('form'));
          $this->load->view('userpagesheader',$data);
          $this->load->view('my_messages',$data);
          $this->load->view('userpagefooter');
        }

        public function view_messages()
        {
          if(($this->session->userdata('account_type'))=="BUS COMPANY")
          {
            $user = $this->session->userdata('bus_company_id');
          }
          else
          {
            $user = $this->session->userdata('user_id');
          }
          $data['received_messages']=$this->messages->list_my_messages($user);
          $data['sent_messages']=$this->messages->list_messages($user);
          //       (
          //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
          //       );

          $this->load->helper(array('form'));
          $this->load->view('userpagesheader1',$data);
          $this->load->view('read_message',$data);
          $this->load->view('userpagefooter');
        }
  }
?>