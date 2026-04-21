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
                                        <table id="datatable" class="table table-striped table-bordered dat_tbl">
                                            <thead>
                                                <tr>
                                                   <th>Sl No.</th>
                                                   <th>Image</th>
                                                   <th>News Title</th>
                                                   <th>News Description</th>
                                                   <th>Breaking News</th>
                                                   <th>Featured News</th>
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
                                                    <td><?php if($row['breaking_news']== 1){ echo "Yes"; } else { echo "No"; } ?></td>
                                                    <td><?php if($row['featured_news']== 1){ echo "Yes"; } else { echo "No"; } ?></td>
                                                    <td>
                                                        <a onClick="javascript: return confirm('Are you sure you want to restored this news?');" href="admin/news/restore_trash_news/<?php echo $row['id']; ?>" class="btn btn-info waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Inactive Status"><i class="fa fa-undo" aria-hidden="true"></i></a>
                                                        <a onclick="return confirm('Are you sure you want to permenently delete this news?')" href="admin/news/permenent_delete_news/<?php echo $row['id']; ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $i++; } } else {?>
                                                <!-- <tr>
                                                    <td colspan="7">No Record Found</td>
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
