@extends('layouts.front.master-2')

@section('main')
    <!-- signup-page-Start -->
    <div style="padding-top:210px;" class="signup-page-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12">

                    <h4 style="padding-bottom: 10px; text-align: center; width: 100%;">{{$document->university['name_'.$locale]}}</h4>
                    <form class="signin-inner" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <input required type="number" value="{{$document->university->id}}" name="university_id"
                                           hidden>
                                    <input required type="text" value="{{$document->university->name_en}}" name="university_name"
                                           hidden>
                                    <input required type="text"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->first_name}}"
                                           name="first_name" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <input required type="text"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->last_name}}"
                                           name="last_name" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <input required type="text"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->middle_name}}"
                                           name="middle_name" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <input required type="text"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->phone_number}}"
                                           name="phone_number" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <input required type="text"
                                           value="@php $city = explode('-', \App\Models\Branch::REGION_SELECT[\Illuminate\Support\Facades\Auth::user()->region]['city']); @endphp @if($locale == 'uz'){{$city[0]}}@elseif($locale == 'ru') {{$city[1]}} @elseif($locale == 'en') {{$city[2]}} @endif
                                               " name="region" readonly>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <input required type="text"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                                           name="email" readonly>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <input required type="text" value="{{ $document->programm->name_uz ?? '' }}"
                                           name="programm" placeholder="{{__('Program')}}" readonly>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="single-input-inner style-bg-border">
                                    <input required type="text" value="{{$document->direction['name_'.$locale]}}"
                                           name="direction" readonly>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div id="photo-div" class="single-input-inner style-bg-border">
                                    <label for="">{{__('Your Photo Show')}}</label><br>
                                    <img src="{{asset('storage/documents/'.$document->folder_name.'/photo/'.$document->photo)}}" id="photo-img" alt=""
                                         style="height: 100px; border-radius: .375rem; padding-bottom: 5px">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div id="photo-div" class="single-input-inner style-bg-border">
                                    <label for="">{{__('Your Passport Show')}}</label><br>
                                    <img src="{{asset('storage/documents/'.$document->folder_name.'/passport/'.$document->passport)}}" id="photo-img" alt=""
                                         style="height: 100px; border-radius: .375rem; padding-bottom: 5px">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div id="photo-div" class="single-input-inner style-bg-border">
                                    <label for="">{{__('Your Diploma Show')}}</label><br>
                                    <img src="{{asset('storage/documents/'.$document->folder_name.'/diploma/'.$document->diploma)}}" id="photo-img" alt=""
                                         style="height: 100px; border-radius: .375rem; padding-bottom: 5px">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div id="photo-div" class="single-input-inner style-bg-border">
                                    <label for="">{{__('Your Certificate Show')}}</label><br>
                                    <img src="{{asset('storage/documents/'.$document->folder_name.'/certificate/'.$document->certificate)}}" id="photo-img" alt=""
                                         style="height: 100px; border-radius: .375rem; padding-bottom: 5px">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div id="photo-div" class="single-input-inner style-bg-border">
                                    <label for="">{{__('Your Other Certificates Show')}}</label><br>
                                    <img src="{{asset('storage/documents/'.$document->folder_name.'/other_certificates/'.$document->certificates)}}" id="photo-img" alt=""
                                         style="height: 100px; border-radius: .375rem; padding-bottom: 5px">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- signup-page-end -->
@endsection

