<div class="row">

    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">mobile No</h4>
                </div>
            </div>
            <div class="card-body">
                <form class="form-inline">

                      <?php
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );

                       ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" id="input" class="form-control" value="<?=$csrf['hash'];?>">

                    <div class="form-group mx-sm-2 mb-2">
                        <label for="inputPassword2" class="sr-only">Mobile No<i class="text-danger">*</i></label>
                        <input type="text" class="form-control" id="inputPassword2" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </form>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-12">
        <h4>User Overview</h4>
    </div>

</div>


<div class="row widget-social">

    <div class="card-body">

        <div class="row">



            <div class="col-xl-3 col-md-5">
                <div class="card card-statistics widget-social-box3">
                    <div class="card-body p-0">
                        <div class="text-center widget-social-contant py-2">

                            <div class="mt-3">
                                <h4 class="mb-1"><i class="fa fa-address-book-o f-30"></i></h4>
                                <p class="mb-0"><a class="text-white" href="javascript:void(0)">Profile</a></p>
                            </div>
                        </div>
                        <ul class="nav justify-content-between text-center px-4 py-4">
                            <li class="flex-fill">
                                <h5 class="mb-0"><a href="">Profile</a></h5>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-5">
                <div class="card card-statistics widget-social-box3">
                    <div class="card-body p-0">
                        <div class="text-center widget-social-contant py-2">

                            <div class="mt-3">
                                <h4 class="mb-1"><i class="fa fa-money f-30"></i></h4>
                                <p class="mb-0"><a class="text-white" href="javascript:void(0)">User Earnings</a></p>
                            </div>
                        </div>
                        <ul class="nav justify-content-between text-center px-4 py-4">
                            <li class="flex-fill">
                                <h5 class="mb-0"><a href="">User Earnings</a></h5>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-5">
                <div class="card card-statistics widget-social-box3">
                    <div class="card-body p-0">
                        <div class="text-center widget-social-contant py-2">

                            <div class="mt-3">
                                <h4 class="mb-1"><i class="fa fa-user-circle-o f-30"></i></h4>
                                <p class="mb-0"><a class="text-white" href="javascript:void(0)">Referrals</a></p>
                            </div>
                        </div>
                        <ul class="nav justify-content-between text-center px-4 py-4">
                            <li class="flex-fill">
                                <h5 class="mb-0"><a href="">Referrals</a></h5>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-5">
                <div class="card card-statistics widget-social-box3">
                    <div class="card-body p-0">
                        <div class="text-center widget-social-contant py-2">

                            <div class="mt-3">
                                <h4 class="mb-1"><i class="fa fa-sitemap f-30"></i></h4>
                                <p class="mb-0"><a class="text-white" href="javascript:void(0)">Binary Details</a></p>
                            </div>
                        </div>
                        <ul class="nav justify-content-between text-center px-4 py-4">
                            <li class="flex-fill">
                                <h5 class="mb-0"><a href="">Binary Details</a></h5>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-5">
                <div class="card card-statistics widget-social-box3">
                    <div class="card-body p-0">
                        <div class="text-center widget-social-contant py-2">

                            <div class="mt-3">
                                <h4 class="mb-1"><i class="fa fa-briefcase f-30"></i></h4>
                                <p class="mb-0"><a class="text-white" href="javascript:void(0)">Ewallet</a></p>
                            </div>
                        </div>
                        <ul class="nav justify-content-between text-center px-4 py-4">
                            <li class="flex-fill">
                                <h5 class="mb-0"><a href="">Ewallet</a></h5>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-5">
                <div class="card card-statistics widget-social-box3">
                    <div class="card-body p-0">
                        <div class="text-center widget-social-contant py-2">

                            <div class="mt-3">
                                <h4 class="mb-1"><i class="fa fa-money f-30"></i></h4>
                                <p class="mb-0"><a class="text-white" href="javascript:void(0)">Released Income</a></p>
                            </div>
                        </div>
                        <ul class="nav justify-content-between text-center px-4 py-4">
                            <li class="flex-fill">
                                <h5 class="mb-0"><a href="">Released Income</a></h5>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-5">
                <div class="card card-statistics widget-social-box3">
                    <div class="card-body p-0">
                        <div class="text-center widget-social-contant py-2">

                            <div class="mt-3">
                                <h4 class="mb-1"><i class="fa fa-tint f-30"></i></h4>
                                <p class="mb-0"><a class="text-white" href="javascript:void(0)">Business Volume</a></p>
                            </div>
                        </div>
                        <ul class="nav justify-content-between text-center px-4 py-4">
                            <li class="flex-fill">
                                <h5 class="mb-0"><a href="">Business Volume</a></h5>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-5">
                <div class="card card-statistics widget-social-box3">
                    <div class="card-body p-0">
                        <div class="text-center widget-social-contant py-2">

                            <div class="mt-3">
                                <h4 class="mb-1"><i class="fa fa-address-book-o f-30"></i></h4>
                                <p class="mb-0"><a class="text-white" href="javascript:void(0)">Profile</a></p>
                            </div>
                        </div>
                        <ul class="nav justify-content-between text-center px-4 py-4">
                            <li class="flex-fill">
                                <h5 class="mb-0"><a href="">Profile</a></h5>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>