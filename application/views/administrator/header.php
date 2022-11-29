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
                                   
                                    <a class="dropdown-item">
                                    
                                       Campaign Report
                                   </a>
                                   <a class="dropdown-item">
                                  
                                       Transaction Report
                                   </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown d-lg-flex d-none">
                                <button type="button" class="btn btn-inverse-primary btn-sm" onclick="javascript: location.href='<?php echo base_url(); ?>administrator/site-configuration/update/1';">Settings</button>
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
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>administrator/update-profile">
                                        <i class="mdi mdi-settings text-primary"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>administrator/change-password">
                                        <i class="mdi mdi-grease-pencil text-primary"></i>
                                        Change password
                                    </a>
                                    
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>administrator/logout">
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

           