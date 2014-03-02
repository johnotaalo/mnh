<?php
class C_Load extends MY_Controller {
	var $rows, $combined_form, $message;

	public function __construct() {
		parent::__construct();
		//print var_dump($this->tValue); exit;
		$this -> rows = '';
		$this -> combined_form;

	}

	public function getFacilityDetails() {
		/*retrieve facility info if any*/
		$this -> load -> model('m_mnh_survey');
		if (($this -> m_mnh_survey -> retrieveFacilityInfo($this -> input -> get_post('fcode', TRUE))) == true) {
			//retrieve existing data..else just load a blank form
			//set facility code into the session
			$new_data = array('fCode' => $this -> input -> get_post('fcode', TRUE));
			$this -> session -> set_userdata($new_data);
			print $this -> m_mnh_survey -> formRecords;
		}
	}

	public function suggestFacilityName() {
		$this -> load -> model('m_autocomplete');
		$facilityName = strtolower($this -> input -> get_post('term', TRUE));
		//term is obtained from an ajax call

		if (!strlen($facilityName) < 2)

			//echo $facilityName;

			try {
				$this -> rows = $this -> m_autocomplete -> getAutocomplete(array('keyword' => $facilityName));
				//die (var_dump($this->rows));
				$json_data = array();

				//foreach($this->rows as $key=>$value)
				//array_push($json_data,$value['facilityName']);
				foreach ($this->rows as $value) {
					array_push($json_data, $value -> facilityName);

					//print $key.' '.$value.'<br />';
					//$json_data=array('code'=>$value->facilityMFC,'name'=>$value->facilityName);
				}
				print json_encode($json_data);
				//die;

			} catch(exception $ex) {
				//ignore
				//$ex->getMessage();
			}

	}

	public function suggest() {
		$this -> load -> model('m_autocomplete');
		//$facilityName=$this->input->post('username',TRUE);

		try {
			$this -> rows = $this -> m_autocomplete -> getAllFacilityNames();
			//die(var_dump($this->rows));
			$json_data = array();

			foreach ($this->rows as $key => $value)
			//array_push($json_names,$value['facilityName']);
				$json_data = array('code' => $value['facilityMFC'], 'name' => $value['facilityName']);
			print json_encode($json_data);
		} catch(exception $ex) {
			//ignore
			$ex -> getMessage();
		}

	}

	public function get_mnh_form() {
		$this -> combined_form .= '<h5 id="status"></h5>
                 
				<form class="bbq" name="mnh_tool" id="mnh_tool" method="POST">

  				 <p id="data" class="feedback"></p>
		         <!--h3 align="center">COMMODITY, SUPPLIES AND EQUIPMENT ASSESSMENT</h3-->
		         <p style="color:#488214;font-size:20px;font-style:bold">You are currently taking ' . (((strtoupper($this -> session -> userdata('survey'))) == 'CH') ? 'Child Health' : 'Maternal and Newborn Health') . ' Survey.</p>
		         <div id="section-1" class="step">
		         <input type="hidden" name="step_name" value="section-1"/>
		          <p style="display:true" class="message success">SECTION 1 of 7: FACILITY INFORMATION</p>
				<table class="centre" >

		       <thead><th colspan="9">FACILITY INFORMATION</th></thead>
		       
			<tr>
			<td>Facility Name </td><td>
			<!--input type="text" id="facilityName" name="facilityName" class="cloned" size="40" disabled/-->
			<label id="facilityName"  size="40" ></label>
			<input type="hidden" name="facilityMFLCode" id="facilityMFLCode" />
			<input type="hidden" name="facilityHName" id="facilityHName" />
			</td> <td>Facility Level </td><td>
			<!--input type="text" id="facilityLevel" name="facilityLevel" class="cloned"  size="40"/-->
			<select name="facilityLevel" id="facilityLevel" class="cloned" style="width:75%">
							<option value="" selected="selected">Select Level</option>
							' . $this -> selectFacilityLevel . '
						</select>
			</td><td>County </td>
			<td>
			<select name="facilityCounty" id="facilityCounty" class="cloned" style="width:85%">
							<option value="" selected="selected">Select County</option>
							' . $this -> selectCounties . '
						</select>
			</td>
			</tr>
			<tr>
			<td>Facility Type </td>
			<td>
			<select name="facilityType" id="facilityType" class="cloned" style="width:75%">
							<option value="" selected="selected">Select Type</option>
							' . $this -> selectFacilityType . '
						</select>

			</td>
			<td>Owned By </td>
			<td>
			<select name="facilityOwnedBy" id="facilityOwnedBy" class="cloned" style="width:75%">
							<option value="" selected="selected">Select Owner</option>
							' . $this -> selectFacilityOwner . '
						</select>
			</td>

			<td>District/Sub County </td>
			<td>
			<select name="facilityDistrict" id="facilityDistrict" class="cloned" style="width:85%">
							<option value="" selected="selected">Select District/Sub County</option>
							' . $this -> selectDistricts . '
						</select>
			</td>
			</tr>
		
		</table>
		<table class="centre">
		<thead>
		<th colspan="12" >FACILITY CONTACT INFORMATION</th>
		</thead>
		<tr >
			<th scope="col" colspan="2" >CADRE</th>
			<th>NAME</th>
			<th >MOBILE</th>
			<th >EMAIL</th>
		</tr>
		<tr>
			<TD  colspan="2">Incharge </TD><td>
			<input type="text" id="facilityInchargename" name="facilityInchargename" class="cloned" size="40"/>
			</td><td>
			<input type="text" id="facilityInchargemobile" name="facilityInchargemobile" class="phone" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityInchargeemail" name="facilityInchargeemail" class="cloned mail" size="40"/>
			</td>
		</tr>
		<tr>
			<TD  colspan="2">MCH </TD><td>
			<input type="text" id="facilityMchname" name="facilityMchname" class="cloned" size="40"/>
			</td><td>
			<input type="text" id="facilityMchmobile" name="facilityMchmobile" class="phone" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMchemail" name="facilityMchemail" class="cloned mail" size="40"/>
			</td>
		</tr>
		<tr>
			<TD  colspan="2">Maternity </TD><td>
			<input type="text" id="facilityMaternityname" name="facilityMaternityname" class="cloned" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMaternitymobile" name="facilityMaternitymobile" class="phone" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMaternityemail" name="facilityMaternityemail" class="cloned mail" size="40"/>
			</td>
		</tr>
		</table>
<table>
			<thead>				
					<th colspan="2" >PROVISION OF Nurses</th>
				</thead>			
				<tr>
					<th >QUESTION</th>
					<th>RESPONSE</th>
				</tr>
			
			' . $this -> nurses . '
		</table>
		
		
		<table>
			<thead>
				
					<th colspan="2" >PROVISION OF Beds</th>
			</thead>
				<tr>
					<th >QUESTION</th>
					<th>RESPONSE</th>

				</tr>
			
			' . $this -> beds . '
		</table>
		<table>
			<thead>
				
					<th colspan="2" >PROVISION OF Services</th>
			</thead>
				<tr>
					<th >QUESTION</th>
					<th>RESPONSE</th>

				</tr>
			
			' . $this -> services . '
		</table>	
		
		
		<table>
		<tr>
		<th colspan="12" >Health Facility Management</th>
		</tr>
		<tr>		
		<th colspan="7">QUESTION</th>
		<th colspan="5">RESPONSE</th>	
		</tr>
		' . $this ->  mnhCommitteeAspectSection  . '
	</table>
	<table class="centre">
	<thead>
	<th colspan ="8"> DOES THIS FACILITY CONDUCT DELIVERIES?</th> </thead>
	<tr><th colspan ="8"><select name="facDeliveriesDone" id="facDeliveriesDone" class="cloned link">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option></th></tr>
	</table>
	<div  style="display:none" id="delivery_centre" class="cloned">
	<table class="centre">
	
	<thead><th colspan ="12">WHAT ARE THE MAIN REASONS FOR NOT CONDUCTING DELIVERIES? </br>(multiple selections allowed)</th></thead>
	<tr>
	<th colspan ="2">Inadequate skill</th>
	<th colspan ="2">Inadequate staff</th>
	<th colspan ="2"> Inadequate infrastructure </th>
	<th colspan="2">Inadequate Equipment</th>
	<th colspan ="2">  Inadequate commodities and supplies</th>
	<th colspan ="2">  Other (Please specify)</th>
	</tr>
	
	<tr>
	<td style ="text-align:center;" colspan ="2">
			<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesSkill" value="1" class="cloned" />
			</td>
			<td style ="text-align:center;" colspan ="2">
			<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesInfra" value="6" />
			</td>
			<td style ="text-align:center;" colspan ="2">
			<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesInfra" value="2" />
			</td>
			<td style ="text-align:center;" colspan ="2">
			<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesCommo" value="3" />
			</td>
			<td style ="text-align:center;" colspan ="2">
			<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesequiip" value="5" />
			</td>
			<td style ="text-align:center;" colspan ="2">
			<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesOther" value="4" />
			<input type="text" name="facRsnNoDeliveries[]" id="rsnDeliveriesOther" value="" />
			</td>
	
	</tr>
	</table>
	</div><!--\.delivery_cenre-->
	
	</div><!--\.the section-1 -->
	
	<div id="No" class="step"><!--end of assessment message section-->
	<input type="hidden" name="step_name" value="end_of_assessment"/>
	<div class="block">
	        <p align="left" style="font-size:16px;color:#AA1317; font-weight:bold">Assessment Complete</p>
			<p id="data" class="message success">Thanks for your participation.<br></p><br>
			<p class="message success">' . anchor(base_url() . 'commodity/assessment', 'Select another Facility') . '</p>
			</div>
	</div><!--\.end of assessment message section-->
	
	<div id="Yes" class="step">
	<input type="hidden" name="step_name" value="section-2"/>
	 <p style="display:true" class="message success">SECTION 2 of 7: DELIVERIES CONDUCTED DATA, PROVISION OF BEmONC FUNCTIONS</p>
	<table class="centre">
		
	<thead>
	<th colspan="7" >INDICATE THE NUMBER OF DELIVERIES CONDUCTED IN THE FOLLOWING PERIODS </th></thead>

	<th> MONTH</th><th><div style="width: 50px"> JANUARY</div></th> <th>FEBRUARY</th><th>MARCH</th><th> APRIL</th><th> MAY</th><th>JUNE</th>
		 <!--tr>
			<td>' . (date('Y') - 1) . '</td>
			<td style ="text-align:center;">
			<input type="text" id="dnjanuary_12" name="dnjanuary_12"  size="8" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnfebruary_12" name="dnfebruary_12" size="8" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnmarch_12" size="8" name="dnmarch_12" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnapril_12" size="8" name="dnapril_12" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnmay_12" size="8" name="dnmay_12" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnjune_12" size="8" name="dnjune_12" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnjuly_12" size="8" name="dnjuly_12" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnaugust_12" size="8" name="dnaugust_12" class="cloned numbers"/>
			</td>
			<td  style ="text-align:center;">
			<input type="text" id="dnseptember_12" size="8" name="dnseptember_12" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnoctober_12" size="8" name="dnoctober_12" class="cloned numbers"/></td>
			<td style ="text-align:center;" width="15">
			<input type="text" id="dnnovember_12" size="8" name="dnnovember_12" class="cloned numbers"/></td>
			
			<td style ="text-align:center;">
			<input type="text" id="dndecember_12" size="8" name="dndecember_12" class="cloned numbers"/>
			</td>			
			

		</tr-->

		<tr>
			<td>' . '2013' . '</td>			
			<td style ="text-align:center;"><input type="text" id="dnjanuary_13" size="8" name="dnjanuary_13" class="cloned numbers"/>
			</td>
			
			<td style ="text-align:center;">
			<input type="text" id="dnfebruary_13" name="dnfebruary_13" size="8"class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnmarch_13" name="dnmarch_13" size="8"class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnapril_13" name="dnapril_13" size="8"class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnmay_13" name="dnmay_13" size="8"class="cloned numbers" />
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnjune_13" name="dnjune_13" size="8"class="cloned numbers" />
			</td>
			</tr>
			<tr>
				<th> MONTH</th><th> JULY</th><th> AUGUST</th><th> SEPTEMBER</th><th> OCTOBER</th><th> NOVEMBER</th><th> DECEMBER</th>
			</tr>
			<tr>
			<td>' . '2013' . '</td>	
			<td style ="text-align:center;">
			<input type="text" id="dnjuly_13" size="8" name="dnjuly_13" class="cloned numbers" >
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnaugust_13" size="8" name="dnaugust_13" class="cloned numbers" >
			</td>
			<td  style ="text-align:center;">
			<input type="text" id="dnseptember_13" size="8" name="dnseptember_13" class="cloned numbers" >
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnoctober_13" size="8" name="dnoctober_13" class="cloned numbers" ></td>
			<td style ="text-align:center;" width="15">
			<input type="text" id="dnnovember_13" size="8" name="dnnovember_13" class="cloned numbers"></td>
			
			<td style ="text-align:center;">
			<input type="text" id="dndecember_13" size="8" name="dndecember_13" class="cloned numbers" >
			</td>	
		</tr>
	</table>
	
	<table class="centre">
		<thead>
			<th colspan="14" >PROVISION OF BEmONC SIGNAL FUNCTIONS  IN THE LAST THREE MONTHS </th>
		</thead>
		
		
			<th  colspan="7">SIGNAL FUNCTION</th>
			<th   colspan="2"> WAS IT CONDUCTED? </th>			
			<th  colspan="5">INDICATE MAJOR CHALLENGE</th>

		</tr>' . $this -> signalFunctionsSection . '
	</table>
	
	<table class="centre">
		<thead>
			<th colspan="12" >PROVISION OF CEmONC SERVICES IN THE LAST THREE MONTHS</th>
		</thead>
		
		
			<th colspan="7">QUESTION</th>
			<th colspan="5">RESPONSE</th>			
			

		</tr>' . $this -> mnhCEOCAspectsSection . '
	</table>
	<table >
			<thead>
					<th colspan="12" >PROVISION OF HIV Testing and Counselling</th>
				
				</thead>
				
					<th colspan="7">QUESTION</th>
					<th colspan="5">RESPONSE</th>

				
			
			' . $this -> mnhHIVTestingAspectsSection . '
		</table>
		
		<table >
			<thead>			
					<th colspan="2" >PROVISION OF Newborn Care</th>
					</thead>
				<tr>				
					<th colspan="1">QUESTION</th>
					<th colspan="1">RESPONSE</th>
				</tr>
		
			
			' . $this -> mnhNewbornCareAspectsSection . '
		</table>
		<table >
			<thead>
				<tr>
					<th colspan="2" >PROVISION OF Kangaroo Mother Care</th>
				
				</tr>
				<tr>
					<th colspan="1">QUESTION</th>
					<th colspan="1">RESPONSE</th>
				</tr>
</thead>
				
			
			' . $this -> mnhKangarooMotherCare . '
		</table>
		<p>
		<h4>Criteria for Preparedness</h4>
		 <ol>
		 	<li>Adult Resuscitation Kit. Complete, working and clean</li>
		 	<li>Newborn Resuscitation Kit. Complete, working and clean</li>
		 	<li>Receiving Place</li>
		 	<li>Adequate Light</li>
		 	<li>No draft(cold air)</li>
		 	<li>Clean (delivery beds and all surfaces)</li>
		 	<li>Waste Disposal System</li>
		 	<li>Sterilization color-coded</li>
		 	<li>Sharp Container</li>
		 	<li>Privacy</li>		
		 </ol>
		</p>
		
		<table >
			<thead>
				
					<th colspan="12" >Preparedness for Delivery</th>
				
				</thead>
			
					<th colspan="7">QUESTION</th>
					<th colspan="5">RESPONSE</th>

				
			
			' . $this -> mnhPreparednessAspectsSection . '
		</table>
		<table >
			<thead>
				
					<th colspan="12" >GUIDELINES AVAILABILITY</th>
				
				</thead>
				
					<th colspan="6">ASPECTS</th>
					<th colspan="3">RESPONSE</th>
					<th colspan="3">QUANTITY</th>

				
			
			' . $this -> mnhGuidelinesAspectsSection . '
		</table>
		<table >
			<thead>
				<tr>
					<th colspan="12" >JOB AIDS</th>
				</tr>
			</thead>
				<tr>
					<th style="width:35%">ASPECTS</th>
					<th style="width:35%;text-align:left">RESPONSE</th>
					<th style="width:30%;text-align:left">QUANTITY</th>

				</tr>
			
			' . $this -> mnhJobAidsAspectsSection . '
		</table>
		<table class="centre">
		<thead>
			<th colspan="2" >COMMUNITY STRATEGY </th>
		</thead>
		
		
			<th  style="width:35%">ASPECT</th>
			<th   style="width:65%;text-align:left"> RESPONSE </th>			
			

		</tr>' . $this -> mnhCommunityStrategySectionPDF . '
	</table>
	</div><!--\.section 2-->

	<div id="section-3" class="step">
	<input type="hidden" name="step_name" value="section-3"/>
	 <p style="display:true" class="message success">SECTION 3 of 7: COMMODITY AVAILABILITY</p>
	<table  class="centre persist-area" >
	<thead>
	    <tr class="persist-header">
		
			<th colspan="13">INDICATE THE AVAILABILITY, LOCATION, SUPPLIER AND QUANTITIES ON HAND OF THE FOLLOWING COMMODITIES.INCLUDE REASON FOR UNAVAILABILITY. </th>
		</tr>
		</thead>
		<tr>
			<th scope="col" >Commodity Name</th>
			<th >Commodity Unit</th>
			<th colspan="3" style="text-align:center"> Availability  
			 <strong></br>
			(One Selection Allowed) </strong></div></th>
			<th colspan="5" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<th>Available Quantities</th>
			<th scope="col">
			
				Main Supplier
			</th>
			<th>
			<div style="width: 90%" >
				Main Reason For  Unavailability
			</div></th>

		</tr>
		<tr >
			<td>&nbsp;</td>
			<td >Unit</td>
			<td >Available</td>
			<td>Sometimes Available</td>
			<td>Never Available</td>
			<td>Delivery room</td>
			<td>Pharmacy</td>
			<td>Store</td>
			<td>Other</td>
			<td>Not Applicable</td>

			<td>No.of Units</td>
			<td>Supplier</td>
			<td> Unavailability</td>

		</tr>' . $this -> commodityAvailabilitySection . '

	</table>
	</div><!--\.section-3-->

    <div id="section-4" class="step">
    <input type="hidden" name="step_name" value="section-4"/>
     <p style="display:true" class="message success">SECTION 4 of 7: STAFF TRAINING</p>
	<table class="centre">
	<thead>
		<th colspan="4"  >IN THE LAST 2 YEARS, HOW MANY STAFF MEMBERS HAVE BEEN TRAINED IN THE FOLLOWING?</th></thead>
		<th colspan ="2" style="text-align:left"> TRAININGS</th><th style="text-align:left">Number Trained in the Last 2 Years</th>
		<th colspan ="2" style="text-align:left"><div style="width: 500px" >How Many Of The Staff Members 
		Trained in the Last 2 Years are still Working in the Marternity Unit?</DIV></th>
		
		' . $this -> trainingGuidelineSection . '

	</table>
    </div><!--\.section-4-->

	<div id="section-5" class="step">
	<input type="hidden" name="step_name" value="section-5"/>
	 <p style="display:true" class="message success">SECTION 5 of 7: COMMODITY USAGE</p>
	<table  class="centre" >
		<thead>
			<th colspan="11"> IN THE LAST 3 MONTHS INDICATE THE USAGE, NUMBER OF TIMES THE COMMODITY WAS NOT AVAILABLE.</BR>
			WHEN THE COMMODITY WAS NOT AVAILABLE WHAT HAPPENED? </th>
		</thead>

		</tr>
		<tr >
			<th scope="col"  colspan="2"><div style="width: 100px" >Commodity Name</div></th>
			<th scope="col" >
			<div style="width: 40px" >
				Unit Size
			</div></th>
			<th scope="col" >
			<div style="width: 40px" >
				Usage
			</div></th>
			<th scope="col" colspan="2">
			<div style="width: 100px" >
				Number Of Times the commodity was unavailable
			</div></th>
			<th scope="col" colspan="5">
			<div style="width: 600px" >
				When the commodity was not available what happened?
				</br>
				<strong>(Multiple Selections Allowed)</strong>
			</div></th>

		</tr>
		<tr >
			<td colspan="2">&nbsp;</td>
			<td colspan="1">Unit Size</td>
			<td colspan="1">Total Units Used</td>
			<td colspan="2">Times Unavailable </td>
			
			<td colspan="1">
			<div style="width: 100px" >
			Patient purchased the commodity privately</div></td>
			<td colspan="1"> <div style="width: 100px" >
			Facility purchased the commodity privately
			</div></td>
			<td colspan="1"><div style="width: 100px" >
			Facility received the commodity from another facility</div></td>
			<td colspan="1"><div style="width: 100px" >
			The procedure was not conducted </div></td>
			<td colspan="1"><div style="width: 100px" > The procedure was conducted without the commodity
			</div></td>

		</tr>
        ' . $this -> commodityUsageAndOutageSection . '
        </table>
	</div><!--\.section-5-->
	<div id="section-6" class="step">
	<input type="hidden" name="step_name" value="section-6"/>
	 <p style="display:true" class="message success">SECTION 6 of 7: I. EQUIPMENT AVAILABILITY AND FUNCTIONALITY</p>
		
		<table  class="centre" >
		<thead>
			<th colspan="11">INDICATE THE AVAILABILITY, LOCATION  AND FUNCTIONALITY OF THE FOLLOWING EQUIPMENT.</th>
		</thead>

		</tr>
		<tr>
			<th scope="col" >Equipment Name</th>
			
			<th colspan="3" style="text-align:center">Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></th>
			<th colspan="4" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<th colspan="2">Available Quantities</th>
		</tr>
		<tr >
			<td>&nbsp;</td>
			
			<td >Available</td>
			<td>Sometimes Available</td>
			<td>Never Available</td>
			<td>Delivery room</td>
			<td>Pharmacy</td>
			<td>Store</td>
			<td>Other</td>
			<td>Fully-Functional</td>
            <!--td>Partially Functional</td-->
			<td>Non-Functional</td>
			</tr>
			' . $this -> equipmentsSection . '<tr>
			<th scope="col" >Delivery Equipment Name</th>
			
			<th colspan="3" style="text-align:center">Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></th>
			<th colspan="4" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<th colspan="2">Available Quantities</th>
		</tr>
		<tr></tr>
		<tr >
			<td>&nbsp;</td>
			
			<td >Available</td>
			<td>Sometimes Available</td>
			<td>Never Available</td>
			<td>Delivery room</td>
			<td>Pharmacy</td>
			<td>Store</td>
			<td>Other</td>
			<td>Fully-Functional</td>
            <!--td>Partially Functional</td-->
			<td>Non-Functional</td>
			</tr>' . $this -> deliveryEquipmentSection . '

			</table>
			
			 <p style="display:true" class="message success">SECTION 6 of 7: II. AVAILABILITY OF WATER</p>
			 
			 <table  class="centre" >
		<thead>
			<th colspan="11">INDICATE THE AVAILABILITY, LOCATION AND MAIN SOURCE OF THE FOLLOWING.</th>
		</thead>
		<tr>
			<th scope="col" >Resource Name</th>
			
			<th colspan="3" style="text-align:center"> Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></th>
			<th colspan="5" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<!--th>Available Supplies</th-->
			<th scope="col">
			
				Main Source
			</th>
			<!--th scope="col">
			<div style="width: 100px" >
				Main Reason For  Unavailability
			</div></th-->

		</tr>
		<tr >
			<td>&nbsp;</td>
			
			<td >Available</td>
			<td>Sometimes Available</td>
			<td>Never Available</td>
			<td>OPD</td>
			<td>MCH</td>
			<td>U5 Clinic</td>
			<td>Maternity</td>
			<td>Other</td>

			<!--td style="text-align:center">No.of Supplies</td-->
			<!--td></td-->
			<td></td>
			
			

		</tr>' . $this -> suppliesMNHOtherSection . '
		</table>
		
		<table class="centre">
		<thead>
			<th colspan="12" >INDICATE THE STORAGE AND ACCESS TO WATER BY THE COMMUNITY </th>
				<tr>
			<th  colspan="7">ASPECT</th>
			<th   colspan="5"> RESPONSE </th>			
			<th   colspan="2"> SPECIFY </th>	

		</tr>
		</thead>' . $this -> mnhWaterAspectsSection . '
	</table>
			<p style="display:true" class="message success">SECTION 6 of 7: III. ELECTRICTY AND HARDWARE RESOURCES</p>
		 <table  class="centre" >
		<thead><tr>
			<th colspan="6">INDICATE THE AVAILABILITY, LOCATION AND SUPPLIER OF THE FOLLOWING.</th></tr>
		</thead>
		<tr>
			<th rowspan="2">Resource Name</th>
			
			<th colspan="3" style="text-align:center"> Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></th>
			<th rowspan="2">
			
				Main Supplier
			</th>
			<th rowspan="2">			
				Main Source	
			</th>
		</tr>
		<tr >
			<th >Available</th>
			<th>Sometimes Available</th>
			<th>Never Available</th>		
		</tr>
		
		' . $this -> hardwareMNHSection . '
		</table>
           </div><!--\.section-6-->
			<div id="section-7" class="step">
			<input type="hidden" name="step_name" value="section-7"/>
	 <p style="display:true" class="message success">SECTION 7 of 7: SUPPLIES AVAILABILITY</p>
			
	<table  class="centre" >
		<thead>
			<th colspan="12">INDICATE THE AVAILABILITY, LOCATION, SUPPLIER AND QUANTITIES ON HAND OF THE FOLLOWING SUPPLIES.INCLUDE REASON FOR UNAVAILABILITY.</th>
		</thead>

		</tr>
		<tr>
			<th scope="col" >Supplies Name</th>
			
			<th colspan="3" style="text-align:center"> Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></th>
			<th colspan="4" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<th>Available Supplies</th>
			<th scope="col">
			
				Main Supplier
			</th>
			<th scope="col">
			<div style="width: 100px" >
				Main Reason For  Unavailability
			</div></th>

		</tr>
			

		</tr>
		<tr >
			<td>&nbsp;</td>
			
			<td >Available</td>
			<td>Sometimes Available</td>
			<td>Never Available</td>
			<td>Delivery room</td>
			<td>Pharmacy</td>
			<td>Store</td>
			<td>Other</td>

			<td style="text-align:center">No.of Supplies</td>
			<td></td>
			<td></td>
			
			

		</tr>' . $this -> suppliesSection . '
		</table>
		<table  class="centre" >
		<thead>
			<!--th colspan="11"> IN THE LAST 3 MONTHS INDICATE THE USAGE, NUMBER OF TIMES THE SUPPLY WAS NOT AVAILABLE.</BR>
			WHEN THE SUPPLY WAS NOT AVAILABLE WHAT HAPPENED? </th-->
			<th colspan="11"> IN THE LAST 3 MONTHS INDICATE NUMBER OF TIMES THE SUPPLY WAS NOT AVAILABLE.</BR>
			WHEN THE SUPPLY WAS NOT AVAILABLE WHAT HAPPENED? </th>
		</thead>

		</tr>
		<tr >
			<th scope="col"  colspan="2"><div style="width: 1
			00px" >Supply Name</div></th>
			
			<!--th scope="col" colspan="2">
			<div style="width: 40px" >
				Usage
			</div></th-->
			
			<th scope="col" colspan="2">
			<div style="width: 100px" >
				Number Of Times the supply was unavailable
			</div></th>
			<th scope="col" colspan="5">
			<div style="width: 600px" >
				When the supply was not available what happened?
				</br>
				<strong>(Multiple Selections Allowed)</strong>
			</div></th>

		</tr>
		<tr >
			<td colspan="2">&nbsp;</td>
			<!--td colspan="2">Total Units Used</td -->
			<td colspan="2">Times Unavailable </td>
			
			<td colspan="1">
			<div style="width: 100px" >
			Patient purchased the supply privately</div></td>
			<td colspan="1"> <div style="width: 100px" >
			Facility purchased the supply privately
			</div></td>
			<td colspan="1"><div style="width: 100px" >
			Facility received the supply from another facility</div></td>
			<td colspan="1"><div style="width: 100px" >
			The procedure was not conducted </div></td>
			<td colspan="1"><div style="width: 100px" > The procedure was conducted without the supply
			</div></td>

		</tr>
        ' . $this -> suppliesUsageAndOutageSection . '
        </table>
        <table >
			<thead>
				<tr>
					<th colspan="12" >PROVISION OF Waste Disposal</th>
				</tr>
				</thead>
				<tr>
					<th colspan="7" style="width:35%">QUESTION</th>
					<th colspan="5" style="width:65%;text-align:left">RESPONSE</th>
				</tr>
			
			' . $this -> mnhWasteDisposalAspectsSection . '
		</table>
		
	 </div><!--\.section-7-->
	 <div id="sectionNavigation" class="buttonsPane">
		<input title="To View Previous Section" id="back" value="View Previous Section" class="awesome blue medium" type="reset"/>
		<input title="To Save This Section" id="submit" class="awesome blue medium"  type="submit" name="post_form" value="Save and Go to the Next Section"/>				
		</div>
	</form>';
		$data['form'] = $this -> combined_form;
		$data['form_id'] = 'form_dcah';
		$this -> load -> view('form', $data);
	}

	public function get_mch_form() {
		$this -> combined_form .= '<h5 id="status"></h5>
                 
				<form class="bbq" name="mch_tool" id="mch_tool" method="POST">

  				 <p id="data" class="feedback"></p>
		         <p style="color:#488214;font-size:20px;font-style:bold">You are currently taking ' . (((strtoupper($this -> session -> userdata('survey'))) == 'CH') ? 'Child Health' : 'Maternal and Newborn Health') . ' Survey</p>
		         <div id="section-1" class="step">
		         <input type="hidden" name="step_name" value="section-1"/>
		          <p style="display:true" class="message success">SECTION 1 of 7: FACILITY INFORMATION</p>
				<table class="centre" >

		       <thead><th colspan="9">FACILITY INFORMATION</th></thead>
		       
			<tr>
			<td>Facility Name </td>
			<td>
			<!--input type="text" id="facilityName" name="facilityName" class="cloned" size="40" disabled/-->
			<label id="facilityName"  size="40" ></label>
			<input type="hidden" name="facilityMFLCode" id="facilityMFLCode" />
			<input type="hidden" name="facilityHName" id="facilityHName" />
			</td> 
			<td>Facility Level </td>
			<td>
			<!--input type="text" id="facilityLevel" name="facilityLevel" class="cloned"  size="40"/-->
			<select name="facilityLevel" id="facilityLevel" class="cloned" style="width:75%">
							<option value="" selected="selected">Select Level</option>
							' . $this -> selectFacilityLevel . '
						</select>
			</td><td>County </td>
			<td>
			<select name="facilityCounty" id="facilityCounty" class="cloned" style="width:85%">
							<option value="" selected="selected">Select County</option>
							' . $this -> selectCounties . '
						</select>
			</td>
			</tr>
			<tr>
			<td>Facility Type </td><td>
			<select name="facilityType" id="facilityType" class="cloned" style="width:75%">
							<option value="" selected="selected">Select Type</option>
							' . $this -> selectFacilityType . '
						</select>

			</td>
			<td>Owned By </td><td>
			<select name="facilityOwnedBy" id="facilityOwnedBy" class="cloned" style="width:75%">
							<option value="" selected="selected">Select Owner</option>
							' . $this -> selectFacilityOwner . '
						</select>
			</td>

			<td>District/Sub County </td><td>
			<select name="facilityDistrict" id="facilityDistrict" class="cloned" style="width:85%">
							<option value="" selected="selected">Select District/Sub County</option>
							' . $this -> selectDistricts . '
						</select>
			</td>
			</tr>
		
		</table>
		<table class="centre">
		<thead>
		<th colspan="12" >FACILITY CONTACT INFORMATION</th>
		</thead>
		<tr >
			<th scope="col" colspan="2" >CADRE</th>
			<th>NAME</th>
			<th >MOBILE</th>
			<th >EMAIL</th>
		</tr>
		<tr>
			<td colspan="2">Incharge </td>
			<td>
			<input type="text" id="facilityInchargename" name="facilityInchargename" class="cloned" size="40"/>
			</td><td>
			<input type="text" id="facilityInchargemobile" name="facilityInchargemobile" class="phone" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityInchargeemail" name="facilityInchargeemail" class="cloned mail" size="40"/>
			</td>
		</tr>
		<tr>
			<td colspan="2">MCH </td>
			<td>
			<input type="text" id="facilityMchname" name="facilityMchname" class="cloned" size="40"/>
			</td><td>
			<input type="text" id="facilityMchmobile" name="facilityMchmobile" class="phone" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMchemail" name="facilityMchemail" class="cloned mail" size="40"/>
			</td>
		</tr>
		<!--tr>
			<td  colspan="2">Maternity </td>
			<td>
			<input type="text" id="facilityMaternityname" name="facilityMaternityname" class="cloned" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMaternitymobile" name="facilityMaternitymobile" class="phone" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMaternityemail" name="facilityMaternityemail" class="cloned mail" size="40"/>
			</td>
		</tr-->

	</table>
	
	<table class="centre">
		<thead>
			<th colspan="2" >COMMUNITY STRATEGY </th>
		</thead>
		
		
			<th  style="width:35%">ASPECT</th>
			<th   style="width:65%;text-align:left"> RESPONSE </th>			
			

		</tr>' . $this -> mchCommunityStrategySection . '
	</table>
	
	</div><!--\.the section-1 -->
	
	<!--div id="No" class="step"--><!--end of assessment message section-->
	<!--input type="hidden" name="step_name" value="end_of_assessment"/>
	<div class="block">
	        <p align="left" style="font-size:16px;color:#AA1317; font-weight:bold">Assessment Complete</p>
			<p id="data" class="message success">Thanks for your participation.<br></p><br>
			<p class="message success">' . anchor(base_url() . 'commodity/assessment', 'Select another Facility') . '</p>
			</div>
	</div--><!--\.end of assessment message section-->
	
	<div id="section-2" class="step">
	<input type="hidden" name="step_name" value="section-2"/>
	 <p style="display:true" class="message success">SECTION 2 of 7: GUIDELINES, STAFF TRAINING AND COMMODITY AVAILABILITY</p>

     <table class="centre">
		<thead>
			<th colspan="3" >GUIDELINES AVAILABILITY </th>
		</thead>
		
		
			<th  style="width:35%">ASPECT</th>
			<th   style="width:10.5%;text-align:left"> RESPONSE </th>	
			<th   style="width:52.5%;text-align:left"> If <strong>Yes</strong>, Indicate Total Quantities Available </th>		
			

		</tr>' . $this -> mchGuidelineAvailabilitySection . '
	</table>
	
     <table class="centre">
	<thead>
		<th colspan="4"  >IN THE LAST 2 YEARS, HOW MANY STAFF MEMBERS HAVE BEEN TRAINED IN THE FOLLOWING?</th></thead>
		<th colspan ="2" style="text-align:left"> TRAININGS</th>
		<th style="text-align:left">Number Trained in the Last 2 Years</th>
		<th colspan ="2" style="text-align:left"><div style="width: 500px" >How Many Of The Staff Members 
		Trained in the Last 2 Years are still Working in Child Health?</div></th>
		
		' . $this -> mchTrainingGuidelineSection . '

	</table>
	
	<table  class="centre persist-area" >
	<thead>
	    <tr class="persist-header">
		
			<th colspan="15">INDICATE THE AVAILABILITY, LOCATION, SUPPLIER AND QUANTITIES ON HAND OF THE FOLLOWING COMMODITIES.INCLUDE REASON FOR UNAVAILABILITY. </th>
		</tr>
		</thead>
		<tr>
			<th scope="col" >Commodity Name</th>
			<th >Commodity Unit</th>
			<th colspan="3" style="text-align:center"> Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></div>
			</th>
			<th>
			<div style="width: 90%" >
				Main Reason For  Unavailability
			</div>
			</th>
			<th colspan="6" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<th colspan="2">Available Quantities</th>
			<th scope="col">
			
				Main Supplier
			</th>

		</tr>
		<tr >
			<td>&nbsp;</td>
			<td >Unit</td>
			<td >Available</td>
			<td>Sometimes Available</td>
			<td>Never Available</td>
			<td> Unavailability</td>
			<td>OPD</td>
			<td>MCH</td>
			<td>U5 Clinic</td>
			<td>Ward</td>
			<td>Other</td>
			<td>Not Applicable</td>
			<td>No. of Units</td>
			<td>Expiry Date</td>
			<td>Supplier</td>

		</tr>' . $this -> mchCommodityAvailabilitySection . '

	</table>
	</div><!--\.section 2-->

	<div id="section-3" class="step">
	<input type="hidden" name="step_name" value="section-3"/>
	 <p style="display:true" class="message success">SECTION 3 of 7: SERVICE DELIVERY, QUALITY OF DIAGNOSIS </p>

     <table class="centre">
		<thead>
			<th colspan="2" >ARE THE FOLLOWING SERVICES OFFERED TO A CHILD WITH DIARRHOEA? </th>
		</thead>
		
		
			<th  style="width:35%">SERVICE</th>
			<th   style="width:65%;text-align:left"> RESPONSE </th>			
			

		</tr>' . $this -> mchIndicatorsSection['svc'] . '
	</table>
	
	<table class="centre">
		<thead>
			<th colspan="2" >ARE THE FOLLOWING DANGER SIGNS ASSESSED IN ONGOING SESSION FOR A CHILD WITH DIARRHOEA? </th>
		</thead>
		
		
			<th  style="width:35%">DANGER SIGN</th>
			<th   style="width:65%;text-align:left"> RESPONSE </th>			
			

		</tr>' . $this -> mchIndicatorsSection['sgn'] . '
	</table>
	
	<table class="centre">
		<thead>
			<th colspan="2" >DO HEALTH WORKERS PERFORM THE FOLLOWING IN ONGOING SESSION FOR A CHILD WITH DIARRHOEA? </th>
		</thead>
		
		
			<th  style="width:35%">ACTION</th>
			<th   style="width:65%;text-align:left"> RESPONSE </th>			
			

		</tr>' . $this -> mchIndicatorsSection['dgn'] . '
	</table>
	
	<table class="centre">
		<thead>
			<th colspan="2" >DO HEALTH WORKERS COUNSEL ON THE FOLLOWING IN ONGOING SESSION FOR A CHILD WITH DIARRHOEA? </th>
		</thead>
		
		
			<th  style="width:35%">ACTION</th>
			<th   style="width:65%;text-align:left"> RESPONSE </th>			
			

		</tr>' . $this -> mchIndicatorsSection['cns'] . '
	</table>
		
	</div><!--\.section-3-->

    <div id="section-4" class="step">
    <input type="hidden" name="step_name" value="section-4"/>
     <p style="display:true" class="message success">SECTION 4 of 7: REVIEW OF RECORDS, DIARRHOEA MORBIDITY DATA</p>
    
	
	<table class="centre">
		
		<thead>
			<th colspan="2" > (A) DOES THE UNIT HAVE THE FOLLOWING TOOLS? </th>
		</thead>
		
			<th  style="width:35%">TOOL</th>
			<th   style="width:65%;text-align:left"> RESPONSE </th>			
			

		</tr>' . $this -> mchIndicatorsSection['ror'] . '
	</table>
	
	<table class="centre">
		
	<thead>
	<th colspan="13" > (B) INDICATE THE NUMBER OF DIARRHOEA CASES SEEN IN THIS FACILITY FOR THE FOLLOWING PERIODS  </th></thead>


	<th> MONTH</th><th><div style="width: 50px"> JANUARY</div></th> <th>FEBRUARY</th><th>MARCH</th><th> APRIL</th><th> MAY</th><th>JUNE</th>

		 <!--tr>
			<td>' . (date('Y') - 1) . '</td>
			<td style ="text-align:center;">
			<input type="text" id="dnjanuary_12" name="dnjanuary_12"  size="8" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnfebruary_12" name="dnfebruary_12" size="8" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnmarch_12" size="8" name="dnmarch_12" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnapril_12" size="8" name="dnapril_12" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnmay_12" size="8" name="dnmay_12" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnjune_12" size="8" name="dnjune_12" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnjuly_12" size="8" name="dnjuly_12" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnaugust_12" size="8" name="dnaugust_12" class="cloned numbers"/>
			</td>
			<td  style ="text-align:center;">
			<input type="text" id="dnseptember_12" size="8" name="dnseptember_12" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnoctober_12" size="8" name="dnoctober_12" class="cloned numbers"/></td>
			<td style ="text-align:center;" width="15">
			<input type="text" id="dnnovember_12" size="8" name="dnnovember_12" class="cloned numbers"/></td>
			
			<td style ="text-align:center;">
			<input type="text" id="dndecember_12" size="8" name="dndecember_12" class="cloned numbers"/>
			</td>			
			

		</tr-->

		<tr>
			<td>' . date("Y") . '</td>			
			<td style ="text-align:center;"><input type="text" id="dnjanuary_13" size="8" name="dnjanuary_13" class="cloned numbers"/>
			</td>
			
			<td style ="text-align:center;">
			<input type="text" id="dnfebruary_13" name="dnfebruary_13" size="8"class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnmarch_13" name="dnmarch_13" size="8"class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnapril_13" name="dnapril_13" size="8"class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnmay_13" name="dnmay_13" size="8"class="cloned numbers" />
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnjune_13" name="dnjune_13" size="8"class="cloned numbers" disabled/>
			</td>

			
		</tr>
		<th> MONTH</th><th> JULY</th><th> AUGUST</th><th> SEPTEMBER</th><th> OCTOBER</th><th> NOVEMBER</th><th> DECEMBER</th>
		<tr>
		<td>' . (date('Y')) . '</td>
		<td style ="text-align:center;">
			<input type="text" id="dnjuly_13" size="8" name="dnjuly_13" class="cloned numbers" />
			<td style ="text-align:center;">
			<input type="text" id="dnaugust_13" size="8" name="dnaugust_13" class="cloned numbers" disabled/>
			</td>
			<td  style ="text-align:center;">
			<input type="text" id="dnseptember_13" size="8" name="dnseptember_13" class="cloned numbers" disabled/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnoctober_13" size="8" name="dnoctober_13" class="cloned numbers" disabled/></td>
			<td style ="text-align:center;" width="15">
			<input type="text" id="dnnovember_13" size="8" name="dnnovember_13" class="cloned numbers" disabled/></td>
			
			<td style ="text-align:center;">
			<input type="text" id="dndecember_13" size="8" name="dndecember_13" class="cloned numbers" disabled/>

			</td>	
		</tr>
	</table>
	
	<table class="centre">
		
		<thead>
			<th colspan="6" > (C) HOW MANY CHILDREN WERE GIVEN THE FOLLOWING TREATMENT BASED ON THE CLASSIFICATION BELOW IN THE LAST 3 MONTHS? </th>
		</thead>
		<tr>
		     
			<th  style="width:35%">TREATMENT</th>
			<th colspan="5" style="text-align:center"> Classification</th>
			
		</tr>
		<tr >
			<td>&nbsp;</td>
			<td >Severe Dehydration</td>
			<td>Some Dehydration</td>
			<td>No Dehydration</td>
			<td>Dysentry</td>
			<td>No Classification</td>
		</tr>
		' . $this -> treatmentMCHSection . '
	</table>
	
    </div><!--\.section-4-->
    
    <div id="section-5" class="step">
	<input type="hidden" name="step_name" value="section-5"/>
	 <p style="display:true" class="message success">SECTION 5 of 7: ORT CORNER ASSESSMENT,EQUIPMENT AVAILABILITY AND STATUS </p>
		
		<table class="centre">
		<thead>
			<th colspan="2" >0RAL REHYDRATION THERAPY CORNER ASSESSMENT </th>
		</thead>
		
		
			<th  style="width:35%">ASPECT</th>
			<th   style="width:65%;text-align:left"> RESPONSE </th>			
			

		</tr>' . $this -> ortCornerAspectsSection . '
	</table>
		
		<table  class="centre" >
		<thead>
			<th colspan="12">INDICATE THE AVAILABILITY, LOCATION  AND FUNCTIONALITY OF THE FOLLOWING EQUIPMENT AT THE ORT CORNER.</th>
		</thead>

		</tr>
		<tr>
			<th scope="col" >Equipment Name</th>
			
			<th colspan="3" style="text-align:center">Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></th>
			<th colspan="5" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<th colspan="2">Available Quantities</th>
		</tr>
		<tr >
			<td>&nbsp;</td>
			
			<td >Available</td>
			<td>Sometimes Available</td>
			<td>Never Available</td>
			<td>OPD</td>
			<td>MCH</td>
			<td>U5 Clinic</td>
			<td>Ward</td>
			<td>Other</td>
			<td>Fully-Functional</td>
            <!--td>Partially Functional</td-->
			<td>Non-Functional</td>
			</tr>
			' . $this -> equipmentsMCHSection . '

			</table>
           </div><!--\.section-5-->

	<div id="section-6" class="step">
	<input type="hidden" name="step_name" value="section-6"/>
	 <p style="display:true" class="message success">SECTION 6 of 7: SUPPLIES AVAILABILITY</p>
		 <table  class="centre" >
		<thead>
			<th colspan="11">INDICATE THE AVAILABILITY, LOCATION AND SUPPLIER OF THE FOLLOWING.</th>
		</thead>
		<tr>
			<th scope="col" >Supplies Name</th>
			
			<th colspan="3" style="text-align:center"> Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></th>
			<th colspan="5" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<!--th>Available Supplies</th-->
			<th scope="col">
			
				Main Supplier
			</th>
			<!--th scope="col">
			<div style="width: 100px" >
				Main Reason For  Unavailability
			</div></th-->

		</tr>
		<tr >
			<td>&nbsp;</td>
			
			<td >Available</td>
			<td>Sometimes Available</td>
			<td>Never Available</td>
			<td>OPD</td>
			<td>MCH</td>
			<td>U5 Clinic</td>
			<td>Ward</td>
			<td>Other</td>

			<!--td style="text-align:center">No.of Supplies</td-->
			<!--td></td-->
			<td></td>
			
			

		</tr>' . $this -> suppliesMCHSection . '
		</table>
		
		 <p style="display:true" class="message success">SECTION 7 of 7: ELECTRICTY AND HARDWARE RESOURCES</p>
		 <table  class="centre" >
		<thead>
			<th colspan="11">INDICATE THE AVAILABILITY, LOCATION AND SUPPLIER OF THE FOLLOWING.</th>
		</thead>
		<tr>
			<th scope="col" >Resource Name</th>
			
			<th colspan="3" style="text-align:center"> Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></th>
			<th colspan="5" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<!--th>Available Supplies</th-->
			<th scope="col">
			
				Main Supplier
			</th>
			<!--th scope="col">
			<div style="width: 100px" >
				Main Reason For  Unavailability
			</div></th-->

		</tr>
		<tr >
			<td>&nbsp;</td>
			
			<td >Available</td>
			<td>Sometimes Available</td>
			<td>Never Available</td>
			<td>OPD</td>
			<td>MCH</td>
			<td>U5 Clinic</td>
			<td>Ward</td>
			<td>Other</td>

			<!--td style="text-align:center">No.of Supplies</td-->
			<!--td></td-->
			<td></td>
			
			

		</tr>' . $this -> hardwareMCHSection . '
		</table>
		
	
	</div><!--\.section-6 & 7-->
	
	 <div id="sectionNavigation" class="buttonsPane">
		<input title="To View Previous Section" id="back" value="View Previous Section" class="awesome blue medium" type="reset"/>
		<input title="To Save This Section" id="submit" class="awesome blue medium"  type="submit" name="post_form" value="Save and Go to the Next Section"/>				
		</div>
	</form>';
		$data['form'] = $this -> combined_form;
		$data['form_id'] = 'form_dcah';
		$this -> load -> view('form', $data);
	}

	public function survey_complete() {
		$this -> message .= '<div id="No" class="step"><!--end of assessment message section-->
	<input type="hidden" name="step_name" value="end_of_assessment"/>
	<div class="block">
	        <p align="left" style="font-size:20px;color:#AA1317; font-weight:bold">Assessment Complete</p>
			<p id="data" class="message success">Thanks for your participation.<br></p><br>
			<!--p class="message success">' . anchor(base_url() . 'commodity/assessment', 'Select another Facility') . '</p-->
			</div>
	</div><!--\.end of assessment message section-->';
		$data['form'] = $this -> message;
		$this -> load -> view('form', $data);

	}

	public function get_facility_list() {

		$this -> facilityList .= '<table class="centre">
		<thead>
			<th colspan="22" >' . strtoupper($this -> session -> userdata('dName')) . ' DISTRICT/SUB-COUNTY FACILITIES</th>
		</thead>
		
		    <th colspan="1"></th>
			<th  colspan="7">MFL CODE</th>
			<th   colspan="4"> FACILITY NAME </th>			
			<th  colspan="5">SURVEY STATUS</th>
			<th  colspan="5">ACTION</th>

		</tr>' . $this -> districtFacilityListSection . '
		</table>';
		$data['form'] = $this -> facilityList;
		$data['form_id'] = '';
		$this -> load -> view('form', $data);
	}

}
