 <style>
     .input-group-append{
        display: none;
     }
 </style>

 <section class="breadcrumb_area">
    <img class="breadcrumb_shap" src="<?= base_url(); ?>assets/web/img/breadcrumb/banner_bg.png" alt="">
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h1 class="f_p f_700 f_size_50 w_color l_height50 mb_20">Register Us</h1>
            <p class="f_400 w_color f_size_16 l_height26">Why I say old chap that is spiffing off his nut arse pear shaped plastered<br> Jeffrey bodge barney some dodgy.!!</p>
        </div>
    </div>
</section>

  <section class="login_area">
            <div class="container">
               <div class="row">
                 <?php if (!empty($success_alert)): ?>
                  <div class="col-12" id="success_alert">
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          <?=$success_alert?>
                      </div>
                  </div>
              <?php endif ?>
              <?php if (!empty($danger_alert)): ?>
                  <div class="col-12" id="danger_alert">
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          <?=$danger_alert?>
                      </div>
                  </div>
              <?php endif ?>
               </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login_info">
                           <form action="<?= base_url(); ?>web/register" method="post" class="login-form mt_60">
                             <h2 class="f_p f_700 f_size_40 t_color3 mb_20">New Register</h2>
                            <p class="f_p f_400 f_size_15">Welcome! Please confirm that your are visiting</p>
                             <div class="row">
                                 <?php
                                    $csrf = array(
                                            'name' => $this->security->get_csrf_token_name(),
                                            'hash' => $this->security->get_csrf_hash()
                                    );

                                   ?>
                               <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                                 <div class="col-lg-6">
                                      <div class="form-group text_box">
                                        <label for="sponsor_id" class="f_p text_c f_400">Sponsor ID</label>
                                        <input type="text" placeholder="Sponsor Id" id="sponsor_id" name="sponsor_id" value="<?php if (!empty($form_contents)) { echo $form_contents['sponsor_id']; } ?>">
                                         <?= '<p class="text-danger">' . form_error('sponsor_id','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                      </div>
                                 </div>
                                 <div class="col-lg-6">
                                      <div class="form-group text_box">
                                        <label for="username" class="f_p text_c f_400">Username</label>
                                        <input type="text" placeholder="Username" id="username" name="username" value="<?php if (!empty($form_contents)) { echo $form_contents['username']; } ?>">
                                         <?= '<p class="text-danger">' . form_error('username','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                     </div>
                                 </div>
                                 <div class="col-lg-6">
                                     <div class="form-group text_box">
                                        <label for="first_name" class="f_p text_c f_400">First Name</label>
                                        <input type="text" placeholder="First Name" id="first_name" name="first_name" value="<?php if (!empty($form_contents)) { echo $form_contents['first_name']; } ?>">
                                         <?= '<p class="text-danger">' . form_error('first_name','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group text_box">
                                        <label for="last_name" class="f_p text_c f_400">Last Name</label>
                                        <input type="text" placeholder="Last Name" id="last_name" name="last_name" value="<?php if (!empty($form_contents)) { echo $form_contents['last_name']; } ?>">
                                         <?= '<p class="text-danger">' . form_error('last_name','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                    </div>
                                 </div>
                                  <div class="col-lg-6">
                                     <div class="form-group text_box">
                                        <label for="password" class="f_p text_c f_400">Password</label>
                                        <input type="password" placeholder="******" id="password" name="password" value="<?php if (!empty($form_contents)) { echo $form_contents['password']; } ?>">
                                         <?= '<p class="text-danger">' . form_error('password','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                     <div class="form-group text_box">
                                        <label for="confirm_password" class="f_p text_c f_400">Confirm Password</label>
                                        <input type="password" placeholder="******" id="confirm_password" name="r_password">
                                         <?= '<p class="text-danger">' . form_error('r_password','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group text_box">
                                        <label for="" class="f_p text_c f_400">Gender</label>
                                            <?php
                                              echo $this->Crud_model->select_html('gender', 'gender', 'name', 'edit', 'form-control show-tick', $form_contents['gender'], '', '', '');
                                              ?>
                                               <?= '<p class="text-danger">' . form_error('gender','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                        </div>
                                  </div>
                                  <div class="col-lg-6">
                                     <div class="form-group text_box">
                                        <label for="email" class="f_p text_c f_400">Email</label>
                                             <input type="text" class="form-control" id="email" placeholder="myemail@gmail.com" name="email" value="<?php if (!empty($form_contents)) {
                                                    echo $form_contents['email'];
                                                } ?>" autocomplete="off">
                                               <?= '<p class="text-danger">' . form_error('email','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                     <div class="form-group text_box">
                                        <label for="address" class="f_p text_c f_400">Address</label>
                                            <textarea name="address" id="input" class="form-control" placeholder="Address " rows="3"><?php if (!empty($form_contents)) {
                                                  echo $form_contents['address'];
                                              } ?></textarea>
                                             <?= '<p class="text-danger">' . form_error('address','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">

                                 <div class="form-group text_box">
                                    <label for="" class="f_p text_c f_400">Position</label>
                                    <?php
                                      echo $this->Crud_model->select_html('position', 'position', 'name', 'edit', 'form-control show-tick', $form_contents['position'], '', '', '');
                                      ?>
                                       <?= '<p class="text-danger">' . form_error('position','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                </div>
                                  </div>
                                   <div class="col-lg-6">
                                     <div class="form-group text_box">
                                        <label for="datepicker" class="f_p text_c f_400">Date Of Birth</label>
                                        <input type="text" id="datepicker" placeholder="Date Of Birth" name="date_of_birth" value="<?php if (!empty($form_contents)) { echo $form_contents['date_of_birth']; } ?>" >
                                         <?= '<p class="text-danger">' . form_error('date_of_birth','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                    </div>
                                  </div>
                                   <div class="col-lg-6">
                                     <div class="form-group text_box">
                                        <label for="mobile_no" class="f_p text_c f_400">Mobile No</label>
                                        <input type="text" class="form-control" id="mobile_no" placeholder="9843*****" name="mobile_no" value="<?php if (!empty($form_contents)) {
                                              echo $form_contents['mobile_no'];
                                          } ?>" autocomplete="off">
                                         <?= '<p class="text-danger">' . form_error('mobile_no','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                    </div>
                                  </div>
                                   <div class="col-lg-6">
                                     <div class="form-group text_box">
                                        <label for="" class="f_p text_c f_400">Back Name</label>
                                      <input type="text" class="form-control" id="back_name" placeholder="ICICI" name="back_name" value="<?php if (!empty($form_contents)) {
                                          echo $form_contents['back_name'];
                                      } ?>" autocomplete="off">
                                     <?= '<p class="text-danger">' . form_error('back_name','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                  </div>
                                </div>
                                   <div class="col-lg-6">
                                     <div class="form-group text_box">
                                        <label for="account_no" class="f_p text_c f_400">Account No</label>
                                        <input type="text" class="form-control" id="account_no" placeholder="33458*******" name="account_no" value="<?php if (!empty($form_contents)) {
                                              echo $form_contents['account_no'];
                                          } ?>" autocomplete="off">
                                         <?= '<p class="text-danger">' . form_error('account_no','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                    </div>
                                  </div>
                                   <div class="col-lg-6">
                                     <div class="form-group text_box">
                                        <label for="" class="f_p text_c f_400">Branch Name</label>
                                        <input type="text" class="form-control" id="branch_name" placeholder="Branch Name" name="branch_name" value="<?php if (!empty($form_contents)) {
                                                echo $form_contents['branch_name'];
                                            } ?>" autocomplete="off">
                                           <?= '<p class="text-danger">' . form_error('branch_name','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                    </div>
                                  </div>
                                   <div class="col-lg-6">
                                      <div class="form-group text_box">
                                        <label for="ifsc_code" class="f_p text_c f_400">Ifsc</label>
                                        <input type="text" class="form-control" id="ifsc_code" placeholder="IFSC Code" name="ifsc_code" value="<?php if (!empty($form_contents)) {
                                            echo $form_contents['ifsc_code'];
                                        } ?>" autocomplete="off">
                                       <?= '<p class="text-danger">' . form_error('ifsc_code','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                    </div>
                                  </div>
                                   <div class="col-lg-6">

                                        <div class="form-group text_box">
                                            <label for="" class="f_p text_c f_400">Payments</label>
                                             <?php
                                              echo $this->Crud_model->select_html('payoptions', 'payments', 'name', 'edit', 'form-control show-tick', $form_contents['payments'], '', '', '');
                                              ?>
                                               <?= '<p class="text-danger">' . form_error('payments','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                        </div>
                                  </div>
                                   <div class="col-lg-12">
                                         <div class="extra">
                                            <div class="checkbox remember">
                                                <label>
                                                    <input type="checkbox" value="yes" name="checkbox"> I agree to terms and conditions of this website
                                                </label>
                                            </div>
                                            <?= '<p class="text-danger">' . form_error('checkbox','<div class="text-white p-2 badge badge-danger">', '</div>') . '</p>' ?>
                                        </div>
                                  </div>
                                   <div class="col-lg-6">
                                  </div>
                             </div>
                                 <input type="submit" class="btn btn-success mt-3" value="Resister" style="width: 100%" disabled>
                               <!--  <button type="submit" class="btn_three">Resister</button> -->
                                <div class="alter-login text-center mt_30">
                                    New user? <a class="login-link" href="<?= base_url('members-login'); ?>">Login</a>
                                </div>
                            </form>
                        </div>


                    </div>
                   <!--  <div class="col-lg-4 d-flex align-items-center">
                        <div class="login_img">
                            <img src="<?= base_url(); ?>assets/web/assets/images/register.png" alt="">
                        </div>
                    </div> -->
                </div>
            </div>
        </section>



<script>
  var checkboxes = $("input[type='checkbox']"),
  submitButt = $("input[type='submit']");

  checkboxes.click(function() {
      submitButt.attr("disabled", !checkboxes.is(":checked"));
  });
</script>      