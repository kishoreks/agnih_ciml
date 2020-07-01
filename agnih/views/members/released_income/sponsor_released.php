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

<!-- begin row -->

<div class="row">   
    <div class="col-xxl-4 h-100 o-hidden">

        <div class="card card-statistics h-50 m-b-30 bg-pink">
            <div class="card-body">
                <div class="d-block d-sm-flex p-3">
                    <div class="mb-3 mb-sm-0 mr-sm-2">
                        <h5 class="text-white mb-1">Total # of Released Amount</h5>
                        <h2 class="text-white mb-0"><small><?= date('D-M-Y'); ?></small></h2>
                    </div>
                    <div class="ml-auto">
                        <h5 class="text-white mb-1"><?= $this->Crud_model->get_type_name_by_id('sponsor', $this->session->userdata('sponsor_id'), 'username'); ?></h5>
                        <h2 class="text-white mb-0"><?= $this->Crud_model->get_type_name_by_id('sponsor', $this->session->userdata('sponsor_id'), 'profile_id'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$package_id = $this->Crud_model->get_type_name_by_id('sponsor', $this->session->userdata('sponsor_id'), 'product');
$package_fee = $this->Crud_model->get_type_name_by_id('package', $package_id, 'fee');
$package_commission = $this->Crud_model->get_type_name_by_id('package', $package_id, 'commission');
$C_1 = intval(3 * $package_fee * $package_commission / 100);
$C_2 = intval(9 * $package_fee * $package_commission / 100);
$C_3 = intval(27 * $package_fee * $package_commission / 100);
$C_4 = intval(81 * $package_fee * $package_commission / 100);
$C_5 = intval(243 * $package_fee * $package_commission / 100);
$C_6 = intval(729 * $package_fee * $package_commission / 100);
$C_7 = intval(2187 * $package_fee * $package_commission / 100);
$C_8 = intval(6561 * $package_fee * $package_commission / 100);
//$S_1 =    
?>
<div class="row">      


    <?php foreach ($downlist as $level_d1): ?>

        <?php
        $product_id_d1 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d1['sponsor_id'], 'product');
        $product_fee_d1 = $this->Crud_model->get_type_name_by_id('package', $product_id_d1, 'fee');
        $product_commission_d1 = $this->Crud_model->get_type_name_by_id('package', $product_id_d1, 'commission');
        $math_d1 = math($product_fee_d1, $product_commission_d1);
        @$totel_d1 += $math_d1;
        $D1 = intval($totel_d1);
        ?>

        <?php foreach ($level_d1['L_1'] as $level_d2): ?>

            <?php
            $product_id_d2 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d2['sponsor_id'], 'product');
            $product_fee_d2 = $this->Crud_model->get_type_name_by_id('package', $product_id_d2, 'fee');
            $product_commission_d2 = $this->Crud_model->get_type_name_by_id('package', $product_id_d2, 'commission');
            $math_d2 = math($product_fee_d2, $product_commission_d2);
            @$totel_d2 += $math_d2;
            $D2 = intval($totel_d2);
            ?>                     

            <?php foreach ($level_d2['L_2'] as $level_d3): ?>
                <?php
                $product_id_d3 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d3['sponsor_id'], 'product');
                $product_fee_d3 = $this->Crud_model->get_type_name_by_id('package', $product_id_d3, 'fee');
                $product_commission_d3 = $this->Crud_model->get_type_name_by_id('package', $product_id_d3, 'commission');
                $math_d3 = math($product_fee_d3, $product_commission_d3);
                @$totel_d3 += $math_d3;
                $D3 = intval($totel_d3);
                ?>  

                <?php foreach ($level_d3['L_3'] as $level_d4): ?>

                    <?php
                    $product_id_d4 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d4['sponsor_id'], 'product');
                    $product_fee_d4 = $this->Crud_model->get_type_name_by_id('package', $product_id_d4, 'fee');
                    $product_commission_d4 = $this->Crud_model->get_type_name_by_id('package', $product_id_d4, 'commission');
                    $math_d4 = math($product_fee_d4, $product_commission_d4);
                    @$totel_d4 += $math_d4;
                    $D4 = intval($totel_d4);
                    ?> 

                    <?php foreach ($level_d4['L_4'] as $level_d5): ?>

                        <?php
                        $product_id_d5 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d5['sponsor_id'], 'product');
                        $product_fee_d5 = $this->Crud_model->get_type_name_by_id('package', $product_id_d5, 'fee');
                        $product_commission_d5 = $this->Crud_model->get_type_name_by_id('package', $product_id_d5, 'commission');
                        $math_d5 = math($product_fee_d5, $product_commission_d5);
                        @$totel_d5 += $math_d5;
                        $D5 = intval($totel_d5);
                        ?> 

                        <?php foreach ($level_d5['L_5'] as $level_d6): ?>

                            <?php
                            $product_id_d6 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d6['sponsor_id'], 'product');
                            $product_fee_d6 = $this->Crud_model->get_type_name_by_id('package', $product_id_d6, 'fee');
                            $product_commission_d6 = $this->Crud_model->get_type_name_by_id('package', $product_id_d6, 'commission');
                            $math_d6 = math($product_fee_d6, $product_commission_d6);
                            @$totel_d6 += $math_d6;
                            $D6 = intval($totel_d6);
                            ?> 


                            <?php foreach ($level_d6['L_6'] as $level_d7): ?>

                                <?php
                                $product_id_d7 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d7['sponsor_id'], 'product');
                                $product_fee_d7 = $this->Crud_model->get_type_name_by_id('package', $product_id_d7, 'fee');
                                $product_commission_d7 = $this->Crud_model->get_type_name_by_id('package', $product_id_d7, 'commission');
                                $math_d7 = math($product_fee_d7, $product_commission_d7);
                                @$totel_d7 += $math_d7;
                                $D7 = intval($totel_d7);
                                ?> 

                                <?php foreach ($level_d7['L_7'] as $level_d8): ?>

                                    <?php
                                    $product_id_d8 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d8['sponsor_id'], 'product');
                                    $product_fee_d8 = $this->Crud_model->get_type_name_by_id('package', $product_id_d8, 'fee');
                                    $product_commission_d8 = $this->Crud_model->get_type_name_by_id('package', $product_id_d8, 'commission');
                                    $math_d8 = math($product_fee_d8, $product_commission_d8);
                                    @$totel_d8 += $math_d8;
                                    $D8 = intval($totel_d8);
                                    ?> 

                                    <?php foreach ($level_d8['L_8'] as $level_d9): ?>

                                        <?php
                                        $product_id_d9 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d9['sponsor_id'], 'product');
                                        $product_fee_d9 = $this->Crud_model->get_type_name_by_id('package', $product_id_d9, 'fee');
                                        $product_commission_d9 = $this->Crud_model->get_type_name_by_id('package', $product_id_d9, 'commission');
                                        $math_d9 = math($product_fee_d9, $product_commission_d9);
                                        @$totel_d9 += $math_d9;
                                        $D9 = intval($totel_d9);
                                        ?> 

                                    <?php endforeach ?>

                                <?php endforeach ?>

                            <?php endforeach ?>

                        <?php endforeach ?>

                    <?php endforeach ?>

                <?php endforeach ?>

            <?php endforeach ?>

        <?php endforeach ?>

    <?php endforeach ?>

    <?php $level1_yes = $this->db->get_where('released_income', array('sponsor_id' => $this->session->userdata('sponsor_id'), 'level' => 'level1'))->row(); ?>

    <?php if ($level1_yes == false): ?>



        <?php if ($C_1 == $D1): ?>
            <div class="col-lg-12 col-xxl-6 m-b-30 progress-bar progress-bar-striped progress-bar-animated">
                <div class="card card-statistics h-100 mb-0">
                    <div class="card-body ">

                        <div class="d-flex h-100 ">
                            <h4 class="f-26 mb-0 mt-2"> <i class="fa fa-money"></i> <span class="text-primary">Congrats</span> Eligible To Claim The Amount <span class="count mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-primary-inverse"><i class="fa fa-rupee"></i> <?= $D1; ?></span></h4>

                            <div class="align-self-center ml-auto">
                                <h3 class="f-26 mb-0"><button class="btn btn-block btn-inverse-success" data-toggle="modal" data-target="#level1"><i class="zmdi zmdi-ticket-star"></i> Claim Now</button></h3>
                            </div>

                        </div>
                    </div>
                </div>                                              
            </div> 

            <!-- Default -->
            <div class="modal fade" id="level1" tabindex="-1" role="dialog" aria-labelledby="level1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Claim The Amount</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>members/released_income/sponsor_released_pay" method="POST" role="form">
                                <?php
                                $csrf = array(
                                    'name' => $this->security->get_csrf_token_name(),
                                    'hash' => $this->security->get_csrf_hash()
                                );
                                ?>
                                <input type="hidden" name="<?= $csrf['name']; ?>" id="input" class="form-control" value="<?= $csrf['hash']; ?>">

                                <div class="form-group">
                                    <label for="Amount">Amount</label>
                                    <input type="text" class="form-control" id="Amount" name="paid_amount" readonly value="<?= $D1; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Amount">level</label>
                                    <input type="text" class="form-control" id="Amount" name="level" readonly value="level1">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Claim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Scrolling -->
        <?php endif ?>

    <?php endif ?>

    <?php $level2_yes = $this->db->get_where('released_income', array('sponsor_id' => $this->session->userdata('sponsor_id'), 'level' => 'level2'))->row(); ?>

    <?php if ($level2_yes == false): ?>

        <?php if ($C_2 == $D2): ?>
            <div class="col-lg-12 col-xxl-6 m-b-30 progress-bar progress-bar-striped progress-bar-animated">
                <div class="card card-statistics h-100 mb-0">
                    <div class="card-body ">

                        <div class="d-flex h-100 ">
                            <h4 class="f-26 mb-0 mt-2"> <i class="fa fa-money"></i> <span class="text-primary">Congrats</span> Eligible To Claim The Amount <span class="count mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-primary-inverse"><i class="fa fa-rupee"></i> <?= $D2; ?></span></h4>

                            <div class="align-self-center ml-auto">
                                <h3 class="f-26 mb-0"><button class="btn btn-block btn-inverse-success" data-toggle="modal" data-target="#level2"><i class="zmdi zmdi-ticket-star"></i> Claim Now</button></h3>
                            </div>

                        </div>
                    </div>
                </div>                                              
            </div> 

            <!-- Default -->
            <div class="modal fade" id="level2" tabindex="-1" role="dialog" aria-labelledby="level2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Claim The Amount</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>members/released_income/sponsor_released_pay" method="POST" role="form">
                                <?php
                                $csrf = array(
                                    'name' => $this->security->get_csrf_token_name(),
                                    'hash' => $this->security->get_csrf_hash()
                                );
                                ?>
                                <input type="hidden" name="<?= $csrf['name']; ?>" id="input" class="form-control" value="<?= $csrf['hash']; ?>">

                                <div class="form-group">
                                    <label for="Amount">Amount</label>
                                    <input type="text" class="form-control" id="Amount" name="paid_amount" readonly value="<?= $D2; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Amount">level</label>
                                    <input type="text" class="form-control" id="Amount" name="level" readonly value="level2">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Claim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Scrolling -->
    <?php endif ?>
    <?php endif ?>

    <?php $level3_yes = $this->db->get_where('released_income', array('sponsor_id' => $this->session->userdata('sponsor_id'), 'level' => 'level3'))->row(); ?>

    <?php if ($level3_yes == false): ?>


    <?php if ($C_3 == $D3): ?>
            <div class="col-lg-12 col-xxl-6 m-b-30 progress-bar progress-bar-striped progress-bar-animated">
                <div class="card card-statistics h-100 mb-0">
                    <div class="card-body ">

                        <div class="d-flex h-100 ">
                            <h4 class="f-26 mb-0 mt-2"> <i class="fa fa-money"></i> <span class="text-primary">Congrats</span> Eligible To Claim The Amount <span class="count mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-primary-inverse"><i class="fa fa-rupee"></i> <?= $D3; ?></span></h4>

                            <div class="align-self-center ml-auto">
                                <h3 class="f-26 mb-0">

                                    <h3 class="f-26 mb-0"><button class="btn btn-block btn-inverse-success" data-toggle="modal" data-target="#level3"><i class="zmdi zmdi-ticket-star"></i> Claim Now</button></h3>
                                </h3>
                            </div>

                        </div>
                    </div>
                </div>                                              
            </div> 

            <!-- Default -->
            <div class="modal fade" id="level3" tabindex="-1" role="dialog" aria-labelledby="level3" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Claim The Amount</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>members/released_income/sponsor_released_pay" method="POST" role="form">
        <?php
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        ?>
                                <input type="hidden" name="<?= $csrf['name']; ?>" id="input" class="form-control" value="<?= $csrf['hash']; ?>">

                                <div class="form-group">
                                    <label for="Amount">Amount</label>
                                    <input type="text" class="form-control" id="Amount" name="paid_amount" readonly value="<?= $D3; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Amount">level</label>
                                    <input type="text" class="form-control" id="Amount" name="level" readonly value="level3">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Claim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Scrolling -->
    <?php endif ?>
<?php endif ?>

    <?php $level4_yes = $this->db->get_where('released_income', array('sponsor_id' => $this->session->userdata('sponsor_id'), 'level' => 'level4'))->row(); ?>

    <?php if ($level4_yes == false): ?>    

        <?php if ($C_4 == $D4): ?>
            <div class="col-lg-12 col-xxl-6 m-b-30 progress-bar progress-bar-striped progress-bar-animated">
                <div class="card card-statistics h-100 mb-0">
                    <div class="card-body ">

                        <div class="d-flex h-100 ">
                            <h4 class="f-26 mb-0 mt-2"> <i class="fa fa-money"></i> <span class="text-primary">Congrats</span> Eligible To Claim The Amount <span class="count mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-primary-inverse"><i class="fa fa-rupee"></i> <?= $D4; ?></span></h4>

                            <div class="align-self-center ml-auto">
                                <h3 class="f-26 mb-0"><button class="btn btn-block btn-inverse-success" data-toggle="modal" data-target="#level4"><i class="zmdi zmdi-ticket-star"></i> Claim Now</button></h3>
                            </div>

                        </div>
                    </div>
                </div>                                              
            </div> 

            <!-- Default -->
            <div class="modal fade" id="level4" tabindex="-1" role="dialog" aria-labelledby="level4" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Claim The Amount</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>members/released_income/sponsor_released_pay" method="POST" role="form">
        <?php
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        ?>
                                <input type="hidden" name="<?= $csrf['name']; ?>" id="input" class="form-control" value="<?= $csrf['hash']; ?>">

                                <div class="form-group">
                                    <label for="Amount">Amount</label>
                                    <input type="text" class="form-control" id="Amount" name="paid_amount" readonly value="<?= $D4; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Amount">level</label>
                                    <input type="text" class="form-control" id="Amount" name="level" readonly value="level4">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Claim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Scrolling -->
    <?php endif ?>
<?php endif ?>
<?php $level5_yes = $this->db->get_where('released_income', array('sponsor_id' => $this->session->userdata('sponsor_id'), 'level' => 'level5'))->row(); ?>

    <?php if ($level5_yes == false): ?>    

        <?php if ($C_5 == $D5): ?>
            <div class="col-lg-12 col-xxl-6 m-b-30 progress-bar progress-bar-striped progress-bar-animated">
                <div class="card card-statistics h-100 mb-0">
                    <div class="card-body ">

                        <div class="d-flex h-100 ">
                            <h4 class="f-26 mb-0 mt-2"> <i class="fa fa-money"></i> <span class="text-primary">Congrats</span> Eligible To Claim The Amount <span class="count mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-primary-inverse"><i class="fa fa-rupee"></i> <?= $D5; ?></span></h4>

                            <div class="align-self-center ml-auto">
                                <h3 class="f-26 mb-0"><button class="btn btn-block btn-inverse-success" data-toggle="modal" data-target="#level5"><i class="zmdi zmdi-ticket-star"></i> Claim Now</button></h3>
                            </div>

                        </div>
                    </div>
                </div>                                              
            </div> 

            <!-- Default -->
            <div class="modal fade" id="level5" tabindex="-1" role="dialog" aria-labelledby="level5" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Claim The Amount</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>members/released_income/sponsor_released_pay" method="POST" role="form">
        <?php
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        ?>
                                <input type="hidden" name="<?= $csrf['name']; ?>" id="input" class="form-control" value="<?= $csrf['hash']; ?>">

                                <div class="form-group">
                                    <label for="Amount">Amount</label>
                                    <input type="text" class="form-control" id="Amount" name="paid_amount" readonly value="<?= $D5; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Amount">level</label>
                                    <input type="text" class="form-control" id="Amount" name="level" readonly value="level5">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Claim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Scrolling -->
    <?php endif ?>
<?php endif ?>

<?php $level6_yes = $this->db->get_where('released_income', array('sponsor_id' => $this->session->userdata('sponsor_id'), 'level' => 'level6'))->row(); ?>

    <?php if ($level6_yes == false): ?>    

        <?php if ($C_6 == $D6): ?>
            <div class="col-lg-12 col-xxl-6 m-b-30 progress-bar progress-bar-striped progress-bar-animated">
                <div class="card card-statistics h-100 mb-0">
                    <div class="card-body ">

                        <div class="d-flex h-100 ">
                            <h4 class="f-26 mb-0 mt-2"> <i class="fa fa-money"></i> <span class="text-primary">Congrats</span> Eligible To Claim The Amount <span class="count mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-primary-inverse"><i class="fa fa-rupee"></i> <?= $D6; ?></span></h4>

                            <div class="align-self-center ml-auto">
                                <h3 class="f-26 mb-0"><button class="btn btn-block btn-inverse-success" data-toggle="modal" data-target="#level6"><i class="zmdi zmdi-ticket-star"></i> Claim Now</button></h3>
                            </div>

                        </div>
                    </div>
                </div>                                              
            </div> 

            <!-- Default -->
            <div class="modal fade" id="level6" tabindex="-1" role="dialog" aria-labelledby="level6" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Claim The Amount</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>members/released_income/sponsor_released_pay" method="POST" role="form">
        <?php
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        ?>
                                <input type="hidden" name="<?= $csrf['name']; ?>" id="input" class="form-control" value="<?= $csrf['hash']; ?>">

                                <div class="form-group">
                                    <label for="Amount">Amount</label>
                                    <input type="text" class="form-control" id="Amount" name="paid_amount" readonly value="<?= $D6; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Amount">level</label>
                                    <input type="text" class="form-control" id="Amount" name="level" readonly value="level6">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Claim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Scrolling -->
    <?php endif ?>
<?php endif ?>

<?php $level7_yes = $this->db->get_where('released_income', array('sponsor_id' => $this->session->userdata('sponsor_id'), 'level' => 'level7'))->row(); ?>

    <?php if ($level7_yes == false): ?>    

        <?php if ($C_7 == $D7): ?>
            <div class="col-lg-12 col-xxl-6 m-b-30 progress-bar progress-bar-striped progress-bar-animated">
                <div class="card card-statistics h-100 mb-0">
                    <div class="card-body ">

                        <div class="d-flex h-100 ">
                            <h4 class="f-26 mb-0 mt-2"> <i class="fa fa-money"></i> <span class="text-primary">Congrats</span> Eligible To Claim The Amount <span class="count mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-primary-inverse"><i class="fa fa-rupee"></i> <?= $D7; ?></span></h4>

                            <div class="align-self-center ml-auto">
                                <h3 class="f-26 mb-0"><button class="btn btn-block btn-inverse-success" data-toggle="modal" data-target="#level7"><i class="zmdi zmdi-ticket-star"></i> Claim Now</button></h3>
                            </div>

                        </div>
                    </div>
                </div>                                              
            </div> 

            <!-- Default -->
            <div class="modal fade" id="level7" tabindex="-1" role="dialog" aria-labelledby="level7" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Claim The Amount</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>members/released_income/sponsor_released_pay" method="POST" role="form">
        <?php
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        ?>
                                <input type="hidden" name="<?= $csrf['name']; ?>" id="input" class="form-control" value="<?= $csrf['hash']; ?>">

                                <div class="form-group">
                                    <label for="Amount">Amount</label>
                                    <input type="text" class="form-control" id="Amount" name="paid_amount" readonly value="<?= $D7; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Amount">level</label>
                                    <input type="text" class="form-control" id="Amount" name="level" readonly value="level7">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Claim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Scrolling -->
    <?php endif ?>
<?php endif ?>

<?php $level8_yes = $this->db->get_where('released_income', array('sponsor_id' => $this->session->userdata('sponsor_id'), 'level' => 'level8'))->row(); ?>

<?php if ($level8_yes == false): ?>    

        <?php if ($C_8 == $D8): ?>
            <div class="col-lg-12 col-xxl-6 m-b-30 progress-bar progress-bar-striped progress-bar-animated">
                <div class="card card-statistics h-100 mb-0">
                    <div class="card-body ">

                        <div class="d-flex h-100 ">
                            <h4 class="f-26 mb-0 mt-2"> <i class="fa fa-money"></i> <span class="text-primary">Congrats</span> Eligible To Claim The Amount <span class="count mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-primary-inverse"><i class="fa fa-rupee"></i> <?= $D8; ?></span></h4>

                            <div class="align-self-center ml-auto">
                                <h3 class="f-26 mb-0"><button class="btn btn-block btn-inverse-success" data-toggle="modal" data-target="#level8"><i class="zmdi zmdi-ticket-star"></i> Claim Now</button></h3>
                            </div>

                        </div>
                    </div>
                </div>                                              
            </div> 

            <!-- Default -->
            <div class="modal fade" id="level8" tabindex="-1" role="dialog" aria-labelledby="level8" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Claim The Amount</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>members/released_income/sponsor_released_pay" method="POST" role="form">
        <?php
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        ?>
                                <input type="hidden" name="<?= $csrf['name']; ?>" id="input" class="form-control" value="<?= $csrf['hash']; ?>">

                                <div class="form-group">
                                    <label for="Amount">Amount</label>
                                    <input type="text" class="form-control" id="Amount" name="paid_amount" readonly value="<?= $D8; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Amount">level</label>
                                    <input type="text" class="form-control" id="Amount" name="level" readonly value="level8">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Claim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Scrolling -->
    <?php endif ?>
<?php endif ?>
</div>

<!-- begin row -->
<div class="row">
    <div class="col-lg-12">
        <div class="col-xxl-6 m-b-30">
            <div class="card card-statistics h-100 mb-0">
                <div class="card-header d-sm-flex justify-content-between align-items-center py-3">
                    <div class="card-heading mb-3 mb-sm-0">
                        <h4 class="card-title">Released Income</h4>
                    </div>
                    <div class="dropdown">
                       <!--  <input type="text" class="form-control form-control-sm" placeholder="Search Invoice" /> -->
                    </div>
                </div>
                <div class="card-body scrollbar scroll_dark" style="max-height: 420px;">
                    <div class="d-xxs-flex align-items-center">

                    </div>
                    <div class="d-none d-sm-flex progress m-t-20 m-b-0" style="height: 5px;">

                        <div class="progress-bar bg-info" role="progressbar" style="width: 33.3%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 33.3%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="row no-gutters">

                        <div class="col-4 col-xxs-4 ">
                            <p>Open</p>

                        </div>
                        <div class="col-4 col-xxs-4 ">
                            <p>Pressing</p>

                        </div>
                        <div class="col-5 col-xxs-4 ">
                            <p>Paid</p>

                        </div>
                    </div>
                    <div class="table-responsive m-t-20">
                        <table id="datatable-buttons" class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Paid Date</th>
                                    <th>Paid Amount </th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-muted">
                             <?php $i = 1; ?>
                                <?php foreach ($released_income as $row): ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= date('D-M-Y H:s a', $row->paid_date); ?></td>
                                        <td><i class="fa fa-rupee"></i> <?= number_format($row->paid_amount); ?></td>
                                        <td>
                                            <label class="badge mb-0 badge-<?php if ($row->status == "Open") {
                                                echo "info";
                                            } elseif ($row->status == "Pressing") {
                                                echo "warning";
                                            } elseif ($row->status == "Paid") {
                                                echo "success";
                                            } ?>-inverse"> <?= $row->status; ?></label>
                                        </td>

                                    </tr>
                                <?php $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->