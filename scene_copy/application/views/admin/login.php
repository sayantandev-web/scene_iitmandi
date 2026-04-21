<!DOCTYPE html>
<html>
<head>
    <title><?php echo $page_title; ?></title>
    <base href="<?php echo base_url(); ?>" />
    <meta charset="UTF-8">
    <title>Admin | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url();?>assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page" style="background-image: url('<?php echo base_url();?>/uploads/bg.jpeg');">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo base_url(); ?>"><b>Admin</b>Panel</a>
        </div>
        <div class="login-box-body">
            <img style="width:100%; height:140px;" src="<?php echo base_url();?>uploads/site_logo/<?php echo $logo[0]['profile_pic']?>" alt="Logo" title="Logo"/>
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="" method="post">
                <div class="error"><?php echo $this->utilitylib->showMsg();?></div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="email" required="" placeholder="Email"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" required="" placeholder="Password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">    
                        <div class="checkbox icheck">
                            <label><input type="checkbox"> Remember Me</label>
                        </div>                        
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
            <!--<a href="#">I forgot my password</a><br>-->
        </div>
    </div>
    <script src="<?php echo base_url();?>assets/backend/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/backend/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
    </script>
</body>
</html>
