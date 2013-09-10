
	<!-- Stylesheets -->
	<!--main style-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url()?>css/base.css">
	<link rel="stylesheet" href="<?php echo base_url()?>css/skeleton.css">
	<link rel="stylesheet" href="<?php echo base_url()?>css/form/layout.css">
	<script src="<?php echo base_url(); ?>js/js_libraries.js"></script>
	<script src="<?php echo base_url(); ?>js/js_ajax_load.js"></script>


<div id="site-title">

					<div align="center">
					<h3><a href="#"><img src="<?php echo base_url()?>images/logo_combined.png" /></a> </h3>
					</div>
			</div>

	<div class="container">
		
		<div class="form-bg">
			<form id="authenticate" name="authenticate" action="<?php echo base_url().'session/new'?>" method="post" accept-charset="utf-8">
				<h2><?php echo $login_message; ?></h2>
				
				<!--p style="margin-bottom:5px"><label for="username">Facility Name</label</p><p><input id="username" name="username" type="text" placeholder="Facility Name"></p-->
				<p style="margin-bottom:5px"><label for="username">District/Sub County Name</label</p>
					<p><select id="username" name="username">
					<option selected="selected" value="">Select District/Sub County</option>
					<?php echo $this->selectDistricts; ?>
					</select>
				</p>
				
				<p style="margin-bottom:5px"><label for="usercode">Password</label></p><p><input id="usercode" name="usercode" type="password"/></p>
				<!--label for="remember">
				  <input type="checkbox" id="remember" value="remember" />
				  <span>Remember me on this computer</span>
				</label-->
				<label style="color: #e34848;display:none" for="buttonsPane" >Invalid District/Sub County and Password Combination!</label>
				<div class="buttonsPane">
					<button type="submit" class="awesome blue medium" style="width:inherit">Begin <?php echo $survey ?> Survey</button>	
				</div>
			</form>
		</div>

	
		<!--p class="forgot">Forgot your password? <a href="">Click here to reset it.</a></p-->



	</div><!-- container -->

