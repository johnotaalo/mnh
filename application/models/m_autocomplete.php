<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *model to E_Facility entities
 */
use application\models\Entities\E_Facility;

class M_Autocomplete extends MY_Model {
	var $facility;

	function __construct() {
		parent::__construct();
	}
	
	public function getAutocomplete($options = array())
	{
		
		//$query = $this->em->createQuery('SELECT f FROM models\Entities\e_facility f WHERE f.facilityName LIKE :fname');
		 // $query->setParameter('fname','%'.$options['keyword'].'%');
          
          //$this->formRecords = $query->getArrayResult();
		    
		 
      
      /*Using CI's database library--doctrine doesn't allow the use of 'REGEXP'*/
       $this->db->select('facilityName,facilityMFC');
      $this->db->where("facilityName REGEXP '^".$options['keyword']."'"); //retrieve all names beginning with
       // $this->db->like('facilityName', $options['keyword'], 'after');
       $this->formRecords = $this->db->get('facility');
     //die(var_dump($this->formRecords->result()));
     // return $this->formRecords
        return $this->formRecords=$this->formRecords->result();

	}
	
	public function getAllFacilityNames(){
		$query = $this->em->createQuery('SELECT f.facilityName FROM models\Entities\e_facility f');
		  //$query->setParameter('fname','%'.$options['keyword'].'%');
          
          $this->formRecords = $query->getArrayResult();
		  
		  
		//$this->db->select('facilityName');

        
        //$this->db->like('facilityName', $options['keyword'], 'after');

       // $query = $this->db->get('facility');
      // die(var_dump($this->formRecords));
        return $this->formRecords;
	}
	
	public function setMFLCode(){
		
	}
	
	
}//end of class M_Autocomplete 
