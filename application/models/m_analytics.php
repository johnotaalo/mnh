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
	public function getGuidelinesAvailability() {

	}

	/*
	 * Trained Staff
	 */
	public function getTrainedStaff() {

	}

	/*
	 * Commodity Availability
	 */
	public function getCommodityAvailability() {

	}

	/*
	 * Services to Children with Diarrhoea
	 */
	public function getChildrenServices() {

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
