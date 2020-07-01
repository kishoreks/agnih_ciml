 <ul class="navbar-nav nav-left">
    <li class="nav-item">
        <a href="javascript:void(0)" class="nav-link sidebar-toggle">
            <i class="ti ti-align-right"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link  " href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mega Menu
            <i class="fa fa-angle-down"></i>
        </a>
        <div class="dropdown-menu mega-menu animated fadeIn" aria-labelledby="navbarDropdown">
            <div class="row no-gutters">
                <div class="col-sm-2 p-20">
                    <h4>Home</h4>
                    <ul>
                        <li class="nav-link">
                            <a href="<?= base_url('home'); ?>">Dashboard</a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url('home/sponsor_register'); ?>">New Sponsor</a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url('home/sponsor_register/all_sponsor'); ?>">List Sponsor</a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url('home/sponsor_register/new_sub_sponsor'); ?>">New Sub Sponsor</a>
                        </li>

                        <li class="nav-link">
                            <a href="<?= base_url('home/sponsor_register/pending_sponsor'); ?>">Pending Approval</a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url('home/sponsor_overview/search'); ?>">Search Sponsor</a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url('home/user_invoice/sponsor_invoice'); ?>">Sponsor Invoice</a>
                        </li>
                       
                    </ul>
                </div>
                <div class="col-sm-2 p-20">
                    <h4>Setting</h4>
                    <ul>
                        <li class="nav-link">
                            <a href="<?= base_url('home/packages'); ?>">All Packages</a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url('home/packages/add_package'); ?>">New Packages</a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url('home/settings'); ?>">System Settings</a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url('home/email_setup'); ?>">E-Mail Configuration</a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url('home/sms_settings/msg91'); ?>">SMS Configuration</a>
                        </li>
                         <li class="nav-link">
                            <a href="<?= base_url('home'); ?>">FAQ</a>
                        </li>
                       
                    </ul>
                </div>
                <div class="col-sm-2 p-20">
                    <h4>Support Center</h4>
                     <ul>
                        <li class="nav-link">
                            <a href="<?= base_url('home/tickets'); ?>">Ticket Dashboard</a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url('home/tickets/view_tickets'); ?>">View Tickets</a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url('home/tickets/category'); ?>">Tickets Category</a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url('home/tickets/configuration'); ?>">Tickets Configuration</a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url('home/tickets/resolved_tickets'); ?>">Resolved Tickets</a>
                        </li>
                       
                    </ul>
                </div>
                <div class="col-sm-4">
                    <div class="chart-wrap">
                        <div class="p-20">
                            <h4 class="mb-1">Page Views</h4>
                            <p>Daily page visitors</p>
                            <h2 class="text-primary font-xxl mt-2">1000+</h2>
                        </div>
                        <div class="apexchart-wrapper">
                            <div id="pageview"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a href="javascript:void(0)" class="nav-link " id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Quick Links
            <i class="fa fa-angle-down"></i>
        </a>
        <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
            <a class="dropdown-item nav-link" href="<?= base_url('home/sponsor_register/pending_sponsor'); ?>">Pending Sponsors</a>
            <a class="dropdown-item nav-link" href="javascript:void(0)">Payout</a>
            <a class="dropdown-item nav-link" href="javascript:void(0)">E-wallet</a>
        </div>
    </li>
    <li class="nav-item full-screen d-none d-lg-block" id="btnFullscreen">
        <a href="javascript:void(0)" class="nav-link expand">
            <i class="icon-size-fullscreen"></i>
        </a>
    </li>
</ul>