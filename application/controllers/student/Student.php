<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH."libraries/lib/config_paytm.php");
require_once(APPPATH."libraries/lib/encdec_paytm.php");

class Student extends CI_Controller {
    public function __construct() {
        @parent::__construct();
        $this->load->library('pagination');
        $this->load->library('image_lib');
        $this->load->helper('cookie');
        $this->load->library('email');
        date_default_timezone_set('Asia/Calcutta');
        if(!isset($_SESSION)) { 
            session_start(); 
        }
    }

    public function index() {
		$data['page_title'] = "Student Login";
		$data['header']=$this->load->view('includes/header','',true);
        $data['footer']=$this->load->view('includes/footer','',true);
		$this->load->view('student/home',$data);
	}

    public function login() {
    	$this->load->library('session');
        if($this->session->userdata('user_id') != '') {
            redirect(base_url('student/dashboard/'.$this->session->userdata('user_id')));
		}
		if($this->input->post()) {
			$sql= "`email` ='".$this->input->post('email')."' AND (`position` = 3) AND (`status`= 1) AND (`is_delete`= 1)";
			$result=$this->common_model->get_data(TEAM,$sql);
			if(base64_encode($this->input->post('password')) == $result[0]['password']) {
				$this->session->set_userdata('user_id',$result[0]['id']);
				$id = $this->session->userdata('user_id');
				if($result[0]['update_pass'] == 2) {
					redirect(base_url()."student/dashboard/".$id);
				} else {
					redirect(base_url()."student/reset_password/".$id);
				}
			} else {
				$this->utilitylib->setMsg('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Wrong email or password!','ERROR');
				redirect(base_url()."student/");
			}
		}
		$data['page_title'] = "Login";
		$data['header']=$this->load->view('includes/header','',true);
        $data['footer']=$this->load->view('includes/footer','',true);
		$this->load->view('student/home',$data);
    }

    public function dashboard($id='') {
    	$this->load->library('session');
    	if ($id != '') {
    		$data['page_title'] = "Dashboard";
    		$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['journal']=$this->db->query("SELECT * FROM `iitmandi_publication` WHERE ((`user_id` = $id AND instr(concat(',', author_name, ','), ',$id,')) OR `user_id` = $id OR instr(concat(',', author_name, ','), ',$id,')) AND `publication_type` = 'Journal Article' AND `status` = 1 AND `is_delete` = 1");
			$data['conference']=$this->db->query("SELECT * FROM `iitmandi_publication` WHERE ((`user_id` = $id AND instr(concat(',', author_name, ','), ',$id,')) OR `user_id` = $id OR instr(concat(',', author_name, ','), ',$id,')) AND `publication_type` = 'Conference Paper' AND `status` = 1 AND `is_delete` = 1");
			$data['bookc']=$this->db->query("SELECT * FROM `iitmandi_publication` WHERE ((`user_id` = $id AND instr(concat(',', author_name, ','), ',$id,')) OR `user_id` = $id OR instr(concat(',', author_name, ','), ',$id,')) AND `publication_type` = 'Book Chapter' AND `status` = 1 AND `is_delete` = 1");
			$data['book']=$this->db->query("SELECT * FROM `iitmandi_publication` WHERE ((`user_id` = $id AND instr(concat(',', author_name, ','), ',$id,')) OR `user_id` = $id OR instr(concat(',', author_name, ','), ',$id,')) AND `publication_type` = 'Book' AND `status` = 1 AND `is_delete` = 1");
			$data['patent']=$this->db->query("SELECT * FROM `iitmandi_publication` WHERE ((`user_id` = $id AND instr(concat(',', author_name, ','), ',$id,')) OR `user_id` = $id OR instr(concat(',', author_name, ','), ',$id,')) AND `publication_type` = 'Patent' AND `status` = 1 AND `is_delete` = 1");
			$data['award']=$this->common_model->get_data_array(AWARDEVENT,'','','','','','',AWARDEVENT.".id DESC",array('user_id'=>$id,'type'=> 'Award','status'=>1,'is_delete'=>1));
			$data['ourteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('student/dashboard',$data);
    	} else {
    		$data['page_title'] = "Dashboard";
    		$data['about_me']=$this->common_model->get_data(TEAM,array('id'=>$id));
			$data['education']=$this->common_model->get_data_array(EDUCATION,'','','','','','',EDUCATION.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['experience']=$this->common_model->get_data_array(EXPERIENCE,'','','','','','',EXPERIENCE.".id DESC",array('user_id'=>$id,'status'=>1,'is_delete'=>1));
			$data['journal']=$this->db->query("SELECT * FROM `iitmandi_publication` WHERE ((`user_id` = base64_decode($id) AND instr(concat(',', author_name, ','), ',base64_decode($id),')) OR `user_id` = base64_decode($id) OR instr(concat(',', author_name, ','), ',base64_decode($id),')) AND `publication_type` = 'Journal Article' AND `status` = 1 AND `is_delete` = 1");
			$data['conference']=$this->db->query("SELECT * FROM `iitmandi_publication` WHERE ((`user_id` = base64_decode($id) AND instr(concat(',', author_name, ','), ',base64_decode($id),')) OR `user_id` = base64_decode($id) OR instr(concat(',', author_name, ','), ',base64_decode($id),')) AND `publication_type` = 'Conference Paper' AND `status` = 1 AND `is_delete` = 1");
			$data['bookc']=$this->db->query("SELECT * FROM `iitmandi_publication` WHERE ((`user_id` = base64_decode($id) AND instr(concat(',', author_name, ','), ',base64_decode($id),')) OR `user_id` = base64_decode($id) OR instr(concat(',', author_name, ','), ',base64_decode($id),')) AND `publication_type` = 'Book Chapter' AND `status` = 1 AND `is_delete` = 1");
			$data['book']=$this->db->query("SELECT * FROM `iitmandi_publication` WHERE ((`user_id` = base64_decode($id) AND instr(concat(',', author_name, ','), ',base64_decode($id),')) OR `user_id` = base64_decode($id) OR instr(concat(',', author_name, ','), ',base64_decode($id),')) AND `publication_type` = 'Book' AND `status` = 1 AND `is_delete` = 1");
			$data['patent']=$this->db->query("SELECT * FROM `iitmandi_publication` WHERE ((`user_id` = base64_decode($id) AND instr(concat(',', author_name, ','), ',base64_decode($id),')) OR `user_id` = base64_decode($id) OR instr(concat(',', author_name, ','), ',base64_decode($id),')) AND `publication_type` = 'Patent' AND `status` = 1 AND `is_delete` = 1");
			$data['award']=$this->common_model->get_data_array(AWARDEVENT,'','','','','','',AWARDEVENT.".id DESC",array('user_id'=>$id,'type'=> 'Award','status'=>1,'is_delete'=>1));
			$data['ourteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('status'=>1,'is_delete'=>1));
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('student/dashboard',$data);
    	}
    }

    public function save_aboutme() {
		if($this->input->post()) {
			$insArr=array();
			$insArr['fname']=$this->input->post('fname');
			$insArr['email']=$this->input->post('email');
			$insArr['enrollno']=$this->input->post('enrollno');
			$insArr['admssnyear']=$this->input->post('admissionyear');
			$insArr['research_interest']=$this->input->post('research_interest1');
			$insArr['aboutme']=$this->input->post('aboutme');
			$id = $this->input->post('uid');
			if(!empty($id)){
				$this->common_model->tbl_update(TEAM,array('id'=>$id),$insArr);
			}
			if($_FILES['team_image']['name'] != '') {
				$data['result']=$this->common_model->get_data(TEAM,array('id'=>$id));
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
		$record_id = $this->input->post('dataid');
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
			$insArr['position']=$this->input->post('position');
			$insArr['year']=$this->input->post('exp_year');
			$insArr['status']=$this->input->post('status');
			$this->common_model->tbl_update(EXPERIENCE,array('id'=>$record_id),$insArr);
			echo "Sucessfully Updated";
		} else {
			$insArr=array();
			$insArr['user_id'] = $this->input->post('uid');
			$insArr['position']=$this->input->post('position');
			$insArr['year']=$this->input->post('exp_year');
			$insArr['status']=$this->input->post('status');
			$banner_record_id=$this->common_model->tbl_insert(EXPERIENCE,$insArr);
			echo "Sucessfully Added";
		}
	}

	public function edit_experience() {
		$id = $this->input->post('id');
		$edication=$this->common_model->get_data_row(EXPERIENCE,array('id'=>$id));
		echo json_encode($edication);
	}

	public function dlt_experience() {
		$id = $this->input->post('id');
		$edication=$this->common_model->get_data(EXPERIENCE,array('id'=>$id));
		if($edication[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(EXPERIENCE,array('id'=>$id),$status);
	}

	public function save_publication() {
		//print_r($this->input->post()); die();
		$author_name = substr($this->input->post('author_name'), 0, -1);
		$record_id = $this->input->post('pubid');
		if($this->input->post()) {
			$insArr=array();
			$insArr['user_id'] = $this->input->post('uid');
			$insArr['publication_type']=$this->input->post('publication_type');
			$insArr['author_name']=$author_name;
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
			if(!empty($record_id)){
				$this->common_model->tbl_update(PUBLICATION,array('id'=>$record_id),$insArr);
			}
			if($_FILES['attachment']['name'] != '') {
				$data['result']=$this->common_model->get_data(PUBLICATION,array('id'=>$record_id));
				if(@$data['result'][0]['attachment']) {	
					unlink('./uploads/publication/'.$data['result'][0]['attachment']);	
					unlink('./uploads/publication/thumb/'.$data['result'][0]['attachment']);	
				}
				$config1=array();
				$config1['upload_path']='./uploads/publication/thumb';
				$config1['upload_path']='./uploads/publication/';
				$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
				$config1['file_name']=time().$random_number;
				$config1['allowed_types']='jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|mp4|MPEG-4';
				/*$config1['max_width'] = '2000';
				$config1['max_height'] = '1125';*/
				$config1['overwrite']=TRUE;
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if(!$this->upload->do_upload('attachment')){
					$err_upload=$this->upload->display_errors();
					$this->utilitylib->setMsg($err_upload,'ERROR');
					print_r($err_upload);
				} else {
					$suc_upload2=array();
					$suc_upload2=$this->upload->data();
					$config1['image_library']='gd2';
					$config1['source_image']='uploads/publication/'.$suc_upload2['file_name'];
					$config1['new_image']='uploads/publication/thumb/'.$suc_upload2['file_name'];
					$config1['maintain_ratio']=TRUE;
					$config1['width']=150;
					$config1['height']=97;
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$insArr['attachment']=$suc_upload2['file_name'];
					if(!empty($record_id)) {
						$this->common_model->tbl_update(PUBLICATION,array('id'=>$record_id),$insArr);
						$banner_id=$record_id;
					} else {
						$banner_id=$this->common_model->tbl_insert(PUBLICATION,$insArr);
					}
					$this->common_model->tbl_update(PUBLICATION,array('id'=>$banner_id),$insArr);
				}
			} else {
				if(!empty($record_id)) {
					$this->common_model->tbl_update(PUBLICATION,array('id'=>$record_id),$insArr);
					$banner_id=$record_id;
				} else {
					$banner_id=$this->common_model->tbl_insert(PUBLICATION,$insArr);
				}
			}
			if(!empty($record_id)) {
				echo "Sucessfully Updated";
			} else {
				echo "Sucessfully Added";
			}
		}
	}

	public function edit_publication() {
		$id = $this->input->post('id');
		$education=$this->common_model->get_data_row(PUBLICATION,array('id'=>$id));
		$getData = explode(',', $education['author_name']);
		$items = array();
		foreach($getData as $key) {    
		    $getName = $this->db->query("SELECT * FROM iitmandi_team WHERE id = '".$key."'")->result_array();
		    if(!empty($getName[0]['mname'])) {
		    	$fullName = $getName[0]['fname'].' '.$getName[0]['mname'].' '.$getName[0]['lname'];
		    }  else {
		    	$fullName = $getName[0]['fname'].' '.$getName[0]['lname'];
		    }
		    $items[] = $fullName;
		}
		$string_version['author_name'] = implode(',', $items);
		$finalData = array_merge($education, $string_version);
		echo json_encode($finalData);
	}

	public function dlt_publication() {
		$id = $this->input->post('id');
		$edication=$this->common_model->get_data(PUBLICATION,array('id'=>$id));
		if($edication[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(PUBLICATION,array('id'=>$id),$status);
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

	public function reset_password () {
		$data['page_title'] = "Reset Password";
		$data['header']=$this->load->view('includes/header','',true);
        $data['footer']=$this->load->view('includes/footer','',true);
		$this->load->view('student/reset_password',$data);
	}

	public function update_password () {
		$insArr=array();
		$insArr['password'] = base64_encode($this->input->post('new_pass'));
		$insArr['update_pass'] = '2';
		$resultdata = $this->common_model->tbl_update(TEAM,array('id'=>$this->session->userdata('user_id')),$insArr);
		redirect(base_url()."student/dashboard/".$this->session->userdata('user_id'));
	}

    public function logout() {
        $this->session->unset_userdata('uid');
        session_unset();  
        redirect(base_url()."student/");
    }
}