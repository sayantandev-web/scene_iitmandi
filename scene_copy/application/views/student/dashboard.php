<?php 
//$uid = $this->session->userdata('user_id');
//$about_me = get_users_name($uid);
if ($this->session->userdata('user_id') != "") {
    $uid = $this->session->userdata('user_id');
} else {
    $uid = $about_me[0]['id'];
}
echo $header; ?>
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
    #author_name_chosen {width: 100% !important;}
</style>
<main id="main">
    <section id="portfolio-details" class="portfolio-details" style="margin-top: 70px">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="portfolio-info">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="container slide_content">
                                    <div class="row">
                                        <?php if ($this->session->userdata('user_id') != '') { ?>
                                        <a href="<?php echo base_url()?>student/logout"><button type="button" class="btn btn-primary">Logout</button></a>
                                        <?php } ?>
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
                            <div class="col-sm-12" style="text-align: right;">
                                <button type="button" class="btn btn-primary about_btn" data-toggle="modal" data-target=".bd-example-modal-lg1">Edit About Me</button>
                            </div>
                        </div>
                        <div class="tab-pane degree_sec" id="v-pills-link2" role="tabpanel" aria-labelledby="v-pills-link2-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 degree_sec">
                                        <div class="row">
                                            <div class='col-sm-12'>
                                                <h2 style="text-align: center;">Education</h2>
                                            </div>
                                            <div class='col-sm-12'>
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Degree</th>
                                                            <th>University</th>
                                                            <th>Year</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if(!empty($education)) {
                                                        $i=1; ?>
                                                    <?php foreach($education as $row) { ?>
                                                        <tr>
                                                            <td><?php echo $row['degree'];?></td>
                                                            <td><?php echo $row['university'];?></td>
                                                            <td><?php echo $row['year'];?></td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary edu_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg2" onclick="EditEduID(<?php echo $row['id']?>)">Edit</button>
                                                                <input type="hidden" id="data_id" name="data_id" value="<?php echo $row['id'];?>">
                                                                <button type="button" class="btn btn-danger edu_add_btn" onclick="DtlEduID(<?php echo $row['id']?>)" style="background: red; color: #fff;">Delete</button>
                                                            </td>
                                                        </tr>
                                                    <?php $i++; } } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="text-align: right;">
                                    <button type="button" class="btn btn-primary edu_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg2">Add Education</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane degree_sec" id="v-pills-link3" role="tabpanel" aria-labelledby="v-pills-link3-tab">
                            <div class="container">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Professional Experience</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Position(Company name)</th>
                                                    <th>Year</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($experience)) {
                                                $i=1; ?>
                                                <?php foreach($experience as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row['position'];?></td>
                                                    <td><?php echo $row['year'];?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary exp_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg3" onclick="EditExpID(<?php echo $row['id']?>)">Edit</button>
                                                        <button type="button" class="btn btn-danger exp_add_btn" onclick="DtlExpID(<?php echo $row['id']?>)" style="background: red; color: #fff;">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php $i++; } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="text-align: right;">
                                    <button type="button" class="btn btn-primary exp_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg3">Add Professional Experience</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane degree_sec" id="v-pills-link4" role="tabpanel" aria-labelledby="v-pills-link4-tab">
                            <div class="container">
                                <div class="row">
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
                                                <td style="text-align: left;"><?php echo $text." (".date('Y', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['journal_name'].", ".$row['volume_number']."(".$row['issue_number']."), ".$row['page_number'].". <a href=".$row['external_Link']." target='_blank'>".$row['external_Link']."</a>" ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary evnt_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg2" onclick="DtljorID(<?php echo $row['id']?>)" style="background: red; color: #fff;">Delete</button>
                                                </td>
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
                                                <?php 
                                                $author1 = $this->db->query("SELECT * FROM iitmandi_team WHERE FIELD(iitmandi_team.id,".$row['author_name'].") ORDER BY FIELD(iitmandi_team.id,".$row['author_name'].")");
                                                $value1 = $author1->result_array();
                                                $count1 = count($value1);
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
                                                if($row['issue_number'] != ""){
                                                    $issue_number = "(".$row['issue_number'].")";
                                                } else {
                                                    $issue_number = '';
                                                }
                                                ?>
                                                <td style="text-align: left;"><?php echo $text1." (".date('Y, F', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['conference_name'].", ".$row['location']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary evnt_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg2" onclick="DtljorID(<?php echo $row['id']?>)" style="background: red; color: #fff;">Delete</button>
                                                </td>
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
                                                <?php 
                                                $author2 = $this->db->query("SELECT * FROM iitmandi_team WHERE FIELD(iitmandi_team.id,".$row['author_name'].") ORDER BY FIELD(iitmandi_team.id,".$row['author_name'].")");
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
                                                if($row['issue_number'] != ""){
                                                    $issue_number = "(".$row['issue_number'].")";
                                                } else {
                                                    $issue_number = '';
                                                }
                                                ?>
                                                <td style="text-align: left;"><?php echo $text2." (".date('Y', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['editors'].", ".$row['book_name']." (".$row['page_number'].")"; ?></td>
                                                <td>
                                                    <!-- <a href="#" class="btn waves-effect waves-light tooltips td_class" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->
                                                    <button type="button" class="btn btn-primary evnt_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg2" onclick="DtljorID(<?php echo $row['id']?>)" style="background: red; color: #fff;">Delete</button>
                                                </td>
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
                                                <?php 
                                                $author3 = $this->db->query("SELECT * FROM iitmandi_team WHERE FIELD(iitmandi_team.id,".$row['author_name'].") ORDER BY FIELD(iitmandi_team.id,".$row['author_name'].")");
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
                                                if($row['issue_number'] != ""){
                                                    $issue_number = "(".$row['issue_number'].")";
                                                } else {
                                                    $issue_number = '';
                                                }
                                                ?>
                                                <td style="text-align: left;"><?php echo $text3." (".date('Y', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['publisher']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary evnt_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg2" onclick="DtljorID(<?php echo $row['id']?>)" style="background: red; color: #fff;">Delete</button>
                                                </td>
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
                                                if($row['issue_number'] != ""){
                                                    $issue_number = "(".$row['issue_number'].")";
                                                } else {
                                                    $issue_number = '';
                                                }  
                                                ?>
                                                <td style="text-align: left;"><?php echo $text4." (".date('Y, F d', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['patient_number']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary evnt_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg2" onclick="DtljorID(<?php echo $row['id']?>)" style="background: red; color: #fff;">Delete</button>
                                                </td>
                                            </tr>
                                            <?php $j++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php } ?>
                                </div>
                                <div class="col-sm-12" style="text-align: right;">
                                    <button type="button" class="btn btn-primary pub_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg4">Add New Publication</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane degree_sec" id="v-pills-link5" role="tabpanel" aria-labelledby="v-pills-link5-tab">
                            <div class="container">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Awards and Honours</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                            <?php if(!empty($award)) { ?>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Year</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1;
                                                foreach($award as $row) {  ?>
                                                <tr>
                                                    <td><?php echo $row['name'];?></td>
                                                    <td><?php echo $row['year'];?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary awrd_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg5" onclick="EditAwrdID(<?php echo $row['id']?>)">Edit</button>
                                                        <button type="button" class="btn btn-primary edu_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg2" onclick="DtlAwrdID(<?php echo $row['id']?>)" style="background: red; color: #fff;">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php $i++; } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="text-align: right;">
                                    <button type="button" class="btn btn-primary awrd_add_btn" data-toggle="modal" data-target=".bd-example-modal-lg5">Add Awards and Honours</button>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="tab-pane degree_sec" id="v-pills-link6" role="tabpanel" aria-labelledby="v-pills-link6-tab">
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
                                <div class="col-sm-12" style="text-align: right;">
                                    <button type="button" class="btn btn-primary"><a href=''>Add New Album</a></button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="modal fade bd-example-modal-lg1 about_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="background: #000000b0;">
    <div class="modal-dialog modal-lg" style="margin-top: 5%; width: 100%;">
        <div class="modal-content">
        <form id="form_aboutme" action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12" style="margin-bottom: 40px;">
                        <div class="col-sm-2" style="text-align: right; float: left; display: inline-block; padding: 10px;">
                            <img class="bio_img" src="<?php echo base_url();?>uploads/our_team/<?php echo $about_me[0]['team_image'];?>" alt="" style="height: 135px !important;"/>
                            <div class="fileupload btn btn-primary_cust waves-effect waves-light" style="padding: 15px 0 0 !important;font-size: 14px;">
                                <input type="file" name="team_image" id="team_image" class="upload" style="padding: 0px; border: none;">
                                <span id="image_name1"></span>
                            </div>
                        </div>
                        <div class="col-sm-10" style="float: left; display: inline-block;">
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">Name</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="text" class="form-control required" id="fname" name="fname" value="<?php echo $about_me[0]['fname'];?>">
                                </div>
                            </div>
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">Enrolment No.</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="text" class="form-control required" id="enrollno" name="enrollno" value="<?php echo $about_me[0]['enrollno'];?>">
                                </div>
                            </div>
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">Email</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="email" class="form-control required" id="email" name="email" value="<?php echo $about_me[0]['email'];?>">
                                </div>
                            </div>
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">Admission year</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="text" class="form-control required" id="admissionyear" name="admissionyear" value="<?php echo $about_me[0]['admssnyear'];?>">
                                </div>
                            </div>
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">Research Interests</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="text" class="form-control required" id="research_interest1" name="research_interest1" value="<?php echo $about_me[0]['research_interest'];?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-12'>
                        <textarea id="aboutme" name="aboutme"><?php echo $about_me[0]['aboutme'];?></textarea>
                    </div>
                </div>
                <div class="col-sm-12" style="text-align: center;margin-top: 20px;">
                    <div id="err"></div>
                    <input class="btn btn-primary about_save" type="submit" value="Update">
                    <input type="hidden" id="uid" name="uid" value="<?php echo $uid?>">
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg2 edu_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="background: #000000b0;">
    <div class="modal-dialog modal-lg" style="margin-top: 5%; width: 100%;">
        <div class="modal-content">
        <form id="form_edu" action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12" style="margin-bottom: 40px;">
                        <div class="col-sm-12" style="float: left; display: inline-block;">
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">Degree</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="text" class="form-control required" id="degree" name="degree">
                                </div>
                            </div>
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">University</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="text" class="form-control required" id="university" name="university">
                                </div>
                            </div>
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">Year</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="text" class="form-control required" id="year" name="year">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 col-md-3 col-sm-4 control-label">Status</label>
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
                <div class="col-sm-12" style="text-align: center;margin-top: 20px;">
                    <div id="err"></div>
                    <!-- <button type="button" class="btn btn-primary about_data"><a href="javascript:void(0);">Edit Record</a></button> -->
                    <!-- <button type="button" class="btn btn-primary about_save" data-toggle="modal" data-target=".bd-example-modal-lg">Update</button> -->
                    <input class="btn btn-primary edu_save" type="submit" value="Submit">
                    <input type="hidden" id="uid" name="uid" value="<?php echo $uid?>">
                    <input type="hidden" id="dataid" name="dataid">
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg3 exp_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="background: #000000b0;">
    <div class="modal-dialog modal-lg" style="margin-top: 5%; width: 100%;">
        <div class="modal-content">
            <form id="form_exp" action="" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12" style="margin-bottom: 40px;">
                            <div class="col-sm-12" style="float: left; display: inline-block;">
                                <div class="form-group col-sm-4 cstm_details">
                                    <label for="Event Name" class="control-label">Position</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <input type="text" class="form-control required" id="position" name="position">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 cstm_details">
                                    <label for="Event Name" class="control-label">Year</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <input type="text" class="form-control required" id="exp_year" name="exp_year">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 cstm_details">
                                    <label for="Event Name" class="control-label">Status</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <select class="form-control" name="status">
                                            <option value="1" <?php if(@$research_category['status']==1){ echo "selected"; } ?>>Active</option>
                                            <option value="2" <?php if(@$research_category['status']==2){ echo "selected"; } ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12" style="text-align: center;margin-top: 20px;">
                        <div id="err"></div>
                        <!-- <button type="button" class="btn btn-primary about_data"><a href="javascript:void(0);">Edit Record</a></button> -->
                        <!-- <button type="button" class="btn btn-primary about_save" data-toggle="modal" data-target=".bd-example-modal-lg">Update</button> -->
                        <input class="btn btn-primary exp_save" type="submit" value="Submit">
                        <input type="hidden" id="uid" name="uid" value="<?php echo $uid?>">
                        <input type="hidden" id="expid" name="expid">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
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
                                            <input type="file" class="form-control required" id="attachment" name="attachment">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details author_name">
                                        <label for="Event Name" class="control-label">Authors Name</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <!-- <select data-placeholder="Author List" multiple class="chosen-select"  id="author_name" name="author_name[]"> -->
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
                                            <input type="text" class="form-control required" id="paper_title" name="paper_title">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details journal_name">
                                        <label for="Event Name" class="control-label">Journal Name</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="journal_name" name="journal_name">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details conference_name">
                                        <label for="Event Name" class="control-label">Conference name</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="conference_name" name="conference_name">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details book_name">
                                        <label for="Event Name" class="control-label">Book name</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="book_name" name="book_name">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details publish_date">
                                        <label for="Event Name" class="control-label">Publised date</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="date" class="form-control required" id="publish_date" name="publish_date">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details patient_number">
                                        <label for="Event Name" class="control-label">Patent Number</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="patient_number" name="patient_number">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details publisher">
                                        <label for="Event Name" class="control-label">Publisher</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="publisher" name="publisher">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details location">
                                        <label for="Event Name" class="control-label">location</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="location" name="location">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details external_Link">
                                        <label for="Event Name" class="control-label">DOI (External Link)</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="external_Link" name="external_Link">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details editors">
                                        <label for="Event Name" class="control-label">Editors</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="editors" name="editors">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details page_number">
                                        <label for="Event Name" class="control-label">Page Number</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="page_number" name="page_number">
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
                                    <div class="form-group col-sm-12 cstm_details page_number">
                                        <label for="Event Name" class="control-label">Short Summary</label>
                                        <div class="col-sm-12">
                                            <textarea id="short_summery" name="short_summery"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 cstm_details page_number">
                                        <label for="Event Name" class="control-label">Key points</label>
                                        <div class="col-sm-12">
                                            <textarea id="key_points" name="key_points"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
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
                        <input type="hidden" id="pubid" name="pubid">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg5 awrd_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="background: #000000b0;">
    <div class="modal-dialog modal-lg" style="margin-top: 5%; width: 100%;">
        <div class="modal-content">
            <form id="form_awrd" action="" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12" style="margin-bottom: 40px;">
                            <div class="col-sm-12" style="float: left; display: inline-block;">
                                <div class="form-group col-sm-4 cstm_details">
                                    <label for="Event Name" class="control-label">Name</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <input type="text" class="form-control required" id="title" name="title" value="">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 cstm_details">
                                    <label for="Event Name" class="control-label">Year</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <input type="text" class="form-control required" id="awrd_year" name="awrd_year" value="">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 cstm_details">
                                    <label for="Event Name" class="control-label">Status</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <select class="form-control" name="status">
                                            <option value="1" <?php if(@$research_category['status']==1){ echo "selected"; } ?>>Active</option>
                                            <option value="2" <?php if(@$research_category['status']==2){ echo "selected"; } ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12" style="text-align: center;margin-top: 20px;">
                        <div id="err"></div>
                        <input class="btn btn-primary awd_save" type="submit" value="Submit">
                        <input type="hidden" id="uid" name="uid" value="<?php echo $uid?>">
                        <input type="hidden" id="awdid" name="awdid">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo $footer?>