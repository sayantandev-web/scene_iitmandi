<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller{
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

    public function index() {
        $data['page_title'] = "Site Settings";
        $data['result']=$this->common_model->get_data(SETTINGS,array('id'=>1));
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/settings',$data);
    }

    public function site_settings() {
        $site_settings = $this->common_model->get_data(SETTINGS,'');
        if(empty($site_settings)){
            if($this->input->post()) {
                $updtarr=array();
                $updtarr['email']=$this->input->post('email');
                $updtarr['location1']=nl2br($this->input->post('location1'));
                $updtarr['contact']=$this->input->post('contact');
                $updtarr['facekbook_url']=$this->input->post('facekbook_url');
                $updtarr['instagram_url']=$this->input->post('instagram_url');
                $updtarr['twitter_link']=$this->input->post('twitter_link');
                $updtarr['youtube_url']=$this->input->post('youtube_url');
                $updtarr['linkedin_url']=$this->input->post('linkedin_url');
                if($_FILES['profile_pic']['size']!='') {
                    $config1=array();
                    $config1['upload_path']='./uploads/site_logo/';
                    $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
                    $config1['file_name']=time().$random_number;
                    $config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF';
                    $config1['overwrite']=TRUE;
                    $this->load->library('upload',$config1);
                    $this->upload->initialize($config1);
                    if(!$this->upload->do_upload('profile_pic')){
                        $err_upload=$this->upload->display_errors();
                        $this->utilitylib->setMsg($err_upload,'ERROR');
                        print_r($err_upload);die();
                        redirect(base_url('admin/settings'));
                    } else{
                        $suc_upload2=array();
                        $suc_upload2=$this->upload->data();
                        $config1['image_library']='gd2';
                        $config1['source_image']='uploads/site_logo/'.$suc_upload2['file_name'];
                        $config1['new_image']='uploads/site_logo/thumb/'.$suc_upload2['file_name'];
                        $config1['maintain_ratio']=TRUE;
                        $config1['width']=100;
                        $config1['height']=100;
                        $this->image_lib->initialize($config1);
                        $this->image_lib->resize();
                        //$upd_array2=array();
                        $updtarr['profile_pic']=$suc_upload2['file_name'];
                        $this->common_model->tbl_insert(SETTINGS,$updtarr);
                    }
                }
                $this->utilitylib->setMsg(SUCCESS_ICON.'Saved','SUCCESS');
                redirect(base_url('admin/settings'));
            }
        } else{
            $data['result']=$this->common_model->get_data(SETTINGS,array('id'=>1));
            if($this->input->post()) {
                $updtarr=array();
                $updtarr['email']=$this->input->post('email');
                $updtarr['location1']=nl2br($this->input->post('location1'));
                $updtarr['contact']=$this->input->post('contact');
                $updtarr['facekbook_url']=$this->input->post('facekbook_url');
                $updtarr['instagram_url']=$this->input->post('instagram_url');
                $updtarr['twitter_link']=$this->input->post('twitter_link');
                $updtarr['youtube_url']=$this->input->post('youtube_url');
                $updtarr['linkedin_url']=$this->input->post('linkedin_url');
                $this->common_model->tbl_update(SETTINGS,array('id'=>1),$updtarr);
                if($_FILES['profile_pic']['size']!='') {
                    $data['result']=$this->common_model->get_data(SETTINGS,array('id'=>1));
                    if(@$data['result'][0]['profile_pic']) {
                        unlink('./uploads/site_logo/'.$data['result'][0]['profile_pic']);
                        unlink('./uploads/site_logo/thumb/'.$data['result'][0]['profile_pic']);
                    }
                    $config1=array();
                    $config1['upload_path']='./uploads/site_logo/';
                    $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
                    $config1['file_name']=time().$random_number;
                    $config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF';
                    $config1['overwrite']=TRUE;
                    $this->load->library('upload',$config1);
                    $this->upload->initialize($config1);
                    if(!$this->upload->do_upload('profile_pic')){
                            $err_upload=$this->upload->display_errors();
                            $this->utilitylib->setMsg($err_upload,'ERROR');
                            print_r($err_upload);die();
                            redirect(base_url('admin/settings'));
                    } else {
                        $suc_upload2=array();
                        $suc_upload2=$this->upload->data();
                        $config1['image_library']='gd2';
                        $config1['source_image']='uploads/site_logo/'.$suc_upload2['file_name'];
                        $config1['new_image']='uploads/site_logo/thumb/'.$suc_upload2['file_name'];
                        $config1['maintain_ratio']=TRUE;
                        $config1['width']=100;
                        $config1['height']=100;
                        $this->image_lib->initialize($config1);
                        $this->image_lib->resize();
                        $upd_array2=array();
                        $upd_array2['profile_pic']=$suc_upload2['file_name'];
                        $this->common_model->tbl_update(SETTINGS,array('id'=>1),$upd_array2);
                    }
                }
                $this->utilitylib->setMsg(SUCCESS_ICON.'Updated','SUCCESS');
                redirect(base_url('admin/settings'));
            }
        }
        $data['page_title'] = "Site Setting";
        $data['siteSetting'] = $this->common_model->get_data(SETTINGS,array('id'=>1));
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/settings',$data);
    }
}