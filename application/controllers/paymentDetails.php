<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class PaymentDetails extends CI_Controller 
  {
           function __construct()
            {
               parent::__construct();
               $this->load->model('main_model','',TRUE);
            }

            public function user_payment_details()
            {
            	$this->load->helper(array('form'));

              $data  = array('title' =>'E-ticketing');
              // $data  = array('time_leave' =>'departure_time');

              $this->load->view('header',$data);
              $this->load->view('payment');
              $this->load->view('footer');

            }

	public function complete_booking()
	 {


              $name=$this->input->post('name');

              $phone_number=$this->input->post('phone_number');

              $promotion_code=$this->input->post('promotion_code');

              $id_number=$this->input->post('id_number');

              $userBookingData= array(
		              'name' =>$name,
		              'mobile_no'=>$phone_number,
		              'promotion_code'=>$promotion_code,
		              'id_no' => $id_number 
		              );

             // $this->db->insert('users',$userBookingData);

		$result = $this->main_model->users_booking($userBookingData);

		if ($result=="Booking Successful") 
		{
			echo "Success";

		}
		else
		{
			echo "Error";
		}
  }
}
?>