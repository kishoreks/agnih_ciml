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



<?php if ($claim_sponsor == NULL): ?>

	<div class="row widget-social">
	<div class="col-xl-12 col-md-12">
	    <div class="card card-statistics widget-social-box2 px-2">
	        <div class="card-body pb-4 pt-5">
	            <div class="text-center">
	               
	                <div class="mt-3 employees-contant-inner">
	                    <h4 class="mb-1"><?= $this->session->userdata('sponsor_name'); ?></h4>
	                    <p class="mb-0 text-muted"><a href="javascript:void(0)"><?= $this->session->userdata('sponsor_email'); ?></a></p>
	                    <div class="ml-0 mt-3">
	                     <div class="table-responsive">
                                <table class="table table-sm table-primary mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Username</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Package</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Bank Name</th>
                                            <th scope="col">Account No</th>
                                            <th scope="col">IFSC Code</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	
                                        <tr>
                                            <th scope="row"><?= $get_package->username; ?></th>
                                            <td><?= $get_package->full_name;  ?></td>
                                            <td><?= $this->Crud_model->get_type_name_by_id('package', $get_package->product, 'name'); ?></td>
                                            <td><?= date('d-m-Y'); ?></td>
                                            <td><?= $get_package->back_name; ?></td>
                                            <td><?= $get_package->account_no; ?></td>
                                            <td><?= $get_package->ifsc; ?></td>
                                            <td>
                                            	 
                                        	  <?php foreach ($all_package as $key): ?>
											      <?php if ($key->package_id == $package->package_id): ?>
												      <?php if ($package->members_count != count($get_sponsor)): ?>

												      	  <?php $amout = count($get_sponsor) * $this->Crud_model->get_type_name_by_id('package', $package->package_id, 'fee'); ?>
					                                         <?php 
					                                               $percentage = $package->commission;
					                                               $totalWidth = $amout
					                                          ?>

					                                         <?php $new_total = ($percentage / 100) * $totalWidth;
					                                               $new_total; 
					                                          ?>
                                                         <i class="fa fa-rupee"></i> <?php $claim_amount =  $amout - $new_total;
                                                             echo $claim_amount;
                                                          ?>
												      <?php endif ?>
	         									  <?php endif ?>														          
											  <?php endforeach ?>

                                             
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
	                    </div>
	                    <div class="row justify-content-center align-items-center border-top pt-4 mt-5">
	                        <div class="col-6 border-right">
	                            
	                            <a href="<?= base_url('members'); ?>" class="btn btn-block btn-round btn-outline-secondary"><i class="fa fa-mail-reply-all mr-2 text-primary"></i> Back To Home</a>
	                        </div>
	                        <div class="col-6">

	                        	<form action="<?= base_url(); ?>members/claim_sponsor/claim_now" method="POST" role="form">

	                        		 <?php $csrf = array('name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash() ); ?> 
	                        		 <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
	                        		 <input type="hidden" name="sponsor_id" id="sponsor_id" class="form-control" value="<?= $get_package->sponsor_id; ?>">
	                        		 <input type="hidden" name="package" id="package" class="form-control" value="<?= $get_package->product; ?>">
	                        		 <input type="hidden" name="created_at" id="created_at" class="form-control" value="<?= time(); ?>">
	                        		 <input type="hidden" name="bank_name" id="bank_name" class="form-control" value="<?= $get_package->back_name; ?>">
	                        		 <input type="hidden" name="account_no" id="account_no" class="form-control" value="<?= $get_package->account_no; ?>">
	                        		 <input type="hidden" name="ifsc_code" id="ifsc_code" class="form-control" value="<?= $get_package->ifsc; ?>">
	                        		 <input type="hidden" name="amount" id="input" class="form-control" value="<?= $claim_amount; ?>">
	                        	
	                        		<button type="submit" class=" btn  btn-round btn-success"><i class="ti ti-notepad mr-2"></i> Claim Now</button>
	                        	</form>
	                           
	                            
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
	
<?php else: ?>
	
 
 <div class="row widget-social">
	<div class="col-xl-12 col-md-12">
	    <div class="card card-statistics widget-social-box2 px-2">
	        <div class="card-body pb-4 pt-5">
	            <div class="text-center">
	                <h5 class="text-success text-center">Successfully Registered Pending Admin Approval</h5>
	                <div class="mt-3 employees-contant-inner">
	                    <h4 class="mb-1"><?= $this->session->userdata('sponsor_name'); ?></h4>
	                    <p class="mb-0 text-muted"><a href="javascript:void(0)"><?= $this->session->userdata('sponsor_email'); ?></a></p>
	                    <div class="ml-0 mt-3">
	                     <div class="table-responsive">
                                <table class="table table-sm table-success mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Username</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Package</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Bank Name</th>
                                            <th scope="col">Account No</th>
                                            <th scope="col">IFSC Code</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	
                                        <tr>
                                            <th scope="row"><?= $get_package->username; ?></th>
                                            <td><?= $get_package->full_name;  ?></td>
                                            <td><?= $this->Crud_model->get_type_name_by_id('package', $get_package->product, 'name'); ?></td>
                                            <td><?= date('d-m-Y'); ?></td>
                                            <td><?= $get_package->back_name; ?></td>
                                            <td><?= $get_package->account_no; ?></td>
                                            <td><?= $get_package->ifsc; ?></td>
                                            <td>
                                            	 
                                        	  <?php foreach ($all_package as $key): ?>
											      <?php if ($key->package_id == $package->package_id): ?>
												      <?php if ($package->members_count != count($get_sponsor)): ?>

												      	  <?php $amout = count($get_sponsor) * $this->Crud_model->get_type_name_by_id('package', $package->package_id, 'fee'); ?>
					                                         <?php 
					                                               $percentage = $package->commission;
					                                               $totalWidth = $amout
					                                          ?>

					                                         <?php $new_total = ($percentage / 100) * $totalWidth;
					                                               $new_total; 
					                                          ?>
                                                         <i class="fa fa-rupee"></i> <?php $claim_amount =  $amout - $new_total;
                                                             echo $claim_amount;
                                                          ?>
												      <?php endif ?>
	         									  <?php endif ?>														          
											  <?php endforeach ?>

                                             
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
	                    </div>
	                    <div class="row justify-content-center align-items-center border-top pt-4 mt-5">
	                        <div class="col-6 border-right">
	                            
	                            <a href="<?= base_url('members'); ?>" class="btn btn-block btn-round btn-outline-secondary"><i class="fa fa-mail-reply-all mr-2 text-primary"></i> Back To Home</a>
	                        </div>
	                        <div class="col-6">
	                        	                            
	                            <button type="submit" class=" btn  btn-round btn-success"><i class="fa fa-money mr-2"></i>

                                   <?php if ($claim_sponsor->claimed == 1): ?>
                                   	 Approval Pending
                                   <?php else: ?>
                                   	 Admin Approval 
                                   <?php endif ?>

	                            
	                        </button>
	                            
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>



<?php endif ?>