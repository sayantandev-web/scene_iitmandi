<?php
if($this->session->userdata('uid') != '') {
    $uid=$this->session->userdata('uid');
    $get_name = get_admin_name($uid);
    //echo "<pre>"; print_r($get_name); die;
    $footer_content=$this->common_model->get_data(SETTINGS,array('id'=>1));
?>
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>uploads/site_logo/thumb/<?php echo @$footer_content[0]['profile_pic']; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo ucwords($get_name[0]['fname'])." ".ucwords($get_name[0]['lname']); ?></p>
                <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php if($get_name[0]['vcode'] == 'superadmin') { ?>
            <li class="treeview">
                <a href="admin/dashboard">
                    <i class="fa fa-circle-o"></i> <span>Dashboard</span></i>
                </a>
            </li>
            <li class="treeview">
                <a href="javascript:void(0);"><i class="fa fa-circle-o"></i>
                    <span>Home Page Management</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/banner"><i class="fa fa-circle-o"></i>Banner Section</a></li>
                    <li><a href="admin/homeabout"><i class="fa fa-circle-o"></i>About Section</a></li>
                    <li><a href="admin/homemessage"><i class="fa fa-circle-o"></i>Message Section</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0);"><i class="fa fa-circle-o"></i>
                    <span>Pages</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/page"><i class="fa fa-circle-o"></i>All Pages</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="admin/news"><i class="fa fa-circle-o"></i>
                    <span>News Management</span>
                </a>
            </li>
            <li class="treeview">
                <a href="admin/events"><i class="fa fa-circle-o"></i>
                    <span>Events Management</span>
                </a>
            </li>
            <li class="treeview">
                <a href="javascript:void(0);"><i class="fa fa-circle-o"></i>
                    <span>Our Team Members</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/designation"><i class="fa fa-circle-o"></i>Designation</a></li>
                    <li><a href="admin/ourteam"><i class="fa fa-circle-o"></i>All Users</a></li>
                    <li><a href="admin/alumni"><i class="fa fa-circle-o"></i>Alumni</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0);"><i class="fa fa-circle-o"></i>
                    <span>Facilities</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/labsection"><i class="fa fa-circle-o"></i>Lab Managment</a></li>
                    <li><a href="admin/labequipment"><i class="fa fa-circle-o"></i>Lab Equipment Managment</a></li>
                </ul>
            </li> 
            <li class="treeview">
                <a href="admin/publication"><i class="fa fa-circle-o"></i>
                    <span>Publication Management</span>
                </a>
            </li>
            <li class="treeview">
                <a href="admin/project"><i class="fa fa-circle-o"></i>
                    <span>Project Management</span>
                </a>
            </li>
            <li class="treeview">
                <a href="admin/programs"><i class="fa fa-circle-o"></i>
                    <span>Programs Management</span>
                </a>
            </li>
            <li class="treeview">
                <a href="admin/courses"><i class="fa fa-circle-o"></i>
                    <span>Course Management</span>
                </a>
            </li>
            <li class="treeview">
                <a href="admin/admission"><i class="fa fa-circle-o"></i>
                    <span>Admission Management</span>
                </a>
            </li>
            <li class="treeview">
                <a href="admin/specialization"><i class="fa fa-circle-o"></i>
                    <span>Specialization Management</span>
                </a>
            </li>
            <li class="treeview">
                <a href="javascript:void(0);"><i class="fa fa-circle-o"></i>
                    <span>Role Management</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/roles/role_access"><i class="fa fa-circle-o"></i>Role Access</a></li>
                    <li><a href="admin/roles/role_access_list"><i class="fa fa-circle-o"></i>Role access list</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="admin/settings"><i class="fa fa-circle-o"></i>
                    <span>Settings</span>
                </a>
            </li>
            <?php } else { 
            $getPageList = $this->db->query("SELECT * FROM iitmandi_role_access WHERE u_id = '".$uid."'")->result_array();
            if(!empty($getPageList)) {
            foreach ($getPageList as $page) { ?>
            <li class="treeview">
                <a href="admin/<?= $page['page_list']?>">
                    <i class="fa fa-circle-o"></i> <span><?= $page['page_list']." Management"?></span></i>
                </a>
            </li>
            <?php } } }?>
        </ul>
    </section>
</aside>
<?php } ?>