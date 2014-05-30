<style>
	.chart {
		overflow-y: auto;
	}
</style>

<?php
switch($this->session->userdata('survey')) {
case 'ch' :

?>
<!-- BEGIN CHART PORTLET 1-->
<div class="row-fluid" id="reporting-parent">
	<div class="span6" id="span1">
		<div class="portlet box ">
			<div class="portlet-title">
				<h4 id="countyHeader">County</h4>
				<h4 id="progressHeader">Reporting Progress</h4>
			</div>

			<div id="reporting"></div>
		</div>
		<div class="portlet box">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i>Diarrhoea Treatment</h4>

			</div>
			<div class="portlet-body">

				<div id="graph_41" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>2012 IMCI</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_42" class="chart"></div>
			</div>
		</div>
		<div class="portlet box">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>Paediatric Protocol</h4>

			</div>
			<div class="portlet-body">

				<div id="graph_45" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Tools</span>ORT Corner Register(improvised)</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_47" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Tools</span>Under 5 Register</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_46" class="chart"></div>
			</div>
		</div>

		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Training</span>ICCM</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_50" class="chart"></div>
			</div>
		</div>

	</div>

	<div class="span6">
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Reporting Facility Levels</span>Summary</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_49" class="chart"></div>
			</div>
		</div>

		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i>Diarrhoea Cases</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_40" class="chart"></div>
			</div>
		</div>
		<div class="portlet box">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>ICCM</h4>

			</div>
			<div class="portlet-body">

				<div id="graph_43" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>ORT Corner</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_44" class="chart"></div>
			</div>
		</div>

		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Tools</span>Mother Child Booklet</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_48" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Training</span>IMCI</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_51" class="chart"></div>
			</div>
		</div>

		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Training</span>Enhanced Diarrhoea Management</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_52" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Consultation</span>IMCI</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_85" class="chart"></div>
			</div>
		</div>
        
</div>

<!-- END CHART PORTLET-->
<?php

break;

case 'mnh':
?>
<div class="row-fluid" id="reporting-parent">
	<div class="span6" id="span1">
		<div class="portlet box ">
			<div class="portlet-title">
				<h4 id="countyHeader">County</h4>
				<h4 id="progressHeader">Reporting Progress</h4>
			</div>

			<div id="reporting"></div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Reporting Facility Ownership</span>Summary</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_60" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>BEmONC</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_70" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>PNC</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_71" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>Essential Newborn Care</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_72" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>SBM-R</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_73" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>National Roadmap MMR</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_78" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>PMTCT</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_79" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>IYCF Policy Statement</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_80" class="chart"></div>
			</div>
		</div>

	</div>

	<div class="span6">
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Reporting Facility Levels</span>Summary</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_49" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>FANC</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_74" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>PAC</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_75" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>MPDSR</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_76" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>UBT</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_77" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>Quality Obstetric and Prenatal Care</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_81" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>Baby Friendly Hospital Initiative</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_82" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>Post Abortion Guidelines</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_83" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">u5</span>IMCI</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_85" class="chart"></div>
			</div>
		</div>
		<!--

            INDICATOR CHART

		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>Indicator Trial</h4>
			</div>
			<div class="portlet-body">

				<div id="graph_84" class="chart"></div>
			</div>
		</div>-->

	</div>
</div>
<?php
break;
}
?>

<div class="row-fluid" id="analytics-page">
	<div class="span6" id="span1">
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic"></span> Aggregated Analysis</h4>
			</div>
			<div class="portlet-body">
				<div class="clearfix">
					<div class="control-group pull-left">
						<select class="secondary-filter" id="secondary-aggregated">
							<option value="SevereDehydration">Severe Dehydration</option>
							<option value="SomeDehydration">Some Dehydration</option>
     						<option value="NoDehydration">No Dehydration</option>
							<option value="Dysentry">Dysentry</option>
							<option value="NoClassification">No Classification</option>
						</select>
					</div>
				</div>
				<div id="graph_1" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic"></span> By District</h4>
				<div class="control-group pull-right">
					<h6 class="compare" id="district_compare"><i class="icon-adjust"></i> Compare </h6>
				</div>

			</div>
			<div class="portlet-body">
				<div class="clearfix">
					<div class="clearfix">
						<div class="control-group pull-left">
							<select class="secondary-filter" id="secondary-district">
								<option value="SevereDehydration">Severe Dehydration</option>
								<option value="SomeDehydration">Some Dehydration</option>
								<option value="NoDehydration">No Dehydration</option>
								<option value="Dysentry">Dysentry</option>
								<option value="NoClassification">No Classification</option>
							</select>
						</div>
						<div class="control-group pull-right">
							Filter
							<select name="fi_district" id="fi_district">
								<option value="all" selected="">No District Chosen</option>

							</select>
						</div>
					</div>
				</div>
				<div id="graph_3" class="chart"></div>
				<button class="btn red" id="facility_list" style="float:left;padding:2px 5px 2px 5px">
					<i class="icon-list" style="margin-right:5px"></i>Download Facility List
				</button>
				<button class="btn red" id="facility_list_never" style="float:left;padding:2px 5px 2px 5px">
					<i class="icon-list" style="margin-right:5px"></i>Download Facility List
				</button>
				<button class="btn blue" id="facility_list_commodity_supplies" style="float:left;padding:2px 5px 2px 5px">
					<i class="icon-list" style="margin-right:5px"></i>Download Summary Data
				</button>
				<button class="btn red" id="facility_list_no_mnh" style="float:left;padding:2px 5px 2px 5px">
					<i class="icon-list" style="margin-right:5px"></i>Download Facility List
				</button>
				
				
			</div>
		</div>

	</div>

	<div class="span6">
		<div class="portlet box">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic"> </span> By County</h4>
				<div class="control-group pull-right">
					<h6 class="compare" id="county_compare" ><i class="icon-adjust"></i> Compare </h6>
				</div>
			</div>
			<div class="portlet-body">
				<div class="clearfix">
					<div class="control-group pull-left">

						<select class="secondary-filter" id="secondary-county">
							<option value="SevereDehydration">Severe Dehydration</option>
							<option value="SomeDehydration">Some Dehydration</option>
							<option value="NoDehydration">No Dehydration</option>
							<option value="Dysentry">Dysentry</option>
							<option value="NoClassification">No Classification</option>
						</select>
					</div>

				</div>
				<div id="graph_2" class="chart"></div>
				<button class="btn blue" id="facility_list_commodity_supplies_county" style="float:left;padding:2px 5px 2px 5px">
					<i class="icon-list" style="margin-right:5px"></i>Download Summary Data
				</button>
			</div>
		</div>
		<div class="portlet box " id="port2">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i><span class="statistic"></span> By Facility</h4>
			</div>
			<div class="portlet-body">
				<div class="clearfix">
					<div class="control-group pull-left">

						<select class="secondary-filter" id="secondary-facility">
							<option>Severe Dehydration</option>
							<option>Some Dehydration</option>
							<option>No Dehydration</option>
							<option>Dysentry</option>
							<option>No Classification</option>
						</select>
					</div>
					<div class="control-group pull-right">

						<select style="width:280px" name="fi_facility" id="fi_facility">
							<option value="all" selected="">No Facility Chosen</option>
						</select>
					</div>
				</div>
				<div id="graph_4" class="chart"></div>
			</div>
		</div>

	</div>
</div>