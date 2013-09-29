<style>
	.chart {
		overflow: auto;
	}
</style>
<!-- BEGIN CHART PORTLET 1-->
<div class="row-fluid">
	<div class="span6" id="span1">
		<div class="portlet box green">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i><span class="statistic"></span> By County</h4>

			</div>
			<div class="portlet-body">
				<div class="clearfix">
					<div class="control-group pull-left">

						<select class="secondary-filter">
							<option value="all" selected="">Viewing All</option>
							<option>Severe Dehydration</option>
							<option>Some Dehydration</option>
							<option>No Dehydration</option>
							<option>Dysentry</option>
							<option>No Classification</option>
						</select>
					</div>
					<div class="control-group pull-right">
						Filter
						<select name="fi_county" id="fi_county">
							<option value="all" selected="">Viewing All</option>
						</select>
					</div>
				</div>
				<div id="graph_1" class="chart"></div>
			</div>
		</div>
		<div class="portlet box blue" id="port2">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i><span class="statistic"></span> By Facility</h4>
			</div>
			<div class="portlet-body">
				<div class="clearfix">
					<div class="control-group pull-left">

						<select class="secondary-filter">
							<option value="all" selected="">Viewing All</option>
							<option>Severe Dehydration</option>
							<option>Some Dehydration</option>
							<option>No Dehydration</option>
							<option>Dysentry</option>
							<option>No Classification</option>
						</select>
					</div>
					<div class="control-group pull-right">

						<select style="width:280px" name="fi_facility" id="fi_facility">
							<option value="all" selected="">Viewing All</option>
						</select>
					</div>
				</div>
				<div id="graph_2" class="chart"></div>
			</div>
		</div>
	</div>

	<div class="span6">
		<div class="portlet box green">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i><span class="statistic"></span> By District</h4>
				<button class="btn red" id="facilityList" style="float:right;padding:2px 5px 2px 5px">
					<i class="icon-list" style="margin-right:5px"></i>Download Facility List
				</button>

			</div>
			<div class="portlet-body">
				<div class="clearfix">
					<div class="clearfix">
						<div class="control-group pull-left">
							<select class="secondary-filter">
								<option value="all" selected="">Viewing All</option>
								<option>Severe Dehydration</option>
								<option>Some Dehydration</option>
								<option>No Dehydration</option>
								<option>Dysentry</option>
								<option>No Classification</option>
							</select>
						</div>
						<div class="control-group pull-right">
							Filter
							<select name="fi_district" id="fi_district">
								<option value="all" selected="">Viewing All</option>

							</select>
						</div>
					</div>
				</div>
				<div id="graph_3" class="chart"></div>
			</div>
		</div>
		<div class="portlet box blue">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i><span class="statistic"></span></h4>
			</div>
			<div class="portlet-body">
				<!--div class="clearfix">
				<div class="control-group pull-right">
				Filter
				<select name="fi_county" id="fi_county">
				<option value="all" selected="">Viewing All</option>
				</select>
				</div>
				</div-->
				<div id="graph_4" class="chart"></div>
			</div>
		</div>
	</div>
</div>
<!-- END CHART PORTLET-->
