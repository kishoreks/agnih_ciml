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

<?php if ($package_info == NULL): ?>

    <div class="row">
         <div class="col-lg-12 ">
           <div class="card card-statistics">
                <div class="card-header bg-danger">
                    <h4 class="card-title text-white">Not Eligible To Request Donation </h4>
                </div>
                <div class="card-body ">
                    <h5 class="card-title"><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-danger-inverse">Not Eligible</span></h5>
                    <p class="card-text text-secondary ">The first thing to remember about if you are requesting donation need to be completed the basic package successfully. when you request the donations admin need to approve then only you will receive them a donation from our system if you have any questions rice a ticket Email Us.</p>
                  
                </div>
                <div class="card-footer text-muted">
                    <p><?= date('d-M-Y'); ?></p>
                </div>
            </div>
        </div>

    </div> <!-- begin row -->
    
<?php else: ?>


    <?php if ($donation_make != NULL): ?>

        <div class="row">
            <div class="col-lg-12">
               <div class="card card-statistics">
                    <div class="card-header bg-success">
                        <h4 class="card-title text-white">Request Donations Success Waiting For Admin Approval</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Request Donations Approval Pending ( <?= time_Ago($donation_make->request_on); ?> )</h5>
                        <p class="card-text">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Profile ID</th>
                                        <th>Package</th>
                                        <th>Approved</th>
                                        <th>Time Duration</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $donation_make->sponsor_id, 'profile_id'); ?></td>
                                        <td><?= $this->Crud_model->get_type_name_by_id('package', $donation_make->package_amount, 'name'); ?> <?= $this->Crud_model->get_type_name_by_id('package', $donation_make->package_amount, 'fee'); ?></td>
                                        <td><?php

                                         if ($donation_make->approved == 0) {
                                            echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info-inverse">Admin Pending<span>';
                                          } else {
                                             echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success-inverse">Approved <span>' . time_Ago($donation_make->confirmed_on);
                                          }

                                        

                                         ?></td>
                                        <td><?= date("d-M-Y  H:m:s a" ,$donation_make->time_duration); ?></td>
                                        <td><?php 

                                          if ($donation_make->status == 0) {
                                            echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary-inverse">Pending<span>';
                                          } else {
                                             echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success-inverse">Approved <span>' . time_Ago($donation_make->confirmed_on);
                                          }
                                          

                                        ; ?></td>
                                    </tr>
                                </tbody>
                            </table>

                        </p>
                        
                    </div>
                    <div class="card-footer text-muted">
                       
                        <p>Date: <?php echo $startTime = date("Y-m-d H:i:s"); ?></p>
                       
                    </div>
                </div>
            </div>
        </div>
        
    <?php else: ?>
     
        <div class="row">
            <div class="col-lg-12">
               <div class="card card-statistics">
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-white">Request Donations From Admin</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Request Donations</h5>
                        <p class="card-text">The first thing to remember about if you are requesting donation need to be completed the basic package successfully. when you request the donations admin need to approve then only you will receive them a donation from our system if you have any questions rice a ticket Email Us.</p>
                        <a href="<?= base_url(); ?>members/help/make_request" class="btn btn-primary mt-2">Request Donations Now</a>
                    </div>
                    <div class="card-footer text-muted">
                       
                        <?php echo $startTime = date("Y-m-d H:i:s"); ?>
                        <p><?php date('Y-m-d H:i:s a',strtotime('+48 hour +30 minutes +45 seconds',strtotime($startTime)));?></p>
                    </div>
                </div>
            </div>
        </div>
    <!-- end row -->
    <?php endif ?>
    
<?php endif ?>



