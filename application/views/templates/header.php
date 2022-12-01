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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/jquery.datetimepicker.css">
    <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.datetimepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.number.js"></script>
    <!-- endinject -->
    <style>
    /* .brand-logo img
      {
        margin: 10px 10px;
        width: 15%;
      }
      .nav {
        flex-wrap: nowrap !important;
      } */
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="horizontal-menu">

            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                <div class="container-fluid">
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                        <ul class="navbar-nav navbar-nav-left">
                            <li class="nav-item ms-0 me-5 d-lg-flex d-none">
                                <a href="#" class="nav-link horizontal-nav-left-menu"><i
                                        class="mdi mdi-format-list-bulleted"></i></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                                    id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                                    <i class="mdi mdi-bell mx-0"></i>
                                    <span class="count bg-success">2</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                    aria-labelledby="notificationDropdown">
                                    <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-success">
                                                <i class="mdi mdi-information mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                Just now
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-warning">
                                                <i class="mdi mdi-settings mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal">Settings</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                Private message
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-info">
                                                <i class="mdi mdi-account-box mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                2 days ago
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </li>


                        </ul>
                        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                            <a class="navbar-brand brand-logo" href="<?php echo base_url(); ?>">


                                <?php if(isset($sitconfig['logo_img']) && $sitconfig['logo_img']!='') { ?>

                                <img src="<?php echo base_url().'assets/images/'.$sitconfig['logo_img'];?>"
                                    alt="logo" />

                                <?php } else { ?>

                                <img src="<?php echo base_url(); ?>assets/frontend/images/logo.png" alt="logo" />

                                <?php } ?>
                            </a>
                            <a class="navbar-brand brand-logo-mini" href="<?php echo base_url(); ?>">
                                <?php if(isset($sitconfig['logo_img']) && $sitconfig['logo_img']!='') { ?>

                                <img src="<?php echo base_url().'assets/images/'.$sitconfig['logo_img'];?>"
                                    alt="logo" />

                                <?php } else { ?>

                                <img src="<?php echo base_url(); ?>assets/frontend/images/logo.png" alt="logo" />

                                <?php } ?>
                            </a>
                        </div>
                        <ul class="navbar-nav navbar-nav-right">

                            <li class="nav-item dropdown d-lg-flex d-none">
                                <a class="dropdown-toggle show-dropdown-arrow btn btn-inverse-primary btn-sm"
                                    id="nreportDropdown" href="#" data-bs-toggle="dropdown">
                                    Reports
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                    aria-labelledby="nreportDropdown">
                                    <p class="mb-0 font-weight-medium float-left dropdown-header">Reports</p>
                                    <a class="dropdown-item">
                                        <i class="mdi text-primary"></i>
                                        Pdf
                                    </a>
                                    <a class="dropdown-item">
                                        <i class="mdi mdi-file-excel text-primary"></i>
                                        Exel
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown d-lg-flex d-none">
                                <button type="button" class="btn btn-inverse-primary btn-sm" onclick="<?php echo base_url(); ?>users/myaccount">Settings</button>
                            </li>

                            <?php if(!$this->session->userdata('login')): ?>
                            <li class="nav-item dropdown d-lg-flex d-none">
                                <a href="<?php echo base_url(); ?>users/login" class="nav-link">
                                    <i class="mdi mdi-account menu-icon"></i>
                                    <span class="menu-title">Sign up / Sign in</span>
                                    <i class="menu-arrow"></i>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if($this->session->userdata('login')): ?>
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    id="profileDropdown">
                                    <span
                                        class="nav-profile-name"><?php echo $this->session->userdata('username'); ?></span>
                                    <span class="online-status"></span>
                                    <img src="<?php echo base_url(); ?>assets/frontend/images/faces/user_icon.png"
                                        alt="profile" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                    aria-labelledby="profileDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>users/myaccount">
                                        <i class="mdi mdi-settings text-primary"></i>
                                        Myaccount
                                    </a>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>users/updatepassword">
                                        <i class="mdi mdi-key-variant text-primary"></i>
                                        Change password
                                    </a>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>users/logout">
                                        <i class="mdi mdi-logout text-primary"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            data-toggle="horizontal-menu-toggle">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                </div>
            </nav>

            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">

                        <?php if($this->session->userdata('login')): ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>users/dashboard">
                                <i class="mdi mdi-file-document-box menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-file-video menu-icon"></i>
                                <span class="menu-title">Campaigns</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>campaign/add">Add Campaign</a></li>
                                     <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>campaign/manage">Manage Campaign</a></li>
                                </ul>
                            </div>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>wallet/alltransaction" class="nav-link">
                                <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
                                <span class="menu-title">Transactions</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>wallet/transactions" class="nav-link">
                                <i class="mdi mdi-currency-inr menu-icon"></i>
                                <span class="menu-title">Wallet</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>campaign/reports" class="nav-link">
                                <i class="mdi mdi-table menu-icon"></i>
                                <span class="menu-title">Reports</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>

                        <?php endif; ?>


                    </ul>
                </div>
            </nav>
        </div>




        <!-- Flash Messages -->
        <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<div class="col-lg-12 d-flex grid-margin stretch-card">
									<div class="card sale-visit-statistics-border-success">
										<div class="card-body">
											
											<h4 class="card-title mb-2">'.$this->session->flashdata('user_registered').'</h4>
											
										</div>
									</div>
								</div>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<div class="col-lg-12 d-flex grid-margin stretch-card">
									<div class="card sale-visit-statistics-border-success">
										<div class="card-body">
											
											<h4 class="card-title mb-2">'.$this->session->flashdata('post_created').'</h4>
											
										</div>
									</div>
								</div>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<div class="col-lg-12 d-flex grid-margin stretch-card">
									<div class="card sale-visit-statistics-border-success">
										<div class="card-body">
											
											<h4 class="card-title mb-2">'.$this->session->flashdata('post_updated').'</h4>
											
										</div>
									</div>
								</div>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('category_created')): ?>
        <?php echo '<div class="col-lg-12 d-flex grid-margin stretch-card">
									<div class="card sale-visit-statistics-border-success">
										<div class="card-body">
											
											<h4 class="card-title mb-2">'.$this->session->flashdata('category_created').'</h4>
											
										</div>
									</div>
								</div>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('post_deleted')): ?>
        <?php echo '<div class="col-lg-12 d-flex grid-margin stretch-card">
									<div class="card sale-visit-statistics-border-success">
										<div class="card-body">
											
											<h4 class="card-title mb-2">'.$this->session->flashdata('post_deleted').'</h4>
											
										</div>
									</div>
								</div>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</h4>
											
										</div>
									</div>
								</div>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<div class="col-lg-12 d-flex grid-margin stretch-card">
									<div class="card sale-visit-statistics-border-success">
										<div class="card-body">
											
											<h4 class="card-title mb-2">'.$this->session->flashdata('user_loggedin').'</h4>
											
										</div>
									</div>
								</div>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<div class="col-lg-12 d-flex grid-margin stretch-card">
									<div class="card sale-visit-statistics-border-success">
										<div class="card-body">
											
											<h4 class="card-title mb-2">'.$this->session->flashdata('user_loggedout').'</h4>
											
										</div>
									</div>
								</div>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('category_deleted')): ?>
        <?php echo '<div class="col-lg-12 d-flex grid-margin stretch-card">
									<div class="card sale-visit-statistics-border-success">
										<div class="card-body">
											
											<h4 class="card-title mb-2">'.$this->session->flashdata('category_deleted').'</h4>
											
										</div>
									</div>
								</div>'; ?>
        <?php endif; ?>