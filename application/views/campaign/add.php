<style>
/*  bhoechie tab */
div.bhoechie-tab-container {
    width: 95%;
    z-index: 10;
    background-color: #ffffff;
    padding: 15px 15px;
    border-radius: 4px;
    -moz-border-radius: 4px;
    border: 1px solid #ddd;
    margin: 20px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    -moz-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    background-clip: padding-box;
    opacity: 0.97;
    filter: alpha(opacity=97);
}

div.bhoechie-tab-menu {
    padding-right: 0;
    padding-left: 0;
    padding-bottom: 0;
}

div.bhoechie-tab-menu div.list-group {
    margin-bottom: 0;
}

div.bhoechie-tab-menu div.list-group>a {
    margin-bottom: 0;
}

div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
    color: #5A55A3;
}

div.bhoechie-tab-menu div.list-group>a:first-child {
    border-top-right-radius: 0;
    -moz-border-top-right-radius: 0;
}

div.bhoechie-tab-menu div.list-group>a:last-child {
    border-bottom-right-radius: 0;
    -moz-border-bottom-right-radius: 0;
}

div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa {
    background-color: #5A55A3;
    background-image: #5A55A3;
    color: #ffffff;
}

div.bhoechie-tab-menu div.list-group>a.active:after {
    content: '';
    position: absolute;
    left: 100%;
    top: 50%;
    margin-top: -13px;
    border-left: 0;
    border-bottom: 13px solid transparent;
    border-top: 13px solid transparent;
    border-left: 10px solid #5A55A3;
}

div.bhoechie-tab-content {
    background-color: #ffffff;
    /* border: 1px solid #eeeeee; */
    padding-left: 20px;
    padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active) {
    display: none;
}
</style>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card bhoechie-tab-container">
                    <div class="col-lg-3 col-md-3 col-sm-3 bhoechie-tab-menu">
                        <div class="list-group">
                            <a href="javascript:;" class="list-group-item active text-center step_menu1">
                                <h4 class="">1. Campaign</h4>
                            </a>
                            <a href="javascript:;" class="list-group-item  text-center step_menu2">
                                <h4 class="">2. Add Settings</h4>
                            </a>
                            <a href="javascript:;" class="list-group-item  text-center step_menu3">
                                <h4 class="">3. Payment</h4>
                            </a>
                            <a href="javascript:;" class="list-group-item  text-center step_menu4">
                                <h4 class="">4. Review & Submit</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                        <!-- flight section -->
                        <div class="bhoechie-tab-content active step1">


                            <?php echo form_open_multipart('campaign/step/1',array('class'=>'pt-3','id'=>'campaign_step1')); ?>

                            <input type="hidden" name="step1_id" id="step1_id" value="<?php echo (isset($campaign['id'])? $campaign['id']:"");?>" />
                            <div class="form-group">
                                <label>Campaign Title</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg border-left-0"
                                        name="campaign_title" placeholder="Campaign Title" id="campaign_title" value="<?php echo (isset($campaign['campaign_title'])? $campaign['campaign_title']:"");?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Campaign Description</label>
                                <div class="input-group">
                                    <textarea class="form-control form-control-lg border-left-0"
                                        placeholder="Campaign Description" name="campaign_description"
                                        id="campaign_description"><?php echo (isset($campaign['campaign_description'])? $campaign['campaign_description']:"");?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Media Type</label>
                                <div class="input-group">
                                    <select class="form-control form-control-lg border-left-0"
                                        name="campaign_media_type" id="campaign_media_type">
                                        <option value="">-- select --</option>
                                        <option value="image" <?php echo ((isset($campaign['campaign_media_type']) && $campaign['campaign_media_type']=='image')? "selected":"");?>>Image</option>
                                        <option value="video" <?php echo ((isset($campaign['campaign_media_type']) && $campaign['campaign_media_type']=='video')? "selected":"");?>>Video</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Product Link</label>
                                <div class="input-group">
                                    <input type="url" class="form-control form-control-lg border-left-0"
                                        placeholder="URL" name="link_of_product" id="link_of_product" value="<?php echo (isset($campaign['link_of_product'])? $campaign['link_of_product']:"");?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Ad Type</label>
                                <div class="input-group">
                                    <select class="form-control form-control-lg border-left-0" name="ad_type"
                                        id="ad_type">
                                        <option value="in_between_video" <?php echo ((isset($campaign['ad_type']) && $campaign['ad_type']=='in_between_video')? "selected":"");?>>In Between Video</option>
                                        <option value="full_screen_video" <?php echo ((isset($campaign['ad_type']) && $campaign['ad_type']=='full_screen_video')? "selected":"");?>>Full Screen Video</option>
                                    </select>
                                </div>
                            </div>


                            <div class="mt-3">
                                <button type="button"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Next</button>
                            </div>
                            <?php echo form_close() ?>

                            <script>
                                jQuery('#campaign_media_type').on('change',function(){
                                    if(jQuery(this).val()=='video')
                                    jQuery('#video_or_image').html('Video');
                                    else
                                    jQuery('#video_or_image').html('Image');
                                });
                            </script>

                        </div>
                        <!-- train section -->
                        <div class="bhoechie-tab-content ">


                            <?php echo form_open_multipart('campaign/step/2',array('class'=>'pt-3','id'=>'campaign_step2','name'=>'campaign_step2')); ?>
                            <input type="hidden" name="step2_id" id="step2_id" value="<?php echo (isset($campaign['id'])? $campaign['id']:"");?>" />
                            <div class="form-group">
                                <label>Banner ads bewteeen Discover</label>
                                <div class="input-group">
                                    <input type="file" class="form-control form-control-lg border-left-0"
                                        name="banner_add" placeholder="select file" id="banner_add">
                                </div>
                            </div>
                            <div class="form-group">
                                <label id="video_or_image"></label>
                                <div class="input-group">
                                    <input type="file" class="form-control form-control-lg border-left-0"
                                        name="video_or_image_file" placeholder="select file" id="video_or_image_file">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Adv. duration</label>
                                <div class="input-group">
                                    <select class="form-control form-control-lg border-left-0" name="campaign_pack"
                                        id="campaign_pack">
                                        <option value="7" <?php echo ((isset($campaign['campaign_pack']) && $campaign['campaign_pack']=='7')? "selected":"");?> >1 Week</option>
                                        <option value="30" <?php echo ((isset($campaign['campaign_pack']) && $campaign['campaign_pack']=='30')? "selected":"");?> >1 Month</option>
                                        <option value="90" <?php echo ((isset($campaign['campaign_pack']) && $campaign['campaign_pack']=='90')? "selected":"");?> >3 Months</option>
                                        <option value="365" <?php echo ((isset($campaign['campaign_pack']) && $campaign['campaign_pack']=='365')? "selected":"");?>>1 Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Budget/Day ( minimum Rs.50)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control form-control-lg border-left-0"
                                        placeholder="" name="budget_per_day" id="budget_per_day" min="50" value="<?php echo (isset($campaign['budget_per_day'])? $campaign['budget_per_day']:"");?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="campaign_charges"><?php echo (isset($campaign['budget_per_day'])? 'Rs. '.($campaign['budget_per_day']*$campaign['campaign_pack']):"");?></label>
                                
                            </div>



                            <div class="mt-3">
                                <button type="button"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Next</button>
                            </div>
                            <?php echo form_close() ?>

                            <script>
                                jQuery(document).ready(function(){
                                    jQuery('#budget_per_day').on('keyup',function(){
                                        jQuery('.campaign_charges').html('Rs. '+(parseInt(jQuery('#campaign_pack').val()) * parseInt(jQuery('#budget_per_day').val())));
                                    });
                                });
                            </script>

                        </div>

                        <div class="bhoechie-tab-content ">


                            <?php echo form_open_multipart('campaign/step/3',array('class'=>'pt-3','id'=>'campaign_step3','name'=>'campaign_step3')); ?>
                            <input type="hidden" name="step3_id" id="step3_id" value="<?php echo (isset($campaign['id'])? $campaign['id']:"");?>" />
                            <input type="hidden" name="step3_trans_id" id="step3_trans_id" value="<?php echo (isset($transaction['id'])? $transaction['id']:"");?>" />
                            <div class="form-group">
                                <label>Wallet balance</label>
                                <div class="input-group">
                                   <span id="current_wallet_balance" class="btn btn-outline-danger btn-fw">...</span>
                                </div>
                            </div>                          
                            
                                <?php
                                $style="style='display:none;'";
                                $addbalance=0;
                                $requiredfund=false;
                                    if(isset($campaign['budget_per_day']))
                                    {
                                        if($wallaetbalance>=($campaign['budget_per_day']*$campaign['campaign_pack']))
                                        {
                                            $style="style='display:none;'";
                                            $requiredfund=true;
                                        }
                                        else
                                        {
                                            $style="style='display:block;'";
                                            $addbalance=(($campaign['budget_per_day']*$campaign['campaign_pack'])-$wallaetbalance);
                                            $requiredfund=false;
                                        }
                                    }
                                ?>
                            <div class="form-group" id="requied_payment" <?php echo $style;?>>
                                <label>Add balance</label>
                                <div class="input-group">
                                    <input type="number" class="form-control form-control-lg border-left-0"
                                        name="add_balance" id="add_balance" value="<?php echo $addbalance;?>" readonly>
                                      
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Total budget of the Campiagn</label>
                                <div class="input-group">
                                    <input type="number" class="form-control form-control-lg border-left-0"
                                        name="total_campaign_value" id="total_campaign_value" value="<?php echo (isset($campaign['budget_per_day'])? ($campaign['budget_per_day']*$campaign['campaign_pack']):"");?>" readonly>
                                </div>
                            </div>


                            <div class="mt-3">

                            <button id="rzp-button1" class="btn btn-primary mb-2" <?php echo $style;?>><i class="mdi mdi-cart-plus"></i> Add balance</button>
                                   
                                <button type="button"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn stpe3_button"  <?php if($requiredfund==false){ echo 'style="display:none;"';}?>>Next</button>
                                    
                            </div>
                            <?php echo form_close() ?>
                        </div>


                        <!-- preview -->

                        <div class="bhoechie-tab-content ">
                            <div id="preview">

                                    <div class="smartphone">
                                        <div class="content">
                                       
                                        </div>
                                    </div>
                            </div>

                            <?php echo form_open_multipart('campaign/step/4',array('class'=>'pt-3','id'=>'campaign_step4','name'=>'campaign_step4')); ?>
                            <input type="hidden" name="step4_id" id="step4_id" value="<?php echo (isset($campaign['id'])? $campaign['id']:"");?>" />

                            <div class="form-group">
                              
                                <div class="input-group">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn stpe4_button">Submit for review</button>
                                </div>
                            </div>

                            <?php echo form_close() ?>


                        </div>

                    </div>



                </div>
            </div>
            <!-- content-wrapper ends -->

        </div>
        <!-- main-panel ends -->
    </div>
</div>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                <?php
                                $query = $this->db->get_where('site_config', array('id' => 1));
                                $sitconfig=$query->row_array();
                                
                                $queryPayment = $this->db->get_where('paymentgateways', array('gatewaytag' => 'razorpay'));
                                $Paymentconfig=$queryPayment->row_array();
                                
                                ?>
                                <script>                                                               
                                document.getElementById('rzp-button1').onclick = function(e) {
                                    e.preventDefault();

                                    if(jQuery('#add_balance').val()!='')
                                    {
                                        $.ajax({
                                        url: '<?php echo base_url('campaign/transactioninitiate'); ?>',
                                        type: 'post',
                                        dataType: 'json',
                                        data:{amount:jQuery('#add_balance').val()},
                                        cache: false,
                                        success: function(data) {
                                        if(data!=0)
                                        {
                                            jQuery('#keys').val(data);
                                            var options = {
                                                "key": "<?php echo $Paymentconfig['payment_gateway_key_id'];?>", // Enter the Key ID generated from the Dashboard
                                                "amount": parseInt(jQuery('#add_balance').val()*100),
                                                "currency": "INR",
                                                "description": "<?php echo $sitconfig['site_name'];?>",
                                                "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
                                                "prefill": {
                                                    "email": "<?php echo $this->session->userdata('email'); ?>",

                                                },
                                                "handler": function(response) {
                                                

                                                    $.ajax({
                                                        url: '<?php echo base_url('campaign/transactioncomplete'); ?>',
                                                        type: 'post',
                                                        dataType: 'json',
                                                        data:{keys:jQuery('#keys').val(),responsetext:response},
                                                        cache: false,
                                                        success: function(data) {
                                                        if(data!=0)
                                                        {
                                                            swal('Wow!','Funds successfuly added to your wallet','success');
                                                                jQuery('.stpe3_button').show();
                                                                jQuery('#rzp-button1').hide();
                                                                $.ajax({
                                                                url: '<?php echo base_url('users/wallet'); ?>',
                                                                type: 'post',
                                                                dataType: 'json',
                                                                cache: false,
                                                                success: function(data) {
                                                                    //var result = JSON.parse(data);
                                                                    jQuery('#current_wallet_balance').html('Rs. '+data);
                                                                }
                                                            });
                                                        }
                                                        else
                                                        {
                                                            swal('Opps!','Something went wrong, please try again','error');
                                                            location.href=location.href;
                                                        }
                                                        }
                                                        });

                                                               
                                                              
                                                },
                                                theme: {
                                                    color: '#464dee'
                                                },
                                                "modal": {
                                                        "ondismiss": function () {
                                                            $.ajax({
                                                            url: '<?php echo base_url('campaign/transactioncomplete'); ?>',
                                                            type: 'post',
                                                            dataType: 'json',
                                                            data:{keys:jQuery('#keys').val(),responsetext:"",failed:1},
                                                            cache: false,
                                                            success: function(data) {      

                                                                jQuery('.stpe3_button').hide();
                                                                jQuery('#rzp-button1').show();
                                                            }
                                                            });
                                                        }
                                                    }
                                            };
                                                var rzp1 = new Razorpay(options);
                                                rzp1.open();
                                               
                                        }
                                        else
                                        {
                                            swal('Opps!','Something went wrong, please try again','error');
                                            jQuery('.stpe3_button').hide();
                                            jQuery('#rzp-button1').show();  
                                        }
                                        }
                                        });
                                    }
                                    else
                                    {
                                        swal('Opps!','Something went wrong please try again','error'); 
                                        
                                         jQuery('.stpe3_button').hide();
                                         jQuery('#rzp-button1').show();                                       
                                        return false;
                                    }


                                    
                                }
                                </script>

                                <input type="hidden" id="keys" />

<script>
$(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});


jQuery(document).ready(function(e) {

      <?php if(isset($steps) && $steps==3) { ?>
                jQuery('.step_menu3').click();
                $.ajax({
                            url: '<?php echo base_url('users/wallet'); ?>',
                            type: 'post',
                            dataType: 'json',
                            cache: false,
                            success: function(data) {
                                //var result = JSON.parse(data);
                                jQuery('#current_wallet_balance').html('Rs. '+data);
                            }
                        });
     <?php } ?>
        
    jQuery('.bhoechie-tab-menu .step_menu3').on('click',function(){
                    $.ajax({
                            url: '<?php echo base_url('users/wallet'); ?>',
                            type: 'post',
                            dataType: 'json',
                            cache: false,
                            success: function(data) {
                                //var result = JSON.parse(data);
                                jQuery('#current_wallet_balance').html('Rs. '+data);
                            }
                        });
    });

    jQuery('.bhoechie-tab-menu .step_menu4').on('click',function(){
            if(jQuery('#campaign_step3 #step3_id').val()>0)
            {

            }
            else
            {
                jQuery('.bhoechie-tab-menu .step_menu3').click();
                swal('Opps!', 'Please fill advertisement data first', 'error');
                return false;
            }

    });

    jQuery('#campaign_step1 .btn-primary').on('click', function() {
        if (jQuery('#campaign_title').val() == '') {
            swal("Opps!", "Missing campiagn title!", "error");
            jQuery('#campaign_title').focus();
            return false;
        }
        if (jQuery('#link_of_product').val() == '') {
            swal("Opps!", "Missing product link!", "error");
            jQuery('#link_of_product').focus();
            return false;
        } else {
            $.ajax({
                url: '<?php echo base_url('campaign/step/1'); ?>',
                type: 'post',
                dataType: 'json',
                data: jQuery('#campaign_step1').serialize(),
                cache: false,
                success: function(data) {
                    //var result = JSON.parse(data);
                    console.log(data);
                    if (parseInt(data) > 0) {
                        jQuery('#campaign_step1 #step1_id').val(data);
                        jQuery('#campaign_step2 #step2_id').val(data);
                        jQuery('.bhoechie-tab-menu .step_menu2').click();
                    } else {
                        swal("Opps!", "Something went wrong, please try again", "error");
                        jQuery('#campaign_step1')[0].reset();
                        jQuery('.bhoechie-tab-menu .step_menu1').click();
                    }
                }
            });


        }
    });

    jQuery('#campaign_step2 .btn-primary').on('click', function(e) {
       
        if (jQuery('#campaign_step1 #step1_id').val() == '' || jQuery('#campaign_step1 #step1_id')
            .val() == 0) {
            swal("Opps!", "Something went wrong, please try again", "error");
            jQuery('#campaign_step1')[0].reset();
            jQuery('#campaign_step2')[0].reset();
            jQuery('.bhoechie-tab-menu .step_menu1').click();
        }

        <?php if(isset($campaign['banner_add']) && $campaign['banner_add']!='') { ?>

        if (jQuery('#banner_add').val() == '') {
            swal("Opps!", "Missing campiagn banner ad!", "error");
            jQuery('#banner_add').focus();
            return false;
        }
        <?php } ?>
        <?php if(isset($campaign['video_or_image_file']) && $campaign['video_or_image_file']!='') { ?>
        if (jQuery('#video_or_image_file').val() == '') {
            swal("Opps!", "Missing campiagn video or image file!", "error");
            jQuery('#video_or_image_file').focus();
            return false;
        }
        <?php } ?>
        if (jQuery('#budget_per_day').val() == '') {
            swal("Opps!", "Missing budget!", "error");
            jQuery('#budget_per_day').focus();
            return false;
        } else {
            
            $('#campaign_step2')[0].submit();            

        }
    });


    jQuery('#campaign_step3 .stpe3_button').on('click', function(e) {
     
        if(jQuery('#total_campaign_value').val()<=0)
        {
            swal("Opps!", "Something went wrong!", "error");
            return false;
        }
        else
        {
            $.ajax({
                url: '<?php echo base_url('campaign/step/3'); ?>',
                type: 'post',
                dataType: 'json',
                data: jQuery('#campaign_step3').serialize(),
                cache: false,
                success: function(data) {
                   
                    if (parseInt(data) > 0) {
                        jQuery('#step3_trans_id').val(data);
                        jQuery('.bhoechie-tab-menu .step_menu4').click();

                        $.ajax({
                            url: '<?php echo base_url('campaign/preview/'); ?>'+data,
                            type: 'post',
                            dataType: 'json',
                            cache: false,
                            success: function(data) {
                                var response=JSON.parse(data);
                               jQuery('#preview').html(response.html);
                            }
                        });

                    } else {
                        swal("Opps!", "Something went wrong, please try again", "error");                        
                        jQuery('.bhoechie-tab-menu .step_menu3').click();
                    }
                }
            });
        }   
    });


    jQuery('.stpe4_button').click(function(e){
        e.preventDefault();
        $.ajax({
                url: '<?php echo base_url('campaign/step/4'); ?>',
                type: 'post',
                dataType: 'json',
                data: jQuery('#campaign_step4').serialize(),
                cache: false,
                success: function(data) {
                    //var result = JSON.parse(data);
                    console.log(data);
                    if (parseInt(data) > 0) {
                        swal("Wow! your campiagn has been submitted successfuly for approval", {
                                buttons: {                                    
                                    catch: {
                                    text: "Thanks",
                                    value: "catch",
                                    }
                                },
                                })
                                .then((value) => {
                                switch (value) {
                                
                                    case "catch":
                                    location.href="<?php echo base_url(); ?>campaign/manage";
                                    break;
                                
                                   
                                }
                                });
                    } else {
                        swal("Opps!", "Something went wrong, please try again", "error");
                       return false;
                    }
                }
            });
    });

});
</script>
<style>
    /* The device with borders */
.smartphone {
  position: relative;
  width: 360px;
  height: 640px;
  margin: auto;
  border: 16px black solid;
  border-top-width: 60px;
  border-bottom-width: 60px;
  border-radius: 36px;
}

/* The horizontal line on the top of the device */
.smartphone:before {
  content: '';
  display: block;
  width: 60px;
  height: 5px;
  position: absolute;
  top: -30px;
  left: 50%;
  transform: translate(-50%, -50%);
  background: #333;
  border-radius: 10px;
}

/* The circle on the bottom of the device */
.smartphone:after {
  content: '';
  display: block;
  width: 35px;
  height: 35px;
  position: absolute;
  left: 50%;
  bottom: -65px;
  transform: translate(-50%, -50%);
  background: #333;
  border-radius: 50%;
}

/* The screen (or content) of the device */
.smartphone .content {
  width: 335px;
  height: 535px;
  background: white;
}
</style>