<?php
switch($this->session->userdata('survey')) {
	case 'ch' :

?>
<div class="page-sidebar nav-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->
	<ul>
		<li id="home-parent" class="has-sub start">
			<a href="#"> <i class="icon-home"></i> <span class="title">Analytics Summary</span> </a>
		</li>
		<li id="facility-statistics-parent" class="has-sub start">
			<a href="javascript:;"> <i class="icon-building"></i> <span class="title">Facility Statistics</span><span class="arrow "></span> </a>
			<ul class="sub">
				<li id="communityStrategy">
					<a href="#" >Community Strategy</a>
				</li>
				<li id="guidelines">
					<a href="#">Guidelines Availability</a>
				</li>
				<li id="training">
					<a href="#">Staff Trainings</a>
				</li>
				<li id="childrenServices">
					<a href="#">Services Offered</a>
				</li>
				<li id="dangerSigns">
					<a href="#">Danger Signs</a>
				</li>
				<li id="actionsPerformed">
					<a href="#">Actions Performed</a>
				</li>
				<li id="counselGiven">
					<a href="#">Counsel Given</a>
				</li>
				<li id="tools">
					<a href="#">Tools in a given Unit</a>
				</li>
				
			</ul>
		</li>
		<li id="commodities-parent" class="has-sub start">
			<a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Commodities</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="commodityFrequency">
					<a href="#">Commodity Availability</a>
				</li>
				<li id="commodityUnavailability">
					<a href="#">Commodity Reasons For Unavailability</a>
				</li>
				<li id="commodityLocation">
					<a href="#">Commodity Location</a>
				</li>
				<li id="commodityQuantities">
					<a href="#">Commodity Quantities</a>
				</li>
				<li id="commoditySuppliers">
					<a href="#">Commodity Suppliers</a>
				</li>
			</ul>
		</li>
		<li id="diarrhoea-cases-parent" class="has-sub start ">
			<a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Diarrhoea Cases</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="caseNumbers">
					<a href="#">Case Numbers</a>
				</li>
				<li id="caseTreatment">
					<a href="#">Case Treatment</a>
				</li>
			</ul>
		</li>
		<li id="ORT-Corner-parent" class="has-sub start">
			<a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">ORT Corner</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="ORTAssessment">
					<a href="#">ORT Corner Assessment</a>
				</li>
				<li id="ORTEquipmentAvailability">
					<a href="#">ORT Corner Equipment Availability</a>
				</li>
				<li id="ORTEquipmentFunctionality">
					<a href="#">ORT Corner Equipment Functionality</a>
				</li>
				<li id="ORTEquipmentLocation">
					<a href="#">ORT Corner Equipment Location</a>
				</li>
			</ul>
		</li>
		<li id="supplies-parent" class="has-sub start">
			<a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Supplies</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="suppliesFrequency">
					<a href="#">Supplies Availability</a>
				</li>
				<li id="suppliesSuppliers">
					<a href="#">Suppliers</a>
				</li>
			</ul>

		</li>
		<li id="resources-parent" class="has-sub start">
			<a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Resources</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="resourceAvailability">
					<a href="#">Resource Availability</a>
				</li>
				<li id="resourceLocation">
					<a href="#">Resource Location</a>
				</li>
			</ul>
		</li>
	</ul>
	<!-- END SIDEBAR MENU -->
</div>
<?php
break;

case 'mnh' :
?>
<div class="page-sidebar nav-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->
	<ul>
		<li id="home-parent" class="has-sub start">
			<a href="#"> <i class="icon-home"></i> <span class="title">Analytics Summary</span> </a>
		</li>
		<li id="facility-statistics-parent" class="has-sub start">
			<a href="javascript:;"> <i class="icon-building"></i> <span class="title">Facility Statistics</span><span class="arrow "></span> </a>
			<ul class="sub">
				<li id="nursesDeployed">
					<a href="#" >Nurses Deployed</a>
				</li>
				<li id="beds">
					<a href="#" >Beds in Facility</a>
				</li>
				<li id="services">
					<a href="#" >Services</a>
				</li>
				<li id="hfm">
					<a href="#" >Health Facility Management</a>
				</li>
				<li id="deliveries">
					<a href="#" >Deliveries</a>
				</li>
				<li id="hiv">
					<a href="#" >HIV Testing</a>
				</li>
				<!--li id="newborn">
					<a href="#" >Newborn Care</a>
				</li>
				<li id="kmc">
					<a href="#" >Kangaroo Mother Care</a>
				</li-->
				<li id="jobaids">
					<a href="#" >Job Aids</a>
				</li>
				<li id="guidelinesmnh">
					<a href="#" >Guidelines Availability</a>
				</li>
				<li id="communitystrategy">
					<a href="#" >Community Strategy</a>
				</li>
				<li id="staffTrainingMnh">
					<a href="#" >Staff Training</a>
				</li>

			</ul>
		</li>
		<li id="signal-parentMnh" class="has-sub start">
			<a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Signal Functions</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<!--li id="bemonc">
					<a href="#">BemONC Signal Function</a>
				</li-->
				<li id="cemonc">
					<a href="#">CEmONC Signal Function</a>
				</li>
				<!--li id="cemoncReason">
					<a href="#">CEmONC Signal Function Challenges</a>
				</li-->
				<li id="bemonc">
					<a href="#">BEmONC Signal Function</a>
				</li>
				<li id="bemoncReason">
					<a href="#">BEmONC Signal Function Challenges</a>
				</li>
				
				
			</ul>

		</li>
		<li id="commodities-parent-mnh" class="has-sub start">
			<a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Commodities</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="commodityFrequencyMnh">
					<a href="#">Commodity Availability</a>
				</li>
				<li id="commodityUnavailabilityMnh">
					<a href="#">Commodity Reasons For Unavailability</a>
				</li>
				<li id="commodityLocationMnh">
					<a href="#">Commodity Location</a>
				</li>
				<li id="commodityQuantitiesMnh">
					<a href="#">Commodity Quantities</a>
				</li>
				<li id="commoditySuppliersMnh">
					<a href="#">Commodity Suppliers</a>
				</li>
			</ul>
		</li>
		<li id="equipments-parent-mnh" class="has-sub start">
			<a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Equipment</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="equipmentFrequency">
					<a href="#">Equipment Availability</a>
				</li>
				<li id="equipmentLocation">
					<a href="#">Equipment Location</a>
				</li>
				<li id="equipmentFunctionality">
					<a href="#">Equipment Functionality</a>
				</li>
			</ul>
		</li>
		<li id="supplies-parentMnh" class="has-sub start">
			<a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Supplies</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="suppliesFrequencyMnh">
					<a href="#">Supplies Availability</a>
				</li>
				<li id="suppliesLocationMnh">
					<a href="#">Supplies Location</a>
				</li>
				<li id="suppliesSuppliersMnh">
					<a href="#">Suppliers</a>
				</li>
			</ul>

		</li>
		<li id="hardware-parentMnh" class="has-sub start">
			<a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Hardware</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="hardwareFrequencyMnh">
					<a href="#">Hardware Availability</a>
				</li>
			</ul>

		</li>
		<li id="resources-parentMnh" class="has-sub start">
			<a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Resources</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="resourcesFrequencyMnh">
					<a href="#">Resources Availability</a>
				</li>
				<li id="resourcesLocationMnh">
					<a href="#">Resources Location</a>
				</li>
			</ul>

		</li>
		
	</ul>
	<!-- END SIDEBAR MENU -->
</div>
<?php
break;
}
?>
