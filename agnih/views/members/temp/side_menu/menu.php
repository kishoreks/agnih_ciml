  <!-- begin app-nabar -->
                <aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-nav scrollbar scroll_light">
                        <ul class="metismenu " id="sidebarNav">
                            <li class="nav-static-title text-success"><?= strtolower($this->session->userdata('sponsor_name')); ?></li>
                            <li class="active">
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <i class="nav-icon ti ti-rocket"></i>
                                    <span class="nav-title">Dashboards</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li class="active2"> <a href='<?= base_url(); ?>members'>Home</a> </li>  
                                </ul>
                            </li> 
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon fa fa-user-plus"></i> <span class="nav-title">Genealogy</span></a>
                                <ul aria-expanded="false">
                                    <li> <a href="<?= base_url(); ?>members/genealogy/genealogy_tree">Genealogy</a> </li>         
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon fa fa-user-plus"></i> <span class="nav-title">New Member</span></a>
                                <ul aria-expanded="false">
                                    <li> <a href="<?= base_url(); ?>members/sponsor/sponsor_register">New</a> </li>
                                    <li> <a href="<?= base_url(); ?>members/sponsor/all_sponsor">List</a> </li>           
                                        
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon fa fa-money"></i><span class="nav-title">User Earnings</span> </a>
                                <ul aria-expanded="false">

                                    <li> <a href="<?= base_url(); ?>members/earned_income/sponsor_income">Earned Income</a> </li>
                                    <li> <a href="<?= base_url(); ?>members/released_income/sponsor_released">Released Income</a> </li>
                                    <li> <a href="<?= base_url(); ?>members/balance_sheet/balance">Balance Sheet</a> </li>
                                   
                                </ul>
                            </li>
                            <li class="nav-static-title">Payments</li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"> <i class="nav-icon ti ti-layout-grid4-alt"></i> <span class="nav-title">Payments</span> <span class="nav-label label label-success">New</span> </a>
                                <ul aria-expanded="false">
                                    <li> <a href="<?= base_url(); ?>members/payments/payments_success">Payments Success</a> </li>
                                    
                                </ul>
                            </li>
                            <!-- <li class="nav-static-title">HELP</li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"> <i class="nav-icon ti ti-layout-grid4-alt"></i> <span class="nav-title">HELP</span> <span class="nav-label label label-success">New</span> </a>
                                <ul aria-expanded="false">
                                    <li> <a href="<?= base_url(); ?>members/help/received_donation">Request Donation</a> </li>
                                    <li> <a href="<?= base_url(); ?>members/help/received_all_donation">Receive Donation</a> </li>
                                    <li> <a href="<?= base_url(); ?>members/help/sent_donation">Sent Donation</a> </li>
                                    <li> <a href="<?= base_url(); ?>members/help/missed_donation">Missed Donation</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-layout-column3-alt"></i><span class="nav-title">History</span></a>
                                <ul aria-expanded="false">
                                    <li> <a href="<?= base_url(); ?>members/history/send_history">Send History</a> </li>
                                    <li> <a href="<?= base_url(); ?>members/history/get_history">Get History </a> </li>
                                    
                                </ul>
                            </li> -->
                            <li class="sidebar-banner p-4 bg-gradient text-center m-3 d-block rounded">
                                <h5 class="text-white mb-1">Open Ticket</h5>
                                <p class="font-13 text-white line-20">If You Can't Find A Solution To Your Problems You Can Submit A Ticket</p>
                                <a class="btn btn-square btn-inverse-light btn-xs d-inline-block mt-2 mb-0" href="<?= base_url(); ?>members/ticket/open_ticket"> Open New Ticket</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end sidebar-nav -->
                </aside>
                <!-- end app-navbar -->