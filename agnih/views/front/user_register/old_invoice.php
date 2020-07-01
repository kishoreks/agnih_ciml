<!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
  <head lang="en" dir="ltr"
  xmlns:content="http://purl.org/rss/1.0/modules/content/"
  xmlns:dc="http://purl.org/dc/terms/"
  xmlns:foaf="http://xmlns.com/foaf/0.1/"
  xmlns:og="http://ogp.me/ns#"
  xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
  xmlns:sioc="http://rdfs.org/sioc/ns#"
  xmlns:sioct="http://rdfs.org/sioc/types#"
  xmlns:skos="http://www.w3.org/2004/02/skos/core#"
  xmlns:xsd="http://www.w3.org/2001/XMLSchema#">
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

    <?php var_dump($all_invoice); ?>
  
   <?php foreach ($all_invoice as $invoice_sponsor): ?>
    <div class="container">
      <h6 class="text-center p-4">Fees Once Paid Will Not Be Refunded</h6>
      <div class="bg-light p-5">
       <!--  <h1 class="text-center m-0"></h1> -->
         <div class="row pt-3 mb-2">
          <div class="col-md-6 pull-left"><img src="<?= base_url(); ?>assets/site_img/invoice_logo.png" class="img-responsive"></div>
          <div class="col-md-6 text-right">
              <?php $sponsor = $this->db->get_where('sponsor' , array('sponsor_id' => $invoice_sponsor->sponsor_id))->row(); ?>

            <h5 class="pt-4">invoice # <?= $invoice_sponsor->invoice_no; ?></h5>
            <p class="text-muted mb-0"><i>Date to: <?= $invoice_sponsor->created_at ?></i></p>
          </div>
        </div>
        <div class="row b-t pt-5">
          <div class="col-md-6 pt-3 center">
            <h5><?= $sponsor->full_name ?></h5>
            <p>  <?= $sponsor->address ?></p>
            <p>Email : <?= $sponsor->email ?><br>Mobile : <?= $sponsor->mobile_no; ?></p>
          </div>
          <div class="col-md-6 text-right">
            <h5>Payment Details</h5>
            <p><?= $sponsor->full_name; ?></p>
            <p>PROFILE ID: <?= $sponsor->profile_id ?></p>
             <?php if ($sponsor->is_blocked == 'yes'): ?>
               <p>Payment Status: <span class="text-danger">Pending</span></p>
             <?php else: ?>
               <p>Payment Type: <?= $this->Crud_model->get_type_name_by_id('payoptions', $sponsor->payment_type);  ?></p>
             <?php endif ?>
            
            <p>Product Name: <?= $this->Crud_model->get_type_name_by_id('package', $sponsor->product);  ?></p>
          </div>
        </div>
        
         <table class="table table-hover">
          <thead>
            <tr>
              <td>Name</td>
              <td>Quantity</td>
              <td>Price</td>
              <td>Total</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?= $this->Crud_model->get_type_name_by_id('package', $sponsor->product);?></td>
              <td><?= count($sponsor->product); ?></td>
              <td><i class="fa fa-rupee"></i><?= $this->Crud_model->get_type_name_by_id('package', $sponsor->product , 'fee');?></td>
              <td><i class="fa fa-rupee"></i> <?= $this->Crud_model->get_type_name_by_id('package', $sponsor->product , 'fee');?></td>
            </tr>
          </tbody>
        </table>

      </div>
      <div class="bg-dark text-white p-5">
        <div class="row">
          <div class="col-md-4">        
          </div>
          <div class="col-md-3 text-right">
            <h6>Sub - Total amount</h6>
            <h3 class="text-center"><i class="fa fa-rupee"></i> <?= $this->Crud_model->get_type_name_by_id('package', $sponsor->product , 'fee');  ?></h3>
          </div>
          <div class="col-md-2 text-right">
            <!-- <h6>Discount</h6>
            <h3>0%</h3> -->
          </div>
          <div class="col-md-3 text-right">
            <h6>Grand Total</h6>
            <h3><i class="fa fa-rupee"></i> <?= $this->Crud_model->get_type_name_by_id('package', $sponsor->product , 'fee');  ?></h3>
          </div>
        </div>
      </div>
    </div>

    <?php endforeach ?>

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

