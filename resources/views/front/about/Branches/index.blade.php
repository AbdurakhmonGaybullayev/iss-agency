@extends('layouts.front.master-2')
@php $seo = \App\Models\SeoTable::where('name','branches')->first(); @endphp
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


    <div class="breadcrumb-area bg-overlay" style="background-image:url('{{\App\Models\Header::first()->branches->getUrl()}}'); background-size: cover;
        background-position: center;">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">{{__('Branch')}}</h2>
                    <ul class="page-list">
                        <li><a href="{{route('home',$locale)}}">{{__('Home')}}</a></li>
                        <li>{{__('Branch')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- contact list start -->
    <div class="contact-list pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($branches as $branch)
                <div class="col-lg-4">
                    <div class="contact-list-inner">
                        <div class="media">
                            <div class="media-left">
                                <img src="{{asset('front/assets/img/icon/16.png')}}" alt="img">
                            </div>
                            <div onclick="document.getElementById('iframe').innerHTML = '{{$branch->google_map_link}}'" class="media-body align-self-center">
                                <h5>{{$branch['name_'.$locale]}}</h5>
                                <p><i class="fa fa-map-marker"></i> {{$branch['address_'.$locale]}}</p>
                                <p><i class="fa fa-phone"></i> {{$branch->phone_number}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- contact list end -->

    <!-- contact area start -->
    <div id="iframe" class="contact-g-map">
    </div>
    <!-- contact area end -->


@endsection
