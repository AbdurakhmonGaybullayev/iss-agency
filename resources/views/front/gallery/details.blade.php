@extends('layouts.front.master-2')
@section('title')
    {{$album['title_'.$locale]}}
@endsection
@section('meta')

    <meta property="og:url" content="{{URL::full()}}">
    <meta property="og:title" content="{{$album['title_'.$locale]}}">
    <meta property="og:description" content="{{$album['short_description_'.$locale]}}">
    <meta property="og:image" content="{{$album->cover->getUrl()}}">
    <meta name="description" content="{{$album->cover->getUrl()}}">
    <meta name="keywords" content="{{$album['seo_keywords_'.$locale]}}">

@endsection
@section('css-up')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
@endsection
@section('main')


    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url({{\App\Models\Header::first()->gallery->getUrl()}}); background-size: cover;
        background-position: center;">
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

                <div class="photo-gallery">
                    <div class="container">
                        <div class="intro">
                            <h2 class="text-center">Lightbox Gallery</h2>
                        </div>
                        <div class="row photos">
                            @foreach($album->image as $image)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-gallery-inner">
                                        <a href="{{$image->getUrl()}}" data-lightbox="photos">
                                            <div style="background-image: url({{$image->getUrl()}}); background-size: cover; background-position: center;" class="thumb details-image">
                                                <img style="opacity: 0;" src="{{asset('front/assets/img/gallery/1.png')}}" alt="img">
                                        </div>
                                        </a>
                                    </div>
                                </div>


                            @endforeach
                        </div>
                    </div>
                </div>

    </div>
    <!-- gallery area end -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>


@endsection
