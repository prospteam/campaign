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
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/static/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/static/css/default.css') ?>" id="theme" rel="stylesheet">
    <link href="<?php echo base_url('assets/static/css/login-register-lock.css') ?>" id="theme" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar card-no-border">
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">COME FUND ME KENYAN</p>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper" class="login-register login-sidebar" style="background-image:url(<?php echo base_url(); ?>/assets/static/images/background/login-register.jpg);">
    <div class="login-box card">
        <div class="card-body">
            <form class="form-horizontal form-material" id="signupForm" action="" method="post">
                <a href="javascript:void(0)" class="text-center db"><img style="max-width: 80px;" src="<?php echo base_url(); ?>/assets/static/images/favicon.png" alt="Home" /><br/><img src="<?php echo base_url(); ?>/assets/static/images/logo-text.png" alt="Home" /></a>
                <div class="form-group">
                    <?php if(isset($msg)): ?>
                            <div class="col-md-12">
                                <div class="alert alert-danger" style="margin-bottom:0">
                                     <?php echo $msg; ?>
                                </div>
                            </div>
                    <?php endif; ?>
                 </div>
                 <div class="form-group">
                     <div class="col-xs-12">
                         <input class="form-control <?php echo form_error('firstname') ? 'is-invalid' : ''; ?>" type="text" name="firstname"  placeholder="Firstname">
                         <div class="invalid-feedback" <?php echo form_error('firstname') ? 'style="display:block;"' : ''; ?> >
                              <?php echo form_error ( 'firstname' ); ?>
                         </div>
                     </div>
                 </div>
                 <div class="form-group">
                     <div class="col-xs-12">
                         <input class="form-control <?php echo form_error('lastname') ? 'is-invalid' : ''; ?>" type="text" name="lastname"  placeholder="Lastname">
                         <div class="invalid-feedback" <?php echo form_error('lastname') ? 'style="display:block;"' : ''; ?> >
                              <?php echo form_error ( 'lastname' ); ?>
                         </div>
                     </div>
                 </div>
                 <div class="form-group">
                     <div class="col-xs-12">
                         <input class="form-control <?php echo form_error('address') ? 'is-invalid' : ''; ?>" type="text" name="address"  placeholder="Address">
                         <div class="invalid-feedback" <?php echo form_error('address') ? 'style="display:block;"' : ''; ?> >
                              <?php echo form_error ( 'address' ); ?>
                         </div>
                     </div>
                 </div>
                <div class="form-group m-t-40">
                    <div class="col-xs-12">
                        <input class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" name="email" type="text"  placeholder="Emal Address" value="<?php echo set_value('email'); ?>">
                        <div class="invalid-feedback" <?php echo form_error('email') ? 'style="display:block;"' : ''; ?> >
                             <?php echo form_error ( 'email' ); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control <?php echo form_error('password') ? 'is-invalid' : ''; ?>" type="password" name="password"  placeholder="Password">
                        <div class="invalid-feedback" <?php echo form_error('password') ? 'style="display:block;"' : ''; ?> >
                             <?php echo form_error ( 'password' ); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">Sign Up</button>
                    </div>
                </div>

                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        Don't have an account? <a href="<?php echo base_url('sign-in') ?>" class="text-primary m-l-5"><b>Sign In</b></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<input type="hidden" name="base_url" value="<?php echo base_url()?>">
<script src="<?php echo base_url('assets/static/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url('assets/static/bootstrap/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/static/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/static/js/sweetalert2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/login/js/login.js') ?>"></script>
<script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
</script>
</body>

</html>
