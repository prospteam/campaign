
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">COME FUND ME KENYAN</p>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <!-- Logo icon --><b>
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="<?php echo base_url('assets/static/images/favicon.png') ?>" alt="homepage" class="dark-logo" style="width: 60px;" />
                        <!-- Light Logo icon -->
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text --><span>
                     <!-- dark Logo text -->
                     <img src="<?php echo base_url() ?>/assets/static/images/logo-text.png" alt="homepage" class="dark-logo"  style="max-width: 150px;"/>
                     <!-- Light Logo text -->
                 </span>
                 </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                    <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
<<<<<<< HEAD
                    <li class="nav-item hidden-xs-down search-box">
                         <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)">
                             <i class="icon-Magnifi-Glass2"></i></a>
=======
                    <!-- <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="icon-Magnifi-Glass2"></i></a>
>>>>>>> 0b6bbcc590c52912b853849902a3727fcebba708
                        <form class="app-search">
                            <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                    </li> -->
                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <ul class="navbar-nav my-lg-0">
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <!-- <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-Bell"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown"> -->
                            <!-- <ul>
                                <li>
                                    <div class="drop-title">Notifications</div>
                                </li>
                                <li>
                                    <div class="message-center">

                                        <a href="#">
                                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                        </a>

                                        <a href="#">
                                            <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                        </a>

                                        <a href="#">
                                            <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                        </a>

                                        <a href="#">
                                            <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul> -->
                        <!-- </div> -->
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-Mail"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                            <ul>
                                <li>
                                    <div class="drop-title">You have 4 new messages</div>
                                </li>
                                <li>
                                    <div class="message-center">

                                        <a href="#">
                                            <div class="user-img"> <img src="<?php echo base_url() ?>/assets/static/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                        </a>

                                        <a href="#">
                                            <div class="user-img"> <img src="<?php echo base_url() ?>/assets/static/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                        </a>

                                        <a href="#">
                                            <div class="user-img"> <img src="<?php echo base_url() ?>/assets/static/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                        </a>

                                        <a href="#">
                                            <div class="user-img"> <img src="<?php echo base_url() ?>/assets/static/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- mega menu -->
                    <!-- ============================================================== -->
                    <!-- <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-Box-Close"></i></a>
                        <div class="dropdown-menu animated bounceInDown">
                            <ul class="mega-dropdown-menu row">
                                <li class="col-lg-3 col-xlg-2 m-b-30">
                                    <h4 class="m-b-20">CAROUSEL</h4>

                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <div class="container"> <img class="d-block img-fluid" src="<?php echo base_url() ?>/assets/static/images/big/img1.jpg" alt="First slide"></div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="container"><img class="d-block img-fluid" src="<?php echo base_url() ?>/assets/static/images/big/img2.jpg" alt="Second slide"></div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="container"><img class="d-block img-fluid" src="<?php echo base_url() ?>/assets/static/images/big/img3.jpg" alt="Third slide"></div>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                    </div>

                                </li>
                                <li class="col-lg-3 m-b-30">
                                    <h4 class="m-b-20">ACCORDION</h4>

                                    <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingOne">
                                                <h5 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                              Collapsible Group Item #1
                                            </a>
                                          </h5> </div>
                                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingTwo">
                                                <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                              Collapsible Group Item #2
                                            </a>
                                          </h5> </div>
                                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingThree">
                                                <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                              Collapsible Group Item #3
                                            </a>
                                          </h5> </div>
                                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-lg-3  m-b-30">
                                    <h4 class="m-b-20">CONTACT US</h4>

                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Enter email"> </div>
                                        <div class="form-group">
                                            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </form>
                                </li>
                                <li class="col-lg-3 col-xlg-4 m-b-30">
                                    <h4 class="m-b-20">List style</h4>

                                    <ul class="list-style-none">
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                    <!-- ============================================================== -->
                    <!-- End mega menu -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Language -->
                    <!-- ============================================================== -->
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                        <div class="dropdown-menu dropdown-menu-right animated bounceInDown"> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-in"></i> India</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> Dutch</a> </div>
                    </li> -->
                    <!-- ============================================================== -->
                    <!-- Profile -->
                    <!-- ============================================================== -->
                    <?php
                        $pro_pic = empty($profile->profile_picture)?'profile_image.png':$profile->profile_picture;
                    ?>
                    <li class="nav-item dropdown u-pro">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url().'assets/profile_picture/'.$pro_pic; ?>" alt="user" class="" /> <span class="hidden-md-down"><?php echo $_SESSION['firstname'] . ' '. $_SESSION['lastname'] ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                            <ul class="dropdown-user">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="u-img"><img src="<?php echo base_url().'assets/profile_picture/'.$pro_pic; ?>" alt="User Image"></div>
                                        <div class="u-text">
                                            <h4><?php echo $_SESSION['firstname'] . ' '. $_SESSION['lastname'] ?> </h4>
                                            <p class="text-muted"><?php echo $_SESSION['email'] ?> </p></div>
                                    </div>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('my-profile') ?>"><i class="ti-user"></i> My Profile</a></li>
                                <li><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
<<<<<<< HEAD
                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class=" fas fa-clipboard-list "></i><span class="hide-menu">My Campaigns <span class="label label-rounded label-danger">4</span></span></a>
=======
                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-User"></i><span class="hide-menu">Users <span class="label label-rounded label-danger">2</span></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url('member') ?>">Member </a></li>
                            <li><a href="<?php echo base_url('member/non_member') ?>">Non Member</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">My Campaigns <span class="label label-rounded label-danger">4</span></span></a>
>>>>>>> 0b6bbcc590c52912b853849902a3727fcebba708
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url('my-campaigns'); ?>">Active </a></li>
                            <li><a href="#">In-Active</a></li>
                            <li><a href="#">For Approval</a></li>
                        </ul>
                    </li>
                    <li> <a class=" waves-effect waves-dark" href="#" aria-expanded="false"><i class=" fas fa-hand-holding-heart "></i><span class="hide-menu">My Donations</span></a></li>
                </ul>
            </nav>
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                        <div class="col-md-12 alert alert-info alert-rounded row" style="background:#2486C1;color:#fff">
                            <div class="col-md-12">
                                <label for="">Pay the membership fee to avail most of the priviledges on fund raising campaigns.</label>
                            </div>
                            <div id="alert" hidden class="col-md-12">
                                <p class="mb-0" id="alert-content"></p>
                            </div>
                            <div class="collumn" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Choose currency</label>
                                        <select name=""  id="currencyCodes"  class="form-control currencyCodes"> </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div id="paypal-button-container"></div>
                                    <!-- <div id="paypal-button-container" hidden></div> -->
                                </div>
                            </div>
                     </div>
                </ul>
            </nav>

            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
