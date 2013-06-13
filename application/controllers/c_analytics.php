<?php
class C_Analytics extends MY_Controller {
	var $data;

	public function __construct() {
		parent::__construct();
		$this->data='';

	}
	
	public function active_results(){
		$this->data['title']='MoH::Analytics';
		$this->load->view('analytics_view',$this->data);
		
	}
	
}