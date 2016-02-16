<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

      class SearchBus extends CI_Controller 
      {
           function __construct()
            {
               parent::__construct();
               $this->load->model('main_model','',TRUE);
               $this->load->model('messages');
            }

            public function search_result()
            {

              $from=$this->input->post('from');

              $to=$this->input->post('to');

              $depart_date=$this->input->post('depart_date');

              $depart_time=$this->input->post('departure_time');

              $data=$this->main_model->get_data($from,$to,$depart_date,$depart_time);

              //$this->load->view('testing.php',$data);

             if (empty($data)) 
             {
               echo "No data";
             }
             else
             {
             // print_r($data);
              $result="<p><b style = 'color:green'>Scheduled Buses ".$from." to ".$to." for ".$depart_date."</b></p>";
              $result.="<table>";
             // $result.="<th><b>From</b></th>";
             $result.="<th>No.</th>";
              $result.="<th>Bus</th>";
              $result.="<th>Reporting Time</th>";
              $result.="<th>Departing Time</th>";
              $result.="<th>Price From</th>";
              $result.="<th>Select</th>";
              $count=1;

              foreach ($data as $key) 
              {
                //echo $key->origin."\n". $key->destination.$key->departure_date.$key->arrival_date.$key->price;

                      $result.="<tr>";
                       //$result.="<td>".$to."</td>";
                       $result.="<td>".$count."</td>";
                       $result.="<td>". $key->bus."</td>";
                       $result.="<td>". $key->departure_time."</td>";
                       $result.="<td>". $key->arrival_time."</td>";
                       $result.="<td>".$key->price."</td>"; 
                       //$destination = urlencode($this->encrypt->encode($from));  
                       $info = $from."/".$to."/".$key->price."/".$key->schedule_id."/".$key->bus."/".$key->bus_company;
                       //$send = urlencode($this->encrypt->encode($info));
                       $result.="<td><a href='index.php/searchBus/bus_structure/$info'><i class='glyphicon glyphicon-ok-sign'></i> </a></td>";
                       $result.="</tr>";
                       $count++;
              }
               $result.="</table>";

              //echo "Data found";
              echo $result;
             }

            }
            

            function bus_structure()
            {
              $this->load->helper(array('form'));

              $from =$this->uri->segment(3);
              $to =$this->uri->segment(4);
              $price=$this->uri->segment(5);
              $schedule_id=$this->uri->segment(6);
              $bus_company=$this->uri->segment(8);
              $this->load->helper(array('form'));
              $result=$this->main_model->get_allseats($schedule_id);
              $implode_seats=implode(',',$result);

             

              // print_r($implode_seats);

              $explode_seats=explode(',',$implode_seats);





              $data1['value1']=$explode_seats;

              $plate=$this->uri->segment(7);
              $myplate = explode('%20',$plate);
              $thePlate = $myplate[0]." ".$myplate[1];

              $bus_images=$this->main_model->get_the_bus($thePlate);
              $data  = array('title' =>'E-ticketing','plate'=>$plate,'from'=>$from,'to'=>$to,'price'=>$price,'bus'=>$bus_images,'schedule_id'=>$schedule_id,'bus_company'=>$bus_company);


                
              $this->load->view('header',$data);
              $this->load->view('bus_structure',$data);
              $this->load->view('footer',$data1);

             


            }
      public function booklogin()
      {
        $data['cities']=$this->main_model->get_cities();
        $this->load->helper(array('form'));
        $this->load->view('userpagesheader');
        $this->load->view('booklogin',$data);
        $this->load->view('userpagefooter');

      }
              public function search_result_login()
            {

              $from=$this->input->post('from');

              $to=$this->input->post('to');

              $depart_date=$this->input->post('depart_date');

              $return_date=$this->input->post('return_date');

              $data=$this->main_model->get_data_login($from,$to,$depart_date,$return_date);

              //$this->load->view('testing.php',$data);

             if (empty($data)) 
             {
               echo "No data";
             }
             else
             {
             // print_r($data);
              $result="<p><b style = 'color:green'>Scheduled Buses ".$from." to ".$to." for ".$depart_date."</b></p>";
              $result.="<table>";
             // $result.="<th><b>From</b></th>";
             $result.="<th>No.</th>";
              $result.="<th>Bus</th>";
              $result.="<th>Reporting Time</th>";
              $result.="<th>Departing Time</th>";
              $result.="<th>Price From</th>";
              $result.="<th>Select</th>";
              $count=1;

              foreach ($data as $key) 
              {
                //echo $key->origin."\n". $key->destination.$key->departure_date.$key->arrival_date.$key->price;

                      $result.="<tr>";
                       //$result.="<td>".$to."</td>";
                       $result.="<td>".$count."</td>";
                       $result.="<td>". $key->bus."</td>";
                       $result.="<td>". $key->departure_time."</td>";
                       $result.="<td>". $key->arrival_time."</td>";
                       $result.="<td>".$key->price."</td>"; 
                       //$destination = urlencode($this->encrypt->encode($from));  
                       $info = $from."/".$to."/".$key->price."/".$key->schedule_id."/".$key->bus."/".$key->bus_company;
                       //$send = urlencode($this->encrypt->encode($info));
                       $result.="<td><a href='bus_structure_login/$info'><i class='glyphicon glyphicon-ok-sign'></i> </a></td>";
                       $result.="</tr>";
                       $count++;
              }
               $result.="</table>";

              //echo "Data found";
              echo $result;
             }

            }

             function bus_structure_login()
            {
              $this->load->helper(array('form'));

              $from =$this->uri->segment(3);
              $to =$this->uri->segment(4);
              $price=$this->uri->segment(5);
              $schedule_id=$this->uri->segment(6);
              $bus_company=$this->uri->segment(8);

              $this->load->helper(array('form'));

              $result=$this->main_model->get_allseats($schedule_id);
              $implode_seats=implode(',',$result);

             

              // print_r($implode_seats);

              $explode_seats=explode(',',$implode_seats);





              $data2['value2']=$explode_seats;

              $plate=$this->uri->segment(7);
              $myplate = explode('%20',$plate);
              $thePlate = $myplate[0]." ".$myplate[1];

              $bus_images=$this->main_model->get_the_bus($thePlate);
              $data  = array('title' =>'E-ticketing','plate'=>$thePlate,'from'=>$from,'to'=>$to,'price'=>$price,'bus'=>$bus_images,'schedule_id'=>$schedule_id,'bus_company'=>$bus_company);


                
              $this->load->view('userpagesheader',$data);
              $this->load->view('bus_structure_login',$data);
              $this->load->view('userpagefooter',$data2);

             

            }
      }
?>