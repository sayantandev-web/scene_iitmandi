<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="images/fav.png" sizes="32x32" />
<title><?php echo $page_title; ?></title>
<head>
    <?php echo $header_scripts; ?>
    <style type="text/css">
        table td {overflow: scroll;height: 200px;}
        .btn {padding: 3px 3px !important;}
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
                                <a href="admin/labsection/add_labsection" style="float: right;background: #3c8dbc;padding: 10px;color: #fff;">Add Lab </a>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->utilitylib->showMsg();?>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered dat_tbl">
                                            <thead>
                                                <tr>
                                                    <th>Cover Image</th>
                                                    <th>Lab Name</th>
                                                    <th>Specialization</th>
                                                    <th>Type of Lab</th>
                                                    <th style="width: 160px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($labsection)) {
                                                    $i=1; ?>
                                                <?php foreach($labsection as $row) { ?>
                                                <tr>
                                                    <td>
                                                        <?php if(@$row['cover_photo']){ ?>
                                                            <img src="<?php echo base_url(); ?>uploads/labsection/thumb/<?php echo $row['cover_photo']; ?>" alt="<?php echo $row['cover_photo']; ?>" width="116" height="87">
                                                        <?php } else { ?>
                                                            <img src="<?php echo base_url(); ?>uploads/no-img.jpg" alt="no-img.jpg">
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo $row['labname'] ?></td>
                                                    <td><?php if ($row['specialization'] != ''){echo $row['specialization']; } else {echo 'None'; } ?></td>
                                                    <td><?php if ($row['typeofLab'] == '1'){echo 'Teaching'; } else {echo 'Research'; } ?>
                                                    </td>
                                                    <td>
                                                        <a href="admin/labsection/add_labsection/<?php echo $row['id']; ?>" class="btn btn-info waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <?php if($row['status']==1) { ?>
                                                            <a href="admin/labsection/change_status/<?php echo $row['id']; ?>" class="btn btn-info waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Inactive Status"><i class="fa fa-check" aria-hidden="true" onclick="return confirm('Are you sure you want to inactive status of this?')"></i></a>
                                                        <?php } else { ?>
                                                            <a href="admin/labsection/change_status/<?php echo $row['id']; ?>" class="btn btn-pink waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Active Status" onclick="return confirm('Are you sure you want to active status of this?')"><i class="fa fa-remove"></i></a>
                                                        <?php } ?>
                                                        <a href="admin/labsection/labsection_delete/<?php echo $row['id']; ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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