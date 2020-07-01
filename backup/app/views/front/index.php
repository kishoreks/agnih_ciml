<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Agnih Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
   <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/dropzone/dropzone.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/jquery-bar-rating/bars-1to10.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/jquery-bar-rating/bars-horizontal.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/jquery-bar-rating/bars-movie.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/jquery-bar-rating/bars-pill.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/jquery-bar-rating/bars-reversed.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/jquery-bar-rating/bars-square.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/jquery-bar-rating/bootstrap-stars.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/jquery-bar-rating/css-stars.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/jquery-bar-rating/examples.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/jquery-bar-rating/fontawesome-stars.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/jquery-asColorPicker/css/asColorPicker.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/x-editable/bootstrap-editable.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/dropify/dropify.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/jquery-file-upload/uploadfile.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/jquery-tags-input/jquery.tagsinput.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/dashboard/images/favicon.png" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body class="sidebar-dark">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->

   <?php $this->load->view('front/header/top_menu'); ?>

   
    <!-- partial -->


    <?php $this->load->view('front/header/side_search'); ?>
   


      <!-- partial -->


      <!-- partial:partials/_sidebar.html -->


     <?php $this->load->view('front/header/menu'); ?>


      <!-- partial -->



      <div class="main-panel">

        <div class="content-wrapper">

        <?php
             include_once $page_file . '.php';
       
        ?>

       
         
        </div> <!-- content-wrapper -->
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.agnih.com/" target="_blank">agnih Software</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?= base_url(); ?>assets/dashboard/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= base_url(); ?>assets/dashboard/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page -->
   <script src="<?= base_url(); ?>assets/dashboard/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?= base_url(); ?>assets/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
   
  <script src="<?= base_url(); ?>assets/dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- inject:js -->
  <script src="<?= base_url(); ?>assets/dashboard/js/off-canvas.js"></script>
  <script src="<?= base_url(); ?>assets/dashboard/js/hoverable-collapse.js"></script>
  <script src="<?= base_url(); ?>assets/dashboard/js/template.js"></script>
  <script src="<?= base_url(); ?>assets/dashboard/js/settings.js"></script>
  <script src="<?= base_url(); ?>assets/dashboard/js/todolist.js"></script>
  <script src="<?= base_url(); ?>assets/dashboard/vendors/jquery-file-upload/jquery.uploadfile.min.js"></script>
  <script src="<?= base_url(); ?>assets/dashboard/vendors/jquery-tags-input/jquery.tagsinput.min.js"></script>
  <script src="<?= base_url(); ?>assets/dashboard/js/jquery-file-upload.js"></script>
  <script src="<?= base_url(); ?>assets/dashboard/vendors/inputmask/jquery.inputmask.bundle.js"></script>
   <script src="<?= base_url(); ?>assets/dashboard/js/data-table.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/formpickers.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url(); ?>assets/dashboard/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

