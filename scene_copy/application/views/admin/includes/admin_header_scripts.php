<base href="<?php echo base_url(); ?>" />
<meta charset="UTF-8">
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<link href="<?php echo base_url();?>assets/backend/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/backend/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/backend/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<!-- <link href="<?php echo base_url();?>assets/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="<?php echo base_url();?>assets/backend/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="<?php echo base_url();?>assets/backend/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="<?php echo base_url();?>assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
<link href="<?php echo base_url();?>assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" /> -->
<link href="<?php echo base_url();?>assets/backend/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<!-- <link href="<?php echo base_url();?>assets/backend/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> -->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<style>
    .main-footer{margin-left: 0;}
    .pull-middle{float: left !important; margin-left: 10px;}
    #page_description_tbl{width: 786px !important; height: 400px !important;}
    .defaultSkin .mceStatusbar{margin: -20px 0px 0 0;}
    #page_description_ifr{height: 400px !important;}
    #description_ifr{height: 300px !important;}
    .breadcrumb{background: none;}
    .news_desc iframe{width: 280px !important; height:160px !important;}
    #video_url_tbl{width: 809px !important; }
    .mce-notification {display: none !important;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(window).bind("load", function() {
    $('.ytp-chrome-top').css('display','none');
    $('.ytp-chrome-bottom').css('display','none');
});
jQuery(document).ready(function($){
    var option = $('#video_news').find(":selected").val();
    if(option=='1'){
        $('.image_post').hide();
        $('.video_post').show();
    } else {
        $('.image_post').show();
        $('.video_post').hide();
    }
    $('#video_news').change(function(){
        var option = $('#video_news').find(":selected").val();
        if(option=='1'){
            $('.image_post').hide();
            $('.video_post').show();
        } else {
            $('.image_post').show();
            $('.video_post').hide();
        }
    });
    $("#country").change(function(){
        var country = $("#country").val();
        $.post(
            "<?php echo base_url('admin/news/get_state_list') ?>", {country: country}, 
            function(result){
                if(result) {
                    $("#state").html(result); 
                }
            }
        )
    })
    $("#state").change(function(){
        var state = $("#state").val();
        $.post(
            "<?php echo base_url('admin/news/get_city_list') ?>", {state: state}, 
            function(result){
                if(result) {
                    $("#city").html(result); 
                }
            }
        )
    })
});
</script>