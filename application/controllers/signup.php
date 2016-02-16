<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller 
{
	
	/// for signing up users...............
	public function users_signup()
	{

		    $userData= array(
							'email' => $this->input->post('my_email'),
							'password' =>md5($this->input->post('the_password')),
							'account_type'=>$this->input->post('the_account_type'),
							);
		    $confirmpassword = $this->input->post('confirmpassword');
		    $password = $this->input->post('the_password');

			$this->load->model('users');


			$result = $this->users->users_signup($userData,$password,$confirmpassword);

			if($result == "USER EXISTS")//A user already exists
		    {
		    	echo "<span class = 'fa fa-edit' style = 'color:red;margin-left:10px'> A user with the email <i>".$this->input->post('my_email')."</i> exists</span>";
		    }

	    	else if ($result == "SUCCESS")
		    {
		    	echo "<span class = 'icon-thumbs-up-alt' style = 'color:green;font-weight:7pt;margin-left:10px'>Success. Log in with your credentials to complete registration</span>";
			}

			else if($result == "PASSWORDS DO NOT MATCH")
			{
				echo "<span class = 'fa fa-edit' style = 'color:red;margin-left:10px'> Passwords do not match</span>";
			}

			else if($result=="NO TYPE")
			{
				echo "<span class = 'fa fa-edit' style = 'color:red;margin-left:10px'> Supply account type</span>";
			}

			else if($result=="NO EMAIL")
			{
				echo "<span class = 'fa fa-edit' style = 'color:red;margin-left:10px'> No email was entered</span>";
			}

			else if($result=="NO PASSWORD")
			{
				echo "<span class = 'fa fa-edit' style = 'color:red;margin-left:10px'> No password was entered</span>";				
			}

			else if ($result=="INVALID EMAIL")
			{
				echo "<span class = 'fa fa-edit' style = 'color:red;margin-left:10px'> The email entered is invalid</span>";
			}

			else if($result == "PASSWORD SHORT")
			{
				echo "<span class = 'fa fa-edit' style = 'color:red;margin-left:10px'> Password is too short</span>";
			}


	}


	/// for completing registration
	public function completeCompanyRegistration()
	{

		     $companyDetails= array(
							'reg_no' => $this->input->post('reg_no'),
							'kra_pin' =>$this->input->post('kra_pin'),
							'company_name'=>$this->input->post('company_name'),
							'physical_address' => $this->input->post('physical_address'),
							'postal_address' =>$this->input->post('postal_address'),
							'telephone'=>$this->input->post('telephone'),
							'subscription_status'=>"PENDING",
							'subscription_date'=>date('Y-m-d H:i:s'),
							'subscription_period'=>"PENDING",
							'image'=>"default.jpg"
							);
		    $companyID = array('bus_company_id' =>$this->input->post('reg_no'));
			$this->load->model('users');

			$the_companyID = $this->input->post('reg_no');
			$result = $this->users->completeCompanyRegistration($companyDetails,$companyID);

			if($result = 'SUCCESS')
			{
				$type = "BUS COMPANY";

				$query = $this->users->reset_session($the_companyID,$type);

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
		    	redirect('home/subscribe','refresh');			
			}

	}

	/// for completing registration
	public function completeUserRegistration()
	{

		     $userDetails= array(
							'id_no' => $this->input->post('id_no'),
							'name' =>$this->input->post('name'),
							'gender'=>$this->input->post('gender'),
							'mobile_no' => $this->input->post('mobile_no'),
							'image'=>"default.jpg",
							'user_status'=>"REGISTERED"
							);
		    $userID = array('user_id' =>$this->input->post('id_no'));
	
			$this->load->model('users');

			$the_userID = $this->input->post('id_no');
			$result = $this->users->completeUserRegistration($userDetails,$userID);

			if($result = 'SUCCESS')
			{
				$type = "PREMIUM USER";

				$query = $this->users->reset_session($the_userID,$type);

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