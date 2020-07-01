 <div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatable" class="display compact table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Profile Id</th>
                                <th>Mobile No</th>
                                <th>Package</th>
                                <th>Request date</th>
                                <th>Created On</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($help_request as $help): ?>
                   
                                <tr>
                                    <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $help->sponsor_id, 'full_name'); ?></td>
                                    <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-primary-inverse"><?= $this->Crud_model->get_type_name_by_id('sponsor', $help->sponsor_id, 'profile_id'); ?></span></td>
                                    <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $help->sponsor_id, 'mobile_no'); ?></td>
                                    <td> <i class="fa fa-rupee"></i> <?= $this->Crud_model->get_type_name_by_id('package', $help->package_amount, 'fee'); ?> <small><?= $this->Crud_model->get_type_name_by_id('package', $help->package_amount, 'name'); ?></small></td>
                                    <td><?= date("d-M-Y H:m:s" ,$help->request_on); ?></td>
                                    <td><?= $help->created_at; ?></td>
                                    <td><?php  
                                              
                                              if ($help->status == 0) {
                                                 echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-secondary">Pending</span>';
                                              } else {
                                                   echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-success">Approved</span>';
                                              }
  
                                      ?></td>
                                    <td><a href="<?= base_url(); ?>home/helps/request_approve/<?= $help->request_help_id; ?>" class="btn btn-xs btn-outline-primary">Approve</a> <a href="javascript:void(0);" class="btn btn-xs btn-outline-secondary">Cancel</a></td>
                                </tr>
                                                     
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Profile Id</th>
                                <th>Mobile No</th>
                                <th>Package</th>
                                <th>Request date</th>
                                <th>Created On</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>