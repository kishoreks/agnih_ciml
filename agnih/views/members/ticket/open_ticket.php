 <?php 
    // Leading Json data
    $profile_image = $this->Crud_model->get_type_name_by_id('sponsor', $this->session->userdata('sponsor_id'), 'profile_image');
    $profile_image_data = json_decode($profile_image, true);

    // var_dump($profile_image_data);
?>
<div class="row">
    <div class="col-md-12 mb-5">
        <?php if (!empty($success_alert)): ?>
        <div class="col-12" id="success_lg_alert">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <?=$success_alert?>
            </div>
        </div>
    <?php endif ?>
    <?php if (!empty($danger_alert)): ?>
        <div class="col-12" id="danger_lg_alert">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <?=$danger_alert?>
            </div>
        </div>
    <?php endif ?>
    </div>
</div>

<div class="row">
    <div class="col-xxl-3 col-xl-4  col-sm-6">
        <div class="card card-statistics contact-contant">
            <div class="card-body py-4">
                <div class="d-flex align-items-center">
                   
                    <div class="ml-3">
                        <h4 class="mb-0">Support Department</h4>
                        <p><span class="badge badge-warning-inverse px-2 py-1 mt-1">Customer Care </span></p>
                    </div>
                </div>
                <div>
                    <ul class="nav">
                        <li class="nav-item">
                            <div class="img-icon"><i class="fa fa-mobile"></i></div>
                        </li>
                        <li class="nav-item">
                            <p>021-843-8478</p>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item">
                            <div class="img-icon"><i class="fa fa-phone"></i></div>
                        </li>
                        <li class="nav-item">
                            <p>40-1440-8546</p>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item">
                            <div class="img-icon"><i class="fa fa-envelope-o"></i></div>
                        </li>
                        <li class="nav-item">
                            <p>support@tipslife.in</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-4 col-sm-6">
        <div class="card card-statistics contact-contant">
            <div class="card-body py-4">
                <div class="d-flex align-items-center">
                    
                    <div class="ml-3">
                        <h4 class="mb-0">Accounts & Billing Department</h4>
                        <p><span class="badge badge-success-inverse px-2 py-1 mt-1">Accounts Office</span></p>
                    </div>
                </div>
                <div>
                    <ul class="nav">
                        <li class="nav-item">
                            <div class="img-icon">
                                <div class="img-icon"><i class="fa fa-mobile"></i></div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <p>026-123-8546</p>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item">
                            <div class="img-icon"><i class="fa fa-phone"></i></div>
                        </li>
                        <li class="nav-item">
                            <p>80-1230-8546</p>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item">
                            <div class="img-icon"><i class="fa fa-envelope-o"></i></div>
                        </li>
                        <li class="nav-item">
                            <p>accounts@tipslife.in</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-4  col-sm-6">
        <div class="card card-statistics contact-contant">
            <div class="card-body py-4">
                <div class="d-flex align-items-center">
                    
                    <div class="ml-3">
                        <h4 class="mb-0">Admin Department</h4>
                        <p><span class="badge badge-primary-inverse px-2 py-1 mt-1">Corporate Office</span></p>
                    </div>
                </div>
                <div>
                    <ul class="nav">
                        <li class="nav-item">
                            <div class="img-icon"><i class="fa fa-mobile"></i></div>
                        </li>
                        <li class="nav-item">
                            <p>026-123-8546</p>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item">
                            <div class="img-icon"><i class="fa fa-phone"></i></div>
                        </li>
                        <li class="nav-item">
                            <p>80-1230-8546</p>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item">
                            <div class="img-icon"><i class="fa fa-envelope-o"></i></div>
                        </li>
                        <li class="nav-item">
                           <p>corporate@tipslife.in</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
     
</div>


<div class="row">
	
	<div class="col-xxl-9 m-b-30">
        <div class="card card-statistics dating-contant h-100 mb-0">
            <div class="card-header">
                <h4 class="card-title">View all tickets <a class="btn btn-round btn-inverse-primary btn-xs float-right" href="<?= base_url(); ?>members/ticket/new_ticket">Add new Ticket</a></h4>
            </div>
            <div class="card-body pt-2 scrollbar scroll_dark mCustomScrollbar _mCS_3 mCS-autoHide" style="height: 300px; position: relative; overflow: visible;"><div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;"><div id="mCSB_3_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped">
                        <thead>
                            <tr>
                                <th class="border-top-0">Ticket No.</th>
                                <th class="border-top-0">User Name</th>
                                <th class="border-top-0">Subject</th>
                                <th class="border-top-0">Priority</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Date</th>
                                <th class="border-top-0">Resolved Date</th>
                                <!-- <th class="border-top-0">Action</th> -->
                            </tr>
                        </thead>
                        <tbody class="text-muted">

                            <?php foreach ($tickets as $key): ?>
                                
                           
                            <tr>
                                <td><?= $key->ticket_no; ?></td>
                                <td>
                                    <div class="bg-img">
                                        <?php $images = json_decode($profile_image, true); ?>
                                         <?php if (file_exists('uploads/profile_image/'.$images[0]['thumb'])): ?>
                                            <img class="img-fluid mCS_img_loaded" src="<?=base_url()?>uploads/profile_image/<?=$images[0]['thumb']?>" alt="user">
                                             <?php else: ?>
                                                <img class="img-fluid mCS_img_loaded" src="<?= base_url(); ?>assets/site_img/nophoto.jpg" alt="user">
                                                 <?php endif ?>
                                        
                                    </div>
                                    <p><?= $key->sponsor_username; ?></p>
                                </td>
                                <td><?= $key->subject; ?></td>
                                <td><?=$this->Crud_model->get_type_name_by_id('priority', $key->priority)?></td>
                                <td> 

                                   <?php if ($key->status == 1) {?> <label class="badge mb-0 badge-success-inverse">Completed</label> <?php } elseif ($key->status == 2) {?> <label class="badge mb-0 badge-warning-inverse">Pending</label> <?php } elseif ($key->status == 3) {?> <label class="badge mb-0 badge-danger-inverse">Cancelled</label> <?php }
                                    ?>

                                   
                                </td>
                                <td><?= date('d/M/Y' , $key->date_at); ?></td>
                                <td><?php
                                     
                                     if ($key->solved_at == null) {
                                         echo "Processing";
                                     } else {
                                          date('d/M/Y' , $key->solved_at);
                                     }

                                ?></td>
                               <!--  <td>
                                    <a href="javascript:void(0)" class="mr-2"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                                    <a href="javascript:void(0)"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                </td> -->
                            </tr>
                            
                             <?php endforeach ?>

                                                     
                        </tbody>
                    </table>
                </div>
            </div></div><div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 167px; max-height: 266px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
        </div>
    </div>

</div>


<script>
    setTimeout(function() {
        $('#success_alert').fadeOut('fast');
        $('#danger_alert').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
</script>