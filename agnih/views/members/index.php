<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$this->system_title?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/site_img/logo_icon.png">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors.css" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body>
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <!-- <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="<?= base_url(); ?>assets/img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div> -->
            <!-- end pre-loader -->
            <!-- begin app-header -->
            <header class="app-header top-bar">
                <!-- begin navbar -->
                <nav class="navbar navbar-expand-md">

                    <!-- begin navbar-header -->
                    <div class="navbar-header d-flex align-items-center">
                        <a href="javascript:void:(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>
                        <a class="navbar-brand" href="<?= base_url(); ?>">
                            <img src="<?= base_url(); ?>assets/site_img/logo.png" class="img-fluid logo-desktop" alt="logo" />
                            <img src="<?= base_url(); ?>assets/site_img/logo_icon.png" class="img-fluid logo-mobile" alt="logo" />
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-align-left"></i>
                    </button>
                    <!-- end navbar-header -->

                    <!-- begin navigation -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="navigation d-flex">


                          <?php $this->load->view('members/temp/notifications/mega_menu'); ?>
                          

                            <ul class="navbar-nav nav-right ml-auto">

                                 <?php $this->load->view('members/temp/notifications/email'); ?>
                                 <?php $this->load->view('members/temp/notifications/notifications'); ?>
                                 <?php $this->load->view('members/temp/notifications/search'); ?>
                                 <?php $this->load->view('members/temp/notifications/profile'); ?>

                            </ul>


                        </div>
                    </div>
                    <!-- end navigation -->
                </nav>
                <!-- end navbar -->

            </header>
            <!-- end app-header -->


            <!-- begin app-container -->
            <div class="app-container">
              
               <?php $this->load->view('members/temp/side_menu/menu'); ?>
                  


                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1>
                                            <?php if ($this->uri->segment(2) != NuLL) {echo translate($this->uri->segment(2)); } else {echo translate($this->uri->segment(1)); } ?> 

                                                <?php if ($this->uri->segment(3) == NULL): ?>
                                                    <?php echo ""; ?>
                                                <?php else: ?>
                                                    <?php echo ' / ' . translate($this->uri->segment(3)); ?>
                                                <?php endif ?>


                                           
                                            
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="<?= base_url('members'); ?>"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    Dashboard
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">  <?php if ($this->uri->segment(2) != NuLL) {echo translate($this->uri->segment(2)); } else {echo translate($this->uri->segment(1)); } ?></li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->


                        <!-- begin row -->
                          
                           <?php
                                 include_once $page_file . '.php';
                           
                            ?>

                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->



            </div>
            <!-- end app-container -->


            <!-- begin footer -->
            <footer class="footer">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-left">
                        <p>&copy; Copyright 2019. All rights reserved.</p>
                    </div>
                    <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
                        <p>Hand-crafted made with <i class="fa fa-heart text-danger mx-1"></i> by <a href="https://www.agnih.com">Agnih Software</a></p>
                    </div>
                </div>
            </footer>
            <!-- end footer -->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->

    <!-- plugins -->
    <script src="<?= base_url(); ?>assets/js/vendors.js"></script>

    <!-- custom app -->
    <script src="<?= base_url(); ?>assets/js/app.js"></script>
    
<script>
    setTimeout(function () {
        $('#success_alert').fadeOut('fast');
        $('#danger_alert').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
</script>


</body>

</html>