<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homeabout extends CI_Controller{
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
        $data['page_title'] = "Home About";
        $data['result']=$this->common_model->get_data(HOMEABOUT,array('id'=>1));
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/home_about',$data);
    }

    public function home_about() {
        $home_about = $this->common_model->get_data(HOMEABOUT,'');
        if(empty($home_about)){
            if($this->input->post()) {
                $updtarr=array();
                $updtarr['description']=nl2br($this->input->post('description'));
                if($_FILES['homeabt_img']['size']!='') {
                    $config1=array();
                    $config1['upload_path']='./uploads/homeabout/thumb';
                    $config1['upload_path']='./uploads/homeabout/';
                    $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
                    $config1['file_name']=time().$random_number;
                    $config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF';
                    $config1['overwrite']=TRUE;
                    $this->load->library('upload',$config1);
                    $this->upload->initialize($config1);
                    if(!$this->upload->do_upload('homeabt_img')){
                        $err_upload=$this->upload->display_errors();
                        $this->utilitylib->setMsg($err_upload,'ERROR');
                        print_r($err_upload);
                        redirect(base_url('admin/homeabout'));
                    } else{
                        $suc_upload2=array();
                        $suc_upload2=$this->upload->data();
                        $config1['image_library']='gd2';
                        $config1['source_image']='uploads/homeabout/'.$suc_upload2['file_name'];
                        $config1['new_image']='uploads/homeabout/thumb/'.$suc_upload2['file_name'];
                        $config1['maintain_ratio']=TRUE;
                        $config1['width']=100;
                        $config1['height']=100;
                        $this->image_lib->initialize($config1);
                        $this->image_lib->resize();
                        //$upd_array2=array();
                        $updtarr['homeabt_img']=$suc_upload2['file_name'];
                        $this->common_model->tbl_insert(HOMEABOUT,$updtarr);
                    }
                }
                $this->utilitylib->setMsg(SUCCESS_ICON.'Saved','SUCCESS');
                redirect(base_url('admin/homeabout'));
            }
        } else{
            $data['result']=$this->common_model->get_data(HOMEABOUT,array('id'=>1));
            if($this->input->post()) {
                $updtarr=array();
                $updtarr['description']=nl2br($this->input->post('description'));
                $this->common_model->tbl_update(HOMEABOUT,array('id'=>1),$updtarr);
                if($_FILES['homeabt_img']['size']!='') {
                    $data['result']=$this->common_model->get_data(HOMEABOUT,array('id'=>1));
                    if(@$data['result'][0]['homeabt_img']) {
                        unlink('./uploads/homeabout/'.$data['result'][0]['homeabt_img']);
                        unlink('./uploads/homeabout/thumb/'.$data['result'][0]['homeabt_img']);
                    }
                    $config1=array();
                    $config1['upload_path']='./uploads/homeabout/';
                    $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
                    $config1['file_name']=time().$random_number;
                    $config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF';
                    $config1['overwrite']=TRUE;
                    $this->load->library('upload',$config1);
                    $this->upload->initialize($config1);
                    if(!$this->upload->do_upload('homeabt_img')){
                            $err_upload=$this->upload->display_errors();
                            $this->utilitylib->setMsg($err_upload,'ERROR');
                            print_r($err_upload);die();
                            redirect(base_url('admin/homeabout'));
                    } else {
                        $suc_upload2=array();
                        $suc_upload2=$this->upload->data();
                        $config1['image_library']='gd2';
                        $config1['source_image']='uploads/homeabout/'.$suc_upload2['file_name'];
                        $config1['new_image']='uploads/homeabout/thumb/'.$suc_upload2['file_name'];
                        $config1['maintain_ratio']=TRUE;
                        $config1['width']=100;
                        $config1['height']=100;
                        $this->image_lib->initialize($config1);
                        $this->image_lib->resize();
                        $upd_array2=array();
                        $upd_array2['homeabt_img']=$suc_upload2['file_name'];
                        $this->common_model->tbl_update(HOMEABOUT,array('id'=>1),$upd_array2);
                    }
                }
                $this->utilitylib->setMsg(SUCCESS_ICON.'Updated','SUCCESS');
                redirect(base_url('admin/homeabout'));
            }
        }
        $data['page_title'] = "Home About";
        $data['home_about'] = $this->common_model->get_data(HOMEABOUT,array('id'=>1));
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/home_about',$data);
    }
}