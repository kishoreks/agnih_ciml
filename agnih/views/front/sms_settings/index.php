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
	
<div class="col-md-8 offset-2">
    <div class="card card-statistics">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title"><?= translate('msg91_settings_configuration')?></h4>
            </div>
        </div>
        <div class="card-body">
            <form id="msg91_settings_form" method="POST" action="<?=base_url()?>home/update_sms_settings/msg91">
                  <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
            	<div class="form-group row">
                        <div class="custom-control custom-checkbox custom-cont rol-inline offset-2">
                            <input type="checkbox" class="custom-control-input" id="msg91_activation" name="msg91_activation" <?php if($this->db->get_where('third_party_settings', array('type' => 'msg91_status'))->row()->value == "ok"){ ?>checked<?php } ?>>
                            
                              <label class="custom-control-label" for="msg91_activation" ><?= translate('msg91_activation')?></label>
                            
                        </div>    
                </div>
               
                <div class="form-group row">
                    <label for="account_type" class="col-sm-4 col-form-label"><?= translate('account_type')?></label>
                    <div class="col-sm-8">
                       <select class="form-control" name="type">
						<option class="form-control" value="test" <?php if($this->db->get_where('third_party_settings', array('type' => 'msg91_type'))->row()->value == "test"){ echo "selected";}?>><?= translate('test')?></option>
						<option class="form-control" value="original" <?php if($this->db->get_where('third_party_settings', array('type' => 'msg91_type'))->row()->value == "original"){ echo "selected";}?>><?= translate('original')?></option>

					</select>
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="authentication_key" class="col-sm-4 col-form-label"><?= translate('authentication_key')?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="authentication_key" value="<?=$this->db->get_where('third_party_settings', array('type' => 'msg91_authentication_key'))->row()->value;?>" placeholder="<?php echo translate('authentication_key')?>">
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="sender_ID" class="col-sm-4 col-form-label"><?= translate('sender_ID')?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sender_id" value="<?=$this->db->get_where('third_party_settings', array('type' => 'msg91_sender_ID'))->row()->value;?>" placeholder="<?php echo translate('sender_ID')?>">
                    </div>
                </div>

                   <div class="form-group row">
                    <label for="country_code" class="col-sm-4 col-form-label"><?= translate('country_code')?></label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control" name="country_code" value="<?=$this->db->get_where('third_party_settings', array('type' => 'msg91_country_code'))->row()->value;?>" placeholder="<?php echo translate('country_code')?>">
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="route" class="col-sm-4 col-form-label"><?= translate('route')?></label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control" name="route" value="<?=$this->db->get_where('third_party_settings', array('type' => 'msg91_route'))->row()->value;?>" placeholder="<?php echo translate('route')?>">
                    </div>
                </div>
                
                <div class="form-group">
					<div class="col-sm-offset-3 col-sm-8 text-right">
						<button type="submit" class="btn btn-primary "><i class="fa fa-save"></i> <?php echo translate('save')?></button>
					</div>
				</div>


            </form>
        </div>
    </div>
</div>

</div>