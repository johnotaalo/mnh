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
	<?php $this->load->view('segments/analytics_header');?>
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
							<h4 style="float:right;padding-right:3%;"><?php echo $this->session->userdata('county_analytics') ?></h4>
						</h3>
						
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo base_url() ?>ch/analytics">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#" id="breadcrumb-title"></a></li>
							<i class="icon-angle-right"></i>
							<li><a href="#" id="breadcrumb-sub-title"></a></li>
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
		$().ready(function(){
			var chart,div;
			var subID,parentDiv;
			var county,facility,smallText;
			var district;
			var currentChart,currentDiv;
			var selectedOption;
			/**
			 *Assign County and Facility 
			 */
			currentChart='';
			district='';
			county='<?php echo $this->session->userdata('county_analytics') ?>';
			facility='';
			$('select#fi_district').load('<?php echo base_url()?>c_analytics/getSpecificDistrictNames');
			$('select#fi_district2').load('<?php echo base_url()?>c_analytics/getSpecificDistrictNames');
			$('select#fi_district').change(function(){
				$('#graph_2').empty();
				$('#graph_3').empty();
				district=$('select#fi_district option:selected').text();
				//alert(currentChart+district+'/complete/ch');
				$(currentDiv).load(currentChart+'district/'+district+'/complete/ch');
				$('select#fi_facility').load('<?php echo base_url()?>c_analytics/getFacilitiesByDistrictOptions/'+district);
			});
			
			$('select#fi_district2').change(function(){
				$('#graph_2').empty();
				$('#graph_3').empty();
				district=$('select#fi_district2 option:selected').text();
				//alert(currentChart+district+'/complete/ch');
				$(currentDiv).load(currentChart+'district/'+district+'/complete/ch');
				$('select#fi_district').val(district);
				$('select#fi_facility').load('<?php echo base_url()?>c_analytics/getFacilitiesByDistrictOptions/'+district);
			});
			
			$('select#fi_facility').change(function(){
				//alert('change');
				facility=$('select#fi_facility option:selected').attr('value');
				//alert(facility);
				//alert(currentChart+district+'/complete/ch');
				$('#graph_2').load(currentChart+'facility/'+facility+'/complete/ch');
			});
			
			$('ul.sub li').click(function(){
				subID = $(this).attr('id');
				//parentDiv = $('#'+subID+' a').parents('ul');
				//alert(parentDiv);
				//alert();
				
				$('ul.sub li').removeClass('active');
				$('#'+subID).addClass('active');				
				$('.has-sub.start').removeClass('active');
				$('.has-sub.start a').remove('span');
				smallText=$('ul.sub li.active a').text();
				$('h3.page-title').text($('li.has-sub.start.open a span.title').text());
				$('h3.page-title').append('<small>'+smallText+'</small>');
				$('#breadcrumb-title').text($('li.has-sub.start.open a span.title').text());
				$('#breadcrumb-sub-title').text(smallText);
				switch(subID){
					/*
					 * Facility Statistics
					 */
					case 'communityStrategy':
					$('span.statistic').text('Community Strategy');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCommunityStrategy/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getCommunityStrategy/county/'+county+'/complete/ch');
						break;
						
					case 'guidelines':
					currentChart = '<?php echo base_url();?>c_analytics/getGuidelinesAvailability/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Guidelines');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getGuidelinesAvailability/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getGuidelinesAvailability/county/'+county+'/complete/ch');
					
						break;
						
					case 'training':
					currentChart = '<?php echo base_url();?>c_analytics/getTrainedStaff/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Training');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getTrainedStaff/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getTrainedStaff/county/'+county+'/complete/ch');
						break;
						
					case 'childrenServices':
					currentChart = '<?php echo base_url();?>c_analytics/getChildrenServices/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Children Services');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getChildrenServices/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getChildrenServices/county/'+county+'/complete/ch');
						break;
						
					case 'dangerSigns':
					currentChart = '<?php echo base_url();?>c_analytics/getDangerSigns/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Danger Signs');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getDangerSigns/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getDangerSigns/county/'+county+'/complete/ch');
						break;	
						
					case 'actionsPerformed':
					currentChart = '<?php echo base_url();?>c_analytics/getActionsPerformed/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Actions Performed');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getActionsPerformed/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getActionsPerformed/county/'+county+'/complete/ch');
					
						break;	
						
					case 'counselGiven':
					currentChart = '<?php echo base_url();?>c_analytics/getCounselGiven/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Counsel Given');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCounselGiven/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getCounselGiven/county/'+county+'/complete/ch');
						break;	
						
					case 'tools':
					currentChart = '<?php echo base_url();?>c_analytics/getTools/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Tools');
					$('#facility-statistics-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getTools/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getTools/county/'+county+'/complete/ch');
						break;	
						
					/*
					 * ------End of Facility Statistics
					 */
					/*
					 * Commodities
					 */
					case 'availability':
					$('span.statistic').text('Availability');
					$('#commodities-parent').addClass('active');
					$('#facility-statistics-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getDangerSigns/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getDangerSigns/county/'+county+'/complete/ch');
						break;	
					/*
					 * ------End of Commodities
					 */
					/*
					 * Diarrhoea Cases
					 */	
					case 'caseNumbers':
					currentChart = '<?php echo base_url();?>c_analytics/getDiarrhoeaCaseNumbers/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Case Numbers');
					$('#diarrhoea-cases-parent').addClass('active');
					$('#diarrhoea-cases-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getDiarrhoeaCaseNumbers/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getDiarrhoeaCaseNumbers/county/'+county+'/complete/ch');
						break;	
						
					case 'caseTreatment':
					currentChart = '<?php echo base_url();?>c_analytics/getDiarrhoeaCaseTreatment/';
					currentDiv = '#graph_3';
					$('span.statistic').text('Case Treatment');
					$('#diarrhoea-cases-parent').addClass('active');
					$('#diarrhoea-cases-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getDiarrhoeaCaseTreatment/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getDiarrhoeaCaseTreatment/county/'+county+'/complete/ch');
						break;	
					/*
					 * ------End of Diarrhoea Cases
					 */
					/*
					 * ORT Corner
					 */	
					case 'ORTAssessment':
					currentChart = '<?php echo base_url();?>c_analytics/getORTCornerAssessment/';
					currentDiv = '#graph_3';
					$('span.statistic').text('ORT Assessment');
					$('#ORT-Corner-parent').addClass('active');
					$('#ORT-Corner-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getORTCornerAssessment/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getORTCornerAssessment/county/'+county+'/complete/ch');
						break;	
						
					case 'ORTEquipment':
					$('span.statistic').text('ORT Equipment');
					$('#ORT-Corner-parent').addClass('active');
					$('#ORT-Corner-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getORTCornerEquipmemnt/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getORTCornerEquipmemnt/county/'+county+'/complete/ch');
						break;	
						
					case 'ORTSupplies':
					$('span.statistic').text('ORT Supplies');
					$('#ORT-Corner-parent').addClass('active');
					$('#ORT-Corner-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getORTCornerSupplies/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getORTCornerSupplies/county/'+county+'/complete/ch');
						break;
					/*
					 * ------End of ORT Corner
					 */
					/*
					 * Resources
					 */	
					case 'safeWater':
					$('span.statistic').text('Safe Water');
					$('#resources-parent').addClass('active');
					$('#resources-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
						
					case 'hardwareResources':
					$('span.statistic').text('Hardware Resources');
					$('#resources-parent').addClass('active');
					$('#resources-parent a').append('<span class="selected"></span>');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
					$('#graph_3').load('<?php echo base_url();?>c_analytics/getResources/county/'+county+'/complete/ch');
						break;	
					
				}
				
			});
				// Build the charts
});

	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>