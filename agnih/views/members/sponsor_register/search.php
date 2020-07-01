<?php if ($search_result == Null): ?>

  <div class="row">
    
    <div class="col-12 mb-2">
        <div class="alert alert-dark" role="alert">
            <h3 class="text-white text-center">No Results Found. Please Try A Different Mobile Number (Eg: 9884300000) </h3>
           <!--  <p class="text-white">Aww yeah, you successfully read this important alert message.
                This example text is going to run a bit longer so that you
                can see how spacing within an alert works with this kind
                of content.</p> -->
           
        </div>
    </div>
</div>


	
<?php else: ?>
	



 <!-- begin row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatable" class="display compact table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Profile ID</th>
                                <th>Username</th>
                                <th>Mobile</th>
                                <th>Profile Status</th>
                                <th>Fee Paid</th>
                                <th>Setting</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td><?= $search_result->full_name; ?></td>
                                <td><span class="badge  badge-primary-inverse"><?= $search_result->profile_id; ?></span></td>
                                <td><?= $search_result->username; ?></td>
                                <td><?= $search_result->mobile_no; ?></td>
                                <td>
                                    <?php if ($search_result->is_blocked == 'yes'): ?>

                                        <button type="button" class="btn btn-xs btn-secondary">
                                            Approval Pending <i class="dripicons dripicons-alarm"></i>
                                        </button>
                                        
                                    <?php else: ?>

                                         <button type="button" class="btn btn-xs btn-success">
                                            Approved <i class="fa fa-check-circle-o"></i>
                                        </button>
                                        
                                    <?php endif ?>

                                   
                                </td>
                                <td> <?=$this->Crud_model->get_type_name_by_id('package',$search_result->product)?> <i class="fa fa-rupee"></i> <?=$this->Crud_model->get_type_name_by_id('package',$search_result->product,'fee')?></td>
                                <td><div class="py-2">
                                        <a href="<?= base_url(); ?>members/" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Go To Home"><i class="fa fa-child"></i> Home</a>
                                     <!--    <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-secondary"><i class="fa fa-home"></i></a> -->
                                        <!-- <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Edit Sponsor"><i class="fa fa-cut"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Block Sponsor"><i class="fa fa-eye-slash"></i></a> -->
                                       <!--  <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Sponsor"><i class="fa fa-trash"></i></a> -->
                                    </div>
                                </td>
                            </tr>
                         
                           
                        </tbody>
                        <tfoot>
                            <th>Name</th>
                            <th>Profile ID</th>
                            <th>Username</th>
                            <th>Mobile</th>
                            <th>Profile Status</th>
                            <th>Fee Paid</th>
                            <th>Setting</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<?php endif ?>