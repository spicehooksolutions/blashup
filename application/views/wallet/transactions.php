<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add funds to Wallet</h4>
                            <p class="card-description">
                                Your wallet balance : Rs. <mark id="current_balance"
                                    class="bg-danger text-white"></mark>
                            </p>
                            <form class="form-inline">
                                <label class="sr-only" for="funds">Amount ( in Rs., min Rs. 10 ) </label>
                                <input type="number" min="1" class="form-control mb-2 mr-sm-2" id="funds" name="funds"
                                    placeholder="e.g. 100">

                                <button type="button" class="btn btn-primary mb-2" id="add_fund_mask">Add fund</button>

                               
                                <button id="rzp-button1" class="btn btn-primary mb-2" style="display:none;"><i class="mdi mdi-cart-plus"></i> Pay now</button>
                                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                <?php
                                $query = $this->db->get_where('site_config', array('id' => 1));
                                $sitconfig=$query->row_array();
                                
                                $queryPayment = $this->db->get_where('paymentgateways', array('gatewaytag' => 'razorpay'));
                                $Paymentconfig=$queryPayment->row_array();
                                
                                ?>
                                <script>
                                var options = {
                                    "key": "<?php echo $Paymentconfig['payment_gateway_key_id'];?>", // Enter the Key ID generated from the Dashboard
                                    "amount": parseInt(jQuery('#funds').val()*100),
                                    "currency": "INR",
                                    "description": "<?php echo $sitconfig['site_name'];?>",
                                    "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
                                    "prefill": {
                                        "email": "<?php echo $this->session->userdata('email'); ?>",

                                    },
                                    "handler": function(response) {
                                        alert(response.razorpay_payment_id);
                                        $.ajax({
                                            url: '<?php echo base_url('wallet/transactioncomplete'); ?>',
                                            type: 'post',
                                            dataType: 'json',
                                            data:{keys:jQuery('#keys').val(),response:response},
                                            cache: false,
                                            success: function(data) {
                                            if(data!=0)
                                            {
                                                swal('Wow!','Funds successfuly added to your wallet','success');
                                                location.href=location.href;
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
                                        color: '#00FFFF'
                                    }
                                };
                               
                                document.getElementById('rzp-button1').onclick = function(e) {
                                    var rzp1 = new Razorpay(options);
                                    rzp1.open();
                                    e.preventDefault();
                                }
                                </script>

                                <input type="hidden" id="keys" />
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Your wallet transactions</h4>
                            <p class="card-description">
                                <!-- Add class <code>.table-striped</code> -->
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Amount</th>
                                            <th>Payment/Order Id</th>
                                            <th>Transaction date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; 
                                        if($wallettransactions)
                                        {
                                        foreach($wallettransactions as $post) :?>

                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td>
                                                Rs. <?php echo $post['payment_amount']; ?>
                                            </td>

                                            <td><?php echo (($post['payment_response_time']!=NULL)?$post['payment_response_time']:$post['payment_initiate_date']); ?>
                                            </td>
                                            <td>

                                                <?php echo statusconversion($post['payment_status']); ?>
                                            </td>

                                        </tr>
                                        <?php 
                                        
                                        endforeach; 
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- content-wrapper ends -->

    </div>
    <!-- main-panel ends -->
</div>


<?php 
//'initiated','failed','succeful','canceled'
    function statusconversion($status)
    {
        $returnval="";
        switch($status)
        {
            case 'succeful':
                $returnval="<a href='javascript:;' class='btn btn-success'>Success</a>";
                break;
            case 'failed':
                $returnval="<a href='javascript:;' class='btn btn-inverse'>Failed</a>";
                break;
            case 'initiated':
                $returnval="<a href='javascript:;' class='btn btn-info'>Not completed</a>";
                break;
            case 'canceled':
                $returnval="<a href='javascript:;' class='btn btn-danger'>Failed</a>";
                break;
            
        }

        return $returnval;
    }
?>
<script>
jQuery(document).ready(function() {

    $.ajax({
        url: '<?php echo base_url('users/wallet'); ?>',
        type: 'post',
        dataType: 'json',
        cache: false,
        success: function(data) {
            jQuery('#current_balance').html(data);
        }
    });


    jQuery('#add_fund_mask').on('click',function(){

        if(jQuery('#funds').val()!='')
        {
            $.ajax({
            url: '<?php echo base_url('wallet/transactioninitiate'); ?>',
            type: 'post',
            dataType: 'json',
            data:{amount:jQuery('#funds').val()},
            cache: false,
            success: function(data) {
            if(data!=0)
            {
                jQuery('#keys').val(data);
                jQuery('#add_fund_mask').hide();
                jQuery('#rzp-button1').show();
                jQuery('#rzp-button1').click();
            }
            else
            {
                swal('Opps!','Something went wrong, please try again','error');
                location.href=location.href;
            }
            }
            });
        }
        else
        {
            swal('Opps!','Enter amount first','error');
            jQuery('#funds').focus();
            return false;
        }
    });

});
</script>