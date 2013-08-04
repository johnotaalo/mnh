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
	var $dataSet, $query, $rsm;

	/*constructor*/
	function __construct() {
		parent::__construct();
		//var initialization
		$this -> dataSet = $this -> query = null;
		$this -> rsm = new ResultSetMappingBuilder($this -> em);
	}

	public function get_response_count($survey) {
		try {
			 /*using CI Database Active Record*/
		 try{
	       $query = "SELECT DISTINCT(facilityCode),trackerID,lastActivity FROM assessment_tracker WHERE survey=? AND trackerSection='section-6' 
					 ORDER BY lastActivity DESC";
          $this->dataSet = $this->db->query($query,array($survey));
		$this->dataSet=$this->dataSet->result_array();
		  //die(var_dump($this->dataSet));
		 }catch(exception $ex){
		 	//ignore
		 	//die($ex->getMessage());//exit;
		 }
		return $this->dataSet;

		} catch(exception $ex) {
			//ignore
			die($ex -> getMessage());
		}

		return $this -> dataSet;
	}

}
