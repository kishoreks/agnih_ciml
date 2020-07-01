<?php  $image = json_decode($get_sponsor->profile_image); ?>

<div class="row widget-social">

	<div class="col-xl-12 col-md-12">
        <div class="card card-statistics widget-social-box3">
            <div class="card-body p-0">
                <div class="text-center widget-social-contant py-5">
                    <div class="bg-img m-auto">
                        <?php if ($image[0]->thumb): ?>
                            <img class="img-fluid" src="<?= base_url(); ?>uploads/profile_image/<?= $image[0]->thumb ?>" alt="socialwidget-img">
                        <?php else: ?>
                            <img class="img-fluid" src="<?= base_url(); ?>uploads/profile_image/default_thumb.jpg" alt="socialwidget-img">
                        <?php endif ?>
                        
                    </div>
                    <div class="mt-3">
                        <h4 class="mb-1"><?= $get_sponsor->full_name; ?></h4>
                        <p class="mb-0"><a class="text-white" href="<?= base_url(); ?>home/sponsor_overview/profile/<?= $get_sponsor->sponsor_id ?>"><?= $get_sponsor->profile_id; ?></a></p>
                    </div>
                </div>
                <?php var_dump($release_get); ?>
                <ul class="nav justify-content-between text-center px-4 py-4">
                    <li class="flex-fill">
                        <h3 class="mb-0"><i class="fa fa-rupee"></i> <?= $release_get->paid_amount; ?></h3>
                        <p>Amount</p>
                    </li>
                    <li class="flex-fill">
                        <h3 class="mb-0"><?= $release_get->level; ?></h3>
                        <p>Level</p>
                    </li>
                    <li class="flex-fill">
                        <h3 class="mb-0">
                            <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <select id="inputState2" class="form-control">
                                        <option>Year</option>
                                        <option>1984</option>
                                        <option>1985</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-6"><a href="javascript:void(0);" class="btn btn-block btn-outline-primary">Primary</a></div>
                            </div>
                        </h3>
                        
                    </li>
                </ul>
            </div>
        </div>
    </div>
	
</div>