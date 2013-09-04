<div id="site">
	<div class="center-wrapper">

		<!--logo and main nav-->
		<?php $this->load->view('segments/nav-public'); ?>

		<div class="main" >

			<div class="tile" id="main-left">

					
					<p class="large"><strong>Current Surveys</strong> </p>
					
					<p><img src="<?php echo base_url()?>images/survey.png" alt="" width="150" height="120" class="bordered" /></p>

					<!--div class="post-title"><h2><a>Take Survey</a></h2></div-->
					<p></p>

					<!--div class="post-date">Last Update 23:22, Saturday, June 15, 2013 by Admin</div-->

					<div class="post-body">

						

						<!--p class="large">This is the Ministry of Health, Online Data Management tool.</p-->
						
						<p class="large"></p>
									
						

						<p> 
							<ul class="nice-list">
					           <li><a href="<?php echo base_url(); ?>mnh/takesurvey"> 1. MNH Commodity,Equipment and Supplies Assessment</a></li>
					           <li><a href="<?php echo base_url(); ?>ch/takesurvey"> 2. CH,Diarrhoea Treatment Scale Up Baseline Assessment</a></li>
					           <!--li>Post surveys online for easy access</li>
					            <li>Conduct timely Analysis</li-->
					        </ul>
                       </p>

					</div>
				

				<!--div class="content-separator"></div-->

			</div>
			
			<div class="tile" style="width:40%">
				<p class="large"><strong>Facility Reporting Summary</strong> </p>
                <div class="post" id="kenya_county_map">
				 <script type="text/javascript"><!--         

			      var myMap = new FusionCharts( "<?php echo base_url()?>js/FusionMaps/Maps/FCMap_KenyaCounty.swf", 
			                   "myMapId", "612", "550", "0");
			      myMap.setJSONUrl("<?php echo base_url()?>js/FusionMaps/Data.json");
			      myMap.render("kenya_county_map");// -->     
			     
              </script>   

				<!--div class="content-separator"></div-->
             </div><!--./kenya_county_map-->
			</div><!--./middle_column-->
			
			<div class="tile" style="float:right">

					<p class="large"><strong>Survey Analysis</strong> </p>
					
					<p><img src="<?php echo base_url()?>images/analysis.png" alt="" width="150" height="120" class="bordered" /></p>

					<!--div class="post-title"><h2><a>Take Survey</a></h2></div-->
					<p></p>

					<!--div class="post-date">Last Update 23:22, Saturday, June 15, 2013 by Admin</div-->

					<div class="post-body">

						<!--p class="large">This is the Ministry of Health, Online Data Management tool.</p-->
						
						<p class="large"></p>
						<p> 
							<ul class="nice-list">
					           <!--li><a href="<?php echo base_url(); ?>mnh/analytics"> 1. Maternal and Newborn Health Survey Analytics</a></li-->
					           <li><a href="#"> The page is under construction. Link will be available soon. </a></li>
					           <!--li>Post surveys online for easy access</li>
					            <li>Conduct timely Analysis</li-->
					        </ul>
                       </p>

					</div>
			
				<!--div class="content-separator"></div-->

			</div>

			
			<div class="clearer">&nbsp;</div>

		</div>

		<!--footer-->
		<?php $this->load->view('segments/footer-public'); ?>

	</div>
</div>
