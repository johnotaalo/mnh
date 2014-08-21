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
            <h6 id="progressHeader" ><i class="fa fa-tasks"></i>National Reporting Progress</h6>
        </div>
        <div class="reporting"></div>
    </div>

</div>

<div class="analytics_row section" data-survey='ch' id="section-1">
    <h4>Section 1 : Facility Information</h4>
    <div class="portlet md box " >
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Ownership</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="facility_owner">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Levels of Care</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="facility_levels">
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
            <h6><i class="fa fa-bar-chart-o"></i>Main Challenge in Accessing Data from Under 5 Register</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="challenge">
            </div>
        </div>
    </div>
	<div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Data From Under 5 Register</h6>
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
</div>
<div class="analytics_row section" data-survey='ch' id="section-3">
    <h4>Section 3 : Case Management</h4>
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
            <h6><i class="fa fa-bar-chart-o"></i>Health Care Worker Response <span><select id="indicator_types"></select></span></h6>
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
            <h6><i class="fa fa-bar-chart-o"></i>Commodity Availability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="commodity_availability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Commodity Unavailability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart"id="commodity_unavailability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Commodity Location</h6>
        </div>
        <div class="portlet-body">

            <div class="chart"id="commodity_location">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Commodity Supplier</h6>
        </div>
        <div class="portlet-body">

            <div class="chart"id="commodity_supplier">
            </div>
        </div>
    </div>
    <!-- Bundling -->
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Bundling Availability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="bundling_availability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Bundling Unavailability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="bundling_unavailability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Bundling Location</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="bundling_location">
            </div>
        </div>
    </div>
	<div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Main Supplier</h6>
        </div>
        <div class="portlet-body"
            <div class="chart" id="CHcommodity_supplier">
            </div>
        </div>
    </div>
</div>
<div class="analytics_row section" data-survey='ch' id="section-5">
    <h4>Section 5 : ORT Corner Assessment</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>ORT Corner Availability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="ort_availability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>ORT Corner Location</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="ort_location">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Reasons for Non-Functionality</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="ort_nonfunctional">
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

            <div class="chart" id="equipment_availability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Functionality</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="equipment_functionality">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Location</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="equipment_location">
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

            <div class="chart" id="supplies_availability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Location</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="supplies_location">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Main Supplier</h6>
        </div>
        <div class="portlet-body">
            <div class="chart" id="supplies_supplier">
            </div>
        </div>
    </div>
</div>
<div class="analytics_row section" data-survey='ch' id="section-8">
    <h4>Section 8 : Resources</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Resource Availability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="CHresource_availability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Resource Location</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="CHresource_location">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Main Suppliers</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="CHresource_suppliers">
            </div>
        </div>
    </div>
</div>
<!--   MNH   -->

<div class="analytics_row" data-survey='mnh' id="reporting-parent">
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
        <div class="reporting"></div>
    </div>

</div>
<!-- MNH Analytics Section-->
<div class="analytics_row section" data-survey='mnh' id="section-1">
    <h4>Section 1 : Facility Information</h4>
    <div class="portlet md box " >
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Facility Ownership</h6>
        </div>
        <div class="portlet-body">


            <div class="chart" id="MNHfacility_ownership">

            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Levels of Care</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHfacility_levels">
            </div>
        </div>
    </div>
   <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Facility Type</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHfacility_type">


            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Total Number of Beds</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhBeds">


            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Facility Operation</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhOperation">


            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Health Facility Management</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhHFM">


            </div>
        </div>
    </div>
    
<div class="analytics_row section" data-survey='mnh' id="section-2">
    <h4>Section 2 : Facility Data And Maternal And Neotanal Service Delivery</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Data Deliveries</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHdeliveries">
            </div>
        </div>
    </div> 
        <div class="portlet md box ">
           <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>CEmONC</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="CEmONC">
            </div>
        </div>
        </div>

    <div class="portlet md box ">
         <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Blood Transfusion Performed</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="CEOCB">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
         <div class="portlet-title">

            <h6><i class="fa fa-bar-chart-o"></i>Blood Transfusion Reason not performed</h6>

        </div>
        <div class="portlet-body">

            <div class="chart" id="CEOCA">
            </div>
        </div>
    </div>

    <div class="portlet md box ">
         <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Reasons For Not Conducting Caeserian Section</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="Reasons">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
         <div class="portlet-title">

            <h6><i class="fa fa-bar-chart-o"></i>HIV Testing and Counselling</h6>

        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHhiv">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
         <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Adimission of New Borns</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHnewborn">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
         <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Kangaroo Mother Care</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHkmc">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
         <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Delivery Preparedness</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="delivery_preparedness">
            </div>
        </div>
    </div>
<div class="portlet md box ">
         <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>BEmONC Questions</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="BEMONCQuestions">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
         <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>BEmONC Reasons</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="BEMONCReasons">
            </div>
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
            <h6><i class="fa fa-bar-chart-o"></i>Main Challenge in Accessing Data from Under 5 Register</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="challenge">
            </div>
        </div>
    </div>
</div>
<div class="analytics_row section" data-survey='mnh' id="section-3">
    <h4>Section 3 : Guidelines, Job Aid and Tools Availability</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Guidelines and Job Aids</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHguidelines">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Job Aids</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHjob_aids">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Tools Availability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHtools">
            </div>
        </div>
    </div>
</div>

<div class="analytics_row section" data-survey='mnh' id="section-4">
    <h4>Section 4: Staff Training</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Staff Availability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhStaffAvailability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Staff Retention</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHstaffRetention">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Staff Training</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHStaffTraining">
            </div>
        </div>
    </div>
</div>

<div class="analytics_row section" data-survey='mnh' id="section-5">
    <h4>Section 5 : Commodity Availability </h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Commodity Availability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHcommodity_availability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Commodity Unavailability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart"id="MNHcommodity_unavailability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Commodity Location</h6>
        </div>
        <div class="portlet-body">

            <div class="chart"id="MNHcommodity_location">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Commodity Supplier</h6>
        </div>
        <div class="portlet-body">

            <div class="chart"id="MNHcommodity_supplier">
            </div>
        </div>
    </div>

</div>
<div class="analytics_row section" data-survey='mnh' id="section-6">
    <h4>Section 6 : Commodity  Usage</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Commodity Consumption</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHcommodity_consumption">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Duration Of Unavailability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHunavailability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>What Happened when commodity was Unavailable</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHReason">
            </div>
        </div>
    </div>
</div>
<div class="analytics_row section" data-survey='mnh' id="section-7">
    <h4>Section 7 :Equipment Availability and Functionality</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Equipment Availability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhequipment_availability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Equipment Functionality</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhequipment_functionality">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Equipment Location</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhequipment_location">
            </div>
        </div>
    </div>
  </div>  
<div class="analytics_row section" data-survey='mnh' id="section-8">
    <h4>Section 8: Supplies</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Supplies Availability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHsupplies_availability">
            </div>
        </div>
    </div>
    <!--<div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Supplies Fuctionality</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="MNHsupplies_functionality">
            </div>
        </div>
    </div>-->
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Supplies Location</h6>
        </div>
        <div class="portlet-body">
            <div class="chart" id="MNHsupplies_location">
            </div>
        </div>
    </div>
	<div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Main Supplier</h6>
        </div>
        <div class="portlet-body">
            <div class="chart" id="MNHsupplies_supplier">
            </div>
        </div>
    </div>
</div>

<div class="analytics_row section" data-survey='mnh' id="section-9">
    <h4>Section 9 : Resources</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Availability</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhresource_availability">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Location</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhresource_location">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Storage</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhresource_storage">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Waste Disposal</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhresource_wasteDisposal">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Main Source</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="mnhresource_mainSource">
            </div>
        </div>
    </div>
</div>
    <!--div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Suppliers</h6>
        </div>
        <div class="portlet-body">

            <div class="chart">
            </div>
        </div>
    </div>-->




<!--</div>-->
<div class="analytics_row section" data-survey='mnh' id="section-10">
    <h4>Section 10 : Community Strategy</h4>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Community Units</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="community_units">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>Referred Cases</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="community_cases">
            </div>
        </div>
    </div>
    <div class="portlet md box ">
        <div class="portlet-title">
            <h6><i class="fa fa-bar-chart-o"></i>IMCI Training</h6>
        </div>
        <div class="portlet-body">

            <div class="chart" id="imci_trainings">
            </div>
        </div>
    </div>
</div>

<!--<div class="analytics_row" data-survey='mnh' id="reporting-parent">
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
</div>-->
