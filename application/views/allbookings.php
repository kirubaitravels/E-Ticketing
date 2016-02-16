            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green">All Bookings</li>
                </ul>
                <!-- END BREADCRUMB -->                  
                    
                <!-- /.row -->
                <div class="row"style ="background-color:#E3E4E4;border-radius:3px;margin-left:5px;height:40em">
                    <div class = "col-md-12">
                        <!-- START DEFAULT DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <h3 class="panel-title">Bookings</h3>
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
                                        <th style = "font-weight:bold">ID</th>
                                        <th style = "font-weight:bold">Passengers</th>
                                        <th style = "font-weight:bold">Seats</th>
                                        <th style = "font-weight:bold">Scheduled Journey</th>
                                        <th style = "font-weight:bold">Cost</th>
                                        <th style = "font-weight:bold">Payment Status</th>
                                        <th style = "font-weight:bold">Passenger</th>
                                        <th style = "font-weight:bold">Ticket Status</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $count=0;
                                            foreach ($the_bookings as $mybookings) 
                                            {
                                                echo "<tr>";

                                                    echo "<td>";
                                                    $count++;
                                                    echo $count;
                                                    echo "<br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $mybookings->booking_id;
                                                    echo "<br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $mybookings->no_of_passengers;
                                                    echo "<br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $mybookings->sitting_position;
                                                    echo "<br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    $code=$mybookings->journey_details;
                                                    $journey=$this->main_model->get_scheduled_journey($code);
                                                    echo $journey;
                                                    echo "<br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo "Ksh.".$mybookings->cost;
                                                    echo "<br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $mybookings->payment_status;
                                                    echo "<br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    $id = $mybookings->passenger;
                                                    $passenger = $this->main_model->get_passenger($id);
                                                    echo $passenger;
                                                    echo "<br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $mybookings->ticket_status;
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
                   
                </div>