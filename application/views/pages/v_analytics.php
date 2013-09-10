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
			// Build the charts
			<?php if($data_pie!=null){?>
				draw_pie('#graph_1');draw_pie('#graph_3');
			<?php }if(isset($data_column['categories'])){?>
				 draw_section2_stacked_column('#graph_1');draw_section2_stacked_column('#graph_3');
		    <?php }if(isset($data_column_combined['frequency']['categories'])){?>
		    	 draw_section2_commodity_frquency_availability_stacked_column('#graph_1');
		    	 draw_section2_commodity_frquency_availability_stacked_column('#graph_3');
		     <?php }if(isset($data_column_combined['unavailability']['categories'])){?>
		    	 draw_section2_commodity_unavailability_stacked_column('#graph_2');
		    	 draw_section2_commodity_unavailability_stacked_column('#graph_4');
		    <?php }if(isset($data_column_combined['location']['categories'])){?>
		    	 draw_section2_commodity_location_stacked_column('#graph_5');
		    	 draw_section2_commodity_location_stacked_column('#graph_7');
	    	 <?php }if(isset($data_column_combined['quantities']['categories'])){?>
		    	 draw_section2_commodity_availability_by_qty_stacked_column('#graph_6');
		    	 draw_section2_commodity_availability_by_qty_stacked_column('#graph_8');
		    	<?php }?>
    });
    
    function draw_pie(div){
			$(div).highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 1,
                plotShadow: true
            },
            title: {
                text: null
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: '<?php echo $analytics_mini_title; ?>',
                data: [<?php if($data_pie!=null)echo $data_pie; ?>]
            }]
        });
		}//end of draw_pie()
		
		function draw_section2_stacked_column(div){
			 $(div).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: null
            },
            xAxis: {
                categories: <?php if(isset($data_column['categories'])){echo $data_column['categories'];}else{print 'null';}; ?>,
                title:{text:'Guidelines'}
            },
            yAxis: {
                min: 0,
                title: {
                    text: '<?php echo $analytics_mini_title; ?>'
                }
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                shared: true
            },
            plotOptions: {
                column: {
                    stacking: 'percent'
                }
            },
                series: [{<?php if(isset($data_column))if($data_column!=null){echo $data_column['yes_values'];}?>},{<?php if(isset($data_column))if($data_column!=null){echo $data_column['no_values']; };?>}]
        });
		}
		
		function draw_section2_commodity_frquency_availability_stacked_column(div){
			 $(div).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: null
            },
            xAxis: {
                categories: <?php if(isset($data_column_combined['frequency']['categories'])){echo $data_column_combined['frequency']['categories'];}else{print 'null';}; ?>,
                title:{text:'Essential Commodities'}
            },
            yAxis: {
                min: 0,
                title: {
                    text: '<?php echo $analytics_mini_title; ?>'
                }
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                shared: true
            },
            plotOptions: {
                column: {
                    stacking: 'percent'
                }
            },
                series: [{<?php if($data_column_combined!=null){echo $data_column_combined['frequency']['Available'];};?>},{<?php if($data_column_combined!=null){echo $data_column_combined['frequency']['Sometimes Available']; }?>},{<?php if($data_column_combined!=null){echo $data_column_combined['frequency']['Never Available']; }?>}]
        });
		}
		
		function draw_section2_commodity_unavailability_stacked_column(div){
			 $(div).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: null
            },
            xAxis: {
                categories: <?php if(isset($data_column_combined['unavailability']['categories'])){echo $data_column_combined['unavailability']['categories'];}else{print 'null';}; ?>,
                title:{text:'Essential Commodities'}
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Reason for Unavailability'
                }
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                shared: true
            },
            plotOptions: {
                column: {
                    stacking: 'percent'
                }
            },
                series: [{<?php if($data_column_combined!=null){echo $data_column_combined['unavailability']['All Used'];};?>},{<?php if($data_column_combined!=null){echo $data_column_combined['unavailability']['Expired']; }?>},{<?php if($data_column_combined!=null){echo $data_column_combined['unavailability']['Not Ordered']; }?>},{<?php if($data_column_combined!=null){echo $data_column_combined['unavailability']['Ordered but not yet Received']; }?>}]
        });
		}
		
		function draw_section2_commodity_location_stacked_column(div){
			 $(div).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: null
            },
            xAxis: {
                categories: <?php if(isset($data_column_combined['location']['categories'])){echo $data_column_combined['location']['categories'];}else{print 'null';}; ?>,
                title:{text:'Essential Commodities'}
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Location of Availability'
                }
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                shared: true
            },
            plotOptions: {
                column: {
                    stacking: 'percent'
                }
            },
                series: [{<?php if($data_column_combined!=null){echo $data_column_combined['location']['OPD'];};?>},{<?php if($data_column_combined!=null){echo $data_column_combined['location']['MCH']; }?>},{<?php if($data_column_combined!=null){echo $data_column_combined['location']['U5 Clinic']; }?>},{<?php if($data_column_combined!=null){echo $data_column_combined['location']['Ward']; }?>},{<?php if($data_column_combined!=null){echo $data_column_combined['location']['Other']; }?>}]
        });
		}
		
		function draw_section2_commodity_availability_by_qty_stacked_column(div){
			 $(div).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: null
            },
            xAxis: {
                categories: <?php if(isset($data_column_combined['quantities']['categories'])){echo $data_column_combined['quantities']['categories'];}else{print 'null';}; ?>,
                title:{text:'Essential Commodities'}
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Availbility by Quantity'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.0f} units</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                pointPadding: 0.2,
                    borderWidth: 0
            },
                series: [{<?php if($data_column_combined!=null){echo $data_column_combined['quantities']['Zinc Sulphate'].'},{'.$data_column_combined['quantities']['Low Osmolarity Oral Rehydration Salts (ORS)'].'},{'.$data_column_combined['quantities']['Ciprofloxacin'].'},{'.$data_column_combined['quantities']['Metronidazole (Flagyl)'].'},{'.$data_column_combined['quantities']['Vitamin A'];}?>}]
        });
		}


	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>