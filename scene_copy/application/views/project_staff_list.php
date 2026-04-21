<?php echo $header;?>
<style>
    .nav-pills .nav-link{margin-bottom: 15px;}
    .bio_img {width: 140px; height: 140px; border-radius: 50%;}
    .bio_text {margin-bottom: auto;}
    .bio_text1 {margin-top: 30px; border: 1px solid #eee; padding: 30px; text-align: justify;}
    .td_class {padding: 0px; display: initial;}
    .table>:not(caption)>*>* {text-align: center;}
    .col-sm-2 {display: inline-block;float: left;}
    .col-sm-8 {display: inline-block;float: left;}
    .container {max-width: 1600px;}
</style>
<main id="main">
    <section id="portfolio-details" class="portfolio-details" style="margin-top: 30px">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="portfolio-info">
                        <?php if(!empty($project_staff)) {
                        $i=1; ?>
                        <h3 style="text-align:center"><?php echo $title?></h3>
                        <?php foreach($project_staff as $row) { ?>
                        <div class="col-sm-12" style="border: 1px solid;box-shadow: 1px 1px 0px #999,2px 2px 0px #999,3px 3px 0px #999,4px 4px 0px #999,5px 5px 0px #999,6px 6px 0px #999; margin-bottom: 30px; float: left;">
                            <div class="col-sm-2">
                                <?php if(!empty($row['team_image'])){ ?>
                                    <img src="<?php echo base_url();?>uploads/our_team/<?php echo $row['team_image']?>" alt="" style="width: 100%; height: 194px;">
                                <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>assets/images/no-cover.png" alt="no-cover.png"  alt="" style="width: 100%; height: 194px;">
                                <?php } ?>
                            </div>
                            <div class="col-sm-8" style="margin: 10px 0px 0px 45px;">
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Name:  </b><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?>
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Designation:  </b>
                                    <?php $designation = $this->db->query("SELECT iitmandi_designation.designation from iitmandi_designation WHERE iitmandi_designation.id = '".$row['designation']."'");
                                    $designation = $designation->result_array();
                                    echo $designation[0]['designation'];
                                    ?>
                                </p>
                                <div style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Project Name:  </b>
                                    <?php $project = $this->db->query("SELECT iitmandi_project.project_title from iitmandi_project WHERE iitmandi_project.id = '".$row['project_name']."'");
                                    $project = $project->result_array(); ?>
                                    <div style="font-size: 14px;display: inline-block;"><?php echo $project[0]['project_title'];?></div>
                                </div>
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Mobile:  </b><?php echo $row['mobile']?>
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Email:  </b><?php echo $row['email']?></p>
                            </div>
                        </div>
                        <?php $i++; } ?>
                    </div>
                </div>
                <?php } ?>
                <?php if(!empty($supporting_staff)) {
                $i=1; ?>
                <div class="col-lg-12">
                    <div class="portfolio-info">
                        <h3 style="text-align:center">Supporting Staff</h3>
                        <?php foreach($supporting_staff as $row) { ?>
                        <div class="col-sm-12" style="border: 1px solid;box-shadow: 1px 1px 0px #999,2px 2px 0px #999,3px 3px 0px #999,4px 4px 0px #999,5px 5px 0px #999,6px 6px 0px #999; margin-bottom: 30px; float: left;">
                            <div class="col-sm-2">
                                <?php if($row['team_image'] != ""){ ?>
                                    <img src="<?php echo base_url();?>uploads/our_team/<?php echo $row['team_image']?>" alt="" style="width: 100%; height: 194px;">
                                <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>assets/images/no-cover.png" alt="no-cover.png"  alt="" style="width: 100%; height: 194px;">
                                <?php } ?>
                            </div>
                            <div class="col-sm-8" style="margin: 10px 0px 0px 45px;">
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Name:  </b><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?>
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Post:  </b><?php echo $row['post']?></p>
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Lab:  </b><?php echo $row['lab']?>
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Mobile:  </b><?php echo $row['mobile']?>
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Email:  </b><?php echo $row['email']?></p>
                            </div>
                        </div>
                        <?php $i++; } ?>
                    </div>
                </div>
                <?php } ?>

                <?php if(!empty($technical_staff)) {
                $i=1; ?>
                <div class="col-lg-12">
                    <div class="portfolio-info">
                        <h3 style="text-align:center">Technical Staff</h3>
                        <?php foreach($technical_staff as $row) { ?>
                        <div class="col-sm-12" style="border: 1px solid;box-shadow: 1px 1px 0px #999,2px 2px 0px #999,3px 3px 0px #999,4px 4px 0px #999,5px 5px 0px #999,6px 6px 0px #999; margin-bottom: 30px; float: left;">
                            <div class="col-sm-2">
                                <?php if($row['team_image'] != ""){ ?>
                                    <img src="<?php echo base_url();?>uploads/our_team/<?php echo $row['team_image']?>" alt="" style="width: 100%; height: 194px;">
                                <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>assets/images/no-cover.png" alt="no-cover.png"  alt="" style="width: 100%; height: 194px;">
                                <?php } ?>
                            </div>
                            <div class="col-sm-8" style="margin: 10px 0px 0px 45px;">
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Name:  </b><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?>
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Post:  </b><?php echo $row['post']?></p>
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Lab:  </b><?php echo $row['lab']?>
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Mobile:  </b><?php echo $row['mobile']?>
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Email:  </b><?php echo $row['email']?></p>
                            </div>
                        </div>
                        <?php $i++; } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main><!-- End #main -->
<?php echo $footer?>