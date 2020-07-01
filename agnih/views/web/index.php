<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/web/assets/images/favicon.png" type="image/x-icon">
    <title><?= $this->system_title; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/web/assets/css/bootstrap.min.css">
    <!--icon font css-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/web/assets/vendors/themify-icon/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/web/assets/vendors/font-awesome/css/all.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/web/assets/vendors/flaticon/flaticon.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/web/assets/vendors/animation/animate.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/web/assets/vendors/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/web/assets/vendors/animation/animate.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/web/assets/vendors/magnify-pop/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/web/assets/vendors/elagent/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/web/assets/vendors/scroll/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/web/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/web/assets/css/responsive.css">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="<?= base_url(); ?>assets/web/assets/js/jquery-3.2.1.min.js"></script>
    
    <style>
       .modal-dialog {
            max-width: 1000px;
            margin: 1.75rem auto;
        }
    </style>

</head>

<body>
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="T" class="letters-loading">
                        T
                    </span>
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                    <span data-text-preloader="P" class="letters-loading">
                        P
                    </span>
                    <span data-text-preloader="S" class="letters-loading">
                        S
                    </span>
                    <span data-text-preloader="L" class="letters-loading" style="color: #ea5225;">
                        L
                    </span>
                    <span data-text-preloader="I" class="letters-loading" style="color: #ea5225;">
                        I
                    </span>
                    <span data-text-preloader="F" class="letters-loading" style="color: #ea5225;">
                        F
                    </span>
                    <span data-text-preloader="E" class="letters-loading" style="color: #ea5225;">
                        E
                    </span>
                </div>
                <p class="text-center">Loading</p>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body_wrapper">
        <header class="header_area">
            <nav class="navbar navbar-expand-lg menu_one menu_four">
                <div class="container">
                    <a class="navbar-brand sticky_logo" href="#">
                      <img src="<?= base_url(); ?>assets/web/assets/images/logo_w.png" srcset="<?= base_url(); ?>assets/web/assets/images/logo_w.png 2x" alt="logo">
                      <img src="<?= base_url(); ?>assets/web/assets/images/logo.png" srcset="<?= base_url(); ?>assets/web/assets/images/logo.png 2x" alt="">
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_toggle">
                            <span class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="hamburger-cross">
                                <span></span>
                                <span></span>
                            </span>
                        </span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                        <ul class="navbar-nav menu w_menu pl_100">
                           
                            <li class="nav-item dropdown submenu mega_menu mega_menu_two">
                                <a class="nav-link dropdown-toggle" href="<?= base_url('web'); ?>">
                                    Home
                                </a>
                                
                            </li>
                             <li class="nav-item dropdown submenu mega_menu mega_menu_two">
                                <a class="nav-link dropdown-toggle" href="<?= base_url('web/about'); ?>">
                                    About Us
                                </a>
                                
                            </li>
                            <li class="nav-item dropdown submenu mega_menu mega_menu_two">
                                <a class="nav-link dropdown-toggle" href="<?= base_url('web/concept'); ?>">
                                    Concept
                                </a>
                                
                            </li>
                            <li class="nav-item dropdown submenu mega_menu mega_menu_two">
                                <a class="nav-link dropdown-toggle" href="<?= base_url('web/products'); ?>">
                                    Products
                                </a>
                                
                            </li>
                            <li class="nav-item dropdown submenu mega_menu mega_menu_two">
                                <a class="nav-link dropdown-toggle" href="<?= base_url('web/contact-us'); ?>">
                                    Contact Us
                                </a>
                                
                            </li>

                             <li class="nav-item dropdown submenu mega_menu mega_menu_two">
                                <a class="nav-link dropdown-toggle" href="<?= base_url('web/register'); ?>">
                                    Register
                                </a>
                                
                            </li>
                           
                           
                        </ul>
                        <a class="btn_get btn_hover" href="<?= base_url('members-login'); ?>">Login In</a>
                    </div>
                </div>
            </nav>
        </header>


         <?php
             include_once $page_file . '.php';
       
        ?>

       
        <footer class="footer_area footer_area_four f_bg">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget company_widget">
                                <a href="index.html" class="f-logo"><img src="<?= base_url(); ?>assets/web/assets/images/logo.png" srcset="<?= base_url(); ?>assets/web/assets/images/logo.png 2x" alt=""></a>
                                <div class="widget-wrap">
                                    <p class="f_400 f_p f_size_15 mb-0 l_height34"><span>Email:</span> <a href="mailto:saasland@gmail.com" class="f_400">admin@tipslife.in</a></p>
                                    <p class="f_400 f_p f_size_15 mb-0 l_height34"><span>Phone:</span> <a href="tel:948256347968" class="f_400">+988 430 40 40</a></p>
                                </div>
                                <form action="#" class="f_subscribe mailchimp" method="post">
                                    <input type="text" name="EMAIL" class="form-control memail" placeholder="Email">
                                    <button class="btn btn-submit" type="submit"><i class="ti-arrow-right"></i></button>
                                    <p class="mchimp-errmessage" style="display: none;"></p>
                                    <p class="mchimp-sucmessage" style="display: none;"></p>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget about-widget pl_40">
                                <h3 class="f-title f_600 t_color f_size_18 mb_40">About Us</h3>
                                <ul class="list-unstyled f_list">
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#">Leadership</a></li>
                                    <li><a href="#">Diversity</a></li>
                                    <li><a href="#">Jobs</a></li>
                                    <li><a href="#">Press</a></li>
                                    <li><a href="#">Wavelength</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget about-widget">
                                <h3 class="f-title f_600 t_color f_size_18 mb_40">Workflow Solutions</h3>
                                <ul class="list-unstyled f_list">
                                    <li><a href="#">Project Management</a></li>
                                    <li><a href="#">Agile</a></li>
                                    <li><a href="#">Task Management</a></li>
                                    <li><a href="#">Reporting</a></li>
                                    <li><a href="#">Work Tracking</a></li>
                                    <li><a href="#">See All Uses</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget about-widget">
                                <h3 class="f-title f_600 t_color f_size_18 mb_40">Team Solutions</h3>
                                <ul class="list-unstyled f_list">
                                    <li><a href="#">Engineering</a></li>
                                    <li><a href="#">Designers</a></li>
                                    <li><a href="#">Sales</a></li>
                                    <li><a href="#">Developers</a></li>
                                    <li><a href="#">Marketing</a></li>
                                    <li><a href="#">See All Teams</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-5 col-sm-6">
                            <p class="mb-0 f_400">Copyright © 2018 Desing by <a href="#">Agnih Software</a></p>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-6">
                            <div class="f_social_icon_two text-center">
                                <a href="#"><i class="ti-facebook"></i></a>
                                <a href="#"><i class="ti-twitter-alt"></i></a>
                                <a href="#"><i class="ti-vimeo-alt"></i></a>
                                <a href="#"><i class="ti-pinterest"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">

                            <ul class="list-unstyled f_menu text-right">
                                <li><a href="#" data-toggle="modal" data-target="#exampleModalLong " data-target="">Terms of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
            
                            </ul>


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="<?= base_url(); ?>assets/web/assets/js/propper.js"></script>
    <script src="<?= base_url(); ?>assets/web/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/web/assets/vendors/wow/wow.min.js"></script>
    <script src="<?= base_url(); ?>assets/web/assets/vendors/sckroller/jquery.parallax-scroll.js"></script>
    <script src="<?= base_url(); ?>assets/web/assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?= base_url(); ?>assets/web/assets/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>assets/web/assets/vendors/isotope/isotope-min.js"></script>
    <script src="<?= base_url(); ?>assets/web/assets/vendors/magnify-pop/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url(); ?>assets/web/assets/vendors/scroll/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?= base_url(); ?>assets/web/assets/js/plugins.js"></script>
    <script src="<?= base_url(); ?>assets/web/assets/js/main.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
</body>

</html>