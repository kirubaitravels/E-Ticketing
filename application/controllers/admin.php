<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

      class admin extends CI_Controller 
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
	    

	    public function stations()
	    {
	    	$data['the_stations'] = $this->admindata->get_stations();
	      // $data  = array
	      // (
	      //   'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
	      // );

	      $this->load->helper(array('form'));
	      $this->load->view('userpagesheader');
	      $this->load->view('stations',$data);
	      $this->load->view('userpagefooter');
	    }

	   	public function newstation()
	    {
	    	$station_name=$this->input->post('station_name');
	    	$count = $this->admindata->stations_count();
	    	$new_code = $count+1;
	    	if($new_code<10)
	    	{
	    		$station_code = "S"."00".$new_code;
	    	}

	    	else
	    	{
	    		$station_code = "S"."0".$new_code;	    		
	    	}

	    	if($station_name=="")
	    	{
	    		echo "NO STATION NAME";
	    	}

	    	else
	    	{
	    		$station_data = array(
								'station_code'=>$station_code,
								'station_name'=>$station_name
								);

		    	$result = $this->admindata->add_station($station_data);


		    	if($result == "SUCCESS")
		    	{
		    		echo "SUCCESS";
		    		//redirect('admin/stations');
		    	}

		    	else
		    	{
		    		echo "THE STATION EXISTS";
		    	}

	    	}
	    }

	   	public function all_bookings()
	    {
	    	$data['the_bookings'] = $this->admindata->get_bookings();
	      // $data  = array
	      // (
	      //   'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
	      // );

	      $this->load->helper(array('form'));
	      $this->load->view('userpagesheader');
	      $this->load->view('allbookings',$data);
	      $this->load->view('userpagefooter');
	    }

	   	public function all_schedules()
	    {
	    	$data['the_schedules'] = $this->admindata->get_schedules();
	      // $data  = array
	      // (
	      //   'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
	      // );

	      $this->load->helper(array('form'));
	      $this->load->view('userpagesheader');
	      $this->load->view('allschedules',$data);
	      $this->load->view('bus_layout');
	      $this->load->view('userpagefooter');
	    }

	   	public function registered_users()
	    {
	    	$data['the_users'] = $this->admindata->get_registered_users();
	      // $data  = array
	      // (
	      //   'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
	      // );

	      $this->load->helper(array('form'));
	      $this->load->view('userpagesheader');
	      $this->load->view('registered_users',$data);
	      $this->load->view('userpagefooter');
	    }

	    public function other_users()
	    {
	    	$data['the_users'] = $this->admindata->get_other_users();
	      // $data  = array
	      // (
	      //   'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
	      // );

	      $this->load->helper(array('form'));
	      $this->load->view('userpagesheader');
	      $this->load->view('other_users',$data);
	      $this->load->view('userpagefooter');
	    }

	   	public function companies()
	    {
	    	$data['the_companies'] = $this->admindata->get_companies();
	      // $data  = array
	      // (
	      //   'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
	      // );

	      $this->load->helper(array('form'));
	      $this->load->view('userpagesheader');
	      $this->load->view('allcompanies',$data);
	      $this->load->view('userpagefooter');
	    }

	   	public function buses()
	    {
	    	$data['buses'] = $this->admindata->get_buses();
	      // $data  = array
	      // (
	      //   'title' =>'KRTS','heading' =>'E-ticketing Portal','message' =>'The best place you can be'
	      // );

	      $this->load->helper(array('form'));
	      $this->load->view('userpagesheader');
	      $this->load->view('allbuses',$data);
	      $this->load->view('userpagefooter');
	    }
		
		/// for updating user profile
		public function update_admin_profile()
		{
		  $theName = $this->input->post('name');
		  $mobile_no = $this->input->post('phone');
		  $email_address = $this->input->post('email');


		  $userDetails= array(
		        'name'=>$theName,
		        'mobile_no'=>$mobile_no
		        );


		  $user_email = array('email' => $email_address);

		  $userID = $this->session->userdata('user_id');

		  $result = $this->users->update_user_details($userDetails,$userID,$user_email);

		  if($result = 'SUCCESS')
		  {
		      $type = "ADMIN";

		      $query = $this->users->reset_session($userID,$type);

		      $result = explode("/", $query);

		      $session = array(
		                      'login_id' =>$result[0],
		                      'email' => $result[1],
		                      'account_type' => $result[2],
		                      'user_id' => $result[3],
		                      'name'=>$result[4],
		                      'mobile_no'=>$result[5]
		                      );
		     
		      $this->session->set_userdata($session);

		      //echo "Registration Complete";
		      redirect('home/userpage','refresh');
		  
		  }

		}
  }
?>