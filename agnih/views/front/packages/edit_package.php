<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">New Packages</h4>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url(); ?>home/packages/update/<?= $get_package->package_id; ?>">
                      <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                    <div class="row">
                        <div class="col-12">
                            <label for="name mt-2">Package Name</label>
                            <input type="text" name="name" class="form-control" placeholder="eg: GOLD500" value="<?= $get_package->name; ?>">
                            <?= form_error('name', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="col-12 mt-2">
                            <label for="price">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="eg: 500" value="<?= $get_package->fee;  ?>">
                            <?= form_error('price' , '<div class="text-danger">' , '</div>'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                            <label for="members_count">Members Count</label>
                            <input type="text" name="members_count" class="form-control mt-2" placeholder="eg: 30" value="<?= $get_package->members_count; ?>">
                            <?= form_error('members_count' , '<div class="text-danger">' , '</div>'); ?>
                        </div>
                        <div class="col-12 mt-2">
                            <label for="max_commission">Commission %</label>
                            <input type="text" name="max_commission" class="form-control " placeholder="eg: 10" value="<?= $get_package->max_commission; ?>">
                             <?= form_error('max_commission' , '<div class="text-danger">' , '</div>'); ?>
                        </div>
                       
                    </div>
                    <div class="row"> 
                         <div class="col-12">
                           <button type="submit" class="btn btn-primary mt-3">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>