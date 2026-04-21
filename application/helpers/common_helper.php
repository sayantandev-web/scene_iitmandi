<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*-----Functions are Here-----------*/
function pic_resize($source_path,$thumb_path,$name,$width=NULL,$height){
    $CI =& get_instance();
    $config['image_library'] = 'gd2';
    $config['source_image']  = $source_path.$name['orig_name'];
    $config['new_image']  =  $thumb_path.$name['orig_name'];
    $config['width']     = $width;
    $config['height'] = $height;
    $config['quality'] = 65;
    $config['maintain_ratio'] = FALSE;
    //$config['x_axis'] = 168;
    //$config['y_axis'] = 251;
    $CI->image_lib->initialize($config);
    $CI->image_lib->resize();
    //$CI->image_lib->crop();
    //$CI->image_lib->clear();
}

function get_logo_name()
{
    $CI =& get_instance();
    $CI->load->model('common_model');
    return $CI->common_model->get_data(ADMIN,array('user_id'=>1));
}

function get_admin_name($uid)
{
    $CI =& get_instance();
    $CI->load->model('common_model');
    return $CI->common_model->get_data(ADMIN,array('user_id'=>$uid));
}

function social_link($uid)
{
    $CI =& get_instance();
    $CI->load->model('common_model');
    return $CI->common_model->get_data(ADMIN,array('user_id'=>$uid));
}

function get_admin_data()
{
    $CI =& get_instance();
    $CI->load->model('common_model');
    return $CI->common_model->get_data_row(ADMIN,array('user_id'=>1));
}

function get_about_content()
{
    $CI =& get_instance();
    $CI->load->model('common_model');
    return $CI->common_model->get_data_row(PAGES,array('page_slug'=>'footer-about-us'));
}

function get_research_type()
{
    $CI =& get_instance();
    $CI->load->model('common_model');
    return $CI->common_model->get_data_array(TYPE,array('status'=>1,'type'=>'research_papers'));
}

function get_image_types()
{
    $CI =& get_instance();
    $CI->load->model('common_model');
    return $CI->common_model->get_data_array(CATEGORY,array('status'=>1,'type'=>'gallery'));
}

function get_video_types()
{
    $CI =& get_instance();
    $CI->load->model('common_model');
    return $CI->common_model->get_data_array(CATEGORY,array('status'=>1,'type'=>'videos'));
}

function get_total_users()
{
    $CI =& get_instance();
    $CI->load->model('common_model');
    return $CI->common_model->get_data_array(USER_COUNT);
}

function get_mamber_details($id=null)
{
    $CI =& get_instance();
    $CI->load->model('common_model');
    return $CI->common_model->get_data_row(MEMBER,array('id'=>$id,'status'=>1));
}

function get_class_details()
{
    $CI =& get_instance();
    $CI->load->model('common_model');
    return $CI->common_model->get_data_array(CLASSES,array('status'=>1));
}


function get_metarial_type()
{
    $CI =& get_instance();
    $CI->load->model('common_model');
    return $CI->common_model->get_data_array(TYPE,array('status'=>1,'type'=>'study_metarials'));
}

function get_bengali_letter()
{
    $bengLetter = array('অ','আ','ই','ঈ','উ','ঊ','ঋ','ঌ','এ','ঐ','ও','ঔ','ক','খ','গ','ঘ','ঙ','চ','ছ','জ','ঝ','ঞ','ট','ঠ','ড','ঢ','ণ','ত','থ','দ','ধ','ন','প','ফ','ব','ভ','ম','য','র','ল','ব','শ','ষ','স','হ');
    return $bengLetter;
}

function nl2br2($string){
    $string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
    return $string;
}

function getAnchor($string){
    $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i';
    $string = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>',$string);
    return $string;
}

?>
