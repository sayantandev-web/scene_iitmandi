<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="images/fav.png" sizes="32x32" />
   <title><?php echo $page_title; ?></title>
   <head>
      <?php echo $header_scripts; ?>
   </head>
   <body class="fixed-left">
      <!-- Begin page -->
      <div id="wrapper">
         <?php echo $header; ?>
         <?php echo $sidebar; ?>
         <!-- ============================================================== -->
         <!-- Start right Content here -->
         <!-- ============================================================== -->
         <div class="content-page">
            <!-- Start content -->
            <div class="content">
               <div class="container">
                  <!-- Page-Title -->
                  <div class="row">
                     <div class="col-sm-12">
                        <h4 class="pull-left page-title">Video Management</h4>
                        <ol class="breadcrumb pull-right">
                           <a href="admin/video/add_video"><button class="btn btn-success_cust waves-effect waves-light m-b-5" type="submit">Add Video</button></a>
                        </ol>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h3 class="panel-title">Video Management</h3>
                           </div>
                           <div class="clearfix"></div>
                           <div class="panel-body">
                              <?php echo $this->utilitylib->showMsg();?>
                                                            <div class="col-lg-12">
                                 <form id ="frm" role="form" method="post" name="sign_up_form" action="">
                                    <div class="form-group">
                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                          <label>Status</label>
                                          <select class="form-control" name="status">
                                             <option value="">Select Status</option>
                                             <option value="1" <?php if(@$status==1) {?>selected <?php } ?>>Active</option>
                                             <option value="2" <?php if(@$status==2) {?>selected <?php } ?>>Inactive</option>
                                          </select>
                                       </div>
                                       <div class="clearfix"></div>
                                       <div class="col-lg-3 col-md-3 col-sm-6">
                                          <button class="btn btn-success_cust waves-effect waves-light m-b-5" type="submit">Search</button>
                                       </div>
                                       <div class="clearfix"></div>
                                    </div>
                                 </form>
                              </div>
                              <div class="row">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered dat_tbl">
                                       <thead>
                                          <tr>
                                             <th>Sl No.</th>
                                             <th>Video Title</th>
                                             <th>Video</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php if(!empty($videos)) {
                                             $i=1; ?>
                                          <?php foreach($videos as $row) { ?>
                                          <tr>
										               <td><?php echo $i; ?></td>
                                             <td><?php echo $row['title']; ?></td>
                                             <td><iframe width="250" height="100" src="//www.youtube.com/embed/<?php echo $row['file_name']; ?>" allowfullscreen></iframe></td>
                                             <td>
											            <?php if($row['status']==1) { ?>
                                                <a href="admin/video/change_status/<?php echo $row['id']; ?>" class="btn btn-info waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Inactive Status"><i class="fa fa-check" aria-hidden="true" onclick="return confirm('Are you sure you want to inactive status of this video?')"></i></a>
                                                <?php } else { ?>
                                                <a href="admin/video/change_status/<?php echo $row['id']; ?>" class="btn btn-pink waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Active Status" onclick="return confirm('Are you sure you want to active status of this video?')"><i class="fa fa-remove"></i></a>
                                                <?php } ?>
                                                <a href="admin/video/video_delete/<?php echo $row['id']; ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete this video?')">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                             </td>
                                          </tr>
                                          <?php $i++; } } else {?>
                                          <tr>
                                             <td colspan="4">No Record Found</td>
                                          </tr>
                                          <?php } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php echo $footer; ?>
         </div>
      </div>
      <!-- END wrapper -->
      <?php echo $footer_scripts; ?>
   </body>
</html>
