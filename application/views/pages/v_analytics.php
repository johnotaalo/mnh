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
							<?php echo $analytics_main_title; ?> <small><?php echo $analytics_mini_title; ?></small>
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
			var chart,div;
			var subID,parentDiv;
			var county,facility,smallText;
			var district;
			var currentChart,currentDiv;
			var selectedOption;
			var appendToTitle,filter,click;
			
			var countyClicked;
			county=' ';
			county='<?php echo $this->session->userdata('county_analytics') ?>';
			if(county==''){
				county='Unselected';
			}
			//alert(county);
			click=0;
			
		$('#facility_list').hide();
		$('#reportingLabel').hide();
		$('#reporting').load('<?php echo base_url();?>c_analytics/getAllReportedCounties');
		$('#reportingModalBody').load('<?php echo base_url();?>c_analytics/getAllReportedCounties');
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
				$('.span6').hide();
				$('#analytics-page').append('<h4 class="temp">Please Choose a County</h4>')
			}
			
					
				
		$('select#county_select').change(function() {			
			countyClicked = $(this).val();//$('select#county_select option:selected').text();
			countyClicked = encodeURIComponent(countyClicked);
			
			window.location.href='<?php echo base_url()?>c_analytics/setActive/'+countyClicked;
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
				$(currentDiv).load(currentChart+'district/'+district+'/complete/ch/chart');
				$('select#fi_facility').load('<?php echo base_url()?>c_analytics/getFacilitiesByDistrictOptions/'+district);
			});
						
			$('select#fi_facility').change(function(){
				//alert('change');
				facility=$('select#fi_facility option:selected').attr('value');
				$('#graph_4').load(currentChart+'facility/'+facility+'/complete/ch/chart');
			});
			$('#facility_list').click(function(){
				window.open(currentChart+'district/'+district+'/complete/ch/list');
				
			});
			
			//Home Action Event
			$('#home-parent').click(function(){
				$('h3.page-title').text('Analytics Summary');
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
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getDiarrhoeaCaseTreatment/national/n/complete/ch/'+filter);
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getDiarrhoeaCaseTreatment/county/'+county+'/complete/ch/'+filter);
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
					currentChart = '<?php echo base_url();?>c_analytics/getTrainedStaff/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Training');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getTrainedStaff/national/n/complete/ch/chart');
					$('#graph_2').load('<?php echo base_url();?>c_analytics/getTrainedStaff/county/'+county+'/complete/ch/chart');
					//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getTrainedStaff/county/'+county+'/complete/ch/chart');
						break;
						
					case 'childrenServices':
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
					$('span.statistic').text('Supplies Location');
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
						
					
				}
				
				//Set Title Text
				
				smallText=$('ul.sub li.active a').text();
				//$('h3.page-title').text($('li.has-sub.start.open a span.title').text());
				$('h3.page-title').text(smallText+appendToTitle);
				$('#breadcrumb-title').text($('li.has-sub.start.open a span.title').text());
				$('#breadcrumb-sub-title').text(smallText);
			});
			if(click==0){
				$('.span6').hide();
				//$('#analytics-page').append('<h4 class="temp">Please Choose a Statistic from the menu on the <b>LEFT</b></h4>')
			}
			else{
				$('.span6').show();
				$('#analytics-page h4.temp').css('color','white');
			}
				// Build the charts
});

	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>