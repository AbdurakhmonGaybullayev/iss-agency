@extends('layouts.front.master-2')
@php $seo = \App\Models\SeoTable::where('name','gallery')->first(); @endphp
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
        <div class="container">
            <div class="row justify-content-center">

                @foreach($gallery as $album)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery-inner">
                            <div style="background-image: url({{$album->cover->getUrl()}}); background-size: cover; background-position: center;" class="thumb">
                                <img style="opacity: 0;" src="{{asset('front/assets/img/gallery/1.png')}}" alt="img">
                            </div>
                            <div class="details">
                                <span>{{substr($album['short_description_'.$locale],0,65).'...'}}</span>
                                <h4><a href="{{route('gallery-detail',['lang'=>$locale,'id'=>$album->id])}}">{{$album['country']['name_'.$locale]}}</a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div style="width: 100%">
            <div style="margin: 0 auto; width: fit-content">
            {{$gallery->links('layouts.pagination.index',['query' => $gallery])}}
            </div>
            </div>
        </div>
    </div>
    <!-- gallery area end -->

@endsection
