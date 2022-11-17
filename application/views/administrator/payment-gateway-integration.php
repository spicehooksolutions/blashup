 <!-- jquery file upload Frame work -->
 <link href="<?php echo base_url(); ?>admintemplate/bower_components/jquery.filer/css/jquery.filer.css" type="text/css"
     rel="stylesheet" />
 <link
     href="<?php echo base_url(); ?>admintemplate/bower_components/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css"
     type="text/css" rel="stylesheet" />
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


 <div class="container-fluid page-body-wrapper">
     <div class="main-panel">
         <div class="content-wrapper">
             <div class="row">

                 <<div class="col-lg-12 grid-margin stretch-card">
                     <div class="card">
                         <div class="card-body">
                             <h4 class="card-title">Payment Gateway settings</h4>
                             <p class="card-description">

                             </p>


                             <?php echo form_open_multipart('administrator/payment_gateway_integration_update', array('id'=>'validation')); ?>
                            
                                     <input
                                         value="<?php echo (isset($paymentconfiguration['id'])?$paymentconfiguration['id']:'');?>"
                                         name="id" type="hidden">

                                     <div class="form-group row">
                                         <label class="col-sm-2 col-form-label">RAZORPAY KEY ID</label>
                                         <div class="col-sm-6">
                                             <input class="form-control" id="razorpay_key_id"
                                                 value="<?php echo (isset($paymentconfiguration['payment_gateway_key_id'])?$paymentconfiguration['payment_gateway_key_id']:'');?>"
                                                 name="razorpay_key_id" placeholder="RAZORPAY KEY ID" type="text">
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label class="col-sm-2 col-form-label">RAZORPAY KEY SECRET</label>
                                         <div class="col-sm-6">
                                             <input class="form-control" id="razorpay_key_secret"
                                                 value="<?php echo (isset($paymentconfiguration['payment_gateway_key_secret'])?$paymentconfiguration['payment_gateway_key_secret']:'');?>"
                                                 placeholder="RAZORPAY KEY SECRET" name="razorpay_key_secret"
                                                 type="text">
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label class="col-sm-2 col-form-label">RAZORPAY API PATH</label>
                                         <div class="col-sm-6">
                                             <input class="form-control" id="razorpay_api_path"
                                                 value="<?php echo (isset($paymentconfiguration['payment_gateway_api_path'])?$paymentconfiguration['payment_gateway_api_path']:'');?>"
                                                 placeholder="RAZORPAY API PATH" name="razorpay_api_path" type="text">
                                         </div>
                                     </div>

                                     <div class="form-group">
                                         <button type="button" onclick="submit_check()"
                                             class="btn btn-primary waves-effect waves-light">Submit
                                         </button>
                                     </div>

                                 
                     <?php echo form_close() ?>
             </div>
         </div>
     </div>


 </div>
 </div>
 <!-- content-wrapper ends -->

 </div>
 <!-- main-panel ends -->
 </div>

 <script>
function submit_check() {
    var razorpay_key_id = $("#razorpay_key_id").val();
    var razorpay_key_secret = $("#razorpay_key_secret").val();
    var razorpay_api_path = $("#razorpay_api_path").val();
    if (razorpay_key_id == '' || razorpay_key_secret == '' || razorpay_api_path == '') {

        swal({
            title: "Field empty!!",
            text: "Please check the missing field!!",
            icon: "warning",
            button: "OK"
        });

    } else {
        swal({
            title: "Success!",
            icon: "success",
            button: "OK"
        });

        $("#validation").submit();
    }
}
 </script>