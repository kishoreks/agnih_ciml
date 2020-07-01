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

<div class="row">

	<?php foreach ($all_plans as $key): ?>

		<div class="col-xl-3 col-md-6">
	        <div class="card card-statistics text-center py-3">
	            <div class="card-body pricing-content">
	                <div class="pricing-content-card">
	                	<div class="text-right">
		            		<button data-target="#delete_modal" data-toggle="modal" class="btn  btn-xs add-tooltip" style="border-radius: 100%;" onclick="delete_package(<?= $key->package_id; ?>)" data-original-title="" title=""><i class="fa fa-close"></i></button>
		            	</div>
	                    <h5><?= $key->name ?> </h5> 
	                    <h2 class="text-primary pt-3"></h2>
	                    <p class="text-primary pb-3"> <i class="fa fa-rupee"></i> <?= $key->fee; ?></p>
	                    <ul class="py-2">
	                     <!--    <li>post jobs</li>
	                        <li>advanced instructors search</li>
	                        <li>invite candidates</li>
	                        <li>post events</li> -->
	                        <li>Members Count : <?= $key->members_count; ?></li>
	                    </ul>
	                    <div class="pt-2"><a href="<?= base_url(); ?>home/packages/edit_package/<?= $key->package_id ?>" class="btn btn-primary btn-round btn-sm"> <i class="fa fa-edit"></i> EDIT</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>


  <?php endforeach ?>

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
                    <button class="btn btn-danger btn-sm" id="delete_package" value=""><?php echo translate('delete')?></button>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Default Bootstrap Modal For DELETE-->



<script>

   function delete_package(id){
        $("#delete_package").val(id);
    }

    $("#delete_package").click(function(){
        $.ajax({
            url: "<?=base_url()?>home/packages/delete/"+$("#delete_package").val(),
            success: function(response) {
                window.location.href = "<?=base_url()?>home/packages";
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