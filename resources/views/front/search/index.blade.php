@extends('layouts.front.master-2')

@section('main')

    <!-- blog area start -->
    <div style="margin-top: 100px" class="blog-area pd-top-120 pd-bottom-120">
        <div class="container">


            <div class="row">
                <div class="col-lg-12">
                    <form class="contact-form-inner  mt-5 mt-md-0" method="get" action="{{route('search',$locale)}}">
                        <div class="row">
                            <div style="margin-left: 2px; margin-right: -2px" class="col-lg-10">
                                <div class="single-input-inner style-bg-border">
                                    <input name="search" value="@if(isset($_GET['search']) && $_GET['search'] != '') {{$_GET['search']}} @endif" type="text" placeholder="{{__("Search...")}}">
                                </div>
                            </div>
                            <div style="" class="col-lg-2">
                                <div style="width: 100%" class="single-input-inner style-bg-border">
                                    <button style="width: 100%; padding: 0" type="submit" class="btn btn-base"><i
                                            class="fa fa-search"></i> {{__("Search")}}</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    @php


                        use App\Models\News;use App\Models\QandA;

$items_per_page = 6;

            if (isset($_GET['search']) && $_GET['search'] != ''){

                $universities = \App\Models\University::join('countries', 'countries.id', 'universities.country_id')
                    ->join('direction_university', 'direction_university.university_id', 'universities.id')
                    ->join('directions', 'directions.id', 'direction_university.direction_id')
                    ->join('direction_programm', 'direction_programm.direction_id', 'direction_university.direction_id')
                    ->join('programms', 'programms.id', 'direction_programm.programm_id')
                    ->where('universities.name_uz', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('universities.name_en', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('universities.name_ru', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('universities.ielts', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('universities.short_description_en', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('universities.short_description_ru', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('universities.short_description_uz', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('universities.price', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('countries.name_uz', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('countries.name_ru', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('countries.name_en', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('directions.name_uz', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('directions.name_ru', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('directions.name_en', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('programms.name_en', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('programms.name_uz', 'like', '%' . $_GET['search'] . '%')
                    ->orWhere('programms.name_ru', 'like', '%' . $_GET['search'] . '%')
                    ->select('universities.*')
                    ->distinct('universities.id')
                    ->orderBy('universities.top', 'desc')
                    ->orderBy('universities.number', 'desc');

                    $universities_count = $universities->count();

                    $universities = $universities->paginate($items_per_page);

                    @endphp
                    @if($universities->count() != 0)
                        <h3>{{__('Universities')}}</h3>
                        @foreach($universities as $university)

                            <div style="margin: 0 1px 50px 1px" class="single-blog-inner style-border row">
                                <div
                                    style="padding: 0;background-image: url({{$university->image->getUrl()}}); background-size: cover; background-position: center;"
                                    class="thumb col-lg-4">
                                    <img style="opacity: 0;height: 100%" src="{{asset('front/assets/img/blog/5.png')}}"
                                         alt="img">
                                </div>
                                <div class="details col-lg-8">
                                    <h3 class="title"><a
                                            href="{{route('program-details',['lang'=>$locale,'id'=>$university->id])}}">{{$university['name_'.$locale]}}</a>
                                    </h3>
                                    <p>{{substr($university['short_description_'.$locale],0,70).'...'}}</p>


                                    <div class="rating">
                                        <b>{{__('Price')}}:</b> <span>$ {{$university->price}}</span>
                                    </div>
                                    <div class="rating">
                                        <b>{{__('Country')}}:</b> <span>{{$university->country['name_'.$locale]}}</span>
                                    </div>

                                    <a class="read-more-text"
                                       href="{{route('program-details',['lang'=>$locale,'id'=>$university->id])}}">{{__('READ MORE')}}
                                        <i class="fa fa-angle-right"></i></a>

                                </div>
                            </div>

                        @endforeach
                    @endif
                    @php


                        $news_results = News::where('title_en', 'like', '%' . $_GET['search'] . '%')
                            ->orWhere('title_ru', 'like', '%' . $_GET['search'] . '%')
                            ->orWhere('title_uz', 'like', '%' . $_GET['search'] . '%')
                            ->orWhere('short_description_en', 'like', '%' . $_GET['search'] . '%')
                            ->orWhere('short_description_ru', 'like', '%' . $_GET['search'] . '%')
                            ->orWhere('short_description_uz', 'like', '%' . $_GET['search'] . '%');

                            $news_results_count = $news_results->count();
                            $news_results = $news_results->paginate($items_per_page);

                    @endphp

                    @if($news_results->count() != 0)
                        <h3>{{__('News')}}</h3>
                        @foreach($news as $blog)

                            <div style="margin: 0 1px 50px 1px" class="single-blog-inner style-border row">
                                <div
                                    style="padding: 0;background-image: url({{$blog->image->getUrl()}}); background-size: cover; background-position: center;"
                                    class="thumb col-lg-4">
                                    <img style="opacity: 0;height: 100%" src="{{asset('front/assets/img/blog/5.png')}}"
                                         alt="img">
                                </div>
                                <div class="details col-lg-8">
                                    <ul class="blog-meta">
                                        <li><i class="fa fa-calendar-check-o"></i> {{$blog->created_at}}</li>
                                    </ul>
                                    <h3 class="title"><a
                                            href="{{route('news-details',['lang'=>$locale,'id'=>$blog->id])}}">{{$blog['title_'.$locale]}}</a>
                                    </h3>
                                    <p>{{substr($blog['short_description_'.$locale].'...',0,70)}}</p>
                                    <a class="read-more-text"
                                       href="{{route('news-details',['lang'=>$locale,'id'=>$blog->id])}}">{{__('READ MORE')}}
                                        <i
                                            class="fa fa-angle-right"></i></a>
                                </div>
                            </div>

                        @endforeach
                    @endif
                    @php

                        $faqs = QandA::where('question_uz','like','%' . $_GET['search'] . '%')
                            ->orWhere('question_ru', 'like', '%' . $_GET['search'] . '%')
                            ->orWhere('question_en', 'like', '%' . $_GET['search'] . '%');

                            $faqs_count = $faqs->count();
                            $faqs = $faqs->paginate($items_per_page);
                    @endphp
                    @if($faqs->count() != 0)
                        <h3>{{__('Faq')}}</h3>
                        @foreach($faqs as $question)

                            <div style="margin: 0 1px 50px 1px" class="single-blog-inner style-border row">
                                <div class="details col-lg-12">
                                    <h5 class="title">{{$question['question_'.$locale]}}</h5>
                                    <p>{{$question['answer_'.$locale]}}</p>
                                </div>
                            </div>

                        @endforeach
                    @endif
                    @if($universities->count() == 0 && $news_results->count() == 0 && $faqs->count() == 0)

                        <h3>{{__("No Results!")}}</h3>

                    @endif
                    @php

                    $paginations = ['universities'=>ceil($universities_count/$items_per_page),'news'=> ceil($news_results_count/$items_per_page),'faqs'=>ceil($faqs_count/$items_per_page)];

                    $max = max($paginations);

                    if ($max > 1){
                         if ($paginations['universities'] == $max){
                           echo $universities->appends(request()->input())->links('layouts.pagination.index',['query'=>$universities]);
                        }elseif ($paginations['news'] == $max){
                           echo $news->appends(request()->input())->links('layouts.pagination.index',['query'=>$news]);
                        }elseif ($paginations['faqs'] == $max){
                           echo $faqs->appends(request()->input())->links('layouts.pagination.index',['query'=>$faqs]);
                        }
                    }
}
                    @endphp


                </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->

@endsection
