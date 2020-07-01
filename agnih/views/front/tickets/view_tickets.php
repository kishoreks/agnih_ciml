<!-- begin row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatable" class="display compact table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ticket ID</th>
                                <th>Updated</th>
                                <th>Username</th>
                                <th>Subject</th>
                                <th>Category</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Settings</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1; ?>
                            <?php foreach ($view_tickets as $key): ?>
                                                           
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><a href="<?= base_url(); ?>home/tickets/info_tickets/<?= $key->tickets_id; ?>"><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary"><?= $key->ticket_no; ?></span></a></td>
                                    <td><?= time_Ago($key->date_at); ?></td>
                                    <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $key->sponsor_id, 'username'); ?></td>
                                    <td><?= $key->subject; ?></td>
                                    <td><?= $this->Crud_model->get_type_name_by_id('department', $key->department, 'name'); ?></td>
                                    <td><?= $this->Crud_model->get_type_name_by_id('priority', $key->priority, 'name'); ?></td>
                                    <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary-inverse"><?= $this->Crud_model->get_type_name_by_id('status', $key->status, 'name'); ?></span></td>
                                    <td><a href="<?= base_url(); ?>home/tickets/info_tickets/<?= $key->tickets_id; ?>" class="btn btn-sm btn-primary"><i class="fa fa-calendar-check-o"></i> Show</a></td>
                                </tr>
                             <?php $i++; ?>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                                <th>#</th>
                                <th>Ticket ID</th>
                                <th>Updated</th>
                                <th>Username</th>
                                <th>Subject</th>
                                <th>Category</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Settings</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->