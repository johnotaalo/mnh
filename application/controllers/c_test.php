<?php
class C_Test extends MY_Controller {

	public function index() {
		
	}
	
	public function test($id){
		$this->load->model('m_test');
		$this->m_test->getFacility($id);
	}

}
