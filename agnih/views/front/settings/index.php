
<div class="row">
	<div class="col-md-12">
		<?php if (!empty($success_alert)): ?>
				<div class="alert alert-success" id="success_alert" style="display: block">
	                <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
	                <?=$success_alert?>
	            </div>
			<?php endif ?>
	</div>
</div>

<div class="row">

	<div class="col-xxl-6">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title"> <?= translate('manage_settings') ?>  </h4>
                </div>
            </div>
            <div class="card-body">
                <div class="tab tab-vertical">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link show active" id="general_settings_tab" data-toggle="tab" href="#general_settings" role="tab" aria-controls="general_settings" aria-selected="true"> General Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="social_links_tab" data-toggle="tab" href="#social_links" role="tab" aria-controls="social_links" aria-selected="false"> Social Links </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="terms_conditions_tab" data-toggle="tab" href="#terms_conditions" role="tab" aria-controls="terms_conditions" aria-selected="false">Terms & Conditions </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="privacy_policy_tab" data-toggle="tab" href="#privacy_policy" role="tab" aria-controls="privacy_policy" aria-selected="false"> Privacy Policy </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="general_settings" role="tabpanel" aria-labelledby="general_settings_tab">
                        	 <h4 class="mb-5">General Settings</h4>
                             <?php include_once "general_settings.php";?>
                        </div>
                        <div class="tab-pane fade" id="social_links" role="tabpanel" aria-labelledby="social_links_tab">
                        	 <h4 class="mb-5">Social Links</h4>
                             <?php include_once "social_links.php";?>
                        </div>
                        <div class="tab-pane fade" id="terms_conditions" role="tabpanel" aria-labelledby="terms_conditions_tab">
                             <h4 class="mb-5">Terms & Conditions</h4>
                              <?php include_once "terms_and_conditions.php";?>
                        </div>
                        <div class="tab-pane fade" id="privacy_policy" role="tabpanel" aria-labelledby="privacy_policy_tab">
                             <h4 class="mb-5"> Privacy Policy </h4>
                             <?php include_once "privacy_policy.php";?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	

</div>


<script>
    setTimeout(function() {
        $('#success_alert').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
</script>
<script>
$('#summernote2').summernote({airMode: true,placeholder:'Try the airmode'});
</script>