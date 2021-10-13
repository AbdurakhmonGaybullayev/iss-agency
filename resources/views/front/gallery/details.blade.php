@extends('layouts.front.master-2')


@section('php')
    $id = $album->id;
@endsection

@section('main')


    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url({{asset('front/assets/img/bg/3.png')}})">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">{{__('Gallery')}}</h2>
                    <ul class="page-list">
                        <li><a href="{{route('home',$locale)}}">{{__('Home')}}</a></li>
                        <li>{{__('Gallery')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- gallery area start -->
    <div class="team-area pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">

                @foreach($album->image as $image)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery-inner">
                            <div style="background-image: url({{$image->getUrl()}}); background-size: cover; background-position: center;" class="thumb">
                                <img style="opacity: 0;" src="{{asset('front/assets/img/gallery/1.png')}}" alt="img">
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- gallery area end -->

    <!-- counter area start -->
    <div class="counter-area bg-gray">
        <div class="container">
            <div class="counter-area-inner pd-top-120 pd-bottom-120"
                 style="background-image: url({{asset('front/assets/img/other/1.png')}});">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="section-title mb-0">
                            <h6 class="sub-title right-line">{{__('Funfact')}}</h6>
                            <h2 class="title">{{__('Strength in Numbers')}}</h2>
                            <p class="content pb-3">The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax
                                quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz,
                                bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs
                                jumpy</p>
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

    <!-- testimonial area start -->
    <div class="testimonial-area pd-top-110 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-11">
                    <div class="section-title text-center">
                        <h6 class="sub-title double-line">{{__('Testimonials')}}</h6>
                        <h2 class="title">{{__('What_our_clients_say')}} </h2>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider-2 owl-carousel">
                @foreach($testimonials as $testimonial)
                    <div class="item">
                        <div class="single-testimonial-inner">
                            <span class="testimonial-quote"><i class="fa fa-quote-right"></i></span>
                            <p>{{$testimonial['text_'.$locale] ?? ''}}</p>
                            <div class="media testimonial-author">
                                <div style="background-image: url({{$testimonial->image->getUrl() ?? ''}}); background-size: cover;
                                    background-position: top" class="media-left">
                                    <img style="opacity: 0" src="{{asset('front/assets/img/testimonial/2.png')}}" alt="img">
                                </div>
                                <div class="media-body align-self-center">
                                    <h6>{{$testimonial->name ?? ''}}</h6>
                                    <p>{{$testimonial['occupation_'.$locale] ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- testimonial area end -->


@endsection
