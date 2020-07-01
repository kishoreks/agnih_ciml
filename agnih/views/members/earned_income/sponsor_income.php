<style>
  ul.activity li.activity-item {
    position: relative;
    border-left: 0px solid #dee2e6;
}
</style>

<!-- begin row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="datatable" class="display compact table table-striped table-bordered">
                        <thead>
                            <tr>
                                
                                <th>Username</th>
                                <th>Profile ID</th>
                                <th>Amount Type</th>
                                <th>Sub Members</th>
                                <th>Package</th>
                                <th>Add Sub</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($downlist as $level_one): ?>
                                <tr>
                                    <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $level_one['sponsor_id'], 'username'); ?></td>
                                    <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $level_one['sponsor_id'], 'profile_id'); ?></td>

                                    <td>
                                        <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success"><?php $amount_type = $this->db->get_where('sponsor_tree' , array('parent_id' => $this->session->userdata('sponsor_id')))->result_array();                                                  
                                            echo "Direct";
                                        ?></span>     
                                    </td>
                                    <td>
                                        <?php 
                                         
                                           $sub_members = $this->db->get_where('sponsor', array('sponsor_referral_id' => $level_one['sponsor_id'] ))->num_rows();
                                             echo $sub_members;
                                            
                                        ?>
                                         
                                     </td>
                                    <td>
                                        <?php
                                            $pid =  $this->Crud_model->get_type_name_by_id('sponsor', $level_one['sponsor_id'], 'product');
                                            echo $this->Crud_model->get_type_name_by_id('package', $pid, 'name');
                                        ?>                                       
                                    </td>    
                                      
                                      <?php if ($sub_members == 3): ?>
                                        <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">No Space</span></td>  
                                      <?php else: ?>
                                        <td><a href="<?= base_url(); ?>members/sponsor/sponsor_register/<?= $this->Crud_model->get_type_name_by_id('sponsor', $level_one['sponsor_id'], 'profile_id'); ?>" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Add Down link</a></td>  
                                      <?php endif ?>

                                                                                                        
                                </tr>

                                 <?php foreach ($level_one['L_1'] as $two): ?>
                                   

                                    <tr>
                                        <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $two['sponsor_id'], 'username'); ?></td>
                                        <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $two['sponsor_id'], 'profile_id'); ?></td>

                                        <td>
                                           <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary">
                                            <?php $amount_type_L_1 = $this->db->get_where('sponsor_tree' , array('parent_id' => $two['sponsor_id']))->result_array();                                                  
                                                echo "Referral";
                                            ?>   
                                            </span>     
                                        </td>
                                        <td>
                                            <?php 
                                             
                                               $sub_members_L_1 = $this->db->get_where('sponsor', array('sponsor_referral_id' => $two['sponsor_id'] ))->num_rows();
                                                 echo $sub_members_L_1;
                                            ?>
                                             
                                         </td>
                                        <td>
                                            <?php
                                                $pid_L_1 =  $this->Crud_model->get_type_name_by_id('sponsor', $two['sponsor_id'], 'product');
                                                echo $this->Crud_model->get_type_name_by_id('package', $pid_L_1, 'name')
                                            ?>                                       
                                        </td>   

                                        <?php if ($sub_members_L_1 == 3): ?>
                                          <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">No Space</span></td>  
                                        <?php else: ?>
                                          <td><a href="<?= base_url(); ?>members/sponsor/sponsor_register/<?= $this->Crud_model->get_type_name_by_id('sponsor', $two['sponsor_id'], 'profile_id'); ?>" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Add Down link</a></td>  
                                        <?php endif ?>                                                             
                                    </tr>

                                    <?php foreach ($two['L_2'] as $three): ?>

                                         <tr>
                                            <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $three['sponsor_id'], 'username'); ?></td>
                                            <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $three['sponsor_id'], 'profile_id'); ?></td>

                                            <td>
                                               <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary">
                                                <?php $amount_type_L_2 = $this->db->get_where('sponsor_tree' , array('parent_id' => $three['sponsor_id']))->result_array();                                                  
                                                    echo "Referral";
                                                ?>   
                                                </span>     
                                            </td>
                                            <td>
                                                <?php 
                                                 
                                                   $sub_members_L_2 = $this->db->get_where('sponsor', array('sponsor_referral_id' => $three['sponsor_id'] ))->num_rows();
                                                     echo $sub_members_L_2;
                                                ?>
                                                 
                                             </td>
                                            <td>
                                                <?php
                                                    $pid_L_2 =  $this->Crud_model->get_type_name_by_id('sponsor', $three['sponsor_id'], 'product');
                                                    echo $this->Crud_model->get_type_name_by_id('package', $pid_L_2, 'name')
                                                ?>                                       
                                            </td>   

                                                 <?php if ($sub_members_L_2 == 3): ?>
                                                  <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">No Space</span></td>  
                                                <?php else: ?>
                                                  <td><a href="<?= base_url(); ?>members/sponsor/sponsor_register/<?= $this->Crud_model->get_type_name_by_id('sponsor', $three['sponsor_id'], 'profile_id'); ?>" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Add Down link</a></td>  
                                                <?php endif ?>                                                          
                                        </tr>


                                        <?php foreach ($three['L_3'] as $four): ?>

                                              <tr>
                                                <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $four['sponsor_id'], 'username'); ?></td>
                                                <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $four['sponsor_id'], 'profile_id'); ?></td>

                                                <td>
                                                   <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary">
                                                    <?php $amount_type_L_3 = $this->db->get_where('sponsor_tree' , array('parent_id' => $four['sponsor_id']))->result_array();                                                  
                                                        echo "Referral";
                                                    ?>   
                                                    </span>     
                                                </td>
                                                <td>
                                                    <?php 
                                                     
                                                       $sub_members_L_3 = $this->db->get_where('sponsor', array('sponsor_referral_id' => $four['sponsor_id'] ))->num_rows();
                                                         echo $sub_members_L_3;
                                                    ?>
                                                     
                                                 </td>
                                                <td>
                                                    <?php
                                                        $pid_L_3 =  $this->Crud_model->get_type_name_by_id('sponsor', $four['sponsor_id'], 'product');
                                                        echo $this->Crud_model->get_type_name_by_id('package', $pid_L_3, 'name')
                                                    ?>                                       
                                                </td>   

                                                 <?php if ($sub_members_L_3 == 3): ?>
                                                  <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">No Space</span></td>  
                                                <?php else: ?>
                                                  <td><a href="<?= base_url(); ?>members/sponsor/sponsor_register/<?= $this->Crud_model->get_type_name_by_id('sponsor', $four['sponsor_id'], 'profile_id'); ?>" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Add Down link</a></td>  
                                                <?php endif ?>                                                                          
                                            </tr>

                                            <?php foreach ($four['L_4'] as $five): ?>

                                                  <tr>
                                                    <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $five['sponsor_id'], 'username'); ?></td>
                                                    <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $five['sponsor_id'], 'profile_id'); ?></td>

                                                    <td>
                                                       <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary">
                                                        <?php $amount_type_L_4 = $this->db->get_where('sponsor_tree' , array('parent_id' => $five['sponsor_id']))->result_array();                                                  
                                                            echo "Referral";
                                                        ?>   
                                                        </span>     
                                                    </td>
                                                    <td>
                                                        <?php 
                                                         
                                                           $sub_members_L_4 = $this->db->get_where('sponsor', array('sponsor_referral_id' => $five['sponsor_id'] ))->num_rows();
                                                             echo $sub_members_L_4;
                                                        ?>
                                                         
                                                     </td>
                                                    <td>
                                                        <?php
                                                            $pid_L_4 =  $this->Crud_model->get_type_name_by_id('sponsor', $five['sponsor_id'], 'product');
                                                            echo $this->Crud_model->get_type_name_by_id('package', $pid_L_4, 'name')
                                                        ?>                                       
                                                    </td>   

                                                    <?php if ($sub_members_L_4 == 3): ?>
                                                      <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">No Space</span></td>  
                                                    <?php else: ?>
                                                      <td><a href="<?= base_url(); ?>members/sponsor/sponsor_register/<?= $this->Crud_model->get_type_name_by_id('sponsor', $five['sponsor_id'], 'profile_id'); ?>" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Add Down link</a></td>  
                                                    <?php endif ?>                                                                           
                                                </tr>

                                                 <?php foreach ($five['L_5'] as $six): ?>

                                                       <tr>
                                                            <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $six['sponsor_id'], 'username'); ?></td>
                                                            <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $six['sponsor_id'], 'profile_id'); ?></td>

                                                            <td>
                                                               <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary">
                                                                <?php $amount_type_L_5 = $this->db->get_where('sponsor_tree' , array('parent_id' => $six['sponsor_id']))->result_array();                                                  
                                                                    echo "Referral";
                                                                ?>   
                                                                </span>     
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                 
                                                                   $sub_members_L_5 = $this->db->get_where('sponsor', array('sponsor_referral_id' => $six['sponsor_id'] ))->num_rows();
                                                                     echo $sub_members_L_5;
                                                                ?>
                                                                 
                                                             </td>
                                                            <td>
                                                                <?php
                                                                    $pid_L_5 =  $this->Crud_model->get_type_name_by_id('sponsor', $six['sponsor_id'], 'product');
                                                                    echo $this->Crud_model->get_type_name_by_id('package', $pid_L_5, 'name')
                                                                ?>                                       
                                                            </td>   

                                                            <?php if ($sub_members_L_5 == 3): ?>
                                                              <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">No Space</span></td>  
                                                            <?php else: ?>
                                                              <td><a href="<?= base_url(); ?>members/sponsor/sponsor_register/<?= $this->Crud_model->get_type_name_by_id('sponsor', $six['sponsor_id'], 'profile_id'); ?>" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Add Down link</a></td>  
                                                            <?php endif ?>                                                                           
                                                        </tr>

                                                        <?php foreach ($six['L_6'] as $seven): ?>

                                                             <tr>
                                                            <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $seven['sponsor_id'], 'username'); ?></td>
                                                            <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $seven['sponsor_id'], 'profile_id'); ?></td>

                                                            <td>
                                                               <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary">
                                                                <?php $amount_type_L_6 = $this->db->get_where('sponsor_tree' , array('parent_id' => $seven['sponsor_id']))->result_array();                                                  
                                                                    echo "Referral";
                                                                ?>   
                                                                </span>     
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                 
                                                                   $sub_members_L_6 = $this->db->get_where('sponsor', array('sponsor_referral_id' => $seven['sponsor_id'] ))->num_rows();
                                                                     echo $sub_members_L_6;
                                                                ?>
                                                                 
                                                             </td>
                                                            <td>
                                                                <?php
                                                                    $pid_L_6 =  $this->Crud_model->get_type_name_by_id('sponsor', $seven['sponsor_id'], 'product');
                                                                    echo $this->Crud_model->get_type_name_by_id('package', $pid_L_6, 'name')
                                                                ?>                                       
                                                            </td>   

                                                           <?php if ($sub_members_L_6 == 3): ?>
                                                              <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">No Space</span></td>  
                                                            <?php else: ?>
                                                              <td><a href="<?= base_url(); ?>members/sponsor/sponsor_register/<?= $this->Crud_model->get_type_name_by_id('sponsor', $seven['sponsor_id'], 'profile_id'); ?>" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Add Down link</a></td>  
                                                            <?php endif ?>                                                                            
                                                        </tr>

                                                        <?php foreach ($seven['L_7'] as $eight): ?>

                                                             <tr>
                                                            <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $eight['sponsor_id'], 'username'); ?></td>
                                                            <td><?= $this->Crud_model->get_type_name_by_id('sponsor', $eight['sponsor_id'], 'profile_id'); ?></td>

                                                            <td>
                                                               <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-primary">
                                                                <?php $amount_type_L_7 = $this->db->get_where('sponsor_tree' , array('parent_id' => $eight['sponsor_id']))->result_array();                                                  
                                                                    echo "Referral";
                                                                ?>   
                                                                </span>     
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                 
                                                                   $sub_members_L_7 = $this->db->get_where('sponsor', array('sponsor_referral_id' => $eight['sponsor_id'] ))->num_rows();
                                                                     echo $sub_members_L_7;
                                                                ?>
                                                                 
                                                             </td>
                                                            <td>
                                                                <?php
                                                                    $pid_L_7 =  $this->Crud_model->get_type_name_by_id('sponsor', $eight['sponsor_id'], 'product');
                                                                    echo $this->Crud_model->get_type_name_by_id('package', $pid_L_7, 'name')
                                                                ?>                                       
                                                            </td>   

                                                            <?php if ($sub_members_L_7 == 3): ?>
                                                              <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">No Space</span></td>  
                                                            <?php else: ?>
                                                              <td><a href="<?= base_url(); ?>members/sponsor/sponsor_register/<?= $this->Crud_model->get_type_name_by_id('sponsor', $eight['sponsor_id'], 'profile_id'); ?>" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Add Down link</a></td>  
                                                            <?php endif ?>                                                                         
                                                        </tr>
                                                            
                                                        <?php endforeach ?>
                                                            
                                                        <?php endforeach ?>
                                                     
                                                 <?php endforeach ?>
                                                
                                            <?php endforeach ?>
                                            
                                        <?php endforeach ?>

                                        
                                    <?php endforeach ?>

                                 <?php endforeach ?>  

                            <?php endforeach ?>
                                                                                   
                                                                          
                        </tbody>
                        <tfoot>
                            <tr>
                               
                                <th>Username</th>
                                <th>Profile ID</th>
                                <th>Amount Type</th>
                                <th>Sub Members</th>
                                <th>Package</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<?php
$package_id = $this->Crud_model->get_type_name_by_id('sponsor', $this->session->userdata('sponsor_id'), 'product');
$package_fee = $this->Crud_model->get_type_name_by_id('package', $package_id, 'fee');
$package_commission = $this->Crud_model->get_type_name_by_id('package', $package_id, 'commission');
$C_1 = intval(3 * $package_fee * $package_commission / 100);
$C_2 = intval(9 * $package_fee * $package_commission / 100);
$C_3 = intval(27 * $package_fee * $package_commission / 100);
$C_4 = intval(81 * $package_fee * $package_commission / 100);
$C_5 = intval(243 * $package_fee * $package_commission / 100);
$C_6 = intval(729 * $package_fee * $package_commission / 100);
$C_7 = intval(2187 * $package_fee * $package_commission / 100);
$C_8 = intval(6561 * $package_fee * $package_commission / 100);
//$S_1 =    
?>

 <?php foreach ($downlist as $level_d1): ?>

        <?php
        $product_id_d1 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d1['sponsor_id'], 'product');
        $product_fee_d1 = $this->Crud_model->get_type_name_by_id('package', $product_id_d1, 'fee');
        $product_commission_d1 = $this->Crud_model->get_type_name_by_id('package', $product_id_d1, 'commission');
        $math_d1 = math($product_fee_d1, $product_commission_d1);
        @$totel_d1 += $math_d1;
        $D1 = intval($totel_d1);
        ?>

        <?php foreach ($level_d1['L_1'] as $level_d2): ?>

            <?php
            $product_id_d2 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d2['sponsor_id'], 'product');
            $product_fee_d2 = $this->Crud_model->get_type_name_by_id('package', $product_id_d2, 'fee');
            $product_commission_d2 = $this->Crud_model->get_type_name_by_id('package', $product_id_d2, 'commission');
            $math_d2 = math($product_fee_d2, $product_commission_d2);
            @$totel_d2 += $math_d2;
            $D2 = intval($totel_d2);
            ?>                     

            <?php foreach ($level_d2['L_2'] as $level_d3): ?>
                <?php
                $product_id_d3 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d3['sponsor_id'], 'product');
                $product_fee_d3 = $this->Crud_model->get_type_name_by_id('package', $product_id_d3, 'fee');
                $product_commission_d3 = $this->Crud_model->get_type_name_by_id('package', $product_id_d3, 'commission');
                $math_d3 = math($product_fee_d3, $product_commission_d3);
                @$totel_d3 += $math_d3;
                $D3 = intval($totel_d3);
                ?>  

                <?php foreach ($level_d3['L_3'] as $level_d4): ?>

                    <?php
                    $product_id_d4 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d4['sponsor_id'], 'product');
                    $product_fee_d4 = $this->Crud_model->get_type_name_by_id('package', $product_id_d4, 'fee');
                    $product_commission_d4 = $this->Crud_model->get_type_name_by_id('package', $product_id_d4, 'commission');
                    $math_d4 = math($product_fee_d4, $product_commission_d4);
                    @$totel_d4 += $math_d4;
                    $D4 = intval($totel_d4);
                    ?> 

                    <?php foreach ($level_d4['L_4'] as $level_d5): ?>

                        <?php
                        $product_id_d5 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d5['sponsor_id'], 'product');
                        $product_fee_d5 = $this->Crud_model->get_type_name_by_id('package', $product_id_d5, 'fee');
                        $product_commission_d5 = $this->Crud_model->get_type_name_by_id('package', $product_id_d5, 'commission');
                        $math_d5 = math($product_fee_d5, $product_commission_d5);
                        @$totel_d5 += $math_d5;
                        $D5 = intval($totel_d5);
                        ?> 

                        <?php foreach ($level_d5['L_5'] as $level_d6): ?>

                            <?php
                            $product_id_d6 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d6['sponsor_id'], 'product');
                            $product_fee_d6 = $this->Crud_model->get_type_name_by_id('package', $product_id_d6, 'fee');
                            $product_commission_d6 = $this->Crud_model->get_type_name_by_id('package', $product_id_d6, 'commission');
                            $math_d6 = math($product_fee_d6, $product_commission_d6);
                            @$totel_d6 += $math_d6;
                            $D6 = intval($totel_d6);
                            ?> 


                            <?php foreach ($level_d6['L_6'] as $level_d7): ?>

                                <?php
                                $product_id_d7 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d7['sponsor_id'], 'product');
                                $product_fee_d7 = $this->Crud_model->get_type_name_by_id('package', $product_id_d7, 'fee');
                                $product_commission_d7 = $this->Crud_model->get_type_name_by_id('package', $product_id_d7, 'commission');
                                $math_d7 = math($product_fee_d7, $product_commission_d7);
                                @$totel_d7 += $math_d7;
                                $D7 = intval($totel_d7);
                                ?> 

                                <?php foreach ($level_d7['L_7'] as $level_d8): ?>

                                    <?php
                                    $product_id_d8 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d8['sponsor_id'], 'product');
                                    $product_fee_d8 = $this->Crud_model->get_type_name_by_id('package', $product_id_d8, 'fee');
                                    $product_commission_d8 = $this->Crud_model->get_type_name_by_id('package', $product_id_d8, 'commission');
                                    $math_d8 = math($product_fee_d8, $product_commission_d8);
                                    @$totel_d8 += $math_d8;
                                    $D8 = intval($totel_d8);
                                    ?> 

                                    <?php foreach ($level_d8['L_8'] as $level_d9): ?>

                                        <?php
                                        $product_id_d9 = $this->Crud_model->get_type_name_by_id('sponsor', $level_d9['sponsor_id'], 'product');
                                        $product_fee_d9 = $this->Crud_model->get_type_name_by_id('package', $product_id_d9, 'fee');
                                        $product_commission_d9 = $this->Crud_model->get_type_name_by_id('package', $product_id_d9, 'commission');
                                        $math_d9 = math($product_fee_d9, $product_commission_d9);
                                        @$totel_d9 += $math_d9;
                                        $D9 = intval($totel_d9);
                                        ?> 

                                    <?php endforeach ?>

                                <?php endforeach ?>

                            <?php endforeach ?>

                        <?php endforeach ?>

                    <?php endforeach ?>

                <?php endforeach ?>

            <?php endforeach ?>

        <?php endforeach ?>

    <?php endforeach ?>

 <div class="row">
    <div class="col-sm-12 col-xxl-3 mb-30">
        <div class="card card-statistic car-dealer-contants h-100 mb-0 o-hidden">
            <div class="card-body p-0">
                <div class="bg-gradient">
                    <div class="card-header border-0 d-flex justify-content-between mb-3">
                        <div class="card-heading">
                            <h4 class="card-title text-white">Earned Income & Payout</h4>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters">

                    <div class="col-xxs-6">
                        <div class="media align-items-center p-4 border-sm-right border-bottom">
                            <div class="mr-4">
                                <i class="fe fe-user-check text-primary font-30"></i>
                            </div>
                            <div class="media-body">
                                <strong class="text-dark">LEVEL 1</strong>
                                <h3 class="font-light text-muted mb-0">

                                     <?php if ($C_1 == $D1): ?>
                                          <ul class="activity mt-1">
                                                <li class="activity-item success" style="border-left:0">
                                                    <div class="activity-info">
                                                        <h5 class="mb-0 text-success">Level Achieved</h5>
                                                        <span> <i class="fa fa-rupee"></i> <?= $D1; ?></span>
                                                    </div>
                                                </li>       
                                          </ul>
                                     <?php else: ?>
                                           <ul class="activity">
                                                  <li class="activity-item primary">
                                                      <div class="activity-info">
                                                          <h5 class="mb-0">Level not Achieved</h5>
                                                          <span><?= date('d-M-Y') ?></span>
                                                      </div>
                                                  </li>       
                                            </ul>
                                     <?php endif ?>                                                                      

                                </h3>
                            </div>
                        </div>
                        <div class="media align-items-center p-4 border-sm-right border-bottom 2border-sm-bottom-0">
                            <div class="mr-4">
                                <i class="fe fe-command text-primary font-30"></i>
                            </div>
                            <div class="media-body">
                                <strong class="text-dark">LEVEL 3</strong>
                                <h3 class="font-light text-muted mb-0">
                                     <?php if ($C_3 == $D3): ?>
                                          <ul class="activity mt-1">
                                                <li class="activity-item success" style="border-left:0">
                                                    <div class="activity-info">
                                                        <h5 class="mb-0 text-success">Level Achieved</h5>
                                                        <span> <i class="fa fa-rupee"></i> <?= $D3; ?></span>
                                                    </div>
                                                </li>       
                                          </ul>
                                     <?php else: ?>
                                           <ul class="activity">
                                                  <li class="activity-item primary">
                                                      <div class="activity-info">
                                                          <h5 class="mb-0">Level not Achieved</h5>
                                                          <span><?= date('d-M-Y') ?></span>
                                                      </div>
                                                  </li>       
                                            </ul>
                                     <?php endif ?>
                                    
                                        
                                    </h3>
                            </div>
                        </div>

                    </div>

                    <div class="col-xxs-6">
                        <div class="media align-items-center p-4 border-bottom">
                            <div class="mr-4">
                                <i class="fe fe-users text-primary font-30"></i>
                            </div>
                            <div class="media-body">
                                <strong class="text-dark">LEVEL 2</strong>
                                <h3 class="font-light text-muted mb-0">
                                    
                                   <?php if ($C_2 == $D2): ?>
                                          <ul class="activity mt-1">
                                                <li class="activity-item success" style="border-left:0">
                                                    <div class="activity-info">
                                                        <h5 class="mb-0 text-success">Level Achieved</h5>
                                                        <span> <i class="fa fa-rupee"></i> <?= $D2; ?></span>
                                                    </div>
                                                </li>       
                                          </ul>
                                     <?php else: ?>
                                           <ul class="activity">
                                                  <li class="activity-item primary">
                                                      <div class="activity-info">
                                                          <h5 class="mb-0">Level not Achieved</h5>
                                                          <span><?= date('d-M-Y') ?></span>
                                                      </div>
                                                  </li>       
                                            </ul>
                                     <?php endif ?>
                                                                           

                                    </h3>
                            </div>
                        </div>
                        <div class="media align-items-center p-4 border-bottom">
                            <div class="mr-4">
                                <i class="fe fe-sunrise text-primary font-30"></i>
                            </div>
                            <div class="media-body">
                                <strong class="text-dark">LEVEL 4</strong>
                                <h3 class="font-light text-muted mb-0">
                                    
                                   <?php if ($C_4 == $D4): ?>
                                          <ul class="activity mt-1">
                                                <li class="activity-item success" style="border-left:0">
                                                    <div class="activity-info">
                                                        <h5 class="mb-0 text-success">Level Achieved</h5>
                                                        <span> <i class="fa fa-rupee"></i> <?= $D4; ?></span>
                                                    </div>
                                                </li>       
                                          </ul>
                                     <?php else: ?>
                                           <ul class="activity">
                                                  <li class="activity-item primary">
                                                      <div class="activity-info">
                                                          <h5 class="mb-0">Level not Achieved</h5>
                                                          <span><?= date('d-M-Y') ?></span>
                                                      </div>
                                                  </li>       
                                            </ul>
                                     <?php endif ?>

                                                                          

                                    </h3>
                            </div>
                        </div>
                    </div>

                     <div class="col-xxs-6">
                        <div class="media align-items-center p-4 border-sm-right border-bottom">
                            <div class="mr-4">
                                <i class="fe fe-share-2 text-primary font-30"></i>
                            </div>
                            <div class="media-body">
                                <strong class="text-dark">LEVEL 5</strong>
                                <h3 class="font-light text-muted mb-0">
                                    <?php if ($C_5 == $D5): ?>
                                          <ul class="activity mt-1">
                                                <li class="activity-item success" style="border-left:0">
                                                    <div class="activity-info">
                                                        <h5 class="mb-0 text-success">Level Achieved</h5>
                                                        <span> <i class="fa fa-rupee"></i> <?= $D5; ?></span>
                                                    </div>
                                                </li>       
                                          </ul>
                                     <?php else: ?>
                                           <ul class="activity">
                                                  <li class="activity-item primary">
                                                      <div class="activity-info">
                                                          <h5 class="mb-0">Level not Achieved</h5>
                                                          <span><?= date('d-M-Y') ?></span>
                                                      </div>
                                                  </li>       
                                            </ul>
                                     <?php endif ?>
                                  
                                    </h3>
                            </div>
                        </div>
                        <div class="media align-items-center p-4 border-sm-right border-bottom">
                            <div class="mr-4">
                                <i class="fe fe-radio text-primary font-30"></i>
                            </div>
                            <div class="media-body">
                                <strong class="text-dark">LEVEL 6</strong>
                                <h3 class="font-light text-muted mb-0">
                                    <?php if ($C_6 == $D6): ?>
                                          <ul class="activity mt-1">
                                                <li class="activity-item success" style="border-left:0">
                                                    <div class="activity-info">
                                                        <h5 class="mb-0 text-success">Level Achieved</h5>
                                                        <span> <i class="fa fa-rupee"></i> <?= $D6; ?></span>
                                                    </div>
                                                </li>       
                                          </ul>
                                     <?php else: ?>
                                           <ul class="activity">
                                                  <li class="activity-item primary">
                                                      <div class="activity-info">
                                                          <h5 class="mb-0">Level not Achieved</h5>
                                                          <span><?= date('d-M-Y') ?></span>
                                                      </div>
                                                  </li>       
                                            </ul>
                                     <?php endif ?>
                                   
                                        
                                    </h3>
                            </div>
                        </div>
                    </div>
                     
                    <div class="col-xxs-6">
                        <div class="media align-items-center p-4 border-sm-right border-bottom">
                            <div class="mr-4">
                                <i class="fe fe-loader text-primary font-30"></i>
                            </div>
                            <div class="media-body">
                                <strong class="text-dark">LEVEL 7</strong>
                                <h3 class="font-light text-muted mb-0">
                                     <?php if ($C_7 == $D7): ?>
                                          <ul class="activity mt-1">
                                                <li class="activity-item success" style="border-left:0">
                                                    <div class="activity-info">
                                                        <h5 class="mb-0 text-success">Level Achieved</h5>
                                                        <span> <i class="fa fa-rupee"></i> <?= $D7; ?></span>
                                                    </div>
                                                </li>       
                                          </ul>
                                     <?php else: ?>
                                           <ul class="activity">
                                                  <li class="activity-item primary">
                                                      <div class="activity-info">
                                                          <h5 class="mb-0">Level not Achieved</h5>
                                                          <span><?= date('d-M-Y') ?></span>
                                                      </div>
                                                  </li>       
                                            </ul>
                                     <?php endif ?>
                                  
                                        
                                    </h3>
                            </div>
                        </div>
                        <div class="media align-items-center p-4 border-sm-right border-bottom">
                            <div class="mr-4">
                                <i class="fe fe-sun text-primary font-30"></i>
                            </div>
                            <div class="media-body">
                                <strong class="text-dark">LEVEL 8</strong>
                                <h3 class="font-light text-muted mb-0">
                                   <?php if ($C_8 == $D8): ?>
                                          <ul class="activity mt-1">
                                                <li class="activity-item success" style="border-left:0">
                                                    <div class="activity-info">
                                                        <h5 class="mb-0 text-success">Level Achieved</h5>
                                                        <span> <i class="fa fa-rupee"></i> <?= $D8; ?></span>
                                                    </div>
                                                </li>       
                                          </ul>
                                     <?php else: ?>
                                           <ul class="activity">
                                                  <li class="activity-item primary">
                                                      <div class="activity-info">
                                                          <h5 class="mb-0">Level not Achieved</h5>
                                                          <span><?= date('d-M-Y') ?></span>
                                                      </div>
                                                  </li>       
                                            </ul>
                                     <?php endif ?>
                                                                          
                                    </h3>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
 </div>