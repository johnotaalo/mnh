<?php
class C_Front extends MY_Controller {
	var $data,$survey;
	var $instructions;

	public function __construct() {

		parent::__construct();
	    $this->data=array();
		$this->load->model('m_analytics');

	}

	public function index() {
		$data['title']='MoH::Data Management Tool';
		$data['content'] = 'pages/v_home';
		$this -> load -> view('template', $data); //landing page
		#$this -> load -> view('home_view', $data); //landing page
	   
	}//End of index file
	
	
	public function active_survey() {
	/**/
	    $this->survey=$this->uri->segment(1);
		$new_data=array('survey'=>$this->survey);
		$this->session->set_userdata($new_data);
		if(!$this -> session -> userdata('dCode')){
	    
		// $data['facility']=$this ->selectFacility;
		$this->data['title']='MoH Data Management Tool::Authentication';
		$this->data['form'] = '<p>User Login<p>';
		$this->data['login_response'] = '';
		$this->data['login_message']='Login to Take '.strtoupper($this->survey).' Survey';
		$this->data['survey']=strtoupper($this->survey);
		$this->data['content'] = 'pages/v_login';
		//$this -> load -> view('index', $this->data); //login view
		$this -> load -> view('template', $this->data); //login view

	    }else{
			$this->inventory();
		}
		//$this->inventory();
		//dashboard
		
		//$this->inventory();
		//redirect(base_url() . 'c_auth/index', 'refresh');
		
	}//End of index file
	

	public function inventory() {
		//print 'sess val: '.var_dump($this->session->all_userdata()); die;
	/**/	if($this -> session -> userdata('dCode')){
	    $this->data['survey']=$this->survey;
		$this->data['hidden']="display:none";
		$this->data['status']="";
		$this->data['response']="";
		$this->data['form'] = '<div class="error ui-autocomplete-loading" style="width:200px;height:76px"><br/><br/>Loading...please wait.<br/><br/></div>';
		if($this->session->userdata('survey')=='mnh'){
			$this->data['title']=strtoupper($this->session->userdata('survey')).'::Commodity, Equipment and Supplies Assessment';
		}else{
			$this->data['title']=strtoupper($this->session->userdata('survey')).'::Diarrhoea Treatment Scale Up Baseline Assessment';
		}
		$this->data['logged']=1;
		$this->data['form_id']='';
		$this->data['content'] = 'survey/v_survey_main';
		$this -> load -> view('template', $this->data);
		}else{
			redirect(base_url() . 'home', 'refresh');
		}
		/*$data['hidden']="display:none";
		$data['status']="";
		$data['response']="";
		$data['form'] = '<div class="error ui-autocomplete-loading" style="width:200px;height:76px"><br/><br/>Loading...please wait.<br/><br/></div>';
		$data['title']='MNH::Commodity Assessment';
		$data['form_id']='';
		$this -> load -> view('survey/v_survey_main', $data);*/
		//echo 'inventory';
	}
	
	

	public function formviewer() {
		$data['form'] = '<p class="error"><br/><br/>Click on any of the tabs to continue<br/><br/><p>';
		$this -> load -> view('form', $data);
	}
	public function runMap(){
		$counties = $this->m_analytics->runMap();
	
		var_dump($counties);
	}
	public function reports() {
		$data['status']="";
		$data['response']="";
		$data['form'] = '<p class="error"><br/><br/>No report has been chosen<br/><br/><p>';
		$data['form_id']='';
		$this -> load -> view('reports', $data);
		//echo 'Vehicles';
	}
	
}