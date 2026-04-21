<?php echo $header;?>
<style>
    .nav-pills .nav-link{margin-bottom: 15px;}
    .bio_img {width: 140px; height: 140px; border-radius: 50%;}
    .bio_text {margin-bottom: auto;}
    .bio_text1 {margin-top: 30px; border: 1px solid #eee; padding: 30px; text-align: justify;}
    .td_class {padding: 0px; display: initial;}
    .table>:not(caption)>*>* {text-align: center;}
    .container {max-width: 1600px;}
    .fade:not(.show) { opacity: 1 !important; background: #00000063;}
    .modal-lg { margin-top : 10%}
    .close {padding: 0;background-color: transparent;border: 0;float: right;font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff; opacity: .5;}
    .choose_sec select { height: 40px; font-size: 16px;  padding: 0 10px; }
    .choose_sec .btn {background: #ffdf80; color: #fff; border-radius: 5px; width: 100%; padding: 8px 0; color: #022851;}
    #datatable thead tr th { font-size: 18px;}
    #datatable tbody tr td { font-size: 16px;}
</style>
<main id="main">
    <section id="portfolio-details" class="portfolio-details" style="margin-top:70px;">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="portfolio-info">
                        <h3 style="text-align:center"><?php echo $title?></h3>
                        <div class="row filter_data choose_sec">
                            <div class="col-sm-4">
                                <select class="form-control" id="funding_agencyflt" name="funding_agency">
                                <option value="">Funding Agency</option>
                                    <?php 
                                    $funding_agency = $this->db->query("SELECT funding_agency, GROUP_CONCAT(id) as id FROM iitmandi_project WHERE `is_delete` = 1 GROUP BY funding_agency ORDER BY COUNT(*) DESC");
                                    if(!empty($funding_agency->result_array())) { 
                                    foreach($funding_agency->result_array() as $row) { 
                                        $id = explode(",",$row['id']);
                                    ?>  
                                    <option value="<?php echo $row['funding_agency']?>"><?php echo $row['funding_agency']?></option>
                                    <?php  } } else { ?>
                                    <option value="">No Data</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <select class="form-control" id="starting_yearflt" name="starting_year">
                                    <option value="">Year</option>
                                    <?php 
                                    $starting_year = $this->db->query("SELECT starting_year, GROUP_CONCAT(id) as id FROM iitmandi_project WHERE `is_delete` = 1 GROUP BY starting_year ORDER BY COUNT(*) DESC");
                                    if(!empty($starting_year->result_array())) { 
                                    foreach($starting_year->result_array() as $row) { ?>
                                    <option value="<?php echo $row['starting_year']?>"><?php echo $row['starting_year']?></option>
                                    <?php  } } else { ?>
                                    <option value="">No Data</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" id="faculty_memberflt" name="faculty_member">
                                    <option value="">Faculty Member</option>
                                    <?php if(!empty($team)) { 
                                    foreach($team as $row) { ?>
                                    <option value="<?php echo $row['id']?>"><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?></option>
                                    <?php  } } else { ?>
                                    <option value="">No Data</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control" id="statusflt" name="statusflt">
                                    <option value="">Status</option>
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Transferred">Transferred</option>
                                    <option value="Closed">Closed</option>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-secondary" onClick="window.location.reload();">Reset</button>
                                <input type="hidden" id="project_type" value = '2'>
                            </div>
                        </div>
                        <div class='col-sm-12' style="margin-top: 50px;">
                            <table id="datatable" class="table table-striped table-bordered dat_tbl">
                                <tbody id = "showFilterData">
                                    <?php if(!empty($consultancy)) { 
                                        $i=1; ?>
                                    <?php foreach($consultancy as $row) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td style="text-align: justify;"><?php echo $row['project_title']; ?></td>
                                        <td><?php echo $row['pstatus']; ?></td>
                                        <td>
                                        <button type="button" class="btn btn-primary myLargeModalLabel" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="project_details(<?php echo $row['id']?>)">View More</button>
                                        </td>
                                    </tr>
                                    <?php $i++; } } else {?>
                                    <!-- <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr> -->
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="row">
                    <div class="modal-content" style="padding: 20px;">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr style="background-color: #dff0d8;">
                                        <th colspan="2" style="text-align: center; font-size: 1.4em; font-family: 'Noto Serif', serif;">Project Details 
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width="20%">Project Title</th>
                                        <td width="80%"><span id="project_title"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Project Ref. No.</th>
                                        <td><span id="proj_ref_new"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Funding Agency</th>
                                        <td><span id="agency_name"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Funding Amount</th>
                                        <td><span id="project_currency">₹</span> <span id="project_amount"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Duration</th>
                                        <td> <span id="project_start"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Principal Investigator</th>
                                        <td><span id="name_of_pi"></span></td>
                                    </tr>
                                    <tr class='name_of_copi'>
                                        <th>Co - Principal Investigator</th>
                                        <td><span id="name_of_copi"></span></td>
                                    </tr>
                                    <tr class='name_of_ps'>
                                        <th>Project Staff</th>
                                        <td><span id="name_of_ps"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->
<?php echo $footer?>