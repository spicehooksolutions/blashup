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
                            <h4 class="card-title">Wallet status - Users</h4>
                            <p class="card-description">
                             
                            </p>
                            <div class="table-responsive">

                                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Id</th>                                           
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Wallet balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($users as $post) : ?>
                                    <tr>
                                            <td><?php echo $post['id']; ?></td>
                                            
                                            <td><a href="edit-blog.php?id=14"><?php echo $post['name']; ?></a></td>
                                            <td><?php echo $post['email']; ?></td>
                                            <td><?php echo $post['contact']; ?></td>
                                            <td> Rs. <?php
                                                $walletbalance=0;
                                                $this->db->where('user_id',$post['id']);
                                                $this->db->where('payment_status','succeful');
                                                $result = $this->db->get('transactions');
                                                if ($result->num_rows()>=1) {
                                                    foreach($result->result_array() as $row)
                                                    {
                                                        $walletbalance +=$row['payment_amount'];
                                                    }
                                    
                                                    
                                                }
                                            
                                                echo $walletbalance;
                                                ?></td>
                                            
                                        </tr>
                                    <?php endforeach; ?>

                                    <!-- <div class="paginate-link">
                                        <?php //echo $this->pagination->create_links(); ?>
                                    </div>  -->

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
