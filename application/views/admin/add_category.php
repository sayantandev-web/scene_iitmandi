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
                                            <label for="category_name" class="control-label col-lg-3 col-md-3 col-sm-4">Category Name</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" class="form-control required" id="category_name" name="category_name" placeholder="Category Name" value="<?php echo @$research_category['category_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 col-md-3 col-sm-4 control-label">Status</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <select class="form-control" name="status">
                                                    <option value="1" <?php if(@$research_category['status']==1){ echo "selected"; } ?>>Active</option>
                                                    <option value="2" <?php if(@$research_category['status']==2){ echo "selected"; } ?>>Inactive</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-10">
                                                <button class="btn btn-success_cust waves-effect waves-light m-b-5" type="submit">Save</button>
                                                <a href="admin/<?php echo $this->uri->segment(2); ?>/category_list"><button class="btn btn-success_cust waves-effect waves-light m-b-5" type="button">Back</button></a>
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