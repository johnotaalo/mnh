<div id="header">
	<div class="right" id="toolbar"></div>

	<div class="clearer">
		&nbsp;
	</div>

	<div id="site-title">
		<div align="center">
			<h3><a href="#"><img src="<?php echo base_url()?>images/logo_combined.png" /></a></h3>
		</div>

	</div>

	<div id="navigation">

		<div class="navbar">
			<div class="navbar-inner">
				<ul class="nav">
					<li>
						<a href="<?php echo base_url(); ?>">Home</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Surveys <b class="caret"></b> </a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo base_url(); ?>mnh/takesurvey"> 1. Maternal Neonatal Health - Emergency Obstetric Care Assessment - Baseline </a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>ch/takesurvey"> 2. Child Health - Diarrhoea, Treatment Scale Up Assessment - Baseline </a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>hcw/takesurvey"> 3. IMCI Follow-Up Tool - Baseline </a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Analytics <b class="caret"></b> </a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo base_url(); ?>mnh/analytics" id="mnh_analytics"> 1. Maternal Neonatal Health - Emergency Obstetric Care Analysis - Baseline </a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>ch/analytics" id="mch_analytics"> 2. Child Health - Diarrhoea, Treatment Scale Up Analysis - Baseline </a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>hcw/analytics" id="mch_analytics"> 3. IMCI Follow-Up Tool Analysis - Baseline </a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Offline Forms <b class="caret"></b> </a>
						<ul class="dropdown-menu">
							<li id="mnh-form">
								<a href="#"> 1. Maternal Neonatal Health - Emergency Obstetric Care Analysis - Baseline </a>
							</li>
							<li id="mch-form">
								<a href="#"> 2. Child Health - Diarrhoea, Treatment Scale Up Analysis - Baseline </a>
							</li>
							<li id="hcw-form">
								<a href="#"> 3. Follow-Up Tool after IMCI Training </a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> MNH Reporting Facilities (Baseline) <b class="caret"></b> </a>
						<ul class="dropdown-menu">
							<li id="mnh-completed">
								<a href="#"> 1. List of Completed facilities </a>
							</li>
							<li id="mnh-partially">
								<a href="#"> 2. List of Partially Completed facilities </a>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?php echo $this -> config -> item('project_url'); ?>">Program Monitoring Tool</a>
					</li>
					<li>
						<a href="<?php echo $this -> config -> item('hcmp_url'); ?>">HCMP</a>
					</li>
				</ul>
			</div>
		</div>

	</div>

</div>
<script>
	$(document).ready(function(){
		$('#mnh-form').click(function(){
			window.open('<?php echo base_url();?>c_pdf/loadPDF/mnh');
		});
		$('#mch-form').click(function(){
			window.open('<?php echo base_url();?>c_pdf/loadPDF/mch');
		});
		$('#hcw-form').click(function(){
			window.open('<?php echo base_url();?>c_pdf/loadPDF/hcw');
		});

		$('#mnh-completed').click(function(){
			window.open('<?php echo base_url();?>c_statistics/reportingFacilitiesNew/complete/mnh/baseline/');
		});
		$('#mnh-partially').click(function(){
			window.open('<?php echo base_url();?>c_statistics/reportingFacilitiesNew/partial/mnh/baseline/');
		});
		
	});
</script>