<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH."libraries/lib/config_paytm.php");
require_once(APPPATH."libraries/lib/encdec_paytm.php");

class Postdocs extends CI_Controller {
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
        $data['postdocs'] = $this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('status'=>1, 'is_delete'=>1, 'position'=>2));
        $data['designation'] = $this->common_model->get_data_array(DESIGNATION,'','','','','','',DESIGNATION.".id DESC",array('status'=>1, 'is_delete'=>1, 'user_type'=>2));
        $data['header']=$this->load->view('includes/header','',true);
        $data['footer']=$this->load->view('includes/footer','',true);
        $data['title']='Postdocs List';
        $this->load->view('postdocs_list',$data);
    }

    public function postdocs_details($id='') { 
        $data['about_me']=$data['result']=$this->common_model->get_data(TEAM,array('id'=>base64_decode($id)));
        $data['education']=$this->common_model->get_data_array(EDUCATION,array('user_id'=>base64_decode($id),' status'=>1, 'is_delete'=>1));
        $data['experience']=$this->common_model->get_data_array(EXPERIENCE,array('user_id'=>base64_decode($id), 'status'=>1, 'is_delete'=>1));
        $data['journal']=$this->common_model->get_data_array(PUBLICATION,array('user_id'=>base64_decode($id), 'publication_type'=>'Journal Article', 'status'=>1, 'is_delete'=>1));
        $data['conference']=$this->common_model->get_data_array(PUBLICATION,array('user_id'=>base64_decode($id), 'publication_type'=>'Conference Paper', 'status'=>1, 'is_delete'=>1));
        $data['book_chapter']=$this->common_model->get_data_array(PUBLICATION,array('user_id'=>base64_decode($id), 'publication_type'=>'Book Chapter', 'status'=>1, 'is_delete'=>1));
        $data['book']=$this->common_model->get_data_array(PUBLICATION,array('user_id'=>base64_decode($id), 'publication_type'=>'Book', 'status'=>1, 'is_delete'=>1));
        $data['patent']=$this->common_model->get_data_array(PUBLICATION,array('user_id'=>base64_decode($id), 'publication_type'=>'Patent', 'status'=>1, 'is_delete'=>1));
        $data['award']=$this->common_model->get_data_array(AWARDEVENT,array('user_id'=>base64_decode($id), 'type'=> 'Award', 'status'=>1, 'is_delete'=>1));
        $data['event']=$this->common_model->get_data_array(AWARDEVENT,array('user_id'=>base64_decode($id), 'type'=> 'Event', 'status'=>1, 'is_delete'=>1));
        $data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('project_incharge'=>base64_decode($id),'is_delete'=>1));
        $data['lab_member']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>base64_decode($id),'is_delete'=>1));
        $data['copening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>base64_decode($id),'is_delete'=>1));
        $data['header']=$this->load->view('includes/header','',true);
        $data['footer']=$this->load->view('includes/footer','',true);
        $data['title']='Postdocs Detais';
        $this->load->view('postdoctr/dashboard',$data);
    }

    public function get_filter_data() {
        $fd_id = $this->input->post('fd_id');
        $get_data = $this->db->query("SELECT iitmandi_team.id, iitmandi_team.fname,iitmandi_team.mname,iitmandi_team.lname,iitmandi_team.email,iitmandi_team.mobile,iitmandi_designation.designation,iitmandi_team.specialization,iitmandi_team.research_keyword,iitmandi_team.team_image from iitmandi_team JOIN iitmandi_designation ON iitmandi_team.designation = iitmandi_designation.id WHERE iitmandi_team.designation = $fd_id and iitmandi_team.status = 1 and iitmandi_team.is_delete = 1 and iitmandi_designation.status = 1 and iitmandi_designation.is_delete = 1");

        if(!empty($get_data->result_array())) {
            $html='';
            if(!empty($get_data->result_array())) {
                foreach($get_data->result_array() as $row){
                    $html .='<div class="col-sm-6 col-xl-2 col-lg-2 col-md-6 col-12">';
                    $html .='<div class="box_sec"><a href="'.base_url().'pages/postdocs_details/'.base64_encode($row['id']).'">';
                    $html .='<img src="'.base_url().'uploads/our_team/'.$row['team_image'].'" alt=""></a><div class="box_dwn"><h6><a href="'.base_url().'pages/postdocs_details/'.base64_encode($row['id']).'" style="text-decoration: none;">'.$row['fname'].' '.$row['mname'].' '.$row['lname'].'</a></h6><small>'.$row['designation'].'</small><div class="box_dwn_inn"><p>'.$row['research_keyword'].'</p></div><div class="social_sec"><a href="'.$row['email'].'"><i class="fa-regular fa-envelope"></i></a><a href="'.$row['mobile'].'"><i class="fa fa-phone" aria-hidden="true"></i></a></div></div></div></div>';
                }
            }
        } else {
            $html='<p style="text-align: center;">No Data Found related to filter options you have selected.</p>';  
        }
        echo $html;
    }

    public function filterByspetialization() {
        $fs_id = $this->input->post('fs_id');
        $get_data = $this->db->query("SELECT iitmandi_team.id, iitmandi_team.fname,iitmandi_team.mname,iitmandi_team.lname,iitmandi_team.email,iitmandi_team.mobile,iitmandi_designation.designation,iitmandi_team.specialization,iitmandi_team.research_keyword,iitmandi_team.team_image from iitmandi_team JOIN iitmandi_designation ON iitmandi_team.designation = iitmandi_designation.id WHERE iitmandi_team.position = 1 AND iitmandi_team.specialization = $fs_id and iitmandi_team.status = 1 and iitmandi_team.is_delete = 1");

        if(!empty($get_data->result_array())) {
            $html='';
            if(!empty($get_data->result_array())) {
                foreach($get_data->result_array() as $row){
                    $html .='<div class="col-sm-6 col-xl-2 col-lg-2 col-md-6 col-12">';
                    $html .='<div class="box_sec"><a href="'.base_url().'pages/postdocs_details/'.base64_encode($row['id']).'">';
                    $html .='<img src="'.base_url().'uploads/our_team/'.$row['team_image'].'" alt=""></a><div class="box_dwn"><h6><a href="'.base_url().'pages/postdocs_details/'.base64_encode($row['id']).'" style="text-decoration: none;">'.$row['fname'].' '.$row['mname'].' '.$row['lname'].'</a></h6><small>'.$row['designation'].'</small><div class="box_dwn_inn"><p>'.$row['research_keyword'].'</p></div><div class="social_sec"><a href="'.$row['email'].'"><i class="fa-regular fa-envelope"></i></a><a href="'.$row['mobile'].'"><i class="fa fa-phone" aria-hidden="true"></i></a></div></div></div></div>';
                }
            }
        } else {
            $html='<p style="text-align: center;">No Data Found related to filter options you have selected.</p>';  
        }
        echo $html;
    }
}