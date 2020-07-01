<?php
// Leading Json data
$profile_image = $this->Crud_model->get_type_name_by_id('admin', $this->session->userdata('admin_id'), 'admin_image');
$profile_image_data = json_decode($profile_image, true);

// var_dump($profile_image_data);
?>

<style>
    #validation_info p {
        color: #fff;
    }
</style>

<div class="row mb-20">
    <?php if (!empty($success_alert)): ?>
        <div class="col-12" id="success_alert">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?= $success_alert ?>
            </div>
        </div>
    <?php endif ?>
    <?php if (!empty($danger_alert)): ?>
        <div class="col-12" id="danger_alert">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?= $danger_alert ?>
            </div>
        </div>
    <?php endif ?>
</div>


<div class="col-lg-3 col-md-6" id="ajax_alert" style="display: none; position: color: #fff; fixed; top: 15px; right: 0; z-index: 9999">
    <div class="alert alert-success fade show" role="alert">
        <?php echo translate('you_have_successfully_edited_your_profile!') ?>
    </div>
</div>
<!-- Alert for Ajax Profile Edit Section -->
<!-- Alert for Validating Ajax Profile Edit Section -->
<div class="col-lg-3 col-md-4" id="ajax_validation_alert" style="display: none; color: #fff; position: fixed; top: 15px; right: 0; z-index: 9999">
    <div class="alert alert-danger fade show" role="alert">
        </button>
        <span id="validation_info" style="color: #fff;"></span>
    </div>
</div>
<!-- Alert for Validating Ajax Profile Edit Section -->
<!-- Alerts for Member actions -->
<div class="col-lg-3 col-md-4" id="ajax_success_alert" style="display: none; color: #fff; position: fixed; top: 15px; right: 0; z-index: 9999">
    <div class="alert alert-success ajax_success_alert fade show" role="alert">
        <!-- Success Alert Content -->
    </div>
</div>
<div class="col-lg-3 col-md-4" id="ajax_danger_alert" style="display: none; color: #fff; position: fixed; top: 15px; right: 0; z-index: 9999">
    <div class="alert alert-danger ajax_danger_alert fade show" role="alert">
        <!-- Success Alert Content -->
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

                                    <div class="bg-img m-auto profile-picture">

                                        <?php $images = json_decode($profile_image, true); ?>

                                        <?php if (file_exists('uploads/admin_image/' . $images[0]['thumb'])): ?>
                                            <img src="<?= base_url() ?>uploads/admin_image/<?= $images[0]['thumb'] ?>" id="show_img" class="img-fluid" alt="admin-avatar">
                                        <?php else: ?>
                                            <img src="<?= base_url(); ?>assets/site_img/nophoto.jpg" class="img-fluid" id="show_img" alt="users-avatar">
                                        <?php endif ?>


                                    </div>


                                    <div class="profile pt-4">
                                        <h4 class="mb-1"><?php translate($this->session->userdata('admin_name')); ?> <?= $get_admin->name ?></h4>
                                        <p><?php $this->session->userdata('admin_email'); ?> <?= $get_admin->email ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="profile-btn text-center">
                                <div>

                                    <div class="profile-connect mt-1 mb-0" id="save_button_section" style="display: none;">
                                        <button type="button" class="btn btn-success text-white mb-2" id="save_image" ><?php echo translate('save_image') ?></button>
                                    </div>
                                    <label class="btn-aux" for="admin_image" style="cursor: pointer;">
                                        <i class="btn btn-light text-primary mb-2"><?php echo translate('Upload_new_avatar') ?></i>
                                    </label>

                                    <form action="<?= base_url() ?>home/account_settings/upload_profile" method="POST" id="profile_image_form" enctype="multipart/form-data">
                                          <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                                        <input type="file" style="display: none;" id="admin_image" name="admin_image"/>
                                    </form>




                                </div>
                                <div><button class="btn btn-danger">Delete Account</button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-6 col-12 border-t border-right">
                        <div class="page-account-form">
                            <div class="form-titel border-bottom p-3">
                                <h5 class="mb-0 py-2">Edit Your Profile</h5>
                            </div>
                            <div class="p-4">
                                <form action="<?= base_url(); ?>home/account_settings/update_profile" method="post">
                                     <?php $csrf = array('name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash() ); ?> <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?= $get_admin->name; ?>">
                                            <?= form_error('name', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="phone">Mobile Number</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?= $get_admin->phone; ?>">
                                            <?= form_error('phone', '<div class="text-danger">', '</div>'); ?>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="email">Email Login</label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?= $get_admin->email; ?>">
                                            <?= form_error('email', '<div class="text-danger">', '</div>'); ?>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" id="address" class="form-control" rows="3" > <?= $get_admin->address; ?></textarea>
                                        <?= form_error('address', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <!--   <div class="form-group">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" id="gridCheck">
                                              <label class="form-check-label" for="gridCheck">
                                                  I agree to receive email notification.
                                              </label>
                                          </div>
                                      </div> -->
                                    <button type="submit" class="btn btn-primary">Update Information</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 border-t col-12">
                        <div class="page-account-form">
                            <div class="form-titel border-bottom p-3">
                                <h5 class="mb-0 py-2">Change Password</h5>
                            </div>
                            <div class="p-4">
                                <form id="change_password_form" method="post" role="form">
                                      <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                                    <div class="form-group">
                                        <label for="current_password">Current Password:</label>
                                        <input type="password" name="current_password" class="form-control" id="current_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">New Password:</label>
                                        <input type="password" name="new_password" class="form-control" id="new_password">
                                    </div>

                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password:</label>
                                        <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                                    </div>

                                    <div class="text-danger" id="validation_error"> <!-- Shows Validation Errors --> </div>
                                    <button type="submit" class="btn btn-primary mt-2" id="btn_pass" style="width: 100%" disabled=""><?php echo translate('save_&_update') ?></button>

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
    setTimeout(function () {
        $('#success_alert').fadeOut('fast');
        $('#danger_alert').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
</script>


<script>

    $("#admin_image").change(function () {
        readURL(this);
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#show_img").attr({
                    "src": "" + e.target.result + ""
                });
            }
            reader.readAsDataURL(input.files[0]);
            $("#save_button_section").show();
        }
    }
    $("#save_image").click(function (e) {
        e.preventDefault();
        //alert('upload');
        $("#profile_image_form").submit();
    })
</script>



<script>
    $(document).ready(function () {
        var new_pass = "";
        var confirm_pass = "";

        function btn_state() {
            if (new_pass == confirm_pass && (new_pass != '' || confirm_pass != '')) {
                $("#btn_pass").removeAttr("disabled");
            } else {
                $("#btn_pass").attr("disabled", "disabled");
            }
        }

        $("#confirm_password").keyup(function () {
            confirm_pass = $("#confirm_password").val();
            new_pass = $("#new_password").val();
            if (confirm_pass != new_pass) {
                // alert(confirm_pass+", "+new_pass);
                $("#confirm_password").css("border", "1px solid #e33244");
            } else if (confirm_pass == new_pass) {
                // alert('yes');
                $("#confirm_password").css("border", "1px solid #71ba51");
            }
            btn_state();
        });

        $("#new_password").keyup(function () {
            confirm_pass = $("#confirm_password").val();
            new_pass = $("#new_password").val();
            if (confirm_pass != new_pass) {
                // alert(confirm_pass+", "+new_pass);
                $("#confirm_password").css("border", "1px solid #e33244");
            } else if (confirm_pass == new_pass) {
                // alert('yes');
                $("#confirm_password").css("border", "1px solid #71ba51");
            }
            btn_state();
        });

        $("#btn_pass").click(function () {
            $('#btn_pass').prop('disabled', true);
            $('#btn_pass').html("<i class='fa fa-refresh fa-spin'></i> <?php echo translate('processing') ?>...");
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>home/account_settings/change_password",
                cache: false,
                data: $('#change_password_form').serialize(),
                success: function (response) {
                    // alert($('#form_'+section).serialize());
                    if (IsJsonString(response)) {
                        // Re_Enabling the Elements
                        $('#btn_pass').html("<?php echo translate('save') ?>");
                        // Displaying Validation Error for ajax submit
                        // alert('TRUE');
                        var JSONArray = $.parseJSON(response);
                        var html = "";
                        $.each(JSONArray, function (row, fields) {
                            // alert(fields['ajax_error']);
                            html = fields['ajax_error'];
                        });
                        $('#validation_info').html(html);
                        $('#ajax_validation_alert').show();
                        $('#change_password_form').trigger("reset");
                        setTimeout(function () {
                            $('#ajax_validation_alert').fadeOut('fast');
                        }, 5000); // <-- time in milliseconds
                    } else {
                        // Loading the specific Section Area
                        // alert('FALSE');
                        $('#btn_pass').html("<?php echo translate('save') ?>");
                        $('#change_password_form').trigger("reset");
                        $("#confirm_password").css("border", "1px solid #e6e6e6");

                        $('#ajax_alert').html("<div class='alert alert-success fade show' role='alert'><?php echo translate('you_have_successfully_edited_your_password!') ?></div>");
                        $('#ajax_alert').show();
                        setTimeout(function () {
                            $('#ajax_alert').fadeOut('fast');
                        }, 5000); // <-- time in milliseconds
                    }
                    //window.location.href = "<?= base_url() ?>home/profile";
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