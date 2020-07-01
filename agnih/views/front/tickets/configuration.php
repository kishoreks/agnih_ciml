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

<div class="row tabs-contant">
	
	<div class="col-xxl-6">
	    <div class="card card-statistics">
	        <div class="card-header">
	            <div class="card-heading">
	                <h4 class="card-title">Click The States Tab</h4>
	            </div>
	        </div>
	        <div class="card-body">
	            <div class="tab nav-bt">
	                <ul class="nav nav-tabs" role="tablist">

	                	
	                	
	                    <li class="nav-item">
	                        <a class="nav-link <?php if ($this->uri->segment(4) == 'status'): ?> <?php echo "show"; ?> <?php else: ?> <?php echo ""; ?> <?php endif ?> <?php if ($this->uri->segment(5) == "edit"): ?> <?php echo "active"; ?> <?php else: ?> <?php echo ""; ?> <?php endif ?>" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="true">Status</a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link <?php if ($this->uri->segment(4) == 'priority'): ?> <?php echo "show"; ?> <?php else: ?> <?php echo ""; ?> <?php endif ?> <?php if ($this->uri->segment(5) == "edit_priority"): ?> <?php echo "active"; ?> <?php else: ?> <?php echo ""; ?> <?php endif ?>" id="priority-tab" data-toggle="tab" href="#priority" role="tab" aria-controls="priority" aria-selected="false">Priority </a>
	                    </li>
	                   
	                </ul>
	                <div class="tab-content">

	                    <div class="tab-pane fade py-3 <?php if ($this->uri->segment(5) == "edit"): ?> <?php echo "active"; ?> <?php else: ?> <?php echo ""; ?> <?php endif ?> <?php if ($this->uri->segment(4) == 'status'): ?> <?php echo "show"; ?> <?php else: ?> <?php echo ""; ?> <?php endif ?>" id="status" role="tabpanel" aria-labelledby="status-tab">
                           
                              
	                         <div class="card card-statistics">
                                    <form method="post" action="<?= base_url(); ?>home/tickets/configuration/status/<?php if ($this->uri->segment(5) == 'edit'): ?><?= "edit/".$get_status->status_id;?><?php else: ?><?="do_add" ?> <?php endif ?>">
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
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Status name" value="<?php if ($this->uri->segment(5) == 'edit'): ?><?=$get_status->name;?> <?php else: ?><?= ""; ?><?php endif ?>">
                                                <?= form_error('name' , '<div class="text-danger">', '</div>'); ?> 
                                             </div>
                                              <div class="col-sm-4">
                                                 <button type="submit" class="btn btn-primary mb-2">Confirm & Status</button>
                                             </div>
                                         </div>
                                           
                                        
                                    </div></form>
                                </div>


                                <div class="col-xl-12 col-md-6 border-t col-12 mb-5 p-4">
		                         <div class="table-responsive">
		                            <table class="table table-bordered mb-0">
		                                <thead class="thead-dark">
		                                   
		                                        <tr>
		                                            
		                                            <th scope="col">Status name</th>
		                                            <th scope="col">Graph</th>
		                                            <th scope="col">Options</th>
		                                        </tr>
		                                    
		                                </thead>
		                                <tbody>

		                               <?php foreach ($status as $key): ?>
		                
			                                <tr>
			                                        <td><?= $key->name; ?></td>
			                                        <td>
			                                            <div class="progress">
			                                               <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
			                                            </div>
			                                       </td>
			                                        <td class="text-center">
			                                            <a href="<?= base_url() ?>home/tickets/configuration/status/edit/<?= $key->status_id ?>"><i class="fa fa-edit text-primary text-center"></i></a> &nbsp;
			                                           
			                                             <button data-target="#status_modal" class="btn" data-toggle="modal" data-placement="top" title="Delete" onclick="status_admins(<?=$key->status_id?>)"><i class="fa fa-trash-o text-danger text-center"></i></button>
			                                        </td>
			                                 </tr>  

		                                 <?php endforeach ?>
		                                                                       
		                                </tbody>
		                            </table>
		                        </div>
		                     </div>


	                    </div>
                      
                       
	                    <div class="tab-pane fade py-3 <?php if ($this->uri->segment(5) == "edit_priority"): ?> <?php echo "active"; ?> <?php else: ?> <?php echo ""; ?> <?php endif ?> <?php if ($this->uri->segment(4) == 'priority'): ?> <?php echo "show"; ?> <?php else: ?> <?php echo ""; ?> <?php endif ?>" id="priority" role="tabpanel" aria-labelledby="priority-tab">
	                       <div class="card card-statistics">
                                    <form method="post" action="<?= base_url(); ?>home/tickets/configuration/priority/<?php if ($this->uri->segment(5) == 'edit_priority'): ?><?= "edit_priority/".$get_priority->priority_id;?><?php else: ?><?="do_add" ?> <?php endif ?>">
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
                                                 <input type="text" class="form-control" id="name" name="name" placeholder="Priority name" value="<?php if ($this->uri->segment(5) == "edit_priority"): ?> <?= $get_priority->name  ?> <?php else: ?> <?= ""; ?> <?php endif ?>">
                                              </div>
                                              <div class="col-sm-4">
                                                 <button type="submit" class="btn btn-primary mb-2">Confirm & Priority</button>
                                             </div>
                                         </div>
                                           
                                        
                                    </div></form>
                                </div>


                                <div class="col-xl-12 col-md-6 border-t col-12 mb-5 p-4">
		                         <div class="table-responsive">
		                            <table class="table table-bordered mb-0">
		                                <thead class="thead-dark">
		                                   
		                                        <tr>
		                                            
		                                            <th scope="col">Priority name</th>
		                                            <th scope="col">Graph</th>
		                                            <th scope="col">Options</th>
		                                        </tr>
		                                    
		                                </thead>
		                                <tbody>

		                                	<?php foreach ($priority as $value): ?>
		                          
					                                <tr>
					                                       
					                                        <td><?= $value->name; ?></td>
					                                        <td>
					                                            <div class="progress">
					                                               <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
					                                            </div>
					                                       </td>
					                                        <td class="text-center">
					                                            <a href="<?= base_url(); ?>home/tickets/configuration/priority/edit_priority/<?= $value->priority_id; ?>"><i class="fa fa-edit text-primary text-center"></i></a> &nbsp;
					                                           
					                                             <button data-target="#priority_modal" class="btn" data-toggle="modal" data-placement="top" title="Delete" onclick="priority_admins(<?= $value->priority_id; ?>)"><i class="fa fa-trash-o text-danger text-center"></i></button>
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
	</div>

</div>



<!--===================================================-->
<!--End Default Bootstrap Modal-->
<!--Default Bootstrap Modal For DELETE-->
<!--===================================================-->
<div class="modal fade" id="status_modal" admins="dialog" tabindex="-1" aria-labelledby="status_modal" aria-hidden="true">
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
                    <button class="btn btn-danger btn-sm" id="status_admins" value=""><?php echo translate('delete')?></button>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Default Bootstrap Modal For DELETE-->

<!--===================================================-->
<!--End Default Bootstrap Modal-->
<!--Default Bootstrap Modal For DELETE-->
<!--===================================================-->
<div class="modal fade" id="priority_modal" admins="dialog" tabindex="-1" aria-labelledby="priority_modal" aria-hidden="true">
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
                    <button class="btn btn-danger btn-sm" id="priority_admins" value=""><?php echo translate('delete')?></button>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Default Bootstrap Modal For DELETE-->


<script>
 
    function status_admins(id){
        $("#status_admins").val(id);
    }

    $("#status_admins").click(function(){
        $.ajax({
            url: "<?=base_url()?>home/tickets/configuration/status/delete/"+$("#status_admins").val(),
            success: function(response) {
                window.location.href = "<?=base_url()?>home/tickets/configuration/";
            },
            fail: function (error) {
                alert(error);
            }
        });
    })

    function priority_admins(id){
        $("#priority_admins").val(id);
    }

    $("#priority_admins").click(function(){
        $.ajax({
            url: "<?=base_url()?>home/tickets/configuration/priority/delete/"+$("#priority_admins").val(),
            success: function(response) {
                window.location.href = "<?=base_url()?>home/tickets/configuration/";
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