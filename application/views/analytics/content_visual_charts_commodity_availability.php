<style>
	.chart {
		overflow-y: auto;
	}
</style>
<!-- BEGIN CHART PORTLET 1-->
<div class="row-fluid" id="reporting-parent">
	<div class="span6" id="span1">
		<div class="portlet box ">
			<h4 id="countyHeader">County</h4>
			<h4 id="progressHeader">Reporting Progress</h4>
			<div id="reporting"></div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i><span class="statistic-free">Reporting Facility Owners</span>By County</h4>
			</div>
			<div class="portlet-body">
				
				<div id="graph_5" class="chart"></div>
			</div>
		</div>

	</div>

	<div class="span6">
		<div class="portlet box">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i><span class="statistic-free">Reporting Facility Levels</span>By County</h4>

			</div>
			<div class="portlet-body">
				
				<div id="graph_6" class="chart"></div>
			</div>
		</div>
		<!--div class="portlet box " id="port2">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i><span class="statistic"></span> By Facility</h4>
			</div>
			<div class="portlet-body">
				
				<div id="graph_7" class="chart"></div>
			</div>
		</div-->

	</div>
</div>
<div class="row-fluid" id="analytics-page">
	<div class="span6" id="span1">
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i><span class="statistic"></span> Aggregated Analysis</h4>
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
				<h4><i class="icon-reorder"></i><span class="statistic"></span> By District</h4>
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
			</div>
		</div>

	</div>

	<div class="span6">
		<div class="portlet box">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i><span class="statistic"> </span> By County</h4>

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
			</div>
		</div>
		<div class="portlet box " id="port2">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i><span class="statistic"></span> By Facility</h4>
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
<?php $this->load->view('segments/modals')?>
<!-- END CHART PORTLET-->
