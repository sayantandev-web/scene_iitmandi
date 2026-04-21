<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//ob_start();
class Page extends CI_Controller{
    public function __construct(){
        @parent::__construct();
        $this->load->library('image_lib');
        //session_start();
        if($this->session->userdata('uid') == ''){
            redirect(base_url().'admin/');
        }
    }
    
    public function index() {
        $data['pages']=$this->common_model->get_data_array(PAGES,'','','','','','',PAGES.".id DESC",array('is_delete'=>1));
        $data['page_title'] = "Page Management";
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/page_list',$data);
    } 
    
    public function add_page($id=null) {
        if($this->input->post()) {
            $insert_array['page_title']=$this->input->post('page_title');
            $insert_array['meta_title'] = $this->input->post('meta_title');
            $insert_array['meta_desc'] = $this->input->post('meta_desc');
            $insert_array['page_description']=$this->input->post('page_description');
            $insert_array['status']=$this->input->post('status');
            if(!empty($id)) {
                //print_r($insert_array);
                $this->common_model->tbl_update(PAGES,array('id'=>$id),$insert_array);
                $this->utilitylib->setMsg(SUCCESS_ICON.' Page successfully updated','SUCCESS');
                redirect(base_url('admin/page/add_page/'.$id));
            } else {
                //print_r($insert_array); die;
                $search  = array('!', '@', '#', '$', '%', '^','&', '*', '(', ')', '-', '+', '=', '|', '~', '`', ',', '.', ';', ':', '"', '{', '}' ,"'",'?',',','>', 'A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o','/');
                $replace = array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ' , ' ', ' ', ' ', ' ', ' ', ' ',' ',' ',' ',' ', 'A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o','-');  	
                $page_title = substr(trim(strtolower($this->input->post('page_title'))),0,150);
                $len=strlen($page_title);
                $resource_slug=str_replace($search, $replace, $page_title);
                $resource_slug=str_replace(' ','-',$resource_slug);
                for($i=0;$i<=$len;$i++) {
                    $resource_slug=str_replace('--','-',$resource_slug);
                    $resource_slug=strtolower($resource_slug);
                }
                $resource_slug_check=$this->common_model->get_data_array(PAGES,array('page_slug'=>$resource_slug));
                $resource_slug=urlencode($resource_slug);
                $insert_array['page_slug']=$resource_slug;
                $this->common_model->tbl_insert(PAGES,$insert_array);
                $this->utilitylib->setMsg(SUCCESS_ICON.' Page successfully saved','SUCCESS');
                redirect(base_url('admin/page/add_page'));
            }
        }
        $data['pages']=$this->common_model->get_data(PAGES,array('id'=>$id));
        if(!empty($id)) {
            $data['page_title'] = "Edit Page";
        } else {
            $data['page_title'] = "Add New Page";
        }
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/add_page',$data);
    }
    
    public function change_status($id) {
        $news_type=$this->common_model->get_data(PAGES,array('id'=>$id));
        if($news_type[0]['status']==1) {
            $status = array('status'=>2);
        } else {
            $status = array('status'=>1);
        }
        $this->common_model->tbl_update(PAGES,array('id'=>$id),$status);
        $this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
        redirect(base_url()."admin/page");
    }	
    
    public function delete($id) {
        $pages=$this->common_model->get_data_row(PAGES,array('id'=>$id));
        if($pages['is_delete']==1) {
            $status = array('is_delete'=>2);
        } else {
            $status = array('is_delete'=>1);
        }
        $this->common_model->tbl_update(PAGES,array('id'=>$id),$status);
        $this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Pages successfully deleted.','SUCCESS');
        redirect(base_url()."admin/page");
    }
    
    public function trash_page_list() {
        $config=array();
        $config['total_rows']=count($this->common_model->get_data_array(PAGES,'','','','','','',PAGES.".id DESC",array('is_delete'=>2)));
        $config['base_url']=base_url('admin/news/index/');
        $config['uri_segment']=4;
        $page=$this->uri->segment(4)?$this->uri->segment(4):1;
        $config['per_page']=$limit=10;
        $page=($page-1)*$limit;
        //$this->pagination->initialize($config);
        //$data['PaginationLink']=$this->pagination->create_links();
        $data['pages']=$this->common_model->get_data_array(PAGES,'','','','','','',PAGES.".id DESC",array('is_delete'=>2));
        $data['page_title'] = "Trashed Category";
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/trash_page_list',$data);
    }
    
    public function restore_trash_page($id) {
        $news=$this->common_model->get_data(PAGES,array('id'=>$id));
        if($news[0]['is_delete']==2) {
            $status = array('is_delete'=>1);
        }
        $this->common_model->tbl_update(PAGES,array('id'=>$id),$status);
        $this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Category successfully restored.','SUCCESS');
        redirect(base_url()."admin/page/trash_page_list");
    }
}