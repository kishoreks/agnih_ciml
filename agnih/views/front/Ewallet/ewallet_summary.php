<!-- begin row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="export-table-wrapper table-responsive">
                   
                    <table id="export-table" class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Transaction Category</th>
                                <th>Credited Amount</th>
                                <th>Debited Amount</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td class="text-primary">Registration Fee</td>
                                <td><?= number_format($credited_amount,2)?></td>
                                <td></td>
                               
                            </tr> 
                           
                            <tr>
                                <td>Payout Request/Release</td>
                                <td>0.00</td>
                                <td><?= number_format($Payout,2); ?></td>
                               
                            </tr>

                            <tr><td></td></tr>
                                                      
                        
                            <tr>
                                <td><b>Total</b></td>
                                <td><b><?= number_format($credited_amount,2)?></b></td>
                                <td>Account Balance <b> <i class="fa fa-rupee"></i> <?php 
                                        
                                      $debited_total =  $credited_amount - $Payout;

                                       echo number_format($debited_total,2);

                                  ?></b></td>
                               
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->