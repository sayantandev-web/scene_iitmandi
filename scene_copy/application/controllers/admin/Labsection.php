<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Labsection extends CI_Controller{

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
		$data['labsection']=$this->common_model->get_data_array(LABSECTION,'','','','','','',LABSECTION.".id DESC",array('is_delete'=>1));
		$data['page_title'] = "Lab Section";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/labsection_list',$data);
	} 
	
	public function add_labsection($id='') {
		//print_r($this->input->post());
		if($this->input->post()) {
			$insArr=array();
			$insArr['labname'] = $this->input->post('labname');
			//$insArr['description'] = nl2br($this->input->post('description'));
			$insArr['description'] = $this->input->post('description');
			$insArr['specialization'] = $this->input->post('specialization');
			$insArr['typeofLab'] = $this->input->post('typeofLab');
			$insArr['coordinator'] = $this->input->post('coordinator');
			$insArr['cocooordinator'] = $this->input->post('cocooordinator');
			$insArr['external_link'] = $this->input->post('external_link');
			$insArr['status'] = $this->input->post('status');
			if ($_FILES['cover_photo']['name'] != '') {
				$data['result']=$this->common_model->get_data(TEAM,array('id'=>$id));
				if(@$data['result'][0]['cover_photo']) {	
					unlink('./uploads/labsection/'.$data['result'][0]['cover_photo']);	
					unlink('./uploads/labsection/thumb/'.$data['result'][0]['cover_photo']);	
				}
				$config1=array();
				$config1['upload_path']='./uploads/labsection/thumb';
				$config1['upload_path']='./uploads/labsection/';
				$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
				$config1['file_name']=time().$random_number;
				$config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|mp4|MPEG-4';
				/*$config1['max_width'] = '2000';
				$config1['max_height'] = '1125';*/
				$config1['overwrite']=TRUE;
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if(!$this->upload->do_upload('cover_photo')){
					$err_upload=$this->upload->display_errors();
					$this->utilitylib->setMsg($err_upload,'ERROR');
					print_r($err_upload);
					redirect(base_url('admin/labsection/add_labsection'));
				} else {
					$suc_upload2=array();
					$suc_upload2=$this->upload->data();
					$config1['image_library']='gd2';
					$config1['source_image']='uploads/labsection/'.$suc_upload2['file_name'];
					$config1['new_image']='uploads/labsection/thumb/'.$suc_upload2['file_name'];
					$config1['maintain_ratio']=TRUE;
					$config1['width']=150;
					$config1['height']=97;
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$insArr['cover_photo']=$suc_upload2['file_name'];
				}
			}
			if(!empty($id)) {
				$this->common_model->tbl_update(LABSECTION,array('id'=>$id),$insArr);
				$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully updated','SUCCESS');
				redirect(base_url()."admin/labsection/");
			} else {
				$search  = array('!', '@', '#', '$', '%', '^','&', '*', '(', ')', '-', '+', '=', '|', '~', '`', ',', '.', ';', ':', '"', '{', '}' ,"'",'?',',','>', 'A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o','/');
                $replace = array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ' , ' ', ' ', ' ', ' ', ' ', ' ',' ',' ',' ',' ', 'A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o','-');  	
                $labname = substr(trim(strtolower($this->input->post('labname'))),0,150);
                $len=strlen($labname);
                $resource_slug=str_replace($search, $replace, $labname);
                $resource_slug=str_replace(' ','-',$resource_slug);
                for($i=0;$i<=$len;$i++) {
                    $resource_slug=str_replace('--','-',$resource_slug);
                    $resource_slug=strtolower($resource_slug);
                }
                $resource_slug=urlencode($resource_slug);
                $insArr['page_slug']=$resource_slug;
				$this->common_model->tbl_insert(LABSECTION,$insArr);
				$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully Added','SUCCESS');
				redirect(base_url()."admin/labsection/");
			}
		}
		$data['labsection']=$this->common_model->get_data_row(LABSECTION,array('id'=>$id));
		if(!empty($id)){
			$data['page_title'] = "Edit Lab Section";
		} else {
			$data['page_title'] = "Add Lab Section";
		}
		$data['ourteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('position'=>[1,2],'status'=>1, 'is_delete'=>1));
		//$data['project_list']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('is_delete'=>1));
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/add_labsection',$data);
	} 

	public function change_status($id) {
		$labsection=$this->common_model->get_data(LABSECTION,array('id'=>$id));
		if($labsection[0]['status']==1) {
			$status = array('status'=>2);
		} else {
			$status = array('status'=>1);
		}
		$this->common_model->tbl_update(LABSECTION,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
		redirect(base_url()."admin/labsection");
	}
	
	public function labsection_delete($id) {
		$labsection=$this->common_model->get_data(LABSECTION,array('id'=>$id));
		if($labsection[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(LABSECTION,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i>Successfully Deleted.','SUCCESS');
		redirect(base_url()."admin/labsection");
	}
}