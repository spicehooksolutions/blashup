<nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">

                        <?php if($this->session->userdata('login')): ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>administrator/dashboard">
                                <i class="mdi mdi-file-document-box menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-account-multiple menu-icon"></i>
                                <span class="menu-title">Users</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>administrator/users/add-user">Add user</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>administrator/users/users">Manage Users</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-file-video menu-icon"></i>
                                <span class="menu-title">Campaigns</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>administrator/campaign-listing">Manage Campaigns</a></li>
                                    
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-settings menu-icon"></i>
                                <span class="menu-title">Configuration</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>administrator/site-configuration/update/1">Site Configuration</a></li>
                                     <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>administrator/site-configuration/payment-gateway-integration">Payment Gateway Integration</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link">
                                <i class="mdi mdi-currency-inr menu-icon"></i>
                                <span class="menu-title">Wallet</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link">
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

    
 

    <?php if($this->session->flashdata('success')): ?>
      <?php echo '<div class="alert alert-success icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Success! &nbsp;&nbsp;</strong>'.$this->session->flashdata('success').'</p></div>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('danger')): ?>
      <?php echo '<div class="alert alert-danger icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Error! &nbsp;&nbsp;</strong>'.$this->session->flashdata('danger').'</p></div>'; ?>
    <?php endif; ?>

     <?php if(validation_errors() != null): ?>
      <?php echo '<div class="alert alert-warning icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Alert! &nbsp;&nbsp;</strong>'.validation_errors().'</p></div>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('match_old_password')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('match_old_password').'</p>'; ?>
    <?php endif; ?>


     



