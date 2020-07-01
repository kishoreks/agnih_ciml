<section class="page-title page-title--style-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <h2 class="heading heading-3 strong-400 mb-0"><?php echo translate('confirm_your_purchase')?></h2>
            </div>
        </div>
    </div>
</section>


<div class="row">
    
    <div class="col-xl-4 col-md-6 offset-4 mt-5">
        <div class="card card-statistics text-center py-3">
            <div class="card-body pricing-content">
                <div class="pricing-content-card">
                    <h5><?= $this->Crud_model->get_type_name_by_id('package', $pum_sponsor->product, 'name'); ?></h5>
                    <h2 class="text-primary pt-3"><i class="fa fa-rupee"></i> <?= $this->Crud_model->get_type_name_by_id('package', $pum_sponsor->product, 'fee'); ?></h2>
                    <!-- <p class="text-primary pb-3">/ Monthly</p> -->
                    <ul class="py-2">
                        <li>Online Payment </li>
                        <li>2 Min To Pay</li>
                        <li>Secure Payment</li>
                        <li>Pay BHIM</li>
                        <li>On any time</li>
                    </ul>
                     
                     <form action="<?= base_url(); ?>members/plans/pum" method="POST" role="form">
                         <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                     <input type="hidden" name="member_id" id="input" class="form-control" value="<?= $pum_sponsor->sponsor_id; ?>">
                     <input type="hidden" name="plan_id" id="input" class="form-control" value="<?= $pum_sponsor->product; ?>">
                    
                     <div class="pt-2">
                         <button type="submit" class="btn btn-primary btn-round btn-sm">Pay Online</button></div>
                     </form>


                    
                </div>
            </div>
        </div>
    </div>

</div>