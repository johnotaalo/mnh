<style>
    .chart {
        overflow-y: auto;
    }
</style>
<!-- BEGIN CHART PORTLET 1-->
<div class="analytics_row" id="reporting-parent">
   <div class="semi-large-graph">
        <div class="portlet-title">
            <h6>Sections <i>(Click to Select a Section)</i></h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
                <ul id="sectionList" data-offset-top="-300" >

                </ul>
            </div>
        </div>
    </div>
    <div class="semi-large-graph">
        <div class="portlet-title">
            <h6 id="countyHeader"><i class="fa fa-map-marker"></i>County</h6>
            <h6 id="progressHeader" ><i class="fa fa-tasks"></i>National Reporting Progress</h6>
        </div>
        <div id="reporting"></div>
    </div>

</div>

<div class="analytics_row section" data-survey='ch' id="ch-section-1">
    <h4>Section 1 : Facility Information</h4>
    <div class="medium-graph" >
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Ownership</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="facility_owner">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Levels of Care</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="facility_levels">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Facility Type</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="facility_type"f>
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Staff Training</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="staff_training">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Staff Availability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="staff_availability">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Staff Training & Retention in CH Unit</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="staff_retention">
            </div>
        </div>
    </div>
</div>
<div class="analytics_row section" data-survey='ch' id="ch-section-2">
    <h4>Section 2 : Guidelines, Job Aids and Tools</h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Guidelines</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="guidelines">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Job Aids</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="job_aids">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Tools</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="tools">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Main Challenge in Accessing Data from Under 5 Register</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="challenge">
            </div>
        </div>
    </div>




</div>
<div class="analytics_row section" data-survey='ch' id="ch-section-3">
    <h4>Section 3 : Case Management</h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Data From Under 5 Register</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="u5_register">
            </div>
        </div>
    </div>
   <!--  <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Treatment Options</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="treatment_options">
            </div>
        </div>
    </div> -->
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Diarrhoea</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="other_treatment_options_dia">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Pneumonia</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="other_treatment_options_pne">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Malaria</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="other_treatment_options_fev">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Danger Signs</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="danger_signs">
            </div>
        </div>
    </div>
     <div class="semi-large-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Health Care Worker Response <span><select id="indicator_types"></select></span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="indicator_comparison">
            </div>
        </div>
    </div>




</div>
<div class="analytics_row section" data-survey='ch' id="ch-section-4">
    <h4>Section 4 : Commodity & Bundling</h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Commodity Availability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="commodity_availability">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Commodity Unavailability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart"id="commodity_unavailability">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Commodity Location</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart"id="commodity_location">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Commodity Supplier</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart"id="commodity_supplier">
            </div>
        </div>
    </div>
    <!-- Bundling -->
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Bundling Availability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="bundling_availability">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Bundling Unavailability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="bundling_unavailability">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Bundling Location</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="bundling_location">
            </div>
        </div>
    </div>




</div>
<div class="analytics_row section" data-survey='ch' id="ch-section-5">
    <h4>Section 5 : ORT Corner Assessment</h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">ORT Corner Availability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="ort_availability">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">ORT Corner Location</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="ort_location">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Reasons for Non-Functionality</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="ort_nonfunctional">
            </div>
        </div>
    </div>




</div>
<div class="analytics_row section" data-survey='ch' id="ch-section-6">
    <h4>Section 6 :Equipment</h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Availability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="equipment_availability">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Functionality</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="equipment_functionality">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Location</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="equipment_location">
            </div>
        </div>
    </div>




</div>
<div class="analytics_row section" data-survey='ch' id="ch-section-7">
    <h4>Section 7 : Supplies</h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Availability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="supplies_availability">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Location</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="supplies_location">
            </div>
        </div>
    </div>

    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Suppliers</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">
            <div class="chart" id="ch_suppliers">
            </div>
        </div>
    </div>


</div>
<div class="analytics_row section" data-survey='ch' id="ch-section-8">
    <h4>Section 8 : Resources</h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Availability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="resource_availability">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Location</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="resource_location">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Suppliers</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="resource_suppliers">
            </div>
        </div>
    </div>
</div>
<!--   MNH   -->

<!-- <div class="analytics_row" data-survey='mnh' id="reporting-parent">
   <div class="semi-large-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Sections <i>(Click to Select a Section)</i></h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
                <ul class="sectionList" data-offset-top="-300" >

                </ul>
            </div>
        </div>
    </div>
    <div class="semi-large-graph">
        <div class="portlet-title">
            <h6 id="countyHeader"><i class="fa fa-map-marker"></i>County</h6>
            <h6 id="progressHeader" ><i class="fa fa-tasks"></i>National Reporting Progress</h6>
        </div>
        <div class="reporting"></div>
    </div>

</div> -->
<!-- MNH Analytics Section-->
<div class="analytics_row section" data-survey='mnh' id="mnh-section-1">
    <h4>Section 1 : Facility Information</h4>
    <div class="medium-graph" >
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Facility Ownership</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">


            <div class="chart" id="MNHfacility_ownership">

            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Levels of Care</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHfacility_levels">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Facility Type</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHfacility_type">


            </div>
        </div>
    </div>
     <div class="medium-graph">
           <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Health Facility Committees</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="HFM">
            </div>
        </div>
        </div>
    <div class="medium-graph">
           <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Nurses and Beds</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="NnB">
            </div>
        </div>
        </div>
        <div class="medium-graph">
           <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">24 Hour Service</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="24Hr">
            </div>
        </div>
        </div>
    </div>
<div class="analytics_row section" data-survey='mnh' id="mnh-section-2">
    <h4>Section 2 : Facility Data And Maternal And Neotanal Service Delivery</h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Data Deliveries</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHdeliveries">
            </div>
        </div>
    </div> 
        <div class="medium-graph">
           <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">CEmONC</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="CEmONC">
            </div>
        </div>
        </div>

    <div class="medium-graph">
         <div class="portlet-title">

            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Blood Transfusion Reason not performed</span><span class="sizer">Click to Enlarge</span></h6>

        </div>
        <div class="portlet-body">

            <div class="chart" id="TransfusionReasons">
            </div>
        </div>
    </div>

    <div class="medium-graph">
         <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Reasons For Not Conducting CS</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="CEOCReasons">
            </div>
        </div>
    </div>
    <div class="medium-graph">
         <div class="portlet-title">

            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">HIV Testing and Counselling</span><span class="sizer">Click to Enlarge</span></h6>

        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHhiv">
            </div>
        </div>
    </div>
    <div class="medium-graph">
         <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">New Born</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHnewborn">
            </div>
        </div>
    </div>
    <div class="medium-graph">
         <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Kangaroo Mother Care</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHkmc">
            </div>
        </div>
    </div>
    <div class="medium-graph">
         <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Delivery Preparedness</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="delivery_preparedness">
            </div>
        </div>
    </div>
<div class="medium-graph">
         <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">BEmONC Questions</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="BEMONCQuestions">
            </div>
        </div>
    </div>
    <div class="medium-graph">
         <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">BEmONC Reasons</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="BEMONCReasons">
            </div>
        </div>
    </div>
    </div>

    <!--<div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Tools</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="tools">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Main Challenge in Accessing Data from u5 Region</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="challenge">
            </div>
        </div>
    </div>-->
</div>
<div class="analytics_row section" data-survey='mnh' id="mnh-section-3">
    <h4>Section 3 : Guidelines, Job Aid and Tools Availability</h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Guidelines</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHguidelines">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Job Aids</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHjob_aids">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Tools Availability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHtools">
            </div>
        </div>
    </div>
</div>

<div class="analytics_row section" data-survey='mnh' id="mnh-section-4">
    <h4>Section 4: Staff Training</h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Staff Availability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhStaffAvailability">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Staff Retention</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHstaffRetention">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Staff Training</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHStaffTraining">
            </div>
        </div>
    </div>
</div>

<div class="analytics_row section" data-survey='mnh' id="mnh-section-5">
    <h4>Section 5 : Commodity Availability </h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Commodity Availability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHcommodity_availability">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Commodity Unavailability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart"id="MNHcommodity_unavailability">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Commodity Location</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart"id="MNHcommodity_location">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Commodity Supplier</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart"id="MNHcommodity_supplier">
            </div>
        </div>
    </div>

</div>
<div class="analytics_row section" data-survey='mnh' id="mnh-section-6">
    <h4>Section 6 : Commodity  Usage</h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Commodity Consumption</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHcommodity_consumption">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Duration Of Unavailability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHunavailability">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">What Happened when commodity was Unavailable</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHReason">
            </div>
        </div>
    </div>




</div>
<div class="analytics_row section" data-survey='mnh' id="mnh-section-7">
    <h4>Section 7 :Equipment Availability and Functionality</h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Equipment Availability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhequipment_availability">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Equipment Functionality</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhequipment_functionality">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Equipment Location</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhequipment_location">
            </div>
        </div>
    </div>




</div>
<div class="analytics_row section" data-survey='mnh' id="mnh-section-8">
    <h4>Section 8: Supplies</h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Supplies Availability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHsupplies_availability">
            </div>
        </div>
    </div>
    <!--<div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Supplies Fuctionality</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHsupplies_functionality">
            </div>
        </div>
    </div>-->
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Supplies Location</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHsupplies_location">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Main Supplier</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHsupplies_supplier">
            </div>
        </div>
    </div>
</div>

<div class="analytics_row section" data-survey='mnh' id="mnh-section-9">
    <h4>Section 9 : Resources</h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Availability</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhresource_availability">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Location</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhresource_location">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Storage</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhresource_storage">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Waste Disposal</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhresource_wasteDisposal">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Main Source</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhresource_mainSource">
            </div>
        </div>
    </div>
</div>
    <!--div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Suppliers</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>-->




<!--</div>-->
<div class="analytics_row section" data-survey='mnh' id="mnh-section-10">
    <h4>Section 10 : Community Strategy</h4>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Community Units</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="community_units">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Referred Cases</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="community_cases">
            </div>
        </div>
    </div>
    <div class="medium-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">IMCI Training</span><span class="sizer">Click to Enlarge</span></h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="imci_trainings">
            </div>
        </div>
    </div>
</div>

<!--<div class="analytics_row" data-survey='mnh' id="reporting-parent">
    <div class="semi-large-graph">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Sections</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
                <ul class="sectionList">

                </ul>
            </div>
        </div>
    </div>
    <div class="semi-large-graph">
        <div class="portlet-title">
            <h6 id="countyHeader"><i class="fa fa-map-marker"></i>County</h6>
            <h6 id="progressHeader" ><i class="fa fa-tasks"></i>Reporting Progress</h6>


        </div>
        <div id="reporting"></div>
    </div>
</div>-->
