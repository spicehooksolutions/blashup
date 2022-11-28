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

                            <input type="hidden" name="step1_id" id="step1_id" value="" />
                            <div class="form-group">
                                <label>Campaign Title</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg border-left-0"
                                        name="campaign_title" placeholder="Campaign Title" id="campaign_title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Campaign Description</label>
                                <div class="input-group">
                                    <textarea class="form-control form-control-lg border-left-0"
                                        placeholder="Campaign Description" name="campaign_description"
                                        id="campaign_description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Media Type</label>
                                <div class="input-group">
                                    <select class="form-control form-control-lg border-left-0"
                                        name="campaign_media_type" id="campaign_media_type">
                                        <option value="">-- select --</option>
                                        <option value="image">Image</option>
                                        <option value="video">Video</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Product Link</label>
                                <div class="input-group">
                                    <input type="url" class="form-control form-control-lg border-left-0"
                                        placeholder="URL" name="link_of_product" id="link_of_product">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Ad Type</label>
                                <div class="input-group">
                                    <select class="form-control form-control-lg border-left-0" name="ad_type"
                                        id="ad_type">
                                        <option value="in_between_video">In Between Video</option>
                                        <option value="full_screen_video">Full Screen Video</option>
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
                                    if(jQuery(this).val()=='in_between_video')
                                    jQuery('#video_or_image').html('Video');
                                    else
                                    jQuery('#video_or_image').html('Image');
                                });
                            </script>

                        </div>
                        <!-- train section -->
                        <div class="bhoechie-tab-content ">


                            <?php echo form_open_multipart('campaign/step/2',array('class'=>'pt-3','id'=>'campaign_step2','name'=>'campaign_step2')); ?>
                            <input type="hidden" name="step2_id" id="step2_id" value="" />
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
                                        <option value="7">1 Week</option>
                                        <option value="30">1 Month</option>
                                        <option value="90">3 Months</option>
                                        <option value="365">1 Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Budget/Day ( minimum Rs.50)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control form-control-lg border-left-0"
                                        placeholder="" name="budget_per_day" id="budget_per_day" min="50">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="campaign_charges"></label>
                                
                            </div>



                            <div class="mt-3">
                                <button type="button"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Save</button>
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
                            <input type="hidden" name="step3_id" id="step3_id" value="" />
                            <div class="form-group">
                                <label>Wallet balance</label>
                                <div class="input-group">
                                   <span id="current_wallet_balance" class="btn btn-outline-danger btn-fw">...</span>
                                </div>
                            </div>                          
                            

                            <div class="form-group" id="requied_payment" style="display:none;">
                                <label>Add balance</label>
                                <div class="input-group">
                                    <input type="number" class="form-control form-control-lg border-left-0"
                                        name="add_balance" id="add_balance" value="" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Total budget of the Campiagn</label>
                                <div class="input-group">
                                    <input type="number" class="form-control form-control-lg border-left-0"
                                        name="total_campaign_value" id="total_campaign_value" value="" readonly>
                                </div>
                            </div>


                            <div class="mt-3">
                                <button type="button"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" disabled>Next</button>
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


jQuery(document).ready(function() {

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

    jQuery('#campaign_step2 .btn-primary').on('click', function() {

        if (jQuery('#campaign_step1 #step1_id').val() == '' || jQuery('#campaign_step1 #step1_id')
            .val() == 0) {
            swal("Opps!", "Something went wrong, please try again", "error");
            jQuery('#campaign_step1')[0].reset();
            jQuery('#campaign_step2')[0].reset();
            jQuery('.bhoechie-tab-menu .step_menu1').click();
        }
        if (jQuery('#banner_add').val() == '') {
            swal("Opps!", "Missing campiagn banner ad!", "error");
            jQuery('#banner_add').focus();
            return false;
        }
        if (jQuery('#video_or_image_file').val() == '') {
            swal("Opps!", "Missing campiagn video or image file!", "error");
            jQuery('#video_or_image_file').focus();
            return false;
        }
        if (jQuery('#budget_per_day').val() == '') {
            swal("Opps!", "Missing budget!", "error");
            jQuery('#budget_per_day').focus();
            return false;
        } else {
            
            var fd = new FormData($('#campaign_step2')[0]);    
            fd.append( 'banner_add_file',  $('#banner_add')[0].files[0]);
            fd.append( 'video_or_image_file_file', $('#video_or_image_file')[0].files[0]);

            
            $.ajax({
                url: '<?php echo base_url('campaign/step/2'); ?>',
                type: 'post',
                dataType: 'json',
                data: fd,
                cache: false,
                success: function(data) {
                    //var result = JSON.parse(data);
                    console.log(data);
                    if (parseInt(data) > 0) {
                        jQuery('.bhoechie-tab-menu .step_menu3').click();
                        jQuery('#campaign_step3 #step3_id').val(data);
                        //current_wallet_balance
                        $.ajax({
                            url: '<?php echo base_url('users/wallet'); ?>',
                            type: 'post',
                            dataType: 'json',
                            cache: false,
                            success: function(data) {
                                //var result = JSON.parse(data);
                                jQuery('#curdatarent_wallet_balance').html('Rs. '+data);

                                if(data<(parseInt(jQuery('#campaign_pack').val()) * parseInt(jQuery('#budget_per_day').val())))
                                {
                                    jQuery('#requied_payment').show();
                                    jQuery('#add_balance').val((parseInt(jQuery('#campaign_pack').val()) * parseInt(jQuery('#budget_per_day').val()))-data);


                                }
                            }
                        });

                    } else {
                        swal("Opps!", "Something went wrong, please try again", "error");
                        jQuery('#campaign_step2')[0].reset();
                        jQuery('.bhoechie-tab-menu .step_menu2').click();
                    }
                }
            });

        }
    });

});
</script>