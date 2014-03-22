<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *model to Facilities entities
 */
use application\models\Entities\Facilities;

class M_Autocomplete extends MY_Model {
	var $facility;

	function __construct() {
		parent::__construct();
	}
	
	public function getAutocomplete($options = array())
	{
		
		//$query = $this->em->createQuery('SELECT f FROM models\Entities\Facilities f WHERE f.fac_name LIKE :fname');
		 // $query->setParameter('fname','%'.$options['keyword'].'%');
          
          //$this->formRecords = $query->getArrayResult();
		    
		 
      
      /*Using CI's database library--doctrine doesn't allow the use of 'REGEXP'*/
       $this->db->select('fac_name,fac_mfl');
      $this->db->where("fac_name REGEXP '^".$options['keyword']."'"); //retrieve all names beginning with
       // $this->db->like('fac_name', $options['keyword'], 'after');
       $this->formRecords = $this->db->get('facility');
     //die(var_dump($this->formRecords->result()));
     // return $this->formRecords
        return $this->formRecords=$this->formRecords->result();

	}
	
	public function getAllFacilityNames(){
		$query = $this->em->createQuery('SELECT f.fac_name FROM models\Entities\Facilities f');
		  //$query->setParameter('fname','%'.$options['keyword'].'%');
          
          $this->formRecords = $query->getArrayResult();
		  
		 
      // die(var_dump($this->formRecords));
        return $this->formRecords;
	}
	
	public function setMFLCode(){
		
	}
	
	
}//end of class M_Autocomplete 
