<div class="row">
	<div class="col-xxl-4 m-b-30">
		<div class="col-xxl-6 mb-30">
            <div class="card card-statistics h-100 mb-0">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-heading">
                        <h4 class="card-title">Balance Sheet History</h4>
                    </div>
                   <!--  <div class="dropdown">
                        <a class="p-2" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-more-alt"></i>
                        </a>
                        <div class="dropdown-menu custom-dropdown dropdown-menu-right p-4">
                            <h6 class="mb-1">Export</h6>
                            <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-pdf-o pr-2"></i>Export to PDF</a>
                            <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-excel-o pr-2"></i>Export to CSV</a>
                        </div>
                    </div> -->
                </div>
                <div class="card-body pt-0">
                    <div class="tab nav-border-bottom">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link show active" id="home-01-tab" data-toggle="tab" href="#home-01" role="tab" aria-controls="home-01" aria-selected="true">
                                    <b>Released Income</b> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-01-tab" data-toggle="tab" href="#profile-01" role="tab" aria-controls="profile-01" aria-selected="false"><b>Earned Income</b> </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane table-responsive fade active show" id="home-01" role="tabpanel" aria-labelledby="home-01-tab">
                                <table class="table table-borderless crypto-table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Username</th>
                                            <th scope="col">Profile ID</th>
                                            <th scope="col">Bank Name</th>
                                            <th scope="col">Package</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    	 <?php if ($claim_sponsor == NUll): ?>
                                    	 	<tr>
                                                <td></td>
                                                <td></td>
                                                <td><h4 class="text-center">No Data Found</h4></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                    	 <?php else: ?>
	                                    	<?php foreach ($claim_sponsor as $claim): ?>
		                                         <tr>
		                                            <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $claim->sponsor_id, 'username'); ?></td>
		                                            <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-primary-inverse"><?= $this->Crud_model->get_type_name_by_id('sponsor', $claim->sponsor_id, 'profile_id'); ?></span></td>
		                                            <td><?= $claim->pay_thru; ?></td>
		                                            <td><?= $this->Crud_model->get_type_name_by_id('package', $claim->package, 'name'); ?></td>
		                                            <td> <i class="fa fa-rupee"></i> <?= $claim->paid_amount; ?></td>
		                                            <td><?= date("d/M/Y H:m:s" , $claim->approved_date); ?>  &nbsp; <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-primary-inverse"><?= time_Ago($claim->approved_date); ?> </span></td>

		                                        </tr>
	                                       <?php endforeach ?>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane table-responsive fade" id="profile-01" role="tabpanel" aria-labelledby="profile-01-tab">
                                <table class="table table-borderless crypto-table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Username</th>
                                            <th scope="col">Profile Id</th>
                                            <th scope="col">Package</th>
                                            <th scope="col">Level</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    	<?php foreach ($earned_income as $earned): ?>                                   	
	                                        <tr>
	                                            <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $earned->sponsor_id, 'username'); ?> </td>
	                                            <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-primary-inverse"><?= $this->Crud_model->get_type_name_by_id('sponsor', $earned->sponsor_id, 'profile_id'); ?></span></td>
	                                            <td><?= $this->Crud_model->get_type_name_by_id('package', $earned->package, 'name'); ?></td>
                                                 <td><?= $earned->level; ?></td>   
	                                            <td><i class="fa fa-rupee"></i> <?= $earned->paid_amount; ?></td>
	                                            <td><?= date("d/M/Y" , $earned->paid_date); ?> &nbsp; <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-primary-inverse"><?= time_Ago($earned->paid_date); ?> </span></td>
                                               
                                                
	                                        </tr>
                                        <?php endforeach ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6 col-xxl-3 m-b-30">
        <div class="card card-statistics h-100 mb-0">
            <div class="card-body">
                <div class="d-flex h-100">
                    <div class="align-self-center">
                       <div class="icon-container m-r-10 img-icon img-icon-sm">
                            <i class="fa fa-cubes text-danger"></i>
                        </div>
                    </div>
                    <div class="align-self-center ml-auto">
                         
                         <?php $released_amount = 0; ?>

                          <?php foreach ($claim_sponsor as $key ): ?>

                          	  <?php 
                                
                                $released_amount += $key->paid_amount;

                          	   ?>
                          	
                          <?php endforeach ?>
                          

                        <h3 class="f-26 mb-0"><span class="count"><i class="fa fa-rupee"></i> <?= $released_amount; ?></span></h3>
                        <p class="text-muted2 mb-0 text-info">Released  Amount</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xxl-3 m-b-30">
        <div class="card card-statistics h-100 mb-0">
            <div class="card-body">
                <div class="d-flex h-100">
                    <div class="align-self-center">
                       <div class="icon-container m-r-10 img-icon img-icon-sm">
                            <i class="fa fa-money text-success"></i>
                        </div>
                    </div>
                    <div class="align-self-center ml-auto">
                        
                          <?php $new_total = 0; ?>
                             <?php foreach ($earned_income as $key): ?>
                                 <?php  
                    
                                                                        
                                     $new_total += $key->paid_amount; 
                                                                     
                                  ?>
                             <?php endforeach ?>

                        <h3 class="f-26 mb-0"><span class="count"><i class="fa fa-rupee"></i> <?= $new_total; ?></span></h3>
                        <p class="text-muted2 mb-0 text-success">Earned Amount</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	 <div class="col-lg-12 col-xxl-3 m-b-30">
        <div class="card card-statistics h-100 mb-0">
            <div class="card-body">
                <div class="d-flex h-100">
                    <div class="align-self-center">
                       <h3><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-primary-inverse">TOTAL BALANCE</span></h3>
                    </div>
                    <div class="align-self-center ml-auto">
                    	<?php 
                             $total_balance =  $new_total - $released_amount;
                    	 ?>
                        <h3 class="f-26 mb-0"><span class="count"><i class="fa fa-rupee"></i> <?= $total_balance; ?></span></h3>
                        <p class="text-muted mb-0">Final Balance</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>