<body class="horizontal-static">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>

    <nav class="navbar header-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-logo">
                <a class="mobile-menu" id="mobile-collapse" href="#!">
                    <i class="ti-menu"></i>
                </a>
                <a class="mobile-search morphsearch-search" href="#">
                    <i class="ti-search"></i>
                </a>
                <a href="<?php echo base_url(); ?>administrator/dashboard">

                <?php
                $query = $this->db->get_where('site_config', array('id' => 1));
                $sitconfig=$query->row_array();
                
                ?>
                   <img src="<?php echo base_url().'assets/images/'.$sitconfig['logo_img'];?>" alt="Site Logo" style="width: 60%;" >
                                    
                </a>
                <a class="mobile-options">
                    <i class="ti-more"></i>
                </a>
            </div>
            <div class="navbar-container container-fluid">
                <div>
                    <ul class="nav-left">
                        <li>
                            <a id="collapse-menu" href="#">
                                <i class="ti-menu"></i>
                            </a>
                        </li>
                       
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li>
                        
                    </ul>
                    <ul class="nav-right">
                       
                         
                        <li class="user-profile header-notification">
                            <a href="#!">
                            
                                <img src="<?php echo base_url(); ?>admintemplate/assets/images/user.png" alt="User-Profile-Image">
                           
                                <span><?php echo $this->session->userdata('username'); ?></span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                
                                <li>
                                    <a href="<?php echo base_url(); ?>administrator/update-profile">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo base_url(); ?>administrator/change-password">
                                        <i class="ti-lock"></i> Change Password
                                    </a>
                                </li>
                               
                                <li>
                                    <a href="<?php echo base_url(); ?>administrator/logout">
                                        <i class="ti-layout-sidebar-left"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                  
                </div>
            </div>
        </div>
    </nav>
    <!-- Menu header end -->
<style type="text/css">
    .nav-left-new {
    display: flex;
    float: left;
}
.nav-left-new > li {
    padding: 0 45px 0 0;
}
.nav-left-new a {
    color: #ffffff;
}
.nav-left-new a:hover {
    color: rgb(26,188,156);
}
</style>