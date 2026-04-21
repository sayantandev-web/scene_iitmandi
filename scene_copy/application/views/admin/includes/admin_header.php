<?php
if($this->session->userdata('uid') != '') {
    $uid=$this->session->userdata('uid');
    $get_name = get_admin_name($uid);
    $get_logo = get_logo_name();
    $footer_content=$this->common_model->get_data(SETTINGS,array('id'=>1));
?>
 <nav class="navbar navbar-static-top" role="navigation">
    <a href="javascript:void(0);" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url(); ?>uploads/site_logo/thumb/<?php echo @$footer_content[0]['profile_pic']; ?>" class="user-image" alt="User Image"/>
                    <span class="hidden-xs"><?php echo ucwords($get_name[0]['fname'])." ".ucwords($get_name[0]['lname']); ?></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">
                        <img src="<?php echo base_url(); ?>uploads/site_logo/thumb/<?php echo @$footer_content[0]['profile_pic']; ?>" class="img-circle" alt="User Image" />
                        <p><?php echo ucwords($get_name[0]['fname'])." ".ucwords($get_name[0]['lname']); ?></p>
                    </li>
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="admin/Dashboard/change_password" class="btn btn-default btn-flat">Change Password</a>
                        </div>
                        <div class="pull-right">
                            <a href="admin/Login/logout" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<?php } ?>