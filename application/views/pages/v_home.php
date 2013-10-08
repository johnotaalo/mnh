<div id="site">
	<div class="center-wrapper">

		<!--logo and main nav-->
		<?php $this -> load -> view('segments/nav-public'); ?>

		<div class="main" >

			<div class="tile" id="main-left">
				<h3>Current Surveys</h3>
				<img src="<?php echo base_url(); ?>images/survey.PNG" />

				<div class="tile-content">
					<p>
						<!--img src="<?php echo base_url()?>images/survey.png" alt="" width="150" height="120" class="bordered" /-->
					</p>

					<!--div class="post-title"><h2><a>Take Survey</a></h2></div-->
					<p></p>

					<!--div class="post-date">Last Update 23:22, Saturday, June 15, 2013 by Admin</div-->

					<div class="post-body">

						<!--p class="large">This is the Ministry of Health, Online Data Management tool.</p-->

						<p class="large"></p>

						<p>
							<ul class="nice-list">
								<li>
									<a href="<?php echo base_url(); ?>mnh/takesurvey"> 1. Maternal Neonatal Health - Emergency Obstetric Care Assessment - Baseline </a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>ch/takesurvey">  2. Child Health - Diarrhoea, Treatment Scale Up Assessment - Baseline 	</a>
								</li>
								<!--li>Post surveys online for easy access</li>
								<li>Conduct timely Analysis</li-->
							</ul>
						</p>
					</div>
				</div>

				<!--div class="content-separator"></div-->

			</div>

			<div class="tile" style="width:30%">

				<div class="post" id="kenya_county_map">
					<script type="text/javascript">
						var myMap = new FusionCharts( "<?php echo base_url()?>js/FusionMaps/Maps/FCMap_KenyaCounty.swf","myMapId","150%","220%","0");
						myMap.setJSONUrl("<?php echo base_url()?>js/FusionMaps/Data.json");
						myMap.render("kenya_county_map");
					</script>

					<!--div class="content-separator"></div-->
				</div><!--./kenya_county_map-->
			</div><!--./middle_column-->

			<div class="tile" style="float:right">

				<h3>Survey Analysis</h3>
				<img src="<?php echo base_url(); ?>images/analysis.PNG" />

				<div class="tile-content">
					<p>
						<!--img src="<?php echo base_url()?>images/analysis.png" alt="" width="150" height="120" class="bordered" /-->
					</p>

					<!--div class="post-title"><h2><a>Take Survey</a></h2></div-->
					<p></p>

					<!--div class="post-date">Last Update 23:22, Saturday, June 15, 2013 by Admin</div-->

					<div class="post-body">

						<!--p class="large">This is the Ministry of Health, Online Data Management tool.</p-->

						<p class="large"></p>
						<p>
							<ul class="nice-list">
								<!--li><a href="<?php echo base_url(); ?>mnh/analytics"> 1. Maternal and Newborn Health Survey Analytics</a></li-->

								<li>
									<a href="<?php echo base_url(); ?>mnh/analytics" > 1. Maternal Neonatal Health - Emergency Obstetric Care Assessment - Baseline </a>
								</li>

								<li>
									<a href="<?php echo base_url(); ?>ch/analytics" > 2. Child Health - Diarrhoea, Treatment Scale Up Assessment - Baseline </a>
								</li>
							</ul>
						</p>
					</div>
				</div>

				<!--div class="content-separator"></div-->

			</div>

			<div class="clearer">
				&nbsp;
			</div>

		</div>

		<!--footer-->
		<?php //$this->load->view('segments/footer-public'); ?>

	</div>
</div>
