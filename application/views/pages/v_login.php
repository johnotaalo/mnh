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
	<script src="<?php echo base_url(); ?>js/js_libraries.js"></script>
	<script src="<?php echo base_url(); ?>js/js_ajax_load.js"></script>
	
	<script>
		$().ready(function(){
				var foundNames;
				$(function(){
					//load json data
					 var cache = {},lastXhr;
				    $( "#username" ).autocomplete({
				    	 	delay: 500,
				    	 	minLength: 2,
				            source: function( request, response ) {
				                var term = request.term;
				                if ( term in cache ) {
				                    response( cache[ term ] );
				                    return;
				                }
				 
				                $.getJSON( '<?php echo base_url();?>c_load/suggestFacilityName', request, function( data, status, xhr ) {
				                    cache[ term ] = data;
				                    response( data );
				                });
				            }
				    });
		
				});//end of $(function(){
				
				
			});
	</script>
	
	<style type="text/css">
		/*auto complete styling*/
		.ui-autocomplete {
		    max-height: 100px;
		    overflow-y: auto;
		    /* prevent horizontal scrollbar */
		    overflow-x: hidden;
		    background:#FFFFFF;
		    border:1px solid #999;
		    width:25%;
		}
		.ui-menu-item{
			cursor:pointer;
		}
		.ui-menu-item:hover{
			color:#3333FF;
			cursor:hand;
		}
		/* IE 6 doesn't support max-height
		 * we use height instead, but this forces the menu to always be this tall
		 */
		html .ui-autocomplete {
		    height: 100px;
		}
		.ui-autocomplete-loading {
			background: white url('<?php echo base_url(); ?>images/ui-anim_basic_16x16.gif') right center no-repeat;
		}
	</style>
	
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
			<form id="authenticate" name="authenticate" action="<?php echo base_url().'session/new'?>" method="post" accept-charset="utf-8">
				<h2><?php echo $login_message; ?></h2>
				
				<!--p style="margin-bottom:5px"><label for="username">Facility Name</label</p><p><input id="username" name="username" type="text" placeholder="Facility Name"></p-->
				<p style="margin-bottom:5px"><label for="username">District Name</label</p>
					<p><select id="username" name="username">
					<option selected="selected" value="">Select District</option>
					<?php echo $this->selectDistricts; ?>
					</select>
				</p>
				
				<p style="margin-bottom:5px"><label for="usercode">Password</label></p><p><input id="usercode" name="usercode" type="password"/></p>
				<!--label for="remember">
				  <input type="checkbox" id="remember" value="remember" />
				  <span>Remember me on this computer</span>
				</label-->
				<label style="color: #e34848;display:none" for="buttonsPane" >Invalid District and Password Combination!</label>
				<div class="buttonsPane">
					<button type="submit" class="awesome blue medium">Login</button>	
				</div>
			</form>
		</div>

	
		<!--p class="forgot">Forgot your password? <a href="">Click here to reset it.</a></p-->


	</div><!-- container -->

		<!--footer-->
		<div style="margin-left:20%;margin-top:5%">
			<?php $this->load->view('segments/footer'); ?>
		</div>
		

	</div>
</div>

	
	
<!-- End Document -->
</body>
</html>