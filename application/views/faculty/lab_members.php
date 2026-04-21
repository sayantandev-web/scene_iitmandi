<?php 
if ($this->session->userdata('user_id') != "") {
    $uid = $this->session->userdata('user_id');
    $position = $this->session->userdata('position');
} else {
    $uid = $about_me[0]['id'];
}
echo $header;
?>
<style>
    .cstm_gllery h3,.social ul li,.table>:not(caption)>*>*,p{text-align:center}.social ul li a:before,.social ul li:before{-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%)}.nav-pills .nav-link{margin-bottom:15px}.bio_text{margin-bottom:auto}.bio_text1 p {text-align:justify}.td_class{padding:0;display:initial}.cstm_gllery,.cstmf_gllery{float:left;display:inline;margin: 10px;border: 1px solid;padding: 10px;}.cstm_gllery img{padding:12px;border-radius:50%;width:100%;}.modal-content{padding:30px}.modal-lg,.modal-xl{--bs-modal-width:90%!important}.cstm_details{float:left;display:inline-block;margin: 18px 0 0 0;}.portfolio-details .portfolio-info h3{margin-bottom:0!important;padding-bottom:0!important;border-bottom:none!important}.container,.container-lg,.container-md,.container-sm,.container-xl,.container-xxl{max-width:1440px!important}.cslm_crnt_open ul{list-style-type:disc!important;padding-left:1em!important;margin-left:1em}.cstmf_gllery img{padding:12px}.profile_menu a{color:#fff;text-decoration:none}.active{background:#032851 !important; color:#fff}.btn{padding:15px 35px!important}.btn-primary{background:#ff9800; color:#fff !important; margin:0}*,:after,:before{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.clearfix:after{visibility:hidden;display:block;font-size:0;content:" ";clear:both;height:0}* html .clearfix{height:1%}.clearfix{display:block}.basr-social-share{display:block;margin-left:35%}.social ul{list-style:none;padding-left:0;padding-right:0}.social ul li{border:none;border-radius:50%;float:left;position:relative;width:40px;height:40px;-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s;transition:.3s}.social ul li:before,.social ul li:hover{-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s}.social ul li:not(:last-child){margin-right:10px}.social ul li:before{content:'';border-radius:50%;-webkit-shadow:inset 0 0px 3px rgba(149,90,42,0.28),0px 0px 0px 2px rgba(149,90,42,0.28);-ms-box-shadow:inset 0 0 3px rgba(149,90,42,.28),0 0 0 2px rgba(149,90,42,.28);box-shadow:inset 0 0 3px rgba(149,90,42,.28),0 0 0 2px rgba(149,90,42,.28);display:block;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:35px;height:35px;opacity:.35;transition:.3s}.social ul li:hover{border-color:#a33629;transition:.3s}.social ul li:hover i,.social ul li:hover:before{-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s}.social ul li:hover:before{-webkit-shadow:inset 0 0px 3px rgba(163,54,41,0.28),0px 0px 0px 2px rgba(163,54,41,0.28);-ms-box-shadow:inset 0 0 3px rgba(163,54,41,.28),0 0 0 2px rgba(163,54,41,.28);box-shadow:inset 0 0 3px rgba(163,54,41,.28),0 0 0 2px rgba(163,54,41,.28);transition:.3s}.social ul li:hover i{color:#d66557;-webkit-stroke-width:5.3px;-webkit-stroke-color:#a33629;-webkit-fill-color:#a33629;text-shadow:1px 0 20px #a33629;transition:.3s}.social ul li a:after,.social ul li a:before{content:'';border-radius:50%;display:block;z-index:-1;-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s;position:absolute;top:50%;left:50%}.social ul li a{border-radius:50%;display:block;position:absolute;top:-5px;left:3px;width:35px;height:35px;line-height:60px}.social ul li a:before{background-image:url('https://img.picload.org/image/dcocwcga/border-social-hover.png');width:46px;height:45px;transform:translate(-50%,-50%);opacity:0;transition:.3s}.social ul li a:after{background-image:url('https://img.picload.org/image/dcocwcgd/border-social.png');width:46px;height:45px;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);transform:translate(-50%,-50%);transition:.3s}.social ul li a:hover:after,.social ul li a:hover:before{-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s}.social ul li a:hover:before{opacity:1;-webkit-transform:translate(-50%,-50%) rotate(360deg);-ms-transform:translate(-50%,-50%) rotate(360deg);transform:translate(-50%,-50%) rotate(360deg);transition:.3s}.social ul li a:hover:after{opacity:0;-webkit-transform:translate(-50%,-50%) rotate(360deg);-ms-transform:translate(-50%,-50%) rotate(360deg);transform:translate(-50%,-50%) rotate(360deg);transition:.3s}.social ul li a i{color:#ffead3;font-size:23px;font-weight:900;position:absolute;top:50%;left:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);transform:translate(-50%,-50%);-webkit-stroke-width:5.3px;-webkit-stroke-color:#ffead3;-webkit-fill-color:#ffead3;text-shadow:1px 0 20px #ffead3;-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s;transition:.3s}@media only screen and (max-width:480px){.social ul li{border-width:4px;width:45px;height:45px}.social ul li:before{width:43px;height:43px}.social ul li a{background-size:cover;top:-5px;left:0px;width:45px;height:45px;line-height:45px}.social ul li a:after,.social ul li a:before{background-size:cover;width:30px;height:30px}.social ul li a i{font-size:16px}}@media (min-width:992px) and (max-width:1199px){.profile_menu .btn{padding:15px 25px!important}.primary-nav li{width:116px}.primary-nav a,.primary-nav__nolink{margin:0}.primary-nav__top-link a{font-size:13px}.primary-nav a:after,.primary-nav__nolink:after{width:auto}}.social ul li a i.fa-envelope{font-size:14px;top:48%}.dark-style .social li a,.dark-style .social li a:hover,.k2t-footer.dark-style .social li a,.k2t-footer.dark-style .social li a:hover{color:#fff}.basr-social-share.social li a:hover,.basr-social-share.social li:hover a{color:#898989}.basr-social-share.social li a{border-width:0;color:#ccc}.basr-social-share.social li a span{display:none}#example tbody tr:hover{background:#ddd}#example thead tr th{font-size:18px}#example tbody tr td{font-size:16px}.degree_sec h2{margin:0;padding:0 0 25px;font-size:25px}.col-lg-3 {display: inline-block; float: left; text-align: center; margin-top: 10px;}.col-lg-9 {display: inline-block;}.social ul li a {top: -11px !important;}.col-sm-2 {float: left;
    display: inline-block;}.cstm_gllery h3{font-size: 15px !important;}
      .container {max-width: 1600px !important;}
      .bio_img{width:100%; border-radius:50%; }
</style>
<main id="main">
    <section id="portfolio-details" class="portfolio-details" style="margin-top: 70px;">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="portfolio-info">
                        <?php if ($this->session->userdata('user_id') == '') { ?>
                        <div class="col-12">
                            <div class="row">
                                <div class='col-sm-12' style="margin-top: 20px;margin-bottom: 30px; border:1px solid #ddd;">
                                    <div class="row p-3">
                                        <div class="col-sm-3" style="text-align: center;float: left;display: inline-block;">
                                            <img class="bio_img" src="<?php echo base_url();?>uploads/our_team/<?php echo $about_me[0]['team_image'];?>" alt=""/>
                                        </div>
                                        <div class="col-sm-9" style="text-align: center;float: left;display: inline-block;margin-top: 28px;">
                                            <h3 style="text-transform: capitalize; text-align: center;font-size: 36px; color:#022851;"><?php echo $about_me[0]['fname']." ".$about_me[0]['mname']." ".$about_me[0]['lname'];?></h3>
                                            <?php 
                                            $designation = $this->db->query("SELECT * FROM iitmandi_designation WHERE id = ".$about_me[0]['designation']);
                                            foreach ($designation->result_array() as $row1) { ?>
                                                <p style="text-align: center; background: #fff;font-size: 25px;margin: 0; "><?php echo $row1['designation'];?></p>
                                            <?php } ?>
                                                <p style="text-align: center; background: #fff;font-size: 25px;"><?php if ($about_me[0]['specialization'] == '1'){echo 'Environmental Engineering'; } else if($about_me[0]['specialization'] == '2'){echo 'Geotechnical Engineering'; } else if($about_me[0]['specialization'] == '3'){echo 'Structural Engineering'; } else if($about_me[0]['specialization'] == '4'){echo 'Water Resources Engineering'; } else if($about_me[0]['specialization'] == '5'){echo 'Transportation Engineering'; } else if($about_me[0]['specialization'] == '6'){echo 'Remote Sensing and GIS'; } else {echo '';} ?></p>
                                            <div class="social_sec">
                                                <a href='mailto:<?php echo $about_me[0]['email']?>' style="margin-right: 8%;"><i class="fa-regular fa-envelope"></i> <?php echo $about_me[0]['email']?></a></br>
                                                <a href='tel:<?php echo $about_me[0]['mobile']?>' style="margin-right: 17%;"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $about_me[0]['mobile']?></a>
                                            </div>
                                            <div class="basr-social-share social" style="margin-top: 2%;">
                                                <ul class="">
                                                <?php if ($about_me[0]['research_gate'] != '') {?>
                                                <li>
                                                    <a class="facebook" href="<?php echo $about_me[0]['research_gate'] ?>"><img class="" src="<?php echo base_url();?>assets/social_icon/research_gate.png" alt="" style="border-radius: 50%;"/></a>
                                                </li>
                                                <?php } ?>
                                                <?php if($about_me[0]['google_scholar'] != '') {?>
                                                <li>
                                                    <a class="twitter" href="<?php echo $about_me[0]['google_scholar'] ?>"><img class="" src="<?php echo base_url();?>assets/social_icon/google-scholar.png" alt="" style="border-radius: 50%;"/></a>
                                                </li>
                                                <?php } ?>
                                                <?php if($about_me[0]['linedin_link'] != '') {?>
                                                <li>
                                                    <a class="googleplus" href="<?php echo $about_me[0]['linedin_link'] ?>"><img class="" src="<?php echo base_url();?>assets/social_icon/linkedin-icon.png" alt="" style="border-radius: 50%;"/></a>
                                                </li>
                                                <?php } ?>
                                                <?php if($about_me[0]['twitter_link'] != '') {?>
                                                <li>
                                                    <a class="linkedin" href="<?php echo $about_me[0]['twitter_link'] ?>"><img class="" src="<?php echo base_url();?>assets/social_icon/twitter-icon.png" alt="" style="border-radius: 50%;"/></a>
                                                </li>
                                                <?php } ?>
                                                <?php if($about_me[0]['github_link'] != '') {?>
                                                <li>
                                                    <a class="tumblr" href="<?php echo $about_me[0]['github_link'] ?>"><img class="" src="<?php echo base_url();?>assets/social_icon/github-icon.png" alt="" style="border-radius: 50%;"/></a>
                                                </li>
                                                <?php } ?>
                                                <?php if($about_me[0]['medium_link'] != '') {?>
                                                <li>
                                                    <a class="tumblr" href="<?php echo $about_me[0]['medium_link'] ?>"><img class="" src="<?php echo base_url();?>assets/social_icon/medium.png" alt="" style="border-radius: 50%;"/></a>
                                                </li>
                                                <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-12 profile_menu" style="text-align:center">
                                <!-- Tab navs -->
                                <a href="<?php echo base_url()?>faculty/dashboard/<?php echo $uid?>"><button type="button" class="btn btn-primary ">Home</button></a>
                                <a href="<?php echo base_url()?>faculty/research/<?php echo $uid?>"><button type="button" class="btn btn-primary ">Research</button></a>
                                <a href="<?php echo base_url()?>faculty/publication/<?php echo $uid?>"><button type="button" class="btn btn-primary">Publication</button></a>
                                <?php if(!empty($project)) { ?>
                                <a href="<?php echo base_url()?>faculty/projects/<?php echo $uid?>"><button type="button" class="btn btn-primary">Projects</button></a>
                                <?php } ?>
                                <?php if(!empty($lab_member)) { ?>
                                <a href="<?php echo base_url()?>faculty/lab_members/<?php echo $uid?>"><button type="button" class="btn btn-primary active">Lab Members</button></a>
                                <?php } ?>
                                <a href="<?php echo base_url()?>faculty/current_opening/<?php echo $uid?>"><button type="button" class="btn btn-primary">Current Openings</button></a>
                                <?php if ($this->session->userdata('user_id') != '') { ?>
                                <a href="<?php echo base_url()?>faculty/logout"><button type="button" class="btn btn-primary">Logout</button></a>
                                <?php } ?>
                                <!-- Tab navs -->
                            </div>
                            <!-- Lab Member Start --> 
                            <?php  if(!empty($phdteam)) { ?>
                            <div class="col-12" style=" margin-top: 35px;">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Ph.D. Scholars</h2>
                                    </div>
                                    
                                        <div class='col-sm-12'>
                                        <div class="row">
                                            <?php
                                        $i=1; ?>
                                        <?php foreach($phdteam as $row) { ?>
                                            <div class="col-lg-3 col-xl-2 col-md-6 col-sm-6 col-12">
                                                <div class="cstm_gllery">
                                                    <img src="<?php echo base_url()?>uploads/our_team/<?php echo $row['team_image']?>" style="width: 185px; height: 185px;"/>
                                                    <h3><a href='<?php echo base_url();?>pages/student_details/<?php echo base64_encode($row['id'])?>' style="text-decoration: none;"><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></a></h3>
                                                </div>
                                            </div>
                                        <?php $i++; } ?>
                                        </div>
                                        </div>
                                
                                </div>
                            </div>
                            <?php } ?>

                            <?php  if(!empty($mtechrteam)) { ?>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">M.Tech. (R) Scholars</h2>
                                    </div>
                                    <div class="content">
                                        <div class='col-sm-12'>
                                        <?php
                                            $i=1; ?>
                                            <?php foreach($mtechrteam as $row) { ?>
                                            <div class="col-sm-2">
                                                <div class="cstm_gllery">
                                                    <img src="<?php echo base_url()?>uploads/our_team/<?php echo $row['team_image']?>"/>
                                                    <h3><a href='<?php echo base_url();?>pages/student_details/<?php echo base64_encode($row['id'])?>' style="text-decoration: none;"><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></a></h3>
                                                </div>
                                            </div>
                                        <?php $i++; } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <?php  if(!empty($mtechteam)) { ?>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">M.Tech. Students</h2>
                                    </div>
                                    <div class="content">
                                        <div class='col-sm-12'>
                                        <?php $i=1; ?>
                                                <?php foreach($mtechteam as $row) { ?>
                                            <div class="col-sm-2">
                                                <div class="cstm_gllery">
                                                    <img src="<?php echo base_url()?>uploads/our_team/<?php echo $row['team_image']?>"/>
                                                    <h3><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></h3>
                                                </div>
                                            </div>
                                        <?php $i++; } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <?php  if(!empty($btechteam)) { ?>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">B.Tech. Students</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Name</th>
                                                    <th>Year</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i=1; ?>
                                                <?php foreach($btechteam as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td><h3><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></h3></td>
                                                    <td><h3><?php echo $row['admssnyear']?></h3></td>
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-12">
                            <h2 style="text-align: center;">Alumni</h2>
                        </div>
                        <?php
                        $phdAlumni = $this->db->query("SELECT * FROM iitmandi_falumni WHERE faculty_id = '".$uid."' AND alumni_type = '3'")->result_array();
                        if(!empty($phdAlumni)) { ?>
                        <div class="col-12" style=" margin-top: 35px;">
                            <div class="row">
                                <div class='col-sm-12'>
                                    <h2 style="text-align: center;">PHD Alumni</h2>
                                </div>
                                <div class='col-sm-12'>
                                    <div class="row">
                                        <?php
                                        $i=1;
                                        foreach($phdAlumni as $phdteam) { ?>
                                        <div class="col-lg-3 col-xl-2 col-md-6 col-sm-6 col-12">
                                            <div class="cstm_gllery">
                                                <?php if($this->session->userdata('user_id') != '') { ?>
                                                <p style="position: relative; left: 98%; background-color: red; width: 28px; border-radius: 15px; color: #fff; margin-top: -23px;" onclick="deletealumni(<?= $phdteam['id']?>)">X</p>
                                                <?php } ?>
                                                <?php if(!empty($phdteam['profileImg']) && file_exists('uploads/alumni/'.$phdteam['profileImg'])) { ?>
                                                <img src="<?php echo base_url()?>uploads/alumni/<?php echo $phdteam['profileImg']?>" style="width: 185px; height: 185px;"/>
                                                <?php } else { ?>
                                                <img src="<?php echo base_url()?>uploads/no-image.webp" style="width: 185px; height: 185px;"/>
                                                <?php } ?>
                                                <h3><?php echo $phdteam['full_name']; ?></h3>
                                            </div>
                                        </div>
                                        <?php $i++; } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <?php
                        $mtechAlumni = $this->db->query("SELECT * FROM iitmandi_falumni WHERE faculty_id = '".$uid."' AND alumni_type = '2'")->result_array();
                        if(!empty($mtechAlumni)) { ?>
                        <div class="col-12" style=" margin-top: 35px;">
                            <div class="row">
                                <div class='col-sm-12'>
                                    <h2 style="text-align: center;">M-Tech Alumni</h2>
                                </div>
                                <div class='col-sm-12'>
                                    <div class="row">
                                        <?php
                                        $i=1;
                                        foreach($mtechAlumni as $mteam) { ?>
                                        <div class="col-lg-3 col-xl-2 col-md-6 col-sm-6 col-12">
                                            <div class="cstm_gllery">
                                                <?php if($this->session->userdata('user_id') != '') { ?>
                                                <p style="position: relative; left: 98%; background-color: red; width: 28px; border-radius: 15px; color: #fff; margin-top: -23px;" onclick="deletealumni(<?= $mteam['id']?>)">X</p>
                                                <?php } ?>
                                                <?php if(!empty($mteam['profileImg']) && file_exists('uploads/alumni/'.$mteam['profileImg'])) { ?>
                                                <img src="<?php echo base_url()?>uploads/alumni/<?php echo $mteam['profileImg']?>" style="width: 185px; height: 185px;"/>
                                                <?php } else { ?>
                                                <img src="<?php echo base_url()?>uploads/no-image.webp" style="width: 185px; height: 185px;"/>
                                                <?php } ?>
                                                <h3><?php echo $mteam['full_name']; ?></h3>
                                            </div>
                                        </div>
                                        <?php $i++; } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <?php
                        $btechAlumni = $this->db->query("SELECT * FROM iitmandi_falumni WHERE faculty_id = '".$uid."' AND alumni_type = '1'")->result_array();
                        if(!empty($btechAlumni)) { ?>
                        <!-- <div class="col-12" style=" margin-top: 35px;">
                            <div class="row">
                                <div class='col-sm-12'>
                                    <h2 style="text-align: center;">B-Tech Alumni</h2>
                                </div>
                                <div class='col-sm-12'>
                                    <div class="row">
                                        <?php
                                        $i=1;
                                        foreach($btechAlumni as $bteam) { ?>
                                        <div class="col-lg-3 col-xl-2 col-md-6 col-sm-6 col-12">
                                            <div class="cstm_gllery">
                                                <?php if($this->session->userdata('user_id') != '') { ?>
                                                <p style="position: relative; left: 98%; background-color: red; width: 28px; border-radius: 15px; color: #fff; margin-top: -23px;" onclick="deletealumni(<?= $bteam['id']?>)">X</p>
                                                <?php } ?>
                                                <?php if(!empty($bteam['profileImg']) && file_exists('uploads/alumni/'.$bteam['profileImg'])) { ?>
                                                <img src="<?php echo base_url()?>uploads/alumni/<?php echo $bteam['profileImg']?>" style="width: 185px; height: 185px;"/>
                                                <?php } else { ?>
                                                <img src="<?php echo base_url()?>uploads/no-image.webp" style="width: 185px; height: 185px;"/>
                                                <?php } ?>
                                                <h3><?php echo $bteam['full_name']; ?></a></h3>
                                                <?php if($bteam['admission_year'] != '0') { ?>
                                                <p>Adminssion Year: <?php echo $bteam['admission_year']; ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php $i++; } ?>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">B.Tech. Alumni</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Name</th>
                                                    <th>Year</th>
                                                    <?php if($this->session->userdata('user_id') != '') { ?>
                                                    <th>Action</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i=1;
                                            foreach($btechAlumni as $bteam) { 
                                                if(!empty($bteam['profileImg']) && file_exists('uploads/alumni/'.$bteam['profileImg'])) { 
                                                    $img = '<img src="'.base_url('uploads/alumni/'.$bteam['profileImg']).'" style="width: 60px;height: 60px;display: flex;float: left;margin-right: 15px; border-radius: 40px;"/>';
                                                } else {
                                                    $img = '<img src="'.base_url('uploads/no-image.webp').'" style="width: 60px;height: 60px;display: flex;float: left;margin-right: 15px; border-radius: 40px;"/>';
                                                }
                                            ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td>
                                                        <div style="width: 100%; ">
                                                            <?= $img; ?>
                                                            <h3 style="display: inline-block; float: left;"><?php echo $bteam['full_name']; ?></td>
                                                        </div>
                                                    <td><h3><?php echo $bteam['admission_year']; ?></h3></td>
                                                    <?php if($this->session->userdata('user_id') != '') { ?>
                                                    <td><button type="button" class="btn btn-danger active" onclick="deletealumni(<?= $bteam['id']?>)">Delete</button></td>
                                                    <?php } ?>
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if($this->session->userdata('user_id') != '') { ?>
                        <div style="text-align: right;">
                            <button type="button" class="btn btn-primary alumni_save" data-toggle="modal" data-target=".bd-example-modal-lgqqq">Add Alumni</button>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Details Section -->
</main><!-- End #main -->
<div class="modal fade bd-example-modal-lgqqq alumni_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="background: #000000b0;">
    <div class="modal-dialog modal-lg" style="margin-top: 5%; max-width: 50% !important;">
        <div class="modal-content">
        <form action="<?= base_url()?>facultys/facultys/add_alumni_data" method="post" enctype="multipart/form-data">
            <div class="col-sm-12" style="margin-bottom: 40px;">
                <div class="form-group" style="display: inline-block; width: 48%; margin-right: 20px;">
                    <label for="Event Name" class="control-label">Name</label>
                    <input type="text" class="form-control required" id="full_name" name="full_name" value="">
                </div>
                <div class="form-group" style="display: inline-block; width: 48%">
                    <label for="Event Name" class="control-label">Type</label>
                    <select id="alumni_type" name="alumni_type" class="form-control">
                        <option value="1">B-Tech</option>
                        <option value="2">M-Tech</option>
                        <option value="3">PHD.</option>
                    </select>
                </div>
                <div class="form-group" style="display: inline-block; width: 48%; margin-right: 20px;">
                    <label for="Event Name" class="control-label">Email</label>
                    <input type="email" class="form-control required" id="email" name="email" value="">
                </div>
                <div class="form-group" style="display: inline-block; width: 48%">
                    <label for="Event Name" class="control-label">Admission year</label>
                    <input type="text" class="form-control required" id="admissionyear" name="admissionyear" value="" max-length="4">
                </div>
                <div class="form-group" style="display: inline-block; width: 100%;">
                    <label for="Event Name" class="control-label">Upload Image</label>
                    <input type="file" class="form-control required" id="profileImg" name="profileImg">
                </div>
            </div>
            <div class="col-sm-12" style="text-align: center;margin-top: 20px;">
                <div id="err"></div>
                <input class="btn btn-primary" type="submit" value="Submit">
                <input type="hidden" id="faculty_id" name="faculty_id" value="<?php echo $uid?>">
            </div>
        </form>
        </div>
    </div>
</div>
<style>
    .opacity {opacity: 1 !important}
</style>
<script>
    $('.alumni_save').click(function(){
        $('.alumni_data').addClass('opacity');
    })
</script>
<?php echo $footer?>