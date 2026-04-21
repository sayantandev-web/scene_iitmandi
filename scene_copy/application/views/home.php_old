  <?php echo $header; ?>
  <style>
    .imgedited {width: 100%;}
    .news-section .card1ed {padding: 0 0 20px 0 !important;}
    h5:first-child {text-align: justify; font-size: 18px !important;}
  </style>
  <div id="wowslider-container1">
    <div class="ws_images">
      <ul>
      <?php if(!empty($banner)) {
        foreach ($banner as $row){ ?>
        <li>
          <img src="<?php echo base_url()?>uploads/banner/<?php echo $row['banner_image']?>" alt="jquery slider" title="<?php echo $row['banner_title']?>" id="wows1_0"/>
        </li>
      <?php } } ?>
      </ul>
    </div>
    <div class="ws_shadow"></div>
  </div>
  <!-- ======= Hero Banner Section ======= -->
  <main id="main">
    <!-- ======= Welcome Section ======= -->
    <?php if(!empty($home_about)) { ?>
    <section id="about" class="about">
      <div class="container">
        <div class="row gy-4">
          <div class="image col-xl-5" style="background:url('<?php echo base_url()?>uploads/homeabout/<?php echo $home_about[0]['homeabt_img']?>') no-repeat center center/cover"></div>
          <div class="col-xl-7">
            <div class="content d-flex flex-column justify-content-center ps-0 ps-xl-4">
              <h3 style="font-size: 1.5rem !important; color:black">Welcome to School of Civil and Environmental Engineering</h3>
              <br>
              <div style="line-height:unset !important ;font-size:0.95rem ;color:black ;text-align:left">
                <?php echo $home_about[0]['description']?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>
    <div class="containeditmain">
      <div class="section">
        <div class="first">
          <h3>Vision</h3>
          <p style="line-height:unset !important; font-size: 16px; color:black; text-align:left; font-family: 'Raleway';">To pioneer excellence in academics, research, and innovations for sustainable and climate-resilient infrastructure development with a focus on the built environment, livelihood, and disaster risk reduction for societal benefit.</p>
        </div>
        <div class="second" style="margin-top: 20px;">
          <h3>Mission</h3>
          <p>
          <ul class="paralist">
            <li style="line-height:unset !important; font-size: 16px; color:black; text-align:left; font-family: 'Raleway';">Multidisciplinary and holistic teaching and learning to achieve global standards in skill and research development towards self-reliant nation.</li>
            <li style="line-height:unset !important; font-size: 16px; color:black; text-align:left; font-family: 'Raleway';">Developing innovative and sustainable solutions for resilient infrastructure with specific focus on mountain hazards.</li>
            <li style="line-height:unset !important; font-size: 16px; color:black; text-align:left; font-family: 'Raleway';">To develop socio-techno-economic-green solutions to alleviate climatic and anthropogenic catastrophes.</li>
            <li style="line-height:unset !important; font-size: 16px; color:black; text-align:left; font-family: 'Raleway';">To imbibe flexible, critical, creative and ethic centered principles in the education and research process.</li>
          </ul>
          </p>
        </div>
      </div>
      <!-- End Welcome Section -->

      <!-- ======= Count Section ======= -->
      <section id="clients" class="clients" style="margin-top:unset !important">
        <div class="leditclient">
          <div class="ledit_ counter-1">
            <div class="leditclientunder  ">
              <div class="iconed">
                <?php $row = $count_r->result_array();?>
                <strong class="counter-val" data-val=<?php echo $row[0]['Total']; ?>><?php echo $row[0]['Total']; ?></strong>
                <span>+</span>
              </div>
              <span style="margin-left: 5px;"><i class="bi bi-journals"></i>Research Publication</span>
            </div>
          </div>
          <div class="ledit_ counter-1">
            <div class="leditclientunder ">
              <div class="iconed">
                <?php $row1 = $count_f->result_array();?>
                <strong class="counter-val" data-val=<?php echo $row1[0]['Total']; ?>><?php echo $row1[0]['Total']; ?></strong>
                <span>+</span>
              </div>
              <span style="margin-left: 5px;"><i class="bi bi-person-workspace"></i>Faculty Member</span>
            </div>
          </div>
          <div class="ledit_ counter-1 ">
            <div class="leditclientunder ">
              <div class="iconed">
                <?php $row2 = $count_l->result_array();?>
                <strong class="counter-val" data-val=<?php echo $row2[0]['Total']; ?>><?php echo $row2[0]['Total']; ?></strong>
                <span>+</span>
              </div>
              <span style="margin-left: 5px;"><i class="bi bi-building"></i>Labs</span>
            </div>
          </div>
        </div>
      </section>
      <?php if(!empty($home_message)) { ?>
      <div id="services" class="services">
        <div class="conti">
          <div>
            <div class="carded">
              <div class="carded-edit">
                <div class="carded-img">
                  <img src="<?php echo base_url() ?>uploads/homemessage/<?php echo $home_message[0]["homemsg_img"] ?>" alt="director" height="385" width="385">
                </div>
                <div class="intro-edit">
                  <h3 style="font-size: 30px;margin-top: 20px;"><?php echo $home_message[0]["name"] ?></h3>
                  <h4 style="margin: 0;"><?php echo $home_message[0]["designation"] ?></h4>
                </div>
              </div>
              <div class="card-body">
                <h4 class="msg_title">Message from the School Chair</h4>
                <div class="msg_des"><?php echo $home_message[0]['description'] ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <div class="swiper mySwiper ">
      <div class="section-title">
        <h2 style="color : black !important">News And Announcements</h2>
      </div>
      <div class="swiper-wrapper news-section" style="transition-duration: 0ms !important; transform: translate3d(68.75px, 0px, 0px) !important;">
        <?php if (!empty($news)) {
          foreach ($news as $row) { ?>
            <div class="card1ed swiper-slide">
              <img class="mb-2" src="<?php echo base_url() ?>uploads/news/<?php echo $row['file_name']?>" style="width: auto;height: 290px;border-radius: 20px 20px 0 0;">
              <h5 style="line-height: 18px;"><a href="<?php if($row['a_link'] != "") {echo $row['a_link'];} else { echo "#";} ?>" style="color: #fff;font-size: 16px;text-decoration: none;" target="_blank"><?php echo $row['title']?></a></h5>
              <hr>
            </div>
        <?php }
        } ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <br>
    </section>
    <section id="features" class="features section-bg">
      <div class="section-title">
        <h2>Events</h2>
      </div>
      <div class="eventeditmain">
        <?php if (!empty($events)) {
          foreach ($events as $row) { ?>
            <div class="eventcard">
              <img class="imgedited" src="<?php echo base_url() ?>uploads/events/<?php echo $row['event_image'] ?>" alt="<?php echo $row['title'] ?>">
              <div class="cardedit">
                <div class=" itemedit views-field views-field-field-eventdate">
                  <div class="field-content">
                    <!-- event date from database -->
                    <?php echo date("M", strtotime($row['event_date']));?>
                  </div>
                </div>
                <div class=" itemedit views-field views-field-field-eventdate-1">
                  <div class="field-content">
                    <?php echo date("d", strtotime($row['event_date']));?>
                  </div>
                </div>
                <a href="#">
                  <h5 class="card-title itemedit"><?php echo $row['title'] ?></h5>
                </a>
                <div class="hideit">
                  <div>
                    <?php 
                    $string = strip_tags($row['description']);
                    if (strlen($string) > 580) {
                      // truncate string
                      $stringCut = substr($string, 0, 580);
                      $endPoint = strrpos($stringCut, ' ');

                      //if the string doesn't contain any space then it will cut without word basis.
                      $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                      $string .= '... <a href="#">Read More</a>';
                    }
                    echo $string;
                    ?>
                  </div>
                </div>
              </div>
            </div>
        <?php }
        } ?>
      </div>
    </section>
    <!-- End Events Section -->
  </main>
  <!-- End #main -->
  <?php echo $footer; ?>