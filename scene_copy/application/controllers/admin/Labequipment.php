<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Labequipment extends CI_Controller{

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
		$data['labequipment']=$this->common_model->get_data_array(LABEQUIPMENT,'','','','','','',LABEQUIPMENT.".id DESC",array('status'=>1, 'is_delete'=>1));
		$data['page_title'] = "Lab Equipment";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/labequipment_list',$data);
	} 
	
	public function add_labequipment($id='') {
		//print_r($this->input->post());
		if($this->input->post()) {
			$insArr=array();
			$insArr['equipment_name'] = $this->input->post('equipment_name');
			$insArr['description'] = $this->input->post('description');
			$insArr['lab_name'] = $this->input->post('lab_name');
			$insArr['status'] = $this->input->post('status');
			if ($_FILES['eqpmnt_img']['name'] != '') {
				$data['result']=$this->common_model->get_data(TEAM,array('id'=>$id));
				if(@$data['result'][0]['eqpmnt_img']) {	
					unlink('./uploads/labequipment/'.$data['result'][0]['eqpmnt_img']);	
					unlink('./uploads/labequipment/thumb/'.$data['result'][0]['eqpmnt_img']);	
				}
				$config1=array();
				$config1['upload_path']='./uploads/labequipment/thumb';
				$config1['upload_path']='./uploads/labequipment/';
				$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
				$config1['file_name']=time().$random_number;
				$config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|mp4|MPEG-4';
				/*$config1['max_width'] = '2000';
				$config1['max_height'] = '1125';*/
				$config1['overwrite']=TRUE;
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if(!$this->upload->do_upload('eqpmnt_img')){
					$err_upload=$this->upload->display_errors();
					$this->utilitylib->setMsg($err_upload,'ERROR');
					print_r($err_upload);
					redirect(base_url('admin/labequipment/add_labequipment'));
				} else {
					$suc_upload2=array();
					$suc_upload2=$this->upload->data();
					$config1['image_library']='gd2';
					$config1['source_image']='uploads/labequipment/'.$suc_upload2['file_name'];
					$config1['new_image']='uploads/labequipment/thumb/'.$suc_upload2['file_name'];
					$config1['maintain_ratio']=TRUE;
					$config1['width']=150;
					$config1['height']=97;
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$insArr['eqpmnt_img']=$suc_upload2['file_name'];
				}
			}
			if(!empty($id)) {
				$this->common_model->tbl_update(LABEQUIPMENT,array('id'=>$id),$insArr);
				$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully updated','SUCCESS');
				redirect(base_url()."admin/labequipment/");
			} else {
				$this->common_model->tbl_insert(LABEQUIPMENT,$insArr);
				$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully Added','SUCCESS');
				redirect(base_url()."admin/labequipment/");
			}
		}
		$data['labequipment']=$this->common_model->get_data_row(LABEQUIPMENT,array('id'=>$id));
		if(!empty($id)){
			$data['page_title'] = "Edit Lab Equipment";
		} else {
			$data['page_title'] = "Add Lab Equipment";
		}
		$data['labname']=$this->common_model->get_data_array(LABSECTION,'','','','','','',LABSECTION.".id DESC",array('status'=>1, 'is_delete'=>1));
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/add_labequipment',$data);
	} 

	public function change_status($id) {
		$labequipment=$this->common_model->get_data(LABEQUIPMENT,array('id'=>$id));
		if($labequipment[0]['status']==1) {
			$status = array('status'=>2);
		} else {
			$status = array('status'=>1);
		}
		$this->common_model->tbl_update(LABEQUIPMENT,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
		redirect(base_url()."admin/labequipment");
	}
	
	public function labequipment_delete($id) {
		$labequipment=$this->common_model->get_data(LABEQUIPMENT,array('id'=>$id));
		if($labequipment[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(LABEQUIPMENT,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i>Successfully Deleted.','SUCCESS');
		redirect(base_url()."admin/labequipment");
	}
}