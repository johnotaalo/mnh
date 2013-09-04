
				
				<!-- BEGIN CHART PORTLET 1-->
				<div class="row-fluid">
					<div class="span6">
						<div class="portlet box red">
							<div class="portlet-title">
								<h4><i class="icon-reorder"></i><?php echo $analytics_mini_title; ?> Frequency By County</h4>
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
								<h4><i class="icon-reorder"></i>Main Reason for Unavailability By County</h4>
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
								<div id="graph_2" class="chart"></div>
							</div>
						</div>
					</div>
					
					<div class="span6">
						<div class="portlet box red">
							<div class="portlet-title">
								<h4><i class="icon-reorder"></i><?php echo $analytics_mini_title; ?> Frequency By District</h4>
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
								<h4><i class="icon-reorder"></i>Main Reason for Unavailability By District</h4>
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
								<div id="graph_4" class="chart"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- END CHART PORTLET-->
				<!-- BEGIN CHART PORTLET 2-->
				<div class="row-fluid">
					<div class="span6">
						<div class="portlet box green">
							<div class="portlet-title">
								<h4><i class="icon-reorder"></i>Location of Availability By County</h4>
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
								<div id="graph_5" class="chart"></div>
							</div>
						</div>
						<div class="portlet box yellow">
							<div class="portlet-title">
								<h4><i class="icon-reorder"></i>Quantities Available By County</h4>
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
								<div id="graph_6" class="chart"></div>
							</div>
						</div>
					</div>
					
					<div class="span6">
						<div class="portlet box green">
							<div class="portlet-title">
								<h4><i class="icon-reorder"></i>Location of Availability By District</h4>
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
								<div id="graph_7" class="chart"></div>
							</div>
						</div>
						<div class="portlet box yellow">
							<div class="portlet-title">
								<h4><i class="icon-reorder"></i>Quantities Available By District</h4>
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
								<div id="graph_8" class="chart"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- END CHART PORTLET-->