<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Dolight job</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;600;700;800&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@300;400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('assets/frontend_old/')}}/img/favicon.png">
    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend_old/')}}/css/bootstrap.min.css">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend_old/')}}/css/animate.min.css">
    <!-- FlatIcon CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend_old/')}}/css/flaticon.css">
    <!-- Font Awesome Min CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend_old/')}}/css/fontawesome.min.css">
    <!-- Mran Menu CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend_old/')}}/css/meanmenu.css">
    <!-- Magnific Popup Min CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend_old/')}}/css/magnific-popup.min.css">
    <!-- Nice Select Min CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend_old/')}}/css/nice-select.min.css">
    <!-- Swiper Min CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend_old/')}}/css/swiper.min.css">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend_old/')}}/css/owl.carousel.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend_old/')}}/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend_old/')}}/css/responsive.css">
</head>

<body>
<!-- Start Preloader Area -->
<div class="preloader">
    <div class="loader">
        <div class="shadow"></div>
        <div class="box"></div>
    </div>
</div>
<!-- End Preloader Area -->
<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="techvio-responsive-nav">
        <div class="container">
            <div class="techvio-responsive-menu">
                <div class="logo">
                    <a href="index.html">
                        <img src="{{asset('assets/frontend_old/')}}/img/logo.png" class="white-logo" alt="logo">
                        <img src="{{asset('assets/frontend_old/')}}/img/logo.png" class="black-logo" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="techvio-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="index.html">
                    <img src="{{asset('assets/frontend_old/')}}/img/logo.png" class="white-logo" alt="logo">
                    <img src="{{asset('assets/frontend_old/')}}/img/logo.png" class="black-logo" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('front')}}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('about')}}" class="nav-link active">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('forum')}}" class="nav-link">Forum</a>
                        </li>
                    </ul>
                    <div class="other-option">
                        <a class="default-btn" href="#getit" data-toggle="modal">Get It Support <span></span></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
<!-- Get it support -->
<div class="modal fade" id="getit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact Us</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="u_name">Your Name</label>
                            <input type="text" class="form-control" placeholder="Enter here.." id="u_name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="u_email">Your Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" placeholder="Enter here.." id="u_email"
                                   required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="u_ques">Your Question <span class="text-danger">*</span></label>
                            <textarea id="u_ques" rows="3" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Start Page Title Area -->
<div class="page-title-area item-bg2">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>Frequently Ask Question</h2>
                    <ul>
                        <li><a href="index.html">Home</a>
                        </li>
                        <li>Faq</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title Area -->
<!-- Start Faq Section -->
<section class="faq-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-accordion first-faq-box">
                    <ul class="accordion">
                        <li class="accordion-item">
                            <a class="accordion-title overflow-hidden" href="javascript:void(0)"> <i
                                    class="fa fa-plus"></i>
                                What do
                                I do when my computer crashes?
                            </a>
                            <div class="accordion-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore</p>

                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <button type="button" class="btn p-0"><i class="fas fa-thumbs-up"></i> <span
                                                class="badge badge-primary">5</span></button>
                                    </li>
                                    <li class="list-inline-item">
                                        <label for="reply">Reply</label>
                                    </li>
                                </ul>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Enter your reply.."
                                           id="reply">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="button">Send</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)"> <i class="fa fa-plus"></i> There
                                is no display on the monitor, what do I do now?</a>
                            <div class="accordion-content">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde porro dolorem odio
                                    aperiam dolore laudantium voluptate minus, iusto neque nihil quidem? Explicabo
                                    iure deserunt officia veniam. Sit nostrum necessitatibus architecto!</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <button type="button" class="btn p-0"><i class="fas fa-thumbs-up"></i> <span
                                                class="badge badge-primary">5</span></button>
                                    </li>
                                    <li class="list-inline-item">
                                        <label for="reply">Reply</label>
                                    </li>
                                </ul>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Enter your reply.."
                                           id="reply">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="button">Send</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)"> <i class="fa fa-plus"></i> How can
                                I clean my keyboard?</a>
                            <div class="accordion-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <button type="button" class="btn p-0"><i class="fas fa-thumbs-up"></i> <span
                                                class="badge badge-primary">5</span></button>
                                    </li>
                                    <li class="list-inline-item">
                                        <label for="reply">Reply</label>
                                    </li>
                                </ul>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Enter your reply.."
                                           id="reply">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="button">Send</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)"> <i class="fa fa-plus"></i> Why is
                                my computer mouse acting erratically?</a>
                            <div class="accordion-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <button type="button" class="btn p-0"><i class="fas fa-thumbs-up"></i> <span
                                                class="badge badge-primary">5</span></button>
                                    </li>
                                    <li class="list-inline-item">
                                        <label for="reply">Reply</label>
                                    </li>
                                </ul>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Enter your reply.."
                                           id="reply">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="button">Send</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Faq Section -->
<!-- Start Footer & Subscribe Section -->
<section class="footer-subscribe-wrapper">
    <!-- Start Subscribe Area -->
    <div class="subscribe-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="subscribe-content">
                        <h2>Sign Up Our Newsletter</h2>
                        <span class="sub-title">We Offer An Informative Monthly Technology Newsletter - Check It
								Out.</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <form class="newsletter-form">
                        <input type="email" class="input-newsletter" placeholder="Enter your email" name="EMAIL"
                               required autocomplete="off">
                        <button type="submit">Subscribe Now</button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Subscribe Area -->
    <!-- Start Footer Area -->
    <div class="footer-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-heading">
                            <h3>About Us</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco consectetur laboris.</p>
                        <ul class="footer-social">
                            <li>
                                <a href="#"> <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#"> <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#"> <i class="fab fa-pinterest"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#"> <i class="fab fa-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-heading">
                            <h3>Our Services</h3>
                        </div>
                        <ul class="footer-quick-links">
                            <li><a href="#">IT Solution</a></li>
                            <li><a href="projects.html">Web Development</a></li>
                            <li><a href="services.html">Networking Services</a></li>
                            <li><a href="team.html">SEO Optimization</a></li>
                            <li><a href="contact.html">App Optimization</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-heading">
                            <h3>Useful Links</h3>
                        </div>
                        <ul class="footer-quick-links">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="projects.html">Case Study</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="terms-condition.html">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-heading">
                            <h3>Contact Info</h3>
                        </div>
                        <div class="footer-info-contact"><i class="flaticon-phone-call"></i>
                            <h3>Phone</h3>
                            <span><a href="tel:0802235678">080 707 555-321</a></span>
                        </div>
                        <div class="footer-info-contact"><i class="flaticon-envelope"></i>
                            <h3>Email</h3>
                            <span><a href="mailto:demo@example.com">demo@example.com</a></span>
                        </div>
                        <div class="footer-info-contact"><i class="flaticon-placeholder"></i>
                            <h3>Address</h3>
                            <span>526 Melrose Street, Water Mill, 11976 New York</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Section -->
</section>
<!-- End Footer & Subscribe Section -->
<!-- Start Copy Right Section -->
<div class="copyright-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <p><i class="far fa-copyright"></i> <span class="getYear">2021</span> Dolight - All Rights
                    Reserved.</p>
            </div>
            <div class="col-lg-6 col-md-6">
                <ul>
                    <li><a href="terms-condition.html">Terms & Conditions</a>
                    </li>
                    <li><a href="privacy-policy.html">Privacy Policy</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Copy Right Section -->
<!-- Start Go Top Section -->
<div class="go-top">
    <i class="fas fa-chevron-up"></i>
    <i class="fas fa-chevron-up"></i>
</div>
<!-- End Go Top Section -->
<!-- jQuery Min JS -->
<script src="{{asset('assets/frontend_old/')}}/js/jquery.min.js"></script>
<!-- Popper Min JS -->
<script src="{{asset('assets/frontend_old/')}}/js/popper.min.js"></script>
<!-- Bootstrap Min JS -->
<script src="{{asset('assets/frontend_old/')}}/js/bootstrap.min.js"></script>
<!-- MeanMenu JS  -->
<script src="{{asset('assets/frontend_old/')}}/js/jquery.meanmenu.js"></script>
<!-- Appear Min JS -->
<script src="{{asset('assets/frontend_old/')}}/js/jquery.appear.min.js"></script>
<!-- CounterUp Min JS -->
<script src="{{asset('assets/frontend_old/')}}/js/jquery.waypoints.min.js"></script>
<script src="{{asset('assets/frontend_old/')}}/js/jquery.counterup.min.js"></script>
<!-- Owl Carousel Min JS -->
<script src="{{asset('assets/frontend_old/')}}/js/owl.carousel.min.js"></script>
<!-- Magnific Popup Min JS -->
<script src="{{asset('assets/frontend_old/')}}/js/jquery.magnific-popup.min.js"></script>
<!-- Nice Select Min JS -->
<script src="{{asset('assets/frontend_old/')}}/js/jquery.nice-select.min.js"></script>
<!-- Isotope Min JS -->
<script src="{{asset('assets/frontend_old/')}}/js/isotope.pkgd.min.js"></script>
<!-- Swiper Min JS -->
<script src="{{asset('assets/frontend_old/')}}/js/swiper.min.js"></script>
<!-- WOW Min JS -->
<script src="{{asset('assets/frontend_old/')}}/js/wow.min.js"></script>
<!-- Main JS -->
<script src="{{asset('assets/frontend_old/')}}/js/main.js"></script>
</body>
<!-- Mirrored from cutesolution.com/html/Techvio/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Mar 2022 18:08:20 GMT -->

</html>
