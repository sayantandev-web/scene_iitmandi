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
                <h1>Profile<small>Control panel</small></h1>
                <ol class="breadcrumb">
                    <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Profile</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Edit Profile</h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->utilitylib->showMsg();?>
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" id="editForm" method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="cname" class="control-label col-lg-3 col-md-3 col-sm-4">First Name (required)</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input class="form-control" name="fname" type="text" required aria-required="true" value="<?php echo @$result[0]['fname']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                           <label for="cname" class="control-label col-lg-3 col-md-3 col-sm-4">Last Name (required)</label>
                                           <div class="col-lg-9 col-md-9 col-sm-8">
                                              <input class="form-control" name="lname" type="text" required aria-required="true" value="<?php echo @$result[0]['lname']; ?>">
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
                                            <div class="col-lg-3 col-md-3 col-sm-6"></div>
                                            <div class="col-lg-3 col-md-3 col-sm-6">
                                                <div class="gal-detail">
                                                    <img src="assets/images/users/thumb/<?php echo @$result[0]['profile_pic']; ?>" alt="profile picture">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="about_me" class="control-label col-lg-3 col-md-3 col-sm-4">Profile Picture</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <div class="fileupload btn btn-primary_cust waves-effect waves-light">
                                                    <input type="file" name="profile_pic" id="profile_pic" class="upload">
                                                    <span id="image_name1"></span>
                                                </div>
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
