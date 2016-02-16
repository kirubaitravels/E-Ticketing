            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green">All Users</li>
                </ul>
                <!-- END BREADCRUMB -->                  
                    
                <!-- /.row -->
                <div class="row"style ="background-color:#E3E4E4;border-radius:3px;margin-left:5px;height:46em">
                    <div class = "col-md-10">
                        <!-- START DEFAULT DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <h3 class="panel-title">Non-Registered System Users</h3>
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
                                        <th style = "font-weight:bold">ID No</th>
                                        <th style = "font-weight:bold">Name</th>
                                        <th style = "font-weight:bold">Gender</th>
                                        <th style = "font-weight:bold">Mobile Number</th>
                                        <th style = "font-weight:bold">Email</th>
                                        <th style = "font-weight:bold">More</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                            $count=0;
                                            if($the_users!="")
                                            {
                                                foreach ($the_users as $myusers) 
                                                {
                                                    echo "<tr>";

                                                        echo "<td>";
                                                        $count++;
                                                        echo $count;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $myusers->id_no;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $myusers->name;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $myusers->gender;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $myusers->mobile_no;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        $id_number=$myusers->id_no;
                                                        $email=$this->admindata->get_email($id_number);
                                                        echo $email;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo "<a href='#UserDetails' data-toggle='modal' data-target='#UserDetails'><i style = 'margin-bottom:15px;' class='glyphicon glyphicon-ok-sign'></i> </a>";
                                                        echo "<br>";
                                                        echo "</td>";

                                                    echo "</tr>";
                                                }

                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                   
                </div>

                <!-- Modal -->
                <div class="modal fade" id="UserDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                      </div>
                      <div class="modal-body">
                        <?php echo $email;?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>