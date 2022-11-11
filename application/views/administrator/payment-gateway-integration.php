 <!-- jquery file upload Frame work -->
 <link href="<?php echo base_url(); ?>admintemplate/bower_components/jquery.filer/css/jquery.filer.css" type="text/css"
     rel="stylesheet" />
 <link
     href="<?php echo base_url(); ?>admintemplate/bower_components/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css"
     type="text/css" rel="stylesheet" />



 <div class="page-header">
     <div class="page-header-title">
         <h4>Payment Gateway Settings</h4>
     </div>
     <div class="page-header-breadcrumb">
         <ul class="breadcrumb-title">
             <li class="breadcrumb-item">
                 <a href="index-2.html">
                     <i class="icofont icofont-home"></i>
                 </a>
             </li>
             <li class="breadcrumb-item"><a href="#!"><?php echo $title; ?></a>
             </li>
         </ul>
     </div>
 </div>
 <!-- Page header end -->
 <!-- Page body start -->
 <div class="page-body">
     <div class="row">
       
         <div class="col-sm-12">
         <form method="post" action="">

             <div class="tab-content">
                 <div class="tab-pane active" id="">

                     <div class="form-group row">
                         <label class="col-sm-2 col-form-label">RAZORPAY KEY ID</label>
                         <div class="col-sm-6">
                             <input class="form-control" value="" name="razorpay_key_id" placeholder="RAZORPAY KEY ID"
                                 type="text">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="col-sm-2 col-form-label">RAZORPAY KEY SECRET</label>
                         <div class="col-sm-6">
                             <input class="form-control" value="" placeholder="RAZORPAY KEY SECRET" name="razorpay_key_secret"
                                 type="text">
                         </div>
                     </div>

                     <div class="form-group">
                         <button type="submit" class="btn btn-primary waves-effect waves-light">Submit
                         </button>
                     </div>

                 </div>
             </div>

         </div>
     </div>
     </form>
 </div>
 </div>
 </div>
 </div>


 </div>