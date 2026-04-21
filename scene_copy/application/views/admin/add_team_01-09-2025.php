<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="images/fav.png" sizes="32x32" />
<title><?php echo $page_title; ?></title>
<head>
   <?php echo $header_scripts; ?>
   <style>
      .dropdown-toggle { height: 34px !important;}
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
                <?php $uid = $this->session->userdata('uid'); ?>
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
                                       <label for="banner_title" class="control-label col-lg-3 col-md-3 col-sm-4">First Name</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?php echo @$banner['fname']; ?>">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="banner_title" class="control-label col-lg-3 col-md-3 col-sm-4">Middle Name</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name" value="<?php echo @$banner['mname']; ?>">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="banner_title" class="control-label col-lg-3 col-md-3 col-sm-4">Last Name</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?php echo @$banner['lname']; ?>">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="banner_title" class="control-label col-lg-3 col-md-3 col-sm-4">Email</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="email" class="form-control" id="email" name="email" placeholder="User Email" value="<?php echo @$banner['email']; ?>">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-lg-3 col-md-3 col-sm-4 control-label">User Type</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <select class="form-control" id="position" name="position" require>
                                             <option value="">Choose an Option</option>
                                             <?php if ($uid == '-1') { ?>
                                                <option value="1" <?php if(@$banner['position']==1){ echo "selected"; } ?>>Faculty</option>
                                                <option value="2" <?php if(@$banner['position']==2){ echo "selected"; } ?>>Postdocs</option>
                                                <option value="3" <?php if(@$banner['position']==3){ echo "selected"; } ?>>Scholars</option>
                                                <option value="4" <?php if(@$banner['position']==4){ echo "selected"; } ?>>Project Staff</option>
                                                <option value="5" <?php if(@$banner['position']==5){ echo "selected"; } ?>>Students</option>
                                                <option value="6" <?php if(@$banner['position']==6){ echo "selected"; } ?>>Technical Staff</option>
                                                <option value="7" <?php if(@$banner['position']==7){ echo "selected"; } ?>>Supporting Staff</option>
                                                <option value="8" <?php if(@$banner['position']==8){ echo "selected"; } ?>>External</option>
                                             <?php } else { ?>
                                                <option value="8" <?php if(@$banner['position']==8){ echo "selected"; } ?>>External</option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group enrollno">
                                       <label for="banner_title1" class="control-label col-lg-3 col-md-3 col-sm-4">Enrollment No</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control" id="enrollno" name="enrollno" placeholder="Enrollment No" value="<?php echo @$banner['enrollno']; ?>">
                                       </div>
                                    </div>
                                    <div class="form-group pddesignation">
                                       <label for="banner_title1" class="control-label col-lg-3 col-md-3 col-sm-4">Designation</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <select class="form-control" id="designation" name="designation">
                                          <option value="">Choose an Option</option>
                                          <?php if(!empty($designation)) { 
                                             foreach($designation as $row) { ?>
                                             <option value="<?php echo $row['id']?>" <?php if(@$banner['designation'] == $row['id']){ echo "selected"; } ?>><?php echo $row['designation']?></option>
                                          <?php  } } else { ?>
                                             <option value="">No Data</option>
                                          <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group supervisor">
                                       <label for="banner_title" class="control-label col-lg-3 col-md-3 col-sm-4">Supervisor</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <select class="form-control" id="supervisor" name="supervisor">
                                          <option value="">Choose an Option</option>
                                          <?php if(!empty($ourteam)) { 
                                             foreach($ourteam as $row) { ?>
                                             <option value="<?php echo $row['id']?>"><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?></option>
                                          <?php  } } else { ?>
                                             <option value="">No Data</option>
                                          <?php } ?>
                                          </select>
                                       </div> 
                                    </div>
                                    <div class="form-group cosupervisors">
                                       <label for="banner_title" class="control-label col-lg-3 col-md-3 col-sm-4">Co-Supervisors</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <select class="selectpicker form-control" id="cosupervisors" name="cosupervisors[]" multiple data-live-search="true">
                                             <?php if(!empty($ourteam)) { 
                                                foreach($ourteam as $row) { ?>
                                                <option value="<?php echo $row['id']?>"><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?></option>
                                             <?php  } } else { ?>
                                                <option value="">No Data</option>
                                                <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group post">
                                       <label for="banner_title1" class="control-label col-lg-3 col-md-3 col-sm-4">Post</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control" id="post" name="post" placeholder="Post" value="<?php echo @$banner['post']; ?>">
                                       </div>
                                    </div>
                                    <div class="form-group lab">
                                       <label for="banner_title1" class="control-label col-lg-3 col-md-3 col-sm-4">Lab</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control" id="lab" name="lab" placeholder="Lab" value="<?php echo @$banner['lab']; ?>">
                                       </div>
                                    </div>
                                    <div class="form-group mobile">
                                       <label for="banner_title1" class="control-label col-lg-3 col-md-3 col-sm-4">Phone</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Phone" value="<?php echo @$banner['mobile']; ?>" maxlength=10>
                                       </div>
                                    </div>
                                    <div class="form-group office">
                                       <label for="banner_title1" class="control-label col-lg-3 col-md-3 col-sm-4">Office</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control" id="office" name="office" placeholder="Office" value="<?php echo @$banner['office']; ?>">
                                       </div>
                                    </div>
                                    <div class="form-group specialization">
                                       <label for="banner_title1" class="control-label col-lg-3 col-md-3 col-sm-4">Specialization</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <select class="form-control" id="specialization" name="specialization" require>
                                             <option value="">Choose an Option</option>
                                             <option value="1" <?php if(@$banner['specialization']==1){ echo "selected"; } ?>>Environmental Engineering</option>
                                             <option value="2" <?php if(@$banner['specialization']==2){ echo "selected"; } ?>>Geotechnical Engineering</option>
                                             <option value="3" <?php if(@$banner['specialization']==3){ echo "selected"; } ?>>Structural Engineering</option>
                                             <option value="4" <?php if(@$banner['specialization']==4){ echo "selected"; } ?>>Water Resources Engineering</option>
                                             <option value="5" <?php if(@$banner['specialization']==5){ echo "selected"; } ?>>Transportation Engineering</option>
                                             <option value="6" <?php if(@$banner['specialization']==6){ echo "selected"; } ?>>Remote Sensing and GIS</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group research_keyword">
                                       <label for="banner_title1" class="control-label col-lg-3 col-md-3 col-sm-4">Research Keyword</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control" id="research_keyword" name="research_keyword" placeholder="Research Keyword" value="<?php echo @$banner['research_keyword']; ?>" maxlength=100>
                                       </div>
                                    </div>
                                    <div class="form-group project_name">
                                       <label for="banner_title1" class="control-label col-lg-3 col-md-3 col-sm-4">Project Name</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <select class="selectpicker form-control" id="project_name" name="project_name" data-live-search="true">
                                             <option value="">Choose an Option</option>
                                             <?php if(!empty($project_list)) { 
                                                foreach($project_list as $row) { ?>
                                                <option value="<?php echo $row['id']?>" <?php if(@$banner['project_name'] == $row['id']){ echo "selected"; } ?>><?php echo $row['project_title']?></option>
                                             <?php  } } else { ?>
                                                <option value="">No Data</option>
                                                <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group admssnyear">
                                       <label for="banner_title1" class="control-label col-lg-3 col-md-3 col-sm-4">Year of Admission</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control" id="admssnyear" name="admssnyear" placeholder="Year of Admission" value="<?php echo @$banner['admssnyear']; ?>">
                                       </div>
                                    </div>
                                    <div class="form-group department">
                                       <label for="banner_title1" class="control-label col-lg-3 col-md-3 col-sm-4">Department</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control" id="department" name="department" placeholder="Department" value="<?php echo @$banner['department']; ?>">
                                       </div>
                                    </div>
                                    <div class="form-group institutename">
                                       <label for="banner_title1" class="control-label col-lg-3 col-md-3 col-sm-4">Institute Name</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control" id="institutename" name="institutename" placeholder="Institute Name" value="<?php echo @$banner['institutename']; ?>">
                                       </div>
                                    </div>
                                    <div class="form-group profilelink">
                                       <label for="banner_title1" class="control-label col-lg-3 col-md-3 col-sm-4">Profile Link</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <input type="text" class="form-control" id="profilelink" name="profilelink" placeholder="Profile Link" value="<?php echo @$banner['profilelink']; ?>">
                                       </div>
                                    </div>
                                    <div class="form-group program">
                                       <label for="banner_title1" class="control-label col-lg-3 col-md-3 col-sm-4">Program</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <select class="form-control" id="program" name="program" require>
                                          <?php if(!empty($designation)) { 
                                             foreach($designation as $row) { ?>
                                             <option value="<?php echo $row['id']?>" <?php if(@$banner['designation'] == $row['id']){ echo "selected"; } ?>><?php echo $row['designation']?></option>
                                          <?php  } } else { ?>
                                             <option value="">No Data</option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group degree">
                                       <label for="banner_title1" class="control-label col-lg-3 col-md-3 col-sm-4">Degree</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <select class="form-control" id="degree" name="degree" require>
                                          <?php if(!empty($ourteam)) { 
                                             foreach($ourteam as $row) { ?>
                                             <option value="<?php echo $row['id']?>"><?php echo $row['fname']?></option>
                                          <?php  } } else { ?>
                                             <option value="">No Data</option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                    <?php if(!empty($banner)){ ?>
                                    <div class="form-group">
                                       <label for="about_me" class="control-label col-lg-3 col-md-3 col-sm-4">Team Image</label>
                                       <div class="col-lg-9 col-md-9 col-sm-8">
                                          <?php if(@$banner['team_image']){ ?>
                                          <img style="width: 200px" src="<?php echo base_url(); ?>uploads/our_team/<?php echo @$banner['team_image']; ?>" alt="<?php echo @$banner['team_image']; ?>" />
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
                                             <input type="file" name="team_image" id="team_image" class="upload">
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
                                             <option value="1" <?php if(@$banner['status']==1){ echo "selected"; } ?>>Active</option>
                                             <option value="2" <?php if(@$banner['status']==2){ echo "selected"; } ?>>Inactive</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-lg-offset-3 col-lg-10">
                                          <button class="btn btn-success_cust waves-effect waves-light m-b-5" type="submit">Save</button>
                                          <a href="admin/ourteam"><button class="btn btn-success_cust waves-effect waves-light m-b-5" type="button">Back</button></a>
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