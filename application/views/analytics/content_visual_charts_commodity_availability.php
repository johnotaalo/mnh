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
<div class="analytic_row" id="reporting-parent">
    <div class="portlet box ">
        <div class="portlet-title">
            <h6 id="countyHeader">County</h6>
            <h6 id="progressHeader">Reporting Progress</h6>
        </div>

        <div id="reporting"></div>
    </div>
    <div class="portlet box">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i>Diarrhoea Treatment</h6>

        </div>
        <div class="portlet-body">

            <div id="graph_41" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>2012 IMCI</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_42" class="chart"></div>
        </div>
    </div>
    <div class="portlet box">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>Paediatric Protocol</h6>

        </div>
        <div class="portlet-body">

            <div id="graph_45" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Tools</span>ORT Corner Register(improvised)</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_47" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Tools</span>Under 5 Register</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_46" class="chart"></div>
        </div>
    </div>

    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Training</span>ICCM</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_50" class="chart"></div>
        </div>
    </div>


    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Reporting Facility Levels</span>Summary</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_49" class="chart"></div>
        </div>
    </div>

    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i>Diarrhoea Cases</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_40" class="chart"></div>
        </div>
    </div>
    <div class="portlet box">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>ICCM</h6>

        </div>
        <div class="portlet-body">

            <div id="graph_43" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>ORT Corner</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_44" class="chart"></div>
        </div>
    </div>

    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Tools</span>Mother Child Booklet</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_48" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Training</span>IMCI</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_51" class="chart"></div>
        </div>
    </div>

    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Training</span>Enhanced Diarrhoea Management</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_52" class="chart"></div>
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
            <h6 id="countyHeader">County</h6>
            <h6 id="progressHeader">Reporting Progress</h6>
        </div>

        <div id="reporting"></div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Reporting Facility Ownership</span>Summary</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_60" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>BEmONC</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_70" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>PNC</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_71" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>Essential Newborn Care</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_72" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>SBM-R</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_73" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>National Roadmap MMR</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_78" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>PMTCT</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_79" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>IYCF Policy Statement</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_80" class="chart"></div>
        </div>
    </div>

    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Reporting Facility Levels</span>Summary</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_49" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>FANC</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_74" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>PAC</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_75" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>MPDSR</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_76" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Staff Training</span>UBT</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_77" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>Quality Obstetric & Prenatal Care</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_81" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>Baby Friendly Hospital Initiative</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_82" class="chart"></div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic-free">Guidelines</span>Post Abortion Guidelines</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_83" class="chart"></div>
        </div>
    </div>


</div>
<?php
    break;
}
?>

<div class="analytics_row" id="analytics-page">
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic"></span> Aggregated Analysis</h6>
        </div>
        <div class="portlet-body">

            <div id="graph_national" class="chart"></div>

        </div>
    </div>
    <div class="portlet box">
        <div class="portlet-title">
            <h6><i class="icon-bar-chart"></i><span class="statistic"> </span> By County<span class="compare" id="county_compare"><i class="fa fa-adjust"></i> Compare </span></h6>

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
                <h6><i class="icon-bar-chart"></i><span class="statistic"></span> By District <span class="compare" id="district_compare"><i class="fa fa-adjust"></i> Compare </span></h6>
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
                <h6><i class="icon-bar-chart"></i><span class="statistic"></span> By Facility</h6>
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
