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
                               <h4 class="card-title"><?php echo $title;?></h4>
                               <p class="card-description">

                               </p>
                               <?php echo form_open_multipart('administrator/add_user'); ?>

                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Name</label>
                                   <div class="col-sm-10">
                                       <input type="text" name="name" class="form-control" placeholder="Full Name">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">User-Name</label>
                                   <div class="col-sm-10">
                                       <input type="text" name="username" class="form-control" placeholder="User Name">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Email</label>
                                   <div class="col-sm-10">
                                       <input type="text" name="email" class="form-control" placeholder="Email">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Mobile No.</label>
                                   <div class="col-sm-10">
                                       <input type="text" name="contact" class="form-control" placeholder="Mobile No.">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Address</label>
                                   <div class="col-sm-10">
                                       <input type="text" name="address" class="form-control" placeholder="Address">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Zipcode</label>
                                   <div class="col-sm-10">
                                       <input type="text" name="zipcode" class="form-control" placeholder="Zipcode">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Gender</label>
                                   <div class="col-sm-10">
                                   <label>
                                       <input value="Female" name="gender" type="radio"><i class="mdi mdi-gender-female"></i> Female
                                   </label>
                                   &nbsp;
                                   <label>
                                       <input value="Male" name="gender" type="radio"><i class="mdi mdi-gender-male"></i> Male
                                   </label>
                                   </div>
                               </div>

                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">User Image</label>
                                   <div class="col-sm-6">
                                       <input type="file" name="userfile" class="form-control">
                                   </div>
                               </div>
                             
                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Want to make Enable?</label>
                                   <div class="col-sm-3">
                                       <input type="checkbox" value="1" name="status" class="js-single" checked />
                                   </div>
                               </div>

                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label"></label>
                                   <div class="col-sm-10">
                                       <button type="submit" name="submit" class="btn btn-primary">Add</button>
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