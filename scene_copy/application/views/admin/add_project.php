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
                                                <label for="title" class="control-label col-lg-3 col-md-3 col-sm-4">Title of the Project</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <input type="text" class="form-control" id="project_title" name="project_title" required  placeholder="Title of the Project" value="<?php echo @$project['project_title'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="funding_agency" class="control-label col-lg-3 col-md-3 col-sm-4">Funding Agency</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="funding_agency" name="funding_agency" required  placeholder="Funding Agency" value="<?php echo @$project['funding_agency'] ?>">
                                               </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="funding_amount" class="control-label col-lg-3 col-md-3 col-sm-4">Funding Amount</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <input type="text" class="form-control allow_decimal" id="funding_amount" name="funding_amount" required  placeholder="Funding Amount" value="<?php echo @$project['funding_amount'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="project_incharge" class="control-label col-lg-3 col-md-3 col-sm-4">PI</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <select class="form-control" id="project_incharge" name="project_incharge">
                                                    <option value="">Choose an Option</option>
                                                    <?php if(!empty($ourteam)) { 
                                                        foreach($ourteam as $row) { ?>
                                                        <option value="<?php echo $row['id'];?>" <?php if($row['id'] == @$project['project_incharge']) {echo "selected"; }?>><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?></option>
                                                    <?php  } } else { ?>
                                                        <option value="">No Data</option>
                                                        <?php } ?>
                                                    </select>
                                                </div> 
                                            </div>
                                            <div class="form-group">
                                                <label for="coproject_incharge" class="control-label col-lg-3 col-md-3 col-sm-4">Co-PI</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <select class="selectpicker form-control" id="coproject_incharge" name="coproject_incharge[]" multiple data-live-search="true">
                                                        <?php if(!empty($ourteam)) { 
                                                            foreach($ourteam as $row) { ?>
                                                            <option value="<?php echo $row['id'];?>" <?php if($row['id'] == @$project['coproject_incharge']) {echo "selected"; }?>><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?></option>
                                                        <?php  } } else { ?>
                                                            <option value="">No Data</option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="control-label col-lg-3 col-md-3 col-sm-4">Type of Project</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <select class="form-control" name="project_type">
                                                        <option value="">Choose an option</option>
                                                        <option value="1" <?php if(@$project['project_type']==1){ echo "selected"; } ?>>Research</option>
                                                        <option value="2" <?php if(@$project['project_type']==2){ echo "selected"; } ?>>Consultancy</option>
                                                    </select>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="starting_year" class="control-label col-lg-3 col-md-3 col-sm-4">Starting year</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <?php
                                                    //$currently_selected = date('Y', strtotime('+10 years')); 
                                                    $currently_selected = @$project['starting_year'];
                                                    $earliest_year = 1950; 
                                                    $latest_year = date('Y', strtotime('+10 years')); 
                                                    print '<select class="form-control" id="starting_year" name="starting_year"><option value="">Choose an option</option>';
                                                    foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                                        print '<option value="'.$i.'"'.($i == $currently_selected ?' selected="selected"' : '').'>'.$i.'</option>';
                                                    }
                                                    print '</select>';
                                                    ?>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="project_duration" class="control-label col-lg-3 col-md-3 col-sm-4">End Year</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <?php
                                                    //$currently_selected = date('Y');
                                                    $currently_selected = @$project['project_duration']; 
                                                    $earliest_year = 1950; 
                                                    $latest_year = date('Y', strtotime('+10 years'));; 
                                                    print '<select class="form-control" id="project_duration" name="project_duration"><option value="">Choose an option</option>';
                                                    foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                                        print '<option value="'.$i.'"'.($i == $currently_selected ?' selected="selected"' : '').'>'.$i.'</option>';
                                                    }
                                                    print '</select>';
                                                    ?>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="reference_number" class="control-label col-lg-3 col-md-3 col-sm-4">Reference Number</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <input type="text" class="form-control" id="reference_number" name="reference_number" required  placeholder="Reference Number" value="<?php echo @$project['reference_number'] ?>">
                                               </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="control-label col-lg-3 col-md-3 col-sm-4">Brief Description</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <!-- <input type="text" class="form-control" id="description" name="description" required  placeholder="Brief Description" value="<?php echo @$project['description'] ?>"> -->
                                                    <textarea id="description" name="description"><?php echo @$project['description']?></textarea>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="control-label col-lg-3 col-md-3 col-sm-4">Status</label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <select class="form-control" name="pstatus">
                                                        <option value="">Choose an option</option>
                                                        <option value="Ongoing" <?php if(@$project['pstatus']=='Ongoing'){ echo "selected"; } ?>>Ongoing</option>
                                                        <option value="Completed" <?php if(@$project['pstatus']=='Completed'){ echo "selected"; } ?>>Completed</option>
                                                        <option value="Transferred" <?php if(@$project['pstatus']=='Transferred'){ echo "selected"; } ?>>Transferred</option>
                                                        <option value="Closed" <?php if(@$project['pstatus']=='Closed'){ echo "selected"; } ?>>Closed</option>
                                                    </select>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-3 col-lg-10">
                                                    <button class="btn btn-success_cust waves-effect waves-light m-b-5" type="submit">Save</button>
                                                    <a href="admin/project"><button class="btn btn-success_cust waves-effect waves-light m-b-5" type="button">Back</button></a>
                                                </div>
                                            </div>
                                        </form>
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
</body>
</html>
