          <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green">Tickets</li>

                </ul>
                <!-- END BREADCRUMB -->                  
                
                <!-- /.row -->
                <div class="row"style ="background-color:#E3E4E4;border-radius:3px;margin-left:5px;height:46em">
                    <div class = "col-md-12">
                        <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Tickets</h3>
                                    <?php 
                                        echo validation_errors();
                                        echo form_open('busadmin/check_in_passenger','id="check_in"','class="form collapse"');
                                    ?>
                                    <button style = "margin-left:860px;margin-top:6px;background-color:" class = 'btn btn-primary btn-sm' title = "Check in passenger" type="submit">Check In</button>
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
                                            <th style = "font-weight:bold">Serial No</th>
                                            <th style = "font-weight:bold">Status</th>
                                            <th style = "font-weight:bold">Booking</th>
                                            <th style = "font-weight:bold">Passenger ID</th>
                                            <th style = "font-weight:bold">Date Printed</th>
                                            <th style = "font-weight:bold">Check In</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $count=0;
                                                if($company_tickets!="")
                                                {
                                                    foreach ($company_tickets as $mytickets) 
                                                    {
                                                        $the_booking = $mytickets->booking;
                                                        $passenger_id = $this->busadmindata->get_passenger_id($the_booking);
                                                        echo "<tr>";

                                                            echo "<td>";
                                                            $count++;
                                                            echo $count;
                                                            echo "<br><br>";
                                                            echo "</td>";

                                                            echo "<td>";
                                                            echo "<span style = 'font-weight:bold;color:blue;'>";
                                                            echo $mytickets->serial_no;
                                                            echo "<br><br>";
                                                            echo "</span>";
                                                            echo "</td>";

                                                            echo "<td>";
                                                            echo $mytickets->status;
                                                            echo "<br><br>";
                                                            echo "</td>";

                                                            echo "<td>";
                                                            echo "<a href ='#' style = 'color:blue'>";
                                                            echo $mytickets->booking;
                                                            echo "</a>";
                                                            echo "<br><br>";
                                                            echo "</td>";

                                                            echo "<td>";
                                                            echo "<a href ='#' style = 'color:blue'>";
                                                            echo $passenger_id;
                                                            echo "</a>";
                                                            echo "<br><br>";
                                                            echo "</td>";

                                                            echo "<td>";
                                                            echo "<span style = 'color:green'>";
                                                            echo $mytickets->date_printed;
                                                            echo "<span>";
                                                            echo "<br><br>";
                                                            echo "</td>";

                                                            echo "<td>";
                                                                if($mytickets->check_in_status == "NO")
                                                                {
                                                                    $SN = ($mytickets->serial_no);
                                                                    echo "<input style = 'margin-top:-2px' type = 'checkbox' name ='check_in' value = '".$SN."' title = 'Tick to check in passenger'>";
                                                                    echo "<br><br>";
                                                                }

                                                                else
                                                                {
                                                                    echo "<a class='glyphicon glyphicon-ok-sign' title ='Passenger already checked in'></a>";
                                                                    echo "<br><br>";
                                                                }
                                                            echo "</td>";

                                                        echo "</tr>";
                                                    }
                                                }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php echo form_close();?>
                            <!-- END DEFAULT DATATABLE -->

                    </div>

                   
                </div>