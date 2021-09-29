@extends('layouts.front.master-2')

@section('main')
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url('{{asset('front/assets/img/bg/3.png')}}')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">{{__('Programs')}}</h2>
                    <ul class="page-list">
                        <li><a href="{{route('home',$locale)}}">{{__('Home')}}</a></li>
                        <li>{{__('Programs')}}</li>
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
                <div class="col-lg-8 order-lg-12">
                    <div class="row">
                        @foreach($universities as $university)
                        <div class="col-md-6">
                            <div class="single-course-inner">
                                <div style="background-image: url({{$university->image->getUrl()}}); background-size: cover; background-position: center;" class="thumb">
                                    <a href="{{route('program-details',['lang'=>$locale,'id'=>$university->id])}}"><img style="opacity: 0;" src="{{asset('front/assets/img/course/2.png')}}" alt="img"></a>
                                </div>
                                <div class="details">
                                    <div class="details-inner">
                                        <div class="emt-user">
                                            <span class="u-thumb" style="background-image: url({{$university->country->image->getUrl()}}); background-size: cover; background-position: left;"><img style="opacity: 0;" src="{{asset('front/assets/img/author/2.png')}}" alt="img"></span>
                                            <span class="align-self-center">{{$university->country['name_'.$locale]}}</span>
                                        </div>
                                        <h6><a href="{{route('program-details',['lang'=>$locale,'id'=>$university->id])}}">{{$university['name_'.$locale]}}</a></h6>
                                    </div>
                                    <div class="emt-course-meta">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="rating">
                                                    IELTS:<span>{{$university->ielts}}</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="price text-right">
                                                    Price: <span>${{$university->price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
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
                <div class="col-lg-4 order-lg-1 col-12">
                    <div class="td-sidebar mt-5 mt-lg-0">
                        <div class="widget widget_search_course">
                            <h4 class="widget-title">Search</h4>
                            <form class="search-form single-input-inner">
                                <input type="text" placeholder="Search here">
                                <button class="btn btn-base w-100 mt-3" type="submit"><i class="fa fa-search"></i> SEARCH</button>
                            </form>
                        </div>
                        <div class="widget widget_catagory">
                            <h4 class="widget-title">Catagory</h4>
                            <ul class="catagory-items">
                                <li><a href="#">Tempor lorem interdum <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="#">Auctor mattis lacus  <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="#">Dolor proin  <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="#">Pharetra amet <i class="fa fa-caret-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="widget widget_checkbox_list">
                            <h4 class="widget-title">Price</h4>
                            <label class="single-checkbox">
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                                Free Courses
                            </label>
                            <label class="single-checkbox">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                Paid Courses
                            </label>
                            <label class="single-checkbox">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                Only Subscription
                            </label>
                        </div>
                        <div class="widget widget_checkbox_list">
                            <h4 class="widget-title">Level</h4>
                            <label class="single-checkbox">
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                                Beginner
                            </label>
                            <label class="single-checkbox">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                Intermediate
                            </label>
                            <label class="single-checkbox">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                Advanced
                            </label>
                        </div>
                        <div class="widget widget_tags mb-0">
                            <h4 class="widget-title">Tags</h4>
                            <div class="tagcloud">
                                <a href="#">Art</a>
                                <a href="#">Creative</a>
                                <a href="#">Article</a>
                                <a href="#">Designer</a>
                                <a href="#">Portfolio</a>
                                <a href="#">Project</a>
                                <a href="#">Personal</a>
                                <a href="#">Landing</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->
@endsection
