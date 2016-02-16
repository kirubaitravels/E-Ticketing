            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green">Stations</li>
                </ul>
                <!-- END BREADCRUMB -->                  
                    
                <!-- /.row -->
                <div class="row"style ="background-color:#E3E4E4;border-radius:3px;margin-left:5px;min-height:46em;">
                    <div class = "col-md-12" style = "width:50%">
                        <!-- START DEFAULT DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <h3 class="panel-title">Stations</h3>
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
                                        <th style = "font-weight:bold;width:5%">No</th>
                                        <th style = "font-weight:bold;width:15%">Station Code</th>
                                        <th style = "font-weight:bold;width:20%">Station Name</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                            $count=0;
                                            foreach ($the_stations as $station) 
                                            {
                                                echo "<tr>";

                                                    echo "<td>";
                                                    $count++;
                                                    echo $count;
                                                    echo "<br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $station->station_code;
                                                    echo "<br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    $myStation = $station->station_name;
                                                    echo "<a href = '#' style = 'color:green' data-toggle='modal' data-id = '' data-target='#UserDetails' onclick='codeAddress($myStation)'>";
                                                    echo $station->station_name;
                                                    echo "</a>";
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


                    <div class = "col-md-4" style ="background-color:#E3E4E4;margin-left:50px;color:;padding-top:20px">
                            New station
                            <div id = "station_message" style = "background-color:;height:;margin-left:2px;margin-top:3px"></div>
                                <!-- User registration form -->
                                <div class="input-group input-group-lg">
                                <div id="formNewStation">
                                    <?php echo validation_errors();?>
                                    <?php echo form_open('admin/newstation','onSubmit="return false"');?>
                                        <div class ="form-group">
                                            <div class = "signup_area">
                                                <br>                                        
                                                <input style = "border-radius:5px" id ="loginfields" class ="form-control" type ="text" maxlength="40" name ="station_name" placeholder = "Name" required></input>
                                                <br><br>
        
                                                <input id = "add_station" class="btn btn-default btn-md" style = "margin-left:;background-color:green;color:white" type="submit" value = "Add" >
                                                  <!--<span class="glyphicon glyphicon-search" aria-hidden="true"></span>-->
                                                </input>
                                            </div>
                                        </div>
                                    <?php echo form_close();?>
                                    </div>
                                        
                                </div>
                        </div>
                  
                </div>
                <!-- /.row -->

                <!-- Modal -->
                <!-- Stations Google Map -->
                <div class="modal fade" id="UserDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php //echo $station->station_name;?></h4>
                      </div>
                      <div class="modal-body" style = "height:30em;width:100%">
                        
                        <!-- Google Map -->
                        <div class = "" id = "myMap" style ="height:100%;width:90%;">

                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                      </div>
                    </div>
                  </div>
                </div>