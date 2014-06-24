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
									<a href="<?php echo base_url(); ?>mnh/takesurvey"> 1. Maternal Neonatal Health - Emergency Obstetric Care Assessment-Baseline </a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>ch/takesurvey"> 2. Child Health - Diarrhoea, Treatment Scale Up Assessment-Baseline </a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>hcw/takesurvey"> 3. IMCI Follow-Up Tool Assessment-Baseline</a>
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
				<h3>Reporting Rates</h3>
				<a href="#" id="ch-map">Child Health</a>
				|
				<a href="#" id="mnh-map">Maternal and Neonatal Health</a>
                |
			    <a href="#" id="hcw-map">IMCI Follow-Up Tool</a>
				
				<!--div class="legend">
					<div class="item"><div class="color" style="background:#e93939"></div><div class="title"><20%</div></div>
					<div class="item"><div class="color" style="background:#da8a33"></div><div class="title"><40%</div></div>
					<div class="item"><div class="color" style="background:#dad833"></div><div class="title"><60%</div></div>
					<div class="item"><div class="color" style="background:#91da33"></div><div class="title"><80%</div></div>
					<div class="item"><div class="color" style="background:#7ada33"></div><div class="title"><=100%</div></div>
				</div-->
				<div class="post" id="ch_map">
					<script>
var map= new FusionMaps ("js/FusionMaps/Maps/FCMap_KenyaCounty.swf","KenyaMap","150%","200%","0","0");
map.setJSONData(<?php echo $mapsCH; ?>
	);
	map.render("ch_map");
					</script>
					<!--div class="content-separator"></div-->
				</div><!--./kenya_county_map-->
				

                <div class="post" id="hcw_map">
					<script>
var map= new FusionMaps ("js/FusionMaps/Maps/FCMap_KenyaCounty.swf","KenyaMap","150%","200%","0","0");
map.setJSONData(<?php echo $mapsHCW; ?>
	);
	map.render("hcw_map");
					</script>
					<!--div class="content-separator"></div-->
				</div><!--./kenya_county_map-->

				<div class="post" id="mnh_map">
					<script>
var map= new FusionMaps ("js/FusionMaps/Maps/FCMap_KenyaCounty.swf","KenyaMap","150%","200%","0","0");
map.setJSONData(<?php echo $mapsMNH; ?>
	);
	map.render("mnh_map");
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
									<a href="<?php echo base_url(); ?>mnh/analytics" > 1. Maternal Neonatal Health - Emergency Obstetric Care Assessment </a>
								</li>

								<li>
									<a href="<?php echo base_url(); ?>ch/analytics" > 2. Child Health - Diarrhoea, Treatment Scale Up Assessment </a>
								</li>

								<li>
									<a href="<?php echo base_url(); ?>hcw/analytics" > 3. IMCI Follow-Up Tool Assessment </a>
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
<script>
	$(document).ready(function(){
		var styles1={
			'text-decoration':'underline',
			'font-size':'1.4em',
			'color':'black'
		}
		var styles2={
			'text-decoration':'none',
			'font-size':'1em',
			'color':'#005580'
		}
		$('#mnh_map').hide();
		$('#ch-map').css(styles1);
		$('#mnh-map').click(function(){
			//alert(' ');
			$('#mnh_map').show();
			$('#ch_map').hide();
			$('#mnh-map').css(styles1);
			$('#ch-map').css(styles2);
		});
		$('#ch-map').click(function(){
			//alert(' ');
			$('#ch_map').show();
			$('#mnh_map').hide();
			$('#ch-map').css(styles1);
			$('#mnh-map').css(styles2);
		});
	});
</script>
