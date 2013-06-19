<?php
## Extend CI_Controller to include Doctrine Entity Manager

class  MY_Controller  extends  CI_Controller {

	public $em, $response, $theForm, $rowsInserted, $executionTime, $data, $data_found,
	$selectCommodityType, $facilities, $selectCounties, 
	$selectDistricts, $selectFacilityType, $selectFacilityLevel,$selectFacilityOwner,$selectProvince,$selectCommoditySuppliers,$selectFacility,
	$commodityAvailabilitySection,$signalFunctionsSection,$trainingGuidelineSection,$suppliesUsageAndOutageSection,$commodityUsageAndOutageSection,$suppliesSection,$equipmentsSection;

	function __construct() {
		parent::__construct();

		/* Instantiate Doctrine's Entity manage so we don't have

		   to everytime we want to use Doctrine */
		   
		$this->em = $this->doctrine->em;
		$this->response=$this->theForm=$this->data='';
		$this->selectCounties=$this->selectDistricts=$selectFacilityType=$selectFacilityLevel=$selectProvince=$selectFacilityOwner=$selectFacility=$this->selectCommoditySuppliers='';
		$this->commodityAvailabilitySection=$this->signalFunctionsSection=$this->trainingGuidelineSection=$this->commodityUsageAndOutageSection=$this->equipmentsSection='';
		$this->getHealthFacilities();
		$this->getCountyNames();$this->getDisctrictNames();$this->getFacilityLevels();$this->getCommoditySuppliers();
		$this->getFacilityTypes();$this->getFacilityOwners();$this->getProvinceNames();
		$this->createCommodityAvailabilitySection();$this->createBemoncSignalFunctionsSection();$this->createStaffTrainingGuidelinesSection();
		$this->createSuppliesSection();$this->createEquipmentSection();
		$this->createCommodityUsageAndOutageSection();
		$this->createSuppliesUsageAndOutageSection();
  
	}

	function getRepositoryByFormName($form) {
		$this -> the_form = $this -> em -> getRepository($form);
		return $this -> theForm;
	}

	
	public function getProvinceNames(){/*obtained from the session data*/
			  if($this -> session -> userdata('allProvinces') )
			//  print var_dump($this -> session -> userdata('allProvinces'));exit;
				foreach($this -> session -> userdata('allProvinces') as $key=>$value){
				 $this->selectProvince.= '<option value="'.$value['provinceID'].'">'.$value['provinceName'].'</option>'.'<br />';
				}
				
				//var_dump($this -> session -> userdata('allProvinces')); exit;
				return $this->selectProvince;
			
		}

	
	public function getDisctrictNames(){/*obtained from the session data*/
			  if($this -> session -> userdata('allDistricts') )
			//  print var_dump($this -> session -> userdata('allDistricts'));exit;
				foreach($this -> session -> userdata('allDistricts') as $key=>$value){
				 $this->selectDistricts.= '<option value="'.$value['districtID'].'">'.$value['districtName'].'</option>'.'<br />';
				}
				
				//var_dump($this -> session -> userdata('allDistricts')); exit;
				return $this->selectDistricts;
			
		}

    public function getCountyNames(){/*obtained from the session data*/
			  if($this -> session -> userdata('allCounties') )
			//  print var_dump($this -> session -> userdata('allCounties'));exit;
				foreach($this -> session -> userdata('allCounties') as $key=>$value){
				 $this->selectCounties.= '<option value="'.$value['countyID'].'">'.$value['countyName'].'</option>'.'<br />';
				}
				
				//var_dump($this -> session -> userdata('allCounties')); exit;
				return $this->selectCounties;
			
		}
	
	public function getFacilityTypes(){/*obtained from the session data*/
			  if($this -> session -> userdata('allFacilityTypes') )
			//  print var_dump($this -> session -> userdata('allFacilityTypes'));exit;
				foreach($this -> session -> userdata('allFacilityTypes') as $key=>$value){
				 $this->selectFacilityType.= '<option value="'.$value['facilityTypeID'].'">'.$value['facilityType'].'</option>'.'<br />';
				}
				
				//var_dump($this -> session -> userdata('allFacilityTypes')); exit;
				return $this->selectFacilityType;
			
		}

	public function getFacilityLevels(){/*obtained from the session data*/
			  if($this -> session -> userdata('allFacilityLevels'))

			// print var_dump($this -> session -> userdata('allFacilityLevels'));exit;

			foreach ($this -> session -> userdata('allFacilityLevels') as $key => $value) {
				$this -> selectFacilityLevel .= '<option value="' . $value['facilityLevelID'] . '">' . $value['facilityLevel'] . '</option>' . '<br />';
			}

		//var_dump($this -> session -> userdata('allFacilityLevels')); exit;
		return $this -> selectFacilityLevel;

	}
	
	

	public function getFacilityOwners(){/*obtained from the session data*/
			  if($this -> session -> userdata('allFacilityOwners'))
			// print var_dump($this -> session -> userdata('allFacilityOwners'));exit;
			foreach ($this -> session -> userdata('allFacilityOwners') as $key => $value) {
				$this -> selectFacilityOwner .= '<option value="' . $value['facilityOwnerID'] . '">' . $value['facilityOwner'] . '</option>' . '<br />';
			}

		//var_dump($this -> session -> userdata('allFacilityOwners')); exit;
		return $this -> selectFacilityOwner;

	}
	

    public function getCommoditySuppliers(){
		$this->load->model('m_mnh_survey');
	    $this->data_found= $this->m_mnh_survey->getCommoditySupplierNames();
		foreach($this->data_found as $value) {
				$this ->selectCommoditySuppliers .= '<option value="' . $value['supplierName'] . '">' . $value['supplierName'] . '</option>' . '<br />';
			}
	}
	
	 public function getHealthFacilities(){
		$this->load->model('m_mnh_survey');
	    $this->data_found= $this->m_mnh_survey->getFacilityNames();
		foreach($this->data_found as $value) {
				$this ->selectFacility .= '<option value="' . $value['facilityName'] . '">' . $value['facilityName'] . '</option>' . '<br />';
			}
	}
	
	 /**Function to create the section: STATE THE AVAILABILITY & QUANTITIES OF THE FOLLOWING COMMODITIES.
	 * */
	public function createCommodityAvailabilitySection(){
    $this->load->model('m_mnh_survey');
	 $this->data_found= $this->m_mnh_survey->getCommodityNames();
	//var_dump($this->data_found);die;
	$counter=0;
	$supplier_names=$this->selectCommoditySuppliers;
   	foreach($this->data_found as $value){
   		$counter++;
   		$this->commodityAvailabilitySection.='<tr>
			<td> '.$value['commodityName'].' </td>
			<td> '.$value['commodityUnit'].'</td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="radio" value="Available" style="vertical-align: middle; margin: 0px;"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="radio" value="Some Available" />
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="radio" value="Never Available" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_'.$counter.'[]" type="checkbox" value="Delivery Room" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_'.$counter.'[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_'.$counter.'[]" type="checkbox" value="Store" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_'.$counter.'[]" type="checkbox" value="Other" />
			</td>

			<td style ="text-align:center;">
			<input name="cqNumberOfUnits_'.$counter.'" type="text" size="5" />
			</td>
			<td width="50">
			<select name="cqSupplier_'.$counter.'" id="cqSupplier_'.$counter.'" >
			<option value="" selected="selected">Select One</option>
				'.$supplier_names.'
			</select></td>
			<td width="50">
			<select name="cqReason_'.$counter.'" id="cqReason_'.$counter.'" >
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">Not Ordered</option>
				<option value="Ordered but not yet Received">Ordered but not yet Received</option>
				<option value="Expired">Expired</option>
				<option value="All Used">All Used</option>

			</select></td>
			<input type="hidden"  name="cqCommodityCode_'.$counter.'" id="cqCommodityCode_'.$counter.'" value="'.$value['commodityCode'].'" />
	</tr>';
		
   	}
	//echo $this->commodityAvailabilitySection;die;
   	return $this->commodityAvailabilitySection;
   }

  

  /**Function to create the section: PROVISION OF BEmONC SIGNAL FUNCTIONS IN THE LAST THREE MONTHS
	 * */
	public function createBemoncSignalFunctionsSection(){
    $this->load->model('m_mnh_survey');
	 $this->data_found= $this->m_mnh_survey->getSignalFunctions();
	//var_dump($this->data_found);die;
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
   		$this->signalFunctionsSection.='<tr>
			<td colspan="7">'.$value['signalName'].'</td><td colspan="4">
			<select name="bmsfSignalFunctionConducted_'.$counter.'" id="bmsfSignalFunctionConducted_'.$counter.'" >
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select></td><td colspan="5">
			<select name="bmsfChallenge_'.$counter.'" id="bmsfChallenge_'.$counter.'" >
				<option value="" selected="selected">Select Challenge</option>
				<option value="Inadequate Drugs">1. Inadequate Drugs</option>
				<option value="Inadequate Skill">2. Inadequate Skill</option>
				<option value="Inadequate Supplies">3.Inadequate Supplies</option>
				<option value="Inadequate Job aids">4. Inadequate Job aids</option>
				<option value="Inadequate equipment">5.Inadequate Equipment</option>
				<option value="Case never presented">6. Case never presented</option>

			</select></td>
			<input type="hidden"  name="bmsfSignalCode_'.$counter.'" id="bmsfSignalCode_'.$counter.'" value="'.$value['signalCode'].'" />
		</tr>';
		
   	}
	//echo $this->signalFunctionsSection;die;
   	return $this->signalFunctionsSection;
   }
   
   /**Function to create the section: INDICATE WHEN LAST ANY STAFF AT YOUR FACILITY RECEIVED TRAINING ON THE FOLLOWING GUIDELINES
	 * */
	public function createStaffTrainingGuidelinesSection(){
    $this->load->model('m_mnh_survey');
	 $this->data_found= $this->m_mnh_survey->getTrainingGuidelines();
	//var_dump($this->data_found);die;
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
   		$this->trainingGuidelineSection.='<tr>
			<TD colspan="2" >'.$value['guidelineName'].'</TD><td>
			<input name="noTrained'.$counter.'" type="text" size="10" />
			</td><td>
			<input name="noTrained'.$counter.'" type="text" size="10" />
			</td>
			<input type="hidden"  name="gsGuidelineCode_'.$counter.'" id="gsGuidelineCode_'.$counter.'" value="'.$value['guidelineCode'].'" />
		</tr>';
		
   	}
	//echo $this->trainingGuidelineSection;die;
   	return $this->trainingGuidelineSection;
   }
	
	/**Function to create the section: INDICATE THE NUMBER OF UNITS USED AND THE NUMBER OF TIMES COMMODITIES WERE NOT AVAILABILE FOR MORE THAN 7 (SEVEN) DAYS.
	 * */
	public function createCommodityUsageAndOutageSection(){
    $this->load->model('m_mnh_survey');
	 $this->data_found= $this->m_mnh_survey->getCommodityNames();
	//var_dump($this->data_found);die;
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
   		$this->commodityUsageAndOutageSection.='<tr>
			<td colspan="2" style="width:200px;">'.$value['commodityName'].' ('.$value['commodityUnit'].') </td>
			<td colspan="2">
			<input name="usoNovUsage_'.$counter.'" type="text" size="5" />
			</td>
			<td colspan="2">
			<select name="usoNovTimesUnavailable_'.$counter.'" id="usoNovTimesUnavailable_'.$counter.'" >
				<option value="" selected="selected">Select One</option>
				<option value="Once">Once</option>
				<option value="2-3">2-3 </option>
				<option value="5-5">4-5 </option>
				<option value="more than 5">more than 5 </option>

			</select></td>
						
			
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Patient purchased the commodity privately" />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Facility purchased the commodity privately " />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Facility received the commodity from another facility" />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="The procedure was not conducted " />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="The procedure was conducted without the commodity " />
			</td>
			
			<input type="hidden"  name="usoCommodityCode_'.$counter.'" id="usoCommodityCode_'.$counter.'" value="'.$value['commodityCode'].'" />
		</tr>';
		
   	}
	//echo $this->commodityUsageAndOutageSection;die;
   	return $this->commodityUsageAndOutageSection;
   }
	
	/*public function createSuppliesSection(){
    $this->load->model('m_mnh_survey');
	 $this->data_found= $this->m_mnh_survey->getSuppliesNames();
	//var_dump($this->data_found);die;
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
   		$this->suppliesSection.='<tr>
			<td colspan="2" style="width:200px;">'.$value['suppliesName'].' ('.$value['suppliesUnit'].') </td>
			<td colspan="2">
			<input name="suppliesUsed_'.$counter.'" type="text" size="5" />
			</td>
			<td colspan="2">
			<select name="usoNovTimesUnavailable_'.$counter.'" id="usoNovTimesUnavailable_'.$counter.'" >
				<option value="" selected="selected">Select One</option>
				<option value="Once">Once</option>
				<option value="2-3">2-3 </option>
				<option value="5-5">4-5 </option>
				<option value="more than 5">more than 5 </option>

			</select></td>
						
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Patient purchased the commodity privately" />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Facility purchased the commodity privately " />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Facility received the commodity from another facility" />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="The procedure was not conducted " />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="The procedure was conducted without the commodity " />
			</td>
			<input type="hidden"  name="usoCommodityCode_'.$counter.'" id="usoCommodityCode_'.$counter.'" value="'.$value['suppliesCode'].'" />
		</tr>';
		
   	}
	//echo $this->commodityUsageAndOutageSection;die;
   	return $this->suppliesSection;
   }*/
   
   public function createSuppliesSection(){
    $this->load->model('m_mnh_survey');
	 $this->data_found= $this->m_mnh_survey->getSuppliesNames();
	//var_dump($this->data_found);die;
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
   		$this->suppliesSection.='<tr>
			<td  style="width:200px;">'.$value['suppliesName'].' ('.$value['suppliesUnit'].') </td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="radio" value="Available" style="vertical-align: middle; margin: 0px;"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="radio" value="Some Available" />
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="radio" value="Never Available" />
			</td>
			
			
			
						
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Delivery room" />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Pharmacy " />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Store" />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Other " />
			</td>
			<td style ="text-align:center;">
			<input name="noTrained'.$counter.'" type="text" size="10" />
			</td>
			<td width="50">
			<select name="cqSupplier_'.$counter.'" id="cqSupplier_'.$counter.'" >
			<option value="" selected="selected">Select One</option>
				<option value="KEMSA/GoK">KEMSA/GoK</option>
				<option value="Donor">Donor</option>
				<option value="Purchase By Patient">Purchase By Patient</option>
				<option value="Private purchase by Facility">Private purchase by Facility</option>
				<option value="Other">Other</option>
			</select></td>
			<td width="50">
			<select name="cqReason_'.$counter.'" id="cqReason_'.$counter.'" >
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">Not Ordered</option>
				<option value="Ordered but not yet Received">Ordered but not yet Received</option>
				<option value="Expired">Expired</option>
				<option value="All Used">All Used</option>

			</select></td>
			<input type="hidden"  name="usoCommodityCode_'.$counter.'" id="usosuppliesCode_'.$counter.'" value="'.$value['suppliesCode'].'" />
		</tr>';
		
   	}
	//echo $this->commodityUsageAndOutageSection;die;
   	return $this->suppliesSection;
   }
   
    public function createEquipmentSection(){
    $this->load->model('m_mnh_survey');
	 $this->data_found= $this->m_mnh_survey->getEquipmentNames();
	//var_dump($this->data_found);die;
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
   		$this->equipmentsSection.='<tr>
			<td >'.$value['equipmentName'].' ('.$value['equipmentUnit'].') </td>
			<td style ="text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="radio" value="Available" />
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="radio" value="Sometimes Available" />
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="radio" value="Never Available" />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Delivery room" />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Store" />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			
			<input name="cqAvailability_'.$counter.'" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="text"  size="8" />
			</td>
			<input type="hidden"  name="usoEquimnentCode_'.$counter.'" id="usoEquimnentCode_'.$counter.'" value="'.$value['equipmentCode'].'" />
		</tr>';
		
   	}
	//echo $this->commodityUsageAndOutageSection;die;
   	return $this->equipmentsSection;
   }

public function createSuppliesUsageAndOutageSection(){
    $this->load->model('m_mnh_survey');
	 $this->data_found= $this->m_mnh_survey->getSuppliesNames();
	//var_dump($this->data_found);die;
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
   		$this->suppliesUsageAndOutageSection.='<tr>
			<td colspan="2" style="width:200px;">'.$value['suppliesName'].' ('.$value['suppliesUnit'].') </td>
			<td colspan="2">
			<input name="usoNovUsage_'.$counter.'" type="text" size="5" />
			</td>
			<td colspan="2">
			<select name="usoNovTimesUnavailable_'.$counter.'" id="usoNovTimesUnavailable_'.$counter.'" >
				<option value="" selected="selected">Select One</option>
				<option value="Once">Once</option>
				<option value="2-3">2-3 </option>
				<option value="5-5">4-5 </option>
				<option value="more than 5">more than 5 </option>

			</select></td>
						
			
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Patient purchased the Supply privately" />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Facility purchased the Supply privately " />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="Facility received the Supply from another facility" />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="The procedure was not conducted " />
			</td>
			<td style ="text-align:center;">
			<input name="cqHappened_'.$counter.'[]" type="checkbox" value="The procedure was conducted without the Supply " />
			</td>
			
			<input type="hidden"  name="usoCommodityCode_'.$counter.'" id="usoCommodityCode_'.$counter.'" value="'.$value['suppliesCode'].'" />
		</tr>';
		
   	}
	//echo $this->commodityUsageAndOutageSection;die;
   	return $this->suppliesUsageAndOutageSection;
   }
}
