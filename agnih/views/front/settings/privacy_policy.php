<form id="privacy_policy_form" method="POST" action="<?=base_url()?>home/settings/update_privacy_policy">
	  <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
 <div class="form-group">
    <label for="inputAddress2"> Privacy Policy </label>
   
   <textarea class="form-control summernote" name="privacy_policy" id="summernote" required><?=$this->Crud_model->get_type_name_by_id('general_settings', '80', 'value')?></textarea>
   </div>

<div class="form-group">
		<div class="col-sm-12 text-right">
        	<button type="submit" class="btn btn-primary "><i class="fa fa-save"></i> <?php echo translate('save')?></button>
		</div>
	</div>
</form>

