<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 	<html lang="en"> <!--<![endif]-->
<head>

	<!-- General Metas -->
	<?php $this->load->view('segments/meta'); ?>
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url()?>css/base.css">
	<link rel="stylesheet" href="<?php echo base_url()?>css/skeleton.css">
	<link rel="stylesheet" href="<?php echo base_url()?>css/form/layout.css">
	
</head>
<body>
	
	<div id="network">
	<?php $this->load->view('segments/top-public'); ?>
</div>

	<!--div class="notice">
		<a href="" class="close">close</a>
		<p class="warn">Whoops! We didn't recognise your username or password. Please try again.</p>
	</div-->

	
	<div id="site">
	<div class="center-wrapper">
		
		<!-- Primary Page Layout -->
		<div id="header">

			<div class="right" id="toolbar">
				
			</div>

			<div class="clearer">&nbsp;</div>

			<div id="site-title">
					<div align="center">
					<h3><a href="#"><img src="<?php echo base_url()?>images/logo_combined.png" /></a> </h3>
					</div>
			</div>

		</div>

	<div class="container">
		
		<div class="form-bg">
			<form>
				<h2><?php echo $login_message; ?></h2>
				
				<p style="margin-bottom:5px"><label for="username">Facility Name</label</p><p><input id="username" name="username" type="text" placeholder="Facility Name"></p>
				
				<p style="margin-bottom:5px"><label for="usercode">Email Address</label></p><p><input id="usercode" name="usercode" type="text" placeholder="Your Email Address"></p>
				<!--label for="remember">
				  <input type="checkbox" id="remember" value="remember" />
				  <span>Remember me on this computer</span>
				</label-->
				<div id="buttonsPane">
					<button type="submit" class="awesome blue medium">Login</button>	
				</div>
				
			<form>
		</div>

	
		<!--p class="forgot">Forgot your password? <a href="">Click here to reset it.</a></p-->


	</div><!-- container -->

		<!--footer-->
		<div style="margin-left:20%;margin-top:5%">
			<?php $this->load->view('segments/footer'); ?>
		</div>
		

	</div>
</div>

	<!-- JS  -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
	<script src="js/app.js"></script>
	
<!-- End Document -->
</body>
</html>