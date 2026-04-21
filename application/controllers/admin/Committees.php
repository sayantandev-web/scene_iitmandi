<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Committees extends CI_Controller{

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
		$data['committees']=$this->common_model->get_data_array(COMMITTEES,'','','','','','',COMMITTEES.".id DESC",array('is_delete'=>1));
		$data['page_title'] = "House & Committees";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/committees_list',$data);
	} 
	
	public function add_committees ($id='') {
		if($this->input->post()) {
			$insArr=array();
			$insArr['title']=$this->input->post('title');
			$insArr['description']=$this->input->post('description');
			$insArr['status']=$this->input->post('status');
			if(!empty($id)){
				$this->common_model->tbl_update(COMMITTEES,array('id'=>$id),$insArr);
		    } else{
				$id = $this->common_model->tbl_insert(COMMITTEES,$insArr);
			}
			if($_FILES['committees_image']['name'] != '') {
				$data['result']=$this->common_model->get_data(COMMITTEES,array('id'=>$id));
				if(@$data['result'][0]['committees_image']) {	
					unlink('./assets/documents/committees/'.$data['result'][0]['committees_image']);	
					//unlink('./assets/documents/committees/thumb/'.$data['result'][0]['committees_image']);	
				}
				$config1=array();
				//$config1['upload_path']='./assets/documents/committees/thumb';
				$config1['upload_path']='./assets/documents/committees/';
				$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
				$config1['file_name']=time().$random_number;
				$config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|mp4|MPEG-4|pdf|PDF';
				/*$config1['max_width'] = '2000';
				$config1['max_height'] = '1125';*/
				$config1['overwrite']=TRUE;
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if(!$this->upload->do_upload('committees_image')){
					$err_upload=$this->upload->display_errors();
					$this->utilitylib->setMsg($err_upload,'ERROR');
					print_r($err_upload);
					redirect(base_url('admin/committees/add_committees'));
				} else {
					$suc_upload2=array();
					$suc_upload2=$this->upload->data();
					$config1['image_library']='gd2';
					$config1['source_image']='assets/documents/committees/'.$suc_upload2['file_name'];
					//$config1['new_image']='assets/documents/committees/thumb/'.$suc_upload2['file_name'];
					$config1['maintain_ratio']=TRUE;
					$config1['width']=150;
					$config1['height']=97;
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$insArr['committees']=$suc_upload2['file_name'];
					if(!empty($id)) {
					   $this->common_model->tbl_update(COMMITTEES,array('id'=>$id),$insArr);
					   $banner_id=$id;
					} else {
					   $banner_id=$this->common_model->tbl_insert(COMMITTEES,$insArr);
					}
					$this->common_model->tbl_update(COMMITTEES,array('id'=>$banner_id),$insArr);
				}
			}
			if(!empty($id)) {
				$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully updated','SUCCESS');
				redirect(base_url('admin/committees/add_committees/'.$id));
		    } else {
		    	$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully saved','SUCCESS');
				redirect(base_url()."admin/committees/add_committees");
		    }
		}
		$data['banner']=$this->common_model->get_data_row(COMMITTEES,array('id'=>$id));
		if(!empty($id)){
			$data['page_title'] = "Edit Team";
		} else {
			$data['page_title'] = "Add Team";
		}
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/add_committees',$data);
	} 

	public function change_status($id) {
		$banner=$this->common_model->get_data(COMMITTEES,array('id'=>$id));
		if($banner[0]['status']==1) {
			$status = array('status'=>2);
		} else {
			$status = array('status'=>1);
		}
		$this->common_model->tbl_update(COMMITTEES,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
		redirect(base_url()."admin/committees");
	}
	
	public function banner_delete($id) {
		$banner=$this->common_model->get_data(COMMITTEES,array('id'=>$id));
		if($banner[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(COMMITTEES,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i>Successfully Deleted.','SUCCESS');
		redirect(base_url()."admin/committees");
	}
}