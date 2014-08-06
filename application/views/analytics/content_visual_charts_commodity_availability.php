<style>
    .chart {
        overflow-y: auto;
    }
</style>
<!-- BEGIN CHART PORTLET 1-->
<div class="analytics_row" data-survey='ch' id="reporting-parent">
   <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Sections <i>(Click to Select a Section)</i></h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
                <ul class="sectionList" data-offset-top="-300" >

                </ul>
            </div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6 id="countyHeader"><i class="fa fa-map-marker"></i>County</h6>
            <h6 id="progressHeader" ><i class="fa fa-tasks"></i>Reporting Progress</h6>
        </div>
        <div id="reporting"></div>
    </div>

</div>

<div class="analytics_row section" data-survey='ch' id="section-1">
    <h4>Section 1 : Facility Information</h4>
    <div class="portlet md box " >
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Ownership</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="ch_ownership">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Levels of Care</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="levels_of_care">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Facility Type</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="facility_type"f>
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Staff Training</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="staff_training">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Staff Availability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="staff_availability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Staff Training & Retention in CH Unit</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="staff_retention">
            </div>
        </div>
    </div>
</div>
<div class="analytics_row section" data-survey='ch' id="section-2">
    <h4>Section 2 : Guidelines, Job Aids and Tools</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Guidelines</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="guidelines">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Job Aids</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="job_aids">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Tools</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="tools">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Main Challenge in Accessing Data from u5 Region</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>




</div>
<div class="analytics_row section" data-survey='ch' id="section-3">
    <h4>Section 3 : Assessment</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Data From Under5 register</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="u5_register">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Treatment Options</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="treatment_options">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Danger Signs</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="danger_signs">
            </div>
        </div>
    </div>
     <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Answer Comparison <span><select id="indicator_types"></select></span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="indicator_comparison">
            </div>
        </div>
    </div>




</div>
<div class="analytics_row section" data-survey='ch' id="section-4">
    <h4>Section 4 : Commodity & Bundling</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>...</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>...</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>...</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>




</div>
<div class="analytics_row section" data-survey='ch' id="section-5">
    <h4>Section 5 : On-Site Rehydration</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>ORT Availability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="ort_availability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>ORT Location</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="ort_location">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>...</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>




</div>
<div class="analytics_row section" data-survey='ch' id="section-6">
    <h4>Section 6 :Equipment</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Availability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Functionality</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Location</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>




</div>
<div class="analytics_row section" data-survey='ch' id="section-7">
    <h4>Section 7 : Supplies</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Availability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Location</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>




</div>
<div class="analytics_row section" data-survey='ch' id="section-8">
    <h4>Section 8 : Resources</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Availability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Location</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Suppliers</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>




</div>
<div class="analytics_row section" data-survey='ch' id="section-9">
    <h4>Section 9 : Community Strategy</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>...</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>...</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>...</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>




</div>

<div class="analytics_row" data-survey='mnh' id="reporting-parent">
    <div class="portlet box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Sections</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
                <ul class="sectionList">

                </ul>
            </div>
        </div>
    </div>
    <div class="portlet box ">
        <div class="portlet-title">
            <h6 id="countyHeader"><i class="fa fa-map-marker"></i>County</h6>
            <h6 id="progressHeader" ><i class="fa fa-tasks"></i>Reporting Progress</h6>


        </div>
        <div id="reporting"></div>
    </div>
</div>
