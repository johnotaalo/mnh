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
<div class="analytics_row" id="reporting-parent">
    <div class="portlet box ">
        <div class="portlet-title">
            <h6 id="countyHeader"><i class="fa fa-map-marker"></i>County</h6>
            <h6 id="progressHeader" ><i class="fa fa-tasks"></i>Reporting Progress</h6>
        </div>

        <div id="reporting"></div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="statistic-free">Reporting Facility Levels</span>Summary</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_49" class="chart"></div>
        </div>
    </div>



</div>

<!-- END CHART PORTLET-->
<?php

    break;

    case 'mnh':
?>
<div class="analytics_row" id="reporting-parent">
    <div class="portlet box ">
        <div class="portlet-title">
             <h6 id="countyHeader"><i class="fa fa-map-marker"></i>County</h6>
            <h6 id="progressHeader" ><i class="fa fa-tasks"></i>Reporting Progress</h6>


    </div>
    <div id="reporting"></div>
    </div>
    <!--div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="statistic-free">Reporting Facility Ownership</span>Summary</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_60" class="chart"></div>
        </div>
    </div-->



</div>
<?php
    break;
}
?>

<div class="analytics_row" id="analytics-page">
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="statistic"></span> Aggregated Analysis</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_national" class="chart"></div>

        </div>
    </div>
    <div class="portlet box">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="statistic"> </span> By County<span class="compare" id="county_compare"><i class="fa fa-adjust"></i> Compare </span></h6>

        </div>
        <div class="portlet-body">
            <div id="graph_county" class="chart"></div>
            <button class="btn blue" id="facility_list_commodity_supplies_county" style="float:left;padding:2px 5px 2px 5px">
                <i class="icon-list" style="margin-right:5px"></i>Download Summary Data
            </button>
        </div>
    </div>



    <div class="span6">
        <div class="portlet box ">
            <div class="portlet-title">
                <h6><i class="fa fa-bar-chart-o"></i><span class="statistic"></span> By District <span class="compare" id="district_compare"><i class="fa fa-adjust"></i> Compare </span></h6>
                <div class="control-group pull-right">

                </div>

            </div>
            <div class="portlet-body">
                <div class="clearfix">
                    <div class="clearfix">
                        <div class="control-group pull-right">
                            Filter
                            <select name="fi_district" id="fi_district">
                                <option value="all" selected="">No District Chosen</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div id="graph_district" class="chart"></div>
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
        <div class="portlet box " id="port2">
            <div class="portlet-title">
                <h6><i class="fa fa-bar-chart-o"></i><span class="statistic"></span> By Facility</h6>
            </div>
            <div class="portlet-body">
                <div class="clearfix">
                    <div class="control-group pull-right">

                        <select style="width:280px" name="fi_facility" id="fi_facility">
                            <option value="all" selected="">No Facility Chosen</option>
                        </select>
                    </div>
                </div>
                <div id="graph_facility" class="chart"></div>
            </div>
        </div>

    </div>
</div>
