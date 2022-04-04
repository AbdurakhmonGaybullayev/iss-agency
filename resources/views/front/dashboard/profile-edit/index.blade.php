
@extends('layouts.front.master-2')

@section('main')

    <!-- signup-page-Start -->
    <div style="padding-top: 210px" class="signup-page-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h3 style="padding-bottom: 10px; text-align: center; width: 100%">{{__("Edit Profile")}}</h3>
                    <form class="signin-inner" method="post" action="{{route('profile-edit',$locale)}}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" value="{{\Illuminate\Support\Facades\Auth::user()->first_name}}" name="first_name" placeholder="{{__("First Name")}}">
                                    @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" value="{{\Illuminate\Support\Facades\Auth::user()->last_name}}" name="last_name" placeholder="{{__("Last Name")}}">
                                    @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" value="{{\Illuminate\Support\Facades\Auth::user()->middle_name}}" name="middle_name" placeholder="{{__("Middle Name")}}">
                                    @error('middle_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" value="{{\Illuminate\Support\Facades\Auth::user()->phone_number}}" name="phone_number" placeholder="{{__("Phone Number")}}">
                                    @error('phone_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <select name="region_id">
                                        <option value="" disabled selected>{{__('Region')}}</option>
                                        @foreach(\App\Models\Branch::REGION_SELECT as $key => $region)
                                            <option value="{{$key}}" @php $city = explode('-', $region['city']); @endphp @if($key==\Illuminate\Support\Facades\Auth::user()->region) selected @endif> @if($locale == 'uz'){{$city[0]}}@elseif($locale == 'ru') {{$city[1]}} @elseif($locale == 'en') {{$city[2]}} @endif</option>
                                        @endforeach
                                        @error('region_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <select name="branch_id">
                                        <option value="" disabled selected>{{__('Which branch is comfortable for you?')}}</option>
                                        @foreach($branches as $branch)
                                            <option value="{{$branch->id}}" @if($branch->id == \Illuminate\Support\Facades\Auth::user()->branch_id) selected @endif >{{$branch['name_'.$locale]}}</option>
                                        @endforeach
                                        @error('branch_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" name="email" placeholder="{{__("Email")}}">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <button type="submit" class="btn btn-base w-100">{{__('Edit')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- signup-page-end -->
@endsection
