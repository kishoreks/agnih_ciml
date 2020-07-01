<form id="terms_and_conditions_form" method="POST" action="<?=base_url()?>home/settings/update_terms_and_conditions">

	  <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">

	<div class="form-group">
	    <label for="terms_and_conditions">Terms & Conditions</label>
	    
	    <textarea  name="terms_and_conditions" id="summernote2"  class="form-control summernote2" rows="3" required="required"><?=$this->Crud_model->get_type_name_by_id('general_settings', '9', 'value')?>
         </textarea>
	  </div>
        

	<div class="form-group">
		<div class="col-sm-12 text-right">
        	 <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> SAVE</button>
		</div>
	</div>

</form>


