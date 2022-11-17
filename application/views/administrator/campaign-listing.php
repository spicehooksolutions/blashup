<link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/bc4d6d3f18.js" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".delete").click(function(e) {
        alert('as');
        $this = $(this);
        e.preventDefault();
        var url = $(this).attr("href");
        $.get(url, function(r) {
            if (r.success) {
                $this.closest("tr").remove();
            }
        })
    });
});
$(document).ready(function() {
    $(".enable").click(function(e) {
        alert('as');
        $this = $(this);
        e.preventDefault();
        var url = $(this).attr("href");
        $.get(url, function(r) {
            if (r.success) {
                $this.closest("tr").remove();
            }
        })
    });
});
$(document).ready(function() {
    $(".desable").click(function(e) {
        alert('as');
        $this = $(this);
        e.preventDefault();
        var url = $(this).attr("href");
        $.get(url, function(r) {
            if (r.success) {
                $this.closest("tr").remove();
            }
        })
    });
});


$.ajax({
    type: 'post',
    url: 'campaign-listing.php',
    data: {
        txt: txtbox,

    },
    cache: false,
    success: function(returndata) {
        if (returndata[4] === 1) {

            $("#btn_id").modal('show');

        } else {
            // other code
        }
    },
    error: function() {
        console.error('Failed to process ajax !');
    }
});
</script>



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
                                            <td><?php echo $post['campaign_start_date']; ?></td>
                                            <td><?php echo $post['campaign_end_date']; ?></td>
                                            <td>

                                                <?php echo statusconversion($post['campaign_status']); ?>
                                            </td>
                                            <td>
                                                <span><a href="javascript:;"><button
                                                            class="btn btn-primary waves-effect waves-light" id="btn_id" onclick="javascript: jQuery('#campaigndetails_<?php echo $post['id']; ?>').modal('show');">View</button></a></span>
                                                <span><a href="javascript:;"><button
                                                            class="btn btn-info waves-effect waves-light">Edit</button></a></span>

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
                    <p><strong>Ad Type :</strong> <?php echo $post['ad_type']; ?></p>
                    <p><strong>Banner Image :</strong> <?php echo $post['video_or_image_file']; ?></p>
                    <p><strong>Campaign Start Date :</strong> <?php echo $post['campaign_start_date']; ?></p>
                    <p><strong>Campaign End Date :</strong> <?php echo $post['campaign_end_date']; ?></p>
                    <p><strong>Budget Per Day :</strong> <?php echo $post['budget_per_day']; ?></p>
                    <p><strong>Campaign Duration :</strong> <?php echo $post['campaign_pack']; ?></p>
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