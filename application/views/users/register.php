<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <div class="brand-logo">
                            <a href="<?php echo base_url(); ?>">

                                <?php
                            $query = $this->db->get_where('site_config', array('id' => 1));
                            $sitconfig=$query->row_array();
                            
                            ?>

                                <?php if(isset($sitconfig['logo_img']) && $sitconfig['logo_img']!='') { ?>

                                <img src="<?php echo base_url().'assets/images/'.$sitconfig['logo_img'];?>"
                                    alt="logo" />

                                <?php } else { ?>

                                <img src="<?php echo base_url(); ?>assets/frontend/images/logo.png" alt="logo" />

                                <?php } ?>

                            </a>
                        </div>
                        <h4>New here?</h4>
                        <h6 class="font-weight-light">Join us today! It takes only few steps</h6>
                        <?php if(validation_errors()!='') { ?>
                        <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
                        <?php } ?>
                        <?php echo form_open_multipart('users/register',array('class'=>'pt-3')); ?>
                        <div class="form-group">
                            <label>Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account-outline text-primary"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control form-control-lg border-left-0" name="name"
                                    placeholder="Name" id="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account-outline text-primary"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control form-control-lg border-left-0"
                                    placeholder="Username" name="username" id="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-email-outline text-primary"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control form-control-lg border-left-0"
                                    placeholder="Email" name="email" id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-lock-outline text-primary"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control form-control-lg border-left-0"
                                    name="password" id="password" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Confirm password</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-lock-outline text-primary"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control form-control-lg border-left-0"
                                    name="password2" id="password2" placeholder="Password">
                            </div>
                        </div>


                        <div class="mb-4">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" class="form-check-input" name="agree" id="agree"
                                        value="agree">
                                    I agree to all Terms & Conditions
                                </label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit"
                                class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                UP</button>
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                            Already have an account? <a href="<?php echo base_url(); ?>users/login"
                                class="text-primary">Login</a>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
                <div class="col-lg-6 register-half-bg d-flex flex-row">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2021
                        All rights reserved.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->