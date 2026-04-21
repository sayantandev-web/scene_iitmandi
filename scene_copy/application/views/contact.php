<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $title;?></title>
  <meta name="description" content="">
  <?php 
  echo $header;
  $logo=$this->common_model->get_data_array(SETTINGS,array('id'=>1),'','','','','',''); 
  ?>
  <style type="text/css">
    .main_cstm_cls .cstm_cls{margin-bottom: 10px !important;}
  </style>
  <section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary">Contact Us</a></li>
            <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
          </ul>
          <p class="text-lighten">Do you have other questions? Don't worry, there aren't any dumb questions. Just fill out the form below and we'll get back to you as soon as possible.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="section bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-title">Contact Us</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-7 mb-4 mb-lg-0">
          <form action="" method="post" id="contact_form">
            <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Your Name">
            <input type="email" class="form-control mb-3" id="mail" name="mail" placeholder="Your Email">
            <input type="text" class="form-control mb-3" id="subject" name="subject" placeholder="Subject">
            <textarea name="message" id="message" class="form-control mb-3" placeholder="Your Message"></textarea>
            <button type="button" value="send" id ="submit" class="btn btn-primary">SEND MESSAGE</button>
            <div class="error_msg"></div>
            <div class="success_msg"></div>
          </form>
        </div>
        <div class="col-lg-5">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3686.041466448361!2d88.25434111472386!3d22.502627341206864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a027c078f755e6f%3A0xffe9812f046be258!2sMount%20Litera%20Zee%20School%20-%20Maheshtala!5e0!3m2!1sen!2sin!4v1634681591028!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          <p><b>Location :</b> <?php echo $logo[0]['location1']?></p>
          <p><b>Email :</b> <a href="mailto:<?php echo $logo[0]['email']?>"><?php echo $logo[0]['email']?></a></p>
          <p><b>Phone :</b> <a href="tel:<?php echo $logo[0]['contact']?>"><?php echo $logo[0]['contact']?></a></p>
          
        </div>
      </div>
    </div>
  </section>
  <!-- <section class="section pt-0">
    <div id="map_canvas" data-latitude="51.507351" data-longitude="-0.127758"></div>
  </section> -->
  <?php echo $footer;?>
</body>
</html>