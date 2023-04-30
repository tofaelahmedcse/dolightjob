@extends('layouts.frontend')

@section('content')
<section class="main-content-wrap">
        <section class="hero-wrap">
            <div class="common-wrap clear">
                <div class="hero-inner flex">
                    <div class="hero-content">
                        <h1>IT Solutions &amp; Business Services Company</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua,
                            magna aliqua. ipsum is simply dummy text of the printing.
                        </p>
                        <div class="hero-btn-wrap flex">
                            <a href="{{route('register')}}" class="sign-up">Sign Up <span></span></a>
                            <a href="{{route('login')}}" class="login">Login <span></span></a>
                        </div>
                    </div>
                    <div class="hero-thumb">
                        <figure>
                            <img src="{{asset('assets/frontend/')}}/img/home-font.png" alt="hero-thumb" />
                        </figure>
                    </div>
                </div>
            </div>
            <div class="hero-bottom-shape">
                <figure>
                    <img src="{{asset('assets/frontend/')}}/img/home-bottom-shape.png" alt="home-bottom-shape" />
                </figure>
            </div>
        </section>

        <section class="large-bg">
            <figure>
                <img src="{{asset('assets/frontend/')}}/img/large-bg.png" alt="Find Job" />
            </figure>
        </section>

        <section class="tab-wrap">
            <h2>Freelancer &amp; Buyer</h2>
            <div class="common-wrap clear">
                <div class="tab-trigger">
                    <ul>
                        <li><a href="#tab-1">Freelancer</a></li>
                        <li><a href="#tab-2">Buyer</a></li>
                    </ul>
                </div>
                <div class="tab-content-wrapper">
                    <div class="tab-content-item" id="tab-1">
                        <div class="tab-content-item-inner">
                            <div class="tab-item-content">
                                <h4>WHY CHOOSE US?</h4>
                                <h2>As a Freelancer</h2>
                                <p>
                                    As a Freelancer, you can get a lot of social media
                                    promotion micro-jobs in here. These are:
                                </p>
                                <div class="tab-bullets">
                                    <ul>
                                        <li>Social media promotion</li>
                                        <li>Graphics &amp; Design</li>
                                        <li>Digital Marketing</li>
                                        <li>Writing &amp; Translation</li>
                                        <li>Video &amp; Animation</li>
                                        <li>Music &amp; Audio</li>
                                        <li>Programming &amp; Tech</li>
                                        <li>Data</li>
                                        <li>Business</li>
                                        <li>Lifestyle</li>
                                        <li>Photography</li>
                                        <li>Sitemap</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-item-thumb">
                                <figure>
                                    <img src="{{asset('assets/frontend/')}}/img/Freelancer.jpg" alt="" />
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content-item" id="tab-2">
                        <div class="tab-content-item-inner">
                            <div class="tab-item-content">
                                <h4>WHY TRUST US?</h4>
                                <h2>As a Buyer</h2>
                                <p>
                                    As a Buyer, you can post here your promotional tasks in
                                    this micro-job site. You can complete your jobs by posting
                                    your available in the marketplace about-
                                </p>
                                <div class="tab-bullets">
                                    <ul>
                                        <li>Social media promotion</li>
                                        <li>Graphics &amp; Design</li>
                                        <li>Digital Marketing</li>
                                        <li>Writing &amp; Translation</li>
                                        <li>Video &amp; Animation</li>
                                        <li>Music &amp; Audio</li>
                                        <li>Programming &amp; Tech</li>
                                        <li>Data</li>
                                        <li>Business</li>
                                        <li>Lifestyle</li>
                                        <li>Photography</li>
                                        <li>Sitemap</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-item-thumb">
                                <figure>
                                    <img src="{{asset('assets/frontend/')}}/img/Buyer.jpg" alt="" />
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="video-wrap">
            <div class="common-wrap clear">
                <iframe
                    src="https://www.youtube-nocookie.com/embed/W2MpGCL8-9o?controls=0"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>
        </section>

        <section class="partner-and-newsletter-wrap">
            <div class="common-wrap clear">
                <div class="partner-and-newsletter-inner flex">
                    <div class="partner-wrap flex">
                        <div class="partner-content">
                            <h6>WE PREFER</h6>
                            <h3>Payment Getway</h3>
                        </div>
                        <div class="partner-component-wrap flex">
                            <a href="#"><img src="{{asset('assets/frontend/')}}/img/client-2.png" alt="client" /></a>
                            <a href="#"><img src="{{asset('assets/frontend/')}}/img/client-3.png" alt="client" /></a>
                            <a href="#"><img src="{{asset('assets/frontend/')}}/img/client-4.png" alt="client" /></a>
                            <a href="#"><img src="{{asset('assets/frontend/')}}/img/client-5.png" alt="client" /></a>
                            <a href="#"><img src="{{asset('assets/frontend/')}}/img/client-6.png" alt="client" /></a>
                            <a href="#"><img src="{{asset('assets/frontend/')}}/img/client-7.png" alt="client" /></a>
                            <a href="#"><img src="{{asset('assets/frontend/')}}/img/client-8.png" alt="client" /></a>
                            <a href="#"><img src="{{asset('assets/frontend/')}}/img/client-9.png" alt="client" /></a>
                            <a href="#"><img src="{{asset('assets/frontend/')}}/img/client-10.png" alt="client" /></a>
                            <a href="#"><img src="{{asset('assets/frontend/')}}/img/client-11.png" alt="client" /></a>
                            <a href="#"><img src="{{asset('assets/frontend/')}}/img/client-12.png" alt="client" /></a>
                        </div>
                    </div>
                    <div class="newsletter-wrap flex">
                        <div class="newsletter-content">
                            <h4>Sign Up Our Newsletter</h4>
                            <p>
                                We Offer An Informative Monthly Technology Newsletter -
                                Check It Out.
                            </p>
                        </div>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Enter your email" />
                                <input type="submit" value="Subscribe Now" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
