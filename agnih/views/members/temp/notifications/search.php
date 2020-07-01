<li class="nav-item">
    <a class="nav-link search" href="javascript:void(0)">
        <i class="ti ti-search"></i>
        
    </a>
    <div class="search-wrapper">
        <div class="close-btn">
            <i class="ti ti-close"></i>

        </div>
        <div class="search-content">
            <form action="<?= base_url(); ?>members/sponsor/search" method="post">
                <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                <div class="form-group">
                    <i class="ti ti-search magnifier"></i>
                    <input type="text" class="form-control autocomplete" name="search" required="required" placeholder="Search Here eg: 978767*****" id="autocomplete-ajax" value="<?php if (!empty($form_contents)) {
                                echo $form_contents['search'];
                            } ?>" autofocus="autofocus">
                </div>
            </form>
        </div>
    </div>
</li>