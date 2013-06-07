<?php
class C_Load extends MY_Controller {
	var $rows, $combined_form;

	public function __construct() {
		parent::__construct();
		//print var_dump($this->tValue); exit;
		$this -> rows = '';
		$this -> combined_form;

	}

	public function getFacilityDetails() {
		/*retrieve files under this form if any*/
		$this -> load -> model('m_zinc_ors_inventory');
		if (($this -> m_zinc_ors_inventory -> retrieveFacilityInfo($this -> session -> userdata('fCode'))) == true) {
			//retrieve existing data..else just load a blank form
			print $this -> m_zinc_ors_inventory -> formRecords;
		}
	}

	public function suggestFacilityName() {
		$this -> load -> model('m_autocomplete');
		$facilityName = strtolower($this -> input -> get_post('term', TRUE));
		//term is obtained from the ajax call

		//echo $facilityName; exit;

		//$facilityName='Keri';

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

	
	public function get_new_form()
	 {
		$this -> combined_form.= 
		         '<h5 id="status"></h5>
                 
				<form name="dcah_tool" id="dcah_tool" method="POST" action="'.base_url().'submit/c_form/complete_commodity_survey">

  				 <p id="data" style="display:none" class="message success"></p>
		       <table class="center">

		        <h3>COMMODITY ASSESSMENT FORM</h3>

		       <thead><th colspan="9">FACILITY INFORMATION</th></thead>
		       
		
			<tr>
			<TD >Facility Name </TD><td>
			<input type="text" id="facilityName" name="facilityName" class="cloned"  size="40"/>
			</td> <TD  >Facility Level </TD><td>
			<input type="text" id="facilityLevel" name="facilityLevel" class="cloned"  size="40"/>
			</td><TD  >County </TD><td>
			<input type="text" id="facilityCounty" name="facilityCounty" class="cloned"   size="40"/>
			</td>
		</tr>
		<tr>
			<TD >Facility Type </TD><td>
			<input type="text" id="facilityType" name="facilityType" class="cloned"   size="40"/>

			</td>
			<TD >Owned By </TD><td>
			<input type="text" id="facilityOwnedBy" name="facilityOwnedBy" class="cloned"  size="40"/>
			</td>

			<TD >District </TD><td>
			<input type="text" id="facilityDistrict" name="facilityDistrict" class="cloned"  size="40"/>
			</td>
			
		</tr>
		
			
		</tr>
		
			
		</tr>
	</table>
	<table class="center">
	<thead>
		<th colspan="12" >FACILITY CONTACT INFORMATION</th></thead>
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
			<input type="text" id="facilityInchargemobile" name="facilityInchargemobile" class="cloned numbers" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityInchargeemail" name="facilityInchargeemail" class="cloned" size="40"/>
			</td>
		</tr>
		<tr>
			<TD  colspan="2">MCH </TD><td>
			<input type="text" id="facilityMchname" name="facilityMchname" class="cloned" size="40"/>
			</td><td>
			<input type="text" id="facilityMchmobile" name="facilityMchmobile" class="cloned numbers" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMchemail" name="facilityMchemail" class="cloned" size="40"/>
			</td>
		</tr>
		<tr>
			<TD  colspan="2">Maternity </TD><td>
			<input type="text" id="facilityMaternityname" name="facilityMaternityname" class="cloned" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMaternitymobile" name="facilityMaternitymobile" class="cloned numbers" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMaternityemail" name="facilityMaternityemail" class="cloned numbers" size="40"/>
			</td>
		</tr>

	</table>
				<table class="center">
		
<thead>
			<th colspan="10" >INDICATE THE NUMBER OF DELIVERIES CONDUCTED IN THE FOLLOWING PERIODS </th></thead>

		
		
			<th> MONTH</th><th> '.(date('Y')-1).'</Th> <Th>'.date("Y").'</th><th>Months</th><th> '.(date('Y')-1).'</Th>
		

		 <tr>
			<td>JANUARY</td><td>
			<input type="text" id="dnjanuary_12" name="dnjanuary_12" class="cloned numbers"/>
			</td>
			
			<td>
			<input type="text" id="dnjanuary_13" name="dnjanuary_13" class="cloned numbers"/>
			</td><td>JULY</td></td><td>
			<input type="text" id="dnjuly_12" name="dnjuly_12" class="cloned numbers"/>
			</td>

		</tr>

		<tr>
			<td>FEBRUARY</td><td>
			<input type="text" id="dnfebruary_12" name="dnfebruary_12" class="cloned numbers"/>
			</td>
			
			<td>
			<input type="text" id="dnfebruary_13" name="dnfebruary_13" class="cloned numbers"/>
			</td></td><td>AUGUST</td><td>
			<input type="text" id="dnaugust_12" name="dnaugust_12" class="cloned numbers"/>
			</td>

			>
		</tr>

		<tr>
			<td>MARCH</td><td>
			<input type="text" id="dnmarch_12" name="dnmarch_12" class="cloned numbers"/>
			</td>
			
			<td>
			<input type="text" id="dnmarch_13" name="dnmarch_13" class="cloned numbers"/>
			</td></td><td>SEPTEMBER</td><td>
			<input type="text" id="dnseptember_12" name="dnseptember_12" class="cloned numbers"/>
			</td>
		</tr>
		<tr>
			<td>APRIL</td></td><td>
			<input type="text" id="dnapril_12" name="dnapril_12" class="cloned numbers"/>
			</td>
			
			<td>
			<input type="text" id="dnapril_13" name="dnapril_13" class="cloned numbers"/>
			</td></td><td>OCTOBER</td><td>
			<input type="text" id="dnoctober_12" name="dnoctober_12" class="cloned numbers"/>
		</tr>
		<tr>
			<td>MAY</td></td><td>
			<input type="text" id="dnmay_12" name="dnmay_12" class="cloned numbers"/>
			</td>
			</td>
			<td>
			<input type="text" id="dnmay_13" name="dnmay_13" class="cloned numbers"/>
			</td></td><td>NOVEMBER</td><td>
			<input type="text" id="dnnovember_12" name="dnnovember_12" class="cloned numbers"/>
			</td>
		</tr>
		<tr>
			<td>JUNE</td><td>
			<input type="text" id="dnjune_12" name="dnjune_12" class="cloned numbers"/>
			</td>
			
			<td>
			<input type="text" id="dnjune_13" name="dnjune_13" class="cloned numbers"/>
			</td><td>DECEMBER</td><td>
			<input type="text" id="dndecember_12" name="dndecember_12" class="cloned numbers"/>
			</td>
		</tr>

	</table>

	<table class="center">
		<thead>
			<th colspan="8" >PROVISION OF BEmONC SIGNAL FUNCTIONS  IN THE LAST THREE MONTHS </th>
		</thead>
		<tr >
			<th  width="15">SIGNAL FUNCTION</th>
			<th  width="7"> CONDUCTED OR NOT CONDUCTED </th>
			
			<th width="15">INDICATE CHALLENGE</th>

		</tr>'.$this->signalFunctionsSection.'
	</table>

	<table  class="center" >
		<thead>
			<th colspan="12">INDICATE THE NO. OF UNITS  AVAILABLE, lOCATION, MAIN SUPPLIER FOR EACH MONTH. INCLUDE REASON FOR UNAVAILABILITY</th>
		</thead>

		</tr>
		<tr>
			<th scope="col" >Commodity Name</th>
			<th >Commodity Unit</th>
			<th colspan="3" >Availability</th>
			<th colspan="4">Location of Availability</th>
			<th>Available Quantities</th>
			<th scope="col">
			<div style="width: 40px" >
				Main Supplier
			</div></th>
			<th scope="col">
			<div style="width: 40px" >
				Main Reason For  Unavailability
			</div></th>

		</tr>
		<tr >
			<td>&nbsp;</td>
			<td >Unit</td>
			<td >Available</td>
			<td>Some Available</td>
			<td>Never Available</td>
			<td>Delivery room</td>
			<td>Pharmacy</td>
			<td>Store</td>
			<td>Other</td>

			<td>No.of Units</td>
			<td>Supplier</td>
			<td> Unavailability</td>

		</tr>'.$this->commodityAvailabilitySection.'

	</table>

	<table class="center">
	<thead>
		<th colspan="4"  >INDICATE THE NUMBER OF STAFF TRAINED ON THE FOLLOWING, AND WHEN THEY LAST HAD THE TRAINING  </th></thead>
		<th colspan ="2" style="text-align:left"> TRAININGS</th><th colspan ="2" style="text-align:left"> WHEN LAST TRAINED</th>
		
		'.$this->trainingGuidelineSection.'

	</table>

	<table  class="center" >
		<thead>
			<th colspan="13">INDICATE THE NUMBER OF UNITS USED AND THE NUMBER OF TIMES COMMODITIES WERE NOT AVAILABILE FOR MORE THAN 7 (SEVEN) DAYS. </th>
		</thead>

		</tr>
		<tr >
			<th scope="col" >Commodity Name</th>
			<th colspan="2">November</th>
			<th colspan="2" >December</th>
			<th colspan="2">January</th>
			<th colspan="2">February</th>
			<th scope="col" colspan="2">
			<div style="width: 40px" >
				March
			</div></th>
			<th scope="col" colspan="2">
			<div style="width: 40px" >
				April
			</div></th>

		</tr>
		<tr >
			<td>&nbsp;</td>
			<td >Used Units</td>
			<td >Times Unavailable </td>
			<td>Used Units</td>
			<td>Times Unavailable </td>
			<td>Used Units</td>
			<td>Times Unavailable </td>
			<td>Used Units</td>
			<td>Times Unavailable </td>

			<td>Used Units</td>
			<td>Times Unavailable </td>
			<td> Used Units</td>
			<td>Times Unavailable </td>

		</tr>
        '.$this->commodityUsageAndOutageSection.'
	<tr id="buttonsPane" >
	<td>
		<input title="To save" id="submit" class="awesome blue medium"  type="submit" name="post_form" value="Save and Submit"/>				
		<!--input title="To reset the form" id="back" class="awesome magenta medium" type="reset"/-->
		
		<!--a title="To close the form." id="close_opened_form" class="awesome red medium">Close</a-->
		</td>
	    </tr>
	</table>
</form>';
		$data['form'] = $this -> combined_form;
		$data['form_id'] = 'form_dcah';
		$this->load->view('form',$data);
	}

}
