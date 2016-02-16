            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green">Bus Schedule</li>
                </ul>
                <!-- END BREADCRUMB -->                  
                    
                <!-- /.row -->
                <div class="row">
                    <div class = "col-md-4" style ="background-color:#E3E4E4;border-radius:3px;margin-left:30px;height:40em">
                    <div id = "status_message" style = "color:;"></div>
                        <!-- Complete registration form -->
                        <div class="input-group input-group-lg">
                            <?php echo validation_errors();?>

                            <?php echo form_open('busadmin/newBusSchedule','id="schedule"');?>
                                <div class ="form-group" style = "width:150%">
                                    <div class = "signup_area">
                                        <br> 
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bus  </label>
                                            <div id = "bus_error" style = "color:;"></div>
                                                <select  type="select" class="form-control" id="bus" name="bus">
                                                    <option value = "">-----Select Bus----</option>
                                                    <?php foreach ($buses as $bus) {?>
                                                        <option value="<?php echo $bus->bus_reg_no;?>"><?php echo $bus->bus_reg_no;?></option>
                                                    <?php }?>
                                                </select>
                                        </div> 
                                        <br><br>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Origin  </label>
                                            <div id = "origin_error" style = "color:;"></div>
                                                <select  type="select" class="form-control" id="origin" name="from">
                                                    <option value = "">-----Select Town To----</option>
                                                    <?php foreach ($cities as $city) {?>
                                                        <option value="<?php echo $city->station_code;?>"><?php echo $city->station_name;?></option>
                                                    <?php }?>
                                                </select>
                                            </div> 
                                        <br><br>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Destination </label>
                                            <div id = "destination_error" style = "color:;"></div>
                                                <select  type="select" class="form-control" id="destination" name="to">
                                                <option value = "">-----Select Town To----</option>
                                                <?php foreach ($cities as $city) {?>
                                                    <option value="<?php echo $city->station_code;?>"><?php echo $city->station_name;?></option>
                                                <?php }?>
                                                </select>                                        
                                        </div> 
                                        <br><br>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Departure Date  </label>
                                            <div id = "departure_date_error" style = "color:;"></div>
                                            <input type="text" class="form-control" id="dp" name="depart_date" placeholder="Departure Date" required/>

                                        </div> 
                                        <br><br> 

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Arrival Date  </label>
                                            <div id = "arrival_date_error" style = "color:;"></div>
                                            <input type="text" class="form-control" id="dpp" name="arrival_date" placeholder="Arrival Date" required/>

                                        </div>  

                                    </div>
                                </div>
                                
                        </div>

                        
                    </div>

                    <div class = "col-md-4" style ="background-color:#E3E4E4;border-radius:3px;margin-left:30px;padding-top:20px;height:40em" id = "googleMap">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Departure Time  </label>
                            <div id = "departure_time_error" style = "color:;"></div>
                            <input class="form-control" name="depart_time" placeholder="Departure Time" required/>

                        </div> 


                        <div class="form-group">
                            <label for="exampleInputEmail1">Arrival Time  </label>
                            <div id = "arrival_time_error" style = "color:;"></div>
                            <input class="form-control" name="arrival_time" placeholder="Departure Time" required/>

                        </div> 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price  </label>
                            <div id = "price_error" style = "color:;"></div>
                            <input class="form-control" name="price" placeholder="Price" required/>

                        </div> 

                        <div class="form-group">
                            <label for="exampleInputEmail1">Vip Price  </label>
                            <div id = "vip_price_error" style = "color:;"></div>
                            <input class="form-control" name="vip_price" placeholder="VIP Price" required/>

                        </div> 


                        <?php //echo validation_errors();?>
                        <input id = "submit_schedule" class="btn btn-info btn-md" style = "float:right;background-color:green" type="submit" value = "Submit">
                          <!--<span class="glyphicon glyphicon-search" aria-hidden="true"></span>-->
                        </input>
                    </div>
                    <?php echo form_close();?>
                    <!-- End of form -->
                   
                </div>
                <!-- /.row -->