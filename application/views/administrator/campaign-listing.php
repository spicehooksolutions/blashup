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
                            <td><?php echo (($post['ad_type']=='full_screen_video')? 'Full screen Video':'In Between Video'); ?>
                            </td>
                            <td><?php echo $post['budget_per_day']; ?></td>
                            <td><?php echo $post['campaign_start_date']; ?></td>
                            <td><?php echo $post['campaign_end_date']; ?></td>
                            <td>

                                <?php echo statusconversion($post['campaign_status']); ?>
                            </td>
                            <td>
                                <span><a href="javascript:;"><i class="fa fa-eye" aria-hidden="true" id="btn_id"
                                            data-toggle="modal"
                                            data-target="#campaigndetails_<?php echo $post['id']; ?>"></i></a></span>

                                <span><a href="javascript:;"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a></span>

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
                    <p><strong>Banner Image :</strong> <?php echo $post['video_or_image_file']; ?></p>
                    <p><strong>Campaign Start Date :</strong> <?php echo $post['campaign_start_date']; ?></p>
                    <p><strong>Campaign End Date :</strong> <?php echo $post['campaign_end_date']; ?></p>
                    <p><strong>Budget Per Day :</strong> <?php echo $post['budget_per_day']; ?></p>
                    <p><strong>Campaign Duration :</strong> <?php echo $post['campaign_pack']; ?></p>
                    <p><strong>Campaign Status :</strong> <?php echo statusconversion($post['campaign_status']); ?></p>
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