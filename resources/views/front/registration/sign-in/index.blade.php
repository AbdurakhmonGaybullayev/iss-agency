@extends('layouts.front.master-2')
@php $seo = \App\Models\SeoTable::where('name','sign_in')->first(); @endphp
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

    <!-- signin-page-Start -->
    <div style="padding-top: 210px" class="signin-page-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <form class="signin-inner" method="post" action="{{route('sign-in',$locale)}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" name="foradmission" value="{{$foradmission}}" hidden>
                                    <input type="text" name="forcooperation" value="{{$forcooperation}}" hidden>
                                    <input type="email" value="{{old('email')}}" name="email" placeholder="Email">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <input type="password" name="password" placeholder="Password">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    @if(session()->has('incorrect'))
                                        <div class="alert alert-danger">{{ __(session()->get('incorrect')) }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <button type="submit" class="btn btn-base w-100">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- signin-page-end -->
@endsection
