            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green" >Complete Registration</li>
                </ul>
                <!-- END BREADCRUMB -->                  
                    
                <!-- /.row -->
                <div class="row">
                    <div class = "col-md-5" style ="background-color:#E3E4E4;border-radius:3px;margin-left:30px;height:30em">
                        <!-- Complete registration form -->
                        <div class="input-group input-group-lg">
                            <?php echo validation_errors();?>

                            <?php echo form_open('signup/completeCompanyRegistration', 'id="completeRegistration"','class="form collapse"');?>
                                <div class ="form-group">
                                    <div class = "signup_area">
                                        <br> 
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Company Registration Number   </label>
                                            <input class ="form-control" type ="text" maxlength="40" name ="reg_no" placeholder = "Company Registration Number" required></input>
                                        </div> 
                                        <br><br>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">KRA PIN NO  </label>
                                            <input class ="form-control" type ="text" maxlength="40" name ="kra_pin" placeholder = "PIN NO" rmargin-left:10px;equired></input>
                                        </div> 
                                        <br><br>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Company Name </label>
                                            <input class ="form-control" type ="text" maxlength="40" name ="company_name" placeholder = "Company Name" required></input>
                                        </div> 
                                        <br><br>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telephone   </label>
                                            <input class ="form-control" type ="text" maxlength="40" name ="telephone" placeholder = "Telephone No" required></input>
                                        </div> 
                                        <br><br>                                 

                                    </div>
                                </div>
                                
                        </div>

                        
                    </div>

                    <div class = "col-md-4"  style ="background-color:#E3E4E4;border-radius:3px;margin-left:30px;padding-top:20px;height:30em" id = "googleMap">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Physical Address  </label>
                            <textarea class ="form-control" type ="text" maxlength="40" name ="physical_address" placeholder = "Company's Location" required></textarea>                                    </div> 
                        <br>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Postal Address   </label>
                            <textarea class ="form-control" type ="text" maxlength="40" name ="postal_address" placeholder = "Address" required></textarea>
                        </div> 
                        <br>


                        <?php echo validation_errors();?>
                        <button class="btn btn-info btn-md" style = "float:right;background-color:green" type="submit" >Complete
                          <!--<span class="glyphicon glyphicon-search" aria-hidden="true"></span>-->
                        </button>
                    </div>
                    <?php echo form_close();?>
                    <!-- End of form -->
                   
                </div>
                <!-- /.row -->
                <br><br>
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">




