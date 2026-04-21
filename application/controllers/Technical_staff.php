<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH."libraries/lib/config_paytm.php");
require_once(APPPATH."libraries/lib/encdec_paytm.php");

class Technical_staff extends CI_Controller {
    public function __construct(){
        @parent::__construct();
        $this->load->library('pagination');
        $this->load->library('image_lib');
        $this->load->helper('cookie');
        date_default_timezone_set('Asia/Calcutta');
        if(!isset($_SESSION)) { 
            session_start(); 
        }
    }

    public function index() { 
        $this->load->library('session');
		if($this->session->userdata('user_id') != ''){
            $this->session->unset_userdata('uid');
            session_unset();
		}
        $data['technical_staff'] = $this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('status'=>1, 'is_delete'=>1, 'position'=>6));
        $data['header']=$this->load->view('includes/header','',true);
        $data['footer']=$this->load->view('includes/footer','',true);
        $data['title']='Technical Staff List';
        $this->load->view('technical_staff_list',$data);
    }

    public function technical_staff_details($id='') { 
        //echo base64_decode($id); die;
        $data['about_me']=$data['result']=$this->common_model->get_data(TEAM,array('id'=>base64_decode($id)));
        $data['education']=$this->common_model->get_data_array(EDUCATION,array('user_id'=>base64_decode($id),' status'=>1, 'is_delete'=>1));
        $data['experience']=$this->common_model->get_data_array(EXPERIENCE,array('user_id'=>base64_decode($id), 'status'=>1, 'is_delete'=>1));
        $data['journal']=$this->common_model->get_data_array(PUBLICATION,array('user_id'=>base64_decode($id), 'publication_type'=>'Journal Article', 'status'=>1, 'is_delete'=>1));
        $data['conference']=$this->common_model->get_data_array(PUBLICATION,array('user_id'=>base64_decode($id), 'publication_type'=>'Conference Paper', 'status'=>1, 'is_delete'=>1));
        $data['book_chapter']=$this->common_model->get_data_array(PUBLICATION,array('user_id'=>base64_decode($id), 'publication_type'=>'Book Chapter', 'status'=>1, 'is_delete'=>1));
        $data['book']=$this->common_model->get_data_array(PUBLICATION,array('user_id'=>base64_decode($id), 'publication_type'=>'Book', 'status'=>1, 'is_delete'=>1));
        $data['patent']=$this->common_model->get_data_array(PUBLICATION,array('user_id'=>base64_decode($id), 'publication_type'=>'Patent', 'status'=>1, 'is_delete'=>1));

        //$data['faculty_details']=$this->common_model->get_data_row(TEAM,array('id'=>base64_decode($id)));
        //$data['faculty_details']=$this->common_model->get_data_row(TEAM,array('id'=>base64_decode($id)));
        $data['header']=$this->load->view('includes/header','',true);
        $data['footer']=$this->load->view('includes/footer','',true);
        $data['title']='Technical Staff Detais';
        $this->load->view('technical_staff_details',$data);
    }
}