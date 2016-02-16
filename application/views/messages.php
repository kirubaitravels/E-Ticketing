            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green">Messages</li>
                </ul>
                <!-- END BREADCRUMB -->                  
                    
                <!-- /.row -->
                <div class="row">
                    <div class = "col-md-4" style ="background-color:#E3E4E4;border-radius:3px;margin-left:30px;min-height:40em">
                    <div id = "result" style = "color:">New Message</div>
                    <div id = "message_message" style = "background-color:;height:3%;margin-left:2px;margin-bottom:3px"></div>
                        <!-- Complete registration form -->
                        <div class="input-group input-group-lg">
                            <?php echo validation_errors();?>

                            <?php
                                echo form_open_multipart('messaging/new_message','id="new_messages"');                                
                            ?>
                                <div class ="form-group">
                                    <div class = "signup_area">
                                        <br> 
                                        <div class="form-group">
                                            <!-- <label for="exampleInputEmail1">Send To</label> -->
                                            <select style = "margin-bottom:2px;margin-left:0px; width:93%;min-height:30px" name ="receiver">
                                                <option value ="">-----Send To----</option>
                                                <option value = "00000000">ALL</option>
                                                <!-- <option value = "00000001">ADMIN</option> -->

                                                <?php foreach ($bus_companies as $company) if(($company->reg_no)!=($this->session->userdata('bus_company_id'))){?>
                                                    <option value="<?php echo $company->reg_no;?>"><?php echo $company->company_name;?></option>
                                                <?php }?>

                                                <?php foreach ($the_users as $user) if(($user->id_no)!=($this->session->userdata('user_id'))&&(($user->user_status)=="REGISTERED")){?>
                                                    <option value="<?php echo $user->id_no;?>"><?php echo $user->name;?></option>
                                                <?php }?>
                                            </select>
                                            <span class = "fa fa-user"></span>
                                            <!-- <input type="text" class="form-control" name="receiver" placeholder="Bus Registration Number" required/> -->
                                        </div>
                                        <!-- <br><br> -->


                                        <div class="form-group">
                                            <!-- <label for="exampleInputEmail1">Heading</label> -->
                                            <input style = "margin-bottom:10px;margin-left:0px; width:100%;height:40px;border-radius:5px" type="text" class="form-control" name="title" placeholder="SUBJECT" required></input>
                                        </div> 
                                        <br><br>

                                        <div class="form-group">
                                            <!-- <label for="exampleInputEmail1">Body</label> -->
                                            <input style = "margin-bottom:10px;margin-left:0px;width:100%;height:120px;border-radius:5px" type="text" class="form-control" name="body" placeholder="MESSAGE" required></input>
                                        </div> 
                                        <br><br>
                                        <span class = "glyphicon glyphicon-paperclip" style = "margin-top:8px;"></span><input class = "btn btn-primary btn-sm" style = "margin-left:20px; margin-top:-30px" type = "file" name="attachment" placeholder="" title = "Upload a file to attach"/><br>

                                    </div>
                                </div>
                                <input id = "send_message" class="btn btn-primary btn-md" style = "margin-left:250px; margin-top:-120px;background-color:green" type="submit" value = "Send">
                                  <!--<span class="glyphicon glyphicon-search" aria-hidden="true"></span>-->
                                </input>
                            </div>                        
                        </div>
                        <?php //echo validation_errors();?>
                        <?php echo form_close();?>
                    <!-- End of form -->  

                        <div class = "col-md-7" style ="background-color:#E3E4E4;border-radius:3px;margin-left:10px;min-height:40em">
                            <div id = "result" style = "color:green"></div>
                                <!-- START DEFAULT DATATABLE -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">                                
                                        <h3 class="panel-title">Inbox</h3>
                                        <!-- <button style = "margin-left:880px;margin-top:5px;background-color:" class = 'btn btn-primary btn-sm' title = "Check in passenger" type="submit">Check In</button> -->
                                        <ul class="panel-controls">
                                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                        </ul>                                
                                    </div>
                                    <div class="panel-body" style = "width:95%">
                                        <table class="table datatable">
                                            <thead>                            
                                                <th style = "font-weight:bold">No</th>
                                                <th style = "font-weight:bold">Sender</th>
                                                <th style = "font-weight:bold">Title</th>
                                                <th style = "font-weight:bold">Message</th>
                                                <th style = "font-weight:bold">Date Received</th>
                                                <th style = "font-weight:bold">Attachment</th>
                                                <th style = "font-weight:bold">Delete</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $count=0;
                                                    foreach ($received_messages as $inbox) 
                                                    {
                                                        
                                                        if($inbox->status=="NEW")
                                                        {
                                                            echo "<tr style ='font-weight:bold;color:black'>";
                                                        }
                                                        else
                                                        {
                                                            echo "<tr>";
                                                        }

                                                        echo "<td>";
                                                        $count++;
                                                        echo $count;
                                                        echo "<br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        if(($inbox->sender)==00000000)
                                                        {
                                                            echo "ALL";
                                                        }
                                                        else if(($inbox->sender)==00000001)
                                                        {
                                                            echo "SYSTEM ADMIN";
                                                        }
                                                        else
                                                        {
                                                            $data = $inbox->sender;
                                                            $name = $this->messages->get_name($data);
                                                            echo $name;
                                                        }                                                         
                                                        echo "<br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo "<a style = 'color:blue' title = 'Click to read more' href='../messaging/view_messages/".$inbox->message_id."'>".$inbox->title."</a>";
                                                        echo "<br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo substr($inbox->body, 0,10)."<a style = 'color:blue' title = 'Click to read more' href='../messaging/view_messages/".$inbox->message_id."'>...</a>";
                                                        echo "<br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $inbox->date_posted;
                                                        echo "<br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo substr($inbox->attachment, 0,10);
                                                        echo "<br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo "<a href='#' class='mb-control' data-box='#mb-delete-message'><i style = 'margin-bottom:px;' class='glyphicon glyphicon-trash'></i> </a>";
                                                        echo "<br>";
                                                        echo "</td>";

                                                        echo "</tr>";

                                                            
                                                    }
                                                ?>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Sent Messages</h3>
                                    <!-- <button style = "margin-left:880px;margin-top:5px;background-color:" class = 'btn btn-primary btn-sm' title = "Check in passenger" type="submit">Check In</button> -->
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body" style = "width:95%">
                                    <table class="table datatable">
                                        <thead>                            
                                            <th style = "font-weight:bold">No</th>
                                            <th style = "font-weight:bold">Receiver</th>
                                            <th style = "font-weight:bold">Title</th>
                                            <th style = "font-weight:bold">Message</th>
                                            <th style = "font-weight:bold">Date Sent</th>
                                            <th style = "font-weight:bold">Attachment</th>
                                            <th style = "font-weight:bold">Delete</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $count=0;
                                                foreach ($sent_messages as $message) 
                                                {
                                                    echo "<tr>";

                                                        echo "<td>";
                                                        $count++;
                                                        echo $count;
                                                        echo "<br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        if(($message->receiver)==00000000)
                                                        {
                                                            echo "ALL";
                                                        }
                                                        else if(($message->receiver)==00000001)
                                                        {
                                                            echo "SYSTEM ADMIN";
                                                        }
                                                        else
                                                        {
                                                            $data = $message->receiver;
                                                            $name = $this->messages->get_name($data);
                                                            echo $name;
                                                        }
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo "<a style = 'color:blue' href='../messaging/view_messages/".$message->message_id."'>".$message->title."</a>";
                                                        echo "<br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo substr($message->body, 0,10)."<a style = 'color:blue' href='../messaging/view_messages/".$message->message_id."'>...</a>";
                                                        echo "<br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $message->date_posted;
                                                        echo "<br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo substr($message->attachment, 0,10);
                                                        echo "<br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo "<a href='#' class='mb-control' data-box='#mb-delete-message'><i style = 'margin-bottom:px;' class='glyphicon glyphicon-trash'></i> </a>";
                                                        echo "<br>";
                                                        echo "</td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>                           
                            </div>                 
                    </div>
                    <!-- /.row -->

                    <!-- DELETE MESSAGE PROMPT -->
                    <div class="message-box animated fadeIn" data-sound="alert" id="mb-delete-message" style = "margin-left:230px;margin-top:80px;width:80%">
                        <div class="mb-container">
                            <div class="mb-middle">
                                <div class="mb-title"><span class="glyphicon glyphicon-trash"></span><strong>CONFIRM ACTION</strong></div>
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






