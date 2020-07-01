 <div class="row crypto-currency">
    <div class="col-lg-12">
        <div class="card card-statistics crypto-currency">
            <div class="card-header d-flex justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Recent Payment Request</h4>
                </div>
                
            </div>
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatable" class="table table-borderless crypto-table w-100">
                        <thead class="bg-light">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Pay To</th>
                                <th>Package</th>
                                <th>Level</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                          <?php foreach ($release_pay as $release): ?>
                          	                          
	                            <tr>
	                                <td>
	                                	<?php if ($release->status == "Open"): ?>
	                                		<i class="fa fa-money text-pink"></i>
	                                	<?php else: ?>
	                                		<i class="crypto crypto-cred text-success"></i>
	                                	<?php endif ?>
	                                	
	                                </td>
	                                <td><?= date("d-M-y H:s A", $release->paid_date); ?></td>
	                                <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $release->sponsor_id, 'username'); ?></td>
	                                <td><?= $this->Crud_model->get_type_name_by_id('package', $release->package, 'name'); ?></td>
	                                <td><span class="d-block"><?= $release->level; ?> <i class="fa fa-sort-asc text-pink font-18"></i></span>
	                                </td>
	                                <td><span class="d-block"><i class="fa fa-rupee"></i> <?= $release->paid_amount; ?> <i class="fa fa-sort-asc text-pink font-18"></i> </td>
	                                <td>
                                       <?php if ($release->status == "Open"): ?>
	                                	     <p>open</p>
		                                    <div class="progress my-3" style="height: 4px;">
		                                        <div class="progress-bar" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
		                                    </div>	
	                                    <?php else: ?>
	                                    	    <p class="text-success">Success</p>
			                                    <div class="progress my-3" style="height: 4px;">

			                                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
			                                    </div>
	                                    <?php endif ?>


	                                </td>
	                                <td>
	                                	
                                      <?php 

                                         if ($release->status == "Open") { ?>
                                            <a href="<?= base_url(); ?>home/payout/payment_conf/<?= $release->sponsor_id; ?>/<?= $release->released_income_id; ?>" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary">Approve to pay</a>
                                           <?php
                                         }elseif ($release->status == "Pressing") { ?>
                                         	<a href="<?= base_url(); ?>home/payout/payment_conf/<?= $release->sponsor_id; ?>/<?= $release->released_income_id; ?>" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-warning">Approve Pressing</a>
                                         	<?php
                                         }elseif ($release->status == "Paid") { ?>
                                         	
                                         	<a href="#" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">Success</a>
                                         	<?php
                                         }

                                       ?>

	                                	
	                                </td>
	                            </tr>

                            <?php endforeach ?>

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>	
