  <?php 
    // Leading Json data
    $profile_image = $this->Crud_model->get_type_name_by_id('sponsor', $this->uri->segment(4), 'profile_image');
    $profile_image_data = json_decode($profile_image, true);
    $sponsor_info = $this->Crud_model->get_by_id('sponsor', $this->uri->segment(4));
    
  ?>

  <div class="row">
      <div class="col-lg-12 m-b-20">
          
    <?php if (!empty($success_alert)): ?>
        <div class="col-12" id="success_alert">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <?=$success_alert?>
            </div>
        </div>
    <?php endif ?>
    <?php if (!empty($danger_alert)): ?>
        <div class="col-12" id="danger_alert">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <?=$danger_alert?>
            </div>
        </div>
    <?php endif ?>

 <div class="col-lg-9 col-md-9 m-b-20" id="ajax_alert" style="display: none; position: color: #fff; fixed; top: 15px; right: 0; z-index: 9999">
    <div class="alert alert-success fade show" role="alert">
        <?php echo translate('you_have_successfully_edited_your_profile!')?>
    </div>
</div>
<!-- Alert for Ajax Profile Edit Section -->
<!-- Alert for Validating Ajax Profile Edit Section -->
<div class="col-lg-9 col-md-9 m-b-20" id="ajax_validation_alert" style="display: none; color: #fff; position: fixed; top: 15px; right: 0; z-index: 9999">
    <div class="alert alert-danger fade show" role="alert">
        </button>
        <span id="validation_info" style="color: #fff;"></span>
    </div>
</div>
<!-- Alert for Validating Ajax Profile Edit Section -->
<!-- Alerts for Member actions -->
<div class="col-lg-9 col-md-9 m-b-20" id="ajax_success_alert" style="display: none; color: #fff; position: fixed; top: 15px; right: 0; z-index: 9999">
    <div class="alert alert-success ajax_success_alert fade show" role="alert">
        <!-- Success Alert Content -->
    </div>
</div>
<div class="col-lg-9 col-md-9 m-b-20" id="ajax_danger_alert" style="display: none; color: #fff; position: fixed; top: 15px; right: 0; z-index: 9999">
    <div class="alert alert-danger ajax_danger_alert fade show" role="alert">
        <!-- Success Alert Content -->
    </div>
</div>
      </div>
  </div>

 <!--mail-Compose-contant-start-->
<div class="row account-contant">
    <div class="col-12">
        <div class="card card-statistics">
            <div class="card-body p-0">
                <div class="row no-gutters">
                    <div class="col-xl-3 pb-xl-0 pb-5 border-right">
                        <div class="page-account-profil pt-5">
                            <div class="profile-img text-center rounded-circle">
                                <div class="pt-5">
                                    <div class="bg-img m-auto">
                                         <?php $images = json_decode($profile_image, true); ?>
                                        <?php if (file_exists('uploads/profile_image/'.$images[0]['thumb']) &! empty($images)): ?>
                                            <img src="<?=base_url()?>uploads/profile_image/<?=$images[0]['thumb']?>" id="show_img" class="img-fluid" alt="users-avatar">
                                        <?php else: ?>
                                            <img src="<?= base_url(); ?>assets/site_img/nophoto.jpg" class="img-fluid" id="show_img" alt="users-avatar">
                                        <?php endif ?>
                                        
                                    </div>
                                    <div class="profile pt-4">
                                        <h4 class="mb-1"><?= $sponsor_info->username; ?></h4>
                                        <p><?= $sponsor_info->profile_id; ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="py-5 profile-counter">
                                <ul class="nav justify-content-center text-center">
                                    <li class="nav-item border-right px-3">
                                        <div>
                                            <h4 class="mb-0">90</h4>
                                            <p>Post</p>
                                        </div>
                                    </li>

                                    <li class="nav-item border-right px-3">
                                        <div>
                                            <h4 class="mb-0">1.5K</h4>
                                            <p>Messages</p>
                                        </div>
                                    </li>

                                    <li class="nav-item px-3">
                                        <div>
                                            <h4 class="mb-0">4.4K</h4>
                                            <p>Members</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                             <div class="profile-btn text-white text-center">

                                <?php if ($sponsor_info->is_blocked == 'yes'): ?>
                                    <form action="<?=base_url()?>home/sponsor_register/sponsor_active/<?= $sponsor_info->sponsor_id; ?>" method="POST" enctype="multipart/form-data">
                                          <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                                        <input type="text" style="display: none;" id="is_blocked" name="is_blocked" value="no" />
                                        <div><button class="btn btn-dark text-white mb-2" data-toggle="tooltip" data-placement="top" title="Sponsor Blocked Activate Now"> <i class="fa fa-ban"></i> Blocked</button></div>
                                   </form>
                                <?php else: ?>
                                      <form action="<?=base_url()?>home/sponsor_register/sponsor_block/<?= $sponsor_info->sponsor_id; ?>" method="POST" enctype="multipart/form-data">
                                          <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                                            <input type="text" style="display: none;" id="is_blocked" name="is_blocked" value="yes" />
                                            <div><button class="btn btn-success text-white mb-2" data-toggle="tooltip" data-placement="top" title="Sponsor Activate Blocked Now"> <i class="fa fa-check"></i> Activate</button></div>
                                       </form>
                                <?php endif ?>
                                   
                               <!-- <form action="<?=base_url()?>members/account_settings/upload_profile" method="POST" id="profile_image_form" enctype="multipart/form-data">
                                    <input type="file" style="display: none;" id="profile_image" name="profile_image"/>
                                    <div><button class="btn btn-success text-white mb-2"> <i class="fa fa-check"></i> Activate Now</button></div>
                               </form>
 -->
                             </div>

                            <div class="profile-btn text-center">
                                   <div class="profile-connect mt-1 mb-0" id="save_button_section" style="display: none;">
                                            <button type="button" class="btn btn-success text-white mb-2" id="save_image" ><?php echo translate('save_image')?></button>
                                    </div>
                                         <label class="btn-aux" for="profile_image" style="cursor: pointer;">
                                            <i class="btn btn-light text-primary mb-2"><?php echo translate('Upload_new_avatar')?></i>
                                        </label>

                                         <form action="<?=base_url()?>members/account_settings/upload_profile" method="POST" id="profile_image_form" enctype="multipart/form-data">
                                              <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                                            <input type="file" style="display: none;" id="profile_image" name="profile_image"/>
                                        </form>
                                <div><button class="btn btn-danger">Delete</button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-6 col-12 border-t border-right">
                        <div class="page-account-form">
                            <div class="form-titel border-bottom p-3">
                                <h5 class="mb-0 py-2">Edit Your Personal Settings</h5>
                            </div>
                            <div class="p-4">
                                <form action="<?= base_url(); ?>home/sponsor_register/update_sponsor/<?= $sponsor_info->sponsor_id; ?>" method="post" id="update_form">
                                      <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                                    <div class="form-row">
                                       
                                        <div class="form-group col-md-12">
                                            <label for="full_name">Full Name</label>
                                            <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $sponsor_info->full_name; ?>">
                                            <?= form_error('full_name' , '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $sponsor_info->last_name; ?>">
                                            <?= form_error('last_name' , '<div class="text-danger">', '</div>'); ?>
                                        </div>


                                  
                                       
                                        <div class="form-group col-md-12">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?= $sponsor_info->email; ?>">
                                            <?= form_error('email' , '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>

                                      <div class="form-row">
                                         <div class="col-12">
                                            <label class="mb-1">Gender</label>
                                        </div>
                                       
                                        <div class="form-group col-md-12">
                                             <?php
                                                    echo $this->Crud_model->select_html('gender', 'gender', 'name', 'edit', 'form-control form-control-md selectpicker', $sponsor_info->gender, '', '', '');
                                                ?>
                                                <?= form_error('gender' , '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                   
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" id="address" class="form-control" rows="3" > <?= $sponsor_info->address; ?></textarea>
                                        <?= form_error('address' , '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                   

                                    <div class="form-row">
                                        <div class="col-12">
                                            <label class="mb-1">Position</label>
                                        </div>
                                        <div class="form-group col-md-12">
                                             <?php
                                                    echo $this->Crud_model->select_html('position', 'position', 'name', 'edit', 'form-control form-control-md selectpicker', $sponsor_info->position, '', '', '');
                                                ?>
                                                <?= form_error('position' , '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                   
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputState3">Product</label>
                                            <?php
                                                    echo $this->Crud_model->select_html('package', 'product', 'name', 'edit', 'form-control form-control-md selectpicker', $sponsor_info->product, '', '', '');
                                                ?>
                                                <?= form_error('product' , '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                   
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                                <label for="date_of_birth">Date Of Birth</label>
                                                <input type="text" class="form-control date-picker-default" id="date_of_birth" name="date_of_birth" value="<?= $sponsor_info->date_of_birth; ?>">
                                                <?= form_error('date_of_birth' , '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                     <div class="form-row">
                                    <div class="form-group col-md-12">
                                            <label for="back_name">Back Name</label>
                                            <input type="text" class="form-control" id="back_name" name="back_name" value="<?= $sponsor_info->back_name; ?>">
                                            <?= form_error('back_name' , '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    </div>
                                     <div class="form-row">
                                    <div class="form-group col-md-12">
                                            <label for="account_no">Account No</label>
                                            <input type="text" class="form-control" id="account_no" name="account_no" value="<?= $sponsor_info->account_no; ?>">
                                            <?= form_error('account_no' , '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    </div>
                                     <div class="form-row">
                                    <div class="form-group col-md-12">
                                            <label for="branch_name">Branch Name</label>
                                            <input type="text" class="form-control" id="branch_name" name="branch_name" value="<?= $sponsor_info->branch_name; ?>">
                                            <?= form_error('branch_name' , '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="form-group col-md-12">
                                            <label for="ifsc">Ifsc</label>
                                            <input type="text" class="form-control" id="ifsc" name="ifsc_code" value="<?= $sponsor_info->ifsc; ?>">
                                            <?= form_error('ifsc' , '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputState3"><?= translate('payment_type'); ?></label>
                                            <?php
                                                    echo $this->Crud_model->select_html('payoptions', 'payment_type', 'name', 'edit', 'form-control form-control-md selectpicker', $sponsor_info->payment_type, '', '', '');
                                                ?>
                                                <?= form_error('payment_type' , '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                   
                                    </div>
                                 
                                    <button type="submit" id="update_form" class="btn btn-primary">Update Information</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 border-t col-12">
                        <div class="page-account-form">
                            <div class="form-titel border-bottom p-3">
                                <h5 class="mb-0 py-2">Change Sponsor Password</h5>
                            </div>
                            <div class="p-4">
                                 <form id="change_password_form_sponsor" method="post" role="form">
                                      <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                                 
                                    <div class="form-group">
                                        <label for="new_password">New Password:</label>
                                        <input type="password" name="new_password" class="form-control" id="new_password">
                                    </div>

                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password:</label>
                                        <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                                    </div>

                                     <div class="form-group">
                                       
                                        <input type="hidden" name="sponsor_id" class="form-control" value="<?= $sponsor_info->sponsor_id; ?>" id="sponsor_id">
                                    </div>
                                      
                                      <div class="text-danger" id="validation_error"> <!-- Shows Validation Errors --> </div>
                                    <button type="submit" class="btn btn-primary mt-2" id="btn_pass" style="width: 100%" disabled=""><?php echo translate('save_&_update')?></button>
                                    
                                    <!-- <button type="submit" class="btn btn-primary">Save & Update</button> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--mail-Compose-contant-end-->


<script>
    setTimeout(function() {
        $('#success_alert').fadeOut('fast');
        $('#danger_alert').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
</script>


<script>

    $("#profile_image").change(function () {
        readURL(this);
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#show_img").attr({
                    "src" : ""+ e.target.result +""
                });
            }
            reader.readAsDataURL(input.files[0]);
            $("#save_button_section").show();
        }
    }
    $("#save_image").click(function(e) {
        e.preventDefault();
        // alert('asdas');
        $("#profile_image_form").submit();
    })
</script>


<script>
    $(document).ready(function(){
        var new_pass = "";
        var confirm_pass = "";

        function btn_state(){
            if (new_pass == confirm_pass && (new_pass != '' || confirm_pass != '')) {
                $("#btn_pass").removeAttr("disabled");
            } else {
                $("#btn_pass").attr("disabled", "disabled");            
            }
        }

        $("#confirm_password").keyup(function(){
            confirm_pass = $("#confirm_password").val();
            new_pass = $("#new_password").val();
            if (confirm_pass != new_pass) {
                // alert(confirm_pass+", "+new_pass);
                $("#confirm_password").css("border", "1px solid #e33244");
            } 
            else if (confirm_pass == new_pass) {
                // alert('yes');
                $("#confirm_password").css("border", "1px solid #71ba51");
            }
            btn_state();
        });

        $("#new_password").keyup(function(){
            confirm_pass = $("#confirm_password").val();
            new_pass = $("#new_password").val();
            if (confirm_pass != new_pass) {
                // alert(confirm_pass+", "+new_pass);
                $("#confirm_password").css("border", "1px solid #e33244");
            } 
            else if (confirm_pass == new_pass) {
                // alert('yes');
                $("#confirm_password").css("border", "1px solid #71ba51");
            }
            btn_state();
        });

        $("#btn_pass").click(function(){
            $('#btn_pass').prop('disabled', true);
            $('#btn_pass').html("<i class='fa fa-refresh fa-spin'></i> <?php echo translate('processing')?>...");
            $.ajax({
                type: "POST",
                url: "<?=base_url()?>home/sponsor_register/sponsor_update_password",
                cache: false,
                data: $('#change_password_form_sponsor').serialize(),
                success: function(response) {
                    // alert($('#form_'+section).serialize());
                    if (IsJsonString(response)) {
                        // Re_Enabling the Elements
                        $('#btn_pass').html("<?php echo translate('save')?>");
                        // Displaying Validation Error for ajax submit
                        // alert('TRUE');
                        var JSONArray = $.parseJSON(response);
                        var html = "";
                        $.each(JSONArray, function(row, fields) {
                            // alert(fields['ajax_error']);
                            html = fields['ajax_error'];
                        });
                        $('#validation_info').html(html);
                        $('#ajax_validation_alert').show();
                        $('#change_password_form').trigger("reset");
                        setTimeout(function() {
                            $('#ajax_validation_alert').fadeOut('fast');
                        }, 5000); // <-- time in milliseconds
                    }
                    else{
                        // Loading the specific Section Area
                        // alert('FALSE');
                        $('#btn_pass').html("<?php echo translate('save')?>");
                        $('#change_password_form').trigger("reset");
                        $("#confirm_password").css("border", "1px solid #e6e6e6");
                        
                        $('#ajax_alert').html("<div class='alert alert-success fade show' role='alert'><?php echo translate('you_have_successfully_edited_your_password!')?></div>");
                        $('#ajax_alert').show();
                        setTimeout(function() {
                            $('#ajax_alert').fadeOut('fast');
                        }, 5000); // <-- time in milliseconds
                    }
                    //window.location.href = "<?=base_url()?>home/profile";
                },
                fail: function (error) {
                    alert(error);
                }
            });
        });

        function IsJsonString(str) {
            try {
                JSON.parse(str);
            } catch (e) {
                return false;
            }
            return true;
        }
    });
</script>