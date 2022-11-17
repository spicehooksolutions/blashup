     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">

<script type="text/javascript">
 $(document).ready(function(){
        $(".delete").click(function(e){ alert('as');
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r.success){
                    $this.closest("tr").remove();
                }
            })
        });
    });
$(document).ready(function(){
        $(".enable").click(function(e){ alert('as');
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r.success){
                    $this.closest("tr").remove();
                }
            })
        });
    });
$(document).ready(function(){
        $(".desable").click(function(e){ alert('as');
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r.success){
                    $this.closest("tr").remove();
                }
            })
        });
    });
</script>



<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Manage Users</h4>
                            <p class="card-description">
                             
                            </p>
                            <div class="table-responsive">

                                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Reg-Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($users as $post) : ?>
                                    <tr>
                                            <td><?php echo $post['id']; ?></td>
                                            <td>
                                                <?php
                                                if($post['image']!='')
                                                {
                                                    ?>
                                                <img width="20px;" src="<?php echo site_url();?>assets/images/users/<?php echo $post['image']; ?> ">    
                                                
                                                <?php
                                                }
                                                else
                                                {
                                                    ?>
                                            <img width="20px;" src="<?php echo base_url(); ?>assets/frontend/images/faces/user_icon.png">  
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td><a href="edit-blog.php?id=14"><?php echo $post['name']; ?></a></td>
                                            <td><?php echo $post['email']; ?></td>
                                            <td><?php echo $post['contact']; ?></td>
                                            <td><?php echo date("M d,Y", strtotime($post['register_date'])); ?></td>
                                            <td>
                                                    <?php if($post['status'] == 1){ ?>
                                                <a class="btn btn-inverse-dark btn-fw enable" href='<?php echo base_url(); ?>administrator/enable/<?php echo $post['id']; ?>?table=<?php echo base64_encode('users'); ?>'>Enabled</a>
                                                    <?php }else{ ?> 
                                                    <a class="btn btn-inverse-warning btn-fw desable" href='<?php echo base_url(); ?>administrator/desable/<?php echo $post['id']; ?>?table=<?php echo base64_encode('users'); ?>'>Desabled</a>
                                                    <?php } ?>
                                                    <a class="btn btn-inverse-success btn-fw" href='<?php echo base_url(); ?>administrator/users/update-user/<?php echo $post['id']; ?>'>Edit</a>
                                                    <a class="btn btn-inverse-danger btn-fw delete" href='<?php echo base_url(); ?>administrator/delete/<?php echo $post['id']; ?>?table=<?php echo base64_encode('users'); ?>'>Delete</a>
                                                
                                            </td>
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
