<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Programs extends CI_Controller{

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
		$data['programs']=$this->common_model->get_data_array(PROGRAMS,'','','','','','',PROGRAMS.".id DESC",array('is_delete'=>1));
		$data['page_title'] = "Programs";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/programs_list',$data);
	} 
	
	public function add_programs($id='') {
		if($this->input->post()) {
			$insArr=array();
			$insArr['name'] = $this->input->post('programs_title');
			$insArr['description'] = $this->input->post('description');
			$insArr['status'] = $this->input->post('status');
			if ($_FILES['prgm_img']['name'] != '') {
				$data['result']=$this->common_model->get_data(TEAM,array('id'=>$id));
				if(@$data['result'][0]['prgm_img']) {	
					unlink('./uploads/programs/'.$data['result'][0]['prgm_img']);	
					unlink('./uploads/programs/thumb/'.$data['result'][0]['prgm_img']);	
				}
				$config1=array();
				$config1['upload_path']='./uploads/programs/thumb';
				$config1['upload_path']='./uploads/programs/';
				$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
				$config1['file_name']=time().$random_number;
				$config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|mp4|MPEG-4';
				$config1['overwrite']=TRUE;
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if(!$this->upload->do_upload('prgm_img')){
					$err_upload=$this->upload->display_errors();
					$this->utilitylib->setMsg($err_upload,'ERROR');
					print_r($err_upload);
					redirect(base_url('admin/programs/add_programs'));
				} else {
					$suc_upload2=array();
					$suc_upload2=$this->upload->data();
					$config1['image_library']='gd2';
					$config1['source_image']='uploads/programs/'.$suc_upload2['file_name'];
					$config1['new_image']='uploads/programs/thumb/'.$suc_upload2['file_name'];
					$config1['maintain_ratio']=TRUE;
					$config1['width']=150;
					$config1['height']=97;
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$insArr['prgm_img']=$suc_upload2['file_name'];
				}
			}
			if(!empty($id)) {
				$this->common_model->tbl_update(PROGRAMS,array('id'=>$id),$insArr);
				$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully updated','SUCCESS');
				redirect(base_url()."admin/programs/");
			} else {
				$this->common_model->tbl_insert(PROGRAMS,$insArr);
				$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully Added','SUCCESS');
				redirect(base_url()."admin/programs/");
			}
		}
		$data['programs']=$this->common_model->get_data_row(PROGRAMS,array('id'=>$id,'status'=>1, 'is_delete'=>1));
		if(!empty($id)){
			$data['page_title'] = "Edit Program";
		} else {
			$data['page_title'] = "Add Program";
		}
		//$data['programs']=$this->common_model->get_data_array(PROGRAMS,'','','','','','',PROGRAMS.".id DESC",array('status'=>1, 'is_delete'=>1));
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/add_programs',$data);
	}

	public function change_status($id) {
        $programs=$this->common_model->get_data(PROGRAMS,array('id'=>$id));
        if($programs[0]['status']==1) {
            $status = array('status'=>2);
        } else {
            $status = array('status'=>1);
        }
        $this->common_model->tbl_update(PROGRAMS,array('id'=>$id),$status);
        $this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
        redirect(base_url()."admin/programs");
    }
    
    public function delete($id) {
        $programs=$this->common_model->get_data_row(PROGRAMS,array('id'=>$id));
        if($programs['is_delete']==1) {
            $status = array('is_delete'=>2);
        } else {
            $status = array('is_delete'=>1);
        }
        $this->common_model->tbl_update(PROGRAMS,array('id'=>$id),$status);
        $this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Programs successfully deleted.','SUCCESS');
        redirect(base_url()."admin/programs/");
    }
}