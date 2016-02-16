            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>   
                    <?php 

                        $the_schedule=$this->uri->segment(3);
                    ?>                 
                    <li class="active" style = "color:green"><?php echo "Schedule Number: ".$the_schedule?></li>
                </ul>
                <!-- END BREADCRUMB -->                   
                    
                <!-- /.row -->
                <div class="row">
                    <div class = "col-md-3" style ="background-color:#E3E4E4;border-radius:3px;margin-left:30px;height:46em;padding-top:20px">
                        <div id = "result" style = "color:green">Schedule Details</div>
                            <br>
                            <?php

                                $this_schedule = $this->busadmindata->get_schedule_details($the_schedule);
                                foreach ($this_schedule as $schedule) 
                                {
                                    
                                    echo "<p style = 'color:blue'>Bus:</p>"."<div style ='background-color:white;height:2em;width:;padding-left:5px;border-radius:5px'>".$schedule->bus."</div>";

                                    $origin=$schedule->origin;
                                    $origin_station=$this->main_model->get_station($origin);
                                    echo "<p style = 'color:blue'>Origin:</p>"."<div style ='background-color:white;height:2em;width:;padding-left:5px;border-radius:5px'>".$origin_station."</div>";

                                    $destination=$schedule->destination;
                                    $destination_station=$this->main_model->get_station($destination);
                                    echo "<p style = 'color:blue'>Origin:</p>"."<div style ='background-color:white;height:2em;width:;padding-left:5px;border-radius:5px'>".$destination_station."</div>";
                                    echo "<p style = 'color:blue'>Origin:</p>"."<div style ='background-color:white;height:2em;width:;padding-left:5px;border-radius:5px'>".$schedule->departure_date."</div>";
                                    echo "<p style = 'color:blue'>Origin:</p>"."<div style ='background-color:white;height:2em;width:;padding-left:5px;border-radius:5px'>".$schedule->arrival_date."</div>";
                                    echo "<p style = 'color:blue'>Origin:</p>"."<div style ='background-color:white;height:2em;width:;padding-left:5px;border-radius:5px'>".$schedule->departure_time."</div>";
                                    echo "<p style = 'color:blue'>Origin:</p>"."<div style ='background-color:white;height:2em;width:;padding-left:5px;border-radius:5px'>".$schedule->arrival_time."</div>";
                                    echo "<p style = 'color:blue'>Origin:</p>"."<div style ='background-color:white;height:2em;width:;padding-left:5px;border-radius:5px'>".$schedule->price."</div>";
                                    echo "<p style = 'color:blue'>Origin:</p>"."<div style ='background-color:white;height:2em;width:;padding-left:5px;border-radius:5px'>".$schedule->vip_price."</div>";


                                }
                            ?>
                        
                    </div>

                    <div class = "col-md-7" style ="background-color:#E3E4E4;border-radius:3px;margin-left:5px;height:46em;padding-top:20px">
                        <div id = "result" style = "color:green">Booking Stats</div>

                    </div>
             </div>
                <!-- /.row -->