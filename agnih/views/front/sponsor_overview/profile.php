
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

    <div class="col-xl-12 col-md-12">
        <div class="card card-statistics widget-social-box3">
            <div class="card-body p-0">
                <div class="text-center widget-social-contant py-5">
                    <?php
                    $image = json_decode($sponsor_info->profile_image);
                    ?>
                    <div class="bg-img m-auto"><img class="img-fluid" src="<?= base_url(); ?>uploads/profile_image/<?= $image[0]->thumb; ?>" alt="socialwidget-img"></div>
                    <div class="mt-3">
                        <h4 class="mb-1"><?= $sponsor_info->full_name; ?></h4>
                        <p class="mb-0"><a class="text-white" href="<?= base_url(); ?>home/sponsor_overview/profile/<?= $sponsor_info->sponsor_id; ?>"><?= $sponsor_info->username; ?></a></p>
                    </div>
                </div>
                <ul class="nav justify-content-between text-center px-4 py-4">
                    <li class="flex-fill">
                        <h5 class="mb-0"><?= $sponsor_info->full_name; ?> <?= $sponsor_info->last_name; ?></h5>

                    </li>
                    <li class="flex-fill">
                        <h5 class="mb-0">+91 <?= $sponsor_info->mobile_no; ?></h5>
                    </li>
                    <li class="flex-fill">
                        <h5 class="mb-0"><?= $sponsor_info->email; ?></h5>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>

<div class="row tabs-contant">

    <div class="col-xxl-6">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">Sponsor Information</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="tab nav-border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-02-tab" data-toggle="tab" href="#home-02" role="tab" aria-controls="home-02" aria-selected="false">Personal Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02" role="tab" aria-controls="profile-02" aria-selected="false">Contact Information </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="portfolio-02-tab" data-toggle="tab" href="#portfolio-02" role="tab" aria-controls="portfolio-02" aria-selected="false">Bank Information </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade py-3 active show" id="home-02" role="tabpanel" aria-labelledby="home-02-tab">

                            <div class="col-xl-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <h4 class="card-title">Personal Information</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                              <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">First Name</label>
                                                    <input type="text" class="form-control" id="inputEmail4" value="<?= $sponsor_info->full_name ?>" disabled="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Last Name</label>
                                                    <input type="text" class="form-control" id="inputPassword4" value="<?= $sponsor_info->last_name ?>" disabled="">
                                                </div>
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Member Id </label>
                                                    <input type="text" class="form-control" id="inputEmail4" value="<?= $sponsor_info->profile_id ?>" disabled="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Email</label>
                                                    <input type="text" class="form-control" id="inputPassword4" value="<?= $sponsor_info->email ?>" disabled="">
                                                </div>
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Active Product </label>
                                                    <input type="text" class="form-control" id="inputEmail4" value="<?= $this->Crud_model->get_type_name_by_id('package', $sponsor_info->product) ?>" disabled="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Date Of Birth</label>
                                                    <input type="text" class="form-control" id="inputPassword4" value="<?= $sponsor_info->date_of_birth ?>" disabled="">
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="tab-pane fade py-3" id="profile-02" role="tabpanel" aria-labelledby="profile-02-tab">
                            <div class="col-xl-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <h4 class="card-title">Contact Information</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                              <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Username</label>
                                                    <input type="text" class="form-control" id="inputEmail4" value="<?= $sponsor_info->username ?>" disabled="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Email</label>
                                                    <input type="text" class="form-control" id="inputPassword4" value="<?= $sponsor_info->email ?>" disabled="">
                                                </div>
                                            </div>     
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Address</label>

                                                    <textarea name="" id="input" class="form-control" rows="3" disabled=""><?= $sponsor_info->address ?></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Name</label>
                                                    <input type="text" class="form-control" id="inputPassword4" value="<?= $sponsor_info->full_name ?>" disabled="">
                                                </div>
                                            </div>                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade py-3" id="portfolio-02" role="tabpanel" aria-labelledby="portfolio-02-tab">
                            <div class="col-xl-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <h4 class="card-title">Bank Information</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                              <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Bank Name</label>
                                                    <input type="text" class="form-control" id="inputEmail4" value="<?= $sponsor_info->back_name; ?>" disabled="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Account Number</label>
                                                    <input type="text" class="form-control" id="inputPassword4" value="<?= $sponsor_info->account_no; ?>" disabled="">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Branch Name</label>
                                                    <input type="text" class="form-control" id="inputEmail4" value="<?= $sponsor_info->branch_name; ?>" disabled="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">IFSC</label>
                                                    <input type="text" class="form-control" id="inputPassword4" value="<?= $sponsor_info->ifsc; ?>" disabled="">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Google Pay Number</label>
                                                    <input type="text" class="form-control" id="inputEmail4" value="<?= $sponsor_info->google_pay; ?>" disabled="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">BHIM</label>
                                                    <input type="text" class="form-control" id="inputPassword4" value="<?= $sponsor_info->bhim; ?>" disabled="">
                                                </div>
                                            </div>

                                        </form>
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