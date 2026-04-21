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
* {box-sizing: border-box;}
.title {display: flex;width: 40%;border-width: 2px;border-radius: 20px;justify-content: center;vertical-align: middle;margin-bottom: 50px;margin-top: 20px;}
h1 {color: rgb(1 15 112);}
.card_sp {position: relative;transition: transform .2s;}
.card_sp:hover {transform: scale(1.3);z-index: 9999;}
.text-overlay {position: absolute; top: 0; left: 0; padding: 1rem; font-size: 1.5rem; font-weight: 100; color: white; backdrop-filter: blur(8px) brightness(30%);} 

/*27.02.2023*/
.portfolio-info{width:100%;}
.portfolio-info h6{font-size: 35px; line-height: 45px; text-align: center; color: #010f70; margin: 0px;padding-bottom: 15px; }
.lab_sec{width:100%; margin-top: 15px; position: relative; overflow: hidden;transition: all ease-in-out .2s; border-radius: 40px;} 
.lab_img{width: 100%;} 
.lab_img img{border-radius: 40px;   transition: all ease-in-out .2s; width: 100%;}
.lab_txt{width: 100%; position: absolute; left:0px; right: 0px; margin: 0 auto; top: 36%; background: rgba(0, 0, 0, 0.5); padding: 10px 0;}
.lab_txt p{font-size: 24px; line-height: 40px; text-align: center; color: #fff; margin: 0px;padding:0px; }
.lab_sec:hover .lab_img img{transform: scale(1.1);transition: all ease-in-out .2s; border-radius: 40px;}
a{cursor: pointer;}
</style>
<link rel="stylesheet" href="<?php echo base_url();?>assets/style.css">
<main id="main">
    <section id="portfolio-details" class="portfolio-details" style="margin-top:70px;">
        <div class="container_1">
            <div class="row gy-4">
                <div class="col-sm-12 offset-sm-0">
                    <div class="portfolio-info">
                        <h6>All News</h6>
                        <div class="row">
                            <!-- <div class="col-sm-12"> -->
                            <?php if (!empty($allNews)) {
                            foreach ($allNews as $row) { ?>
                            <div class="col-sm-6 col-xl-3 col-lg-4 col-md-6 col-12 homeNews" style="padding-left: 0px !important;">
                            <div class="homeNews1" style="width: 100%; display: inline-block; float: left; margin: 0px 10px 10px 0px; background: #001730; border-radius: 20px;">
                                <img class="mb-2" src="<?php echo base_url() ?>uploads/news/<?php echo $row['file_name']?>" style="width: 100%;height: 290px;border-radius: 20px 20px 0 0;">
                                <h5 style="line-height: 18px;padding-left: 10px; padding-bottom: 10px;margin-bottom: 5px;">
                                <a href="<?php if($row['a_link'] != "") {echo $row['a_link'];} else { echo base_url().'news_details/'.$row['news_slug'];} ?>" style="color: #fff;font-size: 16px;text-decoration: none;" target="_blank"><?php echo $row['title']?></a></h5>
                                <hr>
                            </div>
                            </div>
                            <?php } } ?>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php echo $footer; ?>