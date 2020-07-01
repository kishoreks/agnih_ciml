 <?php 
    // Leading Json data
    $profile_image = $this->Crud_model->get_type_name_by_id('sponsor', $this->session->userdata('sponsor_id'), 'profile_image');
    $profile_image_data = json_decode($profile_image, true);

    // var_dump($profile_image_data);
?>
 <li class="nav-item dropdown user-profile">
    <a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         
          <?php $images = json_decode($profile_image, true); ?>
           <?php if (file_exists('uploads/profile_image/'.$images[0]['thumb'])): ?>
              <img src="<?=base_url()?>uploads/profile_image/<?=$images[0]['thumb']?>" alt="avtar-img">
          <?php else: ?>
               <img src="<?= base_url(); ?>assets/site_img/nophoto.jpg" alt="avtar-img">
          <?php endif ?>
        <span class="bg-success user-status"></span>
    </a>
    <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
        <div class="bg-gradient px-4 py-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="mr-1">
                    <h4 class="text-white mb-0"><?= $this->session->userdata('sponsor_name'); ?></h4>
                    <small class="text-white"><?= $this->session->userdata('sponsor_email'); ?></small>
                </div>
                <a href="<?= base_url('members_login/logout'); ?>" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"> <i
                                class="zmdi zmdi-power"></i></a>
            </div>
        </div>
        <div class="p-4">
            <a class="dropdown-item d-flex nav-link" href="<?= base_url(); ?>members/account_settings/profile">
                <i class="fa fa-user pr-2 text-success"></i> Profile</a>
           <!--  <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                <i class="fa fa-envelope pr-2 text-primary"></i> Inbox
                <span class="badge badge-primary ml-auto">6</span>
            </a> -->
           <!--  <a class="dropdown-item d-flex nav-link" href="<?= base_url(); ?>members/account_settings/profile">
                <i class=" ti ti-settings pr-2 text-info"></i> Settings
            </a> -->
            <a class="dropdown-item d-flex nav-link" href="<?= base_url(); ?>members/faq/faq_help">
                <i class="fa fa-compass pr-2 text-warning"></i> Need help?</a>
            <div class="row mt-2">
                <div class="col">
                    <a class="bg-light p-3 text-center d-block" href="<?= base_url(); ?>members/ticket/open_ticket">
                        <i class="fe fe-mail font-20 text-primary"></i>
                        <span class="d-block font-13 mt-2">My messages</span>
                    </a>
                </div>
                <div class="col">
                    <a class="bg-light p-3 text-center d-block" href="<?= base_url(); ?>members/ticket/new_ticket">
                        <i class="fe fe-plus font-20 text-primary"></i>
                        <span class="d-block font-13 mt-2">Compose new</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</li>