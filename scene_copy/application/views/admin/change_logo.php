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
                        <h4 class="pull-left page-title">Change Logo</h4>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h3 class="panel-title">Change Logo</h3>
                           </div>
                           <div class="panel-body">
                           <?php echo $this->utilitylib->showMsg();?>
                              <div class="form">
                                 <form class="cmxform form-horizontal tasi-form" method="post" action="" enctype="multipart/form-data">
                                    <input name="hiddenimage" type="hidden">
                                    <div class="form-group">
                                       <div class="col-lg-3 col-md-3 col-sm-6">
                                          <div class="gal-detail thumb">
                                             <img src="assets/images/logo/<?php echo @$result[0]['logo']; ?>" class="thumb-img" alt="logo">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="about_me" class="control-label col-lg-3 col-md-3 col-sm-4">Logo</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <div class="fileupload btn btn-primary_cust waves-effect waves-light">
                                             <span>Upload</span>
                                             <input type="file" name="logo" id="logo" class="upload">
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
      <script>
         $( document ).ready(function() {
            $('#logo').change(function(e){
            var fileName = e.target.files[0].name;
            $('#image_name1').html(fileName);
            });
         });
      </script>
   </body>
</html>
