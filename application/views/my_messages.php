            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green">My Messages</li>
                </ul>
                <!-- END BREADCRUMB -->                  
                    
                <!-- /.row -->
                <div class="row">
                    <div class = "col-md-6" style ="background-color:#E3E4E4;border-radius:3px;margin-left:15px;min-height:40em">
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
                                    <div class="panel-body" style = "width:95%;">
                                        <table class="table datatable" style = "margin-left:-10px">
                                            <thead>                            
                                                <!-- <th style = "font-weight:bold">No</th> -->
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
                        </div>

                        <div class = "col-md-5" style ="background-color:#E3E4E4;border-radius:3px;margin-left:10px;min-height:40em">
                            <div id = "result" style = "color:green"></div>
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
                                    <table class="table datatable" style = "margin-left:-10px">
                                        <thead>                            
                                            <!-- <th style = "font-weight:bold">No</th> -->
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






