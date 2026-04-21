<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title;?></title>
    <meta name="title" content="<?php echo $contactus[0]['meta_title'];?>">
    <meta name="description" content="<?php echo $contactus[0]['meta_desc']; ?>">
    <?php echo $header;?>    
    <div class="post-section section">
        <div class="container">
            <div class="row" style="padding: 60px 0 0 0;">
                <div class="col-lg-8 col-12 mb-50">
                    <div class="post-block-wrapper">
                        <div class="body" style="padding: 0px 20px;">
                            <div class="contact-info row" style="padding: 0px 10px;">
                                <div class="page-banner" style="padding: 20px 0 0 0;">
                                    <ol class="page-breadcrumb">
                                        <li><a href="#">Home</a></li>
                                        <li class="active"><?php echo $title;?></li>
                                    </ol>
                                    <h2 style="color: #000 !important;"><?php echo $title;?></h2>
                                </div>
                                <?php echo $contactus[0]['page_description']; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $sidebar;?>
            </div>
        </div>
    </div>
    <?php echo $footer;?>
</body>
</html>