<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .height {
            min-height: 200px;
        }

        .icon {
            font-size: 47px;
            color: #5CB85C;
        }

        .iconbig {
            font-size: 77px;
            color: #5CB85C;
        }

        .table > tbody > tr > .emptyrow {
            border-top: none;
        }

        .table > thead > tr > .emptyrow {
            border-bottom: none;
        }

        .table > tbody > tr > .highrow {
            border-top: 3px solid;
        }
    </style>

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="text-xs-center">
                <i class="fa fa-search-plus float-xs-left icon"></i>
                <h2>Invoice for purchase #33221</h2>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-3 float-xs-left">
                    <div class="card  height">
                        <div class="card-header">Billing Details</div>
                        <div class="card-block">
                            <strong>David Peere:</strong><br>
                            1111 Army Navy Drive<br>
                            Arlington<br>
                            VA<br>
                            <strong>22 203</strong><br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="card  height">
                        <div class="card-header">Payment Information</div>
                        <div class="card-block">
                            <strong>Card Name:</strong> Visa<br>
                            <strong>Card Number:</strong> ***** 332<br>
                            <strong>Exp Date:</strong> 09/2020<br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="card  height">
                        <div class="card-header">Order Preferences</div>
                        <div class="card-block">
                            <strong>Gift:</strong> No<br>
                            <strong>Express Delivery:</strong> Yes<br>
                            <strong>Insurance:</strong> No<br>
                            <strong>Coupon:</strong> No<br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3 float-xs-right">
                    <div class="card  height">
                        <div class="card-header">Shipping Address</div>
                        <div class="card-block">
                            <strong>David Peere:</strong><br>
                            1111 Army Navy Drive<br>
                            Arlington<br>
                            VA<br>
                            <strong>22 203</strong><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="text-xs-center"><strong>Order summary</strong></h3>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-xs-center"><strong>Item Price</strong></td>
                                    <td class="text-xs-center"><strong>Item Quantity</strong></td>
                                    <td class="text-xs-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Samsung Galaxy S5</td>
                                    <td class="text-xs-center">$900</td>
                                    <td class="text-xs-center">1</td>
                                    <td class="text-xs-right">$900</td>
                                </tr>
                                <tr>
                                    <td>Samsung Galaxy S5 Extra Battery</td>
                                    <td class="text-xs-center">$30.00</td>
                                    <td class="text-xs-center">1</td>
                                    <td class="text-xs-right">$30.00</td>
                                </tr>
                                <tr>
                                    <td>Screen protector</td>
                                    <td class="text-xs-center">$7</td>
                                    <td class="text-xs-center">4</td>
                                    <td class="text-xs-right">$28</td>
                                </tr>
                                <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-xs-center"><strong>Subtotal</strong></td>
                                    <td class="highrow text-xs-right">$958.00</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-xs-center"><strong>Shipping</strong></td>
                                    <td class="emptyrow text-xs-right">$20</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-xs-center"><strong>Total</strong></td>
                                    <td class="emptyrow text-xs-right">$978.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>





