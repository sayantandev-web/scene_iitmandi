<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="images/fav.png" sizes="32x32" />
<title><?php echo $page_title; ?></title>
<head>
    <?php echo $header_scripts; ?>
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
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="display: flow-root;">
                                <h3 class="panel-title" style="float: left;"><?php echo $page_title; ?></h3>
                                <a href="admin/publication/add_publication" style="float: right;background: #3c8dbc;padding: 10px;color: #fff;">Add Publication</a>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->utilitylib->showMsg();?>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered dat_tbl">
                                            <thead>
                                                <tr>
                                                   <th>Sl No.</th>
                                                   <th>Publication Type</th>
                                                   <th>Publication Details</th>
                                                   <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($publication)) { 
                                                $i=1; ?>
                                                <?php foreach($publication as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['publication_type']; ?></td>
                                                    <?php if($row['publication_type'] == 'Journal Article') {
                                                        $author = $this->db->query("SELECT * FROM iitmandi_team WHERE FIELD(iitmandi_team.id,".$row['author_name'].") ORDER BY FIELD(iitmandi_team.id,".$row['author_name'].")");
                                                        $value = $author->result_array();
                                                        $count = count($value);
                                                        $commonValues = [];
                                                        for($i = 0; $i < $count; $i++) {
                                                            if ($value[$i]['mname'] == '') {
                                                                $commonValues[$i] = $value[$i]['lname'].", ".substr($value[$i]['fname'], 0, 1).".";
                                                            } else {
                                                                $commonValues[$i] = $value[$i]['lname'].", ".substr($value[$i]['fname'], 0, 1).". ".substr($value[$i]['mname'], 0, 1).".";
                                                            }
                                                        }
                                                        $lastItem = array_pop($commonValues);
                                                        $text = implode(', ', $commonValues); // a, b 
                                                        if ($text == ''){
                                                            $text .= $lastItem; 
                                                        } else {
                                                            $text .= ', & '.$lastItem; // a, b and c
                                                        }
                                                        if($row['issue_number'] != ""){
                                                            $issue_number = "(".$row['issue_number'].")";
                                                        } else {
                                                            $issue_number = '';
                                                        }
                                                    ?> 
                                                    <td style="text-align: justify;"><?php echo $text." (".date('Y', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['journal_name'].", ".$row['volume_number'].$issue_number.", ".$row['page_number'].". <a href=".$row['external_Link']." target='_blank'>".$row['external_Link']."</a>" ?></td>
                                                    <?php } ?>

                                                    <?php if($row['publication_type'] == 'Conference Paper') {
                                                        $author1 = $this->db->query("SELECT * FROM iitmandi_team WHERE FIELD(iitmandi_team.id,".$row['author_name'].") ORDER BY FIELD(iitmandi_team.id,".$row['author_name'].")");
                                                        $value1 = $author1->result_array();
                                                        $count1 = count($author1->result_array());
                                                        $commonValues1 = [];
                                                        for($i = 0; $i < $count1; $i++) {
                                                            if ($value1[$i]['mname'] == '') {
                                                                $commonValues1[$i] = $value1[$i]['lname'].", ".substr($value1[$i]['fname'], 0, 1).".";
                                                            } else {
                                                                $commonValues1[$i] = $value1[$i]['lname'].", ".substr($value1[$i]['fname'], 0, 1).". ".substr($value1[$i]['mname'], 0, 1).".";
                                                            }
                                                        }
                                                        $lastItem1 = array_pop($commonValues1);
                                                        $text1 = implode(', ', $commonValues1); // a, b 
                                                        if ($text1 == ''){
                                                            $text1 .= $lastItem1; 
                                                        } else {
                                                            $text1 .= ', & '.$lastItem1; // a, b and c
                                                        }
                                                    ?>
                                                    <td style="text-align: justify;"><?php echo $text1." (".date('Y, F', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['conference_name'].", ".$row['location']; ?></td>
                                                    <?php } ?>

                                                    <?php if($row['publication_type'] == 'Book Chapter') {
                                                        $author2 = $this->db->query("SELECT * FROM iitmandi_team WHERE FIELD(iitmandi_team.id,".$row['author_name'].") ORDER BY FIELD(iitmandi_team.id,".$row['author_name'].")");
                                                        $value2 = $author2->result_array();
                                                        $count2 = count($author2->result_array());
                                                        $commonValues2 = [];
                                                        for($i = 0; $i < $count2; $i++) {
                                                            if ($value2[$i]['mname'] == '') {
                                                                $commonValues2[$i] = $value2[$i]['lname'].", ".substr($value2[$i]['fname'], 0, 1).".";
                                                            } else {
                                                                $commonValues2[$i] = $value2[$i]['lname'].", ".substr($value2[$i]['fname'], 0, 1).". ".substr($value2[$i]['mname'], 0, 1).".";
                                                            }
                                                        }
                                                        $lastItem2 = array_pop($commonValues2);
                                                        $text2 = implode(', ', $commonValues2); // a, b 
                                                        if ($text2 == ''){
                                                            $text2 .= $lastItem2; 
                                                        } else {
                                                            $text2 .= ', & '.$lastItem2; // a, b and c
                                                        }
                                                    ?>
                                                    <td style="text-align: justify;"><?php echo $text2." (".date('Y', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['editors'].", ".$row['book_name']." (".$row['page_number'].")"; ?></td>
                                                    <?php } ?>

                                                    <?php if($row['publication_type'] == 'Book') {
                                                        $author3 = $this->db->query("SELECT * FROM iitmandi_team WHERE FIELD(iitmandi_team.id,".$row['author_name'].") ORDER BY FIELD(iitmandi_team.id,".$row['author_name'].")");
                                                        $value3 = $author3->result_array();
                                                        $count3 = count($author3->result_array());
                                                        $commonValues3 = [];
                                                        for($i = 0; $i < $count3; $i++) {
                                                            if ($value3[$i]['mname'] == '') {
                                                                $commonValues3[$i] = $value3[$i]['lname'].", ".substr($value3[$i]['fname'], 0, 1).".";
                                                            } else {
                                                                $commonValues3[$i] = $value3[$i]['lname'].", ".substr($value3[$i]['fname'], 0, 1).". ".substr($value3[$i]['mname'], 0, 1).".";
                                                            }
                                                        }
                                                        $lastItem3 = array_pop($commonValues3);
                                                        $text3 = implode(', ', $commonValues3); // a, b 
                                                        if ($text3 == ''){
                                                            $text3 .= $lastItem3; 
                                                        } else {
                                                            $text3 .= ', & '.$lastItem3; // a, b and c
                                                        }
                                                    ?>
                                                    <td style="text-align: justify;"><?php echo $text3." (".date('Y', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['publisher']; ?></td>
                                                    <?php } ?>

                                                    <?php if($row['publication_type'] == 'Patent') {
                                                        $author4 = $this->db->query("SELECT * FROM iitmandi_team WHERE FIELD(iitmandi_team.id,".$row['author_name'].") ORDER BY FIELD(iitmandi_team.id,".$row['author_name'].")");
                                                        $value4 = $author4->result_array();
                                                        $count4 = count($author4->result_array());
                                                        $commonValues4 = [];
                                                        for($i = 0; $i < $count4; $i++) {
                                                            if ($value4[$i]['mname'] == '') {
                                                                $commonValues4[$i] = $value4[$i]['lname'].", ".substr($value4[$i]['fname'], 0, 1).".";
                                                            } else {
                                                                $commonValues4[$i] = $value4[$i]['lname'].", ".substr($value4[$i]['fname'], 0, 1).". ".substr($value4[$i]['mname'], 0, 1).".";
                                                            }
                                                        }
                                                        $lastItem4 = array_pop($commonValues4);
                                                        $text4 = implode(', ', $commonValues4); // a, b 
                                                        if ($text4 == ''){
                                                            $text4 .= $lastItem4; 
                                                        } else {
                                                            $text4 .= ', & '.$lastItem4; // a, b and c
                                                        }    
                                                    ?>
                                                    <td style="text-align: justify;"><?php echo $text4." (".date('Y, F d', strtotime($row['publish_date']))."). ".$row['paper_title'].". ".$row['patient_number']; ?></td>
                                                    <?php } ?>

                                                    <td style="width: 142px;">
                                                        <a href="admin/publication/add_publication/<?php echo $row['id']; ?>" class="btn btn-primary waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <?php if($row['status']==1) { ?>
                                                        <a onClick="javascript: return confirm('Are you sure you want to inactive this publication?');" href="admin/publication/change_status/<?php echo $row['id']; ?>" class="btn btn-info waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Inactive Status"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <?php } else { ?>
                                                        <a onClick="javascript: return confirm('Are you sure you want to active this publication?');" href="admin/publication/change_status/<?php echo $row['id']; ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Active Status"><i class="fa fa-remove"></i></a>
                                                        <?php } ?>
                                                        <a  onclick="return confirm('Are you sure you want to delete this publication?')" href="admin/publication/delete/<?php echo $row['id']; ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $i++; } } else {?>
                                                <!-- <tr>
                                                    <td colspan="5">No Record Found</td>
                                                </tr> -->
                                                <?php } ?>
                                            </tbody>
                                        </table>
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
