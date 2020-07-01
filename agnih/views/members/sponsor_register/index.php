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



<div class="row account-contant">
    <div class="col-md-8 offset-2">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">New Members</h4>
                 
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url(); ?>members/sponsor/add_sponsor" method="post" autocomplete="off">
                     <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">

                    <div class="form-group row">
                        <label for="referral" class="col-sm-2 col-form-label"><?= translate('sponsor ID'); ?></label>
                        <div class="col-sm-10">
                            
                             <?php if ($count_referral == 3): ?>
                                <input type="text" class="form-control" id="referral" placeholder="Referral Sponsor ID" name="referral" value="<?php
                                    if (!empty($form_contents)) {
                                        echo $form_contents['referral'];
                                    }else{
                                        echo $this->uri->segment(4);
                                    }
                                    ?>">
                             <?php else: ?>
                                  
                                     <input type="text" name="referral" id="referral" class="form-control" readonly value="<?= $referral->profile_id ?>">
                             <?php endif ?>
                           
                            <?= '<p class="text-danger">' . form_error('referral', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label"><?= translate('username'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" placeholder="Create Username" name="username" value="<?php
                            if (!empty($form_contents)) {
                                echo $form_contents['username'];
                            }
                            ?>">
                           <?= '<p class="text-danger">' . form_error('username', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="full_name" class="col-sm-2 col-form-label"><?= translate('full_name'); ?></label>

                        <div class="col-sm-10">
                            <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Full Name" value="<?php
                                   if (!empty($form_contents)) {
                                       echo $form_contents['full_name'];
                                   }
                                   ?>">
                            <?= '<p class="text-danger">' . form_error('full_name', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>


                    </div>

                    <div class="form-group row">
                        <label for="full_name" class="col-sm-2 col-form-label"><?= translate('last_name'); ?></label>

                        <div class="col-sm-10">
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="<?php
                            if (!empty($form_contents)) {
                                echo $form_contents['last_name'];
                            }
                            ?>">
                           <?= '<p class="text-danger">' . form_error('last_name', '<div class="text-danger">', '</div>') . '</p>' ?>


                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gender" class="col-sm-2 col-form-label"><?= translate('gender'); ?></label>
                        <div class="col-sm-10">
                        <?php
                        echo $this->Crud_model->select_html('gender', 'gender', 'name', 'edit', 'form-control show-tick', $form_contents['gender'], '', '', '');
                        ?>
                            <?= '<p class="text-danger">' . form_error('gender', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label"><?= translate('password'); ?></label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder="***Password***">
                            <?= '<p class="text-danger">' . form_error('password', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="r_password" class="col-sm-2 col-form-label"><?= translate('confirm_Password'); ?></label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="r_password" name="r_password" placeholder="***Confirm Password***">
                            <?= '<p class="text-danger">' . form_error('r_password', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                     

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label"><?= translate('email'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" placeholder="i***@tipslife.in" name="email" value="<?php
							if (!empty($form_contents)) {
							    echo $form_contents['email'];
							}
							?>" autocomplete="off">
                                <?= '<p class="text-danger">' . form_error('email', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label"><?= translate('address'); ?></label>
                        <div class="col-sm-10">
                            <textarea name="address" id="input" class="form-control" placeholder="Address**" rows="3"><?php
                                if (!empty($form_contents)) {
                                    echo $form_contents['address'];
                                }
                                ?></textarea>
                            <?= '<p class="text-danger">' . form_error('address', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label"><?= translate('position'); ?></label>
                        <div class="col-sm-10">
						<?php
						echo $this->Crud_model->select_html('position', 'position', 'name', 'edit', 'form-control show-tick', $form_contents['position'], '', '', '');
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

                            <input type="text" id="date_of_birth" name="date_of_birth" class="form-control date-picker-default" value="Select Date" value="<?php
                            if (!empty($form_contents)) {
                                echo $form_contents['date_of_birth'];
                            }
                            ?>">
                            <?= '<p class="text-danger">' . form_error('date_of_birth', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile_no" class="col-sm-2 col-form-label"><?= translate('mobile_no'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mobile_no" placeholder="98430*****" name="mobile_no" value="<?php
                                   if (!empty($form_contents)) {
                                       echo $form_contents['mobile_no'];
                                   }
                                   ?>" autocomplete="off">
                            <?= '<p class="text-danger">' . form_error('mobile_no', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="back_name" class="col-sm-2 col-form-label"><?= translate('back_name'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="back_name" placeholder="***SBI***" name="back_name" value="<?php
                                   if (!empty($form_contents)) {
                                       echo $form_contents['back_name'];
                                   }
									?>" autocomplete="off">
									<?= '<p class="text-danger">' . form_error('back_name', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="account_no" class="col-sm-2 col-form-label"><?= translate('account_no'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="account_no" placeholder="33458******" name="account_no" value="<?php
							if (!empty($form_contents)) {
							    echo $form_contents['account_no'];
							}
							?>" autocomplete="off">
                            <?= '<p class="text-danger">' . form_error('account_no', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="branch_name" class="col-sm-2 col-form-label"><?= translate('branch_name'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="branch_name" placeholder="***Branch Name***" name="branch_name" value="<?php
                            if (!empty($form_contents)) {
                                echo $form_contents['branch_name'];
                            }
                            ?>" autocomplete="off">
                            <?= '<p class="text-danger">' . form_error('branch_name', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ifsc" class="col-sm-2 col-form-label"><?= translate('ifsc'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ifsc" placeholder="***IFSC Code***" name="ifsc_code" value="<?php
                            if (!empty($form_contents)) {
                                echo $form_contents['ifsc_code'];
                            }
                            ?>" autocomplete="off">
                            <?= '<p class="text-danger">' . form_error('ifsc', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="google_pay" class="col-sm-2 col-form-label"><?= translate('google_pay'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="google_pay" placeholder="***google pay***" name="google_pay" value="<?php
                            if (!empty($form_contents)) {
                                echo $form_contents['google_pay'];
                            }
                            ?>" autocomplete="off">
                            <?= '<p class="text-danger">' . form_error('google_pay', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="bhim" class="col-sm-2 col-form-label"><?= translate('bhim'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="bhim" placeholder="***BHIM***" name="bhim" value="<?php
                            if (!empty($form_contents)) {
                                echo $form_contents['bhim'];
                            }
                            ?>" autocomplete="off">
                            <?= '<p class="text-danger">' . form_error('bhim', '<div class="text-danger">', '</div>') . '</p>' ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="payments" class="col-sm-2 col-form-label"><?= translate('payments'); ?></label>
                        <div class="col-sm-10">
						<?php
						echo $this->Crud_model->select_html('payoptions', 'payments', 'name', 'edit', 'form-control show-tick', $form_contents['payments'], '', '', '');
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

<script>
    setTimeout(function () {
        $('#success_alert').fadeOut('fast');
        $('#danger_alert').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
</script>