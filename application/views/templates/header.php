<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blashup Audiencemanager</title>
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
    <!-- End custom js for this page-->

    <!-- endinject -->
</head>

<body>
    <div class="container-scroller">
        <div class="horizontal-menu">

            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item">

                            <a class="navbar-brand brand-logo" href="<?php echo base_url(); ?>"><img
                                    src="<?php echo base_url(); ?>assets/frontend/images/logo.svg" alt="logo" /></a>
                            <a class="navbar-brand brand-logo-mini" href="<?php echo base_url(); ?>"><img
                                    src="<?php echo base_url(); ?>assets/frontend/images/logo-mini.svg"
                                    alt="logo" /></a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>">
                                <i class="mdi mdi-file-document-box menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-cube-outline menu-icon"></i>
                                <span class="menu-title">UI Elements</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../../pages/ui-features/buttons.html">Buttons</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../../pages/ui-features/typography.html">Typography</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="../../pages/forms/basic_elements.html" class="nav-link">
                                <i class="mdi mdi-chart-areaspline menu-icon"></i>
                                <span class="menu-title">Form Elements</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../pages/charts/chartjs.html" class="nav-link">
                                <i class="mdi mdi-finance menu-icon"></i>
                                <span class="menu-title">Charts</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../pages/tables/basic-table.html" class="nav-link">
                                <i class="mdi mdi-grid menu-icon"></i>
                                <span class="menu-title">Tables</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../pages/icons/mdi.html" class="nav-link">
                                <i class="mdi mdi-emoticon menu-icon"></i>
                                <span class="menu-title">Icons</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-codepen menu-icon"></i>
                                <span class="menu-title">Sample Pages</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../../pages/samples/login.html">Login</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../../pages/samples/login-2.html">Login 2</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../../pages/samples/register.html">Register</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../../pages/samples/register-2.html">Register 2</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../../pages/samples/lock-screen.html">Lockscreen</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                                <span class="nav-profile-name">Johnson</span>
                                <span class="online-status"></span>
                                <img src="<?php echo base_url(); ?>assets/frontend/images/faces/face28.png" alt="profile" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                aria-labelledby="profileDropdown">
                                <a class="dropdown-item">
                                    <i class="mdi mdi-settings text-primary"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item">
                                    <i class="mdi mdi-logout text-primary"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>


        <!-- <nav class="navbar navbar-inverse">
  	<div class="container">
  		<div class="navbar-header">
  		<a class="navbar-brand" href="<?php echo base_url(); ?>">CI Blogs</a>	
  		</div>
  		<div id="navbar">
  		 <ul class="nav navbar-nav">
  		 	<li><a href="<?php echo base_url(); ?>">Home</a></li>
  		 	<li><a href="<?php echo base_url(); ?>about">About</a></li>
        <li><a href="<?php echo base_url(); ?>posts">Blog</a></li>
         <li><a href="<?php echo base_url(); ?>categories">Category</a></li>
  		 </ul>	
       <ul class="nav navbar-nav navbar-right">
         <?php if(!$this->session->userdata('login')): ?>
            <li><a href="<?php echo base_url(); ?>users/register">Register</a></li>
            <li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
         <?php endif; ?>
         <?php if($this->session->userdata('login')): ?>
            <li><a href="<?php echo base_url(); ?>users/dashboard"><?php echo $this->session->userdata('username'); ?></a></li>
            <li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
         <?php endif; ?>
       </ul>  
  		</div>
  	</div>
  </nav> -->



        <!-- Flash Messages -->
        <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('category_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('post_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('category_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
        <?php endif; ?>