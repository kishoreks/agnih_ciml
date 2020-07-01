 <div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
         
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $help_concept_data[0]['name'] ?> / <?= $help_concept_data[0]['manage_profile_id']; ?></h4>
                  <p class="card-description">
                  	<?php 
                       
                  	$count = $this->db->get_where('help_manage' , array('sponsor_id' => $help_concept_data[0]['manage_profile_id']))->result_array(); ?>
                  	
                    No Sub Members <code>[ <?= count($count); ?> ]</code>
                  </p>

                   
                   <div class="py-4">

                   	 <div class="row">
                      
                      <div class="col-md-6">

                        <p class="clearfix">
                          <span class="float-left">
                            Name
                          </span>
                          <span class="float-right text-muted">
                            <?= $help_concept_data[0]['name']; ?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Profile Id
                          </span>
                          <span class="float-right text-muted">
                           <?= $help_concept_data[0]['manage_profile_id']; ?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                             Email
                          </span>
                          <span class="float-right text-muted">
                             <?= $help_concept_data[0]['email']; ?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Mobile
                          </span>
                          <span class="float-right text-muted">
                            <?= $help_concept_data[0]['mobile']; ?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                           Joined On
                          </span>
                          <span class="float-right text-muted">
                           <?=  date('d-M-Y' , $help_concept_data[0]['joined_on']); ?> 
                          </span>
                        </p>
                         <p class="clearfix">
                          <span class="float-left">
                           Activated On
                          </span>
                          <span class="float-right text-muted">
                           <?=  date('d-M-Y' , $help_concept_data[0]['joined_on']); ?> 
                          </span>
                        </p>
                         <p class="clearfix">
                          <span class="float-left">
                           Amount Paid
                          </span>
                          <span class="float-right text-muted">
                             <i class="fa fa-rupee"></i><?= $help_concept_data[0]['base_price']; ?>
                          </span>
                        </p>
                        </div>

                        <div class="col-md-6">

                        <p class="clearfix">
                          <span class="float-left">
                           Country
                          </span>
                          <span class="float-right text-muted">
                           <?=$this->Crud_model->get_type_name_by_id('country', $help_concept_data[0]['country'])?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            State
                          </span>
                          <span class="float-right text-muted">
                           	<?=$this->Crud_model->get_type_name_by_id('state', $help_concept_data[0]['state'])?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                             City
                          </span>
                          <span class="float-right text-muted">
                            <?=$this->Crud_model->get_type_name_by_id('city', $help_concept_data[0]['city'])?>
                          </span>
                        </p>
                       
                        <p class="clearfix">
                          <span class="float-left">
                           Bank Name
                          </span>
                          <span class="float-right text-muted">
                            <?= $help_concept_data[0]['bank_name'];  ?> 
                          </span>
                        </p>
                         <p class="clearfix">
                          <span class="float-left">
                          Branch
                          </span>
                          <span class="float-right text-muted">
                          <?= $help_concept_data[0]['branch'];  ?> 
                          </span>
                        </p>
                         <p class="clearfix">
                          <span class="float-left">
                          Account Number
                          </span>
                          <span class="float-right text-muted">
                          <?= $help_concept_data[0]['account_number'];  ?> 
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                          IFSC
                          </span>
                          <span class="float-right text-muted">
                          <?= $help_concept_data[0]['ifsc'];  ?> 
                          </span>
                        </p>
                        </div>

                    </div>
                      </div>


                 
                </div>
              </div>
            </div>

      </div>
    </div>
  </div>
</div>

 <div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          
           <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> No Sub Members <?= $help_concept_data[0]['name'];  ?> </h4>
                  <p class="card-description"> Amount in Accout <code>[ <i class="fa fa-rupee"></i>  <?= count($count) * 500; ?> ] </code></p>
                  <div class="mt-5">
                    <div class="timeline">


                    	<?php foreach ($count  as $key): ?>
                    		
                    	


                      <div class="timeline-wrapper timeline-wrapper-warning">
                        <div class="timeline-badge"></div>
                        <div class="timeline-panel">
                          <div class="timeline-heading">
                            <h6 class="timeline-title"><?= $key['name']; ?> / <?= $key['manage_profile_id']; ?></h6>
                          </div>
                          <div class="timeline-body">
                            <p><?= $key['joined_on']; ?> | <?= $key['mobile']; ?> | <?= $key['email']; ?> | <?= $key['bank_name']; ?> | <?= $key['branch']; ?></p>
                          </div>
                          <div class="timeline-footer d-flex align-items-center flex-wrap">
                              
                              <span>Ac No : <?= $key['account_number']; ?></span>
                              <span class="ml-md-auto font-weight-bold"><i class="fa fa-rupee"></i> <?= $key['base_price']; ?></span>
                          </div>
                        </div>
                      </div>

                      <?php endforeach ?>

                     <!--  <div class="timeline-wrapper timeline-inverted timeline-wrapper-danger">
                        <div class="timeline-badge"></div>
                        <div class="timeline-panel">
                          <div class="timeline-heading">
                            <h6 class="timeline-title">Bootstrap 4 Alpha 6</h6>
                          </div>
                          <div class="timeline-body">
                            <p>Alpha 6 has landed, and it’s one of our biggest ships to date.</p>
                          </div>
                          <div class="timeline-footer d-flex align-items-center flex-wrap">
                              <i class="ti-heart text-muted mr-1"></i>
                              <span>25</span>
                              <span class="ml-md-auto font-weight-bold">10th Aug 2017</span>
                          </div>
                        </div>
                      </div> -->


                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>