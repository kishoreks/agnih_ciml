<!DOCTYPE html>
<html>
  <head lang="en">
    <title><?= $this->system_name; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5ebeec5162.js"></script>
    <style type="text/css">
      @import url('https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap');
      body{
      padding:0;
      margin: 0;
      overflow-x: hidden;
      font-family: 'Roboto', sans-serif;
      }
      h5,h3{
      text-transform: capitalize;
      }
      img{
      max-width: 100%;
      }
      .b-t{
      border-top: 1px solid #ddd;
      }
      @media(max-width: 768px){
      .text-right{
      text-align: center !important;
      }
      .pull-right{
      float: none;
      text-align: center;
      }
      .center{
      text-align: center;
      }
      .bg-light.p-5:nth-child(1){
      padding: 1rem !important;
      }
      img{
      max-width: 30%;
      margin: 0 auto;
      display: block;
      }
      .p-5{
      padding: 1rem !important;
      }
      .text-right h5:nth-child(3){
      padding-top: 15px !important;
      }
      .pt-5{
      padding-top: 1rem!important
      }
      }
      @media print {
        #printInvoice2 {
          display: none;
        }
      }
      @page { margin: 0; }
    </style>
  </head>
  <body>
    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice2" onclick="s_invoice()" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <!-- <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> -->
        </div>
        
    </div>
    <div class="container">
      <h6 class="text-center p-4">Fees Once Paid Will Not Be Refunded</h6>
      <div class="bg-light p-5">
       <!--  <h1 class="text-center m-0"></h1> -->
      	 <div class="row pt-3 mb-2">
          <div class="col-md-6 pull-left"><img src="<?= base_url(); ?>assets/site_img/invoice_logo.png" class="img-responsive"></div>
          <div class="col-md-6 text-right">
            <h5 class="pt-4">invoice # <?= $invoice_no->invoice_no; ?></h5>
            <p class="text-muted mb-0"><i>Date to: <?= $invoice_no->created_at ?></i></p>
          </div>
        </div>
        <div class="row b-t pt-5">
          <div class="col-md-6 pt-3 center">
            <h5><?= $s_invoice->full_name ?></h5>
            <p>  <?= $s_invoice->address ?></p>
            <p>Email : <?= $s_invoice->email ?><br>Mobile : <?= $s_invoice->mobile_no; ?></p>
          </div>
          <div class="col-md-6 text-right">
            <h5>Payment Details</h5>
            <p><?= $s_invoice->full_name; ?></p>
            <p>PROFILE ID: <?= $s_invoice->profile_id ?></p>
             <?php if ($s_invoice->is_blocked == 'yes'): ?>
               <p>Payment Status: <span class="text-danger">Pending</span></p>
             <?php else: ?>
               <p>Payment Type: <?= $this->Crud_model->get_type_name_by_id('payoptions', $s_invoice->payment_type);  ?></p>
             <?php endif ?>
            
            <p>Product Name: <?= $this->Crud_model->get_type_name_by_id('package', $s_invoice->product);  ?></p>
          </div>
        </div>
        <table class="table">
          <tr>
          <thead>
            <td>Name</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Total</td>
          </thead>
          </tr>
          <tr>
            <td><?= $this->Crud_model->get_type_name_by_id('package', $s_invoice->product);  ?></td>
            <td> <?= count($s_invoice->product); ?></td>
            <td><i class="fa fa-rupee"></i><?= $this->Crud_model->get_type_name_by_id('package', $s_invoice->product , 'fee');  ?></td>
            <td><i class="fa fa-rupee"></i> <?= $this->Crud_model->get_type_name_by_id('package', $s_invoice->product , 'fee');  ?></td>
          </tr>
        </table>
      </div>
      <div class="bg-dark text-white p-5">
        <div class="row">
          <div class="col-md-4">		
          </div>
          <div class="col-md-3 text-right">
            <h6>Sub - Total amount</h6>
            <h3 class="text-center"><i class="fa fa-rupee"></i> <?= $this->Crud_model->get_type_name_by_id('package', $s_invoice->product , 'fee');  ?></h3>
          </div>
          <div class="col-md-2 text-right">
            <!-- <h6>Discount</h6>
            <h3>0%</h3> -->
          </div>
          <div class="col-md-3 text-right">
            <h6>Grand Total</h6>
            <h3><i class="fa fa-rupee"></i> <?= $this->Crud_model->get_type_name_by_id('package', $s_invoice->product , 'fee');  ?></h3>
          </div>
        </div>
      </div>
    </div>

    <script>
     $('#printInvoice2').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>

<script>
function s_invoice() {
  window.print();
}
</script>
     </body>


</html>