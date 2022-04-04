@extends('layouts.front.master-2')
@php $seo = \App\Models\SeoTable::where('name','about_us')->first(); @endphp
@section('title')
    {{$seo['title_'.$locale]}}
@endsection
@section('meta')

    <meta property="og:url" content="{{URL::full()}}">
    <meta property="og:title" content="{{$seo['title_'.$locale]}}">
    <meta property="og:description" content="{{$seo['seo_description_'.$locale]}}">
    <meta property="og:image" content="{{$seo->image->getUrl()}}">
    <meta name="description" content="{{$seo->image->getUrl()}}">
    @php $keywords = ''; @endphp @foreach($faqs as $faq) @if($faq['seo_keywords_'.$locale] != '')@php $keywords = $keywords . ',' . $faq['seo_keywords_'.$locale] @endphp @endif @endforeach
    <meta name="keywords" content="{{$seo['seo_keywords_'.$locale]}},{{trim($keywords,',')}}">

@endsection

@section('main')

    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay"
         style="background-image:url({{\App\Models\Header::first()->faq->getUrl()}}); background-size: cover;
             background-position: center;">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">{{__('FAQ')}}</h2>
                    <ul class="page-list">
                        <li><a href="{{route('home',$locale)}}">{{__('Home')}}</a></li>
                        <li>{{__('FAQ')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- event area start -->
    <div class="event-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row">
                @foreach($faqs as $faq)
                    <div class="col-lg-12">
                        <div class="media single-event-inner">

                            <div class="media-body details">
                                <h5>{{$faq['question_'.$locale]}}</h5>
                                <p>{{$faq['answer_'.$locale]}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="col-12">
                    {{$faqs->links('layouts.pagination.index',['query'=>$faqs])}}
                </div>
            </div>
        </div>
    </div>
    <!-- event area end -->

@endsection
