<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="images/fav.png" sizes="32x32" />
<title><?php echo $page_title; ?></title>
<head>
   <?php echo $header_scripts; ?>
   <style>
      .bootstrap-select .dropdown-toggle .filter-option {position: relative !important;}
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
                            <div class="panel-heading">
                                <?php echo $page_title; ?>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->utilitylib->showMsg();?>
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" id="editForm" method="post" action=""  enctype="multipart/form-data">
                                    <div class="form-group">
                                       <label for="banner_title" class="control-label col-lg-3 col-md-3 col-sm-4">Name of the Lab</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control" id="labname" name="labname" placeholder="Name of the Lab" value="<?php echo @$labsection['labname']; ?>">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="banner_title" class="control-label col-lg-3 col-md-3 col-sm-4">Description</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <textarea class="form-control" type="text" name="description" rows="15"><?php echo @$labsection['description']; ?></textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-lg-3 col-md-3 col-sm-4 control-label">Type of Lab</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <select class="form-control" id="typeofLab" name="typeofLab" require>
                                             <option value="">Choose an Option</option>
                                             <option value="1" <?php if(@$labsection['typeofLab']==1){ echo "selected"; } ?>>Teaching</option>
                                             <option value="2" <?php if(@$labsection['typeofLab']==2){ echo "selected"; } ?>>Research</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group lspecialization">
                                       <label for="banner_title" class="control-label col-lg-3 col-md-3 col-sm-4">Specialization</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <select class="form-control" id="specialization" name="specialization">
                                             <option value="">Choose an Option</option>
                                             <option value="Environmental Engineering" <?php if(@$labsection['specialization'] == 'Environmental Engineering'){ echo "selected"; } ?>>Environmental Engineering</option>
                                             <option value="Geotechnical Engineering" <?php if(@$labsection['specialization'] == 'Geotechnical Engineering'){ echo "selected"; } ?>>Geotechnical Engineering</option>
                                             <option value="Structural Engineering" <?php if(@$labsection['specialization'] == 'Structural Engineering'){ echo "selected"; } ?>>Structural Engineering</option>
                                             <option value="Water Resources Engineering" <?php if(@$labsection['specialization'] == 'Water Resources Engineering'){ echo "selected"; } ?>>Water Resources Engineering</option>
                                             <option value="Transportation Engineering" <?php if(@$labsection['specialization'] == 'Transportation Engineering'){ echo "selected"; } ?>>Transportation Engineering</option>
                                             <option value="Remote Sensing and GIS" <?php if(@$labsection['specialization'] == 'Remote Sensing and GIS'){ echo "selected"; } ?>>Remote Sensing and GIS</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group coordinator">
                                       <label for="banner_title" class="control-label col-lg-3 col-md-3 col-sm-4">Coordinator</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <select class="form-control" id="coordinator" name="coordinator">
                                          <option value="">Choose an Option</option>
                                          <?php if(!empty($ourteam)) { 
                                             foreach($ourteam as $row) { ?>
                                             <option value="<?php echo $row['id']?>" <?php if(@$labsection['coordinator'] == $row['id']){ echo "selected"; } ?> ><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?></option>
                                          <?php  } } else { ?>
                                             <option value="">No Data</option>
                                             <?php } ?>
                                          </select>
                                       </div> 
                                    </div>
                                    <div class="form-group coCoordinators">
                                       <label for="banner_title" class="control-label col-lg-3 col-md-3 col-sm-4">Co-Coordinators</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <!-- <select class="selectpicker form-control" id="cocoordinators" name="cocoordinators[]" multiple data-live-search="true"> -->
                                          <select class="form-control" id="cocooordinator" name="cocooordinator">
                                             <option value="">Choose an Option</option>
                                             <?php if(!empty($ourteam)) { 
                                                foreach($ourteam as $row) { ?>
                                                <option value="<?php echo $row['id']?>" <?php if(@$labsection['cocooordinator'] == $row['id']){ echo "selected"; } ?> ><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?></option>
                                             <?php  } } else { ?>
                                                <option value="">No Data</option>
                                                <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group external_link">
                                       <label for="banner_title" class="control-label col-lg-3 col-md-3 col-sm-4">External Link</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control" id="external_link" name="external_link" placeholder="External Link" value="<?php echo @$labsection['external_link']; ?>">
                                       </div>
                                    </div>
                                    <?php if(!empty($labsection)){ ?>
                                    <div class="form-group">
                                       <label for="about_me" class="control-label col-lg-3 col-md-3 col-sm-4">Team Image</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <?php if(@$labsection['cover_photo']){ ?>
                                          <img style="width: 200px" src="<?php echo base_url(); ?>uploads/labsection/thumb/<?php echo @$labsection['cover_photo']; ?>" alt="<?php echo @$labsection['cover_photo']; ?>" />
                                          <?php } else { ?>
                                          <img src="<?php echo base_url(); ?>images/no-img.png" alt="no-img.png">
                                          <?php } ?>
                                       </div>
                                    </div>
                                    <?php } ?>
                                    <div class="form-group">
                                       <label for="about_me" class="control-label col-lg-3 col-md-3 col-sm-4">Upload Team Image</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <div class="fileupload btn btn-primary_cust waves-effect waves-light">
                                             <input type="file" name="cover_photo" id="cover_photo" class="upload">
                                             <span id="image_name1"></span>
                                          </div>
                                          <div class="clearfix"></div>
                                          <label for="about_me" class="control-label" style="color:red;">Image size must be Less than 1MB (640px X 640px)</label>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-lg-3 col-md-3 col-sm-4 control-label">Status</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <select class="form-control" name="status">
                                             <option value="1" <?php if(@$labsection['status']==1){ echo "selected"; } ?>>Active</option>
                                             <option value="2" <?php if(@$labsection['status']==2){ echo "selected"; } ?>>Inactive</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-lg-offset-3 col-lg-10">
                                          <button class="btn btn-success_cust waves-effect waves-light m-b-5" type="submit">Save</button>
                                          <a href="admin/labsection"><button class="btn btn-success_cust waves-effect waves-light m-b-5" type="button">Back</button></a>
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