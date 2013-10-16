<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *model to E_Facility entities
 */
//use application\models\Entities\E_Facility;

class M_Test extends MY_Model {
	var $facility;

	function __construct() {
		parent::__construct();
	}

	
	public function getFacility($id){
		$fac = $this->getFacilityName($id);
		var_dump($fac);
	}
	

	
	
}//end of class M_Autocomplete 
