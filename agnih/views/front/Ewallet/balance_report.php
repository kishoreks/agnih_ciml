<div class="row">
    <div class="col-xxl-4 m-b-30">
        <div class="col-xxl-6 mb-30">
            <div class="card card-statistics h-100 mb-0">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-heading">
                        <h4 class="card-title">Balance Sheet History</h4>
                    </div>
            
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
                                <table id="datatable" class="table table-borderless crypto-table mb-0">
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

                                        <?php foreach ($released_history as $released): ?>
                                        
                                            <tr>
                                                <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $released->sponsor_id, 'username'); ?></td>
                                                <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-primary-inverse"><?= $this->Crud_model->get_type_name_by_id('sponsor', $released->sponsor_id, 'profile_id'); ?></span></td>
                                                <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $released->sponsor_id, 'back_name'); ?></td>
                                                <td><?= $this->Crud_model->get_type_name_by_id('package', $released->package, 'name'); ?></td>
                                                <td> <i class="fa fa-rupee"></i> <?= $released->paid_amount; ?></td>
                                                <td><?= date("d-M-Y H:m a",$released->approved_date); ?>  &nbsp; <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-primary-inverse"><?= time_Ago($released->approved_date); ?> </span></td>
                                                 <?php $released_total += $released->paid_amount; ?>
                                            </tr>

                                        <?php endforeach ?>
                                   </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">Username</th>
                                            <th scope="col">Profile ID</th>
                                            <th scope="col">Bank Name</th>
                                            <th scope="col">Package</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane table-responsive fade" id="profile-01" role="tabpanel" aria-labelledby="profile-01-tab">
                                <div class="row">
                            <div class="col-xxl-8 m-b-30">
                                <div class="card card-statistics h-100 mb-0">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <div class="card-heading">
                                            <h4 class="card-title">Earned Income</h4>
                                        </div>
                                       <!--  <div class="dropdown">
                                            <a class="btn btn-xs" href="#!">Export <i class="zmdi zmdi-download pl-1"></i> </a>
                                        </div> -->
                                    </div>
                                    <div class="card-body scrollbar scroll_dark pt-0" style="max-height: 350px;">
                                        <div class="datatable-wrapper table-responsive">
                                            <table id="datatable" class="table table-borderless table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Username</th>
                                                        <th>Profile ID</th>
                                                        <th>Bank Name</th>
                                                        <th>Package</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                        <th>States</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($earned_income as $income): ?>
                                                      
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= $income->username; ?></td>
                                                            <td><span class="badge badge-primary-inverse"><?= $income->profile_id; ?></span></td>
                                                            <td><?= $income->back_name; ?></td>
                                                            <td><?= $this->Crud_model->get_type_name_by_id('package', $income->product, 'name'); ?></td>
                                                            <td> <i class="fa fa-rupee"></i> <?= $this->Crud_model->get_type_name_by_id('package', $income->product, 'fee'); ?></td>
                                                            <td><span class="badge badge-info-inverse"><?= time_Ago($income->active_on); ?></span></td>
                                                            <td>
                                                                <?php if ($income->is_blocked == "no"): ?>
                                                                    <span class="badge badge-success-inverse">Active</span>
                                                                <?php else: ?>
                                                                    <span class="badge badge-danger-inverse">In-Active</span>
                                                                <?php endif ?>
                                                                
                                                            </td>

                                                            <?php 
                                                                
                                                                $income_total += $this->Crud_model->get_type_name_by_id('package', $income->product, 'fee');

                                                             ?>
                                                           
                                                        </tr>  
                                                     <?php $i++; ?>
                                                     <?php endforeach ?>                                               
                                                   
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Username</th>
                                                        <th>Profile ID</th>
                                                        <th>Bank Name</th>
                                                        <th>Package</th>
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
                            <i class="fa fa-cubes"></i>
                        </div>
                    </div>
                    <div class="align-self-center ml-auto">
                         
                         
                          
                                                            
                                                    

                        <h3 class="f-26 mb-0"><span class="count"><i class="fa fa-rupee"></i> <?= number_format($released_total,2); ?></span></h3>
                        <p class="text-muted mb-0">Released  Amount</p>
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
                            <i class="fa fa-money"></i>
                        </div>
                    </div>
                    <div class="align-self-center ml-auto">
                        
                                                                                                                                                                                                                                                                                                                                                                             
                        <h3 class="f-26 mb-0"><span class="count"><i class="fa fa-rupee"></i> <?= number_format($income_total,2);?></span></h3>
                        <p class="text-muted mb-0">Earned Amount</p>
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
                                                <h3 class="f-26 mb-0"><span class="count"><i class="fa fa-rupee"></i> <?= number_format($income_total - $released_total , 2);  ?></span></h3>
                        <p class="text-muted mb-0">Final Balance</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>