<div class="row">
	<div class="col-md-12 mb-5">
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

</div>

<div class="row">
	
   <div class="col-md-8 offset-md-2">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">Tracking ID : <?= $info_tickets->ticket_no; ?></h4>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url(); ?>home/tickets/info_tickets/<?= $info_tickets->tickets_id; ?>">
                      <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Tracking ID</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="" class="form-control-plaintext" id="staticEmail" value="<?= $info_tickets->ticket_no; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="" class="form-control-plaintext" id="inputPassword" value="<?= $this->Crud_model->get_type_name_by_id('sponsor', $info_tickets->sponsor_id, 'username'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Subject</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="" class="form-control-plaintext" id="inputPassword" value="<?= $info_tickets->subject; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Created on</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="" class="form-control-plaintext" id="inputPassword" value="<?= date('d-m-Y H:m:s' ,$info_tickets->date_at);  ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Updated</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="" class="form-control-plaintext" id="inputPassword" value="<?php if ($info_tickets->updated_at == NULL): ?> <?php echo "Not Resolved" ?> <?php else: ?> <?php echo date('d-m-Y H:m:s' ,$info_tickets->updated_at);  ?> <?php endif ?>">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Ticket Status</label>
                        <div class="col-sm-5">
                            <input type="text" readonly="" class="form-control-plaintext" id="inputPassword" value="<?= $this->Crud_model->get_type_name_by_id('status', $info_tickets->status, 'name'); ?>">
                        </div>
                        <div class="col-sm-5">
                            <?php
                                if (!empty($form_contents)) {
                                    echo $this->Crud_model->select_html('status', 'status', 'name', 'edit', 'form-control form-control-sm selectpicker', $form_contents['status'], '', '', '');
                                }
                                else {
                                    echo $this->Crud_model->select_html('status', 'status', 'name', 'edit', 'form-control form-control-sm selectpicker', $info_tickets->status, '', '', '');
                                }
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-5">
                            <input type="text" readonly="" class="form-control-plaintext" id="inputPassword" value="<?= $this->Crud_model->get_type_name_by_id('department', $info_tickets->department, 'name'); ?>">
                        </div>
                        <div class="col-sm-5">
                            <?php
                                if (!empty($form_contents)) {
                                    echo $this->Crud_model->select_html('department', 'department', 'name', 'edit', 'form-control form-control-sm selectpicker', $form_contents['department'], '', '', '');
                                }
                                else {
                                    echo $this->Crud_model->select_html('department', 'department', 'name', 'edit', 'form-control form-control-sm selectpicker', $info_tickets->department, '', '', '');
                                }
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Priority</label>
                        <div class="col-sm-5">
                            <input type="text" readonly="" class="form-control-plaintext" id="inputPassword" value="<?= $this->Crud_model->get_type_name_by_id('priority', $info_tickets->priority, 'name'); ?>">
                        </div>
                        <div class="col-sm-5">
                            <?php
                                if (!empty($form_contents)) {
                                    echo $this->Crud_model->select_html('priority', 'priority', 'name', 'edit', 'form-control form-control-sm selectpicker', $form_contents['priority'], '', '', '');
                                }
                                else {
                                    echo $this->Crud_model->select_html('priority', 'priority', 'name', 'edit', 'form-control form-control-sm selectpicker', $info_tickets->priority, '', '', '');
                                }
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                         <label for="message" class="col-sm-2 col-form-label">Message</label>
                         <div class="col-sm-10">
                            <textarea name="message" id="message" class="form-control-plaintext" rows="3" readonly=""><?= $info_tickets->message; ?></textarea>
                         </div>
                     </div>

                     <div class="form-group row">
                     	 <label for="comments" class="col-sm-2 col-form-label">Comments</label>
                     	 <div class="col-sm-10">
                     	 	<textarea name="comments" id="comments" class="form-control" rows="3" required="required"><?= $info_tickets->comments; ?></textarea>
                     	 </div>
                     </div>

                     <button type="submit" class="btn btn-primary float-right">Update</button>

                </form>
            </div>
        </div>
    </div>


</div>