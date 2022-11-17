 <!-- jquery file upload Frame work -->
 <link href="<?php echo base_url(); ?>admintemplate/bower_components/jquery.filer/css/jquery.filer.css" type="text/css"
     rel="stylesheet" />
 <link
     href="<?php echo base_url(); ?>admintemplate/bower_components/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css"
     type="text/css" rel="stylesheet" />



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


                             <?php echo form_open_multipart('administrator/update_siteconfiguration_data'); ?>
                             <input class="form-control" value="<?php echo $siteconfiguration['id']; ?>" name="id"
                                 type="hidden">


                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Site Name</label>
                                 <div class="col-sm-9">
                                     <input class="form-control" value="<?php echo $siteconfiguration['site_name']; ?>"
                                         name="site_name" placeholder="Site Name" type="text">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Site Title</label>
                                 <div class="col-sm-9">
                                     <input class="form-control" value="<?php echo $siteconfiguration['site_title']; ?>"
                                         placeholder="Site Title" name="site_title" type="text">
                                 </div>
                             </div>

                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Current Logo</label>
                                 <div class="col-sm-9">
                                     <img src="<?php echo base_url(); ?>assets/images/<?php echo $siteconfiguration['logo_img']; ?>"
                                         width="100px">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">New logo</label>
                                 <div class="col-sm-9">
                                     <input type="file" name="userfile" class="form-control">
                                 </div>
                             </div>



                             <div class="form-group">
                                 <button type="submit" class="btn btn-primary waves-effect waves-light">Submit
                                 </button>
                             </div>



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