<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * @description Model contains query definitions to extract data for analytical purposes
 * @param entities
 * @author John Adamsy
 * @modified June 14th 2013
 * */

//for the query builder
use Doctrine\ORM\Query\ResultSetMappingBuilder;

class M_Analytics extends MY_Model {
	/*user variables*/
	var $dataSet, $final_data_set, $query, $rsm;

	/*constructor*/
	function __construct() {
		parent::__construct();
		//var initialization
		$this -> dataSet = $this -> query = null;

	}

	public function get_facility_reporting_summary($survey) {

		/*using CI Database Active Record*/
		try {
			$query = "SELECT facilityMFC,facilityName,facilityDistrict,facilityCounty,facilityInchargeContactPerson,facilityInchargeEmail,updatedAt 
	                 FROM facility WHERE facilityCHSurveyStatus='complete'  ORDER BY facilityName ASC";
			$this -> dataSet = $this -> db -> query($query, array($survey));
			$this -> dataSet = $this -> dataSet -> result_array();

			if ($this -> dataSet) {
				return $this -> dataSet;
			} else {
				return $this -> dataSet = false;
			}
			//die(var_dump($this->dataSet));
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}

	}

	/**
	 * Community Strategy
	 */
	public function getCommunityStrategy($criteria, $value, $status, $survey) {
		/*using CI Database Active Record*/
		//$data=array();
		$data = '';

		if ($survey == 'ch') {
			$status_condition = 'facilityCHSurveyStatus =?';
		} else if ($survey == 'mnh') {
			$status_condition = 'facilitySurveyStatus =?';
		}

		switch($criteria) {
			case 'county' :
				$criteria_condition = 'AND facilityCounty=?';
				break;
			case 'district' :
				$criteria_condition = 'AND facilityDistrict=?';
				break;
			case 'facility' :
				$criteria_condition = 'AND facilityMFC=?';
				break;
			case 'none' :
				$criteria_condition = '';
				break;
		}

		$query = "SELECT cs.strategyID AS strategy,cs.strategyResponse AS strategy_number FROM mch_community_strategy cs WHERE cs.strategyID IN
                   (SELECT questionCode FROM mch_questions WHERE mchQuestionFor='cms') 
                   AND cs.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . " " . $criteria_condition . ")
                   GROUP BY cs.strategyID ASC";
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));
			$this -> dataSet = $this -> dataSet -> result_array();
			if (count($this -> dataSet) > 0) {
				//prep data for the pie chart format
				$i = 1;
				$size = count($this -> dataSet);
				foreach ($this->dataSet as $value) {
					if ($i == $size) {
						$data[] = array($this -> getCommunityStrategyName($value['strategy']), $value['strategy_number']);
					} else {
						$data[] = array($this -> getCommunityStrategyName($value['strategy']), $value['strategy_number']);
						$i++;
					}
				}
				$this -> dataSet = $data;
				return $this -> dataSet;
			} else {
				return $this -> dataSet = null;
			}
			//die(var_dump($this->dataSet));
		} catch(Exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
	}

	/*
	 * Guidelines Availability
	 */
	public function getGuidelinesAvailability($criteria, $value, $status, $survey) {
		/*using CI Database Active Record*/
		$data = array();
		$data_prefix_y ='';
		$data_prefix_n = '';
		$data_y = $data_n = $data_categories = array();

		if ($survey == 'ch') {
			$status_condition = 'facilityCHSurveyStatus =?';
		} else if ($survey == 'mnh') {
			$status_condition = 'facilitySurveyStatus =?';
		}

		switch($criteria) {
			case 'county' :
				$criteria_condition = 'AND facilityCounty=?';
				break;
			case 'district' :
				$criteria_condition = 'AND facilityDistrict=?';
				break;
			case 'facility' :
				$criteria_condition = 'AND facilityMFC=?';
				break;
			case 'none' :
				$criteria_condition = '';
				break;
		}

		$query = "SELECT COUNT(ql.facilityID) AS total_facilities,ql.indicatorID AS guideline,ql.response AS availability FROM mch_questions_log ql WHERE ql.indicatorID IN 
                   (SELECT questionCode FROM mch_questions WHERE mchQuestionFor='gp') 
                   AND ql.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . " " . $criteria_condition . ")
                   GROUP BY ql.response,ql.indicatorID ORDER BY ql.response ASC";
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));
			$this -> dataSet = $this -> dataSet -> result_array();
			if (count($this -> dataSet) > 0) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);
				$i = 0;

				//get a set of the 4 guidelines
				$data_categories = array('2012 IMCI', 'ORT Corner', 'ICCM', 'Paediatric Protocol');

				//$data['categories'] = json_encode($data_categories);

				foreach ($this->dataSet as $value) {
					switch($this -> getTrainingGuidelineName($value['guideline'])) {
						case 'Does the facility have updated 2012 IMCI guidelines?' :
							$guideline = '2012 IMCI';
							break;
						case 'Does the facility have updated ORT Corner guidelines?' :
							$guideline = 'ORT Corner';
							break;
						case 'Does the facility have an updated Paediatric Protocol?' :
							$guideline = 'Paediatric Protocol';
							break;
						case 'Does the facility have updated ICCM guidelines?' :
							$guideline = 'ICCM';
							break;
					}

					if ($value['availability'] == 'Yes') {
						$data_y[] = array($guideline, (int)$value['total_facilities']);
					} else {
						$data_n[] = array($guideline, (int)$value['total_facilities']);
					}
				}

				$data['yes_values'] = $data_y;
				$data['no_values'] = $data_n;

				$this -> dataSet = $data;

				//var_dump($this->dataSet);die;
				return $this -> dataSet;
			} else {
				return $this -> dataSet = null;
			}
			//die(var_dump($this->dataSet));
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
	}

	/*
	 * Trained Staff
	 */
	public function getTrainedStaff($criteria, $value, $status, $survey) {
		/*using CI Database Active Record*/
		$data = array();
		$data_prefix_y = "name:'Trained (Last 2 years)',data:";
		$data_prefix_n = "name:'Trained & Working in CH',data:";
		$data_y = $data_n = $data_categories = array();

		if ($survey == 'ch') {
			$status_condition = 'facilityCHSurveyStatus =?';
		} else if ($survey == 'mnh') {
			$status_condition = 'facilitySurveyStatus =?';
		}

		switch($criteria) {
			case 'county' :
				$criteria_condition = 'AND facilityCounty=?';
				break;
			case 'district' :
				$criteria_condition = 'AND facilityDistrict=?';
			case 'facility' :
				$criteria_condition = 'AND facilityMFC=?';
				break;
			case 'none' :
				$criteria_condition = '';
				break;
		}

		$query = "SELECT COUNT(gt.facilityID) AS facilities,gt.guidelineCode AS training,sum(gt.lastTrained) AS trained,sum(gt.trainedAndWorking) AS working
		  	FROM guideline_training gt WHERE gt.guidelineCode IN 
		 	(SELECT guidelineCode FROM guidelines WHERE guidelineFor='mch') 
			AND gt.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . " " . $criteria_condition . ")
			GROUP BY gt.guidelineCode ORDER BY gt.guidelineCode ASC";
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));
			$this -> dataSet = $this -> dataSet -> result_array();
			if (count($this -> dataSet) > 0) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);
				$i = 0;

				foreach ($this->dataSet as $value) {
					//if(isset($value['trained'])){
					$data_y[] = intval($value['trained']);
					//}else if(isset($value['working'])){
					$data_n[] = intval($value['working']);
					//}

					//get a set of the 3 staff trainings
					$data_categories[] = $this -> getStaffTrainingGuidelineById($value['training']);
				}

				$data['categories'] = json_encode($data_categories);

				$data['yes_values'] = $data_prefix_y . json_encode($data_y);
				$data['no_values'] = $data_prefix_n . json_encode($data_n);

				$this -> dataSet = $data;

				//var_dump($this->dataSet);die;
				return $this -> dataSet;
			} else {
				return $this -> dataSet = null;
			}
			//die(var_dump($this->dataSet));
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
	}

	/*
	 * Commodity Availability
	 */
	public function getCommodityAvailability($criteria, $value, $status, $survey) {
		/*using CI Database Active Record*/
		$data = $data_set = $data_series = $analytic_var = $data_categories = array();
		//data to hold the final data to relayed to the view,data_set to hold sets of data, analytic_var to hold the analytic variables to be used in the data_series,data_series to hold the title and the json encoded sets of the data_set

		/**
		 * something of this kind:
		 * $data_series[0]="name: '.$value['analytic_variable'].',data:".json_encode($data_set[0])
		 */

		if ($survey == 'ch') {
			$status_condition = 'facilityCHSurveyStatus =?';
		} else if ($survey == 'mnh') {
			$status_condition = 'facilitySurveyStatus =?';
		}

		switch($criteria) {
			case 'county' :
				$criteria_condition = 'AND facilityCounty=?';
				break;
			case 'district' :
				$criteria_condition = 'AND facilityDistrict=?';
			case 'facility' :
				$criteria_condition = 'AND facilityMFC=?';
				break;
			case 'none' :
				$criteria_condition = '';
				break;
		}

		/*--------------------begin commodity availability by frequency----------------------------------------------*/
		$query = "SELECT count(ca.Availability) AS total_response,ca.CommodityID as commodity,ca.Availability AS frequency FROM cquantity_available ca
					WHERE ca.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . " " . $criteria_condition . ")
					AND ca.CommodityID IN (SELECT commodityCode FROM commodity WHERE commodityFor='mch')
					GROUP BY ca.CommodityID,ca.Availability
					ORDER BY ca.CommodityID";
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));

			$this -> dataSet = $this -> dataSet -> result_array();
			// echo($this->db->last_query());die;
			if (count($this -> dataSet) > 0) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value) {

					//1. collect the categories
					$data_categories[] = $this -> getCommodityNameById($value['commodity']);
					//includes duplicates--so we'll array_unique outside the foreach()

					//2. collect the analytic variables
					if ($value['frequency'] == 'Some Available') {
						//hard twick...for Nairobi County...good fix be done in the html
						$frequency = 'Sometimes Available';
					} else {
						$frequency = $value['frequency'];
					}
					$analytic_var[] = $frequency;
					//includes duplicates--so we'll array_unique outside the foreach()

					//collect the data_sets
					if ($value['frequency'] == 'Available') {
						$data_set[0][] = intval($value['total_response']);
					} else if ($value['frequency'] == 'Some Available') {
						$data_set[1][] = intval($value['total_response']);
					} else if ($value['frequency'] == 'Never Available') {
						$data_set[2][] = intval($value['total_response']);
					}

				}

				//var_dump($data_set[2]);die;

				//make cat array unique if we got duplicates then json_encode and set to $data array
				$data['categories'] = json_encode(array_values(array_unique($data_categories)));
				//expected 5

				//get a unique set of analytic variables
				$analytic_var = array_unique($analytic_var);
				//expected to be 3 in this particular context

				//prep final dataset
				if (isset($data_series[0])) {$data_series[0] = "name: '" . $analytic_var[0] . "',data:" . json_encode($data_set[0]);
				}
				if (isset($data_series[1])) {$data_series[1] = "name: '" . $analytic_var[1] . "',data:" . json_encode($data_set[1]);
				}
				if (isset($data_series[2])) {$data_series[2] = "name: '" . $analytic_var[2] . "',data:" . json_encode($data_set[2]);
				}

				//do more with less :)
				$count = 0;
				if (isset($analytic_var[0]) && isset($data_set[0])) {
					foreach ($analytic_var as $val) {
						$data[$val] = "name: '" . $analytic_var[$count] . "',data:" . json_encode($data_set[$count]);
						$count++;
					}
				}

				$this -> final_data_set['frequency'] = $data;
				$data = $data_set = $data_series = $analytic_var = $data_categories = array();
				//unset the arrays for reuse
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		/*--------------------end commodity availability by frequency----------------------------------------------*/

		/*--------------------begin commodity reason for unavailability----------------------------------------------*/
		$query = "SELECT count(ca.reason4Unavailability) AS total_response,ca.CommodityID as commodity,ca.reason4Unavailability AS reason FROM cquantity_available ca
					WHERE ca.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . " " . $criteria_condition . ")
					AND ca.CommodityID IN (SELECT commodityCode FROM commodity WHERE commodityFor='mch')
					AND ca.reason4Unavailability !='Not Applicable'
					GROUP BY ca.CommodityID,ca.reason4Unavailability
					ORDER BY ca.CommodityID";
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));

			$this -> dataSet = $this -> dataSet -> result_array();
			// echo($this->db->last_query());die;
			if (count($this -> dataSet) > 0) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value) {

					//1. collect the categories
					$data_categories[] = $this -> getCommodityNameById($value['commodity']);
					//includes duplicates--so we'll array_unique outside the foreach()

					//2. collect the analytic variables
					$analytic_var[] = $value['reason'];
					//includes duplicates--so we'll array_unique outside the foreach()

					//collect the data_sets
					if ($value['reason'] == 'All Used') {
						$data_set[0][] = intval($value['total_response']);
					} else if ($value['reason'] == 'Expired') {
						$data_set[1][] = intval($value['total_response']);
					} else if ($value['reason'] == 'Not Ordered') {
						$data_set[2][] = intval($value['total_response']);
					} else if ($value['reason'] == 'Ordered but not yet Received') {
						$data_set[3][] = intval($value['total_response']);
					}

				}

				//var_dump($data_set[2]);die;

				//make cat array unique if we got duplicates then json_encode and set to $data array
				$data['categories'] = json_encode(array_values(array_unique($data_categories)));
				//expected 5

				//get a unique set of analytic variables
				$analytic_var = array_unique($analytic_var);
				//expected to be 4 in this particular context

				//prep final dataset
				if (isset($data_series[0])) {$data_series[0] = "name: '" . $analytic_var[0] . "',data:" . json_encode($data_set[0]);
				}
				if (isset($data_series[1])) {$data_series[1] = "name: '" . $analytic_var[1] . "',data:" . json_encode($data_set[1]);
				}
				if (isset($data_series[2])) {$data_series[2] = "name: '" . $analytic_var[2] . "',data:" . json_encode($data_set[2]);
				}
				if (isset($data_series[3]) && isset($analytic_var[3])) {$data_series[3] = "name: '" . $analytic_var[3] . "',data:" . json_encode($data_set[3]);
				}

				//do more with less :)
				$count = 0;
				if (isset($analytic_var[0]) && isset($data_set[0])) {
					foreach ($analytic_var as $val) {
						$data[$val] = "name: '" . $analytic_var[$count] . "',data:" . json_encode($data_set[$count]);
						$count++;
					}
				}

				$this -> final_data_set['unavailability'] = $data;
				$data = $data_set = $data_series = $analytic_var = $data_categories = array();
				//unset the arrays for reuse
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		/*--------------------end commodity reason for unavailability----------------------------------------------*/

		/*--------------------begin commodity location of availability----------------------------------------------*/
		$query = "SELECT count(ca.Location) AS total_response,ca.CommodityID as commodity,ca.Location AS location FROM cquantity_available ca
					WHERE ca.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . " " . $criteria_condition . ") 
					AND ca.CommodityID IN (SELECT commodityCode FROM commodity WHERE commodityFor='mch')
					AND ca.Location NOT LIKE '%Not Applicable%'
					GROUP BY ca.CommodityID,ca.Location
					ORDER BY ca.CommodityID";
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));

			$this -> dataSet = $this -> dataSet -> result_array();
			// echo($this->db->last_query());die;
			if (count($this -> dataSet) > 0) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value) {

					//1. collect the categories
					$data_categories[] = $this -> getCommodityNameById($value['commodity']);
					//includes duplicates--so we'll array_unique outside the foreach()

					//2. collect the analytic variables
					//$analytic_var[] = $value['location'];-->hard fix outside the loop as values are coma separated...good fix..have v-look up in the db

					//collect the data_sets
					if (strpos($value['location'], 'OPD') !== FALSE) {
						$data_set[0][] = intval($value['total_response']);
					}
					if (strpos($value['location'], 'MCH') !== FALSE) {
						$data_set[1][] = intval($value['total_response']);
					}
					if (strpos($value['location'], 'U5 Clinic') !== FALSE) {
						$data_set[2][] = intval($value['total_response']);
					}
					if (strpos($value['location'], 'Ward') !== FALSE) {
						$data_set[3][] = intval($value['total_response']);
					}
					if (strpos($value['location'], 'Other') !== FALSE) {
						$data_set[4][] = intval($value['total_response']);
					}

				}

				//var_dump($data_set[2]);die;

				//make cat array unique if we got duplicates then json_encode and set to $data array
				$data['categories'] = json_encode(array_values(array_unique($data_categories)));
				//expected 5

				//get a unique set of analytic variables
				$analytic_var = array('OPD', 'MCH', 'U5 Clinic', 'Ward', 'Other');
				//expected to be 4 in this particular context

				//prep final dataset
				if (isset($data_series[0])) {$data_series[0] = "name: '" . $analytic_var[0] . "',data:" . json_encode($data_set[0]);
				}
				if (isset($data_series[1])) {$data_series[1] = "name: '" . $analytic_var[1] . "',data:" . json_encode($data_set[1]);
				}
				if (isset($data_series[2])) {$data_series[2] = "name: '" . $analytic_var[2] . "',data:" . json_encode($data_set[2]);
				}
				if (isset($data_series[3]) && isset($analytic_var[3])) {$data_series[3] = "name: '" . $analytic_var[3] . "',data:" . json_encode($data_set[3]);
				}
				if (isset($data_series[4]) && isset($analytic_var[4])) {$data_series[4] = "name: '" . $analytic_var[4] . "',data:" . json_encode($data_set[4]);
				}

				//do more with less :)
				$count = 0;
				foreach ($analytic_var as $val) {
					$data[$val] = "name: '" . $analytic_var[$count] . "',data:" . json_encode($data_set[$count]);
					$count++;
				}

				$this -> final_data_set['location'] = $data;
				$data = $data_set = $data_series = $analytic_var = $data_categories = array();
				//unset the arrays for reuse
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		/*--------------------end commodity location of availability----------------------------------------------*/

		/*--------------------begin commodity availability by quantity----------------------------------------------*/
		$query = "SELECT SUM(ca.quantityAvailable) AS total_quantity,ca.CommodityID as commodity FROM cquantity_available ca
				WHERE ca.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . " " . $criteria_condition . ") 
				AND ca.CommodityID IN (SELECT commodityCode FROM commodity WHERE commodityFor='mch')
				AND ca.quantityAvailable !=-1
				GROUP BY ca.CommodityID
				ORDER BY ca.CommodityID";
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));

			$this -> dataSet = $this -> dataSet -> result_array();
			// echo($this->db->last_query());die;
			if (count($this -> dataSet) > 0) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value) {

					//1. collect the categories
					$data_categories[] = $this -> getCommodityNameById($value['commodity']);
					//includes duplicates--so we'll array_unique outside the foreach()

					//2. collect the analytic variables
					$analytic_var[] = $this -> getCommodityNameById($value['commodity']);
					//includes duplicates--so we'll array_unique outside the foreach()

					//collect the data_sets
					if ($value['commodity'] == 'CMD26') {#zinc sulphate
						$data_set[0][] = intval($value['total_quantity']);
					} elseif ($value['commodity'] == 'CMD27') {#Low Osmorality ORS
						$data_set[1][] = intval($value['total_quantity']);
					} elseif ($value['commodity'] == 'CMD28') {#Ciprofloxacin
						$data_set[2][] = intval($value['total_quantity']);
					} elseif ($value['commodity'] == 'CMD29') {#Metronidazole (Flagyl)
						$data_set[3][] = intval($value['total_quantity']);
					} elseif ($value['commodity'] == 'CMD30') {#Vitamin A
						$data_set[4][] = intval($value['total_quantity']);
					}

				}

				//var_dump($analytic_var);die;

				//make cat array unique if we got duplicates then json_encode and set to $data array
				$data['categories'] = json_encode(array_values(array_unique($data_categories)));
				//expected 5

				//get a unique set of analytic variables
				$analytic_var = array_unique($analytic_var);
				//expected to be 1 in this particular context

				//prep final dataset
				//$data_series[0] = "name: '" . $analytic_var[0] . "',data:" . json_encode($data_set[0]);

				if (isset($analytic_var[0])) {
					//do more with less :)
					$count = 0;
					foreach ($analytic_var as $val) {
						$data[$val] = array("name" => $analytic_var[$count], "data:" => $data_set[$count]);
						$count++;
					}
				}

				$this -> final_data_set['quantities'] = $data;
				$data = $data_set = $data_series = $analytic_var = $data_categories = array();
				//unset the arrays for reuse

				/*--------------------end commodity availability by quantity----------------------------------------------*/

				// /var_dump($this -> final_data_set['quantities']);die;

				return $this -> final_data_set;
			} else {
				return $this -> final_data_set = null;
			}
			//die(var_dump($this->final_data_set));
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
	}

	/*
	 * Services to Children with Diarrhoea
	 */
	public function getChildrenServices($criteria, $value, $status, $survey) {
		/*using CI Database Active Record*/
		$data = $data_set = $data_series = $analytic_var = $data_categories = array();
		//data to hold the final data to relayed to the view,data_set to hold sets of data, analytic_var to hold the analytic variables to be used in the data_series,data_series to hold the title and the json encoded sets of the data_set

		/**
		 * something of this kind:
		 * $data_series[0]="name: '.$value['analytic_variable'].',data:".json_encode($data_set[0])
		 */

		if ($survey == 'ch') {
			$status_condition = 'facilityCHSurveyStatus =?';
		} else if ($survey == 'mnh') {
			$status_condition = 'facilitySurveyStatus =?';
		}

		switch($criteria) {
			case 'county' :
				$criteria_condition = 'AND facilityCounty=?';
				break;
			case 'district' :
				$criteria_condition = 'AND facilityDistrict=?';
			case 'facility' :
				$criteria_condition = 'AND facilityMFC=?';
				break;
			case 'none' :
				$criteria_condition = '';
				break;
		}

		$query = "SELECT COUNT(gt.facilityID) AS facilities,gt.guidelineCode AS training,sum(gt.lastTrained) AS trained,sum(gt.trainedAndWorking) AS working
		  	FROM guideline_training gt WHERE gt.guidelineCode IN 
		 	(SELECT guidelineCode FROM guidelines WHERE guidelineFor='mch') 
			AND gt.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . " " . $criteria_condition . ")
			GROUP BY gt.guidelineCode ORDER BY gt.guidelineCode ASC";
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));
			$this -> dataSet = $this -> dataSet -> result_array();
			if (count($this -> dataSet) > 0) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);
				$i = 0;

				foreach ($this->dataSet as $value) {
					//if(isset($value['trained'])){
					$data_y[] = intval($value['trained']);
					//}else if(isset($value['working'])){
					$data_n[] = intval($value['working']);
					//}

					//get a set of the 3 staff trainings
					$data_categories[] = $this -> getStaffTrainingGuidelineById($value['training']);
				}

				$data['categories'] = json_encode($data_categories);

				$data['yes_values'] = $data_prefix_y . json_encode($data_y);
				$data['no_values'] = $data_prefix_n . json_encode($data_n);

				$this -> dataSet = $data;

				//var_dump($this->dataSet);die;
				return $this -> dataSet;
			} else {
				return $this -> dataSet = null;
			}
			//die(var_dump($this->dataSet));
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}

	}

	/*
	 * Danger Signs assessed in Ongoing Sessions
	 */
	public function getDangerSigns() {

	}

	/*
	 * Tasks performed in Ongoing Sessions
	 */
	public function getActionsPerformed() {

	}

	/*
	 * Counsel on Ongoing Sessions
	 */
	public function getCounselGiven() {

	}

	/*
	 * Get Tools in Units
	 */

	public function getTools() {

	}

	/*
	 * Diarrhoea case numbers per Month
	 */
	public function getDiarrhoeaCaseNumbers() {

	}

	/*
	 * Diarrhoea case treatments
	 */

	public function getDiarrhoeaCaseTreatment() {

	}

	/*
	 * ORT Corner Assessment
	 */
	public function getORTCornerAssessment() {

	}

	/*
	 * Availability, Location and Functionality of Equipement at ORT Corner
	 */
	public function getORTCornerEquipmemnt() {

	}

	/*
	 * Availability, Location and Functionality of Supplies at ORT Corner
	 */
	public function getORTCornerSupplies() {

	}

	/*
	 *  Availability, Location and Functionality of Electricity and Hardware Resources
	 */
	public function getResources() {

	}

}
