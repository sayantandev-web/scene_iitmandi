<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Disclosure extends CI_Controller{

	public function __construct(){
		@parent::__construct();
		$this->load->library('pagination');
		$this->load->library('image_lib');
		if(!isset($_SESSION)) { 
            session_start(); 
        }
		if(!$this->session->userdata('uid')) {
            redirect(base_url().'admin/');
        }
	}

	public function index() {
		$data['disclosure']=$this->common_model->get_data_array(DISCLOSURE,'','','','','','',DISCLOSURE.".id DESC",array('is_delete'=>1));
		$data['page_title'] = "Mandatory Disclosure";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/disclosure_list',$data);
	} 
	
	public function add_disclosure ($id='') {
		if($this->input->post()) {
			$insArr=array();
			$insArr['title']=$this->input->post('title');
			$insArr['status']=$this->input->post('status');
			if(!empty($id)){
				$this->common_model->tbl_update(DISCLOSURE,array('id'=>$id),$insArr);
		    } else{
				$id = $this->common_model->tbl_insert(DISCLOSURE,$insArr);
			}
			if($_FILES['disclosure_image']['name'] != '') {
				$data['result']=$this->common_model->get_data(DISCLOSURE,array('id'=>$id));
				if(@$data['result'][0]['disclosure_image']) {	
					unlink('./assets/documents/disclosure/'.$data['result'][0]['disclosure_image']);	
					//unlink('./assets/documents/disclosure/thumb/'.$data['result'][0]['disclosure_image']);	
				}
				$config1=array();
				//$config1['upload_path']='./assets/documents/disclosure/thumb';
				$config1['upload_path']='./assets/documents/disclosure/';
				$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
				$config1['file_name']=time().$random_number;
				$config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|mp4|MPEG-4|pdf|PDF';
				/*$config1['max_width'] = '2000';
				$config1['max_height'] = '1125';*/
				$config1['overwrite']=TRUE;
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if(!$this->upload->do_upload('disclosure_image')){
					$err_upload=$this->upload->display_errors();
					$this->utilitylib->setMsg($err_upload,'ERROR');
					print_r($err_upload);
					redirect(base_url('admin/disclosure/add_disclosure'));
				} else {
					$suc_upload2=array();
					$suc_upload2=$this->upload->data();
					$config1['image_library']='gd2';
					$config1['source_image']='assets/documents/disclosure/'.$suc_upload2['file_name'];
					//$config1['new_image']='assets/documents/disclosure/thumb/'.$suc_upload2['file_name'];
					$config1['maintain_ratio']=TRUE;
					$config1['width']=150;
					$config1['height']=97;
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$insArr['disclosure']=$suc_upload2['file_name'];
					if(!empty($id)) {
					   $this->common_model->tbl_update(DISCLOSURE,array('id'=>$id),$insArr);
					   $banner_id=$id;
					} else {
					   $banner_id=$this->common_model->tbl_insert(DISCLOSURE,$insArr);
					}
					$this->common_model->tbl_update(DISCLOSURE,array('id'=>$banner_id),$insArr);
				}
			}
			if(!empty($id)) {
				$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully updated','SUCCESS');
				redirect(base_url('admin/disclosure/add_disclosure/'.$id));
		    } else {
		    	$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully saved','SUCCESS');
				redirect(base_url()."admin/disclosure/add_disclosure");
		    }
		}
		$data['banner']=$this->common_model->get_data_row(DISCLOSURE,array('id'=>$id));
		if(!empty($id)){
			$data['page_title'] = "Edit Disclosure";
		} else {
			$data['page_title'] = "Add Disclosure";
		}
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/add_disclosure',$data);
	} 

	public function change_status($id) {
		$banner=$this->common_model->get_data(DISCLOSURE,array('id'=>$id));
		if($banner[0]['status']==1) {
			$status = array('status'=>2);
		} else {
			$status = array('status'=>1);
		}
		$this->common_model->tbl_update(DISCLOSURE,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
		redirect(base_url()."admin/disclosure");
	}
	
	public function banner_delete($id) {
		$banner=$this->common_model->get_data(DISCLOSURE,array('id'=>$id));
		if($banner[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(DISCLOSURE,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i>Successfully Deleted.','SUCCESS');
		redirect(base_url()."admin/disclosure");
	}
}