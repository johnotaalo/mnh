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
	var $dataSet, $final_data_set, $query, $rsm, $districtName, $countyFacilities;

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
	public function getCommunityStrategy($criteria, $value, $status, $survey, $chartorlist) {
		/*using CI Database Active Record*/
		//$data=array();
		$data = '';

		if ($survey == 'ch') {
			$status_condition = 'facilityCHSurveyStatus =?';
		} else if ($survey == 'mnh') {
			$status_condition = 'facilitySurveyStatus =?';
		}

		switch($criteria) {
			case 'national' :
				$criteria_condition = ' ';
				break;
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
		switch($chartorlist) {
			case 'chart' :
				$query = "SELECT 
    cs.strategyID AS strategy,
    SUM(cs.strategyResponse) AS strategy_number
FROM
    mch_community_strategy cs
WHERE
    cs.strategyID IN (SELECT 
            questionCode
        FROM
            mch_questions
        WHERE
            mchQuestionFor = 'cms')
        AND cs.facilityID IN (SELECT 
            facilityMFC
        FROM
            facility
        WHERE
            " . $status_condition . " " . $criteria_condition . ")
AND cs.strategyResponse!=-1
GROUP BY cs.strategyID ASC;";
				try {
					$this -> dataSet = $this -> db -> query($query, array($status, $value));
					$this -> dataSet = $this -> dataSet -> result_array();
					if ($this -> dataSet!==NULL) {
						//prep data for the pie chart format
						$i = 1;
						$size = count($this -> dataSet);
						foreach ($this->dataSet as $value) {
							switch($this -> getCommunityStrategyName($value['strategy'])) {
								case 'Total number of Community Units established and functional' :
									$strategy = 'CU established and functional';
									break;
								case 'Total number of Community Units regularly supervised and provided feedback' :
									$strategy = 'CU regularly supervised';
									break;
								case 'Total number of CHWs and CHEWs trained on Integrated Community Case Management (ICCM)' :
									$strategy = 'CHWs & CHEWs on ICCM';
									break;
								case 'Total number of Community Units supported by incentives for CHWs' :
									$strategy = 'CU supported by incentives for CHW';
									break;
								case 'Total number of cases treated with Zinc and ORS co-pack under Community Case Management of diarrhoea' :
									$strategy = 'Cases treated with Zinc & ORS';
									break;
							}
							if ($i == $size) {
								$data[] = array($strategy, $value['strategy_number']);
							} else {
								$data[] = array($strategy, $value['strategy_number']);
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
				break;
			case 'list' :
				break;
		}

	}

	/*
	 * Guidelines Availability
	 */
	public function getGuidelinesAvailability($criteria, $value, $status, $survey, $chartorlist) {
		/*using CI Database Active Record*/
		$data = array();
		$data_prefix_y = '';
		$data_prefix_n = '';
		$data_y = $data_n = $data_categories = array();

		if ($survey == 'ch') {
			$status_condition = 'facilityCHSurveyStatus =?';
		} else if ($survey == 'mnh') {
			$status_condition = 'facilitySurveyStatus =?';
		}

		switch($criteria) {
			case 'national' :
				$criteria_condition = ' ';
				break;
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
		#Check whether a graph or a list is required
		switch($chartorlist) {
			#initial query
			case 'chart' :
				$query = "SELECT COUNT(ql.facilityID) AS total_facilities,ql.indicatorID AS guideline,ql.response AS availability FROM mch_questions_log ql WHERE ql.indicatorID IN 
                   (SELECT questionCode FROM mch_questions WHERE mchQuestionFor='gp') 
                   AND ql.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . " " . $criteria_condition . ")
                   GROUP BY ql.response,ql.indicatorID ORDER BY ql.response ASC";
				try {
					$this -> dataSet = $this -> db -> query($query, array($status, $value));
					$this -> dataSet = $this -> dataSet -> result_array();
					if ($this -> dataSet!==NULL) {
						//prep data for the pie chart format
						$size = count($this -> dataSet);
						$i = 0;

						//get a set of the 4 guidelines
						$data['categories'] = array('2012 IMCI', 'ORT Corner', 'ICCM', 'Paediatric Protocol');

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
								$data_y[] = array($guideline => (int)$value['total_facilities']);
							} else {
								$data_n[] = array($guideline => (int)$value['total_facilities']);
							}
							//$data['categories'][]=$guideline;
						}

						$data['yes_values'] = $data_y;
						$data['no_values'] = $data_n;

						$this -> dataSet = $data;

						//var_dump($this->dataSet);die;

					} else {
						return $this -> dataSet = null;
					}
					//die(var_dump($this->dataSet));
				} catch(exception $ex) {
					//ignore
					//die($ex->getMessage());//exit;
				}
				break;
			case 'list' :
				#Facility List
				$query = "SELECT DISTINCT ql.facilityID, g.mchQuestion, f.facilityName
					FROM mnh.mch_questions_log ql,mnh.mch_questions g, facility f WHERE response = 'No'AND ql.indicatorID IN (SELECT questionCode FROM mch_questions
 					WHERE  mchQuestionFor = 'gp') AND ql.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . " " . $criteria_condition . ")
 					 AND ql.indicatorID = g.questionCode AND ql.facilityID=f.facilityMFC;";
				try {
					$this -> dataSet = $this -> db -> query($query, array($status, $value));
					$this -> dataSet = $this -> dataSet -> result_array();
					if ($this -> dataSet!==NULL) {

						$size = count($this -> dataSet);
						$i = 0;

						foreach ($this->dataSet as $value) {
							switch($value['mchQuestion']) {
								case 'Does the facility have updated 2012 IMCI guidelines?' :
									$IMCI[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'Does the facility have updated ORT Corner guidelines?' :
									$ORT[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'Does the facility have updated ICCM guidelines?' :
									$ICCM[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'Does the facility have an updated Paediatric Protocol?' :
									$PAED[] = array($value['facilityID'], $value['facilityName']);
									break;
							}
						}

						$this -> dataSet = array('IMCI' => $IMCI, 'ORT' => $ORT, 'ICCM' => $ICCM, 'PAED' => $PAED);

						//var_dump($this->dataSet);die;

					} else {
						return $this -> dataSet = null;
					}
				} catch(exception $ex) {
				}
				break;
		}
		return $this -> dataSet;
	}

	/*
	 * Trained Staff
	 */
	public function getTrainedStaff($criteria, $value, $status, $survey, $chartorlist) {
		/*using CI Database Active Record*/
		$data = array();
		$data_prefix_y = '';
		//"name:'Trained (Last 2 years)',data:";
		$data_prefix_n = '';
		//"name:'Trained & Working in CH',data:";
		$data_y = $data_n = $data_categories = array();

		if ($survey == 'ch') {
			$status_condition = 'facilityCHSurveyStatus =?';
		} else if ($survey == 'mnh') {
			$status_condition = 'facilitySurveyStatus =?';
		}

		switch($criteria) {
			case 'national' :
				$criteria_condition = ' ';
				break;
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

		switch($chartorlist) {
			case 'chart' :
				$query = "SELECT COUNT(gt.facilityID) AS facilities,gt.guidelineCode AS training,sum(gt.lastTrained) AS trained,sum(gt.trainedAndWorking) AS working
		  	FROM guideline_training gt WHERE gt.guidelineCode IN 
		 	(SELECT guidelineCode FROM guidelines WHERE guidelineFor='mch') 
			AND gt.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . " " . $criteria_condition . ")
			GROUP BY gt.guidelineCode ORDER BY gt.guidelineCode ASC";
				try {
					$this -> dataSet = $this -> db -> query($query, array($status, $value));
					$this -> dataSet = $this -> dataSet -> result_array();
					if ($this -> dataSet!==NULL) {
						//prep data for the pie chart format
						$size = count($this -> dataSet);
						$i = 0;

						foreach ($this->dataSet as $value) {
							//if(isset($value['trained'])){
							$data_y[] = array($this -> getStaffTrainingGuidelineById($value['training']), (int)($value['trained']));
							//}else if(isset($value['working'])){
							$data_n[] = array($this -> getStaffTrainingGuidelineById($value['training']), (int)($value['working']));
							//}

							//get a set of the 3 staff trainings
							//$data_categories[] = $this -> getStaffTrainingGuidelineById($value['training']);
						}

						$data['categories'] = json_encode($data_categories);

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
				break;
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
			case 'national' :
				$criteria_condition = ' ';
				break;
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

		/*--------------------begin commodity availability by frequency----------------------------------------------*/
		$query = "SELECT count(ca.Availability) AS total_response,ca.CommodityID as commodity,ca.Availability AS frequency,c.unit as unit FROM cquantity_available ca,commodity c
					WHERE ca.CommodityID=c.commodityCode AND ca.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . " " . $criteria_condition . ")
					AND ca.CommodityID IN (SELECT commodityCode FROM commodity WHERE commodityFor='mch')
					GROUP BY ca.CommodityID,ca.Availability
					ORDER BY ca.CommodityID";
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));

			$this -> dataSet = $this -> dataSet -> result_array();
			// echo($this->db->last_query());die;
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);
				$data_set['Sometimes Available'] = $data_set['Available'] = $data_set['Never Available'] = array();
				foreach ($this->dataSet as $value_) {

					//1. collect the categories
					$data_categories[] = $this -> getCommodityNameById($value_['commodity']) . '[' . $value_['unit'] . ']';
					//incase of duplicates--do an array_unique outside the foreach()

					//2. collect the analytic variables
					if ($value_['frequency'] == 'Some Available') {//a hardcore fix...for Nairobi County data only--> (there was a typo in the naming 'Sometimes Available', so Nairobi data has it as 'Some Available')

						$frequency = 'Sometimes Available';
					} else {
						$frequency = $value_['frequency'];
					}
					$analytic_var[] = $frequency;
					//includes duplicates--so we'll array_unique outside the foreach()
					#Declare Arrays

					//collect the data_sets for the 3 analytic variables under availability
					if ($frequency == 'Available') {
						$data_set['Available'][] = intval($value_['total_response']);
					} else if ($frequency == 'Sometimes Available') {
						$data_set['Sometimes Available'][] = intval($value_['total_response']);
					} else if ($frequency == 'Never Available') {
						$data_set['Never Available'][] = intval($value_['total_response']);
					}

				}

				//var_dump($data_set);die;

				//make cat array unique if we got duplicates then json_encode and set to $data array
				$data['categories'] = (array_values(array_unique($data_categories)));
				//expected 28

				//get a unique set of analytic variables
				$analytic_var = array_unique($analytic_var);
				//expected to be 3 in this particular context
				$data['analytic_variables'] = $analytic_var;

				//get the data sets
				$data['responses'] = $data_set;
				//sets of the 3 analytic variables: Available | Sometimes Available | Never Available

				$this -> final_data_set['frequency'] = $data;
				#note, I've introduced $final_data_set to be used in place of $data since $data is reset and reused

				//unset the arrays for reuse in the next query
				$data = $data_set = $data_series = $analytic_var = $data_categories = array();

				//return $this -> final_data_set;
				//var_dump($this -> final_data_set);die;

			} else {
				return null;
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		/*--------------------end commodity availability by frequency----------------------------------------------*/

		/*--------------------begin commodity reason for unavailability----------------------------------------------*/
		$this -> dataSet = array();
		$query = "SELECT count(ca.reason4Unavailability) AS total_response,ca.CommodityID as commodity,ca.reason4Unavailability AS reason, c.unit as unit FROM cquantity_available ca,commodity c
					WHERE ca.CommodityID=c.commodityCode AND ca.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . " " . $criteria_condition . ")
					AND ca.CommodityID IN (SELECT commodityCode FROM commodity WHERE commodityFor='mch')
					AND ca.reason4Unavailability !='Not Applicable'
					GROUP BY ca.CommodityID,ca.reason4Unavailability
					ORDER BY ca.CommodityID";
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));

			$this -> dataSet = $this -> dataSet -> result_array();
			//echo($this->db->last_query());die;
			if ($this -> dataSet !== NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value_) {

					//1. collect the categories
					$data_categories[] = $this -> getCommodityNameById($value_['commodity']) . '[' . $value_['unit'] . ']';
					//incase of duplicates--do an array_unique outside the foreach()

					//2. collect the analytic variables
					$analytic_var[] = $value_['reason'];
					//includes duplicates--so we'll array_unique outside the foreach()

					//collect the data_sets
					if ($value_['reason'] == 'All Used') {
						$data_set[$value_['reason']][] = intval($value_['total_response']);
					} else if ($value_['reason'] == 'Expired') {
						$data_set[$value_['reason']][] = intval($value_['total_response']);
					} else if ($value_['reason'] == 'Not Ordered') {
						$data_set[$value_['reason']][] = intval($value_['total_response']);
					} else if ($value_['reason'] == 'Ordered but not yet Received') {
						$data_set[$value_['reason']][] = intval($value_['total_response']);
					}

				}

				//var_dump($data_set);die;

				//make cat array unique if we got duplicates then json_encode and set to $data array
				$data['categories'] = (array_values(array_unique($data_categories)));

				//get a unique set of analytic variables
				$analytic_var = array_unique($analytic_var);
				//expected to be 3 in this particular context
				$data['analytic_variables'] = $analytic_var;

				//get the data sets
				$data['responses'] = $data_set;
				$this -> final_data_set['unavailability'] = array();
				$this -> final_data_set['unavailability'] = $data;
				#note, I've introduced $final_data_set to be used in place of $data since $data is reset and reused

				//unset the arrays for reuse in the next query
				$data = $data_set = $data_series = $analytic_var = $data_categories = array();

				//return $this -> final_data_set;
				//var_dump($this -> final_data_set);die;

			} else {
				return null;
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		/*--------------------end commodity reason for unavailability----------------------------------------------*/

		/*--------------------begin commodity location of availability----------------------------------------------*/
		$query = "SELECT 
    count(ca.Location) AS total_response,
    ca.CommodityID as commodity,
    ca.Location AS location,
    commodity.unit as unit
FROM
    cquantity_available ca,
    commodity
WHERE
    ca.commodityID = commodity.commodityCode
        AND ca.facilityID IN (SELECT 
            facilityMFC
        FROM
            facility
        WHERE
             " . $status_condition . " " . $criteria_condition . ") 
        AND ca.CommodityID IN (SELECT 
            commodityCode
        FROM
            commodity
        WHERE
            commodityFor = 'mch')
        AND ca.Location NOT LIKE '%Not Applicable%'
GROUP BY ca.CommodityID , ca.Location
ORDER BY ca.CommodityID";
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));

			$this -> dataSet = $this -> dataSet -> result_array();
			//echo($this->db->last_query());die;
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value_) {

					//1. collect the categories
					$data_categories[] = $this -> getCommodityNameById($value_['commodity']);
					//incase of duplicates--do an array_unique outside the foreach()

					//2. collect the analytic variables
					$analytic_var[] = $value_['location'];
					//includes duplicates--so we'll array_unique outside the foreach()

					//collect the data_sets
					if (strpos($value_['location'], 'OPD') !== FALSE) {
						$data_set['OPD'][] = array(intval($value_['total_response']), $this -> getCommodityNameById($value_['commodity']));
					}
					if (strpos($value_['location'], 'MCH') !== FALSE) {
						$data_set['MCH'][] = array(intval($value_['total_response']), $this -> getCommodityNameById($value_['commodity']));
					}
					if (strpos($value_['location'], 'U5 Clinic') !== FALSE) {
						$data_set['U5 Clinic'][] = array(intval($value_['total_response']), $this -> getCommodityNameById($value_['commodity']));
					}
					if (strpos($value_['location'], 'Ward') !== FALSE) {
						$data_set['Ward'][] = array(intval($value_['total_response']), $this -> getCommodityNameById($value_['commodity']));
					}
					if (strpos($value_['location'], 'Other') !== FALSE) {
						$data_set['Other'][] = array(intval($value_['total_response']), $this -> getCommodityNameById($value_['commodity']));
					}

				}

				//var_dump($data_set[2]);die;

				//make cat array unique if we got duplicates then json_encode and set to $data array
				$data['categories'] = array_values(array_unique($data_categories));
				//expected 5

				//get a unique set of analytic variables
				$analytic_var = array('OPD', 'MCH', 'U5 Clinic', 'Ward', 'Other');
				//we know of these 5 in this particular context

				//get the data sets
				$data['responses'] = $data_set;

				$this -> final_data_set['location'] = $data;
				#note, I've introduced $final_data_set to be used in place of $data since $data is reset and reused

				//unset the arrays for reuse in the next query
				$data = $data_set = $data_series = $analytic_var = $data_categories = array();

				//return $this -> final_data_set;
				//var_dump($this -> final_data_set);die;

			} else {
				return null;
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		/*--------------------end commodity location of availability----------------------------------------------*/

		/*--------------------begin commodity availability by quantity----------------------------------------------*/
		$query = "SELECT 
    SUM(ca.quantityAvailable) AS total_quantity,
    ca.CommodityID as commodity,commodity.unit AS unit
FROM
    cquantity_available ca,commodity
WHERE
commodity.commodityCode=ca.CommodityID AND
    ca.facilityID IN (SELECT 
            facilityMFC
        FROM
            facility
        WHERE
            " . $status_condition . " " . $criteria_condition . ") 
        AND ca.CommodityID IN (SELECT 
            commodityCode
        FROM
            commodity
        WHERE
            commodityFor = 'mch')
        AND ca.quantityAvailable != - 1
GROUP BY ca.CommodityID
ORDER BY ca.CommodityID";
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));

			$this -> dataSet = $this -> dataSet -> result_array();
			//echo($this->db->last_query());die;
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value_) {

					//1. collect the categories
					$data_categories[] = $this -> getCommodityNameById($value_['commodity']). '[' . $value_['unit'] . ']';
					//includes duplicates--so we'll array_unique outside the foreach()

					//2. collect the analytic variables
					$analytic_var[] = $this -> getCommodityNameById($value_['commodity']). '[' . $value_['unit'] . ']';
					//includes duplicates--so we'll array_unique outside the foreach()

					//collect the data_sets by commodity
					$data_set[$this -> getCommodityNameById($value_['commodity'])] = intval($value_['total_quantity']);

				}
//var_dump($data_categories);die;
				//var_dump($analytic_var);die;

				//make cat array unique if we got duplicates then json_encode and set to $data array
				$data['categories'] = array_values(array_unique($data_categories));
				//expected 5

				//get a unique set of analytic variables
				$analytic_var = array_unique($analytic_var);

				//get the data sets
				$data['responses'] = $data_set;

				$this -> final_data_set['quantities'] = $data;
				$data = $data_set = $data_series = $analytic_var = $data_categories = array();
				//unset the arrays for reuse

				/*--------------------end commodity availability by quantity----------------------------------------------*/

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

	public function getCHCommoditySupplier($criteria, $value, $status, $survey) {
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
			case 'national' :
				$criteria_condition = ' ';
				break;
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

		/*--------------------begin equipment main supplier----------------------------------------------*/
		$query = "SELECT count(ca.SupplierID) AS total_response,ca.CommodityID as commodity,ca.SupplierID AS supplier, c.unit as unit FROM cquantity_available ca,commodity c
				 WHERE ca.CommodityID=c.commodityCode AND ca.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . " " . $criteria_condition . ") 
				 AND ca.CommodityID IN (SELECT commodityCode FROM commodity WHERE commodityFor='mch')
				GROUP BY ca.CommodityID,ca.SupplierID
				ORDER BY ca.CommodityID";
		try {

			$this -> dataSet = $this -> db -> query($query, array($status, $value));

			$this -> dataSet = $this -> dataSet -> result_array();
			//echo($this->db->last_query());die;
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value_) {

					//1. collect the categories
					$data_categories[] = $value_['supplier'];
					//incase of duplicates--do an array_unique outside the foreach()

					//2. collect the analytic variables
					$analytic_var[] = $this -> getCommodityNameById($value_['commodity']) . '[' . $value_['unit'] . ']';
					//includes duplicates--so we'll array_unique outside the foreach()

					//data set by each analytic variable
					$data_set[$value_['supplier']][] = intval($value_['total_response']);

				}

				//var_dump($data_set);die;

				//make cat array unique if we got duplicates then json_encode and set to $data array
				$data['categories'] = (array_values(array_unique($data_categories)));
				//expected 28

				//get a unique set of analytic variables
				$analytic_var = array_unique($analytic_var);
				//expected to be 3 in this particular context
				$data['analytic_variables'] = $analytic_var;

				//get the data sets
				$data['responses'] = $data_set;
				//sets of the 3 analytic variables: Available | Sometimes Available | Never Available

				$this -> dataSet = $data;

				return $this -> dataSet;

			} else {
				return $this -> dataSet = null;
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
	}

	/*
	 * Services to Children with Diarrhoea
	 */
	public function getChildrenServices($criteria, $value, $status, $survey, $chartorlist) {
		/*using CI Database Active Record*/
		$data = $data_set = $data_series = $analytic_var = $data_categories = array();
		$data_y = array();
		$data_n = array();
		$temp = $muac = $weight = $height = $mch = array();
		$MCHY = $MCHN = $temperatureY = $temperatureN = $weightY = $weightN = $HLY = $HLN = $MUACY = $MUACN = 0;
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
			case 'national' :
				$criteria_condition = ' ';
				break;
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

		#Check whether a graph or a list is required
		switch($chartorlist) {
			#initial query
			case 'chart' :
				$query = "SELECT il.indicatorID AS indicator,il.response as response
				  FROM mch_indicator_log il WHERE il.indicatorID IN (SELECT indicatorCode FROM mch_indicators WHERE indicatorFor='svc') 
				  AND il.facilityID IN (SELECT facilityMFC FROM facility 
				  WHERE " . $status_condition . "  " . $criteria_condition . ") ";

				try {
					$this -> dataSet = $this -> db -> query($query, array($status, $value));
					$this -> dataSet = $this -> dataSet -> result_array();
					//echo $this->db->last_query();die;
					if ($this -> dataSet!==NULL) {
						//prep data for the pie chart format
						$size = count($this -> dataSet);
						$i = 0;
						$yesCount = 0;
						$noCount = 0;

						//var_dump($this->dataSet);

						#Forced One Values
						foreach ($this->dataSet as $value) {
							switch($this->getChildHealthIndicatorName($value['indicator'])) {
								case 'Use of MCH booklet' :
									if ($value['response'] == 'Yes') {
										$MCHY++;
									} else if ($value['response'] == 'No') {
										$MCHN++;
									}
									break;

								case 'Temperature taken' :
									if ($value['response'] == 'Yes') {
										$temperatureY++;
									} else if ($value['response'] == 'No') {
										$temperatureN++;
									}
									break;

								case 'Weight taken' :
									if ($value['response'] == 'Yes') {
										$weightY++;
									} else if ($value['response'] == 'No') {
										$weightN++;
									}
									break;
								case 'Height/Length taken' :
									if ($value['response'] == 'Yes') {
										$HLY++;
									} else if ($value['response'] == 'No') {
										$HLN++;
									}
									break;
								case 'MUAC taken' :
									if ($value['response'] == 'Yes') {
										$MUACY++;
									} else if ($value['response'] == 'No') {
										$MUACN++;
									}
									break;
							}
							//echo $MCHY;
							/*if ($value['response'] == 'Yes') {
							 $data_y[] = array($this -> getChildHealthIndicatorName($value['indicator']), 1);
							 $yesCount++;
							 } else if ($value['response'] == 'No') {
							 $data_n[] = array($this -> getChildHealthIndicatorName($value['indicator']), 1);
							 $noCount++;
							 }*/

							//get a set of the 5 services offered

						}
						$data_categories = array('Use of MCH booklet', 'Temperature taken', 'Weight taken', 'Height/Length taken', 'MUAC taken');
						$data['categories'] = $data_categories;

						$data['yes_values'] = array((int)$MCHY, (int)$temperatureY, (int)$weightY, (int)$HLY, (int)$MUACY);
						$data['no_values'] = array((int)$MCHN, (int)$temperatureN, (int)$weightN, (int)$HLN, (int)$MUACN);

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
				break;
			case 'list' :
				$query = "SELECT 
    i.indicatorName, il.facilityID, f.facilityName
FROM
    mch_indicator_log il,
    mch_indicators i,
    facility f
WHERE
    il.response = 'No'
        AND il.indicatorID = i.indicatorCode
        AND il.facilityID = f.facilityMFC
        AND il.indicatorID IN (SELECT 
            indicatorCode
        FROM
            mch_indicators
        WHERE
            indicatorFor = 'svc')
        AND il.facilityID IN (SELECT 
            facilityMFC
        FROM
            facility
        WHERE
           " . $status_condition . "  " . $criteria_condition . ") ";
				try {
					$this -> dataSet = $this -> db -> query($query, array($status, $value));
					$this -> dataSet = $this -> dataSet -> result_array();

					if ($this -> dataSet!==NULL) {

						$size = count($this -> dataSet);
						$i = 0;

						foreach ($this->dataSet as $value) {
							switch($value['indicatorName']) {
								case 'Temperature taken' :
									$temp[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'Weight taken' :
									$weight[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'Height/Length taken' :
									$height[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'Use of MCH booklet' :
									$mch[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'MUAC taken' :
									$muac[] = array($value['facilityID'], $value['facilityName']);
									break;
							}
						}

						$this -> dataSet = array('temp' => $temp, 'weight' => $weight, 'height' => $height, 'mch' => $mch, 'muac' => $muac);

						//var_dump($this->dataSet);die;

					} else {
						return $this -> dataSet = null;
					}
				} catch(exception $ex) {
				}
				break;
		}
		return $this -> dataSet;
	}

	/*
	 * Danger Signs assessed in Ongoing Sessions
	 */
	public function getDangerSigns($criteria, $value, $status, $survey, $chartorlist) {
		/*using CI Database Active Record*/
		$data = $data_set = $data_series = $analytic_var = $data_categories = array();
		$data_y = array();
		$data_n = array();
		$lethargy = $breastfeed = array();
		$breastFeedY = $breastFeedN = $lethargyY = $lethargyN = 0;

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
		// echo $criteria;die;
		switch($criteria) {
			case 'national' :
				$criteria_condition = ' ';
				break;
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
		switch($chartorlist) {
			case 'chart' :
				$query = "SELECT il.indicatorID AS indicator,il.response as response
				  FROM mch_indicator_log il WHERE il.indicatorID IN (SELECT indicatorCode FROM mch_indicators WHERE indicatorFor='sgn') 
				  AND il.facilityID IN (SELECT facilityMFC FROM facility 
				  WHERE " . $status_condition . "  " . $criteria_condition . ") ";
				try {
					$this -> dataSet = $this -> db -> query($query, array($status, $value));
					$this -> dataSet = $this -> dataSet -> result_array();
					//echo $this->db->last_query();die;
					if ($this -> dataSet!==NULL) {
						//prep data for the pie chart format
						$size = count($this -> dataSet);
						$i = 0;
						//var_dump($this -> dataSet);
						$data_categories = array('Inability to drink or breastfeed', 'Lethargy and unconsciousness');
						foreach ($this->dataSet as $value) {

							switch($this->getChildHealthIndicatorName($value['indicator'])) {
								case 'Inability to drink or breastfeed' :
									if ($value['response'] == 'Yes') {
										$breastFeedY++;
									} else if ($value['response'] == 'No') {
										$breastFeedN++;
									}
									break;
								case 'Lethargy and unconsciousness' :
									if ($value['response'] == 'Yes') {
										$lethargyY++;
									} else if ($value['response'] == 'No') {
										$lethargyN++;
									}
									break;
							}

							/*if ($value['response'] == 'Yes') {
							 $data_y[] = array($this -> getChildHealthIndicatorName($value['indicator']), 1);
							 } else if ($value['response'] == 'No') {
							 $data_n[] = array($this -> getChildHealthIndicatorName($value['indicator']), 1);
							 }
							 */
							//get a set of the 5 services offered
							//$data_categories[] = $this -> getChildHealthIndicatorName($value['indicator']);
						}

						$data['categories'] = $data_categories;

						$data['yes_values'] = array((int)$breastFeedY, (int)$lethargyY);
						$data['no_values'] = array((int)$breastFeedN, (int)$lethargyN); ;

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
				break;
			case 'list' :
				$query = "SELECT 
    i.indicatorName, il.facilityID, f.facilityName
FROM
    mch_indicator_log il,
    mch_indicators i,
    facility f
WHERE
    il.response = 'No'
        AND il.indicatorID = i.indicatorCode
        AND il.facilityID = f.facilityMFC
        AND il.indicatorID IN (SELECT 
            indicatorCode
        FROM
            mch_indicators
        WHERE
            indicatorFor = 'sgn')
        AND il.facilityID IN (SELECT 
            facilityMFC
        FROM
            facility
        WHERE
           " . $status_condition . "  " . $criteria_condition . ") ";
				try {
					$this -> dataSet = $this -> db -> query($query, array($status, $value));
					$this -> dataSet = $this -> dataSet -> result_array();

					if ($this -> dataSet!==NULL) {

						$size = count($this -> dataSet);
						$i = 0;

						foreach ($this->dataSet as $value) {
							switch($value['indicatorName']) {
								case 'Inability to drink or breastfeed' :
									$breastfeed[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'Lethargy and unconsciousness' :
									$lethargy[] = array($value['facilityID'], $value['facilityName']);
									break;
							}
						}

						$this -> dataSet = array('breastfeed' => $breastfeed, 'lethargy' => $lethargy);

						//var_dump($this->dataSet);die;

					} else {
						return $this -> dataSet = null;
					}
				} catch(exception $ex) {
				}
				break;
		}
		return $this -> dataSet;
	}

	/*
	 * Tasks performed in Ongoing Sessions
	 */
	public function getActionsPerformed($criteria, $value, $status, $survey, $chartorlist) {
		/*using CI Database Active Record*/
		$data = $data_set = $data_series = $analytic_var = $data_categories = array();
		$data_y = array();
		$data_n = array();
		$diarrhoea = $blood = $sunken = $fluid = $pinch = $dehydration = array();
		$diarrhoeaY = $diarrhoeaN = $bloodY = $bloodN = $sunkenY = $sunkenN = $fluidY = $fluidN = $pinchY = $pinchN = $dehydrationY = $dehydrationN = 0;
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
			case 'national' :
				$criteria_condition = ' ';
				break;
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
		switch($chartorlist) {
			case 'chart' :
				$query = "SELECT il.indicatorID AS indicator,il.response as response
FROM mch_indicator_log il WHERE il.indicatorID IN (SELECT indicatorCode FROM mch_indicators WHERE indicatorFor='dgn')
AND il.facilityID IN (SELECT facilityMFC FROM facility
WHERE " . $status_condition . "  " . $criteria_condition . ") ";
				try {
					$this -> dataSet = $this -> db -> query($query, array($status, $value));
					$this -> dataSet = $this -> dataSet -> result_array();
					if ($this -> dataSet!==NULL) {
						//prep data for the pie chart format
						$size = count($this -> dataSet);
						$i = 0;
						//var_dump($this -> dataSet);
						foreach ($this->dataSet as $value) {
							switch($this->getChildHealthIndicatorName($value['indicator'])) {
								case 'Ask about the duration of diarrhoea' :
									if ($value['response'] == 'Yes') {
										$diarrhoeaY++;
									} else if ($value['response'] == 'No') {
										$diarrhoeaN++;
									}
									break;
								case 'Ask about the presence of Blood in stool' :
									if ($value['response'] == 'Yes') {
										$bloodY++;
									} else if ($value['response'] == 'No') {
										$bloodN++;
									}
									break;
								case 'Look for sunken eyes' :
									if ($value['response'] == 'Yes') {
										$sunkenY++;
									} else if ($value['response'] == 'No') {
										$sunkenN++;
									}
									break;
								case 'Offer the child fluid to drink' :
									if ($value['response'] == 'Yes') {
										$fluidY++;
									} else if ($value['response'] == 'No') {
										$fluidN++;
									}
									break;
								case 'Perform skin pinch' :
									if ($value['response'] == 'Yes') {
										$pinchY++;
									} else if ($value['response'] == 'No') {
										$pinchN++;
									}
									break;
								case 'Correctly assess and classify diarrhoea and dehydration' :
									if ($value['response'] == 'Yes') {
										$dehydrationY++;
									} else if ($value['response'] == 'No') {
										$dehydrationN++;
									}
									break;
							}
							/*if ($value['response'] == 'Yes') {
							 $data_y[] = array($this -> getChildHealthIndicatorName($value['indicator']), 1);
							 } else if ($value['response'] == 'No') {
							 $data_n[] = array($this -> getChildHealthIndicatorName($value['indicator']), 1);
							 }*/

						}
						$data_categories = array('Ask about the duration of diarrhoea', 'Ask about the presence of Blood in stool', 'Look for sunken eyes', 'Offer the child fluid to drink', 'Perform skin pinch', 'Correctly assess and classify diarrhoea and dehydration');
						$data['categories'] = $data_categories;

						$data['yes_values'] = array($diarrhoeaY, $bloodY, $sunkenY, $fluidY, $pinchY, $dehydrationY);
						$data['no_values'] = array($diarrhoeaN, $bloodN, $sunkenN, $fluidN, $pinchN, $dehydrationN);

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
				break;
			case 'list' :
				$query = "SELECT 
    i.indicatorName, il.facilityID, f.facilityName
FROM
    mch_indicator_log il,
    mch_indicators i,
    facility f
WHERE
    il.response = 'No'
        AND il.indicatorID = i.indicatorCode
        AND il.facilityID = f.facilityMFC
        AND il.indicatorID IN (SELECT 
            indicatorCode
        FROM
            mch_indicators
        WHERE
            indicatorFor = 'dgn')
        AND il.facilityID IN (SELECT 
            facilityMFC
        FROM
            facility
        WHERE
           " . $status_condition . "  " . $criteria_condition . ") ";
				try {
					$this -> dataSet = $this -> db -> query($query, array($status, $value));
					$this -> dataSet = $this -> dataSet -> result_array();

					if ($this -> dataSet!==NULL) {

						$size = count($this -> dataSet);
						$i = 0;

						foreach ($this->dataSet as $value) {
							switch($value['indicatorName']) {
								case 'Ask about the duration of diarrhoea' :
									$diarrhoea[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'Ask about the presence of Blood in stool' :
									$blood[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'Look for sunken eyes' :
									$sunken[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'Offer the child fluid to drink' :
									$fluid[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'Perform skin pinch' :
									$pinch[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'Correctly assess and classify diarrhoea and dehydration' :
									$dehydration[] = array($value['facilityID'], $value['facilityName']);
									break;
							}
						}

						$this -> dataSet = array('diarrhoea' => $diarrhoea, 'blood' => $blood, 'sunken' => $sunken, 'fluid' => $fluid, 'pinch' => $pinch, 'dehydration' => $dehydration);

						//var_dump($this->dataSet);die;

					} else {
						return $this -> dataSet = null;
					}
				} catch(exception $ex) {
				}
				break;
		}
		return $this -> dataSet;

	}

	/*
	 * Counsel on Ongoing Sessions
	 */
	public function getCounselGiven($criteria, $value, $status, $survey, $chartorlist) {
		/*using CI Database Active Record*/
		$data = $data_set = $data_series = $analytic_var = $data_categories = array();
		$data_y = array();
		$data_n = array();
		$extraY = $extraN = $homeY = $homeN = $followY = $followN = 0;
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
			case 'national' :
				$criteria_condition = ' ';
				break;
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
		switch($chartorlist) {
			case 'chart' :
				$query = "SELECT il.indicatorID AS indicator,il.response as response
FROM mch_indicator_log il WHERE il.indicatorID IN (SELECT indicatorCode FROM mch_indicators WHERE indicatorFor='cns')
AND il.facilityID IN (SELECT facilityMFC FROM facility
WHERE " . $status_condition . "  " . $criteria_condition . ")";
				try {
					$this -> dataSet = $this -> db -> query($query, array($status, $value));
					$this -> dataSet = $this -> dataSet -> result_array();
					if ($this -> dataSet!==NULL) {
						//prep data for the pie chart format
						$size = count($this -> dataSet);
						$i = 0;
						//var_dump($this -> dataSet);
						foreach ($this->dataSet as $value) {
							switch($this->getChildHealthIndicatorName($value['indicator'])) {
								case 'On giving extra feeding' :
									if ($value['response'] == 'Yes') {
										$extraY++;
									} else if ($value['response'] == 'No') {
										$extraN++;
									}
									break;
								case 'On home care' :
									if ($value['response'] == 'Yes') {
										$homeY++;
									} else if ($value['response'] == 'No') {
										$homeN++;
									}
									break;
								case 'On when to return for follow up' :
									if ($value['response'] == 'Yes') {
										$followY++;
									} else if ($value['response'] == 'No') {
										$followN++;
									}
									break;
							}

						}
						$data_categories = array('On giving extra feeding', 'On home care', 'On when to return for follow up');
						$data['categories'] = $data_categories;
						$data['yes_values'] = array($extraY, $homeY, $followY);
						$data['no_values'] = array($extraN, $homeN, $followN);

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
				break;
			case 'list' :
				$query = "SELECT 
    i.indicatorName, il.facilityID, f.facilityName
FROM
    mch_indicator_log il,
    mch_indicators i,
    facility f
WHERE
    il.response = 'No'
        AND il.indicatorID = i.indicatorCode
        AND il.facilityID = f.facilityMFC
        AND il.indicatorID IN (SELECT 
            indicatorCode
        FROM
            mch_indicators
        WHERE
            indicatorFor = 'cns')
        AND il.facilityID IN (SELECT 
            facilityMFC
        FROM
            facility
        WHERE
           " . $status_condition . "  " . $criteria_condition . ") ";
				try {
					$this -> dataSet = $this -> db -> query($query, array($status, $value));
					$this -> dataSet = $this -> dataSet -> result_array();

					if ($this -> dataSet!==NULL) {

						$size = count($this -> dataSet);
						$i = 0;

						foreach ($this->dataSet as $value) {
							switch($value['indicatorName']) {
								case 'On giving extra feeding' :
									$extra[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'On home care' :
									$home[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'On when to return for follow up' :
									$follow[] = array($value['facilityID'], $value['facilityName']);
									break;
							}
						}

						$this -> dataSet = array('extra' => $extra, 'home' => $home, 'follow' => $follow);

						//var_dump($this->dataSet);die;

					} else {
						return $this -> dataSet = null;
					}
				} catch(exception $ex) {
				}
				break;
		}
		return $this -> dataSet;

	}

	/*
	 * Get Tools in Units
	 */

	public function getTools($criteria, $value, $status, $survey, $chartorlist) {
		/*using CI Database Active Record*/
		$data = $data_set = $data_series = $analytic_var = $data_categories = array();
		$data_y = array();
		$data_n = array();
		$under5Y = $under5N = $ORTY = $ORTN = $bookY = $bookN = 0;
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
			case 'national' :
				$criteria_condition = ' ';
				break;
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
		switch($chartorlist) {
			case 'chart' :
				$query = "SELECT t.indicatorID AS tool,t.response as response
FROM mch_indicator_log t WHERE t.indicatorID IN (SELECT indicatorCode FROM mch_indicators WHERE indicatorFor='ror')
AND t.facilityID IN (SELECT facilityMFC FROM facility
WHERE " . $status_condition . "  " . $criteria_condition . ")";
				try {
					$this -> dataSet = $this -> db -> query($query, array($status, $value));
					$this -> dataSet = $this -> dataSet -> result_array();
					if ($this -> dataSet!==NULL) {
						//prep data for the pie chart format
						$size = count($this -> dataSet);
						$i = 0;
						//var_dump($this -> dataSet);
						foreach ($this->dataSet as $value) {
							switch($this->getChildHealthIndicatorName($value['tool'])) {
								case 'Under 5 register' :
									if ($value['response'] == 'Yes') {
										$under5Y++;
									} else if ($value['response'] == 'No') {
										$under5N++;
									}
									break;
								case 'ORT Corner register(improvised)' :
									if ($value['response'] == 'Yes') {
										$ORTY++;
									} else if ($value['response'] == 'No') {
										$ORTN++;
									}
									break;
								case 'Mother Child Booklet' :
									if ($value['response'] == 'Yes') {
										$bookY++;
									} else if ($value['response'] == 'No') {
										$bookN++;
									}
									break;
							}

							//echo $value['indicator'];
						}
						$data_categories = array('Under 5 register', 'ORT Corner register(improvised)', 'Mother Child Booklet');
						$data['categories'] = $data_categories;
						$data['yes_values'] = array($under5Y, $ORTY, $bookY);
						$data['no_values'] = array($under5N, $ORTN, $bookN);

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
				break;
			case 'list' :
			case 'list' :
				$query = "SELECT 
    i.indicatorName, il.facilityID, f.facilityName
FROM
    mch_indicator_log il,
    mch_indicators i,
    facility f
WHERE
    il.response = 'No'
        AND il.indicatorID = i.indicatorCode
        AND il.facilityID = f.facilityMFC
        AND il.indicatorID IN (SELECT 
            indicatorCode
        FROM
            mch_indicators
        WHERE
            indicatorFor = 'ror')
        AND il.facilityID IN (SELECT 
            facilityMFC
        FROM
            facility
        WHERE
           " . $status_condition . "  " . $criteria_condition . ") ";
				try {
					$this -> dataSet = $this -> db -> query($query, array($status, $value));
					$this -> dataSet = $this -> dataSet -> result_array();

					if ($this -> dataSet!==NULL) {

						$size = count($this -> dataSet);
						$i = 0;

						foreach ($this->dataSet as $value) {
							switch($value['indicatorName']) {
								case 'Under 5 register' :
									$under5[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'ORT Corner register(improvised)' :
									$ORT[] = array($value['facilityID'], $value['facilityName']);
									break;
								case 'Mother Child Booklet' :
									$book[] = array($value['facilityID'], $value['facilityName']);
									break;
							}
						}

						$this -> dataSet = array('under5' => $under5, 'ORT' => $ORT, 'book' => $book);

						//var_dump($this->dataSet);die;

					} else {
						return $this -> dataSet = null;
					}
				} catch(exception $ex) {
				}
				break;
		}
		return $this -> dataSet;

	}

	/*
	 * Diarrhoea case numbers per Month
	 */
	public function getDiarrhoeaCaseNumbers($criteria, $value, $status, $survey) {
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
			case 'national' :
				$criteria_condition = ' ';
				break;
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

		$query = "SELECT SUM(d.jan13) AS jan, SUM(d.feb13) AS feb, SUM(d.mar13) AS mar, SUM(d.apr13) AS apr,
SUM(d.may13) AS may, SUM(d.june13) AS june, SUM(d.july13) AS july, SUM(d.aug13) AS aug,
SUM(d.sept13) AS sept, SUM(d.oct13) AS oct, SUM(d.nov13) AS nov, SUM(d.dec13) AS december
FROM morbidity_data_log d WHERE d.facilityID IN (SELECT facilityMFC FROM facility
WHERE " . $status_condition . "  " . $criteria_condition . ")";
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));
			$this -> dataSet = $this -> dataSet -> result_array();
			//echo $this->db->last_query();die;
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);
				$i = 0;

				foreach ($this->dataSet as $value => $key) {
					$data['num_of_diarrhoea_cases'][] = $key;
				}

				//fixed set of 12 months in a year..not an option but to hard code.. :)
				$data_categories = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

				$data['categories'] = $data_categories;

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
	 * Diarrhoea case treatments
	 */

	public function getDiarrhoeaCaseTreatment($criteria, $value, $status, $survey) {
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
			case 'national' :
				$criteria_condition = ' ';
				break;
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

		$query = "SELECT tl.treatmentID AS treatment,SUM(tl.severeDehydrationNo) AS severe_dehydration, SUM(tl.someDehydrationNo) AS some_dehydration,
SUM(tl.noDehydrationNo) AS no_dehydration, SUM(tl.dysentryNo) AS dysentry, SUM(tl.noClassificationNo) AS no_classification
FROM mch_treatment_log tl WHERE tl.treatmentID IN (SELECT treatmentCode FROM mch_treatments
WHERE treatmentFor='dia') AND tl.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . "  " . $criteria_condition . ")
GROUP BY tl.treatmentID ORDER BY tl.treatmentID ASC";
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));
			$this -> dataSet = $this -> dataSet -> result_array();
			//echo $this->db->last_query();die;
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);
				$i = 0;

				foreach ($this->dataSet as $value) {
					//get a set of the 5 diarrhoea treatment types available
					$data_categories[] = $this -> getChildHealthTreatmentName($value['treatment']);

					//get the responses by classification per given treatment type
					$data[$this -> getChildHealthTreatmentName($value['treatment'])] = array('severe_dehydration' => intval($value['severe_dehydration']), 'some_dehydration' => intval($value['some_dehydration']), 'no_dehydration' => intval($value['no_dehydration']), 'dysentry' => intval($value['dysentry']), 'no_classification' => intval($value['no_classification']));
				}

				$data['categories'] = $data_categories;

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
	 * ORT Corner Assessment
	 */
	public function getORTCornerAssessment($criteria, $value, $status, $survey) {
		/*using CI Database Active Record*/
		$data = $data_set = $data_series = $analytic_var = $data_categories = array();
		$data_y = array();
		$data_n = array();
		$functionalTotalY = $functionalTotalN = $rehydrationTotalY = $rehydrationTotalN = $locationY = $locationN = 0;

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
			case 'national' :
				$criteria_condition = ' ';
				break;
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

		$query = "SELECT oa.indicatorID AS assessment_item,oa.response as response
FROM mch_questions_log oa WHERE oa.indicatorID IN (SELECT questionCode FROM mch_questions WHERE mchQuestionFor='ort')
AND oa.facilityID IN (SELECT facilityMFC FROM facility
WHERE " . $status_condition . "  " . $criteria_condition . ") ORDER BY oa.indicatorID ASC";
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));
			$this -> dataSet = $this -> dataSet -> result_array();
			//echo $this->db->last_query();
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);
				$i = 0;

				foreach ($this->dataSet as $value) {
					switch($this->getChildHealthQuestionName($value['assessment_item'])) {
						case 'Is the ORT Corner functional?' :
							if ($value['response'] == 'Yes') {
								$functionalTotalY++;
							} else if ($value['response'] == 'No') {
								$functionalTotalN++;
							}
							break;

						case 'Does this Facility have a designated location for oral rehydration?' :
							if ($value['response'] == 'Yes') {
								$rehydrationTotalY++;
							} else if ($value['response'] == 'No') {
								$rehydrationTotalN++;
							}
							break;

						case 'Where is the designated location of the ORT Corner?' :
							if ($value['response'] == 'Yes') {
								$locationY++;
							} else if ($value['response'] == 'No') {
								$locationN++;
							}
							break;
					}

					/*if ($value['response'] == 'Yes') {
					 $data_y[] = array($this -> getChildHealthQuestionName($value['assessment_item']), 1);
					 } else if ($value['response'] == 'No') {
					 $data_n[] = array($this -> getChildHealthQuestionName($value['assessment_item']), 1);
					 }*/

					//get a set of the 3 items for ORT assessment

				}
				$data['categories'] = array('Is the ORT Corner functional?', 'Does this Facility have a designated location for oral rehydration?');
				$data['yes_values'] = array($functionalTotalY, $rehydrationTotalY);
				$data['no_values'] = array($functionalTotalN, $rehydrationTotalN);

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
	 * Availability, Location and Functionality of Equipment at ORT Corner
	 */
	public function getORTCornerEquipmement($criteria, $value, $status, $survey) {
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
			case 'national' :
				$criteria_condition = ' ';
				$value = ' ';
				break;
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

		/*--------------------begin ort equipment availability by frequency----------------------------------------------*/
		$query = "SELECT count(ea.equipAvailability) AS total_response,ea.equipmentID as equipment,ea.equipAvailability AS frequency FROM equipments_available ea WHERE ea.facilityID IN (SELECT facilityMFC FROM facility
WHERE " . $status_condition . " " . $criteria_condition . ") AND ea.equipmentID IN (SELECT equipmentCode FROM equipment WHERE equipmentFor='ort')
GROUP BY ea.equipmentID,ea.equipAvailability ORDER BY ea.equipmentID ASC";
		try {

			$this -> dataSet = $this -> db -> query($query, array($status, $value));

			$this -> dataSet = $this -> dataSet -> result_array();
			//echo($this->db->last_query());die;
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value_) {

					//1. collect the categories
					$data_categories[] = $this -> getCHEquipmentName($value_['equipment']);
					//incase of duplicates--do an array_unique outside the foreach()

					//2. collect the analytic variables
					if ($value_['frequency'] == 'Some Available') {//a hardcore fix...for Nairobi County data only--> (there was a typo in the naming 'Sometimes Available', so Nairobi data has it as 'Some Available')

						$frequency = 'Sometimes Available';
					} else {
						$frequency = $value_['frequency'];
					}
					$analytic_var[] = $frequency;
					//includes duplicates--so we'll array_unique outside the foreach()

					//collect the data_sets for the 3 analytic variables under availability
					if ($frequency == 'Available') {
						$data_set['Available'][] = intval($value_['total_response']);
					} else if ($frequency == 'Sometimes Available') {
						$data_set['Sometimes Available'][] = intval($value_['total_response']);
					} else if ($frequency == 'Never Available') {
						$data_set['Never Available'][] = intval($value_['total_response']);
					}

				}

				//var_dump($data_set);die;

				//make cat array unique if we got duplicates then json_encode and set to $data array
				$data['categories'] = (array_values(array_unique($data_categories)));
				//expected 28

				//get a unique set of analytic variables
				$analytic_var = array_unique($analytic_var);
				//expected to be 3 in this particular context
				$data['analytic_variables'] = $analytic_var;

				//get the data sets
				$data['responses'] = $data_set;
				//sets of the 3 analytic variables: Available | Sometimes Available | Never Available

				$this -> final_data_set['frequency'] = $data;
				#note, I've introduced $final_data_set to be used in place of $data since $data is reset and reused

				//unset the arrays for reuse in the next query
				$data = $data_set = $data_series = $analytic_var = $data_categories = array();

				//return $this -> final_data_set;

			} else {
				return null;
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		/*--------------------end ort equipment availability by frequency----------------------------------------------*/

		/*--------------------begin ort equipment location of availability----------------------------------------------*/
		$query = "SELECT count(ea.equipLocation) AS total_response,ea.equipmentID as equipment,ea.equipLocation AS location
FROM equipments_available ea WHERE ea.facilityID IN (SELECT facilityMFC FROM facility
WHERE " . $status_condition . " " . $criteria_condition . ") AND ea.equipmentID IN
(SELECT equipmentCode FROM equipment WHERE equipmentFor='ort')
AND ea.equipLocation NOT LIKE '%Not Applicable%' GROUP BY ea.equipmentID,ea.equipLocation ORDER BY ea.equipmentID ASC";

		try {
			//echo $query;die;
			//die(print $status.$value);
			$this -> dataSet = $this -> db -> query($query, array($status, $value));
			//var_dump($this->dataSet);die;
			$this -> dataSet = $this -> dataSet -> result_array();
			//echo($this->db->last_query());die;
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);
				$count_instances = array('MCH' => 0, 'OPD' => 0, 'U5 Clinic' => 0, 'Ward' => 0, 'Other' => 0);
				//to hold the location instances
				foreach ($this->dataSet as $value_) {

					//1. collect the categories
					$data_categories[] = $this -> getCHEquipmentName($value_['equipment']);
					//incase of duplicates--do an array_unique outside the foreach()

					//2. collect the analytic variables
					//$analytic_var[] = $value['location'];-->hard fix outside the loop as values are coma separated...good fix..have v-look up in the db

					//collect the data_sets from the coma separated responses
					if (strpos($value_['location'], 'OPD') !== FALSE) {
						$count_instances['OPD'] += intval($value_['total_response']);
						$data_set[$this -> getCHEquipmentName($value_['equipment'])]['OPD'] = $count_instances['OPD'];
					}
					if (strpos($value_['location'], 'MCH') !== FALSE) {
						$count_instances['MCH'] += intval($value_['total_response']);
						$data_set[$this -> getCHEquipmentName($value_['equipment'])]['MCH'] = $count_instances['MCH'];
					}
					if (strpos($value_['location'], 'U5 Clinic') !== FALSE) {
						$count_instances['U5 Clinic'] += intval($value_['total_response']);
						$data_set[$this -> getCHEquipmentName($value_['equipment'])]['U5 Clinic'] = $count_instances['U5 Clinic'];
					}
					if (strpos($value_['location'], 'Ward') !== FALSE) {
						$count_instances['Ward'] += intval($value_['total_response']);
						$data_set[$this -> getCHEquipmentName($value_['equipment'])]['Ward'] = $count_instances['Ward'];
					}
					if (strpos($value_['location'], 'Other') !== FALSE) {
						$count_instances['Other'] += intval($value_['total_response']);
						$data_set[$this -> getCHEquipmentName($value_['equipment'])]['Other'] = $count_instances['Other'];
					}

				}
				//var_dump($count_instances);die;
				//var_dump($data_set);die;

				//make array unique if we got duplicates and set to $data array
				$data['categories'] = array_values(array_unique($data_categories));
				//expected 28

				//get a unique set of analytic variables
				$analytic_var = array('OPD', 'MCH', 'U5 Clinic', 'Ward', 'Other');
				//expected to be 5 in this particular context, again we know they r just these 5 :)
				$data['analytic_variables'] = $analytic_var;

				//get the data sets
				$data['responses'] = $data_set;
				//sets of the 5 analytic variables: 'OPD', 'MCH', 'U5 Clinic', 'Ward', 'Other'

				$this -> final_data_set['location'] = $data;
				#note, I've introduced $final_data_set to be used in place of $data since $data is reset and reused

				$data = $data_set = $data_series = $analytic_var = $data_categories = array();
				//unset the arrays for reuse

				//return $this -> final_data_set;
			} else {
				return null;
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		/*--------------------end ort equipment location of availability----------------------------------------------*/

		/*--------------------begin ort equipment availability by quantity----------------------------------------------*/
		$query = "SELECT ea.equipmentID as equipment,SUM(ea.qtyFullyFunctional) AS total_functional,SUM(ea.qtyNonFunctional) AS total_non_functional FROM equipments_available ea
WHERE ea.facilityID IN (SELECT facilityMFC FROM facility WHERE " . $status_condition . " " . $criteria_condition . ")
AND ea.equipmentID IN (SELECT equipmentCode FROM equipment WHERE equipmentFor='ort')
AND ea.qtyFullyFunctional !=-1 AND ea.qtyNonFunctional !=-1
GROUP BY ea.equipmentID
ORDER BY ea.equipmentID ASC";
		//echo $query; die;
		try {
			$this -> dataSet = $this -> db -> query($query, array($status, $value));

			$this -> dataSet = $this -> dataSet -> result_array();
			//echo($this->db->last_query());die;
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value_) {

					//1. collect the categories
					$data_categories[] = $this -> getCHEquipmentName($value_['equipment']);
					//includes duplicates--so we'll array_unique outside the foreach()

					//data set by each equipment
					$data_set[$this -> getCHEquipmentName($value_['equipment'])][] = array('Fully-functional' => intval($value_['total_functional']), 'Non-functional' => intval($value_['total_non_functional']));

				}

				//var_dump($analytic_var);die;

				//make cat array unique if we got duplicates and set to $data array
				$data['categories'] = array_values(array_unique($data_categories));
				//expected 28

				//get a unique set of analytic variables
				$analytic_var = array('Fully-functional', 'Non-functional');
				//expected to be 2 in this particular context

				//assign data set to $data
				$data['responses'] = $data_set;

				//assign $data to $final_data_set
				$this -> final_data_set['quantities'] = $data;
				$data = $data_set = $data_series = $analytic_var = $data_categories = array();
				//unset the arrays for reuse

				/*--------------------end ort equipment availability by quantity----------------------------------------------*/

				// /var_dump($this -> final_data_set['quantities']);die;

				return $this -> final_data_set;
			} else {
				return null;
			}
			//die(var_dump($this->final_data_set));
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}

	}

	public function getSupplies($criteria, $value, $status, $survey) {
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
			case 'national' :
				$criteria_condition = ' ';
				$value = ' ';
				break;
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

		/*--------------------begin supplies availability by frequency----------------------------------------------*/

		$query = "SELECT 
    count(sq.Availability) AS total_response,
    sq.SuppliesCode as supplies,
    sq.Availability AS frequency
FROM
    squantity_available sq,
    supplies s
WHERE
    sq.SuppliesCode = s.suppliesCode
        AND sq.facilityID IN (SELECT 
            facilityMFC
        FROM
            facility
        WHERE
           " . $status_condition . " " . $criteria_condition . ")
        AND sq.SuppliesCode IN (SELECT 
            suppliesCode
        FROM
            supplies
        WHERE
            suppliesFor = 'mch')
GROUP BY sq.SuppliesCode , sq.Availability
ORDER BY sq.SuppliesCode;";
		try {

			$this -> dataSet = $this -> db -> query($query, array($status, $value));

			$this -> dataSet = $this -> dataSet -> result_array();
			//echo($this->db->last_query());die;
			if ($this -> dataSet!==NULL) {
				$data_set['Available'] = $data_set['Sometimes Available'] = $data_set['Never Available'] = array();
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value_) {

					//1. collect the categories
					$data_categories[] = $this -> getCHSuppliesName($value_['supplies']);
					//incase of duplicates--do an array_unique outside the foreach()

					//2. collect the analytic variables
					if ($value_['frequency'] == 'Some Available') {//a hardcore fix...for Nairobi County data only--> (there was a typo in the naming 'Sometimes Available', so Nairobi data has it as 'Some Available')

						$frequency = 'Sometimes Available';
					} else {
						$frequency = $value_['frequency'];
					}
					$analytic_var[] = $frequency;
					//includes duplicates--so we'll array_unique outside the foreach()

					//collect the data_sets for the 3 analytic variables under availability
					if ($frequency == 'Available') {
						$data_set['Available'][] = intval($value_['total_response']);
					} else if ($frequency == 'Sometimes Available') {
						$data_set['Sometimes Available'][] = intval($value_['total_response']);
					} else if ($frequency == 'Never Available') {
						$data_set['Never Available'][] = intval($value_['total_response']);
					}

				}

				//var_dump($data_set);die;

				//make cat array unique if we got duplicates then json_encode and set to $data array
				$data['categories'] = (array_values(array_unique($data_categories)));
				//expected 28

				//get a unique set of analytic variables
				$analytic_var = array_unique($analytic_var);
				//expected to be 3 in this particular context
				$data['analytic_variables'] = $analytic_var;

				//get the data sets
				$data['responses'] = $data_set;
				//sets of the 3 analytic variables: Available | Sometimes Available | Never Available

				$this -> final_data_set['frequency'] = $data;
				#note, I've introduced $final_data_set to be used in place of $data since $data is reset and reused

				//unset the arrays for reuse in the next query
				$data = $data_set = $data_series = $analytic_var = $data_categories = array();

				//return $this -> final_data_set;

			} else {
				return null;
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		/*--------------------end supplies equipment availability by frequency----------------------------------------------*/

		/*--------------------begin supplies equipment location of availability----------------------------------------------*/
		$query = "SELECT 
    count(sq.Location) AS total_response,
    sq.suppliesCode as supplies,
    sq.Location AS location
FROM
    squantity_available sq
WHERE
    sq.facilityID IN (SELECT 
            facilityMFC
        FROM
            facility
        WHERE
             " . $status_condition . " " . $criteria_condition . ")
        AND sq.suppliesCode IN (SELECT 
            suppliesCode
        FROM
            supplies)
        AND sq.Location NOT LIKE '%Not Applicable%'
GROUP BY sq.suppliesCode , sq.Location
ORDER BY sq.suppliesCode ASC";

		try {
			//echo $query;die;
			//die(print $status.$value);
			$this -> dataSet = $this -> db -> query($query, array($status, $value));
			//var_dump($this->dataSet);die;
			$this -> dataSet = $this -> dataSet -> result_array();
			//echo($this->db->last_query());die;
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);
				$count_instances = array('MCH' => 0, 'OPD' => 0, 'U5 Clinic' => 0, 'Ward' => 0, 'Other' => 0);
				//to hold the location instances
				foreach ($this->dataSet as $value_) {

					//1. collect the categories
					$data_categories[] = $this -> getCHSuppliesName($value_['supplies']);
					//incase of duplicates--do an array_unique outside the foreach()

					//2. collect the analytic variables
					//$analytic_var[] = $value['location'];-->hard fix outside the loop as values are coma separated...good fix..have v-look up in the db

					//collect the data_sets from the coma separated responses
					if (strpos($value_['location'], 'OPD') !== FALSE) {
						$count_instances['OPD'] += intval($value_['total_response']);
						$data_set[$this -> getCHSuppliesName($value_['supplies'])]['OPD'] = $count_instances['OPD'];
					}
					if (strpos($value_['location'], 'MCH') !== FALSE) {
						$count_instances['MCH'] += intval($value_['total_response']);
						$data_set[$this -> getCHSuppliesName($value_['supplies'])]['MCH'] = $count_instances['MCH'];
					}
					if (strpos($value_['location'], 'U5 Clinic') !== FALSE) {
						$count_instances['U5 Clinic'] += intval($value_['total_response']);
						$data_set[$this -> getCHSuppliesName($value_['supplies'])]['U5 Clinic'] = $count_instances['U5 Clinic'];
					}
					if (strpos($value_['location'], 'Ward') !== FALSE) {
						$count_instances['Ward'] += intval($value_['total_response']);
						$data_set[$this -> getCHSuppliesName($value_['supplies'])]['Ward'] = $count_instances['Ward'];
					}
					if (strpos($value_['location'], 'Other') !== FALSE) {
						$count_instances['Other'] += intval($value_['total_response']);
						$data_set[$this -> getCHSuppliesName($value_['supplies'])]['Other'] = $count_instances['Other'];
					}

				}
				//var_dump($count_instances);die;
				//var_dump($data_set);die;

				//make array unique if we got duplicates and set to $data array
				$data['categories'] = array_values(array_unique($data_categories));
				//expected 28

				//get a unique set of analytic variables
				$analytic_var = array('OPD', 'MCH', 'U5 Clinic', 'Ward', 'Other');
				//expected to be 5 in this particular context, again we know they r just these 5 :)
				$data['analytic_variables'] = $analytic_var;

				//get the data sets
				$data['responses'] = $data_set;
				//sets of the 5 analytic variables: 'OPD', 'MCH', 'U5 Clinic', 'Ward', 'Other'

				$this -> final_data_set['location'] = $data;
				#note, I've introduced $final_data_set to be used in place of $data since $data is reset and reused

				$data = $data_set = $data_series = $analytic_var = $data_categories = array();
				//unset the arrays for reuse

				return $this -> final_data_set;
			} else {
				return null;
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		/*--------------------end supplies equipment location of availability----------------------------------------------*/

	}

	/*
	 * Availability, Location and Functionality of Supplies at ORT Corner
	 */
	public function getCHSuppliesSupplier($criteria, $value, $status, $survey) {
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
			case 'national' :
				$criteria_condition = ' ';
				break;
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

		/*--------------------begin equipment main supplier----------------------------------------------*/
		$query = "SELECT 
    count(sq.SuppliesCode) AS total_response,
    sq.SuppliesCode as supplies,
    sq.SupplierID AS supplier
FROM
    squantity_available sq,
    supplies c
WHERE
    sq.SuppliesCode = c.suppliesCode
        AND sq.facilityID IN (SELECT 
            facilityMFC
        FROM
            facility
        WHERE
             " . $status_condition . " " . $criteria_condition . ")
        AND sq.SuppliesCode IN (SELECT 
            suppliesCode
        FROM
            supplies
        WHERE
            suppliesFor = 'mch')
GROUP BY sq.SuppliesCode , sq.SuppliesCode
ORDER BY sq.suppliesCode
LIMIT 0 , 1000
";
		try {

			$this -> dataSet = $this -> db -> query($query, array($status, $value));

			$this -> dataSet = $this -> dataSet -> result_array();
			//echo($this->db->last_query());die;
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value_) {

					//1. collect the categories
					$data_categories[] = $value_['supplier'];
					//incase of duplicates--do an array_unique outside the foreach()

					//2. collect the analytic variables
					$analytic_var[] = $this -> getCHSuppliesName($value_['supplies']);
					//includes duplicates--so we'll array_unique outside the foreach()

					//data set by each analytic variable
					$data_set[$value_['supplier']][] = intval($value_['total_response']);

				}

				//var_dump($data_set);die;

				//make cat array unique if we got duplicates then json_encode and set to $data array
				$data['categories'] = (array_values(array_unique($data_categories)));
				//expected 28

				//get a unique set of analytic variables
				$analytic_var = array_unique($analytic_var);
				//expected to be 3 in this particular context
				$data['analytic_variables'] = $analytic_var;

				//get the data sets
				$data['responses'] = $data_set;
				//sets of the 3 analytic variables: Available | Sometimes Available | Never Available

				$this -> dataSet = $data;

				return $this -> dataSet;

			} else {
				return $this -> dataSet = null;
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
	}

	/*
	 *  Availability, Location and Functionality of Electricity and Hardware Resources
	 */
	public function getResources($criteria, $value, $status, $survey) {
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
			case 'national' :
				$criteria_condition = ' ';
				$value = ' ';
				break;
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

		/*--------------------begin ort equipment availability by frequency----------------------------------------------*/
		$query = "SELECT 
    count(ra.Availability) AS total_response,
    ra.ResourceCode as equipment,
    ra.Availability AS frequency
FROM
    mch_resource_available ra
WHERE
    ra.facilityID IN (SELECT 
            facilityMFC
        FROM
            facility
        WHERE
            " . $status_condition . " " . $criteria_condition . ")
        AND ra.ResourceCode IN (SELECT 
            equipmentCode
        FROM
            equipment
        WHERE
            equipmentFor = 'hwr')
GROUP BY ra.ResourceCode , ra.Availability
ORDER BY ra.ResourceCode ASC";
		try {

			$this -> dataSet = $this -> db -> query($query, array($status, $value));

			$this -> dataSet = $this -> dataSet -> result_array();
			//echo($this->db->last_query());die;
			if ($this -> dataSet!==NULL) {
				$data_set['Available'] = $data_set['Sometimes Available'] = $data_set['Never Available'] = array();
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value_) {

					//1. collect the categories
					$data_categories[] = $this -> getCHResourcesName($value_['equipment']);
					//incase of duplicates--do an array_unique outside the foreach()

					//2. collect the analytic variables
					if ($value_['frequency'] == 'Some Available') {//a hardcore fix...for Nairobi County data only--> (there was a typo in the naming 'Sometimes Available', so Nairobi data has it as 'Some Available')

						$frequency = 'Sometimes Available';
					} else {
						$frequency = $value_['frequency'];
					}
					$analytic_var[] = $frequency;
					//includes duplicates--so we'll array_unique outside the foreach()

					//collect the data_sets for the 3 analytic variables under availability
					if ($frequency == 'Available') {
						$data_set['Available'][] = intval($value_['total_response']);
					} else if ($frequency == 'Sometimes Available') {
						$data_set['Sometimes Available'][] = intval($value_['total_response']);
					} else if ($frequency == 'Never Available') {
						$data_set['Never Available'][] = intval($value_['total_response']);
					}

				}

				//var_dump($data_set);die;

				//make cat array unique if we got duplicates then json_encode and set to $data array
				$data['categories'] = (array_values(array_unique($data_categories)));
				//expected 28

				//get a unique set of analytic variables
				$analytic_var = array_unique($analytic_var);
				//expected to be 3 in this particular context
				$data['analytic_variables'] = $analytic_var;

				//get the data sets
				$data['responses'] = $data_set;
				//sets of the 3 analytic variables: Available | Sometimes Available | Never Available

				$this -> final_data_set['frequency'] = $data;
				#note, I've introduced $final_data_set to be used in place of $data since $data is reset and reused

				//unset the arrays for reuse in the next query
				$data = $data_set = $data_series = $analytic_var = $data_categories = array();

				//return $this -> final_data_set;

			} else {
				return null;
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		/*--------------------end ort equipment availability by frequency----------------------------------------------*/

		/*--------------------begin ort equipment location of availability----------------------------------------------*/
		$query = "SELECT 
    count(ra.Location) AS total_response,
    ra.ResourceCode as equipment,
    ra.Location AS location
FROM
    mch_resource_available ra
WHERE
    ra.facilityID IN (SELECT 
            facilityMFC
        FROM
            facility
        WHERE
          " . $status_condition . " " . $criteria_condition . ")
        AND ra.ResourceCode IN (SELECT 
            equipmentCode
        FROM
            equipment
        WHERE
            equipmentFor = 'hwr')
        AND ra.Location NOT LIKE '%Not Applicable%'
GROUP BY ra.ResourceCode , ra.Location
ORDER BY ra.ResourceCode ASC";

		try {
			//echo $query;die;
			//die(print $status.$value);
			$this -> dataSet = $this -> db -> query($query, array($status, $value));
			//var_dump($this->dataSet);die;
			$this -> dataSet = $this -> dataSet -> result_array();
			//echo($this->db->last_query());die;
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);
				$count_instances = array('MCH' => 0, 'OPD' => 0, 'U5 Clinic' => 0, 'Ward' => 0, 'Other' => 0);
				//to hold the location instances
				foreach ($this->dataSet as $value_) {

					//1. collect the categories
					$data_categories[] = $this -> getCHResourcesName($value_['equipment']);
					//incase of duplicates--do an array_unique outside the foreach()

					//2. collect the analytic variables
					//$analytic_var[] = $value['location'];-->hard fix outside the loop as values are coma separated...good fix..have v-look up in the db

					//collect the data_sets from the coma separated responses
					if (strpos($value_['location'], 'OPD') !== FALSE) {
						$count_instances['OPD'] += intval($value_['total_response']);
						$data_set[$this -> getCHResourcesName($value_['equipment'])]['OPD'] = $count_instances['OPD'];
					}
					if (strpos($value_['location'], 'MCH') !== FALSE) {
						$count_instances['MCH'] += intval($value_['total_response']);
						$data_set[$this -> getCHResourcesName($value_['equipment'])]['MCH'] = $count_instances['MCH'];
					}
					if (strpos($value_['location'], 'U5 Clinic') !== FALSE) {
						$count_instances['U5 Clinic'] += intval($value_['total_response']);
						$data_set[$this -> getCHResourcesName($value_['equipment'])]['U5 Clinic'] = $count_instances['U5 Clinic'];
					}
					if (strpos($value_['location'], 'Ward') !== FALSE) {
						$count_instances['Ward'] += intval($value_['total_response']);
						$data_set[$this -> getCHResourcesName($value_['equipment'])]['Ward'] = $count_instances['Ward'];
					}
					if (strpos($value_['location'], 'Other') !== FALSE) {
						$count_instances['Other'] += intval($value_['total_response']);
						$data_set[$this -> getCHResourcesName($value_['equipment'])]['Other'] = $count_instances['Other'];
					}

				}
				//var_dump($count_instances);die;
				//var_dump($data_set);die;

				//make array unique if we got duplicates and set to $data array
				$data['categories'] = array_values(array_unique($data_categories));
				//expected 28

				//get a unique set of analytic variables
				$analytic_var = array('OPD', 'MCH', 'U5 Clinic', 'Ward', 'Other');
				//expected to be 5 in this particular context, again we know they r just these 5 :)
				$data['analytic_variables'] = $analytic_var;

				//get the data sets
				$data['responses'] = $data_set;
				//sets of the 5 analytic variables: 'OPD', 'MCH', 'U5 Clinic', 'Ward', 'Other'

				$this -> final_data_set['location'] = $data;
				#note, I've introduced $final_data_set to be used in place of $data since $data is reset and reused

				$data = $data_set = $data_series = $analytic_var = $data_categories = array();
				//unset the arrays for reuse

				return $this -> final_data_set;
			} else {
				return null;
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		/*--------------------end ort equipment location of availability----------------------------------------------*/

	}

	public function get_response_count($survey) {
		try {
			/*using CI Database Active Record*/
			try {
				$query = "SELECT DISTINCT(facilityCode),trackerID,lastActivity FROM assessment_tracker WHERE survey=? AND trackerSection='section-6'
ORDER BY lastActivity DESC";
				$this -> dataSet = $this -> db -> query($query, array($survey));
				$this -> dataSet = $this -> dataSet -> result_array();
				//die(var_dump($this->dataSet));
			} catch(exception $ex) {
				//ignore
				//die($ex->getMessage());//exit;
			}
			return $this -> dataSet;

		} catch(exception $ex) {
			//ignore
			//die($ex -> getMessage());
		}

		return $this -> dataSet;
	}

	function getSpecificDistrictNames($county) {
		/*using DQL*/
		try {
			$query = $this -> em -> createQuery('SELECT DISTINCT(f.facilityDistrict) FROM  models\Entities\e_facility f WHERE f.facilityCounty = :county ORDER BY f.facilityDistrict ASC');
			$query -> setParameter('county', $county);
			$this -> districtName = $query -> getResult();
			//die(var_dump($this->districtName));
		} catch(exception $ex) {
			//ignore
			//$ex->getMessage();
		}
		return $this -> districtName;
	}/*end of getSpecificDistrictNames*/

	function getCountyFacilities() {
		/*using DQL*/
		try {
			$query = "SELECT COUNT(facility.facilityName),facilityCounty FROM mnh.facility GROUP BY facility.facilityCounty ORDER BY COUNT(facility.facilityName) DESC;";
			$this -> countyFacilities = $this -> db -> query($query);
			$this -> countyFacilities = $this -> countyFacilities -> result_array();
			//die(var_dump($this->districtName));
		} catch(exception $ex) {
			//ignore
			//$ex->getMessage();
		}
		return $this -> countyFacilities;
	}/*end of getSpecificDistrictNames*/

	function getCountyFacilitiesByOwner($county) {
		/*using DQL*/
		try {
			$query = "SELECT COUNT(facilityOwnedBy),facilityOwnedBy FROM mnh.facility WHERE facilityCounty='Nairobi' GROUP BY facilityOwnedBy ORDER BY COUNT(facilityOwnedBy) DESC;";
			$this -> countyFacilities = $this -> db -> query($query);
			$this -> countyFacilities = $this -> countyFacilities -> result_array();
			//die(var_dump($this->districtName));
		} catch(exception $ex) {
			//ignore
			//$ex->getMessage();
		}
		return $this -> countyFacilities;
	}/*end of getSpecificDistrictNames*/

	public function getFacilitiesByDistrictOptions($district) {
		$myOptions = '<option>Viewing All</option>';
		/*using CI Database Active Record*/
		try {
			$query = "SELECT DISTINCT
facility.facilityMFC, facility.facilityName
FROM
facility,
mnh.mch_indicator_log
WHERE
facilityDistrict = '" . $district . "'
AND facility.facilityMFC = mch_indicator_log.facilityID
ORDER BY facilityName;";
			$this -> dataSet = $this -> db -> query($query);
			$this -> dataSet = $this -> dataSet -> result_array();
			//die(var_dump($this->dataSet));
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value_) {
					$myOptions .= '<option value=' . $value_['facilityMFC'] . '>' . $value_['facilityName'] . '</option>';
					//1. collect the categories
					//$data_categories[] = $this -> getCHEquipmentName($value_['equipment']);
					//incase of duplicates--do an array_unique outside the foreach()

				}

				//unset the arrays for reuse

				//return $this -> final_data_set;
			} else {
				return null;
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		return $myOptions;

	}
	public function getFacilitiesByDistrictOptionsNew($district,$table) {
		$myOptions = '<option>Viewing All</option>';
		/*using CI Database Active Record*/
		try {
			$query = "SELECT DISTINCT
facility.facilityMFC, facility.facilityName
FROM
facility,
mnh.mch_indicator_log
WHERE
facilityDistrict = '" . $district . "'
AND facility.facilityMFC = ".$table.".facilityID
ORDER BY facilityName;";
			$this -> dataSet = $this -> db -> query($query);
			$this -> dataSet = $this -> dataSet -> result_array();
			//die(var_dump($this->dataSet));
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value_) {
					$myOptions .= '<option value=' . $value_['facilityMFC'] . '>' . $value_['facilityName'] . '</option>';
					//1. collect the categories
					//$data_categories[] = $this -> getCHEquipmentName($value_['equipment']);
					//incase of duplicates--do an array_unique outside the foreach()

				}

				//unset the arrays for reuse

				//return $this -> final_data_set;
			} else {
				return null;
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		return $myOptions;

	}

	public function getReportingCountiesCore() {
		/*using CI Database Active Record*/
		try {
			$query = "SELECT 
    f.facilityCounty as county,c.countyID as countyID
FROM
    mnh_latest.assessment_tracker t,
    facility f,county c
WHERE
    t.facilityCode = f.facilityMFC
        and t.trackerSection = 'section-6'
AND
c.countyName =  f.facilityCounty
GROUP BY f.facilityCounty
ORDER BY f.facilityCounty ASC;";
			$this -> dataSet = $this -> db -> query($query);
			$this -> dataSet = $this -> dataSet -> result_array();
			//die(var_dump($this->dataSet));

		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		//var_dump($myOptions);
		//var_dump($this -> dataSet);
		return $this -> dataSet;

	}

	public function getReportingCounties() {
		/*using CI Database Active Record*/
		try {
			$query = "SELECT 
    f.facilityCounty as county,c.countyID as countyID
FROM
    assessment_tracker t,
    facility f,county c
WHERE
    t.facilityCode = f.facilityMFC
        and t.trackerSection = 'section-6'
AND
c.countyName =  f.facilityCounty
GROUP BY f.facilityCounty
ORDER BY f.facilityCounty ASC;";
			$this -> dataSet = $this -> db -> query($query);
			$this -> dataSet = $this -> dataSet -> result_array();
			//die(var_dump($this->dataSet));

		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		//var_dump($myOptions);
		//var_dump($this -> dataSet);
		return $this -> dataSet;

	}

	public function generateFacilityList() {
		$result;
		try {
			$query = "";
			$this -> dataSet = $this -> db -> query($query);
			$this -> dataSet = $this -> dataSet -> result_array();
			//die(var_dump($this->dataSet));
			if ($this -> dataSet!==NULL) {
				//prep data for the pie chart format
				$size = count($this -> dataSet);

				foreach ($this->dataSet as $value_) {

				}

			} else {
				return null;
			}
		} catch(exception $ex) {
			//ignore
			//die($ex->getMessage());//exit;
		}
		return $result;
	}

	function getAllReportingRatio() {
		$reportingCounties = $this -> getReportingCounties();
		for ($x = 0; $x < sizeof($reportingCounties); $x++) {
			$allData[$reportingCounties[$x]['county']] = $this -> getReportingRatio($reportingCounties[$x]['county']);

		}
		//var_dump($allData);
		return $allData;

	}

	function getReportingRatio($county) {
		/*using DQL*/

		$finalData = array();

		try {

			$query = 'SELECT 
    tracker.reported,
    facilityData.actual,
    round((tracker.reported / facilityData.actual) * 100,0) as percentage
FROM
    (SELECT 
        COUNT(facilityCode) as reported,facility.facilityCounty as countyName
    FROM
        assessment_tracker, facility
    WHERE
        assessment_tracker.facilityCode = facility.facilityMFC
            AND facility.facilityCounty = "' . $county . '"
            AND assessment_tracker.trackerSection = "section-6") AS tracker,
    (SELECT 
        COUNT(facilityMFC) as actual
    FROM
        facility
    WHERE
        facility.facilityCounty = "' . $county . '"
		AND facilityType != "Dental Clinic"
            AND facilityType != "VCT Centre (Stand-Alone)"
            AND facilityType != "Training Institution in Health (Stand-alone)"
            AND facilityType != "Funeral Home (Stand-alone)"
            AND facilityType != "Laboratory (Stand-alone)"
            AND facilityType != "Health Project"
            AND facilityType != "Eye Clinic"
			AND facilityType != "Eye Centre"
            AND facilityType != "Radiology Unit") as facilityData;';

			$myData = $this -> db -> query($query);
			$finalData = $myData -> result_array();

		} catch(exception $ex) {
			//ignore
			//echo($ex -> getMessage());
		}
		return $finalData;
	}

	/**
	 * Run County Maps
	 */
	public function runMap() {
		$myData = array();
		$counties = $this -> getAllCountyNames();
		foreach ($counties as $county) {
			$countyName = $county['countyName'];
			//$countyName=str_replace("'","", $countyName);
			$myData[$countyName] = array($this -> getReportingRatio($countyName), $county['countyFusionMapId'], $countyName);
		}

		return $myData;
	}

}
