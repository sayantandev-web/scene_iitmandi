<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="images/fav.png" sizes="32x32" />
<title><?php echo $page_title; ?></title>
<head>
    <?php echo $header_scripts; ?>
    <style type="text/css">
        table td {overflow: scroll;height: 200px;}
        .btn {padding: 3px 3px !important;}
    </style>
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
                            <div class="panel-heading" style="display: flow-root;">
                                <h3 class="panel-title" style="float: left;"><?php echo $page_title; ?></h3>
                                <a href="admin/labequipment/add_labequipment" style="float: right;background: #3c8dbc;padding: 10px;color: #fff;">Add Equipment</a>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->utilitylib->showMsg();?>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered dat_tbl">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Equipment Name</th>
                                                    <th>Lab Name</th>
                                                    <th style="width: 160px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($labequipment)) {
                                                    $i=1; ?>
                                                <?php foreach($labequipment as $row) { ?>
                                                <tr>
                                                    <td>
                                                        <?php if(@$row['eqpmnt_img']){ ?>
                                                        <img src="<?php echo base_url(); ?>uploads/labequipment/thumb/<?php echo $row['eqpmnt_img']; ?>" alt="<?php echo $row['eqpmnt_img']; ?>" width="116" height="87">
                                                        <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>uploads/no-img.jpg" alt="no-img.jpg">
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo $row['equipment_name'] ?></td>
                                                    <?php 
                                                        //echo "SELECT * from iitmandi_labequipment where page_slug = '".$row['lab_name']."'";
                                                        $labname = $this->db->query("SELECT * from iitmandi_labsection where page_slug = '".$row['lab_name']."'");
                                                        foreach($labname->result_array() as $row1) { ?>
                                                            <td><?php echo $row1['labname']; ?></td>
                                                        <?php } ?>
                                                    <td>
                                                        <a href="admin/labequipment/add_labequipment/<?php echo $row['id']; ?>" class="btn btn-info waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <?php if($row['status']==1) { ?>
                                                            <a href="admin/labequipment/change_status/<?php echo $row['id']; ?>" class="btn btn-info waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Inactive Status"><i class="fa fa-check" aria-hidden="true" onclick="return confirm('Are you sure you want to inactive status of this?')"></i></a>
                                                        <?php } else { ?>
                                                            <a href="admin/labequipment/change_status/<?php echo $row['id']; ?>" class="btn btn-pink waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Active Status" onclick="return confirm('Are you sure you want to active status of this?')"><i class="fa fa-remove"></i></a>
                                                        <?php } ?>
                                                        <a href="admin/labequipment/labequipment_delete/<?php echo $row['id']; ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $i++; } } ?>
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
    <script>
    $(function(){
        $('.replycomment').hide();
        $(".showhidereply").click(function(){
            var $toggle = $(this);
            var id = "#replycomment_" + $toggle.data('id'); 
            $(id).toggle();
        });

        $('.reset_pass').hide();
        $(".showhidereset_pass").click(function() {
            var $toggle1 = $(this);
            var id1 = "#reset_pass_" + $toggle1.data('id'); 
            $(id1).toggle();
        });
        <?php $i=1; 
        foreach($team as $row) { ?>
        $('.set_password_<?php echo $i;?>').click(function() {
            var newpass = $('#newpass_<?php echo $i?>').val();
            var uid = $('#u_id_<?php echo $i?>').val();
            $.post(
                "<?php echo base_url('admin/ourteam/reset_password') ?>", {uid: uid, newpass: newpass}, 
                function(result){
                    if(result) {
                        $("#success_<?php echo $i?>").html(result);
                        setTimeout(function(){
                            window.location.reload();
                        }, 2000);
                    }
                }
            )
        })
        <?php $i++; } ?>
    });
    </script>
</body>
</html>