<?php
class C_Admin extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        
        //$this -> county = $this -> session -> userdata('county_analytics');
    
    }
    public function index(){
    $components['contentView']='admin/home';
    $this->template($components);
    }
    public function firepad(){
    $components['contentView']='admin/firepad/index';
    $this->template($components);
    }
    private function template($content){
    $components['contentView']=$content['contentView'];
    $this->load->view('admin/index',$components);
    }
}