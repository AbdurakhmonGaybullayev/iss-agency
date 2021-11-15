@extends('layouts.front.master-2')

@section('main')

    <!-- signup-page-Start -->
    <div style="padding-top: 210px" class="signup-page-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12">
                    <h5 style="padding-bottom: 10px; text-align: center; width: 100%; font-weight: initial">{!! __("Choose Text") !!}</h5>
                    @csrf
                    <div class="row">

                        <div class="col-12 col-sm-6 mb-4">
                            <a href="{{route('sign-up-for-admission',['lang'=>$locale,'foradmission'=>$id])}}"><button type="button" class="btn btn-base w-100">{{__('Registration')}}</button></a>
                        </div>

                        <div class="col-12 col-sm-6 mb-4">
                            <a href="{{route('sign-in-for-admission',['lang'=>$locale,'foradmission'=>$id])}}"><button type="button" class="btn btn-base w-100">{{__('Login')}}</button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- signup-page-end -->
@endsection
