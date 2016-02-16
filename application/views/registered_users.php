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
                                <h3 class="panel-title">Registered System Users</h3>
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
                                                    if($myusers->id_no=="00000001")
                                                    {
                                                        echo "<tr style = 'color:green;font-weight:bold'>";
                                                    }

                                                    else
                                                    {
                                                        echo "<tr>";
                                                    }                                                    

                                                        echo "<td>";
                                                        $count++;
                                                        echo $count;
                                                        echo "<br><br>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        $user = $myusers->id_no;
                                                        echo $user;
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
                        <h4 class="modal-title" id="myModalLabel">User Details</h4>
                      </div>
                      <div class="modal-body">
                        <?php
                            $image = $this->main_model->profile_image($user);
                            $user_details = $this->admindata->get_user_details($user);
                            $the_details = explode(",", $user_details);

                            echo "<div class = 'row'>";
                            echo "<div class = 'col-md-5'>";

                            echo "<img style = 'width:100%' src = '".base_url()."userImages/".$image."'"."alt ='John Doe'/><br>";
                            echo  "<div class='form-group'>
                                        <label for='exampleInputEmail1'>Name</label>
                                        <input type='date' class='form-control' name='name' placeholder='".$the_details[1]."' required/>
                                    </div> ";

                            echo "</div>";

                            echo "<div class ='col-md-5'>";

                            echo "<div class = 'signup_area'>
                                    <div class='form-group'>
                                        <label for='exampleInputEmail1'>ID NO</label>
                                        <input type='date' class='form-control' name='name' placeholder='".$the_details[0]."' required/>
                                    </div> 

                                    <div class='form-group'>
                                        <label for='exampleInputEmail1'>Gender</label>
                                        <input type='date' class='form-control' name='name' placeholder='".$the_details[2]."' required/>
                                    </div> 

                                    <div class='form-group'>
                                        <label for='exampleInputEmail1'>Mobile NO</label>
                                        <input type='date' class='form-control' name='phone' placeholder='".$the_details[3]."' required/>
                                    </div>

                                    <div class='form-group'>
                                        <label for='exampleInputEmail1'>E-Mail Address</label>
                                        <input type='date' class='form-control' name='email' placeholder='".$the_details[4]."' required/>
                                    </div>

                                </div>
                                ";
                            echo "</div>";
                            echo "</div>";
                        ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>