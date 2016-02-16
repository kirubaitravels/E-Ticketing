            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green">Fleet</li>
                </ul>
                <!-- END BREADCRUMB -->                  
                    
                <!-- /.row -->
                <div class="row">
                    <div class = "col-md-4" style ="background-color:#E3E4E4;border-radius:3px;margin-left:30px;height:30em">
                    <div id = "result" style = "color:green"></div>
                        <!-- Complete registration form -->
                        <div class="input-group input-group-lg">
                            <?php echo validation_errors();?>

                            <?php echo form_open_multipart('busadmin/newFleet','id="busRegistration"','class="form collapse"');?>
                                <div class ="form-group">
                                    <div id = "success_message" style = "background-color:;height:3%;margin-left:2px;margin-bottom:1px"></div>
                                    <div class = "signup_area">
                                        <br> 
                                        <div class="form-group">
                                            <div id = "reg_no_message" style = "background-color:;height:3%;margin-left:2px;margin-bottom:1px"></div>
                                            <label for="exampleInputEmail1">Bus Registration Number</label>
                                            <input type="text" class="form-control" name="reg_no" placeholder="Bus Registration Number" required/>
                                        </div> 
                                        <br><br>


                                        <div class="form-group">
                                            <div id = "model_message" style = "background-color:;height:3%;margin-left:2px;margin-bottom:1px"></div>
                                            <label for="exampleInputEmail1">Model</label>
                                            <input type="text" class="form-control" name="model" placeholder="Model" required/>
                                        </div> 
                                        <br><br>

                                        <div class="form-group">
                                            <div id = "capacity_message" style = "background-color:;height:3%;margin-left:2px;margin-bottom:1px"></div>
                                            <label for="exampleInputEmail1">Capacity</label>
                                            <select name ="capacity" required>
                                                <option value = "">----Select----</option>
                                                <option value = "40">40</option>
                                                <option value = "40">44</option>
                                                <option value = "48">48</option>
                                                <option value = "52">52</option>
                                            <!-- <input type="date" class="form-control" name="capacity" placeholder="Capacity" required/> -->
                                            </select>
                                        </div>

                                        <input class = "btn btn-primary btn-md" type = "file" name="photo1" placeholder="" title = "Update your photo"/><br>
 
                                        <?php echo validation_errors();?>
                                        <input class="btn btn-info btn-lg" style = "float:right;background-color:green" id = "add_bus" type="submit" value = "Submit">
                                          <!--<span class="glyphicon glyphicon-search" aria-hidden="true"></span>-->
                                        </input>
                                    <?php echo form_close();?>
                                    </div>
                                </div>
                                
                        </div>                        
                    </div>






