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
            
              <?php $invoice_n = $this->db->get_where('sponsor_invoice' , array('sponsor_id' => $invoice_sponsor->sponsor_id))->row()->invoice_no; ?>
              <?php $created_at = $this->db->get_where('sponsor_invoice' , array('sponsor_id' => $invoice_sponsor->sponsor_id))->row()->created_at; ?>

            <h5 class="pt-4">invoice # <?= $invoice_n; ?></h5>
            <p class="text-muted mb-0"><i>Date to: <?= $created_at ?></i></p>
          </div>
        </div>
        <div class="row b-t pt-5">
          <div class="col-md-6 pt-3 center">
            <h5><?= $invoice_sponsor->full_name ?></h5>
            <p>  <?= $invoice_sponsor->address ?></p>
            <p>Email : <?= $invoice_sponsor->email ?><br>Mobile : <?= $invoice_sponsor->mobile_no; ?></p>
          </div>
          <div class="col-md-6 text-right">
            <h5>Payment Details</h5>
            <p><?= $invoice_sponsor->full_name; ?></p>
            <p>PROFILE ID: <?= $invoice_sponsor->profile_id ?></p>
             <?php if ($invoice_sponsor->is_blocked == 'yes'): ?>
               <p>Payment Status: <span class="text-danger">Pending</span></p>
             <?php else: ?>
               <p>Payment Type: <?= $this->Crud_model->get_type_name_by_id('payoptions', $invoice_sponsor->payment_type);  ?></p>
             <?php endif ?>
            
            <p>Product Name: <?= $this->Crud_model->get_type_name_by_id('package', $invoice_sponsor->product);  ?></p>
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
            <td><?= $this->Crud_model->get_type_name_by_id('package', $invoice_sponsor->product);  ?></td>
            <td> <?= count($invoice_sponsor->product); ?></td>
            <td><i class="fa fa-rupee"></i><?= $this->Crud_model->get_type_name_by_id('package', $invoice_sponsor->product , 'fee');  ?></td>
            <td><i class="fa fa-rupee"></i> <?= $this->Crud_model->get_type_name_by_id('package', $invoice_sponsor->product , 'fee');  ?></td>
          </tr>
        </table>
      </div>
      <div class="bg-light text-white p-2">
        <div class="row">
          <div class="col-md-2"> 
           
           <img src="<?= base_url('home/qrcode/' . $invoice_sponsor->profile_id); ?>" class="img-responsive" alt="Image">
          </div>
          <div class="col-md-4 text-right bg-dark pt-2">
            <h6 class="text-white text-center">Sub - Total amount</h6>
            <h3 class="text-center text-white"><i class="fa fa-rupee"></i> <?= $this->Crud_model->get_type_name_by_id('package', $invoice_sponsor->product , 'fee');  ?></h3>
          </div>
          <div class="col-md-3 text-right bg-dark">
            <!-- <h6>Discount</h6>
            <h3>0%</h3> -->
          </div>
          <div class="col-md-3 text-right bg-dark pt-2">
            <h6 class="text-white">Grand Total</h6>
            <h3 class="text-white"><i class="fa fa-rupee"></i> <?= $this->Crud_model->get_type_name_by_id('package', $invoice_sponsor->product , 'fee');  ?></h3>
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