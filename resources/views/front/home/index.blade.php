@extends('layouts.front.master-1')
@php $seo = \App\Models\SeoTable::where('name','main')->first(); @endphp
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
@section('title') ISS Agency @endsection
@section('main')
    <!-- Button trigger modal start-->
    <button style="display: none;" type="button" id="modal-alert-button2" class="btn btn-primary" data-toggle="modal"
            data-target="#exampleModalCenter2">
        Launch demo modal
    </button>
    <!-- Button trigger modal end-->

    <!-- Modal Video start-->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-width" role="document">
            <div style="padding: 0 10px 10px 10px" class="modal-content">
                <div id="modal-header" class="modal-header">
                    <h5 style="margin: 0" id="exampleModalLongTitle2"></h5>
                    <button onclick="document.getElementById('video').pause()" type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <video id="video" class="d-block w-100" autoplay controls>
                    <source id="source-1" src="" type="video/mp4">
                    <source id="source-2" src="" type="video/ogg">
                    Your browser does not support HTML video.
                </video>
            </div>

        </div>
    </div>
    <!-- Modal Video end-->
    <!-- banner start -->
    <div class="banner-area banner-area-2" style="background-image: url(@if($main_header->background_image)
    {{ $main_header->background_image->getUrl() }}
    @endif());">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 align-self-center">
                    <div class="banner-inner style-white text-center text-lg-left">
                        <h6 class="b-animate-1 sub-title">{{isset($main_header['slogan_'.$locale])?$main_header['slogan_'.$locale]:''}}</h6>
                        <h1 class="b-animate-2 title">{{isset($main_header['title_'.$locale])?$main_header['title_'.$locale]:''}}</h1>
                        <a class="btn btn-base b-animate-3 mr-sm-3 mr-2"
                           href="{{route('programs',$locale)}}">{{__('Admission')}}</a>
                        <a class="btn btn-border-white b-animate-3"
                           href="{{route('contact',$locale).'#contact-form'}}">{{__('Apply')}}</a>
                    </div>
                </div>
                @if($videos->count() > 0)

                    <div class="col-lg-4 video-slider">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div style="border-radius: 10px" class="carousel-inner">
                                @php $item = 0; @endphp
                                @foreach($videos as $video)

                                    <div class="carousel-item @if($item == 0) active @endif">
                                        <video data-title="{{$video['title_'.$locale]}}"
                                               onclick="playVideo(this.getElementsByTagName('source')[0].src,this.dataset.title);"
                                               width="400"
                                               class="d-block w-100" autoplay loop muted>
                                            <source src="{{$video->file->getUrl()}}" type="video/mp4">
                                            <source src="{{$video->file->getUrl()}}" type="video/ogg">
                                            {{__('Your browser does not support HTML video.')}}
                                        </video>
                                    </div>
                                    @php $item = $item + 1; @endphp

                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- intro start -->
    <div class="intro-area intro-area--top">
        <div class="container">
            <div class="intro-area-inner-2">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center">
                            <h6 class="sub-title double-line">{{__('Education')}}</h6>
                            <h2 class="title">{{__('Directions')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($home_direction_sections_1 as $home_direction_section)
                        <div class="col-md-4">
                            <div class="single-intro-inner style-thumb text-center">
                                <div class="thumb">
                                    <img src="{{$home_direction_section->image->getUrl()}}" alt="img">
                                </div>
                                <div class="details">
                                    <h5>{{$home_direction_section['name_'.$locale]}}</h5>
                                    <p>{{$home_direction_section['short_description_'.$locale]}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="intro-footer bg-base">
                    <div class="row">
                        @foreach($home_direction_sections_2 as $home_direction_section)

                            <div class="col-md-4">
                                <div class="single-list-inner">
                                    <div class="media">
                                        <div class="media-left">
                                            <img
                                                src="{{asset('front/assets/img/icon/'.($home_direction_section->number+15).'.png')}}"
                                                alt="img">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <h5>{{$home_direction_section['name_'.$locale]}}</h5>
                                            <p>{{$home_direction_section['short_description_'.$locale]}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- intro end -->

    <!-- course area start -->
    <div class="course-area pd-top-110 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h6 class="sub-title double-line">{{__('Chosen_programs')}}</h6>
                        <h2 class="title">{{__('Popular_programs')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($universities as $university)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-course-inner style-two">
                            <div
                                style="background-image: url({{ $university->country->image->getUrl() ?? '' }}); background-size: cover;
                                    background-position: left;
                                    " class="emt-thumb-icon">
                                <img style="opacity: 0;" src="{{asset('front/assets/img/icon/10.png')}}" alt="img">
                            </div>
                            <div class="thumb"
                                 style="background-image: url({{ $university->image->getUrl() ?? '' }}); background-size: cover;
                                     background-position: center center;">
                                <img style="opacity: 0" src="{{asset('front/assets/img/course/2.png')}}" alt="img">
                            </div>
                            <div class="details">
                                <div class="emt-course-meta border-0">
                                    <div class="row">
                                        <div class="col-10">
                                            <h6>
                                                <a href="{{route('program-details',['id'=>$university->id,'lang'=>$locale])}}">{{ $university['name_'.$locale] }}</a>
                                            </h6>
                                        </div>
                                        <div class="col-2 text-right">
                                            <a class="arrow-right"
                                               href="{{route('program-details',['id'=>$university->id,'lang'=>$locale])}}"><img
                                                    src="{{asset('front/assets/img/icon/5.png')}}" alt="img"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- course area end -->

    <!--client-area start-->
    <div class="client-area bg-base pd-top-100 pd-bottom-100"
         style="background-image: url({{asset('front/assets/img/institute/bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="institute-slider owl-carousel">
                        @foreach($universities as $university)
                            @if($university->university_logo->getUrl() !== null)
                                <div class="item">
                                    <img style="height: 100px" src="{{ $university->university_logo->getUrl() ?? ''  }}"
                                         alt="img">
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--client-area end-->

    <!-- testimonial area start -->
    <div class="testimonial-area pd-top-110 pd-bottom-120"
         style="background-image: url({{asset('front/assets/img/testimonial/bg.png')}}); background-size: cover; background-position: center;">
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
                            <p class="testimonial">{{$testimonial['text_'.$locale] ?? ''}}</p>
                            <div class="media testimonial-author">
                                <div
                                    style="background-image: url({{$testimonial->image->getUrl() ?? ''}}); background-size: cover;
                                        background-position: top" class="media-left">
                                    <img style="opacity: 0" src="{{asset('front/assets/img/testimonial/2.png')}}"
                                         alt="img">
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

    <!--blog-area start-->
    <div class="blog-area pd-top-110 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title text-center">
                        <h6 class="sub-title double-line">{{__('Latest News')}}</h6>
                        <h2 class="title">{{__('Our Insights & Articles')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($news as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-inner">
                            <div
                                style="background-image: url({{$blog->image->getUrl() ?? ''}}); background-size: cover; background-position: center center"
                                class="thumb">
                                <img style="opacity: 0" src="{{asset('front/assets/img/blog/1.png')}}" alt="img">
                                <span class="date">{{$blog->created_at->format('d.m.Y') ?? ''}}</span>
                            </div>
                            <div class="details">

                                <h5>
                                    <a href="{{route('news-details',['lang'=>$locale,'id'=>$blog->id])}}">{{$blog['title_'.$locale] ?? ''}}</a>
                                </h5>
                                <a class="read-more-text"
                                   href="{{route('news-details',['lang'=>$locale,'id'=>$blog->id])}}">{{__('READ MORE')}}
                                    <i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
    <!--blog-area end-->

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
                                <h3 class="left-val align-self-center"><span
                                        class="counter">{{$about_us->success_students}}</span>+</h3>
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
                                        <h5><span class="counter">{{\App\Models\University::all()->count()}}</span>+
                                        </h5>
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
                                <a class="btn btn-border-black"
                                   href="{{route('about',$locale)}}">{{__('Read More')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->
@endsection

@section('js')
    <script>
        $(document).ready(function () {

            var maxHeight = 0;

            $(".testimonial").each(function () {
                if ($(this).height() > maxHeight) {
                    maxHeight = $(this).height();
                }
            });

            $(".testimonial").height(maxHeight);

        });


        function playVideo(src, title) {
            document.getElementById('source-1').src = src;
            document.getElementById('source-2').src = src;
            document.getElementById('exampleModalLongTitle2').innerHTML = title;
            document.getElementById('modal-alert-button2').click();
            document.getElementById('video').load();
        }
    </script>
@endsection
