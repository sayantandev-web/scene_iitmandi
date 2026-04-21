<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publication extends CI_Controller{
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
        $data['publication']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('status'=> 1 ,'is_delete'=>1));
        $data['page_title'] = "Publication Management";
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/publication_list',$data);
    }

    public function add_publication($id=null) {
        if($this->input->post()) {
            @$author_name = $this->input->post('author_name');
            $a_name = "";
            foreach(@$author_name as $name) {
                $a_name .= $name.",";
            }
            $record_id = $this->input->post('pubid');
            $insArr=array();
			$insArr['user_id'] = $_SESSION['uid'];
			$insArr['publication_type']=$this->input->post('publication_type');
			$insArr['author_name']= substr($a_name, 0, -1);
			if ($this->input->post('paper_title') != '') {
				$insArr['paper_title'] = $this->input->post('paper_title');
			} 
			if ($this->input->post('chapter_title') != '') {
				$insArr['paper_title'] = $this->input->post('chapter_title');
			}
			if ($this->input->post('patent_title') != '') {
				$insArr['paper_title'] = $this->input->post('patent_title');
			}
			$insArr['journal_name']=$this->input->post('journal_name');
			$insArr['conference_name']=$this->input->post('conference_name');
			$insArr['book_name']=$this->input->post('book_name');
			$insArr['publish_date']=$this->input->post('publish_date');
			$insArr['patient_number']=$this->input->post('patient_number');
			$insArr['publisher']=$this->input->post('publisher');
			$insArr['location']=$this->input->post('location');
			$insArr['external_Link']=$this->input->post('external_Link');
			$insArr['editors']=$this->input->post('editors');
			$insArr['page_number']=$this->input->post('page_number');
			$insArr['volume_number']=$this->input->post('volume_number');
			$insArr['issue_number']=$this->input->post('issue_number');
			$insArr['highlight']=$this->input->post('highlight');
			$insArr['short_summery']=$this->input->post('short_summery');
			$insArr['key_points']=$this->input->post('key_points');
			$insArr['status']=$this->input->post('status');
            //echo "<pre>"; print_r($this->input->post()); die;
            if($_FILES['attachment']['name'] != '') {
                if(!empty($id)){
                    $data['result']=$this->common_model->get_data_row(PUBLICATION,array('id'=>$id));
                    if(!empty($data['result']['cubrid_field_name(result, field_offset)'])) {
                        unlink('./uploads/publication/'.$data['result']['file_name']);
                        unlink('./uploads/publication/thumb/'.$data['result']['file_name']);
                        $this->common_model->tbl_record_del(PUBLICATION,array('table_id'=>$id));
                    }
                }
                $config1=array();
                $config1['upload_path']='./uploads/publication/';
                $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
                $config1['file_name']=time().$random_number;
                $config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF';
                $config1['overwrite']=TRUE;
                $this->load->library('upload',$config1);
                $this->upload->initialize($config1);
                if(!$this->upload->do_upload('attachment')){
                    $err_upload=$this->upload->display_errors();
                    $this->utilitylib->setMsg($err_upload,'ERROR');
                    print_r($err_upload);die();
                    redirect(base_url('admin/publication/add_publication'));
                } else {
                    $suc_upload2=array();
                    $suc_upload2=$this->upload->data();
                    $config2['image_library']='gd2';
                    $config2['source_image']='uploads/publication/'.$suc_upload2['file_name'];
                    $config2['new_image']='uploads/publication/thumb/'.$suc_upload2['file_name'];
                    $config2['maintain_ratio']=FALSE;
                    $config2['width']=350;
                    $config2['height']=200;
                    $this->image_lib->initialize($config2);
                    $this->image_lib->resize();
                    $insArr['file_name']=$suc_upload2['file_name'];
                }
            }
            //echo "<pre>"; print_r($insArr); die;
            if(!empty($id)) {
                $this->common_model->tbl_update(PUBLICATION,array('id'=>$id),$insArr);
                $this->utilitylib->setMsg(SUCCESS_ICON.' Publication successfully updated','SUCCESS');
                redirect(base_url('admin/publication/'));
            } else {
                $this->common_model->tbl_insert(PUBLICATION,$insArr);
                $this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> News successfully generated','SUCCESS');
                redirect(base_url('admin/publication/'));
            }
        }
        if(!empty($id)) {
            $data['page_title'] = "Edit Publication";
            $data['publication'] = $this->common_model->get_data_row(PUBLICATION,array('id'=>$id));   
        } else {
            $data['page_title'] = "Add Publication";
        }
        $data['ourteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('status'=>1,'is_delete'=>1));
        $data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
        $data['header']=$this->load->view('admin/includes/admin_header','',true);
        $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
        $data['footer']=$this->load->view('admin/includes/admin_footer','',true);
        $data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/add_publication',$data);
    }
    
    public function change_status($id) {
        $news=$this->common_model->get_data(PUBLICATION,array('id'=>$id));
        if($news[0]['status']==1) {
            $status = array('status'=>2);
        } else {
            $status = array('status'=>1);
        }
        $this->common_model->tbl_update(PUBLICATION,array('id'=>$id),$status);
        $this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
        redirect(base_url()."admin/publication");
    }
    
    public function delete($id) {
        $news=$this->common_model->get_data_row(PUBLICATION,array('id'=>$id));
        if($news['is_delete']==1) {
            $status = array('is_delete'=>2);
        } else {
            $status = array('is_delete'=>1);
        }
        $this->common_model->tbl_update(PUBLICATION,array('id'=>$id),$status);
        $this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Publication successfully deleted.','SUCCESS');
        redirect(base_url()."admin/publication/");
    }
}