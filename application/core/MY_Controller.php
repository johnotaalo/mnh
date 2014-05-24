<?php
error_reporting(1);
//# Extend CI_Controller to include Doctrine Entity Manager

class MY_Controller extends CI_Controller
{
    
    public $em, $response, $theForm, $rowsInserted, $executionTime, $data, $data_found, $facilityInDistrict, $selectReportingCounties, $selectCommodityType, $facilities, $facility, $selectCounties, $global_counter, $selectDistricts, $selectFacilityType, $selectFacilityLevel, $selectFacilityOwner, $selectProvince, $selectCommoditySuppliers, $selectMCHOtherSuppliers, $selectMNHOtherSuppliers, $selectMCHCommoditySuppliers, $selectFacility, $commodityAvailabilitySection, $mchCommodityAvailabilitySection, $mchIndicatorsSection, $signalFunctionsSection, $ortCornerAspectsSection, $mchCommunityStrategySection, $mnhWaterAspectsSection, $mnhCEOCAspectsSection, $mchGuidelineAvailabilitySection, $trainingGuidelineSection, $mchTrainingGuidelineSection, $districtFacilityListSection, $suppliesUsageAndOutageSection, $commodityUsageAndOutageSection, $suppliesSection, $suppliesMCHSection, $suppliesMNHOtherSection, $equipmentsSection, $deliveryEquipmentSection, $hardwareMCHSection, $equipmentsMCHSection, $treatmentMCHSection, $hcwProfileSection, $hcwCaseManagementSection, $mchConsultationSection;
    
    //new sections
    public $questionPDF,$hcwInterviewAspectsSectionPDF,$hcwInterviewAspectsSection,$hcwConsultingAspectsSection,$selectAccessChallenges, $beds, $mnhCommitteeAspectSection, $mnhWasteDisposalAspectsSection, $mnhNewbornCareAspectsSection, $mnhPostNatalCareAspectsSection, $nurses, $hardwareSources, $hardwareSourcesPDF, $hardwareMNHSection, $mnhJobAidsAspectsSection, $mnhGuidelinesAspectsSection, $mnhPreparednessAspectsSection, $mnhHIVTestingAspectsSection;
    
    //pdf variables
    public $hcwConsultingAspectsSectionPDF, $myCount, $mchBundling, $mchBundlingPDF, $hardwareMCHSectionPDF, $suppliesMCHSectionPDF, $ortCornerAspectsSectionPDF, $mchIndicatorsSectionPDF, $selectMCHCommoditySuppliersPDF, $mchCommodityAvailabilitySectionPDF, $servicesPDF, $mnhKangarooMotherCarePDF, $mnhKangarooMotherCare, $services, $mnhCommitteeAspectSectionPDF, $mnhWasteDisposalAspectsSectionPDF, $mnhNewbornCareAspectsSectionPDF, $mnhPostNatalCareAspectsSectionPDF, $nursesPDF, $mnhCommunityStrategySectionPDF, $selectMCHOtherSuppliersPDF, $hardwareMNHSectionPDF, $mchGuidelineAvailabilitySectionPDF, $mnhJobAidsAspectsSectionPDF, $mnhGuidelinesAspectsSectionPDF, $mnhPreparednessAspectsSectionPDF, $mnhHIVTestingAspectsSectionPDF, $suppliesUsageAndOutageSectionPDF, $suppliesMNHOtherSectionPDF, $mnhWaterAspectsSectionPDF, $selectMNHOtherSuppliersPDF, $commodityUsageAndOutageSectionPDF, $signalFunctionsSectionPDF, $mnhCEOCAspectsSectionPDF, $suppliesSectionPDF, $commodityAvailabilitySectionPDF, $selectCommoditySuppliersPDF;
    
    function __construct() {
        parent::__construct();
        
        /* Instantiate Doctrine's Entity manage so we don't have
        
        to everytime we want to use Doctrine */
        
        $this->em = $this->doctrine->em;
        $this->load->model('m_mnh_survey');
        $this->load->model('m_mch_survey');
         $this->load->model('m_hcw_survey');
        $this->load->model('m_analytics');
        $this->response = $this->theForm = $this->data = $this->facilityInDistrict = '';
        $this->selectReportingCounties = $this->selectCounties = $this->selectDistricts = $selectFacilityType = $selectFacilityLevel = $selectProvince = $selectFacilityOwner = $selectFacility = $this->selectMCHCommoditySuppliers = $this->selectCommoditySuppliers = '';
        $this->mchBundling = $this->mchBundlingPDF = $this->commodityAvailabilitySection = $this->mchCommodityAvailabilitySection = $this->districtFacilityListSection = $this->treatmentMCHSection = $this->signalFunctionsSection = $this->signalFunctionsSectionPDF = $this->ortCornerAspectsSection = $this->mchGuidelineAvailabilitySection = $this->trainingGuidelineSection = $this->mchTrainingGuidelineSection = $this->commodityUsageAndOutageSection = $this->hardwareMCHSection = $this->equipmentsMCHSection = $this->equipmentsSection = '';
        
        //new sections
        $this->selectAccessChallenges = $this->servicesPDF = $this->services = $this->beds = $this->mnhWasteDisposalAspectsSectionPDF = $this->mnhNewbornCareAspectsSection = $this->mnhPostNatalCareAspectsSection = $this->nurses = $this->hardwareSources = $this->mnhJobAidsAspectsSection = $this->mnhGuidelinesAspectsSection = $this->mnhPreparednessAspectsSection = $this->mnhHIVTestingAspectsSection = '';
        
        //pdf
        $this->hardwareMCHSectionPDF = $this->suppliesMCHSectionPDF = $this->ortCornerAspectsSectionPDF = $this->mchIndicatorsSectionPDF = $this->selectMCHCommoditySuppliersPDF = $this->mchCommodityAvailabilitySectionPDF = $this->mnhKangarooMotherCare = $this->mnhKangarooMotherCarePDF = $this->mnhCommitteeAspectSectionPDF = $this->mnhWasteDisposalAspectsSection = $this->mnhNewbornCareAspectsSectionPDF = $this->mnhPostNatalCareAspectsSectionPDF = $this->nursesPDF = $this->hardwareSourcesPDF = $this->mnhCommunityStrategySectionPDF = $this->selectMCHOtherSuppliersPDF = $this->mchGuidelineAvailabilitySectionPDF = $this->mnhJobAidsAspectsSectionPDF = $this->mnhGuidelinesAspectsSectionPDF = $this->mnhPreparednessAspectsSectionPDF = $this->mnhHIVTestingAspectsSectionPDF = $this->suppliesUsageAndOutageSectionPDF = $this->suppliesMNHOtherSectionPDF = $this->mnhWaterAspectsSectionPDF = $this->selectMNHOtherSuppliersPDF = $this->commodityUsageAndOutageSectionPDF = $this->mnhCEOCAspectsSectionPDF = $this->suppliesSectionPDF = $this->commodityAvailabilitySectionPDF = $this->selectCommoditySuppliersPDF = '';
        
        $this->myCount = 0;
        $this->mchIndicatorsSection = array();
        $this->getHealthFacilities();
        
        $this->getCountyNames();
        $this->getDisctrictNames();
        $this->getFacilityLevels();
        $this->getCommoditySuppliers();
        $this->getMCHCommoditySuppliers();
        $this->getMCHOtherSuppliers();
        $this->getMNHOtherSuppliers();
        $this->getFacilityTypes();
        $this->getFacilityOwners();
        $this->getProvinceNames();
        $this->getAllSources();
        $this->getAllSourcesforPDF();
        $this->createCommodityAvailabilitySection();
        $this->createMCHOrtCommodityAvailabilitySection();
        $this->createBemoncSignalFunctionsSection();
        $this->createStaffTrainingGuidelinesSection();
        $this->createMCHStaffTrainingGuidelinesSection();
        $this->createSuppliesSection();
        $this->createSuppliesMCHSection();
        $this->createHardwareResourcesMCHSection();
        $this->createSuppliesMNHOtherSection();
        $this->createEquipmentSection();
        $this->createEquipmentMCHSection();
        $this->createDeliveryEquipmentSection();
        $this->createCommodityUsageAndOutageSection();
        $this->createSuppliesUsageAndOutageSection();
        $this->createTreatmentsMCHSection();
        $this->createFacilitiesListSection();
        $this->createMCHIndicatorsSection();
        $this->createORTCornerAspectsSection();
        $this->createMCHGuidelineAvailabilitySection();
        $this->createMNHWaterAspectsSection();
        $this->createMNHCEOCAspectsSection();
        $this->createMCHCommunityStrategySection();
		$this->createHcwProfileSection();
		$this->createhcwCaseManagementSection();
		$this->createmchConsultationSection();
        
        //pdf functions
        $this->getCommoditySuppliersforPDF();
        $this->createBemoncSignalFunctionsSectionforPDF();
        $this->createMNHCEOCAspectsSectionforPDF();
        $this->createSuppliesSectionforPDF();
        $this->createCommodityAvailabilitySectionforPDF();
        $this->createCommodityUsageAndOutageSectionPDF();
        $this->getMNHOtherSuppliersPDF();
        $this->createSuppliesMNHOtherSectionPDF();
        $this->createSuppliesUsageAndOutageSectionforPDF();
        $this->createMNHWaterAspectsSectionPDF();
        $this->createMNHCommunityStrategySection();
        
        //---------------------/
        $this->createMCHGuidelineAvailabilitySectionforPDF();
        
        //new functions
        $this->getMCHOtherSuppliersforPDF();
        $this->createMNHHIVTestingAspectsSection();
        $this->createMNHHIVTestingAspectsSectionforPDF();
        $this->createMNHPreparednessAspectsSection();
        $this->createMNHPreparednessAspectsSectionforPDF();
        $this->createMNHGuidelinesAspectsSection();
        $this->createMNHGuidelinesAspectsSectionforPDF();
        $this->createMNHJobAidsAspectsSection();
        $this->createMNHJobAidsAspectsSectionforPDF();
        $this->createHardwareResourcesMNHSection();
        $this->createHardwareResourcesMNHSectionforPDF();
        $this->createNurses();
        
        $this->createMNHNewbornCareAspectsSection();
        $this->createMNHNewbornCareAspectsSectionforPDF();
        $this->createMNHPostNatalCareAspectsSection();
        $this->createMNHPostNatalCareAspectsSectionforPDF();
        
        $this->createMNHWasteDisposalAspectsSectionforPDF();
        $this->createMNHWasteDisposalAspectsSection();
        
        $this->createMNHCommitteeAspectsSection();
        $this->createMNHCommitteeAspectsSectionforPDF();
        $this->createBeds();
        $this->createServices();
        $this->createServicesforPDF();
        $this->createKangaroo();
        $this->createKangarooforPDF();
        $this->getMCHCommoditySuppliersPDF();
        $this->createMCHOrtCommodityAvailabilitySectionforPDF();
        $this->createMCHIndicatorsSectionforPDF();
        $this->createORTCornerAspectsSectionforPDF();
        $this->createSuppliesMCHSectionforPDF();
        $this->createHardwareResourcesMCHSectionforPDF();
        
        $this->createMCHBundlingAvailabilitySection();
        $this->createMCHBundlingAvailabilitySectionforPDF();
        
        $this->getAccessChallenges();

        $this->createConsultingAspectsSection();
        $this->createConsultingAspectsSectionforPDF();

         $this->  createInterviewAspectsSection();
          $this->  createInterviewAspectsSectionforPDF();

      
        
    }
    
    function getRepositoryByFormName($form) {
        $this->the_form = $this->em->getRepository($form);
        return $this->theForm;
    }
    
    public function getProvinceNames() {
        
        //obtained from the session data
        if ($this->session->userdata('allProvinces'))
        
        //  print var_dump($this -> session -> userdata('allProvinces'));exit;
        foreach ($this->session->userdata('allProvinces') as $key => $value) {
            $this->selectProvince.= '<option value="' . $value['provinceId'] . '">' . $value['provinceName'] . '</option>' . '<br />';
        }
        
        //var_dump($this -> session -> userdata('allProvinces')); exit;
        return $this->selectProvince;
    }
    
    public function getDisctrictNames() {
        
        /*obtained from the session data*/
        $this->data_found = $this->m_mnh_survey->getDistrictNames();
        foreach ($this->data_found as $value) {
            $this->selectDistricts.= '<option value="' . $value['districtId'] . '">' . $value['districtName'] . '</option>' . '<br />';
        }
        
        //var_dump($this -> session -> userdata('allDistricts')); exit;
        return $this->selectDistricts;
    }
    
    public function getCountyNames() {
        
        /*obtained from the session data*/
        $this->data_found = $this->m_mnh_survey->getCountyNames();
        foreach ($this->data_found as $value) {
            $this->selectCounties.= '<option value="' . $value['countyId'] . '">' . $value['countyName'] . '</option>' . '<br />';
        }
        
        //var_dump($this -> session -> userdata('allCounties')); exit;
        return $this->selectCounties;
    }
    
    public function getReportingCounties() {
        
        /*obtained from the session data*/
        $this->selectReportingCounties = '';
        $survey = $this->session->userdata('survey');
        $this->data_found = $this->m_analytics->getReportingCounties($survey);
        foreach ($this->data_found as $value) {
            $this->selectReportingCounties.= '<option value="' . $value['county'] . '">' . $value['county'] . '</option>' . '<br />';
        }
        
        //var_dump($this -> session -> userdata('allCounties')); exit;
        return $this->selectReportingCounties;
    }
    
    public function getSpecificFacilities($mfc = 13001) {
        
        /*obtained from the session data*/
        $this->data_found = $this->m_mnh_survey->getSpecificFacilityNames($mfc);
        foreach ($this->data_found as $value) {
            
            // $this->selectFacilityType.= '<option value="'.$value['ft_id'].'">'.$value['facility_type'].'</option>'.'<br />';
            $this->selectFacilityType.= '<p>' . $value['fac_name'] . '</p>';
        }
        
        //var_dump($this->data_found); exit;
        return $this->selectFacilityType;
    }
    
    public function getFacilityTypes() {
        
        /*obtained from the session data*/
        $this->data_found = $this->m_mnh_survey->getFacilityTypeNames();
        foreach ($this->data_found as $value) {
            $this->selectFacilityType.= '<option value="' . $value['ft_id'] . '">' . $value['fac_type'] . '</option>' . '<br />';
        }
        
        //var_dump($this->data_found); exit;
        return $this->selectFacilityType;
    }
    
    public function getFacilityLevels() {
        
        /*obtained from the session data*/
        $this->data_found = $this->m_mnh_survey->getFacilityLevelNames();
        foreach ($this->data_found as $value) {
            $this->selectFacilityLevel.= '<option value="' . $value['flId'] . '">' . $value['flName'] . '</option>' . '<br />';
        }
        
        //var_dump($this -> session -> userdata('allFacilityLevels')); exit;
        return $this->selectFacilityLevel;
    }
    
    public function getFacilityOwners() {
        
        /*obtained from the session data*/
        
        $this->data_found = $this->m_mnh_survey->getFacilityOwnerNames();
        foreach ($this->data_found as $value) {
            $this->selectFacilityOwner.= '<option value="' . $value['foId'] . '">' . $value['foName'] . '</option>' . '<br />';
        }
        
        //var_dump($this -> session -> userdata('allFacilityOwners')); exit;
        return $this->selectFacilityOwner;
    }
    
    public function getCommoditySuppliers() {
        $this->data_found = $this->m_mnh_survey->getCommoditySupplierNames();
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->selectCommoditySuppliers.= '<option value="' . $value['supplierName'] . '">' . $counter . '. ' . $value['supplierName'] . '</option>' . '<br />';
        }
    }
    
    public function getCommoditySuppliersforPDF() {
        $this->data_found = $this->m_mnh_survey->getCommoditySupplierNames();
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->selectCommoditySuppliersPDF.= $value['supplierName'] . '<input type="checkbox">';
        }
    }
    
    public function getMCHCommoditySuppliers() {
        $this->data_found = $this->m_mch_survey->getCommoditySupplierNames();
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->selectMCHCommoditySuppliers.= '<option value="' . $value['supplierName'] . '">' . $counter . '. ' . $value['supplierName'] . '</option>' . '<br />';
        }
    }
    
    public function getMCHCommoditySuppliersPDF() {
        $this->data_found = $this->m_mch_survey->getCommoditySupplierNames();
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->selectMCHCommoditySuppliersPDF.= $value['supplierName'] . '<input type="checkbox">';
        }
    }
    
    public function getAccessChallenges() {
        $this->data_found = $this->m_mch_survey->getAccessChallenges();
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->selectAccessChallenges.= '<tr><td><input style="margin-right:20px"value="' . $value['achCode'] . '" name="achResponse_1" id= "" type="radio">' . $value['achName'] . '</td></tr>';
        }
    }
    
    public function getMCHOtherSuppliers() {
        $this->data_found = $this->m_mch_survey->getOtherSupplierNames();
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->selectMCHOtherSuppliers.= '<option value="' . $value['supplierName'] . '">' . $counter . '. ' . $value['supplierName'] . '</option>' . '<br />';
        }
    }
    
    public function getMCHOtherSuppliersforPDF() {
        $this->data_found = $this->m_mch_survey->getOtherSupplierNames();
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->selectMCHOtherSuppliersPDF.= $value['supplierName'] . '<input type="checkbox">';
        }
    }
    
    public function getAllSources() {
        $this->data_found = $this->m_mch_survey->getAllHWSources();
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->hardwareSources.= '<option value="' . $value['supplierName'] . '">' . $counter . '. ' . $value['supplierName'] . '</option>' . '<br />';
        }
    }
    
    public function getAllSourcesforPDF() {
        $this->data_found = $this->m_mch_survey->getAllHWSources();
        
        //var_dump($this -> data_found);die;
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->hardwareSourcesPDF.= $value['supplierName'] . '<input type="checkbox">';
        }
        
        //echo $this -> hardwareSourcesPDF;die;
        
        
    }
    
    public function getMNHOtherSuppliers() {
        $this->data_found = $this->m_mnh_survey->getOtherSupplierNames();
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->selectMNHOtherSuppliers.= '<option value="' . $value['supplierName'] . '">' . $counter . '. ' . $value['supplierName'] . '</option>' . '<br />';
        }
    }
    
    public function getMNHOtherSuppliersPDF() {
        $this->data_found = $this->m_mnh_survey->getOtherSupplierNames();
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->selectMNHOtherSuppliersPDF.= $value['supplierName'] . '<input type="checkbox">';
        }
    }
    
    public function getHealthFacilities() {
        $this->data_found = $this->m_mnh_survey->getFacilityNames();
        
        //var_dump($this -> data_found);die;
        foreach ($this->data_found as $value) {
            $this->selectFacility.= '<option value="' . $value['facName'] . '">' . $value['facName'] . '</option>' . '<br />';
        }
    }
    
    /**Function to create the section: STATE THE AVAILABILITY & QUANTITIES OF THE FOLLOWING COMMODITIES.
     * */
    public function createCommodityAvailabilitySection() {
        $this->data_found = $this->m_mnh_survey->getCommodityNames();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $supplier_names = $this->selectCommoditySuppliers;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->commodityAvailabilitySection.= '<tr>
			<td> ' . $value['commName'] . ' </td>
			<td> ' . $value['commUnit'] . '</td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="cqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_' . $counter . '" type="radio" value="Never Available" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Delivery Room" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Store" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" id="cqLocOther_' . $counter . '" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" id="cqLocNA_' . $counter . '" type="checkbox" value="Not Applicable" />
			</td>
			

			<td style ="text-align:center;">
			<input name="cqNumberOfUnits_' . $counter . '" id="cqNumberOfUnits_' . $counter . '" type="text" size="5" class="cloned numbers"/>
			</td>
			<td width="50">
			<select name="cqSupplier_' . $counter . '" id="cqSupplier_' . $counter . '" class="cloned">
			<option value="" selected="selected">Select One</option>' . $supplier_names . '
			</select></td>
			<td width="60">
			<select name="cqReason_' . $counter . '" id="cqReason_' . $counter . '" style="width:110px" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">1. Not Ordered</option>
				<option value="Ordered but not yet Received">2. Ordered but not yet Received</option>
				<option value="Expired">3. Expired</option>
				<option value="All Used">4. All Used</option>
				<option value="Not Applicable">5. Not Applicable</option>
				

			</select></td>
			<input type="hidden"  name="cqCommCode_' . $counter . '" id="cqCommCode_' . $counter . '" value="' . $value['commCode'] . '" />
	</tr>';
        }
        
        //echo $this->commodityAvailabilitySection;die;
        return $this->commodityAvailabilitySection;
    }
    
    /**Function to create the section: STATE THE AVAILABILITY & QUANTITIES OF THE FOLLOWING COMMODITIES.
     * */
    public function createCommodityAvailabilitySectionforPDF() {
        $this->data_found = $this->m_mnh_survey->getCommodityNames();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $supplier_names = $this->selectCommoditySuppliersPDF;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->commodityAvailabilitySectionPDF.= '<tr>
			<td> ' . $value['commName'] . ' </td>
			<td> ' . $value['commUnit'] . '</td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="cqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_' . $counter . '" type="radio" value="Never Available" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Delivery Room" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Store" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" id="cqLocOther_' . $counter . '" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" id="cqLocNA_' . $counter . '" type="checkbox" value="Not Applicable" />
			</td>
			

			<td style ="text-align:center;">
			<input name="cqNumberOfUnits_' . $counter . '" id="cqNumberOfUnits_' . $counter . '" type="text" size="5" class="cloned numbers"/>
			</td>
			<td width="200">
			' . $supplier_names . '</td>
			<td width="60">
			1.Not Ordered<input type="checkbox"></br>
			2.Ordered but not yet received<input type="checkbox">
			3.Expired<input type="checkbox">
			4.All used<input type="checkbox">
			5.Not Applicable<input type="checkbox">
			</td>
			<input type="hidden"  name="cqcommCode_' . $counter . '" id="cqcommCode_' . $counter . '" value="' . $value['commCode'] . '" />
	</tr>';
        }
        
        //echo $this->commodityAvailabilitySection;die;
        return $this->commodityAvailabilitySectionPDF;
    }
    
    /**Function to create the section: STATE THE AVAILABILITY & QUANTITIES OF THE FOLLOWING COMMODITIES.
     * */
    public function createMCHOrtCommodityAvailabilitySection() {
        $this->data_found = $this->m_mch_survey->getCommodityNames();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $supplier_names = $this->selectMCHCommoditySuppliers;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->mchCommodityAvailabilitySection.= '<tr>
			<td> ' . $value['commName'] . ' </td>
			<td> ' . $value['commUnit'] . '</td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="cqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_' . $counter . '" type="radio" value="Never Available" class="cloned"/>
			</td>
			<td width="60">
			<select name="cqReason_' . $counter . '" id="cqReason_' . $counter . '" style="width:110px" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">1. Not Ordered</option>
				<option value="Ordered but not yet Received">2. Ordered but not yet Received</option>
				<option value="Expired">3. Expired</option>
				<option value="All Used">4. All Used</option>
				<option value="Not Applicable">5. Not Applicable</option>

			</select></td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Ward" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" id="cqLocNA_' . $counter . '" type="checkbox" value="Not Applicable" />
			</td>
			

			<td style ="text-align:center;">
			<input name="cqNumberOfUnits_' . $counter . '" id="cqNumberOfUnits_' . $counter . '" type="text" size="5" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqExpiryDate_' . $counter . '" id="cqExpiryDate_' . $counter . '" type="text" size="15" class="cloned expiryDate"/>
			</td>
			<td width="50">
			<select name="cqSupplier_' . $counter . '" id="cqSupplier_' . $counter . '" class="cloned">
			<option value="" selected="selected">Select One</option>' . $supplier_names . '
			</select></td>
			<input type="hidden"  name="cqCommCode_' . $counter . '" id="cqcommCode_' . $counter . '" value="' . $value['commCode'] . '" />
	</tr>';
        }
        
        //echo $this->mchCommodityAvailabilitySection;die;
        return $this->mchCommodityAvailabilitySection;
    }
    
    public function createMCHOrtCommodityAvailabilitySectionforPDF() {
        $this->data_found = $this->m_mch_survey->getCommodityNames();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $supplier_names = $this->selectMCHCommoditySuppliersPDF;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->mchCommodityAvailabilitySectionPDF.= '<tr>
			<td> ' . $value['commName'] . ' </td>
			<td> ' . $value['commUnit'] . '</td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="cqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_' . $counter . '" type="radio" value="Never Available" class="cloned"/>
			</td>
			<td width="60">

				1. Not Ordered<input type="checkbox">
				2. Ordered but not yet Received<input type="checkbox">
				3. Expired<input type="checkbox">
				4. All Used<input type="checkbox">
				5. Not Applicable<input type="checkbox">
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Ward" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" id="cqLocNA_' . $counter . '" type="checkbox" value="Not Applicable" />
			</td>
			

			<td style ="text-align:center;">
			<input name="cqNumberOfUnits_' . $counter . '" id="cqNumberOfUnits_' . $counter . '" type="text" size="5" class="cloned numbers"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqExpiryDate_' . $counter . '" id="cqExpiryDate_' . $counter . '" type="text" size="15" class="cloned expiryDate"/>
			</td>
			<td width="200">' . $supplier_names . '
			</td>
			<input type="hidden"  name="cqCommCode_' . $counter . '" id="cqcommCode_' . $counter . '" value="' . $value['commCode'] . '" />
	</tr>';
        }
        $this->myCount = $counter;
        
        //echo $this->mchCommodityAvailabilitySection;die;
        return $this->mchCommodityAvailabilitySectionPDF;
    }
    
    /**Function to create the section: STATE THE AVAILABILITY & QUANTITIES OF THE FOLLOWING COMMODITIES.
     * */
    public function createMCHBundlingAvailabilitySection() {
        $this->data_found = $this->m_mch_survey->getBundlingNames();
        
        //var_dump($this->data_found);die;
        $counter = $this->myCount;
        $supplier_names = $this->selectMCHCommoditySuppliers;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->mchBundling.= '<tr>
			<td> ' . $value['commName'] . ' </td>
			<td> ' . $value['commUnit'] . '</td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="cqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_' . $counter . '" type="radio" value="Never Available" class="cloned"/>
			</td>
			<td width="60">
			<select name="cqReason_' . $counter . '" id="cqReason_' . $counter . '" style="width:110px" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">1. Not Ordered</option>
				<option value="Ordered but not yet Received">2. Ordered but not yet Received</option>
				<option value="Expired">3. Expired</option>
				<option value="All Used">4. All Used</option>
				<option value="Not Applicable">5. Not Applicable</option>

			</select></td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Ward" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" id="cqLocNA_' . $counter . '" type="checkbox" value="Not Applicable" />
			</td>
			

			<td style ="text-align:center;">
			<input name="cqNumberOfUnits_' . $counter . '" id="cqNumberOfUnits_' . $counter . '" type="text" size="5" class="cloned numbers"/>
			</td>
			<td width="50">
			<select name="cqSupplier_' . $counter . '" id="cqSupplier_' . $counter . '" class="cloned">
			<option value="" selected="selected">Select One</option>' . $supplier_names . '
			</select></td>
			<input type="hidden"  name="cqCommCode_' . $counter . '" id="cqcommCode_' . $counter . '" value="' . $value['commCode'] . '" />
	</tr>';
        }
        
        //echo $this->mchCommodityAvailabilitySection;die;
        return $this->mchBundling;
    }
    
    public function createMCHBundlingAvailabilitySectionforPDF() {
        $this->data_found = $this->m_mch_survey->getBundlingNames();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $supplier_names = $this->selectMCHCommoditySuppliersPDF;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->mchBundlingPDF.= '<tr>
			<td> ' . $value['commName'] . ' </td>
			<td> ' . $value['commUnit'] . '</td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="cqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqAvailability_' . $counter . '" type="radio" value="Never Available" class="cloned"/>
			</td>
			<td width="60">

				1. Not Ordered<input type="checkbox">
				2. Ordered but not yet Received<input type="checkbox">
				3. Expired<input type="checkbox">
				4. All Used<input type="checkbox">
				5. Not Applicable<input type="checkbox">
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Ward" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="cqLocation_' . $counter . '[]" id="cqLocNA_' . $counter . '" type="checkbox" value="Not Applicable" />
			</td>
			

			<td style ="text-align:center;">
			<input name="cqNumberOfUnits_' . $counter . '" id="cqNumberOfUnits_' . $counter . '" type="text" size="5" class="cloned numbers"/>
			</td>
			<td width="200">' . $supplier_names . '
			</td>
			<input type="hidden"  name="cqCommCode_' . $counter . '" id="cqcommCode_' . $counter . '" value="' . $value['commCode'] . '" />
	</tr>';
        }
        
        //echo $this -> mchBundlingPDF;die;
        return $this->mchBundlingPDF;
    }
    
    /**Function to create the section: PROVISION OF BEmONC SIGNAL FUNCTIONS IN THE LAST THREE MONTHS
     * */
    public function createBemoncSignalFunctionsSection() {
        $this->data_found = $this->m_mnh_survey->getSignalFunctions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->signalFunctionsSection.= '<tr>
			<td colspan="7">' . $value['sfName'] . '</td><td colspan="4">
			<select name="bmsfSignalFunctionConducted_' . $counter . '" id="bmsfSignalFunctionConducted_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select></td><td colspan="5">
			<select name="bmsfChallenge_' . $counter . '" id="bmsfChallenge_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select Challenge</option>
				<option value="Inadequate Drugs">1.Inadequate Drugs</option>
				<option value="Inadequate Skill">2.Inadequate Skill</option>
				<option value="Inadequate Supplies">3.Inadequate Supplies</option>
				<option value="Inadequate Job aids">4.Inadequate Job aids</option>
				<option value="Inadequate equipment">5.Inadequate Equipment</option>
				<option value="Case never presented">6.Case never presented</option>
				<option value="No Challenge Experienced">7.No Challenge Experienced</option>

			</select></td>
			<input type="hidden"  name="bmsfSignalCode_' . $counter . '" id="bmsfSignalCode_' . $counter . '" value="' . $value['sfacilityMFL'] . '" />
		</tr>';
        }
        
        //echo $this->signalFunctionsSection;die;
        return $this->signalFunctionsSection;
    }
    
    /**Function to create the section: PROVISION OF BEmONC SIGNAL FUNCTIONS IN THE LAST THREE MONTHS
     * */
    public function createBemoncSignalFunctionsSectionforPDF() {
        $this->data_found = $this->m_mnh_survey->getSignalFunctions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->signalFunctionsSectionPDF.= '
   		<tr>
			<td colspan="7">' . $value['sfName'] . '</td>
			<td colspan="2">
			Yes <input type="checkbox">
			No <input type="checkbox">
			
			</td>
			<td colspan="5">
			1.Inadequate Drugs<input type="checkbox">
			2.Inadequate Skill<input type="checkbox">
			3.Inadequate Supplies<input type="checkbox">
			4.Inadequate Job aids<input type="checkbox">
			5.Inadequate Equipment<input type="checkbox">
			6.Case never presented<input type="checkbox">
			7.No Challenge Experienced<input type="checkbox">
			</td>
			<input type="hidden"  name="bmsfSignalCode_' . $counter . '" id="bmsfSignalCode_' . $counter . '" value="' . $value['sfacilityMFL'] . '" />
		</tr>';
        }
        
        //echo $this->signalFunctionsSection;die;
        return $this->signalFunctionsSectionPDF;
    }
    
    /**Function to create the section: ORT Corner Aspects
     * */
    public function createORTCornerAspectsSection() {
        $this->data_found = $this->m_mch_survey->getOrtAspectQuestions('ort');
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $ort_location = '';
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            if ($value['questionCode'] == 'QUC01') {
                
                //set follow up question if qn on designated ort location is yes
                
                $aspect = '<tr>
			<td colspan="1">' . $value['questionName'] . '</td>
			<td colspan="1">
			<select name="questionResponse_' . $counter . '" id="questionResponse_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select>
			</td>
			<input type="hidden"  name="questionCode_' . $counter . '" id="questionCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
                $this->ortCornerAspectsSection.= $aspect;
            } else {
                
                if ($value['questionCode'] == 'QUC02b') {
                    $ort_location = '<tr id="ort_location" style="display:true">
			<td colspan="1">' . $value['questionName'] . '</td>
			<td colspan="2">
			<label>Multiple Selections Allowed</label><br/>
			<input type="checkbox" name="questionLocResponse_' . $counter . '[]" id="questionLocResponse_' . $counter . '"  value="MCH"/>
			<label for="" style="font-weight:normal">MCH</label><br/>
			
			<input type="checkbox" name="questionLocResponse_' . $counter . '[]" id="questionLocResponse_' . $counter . '"  value="U5 Clinic"/>
			<label for="" style="font-weight:normal">U5 Clinic</label><br/>
			
			<input type="checkbox" name="questionLocResponse_' . $counter . '[]" id="questionLocResponse_' . $counter . '"  value="OPD"/>
			<label for="" style="font-weight:normal">OPD</label><br/>
			
		   
			<input type="checkbox" name="questionLocResponse_' . $counter . '[]" id="questionLocResponse_' . $counter . '"  value="WARD"/>
			<label for="" style="font-weight:normal">WARD</label><br/>
			
			
			<input type="checkbox" name="ortLocationOther_' . $counter . '[]" id="ortLocationOther_' . $counter . '"  value=""/>
			<label for="" style="font-weight:normal">Other</label><br/>
			<input type="text" name="questionLocResponse_' . $counter . '[]" id="questionLocResponse_' . $counter . '"  value="" maxlength="45" size="45" placeholder="please specify"/>
			
			
			</td>
			<input type="hidden"  name="questionCode_' . $counter . '" id="questionCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
                    
                    $this->ortCornerAspectsSection.= $ort_location;
                } else {
                    
                    $this->ortCornerAspectsSection.= '<tr>
			<td colspan="1">' . $value['questionName'] . '</td>
			<td colspan="1">
			<select name="questionResponse_' . $counter . '" id="questionResponse_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select>
			</td>
			<input type="hidden"  name="questionCode_' . $counter . '" id="questionCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
                }
            }
        }
        
        //echo $this->ortCornerAspectsSection;die;
        return $this->ortCornerAspectsSection;
    }
    
    public function createORTCornerAspectsSectionforPDF() {
        $this->data_found = $this->m_mch_survey->getOrtAspectQuestions('ort');
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $ort_location = '';
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            if ($value['questionCode'] == 'QUC01') {
                
                //set follow up question if qn on designated ort location is yes
                
                $aspect = '<tr>
			<td colspan="1">' . $value['questionName'] . '</td>
			<td colspan="1">
			Yes <input type="checkbox"> No <input type="checkbox">
			</td>
			<input type="hidden"  name="ortcAspectCode_' . $counter . '" id="ortcAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
                $this->ortCornerAspectsSectionPDF.= $aspect;
            } else {
                
                if ($value['questionCode'] == 'QUC02b') {
                    $ort_location = '<tr id="ort_location" style="display:true">
			<td colspan="1">' . $value['questionName'] . '</td>
			<td colspan="2">
			<label>Multiple Selections Allowed</label><br/>
			<input type="checkbox" name="questionLocResponse_' . $counter . '[]" id="questionLocResponse_' . $counter . '"  value="MCH"/>
			<label for="" style="font-weight:normal">MCH</label><br/>
			
			<input type="checkbox" name="questionLocResponse_' . $counter . '[]" id="questionLocResponse_' . $counter . '"  value="U5 Clinic"/>
			<label for="" style="font-weight:normal">U5 Clinic</label><br/>
			
			<input type="checkbox" name="questionLocResponse_' . $counter . '[]" id="questionLocResponse_' . $counter . '"  value="OPD"/>
			<label for="" style="font-weight:normal">OPD</label><br/>
			
		   
			<input type="checkbox" name="questionLocResponse_' . $counter . '[]" id="questionLocResponse_' . $counter . '"  value="WARD"/>
			<label for="" style="font-weight:normal">WARD</label><br/>
			
			
			<input type="checkbox" name="ortLocationOther_' . $counter . '[]" id="ortLocationOther_' . $counter . '"  value=""/>
			<label for="" style="font-weight:normal">Other</label><br/>
			<input type="text" name="questionLocResponse_' . $counter . '[]" id="questionLocResponse_' . $counter . '"  value="" maxlength="45" size="45" placeholder="please specify"/>
			
			
			</td>
			<input type="hidden"  name="ortcAspectCode_' . $counter . '" id="ortcAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
                    
                    $this->ortCornerAspectsSectionPDF.= $ort_location;
                } else {
                    
                    $this->ortCornerAspectsSectionPDF.= '<tr>
			<td colspan="1">' . $value['questionName'] . '</td>
			<td colspan="1">
			Yes <input type="checkbox"> No <input type="checkbox">
			<input type="hidden"  name="ortcAspectCode_' . $counter . '" id="ortcAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
                }
            }
        }
        
        //echo $this->ortCornerAspectsSection;die;
        return $this->ortCornerAspectsSectionPDF;
    }
    
    /**Function to create the section: Child Health--Community Strategy
     * */
    public function createMCHCommunityStrategySection() {
        $this->data_found = $this->m_mch_survey->getMchCommunityStrategyQuestions('cms');
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            
            $this->mchCommunityStrategySection.= '<tr>
			<td colspan="1">(<strong>' . $counter . '</strong>) ' . $value['questionName'] . '</td>
			<td colspan="1">
			<input type="text"  name="mchCommunityStrategy_' . $counter . '" id="mchCommunityStrategy_' . $counter . '" value="" class="numbers cloned"/>
			</td>
			<input type="hidden"  name="mchCommunityStrategyQCode_' . $counter . '" id="mchCommunityStrategyQCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->mchCommunityStrategySection;die;
        return $this->mchCommunityStrategySection;
    }
    
    /**Function to create the section: Child Health--Community Strategy
     * */
    public function createMNHCommunityStrategySection() {
        $this->data_found = $this->m_mnh_survey->getMnhCommunityStrategy('cms');
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            
            $this->mnhCommunityStrategySectionPDF.= '<tr>
			<td colspan="1">(<strong>' . $counter . '</strong>) ' . $value['questionName'] . '</td>
			<td colspan="1">
			<input type="text"  name="mnhCommunityStrategy_' . $counter . '" id="mnhCommunityStrategy_' . $counter . '" value="" class="numbers cloned"/>
			</td>
			<input type="hidden"  name="mnhCommunityStrategyQCode_' . $counter . '" id="mnhCommunityStrategyQCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->mnhCommunityStrategySection;die;
        return $this->mnhCommunityStrategySectionPDF;
    }
    
	   /**Function to create the section: Child Health--HCW Profile
     * */
    public function createHcwProfileSection() {
        $this->data_found = $this->m_hcw_survey->gethcwProfile('imci');
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
        	$counter++;
            
            $this->hcwProfileSection.= '<tr>
			<td colspan="1">(<strong>' . $counter . '</strong>) ' . $value['questionName'] . '</td>
			<td colspan="1">
			<input type="text"  name="hcwProfile_' . $counter . '" id="hcwProfile_' . $counter . '" value="" class="numbers cloned"/>
			</td>
			<input type="hidden"  name="hcwProfileQCode_' . $counter . '" id="hcwProfileQCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->hcwProfileSection;die;
        return $this->hcwProfileSection;
    }
	   /**Function to create the section: Child Health--Consultation Questions
     * */
    public function createmchConsultationSection() {
        $this->data_found = $this->m_mch_survey->getmchConsultationQuestions('imci');
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
        	$counter++;
            
            $this->mchConsultationSection.= '<tr>
			<td colspan="1">(<strong>' . $counter . '</strong>) ' . $value['questionName'] . '</td>
			<td colspan="1">
			<input type="text"  name="mchConsultationResponse_' . $counter . '" id="mchConsultationResponse_' . $counter . '" value="" class="numbers cloned"/>
			</td>
			<input type="hidden"  name="mchConsultationQCode_' . $counter . '" id="mchConsultationQCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->mchConsultationSection;die;
        return $this->mchConsultationSection;
    }
	    /**Function to create various sections based on the indicator type * */
    public function createhcwCaseManagementSection() {
        $this->data_found = $this->m_hcw_survey->getIndicatorNames();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $section = '';
        $svc = $dgn = $cns = $ror = $sgn = $pne = $con = $fev = $cnl = $cls = $ref = '';
        $svcn = $dgnn = $cnsn = $rorn = $sgnn = $pnen = $conn = $fevn = $clsn = $cnln = $refn = 0;
         $numbering = array_merge(range('A','Z'),range('a', 'z'));
        foreach ($this->data_found as $value) {
            $counter++;
            $section = $value['indicatorFor'];
            
            if ($section == 'svc') {
                $svc.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$svcn] . ')</strong> ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $svcn++;
            } else if ($section == 'dgn') {
                $dgn.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$dgnn] . ')</strong> ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $dgnn++;
            } else if ($section == 'cns') {
                $cns.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$cnsn] . ')</strong> ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $cnsn++;
            } else if ($section == 'ror') {
                $ror.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$rorn] . ')</strong> ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $rorn++;
            } else if ($section == 'sgn') {
                $sgn.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$sgnn] . ')</strong>  ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $sgnn++;
            } else if ($section == 'pne') {
                $pne.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$pnen] . ')</strong>  ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $pnen++;
            } else if ($section == 'fev') {
                $fev.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$fevn] . ')</strong>  ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $fevn++;
            } else if ($section == 'con') {
                $con.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$conn] . ')</strong>  ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $conn++;
            } else if ($section == 'cls') {
                $cls.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$clsn] . ')</strong>  ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $clsn++;
            } else if ($section == 'cnl') {
                $cnl.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$cnln] . ')</strong>  ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $cnln++;
            } else if ($section == 'ref') {
                $ref.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$sgnn] . ')</strong>  ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $refn++;
            }
        }
        
        $this->hcwCaseManagementSection['svc'] = $svc;
        $this->hcwCaseManagementSection['dgn'] = $dgn;
        $this->hcwCaseManagementSection['cns'] = $cns;
        $this->hcwCaseManagementSection['ror'] = $ror;
        $this->hcwCaseManagementSection['sgn'] = $sgn;
        $this->hcwCaseManagementSection['pne'] = $pne;
        $this->hcwCaseManagementSection['fev'] = $fev;
        $this->hcwCaseManagementSection['con'] = $con;
        $this->hcwCaseManagementSection['cnl'] = $cnl;
        $this->hcwCaseManagementSection['ref'] = $ref;
        $this->hcwCaseManagementSection['cls'] = $cls;
        
        //echo $this->hcwCaseManagementSection;die;
        return $this->hcwCaseManagementSection;
    }
	
    /**Function to create the section: mnh water availability follow up questions in Section 6 of 7 ii
     * */
    public function createMNHWaterAspectsSection() {
        $this->data_found = $this->m_mnh_survey->getMnhWaterAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        $mh_supplier_names = $this->selectMNHOtherSuppliers;
        foreach ($this->data_found as $value) {
            $counter++;
            $aspect_response_on_yes = '';
            
            if ($value['questionCode'] == 'QMNH01') {
                $aspect_response_on_yes = '<label>Water Storage Point</label><br/>
			<input type="text"  name="mnhwAspectWaterSpecify_' . $counter . '" id="mnhwStoragePoint_' . $counter . '" value="" size="45" placeholder="specify"/>';
            } else {
                $aspect_response_on_yes = '<label>Main Source</label><br/>
			<select name="mnhwAspectWaterSpecify_' . $counter . '" id="sqSupplier_' . $counter . '" class="cloned">
			<option value="" selected="selected">Select One</option>' . $mh_supplier_names . '
			</select>';
            }
            $this->mnhWaterAspectsSection.= '<tr>
			<td colspan="7">' . $value['questionName'] . '</td>
			<td colspan="5">
			<select name="mnhwAspectResponse_' . $counter . '" id="mnhwAspectResponse_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<td colspan="2">
			' . $aspect_response_on_yes . '
			</td>
			<input type="hidden"  name="mnhwAspectCode_' . $counter . '" id="mnhwAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->mnhWaterAspectsSection;die;
        return $this->mnhWaterAspectsSection;
    }
    
    /**Function to create the section: mnh water availability follow up questions in Section 6 of 7 ii
     * */
    public function createMNHWaterAspectsSectionPDF() {
        $this->data_found = $this->m_mnh_survey->getMnhWaterAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        $mh_supplier_namesPDF = $this->selectMNHOtherSuppliersPDF;
        foreach ($this->data_found as $value) {
            $counter++;
            $aspect_response_on_yes = '';
            
            if ($value['questionCode'] == 'QMNH01') {
                $aspect_response_on_yes = '<label>Water Storage Point</label><br/>
			<input type="text"  name="mnhwAspectWaterSpecify_' . $counter . '" id="mnhwStoragePoint_' . $counter . '" value="" size="45" placeholder="specify"/>';
            } else {
                $aspect_response_on_yes = '<label style="font-weight:bold">Main Source</label><br/>' . $mh_supplier_namesPDF;
            }
            $this->mnhWaterAspectsSectionPDF.= '<tr>
			<td colspan="7">' . $value['questionName'] . '</td>
			<td colspan="5">
			Yes<input type="checkbox">No<input type="checkbox">
			</td>
			<td colspan="2">
			' . $aspect_response_on_yes . '
			</td>
			<input type="hidden"  name="mnhwAspectCode_' . $counter . '" id="mnhwAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->mnhWaterAspectsSection;die;
        return $this->mnhWaterAspectsSectionPDF;
    }
    
    /**Function to create the section: mnh CEOC service provision in Section 2 of 7 iii	 * */
    public function createMNHCEOCAspectsSection() {
        $this->data_found = $this->m_mnh_survey->getMnhCeocAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            $follow_up_question = '';
            
            if ($value['questionCode'] == 'QMNH03') {
                $follow_up_question = '<tr id="transfusion_y" style="display:none" disabled>
			<td colspan="7">If blood transfusion is performed, indicate <strong>main source</strong> of blood</td>
			<td>
			<select name="mnhceocFollowUp_' . $counter . '" id="mnhceocFollowUp_' . $counter . '" class="cloned">
			<option value="" selected="selected">Select One</option>
			<option value="Blood bank available">Blood bank available</option>
			<option value="Transfusion done, no blood blank">Transfusions done but no blood bank</option>
			<option value="Other">Other</option>
			</select><br/>
			<label id="label_followup_other_' . $counter . '">Provide Other</label> <br/>
			<input type="text"  name="mnhceocFollowUpOther_' . $counter . '" id="mnhceocFollowUpOther_' . $counter . '" value="" size="64" class="cloned" />
			</td>
			</tr>
			<tr id="transfusion_n" style="display:none">
			<td colspan="7">Give a reason why blood transfusion is <strong>not</strong> performed</td>
			<td>
			<select name="mnhceocReason_' . $counter . '" id="mnhceocReason_' . $counter . '" class="cloned" >
			<option value="" selected="selected">Select One</option>
			<option value="Blood not available">Blood not available</option>
			<option value="No supplies & equipment">Supplies and equipment NOT available</option>
			<option value="Other">Other</option>
			</select><br/>
			<label id="label_reason_other_' . $counter . '">Other Reason</label><br/>
			<input type="text"  name="mnhceocReasonOther_' . $counter . '" id="mnhceocReasonOther_' . $counter . '" value="" size="64" class="cloned" />
			</td>
			</tr>';
            } elseif ($value['questionCode'] == 'QMNH06b' || $value['questionCode'] == 'QMNH06c') {
                $follow_up_question = '';
            } else {
                $follow_up_question = '<tr id="csdone_n" style="display:none">
			<td colspan="7">Give a main reason for <strong>not</strong> conducting Caeserian Section</td>
			<td>
			<select name="mnhceocReason_' . $counter . '" id="mnhceocReason_' . $counter . '" class="cloned" >
			<option value="" selected="selected">Select One</option>
			<option value="No supplies & equipment">Supplies and equipment NOT available</option>
			<option value="No theatre space">Theatre space NOT available</option>
			<option value="No human resource">Human Resource (surgeon/anaesthetist) NOT available</option>
			<option value="Not authorized to provide CEmONC">Not authorized to provide CEmONC</option>
			<option value="Other">Other</option><br/>
			</select><br/>
			<label id="label_reason_other_' . $counter . '">Other Reason</label><br/>
			<input type="text"  name="mnhceocReasonOther_' . $counter . '" id="mnhceocReasonOther_' . $counter . '" value="" size="64" class="cloned" />
			</td>
			</tr>';
            }
            
            $this->mnhCEOCAspectsSection.= '<tr>
		<td colspan="7"><strong>(' . $counter . ').</strong> ' . $value['questionName'] . '</td>
		<td colspan="5">
		<select name="mnhceocAspectResponse_' . $counter . '" id="mnhceocAspectResponse_' . $counter . '" class="cloned ceoc">
			<option value="" selected="selected">Select One</option>
			<option value="Yes">Yes</option>
			<option value="No">No</option>
		</select>
		</td>' . $follow_up_question . '
		<input type="hidden"  name="mnhceocAspectCode_' . $counter . '" id="mnhceocAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
	</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhCEOCAspectsSection;
    }
    
    public function createMNHCEOCAspectsSectionforPDF() {
        $this->data_found = $this->m_mnh_survey->getMnhCeocAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            $follow_up_question = '';
            
            if ($value['questionCode'] == 'QMNH03') {
                $follow_up_question = '
			<tr id="transfusion_y" style="display:none" disabled>
	<td colspan="7">If blood transfusion is performed, indicate <strong>main source</strong> of blood</td>
	<td colspan="5">
		1. Blood bank available<input type="checkbox">2. Transfusions done but no blood bank<input type="checkbox">3. Other(specify)<input type="checkbox">
	
	<br/>
	<label id="label_followup_other_' . $counter . '">Provide Other</label>
	<br/>
	<input type="text"  name="mnhceocFollowUpOther_' . $counter . '" id="mnhceocFollowUpOther_' . $counter . '" value="" size="64" class="cloned" />
	</td>
</tr>
<tr id="transfusion_n">
	<td colspan="7">Give a reason why blood transfusion is <strong>not</strong> performed</td>
	<td colspan="5">
	1. Blood not available<input type="checkbox">2. Supplies and equipment not available<input type="checkbox">3. Other(specify)<input type="checkbox">
	<br/>
	<label id="label_reason_other_' . $counter . '">Other Reason</label>
	<br/>
	<input type="text"  name="mnhceocReasonOther_' . $counter . '" id="mnhceocReasonOther_' . $counter . '" value="" size="64" class="cloned" />
	</td>
</tr>';
            } elseif ($value['questionCode'] == 'QMNH06b' || $value['questionCode'] == 'QMNH06c') {
                $follow_up_question = '';
            } else {
                $follow_up_question = '<tr id="csdone_n">
	<td colspan="7">Give a main reason for <strong>not</strong> conducting Caeserian Section</td>
	<td colspan="5">
	1. Supplies and equipment not available<input type="checkbox">
	2. Theatre space not available<input type="checkbox">
	3. Human Resource not available<input type="checkbox">
	4. Other(specify)<input type="checkbox">
	<br/>
	<label id="label_reason_other_' . $counter . '">Other Reason</label>
	<br/>
	<input type="text"  name="mnhceocReasonOther_' . $counter . '" id="mnhceocReasonOther_' . $counter . '" value="" size="64" class="cloned" />
	</td>
</tr>';
            }
            
            $this->mnhCEOCAspectsSectionPDF.= '<tr>
		<td colspan="7"><strong>(' . $counter . ').</strong> ' . $value['questionName'] . '</td>
		<td colspan="5">
		Yes<input type="checkbox">No<input type="checkbox">
		</td>' . $follow_up_question . '
		<input type="hidden"  name="mnhceocAspectCode_' . $counter . '" id="mnhceocAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
	</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhCEOCAspectsSectionPDF;
    }
    
    /**Function to create the section: mnh CEOC service provision in Section 2 of 7 iii	 * */
    public function createMNHHIVTestingAspectsSection() {
        $this->data_found = $this->m_mnh_survey->getMnhHIVTestingAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            $this->mnhHIVTestingAspectsSection.= '<tr>
			<td colspan="7">' . $value['questionName'] . '</td>
			<td colspan="5">
			<select name="mnhHIVAspectResponse_' . $counter . '" id="mnhHIVAspectResponse_' . $counter . '" class="cloned is-guideline">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select>
			</td>
			<input type="hidden"  name="mnhHIVAspectCode_' . $counter . '" id="mnhHIVAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhHIVTestingAspectsSection;
    }

    /**Function to create the section: mnh CEOC service provision in Section 2 of 7 iii	 * */
    public function createConsultingAspectsSection() {
        $this->data_found = $this->m_hcw_survey->getConsultationQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            $this->hcwConsultingAspectsSection.= '<tr>
			<td>' . $value['questionName'] . '</td>
			<td>
			<select name="questionAspectResponse_' . $counter . '" id="questionAspectResponse_' . $counter . '" class="cloned is-guideline">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="questionAspectCode_' . $counter . '" id="questionAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->hcwConsultingAspectsSection;
    }
      /**Function to create the section: mnh CEOC service provision in Section 2 of 7 iii	 * */
    public function createConsultingAspectsSectionforPDF() {
        $this->data_found = $this->m_hcw_survey->getConsultationQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            $this->hcwConsultingAspectsSectionPDF.= '<tr>
			<td><strong>3.1.'.$counter .'</strong>  '. $value['questionName'] . '</td>
			<td colspan="1">
		Yes<input type="checkbox">No<input type="checkbox">
		</td>
		<td colspan="1">
		Yes<input type="checkbox">No<input type="checkbox">
		</td>
		<td colspan="1">
		Yes<input type="checkbox">No<input type="checkbox">
		</td>
			<input type="hidden"  name="hcwConsultingAspectCode_' . $counter . '" id="hcwConsultingAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->hcwConsultingAspectsSectionPDF;
    }

    /**Function to create the section: hcw Interview Apsect Section * */
    public function createInterviewAspectsSection() {
        $this->data_found = $this->m_hcw_survey->getInterviewQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            $this->hcwInterviewAspectsSection.= '<tr>
            <td>' . $value['questionName'] . '</td>
            <td>
            <select name="questionAspectResponse_' . $counter . '" id="questionAspectResponse_' . $counter . '" class="cloned is-guideline">
                <option value="" selected="selected">Select One</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            </td>
            <input type="hidden"  name="questionAspectCode_' . $counter . '" id="questionAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
        </tr>';
        
        }
        
        //echo $this->hcwInterviewAspectsSection;die;
        return $this->hcwInterviewAspectsSection;
    }
      /**Function to create the section: mnh CEOC service provision in Section 2 of 7 iii	 * */
    public function createInterviewAspectsSectionforPDF() {
        $this->data_found = $this->m_hcw_survey->getInterviewQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            $this->hcwInterviewAspectsSectionPDF.= '<tr>
			<td><strong>3.2.'.$counter .'</strong>  '. $value['questionName'] . '</td>
			<td colspan="1">
		Yes<input type="checkbox">No<input type="checkbox">
		</td>
		<td colspan="1">
		Yes<input type="checkbox">No<input type="checkbox">
		</td>
		<td colspan="1">
		Yes<input type="checkbox">No<input type="checkbox">
		</td>
			<input type="hidden"  name="hcwInterviewAspectCode_' . $counter . '" id="hcwConsultingAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->hcwInterviewAspectsSectionPDF;
    }
    
    public function createMNHHIVTestingAspectsSectionforPDF() {
        $this->data_found = $this->m_mnh_survey->getMnhHIVTestingAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            
            $this->mnhHIVTestingAspectsSectionPDF.= '<tr>
		<td colspan="1"><strong>(' . $counter . ').</strong> ' . $value['questionName'] . '</td>
		<td colspan="1">
		Yes<input type="checkbox">No<input type="checkbox">
		</td>' . '
		<input type="hidden"  name="mnhhivAspectCode_' . $counter . '" id="mnhhivAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
	</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhHIVTestingAspectsSectionPDF;
    }
    
    public function createMNHWasteDisposalAspectsSection() {
        $this->data_found = $this->m_mnh_survey->getMnhWasteDisposalAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            
            $this->mnhWasteDisposalAspectsSection.= '<tr>
			<td colspan="7">' . $value['questionName'] . '</td>
			<td colspan="5">
			<select name="wastedisposalReason_' . $counter . '" id="wastedisposalReason_' . $counter . '" class="cloned is-guideline">
				<option value="" selected="selected">Select One</option>
				<option value="Waste Pit">Waste Pit</option>
				<option value="Placenta Pit">Placenta Pit</option>
				<option value="Incinerator">Incinerator</option>
				<option value="Burning">Burning</option>
				<option value="Other(Specify)">Other</option>

			</select>
			<label>Other</label><input type="text" name="wastedisposalReasonOther_' . $counter . '" >
			
			</td>
			<input type="hidden"  name="wastedisposalAspectCode_' . $counter . '" id="wastedisposalAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhWasteDisposalAspectsSection;
    }
    
    public function createMNHWasteDisposalAspectsSectionforPDF() {
        $this->data_found = $this->m_mnh_survey->getMnhWasteDisposalAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            
            $this->mnhWasteDisposalAspectsSectionPDF.= '<tr>
		<td colspan="1"><strong>(' . $counter . ').</strong> ' . $value['questionName'] . '</td>
		<td colspan="1">
			Waste Pit<input type="checkbox">
			Placenta Pit<input type="checkbox">
			Incinerator<input type="checkbox">
			Burning<input type="checkbox">
			Other<input type="checkbox">
		</td>' . '
		<input type="hidden"  name="wastedisposalAspectCode_' . $counter . '" id="wastedisposalAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
	</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhWasteDisposalAspectsSectionPDF;
    }
    
    public function createMNHPostNatalCareAspectsSection() {
        $this->data_found = $this->m_mnh_survey->getMnhPostNatalAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            
            $this->mnhPostNatalCareAspectsSection.= '<tr>
			<td colspan="7">' . $value['questionName'] . '</td>
			<td colspan="5">
			<select name="postnatalAspectResponse_' . $counter . '" id="postnatalAspectResponse_' . $counter . '" class="cloned is-guideline">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select>
			</td>
			<input type="hidden"  name="postnatalAspectCode_' . $counter . '" id="postnatalAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhPostNatalCareAspectsSection;
    }
    
    public function createMNHPostNatalCareAspectsSectionforPDF() {
        $this->data_found = $this->m_mnh_survey->getMnhPostNatalAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            
            $this->mnhPostNatalCareAspectsSectionPDF.= '<tr>
		<td colspan="7"><strong>(' . $counter . ').</strong> ' . $value['questionName'] . '</td>
		<td colspan="5">
		Yes<input type="checkbox">No<input type="checkbox">
		</td>' . '
		<input type="hidden"  name="postnatalAspectCode_' . $counter . '" id="postnatalAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
	</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhPostNatalCareAspectsSectionPDF;
    }
    
    public function createMNHCommitteeAspectsSection() {
        $this->data_found = $this->m_mnh_survey->getMnhCommitteeAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            
            $this->mnhCommitteeAspectSection.= '<tr>
			<td colspan="7">' . $value['questionName'] . '</td>
			<td colspan="5">
			<select name="committeeAspectResponse_' . $counter . '" id="committeeAspectResponse_' . $counter . '" class="cloned is-guideline">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select>
			</td>
			<input type="hidden"  name="committeeAspectCode_' . $counter . '" id="committeeAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhCommitteeAspectSection;
    }
    
    public function createMNHCommitteeAspectsSectionforPDF() {
        $this->data_found = $this->m_mnh_survey->getMnhCommitteeAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            $follow_up_question = '';
            
            $this->mnhCommitteeAspectSectionPDF.= '<tr>
	<td colspan="7"><strong>(' . $counter . ').</strong> ' . $value['questionName'] . '</td>
		<td colspan="5">
		Yes<input type="checkbox">No<input type="checkbox">
		</td>' . $follow_up_question . '
		<input type="hidden"  name="mnhceocAspectCode_' . $counter . '" id="mnhceocAspectCode_' . $counter . '" value="' . $counter . '" />
	</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhCommitteeAspectSectionPDF;
    }
    
    public function createMNHNewbornCareAspectsSection() {
        $this->data_found = $this->m_mnh_survey->getMnhNewbornAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            
            $this->mnhNewbornCareAspectsSection.= '<tr>
			<td >' . $value['questionName'] . '</td>
			<td >
			<select name="newbornAspectResponse_' . $counter . '" id="newbornAspectResponse_' . $counter . '" class="cloned" >
			<option value="" selected="selected">Select One</option>
			<option value="Yes">Yes</option>
			<option value="No">No</option>
			</select><br/>
			
			</td>
			<input type="hidden"  name="newbornAspectCode_' . $counter . '" id="newbornAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhNewbornCareAspectsSection;
    }
    
    public function createMNHNewbornCareAspectsSectionforPDF() {
        $this->data_found = $this->m_mnh_survey->getMnhNewbornAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            
            $this->mnhNewbornCareAspectsSectionPDF.= '<tr>
		<td colspan="7"><strong>(' . $counter . ').</strong> ' . $value['questionName'] . '</td>
		<td colspan="5">
		Yes<input type="checkbox">No<input type="checkbox">
		</td>' . '
		<input type="hidden"  name="newbornAspectCode_' . $counter . '" id="newbornAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
	</tr>
	';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhNewbornCareAspectsSectionPDF;
    }
    
    /**Function to create the section: mnh CEOC service provision in Section 2 of 7 iii	 * */
    public function createMNHPreparednessAspectsSection() {
        $this->data_found = $this->m_mnh_survey->getMnhPreparednessTestingAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            
            $this->mnhPreparednessAspectsSection.= '<tr>
		<td colspan="7"><strong>(' . $counter . ').</strong> ' . $value['questionName'] . '</td>
		<td colspan="5">
		<select name="mnhPreparednessAspectResponse_' . $counter . '" id="mnhPreparednessAspectResponse_' . $counter . '" class="cloned ceoc">
			<option value="" selected="selected">Select One</option>
			<option value="Yes">Yes</option>
			<option value="No">No</option>
		</select>
		</td>
		<input type="hidden"  name="mnhPreparednessAspectCode_' . $counter . '" id="mnhPreparednessAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
	</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhPreparednessAspectsSection;
    }
    
    public function createMNHPreparednessAspectsSectionforPDF() {
        $this->data_found = $this->m_mnh_survey->getMnhPreparednessTestingAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            
            $this->mnhPreparednessAspectsSectionPDF.= '<tr>
		<td colspan="1"><strong>(' . $counter . ').</strong> ' . $value['questionName'] . '</td>
		<td colspan="1">
		Yes<input type="checkbox">No<input type="checkbox">
		</td>
		<input type="hidden"  name="mnhpreparednessAspectCode_' . $counter . '" id="mnhpreparednessAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
	</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhPreparednessAspectsSectionPDF;
    }
    
    /**Function to create the section: mnh CEOC service provision in Section 2 of 7 iii	 * */
    public function createMNHGuidelinesAspectsSection() {
        $this->data_found = $this->m_mnh_survey->getMnhGuidelinesAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            $this->mnhGuidelinesAspectsSection.= '<tr>
			<td colspan="6">' . $value['questionName'] . '</td>
			<td colspan="3">
			<select name="mnhGuidelinesAspectResponse_' . $counter . '" id="mnhGuidelinesAspectResponse_' . $counter . '" class="cloned is-guideline">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select>
			</td>
			<td colspan="3"><input type="text" name="mnhGuidelinesAspectCount_' . $counter . '" id="mnhGuidelinesAspectCount_' . $counter . '" size="6" class="numbers" disabled/></td>
			<input type="hidden"  name="mnhGuidelinesAspectCode_' . $counter . '" id="mnhGuidelinesAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->mnhGuidelinesAspectsSection;die;
        return $this->mnhGuidelinesAspectsSection;
    }
    
    public function createMNHGuidelinesAspectsSectionforPDF() {
        $this->data_found = $this->m_mnh_survey->getMnhGuidelinesAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            
            $this->mnhGuidelinesAspectsSectionPDF.= '<tr>
		<td colspan="1"><strong>(' . $counter . ').</strong> ' . $value['questionName'] . '</td>
		<td colspan="1">
		Yes<input type="checkbox">No<input type="checkbox">
		</td>
		<td><input type="text" name="ortcGuidesCount_' . $counter . '" id="ortcGuidesCount_' . $counter . '" size="6" class="numbers" /></td>
		<input type="hidden"  name="mnhceocAspectCode_' . $counter . '" id="mnhceocAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
	</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhGuidelinesAspectsSectionPDF;
    }
    
    /**Function to create the section: mnh CEOC service provision in Section 2 of 7 iii	 * */
    public function createMNHJobAidsAspectsSection() {
        $this->data_found = $this->m_mnh_survey->getMnhJobAidsAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            $this->mnhJobAidsAspectsSection.= '<tr>
			<td colspan="1">' . $value['questionName'] . '</td>
			<td colspan="1">
			<select name="mnhJobAidsAspectResponse_' . $counter . '" id="mnhJobAidsAspectResponse_' . $counter . '" class="cloned is-guideline">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select>
			</td>
			<td><input type="text" name="mnhJobAidsAspectCount_' . $counter . '" id="mnhJobAidsAspectCount_' . $counter . '" size="6" class="numbers" disabled/></td>
			<input type="hidden"  name="mnhJobAidsAspectCode_' . $counter . '" id="mnhJobAidsAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhJobAidsAspectsSection;
    }
    
    public function createMNHJobAidsAspectsSectionforPDF() {
        $this->data_found = $this->m_mnh_survey->getMnhJobAidsAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $aspect = '';
        foreach ($this->data_found as $value) {
            $counter++;
            
            $this->mnhJobAidsAspectsSectionPDF.= '<tr>
		<td colspan="1"><strong>(' . $counter . ').</strong> ' . $value['questionName'] . '</td>
		<td colspan="1">
		Yes<input type="checkbox">No<input type="checkbox">
		</td>
		<td><input type="text" name="mnhJobAidsAspectCount_' . $counter . '" id="mnhJobAidsAspectCount_' . $counter . '" size="6" class="numbers" /></td>
		<input type="hidden"  name="mnhceocAspectCode_' . $counter . '" id="mnhceocAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
	</tr>';
        }
        
        //echo $this->mnhCEOCAspectsSection;die;
        return $this->mnhJobAidsAspectsSectionPDF;
    }
    
    /**Function to create the section: CH Guideline Availability
     * */
    public function createMCHGuidelineAvailabilitySection() {
        $this->data_found = $this->m_mch_survey->getGuidelineAvailabilityQuestions('gp');
        
        //var_dump($this->data_found);die;
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->mchGuidelineAvailabilitySection.= '<tr>
			<td colspan="1">' . $value['questionName'] . '</td>
			<td colspan="1">
			<select name="questionResponse_' . $counter . '" id="questionResponse_' . $counter . '" class="cloned is-guideline">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select>
			</td>
			<td><input type="text" name="questionCount_' . $counter . '" id="questionCount_' . $counter . '" size="6" class="numbers" disabled/></td>
			<input type="hidden"  name="questionCode_' . $counter . '" id="questionCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
    }
    
    /**Function to create the section: CH Guideline Availability
     * */
    public function createMCHGuidelineAvailabilitySectionforPDF() {
        $this->data_found = $this->m_mch_survey->getGuidelineAvailabilityQuestions('gp');
        
        //var_dump($this->data_found);die;
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->mchGuidelineAvailabilitySectionPDF.= '<tr>
			<td colspan="1">' . $value['questionName'] . '</td>
			<td colspan="1">
			YES<input type="checkbox">NO<input type="checkbox">
			</td>
			<td><input type="text" name="ortcGuidesCount_' . $counter . '" id="ortcGuidesCount_' . $counter . '" size="6" class="numbers" disabled/></td>
			<input type="hidden"  name="ortcAspectCode_' . $counter . '" id="ortcAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        return $this->mchGuidelineAvailabilitySectionPDF;
    }
    
    /**Function to create the section: CH Guideline Availability
     * */
    public function createNurses() {
        $this->data_found = $this->m_mnh_survey->getNursesAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->nurses.= '<tr>
			<td colspan="1">' . $value['questionName'] . '</td>
			
			<td colspan="1"><input type="text" name="nurseCount_' . $counter . '" id="nurseCount_' . $counter . '" style="width:200px" class="numbers" disabled/></td>
			<input type="hidden"  name="nurseAspectCode_' . $counter . '" id="nurseAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        return $this->nurses;
    }
    
    /**Function to create the section: CH Guideline Availability
     * */
    public function createKangaroo() {
        $this->data_found = $this->m_mnh_survey->getMnhKangarooAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->mnhKangarooMotherCare.= '<tr>
			<td colspan="1">' . $value['questionName'] . '</td>
			<td colspan="1">
			<select name="kangarooAspect_' . $counter . '" id="kangarooAspect_' . $counter . '" class="cloned is-guideline">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select>
			<input type="hidden"  name="kangarooAspectCode_' . $counter . '" id="kangarooAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        return $this->mnhKangarooMotherCare;
    }
    
    /**Function to create the section: CH Guideline Availability
     * */
    public function createKangarooforPDF() {
        $this->data_found = $this->m_mnh_survey->getMnhKangarooAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->mnhKangarooMotherCarePDF.= '<tr>
			<td colspan="1"><strong>(' . $counter . '). </strong>' . $value['questionName'] . '</td>
			
			<td>Yes<input type="checkbox">No<input type="checkbox"></td>
			<input type="hidden"  name="kangarooAspectCode_' . $counter . '" id="kangarooAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        return $this->mnhKangarooMotherCarePDF;
    }
    
    /**Function to create the section: CH Guideline Availability
     * */
    public function createServices() {
        $this->data_found = $this->m_mnh_survey->getMnhServicesAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->services.= '<tr>
			<td colspan="1">' . $value['questionName'] . '</td>
			<td colspan="1">
			<select name="serviceAspect_' . $counter . '" id="serviceAspect_' . $counter . '" class="cloned is-guideline">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>

			</select>
			<input type="hidden"  name="serviceAspectCode_' . $counter . '" id="serviceAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        return $this->services;
    }
    
    /**Function to create the section: CH Guideline Availability
     * */
    public function createServicesforPDF() {
        $this->data_found = $this->m_mnh_survey->getMnhServicesAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->servicesPDF.= '<tr>
			<td colspan="1">' . $value['questionName'] . '</td>
			
			<td>Yes<input type="checkbox">No<input type="checkbox">
			<input type="hidden"  name="serviceAspectCode_' . $counter . '" id="serviceAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        return $this->servicesPDF;
    }
    
    /**Function to create the section: CH Guideline Availability
     * */
    public function createBeds() {
        $this->data_found = $this->m_mnh_survey->getMnhBedsAspectQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->beds.= '<tr>
			<td colspan="1">' . $value['questionName'] . '</td>
			
			<td colspan="1"><input style="width:200px" type="text" name="bedCount_' . $counter . '" id="bedCount_' . $counter . '"  class="numbers" disabled/></td>
			<input type="hidden"  name="bedAspectCode_' . $counter . '" id="bedAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
		</tr>';
        }
        return $this->beds;
    }
    
    /**Function to create various sections based on the indicator type * */
    public function createMCHIndicatorsSection() {
        $this->data_found = $this->m_mch_survey->getIndicatorNames();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $section = '';
        $svc = $dgn = $cns = $ror = $sgn = $pne = $con = $fev = $cnl = $cls = $ref = '';
        $svcn = $dgnn = $cnsn = $rorn = $sgnn = $pnen = $conn = $fevn = $clsn = $cnln = $refn = 0;
       $numbering = array_merge(range('A','Z'),range('a', 'z'));
	    foreach ($this->data_found as $value) {
            $counter++;
            $section = $value['indicatorFor'];
            
            if ($section == 'svc') {
                $svc.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$svcn] . ')</strong> ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $svcn++;
            } else if ($section == 'dgn') {
                $dgn.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$dgnn] . ')</strong> ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $dgnn++;
            } else if ($section == 'cns') {
                $cns.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$cnsn] . ')</strong> ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $cnsn++;
            } else if ($section == 'ror') {
                $ror.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$rorn] . ')</strong> ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $rorn++;
            } else if ($section == 'sgn') {
                $sgn.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$sgnn] . ')</strong>  ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $sgnn++;
            } else if ($section == 'pne') {
                $pne.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$pnen] . ')</strong>  ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $pnen++;
            } else if ($section == 'fev') {
                $fev.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$fevn] . ')</strong>  ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $fevn++;
            } else if ($section == 'con') {
                $con.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$conn] . ')</strong>  ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $conn++;
            } else if ($section == 'cls') {
                $cls.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$clsn] . ')</strong>  ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $clsn++;
            } else if ($section == 'cnl') {
                $cnl.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$cnln] . ')</strong>  ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $cnln++;
            } else if ($section == 'ref') {
                $ref.= '<tr>
			<td colspan="1"><strong>(' . $numbering[$sgnn] . ')</strong>  ' . $value['indicatorName'] . '</td>
			<td colspan="1">
			<select name="mchIndicator_' . $counter . '" id="mchIndicator_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
                $refn++;
            }
        }
        
        $this->mchIndicatorsSection['svc'] = $svc;
        $this->mchIndicatorsSection['dgn'] = $dgn;
        $this->mchIndicatorsSection['cns'] = $cns;
        $this->mchIndicatorsSection['ror'] = $ror;
        $this->mchIndicatorsSection['sgn'] = $sgn;
        $this->mchIndicatorsSection['pne'] = $pne;
        $this->mchIndicatorsSection['fev'] = $fev;
        $this->mchIndicatorsSection['con'] = $con;
        $this->mchIndicatorsSection['cnl'] = $cnl;
        $this->mchIndicatorsSection['ref'] = $ref;
        $this->mchIndicatorsSection['cls'] = $cls;
        
        //echo $this->mchIndicatorsSection;die;
        return $this->mchIndicatorsSection;
    }
    public function createMCHIndicatorsSectionforPDF() {
        $this->data_found = $this->m_mch_survey->getIndicatorNames();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $section = '';
        $numbering = array_merge(range('A','Z'),range('a', 'z'));
        $base = 0;
        $current = "";
        foreach ($this->data_found as $value) {
            $counter++;
            $section = $value['indicatorFor'];
            $current = ($base == 0) ? $section : $current;
            $base = ($current != $section) ? 0 : $base;
            $current = ($base == 0) ? $section : $current;
            
            $base++;
            $data[$section][] = '
				<tr>
			<td colspan="1"><strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['indicatorName'] . '</td>
			<td>Yes <input name="mchIndicator_'.$counter.'" value="Yes" type="radio"> No <input value="No" name="mchIndicator_'.$counter.'"  type="radio">
			</td>
			<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
		</tr>';
        }
        
        foreach ($data as $key => $value) {
            $this->mchIndicatorsSectionPDF[$key] = '';
            foreach ($value as $val) {
                $this->mchIndicatorsSectionPDF[$key].= $val;
            }
        }
        return $this->mchIndicatorsSectionPDF;
    }
    public function createQuestionsSectionPDF() {
        $this->data_found = $this->m_mch_survey->getAllQuestions();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        $section = '';
        $numbering = range('a', 'z');
        $base = 0;
        $current = "";
        foreach ($this->data_found as $value) {
            $counter++;
            $section = $value['questionFor'];
            $current = ($base == 0) ? $section : $current;
            $base = ($current != $section) ? 0 : $base;
            $current = ($base == 0) ? $section : $current;
            
            $base++;
            $data[$section][] = '
				<tr>
			<td colspan="1"><strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['questionFor'] . '</td>
			<td>Yes <input type="checkbox"> No <input type="checkbox">
			</td>
			<input type="hidden"  name="questionCode_' . $counter . '" id="questionCode_' . $counter . '" value="' . $value['questionFor'] . '" />
		</tr>';
        }
        
        foreach ($data as $key => $value) {
            $this->questionPDF[$key] = '';
            foreach ($value as $val) {
                $this->questionPDF[$key].= $val;
            }
        }
        return $this->questionPDF;
    }
    
    /**Function to create the section: INDICATE WHEN LAST ANY STAFF AT YOUR FACILITY RECEIVED TRAINING ON THE FOLLOWING GUIdELINES
     * */
    public function createStaffTrainingGuidelinesSection() {
        $this->data_found = $this->m_mnh_survey->getTrainingGuidelines();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->trainingGuidelineSection.= '<tr>
			<TD colspan="2" >' . $value['guideName'] . '</TD><td>
			<input name="gstrainedbefore2010_' . $counter . '" type="text" size="10" class="cloned numbers"/>
			</td>
			<td>
			<input name="gstrainedafter2010_' . $counter . '" type="text" size="10" class="cloned numbers"/>
			</td><td>
			<input name="gsworking_' . $counter . '" type="text" size="10" class="cloned numbers"/>
			</td>
			<input type="hidden"  name="gsguideCode_' . $counter . '" id="gsguideCode_' . $counter . '" value="' . $value['guideCode'] . '" />
		</tr>';
        }
        
        //echo $this->trainingGuidelineSection;die;
        return $this->trainingGuidelineSection;
    }
    
    /**Function to create the section: INDICATE WHEN LAST ANY STAFF AT YOUR FACILITY RECEIVED TRAINING ON THE FOLLOWING GUIdELINES
     * */
    public function createMCHStaffTrainingGuidelinesSection() {
        $this->data_found = $this->m_mch_survey->getTrainingGuidelines();
        
        //var_dump($this->data_found);die;
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            $this->mchTrainingGuidelineSection.= '<tr>
			<TD colspan="2" >' . $value['guideName'] . '</TD><td>
			<input name="gstrainedbefore2010_' . $counter . '" type="text" size="10" class="cloned numbers"/>
			</td>
			<td>
			<input name="gstrainedafter2010_' . $counter . '" type="text" size="10" class="cloned numbers"/>
			</td><td>
			<input name="gsworking_' . $counter . '" type="text" size="10" class="cloned numbers"/>
			</td>
			<input type="hidden"  name="gsguideCode_' . $counter . '" id="gsguideCode_' . $counter . '" value="' . $value['guideCode'] . '" />
		</tr>';
        }
        
        //echo $this->mchTrainingGuidelineSection;die;
        return $this->mchTrainingGuidelineSection;
    }
    
    /**Function to create the section: INDICATE THE NUMBER OF UNITS USED AND THE NUMBER OF TIMES COMMODITIES WERE NOT AVAILABILE FOR MORE THAN 7 (SEVEN) DAYS.
     * */
    public function createCommodityUsageAndOutageSection() {
        $this->data_found = $this->m_mnh_survey->getCommodityNames();
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['commUnit'] != null) {
                $unit = $value['commUnit'];
            } else {
                $unit = '';
            }
            $this->commodityUsageAndOutageSection.= '<tr>
			<td colspan="2" style="width:200px;">' . $value['commName'] . ' </td><td >' . $unit . ' </td>
			<td >
			<input name="usocUsage_' . $counter . '" type="text" size="5" class="cloned numbers"/>
			</td>
			<td colspan="2">
			<select name="usocTimesUnavailable_' . $counter . '" id="usocTimesUnavailable_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Once">a. Once</option>
				<option value="2-3">b. 2-3 </option>
				<option value="5-5">c. 4-5 </option>
				<option value="more than 5">d. more than 5 </option>

			</select></td>
						
			
			<td style ="text-align:center;">
			<input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="1" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="2" />
			</td>
			<td style ="text-align:center;">
			<input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="3" />
			</td>
			<td style ="text-align:center;">
			<input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="4" />
			</td>
			<td style ="text-align:center;">
			<input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="5" />
			</td>
			
			<input type="hidden"  name="usoccommCode_' . $counter . '" id="usoccommCode_' . $counter . '" value="' . $value['commCode'] . '" />
		</tr>';
        }
        
        //echo $this->commodityUsageAndOutageSection;die;
        return $this->commodityUsageAndOutageSection;
    }
    
    public function createCommodityUsageAndOutageSectionPDF() {
        $this->data_found = $this->m_mnh_survey->getCommodityNames();
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['commUnit'] != null) {
                $unit = $value['commUnit'];
            } else {
                $unit = '';
            }
            $this->commodityUsageAndOutageSectionPDF.= '<tr>
			<td colspan="2" style="width:200px;">' . $value['commName'] . ' </td><td >' . $unit . ' </td>
			<td >
			<input name="usocUsage_' . $counter . '" type="text" size="5" class="cloned numbers"/>
			</td>
			<td colspan="2">
				a. Once<input type="checkbox">
				b. 2-3 <input type="checkbox">
				c. 4-5<input type="checkbox"> 
				d. more than 5 <input type="checkbox">
			</td>
						
			
			<td style ="text-align:center;">
			<input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="1" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="2" />
			</td>
			<td style ="text-align:center;">
			<input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="3" />
			</td>
			<td style ="text-align:center;">
			<input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="4" />
			</td>
			<td style ="text-align:center;">
			<input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="5" />
			</td>
			
			<input type="hidden"  name="usoccommCode_' . $counter . '" id="usoccommCode_' . $counter . '" value="' . $value['commCode'] . '" />
		</tr>';
        }
        
        //echo $this->commodityUsageAndOutageSection;die;
        return $this->commodityUsageAndOutageSectionPDF;
    }
    
    public function createSuppliesSection() {
        $this->data_found = $this->m_mnh_survey->getSupplyNames();
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['supplyUnit'] != null) {
                $unit = '(' . $value['supplyUnit'] . ')';
            } else {
                $unit = '';
            }
            $this->suppliesSection.= '<tr>
			<td  style="width:200px;">' . $value['supplyName'] . ' ' . $unit . ' </td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="sqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqAvailability_' . $counter . '" type="radio" value="Never Available" />
			</td>		
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="Delivery room" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="Store" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" id="sqLocOther_' . $counter . '" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="sqNumberOfUnits_' . $counter . '" id="sqNumberOfUnits_' . $counter . '" type="text" size="10" class="cloned numbers"/>
			</td>
			<td width="50">
			<select name="sqSupplier_' . $counter . '" id="sqSupplier_' . $counter . '" class="cloned">
			<option value="" selected="selected">Select One</option>
				<option value="KEMSA/GoK">1. KEMSA/GoK</option>
				<option value="Donor">2. Donor</option>
				<option value="Purchase By Patient">3. Purchase By Patient</option>
				<option value="Private purchase by Facility">4. Private purchase by Facility</option>
				<option value="Other">5. Other</option>
			</select></td>
			<td width="50">
			<select name="sqReason_' . $counter . '" id="sqReason_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">1. Not Ordered</option>
				<option value="Ordered but not yet Received">2. Ordered but not yet Received</option>
				<option value="Expired">3. Expired</option>
				<option value="All Used">4. All Used</option>
				

			</select></td>
			<input type="hidden"  name="sqsupplyCode_' . $counter . '" id="sqsupplyCode_' . $counter . '" value="' . $value['supplyCode'] . '" />
		</tr>';
        }
        
        //echo $this->commodityUsageAndOutageSection;die;
        return $this->suppliesSection;
    }
    
    public function createSuppliesSectionforPDF() {
        $this->data_found = $this->m_mnh_survey->getSupplyNames();
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['supplyUnit'] != null) {
                $unit = '(' . $value['supplyUnit'] . ')';
            } else {
                $unit = '';
            }
            $this->suppliesSectionPDF.= '<tr>
			<td>' . $value['supplyName'] . ' ' . $unit . ' </td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="sqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqAvailability_' . $counter . '" type="radio" value="Never Available" />
			</td>		
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="Delivery room" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="Store" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" id="sqLocOther_' . $counter . '" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="sqNumberOfUnits_' . $counter . '" id="sqNumberOfUnits_' . $counter . '" type="text" size="10" class="cloned numbers"/>
			</td>
			<td>
			1. KEMSA/GoK<input type="checkbox">
			2. Donor<input type="checkbox">
			3. Purchase by Patient<input type="checkbox">
			4. Private purchase by Facility<input type="checkbox">
			5. Other <input type="checkbox">
			</td>
			<td>
			1. Not Ordered<input type="checkbox">
			2. Ordered but not yet received<input type="checkbox">
			3. Expired<input type="checkbox">
			4. All Used<input type="checkbox"></td>
			<input type="hidden"  name="sqsupplyCode_' . $counter . '" id="sqsupplyCode_' . $counter . '" value="' . $value['supplyCode'] . '" />
		</tr>';
        }
        
        //echo $this->commodityUsageAndOutageSection;die;
        return $this->suppliesSectionPDF;
    }
    
    public function createSuppliesMNHOtherSection() {
        $mh_supplier_names = $this->selectMNHOtherSuppliers;
        $this->data_found = $this->m_mnh_survey->getOthersupplyNames();
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['supplyUnit'] != null) {
                $unit = '(' . $value['supplyUnit'] . ')';
            } else {
                $unit = '';
            }
            $this->suppliesMNHOtherSection.= '<tr>
			<td  style="width:200px;">' . $value['supplyName'] . ' ' . $unit . ' </td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="sqAvailability_' . $counter . '" id="sqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqAvailability_' . $counter . '" type="radio" value="Never Available" />
			</td>		
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="Maternity" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" id="sqLocOther_' . $counter . '" type="checkbox" value="Other" />
			</td>
			<!--td style ="text-align:center;">
			<input name="sqNumberOfUnits_' . $counter . '" type="text" size="10" class="cloned numbers"/>
			</td-->
			<td width="50">
			<select name="sqSupplier_' . $counter . '" id="sqSupplier_' . $counter . '" class="cloned">
			<option value="" selected="selected">Select One</option>' . $mh_supplier_names . '
			</select></td>
			<!--td width="50">
			<select name="sqReason_' . $counter . '" id="sqReason_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">1. Not Ordered</option>
				<option value="Ordered but not yet Received">2. Ordered but not yet Received</option>
				<option value="Expired">3. Expired</option>
				<option value="All Used">4. All Used</option>
				<option value="Not Applicable">5. Not Applicable</option>
				

			</select></td-->
			<input type="hidden"  name="sqsupplyCode_' . $counter . '" id="sqsupplyCode_' . $counter . '" value="' . $value['supplyCode'] . '" />
		</tr>';
        }
        
        //echo $this->createSuppliesMCHSection;die;
        return $this->suppliesMNHOtherSection;
    }
    
    public function createSuppliesMNHOtherSectionPDF() {
        $mh_supplier_namesPDF = $this->selectMNHOtherSuppliersPDF;
        $this->data_found = $this->m_mnh_survey->getOthersupplyNames();
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['supplyUnit'] != null) {
                $unit = '(' . $value['supplyUnit'] . ')';
            } else {
                $unit = '';
            }
            $this->suppliesMNHOtherSectionPDF.= '<tr>
			<td  style="width:200px;">' . $value['supplyName'] . ' ' . $unit . ' </td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="sqAvailability_' . $counter . '" id="sqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqAvailability_' . $counter . '" type="radio" value="Never Available" />
			</td>		
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="Maternity" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" id="sqLocOther_' . $counter . '" type="checkbox" value="Other" />
			</td>
			<!--td style ="text-align:center;">
			<input name="sqNumberOfUnits_' . $counter . '" type="text" size="10" class="cloned numbers"/>
			</td-->
			<td width="50">
			' . $mh_supplier_namesPDF . '</td>
			<!--td width="50">
			1. Not Ordered<input type="checkbox">
			2. Ordered but not yet Received<input type="checkbox">
			3. Expired<input type="checkbox">
			4. All Used<input type="checkbox">
			5. Not Applicable<input type="checkbox">
			</td-->
			<input type="hidden"  name="sqsupplyCode_' . $counter . '" id="sqsupplyCode_' . $counter . '" value="' . $value['supplyCode'] . '" />
		</tr>';
        }
        
        //echo $this->createSuppliesMCHSection;die;
        return $this->suppliesMNHOtherSectionPDF;
    }
    
    public function createSuppliesMCHSection() {
        $ch_supplier_names = $this->selectMCHOtherSuppliers;
        $this->data_found = $this->m_mch_survey->getSupplyNames();
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['supplyUnit'] != null) {
                $unit = '(' . $value['supplyUnit'] . ')';
            } else {
                $unit = '';
            }
            $this->suppliesMCHSection.= '<tr>
			<td  style="width:200px;">' . $value['supplyName'] . ' ' . $unit . ' </td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="sqAvailability_' . $counter . '" id="sqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqAvailability_' . $counter . '" type="radio" value="Never Available" />
			</td>		
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="Ward" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" id="sqLocOther_' . $counter . '" type="checkbox" value="Other" />
			</td>
			<!--td style ="text-align:center;">
			<input name="sqNumberOfUnits_' . $counter . '" type="text" size="10" class="cloned numbers"/>
			</td-->
			<td width="50">
			<select name="sqSupplier_' . $counter . '" id="sqSupplier_' . $counter . '" class="cloned">
			<option value="" selected="selected">Select One</option>' . $ch_supplier_names . '
			</select></td>
			<!--td width="50">
			<select name="sqReason_' . $counter . '" id="sqReason_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">1. Not Ordered</option>
				<option value="Ordered but not yet Received">2. Ordered but not yet Received</option>
				<option value="Expired">3. Expired</option>
				<option value="All Used">4. All Used</option>
				

			</select></td-->
			<input type="hidden"  name="sqsupplyCode_' . $counter . '" id="sqsupplyCode_' . $counter . '" value="' . $value['supplyCode'] . '" />
		</tr>';
        }
        
        //echo $this->createSuppliesMCHSection;die;
        return $this->suppliesMCHSection;
    }
    
    public function createSuppliesMCHSectionforPDF() {
        $ch_supplier_names = $this->selectMCHOtherSuppliersPDF;
        $this->data_found = $this->m_mch_survey->getSupplyNames();
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['supplyUnit'] != null) {
                $unit = '(' . $value['supplyUnit'] . ')';
            } else {
                $unit = '';
            }
            $this->suppliesMCHSectionPDF.= '<tr>
			<td  style="width:200px;">' . $value['supplyName'] . ' ' . $unit . ' </td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="sqAvailability_' . $counter . '" id="sqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqAvailability_' . $counter . '" type="radio" value="Never Available" />
			</td>		
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" type="checkbox" value="Ward" />
			</td>
			<td style ="text-align:center;">
			<input name="sqLocation_' . $counter . '[]" id="sqLocOther_' . $counter . '" type="checkbox" value="Other" />
			</td>
			<!--td style ="text-align:center;">
			<input name="sqNumberOfUnits_' . $counter . '" type="text" size="10" class="cloned numbers"/>
			</td-->
			<td width="100">
			' . $ch_supplier_names . '
			</td>
			
			<input type="hidden"  name="sqsupplyCode_' . $counter . '" id="sqsupplyCode_' . $counter . '" value="' . $value['supplyCode'] . '" />
		</tr>';
        }
        
        //echo $this->createSuppliesMCHSection;die;
        return $this->suppliesMCHSectionPDF;
    }
    
    public function createHardwareResourcesMCHSection() {
        $ch_supplier_names = $this->selectMCHOtherSuppliers;
        $this->data_found = $this->m_mch_survey->getEquipmentNames('hwr');
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['eqUnit'] != null) {
                $unit = '(' . $value['eqUnit'] . ')';
            } else {
                $unit = '';
            }
            $this->hardwareMCHSection.= '<tr>
			<td  style="width:200px;">' . $value['eqName'] . ' ' . $unit . ' </td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="hwAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="hwAvailability_' . $counter . '" type="radio" value="Never Available" />
			</td>		
			<td style ="text-align:center;">
			<input name="hwLocation_' . $counter . '[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="hwLocation_' . $counter . '[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="hwLocation_' . $counter . '[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="hwLocation_' . $counter . '[]" type="checkbox" value="Ward" />
			</td>
			<td style ="text-align:center;">
			<input name="hwLocation_' . $counter . '[]" id="hwLocOther_' . $counter . '" type="checkbox" value="Other" />
			</td>
			<!--td style ="text-align:center;">
			<input name="hwNumberOfUnits_' . $counter . '" type="text" size="10" class="cloned numbers"/>
			</td-->
			<td width="50">
			<select name="hwSupplier_' . $counter . '" id="hwSupplier_' . $counter . '" class="cloned">
			<option value="" selected="selected">Select One</option>' . $ch_supplier_names . '
			</select></td>
			<!--td width="50">
			<select name="hwReason_' . $counter . '" id="hwReason_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">1. Not Ordered</option>
				<option value="Ordered but not yet Received">2. Ordered but not yet Received</option>
				<option value="Expired">3. Expired</option>
				<option value="All Used">4. All Used</option>
				

			</select></td-->
			<input type="hidden"  name="hwEqCode_' . $counter . '" id="hwEqCode_' . $counter . '" value="' . $value['eqCode'] . '" />
		</tr>';
        }
        
        return $this->hardwareMCHSection;
    }
    
    public function createHardwareResourcesMCHSectionforPDF() {
        $ch_supplier_names = $this->selectMCHOtherSuppliersPDF;
        $this->data_found = $this->m_mch_survey->getEquipmentNames('hwr');
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['eqUnit'] != null) {
                $unit = '(' . $value['eqUnit'] . ')';
            } else {
                $unit = '';
            }
            $this->hardwareMCHSectionPDF.= '<tr>
			<td  style="width:200px;">' . $value['eqName'] . ' ' . $unit . ' </td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="hwAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="hwAvailability_' . $counter . '" type="radio" value="Never Available" />
			</td>		
			<td style ="text-align:center;">
			<input name="hwLocation_' . $counter . '[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="hwLocation_' . $counter . '[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="hwLocation_' . $counter . '[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="hwLocation_' . $counter . '[]" type="checkbox" value="Ward" />
			</td>
			<td style ="text-align:center;">
			<input name="hwLocation_' . $counter . '[]" id="hwLocOther_' . $counter . '" type="checkbox" value="Other" />
			</td>
			<!--td style ="text-align:center;">
			<input name="hwNumberOfUnits_' . $counter . '" type="text" size="10" class="cloned numbers"/>
			</td-->
			<td width="50">
			' . $ch_supplier_names . '
			</td>
			<!--td width="50">
			<select name="hwReason_' . $counter . '" id="hwReason_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Not Ordered">1. Not Ordered</option>
				<option value="Ordered but not yet Received">2. Ordered but not yet Received</option>
				<option value="Expired">3. Expired</option>
				<option value="All Used">4. All Used</option>
				

			</select></td-->
			<input type="hidden"  name="hwEqCode_' . $counter . '" id="hwEqCode_' . $counter . '" value="' . $value['eqCode'] . '" />
		</tr>';
        }
        
        return $this->hardwareMCHSectionPDF;
    }
    
    /**
     * [createHardwareResourcesMNHSection description]
     * @return [type] [description]
     */
    public function createHardwareResourcesMNHSection() {
        $ch_supplier_names = $this->selectMCHOtherSuppliers;
        $sources = $this->hardwareSources;
        $this->data_found = $this->m_mch_survey->getEquipmentNames('mhw');
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['eqUnit'] != null) {
                $unit = '(' . $value['eqUnit'] . ')';
            } else {
                $unit = '';
            }
            $this->hardwareMNHSection.= '<tr>
			<td  style="width:200px;">' . $value['eqName'] . ' ' . $unit . ' </td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="hwAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="hwAvailability_' . $counter . '" type="radio" value="Never Available" />
			</td>		
			<td width="50">
			<select name="hwSupplier_' . $counter . '" id="hwSupplier_' . $counter . '" class="cloned">
			<option value="" selected="selected">Select One</option>' . $ch_supplier_names . '
			</select></td>
			<td width="50">
			<select name="hwSource_' . $counter . '" id="hwSource_' . $counter . '" class="cloned">
			<option value="" selected="selected">Select One</option>' . $sources . '
			</select></td>
			
			<input type="hidden"  name="hweqCode_' . $counter . '" id="hweqCode_' . $counter . '" value="' . $value['eqCode'] . '" />
		</tr>';
        }
        
        return $this->hardwareMNHSection;
    }
    
    public function createHardwareResourcesMNHSectionforPDF() {
        
        $ch_supplier_names = $this->selectMCHOtherSuppliersPDF;
        $sources = $this->hardwareSourcesPDF;
        
        $this->data_found = $this->m_mch_survey->getEquipmentNames('mhw');
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['eqUnit'] != null) {
                $unit = '(' . $value['eqUnit'] . ')';
            } else {
                $unit = '';
            }
            $this->hardwareMNHSectionPDF.= '<tr>
			<td colspan="1">' . $value['eqName'] . ' ' . $unit . ' </td>
			<td style="vertical-align: middle; margin: 0px;text-align:center;">
			<input name="hwAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="hwAvailability_' . $counter . '" type="radio" value="Never Available" />
			</td>		
			<td>
			
			' . $ch_supplier_names . '
			</td>
			<td>			
			National Grid <input type="checkbox">Generator<input type="checkbox">Solar<input type="checkbox">bio Gas <input type="checkbox">
			Others <input type="checkbox">
			</td>
					
			<input type="hidden"  name="hweqCode_' . $counter . '" id="hweqCode_' . $counter . '" value="' . $value['eqCode'] . '" />
		</tr>';
        }
        
        return $this->hardwareMNHSectionPDF;
    }
    
    public function createEquipmentSection() {
        $this->data_found = $this->m_mnh_survey->getEquipmentNames('mnh');
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['eqUnit'] != null) {
                $unit = '(' . $value['eqUnit'] . ')';
            } else {
                $unit = '';
            }
            
            $this->equipmentsSection.= '<tr>
			<td >' . $value['eqName'] . ' ' . $unit . ' </td>
			<td style ="text-align:center;">
			<input name="eqAvailability_' . $counter . '" type="radio" value="Available" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="eqAvailability_' . $counter . '" type="radio" value="Never Available" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" type="checkbox" value="Delivery room" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" type="checkbox" value="Store" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" id="eqLocOther_' . $counter . '" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="eqQtyFullyFunctional_' . $counter . '" id="eqQtyFullyFunctional_' . $counter . '" type="text"  size="8" class="numbers" />
			</td>
			<!--td style ="text-align:center;">
			<input name="eqQtyPartiallyFunctional_' . $counter . '" type="text"  size="8" class="numbers"/>
			</td-->
			<td style ="text-align:center;">
			<input name="eqQtyNonFunctional_' . $counter . '" id="eqQtyNonFunctional_' . $counter . '" type="text"  size="8" class="numbers"/>
			</td>
			<input type="hidden"  name="eqCode_' . $counter . '" id="eqCode_' . $counter . '" value="' . $value['eqCode'] . '" />
		</tr>';
            $this->global_counter = $counter;
        }
        
        //echo $this->commodityUsageAndOutageSection;die;
        return $this->equipmentsSection;
    }
    
    public function createDeliveryEquipmentSection() {
        $this->data_found = $this->m_mnh_survey->getEquipmentNames('dke');
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = $this->global_counter;
        
        //pick up from the gen mnh equipment's list
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['eqUnit'] != null) {
                $unit = '(' . $value['eqUnit'] . ')';
            } else {
                $unit = '';
            }
            
            $this->deliveryEquipmentSection.= '<tr>
			<td >' . $value['eqName'] . ' ' . $unit . ' </td>
			<td style ="text-align:center;">
			<input name="eqAvailability_' . $counter . '" type="radio" value="Available" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="eqAvailability_' . $counter . '" type="radio" value="Never Available" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" type="checkbox" value="Delivery room" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" type="checkbox" value="Store" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" id="eqLocOther_' . $counter . '" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="eqQtyFullyFunctional_' . $counter . '" id="eqQtyFullyFunctional_' . $counter . '" type="text"  size="8" class="numbers" />
			</td>
			<!--td style ="text-align:center;">
			<input name="eqQtyPartiallyFunctional_' . $counter . '" type="text"  size="8" class="numbers"/>
			</td-->
			<td style ="text-align:center;">
			<input name="eqQtyNonFunctional_' . $counter . '" id="eqQtyNonFunctional_' . $counter . '" type="text"  size="8" class="numbers"/>
			</td>
			<input type="hidden"  name="eqCode_' . $counter . '" id="eqCode_' . $counter . '" value="' . $value['eqCode'] . '" />
		</tr>';
        }
        
        //echo $this->deliveryEquipmentSection;die;
        return $this->deliveryEquipmentSection;
    }
    
    public function createDeliveryEquipmentSectionPDF() {
        $this->data_found = $this->m_mnh_survey->getEquipmentNames('dke');
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = $this->global_counter;
        
        //pick up from the gen mnh equipment's list
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['eqUnit'] != null) {
                $unit = '(' . $value['eqUnit'] . ')';
            } else {
                $unit = '';
            }
            
            $this->deliveryEquipmentSection.= '<tr>
			<td >' . $value['eqName'] . ' ' . $unit . ' </td>
			<td style ="text-align:center;">
			<input name="eqAvailability_' . $counter . '" type="radio" value="Available" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="eqAvailability_' . $counter . '" type="radio" value="Never Available" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" type="checkbox" value="Delivery room" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" type="checkbox" value="Pharmacy" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" type="checkbox" value="Store" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" id="eqLocOther_' . $counter . '" type="checkbox" value="Other" />
			</td>
			<td style ="text-align:center;">
			<input name="eqQtyFullyFunctional_' . $counter . '" id="eqQtyFullyFunctional_' . $counter . '" type="text"  size="8" class="numbers" />
			</td>
			<!--td style ="text-align:center;">
			<input name="eqQtyPartiallyFunctional_' . $counter . '" type="text"  size="8" class="numbers"/>
			</td-->
			<td style ="text-align:center;">
			<input name="eqQtyNonFunctional_' . $counter . '" id="eqQtyNonFunctional_' . $counter . '" type="text"  size="8" class="numbers"/>
			</td>
			<input type="hidden"  name="eqCode_' . $counter . '" id="eqCode_' . $counter . '" value="' . $value['eqCode'] . '" />
		</tr>';
        }
        
        //echo $this->deliveryEquipmentSection;die;
        return $this->deliveryEquipmentSection;
    }
    
    public function createEquipmentMCHSection() {
        $this->data_found = $this->m_mch_survey->getEquipmentNames('ort');
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        
        $qtyIndicator = '';
        
        //to determine if the equipment needs to be assessed as fully-functioning and not functioning or just quantity (fully-functioning) available only
        
        $equipmentWithFN = array('', 'EQP38', 'EQP28', 'EQP34', 'EQP37');
        
        //equipment whose quantity must indicate the functioning and non-functioning ones
        
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['eqUnit'] != null) {
                $unit = '(' . $value['eqUnit'] . ')';
            } else {
                $unit = '';
            }
            
            if (array_search($value['eqCode'], $equipmentWithFN) == TRUE) {
                
                $qtyIndicator = '<td style ="text-align:center;">
			<input name="eqQtyFullyFunctional_' . $counter . '" id="eqQtyFullyFunctional_' . $counter . '" type="text"  size="8" class="numbers" />
			</td>
			<!--td style ="text-align:center;">
			<input name="eqQtyPartiallyFunctional_' . $counter . '" type="text"  size="8" />
			</td-->
			<td style ="text-align:center;">
			<input name="eqQtyNonFunctional_' . $counter . '" id="eqQtyNonFunctional_' . $counter . '" type="text"  size="8" class="numbers" />
			</td>';
            } else {
                $qtyIndicator = '<td style ="text-align:center;">
			<input name="eqQtyFullyFunctional_' . $counter . '" id="eqQtyFullyFunctional_' . $counter . '" type="text"  size="8" class="numbers" />
			</td>
			<td></td>
			<!--td style ="text-align:center;">
			<input name="eqQtyPartiallyFunctional_' . $counter . '" type="text"  size="8" />
			</td-->
			<!--td style ="text-align:center;">
			<input name="eqQtyNonFunctional_' . $counter . '" type="text"  size="8" />
			</td-->';
            }
            
            $this->equipmentsMCHSection.= '<tr>
			<td >' . $value['eqName'] . ' ' . $unit . ' </td>
			<td style ="text-align:center;">
			<input name="eqAvailability_' . $counter . '" id="eqAvailable_' . $counter . '" type="radio" value="Available" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="eqAvailability_' . $counter . '" id="eqNeverAvailable_' . $counter . '" type="radio" value="Never Available" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" type="checkbox" value="OPD" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" type="checkbox" value="MCH" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" type="checkbox" value="U5 Clinic" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" type="checkbox" value="Ward" />
			</td>
			<td style ="text-align:center;">
			<input name="eqLocation_' . $counter . '[]" id="eqLocOther_' . $counter . '" type="checkbox" value="Other" />
			</td>
			' . $qtyIndicator . '
			<input type="hidden"  name="eqCode_' . $counter . '" id="eqCode_' . $counter . '" value="' . $value['eqCode'] . '" />
		</tr>';
        }
        
        //echo $this->equipmentsMCHSection;die;
        return $this->equipmentsMCHSection;
    }
    
    public function createTreatmentsMCHSection() {
        $this->data_found = $this->m_mch_survey->getTreatmentNames();
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            
            if ($value['treatmentName'] == 'Others') {
                $this->treatmentMCHSection.= '<tr>
			<td >' . $value['treatmentName'] . ' ' . $unit . '<input name="mchtTreatmentOther_' . $counter . '" type="text"  size="64" placeholder="please specify"/> </td>
			<td style ="text-align:center;">
			<input name="mchtSevereDehydration_' . $counter . '" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtSomeDehydration_' . $counter . '" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtNoDehydration_' . $counter . '" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtDysentry_' . $counter . '" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtNoClassification_' . $counter . '" type="text"  size="8" />
			</td>
			<input type="hidden"  name="mchtTreatmentCode_' . $counter . '" id="mchtTreatmentCode_' . $counter . '" value="' . $value['treatmentCode'] . '" />
		</tr>';
            } else {
                $this->treatmentMCHSection.= '<tr>
			<td >' . $value['treatmentName'] . ' ' . $unit . ' </td>
			<td style ="text-align:center;">
			<input name="mchtSevereDehydration_' . $counter . '" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtSomeDehydration_' . $counter . '" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtNoDehydration_' . $counter . '" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtDysentry_' . $counter . '" type="text"  size="8" />
			</td>
			<td style ="text-align:center;">
			<input name="mchtNoClassification_' . $counter . '" type="text"  size="8" />
			</td>
			<input type="hidden"  name="mchtTreatmentCode_' . $counter . '" id="mchtTreatmentCode_' . $counter . '" value="' . $value['treatmentCode'] . '" />
		</tr>';
            }
        }
        
        //echo $this->equipmentsMCHSection;die;
        return $this->treatmentMCHSection;
    }
    
    public function createSuppliesUsageAndOutageSection() {
        $this->data_found = $this->m_mnh_survey->getSupplyNames();
        
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            if ($value['supplyUnit'] != null || $value['supplyUnit'] != "") {
                $unit = '(' . $value['supplyUnit'] . ')';
            } else {
                $unit = '';
            }
            $this->suppliesUsageAndOutageSection.= '<tr>
			<td colspan="2" style="width:200px;">' . $value['supplyName'] . ' ' . $unit . ' </td>
			<!-- td colspan="2">
			<input name="usosUsage_' . $counter . '" type="text" size="5" />
			</td -->
			<td colspan="2">
			<select name="usosTimesUnavailable_' . $counter . '" id="usosTimesUnavailable_' . $counter . '" class="cloned">
				<option value="" selected="selected">Select One</option>
				<option value="Once">a. Once</option>
				<option value="2-3">b. 2-3 </option>
				<option value="5-5">c. 4-5 </option>
				<option value="more than 5">d. more than 5 </option>
			</select></td>
						
			<td style ="text-align:center;">
			<input name="usosWhatHappened_' . $counter . '[]" type="checkbox" value="1" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="usosWhatHappened_' . $counter . '[]" type="checkbox" value="2" />
			</td>
			<td style ="text-align:center;">
			<input name="usosWhatHappened_' . $counter . '[]" type="checkbox" value="3" />
			</td>
			<td style ="text-align:center;">
			<input name="usosWhatHappened_' . $counter . '[]" type="checkbox" value="4" />
			</td>
			<td style ="text-align:center;">
			<input name="usosWhatHappened_' . $counter . '[]" type="checkbox" value="5" />
			</td>
			
			<input type="hidden"  name="usosSupplyCode_' . $counter . '" id="usossupplyCode_' . $counter . '" value="' . $value['supplyCode'] . '" />
		</tr>';
        }
        
        //echo $this->suppliesUsageAndOutageSection;die;
        return $this->suppliesUsageAndOutageSection;
    }
    
    public function createSuppliesUsageAndOutageSectionforPDF() {
        $this->data_found = $this->m_mnh_survey->getSupplyNames();
        
        //var_dump($this->data_found);die;
        $unit = "";
        $counter = 0;
        foreach ($this->data_found as $value) {
            $counter++;
            if ($value['supplyUnit'] != null || $value['supplyUnit'] != "") {
                $unit = '(' . $value['supplyUnit'] . ')';
            } else {
                $unit = '';
            }
            $this->suppliesUsageAndOutageSectionPDF.= '<tr>
			<td colspan="1" style="width:200px;">' . $value['supplyName'] . ' ' . $unit . ' </td>
			
			<td colspan="2">
			a. Once<input type="checkbox">
			b. 2-3<input type="checkbox">
			c. 4-5<input type="checkbox">
			d. more than 5<input type="checkbox">
			</td>
						
			<td style ="text-align:center;">
			<input name="usosWhatHappened_' . $counter . '[]" type="checkbox" value="1" class="cloned"/>
			</td>
			<td style ="text-align:center;">
			<input name="usosWhatHappened_' . $counter . '[]" type="checkbox" value="2" />
			</td>
			<td style ="text-align:center;">
			<input name="usosWhatHappened_' . $counter . '[]" type="checkbox" value="3" />
			</td>
			<td style ="text-align:center;">
			<input name="usosWhatHappened_' . $counter . '[]" type="checkbox" value="4" />
			</td>
			<td style ="text-align:center;">
			<input name="usosWhatHappened_' . $counter . '[]" type="checkbox" value="5" />
			</td>
			
			<input type="hidden"  name="usosSupplyCode_' . $counter . '" id="usosSupplyCode_' . $counter . '" value="' . $value['supplyCode'] . '" />
		</tr>';
        }
        
        //echo $this->suppliesUsageAndOutageSection;die;
        return $this->suppliesUsageAndOutageSectionPDF;
    }
    public function getSection($survey, $fac_mfl) {
        $this->db->select_max('ast_id', 'maxId');
        $result = $this->db->get_where('assessment_tracker', array('ast_survey' => $survey, 'facilityCode' => $fac_mfl));
        $result = $result->result_array();
        $maxId = $result[0]['maxId'];
        
        $this->db->select('ast_section');
        $result = $this->db->get_where('assessment_tracker', array('ast_id' => $maxId));
        $result = $result->result_array();
        
        //var_dump($result);die;
        $section = (($result) != NULL) ? $result[0]['ast_section'] : NULL;
        return json_encode((int)trim($section, 'section-'));
    }
    
    public function createFacilitiesListSection() {
        
        /*retrieve facility list*/
        $this->m_mnh_survey->getFacilitiesByDistrict($this->session->userdata('dName'));
        $counter = 0;
        $link = '';
        $surveyCompleteFlag = '';
        if (count($this->m_mnh_survey->districtFacilities) > 0) {
            
            //set session data
            $this->session->set_userdata(array('fCount' => count($this->m_mnh_survey->districtFacilities)));
            
            //print 'true'; die;
            foreach ($this->m_mnh_survey->districtFacilities as $value) {
                $counter++;
                $fac_mfl = $value['facMfl'];
                $survey = $this->session->userdata('survey');
                if ($survey == 'mnh') {
                    $total = 7;
                } else {
                    $total = 6;
                }
                $current = $this->getSection($survey, $fac_mfl);
                $progress = round(($current / $total) * 100);
                if ($progress == 0) {
                    $linkText = 'Begin Survey';
                    $linkClass = 'action';
                } elseif ($progress == 100) {
                    $linkText = 'Survey Completed';
                    $linkClass = 'no-action';
                } else {
                    $linkText = 'Continue Survey';
                    $linkClass = 'action';
                }
                
                $link = '<td><div class="progress">  <div class="bar" style="width: ' . $progress . '%;">' . $progress . ' %</div>	</div></td>';
                $link.= '<td colspan="5" id="facility_1" class="' . $linkClass . '"><a id="' . $value['facMfl'] . '" class="begin">' . $linkText . '</a></td>';
                
                $this->districtFacilityListSection.= '<tr> 
       	<td colspan="1">' . $counter . '</td>
			<td colspan="7" >' . $value['facMfl'] . '</td>
			<td colspan="4">' . $value['facName'] . '</td>
			
			' . $link . '
			</tr>';
            }
            
            //print 'fs: '.$this->districtFacilityListSection;die;
            
            
        } else {
            
            //print 'false'; die;
            $this->districtFacilityListSection.= '<tr><td colspan="22">No Facilities Found</td></tr>';
        }
    }
}
