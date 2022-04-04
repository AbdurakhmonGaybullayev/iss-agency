@extends('layouts.front.master-2')
@php $seo = \App\Models\SeoTable::where('name','programs')->first(); @endphp
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>

    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay"
         style="background-image:url({{\App\Models\Header::first()->programs->getUrl()}}); background-size: cover;
             background-position: center;">
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
                        @if($universities->count() == 0)
                            <h3 style="text-align: center; width: 100%">{{__('Universities Not Found!')}}</h3>
                            @endif
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
                                                    <a href="{{route('programs',$locale).'?country='.$university->country->id}}"><span class="u-thumb"
                                                      style="background-image: url({{$university->country->country_logo->getUrl()}}); background-size: cover; background-position: left;"><img
                                                        style="opacity: 0;"
                                                        src="{{asset('front/assets/img/author/2.png')}}"
                                                        alt="img"></span>
                                                    <span
                                                        class="align-self-center">{{$university->country['name_'.$locale]}}</span></a>
                                                </div>
                                                <h6>
                                                    <a href="{{route('program-details',['lang'=>$locale,'id'=>$university->id])}}">{{$university['name_'.$locale]}}</a>
                                                </h6>
                                            </div>
                                            <div class="emt-course-meta">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="rating">
                                                            <a href="{{route('programs',$locale).'?ielts='.$university->ielts}}">IELTS: <span>{{$university->ielts}}</span></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="price text-right">
                                                            {{__('Ranking')}}: <span>{{$university->rank}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="price text-right">
                                                            {{__('Price')}}: <span>${{$university->price}}</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                    {{$universities->links('layouts.pagination.index',['query'=>$universities])}}
                </div>
                <div class="col-lg-4 order-lg-1 col-12">
                    <div class="td-sidebar mt-5 mt-lg-0">
                        <div class="widget widget_search_course">
                            <h4 class="widget-title">{{__("Search")}}</h4>
                            <form action="{{route('programs',$locale)}}" method="get"
                                  class="search-form single-input-inner">
                                <input type="text" name="search"
                                       value="{!! isset($_GET['search']) ? $_GET['search'] : '' !!}"
                                       placeholder="{{__('Search here')}}">
                                <button class="btn btn-base w-100 mt-3" type="submit"><i class="fa fa-search"></i>
                                    {{strtoupper(__("Search"))}}
                                </button>
                            </form>
                        </div>
                        <div class="widget widget_search_course">
                            <h4 class="widget-title">{{__('Filter')}}</h4>
                            <form class="search-form single-input-inner" method="get" action="">
                                <div class="single-input-inner style-bg-border">
                                    <label for="">{{__('Choose country')}}</label>
                                    <select name="country">
                                        <option value="" disabled selected>{{__('Choose country')}}</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}"
                                                    @if(isset($_GET['country']) && $_GET['country'] == $country->id) selected @endif>{{$country['name_'.$locale]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="single-input-inner style-bg-border">
                                    <label for="">{{__('Choose program')}}</label>
                                    <select id="program" name="program">
                                        <option value="" disabled selected>{{__('Programs')}}</option>
                                        @foreach($programs_filter as $key => $program)
                                            <option data-name="{{$program['name_uz']}}"
                                                    value="{{$program->id}}"
                                                    @if(isset($_GET['program']) && $_GET['program'] == $program->id) selected @endif>{{$program['name_'.$locale]}}</option>
                                        @endforeach
                                        @error('program')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>
                                <div class="single-input-inner style-bg-border">
                                    <label for="">{{__('Choose direction')}}</label>
                                    <select id="direction" name="direction">
                                        <option value="" disabled selected>{{__('Directions')}}</option>
                                    </select>
                                </div>
                                {{--                                <h4 class="widget-title">{{__('Language Certificate')}}</h4>--}}
                                {{--                                <div class="single-input-inner style-bg-border">--}}
                                {{--                                    <label for="">{{__('Choose certificate')}}</label>--}}
                                {{--                                    <select name="region">--}}
                                {{--                                        <option value="volvo">Volvo</option>--}}
                                {{--                                        <option value="saab">Saab</option>--}}
                                {{--                                        <option value="mercedes">Mercedes</option>--}}
                                {{--                                        <option value="audi">Audi</option>--}}
                                {{--                                    </select>--}}
                                {{--                                </div>--}}
                                <div class="single-input-inner style-bg-border">
                                    <div class="range">
                                        <label for="">IELTS</label>

                                        <input name="ielts" style="border: none!important; padding: 0;" type="range"
                                               min="4.5" step="0.5" max="9.5"
                                               value="{!! isset($_GET['ielts']) ? $_GET['ielts'] : '4' !!}">
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
                                            <span class="tick">No</span>

                                        </div>
                                        <input id="ex16b" type="text"/><br/>
                                        <script>
                                            // Without JQuery
                                            var sliderB = new Slider("#ex16b", {
                                                min: 0,
                                                max: 10,
                                                value: [0, 10],
                                                focus: true
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="single-input-inner style-bg-border">
                                    <label for="">{{__('Choose ranking')}}</label>
                                    <br>
                                    <div style="width: 100%; display: inline-flex">
                                        <p style="width: 49%">{{__('From')}}:</p>
                                        <p style="width: 49%"> {{__("To")}}:</p>
                                    </div>
                                    <input style="width: 49%" type="number" name="rank_from" placeholder="{{__('From')}}:"
                                           value="{!! isset($_GET['rank_from']) ? $_GET['rank_from'] != '' ? $_GET['rank_from'] : 0 : $rank_from !!}">
                                    <input style="width: 49%" type="number" name="rank_to" placeholder="{{__('To')}}:"
                                           value="{!! isset($_GET['rank_to']) ? $_GET['rank_to'] != '' ? $_GET['rank_to'] : $rank_to : $rank_to !!}">
                                </div>
                                <div class="single-input-inner style-bg-border">
                                    <label for="">{{__('Choose price')}}</label>
                                    <br>
                                    <div style="width: 100%; display: inline-flex">
                                        <p style="width: 49%">{{__('From')}}:</p>
                                        <p style="width: 49%"> {{__("To")}}:</p>
                                    </div>
                                    <input style="width: 49%" type="number" name="price_from" placeholder="{{__('From')}}:"
                                           value="{!! isset($_GET['price_from']) ? $_GET['price_from'] != '' ? $_GET['price_from'] : 0 : $price_from !!}">
                                    <input style="width: 49%" type="number" name="price_to" placeholder="{{__('To')}}:"
                                           value="{!! isset($_GET['price_to']) ? $_GET['price_to'] != '' ? $_GET['price_to'] : $price_to : $price_to !!}">
                                </div>
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
    <script>
        @php
            $directions = \Illuminate\Support\Facades\DB::table('direction_university')->where('university_id','like','%%')->join('direction_programm','direction_university.direction_id','=','direction_programm.direction_id')->join('directions','directions.id','=','direction_programm.direction_id')->select('direction_programm.programm_id','direction_programm.direction_id','directions.name_en','directions.name_ru','directions.name_uz')->orderBy('direction_programm.programm_id', 'asc')->get()->unique();

            $program_ids = [];

            foreach ($directions as $direction){
                $program_ids[] = $direction->programm_id;
            }

            $program_ids = array_unique($program_ids);
        @endphp
        $(document).ready(function () {
            $("#program").change(function () {
                var val = $(this).val();
                var name = $(this).find(':selected').data('name');

                $("#direction").html("<option value='' disabled selected>{{__('Choose direction')}}</option>")

                @foreach($program_ids as $program_id)
                if (val == "{{$program_id}}") {
                    $("#direction").html($("#direction").html()+"@foreach($directions as $direction)@if($program_id == $direction->programm_id)<option value='{{$direction->direction_id}}'>@if($locale=='en'){{$direction->name_en}}@elseif($locale=='ru'){{$direction->name_ru}}@elseif($locale=='uz'){{$direction->name_uz}}@endif</option>@endif @endforeach");
                }
                @endforeach

            });

@if(isset($_GET['direction']))
            var val = $("#program").val();
            var name = $("#program").find(':selected').data('name');

            $("#direction").html("<option value='' disabled selected>{{__('Choose direction')}}</option>")

            @foreach($program_ids as $program_id)
            if (val == "{{$program_id}}") {
                $("#direction").html($("#direction").html()+"@foreach($directions as $direction)@if($program_id == $direction->programm_id)<option value='{{$direction->direction_id}}' @if($direction->direction_id == $_GET['direction']) selected @endif>@if($locale=='en'){{$direction->name_en}}@elseif($locale=='ru'){{$direction->name_ru}}@elseif($locale=='uz'){{$direction->name_uz}}@endif</option>@endif @endforeach");
            }
            @endforeach
@endif
        });
    </script>
@endsection
