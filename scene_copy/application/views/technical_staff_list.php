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
</style>
<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Portfolio Details</h2>
                <ol>
                <li><a href="index.html">Home</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li>Portfolio Details</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- Breadcrumbs Section -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="portfolio-info">
                        <h3 style="text-align:center"><?php echo $title?></h3>
                        <?php if(!empty($technical_staff)) {
                            $i=1; ?>
                        <?php foreach($technical_staff as $row) { ?>
                        <div class="col-sm-12" style="border: 1px solid;box-shadow: 1px 1px 0px #999,2px 2px 0px #999,3px 3px 0px #999,4px 4px 0px #999,5px 5px 0px #999,6px 6px 0px #999; margin-bottom: 30px; float: left;">
                            <div class="col-sm-2">
                                <img src="<?php echo base_url();?>uploads/our_team/<?php echo $row['team_image']?>" alt="">
                            </div>
                            <div class="col-sm-8" style="margin: 20px 0px 0px 45px;">
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Name:  </b><?php echo $row['fname']?>
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Post:  </b><?php echo $row['post']?></p>
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Lab:  </b><?php echo $row['lab']?>
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Mobile:  </b><?php echo $row['mobile']?>
                                <p style="text-align:center;margin: 0px;font-size: 18px;text-align: justify;"><b>Email:  </b><?php echo $row['email']?></p>
                            </div>
                        </div>
                        <?php $i++; } } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
<?php echo $footer?>