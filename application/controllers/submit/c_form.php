<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
#processes form data before committing to the data-layer
class C_Form extends MY_Controller{

	public function __construct() {
		parent::__construct();
		//$this->load->model(); //load the needed models
	}

	public function form_zinc_ors_inventory(){

		$this->M_Zinc_Ors_Inventory->addRecord();

		if($this->M_Zinc_Ors_Inventory->response='ok'){
			//notify user of success
			$data['form_id']="";
			$data['form']='<p><b>Zinc Sulphate and ORS </b> data submitted successfully in 
			approximately <b>'.$this->M_Zinc_Ors_Inventory->executionTime.'</b> seconds.</p>';
			//redirect(base_url() . 'c_front/vehicles/index', 'location');
			$this -> load -> view('pages/inventory/index', $data);


		}else{
			//notify user of error/failure
		}

	}//close form_zinc_ors_inventory()

	public function data_handler(){
		//print var_dump($this->input->post());

		$this->M_Zinc_Ors_Inventory->updateFacility();
		if($this->M_Zinc_Ors_Inventory->response=='true'){
		print 'true';
		}else{
			print 'false';
		}

	}//close data_handler

	public function form_mnh_equipment_assessment(){
		$this->load->model('m_mnh_assessment');
		$this->m_mnh_assessment->addRecord();

		if($this->m_mnh_assessment->response='ok'){
			//notify user of success
			$data['form_id']="";
			$data['form']='<p><b>Maternal & Newborn Health Assessment</b> data submitted successfully in 
			approximately <b>'.$this->m_mnh_assessment->executionTime.'</b> seconds.</p>';
			//redirect(base_url() . 'c_front/vehicles/index', 'location');
			$this -> load -> view('pages/inventory/index', $data);


		}else{
			//notify user of error/failure
		}

	}//close form_mnh_equipment_assessment()
	
	public function complete_commodity_survey(){
		
		$this->load->model('m_mnh_survey');
		$this->m_mnh_survey->store_data();

		if($this->m_mnh_survey->response=='true'){
			//notify user of success
		/*	$data['form_id']="";
			$data['form']='<p><b>Maternal & Newborn Commodity Assessment</b> data submitted successfully in 
			approximately <b>'.$this->m_mnh_survey->executionTime.'</b> seconds.</p>';
			redirect(base_url() . 'c_front/', 'location');
			$this -> load -> view('pages/inventory/index', $data);*/
           print 'true';

		}else{
			/*$data['form_id']="";
			$data['form']='<p>Encountered an error. Data has not been submitted.</p>';
			redirect(base_url() . 'c_front/', 'location');
			$this -> load -> view('pages/inventory/index', $data);*/
			print 'false';
		}

	}//close complete_commodity_survey()
}