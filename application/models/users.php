<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Users extends CI_Model
	{
		//ob_start();
		//Function that validates a users login against the database
		//Data from table login used
		//Other tables (Users and Bus Companies) used also because this function validates login for all users of the system

		public function login($user_login)
		{
		   $query = $this->db->get_where(
		   								'login',
							           	array('email'=>$user_login['email'], 
							           	'password'=>$user_login['password']));
		   
			if($user_login['email']=="")
			{
				return "NO EMAIL";
			}

			else
			{
				if(filter_var($user_login['email'], FILTER_VALIDATE_EMAIL) === false)
				{
					return "INVALID EMAIL";
				}

				else
				{
				if($user_login['password']=="")
				{
					return "NO PASSWORD";
				}

				else
				{
					if($query->num_rows() > 0)
					{
						$account_type = $query->row()->account_type;

						if($account_type == "ADMIN")
						{
							return "SUCCESS";
						}

						else if(($account_type == "PREMIUM USER")&&(($query->row()->user_id)!=""))
						{
							$user = $query->row()->user_id;

							$mydata = $this->db->get_where(
				   								'users',
									           	array('id_no'=>$user));

							if(($mydata->row()->user_status)=="REGISTERED")
							{
								return "SUCCESS";
							}
							else if (($mydata->row()->user_status)=="DEACTIVATED")
							{
								return "DEACTIVATED";
							}
						}

						else if(($account_type == "PREMIUM USER")&&(($query->row()->user_id)==""))
						{
							return "SUCCESS";
						}

						else if(($account_type == "BUS COMPANY")&&(($query->row()->bus_company_id)!=""))
						{
							$bus_company = $query->row()->bus_company_id;

							$mydata = $this->db->get_where(
				   								'bus_companies',
									           	array('reg_no'=>$bus_company));

							if(($mydata->row()->subscription_status)=="SUBSCRIBED")
							{
								return "SUCCESS";
							}
							else if (($mydata->row()->subscription_status)=="DEACTIVATED")
							{
								return "DEACTIVATED";
							}
						}

						else if(($account_type == "BUS COMPANY")&&(($query->row()->bus_company_id)==""))
						{
							return "SUCCESS";
						}
						

					}

					else
					{
						$wrong_password = $this->db->get_where('login', array('email'=>$user_login['email']));

				        if($wrong_password->num_rows()>0)
				        {
				        	return "WRONG PASSWORD";
				        }

				        else
				        {
				        	return "NOT FOUND";
				        }
					}

				}

				}

			}

			
		}

		/*End of function login*/

		/* Function to get logged in user data and set a seesion*/
		public function set_login_session($user_login)
		{
			$query = $this->db->get_where('login',$user_login);

			$thisUser = $query->row()->account_type;

			if($thisUser=="ADMIN")
			{
				$thisUserID = $query->row()->user_id;
				$query_two = $this->db->get_where('users', array('id_no'=>$thisUserID));
				return $query->row()->login_id."/".$query->row()->email."/".$query->row()->account_type."/".$query->row()->user_id."/".$query_two->row()->name."/".$query_two->row()->mobile_no."/".$query_two->row()->user_status;
				
			}

			

			else if($thisUser=="PREMIUM USER")
			{
				$thisUserID = $query->row()->user_id;
				if($thisUserID=="")
				{
					return $query->row()->login_id."/".$query->row()->email."/".$query->row()->account_type."/".$query->row()->user_id;
				}

				else
				{
					$query_two = $this->db->get_where('users', array('id_no'=>$thisUserID));

					return $query->row()->login_id."/".$query->row()->email."/".$query->row()->account_type."/".$query->row()->user_id."/".$query_two->row()->name."/".$query_two->row()->mobile_no."/".$query_two->row()->user_status;

				}

			}

			else if($thisUser=="BUS COMPANY")
			{
				$thisUserID = $query->row()->bus_company_id;
				if($thisUserID=="")
				{

					return $query->row()->login_id."/".$query->row()->email."/".$query->row()->account_type."/".$query->row()->bus_company_id;
				}

				else
				{
					$query_three = $this->db->get_where('bus_companies', array('reg_no'=>$thisUserID));

					return $query->row()->login_id."/".$query->row()->email."/".$query->row()->account_type."/".$query->row()->bus_company_id."/".$query_three->row()->company_name."/".$query_three->row()->subscription_status."/".$query_three->row()->subscription_date."/".$query_three->row()->kra_pin."/".$query_three->row()->telephone."/".$query_three->row()->physical_address."/".$query_three->row()->postal_address;

				}
				
			}

		}

		/*-----------------------------------------------------------------------------------------------------------------------*/

		//Signing up a first time user
		//Login data entered in table login
		public function users_signup($data,$the_password,$confirm)
		{
			$user_exists = $this->db->get_where('login',array('email'=>$data['email']));

			if($data['account_type'] == "")
			{
				return "NO TYPE";
			}

			else
			{
				if($data['email'] == "")
				{
					return "NO EMAIL";
				}
				else
				{
					if(filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false)
					{
						return "INVALID EMAIL";
					}

					else
					{
						if($the_password == "")
						{
							return "NO PASSWORD";
						}
						else
						{
							if(strlen($the_password)<6)
							{
								return "PASSWORD SHORT";
							}

							else
							{
								if($the_password!=$confirm)
								{
									return "PASSWORDS DO NOT MATCH";
								}
								else
								{
									if(($user_exists->num_rows())>0)
									{
										return "USER EXISTS";
									}

									else
									{
							        	$this->db->insert('login',$data);//Creates a user account on table login

							            return "SUCCESS";
								    }

								}

							}

						}

					}
					
				}

			}
			
		}

		public function password_reset($user_data)
		{
			$user_registered = $this->db->get_where('login',array('email'=>$user_data));

			if($user_registered->num_rows()>0)
			{
				return "USER VALIDATED";
			}

			else
			{
				return "NO SUCH USER";
			}
		}

		public function get_user_type($the_email)
		{
			$user = $this->db->get_where('login',array('email'=>$the_email));

			if($user->num_rows()>0)
			{
				if((($user->row()->account_type)=="ADMIN")||(($user->row()->account_type)=="PREMIUM USER"))
				{
					return "A"."/".$user->row()->user_id;
				}

				else if((($user->row()->account_type)=="BUS COMPANY"))
				{
					return "B"."/".$user->row()->bus_company_id;
				}

			}
		}

		public function send_reset_link($reset_data)
		{
			$this->db->insert('password_reset_links',$reset_data);
		}

		//Completing user Registration
		//User details entered on table users
		public function completeUserRegistration($data,$id)
		{
			$loggedInUser= $this->session->userdata('login_id');

        	$this->db->insert('users',$data);//Insert user Details

        	//Update user id on table login

        	$this->db->where('login_id',$loggedInUser);
			$this->db->update('login',$id);
    		return "SUCCESS";

		}

		//Completing Bus Company Registration
		//Company details entered on table bus_companies
		public function completeCompanyRegistration($data,$id)
		{
        	$this->db->insert('bus_companies',$data);//Insert Bus Company Details

        	$loggedInUser= $this->session->userdata('login_id');

	       	//Update bus company id on table login

        	$this->db->where('login_id',$loggedInUser);
			$this->db->update('login',$id);

            return "SUCCESS";	
			
		}

		//Update user profile photo
		public function update_photo($the_image,$this_id,$type)
		{
			if($type=="BUS COMPANY")
			{				
	        	$this->db->where('reg_no',$this_id);
				$this->db->update('bus_companies',$the_image);
				return "SUCCESS";
			}

			else if (($type == "PREMIUM USER")||($type=="ADMIN"))
			{
				$this->db->where('id_no',$this_id);
				$this->db->update('users',$the_image);
				return "SUCCESS";
			}

				
		}

		//Update Company Details
		public function update_company_details($data,$the_id,$the_email)
		{

        	$this->db->where('reg_no',$the_id);
			$this->db->update('bus_companies',$data);

			$this->db->where('bus_company_id',$the_id);
			$this->db->update('login',$the_email);

			return "SUCCESS";
			
		}

		//Update user Details
		public function update_user_details($data,$the_id,$the_email)
		{

		    $this->db->where('id_no',$the_id);
			$this->db->update('users',$data);

			$this->db->where('user_id',$the_id);
			$this->db->update('login',$the_email);

			return "SUCCESS";

		}

		//Update account Details
		public function update_account_details($data,$account_user,$the_type)
		{
			if($the_type == "BUS COMPANY")
			{
				$this->db->where('bus_company_id',$account_user);
				$this->db->update('login',$data);
			}

			else if(($the_type == "PREMIUM USER")||($the_type == "ADMIN"))
			{
				$this->db->where('user_id',$account_user);
				$this->db->update('login',$data);
			}

			return "SUCCESS";

		}

		public function reset_session($myId,$theType)
		{
			if($theType == "BUS COMPANY")
			{
			   $query = $this->db->get_where(
								'login',
				           	array('bus_company_id'=>$myId));

			}

			else if(($theType == "PREMIUM USER")||$theType == "ADMIN")
			{
				$query = $this->db->get_where(
								'login',
				           	array('user_id'=>$myId));

			}

		   
		   if($query->num_rows() > 0)
		   {

		   		//return $query->row()->login_id."/".$query->row()->email."/".$query->row()->account_type."/".$query->row()->user_id."/".$query->row()->bus_company_id;
			
				$thisUser = $query->row()->account_type;

				if($thisUser=="PREMIUM USER")
				{
					$thisUserID = $query->row()->user_id;
					$query_two = $this->db->get_where('users', array('id_no'=>$thisUserID));

					return $query->row()->login_id."/".$query->row()->email."/".$query->row()->account_type."/".$query->row()->user_id."/".$query_two->row()->name."/".$query_two->row()->mobile_no;

				}

				else if($thisUser=="ADMIN")
				{
					$thisUserID = $query->row()->user_id;
					$query_two = $this->db->get_where('users', array('id_no'=>$thisUserID));
					return $query->row()->login_id."/".$query->row()->email."/".$query->row()->account_type."/".$query->row()->user_id."/".$query_two->row()->name."/".$query_two->row()->mobile_no;
					
				}

				else if($thisUser=="BUS COMPANY")
				{
					$thisUserID = $query->row()->bus_company_id;
					$query_three = $this->db->get_where('bus_companies', array('reg_no'=>$thisUserID));

		   		return $query->row()->login_id."/".$query->row()->email."/".$query->row()->account_type."/".$query->row()->bus_company_id."/".$query_three->row()->company_name."/".$query_three->row()->subscription_status."/".$query_three->row()->subscription_date."/".$query_three->row()->kra_pin."/".$query_three->row()->telephone."/".$query_three->row()->physical_address."/".$query_three->row()->postal_address;
					
				}

			}

			else
			{
				return "NOT FOUND";
			}
		}

	}

?>