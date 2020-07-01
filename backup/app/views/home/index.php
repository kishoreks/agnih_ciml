<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Tettram – Investment Website HTML Templates </title>
        <!-- favicon -->
        <?php include 'includes/top/style.php'; ?>
    </head>

  
    <body>
        <!-- preloader begin-->
        <div class="preloader">
            <div class='loader'>
                <div class='loader--dot'></div>
                <div class='loader--dot'></div>
                <div class='loader--dot'></div>
                <div class='loader--dot'></div>
                <div class='loader--dot'></div>
                <div class='loader--dot'></div>
                <div class='loader--text'></div>
            </div>
        </div>
        <!-- preloader end -->

        <!-- header begin-->
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="row justify-content-between d-flex">
                        <div class="col-xl-6 col-lg-6 d-flex align-items-center">
                            <div class="support-bar">
                                <ul>
                                    <li><span class="icon"><i class="fas fa-globe-africa"></i></span>Language: <span>
                                        <select>
                                            <option>English</option>
                                            <option>Bangla</option>
                                            <option>Arabic</option>
                                        </select>
                                    </span></li>
                                    <li><span class="icon"><i class="fas fa-envelope"></i></span>hello@gmail.com</li>
                                    <li><span class="icon"><i class="fas fa-phone"></i></span>3333 222 1111</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-xl-2 col-lg-2 col-12 d-block d-xl-flex d-lg-flex align-items-center">
                            <div class="mobile-special">
                                <div class="row d-flex">
                                    <div class="col-6 col-xl-12 col-lg-12 d-flex align-items-center">
                                        <div class="logo">
                                            <a href="index.html">
                                                <img src="<?= base_url(); ?>assets/site/assets/img/logo.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-6 d-block d-xl-none d-lg-none">
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="mainmenu">
                                <nav class="navbar navbar-expand-lg">
                                
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav mr-auto justify-content-center">
                                            <li class="nav-item active">
                                                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="about.html">About</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="investment.html">Investment Plan</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="faq.html">FAQ</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Blog
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="blog.html">Blog</a>
                                                    <a class="dropdown-item" href="blog-details.html">Blog Details</a>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="contact.html">Contact</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 d-flex align-items-center">
                            <div class="join-us">
                                <a href="login.html">Join Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->


        <!-- banner begin-->
        <div class="banner">
            <div class="banner-content">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-6 col-lg-9 d-flex align-items-center">
                            <div class="part-text">
                                <h1>IntellIgent plan<br/> for your money</h1>
                                <p>Put your investing ideas into action with full range of investments.
                                    Enjoy real benefits and rewards on your accrue investing.</p>
                                <a href="#">Start Now</a>
                                <a href="#">View Plan</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="part-img">
                                <img src="<?= base_url(); ?>assets/site/assets/img/banner-Illustration.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner end -->

        <!-- counter begin-->
        <div class="counter">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-xl-4 col-lg-4 col-md-6 d-flex align-items-center">
                        <div class="single-counter">
                            <div class="part-icon">
                                <i class="flaticon-group"></i>
                            </div>
                            <div class="part-text">
                                <h3 class="count-num">50,236</h3>
                                <h4>Total Member</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-counter">
                            <div class="part-icon">
                                <i class="flaticon-money"></i>
                            </div>
                            <div class="part-text">
                                <h3 class="count-num">50,236</h3>
                                <h4>Total Deposited</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 d-flex align-items-center">
                        <div class="single-counter">
                            <div class="part-icon">
                                <i class="flaticon-hand"></i>
                            </div>
                            <div class="part-text">
                                <h3 class="count-num">50,236</h3>
                                <h4>Total Profit</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- counter end -->

        <!-- about begin -->
        <div class="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title">
                            <h2>About Tettram</h2>
                            <p>We bring the right people together to challenge established thinking and drive transformation.
                                We will show the way to successive.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single-about">
                            <div class="heading">
                                <div class="part-icon">
                                    <i class="flaticon-brain"></i>
                                </div>
                                <div class="part-text">
                                    <h3>We Innovate</h3>
                                </div>
                            </div>
                            <p>We innovate systematic, continuously and success
                            innovate system, That continuously done.</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single-about">
                            <div class="heading">
                                <div class="part-icon">
                                    <i class="flaticon-patent"></i>
                                </div>
                                <div class="part-text">
                                    <h3>Licensed & Certified</h3>
                                </div>
                            </div>
                            <p>We innovate systematic, continuously and success
                            innovate system, That continuously done.</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                    
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single-about">
                            <div class="heading">
                                <div class="part-icon">
                                    <i class="flaticon-reward"></i>
                                </div>
                                <div class="part-text">
                                    <h3>We are Professional</h3>
                                </div>
                            </div>
                            <p>We innovate systematic, continuously and success
                            innovate system, That continuously done.</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single-about">
                            <div class="heading">
                                <div class="part-icon">
                                    <i class="flaticon-donation"></i>
                                </div>
                                <div class="part-text">
                                    <h3>Saving & Investments</h3>
                                </div>
                            </div>
                            <p>We innovate systematic, continuously and success
                            innovate system, That continuously done.</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about end -->

        <!-- we think global begin-->
        <div class="we-think-global">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-10">
                        <div class="part-left">
                            <h2>We were always<br/>
                            thinking global Community</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            Ut enim ad minim veniam. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure dolor in voluptate velit
                            esse cillum dolore eu fugiat nulla pariatur.</p>
                            <a href="#">Learn More</a>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-10 d-flex align-items-center">
                        <div class="part-right">
                            <h3>Start Invest Now</h3>
                            <p>Quis nostrud exercitation ullamco laboris nisi utaliquip
                            commodo consequat. Duis aute feeirure dolor voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <a href="#">View Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- we think global end -->

        <!-- choosing resons begin-->
        <div class="choosing-reason">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title">
                            <h2>Why choose us</h2>
                            <p>We bring the right people together to challenge established thinking and drive transformation.
                                We will show the way to successive.</p>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-reason">
                            <div class="part-img">
                                <img src="<?= base_url(); ?>assets/site/assets/img/choose-1.jpg" alt="">
                            </div>
                            <div class="part-text">
                                <h3>Stable & Profitable</h3>
                                <p>Effective business support planning becomes one of the
                                    most critical activities within successful small business
                                    maintenance and development.Accure provides best
                                    affordable plan to earn money.</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-reason">
                            <div class="part-img">
                                <img src="<?= base_url(); ?>assets/site/assets/img/choose-2.jpg" alt="">
                            </div>
                            <div class="part-text">
                                <h3>Instant Withdraw</h3>
                                <p>Effective business support planning becomes one of the
                                    most critical activities within successful small business
                                    maintenance and development.Accure provides best
                                    affordable plan to earn money.</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-reason">
                            <div class="part-img">
                                <img src="<?= base_url(); ?>assets/site/assets/img/choose-3.jpg" alt="">
                            </div>
                            <div class="part-text">
                                <h3>Referral Provides</h3>
                                <p>Effective business support planning becomes one of the
                                    most critical activities within successful small business
                                    maintenance and development.Accure provides best
                                    affordable plan to earn money.</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- choosing resons end -->

        <!-- transaction begin-->
        <div class="transaction">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title text-center">
                            <h2>Latest<span> Transaction</span></h2>
                            <p>Put your investing ideas into action with full range of investments.
                                Enjoy real benefits and rewards on your accrue investing.</p>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="transaction-area">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#deposit" role="tab"
                                        aria-selected="true">Deposit</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#withdraw" role="tab"
                                        aria-selected="false">Withdraw</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="deposit" role="tabpanel" aria-labelledby="home-tab">
        
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Currency</th>
                                                <th scope="col">Deposit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="d-flex">
                                                    <div class="user-img">
                                                        <img src="<?= base_url(); ?>assets/site/assets/img/user-1.jpg" alt="">
                                                    </div>
                                                    <span>Olympia Ripple</span>
                                                </th>
                                                <td>Oct 24,2018</td>
                                                <td>$9,00,000.00</td>
                                                <td>Dollar</td>
                                                <td>001 Days Ago</td>
                                            </tr>
        
                                            <tr>
                                                <th scope="row" class="d-flex">
                                                    <div class="user-img">
                                                        <img src="<?= base_url(); ?>assets/site/assets/img/user-2.jpg" alt="">
                                                    </div>
                                                    <span>Alison Rittichier</span>
                                                </th>
                                                <td>Oct 24,2018</td>
                                                <td>$9,00,000.00</td>
                                                <td>Dollar</td>
                                                <td>001 Days Ago</td>
                                            </tr>
        
                                            <tr>
                                                <th scope="row" class="d-flex">
                                                    <div class="user-img">
                                                        <img src="<?= base_url(); ?>assets/site/assets/img/user-3.jpg" alt="">
                                                    </div>
                                                    <span>Isreal Vandy</span>
                                                </th>
                                                <td>Oct 24,2018</td>
                                                <td>$9,00,000.00</td>
                                                <td>Dollar</td>
                                                <td>001 Days Ago</td>
                                            </tr>
        
                                            <tr>
                                                <th scope="row" class="d-flex">
                                                    <div class="user-img">
                                                        <img src="<?= base_url(); ?>assets/site/assets/img/user-4.jpg" alt="">
                                                    </div>
                                                    <span>Emmett Steinkellner</span>
                                                </th>
                                                <td>Oct 24,2018</td>
                                                <td>$9,00,000.00</td>
                                                <td>Dollar</td>
                                                <td>001 Days Ago</td>
                                            </tr>
        
                                            <tr>
                                                <th scope="row" class="d-flex">
                                                    <div class="user-img">
                                                        <img src="<?= base_url(); ?>assets/site/assets/img/user-5.jpg" alt="">
                                                    </div>
                                                    <span>Nancee Broomes</span>
                                                </th>
                                                <td>Oct 24,2018</td>
                                                <td>$9,00,000.00</td>
                                                <td>Dollar</td>
                                                <td>001 Days Ago</td>
                                            </tr>
                                        </tbody>
                                    </table>
        
                                </div>
                                <div class="tab-pane fade" id="withdraw" role="tabpanel" aria-labelledby="profile-tab">
        
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Currency</th>
                                                <th scope="col">Deposit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="d-flex">
                                                    <div class="user-img">
                                                        <img src="<?= base_url(); ?>assets/site/assets/img/user-1.jpg" alt="">
                                                    </div>
                                                    <span>Olympia Ripple</span>
                                                </th>
                                                <td>Oct 24,2018</td>
                                                <td>$9,00,000.00</td>
                                                <td>Dollar</td>
                                                <td>001 Days Ago</td>
                                            </tr>
        
                                            <tr>
                                                <th scope="row" class="d-flex">
                                                    <div class="user-img">
                                                        <img src="<?= base_url(); ?>assets/site/assets/img/user-2.jpg" alt="">
                                                    </div>
                                                    <span>Alison Rittichier</span>
                                                </th>
                                                <td>Oct 24,2018</td>
                                                <td>$9,00,000.00</td>
                                                <td>Dollar</td>
                                                <td>001 Days Ago</td>
                                            </tr>
        
                                            <tr>
                                                <th scope="row" class="d-flex">
                                                    <div class="user-img">
                                                        <img src="<?= base_url(); ?>assets/site/assets/img/user-3.jpg" alt="">
                                                    </div>
                                                    <span>Isreal Vandy</span>
                                                </th>
                                                <td>Oct 24,2018</td>
                                                <td>$9,00,000.00</td>
                                                <td>Dollar</td>
                                                <td>001 Days Ago</td>
                                            </tr>
        
                                            <tr>
                                                <th scope="row" class="d-flex">
                                                    <div class="user-img">
                                                        <img src="<?= base_url(); ?>assets/site/assets/img/user-4.jpg" alt="">
                                                    </div>
                                                    <span>Emmett Steinkellner</span>
                                                </th>
                                                <td>Oct 24,2018</td>
                                                <td>$9,00,000.00</td>
                                                <td>Dollar</td>
                                                <td>001 Days Ago</td>
                                            </tr>
        
                                            <tr>
                                                <th scope="row" class="d-flex">
                                                    <div class="user-img">
                                                        <img src="<?= base_url(); ?>assets/site/assets/img/user-5.jpg" alt="">
                                                    </div>
                                                    <span>Nancee Broomes</span>
                                                </th>
                                                <td>Oct 24,2018</td>
                                                <td>$9,00,000.00</td>
                                                <td>Dollar</td>
                                                <td>001 Days Ago</td>
                                            </tr>
                                        </tbody>
                                    </table>
        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- transaction end -->

        <!-- payment begin-->
        <div class="payment">
            <div class="container">
                <div class="row d-flex reorder-xs">
        
                    <div class="col-xl-5 co-lg-5 col-md-6">
                        <div class="part-form">
                            <h3>Calculate Your Profit</h3>
                            <form class="payment-form">
                                <div class="form-group">
                                    <label for="InputAmount">Enter Ammount :</label>
                                    <input type="text" class="form-control" id="InputAmount" placeholder="10">
                                </div>
                                <div class="form-group">
                                    <label for="InputTprofit">Total Profit :</label>
                                    <input type="text" class="form-control" id="InputTprofit" placeholder="$15">
                                </div>
                                <div class="form-group">
                                    <label for="InputProfit">Net Profit :</label>
                                    <input type="text" class="form-control" id="InputProfit" placeholder="$05">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-5 col-lg-5 col-md-6 d-flex align-items-center offset-xl-1 offset-lg-1">
                        <div class="row justify-content-center">
                            <div class="col-xl-12 col-lg-12">
                                <div class="section-title">
                                    <h2>We Accepted<br /><span>Payment Method</span></h2>
                                    <p>Put your investing ideas into action with full range of investments.
                                        Enjoy real benefits and rewards on your accrue investing.</p>
                                </div>
                            </div>
                    
                            <div class="col-xl-12 col-lg-12">
                                <div class="part-accept">
                                    <div class="single-accept">
                                        <img src="<?= base_url(); ?>assets/site/assets/img/accept-card-1.jpg" alt="">
                                    </div>
                                    <div class="single-accept">
                                        <img src="<?= base_url(); ?>assets/site/assets/img/accept-card-2.jpg" alt="">
                                    </div>
                                    <div class="single-accept">
                                        <img src="<?= base_url(); ?>assets/site/assets/img/accept-card-3.jpg" alt="">
                                    </div>
                                    <div class="single-accept">
                                        <img src="<?= base_url(); ?>assets/site/assets/img/accept-card-4.jpg" alt="">
                                    </div>
                                </div>
                                <div class="part-accept">
                                    <div class="single-accept">
                                        <img src="<?= base_url(); ?>assets/site/assets/img/accept-card-5.jpg" alt="">
                                    </div>
                                    <div class="single-accept">
                                        <img src="<?= base_url(); ?>assets/site/assets/img/accept-card-6.jpg" alt="">
                                    </div>
                                    <div class="single-accept">
                                        <img src="<?= base_url(); ?>assets/site/assets/img/accept-card-7.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- payment end -->

        <!-- price begin-->
        <div class="price">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="section-title text-center">
                            <h2>Grab our mega package</h2>
                            <p>Put your investing ideas into action with full range of investments.
                                Enjoy real benefits and rewards on your accrue investing.</p>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xl-12 col-lg-12">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="monthly-tab" data-toggle="tab" href="#monthly" role="tab" aria-selected="true">Monthly</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="yearly-tab" data-toggle="tab" href="#yearly" role="tab" aria-selected="false">Yearly</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="single-price">
                                            <div class="part-top">
                                                <h3>Basic Plan</h3>
                                                <h4>5.50%<br /><span>Per Month</span></h4>
                                            </div>
                                            <div class="part-bottom">
                                                <ul>
                                                    <li>Features</li>
                                                    <li>Minimum Deposit $10</li>
                                                    <li>Miximum Deposit $10,000</li>
                                                    <li>Enhanced security</li>
                                                    <li>Access to all features</li>
                                                    <li>24/7Support</li>
                                                </ul>
                                                <a href="#">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="single-price special">
                                            <div class="part-top">
                                                <h3>Basic Plan</h3>
                                                <h4>5.50%<br /><span>Per Month</span></h4>
                                            </div>
                                            <div class="part-bottom">
                                                <ul>
                                                    <li>Features</li>
                                                    <li>Minimum Deposit $10</li>
                                                    <li>Miximum Deposit $10,000</li>
                                                    <li>Enhanced security</li>
                                                    <li>Access to all features</li>
                                                    <li>24/7Support</li>
                                                </ul>
                                                <a href="#">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="single-price">
                                            <div class="part-top">
                                                <h3>Basic Plan</h3>
                                                <h4>5.50%<br /><span>Per Month</span></h4>
                                            </div>
                                            <div class="part-bottom">
                                                <ul>
                                                    <li>Features</li>
                                                    <li>Minimum Deposit $10</li>
                                                    <li>Miximum Deposit $10,000</li>
                                                    <li>Enhanced security</li>
                                                    <li>Access to all features</li>
                                                    <li>24/7Support</li>
                                                </ul>
                                                <a href="#">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="single-price">
                                            <div class="part-top">
                                                <h3>Basic Plan</h3>
                                                <h4>5.50%<br /><span>Per Month</span></h4>
                                            </div>
                                            <div class="part-bottom">
                                                <ul>
                                                    <li>Features</li>
                                                    <li>Minimum Deposit $10</li>
                                                    <li>Miximum Deposit $10,000</li>
                                                    <li>Enhanced security</li>
                                                    <li>Access to all features</li>
                                                    <li>24/7Support</li>
                                                </ul>
                                                <a href="#">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="single-price special">
                                            <div class="part-top">
                                                <h3>Basic Plan</h3>
                                                <h4>5.50%<br /><span>Per Month</span></h4>
                                            </div>
                                            <div class="part-bottom">
                                                <ul>
                                                    <li>Features</li>
                                                    <li>Minimum Deposit $10</li>
                                                    <li>Miximum Deposit $10,000</li>
                                                    <li>Enhanced security</li>
                                                    <li>Access to all features</li>
                                                    <li>24/7Support</li>
                                                </ul>
                                                <a href="#">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="single-price">
                                            <div class="part-top">
                                                <h3>Basic Plan</h3>
                                                <h4>5.50%<br /><span>Per Month</span></h4>
                                            </div>
                                            <div class="part-bottom">
                                                <ul>
                                                    <li>Features</li>
                                                    <li>Minimum Deposit $10</li>
                                                    <li>Miximum Deposit $10,000</li>
                                                    <li>Enhanced security</li>
                                                    <li>Access to all features</li>
                                                    <li>24/7Support</li>
                                                </ul>
                                                <a href="#">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- price end -->

        <!-- inventor begin-->
        <div id="investors">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="section-title text-center">
                            <h2>Our Top Inventors</h2>
                            <p>Put your investing ideas into action with full range of investments.
                                Enjoy real benefits and rewards on your accrue investing.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="box">
                            <div class="image">
                                <img class="img-fluid" src="<?= base_url(); ?>assets/site/assets/img/t1.png" alt="">
                                <div class="social_icon">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="info">
                                <h5>Tamim Ubaidah
                                </h5>
                                <p>Web Designer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="box">
                            <div class="image">
                                <img class="img-fluid" src="<?= base_url(); ?>assets/site/assets/img/t2.png" alt="">
                                <div class="social_icon">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="info">
                                <h5>Mamunur Rashid</h5>
                                <p>Web Designer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="box">
                            <div class="image">
                                <img class="img-fluid" src="<?= base_url(); ?>assets/site/assets/img/t3.png" alt="">
                                <div class="social_icon">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="info">
                                <h5>Rex Rifat</h5>
                                <p>Web Designer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="box">
                            <div class="image">
                                <img class="img-fluid" src="<?= base_url(); ?>assets/site/assets/img/t4.png" alt="">
                                <div class="social_icon">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="info">
                                <h5>David Martin</h5>
                                <p>Web Designer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- inventor end -->

        <!-- faq begin-->
        <div class="faq">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="section-title text-center">
                            <h2>Questions you often ask</h2>
                            <p>Put your investing ideas into action with full range of investments.
                                Enjoy real benefits and rewards on your accrue investing.</p>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="accordion" id="accordionExample">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="false" aria-controls="collapseOne">
                                                    How can i get help by inbound marketing?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                We are full service Digital Marketing Agency all the tools
                                                you need for inbound success. With this module theres
                                                no need to go another day.
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    I have questions about the updated trems
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                We are full service Digital Marketing Agency all the tools
                                                you need for inbound success. With this module theres
                                                no need to go another day.
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    User Guide: Getting Started
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                We are full service Digital Marketing Agency all the tools
                                                you need for inbound success. With this module theres
                                                no need to go another day.
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapse4" aria-expanded="false" aria-controls="collapseThree">
                                                    Are you plan to open a brance on Dhaka?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse4" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                We are full service Digital Marketing Agency all the tools
                                                you need for inbound success. With this module theres
                                                no need to go another day.
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-xl-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapse5" aria-expanded="false" aria-controls="collapseOne">
                                                    How can i get help by x company?
                                                </button>
                                            </h5>
                                        </div>
        
                                        <div id="collapse5" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                We are full service Digital Marketing Agency all the tools
                                                you need for inbound success. With this module theres
                                                no need to go another day.
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapse6" aria-expanded="false" aria-controls="collapseTwo">
                                                    What about loan programs?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse6" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                We are full service Digital Marketing Agency all the tools
                                                you need for inbound success. With this module theres
                                                no need to go another day.
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapse7" aria-expanded="false" aria-controls="collapseThree">
                                                    How long your contract trems?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse7" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                We are full service Digital Marketing Agency all the tools
                                                you need for inbound success. With this module theres
                                                no need to go another day.
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapse8" aria-expanded="false" aria-controls="collapseThree">
                                                    What about after bank advantage?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse8" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                We are full service Digital Marketing Agency all the tools
                                                you need for inbound success. With this module theres
                                                no need to go another day.
                                            </div>
                                        </div>
                                    </div>
        
                                </div>
        
                            </div>
        
                        </div>
        
                    </div>
                </div>
            </div>
        </div>
        <!-- faq end -->

        <!-- newsletter begin-->
        <div class="newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-7">
                        <div class="section-title text-center">
                            <h2>Our Newslatter</h2>
                            <p>We bring the right people together to challenge established thinking and drive transformation.
                                We will show the way to successive.</p>
                        </div>
                    </div>
                </div>
        
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-7">
                        <form class="newsletter-form">
                            <input type="email" placeholder="Enter your email..." required>
                            <button type="submit">Subscribe Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- newsletter end -->

        <div class="blog-post">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title text-center">
                            <h2 class="extra-margin">Latest<span> Blog Posts</span></h2>
                            <p>Put your investing ideas into action with full range of investments.
                                Enjoy real benefits and rewards on your accrue investing.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-blog">
                            <div class="part-img">
                                <img src="<?= base_url(); ?>assets/site/assets/img/blog-post-1.jpg" alt="">
                            </div>
                            <div class="part-text">
                                <h3><a href="blog-details.html">Blog Single Image Post</a></h3>
                                <h4>
                                    <span class="admin">By Admin </span>.
                                    <span class="date">12 Nov, 2018 </span>.
                                    <span class="category">in Web Design </span>
                                </h4>
                                <p>Lorem Ipsum is simply dummy text of the rinting and
                                    typesetting industry. Lorem Ipsum has been the industry's standard
                                    dummy ...</p>
                                <a class="read-more" href="#"><span><i class="fas fa-book-reader"></i></span> Read More</a>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-blog">
                            <div class="part-img">
                                <img src="<?= base_url(); ?>assets/site/assets/img/blog-post-2.jpg" alt="">
                            </div>
                            <div class="part-text">
                                <h3><a href="blog-details.html">Printer Took A Galley</a></h3>
                                <h4>
                                    <span class="admin">By Admin </span>.
                                    <span class="date">12 Nov, 2018 </span>.
                                    <span class="category">in Web Design </span>
                                </h4>
                                <p>Lorem Ipsum is simply dummy text of the rinting and
                                    typesetting industry. Lorem Ipsum has been the industry's standard
                                    dummy ...</p>
                                <a class="read-more" href="#"><span><i class="fas fa-book-reader"></i></span> Read More</a>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-blog">
                            <div class="part-img">
                                <img src="<?= base_url(); ?>assets/site/assets/img/blog-post-3.jpg" alt="">
                            </div>
                            <div class="part-text">
                                <h3><a href="blog-details.html">Reader Will Distracted</a></h3>
                                <h4>
                                    <span class="admin">By Admin </span>.
                                    <span class="date">12 Nov, 2018 </span>.
                                    <span class="category">in Web Design </span>
                                </h4>
                                <p>Lorem Ipsum is simply dummy text of the rinting and
                                    typesetting industry. Lorem Ipsum has been the industry's standard
                                    dummy ...</p>
                                <a class="read-more" href="#"><span><i class="fas fa-book-reader"></i></span> Read More</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- footer begin -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <div class="box">
                            <div class="logo">
                                <a href="#">
                                    <img src="<?= base_url(); ?>assets/site/assets/img/logo.png" alt="">
                                </a>
                            </div>
                            <p>
                                We are a full service Digital Marketing Agency all
                                the foundational tool you need inbound success.
                                With this module theres no need to another day.
                            </p>
                            <div class="social_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6">
                        <div class="box box2">
                            <h2>
                                Links
                            </h2>
                            <ul>
                                <li>
                                    <a href="#">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        About
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Services
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        FAQ
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Contact
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6">
                        <div class="box box3">
                            <h2>
                                About Us
                            </h2>
                            <ul>
                                <li>
                                    <a href="#">
                                        About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Contact Us
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Sign in
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="box box4">
                            <h2>
                                Contact Us
                            </h2>
                            <p>
                                512, Main road ST, MA 176
                                Charls Town
                            </p>
                            <a href="#">
                                info@example.com
                            </a>
                            <a href="#">
                                877-559-9826
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p class="text-center">
                    © 2018. All Rights Reserved.
                </p>
            </div>
        </footer>
        <!-- footer end -->

        <!-- scroll top button begin -->
        <div class="scroll-to-top">
            <a><i class="fas fa-long-arrow-alt-up"></i></a>
        </div>
        <!-- scroll top button end -->


       <?php include 'includes/top/script.php' ?>
    </body>

</html>