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

	public function get_respondent_rate() {
		try {
			// build rsm here --native query
			//$this->rsm->addRootEntityFromClassMetadata('models\Entities\e_response_rate', 'r'); 
			$this -> query = $this -> em -> createQuery('SELECT COUNT(r.facilityCode) AS Respondents FROM models\Entities\e_response_rate r');
			
			/*$this->rsm->addRootEntityFromClassMetadata('models\Entities\e_facility', 'f');		
			
			$this -> query = $this -> em -> createNativeQuery('SELECT er.TotalRespondents, ar.Respondents FROM (SELECT COUNT(f.facilityID)
									 AS TotalRespondents FROM facility f) AS er,(SELECT COUNT(r.facilityCode) AS Respondents FROM response_rate r 
									 WHERE r.flagResponded=1) AS ar', $this -> rsm);*/
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
