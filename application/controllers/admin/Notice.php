<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller{

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
		$data['notice']=$this->common_model->get_data_array(NOTICE,'','','','','','',NOTICE.".id DESC",array('is_delete'=>1));
		$data['page_title'] = "Notice Management";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/notice_list',$data);
	} 
	
	public function add_notice ($id='') {
		if($this->input->post()) {
			$insArr=array();
			$insArr['title']=$this->input->post('title');
			$insArr['status']=$this->input->post('status');
			if(!empty($id)){
				$this->common_model->tbl_update(NOTICE,array('id'=>$id),$insArr);
		    } else{
				$id = $this->common_model->tbl_insert(NOTICE,$insArr);
			}
			if($_FILES['notice_file']['name']!='') {
				$data['result']=$this->common_model->get_data(NOTICE,array('id'=>$id));
				if(@$data['result'][0]['notice_file']) {	
					unlink('./assets/images/notice/'.$data['result'][0]['notice_file']);	
				}
				$config1=array();
				$config1['upload_path']='./assets/images/notice/';
				$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
				$config1['file_name']=time().$random_number;
				$config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|pdf';
				$config1['overwrite']=TRUE;
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if(!$this->upload->do_upload('notice_file')){
					$err_upload=$this->upload->display_errors();
					$this->utilitylib->setMsg($err_upload,'ERROR');
					print_r($err_upload);
					redirect(base_url('admin/notice/add_notice'));
				} else {
					$suc_upload2=array();
					$suc_upload2=$this->upload->data();
					$config1['image_library']='gd2';
					$config1['source_image']='assets/images/notice/'.$suc_upload2['file_name'];
					$config1['maintain_ratio']=TRUE;
					$config1['width']=150;
					$config1['height']=97;
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$insArr['attachment']=$suc_upload2['file_name'];
					if(!empty($id)) {
					   $this->common_model->tbl_update(NOTICE,array('id'=>$id),$insArr);
					   $sp_id=$id;
					} else {
					   $sp_id=$this->common_model->tbl_insert(NOTICE,$insArr);
					}
					$this->common_model->tbl_update(NOTICE,array('id'=>$sp_id),$insArr);
				}
			}
			if(!empty($id)) {
				$this->utilitylib->setMsg(SUCCESS_ICON.'Sucessfully updated','SUCCESS');
				redirect(base_url('admin/notice/add_notice/'.$id));
		    } else {
		    	$this->utilitylib->setMsg(SUCCESS_ICON.'Sucessfully saved','SUCCESS');
				redirect(base_url()."admin/notice/add_notice");
		    }
		}
		$data['notice']=$this->common_model->get_data_row(NOTICE,array('id'=>$id));
		if(!empty($id)){
			$data['page_title'] = "Edit Notice";
		} else {
			$data['page_title'] = "Add Notice";
		}
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/add_notice',$data);
	} 

	public function change_status($id) {
		$file=$this->common_model->get_data(NOTICE,array('id'=>$id));
		if($file[0]['status']==1) {
			$status = array('status'=>2);
		} else {
			$status = array('status'=>1);
		}
		$this->common_model->tbl_update(NOTICE,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
		redirect(base_url()."admin/notice");
	}

	public function notice_delete($id) {
		$this->common_model->tbl_record_del(NOTICE,array('id'=>$id));
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Notice successfully deleted.','SUCCESS');
		redirect(base_url()."admin/notice");
	}
}