<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All transactions</h4>
                            <p class="card-description">
                                <!-- Add class <code>.table-striped</code> -->
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Campaign ID</th>
                                            <th>Transaction Code</th>
                                            <th>Transaction Date</th>
                                            <th>Transaction Amount</th>
                                            <th>Transaction Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach($alltransactions as $post) :?>

                                        <tr>
                                            <td><?php echo $post['campaign_id']; ?></td>
                                            <td>
                                                 <?php echo $post['transaction_code']; ?>
                                            </td>
                                            <td>
                                            <?php echo date('F j, Y h:i a',strtotime($post['transaction_date'])); ?>
                                            </td>
                                            <td>
                                                <?php echo $post['transaction_amount']; ?>
                                            </td>
                                            <td><?php echo statusconversion($post['transaction_status']); ?>
                                                </td>

                                        </tr>
                                        <?php 
                                        
                                        endforeach; 
                                        
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
//'processed','failed','success','declined'
    function statusconversion($status)
    {
        $returnval="";
        switch($status)
        {
            case 'success':
                $returnval="<a href='javascript:;' class='btn btn-success'>Success</a>";
                break;
            case 'failed':
                $returnval="<a href='javascript:;' class='btn btn-inverse'>Failed</a>";
                break;
            case 'processed':
                $returnval="<a href='javascript:;' class='btn btn-info'>Not completed</a>";
                break;
            case 'declined':
                $returnval="<a href='javascript:;' class='btn btn-danger'>Failed</a>";
                break;
            
        }

        return $returnval;
    }
?>
