 <!-- begin row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatable" class="display compact table table-striped table-dark table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice No</th>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Status</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><?= $my_invoice->invoice_no; ?></td>
                                <td><?= $my_invoice->created_at; ?></td>
                                <td><?= $this->Crud_model->get_type_name_by_id('package', $my_invoice->product);  ?></td>
                                <td>
                                     <a class="btn btn-xs btn-primary text-white" data-toggle="tooltip" data-placement="top" title="Print invoice" target="popup" onclick="window.open('<?= base_url(); ?>members/invoice/sponsor_invoice/<?= $my_invoice->sponsor_id; ?>', 'popup', 'width=800,height=600'); return false;"><i class="fa fa-newspaper-o"></i> Print</a>
                                </td>
                                
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Invoice No</th>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->