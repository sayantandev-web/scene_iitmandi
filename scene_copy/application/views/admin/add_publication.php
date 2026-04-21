<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="images/fav.png" sizes="32x32" />
<title><?php echo $page_title; ?></title>
<head>
    <?php echo $header_scripts; ?>
    <style>
        .chosen-container {width: 970px !important;}
    </style>
</head>
<body class="skin-blue">
    <div class="wrapper">
        <header class="main-header">
            <a href="admin" class="logo"><b>Admin</b>Panel</a>
            <?php echo $header; ?>
        </header>
        <?php echo $sidebar;?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1><?php echo $page_title; ?><small>Control panel</small></h1>
                <ol class="breadcrumb">
                    <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active"><?php echo $page_title; ?></li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo $page_title; ?></h3>
                                </div>
                                <?php //echo "<pre>"; print_r($publication); die;?>
                                <div class="panel-body">
                                    <?php echo $this->utilitylib->showMsg();?>
                                    <div class="form">
                                        <form class="cmxform form-horizontal tasi-form" id="editForm" method="post" action="" enctype="multipart/form-data">
                                            <div class="container1">
                                                <div class="row">
                                                    <div class="col-sm-12" style="margin-bottom: 40px;">
                                                        <div class="col-sm-12" style="float: left; display: inline-block;">
                                                            <div class="form-group cstm_details">
                                                                <label for="Publications Type" class="control-label col-lg-3 col-md-3 col-sm-4">Publications Type</label>
                                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                                    <select class="form-control publication_type" name="publication_type" id="publication_type">
                                                                        <option value="">Choose an option</option>
                                                                        <option value="Journal Article" <?php if(@$publication['publication_type'] == 'Journal Article') {echo "selected";}?>>Journal Article</option>
                                                                        <option value="Conference Paper" <?php if(@$publication['publication_type'] == 'Conference Paper') {echo "selected";}?>>Conference Paper</option>
                                                                        <option value="Book Chapter" <?php if(@$publication['publication_type'] == 'Book Chapter') {echo "selected";}?>>Book Chapter</option>
                                                                        <option value="Book" <?php if(@$publication['publication_type'] == 'Book') {echo "selected";}?>>Book</option>
                                                                        <option value="Patent" <?php if(@$publication['publication_type'] == 'Patent') {echo "selected";}?>>Patent</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 body_content" style="float: left; display: inline-block;">
                                                            <div>
                                                                <div class="form-group cstm_details attachment">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Image</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="file" class="form-control required" id="attachment" name="attachment" value="<?php echo @$publication['attachment'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details paper_title">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Title of Paper</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="text" class="form-control required" id="paper_title" name="paper_title" value="<?php echo @$publication['paper_title'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details chapter_title">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Title of Chapter</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="text" class="form-control required" id="chapter_title" name="chapter_title" value="<?php echo @$publication['paper_title'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details patent_title">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Title of Patent</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="text" class="form-control required" id="patent_title" name="patent_title" value="<?php echo @$publication['paper_title'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details journal_name">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Journal Name</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="text" class="form-control required" id="journal_name" name="journal_name" value="<?php echo @$publication['journal_name'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details author_name">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Authors Name</label>
                                                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                                                        <select class="form-control chosen" multiple id="author_name" name="author_name[]">
                                                                            <?php if(!empty($ourteam)) { 
                                                                            foreach($ourteam as $row) { ?>
                                                                            <option value="<?php echo $row['id']?>"><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?></option>
                                                                        <?php  } } else { ?>
                                                                            <option value="">No Data</option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <input type="hidden" class="form-control required" id="s1-order-list" name="s1-order-list" value="<?php echo @$publication[''] ?>">
                                                                    <div style="width: 55px;float: left;text-align: center;margin-left: 48px;margin-top: 5px;">
                                                                        <a href="javascript:void(0)" class="pageLoad1" onclick="clearAuthor()">Clear All</a>
                                                                    </div>
                                                                    <div style="width: 110px; display: inline-block; margin-top: 10px;">
                                                                        <a href="<?= base_url()?>admin/ourteam/add_team">Add External User</a>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details conference_name">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Conference name</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="text" class="form-control required" id="conference_name" name="conference_name" value="<?php echo @$publication['conference_name'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details book_name">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Book name</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="text" class="form-control required" id="book_name" name="book_name" value="<?php echo @$publication['book_name'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details publish_date">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Publised date</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="date" class="form-control required" id="publish_date" name="publish_date" value="<?php echo @$publication['publish_date'] ?>" style="line-height: 18px;">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details patient_number">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Patent Number</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="text" class="form-control required" id="patient_number" name="patient_number" value="<?php echo @$publication['patient_number'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details publisher">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Publisher</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="text" class="form-control required" id="publisher" name="publisher" value="<?php echo @$publication['publisher'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details location">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">location</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="text" class="form-control required" id="location" name="location" value="<?php echo @$publication['location'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details external_Link">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">DOI (External Link)</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="text" class="form-control required" id="external_Link" name="external_Link" value="<?php echo @$publication['external_Link'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details editors">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Editors</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="text" class="form-control required" id="editors" name="editors" value="<?php echo @$publication['editors'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details page_number">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Page Number</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="text" class="form-control required" id="page_number" name="page_number" value="<?php echo @$publication['page_number'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details volume_number">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Volume Number</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="text" class="form-control required" id="volume_number" name="volume_number" value="<?php echo @$publication['volume_number'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details issue_number">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Issue Number</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <input type="text" class="form-control required" id="issue_number" name="issue_number" value="<?php echo @$publication['issue_number'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="form-group cstm_details short_summery">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Short Summary</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <textarea id="short_summery" name="short_summery"><?php echo @$publication['short_summery'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details key_points">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Key points</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <textarea id="key_points" name="key_points"><?php echo @$publication['key_points'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="form-group cstm_details">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Highlights</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <select class="form-control" id="highlight" name="highlight">
                                                                            <option value="On My Page" <?php if(@$publication['highlight'] == 'On My Page') {echo "selected";}?>>On My Page</option>
                                                                            <option value="On Supervisor Page" <?php if(@$publication['highlight'] == 'On Supervisor Page') {echo "selected";}?>>On Supervisor Page</option>
                                                                            <option value="On School Page" <?php if(@$publication['highlight'] == 'On School Page') {echo "selected";}?>>On School Page</option>
                                                                            <option value="All of Above" <?php if(@$publication['highlight'] == 'All of Above') {echo "selected";}?>>All of Above</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group cstm_details">
                                                                    <label for="Event Name" class="control-label col-lg-3 col-md-3 col-sm-4">Status</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                                                        <select class="form-control" id="status" name="status">
                                                                            <option value="1" <?php if(@$publication['status']==1){ echo "selected"; } ?>>Active</option>
                                                                            <option value="2" <?php if(@$publication['status']==2){ echo "selected"; } ?>>Inactive</option>
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
                                                    <!-- <input type="hidden" id="uid" name="uid" value="<?php //echo $this->uri->segment(4);?>"> -->
                                                    <input type="hidden" id="pubid" name="pubid" value="<?php echo @$this->uri->segment(4);?>">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $footer; ?>
            </section>
        </div>
    </div>
    <?php echo $footer_scripts; ?>
</body>
</html>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/chosen.order.jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/js/chosen.min.css">

<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/chosen.order.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script>
    $(document).ready(function() {
        $('select.chosen').chosen();
        var MY_SELECT = $('select[multiple].chosen').get(0);
        $('.publication_save').hover(function() {
            var selection = ChosenOrder.getSelectionOrder(MY_SELECT);
            //console.log(selection);
            $('#s1-order-list').empty();
            $(selection).each(function(i) {
                $('#s1-order-list').append(selection[i] + ",");
            });
        });
        $('.body_content').hide();
        $("select.publication_type").change(function(){
            var selectedPublication = $(this).children("option:selected").val();
            if (selectedPublication == 'Journal Article') {
                $('.body_content').show();
                $('.attachment').show();
                $('.author_name').show();
                $('.paper_title').show();
                $("#paper_title").prop('required',true);
                $('.chapter_title').hide();
                $('.patent_title').hide();
                $('.journal_name').show();
                $("#journal_name").prop('required',true);
                $('.conference_name').hide();
                $('.book_name').hide();
                $('.publish_date').show();
                $("#publish_date").prop('required',true);
                $('.patient_number').hide();
                $('.publisher').show();
                $('.location').hide();
                $('.external_Link').show();
                $("#external_Link").prop('required',true);
                $('.editors').hide();
                $('.page_number').show();
                $('.volume_number').show();
                $('.issue_number').show();
                $('.short_summery').show();
                $('.key_points').show();
            } else if (selectedPublication == 'Conference Paper') {
                $('.body_content').hide();
                $('.body_content').show();
                $('.attachment').show();
                $('.author_name').show();
                $('.paper_title').show();
                $("#paper_title").prop('required',true);
                $('.chapter_title').hide();
                $('.patent_title').hide();
                $('.journal_name').hide();
                $('.conference_name').show();
                $("#conference_name").prop('required',true);
                $('.book_name').hide();
                $('.publish_date').show();
                $("#publish_date").prop('required',true);
                $('.patient_number').hide();
                $('.publisher').show();
                $('.location').show();
                $('.external_Link').show();
                $("#external_Link").prop('required',true);
                $('.editors').hide();
                $('.page_number').show();
                $('.volume_number').show();
                $('.issue_number').hide();
                $('.short_summery').show();
                $('.key_points').show();
            } else if (selectedPublication == 'Book Chapter') {
                $('.body_content').hide();
                $('.body_content').show();
                $('.attachment').show();
                $('.author_name').show();
                $('.paper_title').hide();
                $('.chapter_title').show();
                $("#chapter_title").prop('required',true);
                $('.patent_title').hide();
                $('.journal_name').hide();
                $('.conference_name').hide();
                $('.book_name').show();
                $("#book_name").prop('required',true);
                $('.publish_date').show();
                $("#publish_date").prop('required',true);
                $('.patient_number').hide();
                $('.publisher').hide();
                $('.location').hide();
                $('.external_Link').show();
                $("#external_Link").prop('required',true);
                $('.editors').show();
                $('.page_number').show();
                $('.volume_number').hide();
                $('.issue_number').hide();
                $('.short_summery').show();
                $('.key_points').show();
            } else if (selectedPublication == 'Book') {
                $('.body_content').hide();
                $('.body_content').show();
                $('.attachment').show();
                $('.author_name').show();
                $('.paper_title').show();
                $("#paper_title").prop('required',true);
                $('.chapter_title').hide();
                $('.patent_title').hide();
                $('.journal_name').hide();
                $('.conference_name').hide();
                $('.book_name').hide();
                $('.publish_date').show();
                $("#publish_date").prop('required',true);
                $('.patient_number').hide();
                $('.publisher').show();
                $('.location').hide();
                $('.external_Link').show();
                $("#external_Link").prop('required',true);
                $('.editors').hide();
                $('.page_number').show();
                $('.volume_number').hide();
                $('.issue_number').hide();
                $('.short_summery').show();
                $('.key_points').show();
            } else if (selectedPublication == 'Patent') {
                $('.body_content').hide();
                $('.body_content').show();
                $('.attachment').show();
                $('.author_name').show();
                $('.paper_title').hide();
                $('.chapter_title').hide();
                $('.patent_title').show();
                $("#patent_title").prop('required',true);
                $('.journal_name').hide();
                $('.conference_name').hide();
                $('.book_name').hide();
                $('.publish_date').show();
                $("#publish_date").prop('required',true);
                $('.patient_number').show();
                $('.publisher').hide();
                $('.location').hide();
                $('.external_Link').hide();
                $('.editors').hide();
                $('.page_number').hide();
                $('.volume_number').hide();
                $('.issue_number').hide();
                $('.short_summery').show();
                $('.key_points').hide();
            } else {
                $('.body_content').hide();
            }
        });
        var pubType = $('#publication_type').val();
        if(pubType == "Journal Article") {
            $('.body_content').show();
            $('.attachment').show();
            $('.author_name').show();
            $('.paper_title').show();
            $("#paper_title").prop('required',true);
            $('.chapter_title').hide();
            $('.patent_title').hide();
            $('.journal_name').show();
            $("#journal_name").prop('required',true);
            $('.conference_name').hide();
            $('.book_name').hide();
            $('.publish_date').show();
            $("#publish_date").prop('required',true);
            $('.patient_number').hide();
            $('.publisher').show();
            $('.location').hide();
            $('.external_Link').show();
            $("#external_Link").prop('required',true);
            $('.editors').hide();
            $('.page_number').show();
            $('.volume_number').show();
            $('.issue_number').show();
            $('.short_summery').show();
            $('.key_points').show();
        } else if(pubType == "Conference Paper") {
            $('.body_content').hide();
            $('.body_content').show();
            $('.attachment').show();
            $('.author_name').show();
            $('.paper_title').show();
            $("#paper_title").prop('required',true);
            $('.chapter_title').hide();
            $('.patent_title').hide();
            $('.journal_name').hide();
            $('.conference_name').show();
            $("#conference_name").prop('required',true);
            $('.book_name').hide();
            $('.publish_date').show();
            $("#publish_date").prop('required',true);
            $('.patient_number').hide();
            $('.publisher').show();
            $('.location').show();
            $('.external_Link').show();
            $("#external_Link").prop('required',true);
            $('.editors').hide();
            $('.page_number').show();
            $('.volume_number').show();
            $('.issue_number').hide();
            $('.short_summery').show();
            $('.key_points').show();
        } else if(pubType == "Book Chapter") {
            $('.body_content').hide();
            $('.body_content').show();
            $('.attachment').show();
            $('.author_name').show();
            $('.paper_title').hide();
            $('.chapter_title').show();
            $("#chapter_title").prop('required',true);
            $('.patent_title').hide();
            $('.journal_name').hide();
            $('.conference_name').hide();
            $('.book_name').show();
            $("#book_name").prop('required',true);
            $('.publish_date').show();
            $("#publish_date").prop('required',true);
            $('.patient_number').hide();
            $('.publisher').hide();
            $('.location').hide();
            $('.external_Link').show();
            $("#external_Link").prop('required',true);
            $('.editors').show();
            $('.page_number').show();
            $('.volume_number').hide();
            $('.issue_number').hide();
            $('.short_summery').show();
            $('.key_points').show();
        } else if(pubType == "Book") {
            $('.body_content').hide();
            $('.body_content').show();
            $('.attachment').show();
            $('.author_name').show();
            $('.paper_title').show();
            $("#paper_title").prop('required',true);
            $('.chapter_title').hide();
            $('.patent_title').hide();
            $('.journal_name').hide();
            $('.conference_name').hide();
            $('.book_name').hide();
            $('.publish_date').show();
            $("#publish_date").prop('required',true);
            $('.patient_number').hide();
            $('.publisher').show();
            $('.location').hide();
            $('.external_Link').show();
            $("#external_Link").prop('required',true);
            $('.editors').hide();
            $('.page_number').show();
            $('.volume_number').hide();
            $('.issue_number').hide();
            $('.short_summery').show();
            $('.key_points').show();
        } else if(pubType == "Patent") {
            $('.body_content').hide();
            $('.body_content').show();
            $('.attachment').show();
            $('.author_name').show();
            $('.paper_title').hide();
            $('.chapter_title').hide();
            $('.patent_title').show();
            $("#patent_title").prop('required',true);
            $('.journal_name').hide();
            $('.conference_name').hide();
            $('.book_name').hide();
            $('.publish_date').show();
            $("#publish_date").prop('required',true);
            $('.patient_number').show();
            $('.publisher').hide();
            $('.location').hide();
            $('.external_Link').hide();
            $('.editors').hide();
            $('.page_number').hide();
            $('.volume_number').hide();
            $('.issue_number').hide();
            $('.short_summery').show();
            $('.key_points').hide();
        } else {
            $('.body_content').hide();
        }
    });
    CKEDITOR.replace('short_summery', {
        filebrowserUploadUrl: '<?php echo base_url()?>home/ck_upload',
        filebrowserUploadMethod: "form",
        removePlugins: 'easyimage',
    });
    //CKEDITOR.replace('key_points');
    CKEDITOR.replace('key_points', {
        filebrowserUploadUrl: '<?php echo base_url()?>home/ck_upload',
        filebrowserUploadMethod: "form",
        removePlugins: 'easyimage',
    });
</script>