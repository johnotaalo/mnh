<div id="reportingCountiesModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="reportingCountiesLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">

		</button>
		<h3 id="reportingCountiesLabel">Reporting Counties</h3>
	</div>
	<div class="modal-body" id="reportingModalBody">

	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">
			Close
		</button>
	</div>
</div>

<div style="width:80%;margin-left:9%" id="compareModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="reportingCountiesLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">

		</button>
		<h3>Comparison of<span id="compare_title"></span></h3>
	</div>
	<div class="modal-body" id="compareDistrictModalBody">
		<div class="row-fluid">
			<div class="span6">
				<div class="portlet box ">
					<div class="portlet-title">
						<h4><i class="icon-bar-chart"></i><span class="statistic-compare" id="compare_title_1"></span><select id="compare_1"></select></h4>

					</div>
					<div class="portlet-body">

						<div id="graph_10" class="chart"></div>
					</div>
				</div>

			</div>

			<div class="span6">
				<div class="portlet box">
					<div class="portlet-title">
						<h4><i class="icon-bar-chart"></i><span class="statistic-compare" id="compare_title_2"></span><select id="compare_2"></select></h4>

					</div>
					<div class="portlet-body">

						<div id="graph_11" class="chart"></div>
					</div>
				</div>
				

			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">
			Close
		</button>
	</div>
</div>