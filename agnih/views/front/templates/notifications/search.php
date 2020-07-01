<li class="nav-item">
    <a class="nav-link search" href="javascript:void(0)">
        <i class="ti ti-search"></i>
    </a>
    <div class="search-wrapper">
        <div class="close-btn">
            <i class="ti ti-close"></i>
        </div>
        <div class="search-content">
            <form method="post" action="<?= base_url(); ?>home/sponsor_overview/search">
                <div class="form-group">
                    <i class="ti ti-search magnifier"></i>

                    <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                    <input type="text" class="form-control autocomplete" placeholder="Mobile No" id="autocomplete-ajax" autofocus="autofocus" name="mobile_no" id="mobile_no">
                </div>
            </form>
        </div>
    </div>
</li>