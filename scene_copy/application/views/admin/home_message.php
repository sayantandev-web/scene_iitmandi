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
                <h1><?php echo $page_title; ?><small>Control Panel</small></h1>
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
                                <h3 class="panel-title">Home Messege</h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->utilitylib->showMsg();?>
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" id="editForm" method="post" action="admin/Homemessage/home_message" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Chair Person's Name</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" class="form-control required" id="cp_name" name="cp_name" placeholder="Chair Person's Name" value="<?php echo @$result[0]['name']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Designation</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" class="form-control required" id="designation" name="designation" placeholder="designation" value="<?php echo @$result[0]['designation']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Location</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                            <textarea class="form-control" type="text" name="location"><?php echo strip_tags(@$result[0]['location']); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="location1" class="control-label col-lg-3 col-md-3 col-sm-4">Home Messege Content</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <textarea class="form-control" type="text" name="description" rows="15"><?php echo strip_tags(@$result[0]['description']); ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <?php if(@$result[0]['homemsg_img'] !="") { ?>
                                        <div class="form-group">
                                            <label for="about_me" class="control-label col-lg-3 col-md-3 col-sm-4">Image</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <?php if(@$result[0]['homemsg_img']) { ?>
                                                <img src="<?php echo base_url(); ?>uploads/homemessage/thumb/<?php echo @$result[0]['homemsg_img']; ?>" alt="<?php echo @$result[0]['homemsg_img']; ?>">
                                                <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>images/no-img.png" alt="no-img.png">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label for="about_me" class="control-label col-lg-3 col-md-3 col-sm-4">Image Upload</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <div class="fileupload btn btn-primary_cust waves-effect waves-light">
                                                    <input type="file" name="homemsg_img" id="homemsg_img" class="upload">
                                                    <!-- <span id="image_name1"></span> -->
                                                </div>
                                                <label for="about_me" class="control-label" style="color:red;">Image size must be 200px X 58px</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-10">
                                                <button class="btn btn-success_cust waves-effect waves-light m-b-5" type="submit">Save</button>
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
    <script src="assets/js/jquery.validate.min.js"></script>
    <script>
        $( document ).ready(function() {
            $("#editForm").validate();
            $('#homeabt_img').change(function(e){
                var fileName = e.target.files[0].name;
                $('#image_name1').html(fileName);
            });
            $('#modal_image').change(function(e){
                var fileName1 = e.target.files[0].name;
                $('#image_name2').html(fileName1);
            });
        });
    </script>
</body>
</html>