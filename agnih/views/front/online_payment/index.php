<div class="row widget-social">
    <div class="col-lg-6">
        <div class="card card-statistics widget-social-box12">
            <div class="card-body p-0">
                <div class="media widget-social-contant align-items-center p-4">
                    <div class="media-body">
                        <h4 class="mb-0">Success Payment</h4>
                        <p><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-success"><?= $paid_payment; ?></span></p>
                    </div>
                    <div class="bg-img"><img class="mr-3 img-fluid" src="assets/img/avtar/04.jpg" alt="socialwidget-img"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card card-statistics widget-social-box14">
            <div class="card-body p-0">
                <div class="media widget-social-contant align-items-center p-4">
                    <div class="bg-img mr-3"><img class="img-fluid" src="assets/img/avtar/05.jpg" alt="socialwidget-img"></div>
                    <div class="pr-1">
                        <h4 class="mb-0 text-danger">Due Payment</h4>
                        <p><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-danger"><?= $due_payment; ?></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>


<div class="row">
	 <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatable" class="display compact table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Packages</th>
                                <th>Paid By</th>
                                <th>Paid To</th>
                                <th>Payment Type</th>
                                <th>Payment Status</th>
                                <th>Payment Code</th>
                                <th>Purchase Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php $i = 1; ?>
                        	<?php foreach ($online_payment as $payment): ?>	
                        	
	                            <tr>
	                                <td><?= $i; ?></td>
	                                <td><?= $this->Crud_model->get_type_name_by_id('package', $payment->plan_id, 'name'); ?></td>
	                                <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $payment->sponsor_id, 'username'); ?></td>
	                                <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $payment->member_id, 'username'); ?></td>
	                                <td><?= $payment->payment_type; ?></td>
	                                <td><?= $payment->payment_status; ?></td>
	                                <td><?= $payment->payment_code; ?></td>
	                                <td><?= date('d-M-y H:s A',$payment->purchase_datetime); ?></td>
	                                <td><?= $payment->amount; ?></td>
	                            </tr>
                             <?php $i++; ?> 
                            <?php endforeach ?>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Packages</th>
                                <th>Paid By</th>
                                <th>Paid To</th>
                                <th>Payment Type</th>
                                <th>Payment Status</th>
                                <th>Payment Code</th>
                                <th>Purchase Date</th>
                                <th>Amount</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>