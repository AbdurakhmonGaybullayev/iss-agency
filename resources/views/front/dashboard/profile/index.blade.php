@extends('layouts.front.master-2')

@section('main')

    <!-- Button trigger modal -->
    <button style="display: none;" type="button" id="modal-alert-button" class="btn btn-primary" data-toggle="modal"
            data-target="#exampleModalCenter">
        Launch demo modal
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="margin: 0" id="exampleModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- signup-page-Start -->
    <div style="padding-top: 210px" class="signup-page-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h3 style="padding-bottom: 10px; text-align: center; width: 100%">{{__("Profile")}}</h3>
                    <form class="signin-inner">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <label>{{__('First Name')}}</label>
                                    <input type="text" value="{{\Illuminate\Support\Facades\Auth::user()->first_name}}"
                                           readonly>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <label>{{__('Last Name')}}</label>
                                    <input type="text" value="{{\Illuminate\Support\Facades\Auth::user()->last_name}}"
                                           readonly>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <label>{{__('Middle Name')}}</label>
                                    <input type="text" value="{{\Illuminate\Support\Facades\Auth::user()->middle_name}}"
                                           readonly>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <label>{{__('Phone Number')}}</label>
                                    <input type="text"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->phone_number}}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <label>{{__('Region')}}</label>
                                    <input type="text"
                                           value="@php $region = \App\Models\Branch::REGION_SELECT; $city = explode('-', $region[\Illuminate\Support\Facades\Auth::user()->region]['city']); @endphp @if($locale == 'uz'){{$city[0]}}@elseif($locale == 'ru') {{$city[1]}} @elseif($locale == 'en') {{$city[2]}} @endif"
                                           readonly>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="single-input-inner style-bg-border">
                                    <label>{{__('Branch')}}</label>
                                    @php $branch = \App\Models\Branch::where('id',\Illuminate\Support\Facades\Auth::user()->branch_id)->first(); @endphp
                                    <input type="text" value="{{$branch['name_'.$locale]}}" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <label>{{__('Email')}}</label>
                                    <input type="text" value="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                                           readonly>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <a href="{{route('profile-edit', $locale)}}">
                                    <button type="button" class="btn btn-base w-100">{{__('Edit Profile')}}</button>
                                </a>
                            </div>
                            <div class="col-12 mb-4">
                                <a href="{{route('password-edit', $locale)}}">
                                    <button type="button" class="btn btn-base w-100">{{__('Edit Password')}}</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- signup-page-end -->
@endsection

@section('js')
    <script>
    @php
        if (session()->has('success')){
              echo "document.getElementById('modal-alert-button').click(); document.getElementById('exampleModalLongTitle').style.color = 'green'; document.getElementById('exampleModalLongTitle').innerHTML = '".__(session()->get('success'))."';";
        }elseif (session()->has('fail')){
              echo "document.getElementById('modal-alert-button').click(); document.getElementById('exampleModalLongTitle').style.color = 'red'; document.getElementById('exampleModalLongTitle').innerHTML = '".__(session()->get('fail'))."';";
        }
    @endphp
    </script>
@endsection
