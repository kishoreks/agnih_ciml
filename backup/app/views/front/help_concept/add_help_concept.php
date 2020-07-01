<!--    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-5 mb-4 mb-xl-0">
            <h4 class="font-weight-bold">Hi, K.GNANASEKARAN!</h4>
            <h4 class="font-weight-normal mb-0">Member Dashboard,</h4>
          </div>
         
        </div>
      </div>
    </div> -->


 <div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
       <!--  <h4 class="card-title">Profile</h4> -->
       
        <form class="forms-sample" method="post" action="<?= base_url(); ?>dashboard/help_concept/do_add">
          <div class="form-group">
            <label for="sponsor_id"><?= translate('sponsor_id'); ?></label>
            <input type="text" class="form-control" id="sponsor_id" name="sponsor_id" placeholder="Sponsor ID" value="<?php if(!empty($form_contents)){echo $form_contents['sponsor_id'];}?>">
            <?= form_error('sponsor_id'); ?>
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php if(!empty($form_contents)){echo $form_contents['name'];}?>">
            <?= form_error('name'); ?>
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php if(!empty($form_contents)){echo $form_contents['email'];}?>">
            <?= form_error('name'); ?>
          </div>
          <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="mobile" value="<?php if(!empty($form_contents)){echo $form_contents['mobile'];}?>">
            <?= form_error('mobile'); ?>
          </div>
          <div class="form-group">
             <label for="joined_on"><?= translate('joined_on'); ?></label>
          <div id="datepicker-popup" class="input-group date datepicker">

              <input type="text" class="form-control" name="joined_on" value="<?php if(!empty($form_contents)){echo $form_contents['joined_on'];}?>">
              <span class="input-group-addon input-group-append border-left">
                <span class="ti-calendar input-group-text"></span>
              </span>
              
            </div>
             <?= form_error('joined_on'); ?>
          </div>
           <div class="form-group">
            <label for="activated_on">Activated On</label>
            <input type="text" class="form-control" name="activated_on" id="activated_on" placeholder="Admin activate" readonly>
            <?= form_error('activated_on'); ?>
          </div>
         
          
          
       
      </div>
    </div>
  </div>
   

   <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
         <!--  <h4 class="card-title d-flex">Dropify
            
          </h4> -->
            <div class="form-group">
            <label for="country">Country</label>
            <?php 
                 echo $this->Crud_model->select_html('country', 'country', 'name', 'edit', 'form-control show-tick present_country_edit_location', $form_contents['country'], '', '', '');
             ?>
            <?= form_error('country'); ?>
          </div>

           <div class="form-group">
            <label for="country">state</label>
            <?php
                  if (!empty($form_contents['country'])) {
                      echo $this->Crud_model->select_html('state', 'state', 'name', 'edit', 'present_state_edit_location form-control show-tick ', $form_contents['state'], 'country_id', $form_contents['state'], '');   
                  } else {
                  ?>
                      <select class="form-control show-tick present_state_edit_location" name="state">
                          <option value=""><?php echo translate('choose_a_country_first')?></option>
                      </select>
                  <?php
                  }
              ?>
            <?= form_error('state'); ?>
          </div>
         
          <div class="form-group">
            <label for="country">city</label>
            <?php
                                if (!empty($form_contents['state'])) {
                                    echo $this->Crud_model->select_html('city', 'city', 'name', 'edit', 'form-control show-tick present_city_edit_location', $form_contents['city'], 'state_id', $form_contents['state'], '');  
                                } else {
                                ?>
                                    <select class="form-control show-tick present_city_edit_location" name="city">
                                        <option value=""><?php echo translate('choose_a_state_first')?></option>
                                    </select>
                                <?php
                                }
                            ?>
            <?= form_error('city'); ?>
          </div>
          <div class="form-group">
            <label for="bank_name">Bank Name</label>
            <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="bank_name" value="<?php if(!empty($form_contents)){echo $form_contents['bank_name'];}?>">
            <?= form_error('bank_name'); ?>
          </div>
          <div class="form-group">
            <label for="branch">Branch</label>
            <input type="text" class="form-control" name="branch" id="branch" placeholder="branch" value="<?php if(!empty($form_contents)){echo $form_contents['branch'];}?>">
            <?= form_error('branch'); ?>
          </div>
          <div class="form-group">
            <label for="account_number">Account Number</label>
            <input type="text" class="form-control" name="account_number" id="account_number" placeholder="account_number" value="<?php if(!empty($form_contents)){echo $form_contents['account_number'];}?>">
            <?= form_error('account_number'); ?>
          </div>
           <div class="form-group">
            <label for="ifsc">IFSC</label>
            <input type="text" name="ifsc" class="form-control" id="ifsc" placeholder="ifsc" value="<?php if(!empty($form_contents)){echo $form_contents['ifsc'];}?>">
            <?= form_error('ifsc'); ?>
          </div>
      </div>
    </div>


</div>

</div>

<div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
        <div class="card-body">


            <button type="submit" class="btn btn-primary mr-2 ">Submit</button>
            <button class="btn btn-light">Cancel</button>

        </div>
      </div>
    </div>
   </form>
</div>




<script>
    $(".present_country_edit_location").change(function(){
        var country_id = $(".present_country_edit_location").val();
        if (country_id == "") {
            $(".present_state_edit_location").html("<option value=''><?php echo translate('choose_a_country_first')?></option>");
            $(".present_city_edit_location").html("<option value=''><?php echo translate('choose_a_state_first')?></option>");
        } else {
            $.ajax({
                url: "<?=base_url()?>dashboard/get_dropdown_by_id/state/country_id/"+country_id, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {
                    $(".present_state_edit_location").html(data);
                    $(".present_city_edit_location").html("<option value=''><?php echo translate('choose_a_state_first')?></option>");
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });
    $(".present_state_edit_location").change(function(){
        var state_id = $(".present_state_edit_location").val();
        if (state_id == "") {
            $(".present_city_edit_location").html("<option value=''><?php echo translate('choose_a_state_first')?></option>");
        } else {  
            $.ajax({
                url: "<?=base_url()?>dashboard/get_dropdown_by_id/city/state_id/"+state_id, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {
                    $(".present_city_edit_location").html(data);
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });
</script>