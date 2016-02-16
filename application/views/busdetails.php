            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>   
                    <?php 

                        $the_bus=$this->uri->segment(3);
                        $mybus=explode("%20", $the_bus);
                        $bus=$mybus[0]." ".$mybus[1];

                    ?>                 
                    <li class="active" style = "color:green"><?php echo $bus;?></li>
                </ul>
                <!-- END BREADCRUMB -->                   
                    
                <!-- /.row -->
                <div class="row">
                    <div class = "col-md-3" style ="background-color:#E3E4E4;border-radius:3px;margin-left:30px;min-height:46em;padding-top:20px">
                        <div id = "result" style = "color:green">Bus Details</div>
                        <br>
<!--                         <p style = "color:green">Bus Schedule History</p>   -->
                        <?php
                            foreach ($this_bus as $bus) 
                            {
                                echo "<p style = 'color:blue'>Registration Number:</p>"."<div style ='background-color:white;height:;padding-left:5px;border-radius:5px'>".$bus->bus_reg_no."</div><br>";
                                echo "<p style = 'color:blue'>Bus Model:</p>"."<div style ='background-color:white;height:;padding-left:5px;border-radius:5px'>".$bus->model."</div><br>";
                                echo "<p style = 'color:blue'>Bus Capacity:</p> "."<div style ='background-color:white;height:;padding-left:5px;border-radius:5px'>".$bus->capacity."</div><br>";

                                $user = $this->session->userdata('account_type');
                                if($user == "ADMIN")
                                {
                                    $company = $bus->bus_company;
                                    // echo $company;
                                    $the_company = $this->main_model->get_company($company);
                                    echo "<p style = 'color:blue'>Operated by:</p> "."<div style ='background-color:white;height:;padding-left:5px;border-radius:5px'>".$the_company."</div><br>";
                                }
                                echo "<p style = 'color:blue'>Images<br>";


                            }
                        ?>

                        <?php
                            foreach ($this_bus as $bus) 
                            {
                                if($bus->picture=="")
                                {
                                    echo "<a href = '#' data-toggle='modal' data-target='#BusImages'> <img src ='".base_url()."/companyPics/default.jpg'style = 'width:30%;height:30%;border-radius:5px;'>";
                                }

                                else
                                {
                                    $array = explode(",",$bus->picture);
                                    echo "<a href = '#' data-toggle='modal' data-target='#BusImages'> <img src ='".base_url()."/companyPics/".$array[0]."'style = 'width:30%;height:30%;border-radius:5px;'>";
                                    echo "";
                                   // echo "<img src ='".base_url()."/companyPics/".$array[1]."'style = 'width:30%;height:30%;border-radius:5px;margin-left:5px'>";
                                    //echo "<img src ='".base_url()."/companyPics/".$array[2]."'style = 'width:30%;height:30%;border-radius:5px;margin-left:5px'>";
                                    echo "</a>";
                                    //echo "<img src='http://localhost/ticketin/companyPics/".$my_bus[0]."'"."alt='First slide' style = 'width:100%;height:100%;border-radius:5px;>";
                                }

                            }
                        ?>

                        <br><br>
                        <a href = '#' data-toggle='modal' data-target='#BusStructure'>Bus Structure</a>


                        
                    </div>

                    <div class = "col-md-8" style ="background-color:#E3E4E4;border-radius:3px;margin-left:5px;padding-top:20px;min-height:46em" id = "googleMap">
                        <?php
                            $reg_no = $bus->bus_reg_no;
                            $data = $this->main_model->get_bus_schedule_history($reg_no);

                        ?>

                        <!-- START DEFAULT DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <h3 class="panel-title" style = "color:green">Bus Schedule History</h3>
                                <!-- <button style = "margin-left:880px;margin-top:5px;background-color:" class = 'btn btn-primary btn-sm' title = "Check in passenger" type="submit">Check In</button> -->
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>                                
                            </div>
                            
                            <div class="panel-body" style = "width:96%">
                                <table class="table datatable">
                                    <thead>
                                        <th style = "font-weight:bold">No</th>
                                        <th style = "font-weight:bold">Origin</th>
                                        <th style = "font-weight:bold">Destination</th>
                                        <th style = "font-weight:bold">Departure Date</th>
                                        <th style = "font-weight:bold">Arrival Date</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                            $count=0;

                                            if($data!="No Data")
                                            {
                                                foreach ($data as $mydata) 
                                                {
                                                    echo "<tr>";

                                                        echo "<td>";
                                                        $count++;
                                                        echo $count;
                                                        echo "<br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        $code=$mydata->origin;
                                                        $station=$this->main_model->get_station($code);
                                                        echo $station;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        $code=$mydata->destination;
                                                        $station=$this->main_model->get_station($code);
                                                        echo $station;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $mydata->departure_date;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $mydata->arrival_date;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                    echo "</tr>";
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <?php
                            $reg_no = $bus->bus_reg_no;
                            $booking_data = $this->main_model->get_bus_booking_history($reg_no);
                        ?>
                        <!-- START DEFAULT DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <h3 class="panel-title" style = "color:green">Bus Booking History</h3>
                                <!-- <button style = "margin-left:880px;margin-top:5px;background-color:" class = 'btn btn-primary btn-sm' title = "Check in passenger" type="submit">Check In</button> -->
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>                                
                            </div>
                            
                            <div class="panel-body" style = "width:96%">
                                <table class="table datatable">
                                    <thead>
                                        <th style = "font-weight:bold">No</th>
                                        <th style = "font-weight:bold">Booking ID</th>
                                        <th style = "font-weight:bold">Passengers</th>
                                        <th style = "font-weight:bold">Seats</th>
                                        <th style = "font-weight:bold">Journey</th>
                                        <th style = "font-weight:bold">Passenger</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                            $count=0;
                                            if($data!="No Data")
                                            {
                                                foreach ($booking_data as $mydata) 
                                                {
                                                    echo "<tr>";

                                                        echo "<td>";
                                                        $count++;
                                                        echo $count;
                                                        echo "<br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $mydata->booking_id;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $mydata->no_of_passengers;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $mydata->sitting_position;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $mydata->journey_details;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $mydata->passenger;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                    echo "</tr>";
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
             </div>
                <!-- /.row -->

                <!-- Modal -->
                <div class="modal fade" id="BusImages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $bus->bus_reg_no;?></h4>
                      </div>
                      <div class="modal-body" style = "height:30em;width:120%">
                        
                        <!-- Google Map -->
                        <div class = "col-md-4" style ="background-color:;border-radius:5px;margin-left:5px;margin-top:20px;color:Green;padding-top:5px;height:25em;width:80%">
                        <?php
                            foreach ($this_bus as $bus) 
                            {
                                $array = explode(",",$bus->picture);
                                echo "<img src ='http://localhost/ticketing/companyPics/".$array[0]."'style = 'width:100%;height:100%;border-radius:5px;'>";
                                //echo "<img src ='http://localhost/ticketing/companyPics/".$array[1]."'style = 'width:30%;height:30%;border-radius:5px;'>";
                                //echo "<img src ='http://localhost/ticketing/companyPics/".$array[2]."'style = 'width:30%;height:30%;border-radius:5px;'>";
                                //echo "<img src='http://localhost/ticketin/companyPics/".$my_bus[0]."'"."alt='First slide' style = 'width:100%;height:100%;border-radius:5px;>";

                            }
                        ?>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="BusStructure" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content" style = "width:60em;margin-left:-30px">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $bus->bus_reg_no;?></h4>
                      </div>

                      <div class="modal-body" style = "height:30em;width:100%">
                        

                        <div class = "col-md-8" style ="background-color:;border-radius:5px;margin-left:5px;margin-top:20px;color:Green;padding-top:20px;height:25em;width:80%">

                            <!-- Bus Structure -->
<!--                               <?php //$form= array('id' =>'form_det','onSubmit'=>'return checkseats()'); ?>

                               <?php //$form1= array('schedule_id'=>$schedule_id); ?> -->
                            <div id="bus_structur">
                                <?php //echo form_open('home/user_payment_details',$form,$form1);?>
                                    <table style="-moz-box-shadow: 0 0px 0px #d1d1d1;-webkit-box-shadow: 0 0px 0px #d1d1d1;box-shadow: 0 0px 0px #d1d1d1;margin-top:1em;margin-left:1em">
                                        <tr style="height:14px" >
                                        <td rowspan="2"style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:2.5em 0em 0em 0em;height:14px">
                                            <div id="seats" class="1" style="position:absolute;padding-top:0.4em" >
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="1" name="seat[]" value="1" type="checkbox" autocomplete="off" style="margin-top:1.2em;margin-left:1.5em;position:absolute;display:none" onclick="select_seat('1','1');">    
                                        </td>
                                        <td  rowspan="2" style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">
                                            <div class="2" id="seats" style="position:absolute;padding-top:0.4em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="2" name="seat[]" value="2" type="checkbox" style="margin-top:1.2em;margin-left:-0.6em;position:absolute;" autocomplete="off" onclick="select_seat('2','2');">
                                                
                                        </td>
                                         <td rowspan="2" style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">

                                            <div class="3" id="seats" style="position:absolute;padding-top:0.4em">
                                              <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="3" name="seat[]" value="3" type="checkbox" style="margin-top:1.2em;margin-left:-0.6em;position:absolute;" autocomplete="off" onclick="select_seat('3','3');">
                                        
                                        </td>

                                        <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">
                                            <div class="4" id="seats">
                                             <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="4" name="seat[]" value="4" type="checkbox" style="margin-top:-1.9em;margin-left:-0.6em;position:absolute" autocomplete="off" onclick="select_seat('4','4');">
                                                
                                        </td>
                                        <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">
                                            <div class="5" id="seats">
                                             <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="5" name="seat[]" value="5" type="checkbox" style="margin-top:-1.9em;margin-left:-1em;position:absolute" autocomplete="off" onclick="select_seat('5','5');">
                                                
                                        </td>
                                            <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em;height:14px">
                                            <div class="6" id="seats">
                                             <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="6" name="seat[]" value="6" type="checkbox" style="margin-top:-1.9em;position:absolute;margin-left:-1.5em" autocomplete="off" onclick="select_seat('6','6');">
                                                
                                        </td>
                                            <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em;height:14px">
                                            <div class="7" id="seats">
                                             <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="7" name="seat[]" value="7" type="checkbox" style="margin-top:-1.9em;position:absolute;margin-left:-1.5em" autocomplete="off" onclick="select_seat('7','7');">
                                                
                                        </td>
                                            <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em;height:14px">
                                            <div class="8" id="seats">
                                             <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="8" name="seat[]" value="8" type="checkbox" style="margin-top:-1.9em;position:absolute;margin-left:-1.5em" autocomplete="off" onclick="select_seat('8','8');">
                                                
                                        </td>
                                            <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em;height:14px">
                                            <div class="9" id="seats">
                                             <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="9" name="seat[]" value="9" type="checkbox" style="margin-top:-1.9em;position:absolute;margin-left:-1.5em" autocomplete="off" onclick="select_seat('9','9');">
                                                
                                        </td>
                                            <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em;height:14px">
                                            <div class="10" id="seats">
                                             <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="10" name="seat[]" value="10" type="checkbox" style="margin-top:-1.9em;position:absolute;margin-left:-1.5em" autocomplete="off" onclick="select_seat('10','10');">
                                                
                                        </td>
                                            <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em;height:14px">
                                            <div class="11" id="seats">
                                             <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="11" name="seat[]" value="11" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute" autocomplete="off" onclick="select_seat('11','11');">
                                                
                                        </td>
                                            <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em;height:14px">
                                            <div class="12" id="seats">
                                             <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="12" name="seat[]" value="12" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute" autocomplete="off" onclick="select_seat('12','12');">
                                                
                                        </td>
                                            <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em;height:14px">
                                            <div class="13" id="seats">
                                             <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="13" name="seat[]" value="13" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute" autocomplete="off" onclick="select_seat('13','13');">
                                                
                                        </td>

                                        </tr>

                                       <tr>
                                       <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:1em 0em 0em 0em;height:14px">

                                            <div class="14" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="14" name="seat[]" value="14" type="checkbox" style="margin-top:-1.9em;margin-left:1.5em;position:absolute;" autocomplete="off" onclick="select_seat('14','14');">
                                            
                                        </td>
                                         <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:1em 0em 0em 0em;height:14px">

                                            <div class="15" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="15" name="seat[]" value="15" type="checkbox" style="margin-top:-1.9em;margin-left:-0.8em;position:absolute;" autocomplete="off" onclick="select_seat('15','15');">
                                            
                                        </td>

                                                 <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:1em 0em 0em 0em;height:14px">

                                            <div class="16" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="16" name="seat[]" value="16" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;" autocomplete="off" onclick="select_seat('16','16');">
                                            
                                        </td>
                                                     <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:1em 0em 0em 0em;height:14px">

                                            <div class="17" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="17" name="seat[]" value="17" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;" autocomplete="off" onclick="select_seat('17','17');">
                                            
                                        </td>
                                                     <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:1em 0em 0em 0em;height:14px">

                                            <div class="18" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="18" name="seat[]" value="18" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;" autocomplete="off" onclick="select_seat('18','18');">
                                            
                                        </td>
                                                     <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:1em 0em 0em 0em;height:14px">

                                            <div class="19" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="19" name="seat[]" value="19" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;" autocomplete="off" onclick="select_seat('19','19');">
                                            
                                        </td>
                                                     <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:1em 0em 0em 0em;height:14px">

                                            <div class="20" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="20" name="seat[]" value="20" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;" autocomplete="off" onclick="select_seat('20','20');">
                                            
                                        </td>
                                                     <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:1em 0em 0em 0em;height:14px">

                                            <div class="21" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="21" name="seat[]" value="21" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;"autocomplete="off" onclick="select_seat('21','21');">
                                            
                                        </td>
                                                     <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:1em 0em 0em 0em;height:14px">

                                            <div class="22"  id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="22" name="seat[]" value="22" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;" autocomplete="off" onclick="select_seat('22','22');">
                                            
                                        </td>
                                                     <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:1em 0em 0em 0em;height:14px">

                                            <div class="23" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="23" name="seat[]" value="23" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;" autocomplete="off" onclick="select_seat('23','23');">
                                    

                                        </tr>
                                        <tr>
                                            
                                            <td colspan="13" style="background: rgb(230, 230, 230);border:#ccc 0px solid">
                                            <div class="24" id="seats" style="padding-top:-1.2em;margin-left:55em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="24" name="seat[]" value="24" type="checkbox" style="margin-top:-1.9em;margin-left:56.4em;position:absolute;" autocomplete="off" onclick="select_seat('24','24');">
                                            
                                                
                                            </td>
                                        </tr>
                                         <tr>
                                         <td rowspan="2" style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">

                                            <div class="25" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="25" name="seat[]" value="25" type="checkbox" style="margin-top:-1.9em;margin-left:1.4em;position:absolute;" autocomplete="off" onclick="select_seat('25','25');">
                                            
                                        </td>
                                         <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:0em 0em 1em 0em;height:14px">

                                            <div class="26" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="26" name="seat[]" value="26" type="checkbox" style="margin-top:-1.9em;margin-left:-1em;position:absolute;" autocomplete="off" onclick="select_seat('26','26');">
                                            
                                        </td>

                               <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">

                                            <div class="27" id="seats">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="27" name="seat[]" value="27" type="checkbox" style="margin-top:-1.9em;margin-left:-1em;position:absolute;" autocomplete="off" onclick="select_seat('27','27');">
                                            
                                        </td>
                                                     <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">

                                            <div class="28" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="28" name="seat[]" value="28" type="checkbox" style="margin-top:-1.9em;margin-left:-1em;position:absolute;" autocomplete="off" onclick="select_seat('28','28');">
                                            
                                        </td>
                                       <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">

                                            <div class="29" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="29" name="seat[]" value="29" type="checkbox" style="margin-top:-1.9em;margin-left:-1em;position:absolute;"autocomplete="off" onclick="select_seat('29','29');">
                                            
                                        </td>
                                                     <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">

                                            <div class="30" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="30" name="seat[]" value="30" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;" autocomplete="off" onclick="select_seat('30','30');">
                                            
                                        </td>
                                                     <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">

                                            <div class="31" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="31" name="seat[]" value="31" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;" autocomplete="off" onclick="select_seat('31','31');">
                                            
                                        </td>
                                                     <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">

                                            <div class="32" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="32" name="seat[]" value="32" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;" autocomplete="off" onclick="select_seat('32','32');">
                                            
                                        </td>
                                                     <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">

                                            <div class="33" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="33" name="seat[]" value="33" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;" autocomplete="off" onclick="select_seat('33','33');">
                                            
                                        </td>
                                                     <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">

                                            <div class="34" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="34" name="seat[]" value="34" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;" autocomplete="off" onclick="select_seat('34','34');">
                                            
                                        </td>
                                       <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">

                                            <div class="35" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="35" name="seat[]" value="35" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;" autocomplete="off" onclick="select_seat('35','35');">
                                            
                                        </td>
                                                     <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">

                                            <div class="36" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="36" name="seat[]" value="36" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;" autocomplete="off" onclick="select_seat('36','36');">
                                            
                                        </td>
                                                     <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">

                                            <div class="37" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="37" name="seat[]" value="37" type="checkbox" style="margin-top:-1.9em;margin-left:-1.5em;position:absolute;" autocomplete="off" onclick="select_seat('37','37');">
                                            
                                        </td>
                                        
                                        </tr>

                                        <tr>

                                         <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:0em 0em 1em 0em;height:14px">

                                            <div class="38" id="seats" style="padding-top:-1.2em">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="38" name="seat[]" value="38" type="checkbox" style="margin-top:-1.9em;margin-left:1.4em;position:absolute;"autocomplete="off" onclick="select_seat('38','38');">
                                            
                                        </td>

                                        <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em 0em 0em 0em">
                                            <div class="39" id="seats">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="39" name="seat[]" value="39" type="checkbox" style="margin-top:-1.9em;margin-left:-1em;position:absolute;"autocomplete="off" onclick="select_seat('39','39');">

                                        </td>

                                        <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em 0em 0em 0em">
                                            <div class="40" id="seats">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="40" name="seat[]" value="40" type="checkbox" style="margin-top:-1.9em;margin-left:-1em;position:absolute;"autocomplete="off" onclick="select_seat('40','40');">
                                
                                        </td>
                                            
                                        <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em 0em 0em 0em" id="replace">
                                            <div class="41" id="seats">
                                             <img src="<?=base_url();?>images/seat_available.png">
                                             </div>
                                             <input id="41" name="seat[]" value="41" class="check" type="checkbox" style="margin-left:-1em;margin-top:-1.9em;position:absolute;"autocomplete="off" onclick="select_seat('41','41');">

                                        </td>

                                        <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em 0em 0em 0em">
                                            <div class="42" id="seats">
                                            <img src="<?=base_url();?>images/seat_available.png" >
                                            </div>
                                             <input id="42" name="seat[]" value="42" type="checkbox" style="margin-top:-1.9em;position:absolute;margin-left:-1.5em"autocomplete="off" onclick="select_seat('42','42');">
                                                
                                        </td>

                                        <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em 0em 0em 0em">
                                            <div class="43" id="seats">
                                            <img src="<?=base_url();?>images/seat_available.png" >
                                            </div>
                                             <input id="43" name="seat[]" value="43" type="checkbox" style="margin-top:-1.9em;position:absolute;margin-left:-1.5em"autocomplete="off" onclick="select_seat('43','43');">
                                                
                                        </td>

                                        <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em 0em 0em 0em">
                                            <div class="44" id="seats">
                                            <img src="<?=base_url();?>images/seat_available.png">
                                            </div> 
                                             <input id="44" name="seat[]" value="44" type="checkbox" style="margin-top:-1.9em;position:absolute;margin-left:-1.5em" autocomplete="off" onclick="select_seat('44','44');">
                                                
                                        </td>

                                        <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em 0em 0em 0em">
                                            <div class="45" id="seats">
                                            <img src="<?=base_url();?>images/seat_available.png" >
                                            </div>
                                             <input id="45" name="seat[]" value="45" type="checkbox" style="margin-top:-1.9em;position:absolute;margin-left:-1.5em" autocomplete="off" onclick="select_seat('45','45');">
                                                
                                        </td>

                                        <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em 0em 0em 0em">
                                            <div class="46" id="seats">
                                            <img src="<?=base_url();?>images/seat_available.png" >
                                            </div>
                                             <input id="46" name="seat[]" value="46" type="checkbox" style="margin-top:-1.9em;position:absolute;margin-left:-1.5em" autocomplete="off" onclick="select_seat('46','46');">
                                                
                                        </td>
                                        <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em 0em 0em 0em">
                                            <div class="47" id="seats">
                                            <img src="<?php echo base_url();?>images/seat_available.png" >
                                            </div>
                                             <input id="47" name="seat[]" value="47" type="checkbox" style="margin-top:-1.9em;position:absolute;margin-left:-1.5em"  autocomplete="off" onclick="select_seat('47','47');">
                                                
                                        </td>
                                        <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;border-bottom:#ccc 0px solid;padding:0em 0em 0em 0em">
                                            <div class="48" id="seats">
                                            <img src="<?php echo base_url();?>images/seat_available.png" >
                                            </div>
                                             <input id="48" name="seat[]" value="48" type="checkbox"   autocomplete="off" style="margin-top:-2.2em;position:absolute;margin-left:-1.5em" onclick="select_seat('48','48');">
                                                
                                        </td>
                                        <td style="background: rgb(230, 230, 230);border:#ccc 0px solid;padding:0em 0em 0em 0em;height:14px">
                                            <div class="49" id="seats">
                                            <img src="<?php echo base_url();?>images/seat_available.png">
                                            </div>
                                             <input id="49" name="seat[]" value="49" type="checkbox"  style="margin-top:-1.9em;position:absolute;margin-left:-1.5em" autocomplete="off" onclick="select_seat('49','49');">
                                                
                                        </td>
                                        </tr>


                                   </table>
                                  
<!--                                  <div id="error_div">
                                     
                                 </div>

                                  <div class="submit_booking">
                                        <input type="submit" value="Submit" id="submit_seat" onclick="checkseats()"/>
                                        <?php echo form_close();?>
                                  </div > -->

    </div>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                      </div>
                    </div>
                  </div>
                </div>