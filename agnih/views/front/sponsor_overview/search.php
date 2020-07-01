<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="row">

    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">mobile No</h4>
                </div>
            </div>
            <div class="card-body">
                <form class="form-inline"  method="post" action="<?= base_url(); ?>home/sponsor_overview/search">

                      <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">

                    <div class="form-group mx-sm-2 mb-2">
                        <label for="mobile_no" class="sr-only">Mobile No<i class="text-danger">*</i></label>
                        <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile NO" value="<?php
                        if (!empty($form_contents)) {
                            echo $form_contents['mobile_no'];
                        }
                        ?>">

                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </form>
                  <?php echo form_error('mobile_no', '<div class="text-danger">', '</div>') ?>
            </div>
        </div>
    </div>

</div>



<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">Sponsor Overview</h4>
                </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                <table class="table clients-contant-table mb-0">
                   
                    <tbody>
                        <tr>
                           
                            <td>Sponsor Name : <?= $sponsor_info->username; ?></td>
                            <td>Profile Id : <?= $sponsor_info->profile_id; ?></td>
                            <td>Email : <?= $sponsor_info->email; ?></td>
                            <td>Status : 
                                     <?php if ($sponsor_info->is_blocked == "no"): ?>
                                         <a href="javascript:void(0)" class="dot"></a>
                                         <span>Active Users</span>
                                     <?php else: ?>
                                         <a href="javascript:void(0)" class="dot bg-danger"></a>
                                         <span>Blocked Users</span>
                                     <?php endif ?>
                            </td>
                            
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

<?php //var_dump($sponsor_info);  ?>

<div class="row widget-social">

<?php if ($sponsor_info == NULL): ?>

        <div class="col-8 offset-2 mb-2">
            <div class="alert alert-dark" role="alert">
                <h3 class="text-white">No Data Found !</h3>
                <p class="text-white">You Should Search The Mobile No Of The Members To See The Full Profile Infomation !</p>
                <div class="col text-center">
                    <a  href="<?= base_url(); ?>home/sponsor_overview/search" class="btn btn-danger mt-20 text-center">Search Again</a>
                </div>

            </div>
        </div>



<?php else: ?>


        <div class="card-body">

            <div class="row widget-social">

                <div class="col-xl-3 col-md-5">
                    <div class="card card-statistics widget-social-box3">
                        <div class="card-body p-0">
                            <div class="text-center widget-social-contant py-2">

                                <div class="mt-3">
                                    <h4 class="mb-1"><i class="fa fa-address-book-o f-30"></i></h4>
                                    <p class="mb-0"><a class="text-white" href="<?= base_url(); ?>home/sponsor_overview/profile/<?= $sponsor_info->sponsor_id; ?>">Profile</a></p>
                                </div>
                            </div>
                            <ul class="nav justify-content-between text-center px-4 py-4">
                                <li class="flex-fill">
                                    <h5 class="mb-0"><a href="<?= base_url(); ?>home/sponsor_overview/profile/<?= $sponsor_info->sponsor_id; ?>">Profile</a></h5>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-5">
                    <div class="card card-statistics widget-social-box3">
                        <div class="card-body p-0">
                            <div class="text-center widget-social-contant py-2">

                                <div class="mt-3">
                                    <h4 class="mb-1"><i class="fa fa-money f-30"></i></h4>
                                    <p class="mb-0"><a class="text-white" href="<?= base_url(); ?>home/sponsor_overview/earnings/<?= $sponsor_info->sponsor_id; ?>">User Earnings</a></p>
                                </div>
                            </div>
                            <ul class="nav justify-content-between text-center px-4 py-4">
                                <li class="flex-fill">
                                    <h5 class="mb-0"><a href="<?= base_url(); ?>home/sponsor_overview/earnings/<?= $sponsor_info->sponsor_id; ?>">User Earnings</a></h5>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-5">
                    <div class="card card-statistics widget-social-box3">
                        <div class="card-body p-0">
                            <div class="text-center widget-social-contant py-2">

                                <div class="mt-3">
                                    <h4 class="mb-1"><i class="fa fa-user-circle-o f-30"></i></h4>
                                    <p class="mb-0"><a class="text-white" href="<?= base_url(); ?>home/sponsor_overview/referrals/<?= $sponsor_info->sponsor_id; ?>">Referrals</a></p>
                                </div>
                            </div>
                            <ul class="nav justify-content-between text-center px-4 py-4">
                                <li class="flex-fill">
                                    <h5 class="mb-0"><a href="<?= base_url(); ?>home/sponsor_overview/referrals/<?= $sponsor_info->sponsor_id; ?>">Referrals</a></h5>

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-5">
                    <div class="card card-statistics widget-social-box3">
                        <div class="card-body p-0">
                            <div class="text-center widget-social-contant py-2">

                                <div class="mt-3">
                                    <h4 class="mb-1"><i class="fa fa-briefcase f-30"></i></h4>
                                    <p class="mb-0"><a class="text-white" href="<?= base_url(); ?>home/sponsor_overview/ewallet/<?= $sponsor_info->sponsor_id; ?>">Ewallet</a></p>
                                </div>
                            </div>
                            <ul class="nav justify-content-between text-center px-4 py-4">
                                <li class="flex-fill">
                                    <h5 class="mb-0"><a href="<?= base_url(); ?>home/sponsor_overview/ewallet/<?= $sponsor_info->sponsor_id; ?>">Ewallet</a></h5>

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-5">
                    <div class="card card-statistics widget-social-box3">
                        <div class="card-body p-0">
                            <div class="text-center widget-social-contant py-2">

                                <div class="mt-3">
                                    <h4 class="mb-1"><i class="fa fa-money f-30"></i></h4>
                                    <p class="mb-0"><a class="text-white" href="<?= base_url(); ?>home/sponsor_overview/released_income/<?= $sponsor_info->sponsor_id; ?>">Released Income</a></p>
                                </div>
                            </div>
                            <ul class="nav justify-content-between text-center px-4 py-4">
                                <li class="flex-fill">
                                    <h5 class="mb-0"><a href="<?= base_url(); ?>home/sponsor_overview/released_income/<?= $sponsor_info->sponsor_id; ?>">Released Income</a></h5>

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-5">
                    <div class="card card-statistics widget-social-box3">
                        <div class="card-body p-0">
                            <div class="text-center widget-social-contant py-2">

                                <div class="mt-3">
                                    <h4 class="mb-1"><i class="fa fa-tint f-30"></i></h4>
                                    <p class="mb-0"><a class="text-white" href="<?= base_url(); ?>home/sponsor_overview/business/<?= $sponsor_info->sponsor_id; ?>">Business Volume</a></p>
                                </div>
                            </div>
                            <ul class="nav justify-content-between text-center px-4 py-4">
                                <li class="flex-fill">
                                    <h5 class="mb-0"><a href="<?= base_url(); ?>home/sponsor_overview/business/<?= $sponsor_info->sponsor_id; ?>">Business Volume</a></h5>

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>


<?php endif ?>

</div>


<script>
  $( function() {
    var availableTags = [
    <?php foreach ($mobile_no as $m_no): ?>
        "<?=$m_no->mobile_no?>",
    <?php endforeach ?>
    ];
    $( "#mobile_no" ).autocomplete({
      source: availableTags,
      autoFocus:true
    });
  } );
  </script>