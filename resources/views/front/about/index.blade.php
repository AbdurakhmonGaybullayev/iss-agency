@extends('layouts.front.master-2')
@php $seo = \App\Models\SeoTable::where('name','about_us')->first(); @endphp
@section('title')
    {{$seo['title_'.$locale]}}
@endsection
@section('meta')

    <meta property="og:url" content="{{URL::full()}}">
    <meta property="og:title" content="{{$seo['title_'.$locale]}}">
    <meta property="og:description" content="{{$seo['seo_description_'.$locale]}}">
    <meta property="og:image" content="{{$seo->image->getUrl()}}">
    <meta name="description" content="{{$seo->image->getUrl()}}">
    <meta name="keywords" content="{{$seo['seo_keywords_'.$locale]}}">

@endsection
@section('main')
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url({{\App\Models\Header::first()->about_us->getUrl()}}); background-size: cover;
        background-position: center;">
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
    <div style="padding-bottom: 120px" class="about-area pd-top-120">
        <div class="container">
            <div class="about-area-inner">
                <div class="row">
                    <div class="col-lg-6 col-md-10">
                        <div class="about-thumb-wrap after-shape"
                             style="background-image: url('{{$about_us->image->getUrl()}}');">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-inner-wrap">
                            <div class="section-title mb-0">
                                <h6 class="sub-title right-line">{{__('ABOUT US')}}</h6>
                                <h2 class="title">{{$about_us['title_'.$locale] ?? ''}}</h2>
                                <p class="content">{{$about_us['short_description_'.$locale] ?? ''}}</p>
                                @php $array = explode(',', $about_us['advantages_' .$locale]);@endphp

                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="single-list-wrap">
                                            @for($i = 0; $i < ceil(count($array)/2); $i++)

                                                <li class="single-list-inner style-check-box">
                                                    <i class="fa fa-check"></i> {{$array[$i]}}
                                                </li>

                                            @endfor

                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="single-list-wrap">
                                            @for($i = ceil(count($array)/2); $i < count($array); $i++)

                                                <li class="single-list-inner style-check-box">
                                                    <i class="fa fa-check"></i> {{$array[$i]}}
                                                </li>

                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                                <a class="btn btn-border-black" href="{{route('about',$locale)}}">{{__('Read More')}}</a>
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
            <div class="counter-area-inner pd-top-120 pd-bottom-120"
                 style="background-image: url({{asset('front/assets/img/other/1.png')}});">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="section-title mb-0">
                            <h6 class="sub-title right-line">{{__('Funfact')}}</h6>
                            <h2 class="title">{{__('Strength in Numbers')}}</h2>
                            <p class="content pb-3">{{$about_us['statistics_short_description_'.$locale] ?? ''}}</p>
                            <div class="btn-counter bg-base mt-4">
                                <h3 class="left-val align-self-center"><span class="counter">{{$about_us->success_students}}</span>+</h3>
                                <div class="right-val align-self-center">
                                    {{__('Successful')}} <br> {{__('Students')}}
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
                                        <h5><span class="counter">{{$bachelor}}</span>+</h5>
                                        <p>{{__('Bachelor')}}</p>
                                    </div>
                                </div>
                            </li>
                            <li class="single-list-inner style-box-bg">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{asset('front/assets/img/icon/2.png')}}" alt="img">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h5><span class="counter">{{$master}}</span>+</h5>
                                        <p>{{__('Master')}}</p>
                                    </div>
                                </div>
                            </li>
                            <li class="single-list-inner style-box-bg">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{asset('front/assets/img/icon/3.png')}}" alt="img">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h5><span class="counter">{{\App\Models\University::all()->count()}}</span>+</h5>
                                        <p>{{__('Universities')}}</p>
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
                        <h6 class="sub-title double-line">{{__('Meet Our Team')}}</h6>
                        <h2 class="title">{{__('Our Creative Team')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($staffs as $staff)
                <div class="col-lg-4 col-md-6">
                    <div class="single-team-inner">
                        <div style="background-image: url('{{$staff->photo->getUrl()}}'); background-size: cover;
                            background-position: center;" class="thumb">
                            <img style="opacity: 0" src="{{asset('front/assets/img/team/2.png')}}" alt="img">

                        </div>
                        <div class="details">
                            <h4>{{$staff['full_name_'.$locale]}}</h4>
                            <span>{{$staff['occupation_'.$locale]}}</span>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- team area end -->



@endsection
