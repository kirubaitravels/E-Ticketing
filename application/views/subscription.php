
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:red">Expired Subscription</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class ="row">
                        <div class = "col-md-8" style ="margin-left:50px;color:Red">
                            Your Subscription has expired. Please renew it
                            <button class = "btn btn-info" style = "color:white;padding:5px 5px 5px 5px;margin-top:2px" title="Fast and free sign up!" id="btnNewUser" data-toggle="collapse" data-target="#formRegister">Renew Subscription</button>

                                <?php echo validation_errors();?>
                                <?php echo form_open('busadmin/subscription_renew');?>
                                <!-- Renew Subscription form -->
                                <div class="input-group input-group-lg">
                                <div id="formRegister" class="form collapse">
                                    <div class ="form-group">
                                        <div class = "signup_area">
                                            <br> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" style = "color:blue">Subscription Package</label>
                                                <select  type="select" class="form-control" id="subscription_package" name="subscription_package">
                                                    <option value="">-----------------</option>
                                                    <option value="1000.00">One Year</option>
                                                    <option value="2000.00">Two Year</option>
                                                    <option value="3000.00">Three Year</option>
                                                    <option value="4000.00">Four Year</option>
                                                    <option value="5000.00">Five Year</option> 
                                                </select>
                                                <!-- <input type="date" class="form-control" name="reg_no" placeholder="Bus Registration Number" required/> -->
                                            </div> 
                                            <br><br>
                                            <button class="btn btn-default btn-md" style = "margin-left:200px;background-color:green;color:white" type="submit" >Renew
                                            </button>                                        
                                            <br><br>
                                        </div>
                                    </div>
                                    <?php echo form_close();?>
                                    </div>
                                        
                                </div>
                        </div>
                    </div>
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

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