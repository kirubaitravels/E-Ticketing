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
                            <a href="../login/logout" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

    <!--<div class="navbar navbar-inverse navbar-fixed-bottom" id = "footer">
      <div class="container">
        <p class="navbar-text">Powered by @e-ticketing</p>
      </div>
    </div>-->
    <!--End of footer text-->

        <!--<script type="text/javascript" src="<?php echo base_url();?>Bootstrap/dist/js/bootstrap.js"></script>-->
        
        <script src="<?php echo base_url();?>Bootstrap/dist/js/jquery.min.js"></script>
      <script src="<?php echo base_url();?>Bootstrap/dist/js/jquery-ui.min.js"></script>
      <script src="<?php echo base_url();?>Bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!--Date Picker-->
        <script>
         $( "#dp" ).datepicker({
        //changeMonth: true,
        //changeYear: true
      });
        </script>
        <script>
         $( "#dpp" ).datepicker({
        //changeMonth: true,
        //changeYear: true
      });
    </script>

    <script>
        $('input#submit_form').on('click',function(){

      var from=$('select#journey_input').val();
      var to=$('select#journey_input_to').val();
      var depart_date=$('input#dp').val();
      var return_date=$('input#dpp').val();

      var base_url='<?php echo base_url();?>';

     
        $('div#tab1').html("Searching records...");
     
        $.post(base_url+'index.php/searchBus/search_result',{from:from,to:to,depart_date:depart_date,return_date:return_date},function(data){
           $('div#tab1').html(data);
        
        });
    });
      
     
     </script>
     
         <script>
            $('input#submit_login').on('click',function(){

          var from=$('select#journey_input').val();
          var to=$('select#journey_input_to').val();
          var depart_date=$('input#dp').val();
          var return_date=$('input#dpp').val();

          var base_url='<?php echo base_url();?>';

         
            $('div#tab1').html("Searching records...");
         
            $.post(base_url+'index.php/searchBus/search_result_login',{from:from,to:to,depart_date:depart_date,return_date:return_date},function(data){
               $('div#tab1').html(data);
            
            });
        });
          
         
         </script>

     <!-- Picture Upload JS -->
     <script>
      // $(function() {
      //  $('#busRegistration').submit(function(e) {
      //    e.preventDefault();
      //    $.ajaxFileUpload({
      //      url       :'http://localhost/ticketing/images/CompanyPictures/', 
      //      secureuri   :false,
      //      fileElementId :'photo1',
      //      dataType    : 'json',
      //      // data     : {
      //      //  'title'       : $('#title').val()
      //      // },
      //      success : function (data, status)
      //      {
      //        if(data.status != 'error')
      //        {
      //          $('#files').html('<p>Reloading files...</p>');
      //          refresh_files();
      //          // $('#title').val('');
      //        }
      //        alert(data.msg);
      //      }
      //    });
      //    return false;
      //  });
      // });


     </script>

        <script>

      // var journey_input = $('#journey_input');

      // journey_input.change(function(){
      //  codeAddress(journey_input.val());
      // });

      // var journey_input_to = $('#journey_input_to');

      // journey_input_to.change(function(){
      //  codeAddress1(journey_input_to.val());
      // });

      // var route = $('#journey_input','#journey_input_to')

      // route.submit(function(){
      //  calcRoute(route.val());
      // });

    </script>

    <script>
        // var dropdown_click = $('#btnNewuser');
        // var dropdown_menu = $('#dropdown-menu');

        // dropdown_click.click(function(){
        //  // dropdown_menu.show('fast');
        //  console.log('show');
        // });
      </script>

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?php echo base_url()?>template/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="<?php echo base_url()?>template/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?php echo base_url()?>template/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>template/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>template/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='<?php echo base_url()?>template/js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="<?php echo base_url()?>template/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>template/js/plugins/scrolltotop/scrolltopcontrol.js"></script>

        <!-- TICKETS PAGE PLUGINS -->
        <script type='text/javascript' src='<?php echo base_url()?>/template/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="<?php echo base_url()?>/template/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url()?>/template/js/plugins/datatables/jquery.dataTables.min.js"></script>    
        <!-- END PAGE PLUGINS -->
        
        <script type="text/javascript" src="<?php echo base_url()?>template/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>template/js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="<?php echo base_url()?>template/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>template/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='<?php echo base_url()?>template/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url()?>template/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='<?php echo base_url()?>template/js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="<?php echo base_url()?>template/js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="<?php echo base_url()?>template/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>template/js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?php echo base_url()?>template/js/settings.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url()?>template/js/plugins.js"></script>        
        <script type="text/javascript" src="<?php echo base_url()?>template/js/actions.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url()?>template/js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->                 

    <!-- END SCRIPTS --> 

    <!-- Stations Load on map -->
        <script>

      var station = $('#station_name');

      station.click(function(){
        codeAddress(station.val());
        alert(station);
      });

    </script> 

        <!-- Bus Structure Scripts -->
        <script type="text/javascript">

            base_url = "<?=base_url();?>";

        </script>
<!--Start of Changing checkbox image-->
        <script type="text/javascript">
      var returned_seat
           $('input#submit_for').on('click',function(){
            
         
          
          
          var name=$('input#name').val();
          var phone_number=$('input#phone_number').val();
          var id_number=$('input#id_number').val();
          var promotion_code=$('input#promotion_code').val();
          var schedule_id=$('input[name="schedule_id"]').val();


           var base_url='<?php echo base_url();?>';

            $.post(base_url+'index.php/home/complete_booking',{name:name,phone_number:phone_number,id_number:id_number,promotion_code:promotion_code,schedule_id:schedule_id},function(data){
              // $('div#reg_msg').html(data);
                 returned_seat=data;
                 alert(returned_seat);

                
            });
        });

            function select_seat(div_name,checked_checkbox)
            { 

                
             if (document.getElementById(checked_checkbox).checked==true) {
                   
                       $('.'+div_name).html("<img src='"+base_url+"images/seat_clicked.png'>");
                         
                 }
                 else if (document.getElementById(checked_checkbox).checked==false) 
                 {
                    $('.'+div_name).html("<img src='"+base_url+"images/seat_available.png'>");
                }

        }
        

        </script>  
        <!--End of Checking checkbox-->
            
        <script type="text/javascript">
            

                        var value_checked=<?php echo '["' . implode('","',$value) . '"]'?>;


                        var arraylength =value_checked.length;
             
                        for (var i = 0;i<arraylength; i++) {
                           
                             var elem=document.getElementById(value_checked[i]);
                                elem.style.display='none';

                                          
                   document.getElementsByClassName(value_checked[i])
                           
                               $('.'+value_checked[i]).html("<img src='"+base_url+"images/seat_booked.png'>");   
                                
                           
                        };

                         
                       
        </script>



        <script type="text/javascript">
                  
                   var countCheckedCheckboxes; 
                   var checkboxes = $('#form_det td input[type="checkbox"]');

                   checkboxes.change(function(){
                  
                    countCheckedCheckboxes  = checkboxes.filter(':checked').length;
                    var data="Can only book a maximum of 2 seats";
                    var data1="Will be processed";
                    $('div.hold_seats_selected').html(countCheckedCheckboxes);
                    var price= '<?php echo $price;?>';

                    fare=price *countCheckedCheckboxes;

                    $('div.fare').html(fare);
                    if (countCheckedCheckboxes>2)
                     {
                        $('div#error_div').html(data);
                    }
                    else
                    {
                        $('div#error_div').html(data1);
                    }
                      
                    });
                    
                     function checkseats()
                    {
                        
                         var seats=countCheckedCheckboxes;
                       

                            if (seats<=4)
                             {                               
                                
                                // alert("Cool");
                                 return true;
                            }
                            else
                            {
                                var data="Seats Selelected More than 2!!";
                                
                                $('div#error_div').html(data);
                                return false;
                            }


           
                    }         

        </script> 

        <!-- Add New Station -->
        <!-- Admin Page -->
        <script>
            $('input#add_station').on('click',function()
            {
                var station_name=$('input[name="station_name"]').val();               

                var base_url='<?php echo base_url();?>';

            $('div#station_message').html("<span class = 'fa fa-cog' style = 'color:green;'> Processing</span>");

         
            //$('div#tab1').html("Searching records...");
         
                $.post(
                  base_url+'index.php/admin/newstation',
                  {station_name:station_name},
                  function(data)
                  {
                    if(data == "SUCCESS")
                    {
                      $('div#station_message').html("<span style = 'color:green'>Station Added Successfully.</span>");
                      window.location.href="../admin/stations";
                    }
                    else
                    {
                      $('div#station_message').html(data);
                    }
                  });
            });
          
         
         </script>


         <!-- Send a message -->
        <script>
              /*========================================do uploads function===============================================*/

        $('input#send_message').on('click',function(e){e.preventDefault(); upload_message("new_messages");});
            
              function upload_message(form_id)
              {

                var formData = new FormData($('#'+form_id)[0]);
                console.log(formData);
                var base_url='<?php echo base_url();?>';
                $.ajax({
                  url : base_url + 'index.php/messaging/new_message',
                  type : 'POST',
                  cache : false,
                  contentType: false,
                  processData : false,
                  data : formData,
                  success : function(data)
                  {
                    if(data == "1")
                    {
                      $('div#message_message').html("<span style = 'color:green'>Your message has been sent</span>");
                      window.location.href="../../index.php/messaging/messages";
                    }
                    else if(data == "2")
                    {
                      $('div#message_message').html("<span style = 'color:red'>Enter a receiver</span>");
                    }
                    else if(data == "3")
                    {
                      $('div#message_message').html("<span style = 'color:red'>Enter a message subject</span>");
                    }
                    else if(data == "4")
                    {
                      $('div#message_message').html("<span style = 'color:red'>There is no message to send</span>");
                    }
                    else if(data == "5")
                    {
                      $('div#message_message').html("<span style = 'color:red'>Message already sent</span>");
                    }
                    //$('div#message_message').html(data);
                  }
                });   
              }
          </script>



         <!-- Change Password -->
        <script>
            $('input#reset_password').on('click',function()
            {
                var the_old_password=$('input[name="the_old_password"]').val();               
                var new_password=$('input[name="new_password"]').val();
                var confirm_new_password=$('input[name="confirm_new_password"]').val();

                var base_url='<?php echo base_url();?>';

                //$('div#old_password_error').html("<span class = 'fa fa-cog' style = 'color:green;'> Processing</span>");
         
                $.post(
                  base_url+'index.php/user/update_account_settings',
                  {the_old_password:the_old_password,new_password:new_password,confirm_new_password:confirm_new_password},
                  function(data)
                  {
                    if(data=="1")
                    {
                      $('div#old_password_error').html("<span style ='color:red'>Enter your old password</span>");
                    }

                    else if(data=="2")
                    {
                      $('div#password_error').html("<span style ='color:red'>Enter a new password</span>");
                    }

                    else if(data=="3")
                    {
                      $('div#password_error').html("<span style ='color:red'>Confirm the new password</span>");
                    }
                    else if(data=="4")
                    {
                      $('div#password_error').html("<span style ='color:orange'>New password cannot be the same as the old password</span>");
                    }
                    else if(data=="5")
                    {
                      $('div#password_error').html("<span style ='color:red'>Entered passwords did not match</span>");
                    }
                    else if(data=="6")
                    {
                      $('div#password_error').html("<span style ='color:red'>New password too short</span>");
                    }
                    else if(data=="7")
                    {
                      $('div#password_error').html("<span style ='color:red'>Password too weak. Must contain atleast one special character or a digit</span>");
                    }
                    else if(data=="SUCCESS")
                    {
                      $('div#password_error').html("<span style ='color:green'>Password updated</span>");
                    }
                    else if(data=="ERROR")
                    {
                      $('div#password_error').html("<span style ='color:red'>An error occured. Please refresh and try again</span>");
                    }
                      
                  }
                  );

               return false;
          });
          
         
         </script>

         <!-- New Schedule -->
         <script>
            $('input#submit_schedule').on('click',function()
            {
                var bus=$('select[name="bus"]').val();
                var from=$('select[name="from"]').val();
                var to=$('select[name="to"]').val();
                var depart_date=$('input[name="depart_date"]').val(); 
                var arrival_date=$('input[name="arrival_date"]').val();
                var depart_time=$('input[name="depart_time"]').val(); 
                var arrival_time=$('input[name="arrival_time"]').val();
                var price=$('input[name="price"]').val(); 
                var vip_price=$('input[name="vip_price"]').val();              

                var base_url='<?php echo base_url();?>';

                $('div#returned_message').html("<span class = 'fa fa-cog' style = 'color:green;'> Processing</span>");

         
                $.post(
                  base_url+'index.php/busadmin/newBusSchedule',
                  {bus:bus,from:from,to:to,depart_date:depart_date,arrival_date:arrival_date,depart_time:depart_time,arrival_time:arrival_time,price:price,vip_price:vip_price},
                  function(data)
                  {
                    console.log(data);
                    if(data=="NO BUS")
                    {
                      $('div#bus_error').html("<span style ='color:red'>Select a bus</span>");
                    }

                    else if(data=="NO ORIGIN")
                    {
                      $('div#origin_error').html("<span style ='color:red'>Choose a town of origin</span>");
                    }

                    else if(data=="NO DESTINATION")
                    {
                      $('div#destination_error').html("<span style ='color:red'>Choose a destination</span>");
                    }
                    else if(data=="NO DEPARTURE DATE")
                    {
                      $('div#departure_date_error').html("<span style ='color:red'>Enter the date of departure</span>");
                    }
                    else if(data=="NO ARRIVAL DATE")
                    {
                      $('div#arrival_date_error').html("<span style ='color:red'>Enter the date of arrival</span>");
                    }
                    else if(data=="NO DEPARTURE TIME")
                    {
                      $('div#departure_time_error').html("<span style ='color:red'>Enter the time of departure</span>");
                    }
                    else if(data=="NO ARRIVAL TIME")
                    {
                      $('div#arrival_time_error').html("<span style ='color:red'>Enter the time of arrival</span>");
                    }
                    else if(data=="NO PRICE")
                    {
                      $('div#price_error').html("<span style ='color:red'>Entered the standard price</span>");
                    }
                    else if(data=="NO VIP PRICE")
                    {
                      $('div#vip_price_error').html("<span style ='color:red'>Enter the VIP price</span>");
                    }
                    else if(data=="SUCCESS")
                    {
                      $('div#status_message').html("<span style ='color:green'>Journey inserted successfully</span>");
                      window.location.href="../index.php/busadmin/my_schedules";
                    }
                    else if(data=="SCHEDULE ALREADY EXISTS")
                    {
                      $('div#status_message').html("<span style ='color:orange'>The scheduled journey already exists</span>");
                    }


                 });
                return false;
        });
         
         </script>

         <!-- Add buses to fleet -->
                    <script>
              /*========================================do uploads function===============================================*/

        $('input#add_bus').on('click',function(e){e.preventDefault(); add_bus("busRegistration");});
            
              function add_bus(form_id)
              {

                var formData = new FormData($('#'+form_id)[0]);
                console.log(formData);
                var base_url='<?php echo base_url();?>';
                $.ajax({
                  url : base_url + 'index.php/busadmin/newFleet',
                  type : 'POST',
                  cache : false,
                  contentType: false,
                  processData : false,
                  data : formData,
                  success : function(data)
                  {
                    if(data == "SUCCESS")
                    {
                      $('div#success_message').html("<span style = 'color:green'>Bus has been added</span>");
                      window.location.href="../busadmin/display_fleet";
                    }
                    else if(data == "1")
                    {
                      $('div#reg_no_message').html("<span style = 'color:red'>Bus registration number is required</span>");
                    }
                    else if(data == "2")
                    {
                      $('div#model_message').html("<span style = 'color:red'>Model of the bus is required</span>");
                    }
                    else if(data == "3")
                    {
                      $('div#capacity_message').html("<span style = 'color:red'>Capacity of the bus is required</span>");
                    }
                    else if(data == "EXISTS")
                    {
                      $('div#success_message').html("<span style = 'color:red'>Bus already exists. Enter a different bus</span>");
                      window.location.href="../busadmin/fleet";
                    }
                    //$('div#message_message').html(data);
                  }
                });   
              }
          </script>


        <script>
        // $(document).on("click", ".open-myMap", function () {
        //      var address = $(this).data('id');
        //      $(".modal-body #bookId").val( myBookId );
        //      // As pointed out in comments, 
        //      // it is superfluous to have to manually call the modal.
        //      // $('#addBookDialog').modal('show');
        // });
        </script>      
    </body>
</html>
