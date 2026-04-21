<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="images/fav.png" sizes="32x32" />
<title><?php echo $page_title; ?></title>
<head>
    <?php echo $header_scripts; ?>
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
                    <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
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
                                        <h3><?php echo $section_title; ?></h3>
                                        <table id="datatable" class="table table-striped table-bordered dat_tbl">
                                            <thead>
                                                <tr>
                                                   <th>Sl No.</th>
                                                   <th>Image</th>
                                                   <th>News Title</th>
                                                   <th>News Overview</th>
                                                   <th>Author's Name</th>
                                                   <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($wait_approval)) { 
                                                   $i=1; ?>
                                                <?php foreach($wait_approval as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <img src="<?php echo base_url(); ?>assets/images/news/thumb/<?php echo $row['file_name']; ?>" alt="<?php echo $row['file_name']; ?>" width="116" height="87"> 
                                                    </td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td class="news_desc">
                                                        <?php if(str_word_count($row['conclusion']) >= 250){ ?>
                                                            <div><?php echo substr($row['conclusion'],0,250); ?></div>
                                                        <?php } else { ?>
                                                            <div><?php echo $row['conclusion']; ?></div>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        $a_name = $this->common_model->get_data(USERS,array('id'=>$row['role_id']));
                                                        echo $a_name[0]['fullname'];
                                                        ?>
                                                    </td>
                                                    <td style="width: 142px;">
                                                        <!-- <a href="admin/news/add_news/<?php echo $row['id']; ?>" class="btn btn-primary waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->
                                                        <?php if($row['status']==1) { ?>
                                                        <a onClick="javascript: return confirm('Are you sure you want to inactive this news?');" href="admin/news/change_status_anew/<?php echo $row['id']; ?>" class="btn btn-info waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Inactive Status"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <?php } else { ?>
                                                        <a onClick="javascript: return confirm('Are you sure you want to active this news?');" href="admin/news/change_status_anew/<?php echo $row['id']; ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Active Status"><i class="fa fa-remove"></i></a>
                                                        <?php } ?>
                                                        <a  onclick="return confirm('Are you sure you want to delete this news?')" href="admin/news/delete_anew/<?php echo $row['id']; ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $i++; } } else {?>
                                                <!-- <tr>
                                                    <td colspan="6">No Record Found</td>
                                                </tr> -->
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h3><?php echo $page_title; ?></h3>
                                        <table id="datatable" class="table table-striped table-bordered dat_tbl">
                                            <thead>
                                                <tr>
                                                   <th>Sl No.</th>
                                                   <th>Image</th>
                                                   <th>News Title</th>
                                                   <th>News Overview</th>
                                                   <th>Author's Name</th>
                                                   <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($news)) { 
                                                   $i=1; ?>
                                                <?php foreach($news as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <img src="<?php echo base_url(); ?>assets/images/news/thumb/<?php echo $row['file_name']; ?>" alt="<?php echo $row['file_name']; ?>" width="116" height="87"> 
                                                    </td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td class="news_desc">
                                                        <?php if(str_word_count($row['conclusion']) >= 250){ ?>
                                                            <div><?php echo substr($row['conclusion'],0,250); ?></div>
                                                        <?php } else { ?>
                                                            <div><?php echo $row['conclusion']; ?></div>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        $a_name = $this->common_model->get_data(USERS,array('id'=>$row['role_id']));
                                                        echo $a_name[0]['fullname'];
                                                        ?>
                                                    </td>
                                                    <td style="width: 142px;">
                                                        <!-- <a href="admin/news/add_news/<?php echo $row['id']; ?>" class="btn btn-primary waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->
                                                        <?php if($row['status']==1) { ?>
                                                        <a onClick="javascript: return confirm('Are you sure you want to inactive this news?');" href="admin/news/change_status_anew/<?php echo $row['id']; ?>" class="btn btn-info waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Inactive Status"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <?php } else { ?>
                                                        <a onClick="javascript: return confirm('Are you sure you want to active this news?');" href="admin/news/change_status_anew/<?php echo $row['id']; ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Active Status"><i class="fa fa-remove"></i></a>
                                                        <?php } ?>
                                                        <a  onclick="return confirm('Are you sure you want to delete this news?')" href="admin/news/delete_anew/<?php echo $row['id']; ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $i++; } } else {?>
                                                <!-- <tr>
                                                    <td colspan="6">No Record Found</td>
                                                </tr> -->
                                                <?php } ?>
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
