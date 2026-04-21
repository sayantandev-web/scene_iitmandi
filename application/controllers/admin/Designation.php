<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Designation extends CI_Controller{

	public function __construct(){
		@parent::__construct();
		$this->load->library('pagination');
		$this->load->library('image_lib');
		if(!isset($_SESSION)) { 
            session_start(); 
        }
		if($this->session->userdata('uid') == ''){
            redirect(base_url().'admin/');
        }
	}

	public function index() {
		$data['designation']=$this->common_model->get_data_array(DESIGNATION,'','','','','','',DESIGNATION.".id DESC",array('is_delete'=>1));
		$data['page_title'] = "Designation";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/designation_list',$data);
	} 
	
	public function add_designation ($id='') {
		if($this->input->post()) {
			$insArr=array();
			$insArr['user_type']=$this->input->post('user_type');
			$insArr['designation']=$this->input->post('designation');
			$insArr['status']=$this->input->post('status');
			if(!empty($id)){
				$this->common_model->tbl_update(DESIGNATION,array('id'=>$id),$insArr);
				$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully updated','SUCCESS');
				redirect(base_url('admin/designation'));
		    } else{
				$id = $this->common_model->tbl_insert(DESIGNATION,$insArr);
				$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully saved','SUCCESS');
				redirect(base_url()."admin/designation");
			}
		}
		$data['banner']=$this->common_model->get_data_row(DESIGNATION,array('id'=>$id));
		if(!empty($id)){
			$data['page_title'] = "Edit Designation";
		} else {
			$data['page_title'] = "Add Designation";
		}
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/add_designation',$data);
	} 

	public function designation_change_status($id) {
		$banner=$this->common_model->get_data(DESIGNATION,array('id'=>$id));
		if($banner[0]['status']==1) {
			$status = array('status'=>2);
		} else {
			$status = array('status'=>1);
		}
		$this->common_model->tbl_update(DESIGNATION,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
		redirect(base_url()."admin/designation");
	}
	
	public function designation_delete($id) {
		$banner=$this->common_model->get_data(DESIGNATION,array('id'=>$id));
		if($banner[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(DESIGNATION,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i>Successfully Deleted.','SUCCESS');
		redirect(base_url()."admin/designation");
	}
}