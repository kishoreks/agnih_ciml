<div class="row">
	
	<div class="col-md-12">
    <div class="card card-statistics">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title">Open Ticket</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="<?= base_url(); ?>members/ticket/add_ticket" method="post" autocomplete="off">
                 <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Name / Username</label>
                        <input type="text" class="form-control" id="username" readonly="" placeholder="username" name="username" value="<?= $this->session->userdata('sponsor_name'); ?>">
                         <?= form_error('username','<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label> 
                        <input type="text" class="form-control" id="email" placeholder="email" readonly="" name="email" value="<?= $this->session->userdata('sponsor_email'); ?>">
                         <?= form_error('email','<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" placeholder="Your Subject" name="subject"  autocomplete="off" value="<?php if (!empty($form_contents)) {
                                echo $form_contents['subject'];
                            } ?>">
                     <?= form_error('subject','<div class="text-danger">', '</div>'); ?>
                </div>
                
                 <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Department</label>
                        <?php
		                    
		                   echo $this->Crud_model->select_html('department', 'department', 'name', 'edit', 'form-control show-tick', $form_contents['department'], '', '', '');
		                ?>
		                 <?= form_error('department','<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Priority</label>
                        <?php
		                    
		                   echo $this->Crud_model->select_html('priority', 'priority', 'name', 'edit', 'form-control show-tick', $form_contents['priority'], '', '', '');
		                ?>
		                 <?= form_error('priority','<div class="text-danger">', '</div>'); ?>
                    </div>
                    <!-- <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div> -->
                </div>

                <div class="form-group">
                    <label for="inputAddress2">Message</label>
                    <div class="quill-editor">
                       
                        <textarea name="message" id="editor" class="form-control" rows="3" placeholder="Your Message"><?php if (!empty($form_contents)) {
                                echo $form_contents['message'];
                            } ?></textarea>
                         <?= form_error('message','<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                             
                <button type="submit" class="btn btn-primary">Submit Ticket</button>
            </form>
        </div>
    </div>
</div>

</div>