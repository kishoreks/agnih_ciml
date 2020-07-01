<div class="row widget-social">
    <div class="col-lg-6 col-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-statistics widget-social-box12 ">
                    <div class="card-body p-0">
                        <div class="media widget-social-contant align-items-center p-4">
                            <div class="media-body">
                                <h4 class="mb-0 text-center">  <?= $count_sponsor; ?></h4>
                                <p class="text-center"> No Of Members</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-statistics widget-social-box12">
                    <div class="card-body p-0">
                        <div class="media widget-social-contant align-items-center p-4">
                            <div class="media-body">
                                <h4 class="mb-0 text-center"> <i class="fa fa-rupee"></i>  <?= number_format($ewallet_total ,2); ?></h4>
                                <p class="text-center">E-wallet</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-statistics widget-social-box12">
                    <div class="card-body p-0">
                        <div class="media widget-social-contant align-items-center p-4">
                            <div class="media-body">
                                <h4 class="mb-0 text-center"><i class="fa fa-rupee"></i> <?=number_format($payout_amount); ?></h4>
                                <p class="text-center">Payout</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-statistics widget-social-box12">
                    <div class="card-body p-0">
                        <div class="media widget-social-contant align-items-center p-4">
                            <div class="media-body">
                                <h4 class="mb-0 text-center"><?= count($new_ticket); ?></h4>
                                <p class="text-center">New Tickets</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="col-xl-12 col-md-6">
                    <div class="card card-statistics widget-social-box10">
                        <div class="card-body p-0">

                            <ul class="nav d-block">
                                <li class="nav-item">
                                    <a class="media nav-link align-items-center justify-content-between" href="<?= base_url('home/sponsor_register/pending_sponsor'); ?>">
                                        <h5 class="mb-0"> <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary-inverse"><i class="fe fe-check-circle pr-2"></i> Pending Sponsor</span></h5>
                                        <span class="badge badge-primary px-3 py-2"><?= count($peding_sponsor); ?></span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="media nav-link align-items-center justify-content-between" href="javascript:void(0)">
                                        <h5 class="mb-0"><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success-inverse"> <i class="fe fe-check-circle pr-2"></i> Activate Sponsor </span></h5>
                                        <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-primary px-3 py-2"><?= $active_sponsor; ?></span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="media nav-link align-items-center justify-content-between" href="javascript:void(0)">
                                        <h5 class="mb-0"><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary-inverse"> <i class="fe fe-check-circle pr-2"></i> Ticket Messages </span></h5>
                                        <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-primary px-3 py-2"><?= $count_tickets; ?></span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="media nav-link align-items-center justify-content-between" href="javascript:void(0)">
                                        <h5 class="mb-0"><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info-inverse"> <i class="fe fe-check-circle pr-2"></i> Payout </span></h5>
                                        <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-primary px-3 py-2"> <i class="fa fa-rupee"></i> <?=number_format($payout_amount); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>  

    <div class="col-lg-6 col-12">
      
        <div class="row">

            <div class="col-xxl-4">
                <div class="card card-statistics apexchart-tool-force-top">
                    <div class="card-header">
                        <h4 class="card-title"><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-primary-inverse">New Open Tickets  <i class="fa fa-ticket"></i> </span></h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($new_ticket as $ticket): ?>
                          
                            <div class="bg-light p-3 rounded m-b-20">
                                <div class="d-sm-flex justify-content-between">
                                    <div class="transition-left">
                                        <span><?= date('M d Y',$ticket->date_at); ?></span>
                                        <h5 class="mt-2 mb-0">Ticket No : <?= $ticket->ticket_no; ?></h5>
                                    </div>
                                    <div class="transition-right text-sm-right">
                                        <strong class="text-dark d-block mb-1"> <i class="fa fa-long-arrow-right pr-2"></i> 
                                            <?php if ($ticket->view_at == "1"): ?>
                                                 <i class="fa fa-envelope-open text-primary"></i> 
                                            <?php else: ?>
                                                 <i class="fa fa-envelope-o"></i> 
                                            <?php endif ?>
                                           
                                        </strong>

                                        <a class="text-primary" href="<?= base_url('home/tickets'); ?>"> View more</a>
                                    </div>
                                </div>
                            </div>

                         <?php endforeach ?>

                    </div>
                </div>
            </div>

        </div>


    </div>  


</div> 


<!-- 
<div class="row widget-social">

    <div class="col-lg-4">
        <div class="card card-statistics widget-social-box14">
            <div class="card-body p-0">
                <div class="media widget-social-contant align-items-center p-4">
                    <div class="bg-img mr-3"><img class="img-fluid" src="assets/img/avtar/05.jpg" alt="socialwidget-img"></div>
                    <div class="pr-1">
                        <h4 class="mb-0">Dephne Doe</h4>
                        <p>Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">New Sponsor %</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="jqueryknob-wrapper text-center">
                       
                    <input class="knob" data-thickness=".4" data-fgColor="#4776E6" readonly value="<?= substr($count_sponsor, 0,1) ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-statistics widget-social-box14">
            <div class="card-body p-0">
                <div class="media widget-social-contant align-items-center p-4">
                    <div class="bg-img mr-3"><img class="img-fluid" src="assets/img/avtar/05.jpg" alt="socialwidget-img"></div>
                    <div class="pr-1">
                        <h4 class="mb-0">Dephne Doe</h4>
                        <p>Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> -->

<div class="row">
    <div class="col-xxl-3">

        <div class="card card-statistics">
            <div class="card-header border-0">
                <h4 class="card-title"><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-primary-inverse">New Members Pending <i class="fa fa-clock-o text-danger"></i> </span></h4>
            </div>
            <div class="card-body datting-upload-image">
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
            </div>
        </div>
    </div>

</div>



<div class="row">
    <div class="col-12">
        <div class="card card-statistics">
            <div class="card-body p-0">
                <div class="row no-gutters">

                    <div class="col-lg-6 col-xl-6 p-20 border-bottom border-xl-bottom-0 border-xl-right">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <ul class="nav justify-content-between text-center px-4 py-4">
                                    <li class="flex-fill">
                                        <a href="<?= base_url('home/settings'); ?>">
                                        <h3 class="mb-0"><i class="font-30 mb-2 fa fa-desktop text-primary"></i></h3>
                                        <p>Settings</p></a>
                                    </li>
                                    <li class="flex-fill">
                                        <a href="<?= base_url('home/tickets/view_tickets'); ?>">
                                        <h3 class="mb-0"><i class="font-30 mb-2 fa fa-ticket text-primary"></i></h3>
                                        <p>Tickets</p></a>
                                    </li>
                                    <li class="flex-fill">
                                        <a href="<?= base_url('home/sms_settings/msg91'); ?>">
                                        <h3 class="mb-0"><i class="font-30 mb-2 fa fa-history  text-primary"></i></h3>
                                        <p>SMS Config</p></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-xl-6 p-20 border-bottom border-xl-bottom-0 border-xl-right">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <ul class="nav justify-content-between text-center px-4 py-4">
                                    <li class="flex-fill">
                                        <a href="<?= base_url('home/packages'); ?>">
                                        <h3 class="mb-0"><i class="font-30 mb-2 fa fa-suitcase text-primary"></i></h3>
                                        <p>Packages</p></a>
                                    </li>
                                    <li class="flex-fill">
                                        <a href="<?= base_url('home/admins/admin_list'); ?>">
                                        <h3 class="mb-0"><i class="font-30 mb-2 fa fa-user-plus text-primary"></i></h3>
                                        <p>New Staff Users</p></a>
                                    </li>
                                    <li class="flex-fill">
                                        <a href="<?= base_url('home/email_setup'); ?>">
                                        <h3 class="mb-0"><i class="font-30 mb-2 fa fa-envelope  text-primary"></i></h3>
                                        <p>Mail Config</p></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <div class="card card-statistics">
            <div class="card-body p-0">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-xl-6  p-20 border-bottom border-xl-bottom-0 border-lg-right border-lg-bottom">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">

                                <p><i class="fa fa-check-circle text-info"></i> Register New Members Or Sponsor In A Min.</p>
                                <p><i class="fa fa-check-circle text-info"></i> The System Send Sms To You Members On The Fly .</p>
                            </div>

                        </div>
                    </div> 
                    <div class="col-lg-6 col-xl-6  p-20 border-bottom border-xl-bottom-0 border-lg-right border-lg-bottom">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <p><i class="fa fa-check-circle text-info"></i> The Invoice Will Be Generated For All Members.</p>
                                <p><i class="fa fa-check-circle text-info"></i> Approve And Disapprove Members  In One Click Button .</p>
                            </div>

                        </div>
                    </div> 
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 col-xl-3 p-20 border-bottom border-xl-bottom-0 border-lg-right">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <h4 class="text-primary">Members Pending</h4>
                                <p>Members Pending will be displayed so you can approve it in one click .</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 p-20 border-bottom border-xl-bottom-0 border-xl-right">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <h4 class="text-primary">E-wallet</h4>
                                <p>The Wallet Will Show How Much Revenue So You Can Be Up To Date.</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 p-20 border-bottom border-lg-bottom-0 border-lg-right">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <h4 class="text-primary">Tickets</h4>
                                <p>Tickets system you can rice by the members will show in the top for help.</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 p-20">
                        <div class="row align-items-center">
                            <div class="col-xxs-12">
                                <h4 class="text-primary">Packages</h4>
                                <p>Add And Update Packages In A Min Of Your Wish .</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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






