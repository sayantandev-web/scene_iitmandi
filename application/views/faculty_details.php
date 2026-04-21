<?php echo $header;?>
<style>
    .nav-pills .nav-link{margin-bottom: 15px;}
    .bio_img {width: 200px; height: 200px;}
    .bio_text {margin-bottom: auto;}
    .bio_text1 {border: 1px solid #eee; padding: 30px; text-align: justify;}
    .td_class {padding: 0px; display: initial;}
    .table>:not(caption)>*>* {text-align: center;}
    .cstm_gllery {float: left; display: inline;}
    .cstm_gllery img {padding: 12px; border-radius: 50%; height: 313px;}
    .cstm_gllery h3, p {text-align: center;}
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
    <section id="portfolio-details" class="portfolio-details" style="margin-top: 30px">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="portfolio-info">
                        <h3 style="text-transform: capitalize">Welcome <?php echo $about_me[0]['fname']." ".$about_me[0]['mname']." ".$about_me[0]['lname'] ?></h3>
                        <p style="text-transform: capitalize">Welcome <?php echo $about_me[0]['designation'];?></p>
                        <div class="row">
                            <div class="col-12" style="text-align:center">
                                <!-- Tab navs -->
                                <button type="button" class="btn btn-primary">Home</button>
                                <button type="button" class="btn btn-primary">Research</button>
                                <button type="button" class="btn btn-primary">Publication</button>
                                <button type="button" class="btn btn-primary">Projects</button>
                                <button type="button" class="btn btn-primary">Lab Members</button>
                                <button type="button" class="btn btn-primary">Current Openings</button>
                                <button type="button" class="btn btn-primary">Miscellaneous </button>
                                <!-- Tab navs -->
                            </div>
                            <!-- Home Start -->
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12' style="margin-top: 50px;">
                                        <div class="col-sm-3" style="text-align: center;float: left;display: inline-block;">
                                            <img class="bio_img" src="<?php echo base_url();?>uploads/our_team/<?php echo $about_me[0]['team_image'];?>" alt=""/>
                                        </div>
                                        <div class="col-sm-9" style="float: left;display: inline-block;">
                                            <p class='bio_text1'><?php echo $about_me[0]['aboutme'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Academic Background</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Degree</th>
                                                    <th>University</th>
                                                    <th>Year</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Professional Background</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Organisation</th>
                                                    <th>Post</th>
                                                    <th>Year</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($experience)) {
                                                $i=1; ?>
                                                <?php foreach($experience as $row) { ?>
                                                <tr>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                </tr>
                                                <?php $i++; } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Awards and Distinctions</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Degree</th>
                                                    <th>University</th>
                                                    <th>Year</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Events Organised</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Organisation</th>
                                                    <th>Post</th>
                                                    <th>Year</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">News</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Organisation</th>
                                                    <th>Post</th>
                                                    <th>Year</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Home End -->
                            <!-- Research Start -->
                            <section id="features" class="features section-bg">
                                <div class="container">
                                    <div class="section-title">
                                        <h2 data-aos="fade-in">Research Highlights</h2>
                                    </div>
                                    <div class="row content">
                                        <div class="col-md-5" data-aos="fade-right">
                                            <img src="<?php echo base_url();?>assets/fontend/img/features-1.svg" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-7 pt-4" data-aos="fade-left">
                                            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                                            <p class="fst-italic">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                            magna aliqua.
                                            </p>
                                            <ul>
                                                <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                                                <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row content">
                                        <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
                                            <img src="<?php echo base_url();?>assets/fontend/img/features-2.svg" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
                                            <h3>Corporis temporibus maiores provident</h3>
                                            <p class="fst-italic">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                            magna aliqua.
                                            </p>
                                            <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row content">
                                        <div class="col-md-5" data-aos="fade-right">
                                            <img src="<?php echo base_url();?>assets/fontend/img/features-3.svg" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-7 pt-5" data-aos="fade-left">
                                            <h3>Sunt consequatur ad ut est nulla consectetur reiciendis animi voluptas</h3>
                                            <p>Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.</p>
                                            <ul>
                                                <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                                                <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                                                <li><i class="bi bi-check"></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row content">
                                        <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
                                            <img src="<?php echo base_url();?>assets/fontend/img/features-4.svg" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
                                            <h3>Quas et necessitatibus eaque impedit ipsum animi consequatur incidunt in</h3>
                                            <p class="fst-italic">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                            magna aliqua.
                                            </p>
                                            <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Research End -->
                            <!-- Research Publication Start -->
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Journal Article</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Pubtication Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Conference Article</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Pubtication Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Book Chapter</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Pubtication Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Book</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Pubtication Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Patent</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Pubtication Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Research Publication End -->
                            <!-- Lab Member Start --> 
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Ph.D. Scholars</h2>
                                    </div>
                                    <div class="content">
                                        <div class='col-sm-12'>
                                            <div class="col-sm-3 cstm_gllery">
                                                <img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/>
                                                <h3>Ph.D. Scholars Name</h3>
                                                <p><a href="">Thesis Topic</a></p>
                                            </div>
                                            <div class="col-sm-3 cstm_gllery">
                                                <img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/>
                                                <h3>Ph.D. Scholars Name</h3>
                                                <p><a href="">Thesis Topic</a></p>
                                            </div>
                                            <div class="col-sm-3 cstm_gllery">
                                                <img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/>
                                                <h3>Ph.D. Scholars Name</h3>
                                                <p><a href="">Thesis Topic</a></p>
                                            </div>
                                            <div class="col-sm-3 cstm_gllery">
                                                <img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/>
                                                <h3>Ph.D. Scholars Name</h3>
                                                <p><a href="">Thesis Topic</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">M.Tech. (R) Scholars</h2>
                                    </div>
                                    <div class="content">
                                        <div class='col-sm-12'>
                                            <div class="col-sm-3 cstm_gllery">
                                                <img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/>
                                                <h3>M.Tech. (R) Scholars Name</h3>
                                                <p><a href="">Thesis Topic</a></p>
                                            </div>
                                            <div class="col-sm-3 cstm_gllery">
                                                <img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/>
                                                <h3>M.Tech. (R) Scholars Name</h3>
                                                <p><a href="">Thesis Topic</a></p>
                                            </div>
                                            <div class="col-sm-3 cstm_gllery">
                                                <img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/>
                                                <h3>M.Tech. (R) Scholars Name</h3>
                                                <p><a href="">Thesis Topic</a></p>
                                            </div>
                                            <div class="col-sm-3 cstm_gllery">
                                                <img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/>
                                                <h3>M.Tech. (R) Scholars Name</h3>
                                                <p><a href="">Thesis Topic</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">M.Tech. Students</h2>
                                    </div>
                                    <div class="content">
                                        <div class='col-sm-12'>
                                            <div class="col-sm-3 cstm_gllery">
                                                <img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/>
                                                <h3>M.Tech. Students Name</h3>
                                                <p><a href="">Thesis Topic</a></p>
                                            </div>
                                            <div class="col-sm-3 cstm_gllery">
                                                <img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/>
                                                <h3>M.Tech. Students Name</h3>
                                                <p><a href="">Thesis Topic</a></p>
                                            </div>
                                            <div class="col-sm-3 cstm_gllery">
                                                <img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/>
                                                <h3>M.Tech. Students Name</h3>
                                                <p><a href="">Thesis Topic</a></p>
                                            </div>
                                            <div class="col-sm-3 cstm_gllery">
                                                <img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/>
                                                <h3>M.Tech. Students Name</h3>
                                                <p><a href="">Thesis Topic</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">B.Tech. Students</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Name</th>
                                                    <th>Project Title</th>
                                                    <th>Year</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class='col-sm-12'>
                                    <h2 style="text-align: center;">Alumni</h2>
                                </div>
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Ph.D.</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Name</th>
                                                    <th>Thesis title</th>
                                                    <th>Year</th>
                                                    <th>Current Position</th>
                                                    <th>Link</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">M.Tech. (R)</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Name</th>
                                                    <th>Thesis title</th>
                                                    <th>Year</th>
                                                    <th>Current Position</th>
                                                    <th>Link</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">M.Tech</h2>
                                    </div>
                                    <div class='col-sm-12'>
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Name</th>
                                                    <th>Thesis title</th>
                                                    <th>Year</th>
                                                    <th>Current Position</th>
                                                    <th>Link</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                    <td>Demo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Lab Member End --> 
                            <!--Current Openings Start -->
                            <div class="col-12">
                                <div class='col-sm-12'>
                                    <h2 style="text-align: center;">Current Openings</h2>
                                </div>
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Post doctoral Scholar</h2>
                                    </div>
                                    <div class='col-sm-12 cslm_crnt_open'>
                                        <ul>
                                            <li>Why</li>
                                            <li>are</li>
                                            <li>there</li>
                                            <li>no</li>
                                            <li>bullets?!?!?!!?!?!?</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Ph.D. Student</h2>
                                    </div>
                                    <div class='col-sm-12 cslm_crnt_open'>
                                        <ul>
                                            <li>Why</li>
                                            <li>are</li>
                                            <li>there</li>
                                            <li>no</li>
                                            <li>bullets?!?!?!!?!?!?</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">M.Tech. (R)</h2>
                                    </div>
                                    <div class='col-sm-12 cslm_crnt_open'>
                                        <ul>
                                            <li>Why</li>
                                            <li>are</li>
                                            <li>there</li>
                                            <li>no</li>
                                            <li>bullets?!?!?!!?!?!?</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Project Staff</h2>
                                    </div>
                                    <div class='col-sm-12 cslm_crnt_open'>
                                        <ul>
                                            <li>Why</li>
                                            <li>are</li>
                                            <li>there</li>
                                            <li>no</li>
                                            <li>bullets?!?!?!!?!?!?</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Current Openings End -->
                            <!-- Miscellaneous Start -->
                            <div class="col-12">
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <h2 style="text-align: center;">Photo Gallery</h2>
                                    </div>
                                    <div class="content">
                                        <div class='col-sm-12'>
                                            <div class="col-sm-3 cstmf_gllery">
                                                <a href=""><img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/></a>
                                            </div>
                                            <div class="col-sm-3 cstmf_gllery">
                                                <a href=""><img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/></a>
                                            </div>
                                            <div class="col-sm-3 cstmf_gllery">
                                                <a href=""><img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/></a>
                                            </div>
                                            <div class="col-sm-3 cstmf_gllery">
                                                <a href=""><img src="<?php echo base_url()?>uploads/gallery/demo_pic.png"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Miscellaneous End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Details Section -->
</main><!-- End #main -->
<?php echo $footer?>