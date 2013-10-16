
				
				<!-- BEGIN PIE CHART PORTLET-->
				<div class="row-fluid">
					<div class="span6">
						<div class="portlet box red">
							<div class="portlet-title">
								<h4><i class="icon-reorder"></i><?php echo $analytics_mini_title; ?> By County</h4>
								<div class="tools">
									<a href="javascript:;" class="reload"></a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="clearfix">
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
						<div class="portlet box blue">
							<div class="portlet-title">
								<h4><i class="icon-reorder"></i>Compare</h4>
								<select name="fi_compare_criteria" id="fi_compare_criteria">
									<option value="" selected="selected">Select Criteria</option>
									<option value="county">County</option>
									<option value="county">District</option>
								</select>
								<select name="fi_compare_a" id="fi_compare_a">
									<option value="" selected="selected">Select Parameter A</option>
									<option value="county">County</option>
									<option value="county">District</option>
								</select>
							</div>
							<div class="portlet-body">
								<div id="graph_2" class="chart"></div>
							</div>
						</div>
					</div>
					
					<div class="span6">
						<div class="portlet box red">
							<div class="portlet-title">
								<h4><i class="icon-reorder"></i><?php echo $analytics_mini_title; ?> By District</h4>
								<div class="tools">
									<a href="javascript:;" class="reload"></a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="clearfix">
									<div class="control-group pull-right">
										Filter
										<select name="fi_district" id="fi_district">
											<option value="all" selected="">Viewing All</option>
										</select>
									</div>
								</div>
								<div id="graph_3" class="chart"></div>
							</div>
						</div>
						<div class="portlet box blue">
							<div class="portlet-title">
								<h4><i class="icon-reorder"></i>Parameter B</h4>
								<select name="fi_compare_b" id="fi_compare_b">
									<option value="" selected="selected">Select Parameter B</option>
									<option value="county">County</option>
									<option value="county">District</option>
								</select>
							</div>
							<div class="portlet-body">
								<div id="graph_4" class="chart"></div>
							</div>
						</div>
					</div>
				</div>
				<!--div class="row-fluid">
					<div class="span12">
						<div class="breadcrumb"><h4>Compare</h4></div>
					</div>
				</div-->
				<!-- END PIE CHART PORTLET-->