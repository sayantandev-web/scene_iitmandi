<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH."libraries/lib/config_paytm.php");
require_once(APPPATH."libraries/lib/encdec_paytm.php");

class Postdoctr extends CI_Controller {
    public function __construct() {
        @parent::__construct();
        $this->load->library('pagination');
        $this->load->library('image_lib');
        $this->load->helper('cookie');
        $this->load->library('email');
		$this->load->library('session');
        date_default_timezone_set('Asia/Calcutta');
        if(!isset($_SESSION)) { 
            session_start(); 
        }
    }

    public function index() {
		$data['page_title'] = "Postdoc Login";
		$data['header']=$this->load->view('includes/header','',true);
        $data['footer']=$this->load->view('includes/footer','',true);
		$this->load->view('postdoctr/home',$data);
	}

    public function login() {
		$this->load->library('session');
		if($this->session->userdata('user_id') != ''){
            redirect(base_url('postdoctr/dashboard/'.$this->session->userdata('user_id')));
		}
		if($this->input->post()) {
			$sql="`email` ='".$this->input->post('email')."' AND `position` IN (3) AND (`status`= 1) AND (`is_delete`= 1)";
			$result=$this->common_model->get_data(TEAM,$sql);
			if(base64_encode($this->input->post('password')) == $result[0]['password']) {
				if($result[0]['position'] == 2) {
					$this->session->set_userdata('position','Postdoc');
				}
				$this->session->set_userdata('user_id',$result[0]['id']);
				$id = $this->session->userdata('user_id');
				if($result[0]['update_pass'] == 2) {
					redirect(base_url()."postdoctr/dashboard/".$id);
				} else {
					redirect(base_url()."postdoctr/reset_password/".$id);
				}
			} else {
				$this->utilitylib->setMsg('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Wrong email or password!','ERROR');
				redirect(base_url()."postdoctr/");
			}
		}
		$data['page_title'] = "Login";
		$data['header']=$this->load->view('includes/header','',true);
        $data['footer']=$this->load->view('includes/footer','',true);
		$this->load->view('postdoctr/reset_password',$data);
    }

    public function dashboard($id='') {
		$this->load->library('session');
		if($id != ''){
			$data['page_title'] = "Dashboard";
			$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['award']=$this->common_model->get_data_array(AWARDEVENT,'','','','','','',AWARDEVENT.".id DESC",array('user_id'=>$id,'type'=> 'Award','status'=>1,'is_delete'=>1));
			$data['event']=$this->common_model->get_data_array(AWARDEVENT,'','','','','','',AWARDEVENT.".id DESC",array('user_id'=>$id,'type'=> 'Event','status'=>1,'is_delete'=>1));
			$data['publications']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('project_incharge'=>$id,'is_delete'=>1));
			$data['lab_member']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'status'=>1,'is_delete'=>1));
			$data['copening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('postdoctr/dashboard',$data);
		} else {
			$data['page_title'] = "Dashboard";
			$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['award']=$this->common_model->get_data_array(AWARDEVENT,'','','','','','',AWARDEVENT.".id DESC",array('user_id'=>$id,'type'=> 'Award','status'=>1,'is_delete'=>1));
			$data['event']=$this->common_model->get_data_array(AWARDEVENT,'','','','','','',AWARDEVENT.".id DESC",array('user_id'=>$id,'type'=> 'Event','status'=>1,'is_delete'=>1));
			$data['publications']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('project_incharge'=>$id,'is_delete'=>1));
			$data['lab_member']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'status'=>1,'is_delete'=>1));
			$data['copening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('postdoctr/dashboard',$data);
		}
    }

	public function research($id='') {
		if($id != ''){
			$data['page_title'] = "Research";
			$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['publications']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('project_incharge'=>$id,'is_delete'=>1));
			$data['lab_member']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'status'=>1,'is_delete'=>1));
			$data['copening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('postdoctr/research',$data);
		} else {
			$data['page_title'] = "Research";
			$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['publications']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('project_incharge'=>$id,'is_delete'=>1));
			$data['lab_member']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'status'=>1,'is_delete'=>1));
			$data['copening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('postdoctr/research',$data);
			//redirect(base_url()."postdoctr/");
		}
    }

	public function publication($id='') {
		if($this->session->userdata('user_id') != '') {
			$data['page_title'] = "Publication";
			$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			//$data['publications']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['journal']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('publication_type'=>'Journal Article', 'status'=>1,'is_delete'=>1));
			$data['conference']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('publication_type'=>'Conference Paper', 'status'=>1,'is_delete'=>1));
			$data['bookc']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('publication_type'=>'Book Chapter', 'status'=>1,'is_delete'=>1));
			$data['book']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('publication_type'=>'Book', 'status'=>1,'is_delete'=>1));
			$data['patent']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('publication_type'=>'Patent', 'status'=>1,'is_delete'=>1));
			$data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('project_incharge'=>$id,'is_delete'=>1));
			$data['lab_member']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'status'=>1,'is_delete'=>1));
			$data['copening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['ourteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('postdoctr/publication',$data);
		} else {
			$data['page_title'] = "Publication";
			$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			//$data['publications']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['journal']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('publication_type'=>'Journal Article', 'status'=>1,'is_delete'=>1));
			$data['conference']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('publication_type'=>'Conference Paper', 'status'=>1,'is_delete'=>1));
			$data['bookc']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('publication_type'=>'Book Chapter', 'status'=>1,'is_delete'=>1));
			$data['book']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('publication_type'=>'Book', 'status'=>1,'is_delete'=>1));
			$data['patent']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('publication_type'=>'Patent', 'status'=>1,'is_delete'=>1));
			$data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('project_incharge'=>$id,'is_delete'=>1));
			$data['lab_member']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'status'=>1,'is_delete'=>1));
			$data['copening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['ourteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('postdoctr/publication',$data);
			//redirect(base_url()."postdoctr/");
		}
    }

	public function projects($id='') {
		if($this->session->userdata('user_id') != ''){
			$data['page_title'] = "Projects";
			$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['publications']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('project_incharge'=>$id,'is_delete'=>1));
			$data['lab_member']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'status'=>1,'is_delete'=>1));
			$data['copening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('postdoctr/projects',$data);
		} else {
			$data['page_title'] = "Projects";
			$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['publications']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('project_incharge'=>$id,'is_delete'=>1));
			$data['lab_member']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'status'=>1,'is_delete'=>1));
			$data['copening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('postdoctr/projects',$data);
			//redirect(base_url()."postdoctr/");
		}
    }

	public function lab_members($id='') {
		if($this->session->userdata('user_id') != ''){
			$data['page_title'] = "Lab Members";
			$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['phdteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'position'=>3,'designation'=>4,'status'=>1,'is_delete'=>1));
			$data['mtechrteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'position'=>4,'designation'=>5,'status'=>1,'is_delete'=>1));
			$data['mtechteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'degree'=>7,'status'=>1,'is_delete'=>1));
			$data['btechteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('degree'=>6,'status'=>1,'is_delete'=>1));
			$data['publications']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('project_incharge'=>$id,'is_delete'=>1));
			$data['copening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['lab_member']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('postdoctr/lab_members',$data);
		} else {
			$data['page_title'] = "Lab Members";
			$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['phdteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'position'=>3,'designation'=>4,'status'=>1,'is_delete'=>1));
			$data['mtechrteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'position'=>3,'designation'=>5,'status'=>1,'is_delete'=>1));
			$data['mtechteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'degree'=>7,'status'=>1,'is_delete'=>1));
			$data['btechteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('degree'=>6,'status'=>1,'is_delete'=>1));
			$data['publications']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('project_incharge'=>$id,'is_delete'=>1));
			$data['lab_member']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'status'=>1,'is_delete'=>1));
			$data['copening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('postdoctr/lab_members',$data);
			//redirect(base_url()."postdoctr/");
		}
    }

	public function current_opening($id='') {
		if($this->session->userdata('user_id') != ''){
			$data['page_title'] = "Current Opening";
			$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['copening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['scholeropening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'position'=>1,'status'=>1,'is_delete'=>1));
			$data['mtechropening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'position'=>2,'status'=>1,'is_delete'=>1));
			$data['pstuffopening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'position'=>3,'status'=>1,'is_delete'=>1));
			$data['publications']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('project_incharge'=>$id,'is_delete'=>1));
			$data['lab_member']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('postdoctr/current_opening',$data);
		} else {
			$data['page_title'] = "Current Opening";
			$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['copening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['scholeropening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'position'=>1,'status'=>1,'is_delete'=>1));
			$data['mtechropening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'position'=>2,'status'=>1,'is_delete'=>1));
			$data['pstuffopening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'position'=>3,'status'=>1,'is_delete'=>1));
			$data['publications']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('project_incharge'=>$id,'is_delete'=>1));
			$data['lab_member']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('postdoctr/current_opening',$data);
			//redirect(base_url()."postdoctr/");
		}
    }

	public function miscellaneous($id='') {
		if($this->session->userdata('user_id') != ''){
			$data['page_title'] = "Miscellaneous";
			$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['copening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			// $data['scholeropening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'position'=>1,'status'=>1,'is_delete'=>1));
			// $data['mtechropening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'position'=>2,'status'=>1,'is_delete'=>1));
			// $data['pstuffopening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'position'=>3,'status'=>1,'is_delete'=>1));
			$data['publications']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('project_incharge'=>$id,'is_delete'=>1));
			$data['lab_member']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('postdoctr/miscellaneous',$data);
		} else {
			$data['page_title'] = "Miscellaneous";
			$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['copening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			// $data['scholeropening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'position'=>1,'status'=>1,'is_delete'=>1));
			// $data['mtechropening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'position'=>2,'status'=>1,'is_delete'=>1));
			// $data['pstuffopening']=$this->common_model->get_data_array(CRNTOPENING,'','','','','','',CRNTOPENING.".id DESC",array('user_id'=>$id,'position'=>3,'status'=>1,'is_delete'=>1));
			$data['publications']=$this->common_model->get_data_array(PUBLICATION,'','','','','','',PUBLICATION.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['project']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('project_incharge'=>$id,'is_delete'=>1));
			$data['lab_member']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('supervisor'=>$id,'status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('postdoctr/miscellaneous',$data);
			//redirect(base_url()."postdoctr/");
		}
    }

	public function save_aboutme() {
		//print_r($this->input->post()); die();
		if($this->input->post()) {
			$insArr=array();
			$insArr['aboutme']=$this->input->post('aboutme');
			$insArr['research_gate']=$this->input->post('research_gate');
			$insArr['google_scholar']=$this->input->post('google_scholar');
			$insArr['linedin_link']=$this->input->post('linedin_link');
			$insArr['twitter_link']=$this->input->post('twitter_link');
			$insArr['github_link']=$this->input->post('github_link');
			$insArr['medium_link']=$this->input->post('medium_link');
			$id = $this->input->post('uid');
			if(!empty($id)){
				$this->common_model->tbl_update(TEAM,array('id'=>$id),$insArr);
			}
			if($_FILES['team_image']['name'] != '') {
				$this->common_model->get_data(TEAM,array('id'=>$id));
				if(@$data['result'][0]['team_image']) {	
					unlink('./uploads/our_team/'.$data['result'][0]['team_image']);	
					unlink('./uploads/our_team/thumb/'.$data['result'][0]['team_image']);	
				}
				$config1=array();
				$config1['upload_path']='./uploads/our_team/thumb';
				$config1['upload_path']='./uploads/our_team/';
				$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
				$config1['file_name']=time().$random_number;
				$config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|mp4|MPEG-4';
				/*$config1['max_width'] = '2000';
				$config1['max_height'] = '1125';*/
				$config1['overwrite']=TRUE;
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if(!$this->upload->do_upload('team_image')){
					$err_upload=$this->upload->display_errors();
					$this->utilitylib->setMsg($err_upload,'ERROR');
					print_r($err_upload);
					redirect(base_url('admin/ourteam/add_team'));
				} else {
					$suc_upload2=array();
					$suc_upload2=$this->upload->data();
					$config1['image_library']='gd2';
					$config1['source_image']='uploads/our_team/'.$suc_upload2['file_name'];
					$config1['new_image']='uploads/our_team/thumb/'.$suc_upload2['file_name'];
					$config1['maintain_ratio']=TRUE;
					$config1['width']=150;
					$config1['height']=97;
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$insArr['team_image']=$suc_upload2['file_name'];
					if(!empty($id)) {
						$this->common_model->tbl_update(TEAM,array('id'=>$id),$insArr);
						$banner_id=$id;
					} else {
						$banner_id=$this->common_model->tbl_insert(TEAM,$insArr);
					}
					$this->common_model->tbl_update(TEAM,array('id'=>$banner_id),$insArr);
				}
			}
			if(!empty($id)) {
				echo "Sucessfully Updated";
			} else {
				echo "Something went wrong. Please try again later!";
			}
		}
	}

	public function save_research() {
		//print_r($this->input->post()); die();
		if($this->input->post()) {
			$insArr=array();
			$insArr['research_interest']=$this->input->post('research');
			$id = $this->input->post('uid');
			if(!empty($id)){
				$this->common_model->tbl_update(TEAM,array('id'=>$id),$insArr);
			}
			if($_FILES['team_image']['name'] != '') {
				$this->common_model->get_data(TEAM,array('id'=>$id));
				if(@$data['result'][0]['team_image']) {	
					unlink('./uploads/our_team/'.$data['result'][0]['team_image']);	
					unlink('./uploads/our_team/thumb/'.$data['result'][0]['team_image']);	
				}
				$config1=array();
				$config1['upload_path']='./uploads/our_team/thumb';
				$config1['upload_path']='./uploads/our_team/';
				$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
				$config1['file_name']=time().$random_number;
				$config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|mp4|MPEG-4';
				/*$config1['max_width'] = '2000';
				$config1['max_height'] = '1125';*/
				$config1['overwrite']=TRUE;
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if(!$this->upload->do_upload('team_image')){
					$err_upload=$this->upload->display_errors();
					$this->utilitylib->setMsg($err_upload,'ERROR');
					print_r($err_upload);
					redirect(base_url('admin/ourteam/add_team'));
				} else {
					$suc_upload2=array();
					$suc_upload2=$this->upload->data();
					$config1['image_library']='gd2';
					$config1['source_image']='uploads/our_team/'.$suc_upload2['file_name'];
					$config1['new_image']='uploads/our_team/thumb/'.$suc_upload2['file_name'];
					$config1['maintain_ratio']=TRUE;
					$config1['width']=150;
					$config1['height']=97;
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$insArr['team_image']=$suc_upload2['file_name'];
					if(!empty($id)) {
						$this->common_model->tbl_update(TEAM,array('id'=>$id),$insArr);
						$banner_id=$id;
					} else {
						$banner_id=$this->common_model->tbl_insert(TEAM,$insArr);
					}
					$this->common_model->tbl_update(TEAM,array('id'=>$banner_id),$insArr);
				}
			}
			if(!empty($id)) {
				echo "Sucessfully Updated";
			} else {
				echo "Something went wrong. Please try again later!";
			}
		}
	}

	public function save_educate() {
		$record_id = $this->input->post('acaid');
		if($record_id != '') {
			$insArr=array();
			$insArr['user_id'] = $this->input->post('uid');
			$insArr['degree']=$this->input->post('degree');
			$insArr['university']=$this->input->post('university');
			$insArr['year']=$this->input->post('year');
			$insArr['status']=$this->input->post('status');
			$this->common_model->tbl_update(EDUCATION,array('id'=>$record_id),$insArr);
			echo "Sucessfully Updated";
		} else {
			$insArr=array();
			$insArr['user_id'] = $this->input->post('uid');
			$insArr['degree']=$this->input->post('degree');
			$insArr['university']=$this->input->post('university');
			$insArr['year']=$this->input->post('year');
			$insArr['status']=$this->input->post('status');
			$banner_record_id=$this->common_model->tbl_insert(EDUCATION,$insArr);
			echo "Sucessfully Added";
		}
	}

	public function edit_educate() {
		$id = $this->input->post('id');
		$edication=$this->common_model->get_data_row(EDUCATION,array('id'=>$id));
		echo json_encode($edication);
	}

	public function dlt_educate() {
		$id = $this->input->post('id');
		$edication=$this->common_model->get_data(EDUCATION,array('id'=>$id));
		if($edication[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(EDUCATION,array('id'=>$id),$status);
	}

	public function save_experience() {
		$record_id = $this->input->post('expid');
		if($record_id != '') {
			$insArr=array();
			$insArr['user_id'] = $this->input->post('uid');
			$insArr['organization']=$this->input->post('organization');
			$insArr['position']=$this->input->post('position');
			$insArr['year']=$this->input->post('exp_year');
			$insArr['status']=$this->input->post('status');
			$this->common_model->tbl_update(EXPERIENCE,array('id'=>$record_id),$insArr);
			echo "Sucessfully Updated";
		} else {
			$insArr=array();
			$insArr['user_id'] = $this->input->post('uid');
			$insArr['organization']=$this->input->post('organization');
			$insArr['position']=$this->input->post('position');
			$insArr['year']=$this->input->post('exp_year');
			$insArr['status']=$this->input->post('status');
			$banner_record_id=$this->common_model->tbl_insert(EXPERIENCE,$insArr);
			echo "Sucessfully Added";
		}
	}

	public function edit_experience() {
		$id = $this->input->post('id');
		$experience=$this->common_model->get_data_row(EXPERIENCE,array('id'=>$id));
		echo json_encode($experience);
	}

	public function dlt_experience() {
		$id = $this->input->post('id');
		$experience=$this->common_model->get_data(EXPERIENCE,array('id'=>$id));
		if($experience[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(EXPERIENCE,array('id'=>$id),$status);
	}

	public function save_award() {
		$record_id = $this->input->post('awdid');
		if($record_id != '') {
			$insArr=array();
			$insArr['user_id'] = $this->input->post('uid');
			$insArr['name']=$this->input->post('title');
			$insArr['year']=$this->input->post('awrd_year');
			$insArr['type'] = "Award";
			$insArr['status']=$this->input->post('status');
			$this->common_model->tbl_update(AWARDEVENT,array('id'=>$record_id),$insArr);
			echo "Sucessfully Updated";
		} else {
			$insArr=array();
			$insArr['user_id'] = $this->input->post('uid');
			$insArr['name']=$this->input->post('title');
			$insArr['year']=$this->input->post('awrd_year');
			$insArr['type'] = "Award";
			$insArr['status']=$this->input->post('status');
			$banner_record_id=$this->common_model->tbl_insert(AWARDEVENT,$insArr);
			echo "Sucessfully Added";
		}
	}

	public function edit_award() {
		$id = $this->input->post('id');
		$award=$this->common_model->get_data_row(AWARDEVENT,array('id'=>$id));
		echo json_encode($award);
	}

	public function dlt_award() {
		$id = $this->input->post('id');
		$award=$this->common_model->get_data(AWARDEVENT,array('id'=>$id));
		if($award[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(AWARDEVENT,array('id'=>$id),$status);
	}

	public function save_event() {
		$record_id = $this->input->post('evntid');
		if($record_id != '') {
			$insArr=array();
			$insArr['user_id'] = $this->input->post('uid');
			$insArr['name']=$this->input->post('event_title');
			$insArr['location']=$this->input->post('event_location');
			$insArr['year']=$this->input->post('event_year');
			$insArr['type'] = "Event";
			$insArr['status']=$this->input->post('event_status');
			$this->common_model->tbl_update(AWARDEVENT,array('id'=>$record_id),$insArr);
			echo "Sucessfully Updated";
		} else {
			$insArr=array();
			$insArr['user_id'] = $this->input->post('uid');
			$insArr['name']=$this->input->post('event_title');
			$insArr['location']=$this->input->post('event_location');
			$insArr['year']=$this->input->post('event_year');
			$insArr['type'] = "Event";
			$insArr['status']=$this->input->post('event_status');
			$banner_record_id=$this->common_model->tbl_insert(AWARDEVENT,$insArr);
			echo "Sucessfully Added";
		}
	}

	public function edit_event() {
		$id = $this->input->post('id');
		$award=$this->common_model->get_data_row(AWARDEVENT,array('id'=>$id));
		echo json_encode($award);
	}

	public function dlt_event() {
		$id = $this->input->post('id');
		$award=$this->common_model->get_data(AWARDEVENT,array('id'=>$id));
		if($award[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(AWARDEVENT,array('id'=>$id),$status);
	}

	public function save_currentopening() {
		$record_id = $this->input->post('copeningid');
		if($record_id != '') {
			$insArr=array();
			$insArr['user_id'] = $this->input->post('uid');
			//$insArr['position']=$this->input->post('position');
			$insArr['description']=$this->input->post('codescription');
			$insArr['status']=$this->input->post('status');
			$this->common_model->tbl_update(CRNTOPENING,array('id'=>$record_id),$insArr);
			echo "Sucessfully Updated";
		} else {
			$insArr=array();
			$insArr['user_id'] = $this->input->post('uid');
			//$insArr['position']=$this->input->post('position');
			$insArr['description']=$this->input->post('codescription');
			$insArr['status']=$this->input->post('status');
			$this->common_model->tbl_insert(CRNTOPENING,$insArr);
			echo "Sucessfully Added";
		}
	}

	public function reset_password () {
		$data['page_title'] = "Reset Password";
		$data['header']=$this->load->view('includes/header','',true);
        $data['footer']=$this->load->view('includes/footer','',true);
		$this->load->view('postdoctr/reset_password',$data);
	}

	public function update_password () {
		$insArr=array();
		$insArr['password'] = base64_encode($this->input->post('new_pass'));
		$insArr['update_pass'] = '2';
		$resultdata = $this->common_model->tbl_update(TEAM,array('id'=>$this->session->userdata('user_id')),$insArr);
		redirect(base_url()."postdoctr/dashboard/".$this->session->userdata('user_id'));
	}

	public function logout() {
        $this->session->unset_userdata('uid');
        session_unset();  
        redirect(base_url()."postdoctr/");
    }
}