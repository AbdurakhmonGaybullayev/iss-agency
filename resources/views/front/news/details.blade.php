@extends('layouts.front.master-2')
@section('title')
    {{$details['title_'.$locale]}}
@endsection
@section('meta')
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <meta property="og:url" content="{{URL::full()}}">
    <meta property="og:title" content="{{$details['title_'.$locale]}} - issagency.uz">
    <meta property="og:description" content="{{$details['short_description_'.$locale]}}">
    <meta property="og:image" content="{{$details->image->getUrl()}}">
    <meta property="og:type" content="article">
    <meta name="description" content="{{$details->image->getUrl()}}">
    <meta name="keywords" content="{{$details['seo_keywords_'.$locale]}}">

@endsection
@section('main')
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url({{$details->image->getUrl()}}); background-size: cover;
        background-position: center;">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">{{$details['title_'.$locale]}}</h2>
                    <ul class="page-list">
                        <li><a href="{{route('home',$locale)}}">{{__("Home")}}</a></li>
                        <li><a href="{{route('news',$locale)}}">{{__('News')}}</a></li>
                        <li>{{$details['title_'.$locale]}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- blog area start -->
    <div class="blog-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-page-content">
                        <div class="single-blog-inner">
                            <div class="thumb">
                                <img src="{{$details->image->getUrl()}}" alt="img">
                            </div>
                            <div class="details">
                                <ul class="blog-meta">
                                    <li><i class="fa fa-calendar-check-o"></i> {{$details->created_at}}</li>
                                </ul>
                                <h3 class="title">{{$details['title_'.$locale]}}</h3>
                                <div>@php echo $details['article_'.$locale] @endphp</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="td-sidebar">
                        <div class="widget widget_search">
                            <form class="search-form">
                                <div class="form-group">
                                    <input type="text" placeholder="Search">
                                </div>
                                <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget widget-recent-post">
                            @if($news->count() != 0)
                                <h4 class="widget-title">{{__('Recent News')}}</h4>
                                <ul>
                                    @endif
                                    @foreach($news as $blog)
                                        <li>
                                            <div class="media">
                                                <div
                                                    style="background-image: url({{$blog->image->getUrl()}}); background-size: cover; background-position: center;"
                                                    class="media-left">
                                                    <img style="opacity: 0;"
                                                         src="{{asset('front/assets/img/widget/1.png')}}" alt="blog">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h5 class="title"><a
                                                            href="{{route('news-details',['lang'=>$locale,'id'=>$blog->id])}}">{{$blog['title_'.$locale]}}</a></h5>
                                                    <div class="post-info"><i
                                                            class="fa fa-calendar"></i><span>{{$blog->created_at}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->
@endsection
