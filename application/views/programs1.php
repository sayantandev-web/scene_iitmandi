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
  .box_sec:hover .box_dwn{position: relative; z-index: 1; left: 0px; right: 0px; margin: 0 auto; overflow:visible;}
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
  .container {max-width: 1440px !important;}
  .pad_btm{padding-bottom: 0px !important;}
  .accordion-button:focus{box-shadow:none;}
  .prog_list ul{margin:0px; padding-left: 32px;}
  .prog_list ul li {padding: 5px 0 0; list-style-type: disc;color:#5c5c77; }
  .accordion-header button{border:1px solid #dee2e6; border-radius:5px;}
  .accordion-item{border-radius:5px;}
  .accordion-button {color: #13639e !important;}
  .prog_list h6 {color: #5c5c77 !important;}
  @media screen and (max-width: 600px) {
    .box_sec{margin-top:10px;}  
  }
  .accordion-body ul {
    list-style: inherit !important;
    margin: 0;
    padding-left: 2rem !important;
    color: #5c5c77;
  }
  .accordion-body li {list-style: inherit !important;}
</style>
<link rel="stylesheet" href="<?php echo base_url();?>assets/style.css">
<main id="main">
  <section id="portfolio-details" class="portfolio-details" style="margin-top: 30px">
    <div class="container">
      <div class="row">
        <div class="accordion mt-5" id="accordionExample">
          <?php if(!empty($programs)) { 
          $i = 1;
          foreach ($programs as $value) {
          ?>
          <div class="accordion-item mb-3">
            <h2 class="accordion-header" id="1">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?php echo $value['id']?>" aria-expanded="true" aria-controls="collapse_<?php echo $value['id']?>"><?php echo $value['name']?></button>
            </h2>
            <div id="collapse_<?php echo $value['id']?>" class="accordion-collapse collapse <?php if($i == '1') {echo "show";}?>" aria-labelledby="1" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row">
                  <div class="col-sm-6">
                    <p><?php echo $value['description']?></p>
                  </div>
                  <div class="col-sm-6">
                    <?php if(!empty($value['prgm_img'])) { ?>
                    <img src="<?php echo base_url()?>uploads/programs/<?php echo $value['prgm_img']?>" alt="">
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php $i++; } } ?>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
<?php echo $footer?>