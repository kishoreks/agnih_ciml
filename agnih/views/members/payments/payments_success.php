<!-- begin row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatable" class="display compact table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Paid To</th>
                                <th>Plan</th>
                                <th>Payment Type</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php $i = 1; ?>
                        	<?php foreach ($payments as $row): ?>
                        	
	                            <tr>
	                                <td><?= $i; ?></td>
	                                <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $row->member_id , 'username');  ?></td>
	                                <td><?= $this->Crud_model->get_type_name_by_id('package', $row->plan_id , 'name');  ?></td>
	                                <td><?= $row->payment_type; ?></td>
	                                <td><?= $row->payment_status; ?></td>
	                                <td><i class="fa fa-rupee"></i> <?= $row->amount; ?></td>
	                                <td><i class="fa fa-rupee"></i> <?= time_Ago($row->purchase_datetime); ?></td>
	                            </tr>
                             <?php $i++; ?>
                            <?php endforeach ?>
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Paid To</th>
                                <th>Plan</th>
                                <th>Payment Type</th>
                                <th>Status</th>
                                <th>Amount</th>
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