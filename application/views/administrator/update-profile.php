   <link rel="stylesheet" type="text/css"
       href="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.css">
   <link rel="stylesheet" type="text/css"
       href="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/css/bootstrap-datetimepicker.css">
   <!-- Date-range picker css  -->
   <link rel="stylesheet" type="text/css"
       href="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap-daterangepicker/daterangepicker.css" />
   <!-- Date-Dropper css -->
   <link rel="stylesheet" type="text/css"
       href="<?php echo base_url(); ?>admintemplate/bower_components/datedropper/datedropper.min.css" />
   <link rel="stylesheet" type="text/css"
       href="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.css" />


   <div class="container-fluid page-body-wrapper">
       <div class="main-panel">
           <div class="content-wrapper">
               <div class="row">

                   <<div class="col-lg-12 grid-margin stretch-card">
                       <div class="card">
                           <div class="card-body">
                               <h4 class="card-title">Edit account</h4>
                               <p class="card-description">

                               </p>
                               <?php echo form_open_multipart('administrator/update_admin_profile_data'); ?>
                               <input type="hidden" name="id" class="form-control"
                                   value="<?php echo $this->session->userdata('user_id'); ?>">

                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">User-Name</label>
                                   <div class="col-sm-10">
                                       <input type="text" readonly="" name="username" class="form-control"
                                           value="<?php echo $user['username']; ?>" placeholder="User Name">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Email</label>
                                   <div class="col-sm-10">
                                       <input type="text" readonly="" name="email" class="form-control"
                                           value="<?php echo $user['email']; ?>" placeholder="Email">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Full Name</label>
                                   <div class="col-sm-10">
                                       <input type="text" name="name" class="form-control"
                                           value="<?php echo $user['name']; ?>" placeholder="Full Name">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Mobile No.</label>
                                   <div class="col-sm-10">
                                       <input type="text" name="contact" value="<?php echo $user['contact']; ?>"
                                           class="form-control" placeholder="Mobile No.">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Address</label>
                                   <div class="col-sm-10">
                                       <input type="text" name="address" value="<?php echo $user['address']; ?>"
                                           class="form-control" placeholder="Address">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Zipcode</label>
                                   <div class="col-sm-10">
                                       <input type="text" name="zipcode" value="<?php echo $user['zipcode']; ?>"
                                           class="form-control" placeholder="Zipcode">
                                   </div>
                               </div>
                               <div class="form-group row" style="float:center;">
                                   <label class="col-sm-2 col-form-label">Gender</label>
                                   <div class="col-sm-10">
                                       <label>
                                           <input value="Female"
                                               <?php if($user['gender'] == 'Female'){ echo "checked"; } ?> name="gender"
                                               type="radio"><i class="mdi mdi-gender-female"></i> Female
                                       </label>
                                       &nbsp;
                                       <label>
                                           <input value="Male" <?php if($user['gender'] == 'Male'){ echo "checked"; } ?>
                                               name="gender" type="radio"><i class="mdi mdi-gender-male"></i> Male
                                       </label>

                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">User Image</label>
                                   <div class="col-sm-6">
                                       <img src="<?php echo base_url().'assets/images/users/'.$user['image']; ?>"
                                           width="70px">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Update Image</label>
                                   <div class="col-sm-6">
                                       <input type="file" name="userfile" class="form-control">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Date of Birth</label>
                                   <div class="col-sm-6">
                                       <input type="text" id="dropper-default" value="<?php echo $user['dob']; ?>"
                                           name="dob" class="form-control" placeholder="Select Your Birth Date">
                                   </div>
                               </div>

                               <input type="hidden" value="<?php echo $user['status']; ?>" name="status"
                                   class="js-single" />

                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label"></label>
                                   <div class="col-sm-10">
                                       <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                   </div>
                               </div>
                               <textarea id="description" style="visibility: hidden;"></textarea>
                               </form>
                           </div>
                       </div>
               </div>


           </div>
       </div>
       <!-- content-wrapper ends -->

   </div>
   <!-- main-panel ends -->
   </div>