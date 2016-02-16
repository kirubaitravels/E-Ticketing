<html>

		<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- END META SECTION -->
        
				
		<title>KRTS</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>frontend/css/revolution-slider/extralayers.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>frontend/css/revolution-slider/settings.css" media="screen" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>frontend/css/styles.css" media="screen" /> 

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>e-ticketingcss/e-ticketing.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>e-ticketingcss/header_footer.css">
		<link rel="stylesheet" href="<?php echo base_url();?>Date/pagestyle.css" media="screen, projection" />
       	<link rel="stylesheet" href="<?php echo base_url();?>Date/slimpicker.css" media="screen, projection" />
		<link href="<?php echo base_url();?>Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
       	<link href="<?php echo base_url();?>Bootstrap/dist/css/jquery-ui.min.css" rel="stylesheet">

       	<!--Google Maps API
		Markers
       -->
       	<!--Added on 20/01/2015-->

       	<script src="http://maps.googleapis.com/maps/api/js?v=3.exp"></script>
       	<script>
		// var geocoder;
		// var map;
		// //Initial map status. Loading with the coordinates of Nairobi
		//   function initialize() {
		//     geocoder = new google.maps.Geocoder();
		//     var latlng = new google.maps.LatLng(-1.292056,36.821946);
		//     var mapOptions = {
		//       zoom: 6,
		//       center: latlng

		//     }
		// 	  // map = new google.maps.Map(document.getElementById("myGoogleMap"), mapOptions);
		// 	  // directionsDisplay.setMap(map);
		// 	map = new google.maps.Map(document.getElementById("myGoogleMap"), mapOptions);
		//   }

		// // Route Markers
		// var address = '<?php echo $origin_station;?>';
		// // alert(address);
		// function codeAddress(address) {		  	
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
		//   }

		// var address1 = '<?php echo $destination_station;?>';
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
		// google.maps.event.addDomListener(window, 'load', initialize);

	</script>


	<!--Google Maps API.
	Routes
	-->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
    	var geocoder;
		var directionsDisplay;
		var directionsService = new google.maps.DirectionsService();
		var map;
		var map1;

		function initialize() {
		  directionsDisplay = new google.maps.DirectionsRenderer();
			var latlng = new google.maps.LatLng(-1.292056,36.821946);
		  var mapOptions = {
		    zoom:5,
		    center: latlng
		  };
		  map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
		  directionsDisplay.setMap(map);

		 map1 = new google.maps.Map(document.getElementById('myGoogleMap'), mapOptions);
		  directionsDisplay.setMap(map1);
		}

		function calcRoute() {
		  var start = document.getElementById('journey_input').value;
		  var end = document.getElementById('journey_input_to').value;
		  var request = {
		      origin:start,
		      destination:end,
		      travelMode: google.maps.TravelMode.DRIVING
		  };
		  directionsService.route(request, function(response, status) {
		    if (status == google.maps.DirectionsStatus.OK) {
		      directionsDisplay.setDirections(response);
		    }
		  });
		}

		google.maps.event.addDomListener(window, 'load', initialize);

    </script>



	</head>
	<body id = "body" onload = "initialize()">
    
    <!-- page container -->
    <div class="page-container">

		<div class = "navbar navbar-inverse navbar-static-top" id = "header">

			<div class = "header_container" id = "container-fluid">

				<a href="../ticketing" class="navbar-brand" id = "logo">KRTS</a>

				<div class="collapse navbar-collapse navHeaderCollapse header" style="margin-right:24px;">


					<ul class = "nav navbar-nav navbar-right">

				<!--User Account: login and registration -->

						<li class = "dropdown">
							<div class="dropdown-toggle" type="button" id="dropdownMenu1" style = "margin-bottom:10px;color:white" data-toggle="dropdown" aria-expanded="true">
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								Account
								<span class="caret"></span>
							</div>

							<ul class="dropdown-menu" id = "dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style = "margin-left:60px">

							<p style ="color:white; padding-left:5px; padding-top:5px;">Login</p>
								<div class = "login_panel">

									<!--User login-->
									<div class="input-group input-group-lg">
										<?php echo validation_errors();?>
										<?php echo form_open('login/login_users');?>
										<div class ="form-group navbar-form navbar-right">
											<div id = "login_message" style = "background-color:;height:3%;margin-left:2px;margin-bottom:3px"></div>
											<div class = "login_area">
												
												<input id ="loginfields" class ="form-control"  title ="Type in your email"type ="text" maxlength="40" name ="login_email" placeholder = "example@youremail.com" required></input>
												<br>
												<input id ="loginfields" class ="form-control" type ="password" maxlength="40" name ="login_password" placeholder = "Password" required></input>

												<br>
												<input class="btn btn-info btn-md" style = "margin-left:;" type="submit" id = "login_button" value = "Login"></input>
											</div>
										</div>
										<?php echo form_close();?>
											
									</div>

									<form>
									<a href="#" style = "color:white;padding:5px 5px 5px 5px;margin-top:2px" title="Fast and free sign up!" id="btnNewUser" data-toggle="collapse" data-target="#formRegister">Register</a>
									<a href="#" style = "color:white;padding:5px 5px 5px 5px;margin-top:2px" title="Can't access your account? Reset your password" id="btnNewUser" data-toggle="collapse" data-target="#formForgotPassword">Forgot Password?</a>

									</form>

									<!-- Password reset form -->
									<div class="input-group input-group-lg">
										<div id="formForgotPassword" class="form collapse">
										<?php echo validation_errors();?>
										<?php echo form_open('login/passwordReset','id="formForgotPassword"');?>										
		                                    <div class ="form-group">
		                                    <label style = "color:white;margin-left:12px;margin-top:5px;font-weight:normal;">Get help with your password</label>
		                                    <div id = "pwd_reset_message" style = "background-color:;height:2%;"></div>
												<div class = "signup_area">
													<label style = "color:white;">Enter your email</label>
													<input id ="loginfields" class ="form-control" type ="text" maxlength="40" name ="the_user_email" placeholder = "example@youremail.com" required></input>
													<br>
													<input class="btn btn-success btn-md" style = "margin-left:;" id = "password_reset_button" type="submit" value = "Submit">
													  <!--<span class="glyphicon glyphicon-search" aria-hidden="true"></span>-->
													</input>
												</div>
											</div>
		    							</div>
		    							<?php echo form_close();?>
	    							</div>

	    							<!-- User registration form -->
									<div class="input-group input-group-lg">
									<div id="formRegister" class="form collapse">
										<?php echo validation_errors();?>
										<?php echo form_open('signup/users_signup','onSubmit="return false"');?>
		                                    <div class ="form-group">
		                                    <label style = "color:white; margin-left:12px;margin-top:5px;font-weight:normal;">Create your account</label>
		                                    <div id = "sign_up_message" style = "background-color:;height:2%;"></div>
												<div class = "signup_area">

													<select type="select" name = "the_account_type" style = "border-radius:5px;height:2em;width:100%;margin-bottom:5px;padding-left:10px">
														<option value = "" style = "color:blue">----Account Type----</option>
														<option value = "PREMIUM USER">User</option>
														<option value = "BUS COMPANY">Bus Company</option>
													</select>
													<br>										
													<input id ="loginfields" class ="form-control" type ="text" maxlength="40" name ="my_email" placeholder = "example@youremail.com"></input>
													<br>
													<input id ="loginfields" class ="form-control" type ="password" maxlength="40" name ="the_password" placeholder = "Password"></input>
													<input id ="loginfields" class ="form-control" type ="password" maxlength="40" name ="confirmpassword" placeholder = "Retype Password"></input>
													<?php //echo validation_errors();?>
													<br>
													<input class="btn btn-default btn-md" style = "margin-left:;" type="submit" value = "Sign Up" id = "sign_up"></input>
												</div>
											</div>
		    							<?php echo form_close();?>
		    							</div>
											
									</div>


								</div>
							</ul>
						
						</li>

					</ul>


				</div>

			</div>

		</div>