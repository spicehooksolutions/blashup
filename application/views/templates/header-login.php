<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
                            $query = $this->db->get_where('site_config', array('id' => 1));
                            $sitconfig=$query->row_array();
                            
                            ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php if(isset($sitconfig['site_name']) && $sitconfig['site_name']!='') { ?>
    <title><?php echo $sitconfig['site_name'];?></title>
    <?php } else { ?>        
    <title>Blashup Audiencemanager</title>
    <?php }?>
    <!-- base:css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->

    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css">

    <!-- base:js -->
    <script src="<?php echo base_url(); ?>assets/frontend/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?php echo base_url(); ?>assets/frontend/js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="<?php echo base_url(); ?>assets/frontend/vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/vendors/progressbar.js/progressbar.min.js"></script>
    <script
        src="<?php echo base_url(); ?>assets/frontend/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js">
    </script>
    <script src="<?php echo base_url(); ?>assets/frontend/vendors/justgage/raphael-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/vendors/justgage/justgage.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- Custom js for this page-->
    <script src="<?php echo base_url(); ?>assets/frontend/js/dashboard.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/js/sweetalert.min.js"></script>
    <!-- End custom js for this page-->

    <!-- endinject -->
    <style>
      .brand-logo img
      {
        margin: 10px 10px;
        width: 15%;
      }
      </style>
</head>
<body>
    