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
    <!-- End custom js for this page-->

    <!-- endinject -->
    <style>
      .brand-logo img
      {
        margin: 10px 10px;
        width: 15%;
      }
      .nav {
        flex-wrap: nowrap !important;
      }
      </style>
</head>

<body>
    <div class="container-scroller">
        <div class="horizontal-menu">

            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item">

                            <a class="navbar-brand brand-logo" href="<?php echo base_url(); ?>">
                            
                            
                            <?php if(isset($sitconfig['logo_img']) && $sitconfig['logo_img']!='') { ?>

                                 <img
                                    src="<?php echo base_url().'assets/images/'.$sitconfig['logo_img'];?>" alt="logo" />

                          <?php } else { ?>

                            <img
                                    src="<?php echo base_url(); ?>assets/frontend/images/logo.png" alt="logo" />

                        <?php } ?>     
                        </a>   
                        </li>
                        <?php if($this->session->userdata('login')): ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>">
                                <i class="mdi mdi-file-document-box menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        
                        <?php if(!$this->session->userdata('login')): ?>
                          <li class="nav-item">
                              <a href="<?php echo base_url(); ?>users/login" class="nav-link">
                                  <i class="mdi mdi-account menu-icon"></i>
                                  <span class="menu-title">Sign up / Sign in</span>
                                  <i class="menu-arrow"></i>
                              </a>
                          </li>
                        <?php endif; ?>

                        <?php if($this->session->userdata('login')): ?>
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                                <span class="nav-profile-name"><?php echo $this->session->userdata('username'); ?></span>
                                <span class="online-status"></span>
                                <img src="<?php echo base_url(); ?>assets/frontend/images/faces/user_icon.png" alt="profile" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="<?php echo base_url(); ?>users/myaccount">
                                    <i class="mdi mdi-settings text-primary"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>users/logout">
                                    <i class="mdi mdi-logout text-primary"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                        <?php endif; ?>
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