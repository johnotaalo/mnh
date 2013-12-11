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

class M_Statistics extends MY_Model {
	/*user variables*/
	var $dataSet,  $query;

	/*constructor*/
	function __construct() {
		parent::__construct();
		//var initialization
		$this -> dataSet = $this -> query = null;

	}
	
	function reportingFacilities(){
		/*using CI Database Active Record*/
		try {
			$query = "SELECT 
    facilityMFC, facilityName, facilityDistrict, facilityCounty
FROM
    facility
WHERE
    facilityCHSurveyStatus = 'complete'
ORDER BY facilityCounty ASC , facilityDistrict ASC";
			$this -> dataSet = $this -> db -> query($query);
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
	
}