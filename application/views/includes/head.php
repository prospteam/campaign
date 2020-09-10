<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/static/images/favicon.png') ?>">
    <title>Fund Raiser Organization in Washington</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/static/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('assets/static/dropify/dist/css/dropify.min.css') ?>">
    <!-- Popup CSS -->
    <link href="<?php echo base_url('assets/static/css/magnific-popup.css') ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/static/css/style.css') ?>" rel="stylesheet">
    <!-- page css -->
    <link href="<?php echo base_url('assets/static/css/user-card.css') ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url('assets/static/css/default.css') ?>" id="theme" rel="stylesheet">
    <link href="<?php echo base_url('assets/static/css/floating-label.css') ?>" id="theme" rel="stylesheet">
    <link href="<?php echo base_url('assets/static/css/login-register-lock.css') ?>" id="theme" rel="stylesheet">
    <link href="<?php echo base_url('assets/static/css/sweetalert.css') ?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<?php
    // so ang file ani kay naa sa global_helper.php naa sa application/helpers
    load_assets($_assets_,'css');
?>
<script type="text/javascript">
    var membership =  <?php echo MEMBERSHIP ; ?>;
</script>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <input type="hidden" class="base_url" value="<?php echo base_url(); ?>"/>
    <input type="hidden" class="user_id" value="<?php echo $this->session->userdata('userid'); ?>"/>
    <input type="hidden" class="usertype" value="<?php echo $this->session->userdata('usertype'); ?>"/>
