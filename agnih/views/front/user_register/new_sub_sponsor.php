
<div class="row account-contant">
	
	<div class="col-md-8 offset-2">
	    <div class="card card-statistics">
	        <div class="card-header">
	            <div class="card-heading">
	                <h4 class="card-title"> <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-primary-inverse">New Sub Members</span> </h4>
	            </div>
	        </div>
	        <div class="card-body">
	            <form action="<?= base_url(); ?>home/sponsor_register/new_sub_sponsor" method="post" autocomplete="off">

	            	  <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">

	            	<div class="form-group row">
	                    <label for="sponsor_id" class="col-sm-2 col-form-label"><?= translate('sponsor_id'); ?></label>
	                    <div class="col-sm-10">
	                        <input type="text" class="form-control" id="sponsor_id" placeholder="Sponsor Id" name="sponsor_id" value="<?php if (!empty($form_contents)) {
                                echo $form_contents['sponsor_id'];
                            } ?>">
	                        <?= '<p class="text-danger">' . form_error('sponsor_id','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>
	                
	                <div class="form-group row">
	                    <label for="username" class="col-sm-2 col-form-label"><?= translate('username'); ?></label>
	                    <div class="col-sm-10">
	                        <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?php if (!empty($form_contents)) {
                                echo $form_contents['username'];
                            } ?>">
	                        <?= '<p class="text-danger">' . form_error('username','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>

	                  <div class="form-group row">
	                    <label for="full_name" class="col-sm-2 col-form-label"><?= translate('full_name'); ?></label>
	                  
		                    <div class="col-sm-10">
		                        <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Full Name" value="<?php if (!empty($form_contents)) {
                                echo $form_contents['full_name'];
                            } ?>">
		                         <?= '<p class="text-danger">' . form_error('full_name','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
		                    </div>
		                    
	                 
	                  </div>

	                    <div class="form-group row">
		                    <label for="full_name" class="col-sm-2 col-form-label"><?= translate('last_name'); ?></label>
		                    
			                    <div class="col-sm-10">
		                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="<?php if (!empty($form_contents)) {
                                echo $form_contents['last_name'];
                            } ?>">
		                        <?= '<p class="text-danger">' . form_error('last_name','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
		                    
			                    
		                    </div>
	                   </div>

	                  <div class="form-group row">
	                    <label for="password" class="col-sm-2 col-form-label"><?= translate('password'); ?></label>
	                    <div class="col-sm-10">
	                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
	                         <?= '<p class="text-danger">' . form_error('password','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>

	                  <div class="form-group row">
	                    <label for="r_password" class="col-sm-2 col-form-label"><?= translate('confirm_Password'); ?></label>
	                    <div class="col-sm-10">
	                        <input type="password" class="form-control" id="r_password" name="r_password" placeholder="Confirm Password">
	                         <?= '<p class="text-danger">' . form_error('r_password','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="email" class="col-sm-2 col-form-label"><?= translate('gender'); ?></label>
	                    <div class="col-sm-10">
	                         <?php
			                    echo $this->Crud_model->select_html('gender', 'gender', 'name', 'edit', 'form-control show-tick', $form_contents['gender'], '', '', '');
			                    ?>
	                         <?= '<p class="text-danger">' . form_error('gender','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>

	                  <div class="form-group row">
	                    <label for="email" class="col-sm-2 col-form-label"><?= translate('email'); ?></label>
	                    <div class="col-sm-10">
	                        <input type="text" class="form-control" id="email" placeholder="info@tipslife.in" name="email" value="<?php if (!empty($form_contents)) {
                                echo $form_contents['email'];
                            } ?>" autocomplete="off">
	                         <?= '<p class="text-danger">' . form_error('email','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="address" class="col-sm-2 col-form-label"><?= translate('address'); ?></label>
	                    <div class="col-sm-10">
	                        <textarea name="address" id="input" class="form-control" placeholder="Address " rows="3"><?php if (!empty($form_contents)) {
                                echo $form_contents['address'];
                            } ?></textarea>
	                         <?= '<p class="text-danger">' . form_error('address','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>

	                 <div class="form-group row">
	                    <label for="email" class="col-sm-2 col-form-label"><?= translate('position'); ?></label>
	                    <div class="col-sm-10">
	                         <?php
			                    echo $this->Crud_model->select_html('position', 'position', 'name', 'edit', 'form-control show-tick', $form_contents['position'], '', '', '');
			                    ?>
	                         <?= '<p class="text-danger">' . form_error('position','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>

	                 <div class="form-group row">
	                    <label for="email" class="col-sm-2 col-form-label"><?= translate('product'); ?></label>
	                    <div class="col-sm-10">
	                        <?php
			                    echo $this->Crud_model->select_html('package', 'product', 'name', 'edit', 'form-control show-tick', $form_contents['product'], '', '', '');
			                    ?>
	                         <?= '<p class="text-danger">' . form_error('product','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>

	                 <div class="form-group row">
	                    <label for="date_of_birth" class="col-sm-2 col-form-label"><?= translate('date_of_birth'); ?></label>
	                    <div class="col-sm-10">
	                       
	                         <input type="text" id="date_of_birth" name="date_of_birth" placeholder="Date Of Birth" class="form-control date-picker-default" value="<?php if (!empty($form_contents)) {
                                echo $form_contents['date_of_birth'];
                            } ?>">
	                         <?= '<p class="text-danger">' . form_error('date_of_birth','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>

	                 <div class="form-group row">
	                    <label for="mobile_no" class="col-sm-2 col-form-label"><?= translate('mobile_no'); ?></label>
	                    <div class="col-sm-10">
	                        <input type="text" class="form-control" id="mobile_no" placeholder="9843098430" name="mobile_no" value="<?php if (!empty($form_contents)) {
                                echo $form_contents['mobile_no'];
                            } ?>" autocomplete="off">
	                         <?= '<p class="text-danger">' . form_error('mobile_no','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>

	                 <div class="form-group row">
	                    <label for="back_name" class="col-sm-2 col-form-label"><?= translate('back_name'); ?></label>
	                    <div class="col-sm-10">
	                        <input type="text" class="form-control" id="back_name" placeholder="ICICI" name="back_name" value="<?php if (!empty($form_contents)) {
                                echo $form_contents['back_name'];
                            } ?>" autocomplete="off">
	                         <?= '<p class="text-danger">' . form_error('back_name','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>

	                 <div class="form-group row">
	                    <label for="account_no" class="col-sm-2 col-form-label"><?= translate('account_no'); ?></label>
	                    <div class="col-sm-10">
	                        <input type="text" class="form-control" id="account_no" placeholder="334589669358" name="account_no" value="<?php if (!empty($form_contents)) {
                                echo $form_contents['account_no'];
                            } ?>" autocomplete="off">
	                         <?= '<p class="text-danger">' . form_error('account_no','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>

	                 <div class="form-group row">
	                    <label for="branch_name" class="col-sm-2 col-form-label"><?= translate('branch_name'); ?></label>
	                    <div class="col-sm-10">
	                        <input type="text" class="form-control" id="branch_name" placeholder="Branch Name" name="branch_name" value="<?php if (!empty($form_contents)) {
                                echo $form_contents['branch_name'];
                            } ?>" autocomplete="off">
	                         <?= '<p class="text-danger">' . form_error('branch_name','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>

	                 <div class="form-group row">
	                    <label for="ifsc" class="col-sm-2 col-form-label"><?= translate('ifsc'); ?></label>
	                    <div class="col-sm-10">
	                        <input type="text" class="form-control" id="ifsc" placeholder="IFSC Code" name="ifsc_code" value="<?php if (!empty($form_contents)) {
                                echo $form_contents['ifsc_code'];
                            } ?>" autocomplete="off">
	                         <?= '<p class="text-danger">' . form_error('ifsc_code','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>

	                 <div class="form-group row">
	                    <label for="payments" class="col-sm-2 col-form-label"><?= translate('payments'); ?></label>
	                    <div class="col-sm-10">
	                         <?php
			                    echo $this->Crud_model->select_html('payoptions', 'payments', 'name', 'edit', 'form-control show-tick', $form_contents['payments'], '', '', '');
			                    ?>
	                         <?= '<p class="text-danger">' . form_error('payments','<div class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger-inverse mt-2">', '</div>') . '</p>' ?>
	                    </div>
	                </div>

	                   <button type="submit" class="btn btn-primary text-uppercase float-right">Submit</button>

	            </form>
	        </div>
	    </div>
	</div>

</div>

<script>
    setTimeout(function() {
        $('#success_alert').fadeOut('fast');
        $('#danger_alert').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
</script>


<!-- 
<div class="row">
    <div class="col-12">
        <div class="card card-statistics">
            <div class="card-body p-0">
                <div class="row no-gutters">
                   
                    <div class="col-lg-6 col-xl-6 p-20 border-bottom border-xl-bottom-0 border-xl-right">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <h4>Car Use</h4>
                                <p>Consectetur ipsum dolor sit amet, adipisicing.</p>
                            </div>
                            
                        </div>
                    </div>

                     <div class="col-lg-6 col-xl-6 p-20 border-bottom border-xl-bottom-0 border-xl-right">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <h4>Car Use</h4>
                                <p>Consectetur ipsum dolor sit amet, adipisicing.</p>
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
                                <h4>Billing Statement</h4>
                                <p>Consectetur ipsum dolor sit amet, adipisicing.</p>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 p-20 border-bottom border-xl-bottom-0 border-xl-right">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <h4>Car Use</h4>
                                <p>Consectetur ipsum dolor sit amet, adipisicing.</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 p-20 border-bottom border-lg-bottom-0 border-lg-right">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <h4>Receivable Data</h4>
                                <p>Consectetur ipsum dolor sit amet, adipisicing.</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 p-20">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <h4>Recap the Car</h4>
                                <p>Consectetur ipsum dolor sit amet, adipisicing.</p>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 -->