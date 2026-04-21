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
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" id="editForm" method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-lg-3 col-md-3 col-sm-4 control-label">User Type</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <select class="form-control" name="user_type">
                                                    <option value="">Choose an Option</option>
                                                    <option value="1" <?php if(@$banner['user_type']==1){ echo "selected"; } ?>>Faculty</option>
                                                    <option value="2" <?php if(@$banner['user_type']==2){ echo "selected"; } ?>>Postdocs</option>
                                                    <option value="3" <?php if(@$banner['user_type']==3){ echo "selected"; } ?>>Scholars</option>
                                                    <option value="4" <?php if(@$banner['user_type']==4){ echo "selected"; } ?>>Project Staff</option>
                                                    <option value="5" <?php if(@$banner['user_type']==5){ echo "selected"; } ?>>Students</option>
                                                    <option value="6" <?php if(@$banner['user_type']==6){ echo "selected"; } ?>>Technical Staff</option>
                                                    <option value="7" <?php if(@$banner['user_type']==7){ echo "selected"; } ?>>Supporting Staff</option>
                                                    <option value="8" <?php if(@$banner['user_type']==8){ echo "selected"; } ?>>External</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_name" class="control-label col-lg-3 col-md-3 col-sm-4">Category Name</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" class="form-control required" id="designation" name="designation" placeholder="Designation" value="<?php echo @$banner['designation']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 col-md-3 col-sm-4 control-label">Status</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <select class="form-control" name="status">
                                                    <option value="1" <?php if(@$banner['status']==1){ echo "selected"; } ?>>Active</option>
                                                    <option value="2" <?php if(@$banner['status']==2){ echo "selected"; } ?>>Inactive</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-10">
                                                <button class="btn btn-success_cust waves-effect waves-light m-b-5" type="submit">Save</button>
                                                <a href="admin/designation"><button class="btn btn-success_cust waves-effect waves-light m-b-5" type="button">Back</button></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                           <!-- panel-body -->
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