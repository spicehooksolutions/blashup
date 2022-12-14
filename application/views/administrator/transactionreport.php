<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">


<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Transaction Report</h4>
                            <p class="card-description">
                                <!-- Add class <code>.table-striped</code> -->
                            </p>
                            <div class="table-responsive">
                                <table id="dom-jqry" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Payment order ID</th>
                                            <th>Payment initiated date</th>
                                            <th>Payment amount</th>
                                            <th>Payment status</th>
                                           
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($totaltransactions as $post):?>

                                        <tr>
                                            <td><?php echo $post['id']; ?></td>
                                            <td>
                                                <?php echo $post['payment_order_id']; ?>
                                            </td>  
                                            <td><?php echo  date('F j, Y h:i a',strtotime($post['payment_initiate_date'])); ?>
                                            </td>
                                            <td><?php echo $post['payment_amount']; ?></td>
                                            <td><?php echo statusconversion($post['payment_status']); ?></td>
                                            
                                           
                                        </tr>
                                        <?php endforeach; ?>

<!--                                                 
                                    <div class="paginate-link">
                                        <?php //echo $this->pagination->create_links(); ?>
                                    </div>   -->
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


    }
