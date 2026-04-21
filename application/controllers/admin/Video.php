<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller{

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

	public function index()
	{
		$sql ="`type` = 'videos'";
		$data['category_id']=$this->input->post('category_id');
        $data['status']=$this->input->post('status');
        if($this->input->post())
		{
			if($this->input->post('status'))
			{
				$sql.=" AND `status` = '".$this->input->post('status')."'";
			}
	    }
		$data['videos']=$this->common_model->get_data_array(STORAGE,$sql,'','','','','',STORAGE.".id DESC");
		$data['page_title'] = "Video Management";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/video_list',$data);
	} 
	
	public function add_video()
	{
		if($this->input->post())
		{
			$file_name = $this->input->post('file_name');
			$status = $this->input->post('status');
			$exist = $this->common_model->get_data(STORAGE,array('file_name'=>$file_name));
			if($exist) 
			{
				$this->utilitylib->setMsg('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> This youtube video already exist,please add another youtube video!','ERROR');
				redirect(base_url()."admin/video/add_video");
			} 
			else
			{
				$Insertarr['file_name'] = $file_name;
				$Insertarr['title'] = $this->input->post('title');
				$Insertarr['type'] = "videos";
				$Insertarr['status']=$status;
				$ins=$this->common_model->tbl_insert(STORAGE,$Insertarr);	
				if(!empty($ins))
				{
				   $this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Youtube video successfully added.','SUCCESS');
				   redirect(base_url()."admin/video/add_video");
				}
			}

		}
		$data['page_title'] = "Add Video";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/add_video',$data);
	} 

	public function change_status($id)
	{
		$video=$this->common_model->get_data(STORAGE,array('id'=>$id));
		if($video[0]['status']==1)
		{
			$status = array('status'=>2);
		}	
		else
		{
			$status = array('status'=>1);
		}
		$this->common_model->tbl_update(STORAGE,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
		redirect(base_url()."admin/video");
	}

	public function video_delete($id)
	{
		$this->common_model->tbl_record_del(STORAGE,array('id'=>$id));
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Video successfully deleted.','SUCCESS');
		
		redirect(base_url()."admin/video");
	}

}