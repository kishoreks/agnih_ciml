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
                    <h4>Dashboard</h4>
                    <ul>
                        <li class="nav-link">
                            <a href="<?= base_url(); ?>members"><?= translate('home'); ?></a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url(); ?>members/sponsor/sponsor_register"><?= translate('new_member'); ?></a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url(); ?>members/sponsor/all_sponsor"><?= translate('list_members'); ?></a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url(); ?>members/earned_income/sponsor_income"><?= translate('earned_income'); ?></a>
                        </li>

                        <li class="nav-link">
                            <a href="<?= base_url(); ?>members/genealogy/genealogy_tree"><?= translate('Genealogy'); ?></a>
                        </li>
                       
                    </ul>
                </div>

                <div class="col-sm-2 p-20 mt-4">
                    <h4><!-- Help --></h4>
                    <ul>
                        <li class="nav-link">
                            <a href="<?= base_url(); ?>members/payments/payments_success"><?= translate('Payments'); ?></a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url(); ?>members/released_income/sponsor_released"><?= translate('released_income'); ?></a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url(); ?>members/balance_sheet/balance"><?= translate('balance_sheet'); ?></a>
                        </li>
                        
                        
                    </ul>
                </div>
               <!--  <div class="col-sm-4 p-20"> -->
                    <!-- <h4>Contact Us</h4>
                    <div>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="Password1" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="Email1" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Message" id="Textarea1" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary text-uppercase">Submit</button>
                        </form>
                    </div> -->
                <!-- </div> -->
                <div class="col-sm-4 p-20">
                    <h4>Tickets</h4>
                    <ul>
                        <li class="nav-link">
                            <a href="<?= base_url(); ?>members/ticket/open_ticket">Open Ticket</a>
                        </li>
                        <li class="nav-link">
                            <a href="<?= base_url(); ?>members/ticket/new_ticket">New Ticket</a>
                        </li>
                        
                        
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a href="javascript:void(0)" class="nav-link " id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Invoice & FAQ
            <i class="fa fa-angle-down"></i>
        </a>
        <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
            <a class="dropdown-item nav-link" href="<?= base_url(); ?>members/my_invoice/all_invoice">Invoice</a>
            <a class="dropdown-item nav-link" href="<?= base_url(); ?>members/faq/faq_help">faq</a>
            
        </div>
    </li>
    <li class="nav-item full-screen d-none d-lg-block" id="btnFullscreen">
        <a href="javascript:void(0)" class="nav-link expand">
            <i class="icon-size-fullscreen"></i>
        </a>
    </li>
</ul>