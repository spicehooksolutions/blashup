<style type="text/css">
.alert.alert-warning.icons-alert {
    text-align: left;
}

.alert.alert-success.icons-alert {
    text-align: left;
}

.alert.alert-danger.icons-alert {
    text-align: left;
}
</style>
<?php
                $query = $this->db->get_where('site_config', array('id' => 1));
                $sitconfig=$query->row_array();
                
                ?>
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-3 col-lg-3 col-md-3"></div>
            <div class="col-sm-6 col-lg-6 col-md-6">

                <!-- Authentication card start -->
                <div class="login-card card-block auth-body">

                    <div class="text-center">
                        <?php if(isset($sitconfig['logo_img']) && $sitconfig['logo_img']!='') { ?>

                        <img src="<?php echo base_url().'assets/images/'.$sitconfig['logo_img'];?>" alt="logo"
                            style="width:15%;" />

                        <?php } else { ?>

                        <img src="<?php echo base_url(); ?>assets/frontend/images/logo.png" alt="logo"
                            style="width:15%;" />

                        <?php } ?>
                    </div>

                    <div class="auth-box">

                        <div class="row m-b-20">
                            <div class="col-md-12">
                                <h3 class="text-left txt-primary">Sign In</h3>
                            </div>

                            <div class="col-md-12" style="margin-bottom: -40px;">
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
                            </div>
                        </div>
                        <hr />
                        <?php echo form_open('administrator/adminLogin'); ?>
                        <div class="input-group">
                            <input type="text" name="email" class="form-control" placeholder="Your Email">
                            <span class="md-line"></span>
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <span class="md-line"></span>
                        </div>
                        <div class="row m-t-25 text-left">
                            <div class="col-sm-7 col-xs-12">
                                <div class="checkbox-fade fade-in-primary">
                                    <label>
                                        <input type="checkbox" value="">
                                        <span class="cr"><i
                                                class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                        <span class="text-inverse">Remember me</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                                <a href="<?php echo base_url(); ?>administrator/forget-password"
                                    class="text-right f-w-600 text-inverse"> Forgot Your Password?</a>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <button type="submit"
                                    class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign
                                    in</button>
                            </div>
                        </div>
                        <hr />
                        
                        </form>
                    </div>

                    <!-- end of form -->
                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
            <div class="col-sm-3 col-lg-3 col-md-3"></div>
        </div>
        <!-- end of row -->

        <!-- end of container-fluid -->
</section>