<?php echo $header;?>
<style>
    .nav-pills .nav-link{margin-bottom: 15px;}
    .bio_img {width: 140px; height: 140px; border-radius: 50%;}
    .bio_text {margin-bottom: auto;}
    .bio_text1 {margin-top: 30px; border: 1px solid #eee; padding: 30px; text-align: justify;}
    .td_class {padding: 0px; display: initial;}
    .table>:not(caption)>*>* {text-align: center;}
    .filter_data{text-align:center;margin: 0 0 35px 0;}
    .fetch_data {background-color: #ffbf00; color: #fff;}
    .box_sec{background: #efefef;  padding:20px 15px; border-radius: 20px; text-align: center; position: relative; margin-bottom:15px;}
    .box_sec img{width:220px; height:220px; transition:all ease-in-out .5s; position:relative; border-radius: 50%;}
    .box_dwn a{display:inline-block; color:#000;}
    .box_dwn a h6{margin:0px; text-transform:uppercase;}
    .box_dwn{width:100%;  padding-top:8px;}
    .box_dwn h6{margin:0px; line-height:20px;}
    .box_dwn p{margin:0px; font-size:12px; line-height:20px; padding-left:0px; color:#7a7a7a; text-align: center; font-weight:700; } 
    .box_sec:hover img{transition: all ease-in-out .5s; transform: scale(.7)translateY(-46px);}
    .box_sec:hover .box_dwn{/*transform: translateY(-131px); */position: relative; z-index: 1; left: 0px; right: 0px; margin: 0 auto; overflow:visible;}
    .choose_sec .btn{background:#ffdf80; color:#fff; border-radius:5px; width:100%; padding:8px 0; color:#022851;}
    .choose_sec .btn:hover{background:#022851; color:#fff;}
    .choose_sec select{height:40px; font-size:16px; padding:0 10px;}
    .box_dwn small{color: #db0000; text-transform: uppercase; font-size: 15px;}
    .box_dwn_inn{width: 100%; display: inline-block; margin-top: 0px;}
    .social_sec{width:100%;}
    .social_sec .fa-envelope{font-size: 20px; color: #7a7a7a;}
    .social_sec .fa-phone{font-size: 20px; color: #7a7a7a;}
    .res_txt2{opacity: 0;}
    .box_sec:hover .res_txt2{opacity: 1;}
    .res_txt1{opacity: 1;}
    .box_sec:hover .res_txt1{opacity: 0;}
    .container {max-width: 1600px;}
    .section-title h2 {color: #000 !important;}
    .eventeditmain .cardedit {border: 1px solid; border-radius: 25px;}
    .cardedit .views-field {text-align: center; width: 100%;}
    .field-content{text-align: center;}
    .eventcard1 {
    width: 350px;
    height: 570px;
    transform: scale(0.9);
    transition: all 0.5s ease-in;
    background-color: white;
    display: flex;
    /* margin: 30px; */
    flex-direction: column;
    align-items: start;
    z-index: 1;
    border-radius: 10px;
}
    @media screen and (max-width: 600px) {
      .box_sec{margin-top:10px;}  
    }
    tbody, td, tfoot, th, thead, tr {border-color: #000 !important; border-style: revert-layer !important; border-width: 1px !important;}
</style>
<link rel="stylesheet" href="<?php echo base_url();?>assets/style.css">
<main id="main">
    <section id="portfolio-details" class="portfolio-details" style="margin-top: 70px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 portfolio-info">
                    <h3 style="text-align:center"><?php echo $title; ?></h3>
                    <?php if(!empty($admission)) {
                    foreach($admission as $row) { ?>
                    <h4 style="text-align: center;"><?php echo $row['title']?></h4>
                    <div class="eventeditmain" style="display: inline-block !important; width: 100%; overflow: scroll !important;">
                        <div style="padding: 20px;"><?php echo $row['description']?></div>
                        <!-- <div class="eventcard1">
                            <img class="imgedited" src="" alt="">
                            <div class="cardedit">
                                <div class="itemedit views-field">
                                    <div class="field-content">
                                        <h4><?php echo $row['title']?></h4>
                                        <div style="padding: 20px;"><?php echo $row['description']?></div>
                                    </div>
                                </div>
                            </div>
                            <div class=" itemedit views-field">
                                <div class="field-content">
                                    <a href="<?php echo $row['link']?>" class="btn btn-secondary" target="_blank">Apply Now</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <?php } }?>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
<?php echo $footer?>