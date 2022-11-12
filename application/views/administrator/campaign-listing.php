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



<div class="page-header">
    <div class="page-header-title">
        <h4>Campaign Listing</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Campaign Listing</a>
            </li>
        </ul>
    </div>
</div>

<!-- Page-header end -->
<!-- Page-body start -->
<div class="page-body">
    <!-- DOM/Jquery table start -->

    <div class="card">
        <div class="card-block">
            <div class="table-responsive dt-responsive">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
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
                            <td><?php echo $post['ad_type']; ?>
                            </td>
                            <td><?php echo $post['budget_per_day']; ?></td>
                            <td><?php echo $post['campaign_start_date']; ?></td>
                            <td><?php echo $post['campaign_end_date']; ?></td>
                            <td>

                                <?php echo $post['campaign_status']; ?>
                            </td>
                            <td>
                                <span><a href="javascript:;"><button class="btn btn-primary waves-effect waves-light"
                                            id="btn_id" data-toggle="modal"
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
    <?php foreach($campaign_listing as $post) :?>
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


    <!-- DOM/Jquery table end -->
</div>