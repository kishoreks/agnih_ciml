<?php 
 $this->db->order_by("tickets_id", "desc");
 $this->db->limit(6);
 $tickets = $this->db->get('tickets')->result();

 ?>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ti ti-email"></i>
        
    </a>
    <div class="dropdown-menu extended animated fadeIn" aria-labelledby="navbarDropdown">
        <ul>
            <li class="dropdown-header bg-gradient p-4 text-white text-left">Messages
                <label class="label label-info label-round"><?= count($tickets); ?></label>
                <a href="<?= base_url(); ?>home/tickets" class="float-right btn btn-square btn-inverse-light btn-xs m-0">
                    <span class="font-13"> Mark all as read</span></a>
            </li>
            <li class="dropdown-body">
                <ul class="scrollbar scroll_dark max-h-240">
                
                <?php foreach ($tickets as $key ): ?>           

                    <li>
                        <a href="<?= base_url(); ?>members/ticket/open_ticket">
                            <div class="notification d-flex flex-row align-items-center">
                                <!-- <div class="notify-icon bg-img align-self-center">
                                    <img class="img-fluid" src="<?= base_url(); ?>assets/img/avtar/03.jpg" alt="user3">
                                </div> -->
                                <div class="notify-message">
                                    <p class="font-weight-bold">( <?= $key->ticket_no; ?> ) <?= $key->subject ?></p>
                                    <small><?= substr($key->comments, 0,50) ; ?></small>
                                </div>
                            </div>
                        </a>
                    </li>

                    <?php endforeach ?>
                   <!--  <li>
                        <a href="javascript:void(0)">
                            <div class="notification d-flex flex-row align-items-center">
                                <div class="notify-icon bg-img align-self-center">
                                    <img class="img-fluid" src="<?= base_url(); ?>assets/img/avtar/01.jpg" alt="user">
                                </div>
                                <div class="notify-message">
                                    <p class="font-weight-bold">Jimmyimg Leyon</p>
                                    <small>Okay</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <div class="notification d-flex flex-row align-items-center">
                                <div class="notify-icon bg-img align-self-center">
                                    <img class="img-fluid" src="<?= base_url(); ?>assets/img/avtar/02.jpg" alt="user2">
                                </div>
                                <div class="notify-message">
                                    <p class="font-weight-bold">Brainjon Leyon</p>
                                    <small>So, make the decision...</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <div class="notification d-flex flex-row align-items-center">
                                <div class="notify-icon bg-img align-self-center">
                                    <img class="img-fluid" src="<?= base_url(); ?>assets/img/avtar/04.jpg" alt="user4">
                                </div>
                                <div class="notify-message">
                                    <p class="font-weight-bold">Smithmin Leyon</p>
                                    <small>Thanks</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <div class="notification d-flex flex-row align-items-center">
                                <div class="notify-icon bg-img align-self-center">
                                    <img class="img-fluid" src="<?= base_url(); ?>assets/img/avtar/05.jpg" alt="user5">
                                </div>
                                <div class="notify-message">
                                    <p class="font-weight-bold">Jennyns Leyon</p>
                                    <small>How are you</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <div class="notification d-flex flex-row align-items-center">
                                <div class="notify-icon bg-img align-self-center">
                                    <img class="img-fluid" src="<?= base_url(); ?>assets/img/avtar/06.jpg" alt="user6">
                                </div>
                                <div class="notify-message">
                                    <p class="font-weight-bold">Demian Leyon</p>
                                    <small>I like your themes</small>
                                </div>
                            </div>
                        </a>
                    </li> -->
                </ul>
            </li>
            <li class="dropdown-footer">
                <a class="font-13" href="<?= base_url(); ?>home/tickets"> View All messages </a>
            </li>
        </ul>
    </div>
</li>