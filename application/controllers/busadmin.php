<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

      class Busadmin extends CI_Controller 
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

            public function newBusSchedule()
            {
              //ob_start();

              $count = $this->busadmindata->schedule_count();
              $new_code = $count+1;
              if($new_code<10)
              {
                $schedule_id = "J"."00".$new_code;
              }

              else if($count<1000)
              {
                $schedule_id = "J"."0".$new_code;          
              }
              else if ($count<10000)
              {
                $schedule_id = "J".$new_code;    
              }


              $the_company = $this->session->userdata('bus_company_id');

              $bus=$this->input->post('bus');
 
              $origin=$this->input->post('from');

              $destination=$this->input->post('to');
              
              $the_departure_date=$this->input->post('depart_date');

              $the_arrival_date=$this->input->post('arrival_date');

              $departure_time=$this->input->post('depart_time');

              $arrival_time=$this->input->post('arrival_time');

              $price=$this->input->post('price');

              $vip_price=$this->input->post('vip_price');

              if($bus=="")
              {
                echo "NO BUS";
              }
              else
              {
                if($origin=="")
                {
                  echo "NO ORIGIN";
                }
                else
                {
                  if($destination=="")
                  {
                    echo "NO DESTINATION";
                  }
                  else
                  {
                    if($the_departure_date=="")
                    {
                      echo "NO DEPARTURE DATE";
                    }
                    else
                    {
                      if($the_arrival_date=="")
                      {
                        echo "NO ARRIVAL DATE";
                      }
                      else
                      {
                          if($departure_time=="")
                          {
                            echo "NO DEPARTURE TIME";
                          }
                          else
                          {
                            if($arrival_time=="")
                            {
                              echo "NO ARRIVAL TIME";
                            }
                            else
                            {
                              if($price=="")
                              {
                                echo "NO PRICE";
                              }
                              else
                              {
                                if($vip_price=="")
                                {
                                  echo "NO VIP PRICE";
                                }
                                else
                                {
                                    $my_depart_date = explode("/", $the_departure_date);
                                    $departure_date = $my_depart_date[2]."-".$my_depart_date[0]."-".$my_depart_date[1];

                                    $my_arrival_date = explode("/", $the_arrival_date);
                                    $arrival_date = $my_arrival_date[2]."-".$my_arrival_date[0]."-".$my_arrival_date[1];

                                    $schedule_data= array(
                                                          'schedule_id'=>$schedule_id,
                                                          'bus'=>$bus,
                                                          'origin'=>$origin,
                                                          'destination'=>$destination,
                                                          'departure_date'=>$departure_date,
                                                          'arrival_date'=>$arrival_date,
                                                          'departure_time'=>$departure_time,
                                                          'arrival_time'=>$arrival_time,
                                                          'price'=>$price,
                                                          'vip_price'=>$vip_price,
                                                          'bus_company'=>$the_company
                                                          );
                                    $result=$this->busadmindata->bus_schedule($schedule_data);
                                    if ($result=="SUCCESS") 
                                    {
                                      echo "SUCCESS";
                                    }
                                    else
                                    {
                                      echo "SCHEDULE ALREADY EXISTS";
                                    }
                                }
                              }
                            }
                        }
                      }
                    }
                  }
                }
              }
            }

          public function newFleet()
          {
              $company_name = $this->session->userdata('name');
              if (!is_dir('companyPics/$company_name'))
              {
                  mkdir('./companyPics/$company_name', 0777, true);
              }

              $pic_name = "photo1";
              $pic2_name = "photo2";
              $Pic3_name = "photo3";
              $config['upload_path'] = './companyPics/';
              $config['allowed_types'] = 'gif|jpg|png|jpeg';
              $config['max_size'] = '10240';

              $this->load->library('upload', $config);
              

              if ( $this->upload->do_upload($pic_name))
              {
                $file_upload1 = array('upload_data' => $this->upload->data());
                $image = $file_upload1['upload_data']['file_name'];
              }
              else
              {
                $image = 'logo.png';
              }

              $bus=$this->input->post('reg_no');
 
              $model=$this->input->post('model');

              $capacity=$this->input->post('capacity');

              $bus_company= $this->session->userdata('bus_company_id');

              if($bus == "")
              {
                echo "1";
              }
              else
              {
                if($model == "")
                {
                  echo "2";
                }
                else
                {
                  if($capacity == "")
                  {
                    echo "3";
                  }
                  else
                  {
                        $fleet_data = array(
                              'bus_reg_no'=>$bus,
                              'model'=>$model,
                              'capacity'=>$capacity,
                              'picture'=>$image,
                              'bus_company'=>$bus_company

                            );

                        $result=$this->busadmindata->new_fleet($fleet_data);

                        if ($result=="SUCCESS") 
                        {
                            echo "SUCCESS";
                          //redirect('busadmin/display_fleet','refresh');
                        }
                        else
                        {
                          echo "EXISTS";
                         // echo "A bus with the registration number ".$fleet_data['bus_reg_no']. " exists in the database";
                        }

                  }
                }
              }

          }

          /// for updating company profile
          public function update_company_profile()
          {
              $companyName = $this->input->post('company_name');
              $physicalAddress = $this->input->post('physical_address');
              $postalAddress = $this->input->post('postal_address');
              $telephone = $this->input->post('telephone');
              $email_address = $this->input->post('email');


              $companyDetails= array(
                    'company_name'=>$companyName,
                    'physical_address' => $physicalAddress,
                    'postal_address' =>$postalAddress,
                    'telephone'=>$telephone
                    );


              $company_email = array('email' => $email_address);

              $companyID = $this->session->userdata('bus_company_id');

              $result = $this->users->update_company_details($companyDetails,$companyID,$company_email);

              if($result = 'SUCCESS')
              {
                  $type = "BUS COMPANY";

                  $query = $this->users->reset_session($companyID,$type);

                  $result = explode("/", $query);

                  $session = array(
                            'login_id' =>$result[0],
                            'email' => $result[1],
                            'account_type' => $result[2],
                            'bus_company_id' => $result[3],
                            'name'=>$result[4],
                            'subscription'=>$result[5],
                            'subscription_date'=>$result[6],
                            'kra_pin'=>$result[7],
                            'telephone'=>$result[8],
                            'physical_address'=>$result[9],
                            'postal_address'=>$result[10]
                            );
                 
                  $this->session->set_userdata($session);

                  //echo "Registration Complete";
                  redirect('home/buscompany','refresh');
              
              }

          }

          /// for checking in a passenger
          public function check_in_passenger()
          {
              $serial= $this->input->post('check_in');
              $status = "YES";

              $ticketDetails= array(
                              'check_in_status'=>$status
                              );
              // echo '<script language="javascript">';
              // echo 'alert($serial)';
              // echo '</script>';
              $result = $this->busadmindata->check_in_passenger($ticketDetails,$serial);

              if($result = 'SUCCESS')
              {
                  //echo "Registration Complete";
                  redirect('busadmin/tickets','refresh');
              
              }

          }


        public function fleet()
        {
          $bus_company = $this->session->userdata('bus_company_id');
          // $data  = array
          //       (
          //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
          //       );

          $this->load->helper(array('form'));
          $this->load->view('userpagesheader');
          $this->load->view('fleet',$bus_company);
          $this->load->view('userpagefooter');



        }

        public function display_fleet()
        {
          $bus_company= $this->session->userdata('bus_company_id');
          $data['buses']=$this->main_model->get_buses($bus_company);
          // $data  = array
          //       (
          //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
          //       );

          $this->load->helper(array('form'));
          $this->load->view('userpagesheader');
          $this->load->view('displayfleet',$data);
          $this->load->view('userpagefooter');



        }

        public function busdetails()
        {
          $the_bus=$this->uri->segment(3);
          $mybus=explode("%20", $the_bus);
          $bus=$mybus[0]." ".$mybus[1];

          $bus_company= $this->session->userdata('bus_company_id');
          $data['this_bus']=$this->busadmindata->get_bus_details($bus);
          // $data  = array
          //       (
          //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
          //       );

          $this->load->helper(array('form'));
          $this->load->view('userpagesheader1');
          $this->load->view('busdetails',$data);
          $this->load->view('userpagefooter');



        }


        public function bus_schedule()
        {
          $bus_company = $this->session->userdata('bus_company_id');
          $data['cities']=$this->main_model->get_cities();
          $data['buses']=$this->busadmindata->get_buses($bus_company);
          // $data  = array
          //       (
          //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
          //       );

          $this->load->helper(array('form'));
          $this->load->view('userpagesheader',$data);
          $this->load->view('schedule',$data);
          $this->load->view('userpagefooter',$data);



        }

        public function my_schedules()
        {
          $bus_company= $this->session->userdata('bus_company_id');
          $data['schedule']=$this->busadmindata->get_schedules($bus_company);

          // foreach ($data as $myschedule) 
          // {
          //     $schedule_id = $myschedule->schedule_id;
          //     $result=$this->main_model->get_allseats($schedule_id);
          //     $implode_seats=implode(',',$result);         

          //     // print_r($implode_seats);

          //     $explode_seats=explode(',',$implode_seats);
          //     $data1['value']=$explode_seats;
          // }
          // $data  = array
          //       (
          //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
          //       );

          $this->load->helper(array('form'));
          $this->load->view('userpagesheader');
          $this->load->view('myschedules',$data);
          $this->load->view('bus_layout');        
          $this->load->view('userpagefooter');

        }

        public function schedule_details()
        {
          $bus_company= $this->session->userdata('bus_company_id');
          $data['schedule']=$this->busadmindata->get_schedules($bus_company);
          // $data  = array
          //       (
          //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
          //       );

          $this->load->helper(array('form'));
          $this->load->view('userpagesheader');
          $this->load->view('scheduledetails',$data);
          $this->load->view('userpagefooter');



        }

        public function bookings()
        {
          $bus_company= $this->session->userdata('bus_company_id');
          $data['company_bookings']=$this->busadmindata->get_company_bookings($bus_company);
          // $data  = array
          //       (
          //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
          //       );

          $this->load->helper(array('form'));
          $this->load->view('userpagesheader');
          $this->load->view('companybookings',$data);
          $this->load->view('userpagefooter');



        }

        public function tickets()
        {
          $bus_company= $this->session->userdata('bus_company_id');
          $data['company_tickets']=$this->busadmindata->get_company_tickets($bus_company);
          // $data  = array
          //       (
          //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
          //       );

          $this->load->helper(array('form'));
          $this->load->view('userpagesheader');
          $this->load->view('tickets',$data);
          $this->load->view('userpagefooter');



        }

        public function subscription()
        {
          $bus_company = $this->session->userdata('bus_company_id');

          $the_result = $this->busadmindata->get_subscription_status($bus_company);
          $result = explode(",", $the_result);
          $data['subscription_status'] = $result[0];
          $data['subscription_date'] = $result[1];
          $data['subscription_period'] = $result[2];
          // $data  = array
          //       (
          //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
          //       );

          $this->load->helper(array('form'));
          $this->load->view('userpagesheader');
          $this->load->view('subscription_status',$data);
          $this->load->view('userpagefooter');



        }

        public function renew_subscription()
        {
          $bus_company = $this->session->userdata('bus_company_id');
          $the_result = $this->busadmindata->get_subscription_status($bus_company);
          $result = explode(",", $the_result);
          $data['subscription_status'] = $result[0];
          $data['subscription_date'] = $result[1];
          // $data  = array
          //       (
          //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
          //       );

          $this->load->helper(array('form'));
          $this->load->view('userpagesheader');
          $this->load->view('renew_subscription',$data);
          $this->load->view('userpagefooter');



        }

        public function stats()
        {
          //       (
          //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
          //       );

          $this->load->helper(array('form'));
          $this->load->view('userpagesheader');
          $this->load->view('stats');
          $this->load->view('userpagefooter');
        }

        public function subscription_renew()
        {   
            $bus_company= $this->session->userdata('bus_company_id');

            $amount = $this->input->post('subscription_package'); 

            $email = $this->busadmindata->get_company_email($bus_company);

            $company_details = $this->busadmindata->get_company_details($bus_company);   

            foreach($company_details as $details)
            {
              $name = $details->company_name;
              // $from = $_GET["from"];
              // $to = $_GET["to"];
              // $price = $_GET["price"];
              // $count_result = $_GET["count_result"];
              $phone_number =$details->telephone;

              // echo $name;
              // echo $email;
            }  

            
            $data = array('name' =>$name ,'phone_number'=>$phone_number,'email'=>$email, 'amount'=>$amount,'the_company'=>$bus_company);
            //echo "fbhdfhdjh";
            $this->load->view('userpagesheader');
            $this->load->view('pesapal-iframe-subscription',$data);
            $this->load->view('userpagefooter');

        }

        public function deactivate_account()
        {
          $bus_company_id = $this->session->userdata('bus_company_id');
          $data = array('subscription_status'=>"DEACTIVATED");
          $receive = $this->busadmindata->deactivate_company_account($data,$bus_company_id);

          if($receive == "SUCCESS")
          {
            redirect('login/logout','refresh');
          }
        }
  
  }
?>