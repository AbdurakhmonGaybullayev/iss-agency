@extends('layouts.front.master-2')

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
