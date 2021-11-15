@extends('layouts.front.master-2')

@section('main')

    <!-- signup-page-Start -->
    <div style="padding-top: 210px" class="signup-page-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h3 style="padding-bottom: 10px; text-align: center; width: 100%">{{__("Registration")}}</h3>
                    <form class="signin-inner" method="post" action="{{route('sign-up',$locale)}}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" name="foradmission" value="{{$foradmission}}" hidden>
                                    <input type="text" name="forcooperation" value="{{$forcooperation}}" hidden>
                                    <input type="text" value="{{old('first_name')}}" name="first_name" placeholder="{{__("First Name")}}">
                                    @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" value="{{old('last_name')}}" name="last_name" placeholder="{{__("Last Name")}}">
                                    @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" value="{{old('middle_name')}}" name="middle_name" placeholder="{{__("Middle Name")}}">
                                    @error('middle_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" value="{{old('phone_number')}}" name="phone_number" placeholder="{{__("Phone Number")}}">
                                    @error('phone_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <select name="region_id" required>
                                        <option value="" disabled selected>{{__('Region')}}</option>
                                        @foreach(\App\Models\Branch::REGION_SELECT as $key => $region)
                                            <option value="{{$key}}"  > @php $city = explode('-', $region['city']); @endphp @if($locale == 'uz'){{$city[0]}}@elseif($locale == 'ru') {{$city[1]}} @elseif($locale == 'en') {{$city[2]}} @endif</option>
                                        @endforeach
                                        @error('region_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <select name="branch_id" required>
                                        <option value="" disabled selected>{{__('Which branch is comfortable for you?')}}</option>
                                       @foreach($branches as $branch)
                                            <option value="{{$branch->id}}" @if($branch->id == old('branch_id')) selected @endif >{{$branch['name_'.$locale]}}</option>
                                        @endforeach
                                        @error('branch_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" value="{{old('email')}}" name="email" placeholder="{{__("Email")}}">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <input type="password" name="password" placeholder="{{__("Password")}}">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <input type="password" name="confirm_password" placeholder="{{__("Confirm Password")}}">
                                    @error('confirm_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <button type="submit" class="btn btn-base w-100">{{__('Registration')}}</button>
                            </div>
                            <div class="col-12 col-sm-6">
                                <span>Do you already have an account?</span>
                                <a href="{{route('sign-in',$locale)}}"><strong>{{__('Login')}}</strong></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- signup-page-end -->
@endsection
