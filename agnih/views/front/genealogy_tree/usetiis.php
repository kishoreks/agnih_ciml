<!-- <link href="https://unpkg.com/treeflex/dist/css/treeflex.css" rel="stylesheet"> -->
<link href="<?= base_url(); ?>assets/css/tree.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/css/tree_tooltip.css" rel="stylesheet">
<script src="<?= base_url(); ?>assets/js/jquery.tree.js"></script>
<script src="<?= base_url(); ?>assets/js/genealogy.js"></script>
<style>
	.tf-tree .tf-nc, .tf-tree .tf-node-content {
    /* border: .0625em solid #000; */
   border:none;
}
.modal-backdrop.show {
    opacity: .5;
    display: none;
}
</style> 


<?php 

  $sub_children = $this->db->get_where('sponsor_tree', array('parent_id' => $g_tree->sponsor_id))->result();

 ?>

 



 <?php  $first_row =  $this->db->get('sponsor')->first_row(); ?>

 <div class="row">
     <div class="col-md-12">
       
<div id="summary" class="tree_main" style="overflow: hidden; position: relative;">




    <div id="tree" class="orgChart" style="transform: matrix(1, 0, 0, 1, 0, 0); transform-origin: 50% 50%;">
        <div class="jOrgChart">
            <table id="tree_div" cellpadding="0" cellspacing="0" border="0" align="center">
                <tbody>

                    <?php 
                         if ($this->uri->segment(4) == '') { ?>

                             <?php $first_node = $this->db->get('sponsor')->first_row();?>
                               
                              <tr class="node-cells">
                                <td class="node-cell" colspan="7">
                                    <div class="node" style="cursor: default;">
                                        <div class="root_div">36</div>
                                        <img class="tree_icon with_tooltip root_node tooltipstered" src="<?= base_url(); ?>assets/site_img/network.jpg" data-toggle="modal" data-target="#<?= $first_node->profile_id; ?>">
                                        <p class="demo_name_style" ><?= $first_node->profile_id; ?></p>
                                    </div>

                                </td>

                            </tr>

                            <!--  -->
                                   
                                   <div class="modal fade" id="<?= $first_node->profile_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          
                                          <div class="modal-body">
                                              <div id="user_DEMOTOS" class="tree_img_tree">
                                                <div class="Demo_head_bg">
                                                    <?php $profile_picture = json_decode($first_node->profile_image); ?>
                                                    
                                                    <img src="<?= base_url(); ?>uploads/profile_image/<?= $profile_picture[0]->thumb ?>">
                                                    <p><?= $first_node->username; ?></p>
                                                </div>
                                                <div class="body_text_tree">
                                                    <div class="binary_bg">
                                                        <p class="text-center text-white"><?= $first_node->full_name; ?> <?= $first_node->last_name; ?></p>
                                                    </div>
                                                    <ul class="list-group no-radius">
                                                        <li class="list-group-item">
                                                            <div class="pull-right">:&nbsp;&nbsp; <?= date("Y/m/d", $first_node->active_on); ?></div>
                                                            <div class="pull-left">Join Date</div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="pull-right">:&nbsp;&nbsp;50</div>
                                                            <div class="pull-left">Personal PV</div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="pull-right">:&nbsp;&nbsp;0</div>
                                                            <div class="pull-left">Group PV</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                           
                                          </div>
                                        </div>
                                      </div>
                                    </div>


                                    <!--  -->


                             
                        <?php  }if ($this->uri->segment(4) == true) { ?> 

                             <tr class="node-cells">
                                <td class="node-cell" colspan="7">
                                    <div class="node" style="cursor: default;">
                                        <img class="tree_icon with_tooltip root_node tooltipstered" src="<?= base_url(); ?>assets/site_img/network.jpg" onclick="getGenologyTree(&quot;INF823741&quot;,event);" data-tooltip-content="#user_INF823741">
                                        <p class="demo_name_style">INF823741</p>
                                    </div>
                                </td>
                            </tr>

                        <?php  } ?>

                     
                   

                    <tr>
                        <td colspan="7">
                            <div class="line down"></div>
                        </td>
                    </tr>

                    <tr>
                        <td class="line left">&nbsp;</td>
                        <td class="line right top">&nbsp;</td>
                        <td class="line left top">&nbsp;</td>
                        <td class="line right top">&nbsp;</td>
                        <td class="line left top">&nbsp;</td>                      
                        <td class="line right">&nbsp;</td>
                    </tr>


                    <tr>


                        <td class="node-container" colspan="2">
                            <table id="tree_div" cellpadding="0" cellspacing="0" border="0" align="center">
                                <tbody>
                                    <tr class="node-cells">
                                        <td class="node-cell" colspan="2">
                                            <div class="node" style="cursor: default;"><img class="tree_icon with_tooltip " src="<?= base_url(); ?>assets/site_img/network.jpg" onclick="getGenologyTree(&quot;DEMOTOS&quot;,event);" data-tooltip-content="#user_DEMOTOS">
                                                <p class="demo_name_style">DEMOTOS</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="line down"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="line left">&nbsp;</td>
                                        <td class="line right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="node-container" colspan="2">
                                            <table id="tree_div" cellpadding="0" cellspacing="0" border="0" align="center">
                                                <tbody>
                                                    <tr class="node-cells">
                                                        <td class="node-cell" colspan="2">
                                                            <div class="node"><img class="tree_icon add-icon" src="https://backoffice.infinitemlmsoftware.com/backoffice/public_html/images/tree/add.png" onclick="goToLink(&quot;https://backoffice.infinitemlmsoftware.com/backoffice/register/user_register/jrkn8Z_vMAJfwirHtYN4Qr83rxH.LmOGtCSrBuC5FwISJOWkQSSugreo6e5eeZCxPiflE6.fbnCi6vccP.VQQQ--/1&quot;);">
                                                                <br>
                                                                <p class="demo_name_style_blue add-btn">ADD HERE</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>

                        



                        <td class="node-container" colspan="2">
                            <table id="tree_div" cellpadding="0" cellspacing="0" border="0" align="center">
                                <tbody>
                                    <tr class="node-cells">
                                        <td class="node-cell" colspan="2">
                                            <div class="node" style="cursor: default;"><img class="tree_icon with_tooltip " src="<?= base_url(); ?>assets/site_img/network.jpg" onclick="getGenologyTree(&quot;DEMO27W&quot;,event);" data-tooltip-content="#user_DEMO27W">
                                                <p class="demo_name_style">DEMO27W</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="line down"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="line left">&nbsp;</td>
                                        <td class="line right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="node-container" colspan="2">
                                            <table id="tree_div" cellpadding="0" cellspacing="0" border="0" align="center">
                                                <tbody>
                                                    <tr class="node-cells">
                                                        <td class="node-cell" colspan="2">
                                                            <div class="node"><img class="tree_icon add-icon" src="https://backoffice.infinitemlmsoftware.com/backoffice/public_html/images/tree/add.png" onclick="goToLink(&quot;https://backoffice.infinitemlmsoftware.com/backoffice/register/user_register/p1U___zk32t7THF_VeCI8F9lfquv2vgB4GH7veIHSg1x1EGwMJulQQi.j_GuZ68LdUmZsqEWrN871iUjRbFuqw--/1&quot;);">
                                                                <br>
                                                                <p class="demo_name_style_blue add-btn">ADD HERE</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>


                         <td class="node-container" colspan="2">
                            <table id="tree_div" cellpadding="0" cellspacing="0" border="0" align="center">
                                <tbody>
                                    <tr class="node-cells">
                                        <td class="node-cell" colspan="2">
                                            <div class="node" style="cursor: default;"><img class="tree_icon with_tooltip " src="<?= base_url(); ?>assets/site_img/network.jpg" onclick="getGenologyTree(&quot;DEMO27W&quot;,event);" data-tooltip-content="#user_DEMO27W">
                                                <p class="demo_name_style">DEMO27W</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="line down"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="line left">&nbsp;</td>
                                        <td class="line right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="node-container" colspan="2">
                                            <table id="tree_div" cellpadding="0" cellspacing="0" border="0" align="center">
                                                <tbody>
                                                    <tr class="node-cells">
                                                        <td class="node-cell" colspan="2">
                                                            <div class="node"><img class="tree_icon add-icon" src="https://backoffice.infinitemlmsoftware.com/backoffice/public_html/images/tree/add.png" onclick="goToLink(&quot;https://backoffice.infinitemlmsoftware.com/backoffice/register/user_register/p1U___zk32t7THF_VeCI8F9lfquv2vgB4GH7veIHSg1x1EGwMJulQQi.j_GuZ68LdUmZsqEWrN871iUjRbFuqw--/1&quot;);">
                                                                <br>
                                                                <p class="demo_name_style_blue add-btn">ADD HERE</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>


                      
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



     </div>
 </div>


