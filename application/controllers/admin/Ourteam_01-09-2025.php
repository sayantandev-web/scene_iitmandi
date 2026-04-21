<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ourteam extends CI_Controller{

	public function __construct(){
		@parent::__construct();
		$this->load->library('pagination');
		$this->load->library('image_lib');
		if(!isset($_SESSION)) { 
            session_start(); 
        }
        // if($this->session->userdata('uid') == ''){
        //     redirect(base_url().'admin/');
        // }
	}

	public function index() {
		$data['team']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('position'=>[1,2,3,4,5,6,7],'is_delete'=>1));
		$data['page_title'] = "User Management";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/team_list',$data);
	} 

	public function all_external_users() {
		$data['team']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".id DESC",array('position'=>[8],'is_delete'=>1));
		$data['page_title'] = "External User";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/external_list',$data);
	} 
	
	public function add_team($id='') {
		//print_r($this->input->post());
		if($this->input->post()) {
			$insArr=array();
			$insArr['fname'] = $this->input->post('fname');
			$insArr['mname'] = $this->input->post('mname');
			$insArr['lname'] = $this->input->post('lname');
			$insArr['email'] = strtolower($this->input->post('email'));
			$insArr['position'] = $this->input->post('position');
			$insArr['enrollno'] = $this->input->post('enrollno');
			if($this->input->post('designation') != '') {
				$insArr['designation'] = $this->input->post('designation');
			}
			$insArr['supervisor'] = $this->input->post('supervisor');
			if ($this->input->post('cosupervisors') != '') {
				$cosupervisors = $this->input->post('cosupervisors');
				$insArr['cosupervisors'] = implode(",", $cosupervisors);
			} else {
				$insArr['cosupervisors'] = $this->input->post('cosupervisors');
			}
			$insArr['post'] = $this->input->post('post');
			$insArr['lab'] = $this->input->post('lab');
			$insArr['mobile'] = $this->input->post('mobile');
			$insArr['office'] = $this->input->post('office');
			$insArr['specialization'] = $this->input->post('specialization');
			$insArr['research_keyword'] = $this->input->post('research_keyword');
			$insArr['admssnyear'] = $this->input->post('admssnyear');
			$insArr['department'] = $this->input->post('department');
			$insArr['institutename'] = $this->input->post('institutename');
			$insArr['profilelink'] = $this->input->post('profilelink');
			if($this->input->post('program') != '') {
				$insArr['designation'] = $this->input->post('program');
			}
			if($this->input->post('degree') != '') {
				$insArr['designation'] = $this->input->post('degree');
			}
			$insArr['project_name'] = $this->input->post('project_name');
			$insArr['status'] = $this->input->post('status');
			if ($_FILES['team_image']['name'] != '') {
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
				}
			}
			if(!empty($id)) {
				$this->common_model->tbl_update(TEAM,array('id'=>$id),$insArr);
				$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully updated','SUCCESS');
				redirect(base_url()."admin/ourteam/");
			} else {
				// $check_email = $this->common_model->get_data_row(TEAM,array('email'=>strtolower($this->input->post('email')),'is_delete'=>1));
				$check_email = $this->db->query("SELECT *  FROM `iitmandi_team` WHERE `email` LIKE '%".$this->input->post('email')."%' and `is_delete` = 1");
				//if($check_email['email'] == strtolower($this->input->post('email'))) {
				if(count($check_email->result_array()) != 0) {
					echo ('<script>alert("Email ID is already exist!");</script>');
				} else {
					$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789!@#$%^&*()";
					$pass = array(); //remember to declare $pass as an array
					$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
					for ($i = 0; $i < 22; $i++) {
						$n = rand(0, $alphaLength);
						$pass[] = $alphabet[$n];
					}
					$pass_generate = implode($pass); //turn the array into a string
					$insArr['password']=base64_encode($pass_generate);
					$id = $this->common_model->tbl_insert(TEAM,$insArr);
					if(!empty($this->db->insert_id())) {
						$insArr1['projectstuff_id'] = $this->db->insert_id();
						$this->common_model->tbl_update(PROJECT,array('id'=>$this->input->post('project_name')),$insArr1);
					}
					$this->utilitylib->setMsg(SUCCESS_ICON.' Sucessfully saved','SUCCESS');
					redirect(base_url()."admin/ourteam/");
				}
			}
		}
		$data['banner']=$this->common_model->get_data_row(TEAM,array('id'=>$id));
		if(!empty($id)){
			$data['page_title'] = "Edit User";
		} else {
			$data['page_title'] = "Add User";
		}
		$data['ourteam']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".`fname` ASC",array('position'=>[1,2,8],'status'=>1, 'is_delete'=>1));
		$data['designation']=$this->common_model->get_data_array(DESIGNATION,'','','','','','',DESIGNATION.".id DESC",array('status'=>1, 'is_delete'=>1));
		$data['project_list']=$this->common_model->get_data_array(PROJECT,'','','','','','',PROJECT.".id DESC",array('is_delete'=>1));
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
		$this->load->view('admin/add_team',$data);
	} 

	public function get_designation_list() {
        $position_id = $this->input->post('position');
        $designation = $this->common_model->get_data_array(DESIGNATION,array('user_type' => $position_id),'','','','','','');
        if(!empty($designation)) {
            $html='<option value="">Select Designation</option>';
            if(!empty($designation)) {
                foreach($designation as $row){
                    $html .='<option value="'.$row['id'].'"';
                    $html .='>'.$row['designation'].'</option>';    
                }
            }
        } else {
            $html='<option value="">Select Designation</option>';	
        }
        echo $html;
    }

	public function change_status($id) {
		$banner=$this->common_model->get_data(TEAM,array('id'=>$id));
		if($banner[0]['status']==1) {
			$status = array('status'=>2);
		} else {
			$status = array('status'=>1);
		}
		$this->common_model->tbl_update(TEAM,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i> Status successfully changed.','SUCCESS');
		redirect(base_url()."admin/ourteam");
	}
	
	public function banner_delete($id) {
		$banner=$this->common_model->get_data(TEAM,array('id'=>$id));
		if($banner[0]['is_delete']==1) {
			$status = array('is_delete'=>2);
		} else {
			$status = array('is_delete'=>1);
		}
		$this->common_model->tbl_update(TEAM,array('id'=>$id),$status);
		$this->utilitylib->setMsg('<i class="fa fa-info-circle" aria-hidden="true"></i>Successfully Deleted.','SUCCESS');
		redirect(base_url()."admin/ourteam");
	}

	public function reset_password() {
		$insArr=array();
		$insArr['password'] = base64_encode($this->input->post('newpass'));
		$insArr['update_pass'] = '1';
		$resultdata = $this->common_model->tbl_update(TEAM,array('id'=>$this->input->post('uid')),$insArr);
		if ($resultdata > 0) {
			echo 'Password Updated';
		} else {
			echo 'Please try again!';
		}
	}
}