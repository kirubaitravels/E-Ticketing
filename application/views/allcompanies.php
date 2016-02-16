            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green">All Bus Companies</li>
                </ul>
                <!-- END BREADCRUMB -->                  
                    
                <!-- /.row -->
                <div class="row"style ="background-color:#E3E4E4;border-radius:3px;margin-left:5px;height:50em">
                    <div class = "col-md-12">
                        <!-- START DEFAULT DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <h3 class="panel-title">Bus Companies</h3>
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
                                        <th style = "font-weight:bold">Reg NO</th>
                                        <th style = "font-weight:bold">KRA PIN</th>
                                        <th style = "font-weight:bold">Company Name</th>
                                        <th style = "font-weight:bold">Physical Address</th>
                                        <th style = "font-weight:bold">Postal Address</th>
                                        <th style = "font-weight:bold">Telephone</th>
                                        <th style = "font-weight:bold">Subscription Status</th>
                                        <th style = "font-weight:bold">Subscription Date</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                            $count=0;
                                            foreach ($the_companies as $mycompanies) 
                                            {


                                                echo "<tr>";

                                                    echo "<td>";
                                                    $count++;
                                                    echo $count;
                                                    echo "<br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $mycompanies->reg_no;
                                                    echo "<br><br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $mycompanies->kra_pin;
                                                    echo "<br><br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $mycompanies->company_name;
                                                    echo "<br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $mycompanies->physical_address;
                                                    echo "<br><br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $mycompanies->postal_address;
                                                    echo "<br><br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $mycompanies->telephone;
                                                    echo "<br><br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $mycompanies->subscription_status;
                                                    echo "<br><br><br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $mycompanies->subscription_date;
                                                    echo "<br><br><br>";
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