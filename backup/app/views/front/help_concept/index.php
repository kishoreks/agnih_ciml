
<div class="row">
   <div class="col-md-12">
               <?php if (!empty($success_alert)): ?>
                <div class="alert alert-success" id="success_alert" style="display: block">
                    <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                    <?=$success_alert?>
                </div>
            <?php endif ?>
            <?php if (!empty($danger_alert)): ?>
                <div class="alert alert-danger" id="danger_alert" style="display: block">
                    <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                    <?=$danger_alert?>
                </div>
            <?php endif ?>
   </div>
</div>

<div class="row">
 
<div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data table</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Joined On</th>
                            <th>Customer Nmae</th>
                            <th>Profile Id</th>
                            <th>Activated On</th>
                            <th>Amount</th>
                            <th>Sponsor Id</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php $x = 1 ?>
                        
                        <?php foreach ($all_help_manage as $value): ?>

                            <tr>
                                <td><?= $x; ?></td>
                                <td class="text-info"><?= date('d-M-Y' , $value->joined_on); ?></td>
                                <td><?= $value->name; ?></td>
                                 <td class="text-warning"> <?= $value->manage_profile_id; ?></td>
                               <td class="text-success"><?= date('d-M-Y' , $value->activated_on); ?></td> 
                                <td> <i class="fa fa-rupee"></i> <?= $value->base_price; ?></td>
                                
                                <td>
                                  <label class="badge badge-success"><?= $value->sponsor_id; ?></label>
                                </td>
                                <td>
                                 
                                  <a href="<?= base_url(); ?>dashboard/help_concept/views/<?= $value->help_manage_id; ?>" class="btn btn-xs btn-info"> <i class="fa fa-eye"></i></a>
                                  <a href="<?= base_url(); ?>dashboard/help_concept/welcome_letter/<?= $value->help_manage_id; ?>" class="btn btn-xs btn-success" target="popup" onclick="window.open('<?= base_url(); ?>dashboard/help_concept/welcome_letter/<?= $value->help_manage_id; ?>','popup','width=600,height=600'); return false;"> <i class="fa fa-address-card"></i></a>
                                </td>

                                 <td>
                                 <a href='<?=base_url()?>dashboard/help_concept/edit_help/<?=$value->help_manage_id?>' id='demo-dt-view-btn' class='btn btn-primary btn-xs add-tooltip' data-toggle='tooltip' data-placement='top' title="<?=translate('edit')?>" ><i class='fa fa-edit'></i></a>
                                  <button data-target="#delete_modal" data-toggle="modal" class="btn btn-xs btn-outline-danger add-tooltip" data-toggle="tooltip" data-placement="top" title="<?=translate('delete')?>" onclick="delete_help_concept(<?=$value->help_manage_id?>)"><i class="fa fa-trash"></i></button>
                                </td>

                            </tr>
                         <?php $x++; ?>
                        <?php endforeach ?>
 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
                    <button class="btn btn-danger btn-sm" id="delete_help_concept" value=""><?php echo translate('delete')?></button>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Default Bootstrap Modal For DELETE-->



<script>
    setTimeout(function() {
        $('#success_alert').fadeOut('fast');
        $('#danger_alert').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
</script>

<script>
    $("#add_admins").click(function(){
        $("#modal_title").html("Add admins");
        $("#modal_body").html("<div class='text-center'><i class='fa fa-refresh fa-5x fa-spin'></i></div>");
        $("#save_admins").val(1);
        $('#validation_info').html("");
        $.ajax({
            url: "<?=base_url()?>admin/admins/add_admins",
            success: function(response) {
                $("#modal_body").html(response);
            },
            fail: function (error) {
                alert(error);
            }
        });
    });

    function edit_admins(id){
        $("#modal_title").html("Edit admins");
        $("#modal_body").html("<div class='text-center'><i class='fa fa-refresh fa-5x fa-spin'></i></div>");
        $("#save_admins").val(2);
        $('#validation_info').html("");
        $.ajax({
            url: "<?=base_url()?>admin/admins/edit_admins/"+id,
            success: function(response) {
                $("#modal_body").html(response);
            },
            fail: function (error) {
                alert(error);
            }
        });
    }

    $("#save_admins").click(function(){
        var check = $("#save_admins").val();
        var form = $("#admins_form");
        if (check == 1) {
            var page_url = "<?=base_url()?>admin/admins/do_add"
        } 
        if (check == 2) {
            var page_url = "<?=base_url()?>admin/admins/update"
        }
        $.ajax({
            type: "POST",
            url: page_url,
            cache: false,
            data: form.serialize(),
            success: function(response) {
                if (IsJsonString(response)) {
                    // Displaying Validation Error for ajax submit
                    var JSONArray = $.parseJSON(response);
                    var html = "";
                    $.each(JSONArray, function(row, fields) {
                        html = fields['ajax_error'];
                    });
                    $('#validation_info').html(html);
                }
                else {
                    window.location.href = "<?=base_url()?>admin/admins";
                }
            },
            fail: function (error) {
                alert(error);
            }
        });
    });

    function delete_help_concept(id){
        $("#delete_help_concept").val(id);
    }

    $("#delete_help_concept").click(function(){
        $.ajax({
            url: "<?=base_url()?>dashboard/help_concept/delete/"+$("#delete_help_concept").val(),
            success: function(response) {
                window.location.href = "<?=base_url()?>dashboard/help_concept";
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