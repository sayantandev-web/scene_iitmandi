<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller{
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
        $sql ="`type` = 'news'";
        $data['status']=$this->input->post('status');
        if($this->input->post()) {
            if($this->input->post('status')) {
                $sql.=" AND `status` = '".$this->input->post('status')."'";
            }
        }
        $data['news']=$this->common_model->get_data_array(STORAGES,'','','','','','',STORAGES.".id DESC",array('is_delete'=>1));
        $data['page_title'] = "News Management";
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/news_list',$data);
    }

    public function add_news($id=null) {
        if($this->input->post()) {
            $insert_array=array();
            $insert_array['title'] = $this->input->post('title');
            $insert_array['type']= "news";
            $insert_array['description']=$this->input->post('description');
            $insert_array['a_link']=$this->input->post('a_link');
            $insert_array['status']=$this->input->post('status');
            if($_FILES['news_image']['name']!='') {
                if(!empty($id)){
                    $data['result']=$this->common_model->get_data_row(STORAGES,array('id'=>$id));
                    if(!empty($data['result']['cubrid_field_name(result, field_offset)'])) {
                        unlink('./uploads/news/'.$data['result']['file_name']);
                        unlink('./uploads/news/thumb/'.$data['result']['file_name']);
                        $this->common_model->tbl_record_del(STORAGES,array('table_id'=>$id));
                    }
                }
                $config1=array();
                $config1['upload_path']='./uploads/news/';
                $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
                $config1['file_name']=time().$random_number;
                $config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF';
                $config1['overwrite']=TRUE;
                $this->load->library('upload',$config1);
                $this->upload->initialize($config1);
                if(!$this->upload->do_upload('news_image')){
                    $err_upload=$this->upload->display_errors();
                    $this->utilitylib->setMsg($err_upload,'ERROR');
                    print_r($err_upload);die();
                    redirect(base_url('admin/news/add_news'));
                } else {
                    $suc_upload2=array();
                    $suc_upload2=$this->upload->data();
                    $config2['image_library']='gd2';
                    $config2['source_image']='uploads/news/'.$suc_upload2['file_name'];
                    $config2['new_image']='uploads/news/thumb/'.$suc_upload2['file_name'];
                    $config2['maintain_ratio']=FALSE;
                    $config2['width']=350;
                    $config2['height']=200;
                    $this->image_lib->initialize($config2);
                    $this->image_lib->resize();
                    $insert_array=array();
                    $insert_array['title'] = $this->input->post('title');
                    $insert_array['type']= "news";
                    $insert_array['description']=$this->input->post('description');
                    $insert_array['status']=$this->input->post('status');
                    $insert_array['file_name']=$suc_upload2['file_name'];
                }
            }
            if(!empty($id)) {
                $this->common_model->tbl_update(STORAGES,array('id'=>$id),$insert_array);
                $this->utilitylib->setMsg(SUCCESS_ICON.' News successfully updated','SUCCESS');
                redirect(base_url('admin/news/'));
            } else {
                $page_title = trim($this->input->post('title'));
                $special_char = array('\'','"',',',';','<','>','!','@','#','$','%','^','&','*','(',')','_','+','=','/','~','`','?','|',' ',':','{','}','[',']','¢','£','¤','¥','¦','§','¨','©','«','¬','®','±','µ','¶','»','.');
                $resource_slug=str_replace($special_char,'-',$page_title);
                $resource_slug=str_replace('--','-',$resource_slug);
                $resource_slug_check=$this->common_model->get_data_array(STORAGES,array('news_slug'=>$resource_slug));
                $insert_array['news_slug']=$resource_slug;
                $id=$this->common_model->tbl_insert(STORAGES,$insert_array);
                $insert_id = $this->db->insert_id();
                $last_insert_data = $this->common_model->get_data_array(STORAGES,array('id' => $insert_id),'','','','','','');
                $this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> News successfully generated','SUCCESS');
                redirect(base_url('admin/news/'));
            }
        }
        if(!empty($id)) {
            $data['page_title'] = "Edit News";
            $data['news']=$this->common_model->get_data_row(STORAGES,array('id'=>$id));   
        } else {
            $data['page_title'] = "Add News";
        }
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/add_news',$data);
    }
    
    public function change_status($id) {
        $news=$this->common_model->get_data(STORAGES,array('id'=>$id));
        if($news[0]['status']==1) {
            $status = array('status'=>2);
        } else {
            $status = array('status'=>1);
        }
        $this->common_model->tbl_update(STORAGES,array('id'=>$id),$status);
        $this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
        redirect(base_url()."admin/news");
    }
    
    public function delete($id) {
        $news=$this->common_model->get_data_row(STORAGES,array('id'=>$id));
        if($news['is_delete']==1) {
            $status = array('is_delete'=>2);
        } else {
            $status = array('is_delete'=>1);
        }
        $this->common_model->tbl_update(STORAGES,array('id'=>$id),$status);
        $this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> News successfully deleted.','SUCCESS');
        redirect(base_url()."admin/news/");
    }
}