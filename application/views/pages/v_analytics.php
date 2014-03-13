<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<?php $this->load->view('segments/meta');?>
	<?php $this->load->view('segments/analytics_css');?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
	<!-- BEGIN HEADER -->
	
		<?php $this->load->view('segments/header');?>
	<div style="width:90%;margin:auto">
	<?php $this -> load -> view('segments/nav-public'); ?>
	</div>
	
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->	
	<div class="page-container row-fluid">
		<!-- BEGIN SIDEBAR -->
		<?php $this->load->view('segments/analytics_sidebar_menu');?>
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>portlet Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">	
								
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->			
						<h3 class="page-title">
							<?php echo $analytics_main_title; ?> for <?php echo $this->session->userdata('county_analytics')." County" ?><small><?php echo $analytics_mini_title; ?></small>
							<h4 style="float:right;padding-right:3%;"><?php //echo $this->session->userdata('county_analytics') ?>
								
								
							</h4>
						</h3>
						
						<ul class="breadcrumb">
							<li><a id="breadcrumb-title"></a></li>
							<i class="icon-angle-right"></i>
							<li><a id="breadcrumb-sub-title"></a></li>
							<label href="#reportingCountiesModal" data-toggle="modal" id="reportingLabel"><h6>Reporting Statistics</h6>
									<div id="reportingBar">
										
									</div>
									</label>
							<label style="margin:0 5% 0 0;display:inline-block;float:right;" for="county_select">Select a County
							<select name="county_select" id="county_select"style="margin-bottom:0" class="input">
								<option selected=selected>No County Selected</option>
									<?php echo $this->selectReportingCounties;?>
								</select></label>
								
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<?php $this->load->view($analytics_content_to_load);?>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- BEGIN PAGE CONTAINER-->		
		</div>
		<!-- END PAGE -->	
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
	      &copy; <?php echo date('Y');?> Ministry of Health, Government of Kenya
		<div class="span pull-right">
			<span class="go-top"><i class="icon-angle-up"></i></span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS -->
	<?php $this->load->view('segments/analytics_js'); ?>
	<script>
		$(document).ready(function(){
			var chart,div,survey;
			var subID,parentDiv;
			var county,facility,smallText;
			var district;
			var currentChart,currentDiv;
			var selectedOption;
			var appendToTitle,filter,click,neverList,noList;
			var comparing;
			
			var countyClicked;
			county=' ';
			survey = ' '
			county='<?php echo $this->session->userdata('county_analytics') ?>';
			if(county==''){
				county='Unselected';
			}
			//alert(county);
			click=0;
			survey = '<?php echo $this->session->userdata('survey')?>';
			
		$('#home-parent').addClass('active');
		$('#home-parent').append('<span class="selected"></span>');		
		$('#facility_list').hide();
		$('#reportingLabel').hide();
		$('#reporting').load('<?php echo base_url();?>c_analytics/getAllReportedCounties/'+survey);
		$('#reportingModalBody').load('<?php echo base_url();?>c_analytics/getAllReportedCounties/'+survey);
			if(county!='' && county!='Unselected'){				
				$("select#county_select").find("option").filter(function(index) {
  						  return county === $(this).text();
				}).prop("selected", "selected");
					county=encodeURIComponent(county);
				//Make Progress Visible
				$('#reportingLabel').show();
				//Load Progress
				//alert(county);
				$('#reportingBar').load('<?php echo base_url();?>c_analytics/getOneReportingCounty/'+county);
				
			}
			else{
				$('#reportingLabel').hide();
				$('#reportingBar').empty();
				$('#analytics-page').hide();
				$('#analytics-page').append('<h4 class="temp">Please Choose a County</h4>')
			}
			
			$('#reporting-parent').show();
			$('#analytics-page').hide();
			//Load Initial Graphs
			$('#graph_5').load('<?php echo base_url();?>c_analytics/getFacilityOwnerPerCounty/'+county);
			$('#graph_6').load('<?php echo base_url();?>c_analytics/getFacilityLevelPerCounty/'+county);
			
			
			$('#graph_40').load('<?php echo base_url();?>c_analytics/case_summary/Cases');
			$('#graph_41').load('<?php echo base_url();?>c_analytics/case_summary/Classification');		
			
			
			$('#graph_42').load('<?php echo base_url();?>c_analytics/guidelines_summary/2012%20IMCI');		
			$('#graph_43').load('<?php echo base_url();?>c_analytics/guidelines_summary/ICCM');		
			$('#graph_44').load('<?php echo base_url();?>c_analytics/guidelines_summary/ORT%20Corner');		
			$('#graph_45').load('<?php echo base_url();?>c_analytics/guidelines_summary/Paediatric%20Protocol');	
    	//Tools Summary
				$('#graph_46').load('<?php echo base_url();?>c_analytics/tools_summary/Under%205%20register');	
				ort='ORT Corner register';
				ort=encodeURI(ort);
				$('#graph_47').load('<?php echo base_url();?>c_analytics/tools_summary/'+ort);	
				$('#graph_48').load('<?php echo base_url();?>c_analytics/tools_summary/Mother%20Child%20Booklet');	
				$('#graph_49').load('<?php echo base_url();?>c_analytics/getFacilityLevelAll/'+survey);	
				$('#graph_60').load('<?php echo base_url();?>c_analytics/getFacilityOwnerAll/'+survey);	
				
				$('#graph_50').load('<?php echo base_url();?>c_analytics/training_summary/ICCM');	
				$('#graph_51').load('<?php echo base_url();?>c_analytics/training_summary/IMCI');	
				$('#graph_52').load('<?php echo base_url();?>c_analytics/training_summary/Enhanced%20Diarrhoea%20Management');	
				
				$('#graph_70').load('<?php echo base_url();?>c_analytics/training_summaryMnh/BEmONC');	
				$('#graph_71').load('<?php echo base_url();?>c_analytics/training_summaryMnh/PNC');	
				$('#graph_72').load('<?php echo base_url();?>c_analytics/training_summaryMnh/Essential%20Newborn%20care');	
				$('#graph_73').load('<?php echo base_url();?>c_analytics/training_summaryMnh/SBM-R');	
				$('#graph_74').load('<?php echo base_url();?>c_analytics/training_summaryMnh/FANC');	
				$('#graph_75').load('<?php echo base_url();?>c_analytics/training_summaryMnh/PAC');	
				$('#graph_76').load('<?php echo base_url();?>c_analytics/training_summaryMnh/MPDSR');	
				$('#graph_77').load('<?php echo base_url();?>c_analytics/training_summaryMnh/UBT');	
				
				
				$('#graph_78').load('<?php echo base_url();?>c_analytics/guidelines_summaryMNH/National%20Roadmap%20MMR');	
				$('#graph_79').load('<?php echo base_url();?>c_analytics/guidelines_summaryMNH/PMTCT%20guidelines');	
				$('#graph_80').load('<?php echo base_url();?>c_analytics/guidelines_summaryMNH/IYCF%20policy%20statement');	
				$('#graph_81').load('<?php echo base_url();?>c_analytics/guidelines_summaryMNH/Quality%20Obstetric%20and%20Prenatal%20Care');	
				$('#graph_82').load('<?php echo base_url();?>c_analytics/guidelines_summaryMNH/Baby%20Friendly%20Hospital%20Initiative');	
				$('#graph_83').load('<?php echo base_url();?>c_analytics/guidelines_summaryMNH/Post%20Abortion%20Guidelines');	
				
				
				
		$('select#county_select').change(function() {			
			countyClicked = $(this).val();//$('select#county_select option:selected').text();
			countyClicked = encodeURIComponent(countyClicked);
			
			window.location.href='<?php echo base_url()?>c_analytics/setActive/'+countyClicked+'/'+survey;
		});
					
			/**
			 *Assign County and Facility 
			 */
			currentChart='';
			district='';
			
			facility='';
			
			//Assign Secondary Filter
			filter = 'SevereDehydration';
			//Hide Secondary Filter
			$('.secondary-filter').hide();
			
			
			//Load District Names
			$('select#fi_district').load('<?php echo base_url()?>c_analytics/getSpecificDistrictNames');
			//$('select#fi_district2').load('<?php echo base_url()?>c_analytics/getSpecificDistrictNames');
			
			//Change Event for District Select
			$('select#fi_district').change(function(){
				
				$('#graph_3').empty();
				$('#graph_4').empty();
				district=$('select#fi_district option:selected').text();
				district = encodeURIComponent(district);
				//alert(currentChart+district+'/complete/ch');
				$(currentDiv).load(currentChart+'district/'+district+'/complete/'+survey+'/chart');
				//$('#graph_10').load(currentChart+'district/'+district+'/complete/ch/chart');
				$('select#fi_facility').load('<?php echo base_url()?>c_analytics/getFacilitiesByDistrictOptions/'+district+'/'+survey);
			});
						
			$('select#fi_facility').change(function(){
				$('#graph_4').empty();
				facility=$('select#fi_facility option:selected').attr('value');
				$('#graph_4').load(currentChart+'facility/'+facility+'/complete/'+survey+'/chart');
			});
			$('#facility_list').click(function(){
				window.open('<?php echo base_url();?>c_analytics/getFacilityListForNo/district/'+district+'/complete/'+survey+'/'+noList);
				
			});
			
			$('#facility_list_never').click(function(){
				window.open('<?php echo base_url();?>c_analytics/getFacilityListForNever/district/'+district+'/complete/'+survey+'/'+neverList);
				
			});
			
			$('#facility_list_no_mnh').click(function(){
				window.open('<?php echo base_url();?>c_analytics/getFacilityListForNoMNH/district/'+district+'/complete/'+survey+'/'+neverList);
				
			});
			$('#facility_list_commodity_supplies_county').click(function(){
				window.open('<?php echo base_url();?>c_analytics/commodity_supplies_summary/county/'+county+'/complete/'+survey);
				
			});
			$('#facility_list_commodity_supplies').click(function(){
				window.open('<?php echo base_url();?>c_analytics/commodity_supplies_summary/district/'+district+'/complete/'+survey);
				
			});
			
			//Home Action Event
			$('#home-parent').click(function(){
				$('h3.page-title').text('Analytics Summary for '+county+' County');
				$('h3.page-title').append('<small>Facts and Figures</small>');
				$('#breadcrumb-title').text('');
				$('#breadcrumb-sub-title').text('');
				
				$('.has-sub.start').removeClass('active');
				$('.has-sub.start a').remove('span');
				$('#home-parent').addClass('active');
				$('#home-parent').append('<span class="selected"></span>');
				$('#analytics-page').hide();
				$('#reporting-parent').show();
			});
			
			
			$('ul.sub li').click(function(){
				$('#facility_list').hide();
				$('#facility_list_never').hide();
				$('#facility_list_commodity_supplies_county').hide();
				$('#facility_list_commodity_supplies').hide();
				$('#facility_list_no_mnh').hide();
				$('#reporting-parent').hide();
				$('#analytics-page').show();
				click=1;
				subID = $(this).attr('id');
				//parentDiv = $('#'+subID+' a').parents('ul');
				//alert(parentDiv);
				//alert();
				$('ul.sub li').removeClass('active');
				$('#'+subID).addClass('active');				
				$('.has-sub.start').removeClass('active');
				$('.has-sub.start a').remove('span');
				
				if(subID=='facilities'){
					$('.span6').hide();
					$('#span1').show();
					$('#span1').animate({
						height:'200%',
						width:'100%'
					});
					$('#graph_2').animate({
						width:'2000px'
					});
					$('#port2').animate({
						height:'400px',
						width:'100%'
					});
				}
				else{
					$('.span6').css({
						'height':'100%',
						'width':'48.717948717948715%'
					});
					$('#graph_2').css({
						'width':'100%'
					});
					$('.span6').show();
					
				}
				
				if(subID=='caseTreatment'){
					$('.secondary-filter').show();
				}
				else{
					$('.secondary-filter').hide();
				}
				//Change Event for Secondary Filter
				$('select.secondary-filter').change(function(){
					$('#graph_1').empty();
					$('#graph_2').empty();
					$('#graph_3').empty();
					$('#graph_4').empty();
					thisID = $(this).attr('id');
					filter=$('select#'+thisID+' option:selected').attr('value');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getDiarrhoeaCaseTreatment/national/n/complete/'+survey+'/'+filter);
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getDiarrhoeaCaseTreatment/county/'+county+'/complete/'+survey+'/'+filter);
					if(thisID=='county'){
						$('select.secondary-filter#district').val(filter);
					}
					else{
						$('select.secondary-filter#county').val(filter);
					}
					
				});
				
				
				//Empty Graphs
				$('#graph_1').empty();
					$('#graph_2').empty();
					$('#graph_3').empty();
					$('#graph_4').empty();
					//reload district
					//Load District Names
			$('select#fi_district').load('<?php echo base_url()?>c_analytics/getSpecificDistrictNames');
					
				switch(subID){
					
					/*
					 * Overview Statistics
					 */
					case 'facilities':
					
					$('span.statistic').text('Facilities');
					$('#overview-statistics-parent').addClass('active');
					$('#overview-statistics-parent a').append('<span class="selected"></span>');
					
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCountyFacilities/1');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCountyFacilitiesByOwner/'+county);
						break;
							/*
					 * Facility Statistics
					 */
					case 'communityStrategy':
					currentChart = '<?php echo base_url();?>c_analytics/getCommunityStrategy/';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					$('span.statistic').text('Community Strategy');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCommunityStrategy/national/n/complete/ch/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCommunityStrategy/county/'+county+'/complete/ch/chart');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommunityStrategy/county/'+county+'/complete/ch/chart');
						break;
						
					case 'guidelines':
					noList='GuidelinesAvailability';
					$('#facility_list').show();
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getGuidelinesAvailability/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Guidelines');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getGuidelinesAvailability/national/n/complete/ch/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getGuidelinesAvailability/county/'+county+'/complete/ch/chart');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getGuidelinesAvailability/county/'+county+'/complete/ch/chart');
					
						break;
						
					case 'training':					
					$('#facility_list').show();
					appendToTitle = ' in the last 2 years';
					currentChart = '<?php echo base_url();?>c_analytics/getTrainedStaffOne/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Training');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getTrainedStaffOne/national/n/complete/ch/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getTrainedStaffOne/county/'+county+'/complete/ch/chart');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getTrainedStaff/county/'+county+'/complete/ch/chart');
						break;
						
					case 'childrenServices':
					noList='ServicesOffered';
					$('#facility_list').show();
					appendToTitle=' to children with diarrhoea';
					currentChart = '<?php echo base_url();?>c_analytics/getChildrenServices/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Services Offered');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getChildrenServices/national/n/complete/ch/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getChildrenServices/county/'+county+'/complete/ch/chart');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getChildrenServices/county/'+county+'/complete/ch/chart');
						break;
						
					case 'dangerSigns':
					noList='DangerSigns';
					$('#facility_list').show();
					appendToTitle=' assessed in ongoing session for a child with diarrhoea';
					currentChart = '<?php echo base_url();?>c_analytics/getDangerSigns/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Danger Signs');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getDangerSigns/national/n/complete/ch/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getDangerSigns/county/'+county+'/complete/ch/chart');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getDangerSigns/county/'+county+'/complete/ch/chart');
						break;	
						
					case 'actionsPerformed':
					noList='ActionsPerformed';
					$('#facility_list').show();
					appendToTitle = ' in ongoing sessions for a child with diarrhoea';
					currentChart = '<?php echo base_url();?>c_analytics/getActionsPerformed/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Actions Performed');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getActionsPerformed/national/n/complete/ch/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getActionsPerformed/county/'+county+'/complete/ch/chart');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getActionsPerformed/county/'+county+'/complete/ch/chart');
					
						break;	
						
					case 'counselGiven':
					noList='CounselGiven';
					$('#facility_list').show();
					appendToTitle=' in ongoing session for a child with diarrhoea';
					currentChart = '<?php echo base_url();?>c_analytics/getCounselGiven/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Counsel Given');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCounselGiven/national/n/complete/ch/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCounselGiven/county/'+county+'/complete/ch/chart');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCounselGiven/county/'+county+'/complete/ch/chart');
						break;	
						
					case 'tools':
					noList='Tools';
					$('#facility_list').show();
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getTools/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Tools in a given Unit');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getTools/national/n/complete/ch/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getTools/county/'+county+'/complete/ch/chart');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getTools/county/'+county+'/complete/ch/chart');
						break;	
						
					/*
					 * ------End of Facility Statistics
					 */
					/*
					 * Commodities
					 */
					case 'commodityFrequency':
					$('#facility_list_never').show();
					neverList='Commodity';
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getCommodityAvailabilityFrequency/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Commodity Availability');
					$('#commodities-parent').addClass('active');
					$('#commodities-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityFrequency/national/n/complete/ch/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityFrequency/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityFrequency/county/'+county+'/complete/ch');
						break;	
						
					case 'commodityUnavailability':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getCommodityAvailabilityUnavailability/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Commodity Reasons For Unavailability');
					$('#commodities-parent').addClass('active');
					$('#commodities-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityUnavailability/national/n/complete/ch/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityUnavailability/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityUnavailability/county/'+county+'/complete/ch');
						break;	
						
					case 'commodityLocation':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getCommodityAvailabilityLocation/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Commodity Location');
					$('#commodities-parent').addClass('active');
					$('#commodities-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityLocation/national/n/complete/ch/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityLocation/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityLocation/county/'+county+'/complete/ch');
						break;	
						
					case 'commodityQuantities':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getCommodityAvailabilityQuantities/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Commodity Quantities');
					$('#commodities-parent').addClass('active');
					$('#commodities-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityQuantities/national/n/complete/ch/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityQuantities/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityQuantities/county/'+county+'/complete/ch');
						break;	
						
					case 'commoditySuppliers':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getCHCommoditySupplier/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Commodity Suppliers');
					$('#commodities-parent').addClass('active');
					$('#commodities-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCHCommoditySupplier/national/n/complete/ch/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCHCommoditySupplier/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCHCommoditySupplier/county/'+county+'/complete/ch');
						break;	
					/*
					 * ------End of Commodities
					 */
					/*
					 * Diarrhoea Cases
					 */	
					case 'caseNumbers':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getDiarrhoeaCaseNumbers/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Case Numbers');
					$('#diarrhoea-cases-parent').addClass('active');
					$('#diarrhoea-cases-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getDiarrhoeaCaseNumbers/national/n/complete/ch');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getDiarrhoeaCaseNumbers/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getDiarrhoeaCaseNumbers/county/'+county+'/complete/ch');
						break;	
						
					case 'caseTreatment':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getDiarrhoeaCaseTreatment/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Case Treatment');
					$('#diarrhoea-cases-parent').addClass('active');
					$('#diarrhoea-cases-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getDiarrhoeaCaseTreatment/national/n/complete/ch/'+filter);
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getDiarrhoeaCaseTreatment/county/'+county+'/complete/ch/'+filter);
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getDiarrhoeaCaseTreatment/county/'+county+'/complete/ch');
						break;	
					/*
					 * ------End of Diarrhoea Cases
					 */
					/*
					 * ORT Corner
					 */	
					case 'ORTAssessment':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getORTCornerAssessment/';
					currentDiv = '#graph_3';
					$('span.statistic').text('ORT Assessment');
					$('#ORT-Corner-parent').addClass('active');
					$('#ORT-Corner-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getORTCornerAssessment/national/n/complete/ch');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getORTCornerAssessment/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getORTCornerAssessment/county/'+county+'/complete/ch');
						break;	
						
					case 'ORTEquipmentAvailability':
					$('#facility_list_never').show();
					neverList='ORT';
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getORTCornerEquipmentFrequency/';
					currentDiv = '#graph_3';
					$('span.statistic').text('ORT Equipment Availability');
					$('#ORT-Corner-parent').addClass('active');
					$('#ORT-Corner-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getORTCornerEquipmentFrequency/national/n/complete/ch');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getORTCornerEquipmentFrequency/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getORTCornerEquipmentFrequency/county/'+county+'/complete/ch');
						break;	
						
					case 'ORTEquipmentLocation':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getORTCornerEquipmentLocation/';
					currentDiv = '#graph_3';
					$('span.statistic').text('ORT Equipment Location');
					$('#ORT-Corner-parent').addClass('active');
					$('#ORT-Corner-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getORTCornerEquipmentLocation/national/n/complete/ch');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getORTCornerEquipmentLocation/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getORTCornerEquipmentLocation/county/'+county+'/complete/ch');
						break;	
						
					case 'ORTEquipmentFunctionality':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getORTCornerEquipmentAvailability/';
					currentDiv = '#graph_3';
					$('span.statistic').text('ORT Equipment Functionality');
					$('#ORT-Corner-parent').addClass('active');
					$('#ORT-Corner-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getORTCornerEquipmentAvailability/national/n/complete/ch');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getORTCornerEquipmentAvailability/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getORTCornerEquipmentAvailability/county/'+county+'/complete/ch');
						break;	
						
					case 'ORTSupplies':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getORTCornerSupplies/';
					currentDiv = '#graph_3';
					$('span.statistic').text('ORT Supplies');
					$('#ORT-Corner-parent').addClass('active');
					$('#ORT-Corner-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getORTCornerSupplies/national/n/complete/ch');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getORTCornerSupplies/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getORTCornerSupplies/county/'+county+'/complete/ch');
						break;
					/*
					 * ------End of ORT Corner
					 */
					/*
					 * Supplies
					 */
					case 'suppliesFrequency':
					$('#facility_list_never').show();
					neverList='Water';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					currentChart = '<?php echo base_url();?>c_analytics/getSuppliesFrequency/';
					$('span.statistic').text('Supplies Availability');
					$('#supplies-parent').addClass('active');
					$('#supplies-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getSuppliesFrequency/national/n/complete/ch');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getSuppliesFrequency/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
						
					case 'suppliesLocation':					
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getSuppliesLocation/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Supplies Location');
					$('#supplies-parent').addClass('active');
					$('#supplies-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getSuppliesLocation/national/n/complete/ch');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getSuppliesLocation/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
						
					case 'suppliesSuppliers':					
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getCHSuppliesSupplier/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Suppliers');
					$('#supplies-parent').addClass('active');
					$('#supplies-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCHSuppliesSupplier/national/n/complete/ch');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCHSuppliesSupplier/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
					/*
					 * Resources
					 */	
									
					case 'resourceAvailability':
					$('#facility_list_never').show();
					neverList='Resources';
					currentChart = '<?php echo base_url();?>c_analytics/getResourcesFrequency/';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					$('span.statistic').text('Hardware Resource Availability');
					$('#resources-parent').addClass('active');
					$('#resources-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getResourcesFrequency/national/n/complete/ch');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getResourcesFrequency/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
						
					case 'resourceLocation':
					currentChart = '<?php echo base_url();?>c_analytics/getResourcesLocation/';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					$('span.statistic').text('Hardware Resource Location');
					$('#resources-parent').addClass('active');
					$('#resources-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getResourcesLocation/national/n/complete/ch');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getResourcesLocation/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
						
					/**
				 * MNH Section
				 */
				case 'nursesDeployed':
					currentChart = '<?php echo base_url();?>c_analytics/getNursesDeployed/';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					$('span.statistic').text('Nurses Deployed');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getNursesDeployed/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getNursesDeployed/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
						
				case 'beds':
					currentChart = '<?php echo base_url();?>c_analytics/getBeds/';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					$('span.statistic').text('Beds in Facility');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getBeds/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getBeds/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
				
				case 'services':
					currentChart = '<?php echo base_url();?>c_analytics/getService/';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					$('span.statistic').text('Services in Facility');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getService/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getService/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
				
				case 'hfm':
					currentChart = '<?php echo base_url();?>c_analytics/getHFM/';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					$('span.statistic').text('Health Facility Management');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getHFM/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getHFM/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
				case 'deliveries':
					currentChart = '<?php echo base_url();?>c_analytics/getDeliveries/';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					neverList = 'prep';
					$('#facility_list_no_mnh').show();
					$('span.statistic').text('Deliveries');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getDeliveries/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getDeliveries/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
						
				case 'hiv':
					currentChart = '<?php echo base_url();?>c_analytics/getHIVTesting/';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					neverList = 'hiv';
					$('#facility_list_no_mnh').show();
					$('span.statistic').text('HIV Testing');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getHIVTesting/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getHIVTesting/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
				
				case 'newborn':
					currentChart = '<?php echo base_url();?>c_analytics/getNewbornCare/';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					neverList = 'newb';
					$('#facility_list_no_mnh').show();
					$('span.statistic').text('Newborn Care');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getNewbornCare/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getNewbornCare/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
						
				case 'kmc':
					currentChart = '<?php echo base_url();?>c_analytics/getKMC/';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					neverList = 'kang';
					$('#facility_list_no_mnh').show();
					$('span.statistic').text('Kangaroo Mother Care');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getKMC/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getKMC/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
				
				case 'jobaids':
					currentChart = '<?php echo base_url();?>c_analytics/getJobAids/';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					neverList = 'job';
					$('#facility_list_no_mnh').show();
					$('span.statistic').text('Job Aids');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getJobAids/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getJobAids/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
						
				case 'guidelinesmnh':
					currentChart = '<?php echo base_url();?>c_analytics/getGuidelinesAvailabilityMNH/';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					neverList = 'guide';
					$('#facility_list_no_mnh').show();
					$('span.statistic').text('Guidelines Availability');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getGuidelinesAvailabilityMNH/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getGuidelinesAvailabilityMNH/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
						
				case 'communitystrategy':
					currentChart = '<?php echo base_url();?>c_analytics/getCommunityStrategyMNH/';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					$('span.statistic').text('Community Strategy');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCommunityStrategyMNH/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCommunityStrategyMNH/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
				
				case 'staffTrainingMnh':
					currentChart = '<?php echo base_url();?>c_analytics/getTrainedStaffOne/';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					$('span.statistic').text('Staff Training');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getTrainedStaffOne/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getTrainedStaffOne/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
				
				/*
					 * Commodities
					 */
					case 'commodityFrequencyMnh':
					$('#facility_list_never').show();
					neverList='Commodity';
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getCommodityAvailabilityFrequency/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Commodity Availability');
					$('#commodities-parent-mnh').addClass('active');
					$('#commodities-parent-mnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityFrequency/national/n/complete/mnh/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityFrequency/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityFrequency/county/'+county+'/complete/mnh');
						break;	
						
					case 'commodityUnavailabilityMnh':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getCommodityAvailabilityUnavailability/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Commodity Reasons For Unavailability');
					$('#commodities-parent-mnh').addClass('active');
					$('#commodities-parent-mnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityUnavailability/national/n/complete/mnh/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityUnavailability/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityUnavailability/county/'+county+'/complete/mnh');
						break;	
						
					case 'commodityLocationMnh':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getCommodityAvailabilityLocation/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Commodity Location');
					$('#commodities-parent-mnh').addClass('active');
					$('#commodities-parent-mnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityLocation/national/n/complete/mnh/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityLocation/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityLocation/county/'+county+'/complete/mnh');
						break;	
						
					case 'commodityQuantitiesMnh':
					appendToTitle = ' ';
					$('#facility_list_commodity_supplies_county').show();
					$('#facility_list_commodity_supplies').show();
					currentChart = '<?php echo base_url();?>c_analytics/getCommodityAvailabilityQuantities/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Commodity Quantities');
					$('#commodities-parent-mnh').addClass('active');
					$('#commodities-parent-mnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityQuantities/national/n/complete/mnh/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCommodityAvailabilityQuantities/county/'+county+'/complete/mnh');
						break;	
						
					case 'commoditySuppliersMnh':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getCHCommoditySupplier/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Commodity Suppliers');
					$('#commodities-parent-mnh').addClass('active');
					$('#commodities-parent-mnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCHCommoditySupplier/national/n/complete/mnh/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCHCommoditySupplier/county/'+county+'/complete/mnh');
						break;	
					/*
					 * ------End of Commodities
					 */	
				
				/*
					 * Supplies
					 */
				case 'suppliesFrequencyMnh':
					$('#facility_list_never').show();
					neverList='Water';
					appendToTitle = ' ';
					currentDiv = '#graph_3';
					currentChart = '<?php echo base_url();?>c_analytics/getSuppliesFrequency/';
					$('span.statistic').text('Supplies Availability');
					$('#supplies-parentMnh').addClass('active');
					$('#supplies-parentMnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getSuppliesFrequency/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getSuppliesFrequency/county/'+county+'/complete/mnh');
						break;	
						
				case 'suppliesLocationMnh':					
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getSuppliesLocation/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Supplies Location');
					$('#supplies-parentMnh').addClass('active');
					$('#supplies-parentMnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getSuppliesLocation/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getSuppliesLocation/county/'+county+'/complete/mnh');
						break;	
						
				case 'suppliesSuppliersMnh':					
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getCHSuppliesSupplier/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Suppliers');
					$('#supplies-parentMnh').addClass('active');
					$('#supplies-parentMnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCHSuppliesSupplier/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCHSuppliesSupplier/county/'+county+'/complete/mnh');
						break;	
						
				/**
				 *Signal functions 
				 */
				case 'cemonc':					
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getCEOC/';
					currentDiv = '#graph_3';
					$('span.statistic').text('CEmONC Signal Function');
					$('#signal-parentMnh').addClass('active');
					$('#signal-parentMnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCEOC/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCEOC/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/mnh');
						break;	
						
				case 'cemoncReason':					
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getCEOCReason/';
					currentDiv = '#graph_3';
					$('span.statistic').text('CEmONC Signal Function Challenges');
					$('#signal-parentMnh').addClass('active');
					$('#signal-parentMnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCEOCReason/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getCEOCReason/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/mnh');
						break;	
						
				case 'bemonc':					
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getBEMONC/';
					currentDiv = '#graph_3';
					$('span.statistic').text('BEmONC Signal Function');
					$('#signal-parentMnh').addClass('active');
					$('#signal-parentMnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getBEMONC/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getBEMONC/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/mnh');
						break;	
						
				case 'bemoncReason':					
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getBEMONCReason/';
					currentDiv = '#graph_3';
					$('span.statistic').text('BEmONC Signal Function Challenges');
					$('#signal-parentMnh').addClass('active');
					$('#signal-parentMnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getBEMONCReason/national/n/complete/mnh');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getBEMONCReason/county/'+county+'/complete/mnh');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/complete/mnh');
						break;	
				
				/*
					 * Equipment Corner
					 */	
					
						
					case 'equipmentFrequency':
					$('#facility_list_never').show();
					neverList='ORT';
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getEquipmentFrequency/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Equipment Availability');
					$('#equipments-parent-mnh').addClass('active');
					$('#equipments-parent-mnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getEquipmentFrequency/national/n/complete/ch');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getEquipmentFrequency/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getEquipmentFrequency/county/'+county+'/complete/ch');
						break;	
						
					case 'equipmentLocation':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getEquipmentLocation/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Equipment Location');
					$('#equipments-parent-mnh').addClass('active');
					$('#equipments-parent-mnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getEquipmentLocation/national/n/complete/ch');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getEquipmentLocation/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getEquipmentLocation/county/'+county+'/complete/ch');
						break;	
						
					case 'equipmentFunctionality':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getEquipmentFunctionality/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Equipment Functionality');
					$('#equipments-parent-mnh').addClass('active');
					$('#equipments-parent-mnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getEquipmentFunctionality/national/n/complete/ch');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getEquipmentFunctionality/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getEquipmentAvailability/county/'+county+'/complete/ch');
						break;	
						
					case 'equipmentFunctionality':
					appendToTitle = ' ';
					currentChart = '<?php echo base_url();?>c_analytics/getEquipmentAvailability/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Equipment Functionality');
					$('#equipments-parent-mnh').addClass('active');
					$('#equipments-parent-mnh a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getEquipmentAvailability/national/n/complete/ch');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getEquipmentAvailability/county/'+county+'/complete/ch');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getEquipmentAvailability/county/'+county+'/complete/ch');
						break;	
						
				
				}
				
				
				//Set Title Text
				
				smallText=$('ul.sub li.active a').text();
				//$('h3.page-title').text($('li.has-sub.start.open a span.title').text());
				$('h3.page-title').text(smallText+appendToTitle);
				$('#breadcrumb-title').text($('li.has-sub.start.open a span.title').text());
				$('#breadcrumb-sub-title').text(smallText);
			});
			
			
				//Bootbox
				$("#district_compare").click(function(){
					compare='district';
					//Load fields
			$('select#compare_1').load('<?php echo base_url()?>c_analytics/getSpecificDistrictNames');					
			$('select#compare_2').load('<?php echo base_url()?>c_analytics/getSpecificDistrictNames');
					$("#graph_10").empty();
					$("#graph_11").empty();
					$('#compareModal').modal('show');
					
					//district = encodeURI(district);
					statistic = $('ul.sub li.active a').text();
					$('#compare_title').text(statistic);
					$('#compare_title_1').text(statistic);
					$('#compare_title_2').text(statistic);
					$('#graph_10').delay(4000).queue(function( nxt ) {
						district = decodeURI(district);
					$("select#compare_1").val(district);
					district = encodeURI(district);
    					$('#graph_10').load(currentChart+'district/'+district+'/complete/'+survey+'/chart');
    					nxt();
					});
					
					//clearInterval(loadChart);
					
					
					
					//$('').load('');
					//bootbox.alert().load("<div>HELLO</div>");
				});
				
				$("#county_compare").click(function(){
					compare='county';
					$('select#compare_1').empty();				
					$('select#compare_2').empty();
					$('select#compare_1').load('<?php echo base_url()?>c_analytics/getReportingCountyList/'+survey);					
					$('select#compare_2').load('<?php echo base_url()?>c_analytics/getReportingCountyList/'+survey);
					$("#graph_10").empty();
					$("#graph_11").empty();
					$('#compareModal').modal('show');
					
					//county = decodeURI(county);
					statistic = $('ul.sub li.active a').text();
					$('#compare_title').text(statistic);
					$('#compare_title_1').text(statistic);
					$('#compare_title_2').text(statistic);
					$('#graph_10').delay(4000).queue(function( nxt ) {
						county = decodeURI(county);
					$("select#compare_1").val(county);
					county = encodeURI(county);
    					$('#graph_10').load(currentChart+'county/'+county+'/complete/'+survey+'/chart');
    					nxt();
					});
				});
				//Change Event for District Select
				$('select#compare_1').change(function(){
				$("#graph_10").empty();			
				compar2=$('select#compare_1 option:selected').text();
				compar2 = encodeURIComponent(compar2);
				$("#graph_10").load(currentChart+compare+'/'+compar2+'/complete/'+survey+'/chart');
				//$('#graph_10').load(currentChart+'district/'+district+'/complete/ch/chart');
				});
				
				$('select#compare_2').change(function(){	
				$("#graph_11").empty();					
				compar=$('select#compare_2 option:selected').text();
				compar = encodeURIComponent(compar);
				$("#graph_11").load(currentChart+compare+'/'+compar+'/complete/'+survey+'/chart');
				//$('#graph_10').load(currentChart+'district/'+district+'/complete/ch/chart');
				});
				
				//Summary
				
				
				
	$('#mnh-form').click(function(){
			window.open('<?php echo base_url();?>c_pdf/loadPDF/mnh');
		});
		$('#mch-form').click(function(){
			window.open('<?php echo base_url();?>c_pdf/loadPDF/mch');
		});			
				
});

	</script>
	<!-- END JAVASCRIPTS -->
	<?php $this->load->view('segments/modals')?>
</body>
<!-- END BODY -->
</html>