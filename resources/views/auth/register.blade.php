<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dolight job</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/userauth/')}}/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/userauth/')}}/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/userauth/')}}/css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('assets/userauth/')}}/font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/userauth/')}}/style.css">
</head>

<body>
<div id="preloader" class="preloader">
    <div class='inner'>
        <div class='line1'></div>
        <div class='line2'></div>
        <div class='line3'></div>
    </div>
</div>
<section class="fxt-template-animation fxt-template-layout31">
    <span class="fxt-shape fxt-animation-active"></span>
    <div class="fxt-content-wrap">
        <div class="fxt-heading-content">
            <div class="fxt-inner-wrap">
                <div class="fxt-transformY-50 fxt-transition-delay-3">
                    <a href="login-31.html" class="fxt-logo"><img src="{{asset('assets/userauth/')}}/img/logo.png"
                                                                  alt="Logo"></a>
                </div>
                <div class="fxt-transformY-50 fxt-transition-delay-4">
                    <h1 class="fxt-main-title">We're a Digital Agency.</h1>
                </div>
                <div class="fxt-login-option">
                    <ul>
                        <li class="fxt-transformY-50 fxt-transition-delay-6"><a href="#">Sing in with Google</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="fxt-form-content">
            <div class="fxt-page-switcher">
                <h2 class="fxt-page-title mr-3">Register</h2>
                <ul class="fxt-switcher-wrap">
                    <li><a href="{{route('login')}}" class="fxt-switcher-btn ">Login</a></li>
                    <li><a href="{{route('register')}}" class="fxt-switcher-btn active">Register</a></li>
                </ul>
            </div>


            <div class="fxt-main-form">
                <div class="fxt-inner-wrap">
                    @include('layouts.errors')
                    @if(Session::has('email_error'))
                        <div class="alert alert-warning alert-border-left alert-dismissible fade show"
                             role="alert">
                            <i class="ri-alert-line me-3 align-middle fs-16"></i><strong>Warning</strong>
                            - {{Session::get('email_error')}} <br>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                        </div>
                    @endif

                    @if(Session::has('phone_error'))
                        <div class="alert alert-warning alert-border-left alert-dismissible fade show"
                             role="alert">
                            <i class="ri-alert-line me-3 align-middle fs-16"></i><strong>Warning</strong>
                            - {{Session::get('phone_error')}} <br>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                        </div>
                    @endif

                    @if(Session::has('email_verify_success'))
                        <div class="alert alert-primary alert-border-left alert-dismissible fade show"
                             role="alert">
                            <i class="ri-user-smile-line me-3 align-middle fs-16"></i><strong>Success</strong>
                            - {{Session::get('email_verify_success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{route('user.custom.register')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <input type="text" id="fname" class="form-control" name="name"
                                           placeholder="Your Full Name" required="required">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <input type="text" id="lname" class="form-control" name="email"
                                           placeholder="Your email Address" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="tel" id="email" class="form-control" name="phone_number"
                                           placeholder="Your Phone Number" required="required">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <input type="password" id="password" class="form-control" name="password"
                                           placeholder="Password" required="required">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <input type="password" id="cpassword" class="form-control" name="confirm_password"
                                           placeholder="Confirm Password" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="fxt-btn-fill">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="fxt-switcher-description">Already have an account?<a href="{{route('login')}}"
                                                                                     class="fxt-switcher-text ms-1">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- jquery-->
<script src="{{asset('assets/userauth/')}}/js/jquery-3.5.0.min.js"></script>
<!-- Bootstrap js -->
<script src="{{asset('assets/userauth/')}}/js/bootstrap.min.js"></script>
<!-- Imagesloaded js -->
<script src="{{asset('assets/userauth/')}}/js/imagesloaded.pkgd.min.js"></script>
<!-- Validator js -->
<script src="{{asset('assets/userauth/')}}/js/validator.min.js"></script>
<!-- Custom Js -->
<script src="{{asset('assets/userauth/')}}/js/main.js"></script>
</body>

</html>
