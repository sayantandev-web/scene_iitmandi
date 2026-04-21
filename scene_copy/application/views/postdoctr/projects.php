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
    .cstm_gllery h3,.social ul li,.table>:not(caption)>*>*,p{text-align:center}.social ul li a:before,.social ul li:before{-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%)}.nav-pills .nav-link{margin-bottom:15px}.bio_text{margin-bottom:auto}.bio_text1 p {text-align:justify}.td_class{padding:0;display:initial}.cstm_gllery,.cstmf_gllery{float:left;display:inline}.cstm_gllery img{padding:12px;border-radius:50%;height:313px}.modal-content{padding:30px}.modal-lg,.modal-xl{--bs-modal-width:90%!important}.cstm_details{float:left;display:inline-block;margin: 18px 0 0 0;}.portfolio-details .portfolio-info h3{margin-bottom:0!important;padding-bottom:0!important;border-bottom:none!important}.container,.container-lg,.container-md,.container-sm,.container-xl,.container-xxl{max-width:1440px!important}.cslm_crnt_open ul{list-style-type:disc!important;padding-left:1em!important;margin-left:1em}.cstmf_gllery img{padding:12px}.profile_menu a{color:#fff;text-decoration:none}.active{background:#032851 !important; color:#fff}.btn{padding:15px 35px!important}.btn-primary{background:#ff9800; color:#fff !important; margin:0}*,:after,:before{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.clearfix:after{visibility:hidden;display:block;font-size:0;content:" ";clear:both;height:0}* html .clearfix{height:1%}.clearfix{display:block}.basr-social-share{display:block;margin-left:35%}.social ul{list-style:none;padding-left:0;padding-right:0}.social ul li{border:none;border-radius:50%;float:left;position:relative;width:40px;height:40px;-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s;transition:.3s}.social ul li:before,.social ul li:hover{-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s}.social ul li:not(:last-child){margin-right:10px}.social ul li:before{content:'';border-radius:50%;-webkit-shadow:inset 0 0px 3px rgba(149,90,42,0.28),0px 0px 0px 2px rgba(149,90,42,0.28);-ms-box-shadow:inset 0 0 3px rgba(149,90,42,.28),0 0 0 2px rgba(149,90,42,.28);box-shadow:inset 0 0 3px rgba(149,90,42,.28),0 0 0 2px rgba(149,90,42,.28);display:block;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:35px;height:35px;opacity:.35;transition:.3s}.social ul li:hover{border-color:#a33629;transition:.3s}.social ul li:hover i,.social ul li:hover:before{-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s}.social ul li:hover:before{-webkit-shadow:inset 0 0px 3px rgba(163,54,41,0.28),0px 0px 0px 2px rgba(163,54,41,0.28);-ms-box-shadow:inset 0 0 3px rgba(163,54,41,.28),0 0 0 2px rgba(163,54,41,.28);box-shadow:inset 0 0 3px rgba(163,54,41,.28),0 0 0 2px rgba(163,54,41,.28);transition:.3s}.social ul li:hover i{color:#d66557;-webkit-stroke-width:5.3px;-webkit-stroke-color:#a33629;-webkit-fill-color:#a33629;text-shadow:1px 0 20px #a33629;transition:.3s}.social ul li a:after,.social ul li a:before{content:'';border-radius:50%;display:block;z-index:-1;-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s;position:absolute;top:50%;left:50%}.social ul li a{border-radius:50%;display:block;position:absolute;top:-5px;left:3px;width:35px;height:35px;line-height:60px}.social ul li a:before{background-image:url('https://img.picload.org/image/dcocwcga/border-social-hover.png');width:46px;height:45px;transform:translate(-50%,-50%);opacity:0;transition:.3s}.social ul li a:after{background-image:url('https://img.picload.org/image/dcocwcgd/border-social.png');width:46px;height:45px;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);transform:translate(-50%,-50%);transition:.3s}.social ul li a:hover:after,.social ul li a:hover:before{-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s}.social ul li a:hover:before{opacity:1;-webkit-transform:translate(-50%,-50%) rotate(360deg);-ms-transform:translate(-50%,-50%) rotate(360deg);transform:translate(-50%,-50%) rotate(360deg);transition:.3s}.social ul li a:hover:after{opacity:0;-webkit-transform:translate(-50%,-50%) rotate(360deg);-ms-transform:translate(-50%,-50%) rotate(360deg);transform:translate(-50%,-50%) rotate(360deg);transition:.3s}.social ul li a i{color:#ffead3;font-size:23px;font-weight:900;position:absolute;top:50%;left:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);transform:translate(-50%,-50%);-webkit-stroke-width:5.3px;-webkit-stroke-color:#ffead3;-webkit-fill-color:#ffead3;text-shadow:1px 0 20px #ffead3;-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s;transition:.3s}@media only screen and (max-width:480px){.social ul li{border-width:4px;width:45px;height:45px}.social ul li:before{width:43px;height:43px}.social ul li a{background-size:cover;top:-5px;left:0px;width:45px;height:45px;line-height:45px}.social ul li a:after,.social ul li a:before{background-size:cover;width:30px;height:30px}.social ul li a i{font-size:16px}}@media (min-width:992px) and (max-width:1199px){.profile_menu .btn{padding:15px 25px!important}.primary-nav li{width:116px}.primary-nav a,.primary-nav__nolink{margin:0}.primary-nav__top-link a{font-size:13px}.primary-nav a:after,.primary-nav__nolink:after{width:auto}}.social ul li a i.fa-envelope{font-size:14px;top:48%}.dark-style .social li a,.dark-style .social li a:hover,.k2t-footer.dark-style .social li a,.k2t-footer.dark-style .social li a:hover{color:#fff}.basr-social-share.social li a:hover,.basr-social-share.social li:hover a{color:#898989}.basr-social-share.social li a{border-width:0;color:#ccc}.basr-social-share.social li a span{display:none}#example tbody tr:hover{background:#ddd}#example thead tr th{font-size:18px}#example tbody tr td{font-size:16px}.degree_sec h2{margin:0;padding:0 0 25px;font-size:25px}.col-lg-3 {display: inline-block; float: left; text-align: center; margin-top: 10px;}.col-lg-9 {display: inline-block;}.social ul li a {top: -11px !important;}
      .container {max-width: 1600px !important;}
      .bio_img{width:100%; border-radius:50%; }
</style>
<main id="main">
  <!-- ======= Portfolio Details Section ======= -->
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
                          <li style="margin-top: 10px;">
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
                <a href="<?php echo base_url()?>faculty/projects/<?php echo $uid?>"><button type="button" class="btn btn-primary active">Projects</button></a>
                <?php } ?>
                <?php if(!empty($lab_member)) { ?>
                <a href="<?php echo base_url()?>faculty/lab_members/<?php echo $uid?>"><button type="button" class="btn btn-primary">Lab Members</button></a>
                <?php } ?>
                <a href="<?php echo base_url()?>faculty/current_opening/<?php echo $uid?>"><button type="button" class="btn btn-primary">Current Openings</button></a>
                <?php if ($this->session->userdata('user_id') != '') { ?>
                <a href="<?php echo base_url()?>faculty/logout"><button type="button" class="btn btn-primary">Logout</button></a>
                <?php } ?>
                <!-- Tab navs -->
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12' style="margin-top: 50px;">
                                        <table id="datatable" class="table table-striped table-bordered dat_tbl">
                                            <tbody>
                                                <?php if(!empty($project)) { 
                                                   $i=1; ?>
                                                <?php foreach($project as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['project_title']; ?></td>
                                                    <td><?php echo $row['pstatus']; ?></td>
                                                    <td>
                                                    <button type="button" class="btn btn-primary myLargeModalLabel" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="project_fdetails(<?php echo $row['id']?>)">View More</button>
                                                    </td>
                                                </tr>
                                                <?php $i++; } } else { ?>
                                                <tr>
                                                    <td colspan="5">No Record Found</td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Details Section -->
</main><!-- End #main -->
<div class="modal fade bd-example-modal-lg myLargeModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo $footer?>