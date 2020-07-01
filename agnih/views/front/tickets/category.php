<div class="row">
    <div class="col-xs-12">
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

 <div class="row account-contant">
    <div class="col-12">
        <div class="card card-statistics">
            <div class="card-body p-0">
                <div class="row no-gutters">                   
                    <div class="col-xl-12 col-md-6 border-t col-12">
                         <div class="form-titel border-bottom p-3">
                                <h5 class="mb-0 py-2">Manage categories</h5>
                          </div>
                    </div>

                    <div class="col-xl-12 col-md-6 border-t col-12 ">
                        <div class="col-md-12">
                                <div class="card card-statistics">
                                    <form method="post" action="<?= base_url(); ?>home/tickets/category/do_add">
                                          <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                                        <div class="card-body">
                                          <div class="form-group row">
                                             <div class="col-sm-4">
                                                 <input type="text" class="form-control" id="name" name="name" placeholder="Category name">
                                                  <?= form_error('name' , '<div class="text-danger">', '</div>');  ?>
                                             </div>
                                              <div class="col-sm-2">
                                                 <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                                             </div>
                                         </div>
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                   
                     <div class="col-xl-12 col-md-6 border-t col-12 mb-5 p-4">
                         <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead class="thead-dark">
                                   
                                        <tr>
                                            
                                            <th scope="col">Category name</th>
                                            <th scope="col">Graph</th>
                                            <th scope="col">Options</th>
                                        </tr>
                                    
                                </thead>
                                <tbody>

                                     <?php foreach ($department as $key): ?>
                                    <tr>
                                       
                                        <td><?= $key->name; ?></td>
                                        <td>
                                            <div class="progress">
                                               <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                            </div>
                                       </td>
                                        <td class="text-center">
                                            <a href="<?= base_url(); ?>home/tickets/category/edit/<?= $key->department_id; ?>"><i class="fa fa-edit text-primary text-center"></i></a> &nbsp;
                                           
                                             <button data-target="#category_modal" class="btn" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="<?=translate('delete')?>" onclick="category_admins(<?=$key->department_id?>)"><i class="fa fa-trash-o text-danger text-center" ></i></button>
                                        </td>
                                    </tr>

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
<!--mail-Compose-contant-end-->

<!--===================================================-->
<!--End Default Bootstrap Modal-->
<!--Default Bootstrap Modal For DELETE-->
<!--===================================================-->
<div class="modal fade" id="category_modal" admins="dialog" tabindex="-1" aria-labelledby="category_modal" aria-hidden="true">
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
                    <button class="btn btn-danger btn-sm" id="category_admins" value=""><?php echo translate('delete')?></button>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Default Bootstrap Modal For DELETE-->


<script>
 
    function category_admins(id){
        $("#category_admins").val(id);
    }

    $("#category_admins").click(function(){
        $.ajax({
            url: "<?=base_url()?>home/tickets/category/delete/"+$("#category_admins").val(),
            success: function(response) {
                window.location.href = "<?=base_url()?>home/tickets/category/";
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