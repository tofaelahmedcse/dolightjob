<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0, user-scalable=no"
    />
    <meta name="format-detection" content="telephone=no" />
    <title>Dolight job | Home</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Catamaran:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/frontend/')}}/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/frontend/')}}/css/style.css" />
</head>

<body>
<main class="main-wrap">
    <!--  Beginning header section  -->
    <header class="main-header-section">
        <div class="common-wrap clear">
            <div class="header-inner flex">
                <div class="logo-wrap">
                    <div class="main-logo">
                        <a href="{{route('index')}}"><img src="{{asset('assets/frontend/')}}/img/logo.png" alt="logo" /></a>
                    </div>
                    <div class="hamburger flex">
                        <div></div>
                    </div>
                </div>
                <div class="nav-wrap flex">
                    <div class="main-nav flex">

                    </div>
                    <div class="header-btn flex">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- //End header section -->

    <!-- Beginning main content section  -->
    @yield('content')

    <!-- //End main content section -->

    <!-- Beginning footer section-->
    <footer class="main-footer-section">
        <div class="footer-wrap">
            <div class="common-wrap clear">
                <div class="footer-inner flex">
                    <div class="footer-widget-wrap flex">
                        <div class="footer-widget large-widget">
                            <h5>About Us</h5>
                            <p>
                                At DolightJob, we understand the value of time and expertise, which is why we strive to make the process of finding and hiring freelancers as easy as possible. Our site features a wide range of services, including web design, writing, programming, marketing, and much more. Whether you need a quick fix or a long-term project, we have the talent and experience to help you achieve your goals.                            </p>
                            <div class="footer-social">
                                <ul>
                                    <li>
                                        <a href="#"
                                        ><img src="{{asset('assets/frontend/')}}/img/facebook-app-symbol.png" alt="social"
                                            /></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                        ><img src="{{asset('assets/frontend/')}}/img/twitter.png" alt="social"
                                            /></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                        ><img src="{{asset('assets/frontend/')}}/img/social.png" alt="social"
                                            /></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                        ><img src="{{asset('assets/frontend/')}}/img/linkedin.png" alt="social"
                                            /></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-widget">
                            <h5>Our Services</h5>
                            <ul>
                                <li><a href="{{ route('it.solution') }}">IT Solution</a></li>
                                <li><a href="{{ route('web.dev') }}">Web Development</a></li>
                                <li><a href="{{ route('net.service') }}">Networking Services</a></li>
                                <li><a href="{{ route('seo') }}">SEO Optimization</a></li>
                                <li><a href="{{ route('app.otimizaition') }}">App Optimization</a></li>
                            </ul>
                        </div>
                        <div class="footer-widget">
                            <h5>Useful Links</h5>
                            <ul>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('case') }}">Case Study</a></li>
                                <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                                <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('treanms.condition') }}">Terms & Conditions</a></li>
                            </ul>
                        </div>
                        <div class="footer-widget large-widget">
                            <h5>Contact Info</h5>
                            <div class="footer-info-wrap flex">
                                <div class="footer-info">
                                    <img src="{{asset('assets/frontend/')}}/img/phone-call.png" alt="info-logo" />
                                    <h6>Phone</h6>
                                    <a href="tel:+8801784888730">+880 1784 888 730</a>
                                </div>
                                <div class="footer-info">
                                    <img src="{{asset('assets/frontend/')}}/img/mail.png" alt="info-logo" />
                                    <h6>Email</h6>
                                    <a href="mailto:dolightjob@gmail.com">dolightjob@gmail.com</a>
                                </div>
                                <div class="footer-info">
                                    <img src="{{asset('assets/frontend/')}}/img/placeholder.png" alt="info-logo" />
                                    <h6>Address</h6>
                                    <address>6440 Gurudaspur, Natore, Rajshahi</address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="common-wrap clear">
                <div class="footer-bottom-inner flex">
                    <p>&copy; 2022 Dolight - All Rights Reserved.</p>
                    <ul>
                        <li><a href="{{ route('treanms.condition') }}">Terms &amp; Conditions</a></li>
                        <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- //End main footer section -->
</main>

<script type="text/javascript" src="{{asset('assets/frontend/')}}/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="{{asset('assets/frontend/')}}/js/headroom.js"></script>
<script type="text/javascript" src="{{asset('assets/frontend/')}}/js/common-scripts.js" defer></script>
</body>
</html>
