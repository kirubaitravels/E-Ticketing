            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green">My Schedules</li>
                </ul>
                <!-- END BREADCRUMB -->                  
                    
                <!-- /.row -->
                <div class="row"style ="background-color:#E3E4E4;border-radius:3px;margin-left:3px;height:46em">
                    <div class = "col-md-12">
                        <!-- START DEFAULT DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <h3 class="panel-title">Schedule</h3>
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
                                        <th style = "font-weight:bold">Bus</th>
                                        <th style = "font-weight:bold">Origin</th>
                                        <th style = "font-weight:bold">Destination</th>
                                        <th style = "font-weight:bold">Departure Date</th>
                                        <th style = "font-weight:bold">Arrival Date</th>
                                        <th style = "font-weight:bold">Departure Time</th>
                                        <th style = "font-weight:bold">Arrival Time</th>
                                        <th style = "font-weight:bold">Standard Price</th>
                                        <th style = "font-weight:bold">VIP Price</th>
                                        <th style = "font-weight:bold">Booking Status</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                            $count=0;
                                            if($schedule!="")
                                            {
                                                foreach ($schedule as $myschedule) 
                                                {
                                                    echo "<tr>";

                                                        echo "<td>";
                                                        $count++;
                                                        echo $count;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo "<a href='../busadmin/busdetails/$myschedule->bus' style = 'color:green'>".$myschedule->bus."</a>";
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        $code=$myschedule->origin;
                                                        $station=$this->main_model->get_station($code);
                                                        echo $station;
                                                        echo "</td>";

                                                        echo "<td>";
                                                        $code=$myschedule->destination;
                                                        $station=$this->main_model->get_station($code);
                                                        echo $station;
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $myschedule->departure_date;
                                                        echo "<br><br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $myschedule->arrival_date;
                                                        echo "<br><br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $myschedule->departure_time;
                                                        echo "<br><br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo $myschedule->arrival_time;
                                                        echo "<br><br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo "Ksh.".$myschedule->price;
                                                        echo "<br><br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo "Ksh.".$myschedule->vip_price;
                                                        echo "<br><br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        $the_bus = $myschedule->bus;
                                                        $capacity = $this->busadmindata->bus_capacity($the_bus);
                                                        echo "<a href='#' data-toggle='modal' data-target='#BusStructure".$capacity."'><i style = 'margin-bottom:15px;' class='glyphicon glyphicon-ok-sign'></i> </a>";
                                                        echo "<br><br>";
                                                        echo "</td>";
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                 
                </div>