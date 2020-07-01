<div class="row widget-social">
	
	<div class="col-xl-12 col-md-6">
        <div class="card card-statistics widget-social-box3">
            <div class="card-body p-0">
                <div class="text-center widget-social-contant py-2">
                    
                    <div class="mt-3">
                        <h4 class="mb-1"><?= $this->Crud_model->get_type_name_by_id('sponsor', $get_sponsor_request->sponsor_id, 'full_name'); ?></h4>
                        <p class="mb-0"><a class="text-white" href="javascript:void(0)"><?= $this->Crud_model->get_type_name_by_id('sponsor', $get_sponsor_request->sponsor_id, 'profile_id'); ?> / <?= $this->Crud_model->get_type_name_by_id('sponsor', $get_sponsor_request->sponsor_id, 'mobile_no'); ?></a></p>
                    </div>
                </div>
                <ul class="nav justify-content-between text-center px-2 py-2">
                    <li class="flex-fill">
                        <h3 class="mb-0"><i class="fa fa-rupee"></i> <?= $this->Crud_model->get_type_name_by_id('package', $get_sponsor_request->package_amount, 'fee'); ?></h3>
                        <p><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-primary-inverse"> <?= $this->Crud_model->get_type_name_by_id('package', $get_sponsor_request->package_amount, 'name'); ?></span> </p>
                    </li>
                    <li class="flex-fill">
                        <h3 class="mb-0"><?= date("d-M-Y" ,$get_sponsor_request->request_on); ?></h3>
                        <p><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge  badge-primary-inverse">Applied Date</span></p>
                    </li>
                    
                </ul>
                 <div class="text-center bg-info py-2">
                   
                    <div class="mt-3">
                        <h4 class="mb-1 text-white">
                        	<?php  
                                              
                                  if ($get_sponsor_request->status == 0) {
                                     echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-secondary">Pending</span>';
                                  } else {
                                       echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-success">Approved</span>';
                                  }

                          ?>
                        </h4>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- 
    <div class="col-xl-8 col-sm-6">
        <div class="card card-statistics widget-social-box15">
            <div class="card-body bg-primary">
                <i class="font-30 mb-2 fa fa-facebook text-white"></i>
                <p class="text-white">There is really no magic to it and it’s not reserved only for a select few people. </p>
                <small class="text-white">14 April, 2018 via web</small>
                <ul class="list-inline float-right mb-0">
                    <li class="list-inline-item text-white">
                        <a href="javascript:void(0)"><i class="fa fa-thumbs-o-up"></i> 845</a>
                    </li>
                    <li class="list-inline-item text-white">
                        <a href="javascript:void(0)"><i class="fa fa-share"></i> 956</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->

</div>

<div class="row">
	
	<div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title"><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary-inverse">Selected Sponsor</span></h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    
                   
                    <table class="table table-success mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Profile Id</th>
                                <th scope="col">Package</th>
                                <th scope="col">Mobile NO</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php $i = 1; ?>
                        	<?php foreach ($select_sponsor as $sponsor): ?>
                        		
	                        	
	                            <tr>
	                                <th scope="row"><?= $i; ?></th>
	                                <td><?= $sponsor->full_name; ?></td>
	                                <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-secondary"><?= $sponsor->profile_id; ?></span></td>
	                                <td><?= $this->Crud_model->get_type_name_by_id('package', $sponsor->product, 'name'); ?> &nbsp; <i class="fa fa-rupee"></i> <small><?= $this->Crud_model->get_type_name_by_id('package', $sponsor->product, 'fee'); ?></small> </td>
	                                <td><?= $sponsor->mobile_no; ?></td>
	                            </tr>
                            <?php $i++ ?>
                            <?php endforeach ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>