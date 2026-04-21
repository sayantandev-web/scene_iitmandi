<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct() {
        @parent::__construct();
        if(!isset($_SESSION)) { 
            session_start(); 
        } 
    }
    
    public function index() {
        if($this->session->userdata('uid') == '-1'){
           redirect(base_url('admin/dashboard'));
        }
        if($this->input->post()) {
            $sql="`email` ='".$this->input->post('email')."' AND (`user_type`='-1')";
            $result=$this->common_model->get_data(ADMIN,$sql);
            if(md5($this->input->post('password')) == $result[0]['password']) {
                $this->session->set_userdata('uid',$result[0]['user_id']);
                redirect(base_url()."admin/dashboard");
            } else {
                $this->utilitylib->setMsg('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Wrong email or password!','ERROR');
                redirect(base_url()."admin/login");
            }
        }
        $data['page_title'] = "Login";
        $data['logo']=$this->common_model->get_data_array(SETTINGS,array('id'=>1),'','','','','','');
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['footer_scripts'] = $this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/login',$data);
    } 
    
    public function logout() {
        $this->session->unset_userdata('uid');
        session_unset();  
        redirect(base_url()."admin");
    }	
}