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
                                <?php 
                                //echo "<pre>"; print_r($roleAccessList); die; 
                                echo $this->utilitylib->showMsg();?>
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" id="accessForm" method="post" action="<?= base_url().'admin/roles/add_access'?>"  enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="role_name" class="control-label col-lg-3 col-md-3 col-sm-4">First Name</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" class="form-control required" id="fname" name="fname" placeholder="First Name" value="<?php echo @$userdetails->fname; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="role_name" class="control-label col-lg-3 col-md-3 col-sm-4">Last Name</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" class="form-control required" id="lname" name="lname" placeholder="Last Name" value="<?php echo @$userdetails->lname; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="role_name" class="control-label col-lg-3 col-md-3 col-sm-4">Email</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="email" class="form-control required" id="email" name="email" placeholder="Email" value="<?php echo @$userdetails->email; ?>">
                                            </div>
                                        </div>
                                        <?php if(empty(@$userdetails->user_id)) { ?>
                                        <div class="form-group">
                                            <label for="role_name" class="control-label col-lg-3 col-md-3 col-sm-4">Password</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="password" class="form-control required" id="password" name="password" placeholder="Password" value="<?php echo @$role['role_name']; ?>">
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label class="col-lg-3 col-md-3 col-sm-4 control-label">Page Name</label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <div class="pf-field custom-select">
                                                    <select class="form-control pageList" multiple="multiple" name="pageList[]" id="pageList" style="width: 100%;">
                                                    <?php
                                                    //$skills = $this->Crud_model->GetData('specialist',"","status = 'Active'");
                                                    foreach($pageList as $val) {?>
                                                        <option value="<?php echo $val['page_name']; ?>"
                                                        <?php if(!empty($roleAccessList->page_list)) {
                                                            if(!empty($pageList)){
                                                                $rollal = explode(",", $roleAccessList->page_list);
                                                                for($i=0; $i<count($rollal); $i++) {
                                                                    if($rollal[$i] == $val['page_name']){
                                                                        echo "selected";
                                                                    }
                                                                }
                                                            }
                                                        } ?>><?php echo $val['page_name'];?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                                <span id="errSkill" style="color:red"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-10">
                                                <input type="hidden" name="uid" id="uid" value="<?= @$userdetails->user_id?>"/>
                                                <button class="btn btn-success_cust waves-effect waves-light m-b-5" type="submit">Save</button>
                                                <a href="admin/roles/role_access_list"><button class="btn btn-success_cust waves-effect waves-light m-b-5" type="button">Back</button></a>
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
</body>
</html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script>
$('.pageList').select2({
    //tags: true,
    tokenSeparators: [','],
    placeholder: "Select or Type Page Name"
});
</script>