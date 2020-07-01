<div class="row">
    <div class="col-xl-6 offset-3">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">New Admin</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url(); ?>home/admins/admin_new" method="post" autocomplete="off">

                      <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Admin name" value="<?php
                        if (!empty($form_contents)) {
                            echo $form_contents['name'];
                        }
                        ?>">
                        <?= form_error('name', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone No" value="<?php
                               if (!empty($form_contents)) {
                                   echo $form_contents['phone'];
                               }
                               ?>">
                        <?= form_error('phone', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"  placeholder="Login Email Address" value="<?php
                        if (!empty($form_contents)) {
                            echo $form_contents['email'];
                        }
                        ?>">
                         <?= form_error('email', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                         <?= form_error('password', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Password">
                            <?= form_error('confirm_password', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="input" class="form-control" rows="3" ><?php
                            if (!empty($form_contents)) {
                                echo $form_contents['address'];
                            }
                            ?></textarea>
                        <?= form_error('address', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <select name="status" id="input" class="form-control" required="required">
                            <option value="no">Active</option>
                            <option value="yes">Bocked</option>
                        </select>
                        <?= form_error('status', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <button type="submit" class="btn btn-primary">ADD NEW</button>
                </form>
            </div>
        </div>
    </div>
</div>