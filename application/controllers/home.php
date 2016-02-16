<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
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

    public function index()
    {
      //$userData = array(

                       // 'username'=$this->session->userdata('username'),
                       // );

      //if(isset($userData['userid'] && !empty($data['id'])))
      $this->load->helper(array('form'));
      $this->home_load();
    }

    public function logout()
    {
      redirect('../','refresh');
    }

    //Home page
    //First page that is loaded
    public function home_load()
    {
      

      $data['title'] ='E-ticketing';
      $data['cities']=$this->main_model->get_cities();

      $this->load->helper(array('form'));     
      

    
      $this->load->view('header',$data);
      $this->load->view('index',$data);  //From home.php
      $this->load->view('footer');


   }

  //User Page
  //Loaded once successfully logged in as a user
  //Access_Level set to PREMIUM USER
  public function userpage()
    {
      //$this->load->model('model_users');
      $data  = array
            (
              'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
            );

    $this->load->helper(array('form'));
    $this->load->view('userpagesheader',$data);
    $this->load->view('userpage',$data);
    $this->load->view('userpagefooter',$data);



  }

  //Admin Page
  //Loaded once successfully logged in as admin
  //Access_Level set to ADMIN
  public function adminpage()
    {

      $data  = array
            (
              'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
            );

      $this->load->helper(array('form'));
      $this->load->view('userpagesheader',$data);
      $this->load->view('adminpage',$data);
      $this->load->view('userpagefooter',$data);



  }

  //Bus Company page
  //Loaded once successfully logged in as admin
  //Access_Level set to BUS COMPANY
  public function buscompany()
    {

      $data  = array
            (
              'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
            );

      $this->load->helper(array('form'));
      $this->load->view('userpagesheader',$data);
      $this->load->view('buscompany',$data);
      $this->load->view('userpagefooter',$data);



  }

    public function subscribe()
    {

      $data  = array
            (
              'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
            );

      $this->load->helper(array('form'));
      $this->load->view('userpagesheader',$data);
      $this->load->view('new_company_subscription',$data);
      $this->load->view('userpagefooter',$data);

    }

    public function renew_subscription()
    {

      $data  = array
            (
              'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
            );

      $this->load->helper(array('form'));
      $this->load->view('userpagesheader',$data);
      $this->load->view('subscription',$data);
      $this->load->view('userpagefooter',$data);



  }

    public function completeUserReg()
    {
      $data  = array
            (
              'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
            );

      $this->load->helper(array('form'));
      $this->load->view('userpagesheader',$data);
      $this->load->view('completeuserdetails',$data);
     $this->load->view('userpagefooter',$data);



  }

    public function completeBusReg()
    {
      $data  = array
            (
              'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
            );

      $this->load->helper(array('form'));
      $this->load->view('userpagesheader',$data);
      $this->load->view('completecompanydetails',$data);
      $this->load->view('userpagefooter',$data);



  }


    public function user_payment_details()
  {

              $checked_checkbox=$this->input->post('seat');
              $bus_company=$this->input->post('bus_company');
              $count_result=count($checked_checkbox);
              $schedule_id=$this->input->post('schedule_id');

              $plate=$this->input->post('plate');
              $from=$this->input->post('from');
              $to=$this->input->post('to');
              $price=$this->input->post('price');

              // echo $schedule_id;
            
             // echo $count_result;
              
              $vr=12;
             
             if(isset($checked_checkbox[0]) || isset($checked_checkbox[1])) 
              
              {
                    if (isset($checked_checkbox[1])) {
                      $checkbox2=$checked_checkbox[1];
                    }
                    else
                    {
                      $checkbox2='';
                    }
                $checkbox1=$checked_checkbox[0];
                
                //echo  $checkbox1;
                $userSeatingPosition= array(
                  'pos_id'=>$vr,
                  'posit'=>$checkbox1.','.$checkbox2
                  );
             echo $userSeatingPosition['posit'];

              $result_check= $this->main_model->users_sitting($userSeatingPosition);
              }

              if ($result_check=="worked") 
                {
                   echo "Reservation Successful";

              $this->load->helper(array('form'));
              // $data['scheduleId']=$schedule_id;
               $data  = array('scheduleId'=>$schedule_id,'count_result'=>$count_result,'bus_company'=>$bus_company,'plate'=>$plate,'from'=>$from,'to'=>$to,'price'=>$price);

              //$data  = array('title' =>'E-ticketing','scheduleId'=>$schedule_id);

              $this->load->view('header',$data);
              $this->load->view('payment',$data);
              $this->load->view('footer');

                }

                
  }

  public function user_payment_details_login()
  {
              $user_id=$this->session->userdata('user_id');
              $email=$this->session->userdata('email');

              $data=$this->main_model->get_login_data($user_id);
              foreach ($data as $key) 
              {
               
                       
                       $name=$key->name;
                       $phone_number=$key->mobile_no;
                     
              }

               echo $phone_number;

              $checked_checkbox=$this->input->post('seat');
              $bus_company=$this->input->post('bus_company');
              $count_result=count($checked_checkbox);
              $schedule_id=$this->input->post('schedule_id');

              $plate=$this->input->post('plate');
              $from=$this->input->post('from');
              $to=$this->input->post('to');
              $price=$this->input->post('price');

              $vr=12;
             
             if(isset($checked_checkbox[0]) || isset($checked_checkbox[1])) 
              
              {
                    if (isset($checked_checkbox[1])) {
                      $checkbox2=$checked_checkbox[1];
                    }
                    else
                    {
                      $checkbox2='';
                    }
                $checkbox1=$checked_checkbox[0];
                
                //echo  $checkbox1;
                $userSeatingPosition= array(
                  'pos_id'=>$vr,
                  'posit'=>$checkbox1.','.$checkbox2
                  );
             echo $userSeatingPosition['posit'];

              $result_check= $this->main_model->users_sitting($userSeatingPosition);
              }

              if ($result_check=="worked") 
                {
                   echo "Reservation Successful";

              $this->load->helper(array('form'));
              // $data['scheduleId']=$schedule_id;
               $data  = array('scheduleId'=>$schedule_id,'count_result'=>$count_result,'bus_company'=>$bus_company,'plate'=>$plate,'from'=>$from,'to'=>$to,'price'=>$price,'user_id'=>$user_id,'email'=>$email,'name'=>$name,'phone_number'=>$phone_number);


              $this->load->view('header',$data);
              $this->load->view('pesapal-iframe',$data);
              $this->load->view('footer');

                }

                
  }



  public function complete_booking()
   {
            
              $name=$this->input->post('name');
                $bus_company=$this->input->post('bus_company');
              $phone_number=$this->input->post('phone_number');
              $schedule_id=$this->input->post('schedule_id');

              // echo  $schedule_id;
              // echo "hjdfhjdfh";
             // $promotion_code=$this->input->post('promotion_code');

              $id_number=$this->input->post('id_number');

              $userReservationData= array(
                  'name' =>$name,
                  'mobile_no'=>$phone_number,
                  //'promotion_code'=>$promotion_code,
                  'id_no' => $id_number 
                  );

               $result = $this->main_model->users_reservation($userReservationData);

                if ($result=="Successful") 
                {
                    echo "Reserved";
                  $this->complete_reservation($schedule_id,$id_number,$bus_company);
                
                }
                else
                {
                  echo "Error";
                }

  }

    

      public function complete_reservation($schedule_id,$id_number,$bus_company)
  { 
              
                $pos=12;
                $data=$this->main_model->get_sitting_position($pos);
                $sche_id=$schedule_id;
                $bus_com=$bus_company;
                 echo $sche_id;

                if (empty($data)) {
                           echo "No data";
                         }
                         else
                         {
                        //echo $data;
                     
                      

                       }
               
               $length = 10;

               $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

               // $no_seats = explode(',',$data);
               // $num_of_seats = count($no_seats);
                $num_of_seats=2;
                $userBookingData= array(
                                'booking_id'=>$randomString,
                                'no_of_passengers'=>$num_of_seats,
                                'sitting_position'=>$data,
                                'cost'=>$length,
                                'passenger'=>$id_number,
                                'bus_company'=>$bus_com,
                                'journey_details'=>$sche_id,
                                'bus_company'=>$bus_company
                               
                             
                                );

                               $resultBooking = $this->main_model->users_booking($userBookingData);

                               if ($resultBooking=="Successful1") 
                               {
                                   
                                 $this->clear_bookingspace($pos,$randomString);

                                 
                                  // echo $var1_reserved3;
                                  // return $var1_reserved3;
                               }
                               else{
                                echo "Booking not successful Client";

                               }
  }
  public function clear_bookingspace($seat_po,$rand)
  {
    $generated_rand=$rand;
    $result=$this->main_model->clear_position_table($seat_po);
    if ($result=="worked") {
    
     $this->get_booked_seats_db($generated_rand);
       // echo $var1_reserved1;
   
    }
    else
    {
      echo "Failed";
    }
  }
  public function get_booked_seats_db($random_gen)
  { 
    $data=$this->main_model->get_booked_seats($random_gen);

    // print_r($data);
      $seats_exploded=explode(',',$data);
      $var1_reserved=$seats_exploded[0];
     // $var2=$seats_exploded[1];
      // echo $var1_reserved;
     
    if (empty($data)) 
    {
      echo "No data CDan";
    }
      else
        {
        
        echo "ghjdghkjfgdf";
           //redirect(base_url().'index.php/home/load_iframe');

   }
  }
  public function load_iframe()
  {

    $name = $_GET["name"];
    $from = $_GET["from"];
    $to = $_GET["to"];
    $price = $_GET["price"];
    $count_result = $_GET["count_result"];
    $phone_number = $_GET["phone_number"];
    $email = $_GET["email"];
    // echo $name;
    // echo $email;
    $data = array('name' =>$name ,'phone_number'=>$phone_number,'email'=>$email,'email'=>$email,'from'=>$from,'to'=>$to,'price'=>$price,'count_result'=>$count_result );
               echo "fbhdfhdjh";
              $this->load->view('header');
              $this->load->view('pesapal-iframe',$data);
              $this->load->view('footer');
  }

  public function edit_profile()
  {
    // $bus_company = $this->session->userdata('bus_company_id');
    // $the_result = $this->busadmindata->get_subscription_status($bus_company);
    //       (
    //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
    //       );

    $this->load->helper(array('form'));
    $this->load->view('userpagesheader');
    $this->load->view('edit_profile');
    $this->load->view('userpagefooter');
  }

  /// for updating profile photo
  public function update_photo()
  {
      $pic_name = "profile_image";

      if(($this->session->userdata('account_type'))=="BUS COMPANY")
      {
        $config['upload_path'] = './companyPics/';
      }

      else if($this->session->userdata('account_type')=="PREMIUM USER")
      {
        $config['upload_path'] = './userImages/';
      }

      else if($this->session->userdata('account_type')=="ADMIN")
      {
        $config['upload_path'] = './userImages/';
      }

      $config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|jpeg';
      $config['max_size'] = '10240';

      $this->load->library('upload', $config);
      

      if ($this->upload->do_upload($pic_name))
      {
        $file_upload1 = array('upload_data' => $this->upload->data());
        $image = $file_upload1['upload_data']['file_name'];
      }
      else
      {

      }

      $companyDetails= array(
                            'image'=>$image,
                            );


      if(($this->session->userdata('account_type'))=="BUS COMPANY")
      {
          $the_ID = $this->session->userdata('bus_company_id');
          $type = "BUS COMPANY";
      }

      else if($this->session->userdata('account_type')=="PREMIUM USER")
      {
          $the_ID = $this->session->userdata('user_id');
          $type = "PREMIUM USER";
      }

      else if($this->session->userdata('account_type')=="ADMIN")
      {
          $the_ID = $this->session->userdata('user_id');
          $type = "ADMIN";
      }

      $result = $this->users->update_photo($companyDetails,$the_ID,$type);

      if(($this->session->userdata('account_type'))=="BUS COMPANY")
      {
        redirect('home/buscompany','refresh');      }

      else if($this->session->userdata('account_type')=="PREMIUM USER")
      {
        redirect('home/userpage','refresh');
      }

      else if($this->session->userdata('account_type')=="ADMIN")
      {
        redirect('home/adminpage','refresh');
      }
  }

  public function account_settings()
  {
    // $bus_company = $this->session->userdata('bus_company_id');
    // $the_result = $this->busadmindata->get_subscription_status($bus_company);
    //       (
    //         'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
    //       );

    $this->load->helper(array('form'));
    $this->load->view('userpagesheader');
    $this->load->view('account_settings');
    $this->load->view('userpagefooter');
  }

  public function paynotify ()
  {
  
      $consumer_key="3TCZ7c3vQN5W50y8h39sHgxHFoqE0Vwt";//Register a merchant account on
                         //demo.pesapal.com and use the merchant key for testing.
                         //When you are ready to go live make sure you change the key to the live account
                         //registered on www.pesapal.com!
      $consumer_secret="5eO57BrgUIJs8E7hE8deZBvR8ko=";// Use the secret from your test
                         //account on demo.pesapal.com. When you are ready to go live make sure you 
                         //change the secret to the live account registered on www.pesapal.com!
      $statusrequestAPI = 'https://www.pesapal.com/api/querypaymentstatus';//change to      
                         //https://www.pesapal.com/api/querypaymentstatus' when you are ready to go live!

      // Parameters sent to you by PesaPal IPN
      $pesapalNotification=$_GET['pesapal_notification_type'];
      $pesapalTrackingId=$_GET['pesapal_transaction_tracking_id'];
      $pesapal_merchant_reference=$_GET['pesapal_merchant_reference'];

      if($pesapalNotification=="CHANGE" && $pesapalTrackingId!='')
      {
         $token = $params = NULL;
         $consumer = new OAuthConsumer($consumer_key, $consumer_secret);
         $signature_method = new OAuthSignatureMethod_HMAC_SHA1();

         //get transaction status
         $request_status = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $statusrequestAPI, $params);
         $request_status->set_parameter("pesapal_merchant_reference", $pesapal_merchant_reference);
         $request_status->set_parameter("pesapal_transaction_tracking_id",$pesapalTrackingId);
         $request_status->sign_request($signature_method, $consumer, $token);
         echo $pesapalNotification;
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $request_status);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_HEADER, 1);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
         if(defined('CURL_PROXY_REQUIRED')) if (CURL_PROXY_REQUIRED == 'True')
         {
            $proxy_tunnel_flag = (defined('CURL_PROXY_TUNNEL_FLAG') && strtoupper(CURL_PROXY_TUNNEL_FLAG) == 'FALSE') ? false : true;
            curl_setopt ($ch, CURLOPT_HTTPPROXYTUNNEL, $proxy_tunnel_flag);
            curl_setopt ($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
            curl_setopt ($ch, CURLOPT_PROXY, CURL_PROXY_SERVER_DETAILS);
         }

         $response = curl_exec($ch);

         $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
         $raw_header  = substr($response, 0, $header_size - 4);
         $headerArray = explode("\r\n\r\n", $raw_header);
         $header      = $headerArray[count($headerArray) - 1];

         //transaction status
         $elements = preg_split("/=/",substr($response, $header_size));
         $status = $elements[1];

         curl_close ($ch);
         
      //UPDATE YOUR DB TABLE WITH NEW STATUS FOR TRANSACTION WITH pesapal_transaction_tracking_id $pesapalTrackingId

          $pesapal= array(
                                      'pnotification'=>$pesapalNotification,
                                      'ptranid'=>$pesapalTrackingId,
                                      'pmerchant'=>$pesapal_merchant_reference,
                                      'status'=>$status
                                 
                                     
                                   
                                      );

                                     $resultPay = $this->main_model->payment_pesapal($pesapal);
                      
         if(DB_UPDATE_IS_SUCCESSFUL)
         {
            $resp="pesapal_notification_type=$pesapalNotification&pesapal_transaction_tracking_id=$pesapalTrackingId&                 pesapal_merchant_reference=$pesapal_merchant_reference";
            ob_start();
            echo $resp;
            ob_flush();
            exit;
         }
      }
    
  }

}
?>