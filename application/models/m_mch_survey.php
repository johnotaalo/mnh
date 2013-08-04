<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *model to persist data for mch form
 */


class M_MCH_Survey  extends MY_Model {
	var $id, $attr, $frags, $elements, $noOfInserts, $batchSize,$mfcCode,
	$facility,$commodity, $isFacility,$ortAspectsList,$mchGuidelineAvailabilityList,$commodityList
	,$trainingGuidelinesList,$equipmentList,$suppliesList,$indicatorList,$treatmentList;

	function __construct() {
		parent::__construct();
		$this->isFacility='false';
		
	}
	
	/*calls the query defined in MY_Model*/
	public function getOrtAspectQuestions($for){
    	$this->ortAspectsList=$this->getAllOrtAspects($for);
		//var_dump($this->ortAspectsList);die;
		return $this->ortAspectsList;
    }
	
	/*calls the query defined in MY_Model*/
	public function getGuidelineAvailabilityQuestions($for){
    	$this->mchGuidelineAvailabilityList=$this->getAllOrtAspects($for);
		//var_dump($this->ortAspectsList);die;
		return $this->mchGuidelineAvailabilityList;
    }
	
	/*calls the query defined in MY_Model*/
	public function getCommodityNames(){
    	$this->commodityList=$this->getAllCommodityNames('mch');
		//var_dump($this->commodityList);die;
		return $this->commodityList;
    }
	
	/*calls the query defined in MY_Model*/
	public function getCommoditySupplierNames(){
    	$this->supplierList=$this->getAllCommoditySupplierNames('mnh');
		//var_dump($this->supplierList);die;
		return $this->supplierList;
    }
	
	/*calls the query defined in MY_Model*/
	public function getOtherSupplierNames(){
    	$this->supplierList=$this->getAllCommoditySupplierNames('mch');
		//var_dump($this->supplierList);die;
		return $this->supplierList;
    }

   /*calls the query defined in MY_Model*/
	public function getTrainingGuidelines(){
    	$this->trainingGuidelinesList=$this->getAllTrainingGuidelines('mch');
		//var_dump($this->trainingGuidelinesList);die;
		return $this->trainingGuidelinesList;
    }
	
	
	public function getEquipmentNames($section){
    	$this->equipmentList=$this->getAllEquipmentNames($section);
		//var_dump($this->equipmentList);die;
		return $this->equipmentList;
    }
	
	public function getSuppliesNames(){
    	$this->suppliesList=$this->getAllSuppliesNames('mch');
		//var_dump($this->suppliesList);die;
		return $this->suppliesList;
    }
	
	public function getIndicatorNames(){
    	$this->indicatorList=$this->getAllMCHIndicators();
		//var_dump($this->indicatorList);die;
		return $this->indicatorList;
    }
	
	public function getTreatmentNames(){
    	$this->treatmentList=$this->getAllMCHTreatments();
		//var_dump($this->treatmentList);die;
		return $this->treatmentList;
    }
		
	private function addMchGuidelinesAvailabilityInfo(){
		$count=$finalCount=1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(strpos($key,'ortc')!==FALSE){//select data for bemonc signal functions
			   //we separate the attribute name from the number
					
				  $this->frags = explode("_", $key);
				   
				  //$this->id = $this->frags[1];  // the id
				
				 $this->id = $count;  // the id
				    
				   $this->attr = $this->frags[0];//the attribute name
				 
				
				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';
				
				     //mark the end of 1 row...for record count
				if($this->attr=="ortcAspectCode"){
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
			   $this -> theForm = new \models\Entities\E_MCH_Questions_Log(); //create an object of the model
			   
		      
			 	
				
				//$this -> theForm -> setIdMCHQuestionLog($this->elements[$i]['ortcAspectCode']);
				$this -> theForm -> setFacilityCode($this -> session -> userdata('fCode'));
				//check if that key exists, else set it to some default value
				(isset($this->elements[$i]['ortcAspect']))?$this -> theForm -> setResponse($this->elements[$i]['ortcAspect']):$this -> theForm -> setResponse("N/A");
				(isset($this->elements[$i]['ortcGuidesCount']) || $this->elements[$i]['ortcGuidesCount']!='')?$this -> theForm -> setNoOfGuides($this->elements[$i]['ortcGuidesCount']):$this -> theForm -> setNoOfGuides(-1);
				$this -> theForm -> setIndicatorID($this->elements[$i]['ortcAspectCode']);
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
					 	 
	}//close addMchGuidelinesAvailabilityInfo
	
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
						 
						 
				 for($i=1; $i<=$this->noOfInsertsBatch+1;++$i){
			 	
				//go ahead and persist data posted
			   $this -> theForm = new \models\Entities\E_Guideline_Training(); //create an object of the model
			   
		      
			 	
				
				$this -> theForm -> setGuidelineCode($this->elements[$i]['gsGuidelineCode']);
				$this -> theForm -> setFacilityCode($this -> session -> userdata('fCode'));
				//check if that key exists, else set it to some default value
				(isset($this->elements[$i]['gsLastTraining']))?$this -> theForm -> setLastTrained($this->elements[$i]['gsLastTraining']):$this -> theForm -> setLastTrained(-1);
				(isset($this->elements[$i]['gsTrainedAndWorking']))?$this -> theForm -> setTrainedAndWorking($this->elements[$i]['gsTrainedAndWorking']):$this -> theForm -> setLastTrained(-1);
				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> em -> persist($this -> theForm);
						
						//now do a batched insert, default at 5
			  $this->batchSize=5;
			if($i % $this->batchSize==0){
			try{
					
				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print 'Limit: '.$this->noOfInsertsBatch);
				 //$this->writeAssessmentTrackerLog();
				 return true;
				}
				
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
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print 'Limit: '.$this->noOfInsertsBatch);
				 //$this->writeAssessmentTrackerLog();
				 return true;
				}
				
				//return true;
				}catch(Exception $ex){
					die($ex->getMessage());
					return false;
					
					/*display user friendly message*/
					
				}//end of catch
				 
			}//end of batch condition
					 } //end of innner loop	
					 	 
	}//close addGuidelinesStaffInfo
	
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
				  
				//  print 'Found :'.$this->noOfInsertsBatch;die;
						 
						 
				 for($i=1; $i<=$this->noOfInsertsBatch+1;++$i){
				 	
					
			 	
				//go ahead and persist data posted
			   $this -> theForm = new \models\Entities\E_Cquantity_Available(); //create an object of the model
			   
			 //  die(print 'Code: '.$this -> session -> userdata('fCode'));
			   
				$this -> theForm -> setFacilityCode($this -> session -> userdata('fCode'));
				$this -> theForm -> setCommodityID($this->elements[$i]['cqCommodityCode']);
				
				//check if that key exists, else set it to some default value
				(isset($this->elements[$i]['cqExpiryDate']) && $this->elements[$i]['cqExpiryDate']!='')?$this -> theForm -> setCommodityExpiryDate($this->elements[$i]['cqExpiryDate']):$this -> theForm -> setCommodityExpiryDate('n/a');
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
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print 'Limit: '.$this->noOfInsertsBatch);
				 //$this->writeAssessmentTrackerLog();
				 return true;
				}
				
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
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print 'Limit: '.$this->noOfInsertsBatch);
				 //$this->writeAssessmentTrackerLog();
				 return true;
				}
				
				}catch(Exception $ex){
					die($ex->getMessage());
					return false;
					
					/*display user friendly message*/
					
				}//end of catch
				
				// die(print 'I completed well after iteration: '.$i);
				
				//print 'I just saved rec no: '.$i;
				
				 
				
			}//end of batch condition
					 } //end of innner loop	
					 	 
	}//close addCommodityQuantityAvailabilityInfo
	
	private function addMCHIndicatorInfo(){
		$count=$finalCount=1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(strpos($key,'mchI')!==FALSE){//select data for bemonc signal functions
			   //we separate the attribute name from the number
					
				  $this->frags = explode("_", $key);
				   
				  //$this->id = $this->frags[1];  // the id
				
				 $this->id = $count;  // the id
				    
				   $this->attr = $this->frags[0];//the attribute name
				 
				
				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';
				
				     //mark the end of 1 row...for record count
				if($this->attr=="mchIndicatorCode"){
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
			   $this -> theForm = new \models\Entities\E_MCH_Indicator_Log(); //create an object of the model
			   
				$this -> theForm -> setFacilityCode($this -> session -> userdata('fCode'));
				//check if that key exists, else set it to some default value
				(isset($this->elements[$i]['mchIndicator']))?$this -> theForm -> setResponse($this->elements[$i]['mchIndicator']):$this -> theForm -> setResponse("N/A");
				$this -> theForm -> setIndicatorID($this->elements[$i]['mchIndicatorCode']);
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
					 	 
	}//close addMCHIndicatorInfo
	
	private function addDiarrhoeaCasesByMonthInfo(){
		
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
			   $this -> theForm = new \models\Entities\E_Morbidity_Data_Log(); //create an object of the model
		      
			 	
				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> theForm -> setFacilityID($this -> session -> userdata('fCode'));
				/*if no value set, then set to -1*/
				/*($this->elements['dnjanuary_12']=='')?$this -> theForm -> setJan12(-1):$this -> theForm -> setJan12($this->elements['dnjanuary_12']);
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
				($this->elements['dndecember_12']=='')?$this -> theForm -> setDec12(-1):$this -> theForm -> setDec12($this->elements['dndecember_12']); */
				($this->elements['dnjanuary_13']=='')?$this -> theForm -> setJan13(-1):$this -> theForm -> setJan13($this->elements['dnjanuary_13']);
				($this->elements['dnfebruary_13']=='')?$this -> theForm -> setFeb13(-1):$this -> theForm -> setFeb13($this->elements['dnfebruary_13']);
				($this->elements['dnmarch_13']=='')?$this -> theForm -> setMar13(-1):$this -> theForm -> setMar13($this->elements['dnmarch_13']);
				($this->elements['dnapril_13']=='')?$this -> theForm -> setApr13(-1):$this -> theForm -> setApr13($this->elements['dnapril_13']);
				($this->elements['dnmay_13']=='')?$this -> theForm -> setMay13(-1):$this -> theForm -> setMay13($this->elements['dnmay_13']);
				($this->elements['dnjune_13']=='' || !isset($this->elements['dnjune_13']))?$this -> theForm -> setJun13(-1):$this -> theForm -> setJun13($this->elements['dnjune_13']);
				
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
	}//close addDiarrhoeaCasesByMonthInfo()
	
	
	private function addMCHTreatmentInfo(){
		$count=$finalCount=1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(strpos($key,'mcht')!==FALSE){//select data for mch treatments
			   //we separate the attribute name from the number
					
				  $this->frags = explode("_", $key);
				   
				  //$this->id = $this->frags[1];  // the id
				
				 $this->id = $count;  // the id
				    
				   $this->attr = $this->frags[0];//the attribute name
				 
				
				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';
				
				     //mark the end of 1 row...for record count
				if($this->attr=="mchtTreatmentCode"){
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
						 
						 
				 for($i=1; $i<=$this->noOfInsertsBatch+1;++$i){
			 	
				//go ahead and persist data posted
			   $this -> theForm = new \models\Entities\E_MCH_Treatment_Log(); //create an object of the model
			   
				
				$this -> theForm -> setTreatmentID($this->elements[$i]['mchtTreatmentCode']);
				$this -> theForm -> setFacilityCode($this -> session -> userdata('fCode'));
				//check if that key exists, else set it to some default value
				(isset($this->elements[$i]['mchtSevereDehydration']) && $this->elements[$i]['mchtSevereDehydration']!='')?$this -> theForm -> setSevereDehydrationNo($this->elements[$i]['mchtSevereDehydration']):$this -> theForm -> setSevereDehydrationNo(-1);
				(isset($this->elements[$i]['mchtSomeDehydration']) && $this->elements[$i]['mchtSomeDehydration']!='')?$this -> theForm -> setSomeDehydrationNo($this->elements[$i]['mchtSomeDehydration']):$this -> theForm -> setSomeDehydrationNo(-1);
				(isset($this->elements[$i]['mchtNoDehydration']) && $this->elements[$i]['mchtNoDehydration']!='')?$this -> theForm -> setNoDehydrationNo($this->elements[$i]['mchtNoDehydration']):$this -> theForm -> setNoDehydrationNo(-1);
				(isset($this->elements[$i]['mchtDysentry']) && $this->elements[$i]['mchtDysentry']!='')?$this -> theForm -> setDysentryNo($this->elements[$i]['mchtDysentry']):$this -> theForm -> setDysentryNo(-1);
				(isset($this->elements[$i]['mchtNoClassification']) && $this->elements[$i]['mchtNoClassification']!='')?$this -> theForm -> setNoClassificationNo($this->elements[$i]['mchtNoClassification']):$this -> theForm -> setNoClassificationNo(-1);
				
				//if other treatment has been entered
				(isset($this->elements[$i]['mchtTreatmentOther']) && $this->elements[$i]['mchtTreatmentOther']!='')?$this -> theForm -> setOtherTreatment($this->elements[$i]['mchtTreatmentOther']):$this -> theForm -> setOtherTreatment('n/a');
				
				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> em -> persist($this -> theForm);
						
				//now do a batched insert, default at 5
			  $this->batchSize=5;
			if($i % $this->batchSize==0){
			try{
					
				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print 'Limit: '.$this->noOfInsertsBatch);
				 //$this->writeAssessmentTrackerLog();
				 return true;
				}
				
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
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print 'Limit: '.$this->noOfInsertsBatch);
				 //$this->writeAssessmentTrackerLog();
				 return true;
				}
				
				//return true;
				}catch(Exception $ex){
					//die($ex->getMessage());
					return false;
					
					/*display user friendly message*/
					
				}//end of catch
				 
			}//end of batch condition
					 } //end of innner loop	
					 	 
	}//close addMCHTreatmentInfo
	
	private function addMchOrtConerAssessmentInfo(){
		$count=$finalCount=1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(strpos($key,'ortc')!==FALSE){//select data for bemonc signal functions
			   //we separate the attribute name from the number
					
				  $this->frags = explode("_", $key);
				   
				  //$this->id = $this->frags[1];  // the id
				
				 $this->id = $count;  // the id
				    
				   $this->attr = $this->frags[0];//the attribute name
				 
				 //stringify any array value
					if(is_array($val)){
			     	    $val=implode(',',$val);
					}
				
				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';
				
				     //mark the end of 1 row...for record count
				if($this->attr=="ortcAspectCode"){
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
			   $this -> theForm = new \models\Entities\E_MCH_Questions_Log(); //create an object of the model
			   
		      
			 	
				
				//$this -> theForm -> setIdMCHQuestionLog($this->elements[$i]['ortcAspectCode']);
				$this -> theForm -> setFacilityCode($this -> session -> userdata('fCode'));
				//check if that key exists, else set it to some default value
				
				if(isset($this->elements[$i]['ortcAspectLocResponse'])){
					(isset($this->elements[$i]['ortcAspectLocResponse']))?$this -> theForm -> setResponse($this->elements[$i]['ortcAspectLocResponse']):$this -> theForm -> setResponse('N/A');
				}else{
					(isset($this->elements[$i]['ortcAspect']))?$this -> theForm -> setResponse($this->elements[$i]['ortcAspect']):$this -> theForm -> setResponse('N/A');
				}
				
				$this -> theForm -> setIndicatorID($this->elements[$i]['ortcAspectCode']);
				(isset($this->elements[$i]['ortcGuidesCount']))?$this -> theForm -> setNoOfGuides($this->elements[$i]['ortcGuidesCount']):$this -> theForm -> setNoOfGuides(-1);
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
					 	 
	}//close addMchOrtConerAssessmentInfo
	
	private function addEquipmentQuantityAvailabilityInfo(){
		$count=$finalCount=1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(strpos($key,'eq')!==FALSE){//select data for availability of commodities
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
				if($this->attr=="eqEquipmentCode"){
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
				  
				//  print 'Found :'.$this->noOfInsertsBatch;die;
						 
						 
				 for($i=1; $i<=$this->noOfInsertsBatch+1;++$i){
				 	
					
			 	
				//go ahead and persist data posted
			   $this -> theForm = new \models\Entities\E_Equipment_Available(); //create an object of the model
			   
			 //  die(print 'Code: '.$this -> session -> userdata('fCode'));
			   
				$this -> theForm -> setFacilityCode($this -> session -> userdata('fCode'));
				$this -> theForm -> setEquipmentID($this->elements[$i]['eqEquipmentCode']);
				
				//check if that key exists, else set it to some default value
				(isset($this->elements[$i]['eqAvailability']))?$this -> theForm -> setEquipAvailability($this->elements[$i]['eqAvailability']):$this -> theForm -> setEquipAvailability("N/A");
				(isset($this->elements[$i]['eqLocation']))?$this -> theForm -> setEquipLocation($this->elements[$i]['eqLocation']):$this -> theForm -> setEquipLocation("N/A");
				(isset($this->elements[$i]['eqQtyFullyFunctional']) || $this->elements[$i]['eqQtyFullyFunctional']!='')?$this -> theForm -> setQuantityFullyFunctional($this->elements[$i]['eqQtyFullyFunctional']):$this -> theForm -> setQuantityFullyFunctional(-1);
				(isset($this->elements[$i]['eqQtyPartiallyFunctional']))?$this -> theForm -> setQuantityPartiallyFunctional($this->elements[$i]['eqQtyFullyFunctional']):$this -> theForm -> setQuantityPartiallyFunctional(-1);
				(isset($this->elements[$i]['eqQtyNonFunctional']) || $this->elements[$i]['eqQtyNonFunctional']!='')?$this -> theForm -> setQuantityNonFunctional($this->elements[$i]['eqQtyFullyFunctional']):$this -> theForm -> setQuantityNonFunctional(-1);
				
				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> em -> persist($this -> theForm);
						
						//now do a batched insert, default at 5
			  $this->batchSize=5;
			if($i % $this->batchSize==0){
			try{
					
				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print 'Limit: '.$this->noOfInsertsBatch);
				 //$this->writeAssessmentTrackerLog();
				 return true;
				}
				
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
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print 'Limit: '.$this->noOfInsertsBatch);
				 //$this->writeAssessmentTrackerLog();
				 return true;
				}
				
				}catch(Exception $ex){
					//die($ex->getMessage());
					return false;
					
					/*display user friendly message*/
					
				}//end of catch
				
				// die(print 'I completed well after iteration: '.$i);
				
				//print 'I just saved rec no: '.$i;
				
				 
				
			}//end of batch condition
					 } //end of innner loop	
					 	 
	}//close addEquipmentQuantityAvailabilityInfo
	
	private function addSuppliesQuantityAvailabilityInfo(){
		$count=$finalCount=1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(strpos($key,'sq')!==FALSE){//select data for availability of commodities
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
				if($this->attr=="sqSuppliesCode"){
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
			
			//exit;
		    
		          //get the highest value of the array that will control the number of inserts to be done
				  $this->noOfInsertsBatch=$finalCount;
				  
				//  print 'Found :'.$this->noOfInsertsBatch;die;
						 
						 
				 for($i=1; $i<=$this->noOfInsertsBatch+1;++$i){
				 	
					
			 	
				//go ahead and persist data posted
			   $this -> theForm = new \models\Entities\E_Squantity_Available(); //create an object of the model
			   
			 //  die(print 'Code: '.$this -> session -> userdata('fCode'));
			   
				$this -> theForm -> setFacilityCode($this -> session -> userdata('fCode'));
				$this -> theForm -> setSuppliesCode($this->elements[$i]['sqSuppliesCode']);
				
				//check if that key exists, else set it to some default value
				//(isset($this->elements[$i]['sqNumberOfUnits']))?$this -> theForm -> setQuantityAvailable($this->elements[$i]['sqNumberOfUnits']):$this -> theForm -> setQuantityAvailable(-1);
				(isset($this->elements[$i]['sqSupplier']) || $this->elements[$i]['sqSupplier']=='')?$this -> theForm -> setSupplierID($this->elements[$i]['sqSupplier']):$this -> theForm -> setSupplierID("Other");
				//(isset($this->elements[$i]['sqReason']) || $this->elements[$i]['sqReason']=='')?$this -> theForm -> setReason4Unavailability($this->elements[$i]['sqReason']):$this -> theForm -> setReason4Unavailability("N/A");
				(isset($this->elements[$i]['sqAvailability']))?$this -> theForm -> setAvailability($this->elements[$i]['sqAvailability']):$this -> theForm -> setAvailability("N/A");
				(isset($this->elements[$i]['sqLocation']))?$this -> theForm -> setLocation($this->elements[$i]['sqLocation']):$this -> theForm -> setLocation("N/A");
				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> em -> persist($this -> theForm);
						
						//now do a batched insert, default at 5
			  $this->batchSize=5;
			if($i % $this->batchSize==0){
			try{
					
				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print 'Limit: '.$this->noOfInsertsBatch);
				 //$this->writeAssessmentTrackerLog();
				 return true;
				}
				
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
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print 'Limit: '.$this->noOfInsertsBatch);
				 //$this->writeAssessmentTrackerLog();
				 return true;
				}
				
				}catch(Exception $ex){
					//die($ex->getMessage());
					return false;
					
					/*display user friendly message*/
					
				}//end of catch
			
					
			}//end of batch condition
					 } //end of innner loop	
					 	 
	}//close addSuppliesQuantityAvailabilityInfo
	
	private function addResourceAvailabilityInfo(){
		$count=$finalCount=1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(strpos($key,'hw')!==FALSE){//select data for availability of commodities
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
				if($this->attr=="hwEquipmentCode"){
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
			
			//exit;
		    
		          //get the highest value of the array that will control the number of inserts to be done
				  $this->noOfInsertsBatch=$finalCount;
				  
				//  print 'Found :'.$this->noOfInsertsBatch;die;
						 
						 
				 for($i=1; $i<=$this->noOfInsertsBatch+1;++$i){
				 	
					
			 	
				//go ahead and persist data posted
			   $this -> theForm = new \models\Entities\E_MCH_Resource_Available(); //create an object of the model
			   
			   //die(print 'Code: '.$this -> session -> userdata('fCode'));
			   
				$this -> theForm -> setFacilityCode($this -> session -> userdata('fCode'));
				$this -> theForm -> setResourceCode($this->elements[$i]['hwEquipmentCode']);
				
				//check if that key exists, else set it to some default value
				(isset($this->elements[$i]['hwNumberOfUnits']))?$this -> theForm -> setQuantityAvailable($this->elements[$i]['hwNumberOfUnits']):$this -> theForm -> setQuantityAvailable(-1);
				(isset($this->elements[$i]['hwSupplier']) || $this->elements[$i]['hwSupplier']!='')?$this -> theForm -> setSupplierID($this->elements[$i]['hwSupplier']):$this -> theForm -> setSupplierID("Other");
				(isset($this->elements[$i]['hwReason']))?$this -> theForm -> setReason4Unavailability($this->elements[$i]['hwReason']):$this -> theForm -> setReason4Unavailability("N/A");
				(isset($this->elements[$i]['hwAvailability']))?$this -> theForm -> setAvailability($this->elements[$i]['hwAvailability']):$this -> theForm -> setAvailability("N/A");
				(isset($this->elements[$i]['hwLocation']))?$this -> theForm -> setLocation($this->elements[$i]['hwLocation']):$this -> theForm -> setLocation("N/A");
				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> em -> persist($this -> theForm);
						
						//now do a batched insert, default at 5
			  $this->batchSize=5;
			if($i % $this->batchSize==0){
			try{
					
				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print 'Limit: '.$this->noOfInsertsBatch);
				 //$this->writeAssessmentTrackerLog();
				 return true;
				}
				
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
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print 'Limit: '.$this->noOfInsertsBatch);
				 //$this->writeAssessmentTrackerLog();
				 return true;
				}
				
				}catch(Exception $ex){
					//die($ex->getMessage());
					return false;
					
					/*display user friendly message*/
					
				}//end of catch
			
					
			}//end of batch condition
					 } //end of innner loop	
					 	 
	}//close addResourceAvailabilityInfo
	
	function store_data(){
		 /*check assessment tracker log*/
		 if($this->input->post()){
		 	
			
		 	 $step=$this->input->post('step_name',TRUE);
			switch($step){
			/**/case 'section-1':
			//check if entry exists
			  $this->section=$this->sectionEntryExists($this->session->userdata('fCode'),$this->input->post('step_name',TRUE),$this->session->userdata('survey'));

			//print var_dump($this->section);

				//insert log entry if new, else update the existing one
			if($this->sectionExists==false){
				if($this->updateFacilityInfo()==true){//Defined in MY_Model
					$this->writeAssessmentTrackerLog();
				
				     	return $this -> response = 'true';
				}else{
						return $this -> response = 'false';
				}
				}else{
					//die('Entry exsits');
					return $this -> response = 'true';
				}
				//return $this -> response = 'true';
					break;
			case 'section-2':
					//check if entry exists
			  $this->section=$this->sectionEntryExists($this->session->userdata('fCode'),$this->input->post('step_name',TRUE),$this->session->userdata('survey'));

			//print var_dump($this->section);

				//insert log entry if new, else update the existing one
				if($this->sectionExists==false){
                   if($this->addMchGuidelinesAvailabilityInfo()==true && $this->addGuidelinesStaffInfo()==true && $this->addCommodityQuantityAvailabilityInfo()==true){//defined in this model
                    $this->writeAssessmentTrackerLog();
				   return $this -> response = 'true';
                    
                   }else{
                   	return $this -> response = 'false';
                   }
				   }else{
					//die('Entry exsits');
					return $this -> response = 'true';
				}
					break;
				case 'section-3':
						//check if entry exists
				   $this->section=$this->sectionEntryExists($this->session->userdata('fCode'),$this->input->post('step_name',TRUE),$this->session->userdata('survey'));
	
				//print var_dump($this->section);
	
					//insert log entry if new, else update the existing one
					if($this->sectionExists==false){
					 if($this->addMCHIndicatorInfo()==true){//defined in this model
                   	  $this->writeAssessmentTrackerLog();
				     	return $this -> response = 'true';
                   }else{
                   	return $this -> response = 'false';
                   }
					 }else{
					//die('Entry exsits');
					return $this -> response = 'true';
				}
					break;
				case 'section-4':
						//check if entry exists
				  $this->section=$this->sectionEntryExists($this->session->userdata('fCode'),$this->input->post('step_name',TRUE),$this->session->userdata('survey'));
	
				//print var_dump($this->section);
	
					//insert log entry if new, else update the existing one
					if($this->sectionExists==false){
					 if($this->addMCHIndicatorInfo()==true && $this->addDiarrhoeaCasesByMonthInfo()==true && $this->addMCHTreatmentInfo()==true){//defined in this model
                   	  $this->writeAssessmentTrackerLog();
				     	return $this -> response = 'true';
                   }else{
                   	return $this -> response = 'false';
                   }
					}else{
					//die('Entry exsits');
					return $this -> response = 'true';
				}
					break;
				case 'section-5':
					//check if entry exists
				   $this->section=$this->sectionEntryExists($this->session->userdata('fCode'),$this->input->post('step_name',TRUE),$this->session->userdata('survey'));
	
				//print var_dump($this->section);
	
					//insert log entry if new, else update the existing one
					if($this->sectionExists==false){
					 if($this->addMchOrtConerAssessmentInfo()==true && $this->addEquipmentQuantityAvailabilityInfo()==true){//defined in this model
                   	  $this->writeAssessmentTrackerLog();
				     	return $this -> response = 'true';
                   }else{
                   	return $this -> response = 'false';
                   }
				   }else{
					//die('Entry exsits');
					return $this -> response = 'true';
				}
					break;
				case 'section-6':
					//check if entry exists
				   $this->section=$this->sectionEntryExists($this->session->userdata('fCode'),$this->input->post('step_name',TRUE),$this->session->userdata('survey'));
	
	              // die($this->session->userdata('fCode').':'.$this->session->userdata('survey'));
				//print var_dump($this->section);
	
					//insert log entry if new, else update the existing one
					if($this->sectionExists==false){
					 if($this->addSuppliesQuantityAvailabilityInfo()==true && $this->addResourceAvailabilityInfo()==true){//defined in this model
                   	  $this->writeAssessmentTrackerLog();
					  //update facility survey status
					  $this->markSurveyStatusAsComplete();
				     	return $this -> response = 'true';
                   }else{
                   	return $this -> response = 'false';
                   }
				    }else{
					//die('Entry exsits');
					 //update facility survey status
					 $this->markSurveyStatusAsComplete();
					return $this -> response = 'true';
				}
					break;/**/

			}//close switch
		 	//print var_dump($this->input->post());


	//return $this -> response = 'true';
		 }
 
	}
	
}//end of class m_mch_survey 
