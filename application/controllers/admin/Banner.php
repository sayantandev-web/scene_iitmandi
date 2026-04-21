<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Banner extends CI_Controller{

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
		$data['banner']=$this->common_model->get_data_array(BANNER,'','','','','','',BANNER.".id DESC",array('is_delete'=>1));
		$data['page_title'] = "Banner Management";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/banner_list',$data);
	} 
	
	public function add_banner($id='') {
		if($this->input->post()) {
			$insArr=array();
			$insArr['banner_title']=$this->input->post('banner_title');
			$insArr['banner_title1']=$this->input->post('banner_title1');
			$insArr['status']=$this->input->post('status');
			if(!empty($id)){
				$this->common_model->tbl_update(BANNER,array('id'=>$id),$insArr);
		    } else{
				$id = $this->common_model->tbl_insert(BANNER,$insArr);
			}
			if($_FILES['banner_image']['name'] != '') {
				$data['result']=$this->common_model->get_data(BANNER,array('id'=>$id));
				if(@$data['result'][0]['banner_image']) {	
					unlink('./uploads/banner/'.$data['result'][0]['banner_image']);	
					unlink('./uploads/banner/thumb/'.$data['result'][0]['banner_image']);	
				}
				$config1=array();
				$config1['upload_path']='./uploads/banner/thumb';
				$config1['upload_path']='./uploads/banner/';
				$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
				$config1['file_name']=time().$random_number;
				$config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|mp4|MPEG-4';
				/*$config1['max_width'] = '2000';
				$config1['max_height'] = '1125';*/
				$config1['overwrite']=TRUE;
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if(!$this->upload->do_upload('banner_image')){
					$err_upload=$this->upload->display_errors();
					$this->utilitylib->setMsg($err_upload,'ERROR');
					print_r($err_upload);
					redirect(base_url('admin/banner/add_banner'));
				} else {
					$suc_upload2=array();
					$suc_upload2=$this->upload->data();
					$config1['image_library']='gd2';
					$config1['source_image']='uploads/banner/'.$suc_upload2['file_name'];
					$config1['new_image']='uploads/banner/thumb/'.$suc_upload2['file_name'];
					$config1['maintain_ratio']=TRUE;
					$config1['width']=150;
					$config1['height']=97;
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$insArr['banner_image']=$suc_upload2['file_name'];
					if(!empty($id)) {
					   $this->common_model->tbl_update(BANNER,array('id'=>$id),$insArr);
					   $banner_id=$id;
					} else {
					   $banner_id=$this->common_model->tbl_insert(BANNER,$insArr);
					}
					$this->common_model->tbl_update(BANNER,array('id'=>$banner_id),$insArr);
				}
			}
			if(!empty($id)) {
				$this->utilitylib->setMsg(SUCCESS_ICON.' Banner details Sucessfully updated','SUCCESS');
				redirect(base_url('admin/banner/add_banner/'.$id));
		    } else {
		    	$this->utilitylib->setMsg(SUCCESS_ICON.' Banner details Sucessfully saved','SUCCESS');
				redirect(base_url()."admin/banner/add_banner");
		    }
		}
		$data['banner']=$this->common_model->get_data_row(BANNER,array('id'=>$id));
		if(!empty($id)){
			$data['page_title'] = "Edit Banner";
		} else {
			$data['page_title'] = "Add Banner";
		}
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/add_banner',$data);
	} 

	public function change_status($id) {
		$banner=$this->common_model->get_data(BANNER,array('id'=>$id));
		if($banner[0]['status']==1) {
			$status = array('status'=>2);
		} else {
			$status = array('status'=>1);
		}
		$this->common_model->tbl_update(BANNER,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
		redirect(base_url()."admin/banner");
	}
	
	public function banner_delete($id) {
		$banner=$this->common_model->get_data(BANNER,array('id'=>$id));
		if($banner[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(BANNER,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i>Successfully Deleted.','SUCCESS');
		redirect(base_url()."admin/banner");
	}
}