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
         <div class="content-page">
            <!-- Start content -->
            <div class="content">
               <div class="container">
                  <!-- Page-Title -->
                  <div class="row">
                     <div class="col-sm-12">
                        <h4 class="pull-left page-title">Change Password</h4>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h3 class="panel-title">Change Password</h3>
                           </div>
                           <div class="panel-body">
                           <?php echo $this->utilitylib->showMsg();?>
                              <div class="form">
                                 <form class="cmxform form-horizontal tasi-form" id="editForm" method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                       <label for="current_pass" class="control-label col-lg-3 col-md-3 col-sm-4">Old Password (required)</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input class="form-control" id="current_pass" name="current_pass" type="password" required aria-required="true">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="password" class="control-label col-lg-3 col-md-3 col-sm-4">Password (required)</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input class="form-control" id="password" name="password" type="password" required aria-required="true">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="confirm_pass" class="control-label col-lg-3 col-md-3 col-sm-4">Confirm Password (required)</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input class="form-control" id="confirm_pass" type="password" name="confirm_pass" required aria-required="true">
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
      <?php echo $footer_scripts; ?>
      <script src="assets/js/jquery.validate.min.js"></script>
      <script>
      $( document ).ready(function() {
         $("#editForm").validate({
            rules:{
               current_pass:{required:true},
               password:{required:true, minlength:5},
               confirm_pass:{equalTo:$("#password")}
            }
         });
      });
      </script>
   </body>
</html>
