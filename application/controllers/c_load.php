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
		         <!--h3 align="center">COMMODITY, SUPPLIES AND EQUIPMENT ASSESSMENT</h3-->
		         <div id="section-1" style="display:true">
		          <p style="display:true" class="message success">SECTION 1</p>
				<table class="centre" >

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
			<input type="text" id="facilityType" name="facilityType" class="cloned"    size="40"/>

			</td>
			<TD >Owned By </TD><td>
			<input type="text" id="facilityOwnedBy" name="facilityOwnedBy" class="cloned"  size="40"/>
			</td>

			<TD >District </TD><td>
			<input type="text" id="facilityDistrict" name="facilityDistrict" class="cloned"  size="40"/>
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
	<table class="centre">
	<thead>
	<th colspan ="8"> DOES THIS FACILITY ROUTINELY CONDUCT DELIVERIES?</th> </thead>
	<tr><th colspan ="8"><select name="cDeliveries" id="cDeliveries" >
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option></th></tr>
	</table>
	<table class="centre" style="display:none" id="delivery_centre">
	
	<thead><th colspan ="8">WHAT ARE THE MAIN REASONS FOR NOT CONDUCTING DELIVERIES? </br>(multiple selections allowed)</th></thead>
	<tr><th colspan ="2">Inadequate skill or staff</th><th colspan ="2"> Inadequate infrastructure (equipment)</th>
	<th colspan ="2">  Inadequate commodities and supplies</th><th colspan ="2">  Other</th></tr>
	<td style ="text-align:center;" colspan ="2">
			<input name="rsnDeliveries1" type="checkbox" value="Inadequate skill or staff" />
			</td>
			<td style ="text-align:center;" colspan ="2">
			<input name="rsnDeliveries2" type="checkbox" value="Inadequate infrastructure (equipment)" />
			</td>
			<td style ="text-align:center;" colspan ="2">
			<input name="rsnDeliveries3" type="checkbox" value=" Inadequate commodities and supplies" />
			</td>
			<td style ="text-align:center;" colspan ="2">
			<input name="rsnDeliveries4" type="checkbox" value="Other" />
			</td>
	
	
	</table>
	<div id="deliveriesDone" class="buttonsPane">
		<input title="To save" id="submit" class="awesome blue medium"  type="submit" name="post_form" value="Save and Go to the Next Section"/>				
		<!--input title="To reset the form" id="back" class="awesome magenta medium" type="reset"/-->
		
		<!--a title="To close the form." id="close_opened_form" class="awesome red medium">Close</a-->
		
	</div>
	</div><!--\.the section-1 -->
	
	<div id="section-2" style="display:true">
	 <p style="display:true" class="message success">SECTION 2</p>
	<table class="centre">
		
	<thead>
	<th colspan="13" >INDICATE THE NUMBER OF DELIVERIES CONDUCTED IN THE FOLLOWING PERIODS </th></thead>

	<th> MONTH</th><th><div style="width: 50px"> JANUARY</div></th> <th>FEBRUARY</th><th>MARCH</th><th> APRIL</th><th> MAY</th><th>JUNE</th><th> JULY</th><th> AUGUST</th>
	<th> SEPTEMBER</th><th> OCTOBER</th><th> NOVEMBER</th><th> DECEMBER</th>
		 <tr>
			<td>'.(date('Y')-1).'</td>
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
			

		</tr>

		<tr>
			<td>'.date("Y").'</td>			
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
			<td style ="text-align:center;">
			<input type="text" id="dnjuly_13" size="8" name="dnjuly_13" class="cloned numbers" disabled="disabled"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnaugust_13" size="8" name="dnaugust_13" class="cloned numbers" disabled="disabled"/>
			</td>
			<td  style ="text-align:center;">
			<input type="text" id="dnseptember_13" size="8" name="dnseptember_13" class="cloned numbers" disabled="disabled"/>
			</td>
			<td style ="text-align:center;">
			<input type="text" id="dnoctober_13" size="8" name="dnoctober_13" class="cloned numbers" disabled="disabled"/></td>
			<td style ="text-align:center;" width="15">
			<input type="text" id="dnnovember_13" size="8" name="dnnovember_13" class="cloned numbers" disabled="disabled"/></td>
			
			<td style ="text-align:center;">
			<input type="text" id="dndecember_13" size="8" name="dndecember_13" class="cloned numbers" disabled="disabled"/>
			</td>			
			

			
		</tr>

	
	</table>

	
	<table class="centre">
		<thead>
			<th colspan="14" >PROVISION OF BEmONC SIGNAL FUNCTIONS  IN THE LAST THREE MONTHS </th>
		</thead>
		
		
			<th  colspan="7">SIGNAL FUNCTION</th>
			<th   colspan="4"> WAS IT CONDUCTED? </th>			
			<th  colspan="5">INDICATE MAJOR CHALLENGE</th>

		</tr>'.$this->signalFunctionsSection.'
	</table>
	<div id="deliveriesConducted" class="buttonsPane">
		<input title="To save" id="submit" class="awesome blue medium"  type="submit" name="post_form" value="Save and Go to the Next Section"/>				
		<!--input title="To reset the form" id="back" class="awesome magenta medium" type="reset"/-->
		
		<!--a title="To close the form." id="close_opened_form" class="awesome red medium">Close</a-->
		
	</div>
	</div><!--\.section 2-->

	<div id="section-3" style="display:true">
	 <p style="display:true" class="message success">SECTION 3</p>
	<table  class="centre persist-area" >
	<thead>
	    <tr class="persist-header">
		
			<th colspan="12">INDICATE THE AVAILABILITY, LOCATION, SUPPLIER AND QUANTITIES ON HAND OF THE FOLLOWING COMMODITIES.INCLUDE REASON FOR UNAVAILABILITY. </th>
		</tr>
		</thead>
		<tr>
			<th scope="col" >Commodity Name</th>
			<th >Commodity Unit</th>
			<th colspan="3" style="text-align:center"> Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></div></th>
			<th colspan="4" style="text-align:center"> Location of Availability  </BR><strong> (Mutiple Selection Allowed)</strong></th>
			<th>Available Quantities</th>
			<th scope="col">
			
				Main Supplier
			</th>
			<th scope="col">
			<div style="width: 100px" >
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

			<td>No.of Units</td>
			<td>Supplier</td>
			<td> Unavailability</td>

		</tr>'.$this->commodityAvailabilitySection.'

	</table>
	<div id="commodityAvailability" class="buttonsPane">
		<input title="To save" id="submit" class="awesome blue medium"  type="submit" name="post_form" value="Save and Go to the Next Section"/>				
		<!--input title="To reset the form" id="back" class="awesome magenta medium" type="reset"/-->
		
		<!--a title="To close the form." id="close_opened_form" class="awesome red medium">Close</a-->
		
	</div>
	</div><!--\.section-3-->

    <div id="section-4" style="display:true">
     <p style="display:true" class="message success">SECTION 4</p>
	<table class="centre">
	<thead>
		<th colspan="4"  >IN THE LAST 2 YEARS, HOW MANY STAFF MEMBERS HAVE BEEN TRAINED IN THE FOLLOWING?</th></thead>
		<th colspan ="2" style="text-align:left"> TRAININGS</th><th style="text-align:left">Number Trained</th>
		<th colspan ="2" style="text-align:left"><div style="width: 500px" >How Many Of The Staff Members 
		Trained in the Last 2 Years are still Working in the Marternity Unit?</DIV></th>
		
		'.$this->trainingGuidelineSection.'

	</table>
	<div id="staffTraining" class="buttonsPane">
		<input title="To save" id="submit" class="awesome blue medium"  type="submit" name="post_form" value="Save and Go to the Next Section"/>				
		<!--input title="To reset the form" id="back" class="awesome magenta medium" type="reset"/-->
		
		<!--a title="To close the form." id="close_opened_form" class="awesome red medium">Close</a-->
		
	</div>
    </div><!--\.section-4-->

	<div id="section-5" style="display:true">
	 <p style="display:true" class="message success">SECTION 5</p>
	<table  class="centre" >
		<thead>
			<th colspan="11"> IN THE LAST 3 MONTHS INDICATE THE NUMBER OF TIMES THE COMMODITY WAS NOT AVAILABLE.</BR>
			WHEN THE COMMODITY WAS NOT AVAILABLE WHAT HAPPENED? </th>
		</thead>

		</tr>
		<tr >
			<th scope="col"  colspan="2"><div style="width: 1
			00px" >Commodity Name</div></th>
			
			<th scope="col" colspan="2">
			<div style="width: 40px" >
				Usage
			</div></th>
			<th scope="col" colspan="2">
			<div style="width: 100px" >
				Number Of Times the commodity was unavailable
			</div></th>
			<th scope="col" colspan="5">
			<div style="width: 600px" >
				When the commodity was not available what happened
				</br>
				(Mutiple Selections Allowed)
			</div></th>

		</tr>
		<tr >
			<td colspan="2">&nbsp;</td>
			<td colspan="2">Used Units</td>
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
        '.$this->commodityUsageAndOutageSection.'
        </table>
	   <div id="commodityOutage" class="buttonsPane">
		<input title="To save" id="submit" class="awesome blue medium"  type="submit" name="post_form" value="Save and Go to the Next Section"/>				
		<!--input title="To reset the form" id="back" class="awesome magenta medium" type="reset"/-->
		
		<!--a title="To close the form." id="close_opened_form" class="awesome red medium">Close</a-->
		
	</div>
	</div><!--\.section-5-->
	<div id="section-6" style="display:true">
	 <p style="display:true" class="message success">SECTION 6</p>
		
		<table  class="centre" >
		<thead>
			<th colspan="12">INDICATE THE AVAILABILITY, LOCATION  AND FUNCTIONALITY OF THE FOLLOWING EQUIPMENT.</th>
		</thead>

		</tr>
		<tr>
			<th scope="col" >Equipment Name</th>
			
			<th colspan="3" style="text-align:center">Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></th>
			<th colspan="4" style="text-align:center"> Location of Availability  </BR><strong> (Mutiple Selection Allowed)</strong></th>
			<th colspan="3">Functionality </br> <strong>(One Selection Allowed)</strong></th>
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
			<td>Functional</td>
            <td>Partially Functional</td>
			<td>Non-Functional</td>
			</tr>
			'.$this->equipmentsSection.'

			</table>
			
		 <table  class="centre" >
		<thead>
			<th colspan="12">INDICATE THE AVAILABILITY, LOCATION  AND QUANTITIES ON HAND OF THE FOLLOWING SUPPLIES.</th>
		</thead>

		</tr>
		<tr>
			<th scope="col" >Supplies Name</th>
			
			<th colspan="3" style="text-align:center"> Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></th>
			<th colspan="4" style="text-align:center"> Location of Availability  </BR><strong> (Mutiple Selection Allowed)</strong></th>
			<th>Available Supplies</th>
			
			

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
			

		</tr>'.$this->suppliesSection.'
		</table>
		<div id="suppliesEquipment" class="buttonsPane">
		<input title="To save" id="submit" class="awesome blue medium"  type="submit" name="post_form" value="Save and Go to the Next Section"/>				
		<!--input title="To reset the form" id="back" class="awesome magenta medium" type="reset"/-->
		
		<!--a title="To close the form." id="close_opened_form" class="awesome red medium">Close</a-->
		
	</div>
	</div><!--\.section-6-->
	</form>';
		$data['form'] = $this -> combined_form;
		$data['form_id'] = 'form_dcah';
		$this->load->view('form',$data);
	}

	

	
	 
}
