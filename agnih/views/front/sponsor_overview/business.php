<div class="row widget-social">

    <div class="col-xl-3 col-md-5">
        <div class="card card-statistics widget-social-box3">
            <div class="card-body p-0">
                <div class="text-center widget-social-contant py-2">

                    <div class="mt-3">
                        <h4 class="mb-1"><i class="fa fa-address-book-o f-30"></i></h4>
                        <p class="mb-0"><a class="text-white" href="<?= base_url(); ?>home/sponsor_overview/profile/<?= $sponsor_info->sponsor_id; ?>">Profile</a></p>
                    </div>
                </div>
                <ul class="nav justify-content-between text-center px-4 py-4">
                    <li class="flex-fill">
                        <h5 class="mb-0"><a href="<?= base_url(); ?>home/sponsor_overview/profile/<?= $sponsor_info->sponsor_id; ?>">Profile</a></h5>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-5">
        <div class="card card-statistics widget-social-box3">
            <div class="card-body p-0">
                <div class="text-center widget-social-contant py-2">

                    <div class="mt-3">
                        <h4 class="mb-1"><i class="fa fa-money f-30"></i></h4>
                        <p class="mb-0"><a class="text-white" href="<?= base_url(); ?>home/sponsor_overview/earnings/<?= $sponsor_info->sponsor_id; ?>">User Earnings</a></p>
                    </div>
                </div>
                <ul class="nav justify-content-between text-center px-4 py-4">
                    <li class="flex-fill">
                        <h5 class="mb-0"><a href="<?= base_url(); ?>home/sponsor_overview/earnings/<?= $sponsor_info->sponsor_id; ?>">User Earnings</a></h5>
                    </li>

                </ul>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-5">
        <div class="card card-statistics widget-social-box3">
            <div class="card-body p-0">
                <div class="text-center widget-social-contant py-2">

                    <div class="mt-3">
                        <h4 class="mb-1"><i class="fa fa-user-circle-o f-30"></i></h4>
                        <p class="mb-0"><a class="text-white" href="<?= base_url(); ?>home/sponsor_overview/referrals/<?= $sponsor_info->sponsor_id; ?>">Referrals</a></p>
                    </div>
                </div>
                <ul class="nav justify-content-between text-center px-4 py-4">
                    <li class="flex-fill">
                        <h5 class="mb-0"><a href="<?= base_url(); ?>home/sponsor_overview/referrals/<?= $sponsor_info->sponsor_id; ?>">Referrals</a></h5>

                    </li>

                </ul>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-5">
        <div class="card card-statistics widget-social-box3">
            <div class="card-body p-0">
                <div class="text-center widget-social-contant py-2">

                    <div class="mt-3">
                        <h4 class="mb-1"><i class="fa fa-briefcase f-30"></i></h4>
                        <p class="mb-0"><a class="text-white" href="<?= base_url(); ?>home/sponsor_overview/ewallet/<?= $sponsor_info->sponsor_id; ?>">Ewallet</a></p>
                    </div>
                </div>
                <ul class="nav justify-content-between text-center px-4 py-4">
                    <li class="flex-fill">
                        <h5 class="mb-0"><a href="<?= base_url(); ?>home/sponsor_overview/ewallet/<?= $sponsor_info->sponsor_id; ?>">Ewallet</a></h5>

                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-5">
        <div class="card card-statistics widget-social-box3">
            <div class="card-body p-0">
                <div class="text-center widget-social-contant py-2">

                    <div class="mt-3">
                        <h4 class="mb-1"><i class="fa fa-money f-30"></i></h4>
                        <p class="mb-0"><a class="text-white" href="<?= base_url(); ?>home/sponsor_overview/released_income/<?= $sponsor_info->sponsor_id; ?>">Released Income</a></p>
                    </div>
                </div>
                <ul class="nav justify-content-between text-center px-4 py-4">
                    <li class="flex-fill">
                        <h5 class="mb-0"><a href="<?= base_url(); ?>home/sponsor_overview/released_income/<?= $sponsor_info->sponsor_id; ?>">Released Income</a></h5>

                    </li>

                </ul>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-5">
        <div class="card card-statistics widget-social-box3">
            <div class="card-body p-0">
                <div class="text-center widget-social-contant py-2">

                    <div class="mt-3">
                        <h4 class="mb-1"><i class="fa fa-tint f-30"></i></h4>
                        <p class="mb-0"><a class="text-white" target="_blank" href="<?= base_url(); ?>home/genealogy_tree/tree/<?= $sponsor_info->sponsor_id; ?>">Business Volume</a></p>
                    </div>
                </div>
                <ul class="nav justify-content-between text-center px-4 py-4">
                    <li class="flex-fill">
                        <h5 class="mb-0"><a href="<?= base_url(); ?>home/genealogy_tree/tree/<?= $sponsor_info->sponsor_id; ?>" target="_blank">Business Volume</a></h5>

                    </li>

                </ul>
            </div>
        </div>
    </div>

</div>

<div class="row widget-social">

    <div class="col-xl-6 col-md-6">

        <h4>Business Volume: <?= $sponsor_info->username; ?></h4>

    </div>
    <div class="col-xl-6 col-md-6">

        <!-- <h4 class="float-right">User Earnings: binaryhyip</h4> -->

    </div>
</div>


<!-- begin row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatable" class="display compact table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Volume Balance</th>
                                <th>Description</th>
                                <th>Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sponsor_business as $business): ?>
                                                            
                                <tr>
                                    <td><?= $business->username; ?></td>
                                     <?php $new_total = ($this->Crud_model->get_type_name_by_id('package', $business->product, 'commission') / 100) * $this->Crud_model->get_type_name_by_id('package', $business->product, 'fee');
                                         
                                    ?>
                                    <td><?=  $this->Crud_model->get_type_name_by_id('package', $business->product, 'fee') - $new_total; ?></td>
                                    <td>Volume added from Member <?= $business->profile_id; ?> Join</td>
                                    <td><?= $business->created_on; ?></td>
                                   
                                   
                                </tr>

                            <?php endforeach ?>
                           
                        </tbody>
                        <tfoot>
                           <tr>
                                <th>Username</th>
                                <th>Volume Balance</th>
                                <th>Description</th>
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