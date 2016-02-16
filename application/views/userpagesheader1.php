<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>KRTS</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="<?php echo base_url()?>/template/image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url()?>/template/css/theme-default.css"/>
        <link rel="stylesheet" href="<?php echo base_url();?>Date/pagestyle.css" media="screen, projection" />
        <link rel="stylesheet" href="<?php echo base_url();?>Date/slimpicker.css" media="screen, projection" />
        <link href="<?php echo base_url();?>Bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url();?>Bootstrap/dist/css/jquery-ui.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>e-ticketingcss/e-ticketing.css" rel="stylesheet">
        
        <!-- EOF CSS INCLUDE -->

        <!--Google Maps API
        Markers
       -->
        <!--Added on 20/01/2015-->

        <script src="http://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <script>
        var geocoder;
        var map;
        //Initial map status. Loading with the coordinates of Nairobi
          function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-1.292056,36.821946);
            var mapOptions = {
              zoom: 8,
              center: latlng

            }
           // map = new google.maps.Map(document.getElementById("myGoogleMap"), mapOptions);
           // directionsDisplay.setMap(map);
         map = new google.maps.Map(document.getElementById("myMap"), mapOptions);
          }

        // Route Markers
        // var address = 'NAIROBI';

        function codeAddress(address) 
        {    
                alert("address");      
            geocoder.geocode( {address}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
              } else {
                alert("Geocode was not successful for the following reason: " + status);
              }
            });
          }

        // var address1 = 'MOMBASA';
        //   function codeAddress1(address1) {          
        //     geocoder.geocode( {address}, function(results, status) {
        //       if (status == google.maps.GeocoderStatus.OK) {
        //         map.setCenter(results[0].geometry.location);
        //         var marker = new google.maps.Marker({
        //             map: map,
        //             position: results[0].geometry.location
        //         });
        //       } else {
        //         alert("Geocode was not successful for the following reason: " + status);
        //       }
        //     });
        google.maps.event.addDomListener(window, 'load', initialize);

    </script> 

    </head>

    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation" style = "">
                    <li><!--class="xn-logo"-->
                        <a href="../../">KRTS</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <?php
                            $bus_company = $this->session->userdata('bus_company_id');
                            $user_id = $this->session->userdata('user_id');

                            if(($this->session->userdata('account_type'))=="BUS COMPANY")
                            {
                                $image = $this->busadmindata->profile_image($bus_company); 
                            }

                            else if(($this->session->userdata('account_type'))=="PREMIUM USER")
                            {
                                $image = $this->main_model->profile_image($user_id); 
                            }
                            else if(($this->session->userdata('account_type'))=="ADMIN")
                            {
                                $image = $this->main_model->profile_image($user_id); 
                            }


                        ?>
                        <a href = '#' data-toggle='modal' data-target='#ProfileImages' class="profile-mini">
                            <?php
                                if((($this->session->userdata('account_type'))=="BUS COMPANY")&&(($this->session->userdata('bus_company_id'))!=""))
                                {
                                    echo "<img src = '".base_url()."companyPics/".$image."'"."alt ='John Doe'/>";
                                }

                                else if((($this->session->userdata('account_type'))=="PREMIUM USER")&&(($this->session->userdata('user_id'))!=""))
                                {
                                    echo "<img src = '".base_url()."userImages/".$image."'"."alt ='John Doe'/>";
                                }

                                else if(($this->session->userdata('account_type'))=="ADMIN")
                                {
                                    echo "<img src = '".base_url()."userImages/".$image."'"."alt ='John Doe'/>";
                                }
                                else 
                                {
                                    echo "<img src = '".base_url()."userImages/default.jpg'  alt ='John Doe'/>";
                                }
                            ?>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <a href = '#' data-toggle='modal' data-target='#ProfileImages'>
                                    <?php
                                       if((($this->session->userdata('account_type'))=="BUS COMPANY")&&(($this->session->userdata('bus_company_id'))!=""))
                                        {
                                            echo "<img src = '".base_url()."companyPics/".$image."'"."alt ='John Doe'/>";
                                        }

                                        else if((($this->session->userdata('account_type'))=="PREMIUM USER")&&(($this->session->userdata('user_id'))!=""))
                                        {
                                            echo "<img src = '".base_url()."userImages/".$image."'"."alt ='John Doe'/>";
                                        }

                                        else if(($this->session->userdata('account_type'))=="ADMIN")
                                        {
                                            echo "<img src = '".base_url()."userImages/".$image."'"."alt ='John Doe'/>";
                                        }
                                        else 
                                        {
                                            echo "<img src = '".base_url()."userImages/default.jpg'  alt ='John Doe'/>";
                                        }
                                    ?>
                                </a>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name" style ="color:; font-weight:bold">
                                    <?php
                                        if(($this->session->userdata('account_type'))=="BUS COMPANY")
                                        {
                                            if($this->session->userdata('subscription')=="SUBSCRIBED")
                                            {
                                               echo "<a href = '../../home/buscompany' style = 'color:white'>"; 
                                            }

                                            else
                                            {
                                                echo "<a href = '../../home/renew_subscription' style = 'color:white'>";
                                            }
                                            
                                        }

                                        else if(($this->session->userdata('account_type'))=="ADMIN")
                                        {
                                            echo "<a href = '../../home/adminpage' style = 'color:white'>";
                                        }
                                        else if(($this->session->userdata('account_type'))=="PREMIUM USER")
                                        {
                                            echo "<a href = '../../home/userpage' style = 'color:white'>";
                                        }

                                        echo $this->session->userdata('name');
                                        echo "</a>";
                                        echo "<br>";
                                    ?>
                                </div>

                                <?php
                                    if((($this->session->userdata('account_type'))=="BUS COMPANY")&&(($this->session->userdata('bus_company_id'))!=""))
                                    {
                                        echo "<a href = '../../home/edit_profile' class = 'btn btn-primary btn-sm' style ='margin-left:px;margin-right:5px'><span class='fa fa-user'></span>Edit Profile</a>";
                                        echo "<a href='../../home/account_settings' class = 'btn btn-info btn-sm'><span class='fa fa-cogs'></span> <span class='xn-text' style = 'color:white'>Account</span></a>";
                                    }

                                    else if(($this->session->userdata('account_type'))=="ADMIN")
                                    {
                                        echo "<a href = '../../home/edit_profile' class = 'btn btn-primary btn-sm' style ='margin-left:px;margin-right:5px'><span class='fa fa-user'></span>Edit Profile</a>";
                                        echo "<a href='../../home/account_settings' class = 'btn btn-info btn-sm'><span class='fa fa-cogs'></span> <span class='xn-text' style = 'color:white'>Account</span></a>";
                                    }
                                    else if((($this->session->userdata('account_type'))=="PREMIUM USER")&&(($this->session->userdata('user_id'))!=""))
                                    {
                                        echo "<a href = '../../home/edit_profile' class = 'btn btn-primary btn-sm' style ='margin-left:px;margin-right:5px'><span class='fa fa-user'></span>Edit Profile</a>";
                                        echo "<a href='../../home/account_settings' class = 'btn btn-info btn-sm'><span class='fa fa-cogs'></span> <span class='xn-text' style = 'color:white'>Account</span></a>";
                                    }

                                ?>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                    
                    <?php
                        $user = $this->session->userdata('account_type');
                        $subscription = $this->session->userdata('subscription');
                        if($user == "ADMIN")
                        {
                            echo "<li class='active'>";
                            echo "<a href='../../home/adminpage'><span class='fa fa-desktop'></span> <span class='xn-text'>Dashboard</span></a>";
                            echo "</li>";

                            echo "<li class='xn-openable'>";
                            echo "<a href='#'><span class='fa fa-map-marker'></span> <span class='xn-text'>STATIONS</span></a>";
                            echo "<ul>";
                                echo "<li><a href='../../admin/stations'><span class='fa fa-image'></span> List </a></li>";
                             
                            echo "</ul>";
                            echo "</li>";

                            echo "<li class='xn-openable'>";
                            echo "<a href='#'><span class='fa fa-columns'></span> <span class='xn-text'>BOOKINGS</span></a>";
                            echo "<ul>";
                                echo "<li><a href='../../admin/all_bookings'><span class='fa fa-image'></span> View </a></li>";
                             
                            echo "</ul>";
                            echo "</li>";

                            echo "<li class='xn-openable'>";
                            echo "<a href='#'><span class='fa fa-clock-o'></span> <span class='xn-text'>SCHEDULES</span></a>";
                            echo "<ul>";
                                echo "<li><a href='../../admin/all_schedules'><span class='fa fa-image'></span> View </a></li>";
                             
                            echo "</ul>";
                            echo "</li>";

                            echo "<li class='xn-openable'>";
                            echo "<a href='#'><span class='fa fa-envelope'></span> <span class='xn-text'>MESSAGES</span></a>";
                            echo "<ul>";
                                echo "<li><a href='../../messaging/messages'><span class='fa fa-image'></span> Create </a></li>";
                                echo "<li><a href='../../messaging/my_messages'><span class='fa fa-user'></span> List</a></li>";
                             
                            echo "</ul>";
                            echo "</li>"; 

                            echo "<li class='xn-openable'>";
                            echo "<a href='#'><span class='fa fa-user'></span> <span class='xn-text'>USERS</span></a>";
                            echo "<ul>";
                                echo "<li><a href='../../admin/registered_users'><span class='fa fa-image'></span> Registered </a></li>";
                                echo "<li><a href='../../admin/other_users'><span class='fa fa-image'></span> Other </a></li>";
                                echo "<li><a href='../../admin/deactivated_users'><span class='fa fa-image'></span> Deactivated Accounts </a></li>";
                            
                            echo "</ul>";
                            echo "</li>";

                            echo "<li class='xn-openable'>";
                            echo "<a href='#'><span class='fa fa-files-o'></span> <span class='xn-text'>BUS COMPANIES</span></a>";
                            echo "<ul>";
                                echo "<li><a href='../../admin/companies'><span class='fa fa-image'></span> List </a></li>";

                             
                            echo "</ul>";
                            echo "</li>";

                            echo "<li class='xn-openable'>";
                            echo "<a href='#'><span class='fa fa-cogs'></span> <span class='xn-text'>BUSES</span></a>";
                            echo "<ul>";
                                echo "<li><a href='../../admin/buses'><span class='fa fa-image'></span> List </a></li>";

                            echo "</ul>";
                            echo "</li>";

                        }

                        else if(($user == "PREMIUM USER")&& ($this->session->userdata('user_id')!=""))
                        {
                             echo "<li class='active'>";
                            echo "<a href='../../home/userpage'><span class='fa fa-desktop'></span> <span class='xn-text'>Dashboard</span></a>";
                            echo "</li>";

                            echo "<li class='xn-openable'>";
                            echo "<a href='#'><span class='fa fa-columns'></span> <span class='xn-text'>BOOKINGS</span></a>";
                            echo "<ul>";
                                echo "<li><a href='../../searchBus/booklogin'><span class='fa fa-image'></span> Book now </a></li>";
                                echo "<li><a href='../../user/bookinghistory'><span class='fa fa-image'></span> My History </a></li>";
                             
                            echo "</ul>";
                            echo "</li>";

                            echo "<li class='xn-openable'>";
                            echo "<a href='#'><span class='fa fa-envelope'></span> <span class='xn-text'>MESSAGES</span></a>";
                            echo "<ul>";
                                echo "<li><a href='../../messaging/messages'><span class='fa fa-image'></span> Create </a></li>";
                                echo "<li><a href='../../messaging/my_messages'><span class='fa fa-user'></span> List</a></li>";
                             
                            echo "</ul>";
                            echo "</li>";

                        }
                        
                        else if ($user == "BUS COMPANY"&&$subscription == "SUBSCRIBED")
                        {
                            echo "<li class='active'>";
                            echo "<a href='../../home/buscompany'><span class='fa fa-desktop'></span> <span class='xn-text'>Dashboard</span></a>";
                            echo "</li>";

                            echo "<li class='xn-openable'>";
                            echo "<a href='#'><span class='fa fa-clock-o'></span> <span class='xn-text'>SCHEDULE</span></a>";
                            echo "<ul>";
                                echo "<li><a href='../../busadmin/bus_schedule'><span class='fa fa-image'></span> New </a></li>";
                                echo "<li><a href='../../busadmin/my_schedules'><span class='fa fa-user'></span>My Schedules</a></li>";
                             
                            echo "</ul>";
                            echo "</li>";


                            echo "<li class='xn-openable'>";
                            echo "<a href='#'><span class='fa fa-cogs'></span> <span class='xn-text'>FLEET</span></a>";
                            echo "<ul>";
                                echo "<li><a href='../../busadmin/fleet'><span class='fa fa-image'></span> New </a></li>";
                                echo "<li><a href='../../busadmin/display_fleet'><span class='fa fa-user'></span> Manage</a></li>";
                             
                            echo "</ul>";
                            echo "</li>";

                            echo "<li class='xn-openable'>";
                            echo "<a href='#'><span class='fa fa-columns'></span> <span class='xn-text'>BOOKINGS</span></a>";
                            echo "<ul>";
                                echo "<li><a href='../../busadmin/bookings'><span class='fa fa-image'></span> List </a></li>";
                                echo "<li><a href='../../busadmin/tickets'><span class='fa fa-image'></span> Tickets </a></li>";
                            
                            echo "</ul>";
                            echo "</li>";

                            echo "<li class='xn-openable'>";
                            echo "<a href='#'><span class='fa fa-envelope'></span> <span class='xn-text'>MESSAGES</span></a>";
                            echo "<ul>";
                                echo "<li><a href='../../messaging/messages'><span class='fa fa-image'></span> Create </a></li>";
                                echo "<li><a href='../../messaging/my_messages'><span class='fa fa-user'></span> List</a></li>";
                             
                            echo "</ul>";
                            echo "</li>";                            


                            echo "<li class='xn-openable'>";
                            echo "<a href='#'><span class='fa fa-pencil'></span> <span class='xn-text'>SUBSCRIPTION</span></a>";
                            echo "<ul>";
                                echo "<li><a href='../../busadmin/subscription'><span class='fa fa-image'></span> Status </a></li>";
                                echo "<li><a href='../../busadmin/renew_subscription'><span class='fa fa-user'></span> Renew</a></li>";
                             
                            echo "</ul>";
                            echo "</li>";                            

                            // echo "<li class='xn-openable'>";
                            // echo "<a href='#'><span class='fa fa-bar-chart-o'></span> <span class='xn-text'>STATS</span></a>";
                            // echo "<ul>";
                            //     echo "<li><a href='../../busadmin/stats'><span class='fa fa-image'></span> Summary </a></li>";
                             
                            // echo "</ul>";
                            // echo "</li>";  

                            
                        }
                    ?>                   
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->

                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right" style = "margin-right:50px">
                        <a href="../../login/logout" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->

                    <!-- MESSAGES -->
                    <?php
                        $message_count=0;
                        if(($this->session->userdata('account_type')=="BUS COMPANY"))
                        {
                            $the_id = $this->session->userdata('bus_company_id');
                        }
                        else
                        {
                            $the_id = $this->session->userdata('user_id');
                        }
                        $message_count = $this->messages->get_received_count($the_id);

                        if($message_count>3)
                        {
                            $max = 3;
                        }
                        else
                        {
                            $max = $message_count;
                        }
                        
                        // foreach($received_messages as $mymessage)
                        // {
                        //     $message_count++;
                        // }

                    ?>
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-envelope"></span></a>
                        <div class="informer informer-danger"><?php echo $message_count;?></div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger"><?php echo $message_count;?> new</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">

                                <?php
                                    $messages = $this->messages->messages_as_notifications($the_id);                                    
                                    foreach($messages as $print)
                                    {
                                        $sender = $print->sender;
                                        $name = $this->messages->get_name($sender);
                                        $sender_image = $this->messages->sender_image($sender);
                                        $data = explode("/", $sender_image);

                                        echo "<a href='../../messaging/view_messages/".$print->message_id."' class='list-group-item' onclick=''>";
                                        echo "<div class='list-group-status status-online'></div>";
                                        if(($data[1])=="PREMIUM USER")
                                        {
                                            echo "<img src='".base_url()."userImages/".$data[0]."' class='pull-left' alt='John Doe'/>";
                                        }
                                        else if(($data[1])=="BUS COMPANY")
                                        {
                                            echo "<img src='".base_url()."companyPics/".$data[0]."' class='pull-left' alt='John Doe'/>";
                                        }
                                        
                                        echo "<span class='contacts-title'>".$name."</span>";
                                        echo "<p style = 'font-weight:normal;'>".$print->body."</p>";
                                        echo "</a>"; 
                                    }
                                ?>
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="../../messaging/my_messages">Show all messages</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END MESSAGES -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->

                <!-- MESSAGE BOX-->
                <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
                    <div class="mb-container">
                        <div class="mb-middle">
                            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                            <div class="mb-content">
                                <p>Are you sure you want to log out?</p>                    
                                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                            </div>
                            <div class="mb-footer">
                                <div class="pull-right">
                                    <a href="../../login/logout" class="btn btn-success btn-lg">Yes</a>
                                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MESSAGE BOX-->