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
                            <div class="panel-heading" style="display: flow-root;">
                                <h3 class="panel-title" style="float: left;"><?php echo $page_title; ?></h3>
                                <a href="admin/banner/add_banner" style="float: right;background: #3c8dbc;padding: 10px;color: #fff;">Add New banner</a>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->utilitylib->showMsg();?>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered dat_tbl">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th style="width: 160px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($banner)) {
                                                    $i=1; ?>
                                                <?php foreach($banner as $row) { ?>
                                                <tr>
                                                    <td>
                                                    <?php if(@$row['banner_image']){ ?>
                                                    <img src="<?php echo base_url(); ?>uploads/banner/thumb/<?php echo $row['banner_image']; ?>" alt="<?php echo $row['banner_image']; ?>" width="116" height="87">
                                                    <?php } else { ?>
                                                    <img src="<?php echo base_url(); ?>uploads/no-img.jpg" alt="no-img.jpg">
                                                    <?php } ?>
                                                    </td>
                                                    <td><?php echo $row['banner_title']; ?></td>
                                                    <td><?php echo $row['banner_title1']; ?></td>
                                                    <td>
                                                    <a href="admin/banner/add_banner/<?php echo $row['id']; ?>" class="btn btn-inverse waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <?php if($row['status']==1) { ?>
                                                    <a href="admin/banner/change_status/<?php echo $row['id']; ?>" class="btn btn-info waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Inactive Status"><i class="fa fa-check" aria-hidden="true" onclick="return confirm('Are you sure you want to inactive status of this banner?')"></i></a>
                                                    <?php } else { ?>
                                                    <a href="admin/banner/change_status/<?php echo $row['id']; ?>" class="btn btn-pink waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Active Status" onclick="return confirm('Are you sure you want to active status of this banner?')"><i class="fa fa-remove"></i></a>
                                                    <?php } ?>
                                                    <a href="admin/banner/banner_delete/<?php echo $row['id']; ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete this banner?')">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </a>
                                                    </td>
                                                </tr>
                                                <?php $i++; } } ?>
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
