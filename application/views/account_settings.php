            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green"><span class ='fa fa-cogs' ></span> Account Settings</li>
                </ul>
                <!-- END BREADCRUMB -->                  

                <div class="row">
                    <div class = "col-md-4" style ="background-color:#E3E4E4;border-radius:3px;margin-left:30px;padding-top:20px;height:33em" id = "googleMap">
                          <!-- Change Password -->
                        <button class = "btn btn-info" style = "color:white;padding:5px 5px 5px 5px;margin-top:2px" title="Change your password" id="changePassword" data-toggle="collapse" data-target="#change_password">
                        <span class ="fa fa-key"> Change Password</span>
                        </button>

                        <?php
                            if(($this->session->userdata('account_type'))!="ADMIN")
                            {
                                echo "<a href='#' data-box='#mb-deactivate' class = 'mb-control btn btn-danger' style = 'color:white;padding:5px 5px 5px 5px;margin-top:2px' title='Deactivate your account'>
                                        <span class ='glyphicon glyphicon-remove'> Deactivate</span>
                                    </a>";
                            }
                        ?>
                        
                        <?php echo form_open_multipart('user/update_account_settings','id="company_profile"','class="form collapse"');?>

                        <div id="change_password" class ="form-group form collapse" style = "background-color:#00294F; width:80%;border-radius:5px;margin-top:5px">
                            <div class = "signup_area" style = "margin-left:10px">
                                <label style = "color:white;">Old Password</label>
                                <label style = "color:grey;margin-left:10px;font-weight:normal">Show Password
                                <input style = "margin-left:5px" type = "checkbox" name="show_text" onclick=""></label>

                                <div id = "old_password_error" style = "color:;"></div>
                                <input class ="form-control" style = "width:75%;margin-bottom:5px" type ="text" maxlength="40" name ="the_old_password" placeholder = "Old Password" required></input>

                                <label style = "color:white;">New Password</label>
                                <div id = "password_error" style = "color:;"></div>
                                <input class ="form-control" style = "width:75%;margin-bottom:5px" type ="password" maxlength="40" name ="new_password" placeholder = "New Password" required></input>

                                <input class ="form-control" style = "width:75%;margin-bottom:5px" type ="password" maxlength="40" name ="confirm_new_password" placeholder = "Confirm Password" required></input>
                                
                                <input id = "reset_password" class="btn btn-success btn-md" style = "margin-left:150px;margin-bottom:5px" type="submit" value = "Reset" >
                                </input>
                            </div>
                        </div>

                    </div>                  
                </div>
                <!-- /.row -->

                <!-- DELETE MESSAGE PROMPT -->
                <div class="message-box animated fadeIn" data-sound="alert" id="mb-deactivate" style = "margin-left:230px;margin-top:80px;width:80%">
                    <div class="mb-container">
                        <div class="mb-middle">
                            <div class="mb-title"><span class="glyphicon glyphicon-trash"></span> <strong>CONFIRM ACTION</strong></div>
                            <div class="mb-content">
                                <p>Are you sure you want to DEACTIVATE your account?</p>                    
                                <!-- <p>Press No if youwant to continue work. Press Yes to logout current user.</p> -->
                            </div>
                            <div class="mb-footer">
                                <div class="pull-right">
                                <?php
                                    if(($this->session->userdata('account_type'))=="BUS COMPANY")
                                    {
                                        echo "<a href='../busadmin/deactivate_account'' class='btn btn-success btn-lg'>Yes</a>";
                                    }

                                    else if(($this->session->userdata('account_type'))=="PREMIUM USER")
                                    {
                                        echo "<a href='../user/deactivate_account'' class='btn btn-success btn-lg'>Yes</a>";
                                    }
                                ?>
                                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END DELETE MESSAGE PROMPT -->







