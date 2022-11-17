<!DOCTYPE html>
<html lang="en">

<head>
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
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/jquery-ui/jquery-ui.min.js"></script>
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
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/js/lightbox.min.js"></script>
      <!-- jquery file upload js -->
      <script src="<?php echo base_url(); ?>admintemplate/bower_components/jquery.filer/js/jquery.filer.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/filer/custom-filer.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/filer/jquery.fileuploads.init.js" type="text/javascript"></script>

    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/data-table-custom.js"></script>
    
</head>

<body>
    <div class="container-scroller">
