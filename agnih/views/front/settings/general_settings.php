<form id="general_settings_form" method="POST" action="<?=base_url()?>home/settings/update_general_settings">
      <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="system_name">System Name</label>
                                        
                                    </div>
                                    <div class="form-group col-md-8">
                                        
                                        <input type="text" class="form-control" id="system_name" name="system_name" value="<?=$this->Crud_model->get_type_name_by_id('general_settings', '1', 'value')?>" placeholder="Your Site Name" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="system_email">System Email</label>
                                        
                                    </div>
                                    <div class="form-group col-md-8">
                                        
                                        <input type="text" class="form-control" id="system_email" name="system_email" value="<?=$this->Crud_model->get_type_name_by_id('general_settings', '2', 'value')?>" placeholder="Your Site Email" required>
                                    </div>
                                </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="system_title">System Title</label>
                                        
                                    </div>
                                    <div class="form-group col-md-8">
                                        
                                        <input type="text" class="form-control" id="system_title"  name="system_title" value="<?=$this->Crud_model->get_type_name_by_id('general_settings', '3', 'value')?>" placeholder="Your Site Title" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="address">Address</label>
                                        
                                    </div>
                                    <div class="form-group col-md-8">
                                        
                                        <input type="text" class="form-control" id="address" name="address" value="<?=$this->Crud_model->get_type_name_by_id('general_settings', '4', 'value')?>" placeholder="Address">
                                    </div>
                                </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="phone">Phone</label>
                                        
                                    </div>
                                    <div class="form-group col-md-8">
                                        
                                        <input type="text" class="form-control" id="phone" name="phone" value="<?=$this->Crud_model->get_type_name_by_id('general_settings', '5', 'value')?>" placeholder="Phone No.">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> SAVE</button>
                            </form>