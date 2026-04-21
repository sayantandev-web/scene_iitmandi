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
.close {padding: 0;background-color: transparent;border: 0;float: right;font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;opacity: .5;}
.title {display: flex;width: 40%;border-width: 2px;border-radius: 20px;justify-content: center;vertical-align: middle;margin-bottom: 50px;margin-top: 20px;}
h1 {color: rgb(1 15 112);}
.block { display: flex; width: 90%; height: 400px; background-color: lightgray; border-radius: 20px; border:rgba(110, 130, 229, 0.6); border-width: .2px; padding-right: 5px;}
.block img { max-width: 100%; max-height:100%; padding: 5px; border-radius: 20px; width: 400px; }
.block .textblock { font-size: 20px; padding-left: 20px;}
.block:hover { box-shadow: 0 0 11px rgba(110, 130, 229, 0.6); }
.text { font-size: 20px; padding-left: 20px;}
/*28.02.2023*/
.lab_details_sec{width: 100%;}
.lab_details_sec h4{font-size: 35px; line-height: 45px; text-align: center; color: #010f70; margin: 0px;padding-bottom: 0px; }
.lab_details_lt{width: 100%; border: 1px solid #ffbf00; border-radius: 15px;}
.lab_details_lt img{width: 100%; border-radius: 15px;}
.lab_details_rt{width: 100%; padding-top:0px;}
.lab_details_rt h6{font-size: 26px; line-height: 30px; text-align: left; color: #13639e; margin: 0px;padding-bottom: 15px; }
.lab_details_rt p{padding: 0px; font-size: 16px; line-height: 22px; text-align: left; color: #444444;}
.lab_details_inn{width: 100%; margin-top:15px; padding: 15px; box-shadow: 2px 4px 9px 0px rgb(120 120 120 / 75%);     -webkit-box-shadow: 2px 4px 9px 0px rgb(120 120 120 / 75%);  -moz-box-shadow: 2px 4px 9px 0px rgba(120,120,120,0.75); border-radius: 8px; margin-bottom: 15px;}
.lab_details_rt_top{width: 100%; margin-bottom: 30px;}
.lab_details_rt_top p{font-size: 16px; color:#222; text-align: center; line-height: 25px}
.lab_details_rt_top p strong{font-size: 20px;}
.cont_txt{width:100%; padding: 15px;}
.cont_txt p{padding: 0px 0 20px; font-size: 16px; line-height: 22px; text-align: left; color: #444444;}
</style>
<main id="main">
    <section id="portfolio-details" class="portfolio-details" style="margin-top:70px;">
        <div class="container">
            <div class="row gy-4">
                <div class="col-sm-10 offset-sm-1">
                    <div class="lab_details_sec">
                    <?php 
                    $labdetails = $labdetails->result_array();
                    if (!empty($labdetails)) {
                    ?>
                        <h4><?php echo $labdetails[0]['labname']?></h4>
                        <div class="cont_txt">
                            <div><?php echo $text = $labdetails[0]['description']; ?></div>
                            <div>Coordinator: 
                                <?php 
                                $coordinator = $this->db->query("SELECT * FROM `iitmandi_team` WHERE id = '".$labdetails[0]['coordinator']."'");
                                $coordinator = $coordinator->result_array();
                                ?>
                                <img style="width:50px;border-radius: 50%;border: 3px solid #000;height: 50px;" src="<?php echo base_url() ?>uploads/our_team/<?php echo $coordinator[0]['team_image']?>" alt="">
                                <a href = "<?php echo base_url();?>pages/faculty_details/<?php echo base64_encode($labdetails[0]['coordinator'])?>"><?php echo $coordinator[0]['fname']." ".$coordinator[0]['mname']." ".$coordinator[0]['lname']; ?></a>
                            </div>
                            <div>Co-Cordinator:
                                <?php 
                                $cocooordinator = $this->db->query("SELECT * FROM `iitmandi_team` WHERE id = '".$labdetails[0]['cocooordinator']."'");
                                $cocooordinator = $cocooordinator->result_array();
                                ?>
                                <img style="width:50px;border-radius: 50%;border: 3px solid #000;height: 50px;" src="<?php echo base_url() ?>uploads/our_team/<?php echo $cocooordinator[0]['team_image']?>" alt="">
                                <a href = "<?php echo base_url();?>pages/faculty_details/<?php echo base64_encode($labdetails[0]['cocooordinator'])?>"><?php echo $cocooordinator[0]['fname']." ".$cocooordinator[0]['mname']." ".$cocooordinator[0]['lname']; ?></a>
                            </div>
                        </div>
                        <?php if(!empty($labdetails)) {
                            $i=1; ?>
                        <?php foreach($labdetails as $row) { ?>
                        <div class="lab_details_inn">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="lab_details_lt">
                                        <img src="<?php echo base_url() ?>uploads/labequipment/<?php echo $row['eqpmnt_img']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="lab_details_rt">                                       
                                        <h6><?php echo $row['equipment_name']; ?></h6>
                                        <p><?php echo $row['equipment_description']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $i++; } } }?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php echo $footer; ?>