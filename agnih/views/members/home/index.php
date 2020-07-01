 <?php 
    // Leading Json data
    $profile_image = $this->Crud_model->get_type_name_by_id('sponsor', $this->session->userdata('sponsor_id'), 'profile_image');
    $profile_image_data = json_decode($profile_image, true);

    // var_dump($profile_image_data);
?>
<!--  -->

<div class="row widget-social">
     <div class="col-xl-4 col-md-6">
        <div class="card card-statistics widget-social-box9">
            <div class="card-body p-0">
                <div class="widget-social-contant pt-3 pb-5 px-4">
                    <h4 class="mb-1"><?= translate($this->session->userdata('sponsor_name')); ?></h4>
                    <p class="mb-0 pb-3"><a class="text-white" href="javascript:void(0)"><?= $this->session->userdata('sponsor_email'); ?></a></p>
                </div>
                <div class="bg-img">
                     <?php $images = json_decode($profile_image, true); ?>
                     <?php if (file_exists('uploads/profile_image/'.$images[0]['thumb'])): ?>
                        <img class="img-fluid" src="<?=base_url()?>uploads/profile_image/<?=$images[0]['thumb']?>" alt="socialwidget-img">
                     <?php else: ?>
                        <img class="img-fluid" src="assets/site_img/nophoto.jpg" alt="socialwidget-img">
                     <?php endif ?>   
                    
                </div>
                <ul class="nav justify-content-between text-center px-5 pt-4 pb-4">
                    <li class="flex-fill">
                        <h3 class="mb-0"><?= count($get_sponsor); ?></h3>
                        <p>Members</p>
                    </li>
                   <!--  <li class="flex-fill">
                        <h3 class="mb-0"></h3>
                        <p>Product</p>
                    </li> -->
                    <li class="flex-fill">
                        <h3 class="mb-0"><?= count($tickets); ?></h3>
                        <p>Tickets</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-xl-5 col-xxl-4 m-b-30">
        <div class="card card-statistics h-100 mb-0 widget-support-list">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">Support Tickets</h4>
                </div>
            </div>
            <div class="card-body pl-0 pr-0 scrollbar scroll_dark mCustomScrollbar _mCS_3 mCS-autoHide" style="position: relative; overflow: visible;"><div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;"><div id="mCSB_3_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
                 
                 <?php foreach ($tickets as $value): ?>
         
                    <div class="widget-text">
                        <div class="media">
                            <div class="dot-online">
                                <div class="bg-img mr-2">
                                   
                                   <?php $images = json_decode($profile_image, true); ?>
                                     <?php if (file_exists('uploads/profile_image/'.$images[0]['thumb'])): ?>
                                        <img class="img-fluid mCS_img_loaded" src="<?=base_url()?>uploads/profile_image/<?=$images[0]['thumb']?>" alt="listwidget-img">
                                     <?php else: ?>
                                        <img class="img-fluid mCS_img_loaded" src="assets/site_img/nophoto.jpg" alt="listwidget-img">
                                     <?php endif ?>   
                                    
                                </div>
                                <span class="dot-online-icon bg-success"></span>
                            </div>
                            <div class="media-body ml-2">
                                <h4 class="mb-0"><?= $value->sponsor_username; ?></h4>
                                <span><?= time_Ago($value->date_at); ?></span>
                                <p>

                                    <?php if ($value->status == 1) {?> 
                                       
                                         <span class="badge badge-pill badge-success">Completed</span>
                                    <?php } elseif ($value->status == 2) {?> 
                                       
                                         <span class="badge badge-pill badge-info">Pending</span>
                                    <?php } elseif ($value->status == 3) {?> 
                                        
                                         <span class="badge badge-pill badge-danger">Cancelled</span>
                                         <?php }
                                    ?>
                                    
                                   
                                </p>
                            </div>
                        </div>
                        <div class="pt-3">
                            <p><?= $value->message; ?></p>
                        </div>
                    </div>

               <?php endforeach ?>
             

             
            </div></div><div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 269px; max-height: 416px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
        </div>
    </div>



        <div class="col-lg-3">
            <div class="card card-statistics widget-social-box12">
                <div class="card-body p-0">
                    <div class="media widget-social-contant align-items-center p-4">
                        <div class="media-body">
                            <h5 class="mb-0">Package <?= $this->Crud_model->get_type_name_by_id('package', $package->package_id); ?> Active </h5>
                               
                               <?php $released_income = $this->db->get_where('released_income' , array('sponsor_id' => $this->session->userdata('sponsor_id') , 'status' => 'Paid'))->result(); ?>

                              <ul class="jobportaldemo2-list list-unstyled m-t-20">
                                 <?php foreach ($released_income as $income): ?> 
                                    <li class="py-1 text-white"> <?= $income->level; ?> <i class="fa fa-minus pr-2 text-white"></i> <?= $income->paid_amount; ?> <i class="fa fa-check-square text-white"></i></li>
                                   <?php endforeach ?>
                              </ul>
                          </div>
                        <div class="bg-img">

                              <?php $images = json_decode($profile_image, true); ?>
                             <?php if (file_exists('uploads/profile_image/'.$images[0]['thumb'])): ?>
                                <img class="mr-3 img-fluid" src="<?=base_url()?>uploads/profile_image/<?=$images[0]['thumb']?>" alt="socialwidget-img">
                             <?php else: ?>
                                <img class="mr-3 img-fluid" src="assets/site_img/nophoto.jpg" alt="socialwidget-img">
                             <?php endif ?>   
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>      

 </div>


<div class="row">
    <div class="col-xxl-3">
      
        <div class="card card-statistics">
            <div class="card-header border-0">
                <h4 class="card-title"> <?= translate('members_status'); ?> </h4>
            </div>
            <div class="card-body datting-upload-image">
                <div class="tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="successed-tab" data-toggle="tab" href="#successed" role="tab" aria-controls="successed" aria-selected="true">Successed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show p-0 border-top" id="successed" role="tabpanel" aria-labelledby="successed-tab">
                            <div class="d-flex align-items-center justify-content-between row">
                                <div class="card-body scrollbar scroll_dark pt-0" style="max-height: 350px;">
                                        <div class="datatable-wrapper table-responsive">
                                            <table id="datatable" class="table table-borderless table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Profile ID</th>
                                                        <th>Username</th>
                                                        <th>Status</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($get_sponsor_successed as $successed): ?>
                                                                                                            
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= $successed->full_name; ?></td>
                                                            <td><?= $successed->profile_id; ?></td>
                                                            <td>
                                                               <?= $successed->username; ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($successed->is_blocked == 'yes'): ?>

                                                                    <button type="button" class="btn btn-xs btn-secondary">
                                                                        Approval Pending <i class="dripicons dripicons-alarm"></i>
                                                                    </button>
                                                                    
                                                                <?php else: ?>

                                                                     <button type="button" class="btn btn-xs btn-success">
                                                                        Approved <i class="fa fa-check-circle-o"></i>
                                                                    </button>
                                                                    
                                                                <?php endif ?>

                                                               <!--  <span class="badge badge-success-inverse">Active</span> -->
                                                            </td>
                                                           
                                                        </tr>
                                                   <?php $i++; ?>
                                                   <?php endforeach ?>
                                                   
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Profile ID</th>
                                                        <th>Username</th>
                                                        <th>Status</th>
                                                        
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="tab-pane fade p-0 border-top" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                            <div class=" d-flex align-items-center justify-content-between row">
                           <div class="card-body scrollbar scroll_dark pt-0" style="max-height: 350px;">
                                        <div class="datatable-wrapper table-responsive">
                                            <table id="datatable" class="table table-borderless table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Profile ID</th>
                                                        <th>Username</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $i = 1; ?>
                                                    <?php foreach ($get_sponsor_pending as $pending): ?>
                                                                                                            
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= $pending->full_name; ?></td>
                                                            <td><?= $pending->profile_id; ?></td>
                                                            <td>
                                                               <?= $pending->username; ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($pending->is_blocked == 'yes'): ?>

                                                                    <a href="<?= base_url() ?>members/sponsor/all_sponsor"  class="btn btn-xs btn-secondary">
                                                                        Approval Pending <i class="dripicons dripicons-alarm"></i>
                                                                    </a>
                                                                    
                                                                <?php else: ?>

                                                                     <button type="button" class="btn btn-xs btn-success">
                                                                        Approved <i class="fa fa-check-circle-o"></i>
                                                                    </button>
                                                                    
                                                                <?php endif ?>

                                                               <!--  <span class="badge badge-success-inverse">Active</span> -->
                                                            </td>
                                                           
                                                        </tr>
                                                   <?php $i++; ?>
                                                   <?php endforeach ?>
                                                   
                                                   
                                                   
                                                   
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Profile ID</th>
                                                        <th>Username</th>
                                                        <th>Status</th>
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



<div class="row">
    <div class="col-12">
        <div class="card card-statistics">
            <div class="card-body p-0">
                <div class="row no-gutters">
                   
                    <div class="col-lg-6 col-xl-6 p-20 border-bottom border-xl-bottom-0 border-xl-right">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <h4>Terms & Conditions</h4>
                                <p><a href="<?= base_url(); ?>members/terms_and_conditions" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary">Terms & Conditions</a></p>
                            </div>
                            
                        </div>
                    </div>

                     <div class="col-lg-6 col-xl-6 p-20 border-bottom border-xl-bottom-0 border-xl-right">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <h4>Privacy Policy</h4>
                               <p><a href="<?= base_url(); ?>members/privacy_policy" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-info">Privacy Policy</a></p>
                            </div>
                            
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-statistics">
            <div class="card-body p-0">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-xl-3 p-20 border-bottom border-xl-bottom-0 border-lg-right">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <h4> <i class="btn btn-social btn-round text-primary fa fa-facebook"></i> <a href="<?= $this->system_facebook; ?>" target="_blank">Facebook</a></h4>
                                <!-- <p>Consectetur ipsum dolor sit amet, adipisicing.</p> -->
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 p-20 border-bottom border-xl-bottom-0 border-xl-right">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <h4><i class="btn btn-social btn-round text-primary fa fa-twitter"></i> <a href="<?= $this->system_twitter; ?>" target="_blank">twitter</a></h4>
                                <!-- <p>Consectetur ipsum dolor sit amet, adipisicing.</p> -->
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 p-20 border-bottom border-lg-bottom-0 border-lg-right">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <h4><i class="btn btn-social btn-round text-primary fa fa-mobile-phone"></i> <?= $this->system_phone; ?></h4>
                                <!-- <p>Consectetur ipsum dolor sit amet, adipisicing.</p> -->
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 p-20">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <h4><i class="btn btn-social btn-round text-primary fa fa-envelope"></i> <?= $this->system_email; ?></h4>
                                <!-- <p>Consectetur ipsum dolor sit amet, adipisicing.</p> -->
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>