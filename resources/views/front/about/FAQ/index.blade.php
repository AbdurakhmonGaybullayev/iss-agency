@extends('layouts.front.master-2')

@section('main')

    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url({{asset('front/assets/img/bg/3.png')}})">
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
                            <h5>{{$faq->question}}</h5>
                            <p>{{$faq->answer}}</p>
                        </div>
                    </div>
                </div>
                @endforeach


                <div class="col-12">
                    <nav class="td-page-navigation text-center">
                        <ul class="pagination">
                            <li
                            @if ($faqs->onFirstPage())
                                style="display: none"
                            @endif

                            class="pagination-arrow"><a href="

                            @if(!$faqs->onFirstPage())
                                   {{ $faqs->previousPageUrl() }}
                            @endif
                            "><i class="fa fa-angle-double-left"></i></a></li>

                            <li
                                @if(!$faqs->hasMorePages())
                                    style="display: none"
                                @endif
                                class="pagination-arrow"><a href="
                            @if ($faqs->hasMorePages())
                                {{ $faqs->nextPageUrl() }}
                            @endif
                                "><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- event area end -->

@endsection
