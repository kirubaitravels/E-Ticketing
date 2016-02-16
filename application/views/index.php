	            
            <!-- page content -->
            <div class="page-content">
                <!-- revolution slider -->
                <div class="banner-container" style = "height:560px">
                    <div class="banner">

						<div class = "home_side_panel">

							<!--<div id = "message" style = "background-color:; color:white; height:5%;margin-left:80px;width:85.5%;">
					        	
					        </div>-->

							<div class="carousel_container">
								<div class="carousel-inner">
					                <div class="item active"> 
					                    <img src="<?php echo base_url();?>images/bus_booking_image1.gif" style="height:550px;width:100%;" alt="First slide" style="height:100%;width:100%"> 
					                           
					                </div>      
					            </div>
					        </div>

					        <div style = "background-color:green"><span class ="fa fa-user"></span></div>

							<div class="booking_form">
					        	<div class="container">
									<div class="row">
							  		

						  				<!--Tab NAVIGATION-->

						  				<ul class="nav navbar-nav hold_links">
						  		            <li class="active link_tab">
						  		               <a href="#tab1" data-toggle="tab">Booking</a>
						  		            </li>

						                    <li class="link_tab">
						                       <a href="#tab2" data-toggle="tab">View</a> 
						                    </li>

						                    <li class="link_tab">
						                       <a href="#tab3" data-toggle="tab">Account</a> 
						                    </li>

						                    <li class="link_tab">
						                       <a href="#tab4" data-toggle="tab">Routes</a> 
						                    </li>

						                    <li class="link_tab">
						                       <a href="#tab5" data-toggle="tab">Manage</a> 
						                    </li>

						                    <li class="link_tab" id="tab6">
						                       <a href="#tab6" data-toggle="tab">Rate Us</a> 
						                    </li>

						  				</ul>

									  	<!--Tab Section-->
									  	<div class="tab-content hold_links">
					                    <!--Start of Search Form-->
						  					<div class="tab-pane active content_tab" id="tab1">
							  					<?php echo form_open('searchBus/search_result','onSubmit="return false"');?>

													<div class="control-group from">
							                           	<div class="form-group input-group">
							                                <select  type="select" class="form-control" id="journey_input" name="from" onchange="calcRoute();" required>
							                                <option value = "Default">Select Town From</option>
							                                <?php foreach ($cities as $city) {?>
							                                	<option value="<?php echo $city->station_name;?>" required><?php echo $city->station_name;?></option>
							                                <?php }?>
							                                </select>
							                                
							                            </div>
											        </div>

													<div class="control-group to">
							                           <div class="form-group input-group">
							                                
							                               <select type="select" class="form-control" id="journey_input_to" name="to" onchange="calcRoute();" required>
							                               	<option value = "Default">Select Town To</option>
							                                <?php foreach ($cities as $city) {?>
							                                	<option value="<?php echo $city->station_name;?>"><?php echo $city->station_name;?></option>
							                                <?php }?>
							                               </select>

							                            </div>
								                 	</div>
								                 	
								                 	<div class="control-group departing_date">
											            <div class="form-group input-group hold_input_gly">
											                               
											                <div class="form-group">
																			    		
																<input type="text" class="form-control" id="dp" name="depart_date" placeholder="Departure Date"/ required>
															</div> 
											                               
											                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></input>
											            </div>
											        </div>

											       	<!-- <div class="control-group returning_date">

								                        <div class="form-group input-group hold_input_gly">
								                               
								                            <div class="form-group">
															    		
														   		<input type="time" class="form-control" id="dpt" name="departure_time" placeholder="Prefered Departure Time" required/>
														 	</div> 
								                               
								                            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></input>
								                        </div>
								                  	</div> -->

													<input class = "btn btn-md-default" type="submit" value="Search" id="submit_form" style="margin-top:14em;background-color:green;color:white">
												
													<?php echo form_close();?>
												<!--End of Search Form-->

															                           
									  			</div>

												<div class="tab-pane content_tab" id="tab2">
													  
												</div>

							  					<div class="tab-pane content_tab" id="tab3">
							                            This is our third tab
							                            This is our third tab
							                            This is our third tab
							                            This is our third tab
							  					</div>

									  		</div>

									  	</div>

									</div>

					           

						</div>

						<div class = "google-maps" id = "googleMap">
							
						</div>

						<!-- <div class = "ui left vertical inverted labeled icon sidebar menu">
							<a class = "item"><i class = "home icon"></i></a>
						</div> -->
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

            <!-- <button id="feedback" class = "btn btn-default btn-lg" title="Change your password" data-toggle="collapse" data-target="#change_password" style = "background-color:green;color:white">Give Us Feedback</button> -->
            
            <?php //echo form_open_multipart('home/user_feedback','id="user_feedback"','class="form collapse"');?>

<!--             <div id="change_password" class ="feedback_form form-group form collapse" style = "background-color:#E3E4E4;margin-top:5px;border-radius:5px">
                <div class = "signup_area" style = "margin-left:10px"><!--#00294F--  
                	<span style = "color:blue">We value what you have to say. <br>Please take time to fill in this survey</span>               
                    <input class ="form-control" style = "width:75%;margin-bottom:5px" type ="text" maxlength="40" name ="the_old_password" placeholder = "Old Password" required></input>

                    <label style = "color:white;">New Password</label>
                    <div id = "password_error" style = "color:;"></div>
                    <input class ="form-control" style = "width:75%;margin-bottom:5px" type ="password" maxlength="40" name ="new_password" placeholder = "New Password" required></input>

                    <input class ="form-control" style = "width:75%;margin-bottom:5px" type ="password" maxlength="40" name ="confirm_new_password" placeholder = "Confirm Password" required></input>
                    
                    <input id = "submit_feedback" class="btn btn-primary btn-md" style = "margin-left:150px;margin-bottom:5px" type="submit" value = "Submit" >
                    </input>
                </div>
            </div> -->
            <?php //echo form_close();?>
