@extends('layouts.front.master-2')
@section('main')


    <!-- counter area start -->
    <div style="padding-top: 210px" class="counter-area pd-bottom-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5 mt-lg-0">
                    <form class="contact-form-inner  mt-5 mt-md-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-inner style-bg-border">
                                        <input required value="{{\Illuminate\Support\Facades\Auth::user()->first_name}}" name="first_name" type="text" placeholder="{{__("First Name")}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-inner style-bg-border">
                                        <input required value="{{\Illuminate\Support\Facades\Auth::user()->last_name}}"
                                               name="last_name" type="text" placeholder="{{__("Last Name")}}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="single-input-inner style-bg-border">
                                        <input required value="{{\Illuminate\Support\Facades\Auth::user()->email}}" name="email"
                                               type="email" placeholder="{{__('Email')}}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="single-input-inner style-bg-border">
                                    <p>{{__("Certificate status")}}</p>

                                    <input required style="height: fit-content; width: fit-content" value="2" id="certificate_status_1" name="certificate_status" type="radio" @if($application->certificate_status == 2) checked @endif readonly>
                                    <label for="certificate_status_1">{{__('Yes')}}</label> &nbsp&nbsp

                                    <input style="height: fit-content; width: fit-content" value="1" id="certificate_status_2" name="certificate_status" type="radio" @if($application->certificate_status == 1) checked @endif readonly>
                                    <label for="certificate_status_2">{{__('No')}}</label>

                                </div>
                            </div>


                            <div class="col-sm-6 col-12">
                                <div class="single-input-inner style-bg-border">
                                        <input required value="{{\Illuminate\Support\Facades\Auth::user()->phone_number}}" name="phone_number_1"
                                               type="text" placeholder="{{__('Phone Number'.' 1')}}" readonly>
                                </div>
                            </div>

                            <div class="col-sm-6 col-12">
                                <div class="single-input-inner style-bg-border">
                                    <input value="{{$application->phone_number_2}}" name="phone_number_2" type="text" placeholder="{{__("Phone Number").' 2 ('.__('Optional').')'}}" readonly>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <input required value="{{$application->subject}}" name="subject" type="text"
                                           placeholder="{{__('Subject')}}" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <textarea name="message" placeholder="{{__("Message")}}" readonly>{{$application->message}}</textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- counter area end -->
@endsection

