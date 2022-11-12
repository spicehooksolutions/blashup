<?php if(!$this->session->userdata('login')):
    redirect('users/login');
endif; ?>
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
                                        <?php foreach($campaigns as $post) :?>

                                        <tr>
                                            <td><?php echo $post['id']; ?></td>
                                            <td>
                                                <?php echo $post['campaign_title']; ?>
                                            </td>
                                            <td><?php echo $post['ad_type']; ?>
                                            </td>
                                            <td><?php echo $post['budget_per_day']; ?></td>
                                            <td><?php echo $post['campaign_start_date']; ?></td>
                                            <td><?php echo $post['campaign_end_date']; ?></td>
                                            <td>

                                                <?php echo $post['campaign_status']; ?>
                                            </td>
                                            <td>
                                                <span><a href="javascript:;"><button
                                                            class="btn btn-primary waves-effect waves-light" id="btn_id"
                                                            data-toggle="modal"
                                                            data-target="#campaigndetails_<?php echo $post['id']; ?>">View</button></a></span>
                                                <span><a href="javascript:;"><button
                                                            class="btn btn-primary waves-effect waves-light">Edit</button></a></span>

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

<?php foreach($campaigns as $post) :?>
<!--Modal-->
<div class="modal fade" id="campaigndetails_<?php echo $post['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="campaigndetails_<?php echo $post['id']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Campaign Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Campaign Title :</strong> <?php echo $post['campaign_title']; ?></p>
                <p><strong>Campaign Description :</strong> <?php echo $post['campaign_description']; ?></p>
                <p><strong>Ad Type :</strong> <?php echo $post['ad_type']; ?></p>
                <p><strong>Budget Per Day :</strong> <?php echo $post['budget_per_day']; ?></p>
                <p><strong>Campaign Duration :</strong> <?php echo $post['campaign_pack']; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>