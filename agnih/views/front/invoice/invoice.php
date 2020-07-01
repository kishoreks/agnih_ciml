<!DOCTYPE html>
<html  lang="en">
  <head>
    <title>Simple Invoice Template In Bootstrap 4</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style type="text/css">
      @import url('https://fonts.googleapis.com/css?family=Raleway:300i,400,500,700&display=swap');
      body{
      padding:0;
      margin: 0;
      overflow-x: hidden;
      font-family: 'Raleway', sans-serif;
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
    </style>
  </head>
  <body>
    <div class="container">
      <h5 class="text-center p-4">Simple Invoice Template In Bootstrap 4</h5>
      <div class="bg-light p-5">
        <h1 class="text-center m-0">John Dean</h1>
      	 <div class="row pt-3 mb-2">
          <div class="col-md-6 pull-left"><img src="<?= base_url(); ?>assets/site_img/invoice_logo.png" class="img-responsive"></div>
          <div class="col-md-6 text-right">
            <h5 class="pt-4">invoice #454</h5>
            <p class="text-muted mb-0"><i>Due to: 4 Dec, 2019</i></p>
          </div>
        </div>
        <div class="row b-t pt-5">
          <div class="col-md-6 pt-3 center">
            <h5>Client Information</h5>
            <p>John Doe, Mrs Emma Downson<br>Acme Inc</p>
            <p>Berlin, Germany<br>6781 45P</p>
          </div>
          <div class="col-md-6 text-right">
            <h5>Payment Details</h5>
            <p>VAT: 1425782</p>
            <p>VAT ID: 10253642</p>
            <p>Payment Type: Root</p>
            <p>Name: John Doe</p>
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
            <td>ABC</td>
            <td>3</td>
            <td>$ 25</td>
            <td>$ 75</td>
          </tr>
        </table>
      </div>
      <div class="bg-dark text-white p-5">
        <div class="row">
          <div class="col-md-4">		
          </div>
          <div class="col-md-3 text-right">
            <h6>Sub - Total amount</h6>
            <h3 class="text-center">$33,350</h3>
          </div>
          <div class="col-md-2 text-right">
            <h6>Discount</h6>
            <h3>10%</h3>
          </div>
          <div class="col-md-3 text-right">
            <h6>Grand Total</h6>
            <h3>$234,234</h3>
          </div>
        </div>
      </div>
    </div>
     </body>
</html>