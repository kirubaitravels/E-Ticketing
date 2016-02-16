            
            <!-- page content -->
            <div class="page-content">
                                
                <!-- revolution slider -->
                <div class="banner-container" style = "height:560px">
                    <div class="banner">
                      <div class="carousel_container">
                        <div class="carousel-inner">
                                  <div class="item active"> 
                                      <img src="<?php echo base_url();?>images/bus_booking_image1.gif" style="height:550px;width:100%;" alt="First slide" style="height:100%;width:100%"> 
                                             
                                  </div>      
                              </div>
                          </div>
             
                       <div class = "home_container">              
                           <div class="client_infor" style = "background-color:white;opacity:0.95">
                               <div class="inner_infor">
                                Personal Information
                               </div>
                                            <div id="reg_msg" style="margin-top:20px">
                                                
                                            </div>
                                               
                                                
                                            <?php $form1= array('schedule_id'=>$scheduleId,'bus_company'=>$bus_company,'count_result'=>$count_result,'plate'=>$plate,'from'=>$from,'to'=>$to,'price'=>$price); ?> 
                                            <?php echo validation_errors();?>
                                                    <?php echo form_open('home/complete_booking','onSubmit="return false"',$form1);?>

                                                         <div class="form-group" style="margin-top:-1em">  


                                                            <div class="whole_field">
                                                              <div class="lable">
                                                              <p>Name</p>
                                                              </div>
                                                              <input style="width:30em" class ="form-control" type="text" id="name" name="name" placeholder="Enter your name" required>
                                                              
                                                            </div>

                                                            <div class="whole_field">
                                                             <div class="lable">
                                                              <p>Phone Number</p>
                                                              </div>

                                                           
                                                            <div class="input-group" style="width:30em;margin-left:17em">
                                                              <span class="input-group-addon">+254</span>
                                                              <input type="text" class="form-control" id="phone_number">
                                                            </div>

                                                            </div>

                                                            <div class="whole_field">
                                                                <div class="lable">
                                                                <p >Email</p>
                                                                </div>
                                                                <input class ="form-control"  style="width:30em" id="email" type="text" name="email" placeholder="Enter your Email">
                                                            </div>

                                                            <div class="whole_field" >
                                                                <div class="lable">
                                                                <p>Promotion Code (Optional)</p>
                                                                </div>
                                                                <input  class ="form-control" style="width:30em" id="promotion_code" type="text" name="promotion_code" placeholder="Enter promotion code">

                                                            </div>

                                                            <div class="whole_field">
                                                                <div class="lable" >
                                                                <p >ID Number</p> 
                                                                </div>
                                                                <input class ="form-control"  style="width:30em" id="id_number" type="text" name="id_number" placeholder="Enter your ID Number" required>
                                            
                                                            </div>

                                                              <input type="submit" value="Submit" id="submit_for" class="btn btn-primary">

                                                      </div>
                                                    <?php echo form_close();?>
                                                    
                                                 
                                            
                           </div>


                           <div class="tickect_details" style = "background-color:white;opacity:0.95">
                           
                               <div class="inner_infor_ticket">
                                Tickect Details
                               </div> 

                               <div class="holdtkdetails">
                              

                            

                               <div class="tkheaders">Vehicle No.</div>
                               <div class="tkelement">
                               <?php
                                  $result = explode("%20", $plate);
                                  echo $result[0]." ".$result[1];
                                ?> 
                               </div>

                               <div class="tkheaders">From</div>
                               <div class="tkelement">
                               <?php echo $from;?>
                               </div>

                               <div class="tkheaders">To</div>
                               <div class="tkelement">
                               <?php echo $to;?>
                                </div>

                                 <div class="tkheaders">Seats selected</div>
                               <div class="tkelement">

                               <?php 
                                
                               echo $count_result;

                               ?> 
                               </div>

                               <div class="tkheaders">KSH</div>
                               <div class="tkelement">

                               <?php 
                                $total_price= $count_result * $price;
                               echo $total_price;

                               ?> 
                               </div>
                               <div class="thanks" style = "color:green">
                                   Thank You for booking with us<br>Bon Voyage!
                               </div>
                               </div>
                               
                           </div>
                           
                        
                       </div>
                        
                    </div>
                </div>                        
                <!-- ./revolution slider -->                                              

                <!-- page content wrapper -->
                <div class="page-content-wrap bg-img-1">

                    <div class="divider"><div class="box"><span class="fa fa-angle-down"></span></div></div>                    
                    
                    <!-- page content holder -->
                    <div class="page-content-holder">
                        
                        <div class="row">
                            <div class="col-md-5 this-animate" data-animate="fadeInLeft">
                                
                                <div class="block-heading block-heading-centralized">
                                    <h2 class="heading-underline">Book With Us, Save Some Cash</h2>
                                    <div class="block-heading-text">
                                        
                                    </div>
                                </div>
                                <div class="block this-animate" data-animate="fadeInLeft">
                                    <img src="<?php echo base_url();?>images/booking_image2.jpg" class="img-responsive"/>
                                </div>
                            </div>
                            
                            <div class="col-md-5 this-animate text-center" data-animate="fadeInRight">
                              <div class="block-heading block-heading-centralized">
                                  <h2 class="heading-underline">3 Easy Steps and you are ready to go!</h2>
                                  <div class="block-heading-text">
                                      
                                  </div>
                              </div>
                                <img  style = "height:" src="<?php echo base_url();?>/images/booking_process.jpg" class="img-responsive-mobile"/>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                    <!-- ./page content holder -->
                    <div class="divider"><div class="box"><span class="fa fa-angle-down"></span></div></div>  
                </div>
                <!-- ./page content wrapper -->
            </div>
            <!-- ./page content -->
            
