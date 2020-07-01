  <!-- begin app-nabar -->
                <aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-nav scrollbar scroll_light">
                        <ul class="metismenu " id="sidebarNav">
                            <li class="nav-static-title">Admin</li>
                            <li class="active">
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <i class="nav-icon ti ti-rocket"></i>
                                    <span class="nav-title">Dashboards</span>
                                    <!-- <span class="nav-label label label-danger">9</span> -->
                                </a>
                                <ul aria-expanded="false">
                                    <li class="active2"> <a href='<?= base_url(); ?>home'>Home</a> </li>
                                    
                                </ul>
                            </li>
                            <!-- <li><a href="app-chat.html" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Chat</span></a> </li> -->
                            <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-calendar"></i><span class="nav-title">Downlines</span></a>
                                <ul aria-expanded="false">
                                    <li> <a href='<?= base_url(); ?>home/genealogy_tree/tree'>Genealogy</a> </li>
                                    <li> <a href='<?= base_url(); ?>home/genealogy_tree/tabular'>Tabular</a> </li>
                                </ul>
                            </li>
                           <!--  <li><a href="mail-inbox.html" aria-expanded="false"><i class="nav-icon ti ti-email"></i><span class="nav-title">Mail</span></a> </li> -->
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-bag"></i> <span class="nav-title">New Member</span></a>
                                <ul aria-expanded="false">
                                    <li> <a href="<?= base_url(); ?>home/sponsor_register">New</a> </li>
                                    <li> <a href="<?= base_url(); ?>home/sponsor_register/new_sub_sponsor">Sub New</a> </li>
                                    <li> <a href="<?= base_url(); ?>home/sponsor_register/all_sponsor">List</a> </li>           
                                    <li> <a href="<?= base_url(); ?>home/sponsor_register/pending_sponsor">Pending</a> </li>           
                                               
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-info"></i><span class="nav-title">E-wallet</span> </a>
                                <ul aria-expanded="false">
                                    <li> <a href="<?= base_url(); ?>home/ewallets/ewallet_summary">Ewallet Summary</a> </li>
                                    <li> <a href="<?= base_url(); ?>home/ewallets/all_transactions">All Transactions</a> </li>
                                    <li> <a href="<?= base_url(); ?>home/ewallets/outward_funds">Withdrawal & Outward Funds</a> </li>
                                    <li> <a href="<?= base_url(); ?>home/ewallets/transfer_history">Transfer History </a> </li>
                                    <li> <a href="<?= base_url(); ?>home/ewallets/balance_report">E-wallet Balance Report</a> </li>
                                   
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-user"></i><span class="nav-title">User Overview</span> </a>
                                <ul aria-expanded="false">

                                    <li> <a href="<?= base_url(); ?>home/sponsor_overview/search">Sponsor Overview</a> </li>
                                                                                                          
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-handshake-o"></i><span class="nav-title">User Invoice</span> </a>
                                <ul aria-expanded="false">

                                    <li> <a href="<?= base_url(); ?>home/user_invoice/sponsor_invoice">Sponsor invoice</a> </li>
                                                                       
                                </ul>
                            </li>
                            <li class="nav-static-title">Online Payment</li>

                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"> <i class="nav-icon zmdi zmdi-globe-lock"></i> <span class="nav-title">Online Payment</span> <span class="nav-label label label-success">New</span> </a>
                                <ul aria-expanded="false">
                                    <li> <a href="<?= base_url(); ?>home/online_payment/payments">Payment List</a> </li>
                                    
                                </ul>
                            </li>

                            <li class="nav-static-title">Payout</li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"> <i class="nav-icon fa fa-money"></i> <span class="nav-title">Payout</span> <span class="nav-label label label-info">New</span> </a>
                                <ul aria-expanded="false">
                                    <li> <a href="<?= base_url(); ?>home/payout/release">Release</a> </li>
                                    <li> <a href="<?= base_url(); ?>home/payout/confirm_transfer">Confirm Transfer</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-layout-column3-alt"></i><span class="nav-title">Packages</span></a>
                                <ul aria-expanded="false">
                                    <li> <a href="<?= base_url(); ?>home/packages">Packages</a> </li>
                                    <li> <a href="<?= base_url(); ?>home/packages/add_package">New</a> </li>
                                    
                                </ul>
                            </li>
                                                   
                            <li class="nav-static-title">Settings</li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-map-alt"></i><span class="nav-title">Settings</span></a>
                                <ul aria-expanded="false">
                                    <li> <a href="<?= base_url(); ?>home/settings">System Settings</a> </li>
                                    <li> <a href="<?= base_url(); ?>home/email_setup">EMail Configuration</a> </li>
                                    <li> <a href="<?= base_url(); ?>home/sms_settings/msg91">SMS Msg91</a> </li>
                                    
                                </ul>
                            </li>
                           <!--  <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-ink-pen"></i><span class="nav-title">SMS & Email</span></a>
                                <ul aria-expanded="false">
                                    <li> <a href=" base_url(); ?>home/settings">Twilio</a> </li>
                                    <li> <a href="">Msg91</a> </li>
                                    <li> <a href="">Company Profile</a> </li>
                                    <li> <a href="">SMS Profile</a> </li>
                                </ul>
                            </li> -->
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon fa fa-ticket"></i> <span class="nav-title">Support Center</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="<?= base_url(); ?>home/tickets">Ticket Dashboard</a></li>
                                    <li><a href="<?= base_url(); ?>home/tickets/view_tickets">View Tickets</a></li>
                                    <li><a href="<?= base_url(); ?>home/tickets/category">Category</a></li>
                                    <li><a href="<?= base_url(); ?>home/tickets/configuration">Configuration</a></li>
                                    <li><a href="<?= base_url(); ?>home/tickets/resolved_tickets"">Resolved Tickets</a></li>
                                    <li><a href="">FAQ</a></li>

                                </ul>
                            </li>
                            
                            <li class="nav-static-title">Employee</li>

                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon fa fa-address-card-o"></i> <span class="nav-title">Admins</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="<?= base_url(); ?>home/admins/admin_new">New</a></li>
                                    <li><a href="<?= base_url(); ?>home/admins/admin_list">List</a></li>
                                    <li><a href="<?= base_url(); ?>home/admins/">Role</a></li>
                                    
                                </ul>
                            </li>
                          
                        </ul>
                    </div>
                    <!-- end sidebar-nav -->
                </aside>
                <!-- end app-navbar -->