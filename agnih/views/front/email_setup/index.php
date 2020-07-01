<div class="row">
	<div class="col-md-12">
	<?php if (!empty($success_alert)): ?>
			<div class="alert alert-success" id="success_alert" style="display: block">
                <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                <?=$success_alert?>
            </div>
		<?php endif ?>
		<?php if (!empty($danger_alert)): ?>
			<div class="alert alert-danger" id="danger_alert" style="display: block">
                <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                <?=$danger_alert?>
            </div>
		<?php endif ?>
	</div>
</div>

<div class="row">
	
	<div class="col-xxl-6">
	    <div class="card card-statistics">
	        <div class="card-header">
	            <div class="card-heading">
	                <h4 class="card-title"> Tab vertical </h4>
	            </div>
	        </div>
	        <div class="card-body">
	            <div class="tab tab-vertical">
	                <ul class="nav nav-tabs" role="tablist">
	                    <li class="nav-item">
	                        <a class="nav-link active show" id="password_reset_tab" data-toggle="tab" href="#password_reset" role="tab" aria-controls="password_reset" aria-selected="true"> Password Reset Email</a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" id="account_opening_tab" data-toggle="tab" href="#account_opening" role="tab" aria-controls="account_opening" aria-selected="false"> Account Opening Email </a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" id="member_opening_approval_tab" data-toggle="tab" href="#member_opening_approval" role="tab" aria-controls="member_opening_approval" aria-selected="false">Account Opening From User Email. When Member Member Approval Active </a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" id="email_to_admin_tab" data-toggle="tab" href="#email_to_admin" role="tab" aria-controls="email_to_admin" aria-selected="false"> Member Registration Email To Admin </a>
	                    </li>
	                     <li class="nav-item">
	                        <a class="nav-link" id="staff_account_tab" data-toggle="tab" href="#staff_account" role="tab" aria-controls="staff_account" aria-selected="false"> Staff Account Add Email </a>
	                    </li>
	                     <li class="nav-item">
	                        <a class="nav-link" id="member_approval_tab" data-toggle="tab" href="#member_approval" role="tab" aria-controls="member_approval" aria-selected="false"> Member Approval Email </a>
	                    </li>
	                </ul>
	                <div class="tab-content">
	                    <div class="tab-pane fade active show" id="password_reset" role="tabpanel" aria-labelledby="password_reset_tab">
	                       <?php
		                	$password_reset_email = $this->db->get_where('email_template', array('email_template_id' => 1))->result();
		                	?>
		                	<?php
		                	foreach ($password_reset_email as $value1) {
		                	?>
		                	<form class="form-horizontal" id="email_setup_form" method="POST" action="<?=base_url()?>home/update_email_setup/password_reset_email">
		                		  <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
			                	<div class="form-group btm_border">
	                                <label class="col-sm-2 control-label" for="email_setup"><b><?=translate('subject')?></b>
	                                </label>
	                                <div class="col-sm-8 col-sm-offse">
	                                	<input type="text" name="password_reset_email_sub" value="<?=$value1->subject?>" placeholder="" class="form-control" >
	                                </div>
	                            </div>
	                            <div class="form-group btm_border">
	                                <label class="col-sm-2 control-label" for="email_setup"><b><?=translate('email_body')?></b>
	                                </label>
	                                <div class="col-sm-8">
	                                    <textarea rows="15" class="form-control textarea" data-height="100" name="password_reset_email_body" style="height: 380px;"><?=$value1->body?></textarea>
	                                    <br>
	                                    <span class="text-danger">**NOTE : <?=translate('Do Not Change The Variables Like')?> [[ ____ ]].**</span>
	                                </div>
	                            </div>
	                            <div class="form-group">
									<div class="col-sm-offset-2 col-sm-9">
							        	<button type="submit" class="btn btn-primary btn-sm btn-labeled fa fa-save"> <?php echo translate('submit')?></button>
									</div>
								</div>
	                        </form>
	                        <?php
	                    	}
	                        ?>
	                    </div>
	                    <div class="tab-pane fade" id="account_opening" role="tabpanel" aria-labelledby="account_opening_tab">
	                       <?php
		                	$account_opening_email = $this->db->get_where('email_template', array('email_template_id' => 4))->result();
		                	?>
		                	<?php
		                	foreach ($account_opening_email as $value3) {
		                	?>
		                	<form class="form-horizontal" id="email_setup_form" method="POST" action="<?=base_url()?>home/update_email_setup/account_opening_email">
		                		  <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
			                	<div class="form-group btm_border">
	                                <label class="col-sm-2 control-label" for="email_setup"><b><?=translate('subject')?></b>
	                                </label>
	                                <div class="col-sm-8 col-sm-offse">
	                                	<input type="text" name="account_opening_email_sub" value="<?=$value3->subject?>" placeholder="" class="form-control" >
	                                </div>
	                            </div>
	                            <div class="form-group btm_border">
	                                <label class="col-sm-2 control-label" for="email_setup"><b><?=translate('email_body')?></b>
	                                </label>
	                                <div class="col-sm-8">
	                                    <textarea rows="15" class="form-control textarea" data-height="100" name="account_opening_email_body" style="height: 380px;"><?=$value3->body?></textarea>
	                                    <br>
	                                    <span class="text-danger">**NOTE : <?=translate('Do Not Change The Variables Like')?> [[ ____ ]].**</span>
	                                </div>
	                            </div>
	                            <div class="form-group">
									<div class="col-sm-offset-2 col-sm-9">
							        	<button type="submit" class="btn btn-primary btn-sm btn-labeled fa fa-save"> <?php echo translate('submit')?></button>
									</div>
								</div>
	                        </form>
	                        <?php
	                    	}
	                        ?>
	                    </div>
	                    <div class="tab-pane fade" id="member_opening_approval" role="tabpanel" aria-labelledby="member_opening_approval_tab">
	                        <?php
		                	$account_opening_from_admin_email = $this->db->get_where('email_template', array('email_template_id' => 7))->result();
		                	?>
		                	<?php
		                	foreach ($account_opening_from_admin_email as $value3) {
		                	?>
		                	<form class="form-horizontal" id="email_setup_form" method="POST" action="<?=base_url()?>home/update_email_setup/account_opening_from_admin_email">
		                		  <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
			                	<div class="form-group btm_border">
	                                <label class="col-sm-2 control-label" for="email_setup"><b><?=translate('subject')?></b>
	                                </label>
	                                <div class="col-sm-8 col-sm-offse">
	                                	<input type="text" name="account_opening_from_admin_email_sub" value="<?=$value3->subject?>" placeholder="" class="form-control" >
	                                </div>
	                            </div>
	                            <div class="form-group btm_border">
	                                <label class="col-sm-2 control-label" for="email_setup"><b><?=translate('email_body')?></b>
	                                </label>
	                                <div class="col-sm-8">
	                                    <textarea rows="15" class="form-control textarea" data-height="100" name="account_opening_from_user_email_body" style="height: 380px;"><?=$value3->body?></textarea>
	                                    <br>
	                                    <span class="text-danger">**NOTE : <?=translate('Do Not Change The Variables Like')?> [[ ____ ]].**</span>
	                                </div>
	                            </div>
	                            <div class="form-group">
									<div class="col-sm-offset-2 col-sm-9">
							        	<button type="submit" class="btn btn-primary btn-sm btn-labeled fa fa-save"> <?php echo translate('submit')?></button>
									</div>
								</div>
	                        </form>
	                        <?php
	                    	}
	                        ?>
	                    </div>
	                    <div class="tab-pane fade" id="email_to_admin" role="tabpanel" aria-labelledby="email_to_admin_tab">
	                       <?php
		                	$member_registration_email_to_admin = $this->db->get_where('email_template', array('email_template_id' => 8))->result();
		                	?>
		                	<?php
		                	foreach ($member_registration_email_to_admin as $value3) {
		                	?>
		                	<form class="form-horizontal" id="email_setup_form" method="POST" action="<?=base_url()?>home/update_email_setup/member_registration_email_to_admin">
		                		  <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
			                	<div class="form-group btm_border">
	                                <label class="col-sm-2 control-label" for="email_setup"><b><?=translate('subject')?></b>
	                                </label>
	                                <div class="col-sm-8 col-sm-offse">
	                                	<input type="text" name="member_registration_email_to_admin_sub" value="<?=$value3->subject?>" placeholder="" class="form-control" >
	                                </div>
	                            </div>
	                            <div class="form-group btm_border">
	                                <label class="col-sm-2 control-label" for="email_setup"><b><?=translate('email_body')?></b>
	                                </label>
	                                <div class="col-sm-8">
	                                    <textarea rows="15" class="form-control textarea" data-height="100" name="member_registration_email_to_admin_body" style="height: 380px;"><?=$value3->body?></textarea>
	                                    <br>
	                                    <span class="text-danger">**NOTE : <?=translate('Do Not Change The Variables Like')?> [[ ____ ]].**</span>
	                                </div>
	                            </div>
	                            <div class="form-group">
									<div class="col-sm-offset-2 col-sm-9">
							        	<button type="submit" class="btn btn-primary btn-sm btn-labeled fa fa-save"> <?php echo translate('submit')?></button>
									</div>
								</div>
	                        </form>
	                        <?php
	                    	}
	                        ?>
	                    </div>
	                     <div class="tab-pane fade" id="staff_account" role="tabpanel" aria-labelledby="staff_account_tab">
	                       <?php
		                	$staff_opening_email = $this->db->get_where('email_template', array('email_template_id' => 5))->result();
		                	?>
		                	<?php
		                	foreach ($staff_opening_email as $value4) {
		                	?>
		                	<form class="form-horizontal" id="email_setup_form" method="POST" action="<?=base_url()?>home/update_email_setup/staff_add_email">
		                		  <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
			                	<div class="form-group btm_border">
	                                <label class="col-sm-2 control-label" for="email_setup"><b><?=translate('subject')?></b>
	                                </label>
	                                <div class="col-sm-8 col-sm-offse">
	                                	<input type="text" name="staff_add_email_sub" value="<?=$value4->subject?>" placeholder="" class="form-control" >
	                                </div>
	                            </div>
	                            <div class="form-group btm_border">
	                                <label class="col-sm-2 control-label" for="email_setup"><b><?=translate('email_body')?></b>
	                                </label>
	                                <div class="col-sm-8">
	                                    <textarea rows="15" class="form-control textarea" data-height="100" name="staff_add_email_body" style="height: 380px;"><?=$value4->body?></textarea>
	                                    <br>
	                                    <span class="text-danger">**NOTE : <?=translate('Do Not Change The Variables Like')?> [[ ____ ]].**</span>
	                                </div>
	                            </div>
	                            <div class="form-group">
									<div class="col-sm-offset-2 col-sm-9">
							        	<button type="submit" class="btn btn-primary btn-sm btn-labeled fa fa-save"> <?php echo translate('submit')?></button>
									</div>
								</div>
	                        </form>
	                        <?php
	                    	}
	                        ?>
	                    </div>
	                     <div class="tab-pane fade" id="member_approval" role="tabpanel" aria-labelledby="member_approval_tab">
	                         <?php
						   $member_approval_email = $this->db->get_where('email_template', array('email_template_id' => 6))->result();
						   ?>
						   <?php
						   foreach ($member_approval_email as $value5) {
						   ?>
						   <form class="form-horizontal" id="email_setup_form" method="POST" action="<?=base_url()?>home/update_email_setup/member_approval_email">
						   	  <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
							   <div class="form-group btm_border">
								   <label class="col-sm-2 control-label" for="email_setup"><b><?=translate('subject')?></b>
								   </label>
								   <div class="col-sm-8 col-sm-offse">
									   <input type="text" name="member_approval_email_sub" value="<?=$value5->subject?>" placeholder="" class="form-control" >
								   </div>
							   </div>
							   <div class="form-group btm_border">
								   <label class="col-sm-2 control-label" for="email_setup"><b><?=translate('email_body')?></b>
								   </label>
								   <div class="col-sm-8">
									   <textarea rows="15" class="form-control textarea" data-height="100" name="member_approval_email_body" style="height: 380px;"><?=$value5->body?></textarea>
									   <br>
									   <span class="text-danger">**NOTE : <?=translate('Do Not Change The Variables Like')?> [[ ____ ]].**</span>
								   </div>
							   </div>
							   <div class="form-group">
								   <div class="col-sm-offset-2 col-sm-9">
									   <button type="submit" class="btn btn-primary btn-sm btn-labeled fa fa-save"> <?php echo translate('submit')?></button>
								   </div>
							   </div>
						   </form>
						   <?php
						   }
						   ?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>


</div>