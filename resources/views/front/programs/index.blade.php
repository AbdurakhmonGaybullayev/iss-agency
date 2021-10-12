@extends('layouts.front.master-2')

@section('main')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>

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
                                    <div
                                        style="background-image: url({{$university->image->getUrl()}}); background-size: cover; background-position: center;"
                                        class="thumb">
                                        <a href="{{route('program-details',['lang'=>$locale,'id'=>$university->id])}}"><img
                                                style="opacity: 0;" src="{{asset('front/assets/img/course/2.png')}}"
                                                alt="img"></a>
                                    </div>
                                    <div class="details">
                                        <div class="details-inner">
                                            <div class="emt-user">
                                                <span class="u-thumb"
                                                      style="background-image: url({{$university->country->image->getUrl()}}); background-size: cover; background-position: left;"><img
                                                        style="opacity: 0;"
                                                        src="{{asset('front/assets/img/author/2.png')}}"
                                                        alt="img"></span>
                                                <span
                                                    class="align-self-center">{{$university->country['name_'.$locale]}}</span>
                                            </div>
                                            <h6>
                                                <a href="{{route('program-details',['lang'=>$locale,'id'=>$university->id])}}">{{$university['name_'.$locale]}}</a>
                                            </h6>
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
                                <button class="btn btn-base w-100 mt-3" type="submit"><i class="fa fa-search"></i>
                                    SEARCH
                                </button>
                            </form>
                        </div>
                        <div class="widget widget_search_course">
                            <h4 class="widget-title">{{__('Filter')}}</h4>
                            <form class="search-form single-input-inner" method="get" action="{{route('programs',$locale)}}">
                                <div class="single-input-inner style-bg-border">
                                    <label for="">Choose country</label>
                                    <select name="country">
                                        @foreach(\App\Models\Country::select('id','name_'.$locale)->get() as $country)
                                            <option value="{{$country->id}}">{{$country['name_'.$locale]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="single-input-inner style-bg-border">
                                    <label for="">Choose program</label>
                                    <select name="program">
                                        @foreach(\App\Models\Programm::select('id','name_'.$locale)->get() as $program)
                                            <option value="{{$program->id}}">{{$program['name_'.$locale]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="single-input-inner style-bg-border">
                                    <label for="">Choose direction</label>
                                    <select name="direction">
                                       @foreach(\App\Models\Direction::select('id','name_'.$locale)->get() as $direction)
                                            <option value="{{$direction->id}}">{{$direction['name_'.$locale]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="single-input-inner style-bg-border">
                                    <div class="range">
                                        <label for="">IELTS</label>

                                        <input style="border: none!important; padding: 0;" type="range" min="4.5" step="0.5" max="9" value="4.5" name="ielts">
                                        <div class="ticks">
                                            <!-- You could generate the ticks based on your min, max & step values. -->
                                            <span class="tick">All</span>
                                            <span class="tick">5</span>
                                            <span class="tick">5.5</span>
                                            <span class="tick">6</span>
                                            <span class="tick">6.5</span>
                                            <span class="tick">7</span>
                                            <span class="tick">7.5</span>
                                            <span class="tick">8</span>
                                            <span class="tick">8.5</span>
                                            <span class="tick">9</span>
                                        </div>
                                        <input id="ex16b" type="text"/><br/>
                                        <script>
                                            // Without JQuery
                                            var sliderB = new Slider("#ex16b", { min: 0, max: 10, value: [0, 10], focus: true });
                                        </script>
                                    </div>


                                </div>
                                <div class="widget widget_search_course">
                                    <h4 class="widget-title">Price</h4>
                                        <input type="text" name="price_from" placeholder="From">
                                        <input type="text" name="price_to" placeholder="To">
                                </div>
                                <!-- most basic, used for Knobs demo -->
                                <button class="btn btn-base w-100 mt-3" type="submit">{{__('Filter')}}</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->
@endsection
@section('js')
@endsection
