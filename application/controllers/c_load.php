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
		if (($this -> m_mnh_survey -> retrieveFacilityInfo($this -> input -> get_post('facilityMFL', TRUE))) == true) {
			//retrieve existing data..else just load a blank form
			//set facility code into the session
			$new_data = array('facilityMFL' => $this -> input -> get_post('facilityMFL', TRUE));
			$this -> session -> set_userdata($new_data);
			print $this -> m_mnh_survey -> formRecords;
		}
	}

	public function suggestfac_name() {
		$this -> load -> model('m_autocomplete');
		$fac_name = strtolower($this -> input -> get_post('term', TRUE));
		//term is obtained from an ajax call

		if (!strlen($fac_name) < 2)

			//echo $fac_name;

			try {
				$this -> rows = $this -> m_autocomplete -> getAutocomplete(array('keyword' => $fac_name));
				//die (var_dump($this->rows));
				$json_data = array();

				//foreach($this->rows as $key=>$value)
				//array_push($json_data,$value['fac_name']);
				foreach ($this->rows as $value) {
					array_push($json_data, $value -> fac_name);

					//print $key.' '.$value.'<br />';
					//$json_data=array('code'=>$value->fac_mfl,'name'=>$value->fac_name);
				}
				print json_encode($json_data);
				//die;

			} catch(exception $ex) {
				//ignore
				//$ex->getMessage();
			}

	}
	
	/**
	 * [startSurvey description]
	 * @param  [type] $survey_type     [description]
	 * @param  [type] $survey_category [description]
	 * @param  [type] $fac_mfl         [description]
	 * @param  [type] $survey_year     [description]
	 * @return [type]                  [description]
	 */
	public function startSurvey($survey_type,$survey_category,$fac_mfl,$survey_year){
		$result          =$this->db->get_where('survey_types',array('st_name'=>$survey_type));
		$result          =$result->result_array();		
		$survey_type     =$result[0]['st_id'];
		
		$result          =$this->db->get_where('survey_categories',array('sc_name'=>$survey_category));
		$result          =$result->result_array();		
		$survey_category =$result[0]['sc_id'];

		$data  =array('ss_year'=>$survey_year,'st_id'=>$survey_type,'sc_id'=>$survey_category,'fac_id'=>$fac_mfl);
		
		$count =$this->checkifExists($data,'survey_status');
		if($count==0){
			$this->db->insert('survey_status',$data);	
		}
		else{

		}
		
		$result =$this->db->get_where('survey_status',array('ss_year'=>$survey_year,'st_id'=>$survey_type,'sc_id'=>$survey_category,'fac_id'=>$fac_mfl));
		$result = $result->result_array();		
		$ss_id  =$result[0]['ss_id'];
		$data = array('survey_status'=>$ss_id,'facilityMFL'=>$fac_mfl);
		$this->session->set_userdata($data);

	}
/**
 * [checkifExists description]
 * @param  [type] $data  [description]
 * @param  [type] $table [description]
 * @return [type]        [description]
 */
	public function checkifExists($data,$table) {
		$this -> db -> like($data);
		$this -> db -> from($table);
		$count = $this -> db -> count_all_results();
		return (int)$count;

	}

	public function getFacilitySection($survey,$fac_mfl){
		$section = $this->getSection($survey,$fac_mfl);
		echo $section;
	}


	public function suggest() {
		$this -> load -> model('m_autocomplete');
		//$fac_name=$this->input->post('username',TRUE);

		try {
			$this -> rows = $this -> m_autocomplete -> getAllFacilityNames();
			//die(var_dump($this->rows));
			$json_data = array();

			foreach ($this->rows as $key => $value)
			//array_push($json_names,$value['fac_name']);
				$json_data = array('code' => $value['fac_mfl'], 'name' => $value['fac_name']);
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
			<td>Facility Name </td>
			<td>
			<!--input type="text" id="fac_name" name="fac_name" class="cloned" size="40" disabled/-->
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
			<select name="fac_county" id="fac_county" class="cloned" style="width:85%">
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
			<select name="fac_district" id="fac_district" class="cloned" style="width:85%">
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
			<TD  colspan="2">MCH Incharge</TD><td>
			<input type="text" id="facilityMchname" name="facilityMchname" class="cloned" size="40"/>
			</td><td>
			<input type="text" id="facilityMchmobile" name="facilityMchmobile" class="phone" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMchemail" name="facilityMchemail" class="cloned mail" size="40"/>
			</td>
		</tr>
		<tr>
			<TD  colspan="2">Maternity Incharge</TD><td>
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
			<input type="text" id="dnjanuary_12" name="january"  size="8" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnfebruary_12" name="february" size="8" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnmarch_12" size="8" name="march" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnapril_12" size="8" name="april" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnmay_12" size="8" name="may" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnjune_12" size="8" name="june" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnjuly_12" size="8" name="july]" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnaugust_12" size="8" name="august]" class="cloned numbers"/>
			</td>
			<td  style ="text-align:center;">
			<input type="text" id="dnseptember_12" size="8" name="september"] class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnoctober_12" size="8" name="october]" class="cloned numbers"/></td>
			<td style ="text-align:center;" width="15">
			<input type="text" id="dnnovember_12" size="8" name="november]" class="cloned numbers"/></td>
			
			<td style ="text-align:center;">
			<input type="text" id="dndecember_12" size="8" name="december]" class="cloned numbers"/>
			</td>			
			

		</tr-->

		<tr>
			<td>' . date("Y") . '</td>			
			<td style ="text-align:center;">
			<input type="text" id="january" name="dnmonth[january]"  size="8" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="february" name="dnmonth[february]" size="8" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="march" size="8" name="dnmonth[march]" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="april" size="8" name="dnmonth[april]" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="may" size="8" name="dnmonth[may]" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="june" size="8" name="dnmonth[june]" class="cloned numbers"/>
			</td>

			
		</tr>
		<th> MONTH</th><th> JULY</th><th> AUGUST</th><th> SEPTEMBER</th><th> OCTOBER</th><th> NOVEMBER</th><th> DECEMBER</th>
		<tr>
		<td>' . 2013 . '</td>
			<td style ="text-align:center;">
			<input type="text" id="july" size="8" name="dnmonth[july]" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="august" size="8" name="dnmonth[august]" class="cloned numbers"/>
			</td>
			<td  style ="text-align:center;">
			<input type="text" id="september" size="8" name="dnmonth[september]" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="october" size="8" name="dnmonth[october]" class="cloned numbers"/></td>
			<td style ="text-align:center;" width="15">
			<input type="text" id="november" size="8" name="dnmonth[november]" class="cloned numbers"/></td>
			
			<td style ="text-align:center;">
			<input type="text" id="december" size="8" name="dnmonth[december]" class="cloned numbers"/>
			</td>		
		</tr>
	</table>
	
	<table class="centre">
		<thead>
			<th colspan="14" >PROVISION OF BEmONC SIGNAL FUNCTIONS  IN THE LAST THREE MONTHS </th>
		</thead>
		
		
			<th  colspan="7">SIGNAL FUNCTION</th>
			<th   colspan="2"> WAS IT CONDUCTED? </th>			
			<th  colspan="5">INDICATE <span style="text-decoration:underline">PRIMARY</span> CHALLENGE</th>

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
			<th colspan="2" style="text-align:center"> Availability  
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
			<td>Not Available</td>
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
		<th colspan="5"  >IN THE LAST 2 YEARS, HOW MANY STAFF MEMBERS HAVE BEEN TRAINED IN THE FOLLOWING?</th></thead>
		<th colspan ="2" style="text-align:left"> TRAININGS</th>
		<th style="text-align:left">Number Trained before 2010</th>
		<th style="text-align:left">Number Trained after 2010</th>
		<th colspan ="1" style="text-align:left"><div style="width: 500px" >How Many Of The Total Staff Members 
		Trained are still Working in Child Health?</div></th>
		
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
			<th colspan="10">INDICATE THE AVAILABILITY, LOCATION  AND FUNCTIONALITY OF THE FOLLOWING EQUIPMENT.</th>
		</thead>

		</tr>
		<tr>
			<th scope="col" >Equipment Name</th>
			
			<th colspan="2" style="text-align:center">Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></th>
			<th colspan="4" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<th colspan="2">Available Quantities</th>
		</tr>
		<tr >
			<td>&nbsp;</td>
			
			<td >Available</td>
			<td>Not Available</td>
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
			
			<th colspan="2" style="text-align:center">Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></th>
			<th colspan="4" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<th colspan="2">Available Quantities</th>
		</tr>
		<tr></tr>
		<tr >
			<td>&nbsp;</td>
			
			<td >Available</td>
			<td>Not Available</td>
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
			
			<th colspan="2" style="text-align:center"> Availability  
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
			<td>Not Available</td>
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
			<th colspan="14" >INDICATE THE STORAGE AND ACCESS TO WATER BY THE COMMUNITY </th>
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
			
			<th colspan="2" style="text-align:center"> Availability  
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
			<th>Not Available</th>		
		</tr>
		
		' . $this -> hardwareMNHSection . '
		</table>
           </div><!--\.section-6-->
			<div id="section-7" class="step">
			<input type="hidden" name="step_name" value="section-7"/>
	 <p style="display:true" class="message success">SECTION 7 of 7: KITS / SETS AVAILABILITY</p>
			
	<table  class="centre" >
		<thead>
			<th colspan="11">INDICATE THE AVAILABILITY, LOCATION, SUPPLIER AND QUANTITIES ON HAND OF THE FOLLOWING SUPPLIES.INCLUDE REASON FOR UNAVAILABILITY.</th>
		</thead>

		</tr>
		<tr>
			<th scope="col" >Supplies Name</th>
			
			<th colspan="2" style="text-align:center"> Availability  
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
			<td>Not Available</td>
			<td>Delivery room</td>
			<td>Pharmacy</td>
			<td>Store</td>
			<td>Other</td>

			<td style="text-align:center">No.of Supplies</td>
			<td></td>
			<td></td>
			
			

		</tr>' . $this -> suppliesSection . '
		</table>'./*
		<!--table  class="centre" >
		<thead>
			<!--th colspan="11"> IN THE LAST 3 MONTHS INDICATE THE USAGE, NUMBER OF TIMES THE SUPPLY WAS NOT AVAILABLE.</BR>
			WHEN THE SUPPLY WAS NOT AVAILABLE WHAT HAPPENED? </th-->
			<!--th colspan="11"> IN THE LAST 3 MONTHS INDICATE NUMBER OF TIMES THE SUPPLY WAS NOT AVAILABLE.</BR>
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
        ' . $this -> suppliesUsageAndOutageSection . '<d-->
        </table>*/'
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
			<!--input type="text" id="fac_name" name="fac_name" class="cloned" size="40" disabled/-->
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
			<select name="fac_county" id="fac_county" class="cloned" style="width:85%">
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
			<select name="fac_district" id="fac_district" class="cloned" style="width:85%">
							<option value="" selected="selected">Select District/Sub County</option>
							' . $this -> selectDistricts . '
						</select>
			</td>
			</tr>
		
		</table>
		<table>
	<thead>
		<th colspan="12">ASSESSOR INFORMATION </th>
	</thead>
	<tbody>
		<tr>
			<td>Name </td><td>
			<input type="text" size="40">
			</td><td>Designation </td><td><!--input type="text" id="designation" name="designation" class="cloned"  size="40"/-->
			<input type="text" size="40" >
			</td><td>Email </td>
			<td>
			<input type="text" size="40" >
			</td>
			</td><td>Phone Number </td>
			<td>
			<input type="text" size="40" >
			</td>
		</tr>
	</tbody>
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
	<table>
  <thead>
	<th colspan = "12">HEALTH SERVICES</th>
	</thead>
	<tbody>
	<tr>Where are sick children seen?
	</tr>
	<tr>
		<td>OPD</td>
		<td><input type="radio",name="opd", size="40"></td>
		<td>U5 Clinic</td>
		<td><input type="radio",name="usclinic",size="40"></td>
		<td>MCH</td>
		<td><input type="radio",name="mch",size="40"></td>
		<td>Other</td>
		<td><input type="radio",name="other",size="40"></td>
		<td>If Other, Specify</td>
		<td><input type="radio",name="specify",size="40"></td>
		</tr>
	</tbody>
</table>
	<table>
		<thead><th colspan = "12"> INFRASTRACTURE: IMCI CONSULTATION ROOM</th></thead>
		<tbody>
		<thead>
		<th colspan="12">Has IMCI consultation room been established?</th>
		</thead>
		<tr>
		</tr>' . $this -> mchConsultationSection . '
		</tbody>
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
	 <p style="display:true" class="message success">SECTION 2 of 7: GUIDELINES, JOB AIDS AND TOOLS</p>

     <table class="centre">
		<thead>
			<th colspan="3" >GUIDELINES AND JOB AIDS AVAILABILITY</th>
		</thead>
		
		
			<th  style="width:35%">ASPECT</th>
			<th   style="width:10.5%;text-align:left"> RESPONSE </th>	
			<th   style="width:52.5%;text-align:left"> If <strong>Yes</strong>, Indicate Total Quantities Available </th>		
			

		</tr>' . $this -> mchGuidelineAvailabilitySection . '
	</table>
	
     <table class="centre">
	<thead>
		<th colspan="5"  >IN THE LAST 2 YEARS, HOW MANY STAFF MEMBERS HAVE BEEN TRAINED IN THE FOLLOWING?</th></thead>
		<th colspan ="2" style="text-align:left"> TRAININGS</th>
		<th style="text-align:left">Number Trained before 2010</th>
		<th style="text-align:left">Number Trained after 2010</th>
		<th colspan ="1" style="text-align:left"><div style="width: 500px" >How Many Of The Total Staff Members 
		Trained are still Working in Child Health?</div></th>
		
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
			<th colspan="2" style="text-align:center"> Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></div>
			</th>
			<th>
			<div style="width: 90%" >
				Main Reason For  Unavailability
			</div>
			</th>
			<th colspan="7" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<th colspan="2">Available Quantities</th>
			<th scope="col">
			
				Main Supplier
			</th>

		</tr>
		<tr >
			<td>&nbsp;</td>
			<td >Unit</td>
			<td >Available</td>
			<td>Not Available</td>
			<td> Unavailability</td>
			<td>OPD</td>
			<td>MCH</td>
			<td>U5 Clinic</td>
			<td>Ward</td>
			<td>Pharmacy</th>
			<td>Other</td>
			<td>Not Applicable</td>
			<td>No. of Units</td>
			<td>Expiry Date</td>
			<td>Supplier</td>

		</tr>' . $this -> mchCommodityAvailabilitySection . '

	</table>
	 <table  class="centre persist-area" >
	<thead>
	    <tr class="persist-header">
		
			<th colspan="15">BUNDLING: INDICATE THE AVAILABILITY, LOCATION, SUPPLIER AND QUANTITIES ON HAND OF THE FOLLOWING COMMODITIES. </th>
		</tr>
		</thead>
		<tr>
			<th scope="col" >Commodity Name</th>
			<th >Commodity Unit</th>
			<th colspan="2" style="text-align:center"> Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></div>
			</th>
			<th>
			<div style="width: 90%" >
				Main Reason For  Unavailability
			</div>
			</th>
			<th colspan="7" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<th colspan="1">Available Quantities</th>
			<th colspan="1" rowspan="2">
			
				Main Supplier
			</th>

		</tr>
		<tr >
			<td>&nbsp;</td>
			<td >Unit</td>
			<td >Available</td>
			<td>Not Available</td>
			<td> Unavailability</td>
			<td>OPD</td>
			<td>MCH</td>
			<td>U5 Clinic</td>
			<td>Ward</td>
			<td>Pharmacy</th>
			<td>Other</td>
			<td>Not Applicable</td>
			<td>No. of Units</td>

		</tr>' . $this -> mchBundling . ' 

	</table>
	<table class="centre">

			<thead>
			<tr>
				<th colspan="6" > DATA FROM THE TOOLS </th>
			</tr>
			<tr>
				<th colspan="6" > (A) MALARIA</th>
			</tr>
				<tr>
				<th  rowspan="2" style="width:35%">TREATMENT</th>
				<th colspan="5" style="text-align:center"> Classification</th>
				</tr>
				<tr >
					<th>Malaria</th>
					<th>Fever No malaria</th>
				</tr>'
				.$this -> mchmalariaTreatmentSection.
			'</thead>
		</table>
		<table class="centre">
		<thead>
			<tr>
				<th colspan="6" > (B) PNEUMONIA</th>
			</tr>
				<tr>
				<th  rowspan="2" style="width:35%">TREATMENT</th>
					<th colspan="5" style="text-align:center"> Classification</th>
					</tr>
				<tr >
					<th>Pneumonia</th>
					<th>Fever No Pneumonia cough/cold</th>
					</tr>'
			.$this -> mchpneumoniaTreatmentSection.	
			'</thead>
		</table>
		<table class="centre"><thead>
			<tr>
				<th colspan="6" > (C) DIARRHOEA </th>
			</tr>
				<tr>
					<th  rowspan="2" style="width:35%">TREATMENT</th>
					<th colspan="5" style="text-align:center"> Classification</th>

				</tr>
				<tr >

					<th >Severe Dehydration</th>
					<th>Some Dehydration</th>
					<th>No Dehydration</th>
					<th>Dysentry</th>
					<th>No Classification</th>
				</tr>
			</thead>
			' . $this -> treatmentMCHSection . '
		</table>
		<table class="centre">

			<thead>
			<tr>
				<th colspan="6" >TOTAL U5 CHILDREN SEEN IN THE LAST 3 MONTHS OF THOSE, HOW MANY CAME IN WITH THE FOLLOWING</th>
			</tr>
				<tr>
				<th colspan="6" style="text-align:center"> Classification</th>
				</tr>
				</thead>
					<tr >
					<td>Diarrhoea Total:<input type = "text", name= "diarrhoeaTotal"></td>
					<td>Severe Dehydation:<input type="text", name="severedehydration"></td>
					<td>Some Dehydation:<input type="text", name="somedehydration"></td>
					<td>No Dehydation:<input type="text", name="nodehydration"></td>
					<td>Dysentry:<input type="text", name="dysentry"></td>
					<td>No Classification:<input type="text", name="noclassification"></td>
					</tr>
					<tr >
					<td>Pneumonia Total:<input type="text",name="pneumoniaTotal"></td>
					<td>Pneumonia:<input type="text", name="pneumonia"></td>
					<td>No Pneumonia cough/cold:<input type="text", name="nopneumonia"></td>
					</tr>
					<tr >
					<td>Malaria Total:<input type="malariaTotal", name = "malariaTotal"></td>
					<td>Confirmed:<input type="text", name="pneumonia"></td>
					<td>Not Confirmed:<input type="text", name="nopneumonia"></td>
					</tr>
		</table>
		<table class="centre">
		<thead>
			<tr>
				<th colspan="15"  > CLINICAL STAFF</th>
			</tr>
			<tr>
				<th colspan ="2" style="text-align:left"> CLINICAL STAFF</th>
				<th style="text-align:left">TOTAL IN FACILITY</th>
				<th style="text-align:left">TOTAL AVAILABLE ON DUTY<th>
				<th style="text-align:left">NUMBER OF STAFF TRAINED IN IMCI</th>
				<th style="text-align:left">NUMBER OF STAFF TRAINED IN ICCM<th>
				<th style="text-align:left">NUMBER OF STAFF TRAINED IN ENHANCED DIARRHOEA MANAGEMENT</th>
				<th style="text-align:left">NUMBER OF STAFF TRAINED IN DIARRHOEA CMEs FOR U5s<th>
				<th style="text-align:left">
				<div style="width: 500px" >
					How Many Of The Total Staff Members
					Trained are still Working in Child Health?
				</div></th>
			</tr>
		</thead>
		<tr>
			<td>Doctor</td>
			</tr>
			<tr>
			<td>Nurse</td>
			</tr>
			<tr>
			<td>R.C.O</td>
			</tr>
	</table>
	
	</div><!--\.section 2-->

	<div id="section-3" class="step">
	<input type="hidden" name="step_name" value="section-3"/>
	 <p style="display:true" class="message success">SECTION 3 of 7: SERVICE DELIVERY, QUALITY OF DIAGNOSIS </p>

     <table class="centre">
		<thead>
			<th colspan="2" >ARE THE FOLLOWING SERVICES OFFERED TO A CHILD WITH DIARRHOEA?  </th>
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
			<th colspan="2" >DO HEALTH CARE WORKERS PERFORM THE FOLLOWING IN ONGOING SESSION FOR A CHILD WITH DIARRHOEA? </th>
		</thead>
		
		
			<th  style="width:35%">ACTION</th>
			<th   style="width:65%;text-align:left"> RESPONSE </th>			
			

		</tr>' . $this -> mchIndicatorsSection['dgn'] . '
	</table>
	
	<table class="centre">
		<thead>
			<th colspan="2" >DO HEALTH CARE WORKERS COUNSEL ON THE FOLLOWING IN ONGOING SESSION FOR A CHILD WITH DIARRHOEA?  </th>
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

		

		<tr>
			<td>2013</td>			
			<td style ="text-align:center;">
			<input type="text" id="january" name="dnmonth[january]"  size="8" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="february" name="dnmonth[february]" size="8" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="march" size="8" name="dnmonth[march]" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="april" size="8" name="dnmonth[april]" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="may" size="8" name="dnmonth[may]" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="june" size="8" name="dnmonth[june]" class="cloned numbers"/>
			</td>

			
		</tr>
		<th> MONTH</th><th> JULY</th><th> AUGUST</th><th> SEPTEMBER</th><th> OCTOBER</th><th> NOVEMBER</th><th> DECEMBER</th>
		<tr>
		<td>2013</td>
			<td style ="text-align:center;">
			<input type="text" id="july" size="8" name="dnmonth[july]" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="august" size="8" name="dnmonth[august]" class="cloned numbers"/>
			</td>
			<td  style ="text-align:center;">
			<input type="text" id="september" size="8" name="dnmonth[september]" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="october" size="8" name="dnmonth[october]" class="cloned numbers"/></td>
			<td style ="text-align:center;" width="15">
			<input type="text" id="november" size="8" name="dnmonth[november]" class="cloned numbers"/></td>
			
			<td style ="text-align:center;">
			<input type="text" id="december" size="8" name="dnmonth[december]" class="cloned numbers"/>
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
	<table class="centre">
		
		<thead>
			<th colspan="6" > (D) WHAT IS THE MAIN CHALLENGE IN ACCESSING <span style="text-decoration:underline">DATA TREATMENT RECORDS</span> FOR DIARRHOEA CASES IN CHILDREN U5 IN THE LAST 3 MONTHS
			(refer to Question C above)(One Selection Allowed) </th>
		</thead>
		'.$this -> selectAccessChallenges.'
		
		
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
			<th colspan="11">INDICATE THE AVAILABILITY, LOCATION  AND FUNCTIONALITY OF THE FOLLOWING EQUIPMENT AT THE ORT CORNER.</th>
		</thead>

		</tr>
		<tr>
			<th scope="col" >Equipment Name</th>
			
			<th colspan="2" style="text-align:center">Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></th>
			<th colspan="5" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<th colspan="2">Available Quantities</th>
		</tr>
		<tr >
			<td>&nbsp;</td>
			
			<td >Available</td>
			<td>Not Available</td>
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
	 <p style="display:true" class="message success">SECTION 6 of 7: RESOURCE AVAILABILITY</p>
		 <table  class="centre" >
		<thead>
			<th colspan="10">INDICATE THE AVAILABILITY, LOCATION AND SUPPLIER OF THE FOLLOWING.</th>
		</thead>
		<tr>
			<th scope="col" >Supplies Name</th>
			
			<th colspan="2" style="text-align:center"> Availability  
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
			<td>Not Available</td>
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
			<th colspan="10">INDICATE THE AVAILABILITY, LOCATION AND SUPPLIER OF THE FOLLOWING.</th>
		</thead>
		<tr>
			<th scope="col" >Resource Name</th>
			
			<th colspan="2" style="text-align:center"> Availability  
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
			<td>Not Available</td>
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
		<table class="centre">
		<thead>
			<th colspan="2" >COMMUNITY STRATEGY </th>
		</thead>
		
		
			<th  style="width:35%">ASPECT</th>
			<th   style="width:65%;text-align:left"> RESPONSE </th>			
			

		</tr>' . $this -> mchCommunityStrategySection . '
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
public function get_hcw_form() {
		$this -> combined_form .='
<h5 id="status"></h5>
                 
				<form class="bbq" name="hcw_tool" id="hcw_tool" method="POST">
		<div id="section-1" class="step">
<table>
    <thead>
        <tr>
            <th colspan="6" style="font-size:22px">Follow up Support supervision checklist on IMCI after training </th>
        </tr>
        <tr>
            <th colspan="6" >Facility Information</th>
        </tr>
    </thead>
    <tbody>
        <tr>
			<td>Facility Name </td>
			<td>
			<!--input type="text" id="fac_name" name="fac_name" class="cloned" size="40" disabled/-->
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
			<select name="fac_county" id="fac_county" class="cloned" style="width:85%">
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
			<select name="fac_district" id="fac_district" class="cloned" style="width:85%">
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
			<TD  colspan="2">MCH Incharge</TD><td>
			<input type="text" id="facilityMchname" name="facilityMchname" class="cloned" size="40"/>
			</td><td>
			<input type="text" id="facilityMchmobile" name="facilityMchmobile" class="phone" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMchemail" name="facilityMchemail" class="cloned mail" size="40"/>
			</td>
		</tr>
		<tr>
			<TD  colspan="2">Maternity Incharge</TD><td>
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
        <tr>
            <th colspan="4">HCW Profile </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="4">Name of Provider</td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type="text" name="hp_first_name" id="hp_first_name"></td>
            <td>Surname</td>
            <td><input type="text" name="hp_surname" id="hp_surname"></td>
        </tr>
        <tr>
            <td>National ID</td>
            <td><input type="text" name="hp_national_id" id="hp_national_id"></td>
            <td>Phone Number</td>
            <td><input type="text" name="hp_phone_number" id="hp_phone_number"></td>
        </tr>
        <tr>
            <td colspan="1">Year, Month when trained <input type="text" name="hp_year" id="hp_year"></td>
            <td colspan="3"><p><b>Key coordinator of the training(Select one)</b></p>
                <p><input type="radio" name="hp_coordinator" id="">MOH/KPA/CHAI</p>
                <p><input type="radio" name="hp_coordinator" id="">MOH only</p>
                <p><input type="radio" name="hp_coordinator" id="">Other</p>
                <p>(If other, indicate the name of the coordinator/partner)<input type="text" name="hp_other" id="hp_other"></p>
            </td>
        </tr>
        <tr>
            <td colspan="1"><label for="">Designation</label></td>
            <td colspan="3"><input type="text" name="hp_coordinator" id="hp_coordinator"></td>
        </tr>'. $this -> hcwProfileSection . '
    </tbody>
    <tfoot></tfoot>
</table>
<p class="message success">Work Station Profile</p>
<table>
    <tbody>
        <tr>
            <td>Current Unit</td>
            <td><input type="text" name="ws_current_unit" id="ws_current_unit"></td>
        </tr>
    </tbody>
</table>
<table>
    <thead>
        <tr>
            <td>Question</td>
            <td>Yes</td>
            <td>No</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                1.	Is the HCW still working in the original facility they were when they got trained?
            </td>
            <td>
                <input type="radio" name="ws_original_facility" id="" value="yes">
            </td>
            <td>
                <input type="radio" name="ws_original_facility" id="" value="no">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                If No to question 1 indicate whether the HCW:
            </td>
        </tr>
        <tr>
            <td>
                Transferred to another facility in the same county
            </td>
            <td>
                <input type="radio" name="ws_another_facility" id="" value="yes">
            </td>
            <td>
                <input type="radio" name="ws_another_facility" id="" value="no">
            </td>
        </tr>
        <tr>
            <td colspan="3">If Yes, indicate name of the facility <input type="text" name="" id=""> </td>
        </tr>
        <tr>
            <td>
                Transferred to another facility in another county
            </td>
            <td>
                <input type="radio" name="ws_another_county" id="" value="yes">
            </td>
            <td>
                <input type="radio" name="ws_another_county" id="" value="no">
            </td>
        </tr>
        <tr>
            <td colspan="3">If  Yes, indicate the name of the county <input type="text" name="ws_county" id="ws_county"> and facility <input type="text" name="ws_facility" id="ws_facility"> </td>
        </tr>
    </tbody>
</table>
</div> <!-- end of section 1 -->

<div id="section-2" class="step">
<p class="message success">OBSERVATION OF CASE MANAGEMENT: ONE CASE PER HCW</p>
<table class="centre">
    <thead>
        <tr>
            <th colspan="2" >ARE THE FOLLOWING SERVICES OFFERED TO A CHILD</th>
        </tr>
        <tr>
            <th  width="700px">SERVICE</th>
            <th> RESPONSE </th>
        </tr>
    </thead>
    ' . $this -> hcwCaseManagementSection['svc'] . '
</table>
<table class="centre">
    <thead>
        <tr>
            <th colspan="2" >ARE THE FOLLOWING DANGER SIGNS ASSESSED IN ONGOING SESSION FOR A CHILD</th>
        </tr>
        <tr>
            <th width="700px" >SERVICE</th>
            <th > RESPONSE </th>
        </tr>
    </thead>
    ' . $this -> hcwCaseManagementSection['sgn'] . '
</table>
<p class="message success">ASSESSMENT FOR THE 4 MAIN SYMPTOMS IN AN ONGOING SESSION FOR A CHILD</p>
<table class="centre">
    <thead>
        <tr>
            <th width="700px">Symptom</th>
            <th rowspan="2" >Response</th>
        </tr>
        <tr>
            <th>1. Cough / Pneumonia</th>
        </tr>
    </thead>
     ' . $this -> hcwCaseManagementSection['pne'] . '
</table>
<table class="centre">
    <thead>
        <tr>
            <th width="700px">Symptom</th>
            <th rowspan="2">Response</th>
        </tr>
        <tr>
            <th>2. Diarrhoea</th>
        </tr>
    </thead>
     ' . $this -> hcwCaseManagementSection['dgn'] . '
</table>
<table class="centre">
    <thead>
        <tr>
            <th width="700px">Symptom</th>
            <th rowspan="2">Response</th>
        </tr>
        <tr>
            <th>3. Fever / Malaria</th>
            
        </tr>
    </thead>
     ' . $this -> hcwCaseManagementSection['fev'] . '
</table>
<p class="message success">DOES THE HCW CHECK FOR THE FOLLOWING</p>
<table class="centre">
    <thead>
        <tr>
            <th width="700px">Condition</th>
            <th>Response</th>
        </tr>
    </thead>
    <tbody>
     ' . $this -> hcwCaseManagementSection['con'] . '
    </tbody>
</table>
<table class="centre">
    <thead>
        <tr>
            <th width="700px">Classification</th>
            <th>Response</th>
        </tr>
    </thead>
    <tbody>
        ' . $this -> hcwCaseManagementSection['cls'] . '
    </tbody>
</table>
<table class="centre">
    <thead>
        <tr>
            <th width="700px">Treatment and Counselling</th>
            <th>Response</th>
        </tr>
    </thead>
    <tbody>
        dy>
        ' . $this -> hcwCaseManagementSection['cnl'] . '
    </tbody>
</table>
<table class="centre">
    <thead>
        <tr>
            <th width="700px">Referrals</th>
            <th>Response</th>
        </tr>
    </thead>
    <tbody>
        ' . $this -> hcwCaseManagementSection['ref'] . '
    </tbody>
    </tbody>
</table>
</div>
<div id="section-3" class="step">
<p class="message success">CONSULTATION OBSERVATION</p>
<table class="centre">
	   <thead>
     	<tr>
            <th width="700px">3.1 Consultation observation (observe three patient consultations if possible): write N/A if not applicable </th>
        	<th>Case 1</th>
            <th>Case 2</th>
            <th>Case 3</th>
        </tr>
        </thead>
    <tbody>
       ' . $this -> hcwConsultingAspectsSection . '
        
    </tbody>
    <tfoot></tfoot>
</table>
<table class="centre">
    <thead>
     	<tr>
            <th width="700px">3.2 Exit Interview With The Caregiver / Mother </th>
        	<th>Case 1</th>
            <th>Case 2</th>
            <th>Case 3</th>
        </tr>
    </thead>
    <tbody>
       ' . $this -> hcwInterviewAspectsSection . '
        
    </tbody>
    <tfoot></tfoot>
</table>
</div>
<div id="section-4" class="step">
<p class="message success">PROVIDER SCORE</p>
<table class="centre">
    <thead>
        <tr>
            <th width="700px">GIVE ONE POINT FOR EACH ANSWER</th>
            <th >Response</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>ASSESSMENT</td>
            <td><input type="text"></td>
        </tr>
        <tr>
            <td>CLASSIFICATION</td>
            <td><input type="text"></td>
        </tr>
        <tr>
            <td>TREATMENT</td>
            <td><input type="text"></td>
        </tr>
        <tr>
            <td>COUNSELING</td>
            <td><input type="text"></td>
        </tr>
        <tr>
            <td>RETURNING DATE FOR FOLLOW-UP</td>
            <td><input type="text"></td>
        </tr>
        <tr>
            <td>TOTAL</td>
            <td><input type="text"></td>
        </tr>
    </tbody>
</table>
<p class="message success">ASSESSMENT OUTCOME</p>
<table>
    <tr>
        <td colspan="2">
            <p><input type="radio">Fully Practicing IMCI</p>
            <p><input type="radio">	Partially practicing IMCI (capture reasons) </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio">	Has some knowledge gaps (specify the gaps)<input type="text"></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio">	Others (specify)<input type="text"></p>
            <p><input type="radio">	Not practicing IMCI (capture reasons) </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio">	Could not be traced</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio">	Transferred to another county</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio">	Transferred to a non-pardiatric unit</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio">	Other (specify)<input type="text"></p>
            <p>Certificatied:<input type="radio">YES <input type="radio">NO</p>
        </td>
    </tr>
</table>

</div>
<div id="sectionNavigation" class="buttonsPane">
		<input title="To View Previous Section" id="back" value="View Previous Section" class="awesome blue medium" type="reset"/>
		<input title="To Save This Section" id="submit" class="awesome blue medium"  type="submit" name="post_form" value="Save and Go to the Next Section"/>				
		</div>
	</form>
';
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
