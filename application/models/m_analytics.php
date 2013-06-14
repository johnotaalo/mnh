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
use Doctrine\ORM\Query\ResultSetMapping;

class M_Analytics extends MY_Model {
	/*user variables*/
	var $dataSet, $query, $rsm;

	/*constructor*/
	function __construct() {
		parent::__construct();
		//var initialization
		$this -> dataSet = $this -> query = null;
		$this -> rsm = new ResultSetMapping();
	}

	public function get_respondent_rate() {
		try {
			// build rsm here --native query
			$this -> query = $this -> em -> createNativeQuery('SELECT er.E_Facility, ar.Respondents FROM (SELECT COUNT(f.facilityID)
									 AS TotalRespondents FROM models\Entities\e_facility f) AS er,(SELECT COUNT(response_rate.facilityCode) AS Respondents FROM models\Entities\e_response_rate r 
									 WHERE r.flagResponded=1) AS ar', $this -> rsm);
			//$this->query->setParameter(1, 'romanb');
			
			echo $this->query->getSQL();

			$this -> dataSet = $this -> query -> getResult();

			die(var_dump($this -> dataSet));

			$this -> dataSet = json_encode($this -> dataSet);

			//echo $this->dataSet;exit;

		} catch(exception $ex) {
			//ignore
			die($ex -> getMessage());
		}

		return $this -> dataSet;
	}

}
