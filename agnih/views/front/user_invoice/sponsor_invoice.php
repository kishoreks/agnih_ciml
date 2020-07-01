
<div class="row widget-social">
	
  <div class="col-xl-6 col-md-6">
    
     <!--  <h4>User Earnings: binaryhyip</h4> -->

  </div>
   <div class="col-xl-6 col-md-6">
    
      <h4 class="float-right"><a href="#" class="btn btn-square btn-primary" data-toggle="tooltip" data-placement="top" title="All Sponsor Invoice" target="popup" onclick="window.open('<?= base_url(); ?>home/user_invoice/pdf_invoice', 'popup', 'width=800,height=600'); return false;">Print All</a></h4>

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
                                    <th>Name</th>
                                    <th>Invoice No</th>
                                    <th>Profile ID</th>
                                    <th>Payment Type</th>
                                    <th>Product</th>
                                    <th>Date</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($all_invoice as $invoice): ?>
                                    <tr>
                                        <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $invoice->sponsor_id, 'username'); ?></td>
                                        <td><?= $invoice->invoice_no; ?></td>
                                        <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $invoice->sponsor_id, 'profile_id'); ?></td>
                                        <td><?= $this->Crud_model->get_type_name_by_id('payoptions', $invoice->payment_type); ?></td>
                                        <td><?= $this->Crud_model->get_type_name_by_id('package', $invoice->product); ?></td>
                                        <td><?= $invoice->created_at; ?></td>
                                        
                                    </tr>
                                <?php endforeach ?>
                               
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Invoice No</th>
                                    <th>Profile ID</th>
                                    <th>Payment Type</th>
                                    <th>Product</th>
                                    <th>Date</th>
                                     
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->