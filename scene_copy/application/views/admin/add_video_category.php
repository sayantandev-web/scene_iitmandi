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
                        <h4 class="pull-left page-title"><?php echo $page_title; ?></h4>
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
                              <div class="form">
                                 <form class="cmxform form-horizontal tasi-form" id="editForm" method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                       <label for="category_name" class="control-label col-lg-3 col-md-3 col-sm-4">Category Name</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control required" id="category_name" name="category_name" placeholder="Category Name" value="<?php echo @$video_category['category_name']; ?>">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-lg-3 col-md-3 col-sm-4 control-label">Status</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <select class="form-control" name="status">
                                             <option value="1" <?php if(@$video_category['status']==1){ echo "selected"; } ?>>Active</option>
                                             <option value="2" <?php if(@$video_category['status']==2){ echo "selected"; } ?>>Inactive</option>
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
                              <!-- .form -->
                           </div>
                           <!-- panel-body -->
                        </div>
                        <!-- panel -->
                     </div>
                     <!-- col -->
                  </div>
                  <!-- End row -->
               </div>
            </div>
            <?php echo $footer; ?>
         </div>
      </div>
      <!-- END wrapper -->
      <?php echo $footer_scripts; ?>
     <script src="assets/js/jquery.validate.min.js"></script>
      <script>
         $(document).ready(function() {
            $("#editForm").validate();
         });
      </script>
   </body>
</html>