<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alumni extends CI_Controller{

	public function __construct(){
		@parent::__construct();
		$this->load->library('pagination');
		$this->load->library('image_lib');
        $this->load->model('alumni_model');
        $this->load->library('form_validation');
        $this->load->helper('file');
		if(!isset($_SESSION)) { 
            session_start(); 
        }
		if(!$this->session->userdata('uid')) {
            redirect(base_url().'admin/');
        }
	}

	// public function index() {
	// 	//$data['disclosure']=$this->common_model->get_data_array(DISCLOSURE,'','','','','','',DISCLOSURE.".id DESC",array('is_delete'=>1));
	// 	$data['page_title'] = "Alumni";
	// 	$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	//     $data['header']=$this->load->view('admin/includes/admin_header','',true);
	//     $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
	// 	$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
	// 	$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
	// 	$this->load->view('admin/alumni',$data);
	// } 
	
	// function fetch() {
    //     $data = $this->excel_import_model->select();
    //     $output = '<h3 align="center">Total Data - '.$data->num_rows().'</h3><table class="table table-striped table-bordered"><tr><th>PuccNo</th><th>Reg Num</th><th>Make</th><th>Model</th><th>Category</th><th>Reg date</th><th>testdate</th><th>TestTime</th><th>Eng_Type</th><th>Emi_Norms</th><th>Fuel_name</th><th>validdate</th><th>RPM</th><th>CO</th><th>p_hc</th><th>g_co</th><th>g_hc</th><th>Result</th><th>Cancelled</th><th>Mobile</th><th>Status</th></tr>';
    //     foreach($data->result() as $row) {
    //         if ($row->is_status == 1) {
    //             $status = 'Pending';
    //         } else {
    //             $status = 'Sent';
    //         }
    //         $output .= '<tr><td>'.$row->pucc_no.'</td><td>'.$row->reg_num.'</td><td>'.$row->make.'</td><td>'.$row->model.'</td><td>'.$row->category.'</td><td>'.$row->reg_date.'</td><td>'.$row->testdate.'</td><td>'.$row->testtime.'</td><td>'.$row->eng_type.'</td><td>'.$row->emi_norms.'</td><td>'.$row->fuel_name.'</td><td>'.$row->validdate.'</td><td>'.$row->rpm.'</td><td>'.$row->co.'</td><td>'.$row->p_hc.'</td><td>'.$row->g_co.'</td><td>'.$row->g_hc.'</td><td>'.$row->result.'</td><td>'.$row->cancelled.'</td><td>'.$row->mobile.'</td>
    //         <td>'.$status.'</td></tr>';
    //     }
    //     $output .= '</table>';
    //     echo $output;
    // }

	// public function import() {
    //     if(isset($_FILES["file"]["name"])) {
    //         $path = $_FILES["file"]["tmp_name"];
    //         $object = PHPExcel_IOFactory::load($path);
    //         foreach($object->getWorksheetIterator() as $worksheet) {
    //             $highestRow = $worksheet->getHighestRow();
    //             $highestColumn = $worksheet->getHighestColumn();
    //             for($row=2; $row<=$highestRow; $row++) {
    //                 $u_id = $this->session->userdata('uid');
    //                 $pucc_no = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
    //                 $reg_num = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
    //                 $make = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
    //                 $model = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
    //                 $category = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
    //                 $reg_date = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
    //                 $testdate = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
    //                 $testtime = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
    //                 $eng_type = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
    //                 $emi_norms = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
    //                 $fuel_name = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
    //                 $validdate = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
    //                 $rpm = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
    //                 $co = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
    //                 $p_hc = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
    //                 $g_co = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
    //                 $g_hc = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
    //                 $result = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
    //                 $cancelled = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
    //                 $mobile = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
    //                 $data[] = array('u_id'=>$u_id,'pucc_no'=>$pucc_no,'reg_num'=>$reg_num,'make'=>$make,'model'=>$model,'category'=>$category,'reg_date'=>$reg_date,'testdate'=>$testdate,'testtime'=>$testtime,'eng_type'=>$eng_type,'emi_norms'=>$emi_norms,'fuel_name'=>$fuel_name,'validdate'=>$validdate,'rpm'=>$rpm,'co'=>$co,'p_hc'=>$p_hc,'g_co'=>$g_co,'g_hc'=>$g_hc,'result'=>$result,'cancelled'=>$cancelled,'mobile'=>$mobile);
    //             }
    //             $this->excel_import_model->insert($data);
    //             echo 'Data Imported successfully';
    //         }
    //     } 
    // }

    public function index(){
        $data = array();
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $data['alumni'] = $this->alumni_model->getRows();
        $data['page_title'] = "Alumni";
		$data['header_scripts'] = $this->load->view('admin/includes/admin_header_scripts','',true);
	    $data['header']=$this->load->view('admin/includes/admin_header','',true);
	    $data['sidebar']=$this->load->view('admin/includes/admin_sidebar','',true);
		$data['footer']=$this->load->view('admin/includes/admin_footer','',true);
		$data['footer_scripts']=$this->load->view('admin/includes/admin_footer_scripts','',true);
        $this->load->view('admin/alumni', $data);
    }

    public function import(){
        $data = array();
        $memData = array();
        
        // If import request is submitted
        if($this->input->post('importSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
                    
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){ $rowCount++;
                            // Prepare data for DB insertion
                            $memData = array(
                                'name' => $row['Name'],
                                'email' => $row['Email'],
                                'alumni_type' => $row['Alumni Type'],
                                'thesis_title' => $row['Thesis Title'],
                                'supervisor' => $row['Supervisor'],
                                'year' => $row['Year'],
                                'current_position' => $row['Current Position'],
                                'link' => $row['Link'],
                                'specialization' => $row['Specialization']
                            );
                            // Check whether email already exists in the database
                            /*$con = array(
                                'where' => array(
                                    'email' => $row['Email']
                                ),
                                'returnType' => 'count'
                            );
                            $prevCount = $this->alumni_model->getRows($con);
                            if(isset($prevCount)) {
                                $condition = array('email' => $row['Email']);
                                $update = $this->alumni_model->update($memData, $condition);
                                if($update){
                                    $updateCount++;
                                }
                            } else {
                                $insert = $this->alumni_model->insert($memData);
                                if($insert){
                                    $insertCount++;
                                }
                            }*/
                            $insert = $this->alumni_model->insert($memData);
                            if($insert){
                                $insertCount++;
                            }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }
            }else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }
        }
        redirect('admin/alumni');
    }
    
    /*
     * Callback function to check file value and type during validation
     */
    public function file_check($str){
        $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileAr = explode('.', $_FILES['file']['name']);
            $ext = end($fileAr);
            if(($ext == 'csv') && in_array($mime, $allowed_mime_types)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only CSV file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please select a CSV file to upload.');
            return false;
        }
    }
}