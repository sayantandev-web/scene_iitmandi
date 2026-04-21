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
                                                <label for="title" class="control-label col-lg-3 col-md-3 col-sm-4">Program Name</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <input type="text" class="form-control" id="programs_title" name="programs_title" required  placeholder="Program Name" value="<?php echo @$programs['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="control-label col-lg-3 col-md-3 col-sm-4">Program Description</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <textarea id="description" name="description"><?php echo @$programs['description']?></textarea>
                                               </div>
                                            </div>
                                            <?php if(!empty($programs)){ ?>
                                            <div class="form-group">
                                                <label for="about_me" class="control-label col-lg-3 col-md-3 col-sm-4">Program Image</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <?php if(@$programs['prgm_img']){ ?>
                                                    <img style="width: 200px" src="<?php echo base_url(); ?>uploads/programs/thumb/<?php echo @$programs['prgm_img']; ?>" alt="<?php echo @$programs['prgm_img']; ?>" />
                                                    <?php } else { ?>
                                                    <img src="<?php echo base_url()?>assets/images/no-cover.jpg" alt="no-img.png">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="form-group">
                                            <label for="about_me" class="control-label col-lg-3 col-md-3 col-sm-4">Upload Program Image</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <div class="fileupload btn btn-primary_cust waves-effect waves-light">
                                                    <input type="file" name="prgm_img" id="prgm_img" class="upload">
                                                    <span id="image_name1"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                                <label for="about_me" class="control-label" style="color:red;">Image size must be Less than 5MB (1920px X 1440px)</label>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 col-md-3 col-sm-4 control-label">Status</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <select class="form-control" name="status">
                                                        <option value="1" <?php if(@$programs['status']==1){ echo "selected"; } ?>>Active</option>
                                                        <option value="2" <?php if(@$programs['status']==2){ echo "selected"; } ?>>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-3 col-lg-10">
                                                    <button class="btn btn-success_cust waves-effect waves-light m-b-5" type="submit">Save</button>
                                                    <a href="admin/programs"><button class="btn btn-success_cust waves-effect waves-light m-b-5" type="button">Back</button></a>
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
