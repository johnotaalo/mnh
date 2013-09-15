<?php
## Extend CI_Controller to include Doctrine Entity Manager

class  MY_Controller  extends  CI_Controller {

	public $em, $response, $theForm, $rowsInserted, $executionTime, $data, $data_found,$facilityInDistrict,
	$selectCommodityType, $facilities,$facility, $selectCounties, 
	$selectDistricts, $selectFacilityType, $selectFacilityLevel,$selectFacilityOwner,$selectProvince,$selectCommoditySuppliers,$selectMCHOtherSuppliers,$selectMNHOtherSuppliers,$selectMCHCommoditySuppliers,$selectFacility,
	$commodityAvailabilitySection,$mchCommodityAvailabilitySection,$mchIndicatorsSection,$signalFunctionsSection,$ortCornerAspectsSection,$mchCommunityStrategySection,$mnhWaterAspectsSection,$mnhCEOCAspectsSection,$mchGuidelineAvailabilitySection,$trainingGuidelineSection,$mchTrainingGuidelineSection,$districtFacilityListSection,
	$suppliesUsageAndOutageSection,$commodityUsageAndOutageSection,$suppliesSection,$suppliesMCHSection,$suppliesMNHOtherSection,$equipmentsSection,$deliveryEquipmentSection,$hardwareMCHSection,$equipmentsMCHSection,$treatmentMCHSection;


	function __construct() {
		parent::__construct();

		/* Instantiate Doctrine's Entity manage so we don't have

		   to everytime we want to use Doctrine */
		   
		$this->em = $this->doctrine->em;
		$this->load->model('m_mnh_survey');
		$this->load->model('m_mch_survey');
		$this->response=$this->theForm=$this->data=$this->facilityInDistrict='';
		$this->selectCounties=$this->selectDistricts=$selectFacilityType=$selectFacilityLevel=$selectProvince=$selectFacilityOwner=$selectFacility=$this->selectMCHCommoditySuppliers=$this->selectCommoditySuppliers='';
		$this->commodityAvailabilitySection=$this->mchCommodityAvailabilitySection=$this->districtFacilityListSection=$this->treatmentMCHSection=$this->signalFunctionsSection=$this->ortCornerAspectsSection=$this->mchGuidelineAvailabilitySection=$this->trainingGuidelineSection=$this->mchTrainingGuidelineSection=$this->commodityUsageAndOutageSection=$this->hardwareMCHSection=$this->equipmentsMCHSection=$this->equipmentsSection='';
		$this->mchIndicatorsSection=array();
		$this->getHealthFacilities();
		$this->getCountyNames();$this->getDisctrictNames();$this->getFacilityLevels();$this->getCommoditySuppliers();$this->getMCHCommoditySuppliers();$this->getMCHOtherSuppliers();$this->getMNHOtherSuppliers();
		$this->getFacilityTypes();$this->getFacilityOwners();$this->getProvinceNames();
		$this->createCommodityAvailabilitySection();
		$this->createMCHOrtCommodityAvailabilitySection();
		$this->createBemoncSignalFunctionsSection();$this->createStaffTrainingGuidelinesSection();$this->createMCHStaffTrainingGuidelinesSection();
		$this->createSuppliesSection();$this->createSuppliesMCHSection();$this->createHardwareResourcesMCHSection();$this->createSuppliesMNHOtherSection();
		$this->createEquipmentSection();$this->createEquipmentMCHSection();$this->createDeliveryEquipmentSection();
		$this->createCommodityUsageAndOutageSection();
		$this->createSuppliesUsageAndOutageSection();$this->createTreatmentsMCHSection();
		$this->createFacilitiesListSection();$this->createMCHIndicatorsSection();
		$this->createORTCornerAspectsSection();$this->createMCHGuidelineAvailabilitySection();$this->createMNHWaterAspectsSection();$this->createMNHCEOCAspectsSection();$this->createMCHCommunityStrategySection();
		
  
	}

	function getRepositoryByFormName($form) {
		$this -> the_form = $this -> em -> getRepository($form);
		return $this -> theForm;
	}

	
	public function getProvinceNames(){//obtained from the session data
			  if($this -> session -> userdata('allProvinces') )
			//  print var_dump($this -> session -> userdata('allProvinces'));exit;
				foreach($this -> session -> userdata('allProvinces') as $key=>$value){
				 $this->selectProvince.= '<option value="'.$value['provinceID'].'">'.$value['provinceName'].'</option>'.'<br />';
				}
				
				//var_dump($this -> session -> userdata('allProvinces')); exit;
				return $this->selectProvince;
			
		}

	
	public function getDisctrictNames(){/*obtained from the session data*/
			 $this->data_found= $this->m_mnh_survey->getDistrictNames();
		     foreach($this->data_found as $value) {
				 $this->selectDistricts.= '<option value="'.$value['districtID'].'">'.$value['districtName'].'</option>'.'<br />';
				}
				
				//var_dump($this -> session -> userdata('allDistricts')); exit;
				return $this->selectDistricts;
			
		}

    public function getCountyNames(){/*obtained from the session data*/
	   $this->data_found= $this->m_mnh_survey->getCountyNames();
		foreach($this->data_found as $value) {
				 $this->selectCounties.= '<option value="'.$value['countyID'].'">'.$value['countyName'].'</option>'.'<br />';
				}
				
				//var_dump($this -> session -> userdata('allCounties')); exit;
				return $this->selectCounties;
			
		}
		public function getSpecificFacilities($mfc=13001){/*obtained from the session data*/
	         $this->data_found= $this->m_mnh_survey->getSpecificFacilityNames($mfc);
		     foreach($this->data_found as $value) {
				// $this->selectFacilityType.= '<option value="'.$value['facilityTypeID'].'">'.$value['facilityType'].'</option>'.'<br />';
			$this->selectFacilityType.='<p>'.$value['facilityName'].'</p>';	
			 }
				
				//var_dump($this->data_found); exit;
				return $this->selectFacilityType;
			
		}
	public function getFacilityTypes(){/*obtained from the session data*/
	         $this->data_found= $this->m_mnh_survey->getFacilityTypeNames();
		     foreach($this->data_found as $value) {
				 $this->selectFacilityType.= '<option value="'.$value['facilityTypeID'].'">'.$value['facilityType'].'</option>'.'<br />';
				}
				
				//var_dump($this->data_found); exit;
				return $this->selectFacilityType;
			
		}

	public function getFacilityLevels(){/*obtained from the session data*/
			   $this->data_found= $this->m_mnh_survey->getFacilityLevelNames();
		     foreach($this->data_found as $value) {
				$this -> selectFacilityLevel .= '<option value="' . $value['facilityLevelID'] . '">' . $value['facilityLevel'] . '</option>' . '<br />';
			}

		//var_dump($this -> session -> userdata('allFacilityLevels')); exit;
		return $this -> selectFacilityLevel;

	}
	
	

	public function getFacilityOwners(){/*obtained from the session data*/
			
	        $this->data_found= $this->m_mnh_survey->getFacilityOwnerNames();
		   foreach($this->data_found as $value) {
				$this -> selectFacilityOwner .= '<option value="' . $value['facilityOwnerID'] . '">' . $value['facilityOwner'] . '</option>' . '<br />';
			}

		//var_dump($this -> session -> userdata('allFacilityOwners')); exit;
		return $this -> selectFacilityOwner;

	}
	

    public function getCommoditySuppliers(){
	    $this->data_found= $this->m_mnh_survey->getCommoditySupplierNames();
		$counter=0;
		foreach($this->data_found as $value) {
			    $counter++;
				$this ->selectCommoditySuppliers .= '<option value="' . $value['supplierName'] . '">'.$counter.'. '.$value['supplierName'] . '</option>' . '<br />';
			}
	}



    public function getMCHCommoditySuppliers(){
	    $this->data_found= $this->m_mch_survey->getCommoditySupplierNames();
		$counter=0;
		foreach($this->data_found as $value) {
			    $counter++;
				$this ->selectMCHCommoditySuppliers .= '<option value="' . $value['supplierName'] . '">'.$counter.'. '.$value['supplierName'] . '</option>' . '<br />';
			}
	}
	
	public function getMCHOtherSuppliers(){
	    $this->data_found= $this->m_mch_survey->getOtherSupplierNames();
		$counter=0;
		foreach($this->data_found as $value) {
			    $counter++;
				$this ->selectMCHOtherSuppliers .= '<option value="' . $value['supplierName'] . '">'.$counter.'. '.$value['supplierName'] . '</option>' . '<br />';
			}
	}
	
	public function getMNHOtherSuppliers(){
	    $this->data_found= $this->m_mnh_survey->getOtherSupplierNames();
		$counter=0;
		foreach($this->data_found as $value) {
			    $counter++;
				$this ->selectMNHOtherSuppliers .= '<option value="' . $value['supplierName'] . '">'.$counter.'. '.$value['supplierName'] . '</option>' . '<br />';
			}
	}
	
	 public function getHealthFacilities(){
	    $this->data_found= $this->m_mnh_survey->getFacilityNames();
		foreach($this->data_found as $value) {
				$this ->selectFacility .= '<option value="' . $value['facilityName'] . '">' . $value['facilityName'] . '</option>' . '<br />';
			}
	}
	
	 /**Function to create the section: STATE THE AVAILABILITY & QUANTITIES OF THE FOLLOWING COMMODITIES.
	 * */
	public function createCommodityAvailabilitySection(){
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
			<input name="cqAvailability_'.$counter.'" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="radio" value="Sometimes Available" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="radio" value="Never Available" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_'.$counter.'[]" type="checkbox" value="Delivery Room" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_'.$counter.'[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_'.$counter.'[]" type="checkbox" value="Store" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_'.$counter.'[]" id="cqLocOther_'.$counter.'" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_'.$counter.'[]" id="cqLocNA_'.$counter.'" type="checkbox" value="Not Applicable" />
			</td>
			

			<td style ="text-align:center;">
			<input name="cqNumberOfUnits_'.$counter.'" id="cqNumberOfUnits_'.$counter.'" type="text" size="5" class="cloned numbers"/>
			</td>
			<td width="50">
			<select name="cqSupplier_'.$counter.'" id="cqSupplier_'.$counter.'" class="cloned">
			<option value="" selected="selected">Select One</option>'.$supplier_names.'
			</select></td>
			<td width="60">
			<select name="cqReason_'.$counter.'" id="cqReason_'.$counter.'" style="width:110px" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">1. Not Ordered</option>
				<option value="Ordered but not yet Received">2. Ordered but not yet Received</option>
				<option value="Expired">3. Expired</option>
				<option value="All Used">4. All Used</option>
				<option value="Not Applicable">5. Not Applicable</option>
				

			</select></td>
			<input type="hidden"  name="cqCommodityCode_'.$counter.'" id="cqCommodityCode_'.$counter.'" value="'.$value['commodityCode'].'" />
	</tr>';
		
   	}
	//echo $this->commodityAvailabilitySection;die;
   	return $this->commodityAvailabilitySection;
   }

 /**Function to create the section: STATE THE AVAILABILITY & QUANTITIES OF THE FOLLOWING COMMODITIES.
	 * */
	public function createMCHOrtCommodityAvailabilitySection(){
	 $this->data_found= $this->m_mch_survey->getCommodityNames();
	//var_dump($this->data_found);die;
	$counter=0;
	$supplier_names=$this->selectMCHCommoditySuppliers;
   	foreach($this->data_found as $value){
   		$counter++;
   		$this->mchCommodityAvailabilitySection.='<tr>
			<td> '.$value['commodityName'].' </td>
			<td> '.$value['commodityUnit'].'</td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="radio" value="Sometimes Available" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_'.$counter.'" type="radio" value="Never Available" class="cloned"/>
			</td>
			<td width="60">
			<select name="cqReason_'.$counter.'" id="cqReason_'.$counter.'" style="width:110px" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">1. Not Ordered</option>
				<option value="Ordered but not yet Received">2. Ordered but not yet Received</option>
				<option value="Expired">3. Expired</option>
				<option value="All Used">4. All Used</option>
				<option value="Not Applicable">5. Not Applicable</option>

			</select></td>
			<td style ="text-align:center;">
			<input name="cqLocation_'.$counter.'[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_'.$counter.'[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_'.$counter.'[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_'.$counter.'[]" type="checkbox" value="Ward" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_'.$counter.'[]" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_'.$counter.'[]" id="cqLocNA_'.$counter.'" type="checkbox" value="Not Applicable" />
			</td>
			

			<td style ="text-align:center;">
			<input name="cqNumberOfUnits_'.$counter.'" id="cqNumberOfUnits_'.$counter.'" type="text" size="5" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqExpiryDate_'.$counter.'" id="cqExpiryDate_'.$counter.'" type="text" size="15" class="cloned expiryDate"/>
			</td>
			<td width="50">
			<select name="cqSupplier_'.$counter.'" id="cqSupplier_'.$counter.'" class="cloned">
			<option value="" selected="selected">Select One</option>'.$supplier_names.'
			</select></td>
			<input type="hidden"  name="cqCommodityCode_'.$counter.'" id="cqCommodityCode_'.$counter.'" value="'.$value['commodityCode'].'" />
	</tr>';
		
   	}
	//echo $this->mchCommodityAvailabilitySection;die;
   	return $this->mchCommodityAvailabilitySection;
   }

  

  /**Function to create the section: PROVISION OF BEmONC SIGNAL FUNCTIONS IN THE LAST THREE MONTHS
	 * */
	public function createBemoncSignalFunctionsSection(){
	 $this->data_found= $this->m_mnh_survey->getSignalFunctions();
	//var_dump($this->data_found);die;
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
   		$this->signalFunctionsSection.='<tr>
			<td colspan="7">'.$value['signalName'].'</td><td colspan="4">
			<select name="bmsfSignalFunctionConducted_'.$counter.'" id="bmsfSignalFunctionConducted_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select></td><td colspan="5">
			<select name="bmsfChallenge_'.$counter.'" id="bmsfChallenge_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select Challenge</option>
				<option value="Inadequate Drugs">1.Inadequate Drugs</option>
				<option value="Inadequate Skill">2.Inadequate Skill</option>
				<option value="Inadequate Supplies">3.Inadequate Supplies</option>
				<option value="Inadequate Job aids">4.Inadequate Job aids</option>
				<option value="Inadequate equipment">5.Inadequate Equipment</option>
				<option value="Case never presented">6.Case never presented</option>
				<option value="No Challenge Experienced">7.No Challenge Experienced</option>

			</select></td>
			<input type="hidden"  name="bmsfSignalCode_'.$counter.'" id="bmsfSignalCode_'.$counter.'" value="'.$value['signalCode'].'" />
		</tr>';
		
   	}
	//echo $this->signalFunctionsSection;die;
   	return $this->signalFunctionsSection;
   }

	/**Function to create the section: ORT Corner Aspects
	 * */
	public function createORTCornerAspectsSection(){
	 $this->data_found= $this->m_mch_survey->getOrtAspectQuestions('ort');
	//var_dump($this->data_found);die;
	$counter=0;
	$ort_location='';$aspect='';
   	foreach($this->data_found as $value){
   		$counter++;
		if($value['questionCode']=='QUC01'){//set follow up question if qn on designated ort location is yes
			
			$aspect='<tr>
			<td colspan="1">'.$value['mchQuestion'].'</td>
			<td colspan="1">
			<select name="ortcAspect_'.$counter.'" id="ortcAspect_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select>
			</td>
			<input type="hidden"  name="ortcAspectCode_'.$counter.'" id="ortcAspectCode_'.$counter.'" value="'.$value['questionCode'].'" />
		</tr>';
		    $this->ortCornerAspectsSection.=$aspect;
			
		}else{
			
			if($value['questionCode']=='QUC02b'){
				$ort_location='<tr id="ort_location" style="display:true">
			<td colspan="1">'.$value['mchQuestion'].'</td>
			<td colspan="2">
			<label>Multiple Selections Allowed</label><br/>
			<input type="checkbox" name="ortcAspectLocResponse_'.$counter.'[]" id="ortcAspectLocResponse_'.$counter.'"  value="MCH"/>
			<label for="" style="font-weight:normal">MCH</label><br/>
			
			<input type="checkbox" name="ortcAspectLocResponse_'.$counter.'[]" id="ortcAspectLocResponse_'.$counter.'"  value="U5 Clinic"/>
			<label for="" style="font-weight:normal">U5 Clinic</label><br/>
			
			<input type="checkbox" name="ortcAspectLocResponse_'.$counter.'[]" id="ortcAspectLocResponse_'.$counter.'"  value="OPD"/>
			<label for="" style="font-weight:normal">OPD</label><br/>
			
		   
			<input type="checkbox" name="ortcAspectLocResponse_'.$counter.'[]" id="ortcAspectLocResponse_'.$counter.'"  value="WARD"/>
			<label for="" style="font-weight:normal">WARD</label><br/>
			
			
			<input type="checkbox" name="ortLocationOther_'.$counter.'[]" id="ortLocationOther_'.$counter.'"  value=""/>
			<label for="" style="font-weight:normal">Other</label><br/>
			<input type="text" name="ortcAspectLocResponse_'.$counter.'[]" id="ortcAspectLocResponse_'.$counter.'"  value="" maxlength="45" size="45" placeholder="please specify"/>
			
			
			</td>
			<input type="hidden"  name="ortcAspectCode_'.$counter.'" id="ortcAspectCode_'.$counter.'" value="'.$value['questionCode'].'" />
		</tr>';
		
		    $this->ortCornerAspectsSection.=$ort_location;
			}else{

			$this->ortCornerAspectsSection.='<tr>
			<td colspan="1">'.$value['mchQuestion'].'</td>
			<td colspan="1">
			<select name="ortcAspect_'.$counter.'" id="ortcAspect_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select>
			</td>
			<input type="hidden"  name="ortcAspectCode_'.$counter.'" id="ortcAspectCode_'.$counter.'" value="'.$value['questionCode'].'" />
		</tr>';
		}
		}
   		
		
   	}
   
	//echo $this->ortCornerAspectsSection;die;
   	return $this->ortCornerAspectsSection;
   }
   
   /**Function to create the section: Child Health--Community Strategy
	 * */
	public function createMCHCommunityStrategySection(){
	 $this->data_found= $this->m_mch_survey->getOrtAspectQuestions('cms');
	//var_dump($this->data_found);die;
	$counter=0;
	$aspect='';
   	foreach($this->data_found as $value){
   		$counter++;
		

			$this->mchCommunityStrategySection.='<tr>
			<td colspan="1">(<strong>'.$counter.'</strong>) '.$value['mchQuestion'].'</td>
			<td colspan="1">
			<input type="text"  name="mchCommunityStrategy_'.$counter.'" id="mchCommunityStrategy_'.$counter.'" value="" class="numbers cloned"/>
			</td>
			<input type="hidden"  name="mchCommunityStrategyQCode_'.$counter.'" id="mchCommunityStrategyQCode_'.$counter.'" value="'.$value['questionCode'].'" />
		</tr>';
	}
   
	//echo $this->mchCommunityStrategySection;die;
   	return $this->mchCommunityStrategySection;
   }
   
   
   /**Function to create the section: mnh water availability follow up questions in Section 6 of 7 ii
	 * */
	public function createMNHWaterAspectsSection(){
	 $this->data_found= $this->m_mnh_survey->getMnhWaterAspectQuestions();
	//var_dump($this->data_found);die;
	$counter=0;
	$aspect='';
	$mh_supplier_names=$this->selectMNHOtherSuppliers;
   	foreach($this->data_found as $value){
   		$counter++;
		$aspect_response_on_yes='';
		
		if($value['questionCode']=='QMNH01'){
			$aspect_response_on_yes='<label>Water Storage Point</label><br/>
			<input type="text"  name="mnhwAspectResponse_'.$counter.'[]" id="mnhwStoragePoint_'.$counter.'" value="" size="45" placeholder="specify"/>';
		}else{
			$aspect_response_on_yes='<label>Main Source</label><br/>
			<select name="mnhwAspectResponse_'.$counter.'[]" id="sqSupplier_'.$counter.'" class="cloned">
			<option value="" selected="selected">Select One</option>'.$mh_supplier_names.'
			</select>';
		}
			$this->mnhWaterAspectsSection.='<tr>
			<td colspan="1">'.$value['mnhQuestion'].'</td>
			<td colspan="1">
			<select name="mnhwAspectResponse_'.$counter.'[]" id="mnhwAspectResponse_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<td>
			'.$aspect_response_on_yes.'
			</td>
			<input type="hidden"  name="mnhwAspectCode_'.$counter.'" id="mnhwAspectCode_'.$counter.'" value="'.$value['questionCode'].'" />
		</tr>';
		}
		
	//echo $this->mnhWaterAspectsSection;die;
   	return $this->mnhWaterAspectsSection;
   }

   /**Function to create the section: mnh CEOC service provision in Section 2 of 7 iii	 * */
	public function createMNHCEOCAspectsSection(){
	 $this->data_found= $this->m_mnh_survey->getMnhCeocAspectQuestions();
	//var_dump($this->data_found);die;
	$counter=0;
	$aspect='';
   	foreach($this->data_found as $value){
   		$counter++;
		$follow_up_question='';
		
		if($value['questionCode']=='QMNH03'){
			$follow_up_question='<tr id="transfusion_y" style="display:none">
			<td>If blood transfusion is performed, indicate <strong>main source</strong> of blood</td>
			<td>
			<select name="mnhceocFollowUp_'.$counter.'" id="mnhceocFollowUp_'.$counter.'" class="cloned" disabled>
			<option value="" selected="selected">Select One</option>
			<option value="Blood bank available">Blood bank available</option>
			<option value="Transfusion done, no blood blank">Transfusions done but no blood bank</option>
			<option value="Other">Other</option>
			</select><br/>
			<label id="label_followup_other_'.$counter.'">Provide Other</label> <br/>
			<input type="text"  name="mnhceocFollowUpOther_'.$counter.'" id="mnhceocFollowUpOther_'.$counter.'" value="" size="64" class="cloned" disabled/>
			</td>
			</tr>
			<tr id="transfusion_n" style="display:none">
			<td>Give a reason why blood transfusion is <strong>not</strong> performed</td>
			<td>
			<select name="mnhceocReason_'.$counter.'" id="mnhceocReason_'.$counter.'" class="cloned" disabled>
			<option value="" selected="selected">Select One</option>
			<option value="Blood not available">Blood not available</option>
			<option value="No supplies & equipment">Supplies and equipment NOT available</option>
			<option value="Other">Other</option>
			</select><br/>
			<label id="label_reason_other_'.$counter.'">Other Reason</label><br/>
			<input type="text"  name="mnhceocReasonOther_'.$counter.'" id="mnhceocReasonOther_'.$counter.'" value="" size="64" class="cloned" disabled/>
			</td>
			</tr>';
		}else{
			$follow_up_question='<tr id="csdone_n" style="display:none">
			<td>Give a main reason for <strong>not</strong> conducting Caeserian Section</td>
			<td>
			<select name="mnhceocReason_'.$counter.'" id="mnhceocReason_'.$counter.'" class="cloned" disabled>
			<option value="" selected="selected">Select One</option>
			<option value="No supplies & equipment">Supplies and equipment NOT available</option>
			<option value="No theatre space">Theatre space NOT available</option>
			<option value="No human resource">Human Resource (surgeon/anaesthetist) NOT available</option>
			<option value="Other">Other</option><br/>
			</select><br/>
			<label id="label_reason_other_'.$counter.'">Other Reason</label><br/>
			<input type="text"  name="mnhceocReasonOther_'.$counter.'" id="mnhceocReasonOther_'.$counter.'" value="" size="64" class="cloned" disabled/>
			</td>
			</tr>';
		}
		    
		$this->mnhCEOCAspectsSection.='<tr>
		<td colspan="1"><strong>('.$counter.').</strong> '.$value['mnhQuestion'].'</td>
		<td colspan="1">
		<select name="mnhceocAspectResponse_'.$counter.'" id="mnhceocAspectResponse_'.$counter.'" class="cloned ceoc">
			<option value="" selected="selected">Select One</option>
			<option value="Yes">Yes</option>
			<option value="No">No</option>
		</select>
		</td>
		<input type="hidden"  name="mnhceocAspectCode_'.$counter.'" id="mnhceocAspectCode_'.$counter.'" value="'.$value['questionCode'].'" />
	</tr>'.$follow_up_question;
		}
		
	//echo $this->mnhCEOCAspectsSection;die;
   	return $this->mnhCEOCAspectsSection;
   }
   
   /**Function to create the section: CH Guideline Availability
	 * */
	public function createMCHGuidelineAvailabilitySection(){
	 $this->data_found= $this->m_mch_survey->getGuidelineAvailabilityQuestions('gp');
	//var_dump($this->data_found);die;
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
			$this->mchGuidelineAvailabilitySection.='<tr>
			<td colspan="1">'.$value['mchQuestion'].'</td>
			<td colspan="1">
			<select name="ortcAspect_'.$counter.'" id="ortcAspect_'.$counter.'" class="cloned is-guideline">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select>
			</td>
			<td><input type="text" name="ortcGuidesCount_'.$counter.'" id="ortcGuidesCount_'.$counter.'" size="6" class="numbers" disabled/></td>
			<input type="hidden"  name="ortcAspectCode_'.$counter.'" id="ortcAspectCode_'.$counter.'" value="'.$value['questionCode'].'" />
		</tr>';
		
   	}

}

/**Function to create various sections based on the indicator type * */
 public function createMCHIndicatorsSection(){
	 $this->data_found= $this->m_mch_survey->getIndicatorNames();
	//var_dump($this->data_found);die;
	$counter=0;$section='';
	$svc=$dgn=$cns=$ror=$sgn='';
	$svcn=$dgnn=$cnsn=$rorn=$sgnn=0;
	$numbering=array('a','b','c','d','e','f','g','h','i','j');
   	foreach($this->data_found as $value){
   		$counter++;
		$section=$value['indicatorFor'];
		
		if($section=='svc'){
			$svc.='<tr>
			<td colspan="1"><strong>('.$numbering[$svcn].')</strong> '.$value['indicatorName'].'</td>
			<td colspan="1">
			<select name="mchIndicator_'.$counter.'" id="mchIndicator_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_'.$counter.'" id="mchIndicatorCode_'.$counter.'" value="'.$value['indicatorCode'].'" />
		</tr>';
		$svcn++;
		}else if($section=='dgn'){
			$dgn.='<tr>
			<td colspan="1"><strong>('.$numbering[$dgnn].')</strong> '.$value['indicatorName'].'</td>
			<td colspan="1">
			<select name="mchIndicator_'.$counter.'" id="mchIndicator_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_'.$counter.'" id="mchIndicatorCode_'.$counter.'" value="'.$value['indicatorCode'].'" />
		</tr>';
		$dgnn++;
		}else if($section=='cns'){
			$cns.='<tr>
			<td colspan="1"><strong>('.$numbering[$cnsn].')</strong> '.$value['indicatorName'].'</td>
			<td colspan="1">
			<select name="mchIndicator_'.$counter.'" id="mchIndicator_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_'.$counter.'" id="mchIndicatorCode_'.$counter.'" value="'.$value['indicatorCode'].'" />
		</tr>';
		$cnsn++;
		}else if($section=='ror'){
		  $ror.='<tr>
			<td colspan="1"><strong>('.$numbering[$rorn].')</strong> '.$value['indicatorName'].'</td>
			<td colspan="1">
			<select name="mchIndicator_'.$counter.'" id="mchIndicator_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_'.$counter.'" id="mchIndicatorCode_'.$counter.'" value="'.$value['indicatorCode'].'" />
		</tr>';
		$rorn++;
		}else if($section=='sgn'){
		    $sgn.='<tr>
			<td colspan="1"><strong>('.$numbering[$sgnn].')</strong>  '.$value['indicatorName'].'</td>
			<td colspan="1">
			<select name="mchIndicator_'.$counter.'" id="mchIndicator_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_'.$counter.'" id="mchIndicatorCode_'.$counter.'" value="'.$value['indicatorCode'].'" />
		</tr>';
		$sgnn++;
		}
		
   	}
	
	$this->mchIndicatorsSection['svc']=$svc;
	$this->mchIndicatorsSection['dgn']=$dgn;
	$this->mchIndicatorsSection['cns']=$cns;
	$this->mchIndicatorsSection['ror']=$ror;
	$this->mchIndicatorsSection['sgn']=$sgn;
   
	//echo $this->mchIndicatorsSection;die;
   	return $this->mchIndicatorsSection;
   }
   
   /**Function to create the section: INDICATE WHEN LAST ANY STAFF AT YOUR FACILITY RECEIVED TRAINING ON THE FOLLOWING GUIDELINES
	 * */
	public function createStaffTrainingGuidelinesSection(){
	 $this->data_found= $this->m_mnh_survey->getTrainingGuidelines();
	//var_dump($this->data_found);die;
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
   		$this->trainingGuidelineSection.='<tr>
			<TD colspan="2" >'.$value['guidelineName'].'</TD><td>
			<input name="gsLastTraining_'.$counter.'" type="text" size="10" class="cloned numbers"/>
			</td><td>
			<input name="gsTrainedAndWorking_'.$counter.'" type="text" size="10" class="cloned numbers"/>
			</td>
			<input type="hidden"  name="gsGuidelineCode_'.$counter.'" id="gsGuidelineCode_'.$counter.'" value="'.$value['guidelineCode'].'" />
		</tr>';
		
   	}
	//echo $this->trainingGuidelineSection;die;
   	return $this->trainingGuidelineSection;
   }
	
	/**Function to create the section: INDICATE WHEN LAST ANY STAFF AT YOUR FACILITY RECEIVED TRAINING ON THE FOLLOWING GUIDELINES
	 * */
	public function createMCHStaffTrainingGuidelinesSection(){
	 $this->data_found= $this->m_mch_survey->getTrainingGuidelines();
	//var_dump($this->data_found);die;
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
   		$this->mchTrainingGuidelineSection.='<tr>
			<TD colspan="2" >'.$value['guidelineName'].'</TD><td>
			<input name="gsLastTraining_'.$counter.'" type="text" size="10" class="cloned numbers"/>
			</td><td>
			<input name="gsTrainedAndWorking_'.$counter.'" type="text" size="10" class="cloned numbers"/>
			</td>
			<input type="hidden"  name="gsGuidelineCode_'.$counter.'" id="gsGuidelineCode_'.$counter.'" value="'.$value['guidelineCode'].'" />
		</tr>';
		
   	}
	//echo $this->mchTrainingGuidelineSection;die;
   	return $this->mchTrainingGuidelineSection;
   }
	
	/**Function to create the section: INDICATE THE NUMBER OF UNITS USED AND THE NUMBER OF TIMES COMMODITIES WERE NOT AVAILABILE FOR MORE THAN 7 (SEVEN) DAYS.
	 * */
	public function createCommodityUsageAndOutageSection(){
	 $this->data_found= $this->m_mnh_survey->getCommodityNames();
	//var_dump($this->data_found);die;
	$unit="";
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
		
		if ($value['commodityUnit']!=null){
			$unit=$value['commodityUnit'];
				
			}else{
				$unit='';
			}
   		$this->commodityUsageAndOutageSection.='<tr>
			<td colspan="2" style="width:200px;">'.$value['commodityName'].' </td><td >'.$unit.' </td>
			<td >
			<input name="usocUsage_'.$counter.'" type="text" size="5" class="cloned numbers"/>
			</td>
			<td colspan="2">
			<select name="usocTimesUnavailable_'.$counter.'" id="usocTimesUnavailable_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Once">a. Once</option>
				<option value="2-3">b. 2-3 </option>
				<option value="5-5">c. 4-5 </option>
				<option value="more than 5">d. more than 5 </option>

			</select></td>
						
			
			<td style ="text-align:center;">
			<input name="usocWhatHappened_'.$counter.'[]" type="checkbox" value="1" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="usocWhatHappened_'.$counter.'[]" type="checkbox" value="2" />
			</td>
			<td style ="text-align:center;">
			<input name="usocWhatHappened_'.$counter.'[]" type="checkbox" value="3" />
			</td>
			<td style ="text-align:center;">
			<input name="usocWhatHappened_'.$counter.'[]" type="checkbox" value="4" />
			</td>
			<td style ="text-align:center;">
			<input name="usocWhatHappened_'.$counter.'[]" type="checkbox" value="5" />
			</td>
			
			<input type="hidden"  name="usocCommodityCode_'.$counter.'" id="usocCommodityCode_'.$counter.'" value="'.$value['commodityCode'].'" />
		</tr>';
		
   	}
	//echo $this->commodityUsageAndOutageSection;die;
   	return $this->commodityUsageAndOutageSection;
   }
	
   
   public function createSuppliesSection(){
	 $this->data_found= $this->m_mnh_survey->getSuppliesNames();
	//var_dump($this->data_found);die;
	$unit="";
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
		
		if ($value['suppliesUnit']!=null){
			$unit='('.$value['suppliesUnit'].')';
				
			}else{
				$unit='';
			}
   		$this->suppliesSection.='<tr>
			<td  style="width:200px;">'.$value['suppliesName'].' '.$unit.' </td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="sqAvailability_'.$counter.'" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqAvailability_'.$counter.'" type="radio" value="Sometimes Available" />
			</td>
			<td style ="text-align:center;">
			<input name="sqAvailability_'.$counter.'" type="radio" value="Never Available" />
			</td>		
			<td style ="text-align:center;">
			<input name="sqLocation_'.$counter.'[]" type="checkbox" value="Delivery room" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_'.$counter.'[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_'.$counter.'[]" type="checkbox" value="Store" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_'.$counter.'[]" id="sqLocOther_'.$counter.'" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="sqNumberOfUnits_'.$counter.'" id="sqNumberOfUnits_'.$counter.'" type="text" size="10" class="cloned numbers"/>
			</td>
			<td width="50">
			<select name="sqSupplier_'.$counter.'" id="sqSupplier_'.$counter.'" class="cloned">
			<option value="" selected="selected">Select One</option>
				<option value="KEMSA/GoK">1. KEMSA/GoK</option>
				<option value="Donor">2. Donor</option>
				<option value="Purchase By Patient">3. Purchase By Patient</option>
				<option value="Private purchase by Facility">4. Private purchase by Facility</option>
				<option value="Other">5. Other</option>
			</select></td>
			<td width="50">
			<select name="sqReason_'.$counter.'" id="sqReason_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">1. Not Ordered</option>
				<option value="Ordered but not yet Received">2. Ordered but not yet Received</option>
				<option value="Expired">3. Expired</option>
				<option value="All Used">4. All Used</option>
				

			</select></td>
			<input type="hidden"  name="sqSuppliesCode_'.$counter.'" id="sqSuppliesCode_'.$counter.'" value="'.$value['suppliesCode'].'" />
		</tr>';
		
   	}
	//echo $this->commodityUsageAndOutageSection;die;
   	return $this->suppliesSection;
   }

public function createSuppliesMNHOtherSection(){
	$mh_supplier_names=$this->selectMNHOtherSuppliers;
	 $this->data_found= $this->m_mnh_survey->getOtherSuppliesNames();
	//var_dump($this->data_found);die;
	$unit="";
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
		
		if ($value['suppliesUnit']!=null){
			$unit='('.$value['suppliesUnit'].')';
				
			}else{
				$unit='';
			}
   		$this->suppliesMNHOtherSection.='<tr>
			<td  style="width:200px;">'.$value['suppliesName'].' '.$unit.' </td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="sqAvailability_'.$counter.'" id="sqAvailability_'.$counter.'" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqAvailability_'.$counter.'" type="radio" value="Sometimes Available" />
			</td>
			<td style ="text-align:center;">
			<input name="sqAvailability_'.$counter.'" type="radio" value="Never Available" />
			</td>		
			<td style ="text-align:center;">
			<input name="sqLocation_'.$counter.'[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_'.$counter.'[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_'.$counter.'[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_'.$counter.'[]" type="checkbox" value="Ward" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_'.$counter.'[]" id="sqLocOther_'.$counter.'" type="checkbox" value="Other" />
			</td>
			<!--td style ="text-align:center;">
			<input name="sqNumberOfUnits_'.$counter.'" type="text" size="10" class="cloned numbers"/>
			</td-->
			<td width="50">
			<select name="sqSupplier_'.$counter.'" id="sqSupplier_'.$counter.'" class="cloned">
			<option value="" selected="selected">Select One</option>'.$mh_supplier_names.'
			</select></td>
			<!--td width="50">
			<select name="sqReason_'.$counter.'" id="sqReason_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">1. Not Ordered</option>
				<option value="Ordered but not yet Received">2. Ordered but not yet Received</option>
				<option value="Expired">3. Expired</option>
				<option value="All Used">4. All Used</option>
				

			</select></td-->
			<input type="hidden"  name="sqSuppliesCode_'.$counter.'" id="sqSuppliesCode_'.$counter.'" value="'.$value['suppliesCode'].'" />
		</tr>';
		
   	}
	//echo $this->createSuppliesMCHSection;die;
   	return $this->suppliesMNHOtherSection;
   }

public function createSuppliesMCHSection(){
	$ch_supplier_names=$this->selectMCHOtherSuppliers;
	 $this->data_found= $this->m_mch_survey->getSuppliesNames();
	//var_dump($this->data_found);die;
	$unit="";
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
		
		if ($value['suppliesUnit']!=null){
			$unit='('.$value['suppliesUnit'].')';
				
			}else{
				$unit='';
			}
   		$this->suppliesMCHSection.='<tr>
			<td  style="width:200px;">'.$value['suppliesName'].' '.$unit.' </td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="sqAvailability_'.$counter.'" id="sqAvailability_'.$counter.'" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqAvailability_'.$counter.'" type="radio" value="Sometimes Available" />
			</td>
			<td style ="text-align:center;">
			<input name="sqAvailability_'.$counter.'" type="radio" value="Never Available" />
			</td>		
			<td style ="text-align:center;">
			<input name="sqLocation_'.$counter.'[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_'.$counter.'[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_'.$counter.'[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_'.$counter.'[]" type="checkbox" value="Ward" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_'.$counter.'[]" id="sqLocOther_'.$counter.'" type="checkbox" value="Other" />
			</td>
			<!--td style ="text-align:center;">
			<input name="sqNumberOfUnits_'.$counter.'" type="text" size="10" class="cloned numbers"/>
			</td-->
			<td width="50">
			<select name="sqSupplier_'.$counter.'" id="sqSupplier_'.$counter.'" class="cloned">
			<option value="" selected="selected">Select One</option>'.$ch_supplier_names.'
			</select></td>
			<!--td width="50">
			<select name="sqReason_'.$counter.'" id="sqReason_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">1. Not Ordered</option>
				<option value="Ordered but not yet Received">2. Ordered but not yet Received</option>
				<option value="Expired">3. Expired</option>
				<option value="All Used">4. All Used</option>
				

			</select></td-->
			<input type="hidden"  name="sqSuppliesCode_'.$counter.'" id="sqSuppliesCode_'.$counter.'" value="'.$value['suppliesCode'].'" />
		</tr>';
		
   	}
	//echo $this->createSuppliesMCHSection;die;
   	return $this->suppliesMCHSection;
   }

public function createHardwareResourcesMCHSection(){
	$ch_supplier_names=$this->selectMCHOtherSuppliers;
	 $this->data_found= $this->m_mch_survey->getEquipmentNames('hwr');
	//var_dump($this->data_found);die;
	$unit="";
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
		
		if ($value['equipmentUnit']!=null){
			$unit='('.$value['equipmentUnit'].')';
				
			}else{
				$unit='';
			}
   		$this->hardwareMCHSection.='<tr>
			<td  style="width:200px;">'.$value['equipmentName'].' '.$unit.' </td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="hwAvailability_'.$counter.'" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="hwAvailability_'.$counter.'" id="hwAvailability_'.$counter.'" type="radio" value="Sometimes Available" />
			</td>
			<td style ="text-align:center;">
			<input name="hwAvailability_'.$counter.'" type="radio" value="Never Available" />
			</td>		
			<td style ="text-align:center;">
			<input name="hwLocation_'.$counter.'[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="hwLocation_'.$counter.'[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="hwLocation_'.$counter.'[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="hwLocation_'.$counter.'[]" type="checkbox" value="Ward" />
			</td>
			<td style ="text-align:center;">
			<input name="hwLocation_'.$counter.'[]" id="hwLocOther_'.$counter.'" type="checkbox" value="Other" />
			</td>
			<!--td style ="text-align:center;">
			<input name="hwNumberOfUnits_'.$counter.'" type="text" size="10" class="cloned numbers"/>
			</td-->
			<td width="50">
			<select name="hwSupplier_'.$counter.'" id="hwSupplier_'.$counter.'" class="cloned">
			<option value="" selected="selected">Select One</option>'.$ch_supplier_names.'
			</select></td>
			<!--td width="50">
			<select name="hwReason_'.$counter.'" id="hwReason_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">1. Not Ordered</option>
				<option value="Ordered but not yet Received">2. Ordered but not yet Received</option>
				<option value="Expired">3. Expired</option>
				<option value="All Used">4. All Used</option>
				

			</select></td-->
			<input type="hidden"  name="hwEquipmentCode_'.$counter.'" id="hwEquipmentCode_'.$counter.'" value="'.$value['equipmentCode'].'" />
		</tr>';
		
   	}
	
   	return $this->hardwareMCHSection;
   }
   
    public function createEquipmentSection(){
	 $this->data_found= $this->m_mnh_survey->getEquipmentNames('mnh');
	//var_dump($this->data_found);die;
	$unit="";
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
		
		if ($value['equipmentUnit']!=null){
			$unit='('.$value['equipmentUnit'].')';
				
			}else{
				$unit='';
			}
		
   		$this->equipmentsSection.='<tr>
			<td >'.$value['equipmentName'].' '.$unit.' </td>
			<td style ="text-align:center;">
			<input name="eqAvailability_'.$counter.'" type="radio" value="Available" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="eqAvailability_'.$counter.'" type="radio" value="Sometimes Available" />
			</td>
			<td style ="text-align:center;">
			<input name="eqAvailability_'.$counter.'" type="radio" value="Never Available" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_'.$counter.'[]" type="checkbox" value="Delivery room" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_'.$counter.'[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_'.$counter.'[]" type="checkbox" value="Store" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_'.$counter.'[]" id="eqLocOther_'.$counter.'" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="eqQtyFullyFunctional_'.$counter.'" id="eqQtyFullyFunctional_'.$counter.'" type="text"  size="8" class="numbers" />
			</td>
			<!--td style ="text-align:center;">
			<input name="eqQtyPartiallyFunctional_'.$counter.'" type="text"  size="8" class="numbers"/>
			</td-->
			<td style ="text-align:center;">
			<input name="eqQtyNonFunctional_'.$counter.'" id="eqQtyNonFunctional_'.$counter.'" type="text"  size="8" class="numbers"/>
			</td>
			<input type="hidden"  name="eqEquipmentCode_'.$counter.'" id="eqEquipmentCode_'.$counter.'" value="'.$value['equipmentCode'].'" />
		</tr>';
		
   	}
	//echo $this->commodityUsageAndOutageSection;die;
   	return $this->equipmentsSection;
   }
   
   public function createDeliveryEquipmentSection(){
	 $this->data_found= $this->m_mnh_survey->getEquipmentNames('dke');
	//var_dump($this->data_found);die;
	$unit="";
	$counter=10;#pick up from the gen mnh equipment's list 
   	foreach($this->data_found as $value){
   		$counter++;
		
		if ($value['equipmentUnit']!=null){
			$unit='('.$value['equipmentUnit'].')';
				
			}else{
				$unit='';
			}
		
   		$this->deliveryEquipmentSection.='<tr>
			<td >'.$value['equipmentName'].' '.$unit.' </td>
			<td style ="text-align:center;">
			<input name="eqAvailability_'.$counter.'" type="radio" value="Available" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="eqAvailability_'.$counter.'" type="radio" value="Sometimes Available" />
			</td>
			<td style ="text-align:center;">
			<input name="eqAvailability_'.$counter.'" type="radio" value="Never Available" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_'.$counter.'[]" type="checkbox" value="Delivery room" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_'.$counter.'[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_'.$counter.'[]" type="checkbox" value="Store" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_'.$counter.'[]" id="eqLocOther_'.$counter.'" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="eqQtyFullyFunctional_'.$counter.'" id="eqQtyFullyFunctional_'.$counter.'" type="text"  size="8" class="numbers" />
			</td>
			<!--td style ="text-align:center;">
			<input name="eqQtyPartiallyFunctional_'.$counter.'" type="text"  size="8" class="numbers"/>
			</td-->
			<td style ="text-align:center;">
			<input name="eqQtyNonFunctional_'.$counter.'" id="eqQtyNonFunctional_'.$counter.'" type="text"  size="8" class="numbers"/>
			</td>
			<input type="hidden"  name="eqEquipmentCode_'.$counter.'" id="eqEquipmentCode_'.$counter.'" value="'.$value['equipmentCode'].'" />
		</tr>';
		
   	}
	//echo $this->deliveryEquipmentSection;die;
   	return $this->deliveryEquipmentSection;
   }

public function createEquipmentMCHSection(){
	 $this->data_found= $this->m_mch_survey->getEquipmentNames('ort');
	//var_dump($this->data_found);die;
	$unit="";
	$counter=0;
	
	$qtyIndicator=''; #to determine if the equipment needs to be assessed as fully-functioning and not functioning or just quantity (fully-functioning) available only
	
	$equipmentWithFN=array('','EQP38','EQP28','EQP34','EQP37'); #equipment whose quantity must indicate the functioning and non-functioning ones
	
   	foreach($this->data_found as $value){
   		$counter++;
		
		if ($value['equipmentUnit']!=null){
			$unit='('.$value['equipmentUnit'].')';
				
			}else{
				$unit='';
			}

        if(array_search($value['equipmentCode'], $equipmentWithFN)==TRUE){
        	
        	 $qtyIndicator='<td style ="text-align:center;">
			<input name="eqQtyFullyFunctional_'.$counter.'" id="eqQtyFullyFunctional_'.$counter.'" type="text"  size="8" class="numbers" />
			</td>
			<!--td style ="text-align:center;">
			<input name="eqQtyPartiallyFunctional_'.$counter.'" type="text"  size="8" />
			</td-->
			<td style ="text-align:center;">
			<input name="eqQtyNonFunctional_'.$counter.'" id="eqQtyNonFunctional_'.$counter.'" type="text"  size="8" class="numbers" />
			</td>'; 
        }else{
        	 $qtyIndicator='<td style ="text-align:center;">
			<input name="eqQtyFullyFunctional_'.$counter.'" id="eqQtyFullyFunctional_'.$counter.'" type="text"  size="8" class="numbers" />
			</td>
			<td></td>
			<!--td style ="text-align:center;">
			<input name="eqQtyPartiallyFunctional_'.$counter.'" type="text"  size="8" />
			</td-->
			<!--td style ="text-align:center;">
			<input name="eqQtyNonFunctional_'.$counter.'" type="text"  size="8" />
			</td-->'; 
        }
        
		
   		$this->equipmentsMCHSection.='<tr>
			<td >'.$value['equipmentName'].' '.$unit.' </td>
			<td style ="text-align:center;">
			<input name="eqAvailability_'.$counter.'" id="eqAvailable_'.$counter.'" type="radio" value="Available" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="eqAvailability_'.$counter.'" id="eqSometimesAvailable_'.$counter.'" type="radio" value="Sometimes Available" />
			</td>
			<td style ="text-align:center;">
			<input name="eqAvailability_'.$counter.'" id="eqNeverAvailable_'.$counter.'" type="radio" value="Never Available" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_'.$counter.'[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_'.$counter.'[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_'.$counter.'[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_'.$counter.'[]" type="checkbox" value="Ward" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_'.$counter.'[]" id="eqLocOther_'.$counter.'" type="checkbox" value="Other" />
			</td>
			'.$qtyIndicator.'
			<input type="hidden"  name="eqEquipmentCode_'.$counter.'" id="eqEquipmentCode_'.$counter.'" value="'.$value['equipmentCode'].'" />
		</tr>';
		
   	}
	//echo $this->equipmentsMCHSection;die;
   	return $this->equipmentsMCHSection;
   }

public function createTreatmentsMCHSection(){
	 $this->data_found= $this->m_mch_survey->getTreatmentNames();
	//var_dump($this->data_found);die;
	$unit="";
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
		
		if($value['treatmentName']=='Others'){
			$this->treatmentMCHSection.='<tr>
			<td >'.$value['treatmentName'].' '.$unit.'<input name="mchtTreatmentOther_'.$counter.'" type="text"  size="64" placeholder="please specify"/> </td>
			<td style ="text-align:center;">
			<input name="mchtSevereDehydration_'.$counter.'" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtSomeDehydration_'.$counter.'" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtNoDehydration_'.$counter.'" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtDysentry_'.$counter.'" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtNoClassification_'.$counter.'" type="text"  size="8" />
			</td>
			<input type="hidden"  name="mchtTreatmentCode_'.$counter.'" id="mchtTreatmentCode_'.$counter.'" value="'.$value['treatmentCode'].'" />
		</tr>';
		}else{
			$this->treatmentMCHSection.='<tr>
			<td >'.$value['treatmentName'].' '.$unit.' </td>
			<td style ="text-align:center;">
			<input name="mchtSevereDehydration_'.$counter.'" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtSomeDehydration_'.$counter.'" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtNoDehydration_'.$counter.'" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtDysentry_'.$counter.'" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtNoClassification_'.$counter.'" type="text"  size="8" />
			</td>
			<input type="hidden"  name="mchtTreatmentCode_'.$counter.'" id="mchtTreatmentCode_'.$counter.'" value="'.$value['treatmentCode'].'" />
		</tr>';
		}
		
   	}
	//echo $this->equipmentsMCHSection;die;
   	return $this->treatmentMCHSection;
   }


public function createSuppliesUsageAndOutageSection(){
	 $this->data_found= $this->m_mnh_survey->getSuppliesNames();
	//var_dump($this->data_found);die;
	$unit="";
	$counter=0;
   	foreach($this->data_found as $value){
   		$counter++;
		if ($value['suppliesUnit']!=null || $value['suppliesUnit']!=""){
			$unit='('.$value['suppliesUnit'].')';
				
			}else{
				$unit='';
			}
   		$this->suppliesUsageAndOutageSection.='<tr>
			<td colspan="2" style="width:200px;">'.$value['suppliesName'].' '.$unit.' </td>
			<!-- td colspan="2">
			<input name="usosUsage_'.$counter.'" type="text" size="5" />
			</td -->
			<td colspan="2">
			<select name="usosTimesUnavailable_'.$counter.'" id="usosTimesUnavailable_'.$counter.'" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Once">a. Once</option>
				<option value="2-3">b. 2-3 </option>
				<option value="5-5">c. 4-5 </option>
				<option value="more than 5">d. more than 5 </option>
			</select></td>
						
			<td style ="text-align:center;">
			<input name="usosWhatHappened_'.$counter.'[]" type="checkbox" value="1" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="usosWhatHappened_'.$counter.'[]" type="checkbox" value="2" />
			</td>
			<td style ="text-align:center;">
			<input name="usosWhatHappened_'.$counter.'[]" type="checkbox" value="3" />
			</td>
			<td style ="text-align:center;">
			<input name="usosWhatHappened_'.$counter.'[]" type="checkbox" value="4" />
			</td>
			<td style ="text-align:center;">
			<input name="usosWhatHappened_'.$counter.'[]" type="checkbox" value="5" />
			</td>
			
			<input type="hidden"  name="usosSuppliesCode_'.$counter.'" id="usosSuppliesCode_'.$counter.'" value="'.$value['suppliesCode'].'" />
		</tr>';
		
   	}
	//echo $this->suppliesUsageAndOutageSection;die;
   	return $this->suppliesUsageAndOutageSection;
   }

public function createFacilitiesListSection(){
	/*retrieve facility list*/
	$this->m_mnh_survey->getFacilitiesByDistrict($this -> session -> userdata('dName'));
	$counter=0;
	$link='';
	$surveyCompleteFlag='';
	if(count($this->m_mnh_survey->districtFacilities)>0){
		
		//set session data
		$this -> session -> set_userdata(array('fCount'=>count($this->m_mnh_survey->districtFacilities)));
		//print 'true'; die;
		foreach($this->m_mnh_survey->districtFacilities as $value){
   		$counter++;
		
		if($this -> session -> userdata('survey')=='mnh'){
			$surveyCompleteFlag=$value['facilitySurveyStatus'];
		}else{
			$surveyCompleteFlag=$value['facilityCHSurveyStatus'];
		}
		
		if($surveyCompleteFlag=='complete'){
			$link='<td colspan="5"><strong>'.$surveyCompleteFlag.'</strong></td><td colspan="5" id="facility_2" class="no-action"><a id="'.$value['facilityMFC'].'" class="begin">Pending Analysis</a></td>';
		}else{
			$link='<td colspan="5">'.$surveyCompleteFlag.'</td><td colspan="5" id="facility_1" class="action"><a id="'.$value['facilityMFC'].'" class="begin">Begin Survey</a></td>';
		}
		
		
		$this->districtFacilityListSection.='<tr> 
       	<td colspan="1">'.$counter.'</td>
			<td colspan="7" >'.$value['facilityMFC'].'</td>
			<td colspan="4">'.$value['facilityName'].'</td>
			
			'.$link.'
			</tr>';
	
		}
		
		//print 'fs: '.$this->districtFacilityListSection;die;
	}else{
		//print 'false'; die;
		$this->districtFacilityListSection.='<tr><td colspan="22">No Facilities Found</td></tr>';
	}
	
}


}
