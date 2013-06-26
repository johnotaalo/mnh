<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<head>
	<?php $this->load->view('segments/meta'); ?>
	
</head>

<body id="top">

<div id="network">
	<?php $this->load->view('segments/top-public'); ?>
</div>

<div id="site">
	<div class="center-wrapper">

		<!--logo and main nav-->
		<?php $this->load->view('segments/nav-public'); ?>

		<div class="main" >

			<div class="left" id="main-left">

				<div class="post">
					
					<p><img src="<?php echo base_url()?>images/survey.png" alt="" width="150" height="120" class="bordered" /></p>

					<!--div class="post-title"><h2><a>Take Survey</a></h2></div-->
					<p></p>

					<!--div class="post-date">Last Update 23:22, Saturday, June 15, 2013 by Admin</div-->

					<div class="post-body">

						

						<p class="large">This is the Ministry of Health, Online Data Management tool.</p>
						
						<p class="large"></p>
									
						<p class="large"><strong>Current Survey</strong> </p>

						<p> 
							<ul class="nice-list">
					           <li><a href="<?php echo base_url(); ?>assesment/commodity"> 1. Maternal and Neonatal Health Commodity,Equipment and Supplies Assessment</a></li>
					           <!--li>Post surveys online for easy access</li>
					            <li>Conduct timely Analysis</li-->
					        </ul>
                       </p>

					</div>
				
				</div>

				<!--div class="content-separator"></div-->

			</div>

			<!--div class="left sidebar" id="sidebar-1">

				<div class="post">

					<p><a href="#"><img src="<?php echo base_url()?>images/survey.png" alt="" width="72" height="68" class="bordered" /></a></p>

					<h3><a href="#">Take Survey</a></h3>

					<p>Only facilities in the MFL register are eligible.</p>


				</div>

				<div class="content-separator"></div>

				<div class="post">

					<p><a href="#"><img src="<?php echo base_url()?>images/analysis.png" alt="" width="72" height="68" class="bordered" /></a></p>

					<h3><a href="#">Survey Analysis</a></h3>

					<p>Access summarized results of previous surveys.</p>

					

				</div>

				<div class="content-separator"></div>

			</div-->

			<!--div class="right sidebar" id="sidebar-2">

				<div class="section">

					<div class="section-title">

						<div class="left">Latest Surveys</div>
						<div class="right"><img src="<?php echo base_url()?>css/img/icon-time.gif" width="14" height="14" alt="" /></div>

						<div class="clearer">&nbsp;</div>

					</div>

					<div class="section-content">

						<ul class="nice-list">
							<li>
								<div class="left"><a href="<?php echo base_url(); ?>assesment/commodity">Commodity Assessment</a></div>
								
								<div class="clearer">&nbsp;</div>
							</li>
							<li>
								<div class="left"><a href="<?php echo base_url(); ?>assesment/supplies">Supplies Assessment</a></div>
								
								<div class="clearer">&nbsp;</div>
							</li>
							<li>
								<div class="left"><a href="<?php echo base_url(); ?>assesment/equipment">Equipment Assessment</a></div>
							
								<div class="clearer">&nbsp;</div>
							</li>
							<li><a href="#" class="more">Browse all &#187;</a></li>
						</ul>

					</div>

				</div>

				<div class="section">

					<div class="section-title">
						<div class="left">Latest Analysis</div>
						<div class="right"><img src="<?php echo base_url()?>css/img/icon-time.gif" width="14" height="14" alt="" /></div>
						<div class="clearer">&nbsp;</div>
					</div>

					<div class="section-content">

						<ul class="nice-list">
							<li><span class="quiet">1.</span> <a href="<?php echo base_url(); ?>analysis/commodity">Commodity</a></li>
							<li><span class="quiet">2.</span> <a href="<?php echo base_url(); ?>analysis/supplies">Supplies</a></li>
							<li><span class="quiet">3.</span> <a href="<?php echo base_url(); ?>analysis/equipment">Equipment</a></li>
							<li><a href="#" class="more">Browse all &#187;</a></li>
						</ul>
						
					</div>

				</div>

			</div-->

			<div class="clearer">&nbsp;</div>

		</div>

		<!--footer-->
		<?php $this->load->view('segments/footer-public'); ?>

	</div>
</div>

</body>
</html>