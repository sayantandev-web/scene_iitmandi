<?php echo $header;?>
<style>
    .nav-pills .nav-link{margin-bottom: 15px;}
    .bio_img {width: 100%;  border-radius: 50%; height: 50px;}
    .bio_text {margin: 0px 0px 0px 40px; text-align: left;}
    .bio_text1 {margin-top: 30px; border: 1px solid #eee; padding: 30px; text-align: justify;}
    .bio_text1 p{text-transform: capitalize; text-align: center;font-size: 25px; color:#5c5c77;}
    .td_class {padding: 0px; display: initial;}
    .table>:not(caption)>*>* {text-align: center;}
    /* .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {max-width: 1590px !important;} */
    .cstm_gllery {float: left; display: inline;}
    .cstm_gllery img {padding: 12px;}
    .cstm_gllery h3, p {text-align: center;}
    .modal-content {padding: 30px}
    .modal-lg, .modal-xl {--bs-modal-width: 90% !important;}
    .cstm_details {float: left; display: inline-block;}
    .portfolio-details .portfolio-info h3{margin-bottom: 0 !important; padding-bottom: 0 !important; border-bottom: none !important;}
    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {max-width: 1440px !important;}
    .cslm_crnt_open ul { list-style-type: disc !important; padding-left:1em !important; margin-left:1em;}
    .cstmf_gllery {float: left; display: inline;}
    .cstmf_gllery img {padding: 12px;}
    #example thead tr th { font-size: 18px;}
    #example tbody tr td { font-size: 16px;}
    .degree_sec h2 { margin: 0; padding: 0 0 25px; font-size: 25px;}
    .co-codi{width:100px;float:left; text-align:center;}
    .co-codi a{width:100%; text-align:center;}
    .co-codi .bio_text{margin:0px; text-align:center;}
    .degree_sec{margin-top:15px;}

</style>
<main id="main">
    <section id="portfolio-details" class="portfolio-details" style="margin-top: 70px">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="portfolio-info">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="container slide_content">
                                        <div class="row">
                                            <div class='col-sm-12' style="margin-top: 20px;margin-bottom: 30px; border:1px solid #ddd;">                                                        
                                                <div class="row p-3">
                                                    <div class="col-sm-3" style="text-align: center;float: left;display: inline-block;">
                                                        <img class="bio_img" src="<?php echo base_url();?>uploads/our_team/<?php echo $about_me[0]['team_image'];?>" alt="" style=" height: 302px;">
                                                    </div>
                                                    <div class="col-sm-9" style="text-align: center;float: left;display: inline-block;margin-top: 28px;">
                                                        <p style="text-transform: capitalize; text-align: center;font-size: 25px; color:#5c5c77;" ><strong>Name:</strong> <?php echo $about_me[0]['fname']." ".$about_me[0]['mname']." ".$about_me[0]['lname'] ?></p>
                                                        <p style="text-transform: capitalize; text-align: center;font-size: 25px; color:#5c5c77;"><strong>Enrolment No.: </strong><?php echo $about_me[0]['enrollno'];?></p>
                                                        <p style="text-transform: capitalize; text-align: center;font-size: 25px; color:#5c5c77;"><strong>Admission year: </strong><?php echo $about_me[0]['admssnyear'];?></p>
                                                        <p style="text-transform: capitalize; text-align: center;font-size: 25px; color:#5c5c77;"><strong>Research Interests: </strong><?php echo $about_me[0]['research_interest'];?></p>
                                                        <div class="social_sec">
                                                            <a href="mailto:<?php echo $about_me[0]['email'];?>"><i class="fa-regular fa-envelope"></i><?php echo $about_me[0]['email'];?></a><br>
                                                            <a href="tel:<?php echo $about_me[0]['mobile'];?>"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $about_me[0]['mobile'];?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-sm-12'>
                                        <div class='bio_text1' style="margin-bottom:40px;"><?php echo $about_me[0]['aboutme'];?></div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div>
                                                <?php 
                                                if ($about_me[0]['supervisor'] != "") { ?>
                                                <span style="float:left;">Supervisor:</span> 
                                                <?php $supervisor = $this->db->query("SELECT * FROM `iitmandi_team` WHERE `id` =".$about_me[0]['supervisor']);
                                                if(!empty($supervisor->result_array())) {
                                                foreach($supervisor->result_array() as $row1) { ?>
                                                <div class="co-codi">
                                                    <img style="width:50px;border-radius: 50%;border: 3px solid #000;" class="bio_img" src="<?php echo base_url();?>uploads/our_team/<?php echo $row1['team_image'];?>" alt=""/>
                                                    <a href="<?php echo base_url();?>pages/faculty_details/<?php echo base64_encode($about_me[0]['supervisor'])?>"><p class='bio_text'><?php echo $row1['fname'];?></p></a>
                                                </div>
                                                <?php } } }?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div>
                                                <?php 
                                                if ($about_me[0]['cosupervisors'] != "") { ?>
                                                <span style="float:left;">Co-Supervisor:</span> 
                                                <?php $cosupervisor = $this->db->query("SELECT * FROM `iitmandi_team` WHERE `id` IN (".$about_me[0]['cosupervisors'].")");
                                                if(!empty($cosupervisor->result_array())) {
                                                foreach($cosupervisor->result_array() as $row1) { ?>
                                                <div class="co-codi"><img style="width:50px;border-radius: 50%;border: 3px solid #000;" class="bio_img" src="<?php echo base_url();?>uploads/our_team/<?php echo $row1['team_image'];?>" alt=""/>
                                                    <a href="<?php echo base_url();?>pages/faculty_details/<?php echo base64_encode($row1['id'])?>"><p class='bio_text'><?php echo $row1['fname'];?></p></a>
                                                </div>         
                                                <?php } } }?>           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="v-pills-link2" role="tabpanel" aria-labelledby="v-pills-link2-tab">
                                    <?php if(!empty($education)) {
                                    $i=1; ?>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 degree_sec">
                                                <div class="row ">
                                                    <div class='col-sm-12'>
                                                        <h2 style="text-align: left;">Education</h2>
                                                    </div>
                                                    <div class='col-sm-12'>
                                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sl No.</th>
                                                                    <th>Degree</th>
                                                                    <th>University</th>
                                                                    <th>Year</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($education as $row1) { ?>
                                                                <tr>
                                                                    <td><?php echo $i;?></td>
                                                                    <td><?php echo $row1['degree']?></td>
                                                                    <td><?php echo $row1['university']?></td>
                                                                    <td><?php echo $row1['year']?></td>
                                                                </tr>
                                                                <?php $i++; } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="tab-pane" id="v-pills-link3" role="tabpanel" aria-labelledby="v-pills-link3-tab">
                                    <?php if(!empty($experience)) {
                                    $i=1; ?>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 degree_sec">
                                                <div class="row">
                                                    <div class='col-sm-12'>
                                                        <h2 style="text-align: left;">Professional Experience</h2>
                                                    </div>
                                                    <div class='col-sm-12'>
                                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sl No.</th>
                                                                    <th>Position(Company name)</th>
                                                                    <th>Year</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach($experience as $row) { ?>
                                                                <tr>
                                                                    <td><?php echo $i;?></td>
                                                                    <td><?php echo $row['position'];?></td>
                                                                    <td><?php echo $row['year'];?></td>
                                                                </tr>
                                                                <?php $i++; } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="tab-pane" id="v-pills-link4" role="tabpanel" aria-labelledby="v-pills-link4-tab">
                                    <div class="container">
                                        <div class="row">
                                        <?php 
                                        if(!empty($journal->result_array())) { ?>
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
                                                            //echo "<pre>"; print_r($author->result_array());
                                                            $value = $author->result_array();
                                                            $count = count($author->result_array());
                                                            for($i = 0; $i < $count; $i++) {
                                                                if ($value[$i]['mname'] == '') {
                                                                    $commonValues[$i] = $value[$i]['lname'].", ".substr($value[$i]['fname'], 0, 1).".";
                                                                } else {
                                                                    $commonValues[$i] = $value[$i]['lname'].", ".substr($value[$i]['mname'], 0, 1).", ".substr($value[$i]['fname'], 0, 1).".";
                                                                }
                                                            }
                                                            $lastItem = array_pop($commonValues);
                                                            $text = implode(', ', $commonValues); // a, b 
                                                            if ($text == ''){
                                                                $text .= $lastItem; 
                                                            } else {
                                                                $text .= ', & '.$lastItem; // a, b and c
                                                            }    
                                                        ?> 
                                                        <td style="text-align: left;"><?php echo $text." (".date('Y', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['journal_name'].", ".$row['volume_number']."(".$row['issue_number']."), ".$row['page_number'].". <a href=".$row['external_Link']." target='_blank'>".$row['external_Link']."</a>" ?></td>
                                                        <td><a href="<?php echo base_url()?>pages/publication/publication_details/<?php echo $row['id']?>" target="_blank" class="btn btn-primary">View More</a></td>
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
                                                                    $commonValues1[$i] = $value1[$i]['lname'].", ".substr($value1[$i]['mname'], 0, 1).", ".substr($value1[$i]['fname'], 0, 1).".";
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
                                                        <td style="text-align: left;"><?php echo $text1." (".date('Y, F', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['conference_name'].", ".$row['location']; ?></td>
                                                        <td><a href="<?php echo base_url()?>pages/publication/publication_details/<?php echo $row['id']?>" target="_blank" class="btn btn-primary">View More</a></td>
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
                                                                    $commonValues2[$i] = $value2[$i]['lname'].", ".substr($value2[$i]['mname'], 0, 1).", ".substr($value2[$i]['fname'], 0, 1).".";
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
                                                        <td style="text-align: left;"><?php echo $text2." (".date('Y', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['editors'].", ".$row['book_name']." (".$row['page_number'].")"; ?></td>
                                                        <td><a href="<?php echo base_url()?>pages/publication/publication_details/<?php echo $row['id']?>" target="_blank" class="btn btn-primary">View More</a></td>
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
                                                                    $commonValues3[$i] = $value3[$i]['lname'].", ".substr($value3[$i]['mname'], 0, 1).", ".substr($value3[$i]['fname'], 0, 1).".";
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
                                                        <td style="text-align: left;"><?php echo $text3." (".date('Y', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['publisher']; ?></td>
                                                        <td><a href="<?php echo base_url()?>pages/publication/publication_details/<?php echo $row['id']?>" target="_blank" class="btn btn-primary">View More</a></td>
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
                                                                $commonValues4[$i] = $value4[$i]['lname'].", ".substr($value4[$i]['mname'], 0, 1).", ".substr($value4[$i]['fname'], 0, 1).".";
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
                                                        <td style="text-align: left;"><?php echo $text4." (".date('Y, F d', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['patient_number']; ?></td>
                                                        <td><a href="<?php echo base_url()?>pages/publication/publication_details/<?php echo $row['id']?>" target="_blank" class="btn btn-primary">View More</a></td>
                                                    </tr>
                                                    <?php $j++; } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="v-pills-link5" role="tabpanel" aria-labelledby="v-pills-link5-tab">
                                    <?php if(!empty($award)) { ?>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 degree_sec">
                                                <div class="row">
                                                    <div class='col-sm-12'>
                                                        <h2 style="text-align: left;">Awards and Honours</h2>
                                                    </div>
                                                    <div class='col-sm-12'>
                                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Year</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $i=1;
                                                            foreach($award as $row) { ?>
                                                                <tr>
                                                                    <td><?php echo $row['name'];?></td>
                                                                    <td><?php echo $row['year'];?></td>
                                                                </tr>
                                                            <?php $i++; } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <!-- <div class="tab-pane" id="v-pills-link6" role="tabpanel" aria-labelledby="v-pills-link6-tab">
                                    <div class="container">
                                        <div class="row">
                                            <div class='col-sm-12'>
                                                <h2 style="text-align: center;">Photo Gallery</h2>
                                            </div>
                                            <div class="content">
                                                <div class='col-sm-12'>
                                                    <div class="col-sm-3 cstm_gllery">
                                                        <a href=""><img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/></a>
                                                    </div>
                                                    <div class="col-sm-3 cstm_gllery">
                                                        <a href=""><img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/></a>
                                                    </div>
                                                    <div class="col-sm-3 cstm_gllery">
                                                        <a href=""><img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/></a>
                                                    </div>
                                                    <div class="col-sm-3 cstm_gllery">
                                                        <a href=""><img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Details Section -->
</main><!-- End #main -->
<?php echo $footer?>