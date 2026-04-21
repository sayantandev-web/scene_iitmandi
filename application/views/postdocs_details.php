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

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="portfolio-info">
                        <h3 style="text-transform: capitalize">Welcome <?php echo $about_me[0]['fname'];?></h3>
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
<div class="modal fade bd-example-modal-lg1 about_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="background: #000000b0;">
    <div class="modal-dialog modal-lg" style="margin-top: 5%; width: 100%;">
        <div class="modal-content">
        <form id="form_aboutme" action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12" style="margin-bottom: 40px;">
                        <div class="col-sm-2" style="text-align: right;float: left;display: inline-block;">
                            <img class="bio_img" src="<?php echo base_url();?>uploads/our_team/1667140703711760.jpg" alt=""/>
                        </div>
                        <div class="col-sm-10" style="float: left; display: inline-block;">
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">Name</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="text" class="form-control required" id="fname" name="fname" value="">
                                </div>
                            </div>
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">Enrolment No.</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="text" class="form-control required" id="enrollno" name="enrollno" value="">
                                </div>
                            </div>
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">Email</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="email" class="form-control required" id="email" name="email" value="">
                                </div>
                            </div>
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">Admission year</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="text" class="form-control required" id="admissionyear" name="admissionyear" value="">
                                </div>
                            </div>
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">Research Interests</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="text" class="form-control required" id="research_interest" name="research_interest" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-12'>
                        <textarea id="aboutme" name="aboutme">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</textarea>
                    </div>
                </div>
                <div class="col-sm-12" style="text-align: center;margin-top: 20px;">
                    <div id="err"></div>
                    <!-- <button type="button" class="btn btn-primary about_data"><a href="javascript:void(0);">Edit Record</a></button> -->
                    <!-- <button type="button" class="btn btn-primary about_save" data-toggle="modal" data-target=".bd-example-modal-lg">Update</button> -->
                    <input class="btn btn-primary about_save" type="submit" value="Update">
                    <input type="hidden" id="uid" name="uid" value="<?php echo $uid?>">
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg2 edu_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="background: #000000b0;">
    <div class="modal-dialog modal-lg" style="margin-top: 5%; width: 100%;">
        <div class="modal-content">
        <form id="form_edu" action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12" style="margin-bottom: 40px;">
                        <div class="col-sm-12" style="float: left; display: inline-block;">
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">Degree</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="text" class="form-control required" id="degree" name="degree" value="">
                                </div>
                            </div>
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">University</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="text" class="form-control required" id="university" name="university" value="">
                                </div>
                            </div>
                            <div class="form-group col-sm-4 cstm_details">
                                <label for="Event Name" class="control-label">Year</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <input type="text" class="form-control required" id="year" name="year" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 col-md-3 col-sm-4 control-label">Status</label>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <select class="form-control" name="status">
                                        <option value="1" <?php if(@$research_category['status']==1){ echo "selected"; } ?>>Active</option>
                                        <option value="2" <?php if(@$research_category['status']==2){ echo "selected"; } ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12" style="text-align: center;margin-top: 20px;">
                    <div id="err"></div>
                    <!-- <button type="button" class="btn btn-primary about_data"><a href="javascript:void(0);">Edit Record</a></button> -->
                    <!-- <button type="button" class="btn btn-primary about_save" data-toggle="modal" data-target=".bd-example-modal-lg">Update</button> -->
                    <input class="btn btn-primary edu_save" type="submit" value="Submit">
                    <input type="hidden" id="uid" name="uid" value="<?php echo $uid?>">
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg3 exp_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="background: #000000b0;">
    <div class="modal-dialog modal-lg" style="margin-top: 5%; width: 100%;">
        <div class="modal-content">
            <form id="form_exp" action="" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12" style="margin-bottom: 40px;">
                            <div class="col-sm-12" style="float: left; display: inline-block;">
                                <div class="form-group col-sm-4 cstm_details">
                                    <label for="Event Name" class="control-label">Position</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <input type="text" class="form-control required" id="position" name="position" value="">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 cstm_details">
                                    <label for="Event Name" class="control-label">Year</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <input type="text" class="form-control required" id="year" name="year" value="">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 cstm_details">
                                    <label for="Event Name" class="control-label">Status</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <select class="form-control" name="status">
                                            <option value="1" <?php if(@$research_category['status']==1){ echo "selected"; } ?>>Active</option>
                                            <option value="2" <?php if(@$research_category['status']==2){ echo "selected"; } ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12" style="text-align: center;margin-top: 20px;">
                        <div id="err"></div>
                        <!-- <button type="button" class="btn btn-primary about_data"><a href="javascript:void(0);">Edit Record</a></button> -->
                        <!-- <button type="button" class="btn btn-primary about_save" data-toggle="modal" data-target=".bd-example-modal-lg">Update</button> -->
                        <input class="btn btn-primary exp_save" type="submit" value="Submit">
                        <input type="hidden" id="uid" name="uid" value="<?php echo $uid?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg4 pub_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="background: #000000b0;">
    <div class="modal-dialog modal-lg" style="margin-top: 5%; width: 100%;">
        <div class="modal-content">
            <form id="form_pub" action="" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12" style="margin-bottom: 40px;">
                            <div class="col-sm-12" style="float: left; display: inline-block;">
                                <div class="form-group col-sm-4 cstm_details">
                                    <label for="Publications Type" class="control-label ">Publications Type</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <select class="form-control publication_type" name="publication_type" id="publication_type">
                                            <option value="">Choose an option</option>
                                            <option value="Journal Article">Journal Article</option>
                                            <option value="Conference Paper">Conference Paper</option>
                                            <option value="Book Chapter">Book Chapter</option>
                                            <option value="Book">Book</option>
                                            <option value="Patent">Patent</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 body_content" style="float: left; display: inline-block;">
                                <div>
                                    <div class="form-group col-sm-4 cstm_details attachment">
                                        <label for="Event Name" class="control-label">Image</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="file" class="form-control required" id="attachment" name="attachment" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details author_name">
                                        <label for="Event Name" class="control-label">Authors Name</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="author_name" name="author_name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details paper_title">
                                        <label for="Event Name" class="control-label">Title of Paper</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="paper_title" name="paper_title" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details journal_name">
                                        <label for="Event Name" class="control-label">Journal Name</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="journal_name" name="journal_name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details conference_name">
                                        <label for="Event Name" class="control-label">Conference name</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="conference_name" name="conference_name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details book_name">
                                        <label for="Event Name" class="control-label">Book name</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="book_name" name="book_name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details publish_date">
                                        <label for="Event Name" class="control-label">Publised date</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="publish_date" name="publish_date" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details patient_number">
                                        <label for="Event Name" class="control-label">Patent Number</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="patient_number" name="patient_number" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details publisher">
                                        <label for="Event Name" class="control-label">Publisher</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="publisher" name="publisher" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details location">
                                        <label for="Event Name" class="control-label">location</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="location" name="location" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details external_Link">
                                        <label for="Event Name" class="control-label">DOI (External Link)</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="external_Link" name="external_Link" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details editors">
                                        <label for="Event Name" class="control-label">Editors</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="editors" name="editors" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details page_number">
                                        <label for="Event Name" class="control-label">Page Number</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="page_number" name="page_number" value="">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group col-sm-12 cstm_details page_number">
                                        <label for="Event Name" class="control-label">Short Summary</label>
                                        <div class="col-sm-12">
                                            <!-- <input type="text" class="form-control required" id="page_number" name="page_number" value=""> -->
                                            <textarea id="short_summery" name="short_summery"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 cstm_details page_number">
                                        <label for="Event Name" class="control-label">Key points</label>
                                        <div class="col-sm-12">
                                            <!-- <input type="text" class="form-control required" id="page_number" name="page_number" value=""> -->
                                            <textarea id="key_points" name="key_points"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group col-sm-4 cstm_details">
                                        <label for="Event Name" class="control-label">Highlights</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control required" id="highlight" name="highlight" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 cstm_details">
                                        <label for="Event Name" class="control-label">Status</label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <select class="form-control" id="status" name="status">
                                                <option value="1" <?php if(@$research_category['status']==1){ echo "selected"; } ?>>Active</option>
                                                <option value="2" <?php if(@$research_category['status']==2){ echo "selected"; } ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12" style="text-align: center;margin-top: 20px;">
                        <div id="err"></div>
                        <input class="btn btn-primary publication_save" type="submit" value="Submit">
                        <input type="hidden" id="uid" name="uid" value="<?php echo $uid?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg5 awrd_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="background: #000000b0;">
    <div class="modal-dialog modal-lg" style="margin-top: 5%; width: 100%;">
        <div class="modal-content">
            <form id="form_awrd" action="" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12" style="margin-bottom: 40px;">
                            <div class="col-sm-12" style="float: left; display: inline-block;">
                                <div class="form-group col-sm-4 cstm_details">
                                    <label for="Event Name" class="control-label">Position</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <input type="text" class="form-control required" id="position" name="position" value="">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 cstm_details">
                                    <label for="Event Name" class="control-label">Year</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <input type="text" class="form-control required" id="year" name="year" value="">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 cstm_details">
                                    <label for="Event Name" class="control-label">Status</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <select class="form-control" name="status">
                                            <option value="1" <?php if(@$research_category['status']==1){ echo "selected"; } ?>>Active</option>
                                            <option value="2" <?php if(@$research_category['status']==2){ echo "selected"; } ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12" style="text-align: center;margin-top: 20px;">
                        <div id="err"></div>
                        <!-- <button type="button" class="btn btn-primary about_data"><a href="javascript:void(0);">Edit Record</a></button> -->
                        <!-- <button type="button" class="btn btn-primary about_save" data-toggle="modal" data-target=".bd-example-modal-lg">Update</button> -->
                        <input class="btn btn-primary exp_save" type="submit" value="Submit">
                        <input type="hidden" id="uid" name="uid" value="<?php echo $uid?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo $footer?>