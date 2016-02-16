<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class user extends CI_Controller 
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('admindata','',TRUE);
			$this->load->model('main_model','',TRUE);
			$this->load->model('busadmindata','',TRUE);
			$this->load->model('users','',TRUE);
			$this->load->model('userdata','',TRUE);
			$this->load->model('messages');
		}
		
		public function bookinghistory()
		{
			$user=$this->session->userdata('user_id');

			$data['userbooking_history'] = $this->userdata->get_bookingdata($user);

			// $data['cities']=$this->admindata->get_station_name();

			// $data= array('origin'=>$station_origin,'destination'=>$station_destination);



			$this->load->helper(array('form'));
			$this->load->view('userpagesheader');
			$this->load->view('bookinghistory',$data);
			$this->load->view('userpagefooter');

		}

	  /// for updating user profile
	  public function update_user_profile()
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
	          $type = "PREMIUM USER";

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

	  	/// for updating user profile
		public function update_account_settings()
		{
		  $old_password = $this->input->post('the_old_password');
		  $new_password = $this->input->post('new_password');
		  $confirm_new_password = $this->input->post('confirm_new_password');

		  $password_to_replace = md5($new_password);

		  if($old_password=="")
		  {
		  	echo "1";
		  }

		  else
		  {
			if($new_password=="")
			{
				echo "2";
			}

			else
			{
				if($confirm_new_password=="")
				{
					echo "3";
				}
				else
				{
					if($old_password==$new_password)
					{
						echo "4";
					}
					else
					{
						if($new_password!=$confirm_new_password)
						{
							echo "5";
						}
						else
						{
							if((strlen($new_password))<6)
							{
								echo "6";
							}
							else
							{
								// if(!(preg_match('(?=.*[\d\W])', $new_password)))
								// {
								// 	echo "7";
								// }
								// else
								// {
										$accountDetails= array(
											        'password'=>$password_to_replace
											        );

									  if(($this->session->userdata('account_type'))=="BUS COMPANY")
								  {
								  	$account_user = $this->session->userdata('bus_company_id');
								  	$account_type = $this->session->userdata('account_type');
								  }

								  else if(($this->session->userdata('account_type'))=="PREMIUM USER")
								  {
								  	$account_user = $this->session->userdata('user_id');
								  	$account_type = $this->session->userdata('account_type');
								  }

								  else if(($this->session->userdata('account_type'))=="ADMIN")
								  {
								  	$account_user = $this->session->userdata('user_id');
								  	$account_type = $this->session->userdata('account_type');
								  }

								  $result = $this->users->update_account_details($accountDetails,$account_user,$account_type);

								  if($result = 'SUCCESS')
								  {
								     echo "SUCCESS";									  
								  }
								  else
								  {
								  	echo "ERROR";
								  }
								// }

							}
						}
					}
				}

			}
		  }

		}

	  	public function deactivate_account()
		{
		  $user_id = $this->session->userdata('user_id');
		  $data = array('user_status'=>"DEACTIVATED");
		  $receive = $this->userdata->deactivate_user_account($data,$user_id);

		  if($receive == "SUCCESS")
		  {
		    redirect('login/logout','refresh');
		  }
		}
	}
?>