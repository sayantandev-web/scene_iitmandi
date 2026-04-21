<?php echo $header;?>
<style>
    .nav-pills .nav-link{margin-bottom: 15px;}
    .bio_img {width: 140px; height: 140px; border-radius: 50%;}
    .bio_text {margin-bottom: auto;}
    .bio_text1 {margin-top: 30px; border: 1px solid #eee; padding: 30px; text-align: justify;}
    .td_class {padding: 0px; display: initial;}
    .table>:not(caption)>*>* {text-align: center;}   
    .fade:not(.show) { opacity: 1 !important; background: #00000063;}
    .modal-lg { margin-top : 10%}
    .close {padding: 0;background-color: transparent;border: 0;float: right;font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;
opacity: .5;}
    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {max-width: 1600px !important;}
    .choose_sec .btn{background:#ffdf80; color:#fff; border-radius:5px; width:100%; padding:8px 0; color:#022851;}
    .choose_sec .btn:hover{background:#022851; color:#fff;}
    .choose_sec select{height:40px; font-size:16px; padding:0 10px;}
    #example thead tr th {font-size: 18px;}
    #example tbody tr td {font-size: 16px;}

</style>
<main id="main">
    <section id="portfolio-details" class="portfolio-details" style="margin-top:70px;">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="portfolio-info">
                    <?php if($this->uri->segment(2) == 'journal') { ?>
                        <h3 style="text-align:center">Journal Article</h3>
                    <?php } else if ($this->uri->segment(2) == 'conference') { ?>
                        <h3 style="text-align:center">Conference</h3>
                    <?php } else if ($this->uri->segment(2) == 'book_chapter') { ?>
                        <h3 style="text-align:center">Book Chapter</h3>
                    <?php } else if ($this->uri->segment(2) == 'book') { ?>
                        <h3 style="text-align:center">Book</h3>
                    <?php } else if ($this->uri->segment(2) == 'patent') { ?>
                        <h3 style="text-align:center">Patent</h3>
                    <?php } ?>
                        <div class="row choose_sec filter_data">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-4">
                                <?php
                                //$currently_selected = date('Y', strtotime('+10 years')); 
                                $currently_selected = @$project['starting_year'];
                                $earliest_year = 2000; 
                                $latest_year = date('Y', strtotime('+20 years')); 
                                ?>
                                <select class="form-control" id="filterByYear" name="filterByYear">
                                    <option value="">Select Year</option>
                                    <?php foreach ( range( $latest_year, $earliest_year ) as $i ) { ?>
                                        <option value="<?php echo $i?>"><?php echo $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control" id="filterByAuthor" name="filterByAuthor">
                                    <option value="">Select Author</option>
                                    <?php if(!empty($ourteam->result_array())) { 
                                    foreach($ourteam->result_array() as $row) { ?>
                                    <option value="<?php echo $row['id']?>"><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?></option>
                                    <?php  } } else { ?>
                                    <option value="">No Data</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-secondary" onClick="window.location.reload();">Reset</button>
                                <input type="hidden" id="project_type" value = '2'>
                            </div>
                        </div>
                        
                        <?php if($this->uri->segment(2) == 'journal') {
                        if(!empty($journal)) { ?>
                        <div class='col-sm-12' style="margin-top: 50px;">
                            <table id="example" class="table table-striped filtered_pub" style="width:100%">
                                <tbody>
                                    <?php $j=1;
                                    //echo "<pre>"; print_r($journal);
                                    foreach($journal as $row) { ?>
                                    <tr>
                                        <td><?php echo $j.")" ?></td>
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
                                        <td><a href="<?php echo base_url()?>pages/publication/publication_details/<?php echo $row['id']?>" target="_blank" class="btn btn-primary">View More</a></td>
                                    </tr>
                                    <?php $j++; } ?>
                                </tbody>
                            </table>
                            <input type="hidden" id="pub_type" value="Journal Article">
                        </div>
                        <?php } } ?>

                        <?php if ($this->uri->segment(2) == 'conference') {
                        if(!empty($conference)) { ?>
                        <div class='col-sm-12' style="margin-top: 50px;">
                            <table id="example" class="table table-striped filtered_pub" style="width:100%">
                                <tbody>
                                    <?php $j=1;
                                    foreach($conference as $row) { ?>
                                    <tr>
                                        <td><?php echo $j.")" ?></td>
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
                                        <td><a href="<?php echo base_url()?>pages/publication/publication_details/<?php echo $row['id']?>" target="_blank" class="btn btn-primary">View More</a></td>
                                    </tr>
                                    <?php $j++; } ?>
                                </tbody>
                            </table>
                            <input type="hidden" id="pub_type" value="Conference Paper">
                        </div>
                        <?php } } ?>

                        <?php if ($this->uri->segment(2) == 'book_chapter') {
                        if(!empty($bookc)) { ?>
                        <div class='col-sm-12' style="margin-top: 50px;">
                            <table id="example" class="table table-striped filtered_pub" style="width:100%">
                                <tbody>
                                    <?php $j=1;
                                    foreach($bookc as $row) { ?>
                                    <tr>
                                        <td><?php echo $j.")" ?></td>
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
                                        <td><a href="<?php echo base_url()?>pages/publication/publication_details/<?php echo $row['id']?>" target="_blank" class="btn btn-primary">View More</a></td>
                                    </tr>
                                    <?php $j++; } ?>
                                </tbody>
                            </table>
                            <input type="hidden" id="pub_type" value="Book Chapter">
                        </div>
                        <?php } } ?>

                        <?php if ($this->uri->segment(2) == 'book') {
                        if(!empty($book)) { ?>
                        <div class='col-sm-12' style="margin-top: 50px;">
                            <table id="example" class="table table-striped filtered_pub" style="width:100%">
                                <tbody>
                                    <?php $j=1;
                                    foreach($book as $row) { ?>
                                    <tr>
                                        <td><?php echo $j.")" ?></td>
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
                                        <td><a href="<?php echo base_url()?>pages/publication/publication_details/<?php echo $row['id']?>" target="_blank" class="btn btn-primary">View More</a></td>
                                    </tr>
                                    <?php $j++; } ?>
                                </tbody>
                            </table>
                            <input type="hidden" id="pub_type" value="Book">
                        </div>
                        <?php } } ?>

                        <?php if ($this->uri->segment(2) == 'patent') {
                        if(!empty($patent)) { ?>
                        <div class='col-sm-12' style="margin-top: 50px;">
                            <table id="example" class="table table-striped filtered_pub" style="width:100%">
                                <tbody>
                                    <?php $j=1;
                                    foreach($patent as $row) { ?>
                                    <tr>
                                        <td><?php echo $j.")" ?></td>
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
                                        <td><a href="<?php echo base_url()?>pages/publication/publication_details/<?php echo $row['id']?>" target="_blank" class="btn btn-primary">View More</a></td>
                                    </tr>
                                    <?php $j++; } ?>
                                </tbody>
                            </table>
                            <input type="hidden" id="pub_type" value="Patent">
                        </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Details Section -->
</main><!-- End #main -->
<?php echo $footer?>