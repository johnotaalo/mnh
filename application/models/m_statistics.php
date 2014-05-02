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
    fac_mfl, fac_name, fac_district, fac_county
FROM
    facility

ORDER BY fac_county ASC , fac_district ASC";
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

	function reportingFacilitiesComplete($survey,$category){
		/*using CI Database Active Record*/
		try {
			$query = "SELECT distinct
    fac_mfl, fac_name, fac_district, fac_county
from
    assessment_tracker ast
        JOIN
    facilities f ON ast.facilityCode = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = '".$survey."')
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = '".$category."')
WHERE
    facilityCode != ''
        AND ast.ast_section = 'section-7' 
ORDER BY fac_county , fac_district;";
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

	function reportingFacilitiesPartial($survey,$category){
		/*using CI Database Active Record*/
		try {
			$query = "SELECT distinct
    fac_mfl, fac_name, fac_district, fac_county
from
    assessment_tracker ast
        JOIN
    facilities f ON ast.facilityCode = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = '".$survey."')
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = '".$category."')
WHERE
    facilityCode != ''
ORDER BY fac_county , fac_district;";
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