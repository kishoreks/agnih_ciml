<!-- <link href="https://unpkg.com/treeflex/dist/css/treeflex.css" rel="stylesheet"> -->
<link href="<?= base_url(); ?>assets/css/tree.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/css/tree_tooltip.css" rel="stylesheet">
<style>
	.tf-tree .tf-nc, .tf-tree .tf-node-content {
    /* border: .0625em solid #000; */
   border:none;
}
</style>
<?php 

  $sub_children = $this->db->get_where('sponsor_tree', array('parent_id' => $g_tree->sponsor_id))->result();

 ?>

 <div class="row">
     <div class="col-md-12">


<div class="tf-tree example">
    <div id="tree" class="orgChart" style="transform: matrix(1, 0, 0, 1, 0, 0); transform-origin: 50% 50%;">
        <div class="jOrgChart">
            <table id="tree_div" cellpadding="0" cellspacing="0" border="0" align="center">
                <tbody>
                    <tr class="node-cells">
                        <td class="node-cell" colspan="10">
                            <div class="node" style="cursor: default;">
                                <img class="tree_icon with_tooltip root_node tooltipstered" src="https://backoffice.infinitemlmsoftware.com/backoffice/public_html/images/tree/active.png" onclick="getGenologyTree(&quot;matrixdemo&quot;,event);" data-tooltip-content="#user_matrixdemo">

                                <p class="demo_name_style">matrixdemo</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10">
                            <div class="line down"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="line left">&nbsp;</td>
                        <td class="line right top">&nbsp;</td>
                        <td class="line left top">&nbsp;</td>
                        <td class="line right top">&nbsp;</td>
                        <td class="line left top">&nbsp;</td>
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
                                        <td class="node-cell" colspan="4">
                                            <div class="node" style="cursor: default;"><img class="tree_icon with_tooltip " src="https://backoffice.infinitemlmsoftware.com/backoffice/public_html/images/tree/active.png" onclick="getGenologyTree(&quot;INF823741&quot;,event);" data-tooltip-content="#user_INF823741">
                                                <p class="demo_name_style">INF823741</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div class="line down"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="line left">&nbsp;</td>
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
                                                            <div class="node" style="cursor: default;"><img class="tree_icon with_tooltip " src="https://backoffice.infinitemlmsoftware.com/backoffice/public_html/images/tree/active.png" onclick="getGenologyTree(&quot;DEMOTOS&quot;,event);" data-tooltip-content="#user_DEMOTOS">
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
                                                                            <div class="node"><img class="tree_icon add-icon" src="https://backoffice.infinitemlmsoftware.com/backoffice/public_html/images/tree/add.png" onclick="goToLink(&quot;https://backoffice.infinitemlmsoftware.com/backoffice/register/user_register/PdEYyAAfQEOkRB3BMiifVLIlMwpxQBtTSad.6a2.NNoXOJcIepK7CN0i.FPDyR39Mq.mgd42eCskrI5bwhVG6Q--/1&quot;);">
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
                                                            <div class="node"><img class="tree_icon add-icon" src="https://backoffice.infinitemlmsoftware.com/backoffice/public_html/images/tree/add.png" onclick="goToLink(&quot;https://backoffice.infinitemlmsoftware.com/backoffice/register/user_register/B1mQHLJYXOh6J1ZBq9knNb.G7IP7DTHDLfHsBB0EfFFWGUlxcMJQTJI4LcwGtNWIRiPZzFaVc1CmNBsNf4E4dQ--/2&quot;);">
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
                                            <div class="node" style="cursor: default;"><img class="tree_icon with_tooltip " src="https://backoffice.infinitemlmsoftware.com/backoffice/public_html/images/tree/active.png" onclick="getGenologyTree(&quot;DEMO1K8&quot;,event);" data-tooltip-content="#user_DEMO1K8">
                                                <p class="demo_name_style">DEMO1K8</p>
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
                                                            <div class="node"><img class="tree_icon add-icon" src="https://backoffice.infinitemlmsoftware.com/backoffice/public_html/images/tree/add.png" onclick="goToLink(&quot;https://backoffice.infinitemlmsoftware.com/backoffice/register/user_register/WBQxog3AkaX2zZy5k4vOM4wGm8VeCZC4nOf4rdODaBsNnEG3iPCWSUumnhJpSJCNTwG4RosR6_mrohMH8e3UcQ--/1&quot;);">
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
                                            <div class="node" style="cursor: default;"><img class="tree_icon with_tooltip " src="https://backoffice.infinitemlmsoftware.com/backoffice/public_html/images/tree/active.png" onclick="getGenologyTree(&quot;DEMO78F&quot;,event);" data-tooltip-content="#user_DEMO78F">
                                                <p class="demo_name_style">DEMO78F</p>
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
                                                            <div class="node"><img class="tree_icon add-icon" src="https://backoffice.infinitemlmsoftware.com/backoffice/public_html/images/tree/add.png" onclick="goToLink(&quot;https://backoffice.infinitemlmsoftware.com/backoffice/register/user_register/jLhPipaaYFTC_PojcF.7GP.RUVoP37yuhUt6MOPDcGdu.QUz090yZne2tfDOZCu5OFs2Pix1pAj32jOPtVV2MA--/1&quot;);">
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
                                            <div class="node" style="cursor: default;"><img class="tree_icon with_tooltip  tooltipstered" src="https://backoffice.infinitemlmsoftware.com/backoffice/public_html/images/tree/active.png" onclick="getGenologyTree(&quot;DEMOFAY&quot;,event);" data-tooltip-content="#user_DEMOFAY">
                                                <p class="demo_name_style">DEMOFAY</p>
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
                                                            <div class="node"><img class="tree_icon add-icon" src="https://backoffice.infinitemlmsoftware.com/backoffice/public_html/images/tree/add.png" onclick="goToLink(&quot;https://backoffice.infinitemlmsoftware.com/backoffice/register/user_register/YK87OVri8i6CtQYzXTxtmwBv5nZ56iKC39silYsHU4y0eB3Mb2tnv.gvfp97RoNFAz8afadnruDtA.eb789pcA--/1&quot;);">
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
                                            <div class="node"><img class="tree_icon add-icon" src="https://backoffice.infinitemlmsoftware.com/backoffice/public_html/images/tree/add.png" onclick="goToLink(&quot;https://backoffice.infinitemlmsoftware.com/backoffice/register/user_register/3ZfIKBSRyT_mr0zXTgJQypRzUJ3j2DSMBxnA_o4Muxnc8DJ53GvAGLikjt5ruTyCNla28yH8BmKAwL1JastZvw--/5&quot;);">
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
        </div>
    </div>
</div>


     </div>
 </div>



<div class="row">
    <div class="col-md-12">
        
        <div class="tf-tree example">
            <ul>
              
                        <li>
                        	<?= $count_children; ?>
                            <span class="tf-nc"><a href="<?= base_url(); ?>home/genealogy_tree/tree/<?=$g_tree->sponsor_id?>"><img src="<?= base_url(); ?>assets/site_img/nophoto.jpg" class="img-responsive" alt="Image" style="width: 50px;"> </a>
                                
                            </span>
                            <ul>
                                <?php foreach ($sub_children as $childrens): ?>
                                	 <li><span class="tf-nc"><a href="<?= base_url(); ?>home/genealogy_tree/tree/<?= $childrens->sponsor_id; ?>"><img src="<?= base_url(); ?>assets/site_img/nophoto.jpg" class="img-responsive" alt="Image" style="width: 50px;"></a></span> 
                                       
                                    <ul>
                                        <li><span class="tf-nc">4</span>
                                             
                                          

                                        </li>
                                        <li><span class="tf-nc">8</span>
                                           
                                        </li>
                                        <li><span class="tf-nc">12</span>
                                               
                                              
                                        </li>
                                    </ul>

                                	 </li>
                                <?php endforeach ?>
                                                               
                            </ul>
                        </li>
                   
            </ul>
        </div>


    </div>
</div>