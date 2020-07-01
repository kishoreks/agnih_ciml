 <div class="row account-contant">
    <div class="col-12">
        <div class="card card-statistics">
            <div class="card-body p-0">
                <div class="row no-gutters">                   
                    <div class="col-xl-12 col-md-6 border-t col-12">
                         <div class="form-titel border-bottom p-3">
                                <h5 class="mb-0 py-2">Manage categories</h5>
                          </div>
                    </div>

                    <div class="col-xl-12 col-md-6 border-t col-12 ">
                        <div class="col-md-12">
                                <div class="card card-statistics">
                                    <form method="post" action="<?= base_url(); ?>home/tickets/category/edit/<?= $get_department->department_id; ?>">
                                          <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">
                                    <div class="card-body">
                                          <div class="form-group row">
                                             <div class="col-sm-4">
                                                 <input type="text" class="form-control" id="name" name="name"  value="<?= $get_department->name; ?>">
                                                 <?= form_error('name' , '<div class="text-danger">', '</div>');  ?>
                                             </div>
                                           
                                              <div class="col-sm-2">
                                                 <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                                             </div>
                                         </div>

                                       
                                            
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                   
                     <div class="col-xl-12 col-md-6 border-t col-12 mb-5 p-4">
                         <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead class="thead-dark">
                                   
                                        <tr>
                                            
                                            <th scope="col">Category name</th>
                                            <th scope="col">Graph</th>
                                            <th scope="col">Options</th>
                                        </tr>
                                    
                                </thead>
                                <tbody>

                                     <?php foreach ($department as $key): ?>
                                    <tr>
                                       
                                        <td><?= $key->name; ?></td>
                                        <td>
                                            <div class="progress">
                                               <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                            </div>
                                       </td>
                                        <td class="text-center">
                                            <a href="<?= base_url(); ?>home/tickets/category/edit/<?= $key->department_id; ?>"><i class="fa fa-edit text-primary text-center"></i></a> &nbsp;
                                            <a href="<?= base_url(); ?>home/tickets/category/delete/<?= $key->department_id; ?>"><i class="fa fa-trash-o text-danger text-center"></i></a>
                                        </td>
                                    </tr>

                                    <?php endforeach ?>
                                   
                                </tbody>
                            </table>
                        </div>
                     </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!--mail-Compose-contant-end-->