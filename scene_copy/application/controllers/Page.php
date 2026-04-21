<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH."libraries/lib/config_paytm.php");
require_once(APPPATH."libraries/lib/encdec_paytm.php");

class Page extends CI_Controller {
    public function __construct(){
        @parent::__construct();
        $this->load->library('pagination');
        $this->load->library('image_lib');
        $this->load->helper('cookie');
        date_default_timezone_set('Asia/Calcutta');
    }

    public function pageDetails($pagedetails) {
        //$data['gallery']=$this->common_model->get_data_array(GALLERY,'','','','','','',GALLERY.".id DESC",array('status'=>1,'is_delete'=>1));
        $data['team']=$this->common_model->get_data_array(TEAM,'','','','','','',TEAM.".position ASC",array('status'=>1,'is_delete'=>1));
        $data['syllabus']=$this->common_model->get_data_array(SYLLABUS,'','','','','','','',array('status'=>1,'is_delete'=>1));
        $data['disclosure']=$this->common_model->get_data_array(DISCLOSURE,'','','','','','','',array('status'=>1,'is_delete'=>1));
        $data['fullpage']=$this->common_model->get_data_array(PAGES,array('page_slug'=>$pagedetails),'','','','','','');
        $data['header']=$this->load->view('includes/header','',true);
        $data['footer']=$this->load->view('includes/footer','',true);
        $fullpage=$this->common_model->get_data_array(PAGES,array('page_slug'=>$pagedetails),'','','','','','');
        $data['title']=$fullpage[0]['page_title'];
        $this->load->view('page_details',$data);
    }

    public function newsletter() {
        if($this->input->post()) { 
            $insert_array = array();
            $insert_array['user_email'] = $this->input->post('email');
            $insert_array['user_ip'] = $this->input->post('client_ip');
            $check_email = $this->common_model->get_data_array(SUBSCRIBERS,array('user_email' => $this->input->post('email')),'','','','','','','','','');
            if(!empty($check_email)) {
                echo $msg='Email address already exists';
            } else {
                $insert = $this->common_model->tbl_insert(SUBSCRIBERS,$insert_array);
                if($insert > 0) {
                    $checkemail = $this->common_model->get_data_array(SETTINGS,'','','','','','','','','','');
                    $to = $this->input->post('email');
                    $subject = 'Knosmos - Subscription';
                    $from = $checkemail[0]['email'];
                    // To send HTML mail, the Content-type header must be set
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    // Create email headers
                    $headers .= 'From: '.$from."\r\n".
                    'Reply-To: '.$from."\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                    // Compose a simple HTML email message
                    $message = '<html><body>';
                    $message .= '<h1 style="color:#f40;">Hi!</h1>';
                    $message .= '<p style="color:#080;font-size:18px;">Thank you for your interest in our service for the email marketing expert.</p>';
                    $message .= '</body></html>';
                    mail($to, $subject, $message, $headers);
                    echo $msg = "Thank you for subscribing with us.";
                } else {
                    echo $msg='Something went wrong! Please try again!'; 
                }
            }
        }
    }
    
    public function contactmail() {
        if($this->input->post()) { 
            $insert_array=array();
            $insert_array['cname']=$this->input->post('cname');
            $insert_array['cemail']=$this->input->post('cemail');
            $insert_array['cphno']=$this->input->post('cphno');
            $insert_array['cmssg']=$this->input->post('cmssg');
            $insert_array['client_ip']=$this->input->post('client_ip');
            $insert_array['post_date']=date("Y-m-d");
            $insert = $this->common_model->tbl_insert(CONTACTMAIL,$insert_array);
            $contact=$this->common_model->get_data_array(SETTINGS,array('id'=>1),'','','','','','');
            if($insert > 0) {
                $to = $contact[0]['email'];
                $subject = 'knosmos - Contact Us';
                $from = $this->input->post('cemail');
                // To send HTML mail, the Content-type header must be set
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Create email headers
                $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$from."\r\n" .
                'X-Mailer: PHP/' . phpversion();
                // Compose a simple HTML email message
                $message = '<html><body>';
                $message .= '<h1 style="color:#f40;">Contact Details</h1>';
                $message .= '<p style="color:#080;font-size:18px;">Name: "'.$this->input->post('cname').'"</p>';
                $message .= '<p style="color:#080;font-size:18px;">Email: "'.$this->input->post('cemail').'"</p>';
                $message .= '<p style="color:#080;font-size:18px;">Phone: "'.$this->input->post('cphno').'"</p>';
                $message .= '<p style="color:#080;font-size:18px;">Message: "'.$this->input->post('cmssg').'"</p>';
                $message .= '</body></html>';
                // Sending email
                if(mail($to, $subject, $message, $headers)){
                    echo 'Thanks you for contacting with us.';
                } else{
                    echo 'Unable to send email. Please try again.';
                }
            } else {
                echo $html='Please try again!'; 
            } 
        }
    }
}