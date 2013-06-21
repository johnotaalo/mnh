<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *model to persist data for mnh form
 */
 


class M_MNH_Survey  extends MY_Model {
	var $id, $attr, $frags, $elements, $noOfInserts, $batchSize,$mfcCode,$suppliesList,
	$facility,$commodity, $isFacility,$commodityList,$supplierList,$signalFunctionList,$trainingGuidelinesList,$facilityList,$countyList,$districtList,
	$facilityOwnerList,$facilityLevelList,$facilityTypeList,$isDistrict;
	
	

	function __construct() {
		parent::__construct();
		$this->isFacility='false';
		$this->isDistrict='false';
		$this->commodityList=$this->countyList=$this->facilityTypeList=$this->districtList=$this->facilityLevelList=$this->facilityOwnerList=$this->signalFunctionList=$this->supplierList=$this->trainingGuidelinesList=$this->suppliesList='';
		
	}
	
	/*calls the query defined in MY_Model*/
	public function getCommodityNames(){
    	$this->commodityList=$this->getAllCommodityNames();
		//var_dump($this->commodityList);die;
		return $this->commodityList;
    }
	
	public function getEquipmentNames(){
    	$this->equipmentList=$this->getAllEquipmentNames();
		//var_dump($this->equipmentList);die;
		return $this->equipmentList;
    }
	
	public function getSuppliesNames(){
    	$this->suppliesList=$this->getAllSuppliesNames();
		//var_dump($this->suppliesList);die;
		return $this->suppliesList;
    }
	
	/*calls the query defined in MY_Model*/
	public function getCommoditySupplierNames(){
    	$this->supplierList=$this->getAllCommoditySupplierNames();
		//var_dump($this->supplierList);die;
		return $this->supplierList;
    }
	
	/*calls the query defined in MY_Model*/
	public function getSignalFunctions(){
    	$this->signalFunctionList=$this->getAllSignalFunctions();
		//var_dump($this->signalFunctionList);die;
		return $this->signalFunctionList;
    }
	
	/*calls the query defined in MY_Model*/
	public function getTrainingGuidelines(){
    	$this->trainingGuidelinesList=$this->getAllTrainingGuidelines();
		//var_dump($this->trainingGuidelinesList);die;
		return $this->trainingGuidelinesList;
    }
	
	public function getFacilityNames(){
		$this->facilityList=$this->getAllFacilityNames();
		//var_dump($this->facilityList);die;
		return $this->facilityList;
	}
	
	public function getCountyNames(){
		$this->countyList=$this->getAllCountyNames();
		//var_dump($this->countyList);die;
		return $this->countyList;
	}
	
	public function getDistrictNames(){
		$this->districtList=$this->getAllDistrictNames();
		//var_dump($this->districtList);die;
		return $this->districtList;
	}
	
	public function getFacilityOwnerNames(){
		$this->facilityOwnerList=$this->getAllFacilityOwnerNames();
		//var_dump($this->facilityOwnerList);die;
		return $this->facilityOwnerList;
	}
	
	public function getFacilityLevelNames(){
		$this->facilityLevelList=$this->getAllFacilityLevels();
		//var_dump($this->facilityLevelList);die;
		return $this->facilityLevelList;
	}
	
	public function getFacilityTypeNames(){
		$this->facilityTypeList=$this->getAllGovernmentFacilityTypes();
		//var_dump($this->facilityTypeList);die;
		return $this->facilityTypeList;
	}
	
	public function verifyRespondedByDistrict(){
		if ($this -> input -> post()) {//check if a post was made
		
		//die(var_dump($this->input->post()));

       //Working with an object of the entity
       try{
		$this->district = $this->em->getRepository('models\Entities\e_district')->findOneBy(array('districtID' => $this -> input -> post('username',TRUE),'districtAccessCode' => md5($this -> input -> post('usercode',TRUE))));

	    if($this->district){
			return $this->isDistrict='true';
	    }else{
	    	return $this->isDistrict='false';
	    }
		}catch(exception $ex){
			//ignore
				//die($ex->getMessage());
		}
		
	
	
		
		

	}//close the this->input->post
	}/*close verifyRespondedByDistrict*/
	
	 public function getFacilitiesByDistrict($district){
			//$this->getAllGovernmentOwnedFacilitiesByDistrict($district);
			$this->getAllFacilitiesByDistrict($district);
			
			//echo count($this->districtFacilities);die;
			
		}
	 
	 
	 /*retrieve facility mfl info*/
	function retrieveFacilityInfo($mfc){
	      /*using DQL*/
	      try{
	      //geting server side param: $store=$this->uri->segment(param_position_from_base_url);
	      $query = $this->em->createQuery('SELECT f FROM models\Entities\e_facility f WHERE f.facilityMFC = :fcode');
		  $query->setParameter('fcode',$mfc);
          
          $this->formRecords = $query->getArrayResult();

		  if(max($this->formRecords) !=0)
		  $this->response=array('rData'=>$this->formRecords);
		 //json format
		 $this->formRecords= json_encode($this->response);
		 // var_dump($this->formRecords);

		  }catch(exception $ex){
		  	//ignore
		    //die($ex->getMessage());
		  	return false;
		  }

		   return true;

	}/*close retrieveFacilityInfo($mfc)*/

	function addRecord() {
        $s=microtime(true); /*mark the timestamp at the beginning of the transaction*/
		 
		 $this->elements = array();
		 $this->theIds=array();
		 
		
		if ($this -> input -> post()) {//check if a post was made
		
		#just a thought..thread this for performance...??
		
	    $this->updateFacilityInfo();
		$this->addDeliveryByMonthInfo();
		$this->addBemoncSignalFunctionsInfo();
		$this->addCommodityQuantityAvailabilityInfo();
		$this->addGuidelinesStaffInfo();
		$this->addCommodityUsageAndStockOutageInfo();
			
			//exit;
			
			}//close the this->input->post
			$e=microtime(true);
			$this->executionTime=round($e-$s,'4');
	        $this->rowsInserted=$this->noOfInsertsBatch;
			return $this -> response = 'ok';
	} //end of addRecord()
 
   private function addDeliveryByMonthInfo(){
		
		    foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(strpos($key,'dn')!==FALSE){//select data for number of deliveries
			     $this->attr = $key;//the attribute name
			     
			     //split into 2 years: 2012 & 2013 --for later :-)
			     
				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					// $this->elements[$this->id][$this->attr]=htmlentities($val);
					
					$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   	$this->elements[$this->attr]='';
				   }
				   //print $key.' val='.$val.' <br />';
			 }
			
			 }//close foreach ($this -> input -> post() as $key => $val)
			 
			//exit;
				
		        //get the highest value of the array that will control the number of inserts to be done
				$this->noOfInsertsBatch=1; //labour and delivery Qn5 to 8 will have a single response each
						 
						 
				for($i=1; $i<=$this->noOfInsertsBatch;++$i){
			 	
				//insert facility if new, else update the existing one
			   $this -> theForm = new \models\Entities\E_Deliveries_No_Log; //create an object of the model
		      
			 	
				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> theForm -> setFacilityID($this -> session -> userdata('fCode'));
				/*if no value set, then set to -1*/
				($this->elements['dnjanuary_12']=='')?$this -> theForm -> setJan12(-1):$this -> theForm -> setJan12($this->elements['dnjanuary_12']);
				($this->elements['dnfebruary_12']=='')?$this -> theForm -> setFeb12(-1):$this -> theForm -> setFeb12($this->elements['dnfebruary_12']);
				($this->elements['dnmarch_12']=='')?$this -> theForm -> setMar12(-1):$this -> theForm -> setMar12($this->elements['dnmarch_12']);
				($this->elements['dnapril_12']=='')?$this -> theForm -> setApr12(-1):$this -> theForm -> setApr12($this->elements['dnapril_12']);
				($this->elements['dnmay_12']=='')?$this -> theForm -> setMay12(-1):$this -> theForm -> setMay12($this->elements['dnmay_12']);
				($this->elements['dnjune_12']=='')?$this -> theForm -> setJun12(-1):$this -> theForm -> setJun12($this->elements['dnjune_12']);
				($this->elements['dnjuly_12']=='')?$this -> theForm -> setJul12(-1):$this -> theForm -> setJul12($this->elements['dnjuly_12']);
				($this->elements['dnaugust_12']=='')?$this -> theForm -> setAug12(-1):$this -> theForm -> setAug12($this->elements['dnaugust_12']);
				($this->elements['dnseptember_12']=='')?$this -> theForm -> setSep12(-1):$this -> theForm -> setSep12($this->elements['dnseptember_12']);
				($this->elements['dnoctober_12']=='')?$this -> theForm -> setOct12(-1):$this -> theForm -> setOct12($this->elements['dnoctober_12']);
				($this->elements['dnnovember_12']=='')?$this -> theForm -> setNov12(-1):$this -> theForm -> setNov12($this->elements['dnnovember_12']);
				($this->elements['dndecember_12']=='')?$this -> theForm -> setDec12(-1):$this -> theForm -> setDec12($this->elements['dndecember_12']); 
				($this->elements['dnjanuary_13']=='')?$this -> theForm -> setJan13(-1):$this -> theForm -> setJan13($this->elements['dnjanuary_13']);
				($this->elements['dnfebruary_13']=='')?$this -> theForm -> setFeb13(-1):$this -> theForm -> setFeb13($this->elements['dnfebruary_13']);
				($this->elements['dnmarch_13']=='')?$this -> theForm -> setMar13(-1):$this -> theForm -> setMar13($this->elements['dnmarch_13']);
				($this->elements['dnapril_13']=='')?$this -> theForm -> setApr13(-1):$this -> theForm -> setApr13($this->elements['dnapril_13']);
				($this->elements['dnmay_13']=='')?$this -> theForm -> setMay13(-1):$this -> theForm -> setMay13($this->elements['dnmay_13']);
				($this->elements['dnjune_13']=='')?$this -> theForm -> setJun13(-1):$this -> theForm -> setJun13($this->elements['dnjune_13']);
				
				//$this -> theForm -> setDateOfAssessment(new DateTime()); //date set today's
				$this -> em -> persist($this -> theForm);
						
			try{//now do a batched insert
					
				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				return true;
				}catch(Exception $ex){
				    //die($ex->getMessage());
					return false;
					/*display user friendly message*/
					
				}//end of catch
				
			
					 } //end of innner loop	
	}//close addDeliveryByMonthInfo()
   
   private function addBemoncSignalFunctionsInfo(){
		$count=$finalCount=1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(strpos($key,'bmsf')!==FALSE){//select data for bemonc signal functions
			   //we separate the attribute name from the number
					
				  $this->frags = explode("_", $key);
				   
				  //$this->id = $this->frags[1];  // the id
				
				 $this->id = $count;  // the id
				    
				   $this->attr = $this->frags[0];//the attribute name
				 
				
				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';
				
				     //mark the end of 1 row...for record count
				if($this->attr=="bmsfSignalCode"){
					// print 'count at:'.$count.'<br />';
					
					$finalCount=$count;
					 $count++;
					// print 'count at:'.$count.'<br />';
					 //print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}
				  
				  //collect key and value to an array
				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					 $this->elements[$this->id][$this->attr]=htmlentities($val);
					
					//$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   $this->elements[$this->id][$this->attr]='';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				   }
				   
			 }
			
			 }//close foreach ($this -> input -> post() as $key => $val)
			//print var_dump($this->elements);
			
			//exit;
		    
		          //get the highest value of the array that will control the number of inserts to be done
				  $this->noOfInsertsBatch=$finalCount;
						 
						 
				 for($i=1; $i<=$this->noOfInsertsBatch;++$i){
			 	
				//go ahead and persist data posted
			   $this -> theForm = new \models\Entities\E_Bemonc_Functions(); //create an object of the model
			   
		      
			 	
				
				$this -> theForm -> setSignalFunctionsID($this->elements[$i]['bmsfSignalCode']);
				$this -> theForm -> setFacilityCode($this -> session -> userdata('fCode'));
				//check if that key exists, else set it to some default value
				(isset($this->elements[$i]['bmsfSignalFunctionConducted']))?$this -> theForm -> setConducted($this->elements[$i]['bmsfSignalFunctionConducted']):$this -> theForm -> setConducted("N/A");
				$this -> theForm -> setChallengeId($this->elements[$i]['bmsfChallenge']);
				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> em -> persist($this -> theForm);
						
						//now do a batched insert, default at 5
			  $this->batchSize=5;
			if($i % $this->batchSize==0){
			try{
					
				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				//return true;
				}catch(Exception $ex){
					//die($ex->getMessage());
					return false;
				   
					/*display user friendly message*/
					
				}//end of catch
				
			} else if($i<$this->batchSize || $i>$this->batchSize || $i==$this->noOfInsertsBatch && 
			$this->noOfInsertsBatch-$i<$this->batchSize){
				 //total records less than a batch, insert all of them
				try{
					
				$this -> em -> flush();
				$this->em->clear(); //detactes all objects from doctrine
				//return true;
				}catch(Exception $ex){
					//die($ex->getMessage());
					return false;
					
					/*display user friendly message*/
					
				}//end of catch
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print $i);
				// $this->writeAssessmentTrackerLog();
				 return true;
				}
				 
				
			}//end of batch condition
					 } //end of innner loop	
					 	 
	}//close addBemoncSignalFunctionsInfo
	
   private function addCommodityQuantityAvailabilityInfo(){
		$count=$finalCount=1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(strpos($key,'cq')!==FALSE){//select data for availability of commodities
			   //we separate the attribute name from the number
					
				  $this->frags = explode("_", $key);
				   
				  //$this->id = $this->frags[1];  // the id
				
				 $this->id = $count;  // the id
				    
				   $this->attr = $this->frags[0];//the attribute name
				 
				//stringify any array value
					if(is_array($val)){
			     	    $val=implode(',',$val);
					}
			//	print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';
				
				     //mark the end of 1 row...for record count
				if($this->attr=="cqCommodityCode"){
					//print 'count at:'.$count.'<br />';
					
					$finalCount=$count;
					$count++;
					//print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}
				  
				  //collect key and value to an array
				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					 $this->elements[$this->id][$this->attr]=htmlentities($val);
					
					//$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   $this->elements[$this->id][$this->attr]='';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				   }
				   
			 }
			
			 }//close foreach ($this -> input -> post() as $key => $val)
			//print var_dump($this->elements);
			
			/*foreach($this->elements as $key=>$value){
				if(isset($value['cqNumberOfUnits'])){
					print $value['cqNumberOfUnits'].'<br/>';
				}else{
					print 'Missing...'.'<br/>';
				}
				
			}*/
			
			//exit;
		    
		          //get the highest value of the array that will control the number of inserts to be done
				  $this->noOfInsertsBatch=$finalCount;
						 
						 
				 for($i=1; $i<=$this->noOfInsertsBatch;++$i){
			 	
				//go ahead and persist data posted
			   $this -> theForm = new \models\Entities\E_Cquantity_Available(); //create an object of the model
			   
				$this -> theForm -> setFacilityCode($this -> session -> userdata('fCode'));
				$this -> theForm -> setCommodityID($this->elements[$i]['cqCommodityCode']);
				
				//check if that key exists, else set it to some default value
				(isset($this->elements[$i]['cqNumberOfUnits']))?$this -> theForm -> setQuantityAvailable($this->elements[$i]['cqNumberOfUnits']):$this -> theForm -> setQuantityAvailable(-1);
				(isset($this->elements[$i]['cqSupplier']) || $this->elements[$i]['cqSupplier']=='')?$this -> theForm -> setSupplierID($this->elements[$i]['cqSupplier']):$this -> theForm -> setSupplierID("Other");
				(isset($this->elements[$i]['cqReason']) || $this->elements[$i]['cqReason']=='')?$this -> theForm -> setReason4Unavailability($this->elements[$i]['cqReason']):$this -> theForm -> setReason4Unavailability("N/A");
				(isset($this->elements[$i]['cqAvailability']))?$this -> theForm -> setAvailability($this->elements[$i]['cqAvailability']):$this -> theForm -> setAvailability("N/A");
				(isset($this->elements[$i]['cqLocation']))?$this -> theForm -> setLocation($this->elements[$i]['cqLocation']):$this -> theForm -> setLocation("N/A");
				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> em -> persist($this -> theForm);
						
						//now do a batched insert, default at 5
			  $this->batchSize=5;
			if($i % $this->batchSize==0){
			try{
					
				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				
				}catch(Exception $ex){
					die($ex->getMessage());
					return false;
				   
					/*display user friendly message*/
					
				}//end of catch
				
			} else if($i<$this->batchSize || $i>$this->batchSize || $i==$this->noOfInsertsBatch && $this->noOfInsertsBatch-$i<$this->batchSize){
				 //total records less than a batch, insert all of them
				try{
					
				$this -> em -> flush();
				$this->em->clear(); //detactes all objects from doctrine
				
				}catch(Exception $ex){
					die($ex->getMessage());
					return false;
					
					/*display user friendly message*/
					
				}//end of catch
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print $i);
				 //$this->writeAssessmentTrackerLog();
				 return true;
				}
				 
				
			}//end of batch condition
					 } //end of innner loop	
					 	 
	}//close addBemoncSignalFunctionsInfo
   
   private function addGuidelinesStaffInfo(){
		$count=$finalCount=1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(strpos($key,'gs')!==FALSE){//select data for bemonc signal functions
			   //we separate the attribute name from the number
					
				  $this->frags = explode("_", $key);
				   
				  //$this->id = $this->frags[1];  // the id
				
				 $this->id = $count;  // the id
				    
				   $this->attr = $this->frags[0];//the attribute name
				 
				
				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';
				
				     //mark the end of 1 row...for record count
				if($this->attr=="gsGuidelineCode"){
					// print 'count at:'.$count.'<br />';
					
					$finalCount=$count;
					 $count++;
					// print 'count at:'.$count.'<br />';
					 //print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}
				  
				  //collect key and value to an array
				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					 $this->elements[$this->id][$this->attr]=htmlentities($val);
					
					//$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   $this->elements[$this->id][$this->attr]='';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				   }
				   
			 }
			
			 }//close foreach ($this -> input -> post() as $key => $val)
			//print var_dump($this->elements);
			
			//exit;
		    
		          //get the highest value of the array that will control the number of inserts to be done
				  $this->noOfInsertsBatch=$finalCount;
						 
						 
				 for($i=1; $i<=$this->noOfInsertsBatch;++$i){
			 	
				//go ahead and persist data posted
			   $this -> theForm = new \models\Entities\E_Guideline_Training(); //create an object of the model
			   
		      
			 	
				
				$this -> theForm -> setGuidelineCode($this->elements[$i]['gsGuidelineCode']);
				$this -> theForm -> setFacilityCode($this -> session -> userdata('fCode'));
				//check if that key exists, else set it to some default value
				(isset($this->elements[$i]['gsLastTraining']))?$this -> theForm -> setLastTrained($this->elements[$i]['gsLastTraining']):$this -> theForm -> setLastTrained("N/A");
				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> em -> persist($this -> theForm);
						
						//now do a batched insert, default at 5
			  $this->batchSize=5;
			if($i % $this->batchSize==0){
			try{
					
				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				//return true;
				}catch(Exception $ex){
					//die($ex->getMessage());
					return false;
				   
					/*display user friendly message*/
					
				}//end of catch
				
			} else if($i<$this->batchSize || $i>$this->batchSize || $i==$this->noOfInsertsBatch && 
			$this->noOfInsertsBatch-$i<$this->batchSize){
				 //total records less than a batch, insert all of them
				try{
					
				$this -> em -> flush();
				$this->em->clear(); //detactes all objects from doctrine
				//return true;
				}catch(Exception $ex){
					//die($ex->getMessage());
					return false;
					
					/*display user friendly message*/
					
				}//end of catch
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print $i);
				// $this->writeAssessmentTrackerLog();
				 return true;
				}
				 
				
			}//end of batch condition
					 } //end of innner loop	
					 	 
	}//close addGuidelinesStaffInfo
	
   private function addCommodityUsageAndStockOutageInfo(){
		$count=$finalCount=1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(strpos($key,'uso')!==FALSE){//select data for availability of commodities
			   //we separate the attribute name from the number
					
				  $this->frags = explode("_", $key);
				   
				  //$this->id = $this->frags[1];  // the id
				
				 $this->id = $count;  // the id
				    
				   $this->attr = $this->frags[0];//the attribute name
				 
				//stringify any array value
					if(is_array($val)){
			     	    $val=implode(',',$val);
					}
			   // print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';
				
				     //mark the end of 1 row...for record count
				if($this->attr=="usoCommodityCode"){
					//print 'count at:'.$count.'<br />';
					
					$finalCount=$count;
					$count++;
					//print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}
				  
				  //collect key and value to an array
				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					 $this->elements[$this->id][$this->attr]=htmlentities($val);
					
					//$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   $this->elements[$this->id][$this->attr]='';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				   }
				   
			 }
			
			 }//close foreach ($this -> input -> post() as $key => $val)
			//print var_dump($this->elements);
			
			/*foreach($this->elements as $key=>$value){
				if(isset($value['cqNumberOfUnits'])){
					print $value['cqNumberOfUnits'].'<br/>';
				}else{
					print 'Missing...'.'<br/>';
				}
				
			}*/
			
			//exit;
		    
		          //get the highest value of the array that will control the number of inserts to be done
				  $this->noOfInsertsBatch=$finalCount;
						 
						 
				 for($i=1; $i<=$this->noOfInsertsBatch;++$i){
			 	
				//go ahead and persist data posted
			   $this -> theForm = new \models\Entities\E_Usage_Stock_Out_Log(); //create an object of the model
			   
				$this -> theForm -> setFacilityCode($this -> session -> userdata('fCode'));
				$this -> theForm -> setCommodityID($this->elements[$i]['usoCommodityCode']);
				
				//check if that key exists, else set it to some default value
				(isset($this->elements[$i]['usoNovUsage']))?$this -> theForm -> setNovUsage($this->elements[$i]['usoNovUsage']):$this -> theForm -> setNovUsage(-1);
				(isset($this->elements[$i]['usoNovTimesUnavailable']) || $this->elements[$i]['usoNovTimesUnavailable']=='')?$this -> theForm -> setNovUnavailableTimes($this->elements[$i]['usoNovTimesUnavailable']):$this -> theForm -> setNovUnavailableTimes('n/a');
				(isset($this->elements[$i]['usoDecUsage']))?$this -> theForm -> setDecUsage($this->elements[$i]['usoDecUsage']):$this -> theForm -> setDecUsage(-1);
				(isset($this->elements[$i]['usoDecTimesUnavailable']) || $this->elements[$i]['usoDecTimesUnavailable']=='')?$this -> theForm -> setDecUnavailableTimes($this->elements[$i]['usoDecTimesUnavailable']):$this -> theForm -> setDecUnavailableTimes('n/a');
				(isset($this->elements[$i]['usoJanUsage']))?$this -> theForm -> setJanUsage($this->elements[$i]['usoJanUsage']):$this -> theForm -> setJanUsage(-1);
				(isset($this->elements[$i]['usoJanTimesUnavailable']) || $this->elements[$i]['usoJanTimesUnavailable']=='')?$this -> theForm -> setJanUnavailableTimes($this->elements[$i]['usoJanTimesUnavailable']):$this -> theForm -> setJanUnavailableTimes('n/a');
				(isset($this->elements[$i]['usoFebUsage']))?$this -> theForm -> setFebUsage($this->elements[$i]['usoFebUsage']):$this -> theForm -> setFebUsage(-1);
				(isset($this->elements[$i]['usoFebTimesUnavailable']) || $this->elements[$i]['usoFebTimesUnavailable']=='')?$this -> theForm -> setFebUnavailableTimes($this->elements[$i]['usoFebTimesUnavailable']):$this -> theForm -> setFebUnavailableTimes('n/a');
				(isset($this->elements[$i]['usoMarUsage']))?$this -> theForm -> setMarUsage($this->elements[$i]['usoMarUsage']):$this -> theForm -> setMarUsage(-1);
				(isset($this->elements[$i]['usoMarTimesUnavailable']) || $this->elements[$i]['usoMarTimesUnavailable']=='')?$this -> theForm -> setMarUnavailableTimes($this->elements[$i]['usoMarTimesUnavailable']):$this -> theForm -> setMarUnavailableTimes('n/a');
				(isset($this->elements[$i]['usoAprUsage']))?$this -> theForm -> setAprUsage($this->elements[$i]['usoAprUsage']):$this -> theForm -> setAprUsage(-1);
				(isset($this->elements[$i]['usoAprTimesUnavailable']) || $this->elements[$i]['usoAprTimesUnavailable']=='')?$this -> theForm -> setAprUnavailableTimes($this->elements[$i]['usoAprTimesUnavailable']):$this -> theForm -> setAprUnavailableTimes('n/a');
				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> em -> persist($this -> theForm);
						
						//now do a batched insert, default at 5
			  $this->batchSize=5;
			if($i % $this->batchSize==0){
			try{
					
				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				
				}catch(Exception $ex){
					//die($ex->getMessage());
					return false;
				   
					/*display user friendly message*/
					
				}//end of catch
				
			} else if($i<$this->batchSize || $i>$this->batchSize || $i==$this->noOfInsertsBatch && $this->noOfInsertsBatch-$i<$this->batchSize){
				 //total records less than a batch, insert all of them
				try{
					
				$this -> em -> flush();
				$this->em->clear(); //detactes all objects from doctrine
				
				}catch(Exception $ex){
					//die($ex->getMessage());
					return false;
					
					/*display user friendly message*/
					
				}//end of catch
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print $i);
				 //$this->writeAssessmentTrackerLog();
				 return true;
				}
				 
				
			}//end of batch condition
					 } //end of innner loop	
					 	 
	}//close addBemoncSignalFunctionsInfo
	
	function store_data(){
		 /*check assessment tracker log*/
		 if($this->input->post()){
		 	 $step=$this->input->post('step_name',TRUE);
			/**/switch($step){
				case 'section-1':
					return $this -> response = 'true';
				/*if($this->updateFacilityInfo()==true){//Defined in MY_Model
					//$this->writeAssessmentTrackerLog();
				     	return $this -> response = 'true';
				}else{
						return $this -> response = 'false';
				}*/
				
					break;
				/*case 'diarrhoea_cases':
                   if($this->addDiarrhoeaData()==true){//defined in this model
                   	 $this->writeAssessmentTrackerLog();
				     	return $this -> response = 'true';
                   }else{
                   	return $this -> response = 'false';
                   }
					break;
				case 'childhealth_mch_tab':
					 if($this->addUnitCommoditiesInfo()==true){//defined in this model
                   	
				     	return $this -> response = 'true';
                   }else{
                   	return $this -> response = 'false';
                   }
					
					break;
				case 'childhealth_peds_tab':
					 if($this->addUnitCommoditiesInfo()==true){//defined in this model
                   	
				     	return $this -> response = 'true';
                   }else{
                   	return $this -> response = 'false';
                   }
					
					break;
				case 'childhealth_opd_tab':
					 if($this->addUnitCommoditiesInfo()==true){//defined in this model
                   	
				     	return $this -> response = 'true';
                   }else{
                   	return $this -> response = 'false';
                   }
					
					break;
					
				 case 'childhealth_store_tab':
					if($this->addUnitCommoditiesInfo()==true){//defined in this model
                   	
				     	return $this -> response = 'true';
                   }else{
                   	return $this -> response = 'false';
                   }
					
					break;
				 
				 case 'childhealth_other_tab':
					if($this->addUnitCommoditiesInfo()==true){//defined in this model
                   	
				     	return $this -> response = 'true';
                   }else{
                   	return $this -> response = 'false';
                   }
			
				 case 'ort_part1':
					if($this->addORTInfo()==true){//defined in this model
                     
				     	return $this -> response = 'true';
                  }else{
                   	   return $this -> response = 'false';
                 }
					   break;
					   
				 case 'ort_questions':
					if($this->addORTInfo()==true){//defined in this model
                   	
				     	return $this -> response = 'true';
                   }else{
                   	return $this -> response = 'false';
                   }
					break;
				 case 'ort_part2a':
					 
					 if($this->addEquipmentAssessmentInfo()==true){//defined in this model
				     	return $this -> response = 'true';
                   }else{
                   	return $this -> response = 'false';
                   }
					break; */

			}
		 	//print var_dump($this->input->post());


		return $this -> response = 'true';
		 }
	}
}//end of class M_MNH_Survey
