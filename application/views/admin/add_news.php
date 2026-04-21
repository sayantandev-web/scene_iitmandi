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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo $page_title; ?></h3>
                                </div>
                                <div class="panel-body">
                                    <?php echo $this->utilitylib->showMsg();?>
                                    <div class="form">
                                        <form class="cmxform form-horizontal tasi-form" id="editForm" method="post" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="title" class="control-label col-lg-3 col-md-3 col-sm-4">Article Title  (Required)</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <input type="text" class="form-control" id="title" name="title" required  placeholder="News Title" value="<?php echo @$news['title'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="control-label col-lg-3 col-md-3 col-sm-4">News Description</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <textarea class="form-control text_area" id="description" name="description"><?php echo @$news['description'] ?></textarea>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="control-label col-lg-3 col-md-3 col-sm-4">Additional Link</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <textarea class="form-control text_area" id="a_link" name="a_link"><?php echo @$news['a_link'] ?></textarea>
                                               </div>
                                            </div>
                                            <div class="image_post">
                                                <?php if(!empty($news['file_name'])) { ?>
                                                <div class="form-group">
                                                    <label for="image" class="control-label col-lg-3 col-md-3 col-sm-4">News Cover Picture</label>
                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                        <?php if(!empty($news['file_name'])) { ?>
                                                        <img src="<?php echo base_url(); ?>uploads/news/thumb/<?php echo $news['file_name']; ?>" alt="<?php $news['file_name']; ?>">
                                                        <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>assets/images/no-cover.png" alt="no-cover">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <div class="form-group">
                                                    <label for="about_me" class="control-label col-lg-3 col-md-3 col-sm-4">Upload Picture</label>
                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                        <div class="fileupload btn btn-primary_cust waves-effect waves-light">
                                                            <input type="file" name="news_image" id="news_image" class="upload">
                                                            <span id="image_name1"></span>
                                                            <div class="clearfix"></div>
                                                            <label for="about_me" class="control-label" style="color:red;">Image size must be Less than 5MB (1920px X 1440px)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3 col-md-3 col-sm-4">Status</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <select class="form-control" name="status">
                                                        <option value="1" <?php if(@$news['status']==1){ echo "selected"; } ?>>Active</option>
                                                        <option value="2" <?php if(@$news['status']==2){ echo "selected"; } ?>>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-3 col-lg-10">
                                                    <button class="btn btn-success_cust waves-effect waves-light m-b-5" type="submit">Save</button>
                                                    <a href="admin/news"><button class="btn btn-success_cust waves-effect waves-light m-b-5" type="button">Back</button></a>
                                                </div>
                                            </div>
                                        </form>
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
