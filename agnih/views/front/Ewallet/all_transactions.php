 <!-- begin row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">All Transactions</h4> 
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
                                <th>States</th>
                                <th>Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                             <?php $fullAmount = ""; ?>
                            <?php $i = 1; ?>
                            <?php foreach ($all_transactions as $key): ?>

                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><span class="badge badge-primary-inverse"><?= $key->profile_id; ?></span></td>
                                    <td><?= $key->username; ?></td>
                                    <td> <i class="fa fa-rupee"></i> <?= number_format($this->Crud_model->get_type_name_by_id('package', $key->product, 'fee'),2); ?></td>
                                    <td>

                                       <?php if ($key->is_blocked == "no"): ?>
                                           <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">Active</span>
                                       <?php else: ?>
                                           <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger">In Active</span>
                                       <?php endif ?>
                                            
                                    </td>
                                    <td><?= time_Ago($key->active_on); ?></td>

                                    <?php $fullAmount += $this->Crud_model->get_type_name_by_id('package', $key->product, 'fee') ?>
                                   
                                </tr>
                            <?php $i++; ?>
                            <?php endforeach ?>
                                                     
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Profile ID</th>
                                <th>Username</th>
                                <th>Amount</th>
                                <th>States</th>
                                <th>Date</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-12">
        <div class="card card-statistics">
            <div class="card-header">
                
                <div class="card-body">
                    <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary">Total Amount</span>
                    <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success float-right"><i class="fa fa-rupee"></i> <?= number_format($fullAmount , 2); ?></span></span>
                   
                </div>
            </div>
            
        </div>
    </div>
</div>

