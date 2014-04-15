<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *model to persist data for mnh form
 */

class M_MNH_Survey  extends MY_Model {
	var $id, $attr, $frags, $elements, $noOfInserts, $batchSize, $mfcCode, $suppliesList, $facility, $commodity, $isFacility, $commodityList, $supplierList, $signalFunctionList, $trainingGuidelinesList, $facilityList, $countyList, $districtList, $facilityOwnerList, $specificDistrictList, $facilityLevelList, $facilityTypeList, $isDistrict, $mnhWaterAspectList, $mnhCeocQuestionsList;

	function __construct() {
		parent::__construct();
		$this -> isFacility = 'false';
		$this -> isDistrict = 'false';
		$this -> commodityList = $this -> countyList = $this -> facilityTypeList = $this -> specificDistrictList = $this -> districtList = $this -> facilityLevelList = $this -> facilityOwnerList = $this -> signalFunctionList = $this -> supplierList = $this -> trainingGuidelinesList = $this -> suppliesList = '';

	}

	/*calls the query defined in MY_Model*/
	public function getCommodityNames() {
		$this -> commodityList = $this -> getAllCommodityNames('mnh');
		//var_dump($this->commodityList);die;
		return $this -> commodityList;
	}

	public function getEquipmentNames($for) {
		$this -> equipmentList = $this -> getAllEquipmentNames($for);
		//var_dump($this->equipmentList);die;
		return $this -> equipmentList;
	}

	public function getSupplyNames() {
		$this -> suppliesList = $this -> getAllSupplyNames('mnh');
		//var_dump($this->suppliesList);die;
		return $this -> suppliesList;
	}

	public function getOtherSupplyNames() {
		$this -> suppliesList = $this -> getAllSupplyNames('mh');
		//var_dump($this->suppliesList);die;
		return $this -> suppliesList;
	}

	/*calls the query defined in MY_Model*/
	public function getOtherSupplierNames() {
		$this -> supplierList = $this -> getAllCommoditySupplierNames('mh');
		//var_dump($this->supplierList);die;
		return $this -> supplierList;
	}

	/*calls the query defined in MY_Model*/
	public function getMnhWaterAspectQuestions() {
		$this -> mnhWaterAspectList = $this -> getQuestionsBySection('mnhw','QMNH');
		//var_dump($this->mnhWaterAspectList);die;
		return $this -> mnhWaterAspectList;
	}

	/*calls the query defined in MY_Model*/
	public function getMnhCommunityStrategy() {
		$data = $this -> getQuestionsBySection('cms','QMNH');
		//var_dump($this->mnhWaterAspectList);die;
		return $data;
	}

	/*calls the query defined in MY_Model*/
	public function getMnhCeocAspectQuestions() {
		$this -> mnhCeocQuestionsList = $this -> getQuestionsBySection('ceoc','QMNH');
		//var_dump($this->mnhCeocQuestionsList);die;
		return $this -> mnhCeocQuestionsList;
	}

	/*calls the query defined in MY_Model*/
	public function getMnhPostNatalAspectQuestions() {
		$this -> mnhCeocQuestionsList = $this -> getQuestionsBySection('pnat','QMNH');
		//var_dump($this->mnhCeocQuestionsList);die;
		return $this -> mnhCeocQuestionsList;
	}

	/*calls the query defined in MY_Model*/
	public function getMnhWasteDisposalAspectQuestions() {
		$this -> mnhCeocQuestionsList = $this -> getQuestionsBySection('waste','QMN');
		//var_dump($this->mnhCeocQuestionsList);die;
		return $this -> mnhCeocQuestionsList;
	}

	/*calls the query defined in MY_Model*/
	public function getMnhCommitteeAspectQuestions() {
		$this -> mnhCeocQuestionsList = $this -> getQuestionsBySection('commi','QMNH');
		//var_dump($this->mnhCeocQuestionsList);die;
		return $this -> mnhCeocQuestionsList;
	}

	/*calls the query defined in MY_Model*/
	public function getMnhNewbornAspectQuestions() {
		$this -> mnhCeocQuestionsList = $this -> getQuestionsBySection('newb','QMNH');
		//var_dump($this->mnhCeocQuestionsList);die;
		return $this -> mnhCeocQuestionsList;
	}


	/*calls the query defined in MY_Model*/
	public function getMnhBedsAspectQuestions() {
		$this -> mnhCeocQuestionsList = $this -> getQuestionsBySection('bed','QMNH');
		//var_dump($this->mnhCeocQuestionsList);die;
		return $this -> mnhCeocQuestionsList;
	}

/*calls the query defined in MY_Model*/
	public function getMnhServicesAspectQuestions() {
		$this -> mnhCeocQuestionsList = $this -> getQuestionsBySection('serv','QMNH');
		//var_dump($this->mnhCeocQuestionsList);die;
		return $this -> mnhCeocQuestionsList;
	}
	
	/*calls the query defined in MY_Model*/
	public function getMnhKangarooAspectQuestions() {
		$this -> mnhCeocQuestionsList = $this -> getQuestionsBySection('kang','QMNH');
		//var_dump($this->mnhCeocQuestionsList);die;
		return $this -> mnhCeocQuestionsList;
	}

	/*calls the query defined in MY_Model*/
	public function getCommoditySupplierNames() {
		$this -> supplierList = $this -> getAllCommoditySupplierNames('mnh');
		//var_dump($this->supplierList);die;
		return $this -> supplierList;
	}

	/*calls the query defined in MY_Model*/
	public function getSignalFunctions() {
		$this -> signalFunctionList = $this -> getAllSignalFunctions();
		//var_dump($this->signalFunctionList);die;
		return $this -> signalFunctionList;
	}

	/*calls the query defined in MY_Model*/
	public function getTrainingGuidelines() {
		$this -> trainingGuidelinesList = $this -> getAllTrainingGuidelines('mnh');
		//var_dump($this->trainingGuidelinesList);die;
		return $this -> trainingGuidelinesList;
	}

	public function getFacilityNames() {
		$this -> facilityList = $this -> getAllFacilityNames();
		//var_dump($this->facilityList);die;
		return $this -> facilityList;
	}

	public function getSpecificFacilityNames($mfc) {
		$this -> facilityList = $this -> getSpecificFacilityNames($mfc);
		//var_dump($this->facilityList);die;
		return $this -> facilityList;
	}

	public function getCountyNames() {
		$this -> countyList = $this -> getAllCountyNames();
		//var_dump($this->countyList);die;
		return $this -> countyList;
	}

	public function getDistrictNames() {
		$this -> districtList = $this -> getAllDistrictNames();
		//var_dump($this->districtList);die;
		return $this -> districtList;
	}

	public function getAllDistrictNamesByCounty($county) {
		$this -> specificDistrictList = $this -> getAllDistrictNamesByCounty($county);
		//var_dump($this->districtList);die;
		return $this -> specificDistrictList;
	}

	public function getFacilityOwnerNames() {
		//$this->facilityOwnerList=$this->getAllFacilityOwnerNames();
		$this -> facilityOwnerList = $this -> getAllFacilityOwnerNames();
		//var_dump($this->facilityOwnerList);die;
		return $this -> facilityOwnerList;
	}

	public function getFacilityLevelNames() {
		$this -> facilityLevelList = $this -> getAllFacilityLevels();
		//var_dump($this->facilityLevelList);die;
		return $this -> facilityLevelList;
	}

	public function getFacilityTypeNames() {
		$this -> facilityTypeList = $this -> getAllGovernmentFacilityTypes();
		//var_dump($this->facilityTypeList);die;
		return $this -> facilityTypeList;
	}

	//new mnh sections
	/*calls the query defined in MY_Model*/
	public function getNursesAspectQuestions() {
		$this -> mnhCeocQuestionsList = $this -> getQuestionsBySection('nur','QMNH');
		//var_dump($this->mnhCeocQuestionsList);die;
		return $this -> mnhCeocQuestionsList;
	}

	//new mnh sections
	/*calls the query defined in MY_Model*/
	public function getMnhHIVTestingAspectQuestions() {
		$this -> mnhCeocQuestionsList = $this -> getQuestionsBySection('hiv','QMNH');
		//var_dump($this->mnhCeocQuestionsList);die;
		return $this -> mnhCeocQuestionsList;
	}

	public function getMnhPreparednessTestingAspectQuestions() {
		$this -> mnhCeocQuestionsList = $this -> getQuestionsBySection('prep','QMNH');
		//var_dump($this->mnhCeocQuestionsList);die;
		return $this -> mnhCeocQuestionsList;
	}

	public function getMnhGuidelinesAspectQuestions() {
		$this -> mnhCeocQuestionsList = $this -> getQuestionsBySection('guide','QMNH');
		//var_dump($this->mnhCeocQuestionsList);die;
		return $this -> mnhCeocQuestionsList;
	}

	public function getMnhJobAidsAspectQuestions() {
		$this -> mnhCeocQuestionsList = $this -> getQuestionsBySection('commi','QMNH');
		//var_dump($this->mnhCeocQuestionsList);die;
		return $this -> mnhCeocQuestionsList;
	}

	public function verifyRespondedByDistrict() {
		if ($this -> input -> post()) {//check if a post was made

			//die(var_dump($this->input->post()));

			//Working with an object of the entity
			try {
				$this -> district = $this -> em -> getRepository('models\Entities\Districts') -> findOneBy(array('districtId' => $this -> input -> post('username', TRUE), 'districtAccessCode' => md5($this -> input -> post('usercode', TRUE))));

				if ($this -> district) {
					return $this -> isDistrict = 'true';
				} else {
					return $this -> isDistrict = 'false';
				}
			} catch(exception $ex) {
				//ignore
				//die($ex->getMessage());
			}

		}//close the this->input->post
	}/*close verifyRespondedByDistrict*/

	public function getFacilitiesByDistrict($district) {
		//$this->getAllGovernmentOwnedFacilitiesByDistrict($district);
		$this -> getAllFacilitiesByDistrict($district);

		//echo count($this->districtFacilities);die;

	}

	public function getFacilitiesByDistrictOptions($district) {
		$myOptions = '';
		//$this->getAllGovernmentOwnedFacilitiesByDistrict($district);
		$options = $this -> getAllFacilitiesByDistrictOptions($district);
		//var_dump($options);
		foreach ($options as $option) {
			$myOptions .= '<option value=' . $option['fac_mfl'] . '>' . $option['fac_name'] . '</option>';
		}
		return $myOptions;
		//echo count($this->districtFacilities);die;

	}

	/*retrieve facility mfl info*/
	function retrieveFacilityInfo($mfc) {
		/*using DQL*/
		try {
			//geting server side param: $store=$this->uri->segment(param_position_from_base_url);
			$query = $this -> em -> createQuery('SELECT f FROM models\Entities\Facilities f WHERE f.facMfl = :facilityMFL');
			$query -> setParameter('facilityMFL', $mfc);

			$this -> formRecords = $query -> getArrayResult();

			if (max($this -> formRecords) != 0)
				$this -> response = array('rData' => $this -> formRecords);
			//json format
			$this -> formRecords = json_encode($this -> response);
			// var_dump($this->formRecords);

		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());
			return false;
		}

		return true;

	}/*close retrieveFacilityInfo($mfc)*/

	function addRecord() {
		$s = microtime(true);
		/*mark the timestamp at the beginning of the transaction*/

		$this -> elements = array();
		$this -> theIds = array();

		if ($this -> input -> post()) {//check if a post was made

			#just a thought..thread this for performance...??

			// $this->updateFacilityInfo();
			//$this->addDeliveryByMonthInfo();
			//$this->addBemoncSignalFunctionsInfo();
			//$this->addCommodityQuantityAvailabilityInfo();
			//$this->addGuidelinesStaffInfo();
			//$this->addCommodityUsageAndStockOutageInfo();

			//exit;

		}//close the this->input->post
		$e = microtime(true);
		$this -> executionTime = round($e - $s, '4');
		$this -> rowsInserted = $this -> noOfInsertsBatch;
		return $this -> response = 'ok';
	}//end of addRecord()

	private function addDeliveryByMonthInfo() {
		$this -> elements = array();
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'dn') !== FALSE) {//select data for number of deliveries
				$this -> attr = $key;
				//the attribute name

				//split into 2 years: 2012 & 2013 --for later :-)

				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					// $this->elements[$this->id][$this->attr]=htmlentities($val);

					$this -> elements[$this -> attr] = htmlentities($val);
				} else {
					$this -> elements[$this -> attr] = '';
				}
				//print $key.' val='.$val.' <br />';
			}

		}//close foreach ($this -> input -> post() as $key => $val)

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = 1;
		//labour and delivery Qn5 to 8 will have a single response each

		for ($i = 1; $i <= $this -> noOfInsertsBatch; ++$i) {

			//insert facility if new, else update the existing one
			//$this -> theForm = new \models\Entities\E_Deliveries_No_Log;
			$this -> theForm = new \models\Entities\Deliveries;
			
			//create an object of the model

			$this -> theForm -> setDelCreated(new DateTime());
			/*timestamp option*/
			$this -> theForm -> setFacMfl($this -> session -> userdata('facilityMFL'));
			/*if no value set, then set to -1*/
			/**/(!isset($this -> elements['dnjanuary_12'])) ? $this -> theForm -> setJan12(-1) : $this -> theForm -> setJan12($this -> elements['dnjanuary_12']);
			(!isset($this -> elements['dnfebruary_12'])) ? $this -> theForm -> setFeb12(-1) : $this -> theForm -> setFeb12($this -> elements['dnfebruary_12']);
			(!isset($this -> elements['dnmarch_12'])) ? $this -> theForm -> setMar12(-1) : $this -> theForm -> setMar12($this -> elements['dnmarch_12']);
			(!isset($this -> elements['dnapril_12'])) ? $this -> theForm -> setApr12(-1) : $this -> theForm -> setApr12($this -> elements['dnapril_12']);
			(!isset($this -> elements['dnmay_12'])) ? $this -> theForm -> setMay12(-1) : $this -> theForm -> setMay12($this -> elements['dnmay_12']);
			(!isset($this -> elements['dnjune_12'])) ? $this -> theForm -> setJun12(-1) : $this -> theForm -> setJun12($this -> elements['dnjune_12']);
			(!isset($this -> elements['dnjuly_12'])) ? $this -> theForm -> setJul12(-1) : $this -> theForm -> setJul12($this -> elements['dnjuly_12']);
			(!isset($this -> elements['dnaugust_12'])) ? $this -> theForm -> setAug12(-1) : $this -> theForm -> setAug12($this -> elements['dnaugust_12']);
			(!isset($this -> elements['dnseptember_12'])) ? $this -> theForm -> setSep12(-1) : $this -> theForm -> setSep12($this -> elements['dnseptember_12']);
			(!isset($this -> elements['dnoctober_12'])) ? $this -> theForm -> setOct12(-1) : $this -> theForm -> setOct12($this -> elements['dnoctober_12']);
			(!isset($this -> elements['dnnovember_12'])) ? $this -> theForm -> setNov12(-1) : $this -> theForm -> setNov12($this -> elements['dnnovember_12']);
			(!isset($this -> elements['dndecember_12'])) ? $this -> theForm -> setDec12(-1) : $this -> theForm -> setDec12($this -> elements['dndecember_12']);
			/**/
			(!isset($this -> elements['dnjanuary_13'])) ? $this -> theForm -> setJan13(-1) : $this -> theForm -> setJan13($this -> elements['dnjanuary_13']);
			(!isset($this -> elements['dnfebruary_13'])) ? $this -> theForm -> setFeb13(-1) : $this -> theForm -> setFeb13($this -> elements['dnfebruary_13']);
			(!isset($this -> elements['dnmarch_13'])) ? $this -> theForm -> setMar13(-1) : $this -> theForm -> setMar13($this -> elements['dnmarch_13']);
			(!isset($this -> elements['dnapril_13'])) ? $this -> theForm -> setApr13(-1) : $this -> theForm -> setApr13($this -> elements['dnapril_13']);
			(!isset($this -> elements['dnmay_13'])) ? $this -> theForm -> setMay13(-1) : $this -> theForm -> setMay13($this -> elements['dnmay_13']);
			(!isset($this -> elements['dnjune_13'])) ? $this -> theForm -> setJun13(-1) : $this -> theForm -> setJun13($this -> elements['dnjune_13']);
			(!isset($this -> elements['dnjuly_13'])) ? $this -> theForm -> setJuly13(-1) : $this -> theForm -> setJuly13($this -> elements['dnjuly_13']);
			(!isset($this -> elements['dnaugust_13'])) ? $this -> theForm -> setAug13(-1) : $this -> theForm -> setAug13($this -> elements['dnaugust_13']);
			(!isset($this -> elements['dnseptember_13'])) ? $this -> theForm -> setSept13(-1) : $this -> theForm -> setSept13($this -> elements['dnseptember_13']);
			(!isset($this -> elements['dnoctober_13'])) ? $this -> theForm -> setOct13(-1) : $this -> theForm -> setOct13($this -> elements['dnoctober_13']);
			(!isset($this -> elements['dnnovember_13'])) ? $this -> theForm -> setNov13(-1) : $this -> theForm -> setNov13($this -> elements['dnnovember_13']);
			(!isset($this -> elements['dndecember_13'])) ? $this -> theForm -> setDec13(-1) : $this -> theForm -> setDec13($this -> elements['dndecember_13']);

			//$this -> theForm -> setDateOfAssessment(new DateTime()); //date set today's
			$this -> em -> persist($this -> theForm);

			try {//now do a batched insert

				$this -> em -> flush();
				$this -> em -> clear();
				//detaches all objects from doctrine
				return true;
			} catch(Exception $ex) {
				//die($ex->getMessage());
				return false;
				/*display user friendly message*/

			}//end of catch

		} //end of innner loop
	}//close addDeliveryByMonthInfo()

	private function addMnhCommunityStrategyInfo() {
		$this -> elements = array();
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'mnhCommunity') !== FALSE) {//select data for mnh community strategy
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "mnhCommunityStrategyQCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		// print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {
			//echo $this -> elements[$i]['mnhCommunityStrategyQCode'];
			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\LogQuestions();
			//create an object of the model

			$this -> theForm -> setQuestionCode($this -> elements[$i]['mnhCommunityStrategyQCode']);
			$this -> theForm -> setFacMfl($this -> session -> userdata('facilityMFL'));
			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['mnhCommunityStrategy'])) ? $this -> theForm -> setLqResponseCount((int)$this -> elements[$i]['mnhCommunityStrategy']) : $this -> theForm -> setLqResponseCount(0);
			$this -> theForm -> setLqResponse('n/a');
			$this -> theForm -> setLqReason('n/a');

			$this -> theForm -> setLqSpecifiedOrFollowUp('n/a');

			$this -> theForm -> setLqCreated(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop
	}//close addJobAidsInfo()

	private function addBemoncSignalFunctionsInfo() {
		$this -> elements = array();
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'bmsf') !== FALSE) {//select data for bemonc signal functions
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "bmsfSignalCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		//print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch; ++$i) {

			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\BemoncFunctions();
			//create an object of the model

			//$this -> theForm -> setSignalFunctionsID($this -> elements[$i]['bmsfSignalCode']);
			$this -> theForm -> setSfacilityMFL($this -> session -> userdata('facilityMFL'));
			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['bmsfSignalFunctionConducted'])) ? $this -> theForm -> setBemConducted($this -> elements[$i]['bmsfSignalFunctionConducted']) : $this -> theForm -> setBemConducted("N/A");
			$this -> theForm -> setChallengeCode($this -> elements[$i]['bmsfChallenge']);
			$this -> theForm -> setBemCreated(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine
					//return true;
				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine
					//return true;
				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

				//on the last record to be inserted, log the process and return true;
				if ($i == $this -> noOfInsertsBatch) {
					//die(print $i);
					// $this->writeAssessmentTrackerLog();
					return true;
				}

			}
			//end of batch condition
		} //end of innner loop

	}//close addBemoncSignalFunctionsInfo

	private function addCEOCServicesInfo() {
		$this -> elements = array();
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'mnhceoc') !== FALSE) {//select data for mnh community strategy
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "mnhceocAspectCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		// print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {
			//echo $this -> elements[$i]['mnhceocReason'];exit;
			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\LogQuestions();
			//create an object of the model

			$this -> theForm -> setQuestionCode($this -> elements[$i]['mnhceocAspectCode']);
			$this -> theForm -> setFacMfl($this -> session -> userdata('facilityMFL'));
			$this -> theForm -> setLqResponseCount(0);
			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['mnhceocAspectResponse'])) ? $this -> theForm -> setLqResponse($this -> elements[$i]['mnhceocAspectResponse']) : $this -> theForm -> setLqResponse('n/a');

			//check if there's a reason
			if (isset($this -> elements[$i]['mnhceocReason'])) {
				($this -> elements[$i]['mnhceocReason'] == 'Other') ? $this -> theForm -> setLqReason($this -> elements[$i]['mnhceocReasonOther']) : $this -> theForm -> setLqReason($this -> elements[$i]['mnhceocReason']);
			} else {
				$this -> theForm -> setLqReason('n/a');
			}

			//check if there's a follow up qn
			if (isset($this -> elements[$i]['mnhceocFollowUp'])) {
				//check if reason is 'Other'
				//if($this -> elements[$i]['mnhceocFollowUp'] != ''
				($this -> elements[$i]['mnhceocFollowUp'] == 'Other') ? $this -> theForm -> setLqSpecifiedOrFollowUp($this -> elements[$i]['mnhceocFollowUpOther']) : $this -> theForm -> setLqSpecifiedOrFollowUp($this -> elements[$i]['mnhceocFollowUp']);
			} else {
				$this -> theForm -> setLqSpecifiedOrFollowUp('n/a');
			}

			$this -> theForm -> setLqCreated(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop
	}//close addCEOCServicesInfo()

	private function addServicesInfo() {
		$this -> elements = array();
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'service') !== FALSE) {//select data for mnh community strategy
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "serviceAspectCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		// print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {
			//echo $this -> elements[$i]['mnhceocReason'];exit;
			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\LogQuestions();
			//create an object of the model

			$this -> theForm -> setQuestionCode($this -> elements[$i]['serviceAspectCode']);
			$this -> theForm -> setFacMfl($this -> session -> userdata('facilityMFL'));
			//check if that key exists, else set it to some default value
			$this -> theForm -> setLqResponseCount(0);
			(isset($this -> elements[$i]['serviceAspect'])) ? $this -> theForm -> setLqResponse($this -> elements[$i]['serviceAspect']) : $this -> theForm -> setLqResponse('n/a');

			$this -> theForm -> setLqReason('n/a');

			$this -> theForm -> setLqSpecifiedOrFollowUp('n/a');

			$this -> theForm -> setLqCreated(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop
	}//close addHIVTestingInfo()
	
	private function addCommitteeInfo() {
		$this -> elements = array();
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'committee') !== FALSE) {//select data for mnh community strategy
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "committeeAspectCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		// print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {
			//echo $this -> elements[$i]['mnhceocReason'];exit;
			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\LogQuestions();
			//create an object of the model

			$this -> theForm -> setQuestionCode($this -> elements[$i]['committeeAspectCode']);
			$this -> theForm -> setFacMfl($this -> session -> userdata('facilityMFL'));
			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['committeeAspectResponse'])) ? $this -> theForm -> setLqResponse($this -> elements[$i]['committeeAspectResponse']) : $this -> theForm -> setLqResponse('n/a');

			(isset($this -> elements[$i]['committeeCount'])) ? $this -> theForm -> setLqResponseCount($this -> elements[$i]['committeeCount']) : $this -> theForm -> setLqResponseCount(0);

			$this -> theForm -> setLqReason('n/a');

			$this -> theForm -> setLqSpecifiedOrFollowUp('n/a');

			$this -> theForm -> setLqCreated(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop
	}//close addHIVTestingInfo()
	
	private function addNewbornInfo() {
		$this -> elements = array();
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'newborn') !== FALSE) {//select data for mnh community strategy
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "newbornAspectCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		// print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {
			//echo $this -> elements[$i]['mnhceocReason'];exit;
			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\LogQuestions();
			//create an object of the model

			$this -> theForm -> setQuestionCode($this -> elements[$i]['newbornAspectCode']);
			$this -> theForm -> setFacMfl($this -> session -> userdata('facilityMFL'));
			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['newbornAspectResponse'])) ? $this -> theForm -> setLqResponse($this -> elements[$i]['newbornAspectResponse']) : $this -> theForm -> setLqResponse('n/a');

			(isset($this -> elements[$i]['newbornCount'])) ? $this -> theForm -> setLqResponseCount($this -> elements[$i]['newbornCount']) : $this -> theForm -> setLqResponseCount(0);

			//check if there's a reason
			if (isset($this -> elements[$i]['newbornReason'])) {
				($this -> elements[$i]['newbornReason'] == 'Other') ? $this -> theForm -> setLqReason($this -> elements[$i]['newbornReasonOther']) : $this -> theForm -> setLqReason($this -> elements[$i]['newbornReason']);
			} else {
				$this -> theForm -> setLqReason('n/a');
			}

			$this -> theForm -> setLqSpecifiedOrFollowUp('n/a');

			$this -> theForm -> setLqCreated(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop
	}//close addHIVTestingInfo()
	
	private function addWasteDisposalInfo() {
		$this -> elements = array();
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'wastedisposal') !== FALSE) {//select data for mnh community strategy
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "wastedisposalAspectCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		// print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {
			//echo $this -> elements[$i]['mnhceocReason'];exit;
			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\questions_Log();
			//create an object of the model

			$this -> theForm -> setQuestionID($this -> elements[$i]['wastedisposalAspectCode']);
			$this -> theForm -> setFacilityCode($this -> session -> userdata('facilityMFL'));
			//check if that key exists, else set it to some default value
			 $this -> theForm -> setResponse('n/a');

			 $this -> theForm -> setResponseCount(0);

			//check if there's a reason
			if (isset($this -> elements[$i]['wastedisposalReason'])) {
				($this -> elements[$i]['wastedisposalReason'] == 'Other') ? $this -> theForm -> setReasonForResponse($this -> elements[$i]['wastedisposalReasonOther']) : $this -> theForm -> setReasonForResponse($this -> elements[$i]['wastedisposalReason']);
			} else {
				$this -> theForm -> setReasonForResponse('n/a');
			}

			$this -> theForm -> setSpecifedOrFollowUp('n/a');

			$this -> theForm -> setCreatedAt(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop
	}//close addHIVTestingInfo()
	
	private function addNurseInfo() {
		$this -> elements = array();
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'nurse') !== FALSE) {//select data for mnh community strategy
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "nurseAspectCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		// print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {
			//echo $this -> elements[$i]['mnhceocReason'];exit;
			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\LogQuestions();
			//create an object of the model

			$this -> theForm -> setQuestionCode($this -> elements[$i]['nurseAspectCode']);
			$this -> theForm -> setFacMfl($this -> session -> userdata('facilityMFL'));
			//check if that key exists, else set it to some default value
			$this -> theForm -> setLqResponse('n/a');
			(isset($this -> elements[$i]['nurseCount'])) ? $this -> theForm -> setLqResponseCount($this -> elements[$i]['nurseCount']) : $this -> theForm -> setLqResponseCount(0);

			$this -> theForm -> setLqReason('n/a');
			
			$this -> theForm -> setLqSpecifiedOrFollowUp('n/a');

			$this -> theForm -> setLqCreated(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop
	}//close addHIVTestingInfo()
	
	private function addBedsInfo() {
		$this -> elements = array();
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'bed') !== FALSE) {//select data for mnh community strategy
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "bedAspectCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		// print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {
			//echo $this -> elements[$i]['mnhceocReason'];exit;
			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\LogQuestions();
			//create an object of the model

			$this -> theForm -> setQuestionCode($this -> elements[$i]['bedAspectCode']);
			$this -> theForm -> setFacMfl($this -> session -> userdata('facilityMFL'));
			//check if that key exists, else set it to some default value
			$this -> theForm -> setLqResponse('n/a');
			(isset($this -> elements[$i]['bedCount'])) ? $this -> theForm ->setLqResponseCount($this -> elements[$i]['bedCount']) : $this -> theForm ->setLqResponseCount(0);

			$this -> theForm -> setLqResponse('n/a');

			$this -> theForm -> setLqSpecifiedOrFollowUp('n/a');

			$this -> theForm -> setLqCreated(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop
	}//close addHIVTestingInfo()
	
	private function addKangarooInfo() {
		$this -> elements = array();
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'kangaroo') !== FALSE) {//select data for mnh community strategy
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "kangarooAspectCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		// print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {
			//echo $this -> elements[$i]['mnhceocReason'];exit;
			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\LogQuestions();
			//create an object of the model

			$this -> theForm -> setQuestionCode($this -> elements[$i]['kangarooAspectCode']);
			$this -> theForm -> setFacMfl($this -> session -> userdata('facilityMFL'));
			//check if that key exists, else set it to some default value
			//$this -> theForm -> setResponse('n/a');
			(isset($this -> elements[$i]['kangarooAspect'])) ? $this -> theForm -> setLqResponse($this -> elements[$i]['kangarooAspect']) : $this -> theForm -> setLqResponse('n/a');
	
			$this -> theForm -> setLqResponseCount(0);
			$this -> theForm -> setLqReason('n/a');

			$this -> theForm -> setLqSpecifiedOrFollowUp('n/a');

			$this -> theForm -> setLqCreated(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop
	}//close addHIVTestingInfo()

	private function addGuidelinesInfo() {
		$this -> elements = array();
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'mnhGuidelines') !== FALSE) {//select data for mnh community strategy
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "mnhGuidelinesAspectCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		// print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {
			//echo $this -> elements[$i]['mnhceocReason'];exit;
			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\logQuestions();
			//create an object of the model

			$this -> theForm -> setQuestionCode($this -> elements[$i]['mnhGuidelinesAspectCode']);
			$this -> theForm -> setFacMfl($this -> session -> userdata('facilityMFL'));
			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['mnhGuidelinesAspectResponse'])) ? $this -> theForm -> setLqResponse($this -> elements[$i]['mnhGuidelinesAspectResponse']) : $this -> theForm -> setLqResponse('n/a');
			(isset($this -> elements[$i]['mnhGuidelinesAspectCount'])) ? $this -> theForm -> setLqResponseCount($this -> elements[$i]['mnhGuidelinesAspectCount']) : $this -> theForm -> setLqResponseCount(0);

			$this -> theForm -> setLqReason('n/a');

			$this -> theForm ->  setLqSpecifiedOrFollowUp('n/a');

			$this -> theForm -> setLqCreated(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop
	}//close addHIVTestingInfo()

	private function addHIVTestingInfo() {
		$this -> elements = array();
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'mnhHIV') !== FALSE) {//select data for mnh community strategy
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "mnhHIVAspectCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		// print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {
			//echo $this -> elements[$i]['mnhHIVReason'];exit;
			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\LogQuestions();
			//create an object of the model

			$this -> theForm -> setQuestionCode($this -> elements[$i]['mnhHIVAspectCode']);
			$this -> theForm -> setFacMfl($this -> session -> userdata('facilityMFL'));
			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['mnhHIVAspectResponse'])) ? $this -> theForm -> setLqResponse($this -> elements[$i]['mnhHIVAspectResponse']) : $this -> theForm -> setLqResponse('n/a');

			//check if there's a reason
			if (isset($this -> elements[$i]['mnhHIVReason'])) {
				($this -> elements[$i]['mnhHIVReason'] == 'Other') ? $this -> theForm -> setReason($this -> elements[$i]['mnhHIVReasonOther']) : $this -> theForm -> setLqReason($this -> elements[$i]['mnhHIVReason']);
			} else {
				$this -> theForm -> setLqReason('n/a');
			}
			$this -> theForm -> setLqReason('n/a');
			$this -> theForm -> setLqResponseCount(0);
			$this -> theForm -> setLqSpecifiedOrFollowUp('n/a');

			$this -> theForm -> setLqCreated(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop
	}//close addHIVTestingInfo()

	private function addPreparednessInfo() {
		$this -> elements = array();
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'mnhPreparedness') !== FALSE) {//select data for mnh community strategy
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "mnhPreparednessAspectCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		// print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;
		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {
			//echo $this -> elements[$i]['mnhPreparednessReason'];exit;
			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\LogQuestions();
			//create an object of the model

			$this -> theForm -> setQuestionCode($this -> elements[$i]['mnhPreparednessAspectCode']);
			$this -> theForm -> setFacMfl($this -> session -> userdata('facilityMFL'));
			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['mnhPreparednessAspectResponse'])) ? $this -> theForm -> setLqResponse($this -> elements[$i]['mnhPreparednessAspectResponse']) : $this -> theForm -> setLqResponse('n/a');

			$this -> theForm -> setLqReason('n/a');
			$this -> theForm -> setLqResponseCount(0);
			$this -> theForm -> setLqSpecifiedOrFollowUp('n/a');

			$this -> theForm -> setlqCreated(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop
	}//close addGuidelinesInfo()

	private function addJobAidsInfo() {
		$this -> elements = array();
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'mnhJobAids') !== FALSE) {//select data for mnh community strategy
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "mnhJobAidsAspectCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		// print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {
			//echo $this -> elements[$i]['mnhJobAidsReason'];exit;
			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\LogQuestions();
			//create an object of the model

			$this -> theForm -> setQuestionCode($this -> elements[$i]['mnhJobAidsAspectCode']);
			$this -> theForm -> setFacMfl($this -> session -> userdata('facilityMFL'));
			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['mnhJobAidsAspectResponse'])) ? $this -> theForm -> setLqResponse($this -> elements[$i]['mnhJobAidsAspectResponse']) : $this -> theForm -> setLqResponse('n/a');
			(isset($this -> elements[$i]['mnhJobAidsAspectCount'])) ? $this -> theForm -> setLqResponseCount($this -> elements[$i]['mnhJobAidsAspectCount']) : $this -> theForm -> setLqResponseCount(0);

			$this -> theForm -> setLqReason('n/a');

			$this -> theForm -> setLqSpecifiedOrFollowUp('n/a');

			$this -> theForm -> setLqCreated(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop
	}//close addJobAidsInfo()

	private function addMNHWaterSourceAspectsInfo() {
		$this -> elements = array();
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'mnhwAspect') !== FALSE) {//select data for mnh community strategy
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "mnhwAspectCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		// print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {
			//echo $this -> elements[$i]['mnhceocReason'];exit;
			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\questions_Log();
			//create an object of the model

			$this -> theForm -> setQuestionID($this -> elements[$i]['mnhwAspectCode']);
			$this -> theForm -> setFacilityCode($this -> session -> userdata('facilityMFL'));
			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['mnhwAspectResponse'])) ? $this -> theForm -> setResponse($this -> elements[$i]['mnhwAspectResponse']) : $this -> theForm -> setResponse('n/a');

			//no input needed for reason for response
			$this -> theForm -> setReasonForResponse('n/a');
			$this -> theForm -> setResponseCount(0);
			//check if there's a follow up answer
			if (isset($this -> elements[$i]['mnhwAspectWaterSpecify'])) {
				//check if reason is 'Other'
				//if($this -> elements[$i]['mnhceocFollowUp'] != ''
				($this -> elements[$i]['mnhwAspectWaterSpecify'] != '') ? $this -> theForm -> setSpecifedOrFollowUp($this -> elements[$i]['mnhwAspectWaterSpecify']) : $this -> theForm -> setSpecifedOrFollowUp('n/a');
			} else {
				$this -> theForm -> setSpecifedOrFollowUp('n/a');
			}

			$this -> theForm -> setCreatedAt(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex -> getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop
	}//close addMNHWaterSourceAspectsInfo()

	private function addCommodityQuantityAvailabilityInfo() {
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'cq') !== FALSE) {//select data for availability of commodities
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//stringify any array value
				if (is_array($val)) {
					$val = implode(',', $val);
				}
				//	print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "cqCommodityCode") {
					//print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					//print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
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
		$this -> noOfInsertsBatch = $finalCount;

		//  print 'Found :'.$this->noOfInsertsBatch;die;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {

			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\AvailableCommodities();
			//create an object of the model

			//  die(print 'Code: '.$this -> session -> userdata('facilityMFL'));

			$this -> theForm -> setFacMfl($this -> session -> userdata('facilityMFL'));
			$this -> theForm -> setCommCode($this -> elements[$i]['cqCommCode']);

			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['cqExpiryDate'])) ? $this -> theForm -> setAcExpiryDate($this -> elements[$i]['cqExpiryDate']) : $this -> theForm -> setAcExpiryDate('n/a');
			(isset($this -> elements[$i]['cqNumberOfUnits'])) ? $this -> theForm -> setAcQuantity($this -> elements[$i]['cqNumberOfUnits']) : $this -> theForm -> setAcQuantity(-1);
			(isset($this -> elements[$i]['cqSupplier']) || $this -> elements[$i]['cqSupplier'] == '') ? $this -> theForm ->setSupplierCode($this -> elements[$i]['cqSupplier']) : $this -> theForm -> setSupplierCode("Other");
			(isset($this -> elements[$i]['cqReason']) || $this -> elements[$i]['cqReason'] == '') ? $this -> theForm ->setAcReasonUnavailable($this -> elements[$i]['cqReason']) : $this -> theForm -> setAcReasonUnavailable("N/A");
			(isset($this -> elements[$i]['cqAvailability'])) ? $this -> theForm -> setAcAvailability($this -> elements[$i]['cqAvailability']) : $this -> theForm -> setAcAvailability("N/A");
			(isset($this -> elements[$i]['cqLocation'])) ? $this -> theForm -> setAcLocation($this -> elements[$i]['cqLocation']) : $this -> theForm -> setAcLocation("N/A");
			$this -> theForm -> setAcCreated(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

				// die(print 'I completed well after iteration: '.$i);

				//print 'I just saved rec no: '.$i;

			}
			//end of batch condition
		} //end of innner loop

	}//close addCommodityQuantityAvailabilityInfo

	private function addSuppliesQuantityAvailabilityInfo() {
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'sq') !== FALSE) {//select data for availability of commodities
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//stringify any array value
				if (is_array($val)) {
					$val = implode(',', $val);
				}
				//	print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "sqsupplyCode") {
					//print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					//print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		//print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		//  print 'Found :'.$this->noOfInsertsBatch;die;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {

			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\E_Squantity_Available();
			//create an object of the model

			//  die(print 'Code: '.$this -> session -> userdata('facilityMFL'));

			$this -> theForm -> setFacilityCode($this -> session -> userdata('facilityMFL'));
			$this -> theForm -> setsupplyCode($this -> elements[$i]['sqsupplyCode']);

			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['sqNumberOfUnits'])) ? $this -> theForm -> setQuantityAvailable($this -> elements[$i]['sqNumberOfUnits']) : $this -> theForm -> setQuantityAvailable(-1);
			(isset($this -> elements[$i]['sqSupplier']) || $this -> elements[$i]['sqSupplier'] != '') ? $this -> theForm -> setSupplierID($this -> elements[$i]['sqSupplier']) : $this -> theForm -> setSupplierID("Other");
			if (isset($this -> elements[$i]['sqReason'])) {
				($this -> elements[$i]['sqReason'] != '') ? $this -> theForm -> setReason4Unavailability($this -> elements[$i]['sqReason']) : $this -> theForm -> setReason4Unavailability("N/A");
			} else {
				$this -> theForm -> setReason4Unavailability("N/A");
			}

			(isset($this -> elements[$i]['sqAvailability'])) ? $this -> theForm -> setAvailability($this -> elements[$i]['sqAvailability']) : $this -> theForm -> setAvailability("N/A");
			(isset($this -> elements[$i]['sqLocation'])) ? $this -> theForm -> setLocation($this -> elements[$i]['sqLocation']) : $this -> theForm -> setLocation("N/A");
			$this -> theForm -> setCreatedAt(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop

	}//close addSuppliesQuantityAvailabilityInfo

	private function addEquipmentQuantityAvailabilityInfo() {
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'eq') !== FALSE) {//select data for availability of commodities
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//stringify any array value
				if (is_array($val)) {
					$val = implode(',', $val);
				}
				//	print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "eqEquipmentCode") {
					//print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					//print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
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
		$this -> noOfInsertsBatch = $finalCount;

		//  print 'Found :'.$this->noOfInsertsBatch;die;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {

			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\Equipments_Available();
			//create an object of the model

			//  die(print 'Code: '.$this -> session -> userdata('facilityMFL'));

			$this -> theForm -> setFacilityCode($this -> session -> userdata('facilityMFL'));
			$this -> theForm -> setEquipmentID($this -> elements[$i]['eqEquipmentCode']);

			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['eqAvailability'])) ? $this -> theForm -> setEquipAvailability($this -> elements[$i]['eqAvailability']) : $this -> theForm -> setEquipAvailability("N/A");
			(isset($this -> elements[$i]['eqLocation'])) ? $this -> theForm -> setEquipLocation($this -> elements[$i]['eqLocation']) : $this -> theForm -> setEquipLocation("N/A");
			(isset($this -> elements[$i]['eqQtyFullyFunctional']) || $this -> elements[$i]['eqQtyFullyFunctional'] != '') ? $this -> theForm -> setQuantityFullyFunctional($this -> elements[$i]['eqQtyFullyFunctional']) : $this -> theForm -> setQuantityFullyFunctional(-1);
			(isset($this -> elements[$i]['eqQtyPartiallyFunctional'])) ? $this -> theForm -> setQuantityPartiallyFunctional($this -> elements[$i]['eqQtyFullyFunctional']) : $this -> theForm -> setQuantityPartiallyFunctional(-1);
			(isset($this -> elements[$i]['eqQtyNonFunctional']) || $this -> elements[$i]['eqQtyNonFunctional'] != '') ? $this -> theForm -> setQuantityNonFunctional($this -> elements[$i]['eqQtyFullyFunctional']) : $this -> theForm -> setQuantityNonFunctional(-1);

			$this -> theForm -> setCreatedAt(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

				// die(print 'I completed well after iteration: '.$i);

				//print 'I just saved rec no: '.$i;

			}
			//end of batch condition
		} //end of innner loop

	}//close addEquipmentQuantityAvailabilityInfo

	private function addGuidelinesStaffInfo() {
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'gs') !== FALSE) {//select data for bemonc signal functions
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "gsGuidelineCode") {
					// print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					// print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		//print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {

			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\TrainingGuidelines();
			//create an object of the model

			$this -> theForm -> setGuideCode($this -> elements[$i]['gsGuidelineCode']);
			$this -> theForm -> setFacMfl($this -> session -> userdata('facilityMFL'));
			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['gsLastTraining'])) ? $this -> theForm -> setLastTrained($this -> elements[$i]['gsLastTraining']) : $this -> theForm -> setLastTrained(-1);
			(isset($this -> elements[$i]['gsTrainedAndWorking'])) ? $this -> theForm -> setTrainedAndWorking($this -> elements[$i]['gsTrainedAndWorking']) : $this -> theForm -> setLastTrained(-1);
			$this -> theForm -> setTgCreated(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

					//return true;
				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop

	}//close addGuidelinesStaffInfo

	private function addCommodityUsageAndStockOutageInfo() {
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'usoc') !== FALSE) {//select data for availability of commodities
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//stringify any array value
				if (is_array($val)) {
					$val = implode(',', $val);
				}
				// print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "usocCommodityCode") {
					//print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					//print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
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
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; $i++) {

			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\E_C_Usage_Stock_Out_Log();
			//create an object of the model

			$this -> theForm -> setFacilityCode($this -> session -> userdata('facilityMFL'));
			$this -> theForm -> setcomm_code($this -> elements[$i]['usocCommodityCode']);

			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['usocUsage'])) ? $this -> theForm -> setCommodityUsage($this -> elements[$i]['usocUsage']) : $this -> theForm -> setCommodityUsage(-1);
			(isset($this -> elements[$i]['usocTimesUnavailable']) || $this -> elements[$i]['usocTimesUnavailable'] == '') ? $this -> theForm -> setCommodityUnavailableTimes($this -> elements[$i]['usocTimesUnavailable']) : $this -> theForm -> setCommodityUnavailableTimes('n/a');
			(isset($this -> elements[$i]['usocWhatHappened'])) ? $this -> theForm -> setCommodityOptionOnOutage($this -> elements[$i]['usocWhatHappened']) : $this -> theForm -> setCommodityOptionOnOutage('n/a');
			$this -> theForm -> setCreatedAt(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print $i);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print $i);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop

	}//close addCommodityUsageAndStockOutageInfo

	private function addSuppliesUsageAndStockOutageInfo() {
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'usos') !== FALSE) {//select data for availability of commodities
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//stringify any array value
				if (is_array($val)) {
					$val = implode(',', $val);
				}
				// print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "usossupplyCode") {
					//print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					//print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		//print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; $i++) {

			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\E_S_Usage_Stock_Out_Log();
			//create an object of the model

			$this -> theForm -> setFacilityCode($this -> session -> userdata('facilityMFL'));
			$this -> theForm -> setSupplyID($this -> elements[$i]['usossupplyCode']);

			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['usosUsage'])) ? $this -> theForm -> setSupplyUsage($this -> elements[$i]['usosUsage']) : $this -> theForm -> setSupplyUsage(-1);
			(isset($this -> elements[$i]['usosTimesUnavailable']) || $this -> elements[$i]['usosTimesUnavailable'] == '') ? $this -> theForm -> setSupplyUnavailableTimes($this -> elements[$i]['usosTimesUnavailable']) : $this -> theForm -> setSupplyUnavailableTimes('n/a');
			(isset($this -> elements[$i]['usosWhatHappened'])) ? $this -> theForm -> setSupplyOptionOnOutage($this -> elements[$i]['usosWhatHappened']) : $this -> theForm -> setSupplyOptionOnOutage('n/a');
			$this -> theForm -> setCreatedAt(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print $i);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print $i);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop

	}//close addSuppliesUsageAndStockOutageInfo

	private function addResourceAvailabilityInfo() {
		$count = $finalCount = 1;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
			if (strpos($key, 'hw') !== FALSE) {//select data for availability of commodities
				//we separate the attribute name from the number

				$this -> frags = explode("_", $key);

				//$this->id = $this->frags[1];  // the id

				$this -> id = $count;
				// the id

				$this -> attr = $this -> frags[0];
				//the attribute name

				//stringify any array value
				if (is_array($val)) {
					$val = implode(',', $val);
				}
				//	print $key.' ='.$val.' <br />';
				//print 'ids: '.$this->id.'<br />';

				//mark the end of 1 row...for record count
				if ($this -> attr == "hwEquipmentCode") {
					//print 'count at:'.$count.'<br />';

					$finalCount = $count;
					$count++;
					//print 'count at:'.$count.'<br />';
					//print 'final count at:'.$finalCount.'<br />';
					//print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}

				//collect key and value to an array
				if (!empty($val)) {
					//We then store the value of this attribute for this element.
					$this -> elements[$this -> id][$this -> attr] = htmlentities($val);

					//$this->elements[$this->attr]=htmlentities($val);
				} else {
					$this -> elements[$this -> id][$this -> attr] = '';
					//$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
				}

			}

		}//close foreach ($this -> input -> post() as $key => $val)
		//print var_dump($this->elements);

		//exit;

		//get the highest value of the array that will control the number of inserts to be done
		$this -> noOfInsertsBatch = $finalCount;

		//  print 'Found :'.$this->noOfInsertsBatch;die;

		for ($i = 1; $i <= $this -> noOfInsertsBatch + 1; ++$i) {

			//go ahead and persist data posted
			$this -> theForm = new \models\Entities\E_MNH_Resource_Available();
			//create an object of the model

			//die(print 'Code: '.$this -> session -> userdata('facilityMFL'));

			$this -> theForm -> setFacilityCode($this -> session -> userdata('facilityMFL'));
			$this -> theForm -> setResourceCode($this -> elements[$i]['hwEquipmentCode']);

			//check if that key exists, else set it to some default value
			(isset($this -> elements[$i]['hwNumberOfUnits'])) ? $this -> theForm -> setQuantityAvailable($this -> elements[$i]['hwNumberOfUnits']) : $this -> theForm -> setQuantityAvailable(-1);
			(isset($this -> elements[$i]['hwSupplier']) || $this -> elements[$i]['hwSupplier'] != '') ? $this -> theForm -> setSupplierID($this -> elements[$i]['hwSupplier']) : $this -> theForm -> setSupplierID("Other");
			(isset($this -> elements[$i]['hwReason'])) ? $this -> theForm -> setReason4Unavailability($this -> elements[$i]['hwReason']) : $this -> theForm -> setReason4Unavailability("N/A");
			(isset($this -> elements[$i]['hwAvailability'])) ? $this -> theForm -> setAvailability($this -> elements[$i]['hwAvailability']) : $this -> theForm -> setAvailability("N/A");
			(isset($this -> elements[$i]['hwLocation'])) ? $this -> theForm -> setLocation($this -> elements[$i]['hwLocation']) : $this -> theForm -> setLocation("N/A");
			$this -> theForm -> setSource($this -> elements[$i]['hwSource']);
			$this -> theForm -> setCreatedAt(new DateTime());
			/*timestamp option*/
			$this -> em -> persist($this -> theForm);

			//now do a batched insert, default at 5
			$this -> batchSize = 5;
			if ($i % $this -> batchSize == 0) {
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detaches all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			} else if ($i < $this -> batchSize || $i > $this -> batchSize || $i == $this -> noOfInsertsBatch && $this -> noOfInsertsBatch - $i < $this -> batchSize) {
				//total records less than a batch, insert all of them
				try {

					$this -> em -> flush();
					$this -> em -> clear();
					//detactes all objects from doctrine

					//on the last record to be inserted, log the process and return true;
					if ($i == $this -> noOfInsertsBatch) {
						//die(print 'Limit: '.$this->noOfInsertsBatch);
						//$this->writeAssessmentTrackerLog();
						return true;
					}

				} catch(Exception $ex) {
					//die($ex->getMessage());
					return false;

					/*display user friendly message*/

				}//end of catch

			}
			//end of batch condition
		} //end of innner loop

	}//close addResourceAvailabilityInfo

	function store_data() {
		/*check assessment tracker log*/
		if ($this -> input -> post()) {
			$step = $this -> input -> post('step_name', TRUE);
			switch($step) {
				case 'section-1' :
					//check if entry exists
					$this -> section = $this -> sectionEntryExists($this -> session -> userdata('facilityMFL'), $this -> input -> post('step_name', TRUE), $this -> session -> userdata('survey'));

					//print var_dump($this->section);

					//insert log entry if new, else update the existing one
					if ($this -> sectionExists == false) {
						if ( $this -> addNurseInfo() == true&& $this -> addServicesInfo() == true&& $this -> addCommitteeInfo() == true) {//Defined in MY_Model
							$this -> writeAssessmentTrackerLog();
							return $this -> response = 'true';
						} else {
							return $this -> response = 'false';
						}
					} else {
						//die('Entry exsits');
						return $this -> response = 'true';
					}
					//return $this -> response = 'true';
					break;
				case 'section-2' :
					//check if entry exists
					$this -> section = $this -> sectionEntryExists($this -> session -> userdata('facilityMFL'), $this -> input -> post('step_name', TRUE), $this -> session -> userdata('survey'));

					//print var_dump($this->section);

					//insert log entry if new, else update the existing one
					if ($this -> sectionExists == false) {
						/*if ($this -> addMnhCommunityStrategyInfo() == true && $this -> addDeliveryByMonthInfo() == true && $this -> addBemoncSignalFunctionsInfo() == true && $this -> addCEOCServicesInfo() == true && $this -> addKangarooInfo() == true 
						&& $this -> addNewbornInfo() == true&& $this -> addGuidelinesInfo() == true && $this -> addHIVTestingInfo() == true && $this -> addPreparednessInfo() == true && $this -> addJobAidsInfo() == true) {//defined in this model
							$this -> writeAssessmentTrackerLog();*/
						if ($this -> addMnhCommunityStrategyInfo() == true && $this -> addCEOCServicesInfo() == true && $this -> addKangarooInfo() == true 
						&& $this -> addNewbornInfo() == true&& $this -> addGuidelinesInfo() == true && $this -> addHIVTestingInfo() == true && $this -> addPreparednessInfo() == true && $this -> addJobAidsInfo() == true) {//defined in this model
							$this -> writeAssessmentTrackerLog();
							return $this -> response = 'true';

						} else {
							return $this -> response = 'false';
						}
					} else {
						//die('Entry exsits');
						return $this -> response = 'true';
					}
					break;
				case 'section-3' :
					//check if entry exists
					$this -> section = $this -> sectionEntryExists($this -> session -> userdata('facilityMFL'), $this -> input -> post('step_name', TRUE), $this -> session -> userdata('survey'));

					//print var_dump($this->section);

					//insert log entry if new, else update the existing one
					if ($this -> sectionExists == false) {
						if ($this -> addCommodityQuantityAvailabilityInfo() == true) {//defined in this model
							$this -> writeAssessmentTrackerLog();
							return $this -> response = 'true';
						} else {
							return $this -> response = 'false';
						}
					} else {
						//die('Entry exsits');
						return $this -> response = 'true';
					}
					break;
				case 'section-4' :
					//check if entry exists
					$this -> section = $this -> sectionEntryExists($this -> session -> userdata('facilityMFL'), $this -> input -> post('step_name', TRUE), $this -> session -> userdata('survey'));

					//print var_dump($this->section);

					//insert log entry if new, else update the existing one
					if ($this -> sectionExists == false) {
						if ($this -> addGuidelinesStaffInfo() == true) {//defined in this model
							$this -> writeAssessmentTrackerLog();
							return $this -> response = 'true';
						} else {
							return $this -> response = 'false';
						}
					} else {
						//die('Entry exsits');
						return $this -> response = 'true';
					}
					break;
				case 'section-5' :
					//check if entry exists
					$this -> section = $this -> sectionEntryExists($this -> session -> userdata('facilityMFL'), $this -> input -> post('step_name', TRUE), $this -> session -> userdata('survey'));

					//print var_dump($this->section);

					//insert log entry if new, else update the existing one
					if ($this -> sectionExists == false) {
						if ($this -> addCommodityUsageAndStockOutageInfo() == true) {//defined in this model
							$this -> writeAssessmentTrackerLog();
							return $this -> response = 'true';
						} else {
							return $this -> response = 'false';
						}
					} else {
						//die('Entry exsits');
						return $this -> response = 'true';
					}
					break;
				case 'section-6' :
					//check if entry exists
					$this -> section = $this -> sectionEntryExists($this -> session -> userdata('facilityMFL'), $this -> input -> post('step_name', TRUE), $this -> session -> userdata('survey'));

					//print var_dump($this->section);

					//insert log entry if new, else update the existing one
					if ($this -> sectionExists == false) {
						if ($this -> addEquipmentQuantityAvailabilityInfo() == true && $this -> addSuppliesQuantityAvailabilityInfo() == true && $this -> addMNHWaterSourceAspectsInfo() == true && $this -> addResourceAvailabilityInfo() == true) {//defined in this model
							$this -> writeAssessmentTrackerLog();
							return $this -> response = 'true';
						} else {
							return $this -> response = 'false';
						}
					} else {
						//die('Entry exsits');
						return $this -> response = 'true';
					}
					break;
				case 'section-7' :
					//check if entry exists
					$this -> section = $this -> sectionEntryExists($this -> session -> userdata('facilityMFL'), $this -> input -> post('step_name', TRUE), $this -> session -> userdata('survey'));

					//print var_dump($this->section);

					//insert log entry if new, else update the existing one
					if ($this -> sectionExists == false) {
						if ($this -> addSuppliesQuantityAvailabilityInfo() == true && $this -> addSuppliesUsageAndStockOutageInfo() == true
						&& $this -> addWasteDisposalInfo() == true) {//defined in this model
							$this -> writeAssessmentTrackerLog();
							//update facility survey status
							$this -> markSurveyStatusAsComplete();
							return $this -> response = 'true';
						} else {
							return $this -> response = 'false';
						}
					} else {
						//die('Entry exsits');
						$this -> markSurveyStatusAsComplete();
						return $this -> response = 'true';
					}
					break; 
			}//close switch
			//print var_dump($this->input->post());

			//return $this -> response = 'true';
		}

	}

}//end of class M_MNH_Survey
