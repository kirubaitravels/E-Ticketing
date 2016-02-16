                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green" >Complete Registration</li>
                </ul>
                <!-- END BREADCRUMB -->                  
                    
                <!-- /.row -->
                <div class="row" >
                    <div class = "col-md-4"style ="background-color:#E3E4E4;border-radius:3px;margin-left:30px;height:30em">
                        <!-- Complete registration form -->
                        <div class="input-group input-group-lg">
                            <?php echo validation_errors();?>

                            <?php echo form_open('signup/completeUSerRegistration', 'id="completeRegistration"','class="form collapse"');?>
                                <div class ="form-group">
                                    <div class = "signup_area">
                                        <br> 
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ID/Passport Number   </label>
                                            <input class ="form-control" type ="text" maxlength="40" name ="id_no" placeholder = "ID/Passport Number" required></input>
                                        </div> 
                                        <br><br>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Full Names </label>
                                            <input class ="form-control" type ="text" maxlength="40" name ="name" placeholder = "Official Names" required></input>
                                        </div> 
                                        <br><br>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Gender </label>
                                            <select class ="form-control" type ="text" maxlength="40" name ="gender" required>
                                                <option value = "MALE">MALE</option>
                                                <option value = "FEMALE">FEMALE</option>
                                            </select>
                    
                                        </div> 
                                        <br><br>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mobile Number  </label>
                                            <input class ="form-control" type ="text" maxlength="40" name ="mobile_no" placeholder = "Mobile Number" required></input>                                    </div> 
                                        </div>
                                        <br><br><br>

                                        <?php echo validation_errors();?>
                                        <button class="btn btn-info btn-md" style = "float:right;background-color:green" type="submit" >Complete
                                          <!--<span class="glyphicon glyphicon-search" aria-hidden="true"></span>-->
                                        </button>
                                    </div>
                                </div>
                            <?php echo form_close();?>
                            <!--End of form-->
                        </div>
                   
                </div>
                <!-- /.row -->
                <br><br>
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    

                    <!-- MESSAGE BOX-->
                    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
                        <div class="mb-container">
                            <div class="mb-middle">
                                <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                                <div class="mb-content">
                                    <p>Are you sure you want to log out?</p>                    
                                    <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                                </div>
                                <div class="mb-footer">
                                    <div class="pull-right">
                                        <a href="../" class="btn btn-success btn-lg">Yes</a>
                                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MESSAGE BOX-->





