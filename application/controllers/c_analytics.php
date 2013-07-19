<?php
class C_Analytics extends MY_Controller {
	var $data;

	public function __construct() {
		parent::__construct();
		$this->data='';
		$this->load->model('m_analytics');

	}
	
	public function active_results(){
		$this->data['title']='MoH::Analytics';
		//$this->commodity_survey_response_rate();
		$this->load->view('pages/v_analytics',$this->data);
		
	}
	
	private function commodity_survey_response_rate(){
		$this->data['data_commodity_respondents']=$this->m_analytics->get_respondent_rate();
	}
	
}