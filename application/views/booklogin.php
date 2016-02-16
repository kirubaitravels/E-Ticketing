		            <!-- START BREADCRUMB -->
		                <ul class="breadcrumb">
		                    <li><a href="#">Home</a></li>                    
		                    <li class="active" style = "color:green">Place a booking</li>
		                </ul>

							<div style="margin-left:30px;width:58.9%;min-height:50%;background-color:#E3E4E4;border-radius:5px">
					        	<div class="container">
									<div class="row">
							  		

						  				<!--Tab NAVIGATION-->

									  	<!--Tab Section-->
									  	<div class="tab-content hold_links">
					                    <!--Start of Search Form-->
					     
						  					<div class="tab-pane active content_tab" id="tab1">
							  					<?php echo form_open('searchBus/search_result_login','onSubmit="return false"');?>

													<div class="control-group from">
							                           	<div class="form-group input-group">
							                                <select  type="select" class="form-control" id="journey_input" name="from" onchange="calcRoute();">
							                                <option>Select Town To</option>
							                                <?php foreach ($cities as $city) {?>
							                                	<option value="<?php echo $city->station_name;?>"><?php echo $city->station_name;?></option>
							                                <?php }?>
							                                </select>
							                                
							                            </div>
											        </div>

													<div class="control-group to">
							                           <div class="form-group input-group">
							                                
							                               <select type="select" class="form-control" id="journey_input_to" name="to" onchange="calcRoute();">
							                               	<option>Select Town From</option>
							                                <?php foreach ($cities as $city) {?>
							                                	<option value="<?php echo $city->station_name;?>"><?php echo $city->station_name;?></option>
							                                <?php }?>
							                               </select>

							                            </div>
								                 	</div>
								                 	
								                 	<div class="control-group departing_date">
											            <div class="form-group input-group hold_input_gly">
											                               
											                <div class="form-group">
																			    		
																<input type="date" class="form-control" id="dp" name="depart_date" placeholder="Return Date"/>
															</div> 
											                               
											                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></input>
											            </div>
											        </div>											             

													<input class = "btn btn-md-default pull-right" type="submit" value="Search" id="submit_login" style="margin-top:120px;margin-right:210px;background-color:green;color:white">
												
													<?php echo form_close();?>
												<!--End of Search Form-->

															                           
									  			</div>

									  		</div>

									  	</div>

									</div>

					           

						</div>

						</div>
						

                