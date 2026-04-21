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
    .cstm_gllery h3,.social ul li,.table>:not(caption)>*>*,p{text-align:center}.social ul li a:before,.social ul li:before{-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%)}.nav-pills .nav-link{margin-bottom:15px}.bio_text{margin-bottom:auto}.bio_text1 p {text-align:justify}.td_class{padding:0;display:initial}.cstm_gllery,.cstmf_gllery{float:left;display:inline}.cstm_gllery img{padding:12px;border-radius:50%;height:313px}.modal-content{padding:30px}.modal-lg,.modal-xl{--bs-modal-width:90%!important}.cstm_details{float:left;display:inline-block;margin: 18px 0 0 0;}.portfolio-details .portfolio-info h3{margin-bottom:0!important;padding-bottom:0!important;border-bottom:none!important}.container,.container-lg,.container-md,.container-sm,.container-xl,.container-xxl{max-width:1440px!important}.cslm_crnt_open ul{list-style-type:disc!important;padding-left:1em!important;margin-left:1em}.cstmf_gllery img{padding:12px}.profile_menu a{color:#fff;text-decoration:none}.active{background:#032851 !important; color:#fff}.btn{padding:15px 35px!important}.btn-primary{background:#ff9800; color:#fff !important; margin:0}*,:after,:before{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.clearfix:after{visibility:hidden;display:block;font-size:0;content:" ";clear:both;height:0}* html .clearfix{height:1%}.clearfix{display:block}.basr-social-share{display:block;margin-left:35%}.social ul{list-style:none;padding-left:0;padding-right:0}.social ul li{border:none;border-radius:50%;float:left;position:relative;width:40px;height:40px;-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s;transition:.3s}.social ul li:before,.social ul li:hover{-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s}.social ul li:not(:last-child){margin-right:10px}.social ul li:before{content:'';border-radius:50%;-webkit-shadow:inset 0 0px 3px rgba(149,90,42,0.28),0px 0px 0px 2px rgba(149,90,42,0.28);-ms-box-shadow:inset 0 0 3px rgba(149,90,42,.28),0 0 0 2px rgba(149,90,42,.28);box-shadow:inset 0 0 3px rgba(149,90,42,.28),0 0 0 2px rgba(149,90,42,.28);display:block;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:35px;height:35px;opacity:.35;transition:.3s}.social ul li:hover{border-color:#a33629;transition:.3s}.social ul li:hover i,.social ul li:hover:before{-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s}.social ul li:hover:before{-webkit-shadow:inset 0 0px 3px rgba(163,54,41,0.28),0px 0px 0px 2px rgba(163,54,41,0.28);-ms-box-shadow:inset 0 0 3px rgba(163,54,41,.28),0 0 0 2px rgba(163,54,41,.28);box-shadow:inset 0 0 3px rgba(163,54,41,.28),0 0 0 2px rgba(163,54,41,.28);transition:.3s}.social ul li:hover i{color:#d66557;-webkit-stroke-width:5.3px;-webkit-stroke-color:#a33629;-webkit-fill-color:#a33629;text-shadow:1px 0 20px #a33629;transition:.3s}.social ul li a:after,.social ul li a:before{content:'';border-radius:50%;display:block;z-index:-1;-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s;position:absolute;top:50%;left:50%}.social ul li a{border-radius:50%;display:block;position:absolute;top:-5px;left:3px;width:35px;height:35px;line-height:60px}.social ul li a:before{background-image:url('https://img.picload.org/image/dcocwcga/border-social-hover.png');width:46px;height:45px;transform:translate(-50%,-50%);opacity:0;transition:.3s}.social ul li a:after{background-image:url('https://img.picload.org/image/dcocwcgd/border-social.png');width:46px;height:45px;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);transform:translate(-50%,-50%);transition:.3s}.social ul li a:hover:after,.social ul li a:hover:before{-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s}.social ul li a:hover:before{opacity:1;-webkit-transform:translate(-50%,-50%) rotate(360deg);-ms-transform:translate(-50%,-50%) rotate(360deg);transform:translate(-50%,-50%) rotate(360deg);transition:.3s}.social ul li a:hover:after{opacity:0;-webkit-transform:translate(-50%,-50%) rotate(360deg);-ms-transform:translate(-50%,-50%) rotate(360deg);transform:translate(-50%,-50%) rotate(360deg);transition:.3s}.social ul li a i{color:#ffead3;font-size:23px;font-weight:900;position:absolute;top:50%;left:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);transform:translate(-50%,-50%);-webkit-stroke-width:5.3px;-webkit-stroke-color:#ffead3;-webkit-fill-color:#ffead3;text-shadow:1px 0 20px #ffead3;-webkit-transition:.3s;-moz-transition:.3s;-o-transition:.3s;transition:.3s}@media only screen and (max-width:480px){.social ul li{border-width:4px;width:45px;height:45px}.social ul li:before{width:43px;height:43px}.social ul li a{background-size:cover;top:-5px;left:0px;width:45px;height:45px;line-height:45px}.social ul li a:after,.social ul li a:before{background-size:cover;width:30px;height:30px}.social ul li a i{font-size:16px}}@media (min-width:992px) and (max-width:1199px){.profile_menu .btn{padding:15px 25px!important}.primary-nav li{width:116px}.primary-nav a,.primary-nav__nolink{margin:0}.primary-nav__top-link a{font-size:13px}.primary-nav a:after,.primary-nav__nolink:after{width:auto}}.social ul li a i.fa-envelope{font-size:14px;top:48%}.dark-style .social li a,.dark-style .social li a:hover,.k2t-footer.dark-style .social li a,.k2t-footer.dark-style .social li a:hover{color:#fff}.basr-social-share.social li a:hover,.basr-social-share.social li:hover a{color:#898989}.basr-social-share.social li a{border-width:0;color:#ccc}.basr-social-share.social li a span{display:none}#example tbody tr:hover{background:#ddd}#example thead tr th{font-size:18px}#example tbody tr td{font-size:16px}.degree_sec h2{margin:0;padding:0 0 25px;font-size:25px}.col-lg-3 {display: inline-block; float: left; text-align: center; margin-top: 10px;}.col-lg-9 {display: inline-block;}.social ul li a {top: -11px !important;}.chosen-container-multi{width: 100% !important;}
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
                                                    <li style="margin-top: 10px;">
                                                        <a class="facebook" href="<?php echo $about_me[0]['research_gate'] ?>"><img class="" src="<?php echo base_url();?>assets/social_icon/research_gate.png" alt="" style="border-radius: 50%;"/></a>
                                                    </li>
                                                    <?php } if($about_me[0]['google_scholar'] != '') {?>
                                                    <li>
                                                        <a class="twitter" href="<?php echo $about_me[0]['google_scholar'] ?>"><img class="" src="<?php echo base_url();?>assets/social_icon/google-scholar.png" alt="" style="border-radius: 50%;"/></a>
                                                    </li>
                                                    <?php } if($about_me[0]['linedin_link'] != '') {?>
                                                    <li>
                                                        <a class="googleplus" href="<?php echo $about_me[0]['linedin_link'] ?>"><img class="" src="<?php echo base_url();?>assets/social_icon/linkedin-icon.png" alt="" style="border-radius: 50%;"/></a>
                                                    </li>
                                                    <?php } if($about_me[0]['twitter_link'] != '') {?>
                                                    <li>
                                                        <a class="linkedin" href="<?php echo $about_me[0]['twitter_link'] ?>"><img class="" src="<?php echo base_url();?>assets/social_icon/twitter-icon.png" alt="" style="border-radius: 50%;"/></a>
                                                    </li>
                                                    <?php } if($about_me[0]['github_link'] != '') {?>
                                                    <li>
                                                        <a class="tumblr" href="<?php echo $about_me[0]['github_link'] ?>"><img class="" src="<?php echo base_url();?>assets/social_icon/github-icon.png" alt="" style="border-radius: 50%;"/></a>
                                                    </li>
                                                    <?php } if($about_me[0]['medium_link'] != '') {?>
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
                                <a href="<?php echo base_url()?>faculty/publication/<?php echo $uid?>"><button type="button" class="btn btn-primary active">Publication</button></a>
                                <?php if(!empty($project)) { ?>
                                <a href="<?php echo base_url()?>faculty/projects/<?php echo $uid?>"><button type="button" class="btn btn-primary">Projects</button></a>
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
                            <!-- Research Publication Start -->
                            <?php if ($this->session->userdata('user_id') != '' && $this->session->userdata('position') == 'Faculty') { ?>
                            <div class="col-sm-12" style="text-align: right; margin-top: 15px;">
                                <button type="button" class="btn btn-primary pub_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg4">Add New Record</button>
                            </div>
                            <?php } ?>
                            <?php if(!empty($journal->result_array())) { ?>
                            <div class='col-sm-12' style="margin-top: 50px;">
                                <h3 style="text-transform: capitalize">Journal Article</h3>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <tbody>
                                        <?php $j=1;
                                        foreach($journal->result_array() as $row) { ?>
                                        <tr>
                                            <td><?php echo $j ?></td>
                                            <?php 
                                                $author = $this->db->query("SELECT * FROM iitmandi_team WHERE FIELD(iitmandi_team.id,".$row['author_name'].") ORDER BY FIELD(iitmandi_team.id,".$row['author_name'].")");
                                                $value = $author->result_array();
                                                $count = count($value);
                                                for($i = 0; $i < $count; $i++) {
                                                    if ($value[$i]['mname'] == '') {
                                                        $commonValues[$i] = $value[$i]['lname'].", ".substr($value[$i]['fname'], 0, 1).".";
                                                    } else {
                                                        $commonValues[$i] = $value[$i]['lname'].", ".substr($value[$i]['fname'], 0, 1).". ".substr($value[$i]['mname'], 0, 1).".";
                                                    }
                                                }
                                                $lastItem = array_pop($commonValues);
                                                $text = implode(', ', $commonValues); // a, b 
                                                if ($text == ''){
                                                    $text .= $lastItem; 
                                                } else {
                                                    $text .= ', & '.$lastItem; // a, b and c
                                                } 
                                                if($row['issue_number'] != ""){
                                                    $issue_number = "(".$row['issue_number'].")";
                                                } else {
                                                    $issue_number = '';
                                                }
                                            ?> 
                                            <td style="text-align: justify;"><?php echo $text." (".date('Y', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['journal_name'].", ".$row['volume_number'].$issue_number.", ".$row['page_number'].". <a href=".$row['external_Link']." target='_blank'>".$row['external_Link']."</a>" ?></td>
                                            <?php if ($this->session->userdata('user_id') != '' && $this->session->userdata('position') == 'Faculty') { ?>
                                            <td>
                                                <button type="button" class="btn btn-primary evnt_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg2" onclick="DtljorID(<?php echo $row['id']?>)" style="background: red; color: #fff;">Delete</button>
                                            </td>
                                            <?php } else { ?>
                                                <td><a href="<?php echo base_url()?>pages/publication/publication_details/<?php echo $row['id']?>" class="btn btn-primary">View More</button></td>
                                            <?php } ?>
                                        </tr>
                                        <?php $j++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>

                            <?php if(!empty($conference->result_array())) { ?>
                            <div class='col-sm-12' style="margin-top: 50px;">
                                <h3 style="text-transform: capitalize">Conference Paper</h3>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <tbody>
                                        <?php $j=1;
                                        foreach($conference->result_array() as $row) { ?>
                                        <tr>
                                            <td><?php echo $j ?></td>
                                            <?php $author1 = $this->db->query("SELECT * FROM iitmandi_team WHERE FIELD(iitmandi_team.id,".$row['author_name'].") ORDER BY FIELD(iitmandi_team.id,".$row['author_name'].")");
                                                $value1 = $author1->result_array();
                                                $count1 = count($author1->result_array());
                                                for($i = 0; $i < $count1; $i++) {
                                                    if ($value1[$i]['mname'] == '') {
                                                        $commonValues1[$i] = $value1[$i]['lname'].", ".substr($value1[$i]['fname'], 0, 1).".";
                                                    } else {
                                                        $commonValues1[$i] = $value1[$i]['lname'].", ".substr($value1[$i]['fname'], 0, 1).". ".substr($value1[$i]['mname'], 0, 1).".";
                                                    }
                                                }
                                                $lastItem1 = array_pop($commonValues1);
                                                $text1 = implode(', ', $commonValues1); // a, b 
                                                if ($text1 == ''){
                                                    $text1 .= $lastItem1; 
                                                } else {
                                                    $text1 .= ', & '.$lastItem1; // a, b and c
                                                }
                                            ?>
                                            <td style="text-align: justify;"><?php echo $text1." (".date('Y, F', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['conference_name'].", ".$row['location']; ?></td>
                                            <?php if ($this->session->userdata('user_id') != '' && $this->session->userdata('position') == 'Faculty') { ?>
                                                <td>
                                                    <button type="button" class="btn btn-primary evnt_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg2" onclick="DtljorID(<?php echo $row['id']?>)" style="background: red; color: #fff;">Delete</button>
                                                </td>
                                            <?php } else { ?>
                                                <td><a href="<?php echo base_url()?>pages/publication/publication_details/<?php echo $row['id']?>" class="btn btn-primary">View More</button></td>
                                            <?php } ?>
                                        </tr>
                                        <?php $j++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>

                            <?php if(!empty($bookc->result_array())) { ?>
                            <div class='col-sm-12' style="margin-top: 50px;">
                                <h3 style="text-transform: capitalize">Book Chapter</h3>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <tbody>
                                        <?php $j=1;
                                        foreach($bookc->result_array() as $row) { ?>
                                        <tr>
                                            <td><?php echo $j ?></td>
                                            <?php $author2 = $this->db->query("SELECT * FROM iitmandi_team WHERE FIELD(iitmandi_team.id,".$row['author_name'].") ORDER BY FIELD(iitmandi_team.id,".$row['author_name'].")");
                                                $value2 = $author2->result_array();
                                                $count2 = count($author2->result_array());
                                                for($i = 0; $i < $count2; $i++) {
                                                    if ($value2[$i]['mname'] == '') {
                                                        $commonValues2[$i] = $value2[$i]['lname'].", ".substr($value2[$i]['fname'], 0, 1).".";
                                                    } else {
                                                        $commonValues2[$i] = $value2[$i]['lname'].", ".substr($value2[$i]['fname'], 0, 1).". ".substr($value2[$i]['mname'], 0, 1).".";
                                                    }
                                                }
                                                $lastItem2 = array_pop($commonValues2);
                                                $text2 = implode(', ', $commonValues2); // a, b 
                                                if ($text2 == ''){
                                                    $text2 .= $lastItem2; 
                                                } else {
                                                    $text2 .= ', & '.$lastItem2; // a, b and c
                                                }
                                            ?>
                                            <td style="text-align: justify;"><?php echo $text2." (".date('Y', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['editors'].", ".$row['book_name']." (".$row['page_number'].")"; ?></td>
                                            <?php if ($this->session->userdata('user_id') != '' && $this->session->userdata('position') == 'Faculty') { ?>
                                                <td>
                                                    <button type="button" class="btn btn-primary evnt_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg2" onclick="DtljorID(<?php echo $row['id']?>)" style="background: red; color: #fff;">Delete</button>
                                                </td>
                                            <?php } else { ?>
                                                <td><a href="<?php echo base_url()?>pages/publication/publication_details/<?php echo $row['id']?>" class="btn btn-primary">View More</button></td>
                                            <?php } ?>
                                        </tr>
                                        <?php $j++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>

                            <?php if(!empty($book->result_array())) { ?>
                            <div class='col-sm-12' style="margin-top: 50px;">
                                <h3 style="text-transform: capitalize">Book</h3>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <tbody>
                                        <?php $j=1;
                                        foreach($book->result_array() as $row) { ?>
                                        <tr>
                                            <td><?php echo $j ?></td>
                                            <?php $author3 = $this->db->query("SELECT * FROM iitmandi_team WHERE FIELD(iitmandi_team.id,".$row['author_name'].") ORDER BY FIELD(iitmandi_team.id,".$row['author_name'].")");
                                                $value3 = $author3->result_array();
                                                $count3 = count($author3->result_array());
                                                for($i = 0; $i < $count3; $i++) {
                                                    if ($value3[$i]['mname'] == '') {
                                                        $commonValues3[$i] = $value3[$i]['lname'].", ".substr($value3[$i]['fname'], 0, 1).".";
                                                    } else {
                                                        $commonValues3[$i] = $value3[$i]['lname'].", ".substr($value3[$i]['fname'], 0, 1).". ".substr($value3[$i]['mname'], 0, 1).".";
                                                    }
                                                }
                                                $lastItem3 = array_pop($commonValues3);
                                                $text3 = implode(', ', $commonValues3); // a, b 
                                                if ($text3 == ''){
                                                    $text3 .= $lastItem3; 
                                                } else {
                                                    $text3 .= ', & '.$lastItem3; // a, b and c
                                                }
                                            ?>
                                            <td style="text-align: justify;"><?php echo $text3." (".date('Y', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['publisher']; ?></td>
                                            <?php if ($this->session->userdata('user_id') != '' && $this->session->userdata('position') == 'Faculty') { ?>
                                                <td>
                                                    <button type="button" class="btn btn-primary evnt_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg2" onclick="DtljorID(<?php echo $row['id']?>)" style="background: red; color: #fff;">Delete</button>
                                                </td>
                                            <?php } else { ?>
                                                <td><a href="<?php echo base_url()?>pages/publication/publication_details/<?php echo $row['id']?>" class="btn btn-primary">View More</button></td>
                                            <?php } ?>
                                        </tr>
                                        <?php $j++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>

                            <?php if(!empty($patent->result_array())) { ?>
                            <div class='col-sm-12' style="margin-top: 50px;">
                                <h3 style="text-transform: capitalize">Patent</h3>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <tbody>
                                        <?php $j=1;
                                        foreach($patent->result_array() as $row) { ?>
                                        <tr>
                                            <td><?php echo $j ?></td>
                                            <?php $author4 = $this->db->query("SELECT * FROM iitmandi_team WHERE FIELD(iitmandi_team.id,".$row['author_name'].") ORDER BY FIELD(iitmandi_team.id,".$row['author_name'].")");
                                                $value4 = $author4->result_array();
                                                $count4 = count($author4->result_array());
                                                for($i = 0; $i < $count4; $i++) {
                                                    if ($value4[$i]['mname'] == '') {
                                                        $commonValues4[$i] = $value4[$i]['lname'].", ".substr($value4[$i]['fname'], 0, 1).".";
                                                    } else {
                                                        $commonValues4[$i] = $value4[$i]['lname'].", ".substr($value4[$i]['fname'], 0, 1).". ".substr($value4[$i]['mname'], 0, 1).".";
                                                    }
                                                }
                                                $lastItem4 = array_pop($commonValues4);
                                                $text4 = implode(', ', $commonValues4); // a, b 
                                                if ($text4 == ''){
                                                    $text4 .= $lastItem4; 
                                                } else {
                                                    $text4 .= ', & '.$lastItem4; // a, b and c
                                                }    
                                            ?>
                                                <td style="text-align: justify;"><?php echo $text4." (".date('Y, F d', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['patient_number']; ?></td>
                                            <?php if ($this->session->userdata('user_id') != '' && $this->session->userdata('position') == 'Faculty') { ?>
                                                <td>
                                                    <button type="button" class="btn btn-primary evnt_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg2" onclick="DtljorID(<?php echo $row['id']?>)" style="background: red; color: #fff;">Delete</button>
                                                </td>
                                            <?php } else { ?>
                                                <td><a href="<?php echo base_url()?>pages/publication/publication_details/<?php echo $row['id']?>" class="btn btn-primary">View More</button></td>
                                            <?php } ?>
                                        </tr>
                                        <?php $j++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Details Section -->
</main><!-- End #main -->
<div class="modal fade bd-example-modal-lg4 pub_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="background: #000000b0;">
    <div class="modal-dialog modal-lg" style="margin-top: 5%; width: 100%;">
        <div class="modal-content">
            <form id="form_pub" action="" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12" style="margin-bottom: 40px;">
                            <div class="col-sm-12" style="float: left; display: inline-block;">
                                <div class="form-group col-sm-4 cstm_details">
                                    <label for="Publications Type" class="control-label ">Publications Type</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <select class="form-control publication_type" name="publication_type" id="publication_type">
                                            <option value="">Choose an option</option>
                                            <option value="Journal Article">Journal Article</option>
                                            <option value="Conference Paper">Conference Paper</option>
                                            <option value="Book Chapter">Book Chapter</option>
                                            <option value="Book">Book</option>
                                            <option value="Patent">Patent</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 body_content" style="float: left; display: inline-block;">
                                <div>
                                    <div class="form-group col-sm-4 cstm_details attachment">
                                        <label for="Event Name" class="control-label">Image</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="file" class="form-control required" id="attachment" name="attachment" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details author_name">
                                        <label for="Event Name" class="control-label">Authors Name</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <!-- <select data-placeholder="Author List" multiple class="chosen-select" id="author_name" name="author_name[]"> -->
                                            <select class="form-control chosen" multiple id="author_name" name="author_name">
                                                <option value=""></option>
                                                <?php if(!empty($ourteam)) { 
                                                foreach($ourteam as $row) { ?>
                                                <option value="<?php echo $row['id']?>"><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?></option>
                                            <?php  } } else { ?>
                                                <option value="">No Data</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <input type="hidden" class="form-control required" id="s1-order-list" name="s1-order-list" value="">
                                        <div><a href="" class="pageLoad">Add External User</a></div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details paper_title">
                                        <label for="Event Name" class="control-label">Title of Paper</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="paper_title" name="paper_title" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details chapter_title">
                                        <label for="Event Name" class="control-label">Title of Chapter</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="chapter_title" name="chapter_title" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details patent_title">
                                        <label for="Event Name" class="control-label">Title of Patent</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="patent_title" name="patent_title" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details journal_name">
                                        <label for="Event Name" class="control-label">Journal Name</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="journal_name" name="journal_name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details conference_name">
                                        <label for="Event Name" class="control-label">Conference name</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="conference_name" name="conference_name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details book_name">
                                        <label for="Event Name" class="control-label">Book name</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="book_name" name="book_name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details publish_date">
                                        <label for="Event Name" class="control-label">Publised date</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="date" class="form-control required" id="publish_date" name="publish_date" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details patient_number">
                                        <label for="Event Name" class="control-label">Patent Number</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="patient_number" name="patient_number" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details publisher">
                                        <label for="Event Name" class="control-label">Publisher</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="publisher" name="publisher" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details location">
                                        <label for="Event Name" class="control-label">location</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="location" name="location" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details external_Link">
                                        <label for="Event Name" class="control-label">DOI (External Link)</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="external_Link" name="external_Link" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details editors">
                                        <label for="Event Name" class="control-label">Editors</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="editors" name="editors" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details page_number">
                                        <label for="Event Name" class="control-label">Page Number</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="page_number" name="page_number" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details volume_number">
                                        <label for="Event Name" class="control-label">Volume Number</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="volume_number" name="volume_number" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details issue_number">
                                        <label for="Event Name" class="control-label">Issue Number</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="issue_number" name="issue_number" value="">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group col-sm-12 cstm_details short_summery">
                                        <label for="Event Name" class="control-label">Short Summary</label>
                                        <div class="col-sm-12">
                                            <textarea id="short_summery" name="short_summery"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 cstm_details key_points">
                                        <label for="Event Name" class="control-label">Key points</label>
                                        <div class="col-sm-12">
                                            <textarea id="key_points" name="key_points"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group col-sm-4 cstm_details">
                                        <label for="Event Name" class="control-label">Highlights</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <select class="form-control" id="highlight" name="highlight">
                                                <option value="On My Page">On My Page</option>
                                                <option value="On Supervisor Page">On Supervisor Page</option>
                                                <option value="On School Page">On School Page</option>
                                                <option value="All of Above">All of Above</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details">
                                        <label for="Event Name" class="control-label">Status</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <select class="form-control" id="status" name="status">
                                                <option value="1" <?php if(@$research_category['status']==1){ echo "selected"; } ?>>Active</option>
                                                <option value="2" <?php if(@$research_category['status']==2){ echo "selected"; } ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12" style="text-align: center;margin-top: 20px;">
                        <div id="err"></div>
                        <input class="btn btn-primary publication_save" type="submit" value="Submit">
                        <input type="hidden" id="uid" name="uid" value="<?php echo $uid?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo $footer?>