            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green">Edit Profile</li>
                </ul>
                <!-- END BREADCRUMB -->                  
                    
                <!-- /.row -->
                <div class="row">
                    <div class = "col-md-4" style ="background-color:#E3E4E4;border-radius:3px;margin-left:30px;min-height:33em">
                    <div id = "result" style = "color:green"></div>
                        <!-- Complete registration form -->
                        <div class="input-group input-group-lg">
                            <?php 
                                echo validation_errors();
                                echo form_open_multipart('home/update_photo','id="company_profile"','class="form collapse"');
                            ?>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><a href=""><?php echo $this->session->userdata('name');?></a></label>
                                    <div style = "">
                                        <div class="profile-image">
                                            <a href = '#' data-toggle='modal' data-target='#ProfileImages'>
                                                <?php
                                                    $bus_company = $this->session->userdata('bus_company_id');
                                                    $user_id = $this->session->userdata('user_id');

                                                    if(($this->session->userdata('account_type'))=="BUS COMPANY")
                                                    {
                                                        $image = $this->busadmindata->profile_image($bus_company); 
                                                    }

                                                    else if(($this->session->userdata('account_type'))=="PREMIUM USER")
                                                    {
                                                        $image = $this->main_model->profile_image($user_id); 
                                                    }
                                                    else if(($this->session->userdata('account_type'))=="ADMIN")
                                                    {
                                                        $image = $this->main_model->profile_image($user_id); 
                                                    }

                                                    if((($this->session->userdata('account_type'))=="BUS COMPANY")&&(($this->session->userdata('bus_company_id'))!=""))
                                                    {
                                                        echo "<img style = 'width:80%' src = '".base_url()."companyPics/".$image."'"."alt ='John Doe'/>";
                                                    }

                                                    else if(($this->session->userdata('account_type'))=="ADMIN")
                                                    {
                                                        echo "<img style = 'width:80%' src = '".base_url()."userImages/".$image."'"."alt ='John Doe'/>";
                                                    }
                                                    else if((($this->session->userdata('account_type'))=="PREMIUM USER")&&(($this->session->userdata('user_id'))!=""))
                                                    {
                                                        echo "<img style = 'width:80%' src = '".base_url()."userImages/".$image."'"."alt ='John Doe'/>";
                                                    }

                                                    else 
                                                    {
                                                        echo "<img src = '".base_url()."userImages/default.jpg'  alt ='John Doe'/>";
                                                    }
                                                ?>
                                            </a>
                                        </div>
                                        <br>
                                        <input class = "btn btn-primary btn-sm" type = "file"name="profile_image" placeholder="" title = "Update your photo" required/><br>
                                        <button class="btn btn-info btn-md" style = "float:;background-color:;margin-top:-90px;margin-left:220px" type="submit" >Upload
                                        </button>
                                        <?php echo form_close();?>
                                    </div>

                                </div>
                                <?php
                                    if(($this->session->userdata('account_type'))=="BUS COMPANY")
                                    {   

                                        echo "<p style = 'color:green'>Company Registration Number</p>".
                                        "<div style ='background-color:white;height:30px;padding-left:5px;border-radius:5px'>".
                                        $this->session->userdata('bus_company_id')."</div>";

                                        echo "<p style = 'color:green;margin-top:5px'>KRA PIN</p>".
                                        "<div style ='background-color:white;height:30px;padding-left:5px;border-radius:5px'>".
                                        $this->session->userdata('kra_pin')."</div>";                          
                                    }
                                ?>                             
                        </div>

                        
                    </div>

                    <div class = "col-md-4" style ="background-color:#E3E4E4;border-radius:3px;margin-left:30px;padding-top:20px;height:33em" id = "googleMap">
                        <div class ="form-group">
                        <?php
                            if(($this->session->userdata('account_type'))=="BUS COMPANY")
                            {
                                echo form_open_multipart('busadmin/update_company_profile','id="company_profile"','class="form collapse"');
                            }

                            else if (($this->session->userdata('account_type'))=="PREMIUM USER")
                            {
                                echo form_open_multipart('user/update_user_profile','id="user_profile"','class="form collapse"');
                            }

                            else if (($this->session->userdata('account_type'))=="ADMIN")
                            {
                                echo form_open_multipart('admin/update_admin_profile','id="user_profile"','class="form collapse"');
                            }

                            if(($this->session->userdata('account_type'))=="BUS COMPANY")
                            {
                                echo "<div class = 'signup_area'>

                                        <div class='form-group'>
                                            <label for='exampleInputEmail1'>Name</label>
                                            <input type='text' class='form-control' name='company_name' placeholder='".$this->session->userdata('name')."' required/>
                                        </div>

                                        <div class='form-group'>
                                            <label for='exampleInputEmail1'>E-Mail Address</label>
                                            <input type='text' class='form-control' name='email' placeholder='".$this->session->userdata('email')."' required/>
                                        </div>

                                        <label for='exampleInputEmail1'>Telephone</label>
                                        <div class='input-group'>
                                            <span class='input-group-addon' style = 'height:0.5em'>+254</span>
                                            <input type='text' class='form-control' name='telephone' placeholder='".$this->session->userdata('telephone')."' required/>
                                        </div><br>

                                        <div class='form-group'>
                                            <label for='exampleInputEmail1'>Physical Address</label>
                                            <input type='text' class='form-control' name='physical_address' placeholder='".$this->session->userdata('physical_address')."' required/>
                                        </div>

                                        <div class='form-group'>
                                            <label for='exampleInputEmail1'>Postal Address</label>
                                            <input type='text' class='form-control' name='postal_address' placeholder='".$this->session->userdata('postal_address')."' required/>
                                        </div>

                                    </div>
                                    ";
                            }

                            else if((($this->session->userdata('account_type'))=="PREMIUM USER")||(($this->session->userdata('account_type')=="ADMIN")))
                            {
                                echo "<p style = 'color:green;font-weight:bold;margin-top:5px'>ID NO</p>".
                                        "<div style ='background-color:white;height:30px;padding-left:10px;padding-top:5px;border-radius:5px'>".
                                        $this->session->userdata('user_id')."</div><br>";

                                echo "<div class = 'signup_area'>
                                        <div class='form-group'>
                                            <label for='exampleInputEmail1'>Name</label>
                                            <input type='text' class='form-control' name='name' placeholder='".$this->session->userdata('name')."' required/>
                                        </div> 

                                        <label for='exampleInputEmail1'>Mobile NO</label>
                                        <div class='input-group'>
                                            <span class='input-group-addon' style = 'height:0.5em'>+254</span>
                                            <input type='text' class='form-control' name='phone' placeholder='".$this->session->userdata('mobile_no')."' required/>
                                        </div><br>

                                        <div class='form-group'>
                                            <label for='exampleInputEmail1'>E-Mail Address</label>
                                            <input type='text' class='form-control' name='email' placeholder='".$this->session->userdata('email')."' required/>
                                        </div>

                                    </div>
                                    ";

                            }
                        ?>

                        </div>

                        <?php //echo validation_errors();?>
                        <br>
                        <input class="btn btn-primary btn-md" style = "float:right;background-color:;" type="submit" value = "Update" >
                        </input>
                    </div>
                    <?php echo form_close();?>
                    <!-- End of form -->
                   <!-- <?php //if (($this->session->userdata('account_type'))=="BUS COMPANY"){//echo "id = 'company_update_profile'";} else{echo "id = 'user_update_profile'";}?> -->
                </div>
                <!-- /.row -->






