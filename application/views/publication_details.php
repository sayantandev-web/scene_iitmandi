<?php echo $header;?>
<style>
    .nav-pills .nav-link{margin-bottom: 15px;}
    .bio_img {width: 100%; height: 500px;}
    .bio_text {margin-bottom: auto;}
    .bio_text1 {border: 1px solid #eee; padding: 30px; text-align: justify;}
    .td_class {padding: 0px; display: initial;}
    .table>:not(caption)>*>* {text-align: center;}
    .cstm_gllery {float: left; display: inline;}
    .cstm_gllery img {padding: 12px; border-radius: 50%; height: 313px;}
    /*.cstm_gllery h3, p {text-align: center;}*/
    .modal-content {padding: 30px}
    .modal-lg, .modal-xl {--bs-modal-width: 90% !important;}
    .cstm_details {float: left; display: inline-block;}
    .portfolio-details .portfolio-info h3{margin-bottom: 0 !important; padding-bottom: 0 !important; border-bottom: none !important;}
    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {max-width: 1440px !important;}
    .cslm_crnt_open ul { list-style-type: disc !important; padding-left:1em !important; margin-left:1em;}
    .cstmf_gllery {float: left; display: inline;}
    .cstmf_gllery img {padding: 12px;}
</style>
<main id="main">
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="portfolio-info">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12' style="margin-top: 50px;">
                                    <?php if ($pub_details[0]['publication_type'] == 'Journal Article') { ?>
                                        <?php if (!empty($pub_details[0]['attachment'])) { ?>
                                        <div class="col-sm-12" style="text-align: center;float: left;display: inline-block;">
                                            <img class="bio_img" src="<?php echo base_url();?>uploads/publication/<?php echo $pub_details[0]['attachment'];?>" alt=""/>
                                        </div>
                                        <?php } ?>
                                        <div class="col-sm-12" style="float: left;display: inline-block;">
                                            <div>
                                                <h3 style="text-align:center;font-size: 40px;color: #022851;"> <?php echo $pub_details[0]['paper_title'];?></h3>
                                                <h3 style="text-align:center;font-size: 30px;"> <?php echo $pub_details[0]['journal_name'];?></h3>
                                                <h3 style="text-align:center"> 
                                                    <?php
                                                    //$author = $this->db->query("SELECT * FROM iitmandi_team WHERE iitmandi_team.id IN (".$pub_details[0]['author_name'].")");
                                                    $author = $this->db->query("SELECT * FROM iitmandi_team WHERE FIELD(iitmandi_team.id,".$pub_details[0]['author_name'].") ORDER BY FIELD(iitmandi_team.id,".$pub_details[0]['author_name'].")");
                                                    $value = $author->result_array();
                                                    $count = count($value);
                                                    for($i = 0; $i < $count; $i++) {
                                                        if ($value[$i]['mname'] == '') {
                                                            $commonValues[$i] = $value[$i]['fname']." ".$value[$i]['lname']."";
                                                        } else {
                                                            $commonValues[$i] = $value[$i]['fname']." ".$value[$i]['mname']." ".$value[$i]['lname'].".";
                                                        }
                                                    }
                                                    $lastItem = array_pop($commonValues);
                                                    $text = implode(', ', $commonValues); // a, b 
                                                    if ($text == ''){
                                                        $text .= $lastItem; 
                                                    } else {
                                                        $text .= ', & '.$lastItem; // a, b and c
                                                    }
                                                    echo $text;
                                                    ?>
                                                </h3>
                                                <h3 style="text-align:center"> <?php echo $pub_details[0]['publish_date'];?></h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="float: left;display: inline-block;margin-top: 40px;">
                                            <div class="pub_dec">
                                                <?php echo $pub_details[0]['short_summery'];?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="float: left;display: inline-block;margin-top: 40px;">
                                            <div class="pub_dec">
                                                <?php echo $pub_details[0]['key_points'];?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($pub_details[0]['publication_type'] == 'Conference Paper') { ?>
                                        <?php if (!empty($pub_details[0]['attachment'])) { ?>
                                        <div class="col-sm-12" style="text-align: center;float: left;display: inline-block;">
                                            <img class="bio_img" src="<?php echo base_url();?>uploads/publication/<?php echo $pub_details[0]['attachment'];?>" alt=""/>
                                        </div>
                                        <?php } ?>
                                        <div class="col-sm-12" style="float: left;display: inline-block;">
                                            <div>
                                                <h3 style="text-align:center;font-size: 40px;color: #022851;"> <?php echo $pub_details[0]['paper_title'];?></h3>
                                                <h3 style="text-align:center;font-size: 30px;"> <?php echo $pub_details[0]['conference_name'];?></h3>
                                                <h3 style="text-align:center"> 
                                                    <?php
                                                    $author = $this->db->query("SELECT * FROM iitmandi_team WHERE iitmandi_team.id IN (".$pub_details[0]['author_name'].")");
                                                    $value = $author->result_array();
                                                    $count = count($value);
                                                    for($i = 0; $i < $count; $i++) {
                                                        if ($value[$i]['mname'] == '') {
                                                            $commonValues[$i] = $value[$i]['fname']." ".$value[$i]['lname']."";
                                                        } else {
                                                            $commonValues[$i] = $value[$i]['fname']." ".$value[$i]['mname']." ".$value[$i]['lname'].".";
                                                        }
                                                    }
                                                    $lastItem = array_pop($commonValues);
                                                    $text = implode(', ', $commonValues); // a, b 
                                                    if ($text == ''){
                                                        $text .= $lastItem; 
                                                    } else {
                                                        $text .= ', & '.$lastItem; // a, b and c
                                                    }
                                                    echo $text;
                                                    ?>
                                                </h3>
                                                <h3 style="text-align:center"> <?php echo $pub_details[0]['publish_date'];?></h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="float: left;display: inline-block;margin-top: 40px;">
                                            <div class="pub_dec">
                                                <?php echo $pub_details[0]['short_summery'];?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="float: left;display: inline-block;margin-top: 40px;">
                                            <div class="pub_dec">
                                                <?php echo $pub_details[0]['key_points'];?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($pub_details[0]['publication_type'] == 'Book Chapter') { ?>
                                        <?php if (!empty($pub_details[0]['attachment'])) { ?>
                                        <div class="col-sm-12" style="text-align: center;float: left;display: inline-block;">
                                            <img class="bio_img" src="<?php echo base_url();?>uploads/publication/<?php echo $pub_details[0]['attachment'];?>" alt=""/>
                                        </div>
                                        <?php } ?>
                                        <div class="col-sm-12" style="float: left;display: inline-block;">
                                            <div>
                                                <h3 style="text-align:center;font-size: 40px;color: #022851;">Paper Title: <?php echo $pub_details[0]['paper_title'];?></h3>
                                                <h3 style="text-align:center;font-size: 30px;"> <?php echo $pub_details[0]['book_name'];?></h3>
                                                <h3 style="text-align:center"> 
                                                    <?php
                                                    $author = $this->db->query("SELECT * FROM iitmandi_team WHERE iitmandi_team.id IN (".$pub_details[0]['author_name'].")");
                                                    $value = $author->result_array();
                                                    $count = count($value);
                                                    for($i = 0; $i < $count; $i++) {
                                                        if ($value[$i]['mname'] == '') {
                                                            $commonValues[$i] = $value[$i]['fname']." ".$value[$i]['lname']."";
                                                        } else {
                                                            $commonValues[$i] = $value[$i]['fname']." ".$value[$i]['mname']." ".$value[$i]['lname'].".";
                                                        }
                                                    }
                                                    $lastItem = array_pop($commonValues);
                                                    $text = implode(', ', $commonValues); // a, b 
                                                    if ($text == ''){
                                                        $text .= $lastItem; 
                                                    } else {
                                                        $text .= ', & '.$lastItem; // a, b and c
                                                    }
                                                    echo $text;
                                                    ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="float: left;display: inline-block;margin-top: 40px;">
                                            <div>
                                                <?php echo $pub_details[0]['short_summery'];?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="float: left;display: inline-block;margin-top: 40px;">
                                            <div>
                                                <?php echo $pub_details[0]['key_points'];?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($pub_details[0]['publication_type'] == 'Book') { ?>
                                        <?php if (!empty($pub_details[0]['attachment'])) { ?>
                                        <div class="col-sm-12" style="text-align: center;float: left;display: inline-block;">
                                            <img class="bio_img" src="<?php echo base_url();?>uploads/publication/<?php echo $pub_details[0]['attachment'];?>" alt=""/>
                                        </div>
                                        <?php } ?>
                                        <div class="col-sm-12" style="float: left;display: inline-block;">
                                            <div>
                                                <h3 style="text-align:center;font-size: 40px;color: #022851;">Paper Title: <?php echo $pub_details[0]['paper_title'];?></h3>
                                                <h3 style="text-align:center"> 
                                                    <?php
                                                    $author = $this->db->query("SELECT * FROM iitmandi_team WHERE iitmandi_team.id IN (".$pub_details[0]['author_name'].")");
                                                    $value = $author->result_array();
                                                    $count = count($value);
                                                    for($i = 0; $i < $count; $i++) {
                                                        if ($value[$i]['mname'] == '') {
                                                            $commonValues[$i] = $value[$i]['fname']." ".$value[$i]['lname']."";
                                                        } else {
                                                            $commonValues[$i] = $value[$i]['fname']." ".$value[$i]['mname']." ".$value[$i]['lname'].".";
                                                        }
                                                    }
                                                    $lastItem = array_pop($commonValues);
                                                    $text = implode(', ', $commonValues); // a, b 
                                                    if ($text == ''){
                                                        $text .= $lastItem; 
                                                    } else {
                                                        $text .= ', & '.$lastItem; // a, b and c
                                                    }
                                                    echo $text;
                                                    ?>
                                                </h3>
                                                <h3 style="text-align:center"> <?php echo $pub_details[0]['publish_date'];?></h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="float: left;display: inline-block;margin-top: 40px;">
                                            <div>
                                                <?php echo $pub_details[0]['short_summery'];?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="float: left;display: inline-block;margin-top: 40px;">
                                            <div>
                                                <?php echo $pub_details[0]['key_points'];?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($pub_details[0]['publication_type'] == 'Patent') { ?>
                                        <?php if (!empty($pub_details[0]['attachment'])) { ?>
                                        <div class="col-sm-12" style="text-align: center;float: left;display: inline-block;">
                                            <img class="bio_img" src="<?php echo base_url();?>uploads/publication/<?php echo $pub_details[0]['attachment'];?>" alt=""/>
                                        </div>
                                        <?php } ?>
                                        <div class="col-sm-12" style="float: left;display: inline-block;">
                                            <div>
                                                <h3 style="text-align:center;font-size: 40px;color: #022851;">Paper Title: <?php echo $pub_details[0]['paper_title'];?></h3>
                                                <h3 style="text-align:center"> 
                                                    <?php
                                                    $author = $this->db->query("SELECT * FROM iitmandi_team WHERE iitmandi_team.id IN (".$pub_details[0]['author_name'].")");
                                                    $value = $author->result_array();
                                                    $count = count($value);
                                                    for($i = 0; $i < $count; $i++) {
                                                        if ($value[$i]['mname'] == '') {
                                                            $commonValues[$i] = $value[$i]['fname']." ".$value[$i]['lname']."";
                                                        } else {
                                                            $commonValues[$i] = $value[$i]['fname']." ".$value[$i]['mname']." ".$value[$i]['lname'].".";
                                                        }
                                                    }
                                                    $lastItem = array_pop($commonValues);
                                                    $text = implode(', ', $commonValues); // a, b 
                                                    if ($text == ''){
                                                        $text .= $lastItem; 
                                                    } else {
                                                        $text .= ', & '.$lastItem; // a, b and c
                                                    }
                                                    echo $text;
                                                    ?>
                                                </h3>
                                                <h3 style="text-align:center"> <?php echo $pub_details[0]['publish_date'];?></h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="float: left;display: inline-block;margin-top: 40px;">
                                            <div>
                                                <?php echo $pub_details[0]['short_summery'];?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="float: left;display: inline-block;margin-top: 40px;">
                                            <div>
                                                <?php echo $pub_details[0]['key_points'];?>
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
        </div>
    </section>
</main>
<?php echo $footer?>