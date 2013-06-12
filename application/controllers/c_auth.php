<?php
/*helps authenticate a user*/
class C_Auth extends MY_Controller {
	var $data;
	
	public function __construct() {
		parent::__construct();
		$this->data='';
	}
	
	public function go(){
		$this->load->model('m_zinc_ors_inventory');
		$this->m_zinc_ors_inventory->verifyFacilityByName();
	    if ($this->m_zinc_ors_inventory->isFacility=='true') {
	    	$this->m_zinc_ors_inventory->retrieveMFLInformation();
			 
			 
			$fType_array=array();
			/*retrieve facility details*/
			
			/*create session data*/
			$newdata = array('fName' => $this->m_zinc_ors_inventory->facility->getFacilityName(),
							 'fCode'=>$this->m_zinc_ors_inventory->facility->getFacilityMFC(),
							 'allDistricts'=>$this->m_zinc_ors_inventory->dbSessionValues[0],
							 'allCounties'=>$this->m_zinc_ors_inventory->dbSessionValues[1],
							 'allFacilityTypes'=>$this->m_zinc_ors_inventory->dbSessionValues[2],
							 'allFacilityLevels'=>$this->m_zinc_ors_inventory->dbSessionValues[3],
							 'allFacilityOwners'=>$this->m_zinc_ors_inventory->dbSessionValues[4],
							 'allProvinces'=>$this->m_zinc_ors_inventory->dbSessionValues[5]
							 );
           // var_dump($newdata); exit;
			
			$this -> session -> set_userdata($newdata);
		  
		   
			redirect(base_url() . 'c_front/inventory', 'refresh');
			$this -> load -> view('pages/inventory/index', $this->data);
			
			
			

		} else {
			#use an ajax request and not a whole refresh
			$this->data['form'] = '<p>Facility Not Found!<p>';
			$this -> load -> view('index', $this->data);
		}
	}

   

   public function doCheckFacilityCode(){/**from the session data*/
	if(!$this -> session -> userdata('fName')){
		redirect(base_url() . 'c_front/inventory', 'refresh');
		return true;
		
		}else{
			$this->requestMFC();
			return false;
		 
		}
	}
   
   private function requestMFC(){
   	        #use an ajax request and not a whole refresh
			$data['form'] = '<p>Facility Identification Required!<p>';
			$this -> load -> view('index', $data);
   }
   
   
	
	public function logout(){
		$data['facility']=$this ->selectFacility;
		$data['title']='MoH::Data Management Tool';
		$data['form'] = '<p>You need to login.<p>';
		$this -> load -> view('index', $data);
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
		
	}
}