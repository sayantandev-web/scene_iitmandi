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
                                <h3 class="panel-title">Settings</h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->utilitylib->showMsg();?>
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" id="editForm" method="post" action="admin/Settings/site_settings" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="location1" class="control-label col-lg-3 col-md-3 col-sm-4">Address</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <textarea class="form-control" type="text" name="location1"><?php echo strip_tags(@$result[0]['location1']); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cemail" class="control-label col-lg-3 col-md-3 col-sm-4">Email Address (required)</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input class="form-control" id="cemail" type="email" name="email" required aria-required="true" value="<?php echo @$result[0]['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact" class="control-label col-lg-3 col-md-3 col-sm-4">Contact Number</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input class="form-control" type="tel" name="contact" value="<?php echo @$result[0]['contact']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="facekbook_url" class="control-label col-lg-3 col-md-3 col-sm-4">Facebook Link</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input class="form-control" id="facekbook_url" type="url" name="facekbook_url" value="<?php echo @$result[0]['facekbook_url']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pintrest_url" class="control-label col-lg-3 col-md-3 col-sm-4">Instagram Link</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input class="form-control" id="instagram_url" type="url" name="instagram_url" value="<?php echo @$result[0]['instagram_url']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="linkedin_url" class="control-label col-lg-3 col-md-3 col-sm-4">Youtube Link</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input class="form-control" id="youtube_url" type="url" name="youtube_url" value="<?php echo @$result[0]['youtube_url']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="linkedin_url" class="control-label col-lg-3 col-md-3 col-sm-4">Twitter Link</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input class="form-control" id="twitter_link" type="url" name="twitter_link" value="<?php echo @$result[0]['twitter_link']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="linkedin_url" class="control-label col-lg-3 col-md-3 col-sm-4">Linkedin Link</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input class="form-control" id="linkedin_url" type="url" name="linkedin_url" value="<?php echo @$result[0]['linkedin_url']; ?>">
                                            </div>
                                        </div>
                                        <?php if(@$result[0]['dprtmnt_pic'] !=""){ ?>
                                        <div class="form-group">
                                            <label for="about_me" class="control-label col-lg-3 col-md-3 col-sm-4">Depertment Logo</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <?php if(@$result[0]['dprtmnt_pic']){ ?>
                                                <img src="<?php echo base_url(); ?>uploads/site_logo/thumb/<?php echo @$result[0]['dprtmnt_pic']; ?>" alt="<?php echo @$result[0]['dprtmnt_pic']; ?>">
                                                <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>images/no-img.png" alt="no-img.png">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label for="about_me" class="control-label col-lg-3 col-md-3 col-sm-4">Depertment Logo</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <div class="fileupload btn btn-primary_cust waves-effect waves-light">
                                                    <input type="file" name="dprtmnt_pic" id="dprtmnt_pic" class="upload">
                                                    <span id="image_name1"></span>
                                                </div>
                                                <label for="about_me" class="control-label" style="color:red;">Image size must be 200px X 58px</label>
                                            </div>
                                        </div>
                                        <?php if(@$result[0]['profile_pic'] !=""){ ?>
                                        <div class="form-group">
                                            <label for="about_me" class="control-label col-lg-3 col-md-3 col-sm-4">Site Logo</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <?php if(@$result[0]['profile_pic']){ ?>
                                                <img src="<?php echo base_url(); ?>uploads/site_logo/thumb/<?php echo @$result[0]['profile_pic']; ?>" alt="<?php echo @$result[0]['profile_pic']; ?>">
                                                <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>images/no-img.png" alt="no-img.png">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label for="about_me" class="control-label col-lg-3 col-md-3 col-sm-4">Site Logo</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <div class="fileupload btn btn-primary_cust waves-effect waves-light">
                                                    <input type="file" name="profile_pic" id="profile_pic" class="upload">
                                                    <span id="image_name1"></span>
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
            $('#profile_pic').change(function(e){
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