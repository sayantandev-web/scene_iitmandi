<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title;?></title>
    <meta name="title" content="<?php echo $fullpage[0]['meta_title'];?>">
    <meta name="description" content="<?php echo $fullpage[0]['meta_desc']; ?>">
    <?php echo $header;?>    
    <div class="post-section section">
        <div class="container">
            <div class="row" style="padding: 60px 0 0 0;">
                <div class="col-lg-12 col-12 mb-501">
                    <div class="post-block-wrapper" style="text-align:center;">
                        <h2 style="color: #ffff !important;text-align: center;margin-top: 5%;border: 1px solid;width: 65%;display: inline-block;background: #ffbc3b;padding: 20px;margin-bottom: 40px;box-shadow: 1px 1px 0px #999,2px 2px 0px #999,3px 3px 0px #999,4px 4px 0px #999,5px 5px 0px #999,6px 6px 0px #999;"><?php echo $title;?></h2>
                    </div>
                </div>
                <div class="col-lg-12 col-12 mb-501">
                    <div class="post-block-wrapper">
                        <div class="body" style="padding: 0px 0px;">
                            <div class="contact-info row" style="padding: 0px 0px;">
                                <?php if($this->uri->segment(2) == "annual-calender") { ?>
                                    <div class="services-bar" style="width: 100%;height: 940px;">
                                        <div class="row">
                                        <iframe src="<?php echo base_url()?>assets/documents/academic_calendar.pdf" style="width: 100%;height: 940px;"></iframe>
                                        </div>
                                    </div>
                                <?php } elseif ($this->uri->segment(2) == "house-and-committees") { ?>
                                    <div class="services-bar" style="width: 100%;height: 940px;">
                                        <div class="row">
                                        <iframe src="<?php echo base_url()?>assets/documents/house_committee_maheshtala.pdf" style="width: 100%;height: 940px;"></iframe>
                                        </div>
                                    </div>
                                <?php } elseif ($this->uri->segment(2) == "our-team") { ?>
                                    <div class="services-bar <?php echo $title;?>">
                                        <div class="col-sm-12">
                                            <?php if(!empty($team)) {
                                            foreach ($team as $row){ ?>
                                            <div class="col-sm-2" style="border: 1px solid;box-shadow: 1px 1px 0px #999,2px 2px 0px #999,3px 3px 0px #999,4px 4px 0px #999,5px 5px 0px #999,6px 6px 0px #999;">
                                                <?php if($row['team_image'] != '') {?>
                                                <img src="<?php echo base_url()?>assets/images/our_team/<?php echo $row['team_image']?>" alt="" />
                                                <?php } else {?>
                                                    <img src="<?php echo base_url(); ?>images/no-img.png" alt="no-cover">
                                                <?php } ?>
                                                <p style="text-align: center; background: #fff;"><?php echo $row['fname']?><br><small><?php echo $row['designation']?></small></p>
                                                <p></p>
                                            </div>
                                            <?php } } ?>
                                        </div>
                                    </div>
                                <?php } elseif ($this->uri->segment(2) == "yearly-syllabus") { ?>
                                <?php if(!empty($syllabus)) {
                                foreach ($syllabus as $row){ ?>
                                <div class="col-sm-3">
                                    <div style="border: 1px solid;box-shadow: 1px 1px 0px #999,2px 2px 0px #999,3px 3px 0px #999,4px 4px 0px #999,5px 5px 0px #999,6px 6px 0px #999;text-align: center;margin-bottom: 20px;">
                                        <a href="<?php echo base_url(); ?>/assets/documents/syllabus/<?php echo @$row['syllabus'];?>" target="_blank">
                                            <img src="<?php echo base_url(); ?>/assets/images/icon-study-skills2-1.png" style="width: 150px;">
                                            <p style="text-align: center; background: #fff; margin: 10px 0 0 0;"><?php echo $row['class']?></p>
                                        </a>
                                    </div>
                                </div>
                                <?php } } ?>
                                <?php } elseif ($this->uri->segment(2) == "mandatory-disclosure") { ?>
                                <?php if(!empty($disclosure)) {
                                foreach ($disclosure as $row){ ?>
                                <div class="col-sm-3">
                                    <div style="border: 1px solid;box-shadow: 1px 1px 0px #999,2px 2px 0px #999,3px 3px 0px #999,4px 4px 0px #999,5px 5px 0px #999,6px 6px 0px #999;text-align: center;margin-bottom: 20px;">
                                        <a href="<?php echo base_url(); ?>/assets/documents/disclosure/<?php echo @$row['disclosure'];?>" target="_blank">
                                            <img src="<?php echo base_url(); ?>/assets/images/pdf-icon.png" style="width: 150px;">
                                            <p style="text-align: center; background: #fff; margin: 10px 0 0 0;"><?php echo $row['title']?></p>
                                        </a>
                                    </div>
                                </div>
                                <?php } } ?>
                                <?php } else { ?>
                                    <div class="page-banner <?php echo $title;?>" style="padding: 20px 0 0 0;">
                                        <div class="col-sm-12">
                                            <?php echo $fullpage[0]['page_description']; ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $footer;?>
</body>
</html>