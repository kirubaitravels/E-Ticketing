            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green"><span class = "fa fa-envelope-o"></span> Messages</li>
                </ul>
                <!-- END BREADCRUMB -->                  
                    
                <!-- /.row -->
                <div class="row">
                    <div class = "col-md-5" style ="background-color:#E3E4E4;border-radius:3px;margin-left:30px;min-height:30em">
                    <div id = "result" style = "color:green"></div>
                        <!-- Complete registration form -->
                        <div class="input-group input-group-lg" style = "margin-top:10px">
                            <?php echo validation_errors();?>

                            <?php
                                if(($this->session->userdata('account_type'))=="BUS COMPANY")
                                {
                                    echo form_open_multipart('messaging/new_message','id="messages"','class="form collapse"');
                                }

                                else if (($this->session->userdata('account_type'))=="ADMIN")
                                {
                                    echo form_open_multipart('messaging/new_message','id="messages"','class="form collapse"');
                                }

                                else if (($this->session->userdata('account_type'))=="PREMIUM USER")
                                {
                                    echo form_open_multipart('messaging/new_message','id="messages"','class="form collapse"');
                                }
                                $message_id = $this->uri->segment(3);

                                $the_message = $this->messages->individual_message($message_id);
                                $data = explode("/", $the_message);
                                $data[0];
                                $sender_name = $this->messages->get_name($data[0]);

                                echo "<div class='input-group' style='width:30em;'>
                                        <span class='input-group-addon' style ='width:20%'>From</span>
                                        <div style ='background-color:white;height:1.85em;padding-left:5px;padding-top:3px;border-radius:2px;margin-top:1px;margin-left:2px'>".$sender_name."</div>
                                    </div>";

                                echo "<div class='input-group' style='width:30em;margin-right:5px'>
                                        <span class='input-group-addon' style ='width:20%'>Sent </span>
                                        <div style ='background-color:white;height:1.8em;padding-left:5px;padding-top:3px;border-radius:2px;margin-top:2px;margin-left:2px'>".$data[1]."</div>
                                    </div>";

                                echo "<div class='input-group' style='width:30em;margin-left:em'>
                                        <span class='input-group-addon' style ='width:20%'>Subject</span>
                                        <div style ='background-color:white;height:1.8em;padding-left:5px;padding-top:3px;border-radius:2px;margin-top:2px;margin-left:2px'>".$data[2]."</div>
                                    </div>";

                                echo "<div class='input-group' style='width:30em;margin-left:em'>                                        
                                        <div style ='background-color:white;height:10em;padding-left:5px;padding-top:3px;border-radius:2px;margin-top:2px;margin-left:2px'>".$data[3]."</div>
                                    </div>";
                                
                                echo "<div class='input-group' style='width:20em;margin-left:em;margin-top:5px'>
                                        <span class='input-group-addon fa fa-paperclip'></span>
                                    <a href='#' style = 'margin-left:5px'>".$data[4]."</a>
                                    </div>";                                
                            ?>


                                <!-- <button class="btn btn-primary btn-md" style = "margin-left:250px; margin-top:-120px;background-color:green" type="submit" >Send -->
                                  <!--<span class="glyphicon glyphicon-search" aria-hidden="true"></span>-->
                                <!-- </button> -->
                            </div>                        
                        </div>
                        <?php echo validation_errors();?>
                        <?php echo form_close();?>
                    <!-- End of form -->  


                    </div>
                    <!-- /.row -->

                    <!-- DELETE MESSAGE PROMPT -->
                    <div class="message-box animated fadeIn" data-sound="alert" id="mb-delete-message" style = "margin-left:230px;margin-top:80px;width:73%">
                        <div class="mb-container">
                            <div class="mb-middle">
                                <div class="mb-title"><span class="glyphicon glyphicon-trash"></span> DELETE <strong>MESSAGE</strong> ?</div>
                                <div class="mb-content">
                                    <p>Are you sure you want to DELETE this message?</p>                    
                                    <!-- <p>Press No if youwant to continue work. Press Yes to logout current user.</p> -->
                                </div>
                                <div class="mb-footer">
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-success btn-lg">Yes</a>
                                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END DELETE MESSAGE PROMPT -->






