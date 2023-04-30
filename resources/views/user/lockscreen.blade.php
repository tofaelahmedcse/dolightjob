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

            </div>
        </div>
        <div class="fxt-form-content">
            <div class="fxt-page-switcher">
                <h2 class="fxt-page-title mr-3">Screen Lock</h2>

            </div>


            <div class="fxt-main-form">
                <div class="fxt-inner-wrap">







                    <form action="{{route('user.unlockscreen')}}" method="post">
                        @csrf
                        <div class="row">
                            {{-- <div class="col-12">
                                <div class="form-group">
                                    <input type="email" id="email" class="form-control" name="email"
                                           placeholder="Email" required="required">
                                </div>
                            </div> --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" name="password"
                                           placeholder="********" required="required">
                                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="fxt-checkbox-wrap">
                                        <div class="fxt-checkbox-box mr-3">
                                            {{-- <input id="checkbox1" type="checkbox"> --}}
                                            {{-- <label for="checkbox1" class="ps-4">Keep me logged in</label> --}}
                                        </div>
                                        <a href="{{route('forgot.password')}}" class="fxt-switcher-text">Forgot
                                            Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="fxt-btn-fill">Unlock</button>
                                </div>
                            </div>
                        </div>
                    </form>

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
