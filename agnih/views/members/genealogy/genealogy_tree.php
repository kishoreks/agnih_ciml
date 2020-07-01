<!-- <link href="https://unpkg.com/treeflex/dist/css/treeflex.css" rel="stylesheet"> -->
<link href="<?= base_url(); ?>assets/css/tree.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/css/tree_tooltip.css" rel="stylesheet">
<script src="<?= base_url(); ?>assets/js/jquery.tree.js"></script>
<script src="<?= base_url(); ?>assets/js/genealogy.js"></script>
<script src="https://balkangraph.com/js/latest/OrgChart.js"></script>
<style>
	.tf-tree .tf-nc, .tf-tree .tf-node-content {
    /* border: .0625em solid #000; */
   border:none;
}
.modal-backdrop.show {
    opacity: .5;
    display: none;
}

#tree{
  width:100%;
  height:100%;
}

.field_0 a:visited, .field_0 a {
  fill: #FFFFFF!important;
}

.field_0 a:hover {
    fill: #FFFFFF!important;
}

</style> 


<div class="row">	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		 <div id="tree"/> 	 		
	</div>
</div>

 
<script>
    
window.onload = function () {
    var chart = new OrgChart(document.getElementById("tree"), {
        template: "isla",
        layout: OrgChart.mixed,
        nodeBinding: {
            // field_0: "name",
            // field_1: "title",
           

            field_0: function (sender, node) {
                        var data = sender.get(node.id);
                        var name = data["name"];
                        var link = data["link"];
                        return '<a style="color:#fff" href="' + link + '">' + name + '</a>'
            },
             img_0: "img",
             field_1: "title"                        
        },
        nodes: [

            { id: "<?= $sponsor['sponsor_id']; ?>", name: "<?= $sponsor['profile_id']; ?>", title: "<?= $sponsor['username']; ?>", email: "<?= $sponsor['email']; ?>", 

            img: 
               <?php $profile_image = json_decode($sponsor['profile_image']); ?>
               <?php if ($profile_image == true): ?>
               	"<?= base_url(); ?>uploads/profile_image/<?= $profile_image[0]->thumb; ?>" 
               <?php else: ?>
               	"<?= base_url(); ?>uploads/profile_image/<?= $profile_image[0]->thumb; ?>" 
               <?php endif ?>
            
            , link: "<?= base_url(); ?>members/genealogy/genealogy_tree/<?= $sponsor['sponsor_id']; ?>"},

             <?php foreach ($memberlist as $level_one): ?>

             	{ id: "<?= $level_one['member_id']; ?>", pid: "<?= $level_one['parent_id']; ?>", name: "<?= $level_one['profile_id']; ?>", title: "<?= $this->Crud_model->get_type_name_by_id('sponsor', $level_one['sponsor_id'], 'username'); ?> [<?= $this->db->get_where('sponsor_tree' , array('sponsor_tree_id >' => $level_one['sponsor_tree_id']))->num_rows() ?>]", email: "<?= $this->Crud_model->get_type_name_by_id('sponsor', $level_one['sponsor_id'], 'email'); ?>", img: "<?= base_url(); ?>assets/site_img/network.jpg" , link:"<?= base_url(); ?>members/genealogy/genealogy_tree/<?= $level_one['sponsor_id']; ?>" },

             	  <?php foreach ($level_one['L_1'] as $two): ?>
             	  	{ id: "<?= $two['member_id']; ?>", pid: "<?= $two['parent_id']; ?>", name: "<?= $two['profile_id']; ?>", title: "<?= $this->Crud_model->get_type_name_by_id('sponsor', $two['sponsor_id'], 'username'); ?> [<?= $this->db->get_where('sponsor_tree' , array('sponsor_tree_id >' => $two['sponsor_tree_id']))->num_rows() ?>]", email: "<?= $this->Crud_model->get_type_name_by_id('sponsor', $two['sponsor_id'], 'email'); ?>", img: "<?= base_url(); ?>assets/site_img/network.jpg", link:"<?= base_url(); ?>members/genealogy/genealogy_tree/<?= $two['sponsor_id']; ?>"},

             	  	   <?php foreach ($two['L_2'] as $three): ?>
             	  	     { id: "<?= $three['member_id']; ?>", pid: "<?= $three['parent_id']; ?>", name: "<?= $three['profile_id']; ?>", title: "<?= $this->Crud_model->get_type_name_by_id('sponsor', $three['sponsor_id'], 'username'); ?> [<?= $this->db->get_where('sponsor_tree' , array('sponsor_tree_id >' => $three['sponsor_tree_id']))->num_rows() ?>]", email: "<?= $this->Crud_model->get_type_name_by_id('sponsor', $three['sponsor_id'], 'email'); ?>", img: "<?= base_url(); ?>assets/site_img/network.jpg", link:"<?= base_url(); ?>members/genealogy/genealogy_tree/<?= $three['sponsor_id']; ?>"},
                         
                          <?php foreach ($three['L_3'] as $four): ?>
                          	  { id: "<?= $four['member_id']; ?>", pid: "<?= $four['parent_id']; ?>", name: "<?= $four['profile_id']; ?>", title: "<?= $this->Crud_model->get_type_name_by_id('sponsor', $four['sponsor_id'], 'username'); ?> [<?= $this->db->get_where('sponsor_tree' , array('sponsor_tree_id >' => $four['sponsor_tree_id']))->num_rows() ?>]", email: "<?= $this->Crud_model->get_type_name_by_id('sponsor', $four['sponsor_id'], 'email'); ?>", img: "<?= base_url(); ?>assets/site_img/network.jpg", link:"<?= base_url(); ?>members/genealogy/genealogy_tree/<?= $four['sponsor_id']; ?>"},
                                
                                <?php foreach ($four['L_4'] as $five): ?>
                                	{ id: "<?= $five['member_id']; ?>", pid: "<?= $five['parent_id']; ?>", name: "<?= $five['profile_id']; ?>", title: "<?= $this->Crud_model->get_type_name_by_id('sponsor', $five['sponsor_id'], 'username'); ?> [<?= $this->db->get_where('sponsor_tree' , array('sponsor_tree_id >' => $five['sponsor_tree_id']))->num_rows() ?>]", email: "<?= $this->Crud_model->get_type_name_by_id('sponsor', $five['sponsor_id'], 'email'); ?>", img: "<?= base_url(); ?>assets/site_img/network.jpg", link:"<?= base_url(); ?>members/genealogy/genealogy_tree/<?= $five['sponsor_id']; ?>"},
                                   
                                   <?php foreach ($five['L_5'] as $six): ?>
                                   	     { id: "<?= $six['member_id']; ?>", pid: "<?= $six['parent_id']; ?>", name: "<?= $six['profile_id']; ?>", title: "<?= $this->Crud_model->get_type_name_by_id('sponsor', $six['sponsor_id'], 'username'); ?> [<?= $this->db->get_where('sponsor_tree' , array('sponsor_tree_id >' => $six['sponsor_tree_id']))->num_rows() ?>]", email: "<?= $this->Crud_model->get_type_name_by_id('sponsor', $six['sponsor_id'], 'email'); ?>", img: "<?= base_url(); ?>assets/site_img/network.jpg", link:"<?= base_url(); ?>members/genealogy/genealogy_tree/<?= $six['sponsor_id']; ?>"},
                                         
                                         <?php foreach ($six['L_6'] as $seven): ?>
                                         	 { id: "<?= $seven['member_id']; ?>", pid: "<?= $seven['parent_id']; ?>", name: "<?= $seven['profile_id']; ?>", title: "<?= $this->Crud_model->get_type_name_by_id('sponsor', $seven['sponsor_id'], 'username'); ?> [<?= $this->db->get_where('sponsor_tree' , array('sponsor_tree_id >' => $seven['sponsor_tree_id']))->num_rows() ?>]", email: "<?= $this->Crud_model->get_type_name_by_id('sponsor', $seven['sponsor_id'], 'email'); ?>", img: "<?= base_url(); ?>assets/site_img/network.jpg", link:"<?= base_url(); ?>members/genealogy/genealogy_tree/<?= $seven['sponsor_id']; ?>"},
                                         <?php endforeach ?>

                                   <?php endforeach ?>

                                <?php endforeach ?>

                          <?php endforeach ?>

             	       <?php endforeach ?>

             	  <?php endforeach ?>
             	 
             <?php endforeach ?>
             
            
            // { id: "67", pid: "66", name: "Lexie Cole", title: "66", email: "ava@domain.com", img: "https://balkangraph.com/js/img/2.jpg" },
            // { id: "68", pid: "66", name: "Janae Barrett", title: "66", img: "https://balkangraph.com/js/img/3.jpg" },
            // { id: "69", pid: "68", name: "Aaliyah Webb", title: "68", email: "jay@domain.com", img: "https://balkangraph.com/js/img/4.jpg" },
            // { id: "70", pid: "68", name: "Aaliyah Webb", title: "68", email: "jay@domain.com", img: "https://balkangraph.com/js/img/4.jpg" },
            // { id: "71", pid: "70", name: "Aaliyah Webb", title: "70", email: "jay@domain.com", img: "https://balkangraph.com/js/img/4.jpg" },
            // { id: "5", pid: "2", name: "Elliot Ross", title: "QA", img: "https://balkangraph.com/js/img/5.jpg" },
            // { id: "6", pid: "2", name: "Anahi Gordon", title: "QA", img: "https://balkangraph.com/js/img/6.jpg" },
            // { id: "7", pid: "2", name: "Knox Macias", title: "QA", img: "https://balkangraph.com/js/img/7.jpg" },
            // { id: "8", pid: "3", name: "Nash Ingram", title: ".NET Team Lead", email: "kohen@domain.com", img: "https://balkangraph.com/js/img/8.jpg" },
            // { id: "9", pid: "3", name: "Sage Barnett", title: "JS Team Lead", img: "https://balkangraph.com/js/img/9.jpg" },
            // { id: "10", pid: "8", name: "Alice Gray", title: "Programmer", img: "https://balkangraph.com/js/img/10.jpg" },
            // { id: "11", pid: "8", name: "Anne Ewing", title: "Programmer", img: "https://balkangraph.com/js/img/11.jpg" },
            // { id: "12", pid: "9", name: "Reuben Mcleod", title: "Programmer", img: "https://balkangraph.com/js/img/12.jpg" },
            // { id: "13", pid: "9", name: "Ariel Wiley", title: "Programmer", img: "https://balkangraph.com/js/img/13.jpg" },
            // { id: "14", pid: "4", name: "Lucas West", title: "Marketer", img: "https://balkangraph.com/js/img/14.jpg" },
            // { id: "15", pid: "4", name: "Adan Travis", title: "Designer", img: "https://balkangraph.com/js/img/15.jpg" },
            // { id: "16", pid: "4", name: "Alex Snider", title: "Sales Manager", img: "https://balkangraph.com/js/img/16.jpg" }
        ]
    });
    document.getElementById("selectTemplate").addEventListener("change", function () {
        chart.config.template = this.value;
        chart.draw();
    });
}


    </script>