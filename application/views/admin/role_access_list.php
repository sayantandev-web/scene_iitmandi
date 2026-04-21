<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="images/fav.png" sizes="32x32" />
<title><?php echo $page_title; ?></title>
<head>
    <?php echo $header_scripts; ?>
    <style type="text/css">
        table td {overflow: scroll;height: 200px;}
    </style>
</head>
<body class="skin-blue">
    <div class="wrapper">
        <header class="main-header">
            <a href="admin" class="logo"><b>Admin</b>Panel</a>
            <?php echo $header; ?>
        </header>
        <?php echo $sidebar;?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1><?php echo $page_title; ?><small>Control panel</small></h1>
                <ol class="breadcrumb">
                    <li><a href="admin"><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="active"><?php echo $page_title; ?></li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo $page_title; ?></h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->utilitylib->showMsg();?>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered dat_tbl">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Full Name</th>
                                                    <th>Page Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($role_access_list)) { 
													$i = 1;
													foreach($role_access_list as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td>
														<?php 
														$getadminUser = $this->db->query("SELECT user_id, CONCAT(fname, ' ', lname) as FullName FROM iitmandi_admin WHERE user_id = '".$row['u_id']."'")->row();
														echo $getadminUser->FullName; 
														?>
													</td>
                                                    <td>
														<?php 
                                                        $getpageList = $this->db->query("SELECT GROUP_CONCAT(page_list) AS page_list FROM iitmandi_role_access where u_id = '".$row['u_id']."'")->row();
                                                        echo $getpageList->page_list;
                                                        ?>
													</td>
                                                    <td style="width: 142px;">
                                                        <a href="admin/roles/role_access/<?php echo $row['u_id']; ?>" class="btn btn-primary waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a  onclick="return confirm('Are you sure you want to delete this?')" href="admin/roles/role_delete/<?php echo $row['u_id']; ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                <?php  $i++; } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $footer; ?>
            </section>
        </div>
    </div>
    <?php echo $footer_scripts; ?>
</body>
</html>
