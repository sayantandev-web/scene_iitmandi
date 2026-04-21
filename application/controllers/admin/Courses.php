<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Courses extends CI_Controller{

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
		$data['course']=$this->common_model->get_data_array(COURSES,'','','','','','',COURSES.".id DESC",array('is_delete'=>1));
		$data['page_title'] = "Courses Management";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/course_list',$data);
	} 
	
	public function add_course($id='') {
		if($this->input->post()) {
			$insArr=array();
			$insArr['course_name']=$this->input->post('course_name');
			$insArr['course_id']=$this->input->post('course_id');
			$insArr['course_link']=$this->input->post('course_link');
			$insArr['status']=$this->input->post('status');
			
			if(!empty($id)) {
				$this->common_model->tbl_update(COURSES,array('id'=>$id),$insArr);
				$this->utilitylib->setMsg(SUCCESS_ICON.' Course details Sucessfully updated','SUCCESS');
				redirect(base_url('admin/courses/add_course/'.$id));
		    } else {
				$id = $this->common_model->tbl_insert(COURSES,$insArr);
		    	$this->utilitylib->setMsg(SUCCESS_ICON.' Course details Sucessfully saved','SUCCESS');
				redirect(base_url()."admin/courses/add_course");
		    }
		}
		$data['course']=$this->common_model->get_data_row(COURSES,array('id'=>$id));
		if(!empty($id)){
			$data['page_title'] = "Edit Course Details";
		} else {
			$data['page_title'] = "Add Course Details";
		}
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/add_courses',$data);
	} 

	public function change_status($id) {
		$course=$this->common_model->get_data(COURSES,array('id'=>$id));
		if($course[0]['status']==1) {
			$status = array('status'=>2);
		} else {
			$status = array('status'=>1);
		}
		$this->common_model->tbl_update(COURSES,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
		redirect(base_url()."admin/courses");
	}
	
	public function course_delete($id) {
		$course=$this->common_model->get_data(COURSES,array('id'=>$id));
		if($course[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(COURSES,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i>Successfully Deleted.','SUCCESS');
		redirect(base_url()."admin/courses");
	}
}