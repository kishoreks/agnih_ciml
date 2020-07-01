 
<div class="row">
    <div class="col-md-12">
<?php if (!empty($success_alert)): ?>
            <div class="col-12" id="success_alert">
                <div class="alert border-0 alert-success bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ti ti-close"></i>
                    </button>
                    <?= $success_alert ?>
                </div>
            </div>
<?php endif ?>
                <?php if (!empty($danger_alert)): ?>
            <div class="col-12" id="danger_alert">
                <div class="alert border-0 alert-danger m-b-30 alert-dismissible fade show border-radius-none" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ti ti-close"></i>
                    </button>
                    <?= $danger_alert ?>
                </div>
            </div>
<?php endif ?>
    </div>
</div>
 <!-- begin row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">outward funds</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatable" class="display compact table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Profile ID</th>
                                <th>Username</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Info</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($claim_sponsor as $claim): ?>     
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><span class="badge badge-primary-inverse"><?= $this->Crud_model->get_type_name_by_id('sponsor', $claim->sponsor_id, 'profile_id'); ?></span></td>
                                    <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $claim->sponsor_id, 'username'); ?></td>
                                    <td><i class="fa fa-rupee"></i> <?= $claim->paid_amount; ?></td>
                                    <td><?= date("d-M-Y H:m a" , $claim->approved_date); ?></td>
                                    <td>
                                      <?php 
                                         
                                         if ($claim->status == 'Open') {
                                             echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary-inverse">Pending<span>';
                                         }elseif ($claim->status == 'Pressing') {
                                             echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Pressing<span>';
                                         }elseif ($claim->status == 'Paid') {
                                           echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">Paid success<span>';
                                         }

                                       ?>

                                                    
                                    </td>
                                    <td>
                                                                              
                                        <button data-target="#conform_funds" data-toggle="modal" class="btn btn-sm btn-primary" title="<?=translate('View_Profile')?>" onclick="conform_funds(<?=$claim->claim_sponsor_id?>)">View Profile</button>
                                    </td>

                                        <!-- Large Modal -->
                                            <div class="modal fade" id="conform_funds" tabindex="-1" role="dialog" aria-labelledby="conform_funds" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"><?= $this->Crud_model->get_type_name_by_id('sponsor', $claim->sponsor_id, 'profile_id'); ?> / <?= $this->Crud_model->get_type_name_by_id('sponsor', $claim->sponsor_id, 'username'); ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                          <div class="col-xl-12 col-sm-12">
                                                                <div class="card card-statistics employees-contant px-2">
                                                                    <div class="card-body pb-5 pt-4">
                                                                        <div class="text-center">
                                                                            <div class="text-right">
                                                                                <h4><span class="badge badge-primary badge-pill px-3 py-2"><i class="fa fa-rupee"></i> <?= $claim->paid_amount; ?> </span></h4>
                                                                            </div>
                                                                            <div class="pt-1 bg-img m-auto">

                                                                                <?php 
                                                                                 $profile_image = $this->Crud_model->get_type_name_by_id('sponsor', $claim->sponsor_id, 'profile_image');

                                                                                  $profile_image_data = json_decode($profile_image, true);
                                                                                ?>

                                                                                <?php $images = json_decode($profile_image, true); ?>

                                                                               

                                                                                <?php if (file_exists('uploads/profile_image/' . $images[0]['thumb'])): ?>
                                                                                    <img src="<?= base_url() ?>uploads/profile_image/<?= $images[0]['thumb'] ?>" id="show_img" class="img-fluid" alt="admin-avatar">
                                                                                <?php else: ?>
                                                                                    <img src="<?= base_url(); ?>assets/site_img/nophoto.jpg" class="img-fluid" id="show_img" alt="users-avatar">
                                                                                <?php endif ?>

                                                                           

                                                                            </div>
                                                                            <div class="mt-3 employees-contant-inner">
                                                                                <h4 class="mb-1"><?= $this->Crud_model->get_type_name_by_id('sponsor', $claim->sponsor_id, 'full_name'); ?> <?= $this->Crud_model->get_type_name_by_id('sponsor', $claim->sponsor_id, 'last_name'); ?></h4>
                                                                                <h5 class="mb-0 text-muted"><a href="<?= base_url(); ?>home/sponsor_overview/profile/<?= $claim->sponsor_id; ?>"><?= $this->Crud_model->get_type_name_by_id('sponsor', $claim->sponsor_id, 'profile_id'); ?></a></h5>
                                                                                <div class="mt-3 ">
                                                                                    <span class="badge badge-pill badge-success-inverse px-3 py-2">
                                                                                        <?= $this->Crud_model->get_type_name_by_id('package', $claim->package, 'name'); ?> <small><?= $this->Crud_model->get_type_name_by_id('package', $claim->package, 'fee'); ?> </small> 
                                                                                    </span>
                                                                                    <span class="badge badge-pill badge-primary-inverse px-3 py-2"><?= date("d-M-Y",$claim->approved_date); ?></span>
                                                                                   
                                                                                    <span class="badge badge-pill badge-info-inverse px-3 py-2"> <i class="fa fa-rupee"></i> <?= $claim->paid_amount; ?> <i class="fa fa-arrow-up text-success"></i></span>

                                                                                    <span class="badge badge-pill badge-<?php if ($claim->status == 'Open'): ?><?php echo "warning"; ?><?php else: ?><?php echo "success"; ?><?php endif ?>-inverse px-3 py-2"><?php if ($claim->status == 'Paid'): ?><?php echo "Paid success"; ?><?php else: ?><?php echo "Paid success"; ?><?php endif ?></span>

                                                                                </div>
                                                                            </div>

                                                                            <div class="row mt-3">
                                                                                <div class="col-xxs-4 mb-3 mb-xxs-0 ">
                                                                                    <span class="font-17"><span class="badge badge-primary-inverse">Bank Name</span></span>
                                                                                    <h5 class="mt-1 mb-1"><?= $this->Crud_model->get_type_name_by_id('sponsor', $claim->sponsor_id, 'back_name'); ?></h5>
                                                                                    
                                                                                </div>
                                                                                <div class="col-xxs-4 mb-3 mb-xxs-0">
                                                                                    <span class="font-17"><span class="badge badge-primary-inverse">Account Number</span></span>
                                                                                    <h5 class="mt-1 mb-1"><?= $this->Crud_model->get_type_name_by_id('sponsor', $claim->sponsor_id, 'account_no'); ?></h5>
                                                                                   
                                                                                </div>
                                                                                 <div class="col-xxs-4 mb-3 mb-xxs-0">
                                                                                    <span class="font-17"><span class="badge badge-primary-inverse">Bank Ifsc Code</span></span>
                                                                                    <h5 class="mt-1 mb-1"><?= $this->Crud_model->get_type_name_by_id('sponsor', $claim->sponsor_id, 'ifsc'); ?></h5>
                                                                                    
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mt-3">
                                                                                <div class="col-xxs-12 mb-3 mb-xxs-0">
                                                                                    <a class="btn btn-round btn-inverse-primary btn-xs float-right" href="<?= base_url(); ?>home/sponsor_overview/profile/<?= $claim->sponsor_id; ?>">VIEW FULL PROFILE</a>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                                                                                                      

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Small Modal -->
                                   
                                </tr>
                                <?php $i++ ?>
                             <?php endforeach ?>
                                                      
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Profile ID</th>
                                <th>Username</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Info</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<script>

    function conform_funds(id){
        $("#modal_title").html("conform funds");
        $("#modal_body").html("<div class='text-center'><i class='fa fa-refresh fa-5x fa-spin'></i></div>");
        $("#save_role").val(2);
        $('#validation_info').html("");
        $.ajax({
            url: "<?=base_url()?>home/ewallets/conform_funds/"+id,
            success: function(response) {
                $("#modal_body").html(response);
            },
            fail: function (error) {
                alert(error);
            }
        });
    }

    $("#add_role").click(function(){
        $("#modal_title").html("Add role");
        $("#modal_body").html("<div class='text-center'><i class='fa fa-refresh fa-5x fa-spin'></i></div>");
        $("#save_role").val(1);
        $('#validation_info').html("");
        $.ajax({
            url: "<?=base_url()?>admin/role/add_role",
            success: function(response) {
                $("#modal_body").html(response);
            },
            fail: function (error) {
                alert(error);
            }
        });
    });

</script>