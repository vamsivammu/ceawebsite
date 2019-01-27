<?php

	session_start();
	include('config.php');
	
?>


<!doctype html>
<html lang="en">


<head>
	<meta charset="utf-8" />
	
	<link href="assets/assets-for-demo/vertical-nav.css" rel="stylesheet" />
	<link rel="icon" href="assets/img/cealogo.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>CEA 17</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!-- Canonical SEO -->
	

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>

	<!--  Social tags      -->
    <meta name="keywords" content="cea fest,cea iitm,iitm,civil engineering fest,technical fest,best civil fest">

    <meta name="description" content="civil engineering fest of iit Madras">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="cea iitm">
    <meta itemprop="description" content="cea iitm">

   

    
    <!-- Open Graph data -->
	
</head>

<body >

	<nav class="navbar navbar-default navbar-transparent navbar-fixed-top navbar-color-on-scroll" id="sectionsNav" >
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		 <a class="navbar-brand" href="#"> <img class="img" src="assets/img/cealogo.png" style="width: 40px;"  /></a>

        	</div>

        	<div class="collapse navbar-collapse" id="navigation-example" >
        		<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="home.php">
							<i class="material-icons">home</i> Home
						</a>
					</li>

					<li>
						<a href="comingsoon.php">
							<i class="material-icons">palette</i> Theme
						</a>
					</li>

					<li >
						<a href="events/events.php">
							<i class="material-icons">event</i> Events
							
						</a>
						
					</li>
						<li >
						<a href="comingsoon.php">
							<i class="material-icons">school</i> workshops
							
						</a>
						
					</li>
					
					</li>
						<li >
						<a href="researchexpo.php">
							<i class="material-icons">library_books</i> Research Expo
							
						</a>
						
					</li>
					
					</li>
						<li >
						<a href="comingsoon.php">
							<i class="material-icons">euro_symbol</i> Sponsors
							
						</a>
						
					</li>
					
					<li >
						<a href="comingsoon.php">
							<i class="material-icons">phone</i> Contact us
							
						</a>
						
					</li>

					<?php
					if(isset($_COOKIE['username'])){
					?>
					<li class="dropdown">
						<a href="login/login.php"class="dropdown-toggle" data-toggle="dropdown">
							<i class="material-icons">account_circle</i>   <?php echo $_COOKIE['username']; ?>
							<b class="caret"></b>
						</a>
							
					
						<ul class="dropdown-menu dropdown-with-icons">
							
							<li>
								<a href="http://ceaiitm.org/2017/main/login/changepassword.php" >
									<i class="material-icons">lock</i> Change Password
								</a>
							</li>
							<li>
								<a href="http://ceaiitm.org/2017/main/login/sign_out.php">
									<i class="material-icons">exit_to_app</i> Sign Out
								</a>
							</li>						
						</ul>
					<?php
					}else{
					?>
					<li class="dropdown">
						<a href="login/login.php"class="dropdown-toggle" data-toggle="dropdown">
							<i class="material-icons">account_circle</i>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu dropdown-with-icons">
							<li>
								<a href="http://ceaiitm.org/2017/main/login/login.php">
									<i class="material-icons">perm_identity</i> Login
								</a>
							</li>
							<li>
								<a href="http://ceaiitm.org/2017/main/login/register2.php">
									<i class="material-icons">person_add</i> sign up
								</a>
							</li>						
						</ul>
					
					<?php
					}
					?>
					
					</li>
					
					</li>
					
        		</ul>
        	</div>
    	</div>
    </nav>

	<div class="page-header header-filter" data-parallax="active" style="background-image: url('images/background/goldengate.jpg');">
		<div class="container">
    		<div class="row">
        		<div class="col-md-8 col-md-offset-2">
                    <div class="brand text-center">
						<img class="img" src="assets/img/cealogo.png" style="width: 200px" /><br>
						<h1 style="font-family: 'Monoton', cursive; font-size:72px;">RESEARCH EXPO</h1>
					</div>
                </div>
            </div>
        </div>
	</div>

	<div class="main main-raised">
		<div class="container">
            <div class="about-description">
                <div class="row">
    				<div class="col-md-8 col-md-offset-2" style="padding:30px;">
    					<h5 class="description">
							<p>India is witnessing significant growth in engineering education sector. 

							Government and industries are pumping in funds to push the limits of Indian 

							research domain forward. With the need for new materials, construction 

							techniques, environmental and sustainability concerns, comes greater 

							responsibilities to refine and reinvent the conventional realms of civil 

							engineering.<br><br>

							CEA organized Research Expo puts at a glance the civil engineering research 

							programs and facilities at IIT Madras, showcases novel projects and includes 

							interactive sessions with faculty and research scholars. The idea is to drive great 

							brains to one platform and induce collaborative growth. With its 3rd edition this 

							year, Research expo also thrives to elucidate different dimensions of academic 

							and industrial opportunities and empower you to choose well and give glowing 

							performance in your career.<br><br>
							</p>
						</h5>
    				</div>
    			</div>
            </div>
        </div>
    </div>

	

	


	<footer class="footer" id="share">
		<div class="container">
		
			

			<div class="row text-center">
			<ul >
			<h4 class="title">Thank you for sharing!</h4>
				<li>
					
				</li>
				<li>
					<a href="https://twitter.com/CEA_Fest_IITM" target="_blank" class="btn btn-twitter btn-round">
							<i class="fa fa-twitter"></i> Twitter
						</a>
						
						
				</li>
				<li>
					<a href="https://www.facebook.com/ceaiitm" target="_blank" class="btn btn-facebook btn-round">
							<i class="fa fa-facebook-square"></i> Facebook
						</a>
				</li>
				<li>
					<a href="https://play.google.com/store/apps/details?id=com.ceafest.ankitk97.testsite" target="_blank" class="btn btn-google btn-round">
							<i class="fa fa-google-play"></i> Google
						</a>
				</li>
			</ul>
			
			</div>
<p class="pull-right description" style="color: black;">
Copyright © CEA WebOps 2017
</p>			

		</div>
	</footer>


	<!--     *********    END PRICING 5      *********      -->
</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

		<!--	Plugin for Select Form control, full documentation here: https://github.com/FezVrasta/dropdown.js -->
	<script src="assets/js/jquery.dropdown.js" type="text/javascript"></script>

	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
	<script src="assets/js/jquery.tagsinput.js"></script>

	
	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets/js/material-kit.js" type="text/javascript"></script>

	




</html>
