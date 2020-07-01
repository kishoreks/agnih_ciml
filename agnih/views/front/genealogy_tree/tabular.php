 <style>
     .tree, .tree ul {
    margin:0;
    padding:0;
    list-style:none
}
.tree ul {
    margin-left:1em;
    position:relative
}
.tree ul ul {
    margin-left:.5em
}
.tree ul:before {
    content:"";
    display:block;
    width:0;
    position:absolute;
    top:0;
    bottom:0;
    left:0;
    border-left:1px solid
}
.tree li {
    margin:0;
    padding:0 1em;
    line-height:2em;
    color:#369;
    font-weight:700;
    position:relative
}
.tree ul li:before {
    content:"";
    display:block;
    width:10px;
    height:0;
    border-top:1px solid;
    margin-top:-1px;
    position:absolute;
    top:1em;
    left:0
}
.tree ul li:last-child:before {
    background:#fff;
    height:auto;
    top:1em;
    bottom:0
}
.indicator {
    margin-right:5px;
}
.tree li a {
    text-decoration: none;
    color:#369;
}
.tree li button, .tree li button:active, .tree li button:focus {
    text-decoration: none;
    color:#369;
    border:none;
    background:transparent;
    margin:0px 0px 0px 0px;
    padding:0px 0px 0px 0px;
    outline: 0;
}
 </style>

 <div class="row">
        <div class="col-md-12">
            <ul id="tree1">
             
                <li><a href="#"><?= $sponsor['profile_id']; ?> /<?= $sponsor['username']; ?></a>

                    <ul>
                       
                       <?php foreach ($memberlist as $level_one): ?>
                           <li><a href="<?= base_url(); ?>home/genealogy_tree/tabular/<?= $level_one['sponsor_id']; ?>"><?= $level_one['profile_id']; ?></a> / <?= $this->Crud_model->get_type_name_by_id('sponsor', $level_one['sponsor_id'], 'username'); ?> 
                               
                               <ul>
                                <li>
                                    <?php foreach ($level_one['L_1'] as $two): ?>
                                         <ul>
                                            <li><?= $two['profile_id']; ?> / <?= $this->Crud_model->get_type_name_by_id('sponsor', $two['sponsor_id'], 'username'); ?>
                                                
                                                <?php foreach ($two['L_2'] as $three): ?>

                                                    <ul>
                                                        <li>
                                                            <?= $three['profile_id']; ?> / <?= $this->Crud_model->get_type_name_by_id('sponsor', $three['sponsor_id'], 'username'); ?>

                                                            <?php foreach ($three['L_3'] as $four): ?>

                                                                <ul>
                                                                    <li><?= $four['profile_id']; ?> / <?= $this->Crud_model->get_type_name_by_id('sponsor', $four['sponsor_id'], 'username'); ?>

                                                                     <?php foreach ($four['L_4'] as $five): ?>

                                                                        <ul>
                                                                            <li><?= $five['profile_id']; ?> / <?= $this->Crud_model->get_type_name_by_id('sponsor', $five['sponsor_id'], 'username'); ?>
                                                                                
                                                                                <?php foreach ($five['L_5'] as $six): ?>
                                                                                    <ul>
                                                                                        <li><?= $six['profile_id']; ?> / <?= $this->Crud_model->get_type_name_by_id('sponsor', $six['sponsor_id'], 'username'); ?>
                                                                                            <?php foreach ($six['L_6'] as $seven): ?>
                                                                                                <ul>
                                                                                                    <li><?= $seven['profile_id']; ?> / <?= $this->Crud_model->get_type_name_by_id('sponsor', $seven['sponsor_id'], 'username'); ?></li>
                                                                                                </ul>
                                                                                            <?php endforeach ?>
                                                                                        </li>
                                                                                    </ul>
                                                                                <?php endforeach ?>
                                                                            </li>
                                                                        </ul>
                                                                         
                                                                     <?php endforeach ?>
                                                                        
                                                                    </li>
                                                                </ul>
                                                                
                                                            <?php endforeach ?>
                                                        </li>
                                                    </ul>
                                                    
                                                <?php endforeach ?>

                                            </li>
                                         </ul>
                                    <?php endforeach ?>
                                </li>
                            </ul>

                           </li>
                            
                       <?php endforeach ?>

                    </ul>
                </li>
                
            </ul>
        </div>
              
    </div>

<!-- <ul>
    <li>Company Maintenance</li>
    <li>Employees
        <ul>
            <li>Reports
                <ul>
                    <li>Report1</li>
                    <li>Report2</li>
                    <li>Report3</li>
                </ul>
            </li>
            <li>Employee Maint.</li>
        </ul>
    </li>
    <li>Human Resources</li>
</ul> -->

<script>
    $.fn.extend({
    treed: function (o) {
      
      var openedClass = 'dashicons dashicons-arrow-down';
      var closedClass = 'dashicons dashicons-arrow-right';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class=' " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
      });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});

//Initialization of treeviews

$('#tree1').treed();

$('#tree2').treed({openedClass:'glyphicon-folder-open', closedClass:'glyphicon-folder-close'});

$('#tree3').treed({openedClass:'glyphicon-chevron-right', closedClass:'glyphicon-chevron-down'});

</script>
