
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green">Stats</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap"style ="background-color:#E3E4E4;border-radius:3px;margin-left:10px;">                 
                    
                    <div class="row">

                        <div class="col-md-4">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Routes</h3>
                                        <span>Schedules vs Bookings</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body panel-body-table">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="40%">Route Name</th>
                                                    <th width="30%">% Schedules</th>
                                                    <th width="30%">% Bookings</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                                $result = $this->busadmindata->get_routes();

                                                foreach ($result as $myresult)
                                                {
                                                    $bus_company = $this->session->userdata('bus_company_id');

                                                    $origin_code=$myresult->origin;
                                                    $origin_station=$this->main_model->get_station($origin_code);

                                                    $destination_code=$myresult->destination;
                                                    $destination_station=$this->main_model->get_station($destination_code);

                                                    $stats = $this->busadmindata->get_company_stats($bus_company);

                                                    $hold = explode(",", $stats);
                                                    $schedule_data = $hold[0];
                                                    $booking_data = $hold[1];

                                                    echo "<tr>";
                                                    echo "<a><td style = 'color:green'><strong>".$origin_station. " - ".$destination_station."</strong></td></a>";
                                                    //echo "<td><span class='label label-danger'>Developing</span></td>";
                                                    echo "<td>
                                                        <div class='progress progress-small progress-striped active'>
                                                            <div class='progress-bar progress-bar-danger' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:".$schedule_data."%;'>".$schedule_data."%</div>
                                                        </div>
                                                    </td>";

                                                    echo "<td>
                                                        <div class='progress progress-small progress-striped active'>
                                                            <div class='progress-bar progress-bar-primary' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:".$booking_data."%;'>".$booking_data."%</div>
                                                        </div>
                                                    </td>";

                                                    echo "</tr>";
                                                }
                                            ?>
                                            <!-- <tr><td><div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><?php //echo $schedule_data;?></div></td></tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END ROUTES BLOCK -->
                            
                        </div>

                        <div class="col-md-4">
                            
                            <!-- START VISITORS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Routes</h3>
                                        <span>Mapped</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                    <div id="dashboard-map-seles" style="width: 100%; height: 200px"></div>
                                </div>
                            </div>
                            <!-- END VISITORS BLOCK -->
                            
                        </div>

                        <div class="col-md-4">
                            
                            <!-- START VISITORS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Users</h3>
                                        <span>User Bookings (last month)</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-donut-1" style="height: 200px;"></div>
                                </div>
                            </div>
                            <!-- END VISITORS BLOCK -->
                            
                        </div>
                    </div>
                    <!-- End Row -->
                    
                    <div class="row">
                        <div class="col-md-4">
                            
                            <!-- START SALES & EVENTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Sales & Event</h3>
                                        <span>Event "Purchase Button"</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-line-1" style="height: 200px;"></div>
                                </div>
                            </div>
                            <!-- END SALES & EVENTS BLOCK -->
                            
                        </div>
                        <div class="col-md-4">
                            
                            <!-- START USERS ACTIVITY BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Bus Activity</h3>
                                        <span>Individual bus stats</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>                                    
                                </div>                                
                                <div class="panel-body padding-0">
                                    <!-- <div class="chart-holder" id="dashboard-bar-1" style="height: 200px;"></div> -->
                                    <!-- <div class="panel-body" style = "width:95%">
                                        <table class="table datatable">
                                            <thead>                            
                                                <th style = "font-weight:bold">Bus</th>
                                                <th style = "font-weight:bold">No of Schedules</th>
                                                <th style = "font-weight:bold">%</th>                                                
                                            </thead>
                                            <tbody>
                                                <?php
                                                    // $count=0;
                                                    // echo "<tr>";

                                                    //     echo "<td>";
                                                    //     $count++;
                                                    //     echo $count;
                                                    //     echo "<br>";
                                                    //     echo "</td>";

                                                    // echo "</tr>";
                                                ?>
                                            </tbody>
                                            </table>
                                        </div> -->
                                </div>                                    
                            </div>
                            <!-- END USERS ACTIVITY BLOCK -->
                            
                        </div>

                        <div class="col-md-4">
                            
                            <!-- START USERS ACTIVITY BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Bus Activity</h3>
                                        <span>Individual bus stats</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>                                    
                                </div>                                
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-bar-1" style="height: 200px;"></div>
                                </div>                                    
                            </div>
                            <!-- END USERS ACTIVITY BLOCK -->
                            
                        </div>

                    </div>
                    
                    <!-- START DASHBOARD CHART -->
                    <div class="block-full-width">
                        <div id="dashboard-chart" style="height: 250px; width: 100%; float: left;"></div>
                        <div class="chart-legend">
                            <div id="dashboard-legend"></div>
                        </div>                                                
                    </div>                    
                    <!-- END DASHBOARD CHART -->
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->