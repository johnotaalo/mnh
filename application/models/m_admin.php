<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class M_Admin extends MY_Model {

	function __construct() {
		parent::__construct();
	}

	public function activity(){
		$result = $this->db->query('SELECT count(distinct facilityCode), DATE_FORMAT(ast_last_activity, "%d-%m-%Y") FROM assessment_tracker');
		$result = $result->result_array();
		return $result;
	}
    
}