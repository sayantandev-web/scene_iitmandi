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
                            <div class="panel-heading" style="display: flow-root;">
                                <h3 class="panel-title" style="float: left;"><?php echo $page_title; ?></h3>
                                <a href="admin/news/add_news" style="float: right;background: #3c8dbc;padding: 10px;color: #fff;">Add News</a>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->utilitylib->showMsg();?>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered dat_tbl">
                                            <thead>
                                                <tr>
                                                   <th>Sl No.</th>
                                                   <th>Image</th>
                                                   <th>Title</th>
                                                   <!-- <th>Description</th> -->
                                                   <th>Date</th>
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
                                                        <?php if(!empty($row['file_name'])) { ?>
                                                            <img src="<?php echo base_url(); ?>uploads/news/thumb/<?php echo $row['file_name']; ?>" alt="<?php $row['file_name']; ?>" width="116" height="87">
                                                        <?php } else { ?>
                                                            <img src="<?php echo base_url(); ?>assets/images/no-cover.png" alt="no-cover" width="116" height="87">
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <!-- <td class="news_desc">
                                                        <?php //if(str_word_count($row['description']) >= 250){ ?>
                                                            <div><?php //echo substr($row['description'],0,250); ?></div>
                                                        <?php //} else { ?>
                                                            <div><?php //echo $row['description']; ?></div>
                                                        <?php //} ?>
                                                    </td> -->
                                                    <td><?php echo $row['add_date']; ?></td>
                                                    <td style="width: 142px;">
                                                        <a href="admin/news/add_news/<?php echo $row['id']; ?>" class="btn btn-primary waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <?php if($row['status']==1) { ?>
                                                        <a onClick="javascript: return confirm('Are you sure you want to inactive this news?');" href="admin/news/change_status/<?php echo $row['id']; ?>" class="btn btn-info waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Inactive Status"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <?php } else { ?>
                                                        <a onClick="javascript: return confirm('Are you sure you want to active this news?');" href="admin/news/change_status/<?php echo $row['id']; ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Active Status"><i class="fa fa-remove"></i></a>
                                                        <?php } ?>
                                                        <a  onclick="return confirm('Are you sure you want to delete this news?')" href="admin/news/delete/<?php echo $row['id']; ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $i++; } } else {?>
                                                <!-- <tr>
                                                    <td colspan="5">No Record Found</td>
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
