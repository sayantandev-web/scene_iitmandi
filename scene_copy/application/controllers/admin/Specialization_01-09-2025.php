<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Specialization extends CI_Controller{

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
		$data['specialization']=$this->common_model->get_data_array(SPECIALIZATION,'','','','','','',SPECIALIZATION.".id DESC",array('is_delete'=>1));
		$data['page_title'] = "Specialization Management";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/specialization_list',$data);
	} 
	
	public function add_specialization($id='') {
		//print_r($this->input->post());
		if($this->input->post()) {
			$insArr=array();
			$insArr['specialization_name'] = $this->input->post('specialization_name');
			$insArr['about_specialization'] = $this->input->post('about_specialization');
			$insArr['research_specialization'] = $this->input->post('research_specialization');
			$insArr['status'] = $this->input->post('status');
			if ($_FILES['specialization_img']['name'] != '') {
				$data['result']=$this->common_model->get_data(TEAM,array('id'=>$id));
				if(@$data['result'][0]['specialization_img']) {	
					unlink('./uploads/specialization/'.$data['result'][0]['specialization_img']);	
					unlink('./uploads/specialization/thumb/'.$data['result'][0]['specialization_img']);	
				}
				$config1=array();
				$config1['upload_path']='./uploads/specialization/thumb';
				$config1['upload_path']='./uploads/specialization/';
				$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
				$config1['file_name']=time().$random_number;
				$config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|mp4|MPEG-4';
				/*$config1['max_width'] = '2000';
				$config1['max_height'] = '1125';*/
				$config1['overwrite']=TRUE;
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if(!$this->upload->do_upload('specialization_img')){
					$err_upload=$this->upload->display_errors();
					$this->utilitylib->setMsg($err_upload,'ERROR');
					print_r($err_upload);
					redirect(base_url('admin/specialization/add_specialization'));
				} else {
					$suc_upload2=array();
					$suc_upload2=$this->upload->data();
					$config1['image_library']='gd2';
					$config1['source_image']='uploads/specialization/'.$suc_upload2['file_name'];
					$config1['new_image']='uploads/specialization/thumb/'.$suc_upload2['file_name'];
					$config1['maintain_ratio']=TRUE;
					$config1['width']=150;
					$config1['height']=97;
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$insArr['specialization_img']=$suc_upload2['file_name'];
				}
			}
			if(!empty($id)) {
				$this->common_model->tbl_update(SPECIALIZATION,array('id'=>$id),$insArr);
				$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully updated','SUCCESS');
				redirect(base_url()."admin/specialization/");
			} else {
				$this->common_model->tbl_insert(SPECIALIZATION,$insArr);
				$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully Added','SUCCESS');
				redirect(base_url()."admin/specialization/");
			}
		}
		$data['specialization']=$this->common_model->get_data_row(SPECIALIZATION,array('id'=>$id));
		if(!empty($id)){
			$data['page_title'] = "Edit Specialization";
		} else {
			$data['page_title'] = "Add Specialization";
		}
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/add_specialization',$data);
	} 

	public function change_status($id) {
		$specialization=$this->common_model->get_data(SPECIALIZATION,array('id'=>$id));
		if($specialization[0]['status']==1) {
			$status = array('status'=>2);
		} else {
			$status = array('status'=>1);
		}
		$this->common_model->tbl_update(SPECIALIZATION,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
		redirect(base_url()."admin/specialization");
	}
	
	public function specialization_delete($id) {
		$specialization=$this->common_model->get_data(SPECIALIZATION,array('id'=>$id));
		if($specialization[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(SPECIALIZATION,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i>Successfully Deleted.','SUCCESS');
		redirect(base_url()."admin/specialization");
	}
}