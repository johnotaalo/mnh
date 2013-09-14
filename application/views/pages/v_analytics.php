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
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo base_url() ?>ch/analytics">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#"><?php echo $analytics_main_title; ?></a></li>
							<i class="icon-angle-right"></i>
							<li><a href="#"><?php echo $analytics_mini_title; ?></a></li>
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
			$('ul.sub li').click(function(){
				subID = $(this).attr('id');
				//parentDiv = $('#'+subID+' a').parents('ul');
				//alert(parentDiv);
				$('ul.sub li').removeClass('active');
				$('#'+subID).addClass('active');				
				$('.has-sub.start').removeClass('active');
				switch(subID){
					/*
					 * Facility Statistics
					 */
					case 'communityStrategy':
					$('span.statistic').text('Community Strategy');
					$('#facility-statistics-parent').addClass('active');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCommunityStrategy/facility/17052/complete/ch');
						break;
						
					case 'guidelines':
					$('span.statistic').text('Guidelines');
					$('#facility-statistics-parent').addClass('active');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getGuidelinesAvailability');
						break;
						
					case 'training':
					$('span.statistic').text('Training');
					$('#facility-statistics-parent').addClass('active');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getTrainedStaff');
						break;
						
					case 'childrenServices':
					$('span.statistic').text('Children Services');
					$('#facility-statistics-parent').addClass('active');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getChildrenServices');
						break;
						
					case 'dangerSigns':
					$('span.statistic').text('Danger Signs');
					$('#facility-statistics-parent').addClass('active');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getDangerSigns');
						break;	
						
					case 'actionsPerformed':
					$('span.statistic').text('Actions Performed');
					$('#facility-statistics-parent').addClass('active');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getActionsPerformed');
						break;	
						
					case 'counselGiven':
					$('span.statistic').text('Counsel Given');
					$('#facility-statistics-parent').addClass('active');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getCounselGiven');
						break;	
						
					case 'tools':
					$('span.statistic').text('Tools');
					$('#facility-statistics-parent').addClass('active');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getTools');
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
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getTools');
						break;	
					/*
					 * ------End of Commodities
					 */
					/*
					 * Diarrhoea Cases
					 */	
					case 'caseNumbers':
					$('span.statistic').text('Case Numbers');
					$('#diarrhoea-cases-parent').addClass('active');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getDiarrhoeaCaseNumbers');
						break;	
						
					case 'caseTreatment':
					$('span.statistic').text('Case Treatment');
					('#diarrhoea-cases-parent').addClass('active');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getDiarrhoeaCaseTreatment');
						break;	
					/*
					 * ------End of Diarrhoea Cases
					 */
					/*
					 * ORT Corner
					 */	
					case 'ORTAssessment':
					$('span.statistic').text('ORT Assessment');
					$('#ORT-Corner-parent').addClass('active');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getORTCornerAssessment');
						break;	
						
					case 'ORTEquipment':
					$('span.statistic').text('ORT Equipment');
					$('#ORT-Corner-parent').addClass('active');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getORTCornerEquipmemnt');
						break;	
						
					case 'ORTSupplies':
					$('span.statistic').text('ORT Supplies');
					$('#ORT-Corner-parent').addClass('active');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getORTCornerSupplies');
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
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getResources');
						break;	
						
					case 'hardwareResources':
					$('span.statistic').text('Hardware Resources');
					$('#resources-parent').addClass('active');
					$('#graph_1').load('<?php echo base_url();?>c_analytics/getResources');
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