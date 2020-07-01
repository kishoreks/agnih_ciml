<div class="row account-contant">
    <div class="col-md-8 offset-2">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">Edit Members</h4>
                 
                </div>
            </div>
            
            <div class="card-body">
                <form action="<?= base_url(); ?>members/sponsor/update_sponsor/<?= $sponsor_get->sponsor_id; ?>" method="post" autocomplete="off">

                    <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">

                    <div class="form-group row">
                        <label for="referral" class="col-sm-2 col-form-label"><?= translate('referral'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="referral" placeholder="referral" name="username" value="<?= $referral->username; ?>" readonly>
                            <?= '<p class="text-danger">' . form_error('referral', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label"><?= translate('username'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?= $sponsor_get->username; ?>" readonly>
                           <?= '<p class="text-danger">' . form_error('username', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="full_name" class="col-sm-2 col-form-label"><?= translate('full_name'); ?></label>

                        <div class="col-sm-10">
                            <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Full Name" value="<?php
                                   echo $sponsor_get->full_name;
                                   ?>">
                            <?= '<p class="text-danger">' . form_error('full_name', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>


                    </div>

                    <div class="form-group row">
                        <label for="full_name" class="col-sm-2 col-form-label"><?= translate('last_name'); ?></label>

                        <div class="col-sm-10">
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="<?= $sponsor_get->last_name;
                            ?>">
                           <?= '<p class="text-danger">' . form_error('last_name', '<div class="text-danger">', '</div>') . '</p>' ?>


                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label"><?= translate('password'); ?></label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <?= '<p class="text-danger">' . form_error('password', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="r_password" class="col-sm-2 col-form-label"><?= translate('confirm_Password'); ?></label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="r_password" name="r_password" placeholder="Confirm Password">
                            <?= '<p class="text-danger">' . form_error('r_password', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label"><?= translate('email'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" placeholder="info@tipslife.in" name="email" value="<?= $sponsor_get->email;
                            ?>" autocomplete="off">
                                <?= '<p class="text-danger">' . form_error('email', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label"><?= translate('address'); ?></label>
                        <div class="col-sm-10">
                            <textarea name="address" id="input" class="form-control" placeholder="Address " rows="3"><?= $sponsor_get->address;
                                ?></textarea>
                            <?= '<p class="text-danger">' . form_error('address', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label"><?= translate('gender'); ?></label>
                        <div class="col-sm-10">
                         <?php
                                                    echo $this->Crud_model->select_html('gender', 'gender', 'name', 'edit', 'form-control form-control-md selectpicker', $sponsor_get->gender, '', '', '');
                                                ?>
                            <?= '<p class="text-danger">' . form_error('gender', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label"><?= translate('position'); ?></label>
                        <div class="col-sm-10">
						 <?php
                                                    echo $this->Crud_model->select_html('position', 'position', 'name', 'edit', 'form-control form-control-md selectpicker', $sponsor_get->position, '', '', '');
                                                ?>
                            <?= '<p class="text-danger">' . form_error('position', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label"><?= translate('product'); ?></label>
                        <div class="col-sm-10">
                            <select name="product" id="input" class="form-control" required="required">
                                <option value="<?= $this->session->userdata('sponsor_product'); ?>"><?= $this->Crud_model->get_type_name_by_id('package', $this->session->userdata('sponsor_product')) ?> </option>
                            </select>
                                   <?= '<p class="text-danger">' . form_error('product', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="date_of_birth" class="col-sm-2 col-form-label"><?= translate('date_of_birth'); ?></label>
                        <div class="col-sm-10">

                            <input type="text" id="date_of_birth" name="date_of_birth" class="form-control date-picker-default" value="Select Date" value="<?= $sponsor_get->date_of_birth; ?>">
                            <?= '<p class="text-danger">' . form_error('date_of_birth', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile_no" class="col-sm-2 col-form-label"><?= translate('mobile_no'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mobile_no" placeholder="9843098430" name="mobile_no" value=<?= $sponsor_get->mobile_no; ?>" autocomplete="off">
                            <?= '<p class="text-danger">' . form_error('mobile_no', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="back_name" class="col-sm-2 col-form-label"><?= translate('back_name'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="back_name" placeholder="ICICI" name="back_name" value="<?= $sponsor_get->back_name; ?>" autocomplete="off">
									<?= '<p class="text-danger">' . form_error('back_name', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="account_no" class="col-sm-2 col-form-label"><?= translate('account_no'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="account_no" placeholder="334589669358" name="account_no" value="<?= $sponsor_get->account_no; ?>" autocomplete="off">
                            <?= '<p class="text-danger">' . form_error('account_no', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="branch_name" class="col-sm-2 col-form-label"><?= translate('branch_name'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="branch_name" placeholder="Branch Name" name="branch_name" value="<?= $sponsor_get->branch_name; ?>" autocomplete="off">
                            <?= '<p class="text-danger">' . form_error('branch_name', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ifsc" class="col-sm-2 col-form-label"><?= translate('ifsc'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ifsc" placeholder="IFSC Code" name="ifsc_code" value="<?= $sponsor_get->ifsc; ?>" autocomplete="off">
                            <?= '<p class="text-danger">' . form_error('ifsc', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="payments" class="col-sm-2 col-form-label"><?= translate('payments'); ?></label>
                        <div class="col-sm-10">
						  <?php
                                                    echo $this->Crud_model->select_html('payoptions', 'payment_type', 'name', 'edit', 'form-control form-control-md selectpicker', $sponsor_get->payment_type, '', '', '');
                                                ?>
                        <?= '<p class="text-danger">' . form_error('payments', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary text-uppercase float-right">Submit</button>

                </form>
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