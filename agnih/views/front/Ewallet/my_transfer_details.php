 <!-- begin row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title"><?= translate('my_transfer_details'); ?></h4>
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
                                <th>States</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1; ?>
                           <?php foreach ($transfer_history as $history): ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $history->sponsor_id, 'profile_id');  ?></td>
                                    <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $history->sponsor_id, 'username');  ?></td>
                                    <td><i class="fa fa-rupee"></i> <?= $history->paid_amount;  ?></td>
                                    <td><?= date("d-M-Y H:m a",$history->approved_date);  ?></td>
                                    <td>
                                        <?php if ($history->status == 'Paid'): ?>
                                            <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">Paid Success</span>
                                        <?php else: ?>
                                            <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">Success</span>
                                        <?php endif ?>

                                        </td>
                                   
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
                                <th>Date</th>
                                <th>States</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->