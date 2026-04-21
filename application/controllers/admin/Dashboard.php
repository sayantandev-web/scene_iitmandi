<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct(){
        @parent::__construct();
        $this->load->library('image_lib');
        if(!isset($_SESSION)) { 
            session_start(); 
        }
        if($this->session->userdata('uid') == ''){
            redirect(base_url().'admin/');
        }
    }
    
    public function index(){
        $data['page_title'] = "Dashboard";
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/index',$data);
    }

    public function profile() {
        $data['result']=$this->common_model->get_data(ADMIN,array('user_id'=>1));
        if($this->input->post()) {
            $updtarr=array();
            $updtarr['fname']=$this->input->post('fname');
            $updtarr['lname']=$this->input->post('lname');
            $updtarr['email']=$this->input->post('email');
            $updtarr['contact']=$this->input->post('contact');
            $this->common_model->tbl_update(ADMIN,array('user_id'=>1),$updtarr);
            if($_FILES['profile_pic']['size']!='') {
                $data['result']=$this->common_model->get_data(ADMIN,array('user_id'=>1));
                if(@$data['result'][0]['profile_pic']) {
                        unlink('./assets/images/users/'.$data['result'][0]['profile_pic']);
                        unlink('./assets/images/users/thumb/'.$data['result'][0]['profile_pic']);
                }
                $config1=array();
                $config1['upload_path']='./assets/images/users/';
                $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
                $config1['file_name']=time().$random_number;
                $config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF';
                $config1['overwrite']=TRUE;
                $this->load->library('upload',$config1);
                $this->upload->initialize($config1);
                if(!$this->upload->do_upload('profile_pic')){
                    $err_upload=$this->upload->display_errors();
                    $this->utilitylib->setMsg($err_upload,'ERROR');
                    //print_r($err_upload);die();
                    redirect(base_url('admin/Dashboard/profile'));
                } else{
                    $suc_upload2=array();
                    $suc_upload2=$this->upload->data();
                    $config1['image_library']='gd2';
                    $config1['source_image']='assets/images/users/'.$suc_upload2['file_name'];
                    $config1['new_image']='assets/images/users/thumb/'.$suc_upload2['file_name'];
                    $config1['maintain_ratio']=TRUE;
                    $config1['width']=100;
                    $config1['height']=100;
                    $this->image_lib->initialize($config1);
                    $this->image_lib->resize();
                    $upd_array2=array();
                    $upd_array2['profile_pic']=$suc_upload2['file_name'];
                    $this->common_model->tbl_update(ADMIN,array('user_id'=>1),$upd_array2);
                }
            }
            $this->utilitylib->setMsg(SUCCESS_ICON.' Profile successfully saved','SUCCESS');
            redirect(base_url('admin/Dashboard/profile'));
        }
        $data['page_title'] = "Edit Profile";
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/edit_profile',$data);
    }
    
    public function change_logo() {
        $data['result']=$this->common_model->get_data(ADMIN,array('user_id'=>1));
        if($this->input->post()) {
            if($_FILES['logo']['size']!='') {
                $data['result']=$this->common_model->get_data(STORAGE,array('id'=>1));
                if(@$data['result'][0]['file_name']) {
                    unlink('./assets/images/logo/'.$data['result'][0]['file_name']);
                    unlink('./assets/images/logo/thumb/'.$data['result'][0]['file_name']);
                }
                $config1=array();
                $config1['upload_path']='./assets/images/logo/';
                $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
                $config1['file_name']=time().$random_number;
                $config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF';
                $config1['overwrite']=TRUE;
                $this->load->library('upload',$config1);
                $this->upload->initialize($config1);
                if(!$this->upload->do_upload('logo')){
                        $err_upload=$this->upload->display_errors();
                        $this->utilitylib->setMsg($err_upload,'ERROR');
                        print_r($err_upload);die();
                        redirect(base_url('admin/Dashboard/change_logo'));
                } else {
                    $suc_upload2=array();
                    $suc_upload2=$this->upload->data();
                    $config1['image_library']='gd2';
                    $config1['source_image']='assets/images/logo/'.$suc_upload2['file_name'];
                    $config1['new_image']='assets/images/logo/thumb/'.$suc_upload2['file_name'];
                    $config1['maintain_ratio']=TRUE;
                    $config1['width']=200;
                    $config1['height']=60;
                    $this->image_lib->initialize($config1);
                    $this->image_lib->resize();

                    $upd_array2=array();
                    $upd_array2['logo']=$suc_upload2['file_name'];
                    $this->common_model->tbl_update(ADMIN,array('user_id'=>1),$upd_array2);
                }
            }
            $this->utilitylib->setMsg(SUCCESS_ICON.' Logo successfully changed','SUCCESS');
            redirect(base_url('admin/Dashboard/change_logo'));
        }
        $data['page_title'] = "Change Logo";
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/change_logo',$data);
    }
    
    public function change_password() {
        if($this->input->post()) {
            $result=$this->common_model->get_data(ADMIN,array('user_id'=>'-1'));
            if(md5($this->input->post('current_pass')) == @$result[0]['password']) {
                $upt=$this->common_model->tbl_update(ADMIN,array('user_id'=>'-1'),array('password'=>md5($this->input->post('confirm_pass'))));
                $this->utilitylib->setMsg('Password changed successfully','SUCCESS');
                $this->session->unset_userdata('uid');
                session_unset();  
                redirect(base_url()."admin");
            } else {
                $this->utilitylib->setMsg('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Please enter old password correctly!','ERROR');
                redirect(base_url()."admin/Dashboard/change_password");
            }
        }
        $data['page_title'] = "Change Password";
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/change_password',$data);
    }
}