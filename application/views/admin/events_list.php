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
                        <ol class="breadcrumb pull-right">
                            <a href="admin/<?php echo $this->uri->segment(2); ?>/add_events"><button class="btn btn-info waves-effect waves-light m-b-5" type="submit">Add Event</button></a>
                        </ol>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               <h3 class="panel-title"><?php echo $page_title; ?></h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->utilitylib->showMsg();?>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered dat_tbl">
                                            <thead>
                                                <tr>
                                                    <th>SL No</th>
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Venue</th>
                                                    <th>Event Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($events)) { 
                                                    $i = 1;
                                                    foreach($events as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><img src="<?php echo base_url()?>uploads/events/thumb/<?php echo $row['event_image']; ?>"></td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td><?php echo $row['location']; ?></td>
                                                    <td>
                                                        <?php echo $date = date("D, d M Y", strtotime($row['event_date']));?></td>
                                                    <td>
                                                        <a href="admin/<?php echo $this->uri->segment(2); ?>/add_events/<?php echo $row['id']; ?>" class="btn btn-inverse waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <?php if($row['status']==1) { ?>
                                                        <a onclick="return confirm('Are you sure you want to inactive?')" href="admin/<?php echo $this->uri->segment(2); ?>/change_status/<?php echo $row['id']; ?>" class="btn btn-info waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Inactive Status"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <?php } else { ?>
                                                        <a onclick="return confirm('Are you sure you want to active?')" href="admin/<?php echo $this->uri->segment(2); ?>/change_status/<?php echo $row['id']; ?>" class="btn btn-pink waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Active Status"><i class="fa fa-remove"></i></a>
                                                        <?php } ?>
                                                        <a href="admin/<?php echo $this->uri->segment(2); ?>/events_delete/<?php echo $row['id']; ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
    $(document).ready(function(){
        $('#frm').submit(function(){});
        $(".pagination a").click(function(){
            var url=$(this).attr('href');
            $("#frm").attr('action',url);
            $("#frm").submit();
            return false;
        });
    });
    </script>
</body>
</html>