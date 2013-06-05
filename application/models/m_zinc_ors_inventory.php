<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *model to E_Stock,E_Equipment_Assessment & E_OrtC_Assessment entities
 */
use application\models\Entities\E_Equipment_Assessment;
use application\models\Entities\E_OrtC_Assessment;
use application\models\Entities\E_Stock;

class M_Zinc_Ors_Inventory  extends MY_Model {
	var $id, $attr, $frags, $elements, $noOfInserts, $batchSize,$countyList,$provinceList,$districtList,$fTypeList,$fOwnerList,$fLevelList,$mfcCode,$dbSessionValues,
	$facility,$commodity,$ortAssessCode, $isFacility;

	function __construct() {
		parent::__construct();
		$this->isFacility='false';

	}

	function addRecord() {
        $s=microtime(true); /*mark the timestamp at the beginning of the transaction*/

		 $this->elements = array();
		 $this->theIds=array();


		if ($this -> input -> post()) {//check if a post was made

	    $this->updateFacilityInfo();
		$this->addORTInfo();//<-
		$this->addEquipmentAssessmentInfo();
	    $this->addZincCommoditiesInfo();
		$this->addORSCommoditiesInfo();

			//exit;

			}//close the this->input->post
			$e=microtime(true);
			$this->executionTime=round($e-$s,'4');
	        $this->rowsInserted=$this->noOfInsertsBatch;
			return $this -> response = 'ok';
	} //end of addRecord()

	function updateFacility(){
		 /*check assessment tracker log*/
		 if($this->input->post()){
		 	 $step=$this->input->post('step_name',TRUE);
			/**/switch($step){
				/*case 'facility_div':
				if($this->updateFacilityInfo()==true){//Defined in MY_Model
					$this->writeAssessmentTrackerLog();
				     	return $this -> response = 'true';
				}else{
						return $this -> response = 'false';
				}
				
					break;
				case 'diarrhoea_cases':
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
				
				 case 'ort_part2b':
					if($this->addEquipmentAssessmentInfo()==true){//defined in this model
				     	return $this -> response = 'true';
                   }else{
                   	return $this -> response = 'false';
                   }
					break;

			}
		 	//print var_dump($this->input->post());


		return $this -> response = 'true';
		 }
	}
	
	protected function addDiarrhoeaData(){
			foreach ($this -> input -> post() as $key => $val) {//For every posted values

			     $this->attr = $key;//the attribute name
				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					// $this->elements[$this->id][$this->attr]=htmlentities($val);
					$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   	$this->elements[$this->attr]='';
				   }

			

			// print $key.' val='.$val.' <br />';

			 }//close foreach ($this -> input -> post() as $key => $val)

			//print var_dump($this->elements);
			// exit;

			//check if entry exists--advance it to be comparing month's using the assessment tracker's info before updating or creating a new entry
			$this->section=$this->sectionEntryExists($this -> session -> userdata('fCode'),$this->input->post('step_name',TRUE));
			
			

		    //get the highest value of the array that will control the number of inserts to be done
						$this->noOfInsertsBatch=1; /*only 1 facility record is expected*/

						// print "max rows: ".$this->noOfInsertsBatch; exit;
						 for($i=1; $i<=$this->noOfInsertsBatch;++$i){

                //if no log entry, means, this this the first entry
				if($this->sectionExists !=true){
				//
				//die('New entry, enter new one');
			   $this -> theForm = new \models\Entities\e_diarrhoea_cases(); //create an object of the model
			   $this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
			   $this -> theForm -> setFacilityCode($this -> session -> userdata('fCode')); /*timestamp option*/
				}else{
				//die('Duplicate entry, so update');
				try{
					$this -> theForm=$this->em->getRepository('models\Entities\e_diarrhoea_cases')
					                       ->findOneBy( array('facilityCode'=>$this -> session -> userdata('fCode')));
					$this -> theForm -> setUpdatedAt(new DateTime()); /*timestamp option*/	
					}catch(exception $ex){
						//ignore
						//die($ex->getMessage());
						return false;
					}
					
				}

                
				$this -> theForm -> setNumberOfDiarrhoeaCases($this->input->post('diarrhoeaCases',TRUE)); /*timestamp option*/
				$this -> em -> persist($this -> theForm);
				try{

				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				return true;
				//print 'true';
				}catch(Exception $ex){
				   // die($ex->getMessage());
				    //print 'false';
					/*display user friendly message*/
					return false;

				}//end of catch

        	

					 } //end of innner loop

	} //close addDiarrhoeaData
	
   

   public function facilityExists($mfc){
	     try{
			$this->facility=$this->em->getRepository('models\Entities\E_Facility')
			                       ->findOneBy( array('facilityName'=>$mfc));
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
			return $this->facility;

	}/*close facilityExists($mfc)*/
	
	

	public function getFacilityCode(){
		if ($this -> input -> post()) {//check if a post was made

       //Working with an object of the entity
       try{
		$this->facility = $this->em->getRepository('models\Entities\e_facility')->findOneBy(array('facilityMFC' => $this -> input -> post('username')));

	    if($this->facility){
			return $this->isFacility='true';
	    }
		}catch(exception $ex){
			//ignore
				//die($ex->getMessage());
		}

	}//close the this->input->post
	}/*close getFacilityCode()*/

	public function verifyFacilityByName(){
		if ($this -> input -> post()) {//check if a post was made

       //Working with an object of the entity
       try{
		$this->facility = $this->em->getRepository('models\Entities\e_facility')->findOneBy(array('facilityName' => $this -> input -> post('username')));

	    if($this->facility){
			return $this->isFacility='true';
	    }
		}catch(exception $ex){
			//ignore
				//die($ex->getMessage());
		}

	}//close the this->input->post
	}/*close verifyFacilityByName*/

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


	private function addORTInfo(){

		    foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    //if(substr($key,0,3)=="ort"){//select data for ort
			     $this->attr = $key;//the attribute name
				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					// $this->elements[$this->id][$this->attr]=htmlentities($val);
					
					//stringify any array value
					if(is_array($val)){
			     	    $val=implode(',',$val);
					}
					
					$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   	$this->elements[$this->attr]='';
				   }
				   //print $key.' val='.$val.' <br />';
			// }//close if(substr($key,0,3)=="ort")

			 }//close foreach ($this -> input -> post() as $key => $val)
            //print var_dump($this->elements);
			//exit;
			 
			    //check if entry exists--advance it to be comparing month's using the assessment tracker's info before updating or creating a new entry
			   $this->section=$this->sectionEntryExists($this -> session -> userdata('fCode'),$this->input->post('step_name',TRUE));

		        //get the highest value of the array that will control the number of inserts to be done
			    $this->noOfInsertsBatch=1; //only 1 ort corner record is inserted
			    
			    //source of request
			    $source=$this->input->post('step_name',TRUE);


			for($i=1; $i<=$this->noOfInsertsBatch;++$i){
						 	
				 //if no log entry, means, this this the first entry
				if($this->sectionExists !=true){
				
				//die('New entry, enter new one');
			  #new fields go here
			 
			   $this -> theForm = new \models\Entities\e_ortc_assessment(); //create an object of the model
			   $this -> theForm -> setFacilityMFC($this -> session -> userdata('fCode'));
			   $this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
			   //do some branching since this fellow gets feeds from diff sources
			  switch($source){
			  	case 'ort_part1':
					$this -> theForm -> setKidsDehydrated($this->elements['ortQuestion1']);
			        $this -> theForm -> setDesignatedDehydrationLocation($this->elements['ortQuestion2']);
					$this ->  theForm -> setLocationOfDehydrationUnit($this->elements['ortDehydrationLocation']);
					break;
				case 'ort_questions':
					(isset($this->elements['specificSupplier']) && $this->elements['specificSupplier'] !='')?$this->  theForm ->setFacilitySupplier($this->elements['ortSupplier'].'('.$this->elements['specificSupplier'].')'):$this->  theForm ->setFacilitySupplier($this->elements['ortSupplier']);
					$this->theForm->setBudgetKept($this->elements['budgetAvailable']);
					break;
					
			  }
				}else{
				//die('Duplicate entry, so update');
				try{
					$this -> theForm=$this->em->getRepository('models\Entities\e_ortc_assessment')
					                       ->findOneBy( array('facilityMFC'=>$this -> session -> userdata('fCode')));
					$this -> theForm -> setUpdatedAt(new DateTime()); /*timestamp option*/	
					 //do some branching since this fellow gets feeds from diff sources
				   switch($source){
				  	case 'ort_part1':
						$this -> theForm -> setKidsDehydrated($this->elements['ortQuestion1']);
				        $this -> theForm -> setDesignatedDehydrationLocation($this->elements['ortQuestion2']);
						(isset($this->elements['ortDehydrationLocation']) && $this->elements['ortDehydrationLocation'] !='')?$this->  theForm -> setLocationOfDehydrationUnit($this->elements['ortDehydrationLocation']):$this->  theForm -> setLocationOfDehydrationUnit('n/a');
						break;
					case 'ort_questions':
						(isset($this->elements['specificSupplier']) && $this->elements['specificSupplier'] !='')?$this->  theForm ->setFacilitySupplier($this->elements['ortSupplier'].'('.$this->elements['specificSupplier'].')'):$this->  theForm ->setFacilitySupplier($this->elements['ortSupplier']);
					    $this->theForm->setBudgetKept($this->elements['budgetAvailable']);
						break;
					
			   }
					}catch(exception $ex){
						//ignore
						//die($ex->getMessage());
						return false;
					}
					
				}
				
				$this -> theForm -> setDateOfAssessment(new DateTime());
				$this -> em -> persist($this -> theForm);

						//now do a batched insert


			try{

				$this -> em -> flush();
					//retrieve id of the last insert to use in in equipment assessment
				//$this -> em -> refresh($this -> theForm);

				$this->ortAssessCode=$this->theForm->getOrtAssessmentCode();
				//print ('last id: '.$this->ortAssessCode);exit;

				$this->em->clear(); //detaches all objects from doctrine
				
				//log this change
				$this->writeAssessmentTrackerLog();
                return true;
				}catch(Exception $ex){
				    //die($ex->getMessage());
					/*display user friendly message*/
					return false;

				}//end of catch


					 } //end of innner loop	
	}//close addORTInfo

	private function addEquipmentAssessmentInfo(){
		$count=1;$finalCount=0;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		   if(substr($key,0,5)=="equip"){//select data for equipment
			   //we separate the attribute name from the number

				  $this->frags = explode("_", $key);

				  //$this->id = $this->frags[1];  // the id

				 $this->id = $count;  // the id


				  $this->attr = $this->frags[0];//the attribute name


				     //mark the end of 1 row...for record count
				if($this->attr=="equipQuantity"){
					//print 'count at:'.$count.'<br />';
					$finalCount=$count;
					 $count++;
					 // print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					 $this->elements[$this->id][$this->attr]=htmlentities($val);
					//$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   	$this->elements[$this->id][$this->attr]='';
				   }



			 }

			 }//close foreach ($this -> input -> post() as $key => $val)
			//print var_dump($this->elements);
			//exit;
			
			    //check if entry exists--advance it to be comparing month's using the assessment tracker's info before updating or creating a new entry
			   $this->section=$this->sectionEntryExists($this -> session -> userdata('fCode'),$this->input->post('step_name',TRUE));
			   
			   //retrieve ort code assigned to this facility
			   $this->findOrtCodeByFacility($this -> session -> userdata('fCode'));
			   $this->ortAssessCode=$this->ort->getOrtAssessmentCode();
			   
			 

		          //get the highest value of the array that will control the number of inserts to be done
				  $this->noOfInsertsBatch=$finalCount;


				for($i=1; $i<=$this->noOfInsertsBatch;++$i){
					
			    //if no log entry, means, this this the first entry
				if($this->sectionExists !=true){
				
				//die('New entry, enter new one');
			    #new fields go here--when it's the first time the record is inserted, set the values the that are inserted once here. e.g facility code, equipment code

			   $this -> theForm = new \models\Entities\e_equipment_assessment(); //create an object of the model
			   $this -> theForm -> setEquipmentCode($this->elements[$i]['equipCode']);
			   $this -> theForm -> setOrtCode($this->ortAssessCode);
			   
			   }else{
				//die('Duplicate entry, so update');
				try{
					//query to retrieve the existing record's info for an update
					$this -> theForm=$this->em->getRepository('models\Entities\e_equipment_assessment')
					                       ->findOneBy( array('equipmentCode'=>$this -> elements[$i]['equipCode'],'ortCode'=>$this->ortAssessCode));
					}catch(exception $ex){
						//ignore
						//die($ex->getMessage());
						return false;
					}
					
				}

		       //return the id of the last ORT assessment insert to use it in this subsequent equipment assessment

				
				#these values here are either updated/inserted every time the code is executed ,
				$this -> theForm -> setEquipmentAvailable($this->elements[$i]['equipAvailable']);
				$this -> theForm -> setQuantity($this->elements[$i]['equipQuantity']);
				$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			  $this->batchSize=5;
			if($i % $this->batchSize==0){
			try{

				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				}catch(Exception $ex){
				   //die($ex->getMessage());
					/*display user friendly message*/
					return false;

				}//end of catch

			} else if($i<$this->batchSize || $i>$this->batchSize || $i==$this->noOfInsertsBatch && 
			$this->noOfInsertsBatch-$i<$this->batchSize){
				 //total records less than a batch, insert all of them
				try{

				$this -> em -> flush();
				$this->em->clear(); //detactes all objects from doctrine
				}catch(Exception $ex){
					//die($ex->getMessage());
					/*display user friendly message*/
					return false;

				}//end of catch
				
				//on the last record to be inserted, log the process and return true;
				if($i==$this->noOfInsertsBatch){
				//die(print $i);
				 $this->writeAssessmentTrackerLog();
				 return true;
				}


			}//end of batch condition
					 } //end of innner loop	


	}//close addEquipmentAssessmentInfo

	private function addUnitCommoditiesInfo(){

		 $count=$finalCount=1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(strpos($key,'step_n')===FALSE){//select what we want for the array only
			   //we separate the attribute name from the number

				  $this->frags = explode("_", $key);

				  //$this->id = $this->frags[1];  // the id

				$this->id = $count;  // the id

                  
				  $this->attr = substr($this->frags[0],1,strlen($this->frags[0]));//the attribute name

				  //mark the end of 1 row...for record count
				if($this->attr=="StockExpiryDate"){
					//print 'count at:'.$count.'<br />';
					$finalCount=$count;
					 $count++;
				}

				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					 $this->elements[$this->id][$this->attr]=htmlentities($val);
					//$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   	$this->elements[$this->id][$this->attr]='';
				   }
				// print $this->attr.' val='.$val.' id='.$this->id.' <br />';
				  //print $key.' val='.$this->elements[$this->id][$this->attr].'<br />';

			 }//close  if(strpos($key,'step_n')!==FALSE)

			 }//close foreach ($this -> input -> post() as $key => $val)
			 //print 'Record count at:'.$finalCount.'<br />';
			//print var_dump($this->elements);
			//exit;	
			 
			 //check if entry exists--advance it to be comparing month's using the assessment tracker's info before updating or creating a new entry
			$this->section=$this->sectionEntryExists($this -> session -> userdata('fCode'),$this->input->post('step_name',TRUE));

		  //get the record count that will control the number of inserts to be done        
		  $this->noOfInsertsBatch=$finalCount;


		for($i=1; $i<=$this->noOfInsertsBatch;++$i){
			
			//print $this->elements[$i]['CommodityName'].'<br>';
	
			    //if no log entry, means, this this the first entry
				if($this->sectionExists !=true){
				
				//die('New entry, enter new one');
			  #new fields go here
			  $this -> theForm = new \models\Entities\e_stock(); //create an object of the model
			   $this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
			   $this -> theForm -> setStockDateOfInventory(new DateTime());
			   $this -> theForm -> setStockFacility($this -> session -> userdata('fCode')); /*timestamp option*/
				}else{
				//die('Duplicate entry, so update');
				try{
					$this -> theForm=$this->em->getRepository('models\Entities\e_stock')
					                       ->findOneBy( array('stockFacility'=>$this -> session -> userdata('fCode'),'placeFound'=>$this->elements[$i]['Unit'],'stockCommodityType'=>$this->elements[$i]['CommodityName']));
					$this -> theForm -> setUpdatedAt(new DateTime()); /*timestamp option*/	
					}catch(exception $ex){
						//ignore
						//die($ex->getMessage());
						return false;
					}
					
				}
				
				(isset($this->elements[$i]['StockSupplier']))?$this -> theForm -> setStockSupplier($this->elements[$i]['StockSupplier']):$this -> theForm -> setStockSupplier('n/a');
				(isset($this->elements[$i]['StockBatchNo']))?$this -> theForm -> setStockBatchNo($this->elements[$i]['StockBatchNo']):$this -> theForm -> setStockBatchNo(null);
				(isset($this->elements[$i]['StockQuantity']))?$this -> theForm -> setStockQuantity($this->elements[$i]['StockQuantity']):$this -> theForm -> setStockQuantity(-1);
				(isset($this->elements[$i]['StockDispensedDate']))?$this -> theForm -> setStockDateDispensed($this->elements[$i]['StockDispensedDate']):$this -> theForm -> setStockDateDispensed(null);
				(isset($this->elements[$i]['StockComments']))?$this -> theForm -> setStockComments($this->elements[$i]['StockComments']):$this -> theForm -> setStockComments('n/a');
				$this -> theForm -> setStockExpiryDate($this->elements[$i]['StockExpiryDate']);
				
				$this -> theForm -> setStockCommodityType($this->elements[$i]['CommodityName']);
				$this -> theForm -> setPlaceFound($this->elements[$i]['Unit']);
				$this -> em -> persist($this -> theForm);
				

				//now do a batched insert, default at 5
			 /**/ $this->batchSize=5;
			if($i % $this->batchSize==0){
			try{

				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				//return true;
				}catch(Exception $ex){
				  // die($ex->getMessage());
					//display user friendly message
					return false;

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
					//display user friendly message/

				}//end of catch 


			}//end of batch condition
			//on the last record to be inserted, log the process and return true;
			if($i==$this->noOfInsertsBatch){
			//die(print $i);
			 $this->writeAssessmentTrackerLog();
			 return true;
			}
			
					 } //end of innner loop	
					 
					 // return false;
	}//close addUnitCommoditiesInfo

	private function addORSCommoditiesInfo(){

		 $count=1;$finalCount=0;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(substr($key,0,3)=="ors"){//select data for ors commodities
			   //we separate the attribute name from the number

				  $this->frags = explode("_", $key);

				  $this->id = $this->frags[1];  // the id

				  //$this->id = $count;  // the id


				  $this->attr = $this->frags[0];//the attribute name

				   //mark the end of 1 row...for record count
				if($this->attr=="orsStockComments"){
					//print 'count at:'.$count.'<br />';
					$finalCount=$count;
					 $count++;
				}


				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					 $this->elements[$this->id][$this->attr]=htmlentities($val);
					//$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   	$this->elements[$this->attr]='';
				   }
				  // print $this->attr.' val='.$val.' id='.$this->id.' <br />';

			 }//close if(substr($key,0,3)=="ors")

			 }//close foreach ($this -> input -> post() as $key => $val)

			// print 'Record count at:'.$finalCount.'<br />';

			// exit;	

		 //get the highest value of the array that will control the number of inserts to be done

		$this->noOfInsertsBatch=$finalCount;		 

		for($i=1; $i<=$this->noOfInsertsBatch;++$i){

				//insert facility if new, else update the existing one
			   $this -> theForm = new \models\Entities\E_Stock(); //create an object of the model

		       //return the id of the last ORT assessment insert to use it in this subsequent equipment assessment

				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> theForm -> setStockBatchNo($this->elements[$i]['orsStockBatchNo']);
				$this -> theForm -> setStockQuantity($this->elements[$i]['orsStockQuantity']);
				$this -> theForm -> setStockDateDispensed($this->elements[$i]['orsStockDispensedDate']);
				$this -> theForm -> setStockSupplier($this->elements[$i]['orsStockSupplier']);
				$this -> theForm -> setStockExpiryDate($this->elements[$i]['orsStockExpiryDate']);
				$this -> theForm -> setStockComments($this->elements[$i]['orsStockComments']);
				$this -> theForm -> setStockCommodityType($this->elements[$i]['orsCommodityName']);
				$this -> theForm -> setStockFacility($this->input->post('facilityMFC'));
				$this -> theForm -> setStockDateOfInventory($this->input->post('facilityDateOfInventory'));
				$this -> em -> persist($this -> theForm);

						//now do a batched insert, default at 5
			  $this->batchSize=5;
			if($i % $this->batchSize==0){
			try{

				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				}catch(Exception $ex){
				    //die($ex->getMessage());
					/*display user friendly message*/
                    return false;
				}//end of catch

			} else if($i<$this->batchSize || $i>$this->batchSize || $i==$this->noOfInsertsBatch && 
			$this->noOfInsertsBatch-$i<$this->batchSize){
				 //total records less than a batch, insert all of them
				try{

				$this -> em -> flush();
				$this->em->clear(); //detactes all objects from doctrine
				}catch(Exception $ex){
					//die($ex->getMessage());
					/*display user friendly message*/
					return false;

				}//end of catch


			}//end of batch condition
					 } //end of innner loop	
	}// addORSCommoditiesInfo();

	//fetch prexisting data about the facilities
	public function retrieveMFLInformation(){
		$this->countyList=$this->getAllCountyNames();
		$this->districtList=$this->getAllDistrictNames();
		$this->fTypeList=$this->getAllFacilityTypes();
		$this->fLevelList=$this->getAllFacilityLevels();
		$this->fOwnerList=$this->getAllFacilityOwnerNames();
		$this->provinceList=$this->getAllProvinceNames();
		$this->dbSessionValues=array($this->district,$this->county,$this->fTypeList,$this->fLevelList,$this->fOwnerList,$this->provinceList);
		//var_dump($this->dbSessionValues[3]);exit;
		return $this->dbSessionValues;
	}


	/*retrieve form files by factory*/
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

	}/*close retrieveForms($factory)*/

}//end of class M_Zinc_Ors_Inventory 