<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH."libraries/lib/config_paytm.php");
require_once(APPPATH."libraries/lib/encdec_paytm.php");

class Students extends CI_Controller {
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
        $data['students'] = $this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('status'=>1, 'is_delete'=>1, 'position'=>5));
        $data['designation'] = $this->common_model->get_data_array(DESIGNATION,'','','','','','',DESIGNATION.".id DESC",array('status'=>1, 'is_delete'=>1, 'user_type'=>5));
        $data['header']=$this->load->view('includes/header','',true);
        $data['footer']=$this->load->view('includes/footer','',true);
        $data['title']='Student List';
        $this->load->view('student_list',$data);
    }

    public function student_details($id='') { 
        $id = base64_decode($id);
        $data['about_me']=$data['result']=$this->common_model->get_data(TEAM,array('id'=>$id));
        $data['education']=$this->common_model->get_data_array(EDUCATION,array('user_id'=>$id,' status'=>1, 'is_delete'=>1));
        $data['experience']=$this->common_model->get_data_array(EXPERIENCE,array('user_id'=>$id, 'status'=>1, 'is_delete'=>1));
        $data['journal']=$this->db->query("SELECT * FROM `iitmandi_publication` WHERE ((`user_id` = $id AND instr(concat(',', author_name, ','), ',$id,')) OR `user_id` = $id OR instr(concat(',', author_name, ','), ',$id,')) AND `publication_type` = 'Journal Article' AND `status` = 1 AND `is_delete` = 1");
        $data['conference']=$this->db->query("SELECT * FROM `iitmandi_publication` WHERE ((`user_id` = $id AND instr(concat(',', author_name, ','), ',$id,')) OR `user_id` = $id OR instr(concat(',', author_name, ','), ',$id,')) AND `publication_type` = 'Conference Paper' AND `status` = 1 AND `is_delete` = 1");
        $data['bookc']=$this->db->query("SELECT * FROM `iitmandi_publication` WHERE ((`user_id` = $id AND instr(concat(',', author_name, ','), ',$id,')) OR `user_id` = $id OR instr(concat(',', author_name, ','), ',$id,')) AND `publication_type` = 'Book Chapter' AND `status` = 1 AND `is_delete` = 1");
        $data['book']=$this->db->query("SELECT * FROM `iitmandi_publication` WHERE ((`user_id` = $id AND instr(concat(',', author_name, ','), ',$id,')) OR `user_id` = $id OR instr(concat(',', author_name, ','), ',$id,')) AND `publication_type` = 'Book' AND `status` = 1 AND `is_delete` = 1");
        $data['patent']=$this->db->query("SELECT * FROM `iitmandi_publication` WHERE ((`user_id` = $id AND instr(concat(',', author_name, ','), ',$id,')) OR `user_id` = $id OR instr(concat(',', author_name, ','), ',$id,')) AND `publication_type` = 'Patent' AND `status` = 1 AND `is_delete` = 1");
        $data['award']=$this->common_model->get_data_array(AWARDEVENT,'','','','','','',AWARDEVENT.".id DESC",array('user_id'=>$id,'type'=> 'Award','status'=>1,'is_delete'=>1));
        $data['ourteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('status'=>1,'is_delete'=>1));
        $data['header']=$this->load->view('includes/header','',true);
        $data['footer']=$this->load->view('includes/footer','',true);
        $data['title']='Student Details';
        $this->load->view('student_details',$data);
    }
}