<?php
## Extend CI_Model to include Doctrine Entity Manager

class  MY_Model  extends  CI_Model{

public $em, $response, $theForm,$district,$commodity,$supplier,$county,$province,$owner,$level,$supplies,$equipment,
$type,$formRecords,$facilityFound,$facility,$section,$ort,$sectionExists,$signalFunction,$trainingGuidelines;

function __construct() {
		parent::__construct();

		/* Instantiate Doctrine's Entity manage so we don't have
		   to everytime we want to use Doctrine */

		$this->em = $this->doctrine->em;
		$this->response='';
		$this->theForm='';
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
	}
	
	public function getAllFacilityNames(){
		$query = $this->em->createQuery('SELECT f.facilityName FROM models\Entities\e_facility f');
		  //$query->setParameter('fname','%'.$options['keyword'].'%');
          
          $this->formRecords = $query->getArrayResult();
		  
		 
      // die(var_dump($this->formRecords));
        return $this->formRecords;
	}
	
	function getAllCommodityNames(){
		 /*using DQL*/
		 try{
	      $query = $this->em->createQuery('SELECT c.commodityID, c.commodityCode, c.commodityName, c.commodityUnit FROM models\Entities\e_commodity c ORDER BY c.commodityID ASC');
          $this->commodity = $query->getResult();
		 //die(var_dump($this->commodity));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();
		 }
		return $this->commodity;
	}/*end of getAllCommodityNames*/
	
	function getAllSuppliesNames(){
		 /*using DQL*/
		 try{
	      $query = $this->em->createQuery('SELECT s.suppliesID, s.suppliesCode, s.suppliesName, s.suppliesUnit FROM models\Entities\e_supplies s ORDER BY s.suppliesID ASC');
          $this->supplies = $query->getResult();
		// die(var_dump($this->supplies));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();
		 }
		return $this->supplies;
	}/*end of getAllSuppliesNames*/
	
	function getAllEquipmentNames(){
		 /*using DQL*/
		 try{
	      $query = $this->em->createQuery('SELECT e.equipmentID, e.equipmentCode, e.equipmentName, e.equipmentUnit FROM models\Entities\e_equipment e ORDER BY e.equipmentID ASC');
          $this->equipment = $query->getResult();
		 //die(var_dump($this->equipment));
		 }catch(exception $ex){
		 	//ignore
		 	//$ex->getMessage();
		 }
		return $this->equipment;
	}/*end of getAllEquipmentNames*/
	
	function getAllCommoditySupplierNames(){
		 /*using DQL*/
		 try{
	      $query = $this->em->createQuery('SELECT s.supplierID, s.supplierCode, s.supplierName FROM models\Entities\e_supplier s ORDER BY s.supplierCode ASC');
          $this->supplier = $query->getResult();
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
	
	function getAllTrainingGuidelines(){
		 /*using DQL*/
		 try{
	      $query = $this->em->createQuery('SELECT g.guidelineCode, g.guidelineName FROM models\Entities\e_guideline g ORDER BY g.guidelineCode ASC');
          $this->trainingGuidelines = $query->getResult();
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
   public function sectionEntryExists($mfc,$section){
	     try{
			$this->section=$this->em->getRepository('models\Entities\e_assessment_tracker')
			                       ->findOneBy( array('facilityCode'=>$mfc,'trackerSection'=>$section));
			if($this->section){
				$this->sectionExists=true;
			}
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
			return $this->section;

	}/*close sectionEntryExists($mfc,$section)*/
	
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
			foreach ($this -> input -> post() as $key => $val) {//For every posted values


		   if(strpos($key,'fac')!==FALSE){//get the fields carrying cadre info only
			     $this->attr = $key;//the attribute name
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
			$this->facility=$this->facilityExists($this -> session -> userdata('fName'));

			//print var_dump($this->facility);

		   //get county name,district name,level name by id
			//$this->getCountyName($this->input->post('facilityCounty'));/*method defined in MY_Model*/
			//$this->getDistrictName($this->input->post('facilityDistrict'));/*method defined in MY_Model*/
			//$this->getLevelName($this->input->post('facilityLevel'));/*method defined in MY_Model*/
			//$this->getProvinceName($this->input->post('facilityProvince'));/*method defined in MY_Model*/

		    //get the highest value of the array that will control the number of inserts to be done
						$this->noOfInsertsBatch=1; /*only 1 facility record is expected*/

						// print "max rows: ".$this->noOfInsertsBatch; exit;
						 for($i=1; $i<=$this->noOfInsertsBatch;++$i){

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
				try{
					$this -> theForm=$this->em->getRepository('models\Entities\E_Facility')
					                       ->findOneBy( array('facilityName'=>$this -> session -> userdata('fName')));
					}catch(exception $ex){
						//ignore
						//die($ex->getMessage());
						return false;
					}	
				//}


				$this -> theForm -> setUpdatedAt(new DateTime()); /*timestamp option*/

				//$this -> theForm -> setFacilityDistrict($this->district->getDistrictName());
				//$this -> theForm -> setFacilityLevel($this->level->getFacilityLevel());
				//$this -> theForm -> setFacilityProvince($this->province->getProvinceName());
				//$this -> theForm -> setFacilityCounty($this->county->getCountyName());
				$this -> theForm -> setFacilityInchargeContactPerson($this->input->post('facilityInchargename',TRUE));
				($this->input->post('facilityInchargemobile',TRUE) !='')?$this -> theForm -> setFacilityInchargeTelephone($this->input->post('facilityInchargemobile',TRUE)):'n/a';	

				$this -> theForm -> setFacilityInchargeEmail($this->input->post('facilityInchargeemail',TRUE));

				($this->elements['facilityMchname']=='')?  $this -> theForm -> setFacilityMCHContactPerson('n/a'):$this -> theForm -> setFacilityMCHContactPerson($this->input->post('facilityMchname',TRUE));
				($this->input->post('facilityMchmobile',TRUE) !='')?$this -> theForm -> setFacilityMCHTelephone($this->input->post('facilityMchmobile',TRUE)):'n/a';	

				($this->elements['facilityMchemail']=='')?$this -> theForm -> setFacilityMCHEmail('n/a'):$this -> theForm -> setFacilityMCHEmail($this->input->post('facilityMchemail',TRUE));

				(isset($this->elements['facilityMaternityname']) && $this->elements['facilityMaternityname']!='')?$this -> theForm -> setFacilityMaternityContactPerson($this->input->post('facilityMaternityname',TRUE)):$this -> theForm -> setFacilityMaternityContactPerson('n/a');
				(isset($this->elements['facilityMaternitymobile']) && $this->elements['facilityMaternitymobile']!='')?$this -> theForm -> setFacilityMaternityTelephone($this->input->post('facilityMaternitymobile',TRUE)):'n/a';
				(isset($this->elements['facilityMaternityemail']) && $this->elements['facilityMaternityemail']!='' )?$this -> theForm -> setFacilityMaternityEmail($this->input->post('facilityMaternityemail',TRUE)):$this -> theForm -> setFacilityMaternityEmail('n/a');
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

        	

					 } //end of innner loop

	} //close updateFacilityInfo



}