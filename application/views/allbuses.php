            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active" style = "color:green">All Fleet</li>
                </ul>
                <!-- END BREADCRUMB -->                  
                    
                <!-- /.row -->
                <div class="row"style ="background-color:#E3E4E4;border-radius:3px;margin-left:5px;height:47em">
                    <div class = "col-md-12">
                        <!-- START DEFAULT DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <h3 class="panel-title">Buses</h3>
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
                                        <th style = "font-weight:bold">Reg No</th>
                                        <th style = "font-weight:bold">Model</th>
                                        <th style = "font-weight:bold">Capacity</th>
                                        <th style = "font-weight:bold">Owned By</th>
                                        <th style = "font-weight:bold">More</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $count=0;
                                            foreach ($buses as $bus) 
                                            {
                                                echo "<tr>";

                                                    echo "<td>";
                                                    $count++;
                                                    echo $count;
                                                    echo "<br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo "<a href='../busadmin/busdetails/$bus->bus_reg_no' style = 'color:green'>".$bus->bus_reg_no."</a>";
                                                    echo "<br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $bus->model;
                                                    echo "<br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo $bus->capacity;
                                                    echo "<br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    $the_company = $bus->bus_company;
                                                    $name = $this->main_model->get_company($the_company);
                                                    echo $name;
                                                    echo "<br>";
                                                    echo "</td>";

                                                    echo "<td>";
                                                    echo "<a href='../busadmin/busdetails/$bus->bus_reg_no'><i style = 'margin-bottom:px;' class='glyphicon glyphicon-ok-sign'></i> </a>";
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