@extends('layouts.front.master-2')

@section('main')
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url({{asset('front/assets/img/bg/3.png')}})">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">{{__('News')}}</h2>
                    <ul class="page-list">
                        <li><a href="{{route('home',$locale)}}">{{__('Home')}}</a></li>
                        <li>{{__('News')}}</li>
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
                @foreach($news as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-inner style-border">
                            <div style="background-image: url({{$blog->image->getUrl()}}); background-size: cover; background-position: center;" class="thumb">
                                <img style="opacity: 0;" src="{{asset('front/assets/img/blog/4.png')}}" alt="img">
                            </div>
                            <div class="details">
                                <ul class="blog-meta">
                                    <li><i class="fa fa-calendar-check-o"></i> {{$blog->created_at}}</li>
                                </ul>
                                <h5 class="title"><a href="{{route('news-details',['id'=>$blog->id,'lang'=>$locale])}}">{{$blog['title_'.$locale]}}</a></h5>
                                <p>{{substr($blog['short_description_'.$locale],0,70)}}</p>
                                <a class="read-more-text" href="{{route('news-details',['id'=>$blog->id,'lang'=>$locale])}}">{{__('READ MORE')}} <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-12 text-center">
                    <nav class="td-page-navigation">
                        <ul class="pagination">
                            <li class="pagination-arrow"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">3</a></li>
                            <li class="pagination-arrow"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->

@endsection
