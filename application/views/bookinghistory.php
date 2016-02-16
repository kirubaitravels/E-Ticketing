            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green">Stations</li>
                </ul>
                <!-- END BREADCRUMB -->                  

                <!-- /.row -->
                <div class="row"style ="background-color:#E3E4E4;border-radius:3px;margin-left:5px;height:46em">
                    <!-- START DEFAULT DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <h3 class="panel-title">My Booking History</h3>
                                <!-- <button style = "margin-left:880px;margin-top:5px;background-color:" class = 'btn btn-primary btn-sm' title = "Check in passenger" type="submit">Check In</button> -->
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>                                
                            </div>
                            
                            <div class="panel-body" style = "width:96%">
                                <table class="table datatable">
                                    <thead>
                                        <th style = "font-weight:bold">No</th>
                                        <th style = "font-weight:bold">Date</th>
                                        <th style = "font-weight:bold">From</th>
                                        <th style = "font-weight:bold">To</th>
                                        <th style = "font-weight:bold">Cost</th>
                                        <th style = "font-weight:bold">Vehicle No</th>
                                        <th style = "font-weight:bold">No. of Passangers</th>
                                        <th style = "font-weight:bold">Sitting Position</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                            $count=0;
                                            foreach ($userbooking_history as $data) 
                                            {
                                                echo "<tr>";

                                                    echo "<td>";
                                                    $count++;
                                                    echo $count;
                                                    echo "<br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $data->departure_date;
                                                    echo "</a>";
                                                    echo "<br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    $code=$data ->origin;
                                                    $station=$this->main_model->get_station($code);
                                                    echo $station;
                                                    echo "<br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    $code=$data->destination;
                                                    $station=$this->main_model->get_station($code);
                                                    echo $station;
                                                    echo "</a>";
                                                    echo "<br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $data->cost;
                                                    echo "</a>";
                                                    echo "<br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $data->bus;
                                                    echo "</a>";
                                                    echo "<br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $data->no_of_passengers;
                                                    echo "</a>";
                                                    echo "<br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $data->sitting_position;
                                                    echo "</a>";
                                                    echo "<br><br>";
                                                    echo "</td>";

                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>