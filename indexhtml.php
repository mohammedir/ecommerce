<!--Start Slider-->
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col-one col-sm-12 col-md-12 col-lg-6">
                <h4><i class="fa fa-list-alt" aria-hidden="true"> Categories</i></h4>
                <ul>
                    <li><label class="checkbox"><input type="checkbox"> Women's Fashion</label></li>
                    <li><label class="checkbox"><input type="checkbox"> Men's Fashion</label></li>
                    <li><label class="checkbox"><input type="checkbox"> Phones & Telecommunication</label></li>
                    <li><label class="checkbox"><input type="checkbox"> Computer, Office & Security</label></li>
                    <li><label class="checkbox"><input type="checkbox"> Women's Fashion</label></li>
                    <li><label class="checkbox"><input type="checkbox"> Men's Fashion</label></li>
                    <li><label class="checkbox"><input type="checkbox"> Phones & Telecommunication</label></li>
                    <li><label class="checkbox"><input type="checkbox"> Computer, Office & Security</label></li>
                    <li><label class="checkbox"><input type="checkbox"> Women's Fashion</label></li>
                    <li><label class="checkbox"><input type="checkbox"> Men's Fashion</label></li>
                    <li><label class="checkbox"><input type="checkbox"> Phones & Telecommunication</label></li>
                    <li><label class="checkbox"><input type="checkbox"> Computer, Office & Security</label></li>
                </ul>
            </div>
            <div class="col-two col-sm-12 col-md-12 col-lg-6">
                <ul>
                    <li class="row-one-col-tow">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <!--<div class="overlay"></div>-->
                                <div class="carousel-item active">
                                    <img src="/seller/layout/images/s-5.webp" class="d-block w-100"
                                         alt="slide-img">
                                </div>
                                <div class="carousel-item">
                                    <img src="/seller/layout/images/s-6.webp" class="d-block w-100"
                                         alt="slide-img">
                                </div>
                                <div class="carousel-item">
                                    <img src="/seller/layout/images/s-7.webp" class="d-block w-100"
                                         alt="slide-img">
                                </div>
                                <div class="carousel-item">
                                    <img src="/seller/layout/images/s-4.webp" class="d-block w-100"
                                         alt="slide-img">
                                </div>
                                <div class="carousel-item">
                                    <img src="/seller/layout/images/s-3.webp" class="d-block w-100"
                                         alt="slide-img">
                                </div>
                                <div class="carousel-item">
                                    <img src="/seller/layout/images/s-2.webp" class="d-block w-100"
                                         alt="slide-img">
                                </div>
                            </div>

                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="0"
                                        class="active"
                                        aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="3"
                                        aria-label="Slide 4"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="4"
                                        aria-label="Slide 5"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="5"
                                        aria-label="Slide 6"></button>
                            </div>
                        </div>
                    </li>
                    <li class="row-two-col-tow">
                        <div class="text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="card-item col-sm-12 col-md-12 col-lg-4">
                                        <div class="card">
                                            <img src="/seller/layout/images/slide-3.jpg" class="card-img-top"
                                                 alt="card-img">
                                            <div class="card-body">
                                                <h5>Card title</h5>
                                                <h6>March 24 2017</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-item col-sm-12 col-md-12 col-lg-4">
                                        <div class="card">
                                            <img src="/seller/layout/images/slide-1.jpeg" class="card-img-top"
                                                 alt="card-img">
                                            <div class="card-body">
                                                <h5>Card title</h5>
                                                <h6>March 24 2017</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-item col-sm-12 col-md-12 col-lg-4">
                                        <div class="card">
                                            <img src="/seller/layout/images/slide-2.jpg" class="card-img-top"
                                                 alt="card-img">
                                            <div class="card-body">
                                                <h5>Card title</h5>
                                                <h6>March 24 2017</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-three col-sm-12 col-md-12 col-lg-6 text-center">
                <div class="login-boy">
                    <?php if (!isset($_SESSION['Username'])){?>
                    <img class="account-img" src="/seller/layout/images/account.webp">
                    <h4>Welcome to EcoExpress</h4>
                    <div class="account container">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 button-col">
                                <a href="registerUser.php" class="btn btn-info">Join</a>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 button-col">
                                <a href="login.php" class="btn btn-dark">Sign in</a>
                            </div>
                        </div>
                    </div>
                    <?php }else{?>
                        <img class="logo-img" src="layout/images/ecoexpress2.png">
                    <?php }?>
                </div>
                <a href=""><img src="/seller/layout/images/p-2.png"></a>
            </div>
        </div>
    </div>
</div>
</div>
<!--End Slider-->

<!--Start Latest post-->
<div class="latest-post">
    <div class="container">
        <div class="row">
            <div class="col-one col-sm-4 col-md-3 col-lg-2">
                <a href="" class="card">
                    <img src="/seller/layout/images/slide-3.jpg" class="card-img-top" alt="card-img">
                    <div class="card-body">
                        <h5>Card title</h5>
                        <h6>March 24 2017</h6>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
                <a href="" class="card">
                    <img src="/seller/layout/images/slide-1.jpeg" class="card-img-top" alt="card-img">
                    <div class="card-body">
                        <h5>Card title</h5>
                        <h6>March 24 2017</h6>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
                <a href="" class="card">
                    <img src="/seller/layout/images/slide-2.jpg" class="card-img-top" alt="card-img">
                    <div class="card-body">
                        <h5>Card title</h5>
                        <h6>March 24 2017</h6>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
                <a href="" class="card">
                    <img src="/seller/layout/images/slide-2.jpg" class="card-img-top" alt="card-img">
                    <div class="card-body">
                        <h5>Card title</h5>
                        <h6>March 24 2017</h6>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
                <a href="" class="card">
                    <img src="/seller/layout/images/slide-2.jpg" class="card-img-top" alt="card-img">
                    <div class="card-body">
                        <h5>Card title</h5>
                        <h6>March 24 2017</h6>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
                <a href="" class="card">
                    <img src="/seller/layout/images/slide-2.jpg" class="card-img-top" alt="card-img">
                    <div class="card-body">
                        <h5>Card title</h5>
                        <h6>March 24 2017</h6>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!--End Latest post-->

<!--Start Statistics-->
<div class="statistics text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div>
                    <i class="fa fa-user fa-4x rounded-circle"></i>
                    <div class="card-body">
                        <h1>624</h1>
                        <h6>March 24 2017</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div>
                    <i class="fa fa-heart fa-4x rounded-circle"></i>
                    <div class="card-body">
                        <h1>112</h1>
                        <h6>March 24 2017</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div>
                    <i class="fa fa-briefcase fa-4x rounded-circle"></i>
                    <div class="card-body">
                        <h1>595</h1>
                        <h6>March 24 2017</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div>
                    <i class="fa fa-comments fa-4x rounded-circle"></i>
                    <div class="card-body">
                        <h1>09</h1>
                        <h6>March 24 2017</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Statistics-->

<!--Start Footer-->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="site-info">
                    <a class="navbar-brand"
                       href="http://tweetytube.epizy.com/"><span>Elite</span><span>Crop</span></a>
                    <p>People are doing business with you because they know, like and trust you, period. The
                        relationship
                        and the experience are what open more doors, close more sales and land you more deals.
                        This
                        is a
                        new
                        economy that calls for a new approach Attention to Details It's our attention to the
                        small
                        stuff,
                        scheduling of timelines and keen project management that makes us stand out from the You
                        want
                        results.</p>
                    <a class="read-more" href="http://tweetytube.epizy.com/">Read more</a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="helpful-links">
                    <h2>Helpful Links</h2>
                    <div class="row">
                        <div class="col">
                            <ul class="list-unstyled">
                                <li>About</li>
                                <li>Portofolio</li>
                                <li>Team</li>
                                <li>Price</li>
                                <li>Privacy</li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="list-unstyled">
                                <li>FAQ</li>
                                <li>Blog</li>
                                <li>How it work</li>
                                <li>Benefits</li>
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="contact-info">
                    <h2>Contact Us</h2>
                    <ul class="list-unstyled">
                        <li>59847 Levo Road Red Fort.U.S</li>
                        <li>Phone:012-123456</li>
                        <li>Email:<a href="mailto:mmsss875@gmail.com"> mmsss875@gmail.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Footer-->

<!--Start Copy right-->
<div class="copy-right">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm text-center text-sm-start">
                Copy right 2017 Elitcorp &copy; All Right Reserved
            </div>
            <div class="col-sm text-center text-sm-end">
                <ul class="list-unstyled">
                    <li>
                        <a href="http://tweetytube.epizy.com/"><i class="fa fa-facebook"></i> </a>
                    </li>
                    <li>
                        <a href="http://tweetytube.epizy.com/"><i class="fa fa-twitter"></i> </a>
                    </li>
                    <li>
                        <a href="http://tweetytube.epizy.com/"><i class="fa fa-youtube"></i> </a>
                    </li>
                    <li>
                        <a href="http://tweetytube.epizy.com/"><i class="fa fa-google-plus"></i> </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--End Copy right-->