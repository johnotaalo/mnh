<?php
## Extend CI_Model to include Doctrine Entity Manager

class  MY_Model  extends  CI_Model{

public $em, $response, $theForm,$district,$commodity,$supplier,$county,$province,$owner,$ownerName,$level,$levelName,$supplies,$equipment,$query,
$type,$formRecords,$facilityFound,$facility,$section,$ort,$sectionExists,$signalFunction,$mchIndicator,$mchIndicatorName,$mnhIndicator,$mchTreatment,$mchTreatmentName,
$ortAspect,$trainingGuidelines,$trainingGuideline,$commodityName,$districtFacilities,$fCode,$strategy,$strategyName,$guideline;

function __construct() {
		parent::__construct();

		/* Instantiate Doctrine's Entity manage so we don't have
		   to everytime we want to use Doctrine */

		$this->em = $this->doctrine->em;
		$this->load->database();
		$this->response='';
		$this->theForm=$this->fCode='';
		$this->facilityFound=false;
		$this->sectionExists=false;
	}

   /*utilized in several models*/
	public function getFacilityName($id){
		try{
			$this->centre=$this->em->getRepository('models\Entities\E_Facility')
			                       ->findOneBy( array('facilityMFC'=>$id));
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
			return $this->centre->getFacilityName();
	}
	
	/*utilized in several models*/
	public function getAllFacilitiesByDistrict($districtName){
		try{
			
			#Using DQL
								   
			$this->districtFacilities = $this->em->createQuery('SELECT f.facilityMFC,f.facilityName,f.facilitySurveyStatus,f.facilityCHSurveyStatus FROM models\Entities\e_facility f WHERE f.facilityDistrict= :district ORDER BY f.facilityName ASC ');
		    $this->districtFacilities->setParameter('district',$districtName);
          
            $this->districtFacilities = $this->districtFacilities->getArrayResult();
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
	}
	
	/*utilized in several models*/
	public function getAllGovernmentOwnedFacilitiesByDistrict($districtName){
		try{
			
			/*DQL					   
			$this->districtFacilities = $this->em->createQuery("SELECT f.facilityMFC,f.facilityName,f.facilitySurveyStatus FROM models\Entities\e_facility f WHERE f.facilityDistrict=: district AND f.facilityOwnedBy IN (: condition) ORDER BY f.facilityName ASC");
		    $this->districtFacilities->setParameter('district',$districtName);
			$this->districtFacilities->setParameter('condition','Ministry of Health,Local Authority,Local Authority T Fund');
          
            $this->districtFacilities = $this->districtFacilities->getArrayResult();*/
            
            /*Using CI*/
            $this->query="SELECT f.facilityMFC,f.facilityName,f.facilitySurveyStatus FROM facility f WHERE f.facilityDistrict='$districtName' 
            			  AND f.facilityOwnedBy IN ('Ministry of Health','Local Authority','Local Authority T Fund','Armed Forces','Community Development Fund','Community','Parastatal','State Corporation') ORDER BY f.facilityName ASC";
			 $this->districtFacilities = $this->db->query($this->query);
		     $this->districtFacilities=$this->districtFacilities->result_array();
			//die(var_dump($this->districtFacilities));
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
	}
	
	public function getAllFacilityNames(){
		$query = $this->em->createQuery('SELECT f.facilityName FROM models\Entities\e_facility f');
		  //$query->setParameter('fname','%'.$options['keyword'].'%');
          
          $this->formRecords = $query->getArrayResult();
		  
		 
      // die(var_dump($this->formRecords));
        return $this->formRecords;
	}
	

		public function getSpecificFacilityNames($mfc){
		$query = $this->em->createQuery('SELECT f.facilityName FROM models\Entities\e_facility f where f.facilityMFC='.$mfc);
		  //$query->setParameter('fname','%'.$options['keyword'].'%');
          
          $this->facility = $query->getArrayResult();
		  
		 
      // die(var_dump($this->formRecords));
        return $this->facility;
	}

	function getAllCommodityNames($surveyName){
		 /*using DQL*/
		 try{
	      $this->commodity = $this->em->createQuery('SELECT c.commodityID, c.commodityCode, c.commodityName, c.commodityUnit FROM models\Entities\e_commodity c WHERE c.commodityFor= :surveyName ORDER BY c.commodityID ASC');
          $this->commodity->setParameter('surveyName',$surveyName);
          $this->commodity = $this->commodity->getResult();
		 //die(var_dump($this->commodity));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();
		 }
		return $this->commodity;
	}/*end of getAllCommodityNames*/
	
	function getAllSuppliesNames($surveyName){
		 /*using DQL*/
		 try{
	      $this->supplies = $this->em->createQuery('SELECT s.suppliesID, s.suppliesCode, s.suppliesName, s.suppliesUnit FROM models\Entities\e_supplies s WHERE s.suppliesFor= :survey ORDER BY s.suppliesID ASC');
          $this->supplies->setParameter('survey',$surveyName);
          $this->supplies = $this->supplies->getResult();
		// die(var_dump($this->supplies));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();
		 }
		return $this->supplies;
	}/*end of getAllSuppliesNames*/
	
	function getAllEquipmentNames($surveyName){
		 /*using DQL*/
		 try{
	      $this->equipment= $this->em->createQuery('SELECT e.equipmentID, e.equipmentCode, e.equipmentName, e.equipmentUnit FROM models\Entities\e_equipment e WHERE e.equipmentFor= :survey ORDER BY e.equipmentID ASC');
          $this->equipment->setParameter('survey',$surveyName);
          $this->equipment = $this->equipment->getResult();
		 //die(var_dump($this->equipment));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();
		 }
		return $this->equipment;
	}/*end of getAllEquipmentNames*/
	
	function getAllCommoditySupplierNames($surveyName){
		 /*using DQL*/
		 try{
	      $this->supplier = $this->em->createQuery('SELECT s.supplierID, s.supplierCode, s.supplierName FROM models\Entities\e_supplier s WHERE s.supplierFor= :survey ORDER BY s.supplierCode ASC');
          $this->supplier->setParameter('survey',$surveyName);
		// echo $this->supplier->getSQL();die;
		  $this->supplier = $this->supplier->getResult();
		 
		 //die(var_dump($this->supplier));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();
		 }
		return $this->supplier;
	}/*end of getAllCommoditySupplierNames*/
	
	function getAllSignalFunctions(){
		 /*using DQL*/
		 try{
	      $query = $this->em->createQuery('SELECT s.signalCode, s.signalName FROM models\Entities\e_signal_function s ORDER BY s.signalCode ASC');
          $this->signalFunction = $query->getResult();
		 //die(var_dump($this->signalFunction));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();
		 }
		return $this->signalFunction;
	}/*end of getAllSignalFunctions*/
	
	function getAllOrtAspects($for){
		 /*using DQL*/
		 try{
	      $this->ortAspect= $this->em->createQuery('SELECT q.questionCode, q.mchQuestion FROM models\Entities\e_mch_questions q WHERE q.mchQuestionFor= :for ORDER BY q.questionCode ASC');
          $this->ortAspect->setParameter('for',$for);
          $this->ortAspect = $this->ortAspect->getResult();
		  
		 //die(var_dump($this->ortAspect));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();
		 }
		return $this->ortAspect;
	}/*end of getAllOrtAspects*/
	
	function getMNHQuestionsBySection($for){
		 /*using DQL*/
		 try{
	      $this->mnhIndicator= $this->em->createQuery('SELECT q.questionCode, q.mnhQuestion FROM models\Entities\e_mnh_questions q WHERE q.mnhQuestionFor= :for ORDER BY q.questionCode ASC');
          $this->mnhIndicator->setParameter('for',$for);
          $this->mnhIndicator = $this->mnhIndicator->getResult();
		  
		 //die(var_dump($this->mnhIndicator));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();
		 }
		return $this->mnhIndicator;
	}/*end of getAllOrtAspects*/
	
	function getAllMCHIndicators(){
		 /*using DQL*/
		 try{
	      $query = $this->em->createQuery('SELECT i.indicatorCode, i.indicatorName,i.indicatorFor FROM models\Entities\e_mch_indicators i ORDER BY i.indicatorCode ASC');
          $this->mchIndicator = $query->getResult();
		 //die(var_dump($this->mchIndicator));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();
		 }
		return $this->mchIndicator;
	}/*end of getAllMCHIndicators*/
	
	function getAllMCHTreatments(){
		 /*using DQL*/
		 try{
	      $query = $this->em->createQuery('SELECT t.treatmentCode, t.treatmentName,t.treatmentFor FROM models\Entities\e_mch_treatments t ORDER BY t.treatmentCode ASC');
          $this->mchTreatment = $query->getResult();
		 //die(var_dump($this->mchTreatment));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();
		 }
		return $this->mchTreatment;
	}/*end of getAllMCHTreatments*/
	
	function getAllTrainingGuidelines($surveyName){
		 /*using DQL*/
		 try{
	      $this->trainingGuidelines = $this->em->createQuery('SELECT g.guidelineCode, g.guidelineName FROM models\Entities\e_guideline g WHERE g.guidelineFor= :survey ORDER BY g.guidelineCode ASC');
          $this->trainingGuidelines->setParameter('survey',$surveyName);
		  $this->trainingGuidelines = $this->trainingGuidelines->getResult();
		 //die(var_dump($this->trainingGuidelines));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();
		 }
		return $this->trainingGuidelines;
	}/*end of getAllTrainingGuidelines*/


	function getAllDistrictNames(){
		 /*using DQL*/
		 try{
	      $query = $this->em->createQuery('SELECT d.districtID,d.districtName FROM models\Entities\e_district d ORDER BY d.districtName ASC');
          $this->district = $query->getResult();
		  //die(var_dump($this->district));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();
		 }
		return $this->district;
	}/*end of getDistrictNames*/

	function getAllCountyNames(){
		 /*using DQL*/
		 try{
	      $query = $this->em->createQuery('SELECT c.countyID,c.countyName FROM models\Entities\e_county c ORDER BY c.countyName ASC');
          $this->county = $query->getResult();
          }catch(exception $ex){
          	//$ex->getMessage();
          	
          }
		return $this->county;
	}/*end of getAllCountyNames*/

	function getAllProvinceNames(){
		 /*using DQL*/
		 try{
	      $query = $this->em->createQuery('SELECT p.provinceID, p.provinceName FROM models\Entities\e_province p ORDER BY p.provinceName ASC');
          $this->province = $query->getResult();
		  //die(var_dump($this->level));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();//exit;
		 }
		return $this->province;
	}/*end of getAllProvinceNames*/

	function getAllFacilityOwnerNames(){
		 /*using DQL*/
		 try{
	      $query = $this->em->createQuery('SELECT o.facilityOwnerID, o.facilityOwner FROM models\Entities\e_facility_owner o ORDER BY o.facilityOwner ASC');
          $this->owner = $query->getResult();
		  //die(var_dump($this->level));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();//exit;
		 }
		return $this->owner;
	}/*end of getAllFacilityOwnerNames*/
	
	function getAllGovernmentOwnedNames(){
		 /*using CI Database Active Record*/
		 try{
	     /* $query = $this->em->createQuery('SELECT t.facilityTypeID,t.facilityType FROM models\Entities\e_facility_type t 
	      			WHERE t.facilityType IN (Ministry of Health,Local Authority,Local Authority T Fund) ORDER BY t.facilityType ASC');*/
	      if($this->session->userdata('survey')=='ch'){
			$query = "SELECT o.facilityOwnerID,o.facilityOwner FROM facility_owner o WHERE o.facilityOwner IN ('Ministry of Health','Local Authority','Local Authority T Fund','Armed Forces','Community Development Fund','Community','Parastatal','State Corporation') OR o.facilityOwnerFor='mch' ORDER BY o.facilityOwner ASC";
	      }else{
	      	$query = "SELECT o.facilityOwnerID,o.facilityOwner FROM facility_owner o WHERE o.facilityOwner IN ('Ministry of Health','Local Authority','Local Authority T Fund','Armed Forces','Community Development Fund','Community','Parastatal','State Corporation') ORDER BY o.facilityOwner ASC";
	      }
	      
          $this->owner = $this->db->query($query);
		  $this->owner=$this->owner->result_array();
		 // die(var_dump($this->owner));
		 }catch(exception $ex){
		 	//ignore
		 	//die($ex->getMessage());//exit;
		 }
		return $this->owner;
	}/*end of getAllGovernmentOwnedNames*/

	function getAllFacilityTypes(){
		 /*using DQL*/
		 try{
	      $query = $this->em->createQuery('SELECT t.facilityTypeID,t.facilityType FROM models\Entities\e_facility_type t ORDER BY t.facilityType ASC');
          $this->type = $query->getResult();
		  //die(var_dump($this->type));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();//exit;
		 }
		return $this->type;
	}/*end of getAllFacilityTypes*/
	
	function getAllGovernmentFacilityTypes(){
		
		
		 /*using CI Database Active Record*/
		 try{
	     /* $query = $this->em->createQuery('SELECT t.facilityTypeID,t.facilityType FROM models\Entities\e_facility_type t 
	      			WHERE t.facilityType IN (Ministry of Health,Local Authority,Local Authority T Fund) ORDER BY t.facilityType ASC');*/
	       $query = "SELECT DISTINCT(f.facilityType),t.facilityTypeID FROM facility f,facility_type t WHERE f.facilityOwnedBy IN ('Ministry of Health','Local Authority','Local Authority T Fund','Armed Forces','Community Development Fund','Community','Parastatal','State Corporation') AND t.facilityType=f.facilityType ORDER BY f.facilityType ASC";
          $this->type = $this->db->query($query);
		$this->type=$this->type->result_array();
		  //die(var_dump($this->type));
		 }catch(exception $ex){
		 	//ignore
		 	//die($ex->getMessage());//exit;
		 }
		return $this->type;
	}/*end of getAllGovernmentFacilityTypes*/

	function getAllFacilityLevels(){
		 /*using DQL*/
		 try{
	      $query = $this->em->createQuery('SELECT l.facilityLevelID,l.facilityLevel FROM models\Entities\e_facility_level l ORDER BY l.facilityLevel ASC');
          $this->level = $query->getResult();
		  //die(var_dump($this->level));
		 }catch(exception $ex){
		 	//ignore
		 	$ex->getMessage();//exit;
		 }
		return $this->level;
	}/*end of getAllFacilityLevels*/


	/*utilized in several models*/
	public function getDistrictName($id){
		try{
			$this->district=$this->em->getRepository('models\Entities\E_District')
			                       ->findOneBy( array('districtID'=>$id));
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
	}//end of getDistrictName


	/*utilized in several models*/
	public function getCountyName($id){
		try{
			$this->county=$this->em->getRepository('models\Entities\E_County')
			                       ->findOneBy( array('countyID'=>$id));
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
	}
	
	/*utilized in several models*/
	public function getCommunityStrategyName($id){
		try{
			$this->strategy=$this->em->getRepository('models\Entities\e_mch_questions')
			                       ->findOneBy( array('questionCode'=>$id));
								   
			if($this->strategy){
					$this->strategyName=$this->strategy->getMCHQuestion();
					return $this->strategyName;
				}
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
	}
	
	/*utilized in several models*/
	public function getTrainingGuidelineName($id){
		try{
			$this->guideline=$this->em->getRepository('models\Entities\e_mch_questions')
			                       ->findOneBy( array('questionCode'=>$id));
								   
			if($this->guideline){
					$this->guideline=$this->guideline->getMCHQuestion();
					return $this->guideline;
				}
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
	}
	
	/*utilized in several models*/
	public function getChildHealthIndicatorName($id){
		try{
			$this->mchIndicatorName=$this->em->getRepository('models\Entities\e_mch_indicators')
			                       ->findOneBy( array('indicatorCode'=>$id));
								   
			if($this->mchIndicatorName){
					$this->mchIndicatorName=$this->mchIndicatorName->getIndicatorName();
					return $this->mchIndicatorName;
				}
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
	}
	
	
	/*utilized in several models*/
	public function getChildHealthTreatmentName($id){
		try{
			$this->mchTreatmentName=$this->em->getRepository('models\Entities\e_mch_treatments')
			                       ->findOneBy( array('treatmentCode'=>$id));
								   
			if($this->mchTreatmentName){
					$this->mchTreatmentName=$this->mchTreatmentName->getTreatmentName();
					return $this->mchTreatmentName;
				}
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
	}
	

	/*utilized in several models*/
	public function getLevelName($id){
		try{
			$this->level=$this->em->getRepository('models\Entities\e_facility_level')
			                       ->findOneBy( array('facilityLevelID'=>$id));
								   
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
	}
	
	/*utilized in several models*/
	public function getLevelNameById($id){
		try{
			$this->level=$this->em->getRepository('models\Entities\e_facility_level')
			                       ->findOneBy( array('facilityLevelID'=>$id));
				if($this->level){
					$this->levelName=$this->level->getfacilityLevel();
					return $this->levelName;
				}
								   
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
	}
	
	/*utilized in several models*/
	public function getStaffTrainingGuidelineById($id){
		try{
			$this->trainingGuideline=$this->em->getRepository('models\Entities\e_guideline')
			                       ->findOneBy( array('guidelineCode'=>$id));
				if($this->trainingGuideline){
					$this->trainingGuideline=$this->trainingGuideline->getGuidelineName();
					return $this->trainingGuideline;
				}
								   
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
	}
	
	/*utilized in several models*/
	public function getCommodityNameById($id){
		try{
			$this->commodityName=$this->em->getRepository('models\Entities\e_commodity')
			                       ->findOneBy( array('commodityCode'=>$id));
				if($this->commodityName){
					$this->commodityName=$this->commodityName->getCommodityName();
					return $this->commodityName;
				}
								   
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
	}
	
	/*utilized in several models*/
	public function getFacilityOwnerNameById($id){
		try{
			$this->ownerName=$this->em->getRepository('models\Entities\e_facility_owner')
			                       ->findOneBy( array('facilityOwnerID'=>$id));
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
	}

	/*utilized in several models*/
	public function getProvinceName($id){
		try{
			$this->province=$this->em->getRepository('models\Entities\e_province')
			                       ->findOneBy( array('provinceID'=>$id));
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
	}

	//check if facility name exists
   public function facilityExists($mfc){
	     try{
			$this->facility=$this->em->getRepository('models\Entities\E_Facility')
			                       ->findOneBy( array('facilityName'=>$mfc));
			if($this->facility){
			$this->facilityFound=true;
			}
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
			return $this->facility;

	}/*close facilityExists($mfc)*/

	//check if tracker entry has already been done
   public function sectionEntryExists($mfc,$section,$survey){
	     try{
			$this->section=$this->em->getRepository('models\Entities\e_assessment_tracker')
			                       ->findOneBy( array('facilityCode'=>$mfc,'trackerSection'=>$section,'survey'=>$survey));
			if($this->section){
				$this->sectionExists=true;
			}
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
			return $this->section;

	}/*close sectionEntryExists($mfc,$section,$survey)*/
	
	//used in m_zinc_ors_inventory
   public function findOrtCodeByFacility($mfc){
	     try{
			$this->ort=$this->em->getRepository('models\Entities\e_ortc_assessment')
			                       ->findOneBy( array('facilityMFC'=>$mfc));
			return $this->ort;
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
				return false;
			}
			

	}/*close findOrtCodeByFacility($mfc)*/


	//checks if commodity name exists
	 public function commodityExists($cName){
	     try{
			$this->commodity=$this->em->getRepository('models\Entities\E_Commodity')
			                       ->findOneBy( array('commodityName'=>$cName));
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
			return $this->commodity;

	}/*close commodityExists($cName)*/

	/*update the MFL data*/
	protected function updateFacilityInfo(){
		
		   //pick facility name and code for temp session use
          if($this->input->post() && $this->input->post('facilityHName',TRUE)){
          	//print $this -> session -> userdata('fCode'); die;
			if(!$this -> session -> userdata('fCode')){
		     $new_data=array('fName'=>$this->input->post('facilityHName',TRUE),'fCode'=>$this->input->post('facilityMFLCode',TRUE));
		     $this->session->set_userdata($new_data);
			}
		  
		   }
		  
	       //analyse all posted vals and collect them
			foreach ($this -> input -> post() as $key => $val) {//For every posted values
           
		   if(strpos($key,'fac')!==FALSE){//get the fields carrying facility info only
		   
			     $this->attr = $key;//the attribute name
			     
			     //stringify any array value
					if(is_array($val)){
			     	    $val=implode(',',$val);
					}
			     
				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					// $this->elements[$this->id][$this->attr]=htmlentities($val);
					$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   	$this->elements[$this->attr]='';
				   }
             // print $this->attr.' val='.$val.' id='.$this->id.' <br />';
			 }//end of cadre fields only-filter

			// print $key.' val='.$val.' <br />';

			 }//close foreach ($this -> input -> post() as $key => $val)

			//print var_dump($this->elements);
			//exit;

			//check if facility exists
			//$this->facility=$this->facilityExists($this -> session -> userdata('fName'));

			//print var_dump($this->facility);

		   //get county name,district name,level name by id
			//$this->getCountyName($this->input->post('facilityCounty'));/*method defined in MY_Model*/
			//$this->getDistrictName($this->input->post('facilityDistrict'));/*method defined in MY_Model*/
			
			$this->getLevelName($this->input->post('facilityLevel',TRUE));/*method defined in MY_Model*/
			
			//get owner name by id passed
			$this->getFacilityOwnerNameById($this->input->post('facilityOwnedBy',TRUE));
			
			//$this->getProvinceName($this->input->post('facilityProvince'));/*method defined in MY_Model*/

				//insert facility if new, else update the existing one
			/*	if(!$this->facility){
					//die('New entry, enter new one');
			   $this -> theForm = new \models\Entities\E_Facility(); //create an object of the model
			   $this -> theForm -> setCreatedAt(new DateTime()); //timestamp option
			   $this -> theForm -> setFacilityName($this->input->post('facilityName',TRUE));
			   $this -> theForm -> setFacilityMFC($this -> session -> userdata('fCode'));//obtain facility code from current session
				}else{*/
				//$this -> theForm = new \models\Entities\E_Facility(); //create an object of the model
				//die('Duplicate entry, so update');
				
			//  echo 'Name: '. $this -> session -> userdata('fName');die;
				try{
					$this -> theForm=$this->em->getRepository('models\Entities\E_Facility')
					                       ->findOneBy( array('facilityName'=>$this->input->post('facilityHName',TRUE),'facilityMFC'=>$this -> session -> userdata('fCode')));
					}catch(exception $ex){
						//ignore
						//die($ex->getMessage());
						return false;
					}	
				//}


				$this -> theForm -> setUpdatedAt(new DateTime()); /*timestamp option*/

				//$this -> theForm -> setFacilityDistrict($this->district->getDistrictName());
				$this -> theForm -> setFacilityLevel($this->input->post('facilityLevel',TRUE));
				$this -> theForm -> setFacilityOwnedBy($this->ownerName->getFacilityOwner());
				//$this -> theForm -> setFacilityProvince($this->province->getProvinceName());
				//$this -> theForm -> setFacilityCounty($this->county->getCountyName());
				$this -> theForm -> setFacilityInchargeContactPerson($this->input->post('facilityInchargename',TRUE));
				($this->input->post('facilityInchargemobile',TRUE) !='')?$this -> theForm -> setFacilityInchargeTelephone($this->input->post('facilityInchargemobile',TRUE)):'n/a';	

				$this -> theForm -> setFacilityInchargeEmail($this->input->post('facilityInchargeemail',TRUE));

				($this->elements['facilityMchname']=='')?  $this -> theForm -> setFacilityMCHContactPerson('n/a'):$this -> theForm -> setFacilityMCHContactPerson($this->input->post('facilityMchname',TRUE));
				($this->input->post('facilityMchmobile',TRUE) !='')?$this -> theForm -> setFacilityMCHTelephone($this->input->post('facilityMchmobile',TRUE)):'n/a';	

				($this->elements['facilityMchemail']=='')?$this -> theForm -> setFacilityMCHEmail('n/a'):$this -> theForm -> setFacilityMCHEmail($this->input->post('facilityMchemail',TRUE));

               //facility data specific to mnh survey only
               if($this -> session -> userdata('survey')=='mnh'){
               //	print 'yes,true'; die;
               	(isset($this->elements['facilityMaternityname']) && $this->elements['facilityMaternityname']!='')?$this -> theForm -> setFacilityMaternityContactPerson($this->input->post('facilityMaternityname',TRUE)):$this -> theForm -> setFacilityMaternityContactPerson('n/a');
				(isset($this->elements['facilityMaternitymobile']) && $this->elements['facilityMaternitymobile']!='')?$this -> theForm -> setFacilityMaternityTelephone($this->input->post('facilityMaternitymobile',TRUE)):'n/a';
				(isset($this->elements['facilityMaternityemail']) && $this->elements['facilityMaternityemail']!='' )?$this -> theForm -> setFacilityMaternityEmail($this->input->post('facilityMaternityemail',TRUE)):$this -> theForm -> setFacilityMaternityEmail('n/a');
				
				
				if($this->elements['facDeliveriesDone']=='No'){
					(isset($this->elements['facRsnNoDeliveries']) )?$this -> theForm -> setReasonDeliveryNotDone($this->elements['facRsnNoDeliveries']):$this -> theForm -> setReasonDeliveryNotDone('n/a');
					$this -> theForm -> setFacilitySurveyStatus('complete');
				}else{
					$this -> theForm -> setReasonDeliveryNotDone('n/a');
				}
				
				$this -> theForm -> setDeliveriesDone($this->elements['facDeliveriesDone']);
               } //close if statement
				
				
				$this -> em -> persist($this -> theForm);
                
				try{

				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				return true;
				//print 'true';
				}catch(Exception $ex){
				    //die($ex->getMessage());
				    //print 'false';
				    return false;
					/*display user friendly message*/

				}//end of catch


	} //close updateFacilityInfo

	//assuming mnh/mch assessment is taken, every facility has exactly 6 and 7 entries respectively, for each active survey
	protected function writeAssessmentTrackerLog(){
		    //check if entry exists
			$this->section=$this->sectionEntryExists($this->session->userdata('fCode'),$this->input->post('step_name',TRUE),$this->session->userdata('survey'));

			//print var_dump($this->section);

				//insert log entry if new, else update the existing one
				if($this->sectionExists==false){
					//die('New entry, enter new one');
			   $this -> theForm = new \models\Entities\e_assessment_tracker(); //create an object of the model
			   $this -> theForm -> setTrackerSection($this->input->post('step_name',TRUE));
			   $this -> theForm -> setSurvey($this->session->userdata('survey'));//obtain facility code from current survey session val
			   $this -> theForm -> setLastActivity(new DateTime()); /*timestamp option*/
			   $this -> theForm -> setFacilityCode($this->session->userdata('fCode'));//obtain facility code from current temp session val
				}else{
                 // die('Update log');
				try{
					$this -> theForm=$this->em->getRepository('models\Entities\e_assessment_tracker')
					                       ->findOneBy( array('facilityCode'=>$this->session->userdata('fCode'),'trackerSection'=>$this->input->post('step_name',TRUE),'survey'=>$this->session->userdata('survey')));

				}catch(exception $ex){
						//ignore
						//die($ex->getMessage());
					}	
				}

			 	$this -> theForm -> setLastActivity(new DateTime()); /*timestamp option*/	

				$this -> em -> persist($this -> theForm);
                
				try{

				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				//print 'true';
				}catch(Exception $ex){
				   // die($ex->getMessage());
				    //print 'false';
					/*display user friendly message*/

				}//end of catch

        	

					
	}

   protected function markSurveyStatusAsComplete(){
				try{
					$this -> theForm=$this->em->getRepository('models\Entities\e_facility')
					                       ->findOneBy( array('facilityMFC'=>$this->session->userdata('fCode')));

				}catch(exception $ex){
						//ignore
						//die($ex->getMessage());
					}	
				

               if($this -> session -> userdata('survey')=='mnh'){
			   $this -> theForm -> setFacilitySurveyStatus('complete');
               }else{
               	$this -> theForm -> setFacilityCHSurveyStatus('complete');
               }
			 	

				$this -> em -> persist($this -> theForm);
                
				try{

				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				//print 'true';
				}catch(Exception $ex){
				   //die($ex->getMessage());
				    //print 'false';
					/*display user friendly message*/

				}//end of catch

        	

					
	}


}