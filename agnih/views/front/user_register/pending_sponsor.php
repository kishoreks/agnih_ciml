 <!-- begin row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatable" class="display compact table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Profile ID</th>
                                <th>Username</th>
                                <th>Mobile</th>
                                <th>Payment Type</th>
                                <th>Fee Paid</th>
                                <th>Setting</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($peding_sponsor as $sponsor): ?>

                                 <tr>
                                                <td><?= $sponsor->full_name; ?></td>
                                                <td><span class="badge  badge-primary-inverse"><?= $sponsor->profile_id; ?></span></td>
                                                <td><?= $sponsor->username; ?></td>
                                                <td><?= $sponsor->mobile_no; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-badge btn-xs btn-success">
                                                         <?= $this->Crud_model->get_type_name_by_id('payoptions', $sponsor->payment_type); ?> <!-- <span class="badge badge-light">4</span> -->
                                                    </button>
                                                </td>
                                                <td> <i class="fa fa-rupee"></i> <?= $this->Crud_model->get_type_name_by_id('package', $sponsor->product) ?> </td>
                                                <td><div class="py-2">
                                                        <a href="" class="btn btn-icon btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Sponsor Invoice" target="popup" onclick="window.open('<?= base_url(); ?>home/sponsor_register/sponsor_invoice/<?= $sponsor->sponsor_id; ?>', 'popup', 'width=800,height=600'); return false;"><i class="fa fa-credit-card-alt"></i></a>

                                                        <a href="<?= base_url(); ?>home/sponsor_register/update_sponsor/<?= $sponsor->sponsor_id; ?>" class="btn btn-icon btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Edit Sponsor"><i class="fa fa-pencil-square-o"></i></a>

                                                        <?php if ($sponsor->is_blocked == 'yes'): ?>

                                                            <button data-target="#sponsor_active_home_modal" data-toggle="modal" class="btn btn-dark btn-xs add-tooltip" data-toggle="tooltip" data-placement="top" title="<?= translate('activate_block') ?>" onclick="sponsor_active_home(<?= $sponsor->sponsor_id ?>)"><i class="fa fa-ban"></i></button>

                                                        <?php else: ?>

                                                            <button data-target="#sponsor_block_home_modal" data-toggle="modal" class="btn btn-success btn-xs add-tooltip" data-toggle="tooltip" data-placement="top" title="<?= translate('block_sponsor') ?>" onclick="sponsor_block_home(<?= $sponsor->sponsor_id ?>)"><i class="fa fa-unlock"></i></button>

                                                        <?php endif ?>


                                                        <a href="<?= base_url(); ?>home/sponsor_overview/profile/<?= $sponsor->sponsor_id; ?>" class="btn btn-icon btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Sponsor Details"><i class="dashicons dashicons-image-filter"></i></a>


                                                        <button data-target="#delete_modal" data-toggle="modal" class="btn btn-danger btn-xs add-tooltip" data-toggle="tooltip" data-placement="top" title="<?= translate('delete') ?>" onclick="delete_sponsor(<?= $sponsor->sponsor_id ?>)"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                
                            <?php endforeach ?>
                           
                            
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Profile ID</th>
                                <th>Username</th>
                                <th>Mobile</th>
                                <th>Payment Type</th>
                                <th>Fee Paid</th>
                                <th>Setting</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->



<!--===================================================-->
<!--End Default Bootstrap Modal-->
<!--Default Bootstrap Modal For DELETE-->
<!--===================================================-->
<div class="modal fade" id="sponsor_active_home_modal" active_home="dialog" tabindex="-1" aria-labelledby="sponsor_active_home" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title"><?php echo translate('confirm_active') ?></h4>
            </div>
            <!--Modal body-->
            <div class="modal-body">
                <p><?php echo translate('are_you_sure_you_want_to_activate_this_data?') ?></p>
                <div class="text-right">
                    <button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close"><?php echo translate('close') ?></button>

                    <button class="btn btn-success btn-sm" id="sponsor_active_home" value=""><?php echo translate('Activate') ?></button>
                </div>
            </div>

        </div>
    </div>
</div>

<!--===================================================-->
<!--End Default Bootstrap Modal-->
<!--Default Bootstrap Modal For DELETE-->
<!--===================================================-->
<div class="modal fade" id="sponsor_block_home_modal" block_home="dialog" tabindex="-1" aria-labelledby="sponsor_block_home" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title"><?php echo translate('confirm_block') ?></h4>
            </div>
            <!--Modal body-->
            <div class="modal-body">
                <p><?php echo translate('are_you_sure_you_want_to_block_this_data?') ?></p>
                <div class="text-right">
                    <button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close"><?php echo translate('close') ?></button>
                    <button class="btn btn-danger btn-sm" id="sponsor_block_home" value=""><?php echo translate('block') ?></button>
                </div>
            </div>

        </div>
    </div>
</div>

<!--===================================================-->
<!--End Default Bootstrap Modal-->
<!--Default Bootstrap Modal For DELETE-->
<!--===================================================-->
<div class="modal fade" id="delete_modal" admins="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title"><?php echo translate('confirm_delete') ?></h4>
            </div>
            <!--Modal body-->
            <div class="modal-body">
                <p><?php echo translate('are_you_sure_you_want_to_delete_this_data?') ?></p>
                <div class="text-right">
                    <button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close"><?php echo translate('close') ?></button>
                    <button class="btn btn-danger btn-sm" id="delete_sponsor" value=""><?php echo translate('delete') ?></button>
                </div>
            </div>

        </div>
    </div>
</div>
<!--===================================================-->
<!--End Default Bootstrap Modal For DELETE-->
<script>
    setTimeout(function () {
        $('#success_alert').fadeOut('fast');
        $('#danger_alert').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
</script>
<script>
    $("#add_admins").click(function () {
        $("#modal_title").html("Add admins");
        $("#modal_body").html("<div class='text-center'><i class='fa fa-refresh fa-5x fa-spin'></i></div>");
        $("#save_admins").val(1);
        $('#validation_info').html("");
        $.ajax({
            url: "<?= base_url() ?>admin/admins/add_admins",
            success: function (response) {
                $("#modal_body").html(response);
            },
            fail: function (error) {
                alert(error);
            }
        });
    });

    function edit_admins(id) {
        $("#modal_title").html("Edit admins");
        $("#modal_body").html("<div class='text-center'><i class='fa fa-refresh fa-5x fa-spin'></i></div>");
        $("#save_admins").val(2);
        $('#validation_info').html("");
        $.ajax({
            url: "<?= base_url() ?>admin/admins/edit_admins/" + id,
            success: function (response) {
                $("#modal_body").html(response);
            },
            fail: function (error) {
                alert(error);
            }
        });
    }

    $("#save_admins").click(function () {
        var check = $("#save_admins").val();
        var form = $("#admins_form");
        if (check == 1) {
            var page_url = "<?= base_url() ?>admin/admins/do_add"
        }
        if (check == 2) {
            var page_url = "<?= base_url() ?>admin/admins/update"
        }
        $.ajax({
            type: "POST",
            url: page_url,
            cache: false,
            data: form.serialize(),
            success: function (response) {
                if (IsJsonString(response)) {
                    // Displaying Validation Error for ajax submit
                    var JSONArray = $.parseJSON(response);
                    var html = "";
                    $.each(JSONArray, function (row, fields) {
                        html = fields['ajax_error'];
                    });
                    $('#validation_info').html(html);
                } else {
                    window.location.href = "<?= base_url() ?>admin/admins";
                }
            },
            fail: function (error) {
                alert(error);
            }
        });
    });

    function sponsor_active_home(id) {
        $("#sponsor_active_home").val(id);
    }

    $("#sponsor_active_home").click(function () {
        $.ajax({
            url: "<?= base_url() ?>home/sponsor_register/sponsor_active_home/" + $("#sponsor_active_home").val(),
            success: function (response) {
                window.location.href = "<?= base_url() ?>home/sponsor_register/all_sponsor";
            },
            fail: function (error) {
                alert(error);
            }
        });
    })

    function delete_sponsor(id) {
        $("#delete_sponsor").val(id);
    }

    $("#delete_sponsor").click(function () {
        $.ajax({
            url: "<?= base_url() ?>home/sponsor_register/delete_sponsor/" + $("#delete_sponsor").val(),
            success: function (response) {
                window.location.href = "<?= base_url() ?>home/sponsor_register/all_sponsor";
            },
            fail: function (error) {
                alert(error);
            }
        });
    })



    function sponsor_block_home(id) {
        $("#sponsor_block_home").val(id);
    }

    $("#sponsor_block_home").click(function () {
        $.ajax({
            url: "<?= base_url() ?>home/sponsor_register/sponsor_block_home/" + $("#sponsor_block_home").val(),
            success: function (response) {
                window.location.href = "<?= base_url() ?>home/sponsor_register/all_sponsor";
            },
            fail: function (error) {
                alert(error);
            }
        });
    })

    function IsJsonString(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }
</script>

