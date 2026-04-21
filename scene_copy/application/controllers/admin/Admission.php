<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admission extends CI_Controller{

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
		$data['admission']=$this->common_model->get_data_array(ADMISSION,'','','','','','',ADMISSION.".id DESC",array('is_delete'=>1));
		$data['page_title'] = "Admission Management";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/admission_list',$data);
	} 
	
	public function add_admission($id='') {
		if($this->input->post()) {
			$insArr=array();
			$insArr['title']=$this->input->post('title');
			$insArr['description']=$this->input->post('description');
			$insArr['link']=$this->input->post('link');
			$insArr['status']=$this->input->post('status');
			
			if(!empty($id)) {
				$this->common_model->tbl_update(ADMISSION,array('id'=>$id),$insArr);
				$this->utilitylib->setMsg(SUCCESS_ICON.' Admission details Sucessfully updated','SUCCESS');
				redirect(base_url('admin/admission/add_admission/'.$id));
		    } else {
				$id = $this->common_model->tbl_insert(ADMISSION,$insArr);
		    	$this->utilitylib->setMsg(SUCCESS_ICON.' Admission details Sucessfully saved','SUCCESS');
				redirect(base_url()."admin/admission/add_admission");
		    }
		}
		$data['admission']=$this->common_model->get_data_row(ADMISSION,array('id'=>$id));
		if(!empty($id)){
			$data['page_title'] = "Edit Admission";
		} else {
			$data['page_title'] = "Add Admission";
		}
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/add_admission',$data);
	} 

	public function change_status($id) {
		$admission=$this->common_model->get_data(ADMISSION,array('id'=>$id));
		if($admission[0]['status']==1) {
			$status = array('status'=>2);
		} else {
			$status = array('status'=>1);
		}
		$this->common_model->tbl_update(ADMISSION,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
		redirect(base_url()."admin/admission");
	}
	
	public function admission_delete($id) {
		$admission=$this->common_model->get_data(ADMISSION,array('id'=>$id));
		if($admission[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(ADMISSION,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i>Successfully Deleted.','SUCCESS');
		redirect(base_url()."admin/admission");
	}
}