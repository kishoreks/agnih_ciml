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
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatable" class="display compact table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Profile ID</th>
                                <th>Username</th>
                                <th>Mobile</th>
                                <th>Profile Status</th>
                                <th>Fee Paid</th>
                                <th>Setting</th>
                            </tr>
                        </thead>
                        <tbody>

                             <?php foreach ($get_sponsor as $sponsor): ?>
                                 
<?php
    $productinfo = $this->Crud_model->get_type_name_by_id('package',$sponsor->product);
    $txnid = time();
    $surl = base_url('members/razorpay/success');
    $furl = base_url('members/razorpay/failed');
    $key_id = RAZOR_KEY_ID;
    $currency_code = RAZOR_CURRENCY;            
    $total = ($this->Crud_model->get_type_name_by_id('package',$sponsor->product , 'fee')* 100); 
    $amount = $this->Crud_model->get_type_name_by_id('package',$sponsor->product , 'fee');
    $merchant_order_id = $sponsor->product;
    $card_holder_name = 'TechArise Team';
    $email = 'info@techarise.com';
    $phone = '9000000001';
    $name = 'kishore';
    $return_url = base_url('members/razorpay');
    $sponsor_id = $sponsor->sponsor_id;
    $sponsor_ref_id = $this->session->userdata('sponsor_id');
    $product_id = $sponsor->product;
    $time_at = time();
?>                             

<?php   $total = ($this->Crud_model->get_type_name_by_id('package',$sponsor->product , 'fee')* 100); 


?>



                            <tr>
                               <td><?= $sponsor->full_name; ?></td>
                                    <td><span class="badge  badge-primary-inverse"><?= $sponsor->profile_id; ?></span></td>
                                    <td><?= $sponsor->username; ?></td>
                                    <td><?= $sponsor->mobile_no; ?></td>
                                    <td>
                                        <?php if ($sponsor->is_blocked == 'yes'): ?>

                                            <button type="button" class="btn btn-xs btn-secondary">
                                                Approval Pending <i class="dripicons dripicons-alarm"></i>
                                            </button>
                                            
                                        <?php else: ?>

                                             <button type="button" class="btn btn-xs btn-success">
                                                Approved <i class="fa fa-check-circle-o"></i>
                                            </button>
                                            
                                        <?php endif ?>

                                       
                                    </td>
                                    <td> <i class="fa fa-rupee"></i> <?=$this->Crud_model->get_type_name_by_id('package',$sponsor->product)?> </td>
                                    <td>

                                         <?php if ($sponsor->is_blocked == 'yes'): ?>
                                             <div class="py-2">
                                              
                                                <form name="razorpay-form" id="razorpay-form" action="<?php echo $return_url; ?>" method="POST">

                                                    <?php
                                                        $csrf = array(
                                                                'name' => $this->security->get_csrf_token_name(),
                                                                'hash' => $this->security->get_csrf_hash()
                                                        );

                                                       ?>
                                                <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">

                                                  <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
                                                  <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
                                                  <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
                                                  <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $productinfo; ?>"/>
                                                  <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
                                                  <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
                                                  <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
                                                  <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
                                                  <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>

                                                  <input type="hidden" name="sponsor_id" id="sponsor_id" value="<?php echo $sponsor_id; ?>"/>
                                                  <input type="hidden" name="sponsor_ref_id" id="sponsor_ref_id" value="<?php echo $sponsor_ref_id; ?>"/>
                                                  <input type="hidden" name="product_id" id="product_id" value="<?php echo $product_id; ?>"/>
                                                  <input type="hidden" name="time_at" id="time_at" value="<?php echo $time_at; ?>"/>
                                                </form>
                                               
                                               
                                              <input  id="submit-pay" type="submit" onclick="razorpaySubmit(this);" value="Pay Online" class="btn btn-block btn-success btn-xs progress-bar progress-bar-striped progress-bar-animated text-center" />

                                                <div class="py-2">
                                                    <a class="btn btn-icon btn-xs btn-primary text-white" data-toggle="tooltip" data-placement="top" title="Print invoice" target="popup" onclick="window.open('<?= base_url(); ?>members/invoice/sponsor_invoice/<?= $sponsor->sponsor_id; ?>', 'popup', 'width=800,height=600'); return false;"><i class="fa fa-newspaper-o"></i></a>
                                                 <!--    <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-secondary"><i class="fa fa-home"></i></a> -->
                                                   <!--  <a href="<?= base_url(); ?>members/sponsor/update_sponsor/<?= $sponsor->sponsor_id; ?>" class="btn btn-icon btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Edit Sponsor"><i class="fa fa-pencil-square-o"></i></a> -->
                                        
                                                </div>

                                                <a href="<?= base_url(); ?>members/plans/payment/<?= $sponsor->sponsor_id; ?>" class="btn btn-block btn-success btn-xs progress-bar progress-bar-striped progress-bar-animated text-center">pay pum</a>
                                               
                                         </div> <?php else: ?>
                                           
                                        <div class="py-2">
                                            <a class="btn btn-icon btn-xs btn-primary text-white" data-toggle="tooltip" data-placement="top" title="Print invoice" target="popup" onclick="window.open('<?= base_url(); ?>members/invoice/sponsor_invoice/<?= $sponsor->sponsor_id; ?>', 'popup', 'width=800,height=600'); return false;"><i class="fa fa-newspaper-o"></i></a>
                                            <!-- <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-secondary"><i class="fa fa-home"></i></a> -->

                                           <!--  <a href="<?= base_url(); ?>members/sponsor/update_sponsor/<?= $sponsor->sponsor_id; ?>" class="btn btn-icon btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Edit Sponsor"><i class="fa fa-pencil-square-o"></i></a> -->

                                            <!-- <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Block Sponsor"><i class="fa fa-eye-slash"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Sponsor"><i class="fa fa-trash"></i></a> -->
                                        </div>

                                         <?php endif ?>


                                    </td>
                            </tr>




<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
      var razorpay_options = {
        key: "<?php echo $key_id; ?>",
        amount: "<?php echo $total; ?>",
        name: "<?php echo $name; ?>",
        description: "Order # <?php echo $merchant_order_id; ?>",
        netbanking: true,
        currency: "<?php echo $currency_code; ?>",
        prefill: {
          name:"<?php echo $card_holder_name; ?>",
          email: "<?php echo $email; ?>",
          contact: "<?php echo $phone; ?>"
        },
        notes: {
          soolegal_order_id: "<?php echo $merchant_order_id; ?>",
        },
        handler: function (transaction) {
            document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
            document.getElementById('razorpay-form').submit();
        },
        "modal": {
            "ondismiss": function(){
                location.reload()
            }
        }
      };
      var razorpay_submit_btn, razorpay_instance;
     
      function razorpaySubmit(el){
        if(typeof Razorpay == 'undefined'){
          setTimeout(razorpaySubmit, 200);
          if(!razorpay_submit_btn && el){
            razorpay_submit_btn = el;
            el.disabled = true;
            el.value = 'Please wait...';  
          }
        } else {
          if(!razorpay_instance){
            razorpay_instance = new Razorpay(razorpay_options);
            if(razorpay_submit_btn){
              razorpay_submit_btn.disabled = false;
              razorpay_submit_btn.value = "Pay Now";
            }
          }
          razorpay_instance.open();
        }
      }  
    </script>

                            <?php endforeach ?>
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                 <th>Name</th>
                                <th>Profile ID</th>
                                <th>Username</th>
                                <th>Mobile</th>
                                <th>Profile Status</th>
                                <th>Fee Paid</th>
                                <th>Setting</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->


