<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Manage your campaign</h4>
                            <p class="card-description">
                                <!-- Add class <code>.table-striped</code> -->
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Campaign Id</th>
                                            <th>Campaign Title</th>
                                            <th>Ad Type</th>
                                            <th>Budget Per Day</th>
                                            <th>Campaign Start Date</th>
                                            <th>Campaign End Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($campaign_listing as $post) :?>

                                        <tr>
                                            <td><?php echo $post['id']; ?></td>
                                            <td>
                                                <?php echo $post['campaign_title']; ?>
                                            </td>
                                            <td><?php echo (($post['ad_type']=='full_screen_video')? 'Full screen Video':'In Between Video'); ?>
                                            </td>
                                            <td><?php echo $post['budget_per_day']; ?></td>
                                            
                                            <td><?php echo (($post['campaign_start_date']!='' && $post['campaign_start_date'] !=NULL)?date('F j, Y h:i a',strtotime($post['campaign_start_date'])):""); ?></td>
                                            <td><?php echo (($post['campaign_end_date']!='' && $post['campaign_end_date'] !=NULL)?date('F j, Y h:i a',strtotime($post['campaign_end_date'])):""); ?></td>
                                            <td>

                                                <span id="status_<?php echo $post['id']; ?>"><?php echo statusconversion($post['campaign_status']); ?></span>
                                            </td>
                                            <td>
                                                <span><a href="javascript:;"><button
                                                            class="btn btn-primary waves-effect waves-light" id="btn_id" onclick="javascript: jQuery('#campaigndetails_<?php echo $post['id']; ?>').modal('show');">View</button></a></span>
                                                
                                                <?php if($post['campaign_status']=='Pending') { ?>             
                                               <span><a href="javascript:;"><button
                                                            class="btn btn-success waves-effect waves-light" id="btn_id" onclick="javascript: updatestatus(<?php echo $post['id']; ?>,'Approve');">Approve</button></a></span>
                                                <?php } ?>             

                                                <?php if($post['campaign_status']=='Approved') { ?>             
                                               <span><a href="javascript:;"><button
                                                            class="btn btn-danger waves-effect waves-light" id="btn_id" onclick="javascript: updatestatus(<?php echo $post['id']; ?>,'Suspend');">Suspend</button></a></span>
                                                <?php } ?>

                                                <?php if($post['campaign_status']=='Approved') { ?>             
                                               <span><a href="javascript:;"><button
                                                            class="btn btn-warning waves-effect waves-light" id="btn_id" onclick="javascript: updatestatus(<?php echo $post['id']; ?>,'Pause');">Pause</button></a></span>
                                                <?php } ?>


                                            </td>
                                        </tr>
                                        <?php endforeach; ?>


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

<?php foreach($campaign_listing as $post) :?>
<!--Modal-->
<div class="modal fade" id="campaigndetails_<?php echo $post['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="campaigndetails_<?php echo $post['id']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Campaign Detail</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <p><strong>Campaign Title :</strong> <?php echo $post['campaign_title']; ?></p>
                    <p><strong>Campaign Description :</strong> <?php echo $post['campaign_description']; ?></p>
                    <?php if($post['ad_type']=="full_screen_video"){?>
                    <p><strong>Ad Type :</strong> <?php echo "Full Screen Video"; ?></p> <?php }
                    else{ ?>
                        <p><strong>Ad Type :</strong> <?php echo "In Between Video"; ?></p>
                <?php    }?>
                        <?php if($post['campaign_media_type']=="image"){ ?>
                    <p><strong>Media :</strong> <br> <img src="<?php echo base_url('assets/images/campaigns/').$post['video_or_image_file']; ?>"  width="300" height="200"> </p>
                    <?php }
                    else{?>
                        <p><strong>Media :</strong>  <br><video  width="300" height="200" controls> <source src="<?php echo base_url('assets/images/campaigns/').$post['video_or_image_file']; ?>" type="video/MP4"> </video> </p><?php
                    }?>
                    <p><strong>Product URL : </strong> <?php echo $post['link_of_product']; ?></p>
                    <!-- <p><strong>Banner Image :</strong> <?php echo $post['video_or_image_file']; ?></p> -->
                    <p><strong>Campaign Start Date :</strong> <?php echo date('F j, Y h:i a',strtotime($post['campaign_start_date'])); ?></p>
                    <p><strong>Campaign End Date :</strong> <?php echo date('F j, Y h:i a',strtotime($post['campaign_end_date'])); ?></p>
                    <p><strong>Budget Per Day :</strong> INR. <?php echo $post['budget_per_day']; ?></p>
                    <p><strong>Campaign Duration :</strong> <?php echo $post['campaign_pack']." Days"; ?></p>
                    <p><strong>Campaign Status :</strong> <?php echo statusconversion($post['campaign_status']); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php 
//'Active','Inactive','Pending','Approved','Suspend','Paused','Completed','Draft'
    function statusconversion($status)
    {
        $returnval="";
        switch($status)
        {
            case 'Active':
                $returnval="<a href='javascript:;' class='btn btn-success'>".$status."</a>";
                break;
            case 'Inactive':
                $returnval="<a href='javascript:;' class='btn btn-inverse'>".$status."</a>";
                break;
            case 'Pending':
                $returnval="<a href='javascript:;' class='btn btn-info'>".$status."</a>";
                break;
            case 'Approved':
                $returnval="<a href='javascript:;' class='btn btn-success'>".$status."</a>";
                break;
            case 'Paused':
                $returnval="<a href='javascript:;' class='btn btn-warning'>".$status."</a>";
                break;
            case 'Completed':
                $returnval="<a href='javascript:;' class='btn btn-disabled'>".$status."</a>";
                break;
            case 'Draft':
                $returnval="<a href='javascript:;' class='btn btn-warning'>".$status."</a>";
                break;
            case 'Suspend':
                $returnval="<a href='javascript:;' class='btn btn-danger'>".$status."</a>";
                break;   
        }

        return $returnval;
    }
?>

<script>
    function updatestatus(id,status)
    {
        $.ajax({
                url: '<?php echo base_url('campaign/statusupdate/'); ?>',
                type: 'post',
                dataType: 'json',
                data: {id:id,status:status},
                cache: false,
                success: function(response) {
                    //var result = JSON.parse(response);
                    console.log(response);
                   jQuery('#status_'+id).html("<a href='javascript:;' class='btn "+response.class+"'>"+response.status+"</a>");
                    
                }
            });
    }
</script>