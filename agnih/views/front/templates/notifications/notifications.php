  <?php 
   $this->db->limit(10);
  $notifications  = $this->db->get('sponsor')->result();

  //var_dump($notifications);

  ?>

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fe fe-bell"></i>
        <span class="notify">
                    <span class="blink"></span>
        <span class="dot"></span>
        </span>
    </a>
    <div class="dropdown-menu extended animated fadeIn" aria-labelledby="navbarDropdown">
        <ul>
            <li class="dropdown-header bg-gradient p-4 text-white text-left">New Sponsor Notifications
                <a href="<?= base_url(); ?>home/sponsor_register/all_sponsor" class="float-right btn btn-square btn-inverse-light btn-xs m-0">
                    <span class="font-13"> View all</span></a>
            </li>
            <li class="dropdown-body min-h-240 nicescroll">
                <ul class="scrollbar scroll_dark max-h-240">

                    <?php foreach ($notifications as $spl): ?>   
                   
                    <li>
                        <a href="<?= base_url(); ?>members/sponsor/all_sponsor">
                            <div class="notification d-flex flex-row align-items-center">
                                <div class="notify-icon bg-img align-self-center">
                                    <div class="bg-type bg-type-md">
                                        <span><i class="fa fa-user"></i> <?php // translate(substr($spl->full_name, 0,2)); ?></span>
                                    </div>
                                </div>
                                <div class="notify-message">
                                    <p class="font-weight-bold"><?= $spl->profile_id; ?> / <?= $spl->username; ?></p>
                                    <small><?= date('D-m-Y H:m:s', $spl->active_on);  ?></small>
                                </div>
                            </div>
                        </a>
                    </li>

                     <?php endforeach ?>
                    <!-- 
                    <li>
                        <a href="javascript:void(0)">
                            <div class="notification d-flex flex-row align-items-center">
                                <div class="notify-icon bg-img align-self-center">
                                    <div class="bg-type bg-type-md bg-success">
                                        <span>GM</span>
                                    </div>
                                </div>
                                <div class="notify-message">
                                    <p class="font-weight-bold">New invoice received</p>
                                    <small>22 min</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <div class="notification d-flex flex-row align-items-center">
                                <div class="notify-icon bg-img align-self-center">
                                    <div class="bg-type bg-type-md bg-danger">
                                        <span>FR</span>
                                    </div>
                                </div>
                                <div class="notify-message">
                                    <p class="font-weight-bold">Server error report</p>
                                    <small>7 min</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <div class="notification d-flex flex-row align-items-center">
                                <div class="notify-icon bg-img align-self-center">
                                    <div class="bg-type bg-type-md bg-info">
                                        <span>HT</span>
                                    </div>
                                </div>
                                <div class="notify-message">
                                    <p class="font-weight-bold">Database report</p>
                                    <small>1 day</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <div class="notification d-flex flex-row align-items-center">
                                <div class="notify-icon bg-img align-self-center">
                                    <div class="bg-type bg-type-md">
                                        <span>DE</span>
                                    </div>
                                </div>
                                <div class="notify-message">
                                    <p class="font-weight-bold">Order confirmation</p>
                                    <small>2 day</small>
                                </div>
                            </div>
                        </a>
                    </li> -->
                </ul>
            </li>
            <li class="dropdown-footer">
                <a class="font-13" href="<?= base_url(); ?>home/sponsor_register/all_sponsor"> View All Notifications
                </a>
            </li>
        </ul>
    </div>
</li>

