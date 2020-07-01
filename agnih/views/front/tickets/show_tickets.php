<div class="row widget-social">
    <div class="col-lg-4">
        <div class="card card-statistics widget-social-box12">
            <div class="card-body p-0">
                <div class="media widget-social-contant align-items-center p-4">
                    <div class="media-body">
                        <h4 class="mb-0">Total Tickets</h4>
                        <p><span class="badge badge-secondary"><?= $total_tickets; ?></span></p>
                    </div>
                    <div class="bg-img"><i class="fa fa-ticket text-white" style="font-size: 47px;"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-statistics widget-social-box14">
            <div class="card-body p-0">
                <div class="media widget-social-contant align-items-center p-4">
                    <div class="bg-img mr-3"><i class="fa fa-check-square text-primary" style="font-size: 47px;"></i></div>
                    <div class="pr-1">
                        <h4 class="mb-0">Resolved Tickets</h4>
                        <p><span class="badge badge-secondary"><?= $solved_tickets; ?></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-statistics widget-social-box12">
            <div class="card-body p-0">
                <div class="media widget-social-contant align-items-center p-4">
                    <div class="bg-img mr-3"><i class="fa fa-clock-o text-white" style="font-size: 47px;"></i></div>
                    <div class="pr-1">
                        <h4 class="mb-0">New Tickets</h4>
                        <p><span class="badge badge-secondary"><?= $new_tickets; ?></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                                <th>Settings</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1; ?>
                            <?php foreach ($tickets as $key): ?>
                                                           
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><a href="<?= base_url(); ?>home/tickets/info_tickets/<?= $key->tickets_id; ?>"><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary"><?= $key->ticket_no; ?></span></a></td>
                                    <td><?= time_Ago($key->date_at); ?></td>
                                    <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $key->sponsor_id, 'username'); ?></td>
                                    <td><?= $key->subject; ?></td>
                                    <td><?= $this->Crud_model->get_type_name_by_id('department', $key->department, 'name'); ?></td>
                                    <td><?= $this->Crud_model->get_type_name_by_id('priority', $key->priority, 'name'); ?></td>
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
                                <th>Settings</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->