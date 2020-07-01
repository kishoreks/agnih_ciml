<form id="social_links_form" action="<?=base_url()?>home/settings/update_social_links" method="POST">
      <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="facebook"><a href="javascript:void(0)" class="btn btn-social btn-social-lg bg-facebook"><i class="fa fa-facebook"></i></a></label>
            
        </div>
        <div class="form-group col-md-8">
            
             <input type="text" name="facebook" value="<?=$this->Crud_model->get_type_name_by_id('social_links', '1', 'value')?>" class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="google-plus"><a href="javascript:void(0)" class="btn btn-social btn-social-lg bg-twitter"><i class="fa fa-twitter"></i></a></label>
            
        </div>
        <div class="form-group col-md-8">
            
            <input type="text" name="google-plus" value="<?=$this->Crud_model->get_type_name_by_id('social_links', '2', 'value')?>" class="form-control">
        </div>
    </div>
     <div class="form-row">
        <div class="form-group col-md-2">
            <label for="twitter"><a href="javascript:void(0)" class="btn btn-social btn-social-lg bg-googleplus"><i class="fa fa-google-plus"></i></a></label>
            
        </div>
        <div class="form-group col-md-8">
            
             <input type="text" name="twitter" value="<?=$this->Crud_model->get_type_name_by_id('social_links', '3', 'value')?>" class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="pinterest"><a href="javascript:void(0)" class="btn btn-social btn-social-lg bg-pinterest"><i class="fa fa-pinterest-p"></i></a></label>
            
        </div>
        <div class="form-group col-md-8">
            
            <input type="text" name="pinterest" value="<?=$this->Crud_model->get_type_name_by_id('social_links', '5', 'value')?>" class="form-control">
        </div>
    </div>
     <div class="form-row">
        <div class="form-group col-md-2">
            <label for="skype"><a href="javascript:void(0)" class="btn btn-social btn-social-lg bg-skype"><i class="fa fa-skype"></i></a></label>
            
        </div>
        <div class="form-group col-md-8">
            
            <input type="text" name="skype" value="<?=$this->Crud_model->get_type_name_by_id('social_links', '4', 'value')?>" class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="inputEmail4"><a href="javascript:void(0)" class="btn btn-social btn-social-lg bg-youtube"><i class="fa fa-youtube-play"></i></a></label>
            
        </div>
        <div class="form-group col-md-8">
            
             <input type="text" name="youtube" value="<?=$this->Crud_model->get_type_name_by_id('social_links', '6', 'value')?>" class="form-control">
        </div>
    </div>
    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> SAVE</button>
</form>