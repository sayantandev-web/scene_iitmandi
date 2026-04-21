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
                    <li><a href="admin"><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="active"><?php echo $page_title; ?></li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo $page_title; ?>
                            </div>
                            <div class="panel-body">
                                <!-- Display status message -->
                                <?php if(!empty($success_msg)){ ?>
                                <div class="col-xs-12">
                                    <div class="alert alert-success"><?php echo $success_msg; ?></div>
                                </div>
                                <?php } ?>
                                <?php if(!empty($error_msg)){ ?>
                                <div class="col-xs-12">
                                    <div class="alert alert-danger"><?php echo $error_msg; ?></div>
                                </div>
                                <?php } ?>
                                <form class="cmxform form-horizontal tasi-form" id="editForm" method="post" action="<?php echo base_url('admin/alumni/import'); ?>"  enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="about_me" class="control-label col-lg-3 col-md-3 col-sm-4">Upload data</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <div class="fileupload btn btn-primary_cust waves-effect waves-light">
                                                <input type="file" name="file" id="file" class="upload">
                                            </div>
                                            <!-- <label for="about_me" class="control-label" style="color:red;">Size must be Less than 2MB</label> -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-10">
                                            <!-- <button class="btn btn-success_cust waves-effect waves-light m-b-5" type="submit">Upload</button> -->
                                            <input class="btn btn-success_cust waves-effect waves-light m-b-5" type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
                                        </div>
                                    </div>
                                </form>
                                <table class="table table-striped table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($members)){ foreach($members as $row){ ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                        </tr>
                                        <?php } }else{ ?>
                                        <tr><td colspan="5">No member(s) found...</td></tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $footer; ?>
            </section>
        </div>
    </div>
    <script>
    function formToggle(ID){
        var element = document.getElementById(ID);
        if(element.style.display === "none"){
            element.style.display = "block";
        }else{
            element.style.display = "none";
        }
    }
    </script>
    <?php echo $footer_scripts; ?>
</body>
</html>