<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
    public function login_users()
  {
    $user_login = array(
                'email'=> $this->input->post('login_email'),
                'password' =>md5($this->input->post('login_password'))
                );// end of array

    $this->load->model('users');

    $query = $this->users->login($user_login);

    if($query == 'NOT FOUND')
    {
      echo "<span class = 'fa fa-edit' style = 'color:red;'> Sorry! User not found</span><span style = 'color:orange'><br>Do you have an account yet? <a href = '#' style = 'color:white' title='Fast and free sign up!' data-toggle='collapse' data-target='#formRegister'>Register</a> now</span>";
    }

    else if($query == 'WRONG PASSWORD')
    {
      echo "<span class = 'fa fa-edit' style = 'color:red;'> Wrong password</span><span style = 'color:orange'><br>Have you forgotten your password?<a href = '#' style = 'color:white' title='Forgot your password? Not to worry!' data-toggle='collapse' data-target='#formForgotPassword'> Forgot Password</a></span>";
    }

    else if($query == "NO EMAIL")
    {
      echo "<span class = 'fa fa-edit' style = 'color:red;'> No email entered</span>";
    }

    else if($query == "NO PASSWORD")
    {
      echo "<span class = 'fa fa-edit' style = 'color:red;'> No password entered</span>";
    }

    else if($query == "DEACTIVATED")
    {
      echo "<span class = 'fa fa-edit' style = 'color:orange;'> Account is deactivated. Register with the same email to reactivate it</span>";
      //redirect('home','refresh');
    }
    else if($query == "INVALID EMAIL")
    {
      echo "<span class = 'fa fa-edit' style = 'color:red;'> The email entered is invalid</span>";
    }

  //To change Session variable names
    else if($query == "SUCCESS")
    {
      echo "1";      
    } 
  }

  public function login_data()
  {
      $the_email = $_GET["auth"];

      $user_login = array('email'=> $the_email);
      $this->load->model('users');

      $data = $this->users->set_login_session($user_login);

      $result = explode("/", $data);
    
      if($result[2]=='ADMIN')
      {

        $session = array(
                          'login_id' =>$result[0],
                          'email' => $result[1],
                          'account_type' => $result[2],
                          'user_id' => $result[3],
                          'name'=>$result[4],
                          'mobile_no'=>$result[5],
                          );
         
        $this->session->set_userdata($session);
        // echo "<SCRIPT LANGUAGE = 'Javascript'>
        // window.confirm('Django');
        // window.locaton='http://localhost/ticketing/index.php/home/adminpage'
        // </SCRIPT>";
        redirect('home/adminpage','refresh');
      }

      else if($result[2]=='PREMIUM USER')
      {
          if($result[3]=="")
          {
            $session = array(
                        'login_id' =>$result[0],
                        'email' => $result[1],
                        'account_type' => $result[2],
                        'user_id' => $result[3]
                        );
       
            $this->session->set_userdata($session);
            redirect('home/completeUserReg','refresh');
          }
          else
          {
            $session = array(
                        'login_id' =>$result[0],
                        'email' => $result[1],
                        'account_type' => $result[2],
                        'user_id' => $result[3],
                        'name'=>$result[4],
                        'mobile_no'=>$result[5]
                        );
       
            $this->session->set_userdata($session);
            redirect('home/userpage','refresh');
          }
        
      }

      else if($result[2]=='BUS COMPANY')
      {
          if($result[3]==NULL)
          {
            $session = array(
                        'login_id' =>$result[0],
                        'email' => $result[1],
                        'account_type' => $result[2],
                        'bus_company_id' => $result[3]
                        );
       
            $this->session->set_userdata($session);
            redirect('home/completeBusReg','refresh');
          }

          else 
          {
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

              if ($result[5]=="SUBSCRIBED")
              {
                redirect('home/buscompany','refresh');
              }
              else
              {
                redirect('home/renew_subscription');
                //echo "Your Subscription has expired. Please renew it";
              }
          }

        
        
      }
      else
      {
        redirect('home','refresh');
      }
  }
//Loggin out a user
  public function logout()
  {
    // $this->session->unset_userdata('login_id');
    // $this->session->unset_userdata('email');
    // $this->session->unset_userdata('account_type');
    // $this->session->unset_userdata('userID');
    $this->session->sess_destroy();
    redirect('home/logout');
  }  

  public function passwordReset()
  {
    $user_email = $this->input->post('the_user_email');

    if($user_email=="")
    {
      echo "NO EMAIL";
    }

    else
    {
        if(filter_var($user_email, FILTER_VALIDATE_EMAIL) === false)
        {
          echo "INVALID EMAIL";
        }
        else
        {
          $this->load->model('users');      
          $get_user = $this->users->password_reset($user_email);

          if($get_user == "USER VALIDATED")
          {
            echo "SUCCESS";
            //$this->send_reset_link($user_email);
          }

          else if($get_user == "NO SUCH USER")
          {
            echo "INVALID";
          }
        }
    }
  }

  public function send_reset_link()
  {
    $the_email = $_GET["email"];
    $hashed_email = md5($the_email);
    $hashed_date = md5(date('Y-m-d H:i:s'));
    $link_to_send = base_url()."home/password_reset_page/".$hashed_email.$hashed_date;
    //echo $link_to_send;
    $this->load->model('users');
    $user_type = $this->users->get_user_type($the_email);

    $result = explode("/", $user_type);

    if($result[0]=="A")
    {
      $reset_data = array('link'=>$link_to_send,'date_sent'=>date('Y-m-d H:i:s'),'user_id'=>$result[1]);
    }

    else if($result[0]=="B")
    {
      $reset_data = array('link'=>$link_to_send,'date_sent'=>date('Y-m-d H:i:s'),'bus_company_id'=>$result[1]);
    }

    $results = $this->users->send_reset_link($reset_data);
    mail($the_email,"KRTS: PASSWORD RESET",$link_to_send);

    redirect('../','refresh');
  } 
    
}
?>