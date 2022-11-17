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

<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="main-panel">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <?php if(isset($sitconfig['logo_img']) && $sitconfig['logo_img']!='') { ?>

                            <img src="<?php echo base_url().'assets/images/'.$sitconfig['logo_img'];?>" alt="logo"
                                style="width:75%;" />

                            <?php } else { ?>

                            <img src="<?php echo base_url(); ?>assets/frontend/images/logo.png" alt="logo"
                                style="width:75%;" />

                            <?php } ?>
                        </div>
                        <h4>Hey! Forget password?</h4>
                      

                        <?php if(validation_errors() != null): ?>

                        <div class="col-sm-8 flex-column d-flex stretch-card">
                            <div class="card sale-visit-statistics-border">
                                <div class="card-body">

                                <p><?php echo validation_errors(); ?></p>

                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php echo form_open('administrator/forget_password_mail',array('class'=>'pt-3')); ?>

                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg" id="email" name="email"
                                placeholder="Email">
                        </div>
                        
                        <div class="mt-3">
                            <button type="submit"
                                class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                IN</button>
                        </div>
                        <div class="my-2 d-flex justify-content-between align-items-center">

                            <a href="<?php echo base_url(); ?>administrator/index"
                                class="auth-link text-black">Back to Sign in</a>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>

</div>
<!-- container-scroller -->
</body>

</html>