<div class="row mb-20">
    
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

</div>

<!-- start-clients contant-->
<div class="row">
    <div class="col-12">
        <div class="card card-statistics clients-contant">
            <div class="card-header">
                <div class="d-xxs-flex justify-content-between align-items-center">
                    <div class="card-heading">
                        <h4 class="card-title">Admins List</h4>
                    </div>
                    <div class="mt-xxs-0 mt-3 btn-group btn-group-toggle">
                       
                            <a href="<?= base_url(); ?>home/admins/admin_new" class="btn btn-sm btn-round  btn-primary">ADD ADMIN</a>
                                                
                    </div>
                </div>
            </div>
            <div class="card-body py-0 table-responsive">
                <table class="table clients-contant-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit & Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($all_admins as $key): ?>

                            <?php 
                                // Leading Json data
                                $profile_image = $this->Crud_model->get_type_name_by_id('admin', $key->admin_id, 'admin_image');
                                $images = json_decode($profile_image, true);

                                //var_dump($profile_image_data);
                            ?>

                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-img mr-4">
                                        <?php if (file_exists('uploads/admin_image/'.$images[0]['thumb'])): ?>
                                            <img src="<?=base_url()?>uploads/admin_image/<?=$images[0]['thumb']?>" id="show_img" class="img-fluid" alt="admin-avatar">
                                        <?php else: ?>
                                            <img src="<?= base_url(); ?>assets/site_img/nophoto.jpg" class="img-fluid" id="show_img" alt="users-avatar">
                                        <?php endif ?>
                                    </div>
                                    <p class="font-weight-bold"><?= $key->name; ?></p>
                                </div>
                            </td>
                            <td><?= $key->phone; ?></td>
                            <td><?= $key->email; ?></td>
                            <td>
                               
                                 <?php if ($key->is_blocked == "no"): ?>
                                      <a href="javascript:void(0)" class="dot"></a><span>Active</span>
                                 <?php else: ?>
                                      <a href="javascript:void(0)" class="dot bg-danger"></a><span>Bocked</span>
                                 <?php endif ?>

                               
                            </td>
                            <td>
                                <a href="<?= base_url(); ?>home/admins/update/<?= $key->admin_id; ?>" class="btn btn-icon btn-outline-primary btn-round mr-2 mb-2 mb-sm-0 "><i class="ti ti-pencil"></i></a>

                                <?php if ($key->is_blocked == "no"): ?>
                                     <a href="<?= base_url(); ?>home/admins/block/<?= $key->admin_id; ?>" class="btn btn-icon btn-outline-info btn-round"><i class="ti ti-thumb-up"></i></a>
                                <?php else: ?>
                                     <a href="<?= base_url(); ?>home/admins/active/<?= $key->admin_id; ?>" class="btn btn-icon btn-outline-warning btn-round"><i class="ti ti-thumb-down"></i></a>
                                <?php endif ?>
                               
                               
                                <button data-target="#delete_modal" data-toggle="modal" class="btn btn-icon btn-outline-danger btn-round" data-toggle="tooltip" data-placement="top" title="<?=translate('delete')?>" onclick="delete_admins(<?=$key->admin_id?>)"><i class="ti ti-close"></i></button>
                            </td>
                        </tr>

                     <?php endforeach ?>
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end-clients contant-->


</div>


<!--Default Bootstrap Modal-->
<!--===================================================-->
<div class="modal fade" id="admins_modal" admins="dialog" tabindex="-1" aria-labelledby="admins_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title" id="modal_title"></h4>
            </div>
            <!--Modal body-->
            <div class="modal-body" id="modal_body">
                
            </div>
            <div class="col-sm-12 text-center" id="validation_info" style="margin-top: -30px">

            </div>            
            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close"><?php echo translate('close')?></button>
                <button class="btn btn-primary btn-sm" id="save_admins" value="0"><?php echo translate('save')?></button>
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
                <h4 class="modal-title"><?php echo translate('confirm_delete')?></h4>
            </div>
            <!--Modal body-->
            <div class="modal-body">
                <p><?php echo translate('are_you_sure_you_want_to_delete_this_data?')?></p>
                <div class="text-right">
                    <button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close"><?php echo translate('close')?></button>
                    <button class="btn btn-danger btn-sm" id="delete_admins" value=""><?php echo translate('delete')?></button>
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

   function delete_admins(id){
        $("#delete_admins").val(id);
    }

    $("#delete_admins").click(function(){
        $.ajax({
            url: "<?=base_url()?>home/admins/delete/"+$("#delete_admins").val(),
            success: function(response) {
                window.location.href = "<?=base_url()?>home/admins/admin_list";
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

