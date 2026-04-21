<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller{
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
        $data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('is_delete'=>1));
        $data['page_title'] = "Project Management";
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/project_list',$data);
    }

    public function add_project($id=null) {
        if($this->input->post()) {
            $insert_array=array();
            $insert_array['project_title'] = $this->input->post('project_title');
            $insert_array['funding_agency']=$this->input->post('funding_agency');
            $insert_array['funding_amount']=$this->input->post('funding_amount');
            $insert_array['project_incharge']=$this->input->post('project_incharge');
            if ($this->input->post('coproject_incharge') != '') {
                $coproject_incharge = $this->input->post('coproject_incharge');
                $insert_array['coproject_incharge'] = implode(",", $coproject_incharge);
            } else {
                $insert_array['coproject_incharge'] = $this->input->post('coproject_incharge');
            }
            $insert_array['project_type'] = $this->input->post('project_type');
            $insert_array['starting_year']=$this->input->post('starting_year');
            $insert_array['project_duration']=$this->input->post('project_duration');
            $insert_array['reference_number']=$this->input->post('reference_number');
            $insert_array['description'] = addslashes($this->input->post('description'));
            $insert_array['pstatus']=$this->input->post('pstatus');
            if(!empty($id)) {
				$this->common_model->tbl_update(PROJECT,array('id'=>$id),$insert_array);
                $this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully updated','SUCCESS');
				redirect(base_url('admin/project'));
		    } else {
                $chech_title = $this->common_model->get_data_row(PROJECT,array('project_title'=>$this->input->post('project_title')));
                if ($chech_title['project_title'] == $this->input->post('project_title')) {
                    echo ('<script>alert("Project title is already exist!");</script>');
                } else {
                    $id = $this->common_model->tbl_insert(PROJECT,$insert_array);
                    $this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully saved','SUCCESS');
                    redirect(base_url()."admin/project");
                }
			}
        }
        if(!empty($id)) {
            $data['page_title'] = "Edit Project";
            $data['project']=$this->common_model->get_data_row(PROJECT,array('id'=>$id));   
        } else {
            $data['page_title'] = "Add Project";
        }
        $data['ourteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".`fname` ASC",array('position'=>[1,2,8],'status'=>1, 'is_delete'=>1));
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/add_project',$data);
    }
    
    public function change_status($id) {
        $project=$this->common_model->get_data(PROJECT,array('id'=>$id));
        if($project[0]['status']==1) {
            $status = array('status'=>2);
        } else {
            $status = array('status'=>1);
        }
        $this->common_model->tbl_update(PROJECT,array('id'=>$id),$status);
        $this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
        redirect(base_url()."admin/project");
    }
    
    public function delete($id) {
        $project=$this->common_model->get_data_row(PROJECT,array('id'=>$id));
        if($project['is_delete']==1) {
            $status = array('is_delete'=>2);
        } else {
            $status = array('is_delete'=>1);
        }
        $this->common_model->tbl_update(PROJECT,array('id'=>$id),$status);
        $this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> News successfully deleted.','SUCCESS');
        redirect(base_url()."admin/project/");
    }
}