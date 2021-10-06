@extends('layouts.front.master-2')

@section('main')
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url({{asset('front/assets/img/bg/3.png')}})">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">About Us</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- about area start -->
    <div class="about-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="about-area-inner">
                <div class="row">
                    <div class="col-lg-6 col-md-10">
                        <div class="about-thumb-wrap after-shape" style="background-image: url({{asset('front/assets/img/about/2.png')}});">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-inner-wrap">
                            <div class="section-title mb-0">
                                <h6 class="sub-title right-line">ABOUT US</h6>
                                <h2 class="title">Education in continuing a proud tradition.</h2>
                                <p class="content">The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph,</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="single-list-wrap">
                                            <li class="single-list-inner style-check-box">
                                                <i class="fa fa-check"></i> Metus interdum metus
                                            </li>
                                            <li class="single-list-inner style-check-box">
                                                <i class="fa fa-check"></i> Ligula cur maecenas
                                            </li>
                                            <li class="single-list-inner style-check-box">
                                                <i class="fa fa-check"></i> Fringilla nulla
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="single-list-wrap">
                                            <li class="single-list-inner style-check-box">
                                                <i class="fa fa-check"></i> Metus interdum metus
                                            </li>
                                            <li class="single-list-inner style-check-box">
                                                <i class="fa fa-check"></i> Ligula cur maecenas
                                            </li>
                                            <li class="single-list-inner style-check-box">
                                                <i class="fa fa-check"></i> Fringilla nulla
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <a class="btn btn-border-black" href="about.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->

    <!-- counter area start -->
    <div class="counter-area bg-gray">
        <div class="container">
            <div class="counter-area-inner pd-top-110 pd-bottom-120" style="background-image: url({{asset('front/assets/img/other/1.png')}});">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="section-title mb-0">
                            <h6 class="sub-title right-line">Funfact</h6>
                            <h2 class="title">Strength in Numbers</h2>
                            <p class="content pb-3">The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy</p>
                            <div class="btn-counter bg-base mt-4">
                                <h3 class="left-val align-self-center"><span class="counter">2.4</span>k+</h3>
                                <div class="right-val align-self-center">
                                    Successful <br> students
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 align-self-center">
                        <ul class="single-list-wrap">
                            <li class="single-list-inner style-box-bg">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{asset('front/assets/img/icon/1.png')}}" alt="img">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h5><span class="counter">1200</span>+</h5>
                                        <p>Learners & counting</p>
                                    </div>
                                </div>
                            </li>
                            <li class="single-list-inner style-box-bg">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{asset('front/assets/img/icon/2.png')}}" alt="img">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h5><span class="counter">320</span>+</h5>
                                        <p>Total courses</p>
                                    </div>
                                </div>
                            </li>
                            <li class="single-list-inner style-box-bg">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{asset('front/assets/img/icon/3.png')}}" alt="img">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h5><span class="counter">1340</span>+</h5>
                                        <p>Successful students</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter area end -->

    <!-- team area start -->
    <div class="team-area pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title text-center">
                        <h6 class="sub-title double-line">Meet Our Team</h6>
                        <h2 class="title">Our Creative Team</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single-team-inner">
                        <div class="thumb">
                            <img src="{{asset('front/assets/img/team/1.png')}}" alt="img">
                            <div class="social-wrap">
                                <div class="social-wrap-inner">
                                    <a class="social-share" href="#"><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="details">
                            <h4><a href="#">Doris Jordan</a></h4>
                            <span>Design Expert</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-team-inner">
                        <div class="thumb">
                            <img src="{{asset('front/assets/img/team/2.png')}}" alt="img">
                            <div class="social-wrap">
                                <div class="social-wrap-inner">
                                    <a class="social-share" href="#"><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="details">
                            <h4><a href="#">Eugen Freman</a></h4>
                            <span>Executive</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-team-inner">
                        <div class="thumb">
                            <img src="{{asset('front/assets/img/team/3.png')}}" alt="img">
                            <div class="social-wrap">
                                <div class="social-wrap-inner">
                                    <a class="social-share" href="#"><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="details">
                            <h4><a href="#">Jaction Leo</a></h4>
                            <span>Developer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team area end -->



@endsection
