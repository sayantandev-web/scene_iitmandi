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
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered dat_tbl">
                                            <thead>
                                                <tr>
                                                    <th>Category Name</th>
                                                    <th>Category Slug</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($research_category_lists)) { ?>
                                                <?php foreach($research_category_lists as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row['category_name']; ?></td>
                                                    <td><?php echo $row['slug']; ?></td>
                                                    <td>
                                                        <a onClick="javascript: return confirm('Are you sure you want to restored this category?');" href="admin/news/restore_trash_category/<?php echo $row['id']; ?>" class="btn btn-info waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Inactive Status"><i class="fa fa-undo" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                <?php } } else {?>
                                                <!-- <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr> -->
                                                <?php } ?>
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