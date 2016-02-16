                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green">Renew Subscription</li>
                </ul>
                <!-- END BREADCRUMB -->                  
                    
                <!-- /.row -->
                <div class="row">
                    <div class = "col-md-4" style ="background-color:#E3E4E4;border-radius:3px;margin-left:30px;padding-top:20px;height:30em" id = "googleMap">
                        <span style = "padding-top:5px;color:green">Renew Your Subscription </span>                           
                            <!-- <button type = "submit" class = "btn btn-info" style = "color:white;padding:5px 5px 5px 5px;margin-top:5px" title="Fast and free sign up!" id="btnNewUser" data-toggle="collapse" data-target="#formRegister">Renew Subscription</button> -->
                                <?php echo validation_errors();?>
                                <?php echo form_open('busadmin/subscription_renew');?>
                                <!-- Renew Subscription form -->
                                <div class="input-group input-group-lg">
                                <div id="formRegister">
                                    <div class ="form-group">
                                        <div class = "signup_area">
                                            <br> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Subscription Package</label>
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

                    <div class = "col-md-5" style ="background-color:#E3E4E4;border-radius:3px;margin-left:30px;padding-top:20px;height:30em" id = "googleMap">
                        <span class = "fa fa-desktop" style = "padding-top:5px;color:blue;"> More Details </span>                           
                            <!-- <button type = "submit" class = "btn btn-info" style = "color:white;padding:5px 5px 5px 5px;margin-top:5px" title="Fast and free sign up!" id="btnNewUser" data-toggle="collapse" data-target="#formRegister">Renew Subscription</button> -->
                                <?php echo validation_errors();?>
                                <?php echo form_open('busadmin/subscription_renew');?>
                                <!-- Renew Subscription form -->
                                <div class="input-group input-group-lg">
                                <div id="formRegister">
                                    <div class ="form-group">
                                        <div class = "signup_area">
                                            <br>
                                            <button style = "width:100%;margin-bottom:5px" type="button" class="btn btn-default" data-container="body" data-toggle="popover" 
                                            data-placement="right" data-content="One year subscription package is worth Kshs. 1000">
                                              One Year Package
                                            </button>
                                            <br>
                                            <button style = "width:100%;margin-bottom:5px" type="button" class="btn btn-info" data-container="body" data-toggle="popover" 
                                            data-placement="right" data-content="Two year subscription package is worth Kshs. 2000">
                                              Two Year Package
                                            </button>
                                            <br>
                                            <button style = "width:100%;margin-bottom:5px" type="button" class="btn btn-primary" data-container="body" data-toggle="popover" 
                                            data-placement="right" data-content="Three year subscription package is worth Kshs. 3000">
                                              Three Year Package
                                            </button>
                                            <br>
                                            <button style = "width:100%;margin-bottom:5px" type="button" class="btn btn-warning" data-container="body" data-toggle="popover" 
                                            data-placement="right" data-content="Four year subscription package is worth Kshs. 4000">
                                              Four Year Package
                                            </button>
                                            <br>
                                            <button style = "width:100%;margin-bottom:5px" type="button" class="btn btn-success" data-container="body" data-toggle="popover" 
                                            data-placement="right" data-content="Five year subscription package is worth Kshs. 5000">
                                              Five Year Package
                                            </button>
                                                                                        
                                        </div>
                                    </div>
                                    <?php echo form_close();?>
                                    </div>
                                        
                                </div>
                        
                    </div>                  
                </div>
                <!-- /.row -->






