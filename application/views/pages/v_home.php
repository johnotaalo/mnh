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
					<map showBevel='0' showMarkerLabels='1' fillColor='F1f1f1' borderColor='000000' hoverColor='efeaef' canvasBorderColor='FFFFFF' baseFont='Verdana' baseFontSize='10' markerBorderColor='000000' markerBgColor='FF5904' markerRadius='6' legendPosition='bottom' useHoverColor='1' showMarkerToolTip='1'  showExportDataMenuItem='1' >

	<data>
	  <?php 
   $sql="select ID,name from countys ";
   $result=mysql_query($sql)or die(mysql_error());

$colors=array("FFFFCC"=>"1","E2E2C7"=>"2","FFCCFF"=>"3","F7F7F7"=>"5","FFCC99"=>"6","B3D7FF"=>"7","CBCB96"=>"8","FFCCCC"=>"9");

   while($row=mysql_fetch_array($result))
  {
  	 $countyid=$row['ID'];
   	 $countyname=trim($row['name']);
	 $sql=mysql_query("select province as provid from  countys where ID='$countyid'") or die(mysql_error());
	 $sqlarray=mysql_fetch_array($sql);
	 $provid=$sqlarray['provid'];
   ?>
		<!--entity link='../cd4/consumptionreporting.php?id=<?php echo $countyid;?>'   id='<?php echo $countyid;?>' displayValue ='<?php $countyname ?>' 
		toolText='<?php echo $countyname . " County";?> &lt;BR&gt;<?php echo "CD4 Equipment: ". countysequip($countyid,1); ?>
		&lt;BR&gt;<?php echo "Haematology Equipment: ". countysequip($countyid,3); ?>
		&lt;BR&gt;<?php echo "Chemistry Equipment: ". countysequip($countyid,5); ?>
		&lt;BR&gt;<?php echo "Total Tests: ". centralfacilityspercounty2($countyid,""); ?>
		&lt;BR&gt;<?php echo "Total Adult Tests: ".  centralfacilityspercounty2($countyid,"AND age>2"); ?>
		&lt;BR&gt;<?php echo "Total Paed Tests: ". centralfacilityspercounty2($countyid,"AND age<=2"); ?>
		&lt;BR&gt;<?php echo "Failed Paed Tests: ". centralfacilityspercounty2($countyid,"AND age<=2 AND `CD3CD4CD45TruCCD3CD4Lymph`< 25"); ?>
		&lt;BR&gt;<?php echo "Failed Adult Tests: ".  centralfacilityspercounty2($countyid,"AND age>2 AND `CD3CD4CD45TruCCD3CD4AbsCnt`< 350"); ?>'
		color='<?php  echo array_rand($colors,1); ?>'  /-->
		
		
<?php
		}
?>		
		
	</data>
	
	
 
	
		<styles> 
  <definition>
   <style name='TTipFont' type='font' isHTML='1'  color='FFFFFF' bgColor='666666' size='11'/>
   <style name='HTMLFont' type='font' color='333333' borderColor='CCCCCC' bgColor='FFFFFF'/>
   <style name='myShadow' type='Shadow' distance='1'/>
  </definition>
  <application>
   <apply toObject='MARKERS' styles='myShadow' /> 
   <apply toObject='MARKERLABELS' styles='HTMLFont,myShadow' />
   <apply toObject='TOOLTIP' styles='TTipFont' />
  </application>
 </styles>
</map>

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
