@extends('layouts.front.master-2')
@section('main')

    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url({{\App\Models\Header::first()->about_us->getUrl()}}); background-size: cover;
        background-position: center;">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">{{__("Contact")}}</h2>
                    <ul class="page-list">
                        <li><a href="{{route('home',$locale)}}">{{__("Home")}}</a></li>
                        <li>{{__("Contact")}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- contact list start -->
    <div class="contact-list pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="contact-list-inner">
                        <div class="media">
                            <div class="media-left">
                                <img src={{asset('front/assets/img/icon/17.png')}} alt="img">
                            </div>
                            <div class="media-body align-self-center">
                                <h5>{{__('Our')}} {{__('Phone')}}</h5>
                                <p>{{$contact->phone_number}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-list-inner">
                        <div class="media">
                            <div class="media-left">
                                <img src={{asset('front/assets/img/icon/18.png')}} alt="img">
                            </div>
                            <div class="media-body align-self-center">
                                <h5>{{__('Our')}} {{__('Email')}}</h5>
                                <p>{{$contact->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-list-inner">
                        <div class="media">
                            <div class="media-left">
                                <img src={{asset('front/assets/img/icon/16.png')}} alt="img">
                            </div>
                            <div id="contact-from" class="media-body align-self-center">
                                <h5>{{__('Our')}} {{__('Email')}}</h5>
                                <p>{{$contact['address_'.$locale]}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact list end -->

    <!-- counter area start -->
    <div class="counter-area pd-bottom-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-title mb-0">
                        <h6 class="sub-title right-line">{{__('Get in touch')}}</h6>
                        <h2 class="title">{{__('Write_us')}}</h2>
                        <p class="content pb-3">The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax
                            quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, </p>
                        <ul class="social-media style-base pt-3">
                            <li>
                                <a href="{{isset($contact['instagram'])?$contact['instagram']:''}}"><i
                                        class="fa fa-instagram" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="{{isset($contact['telegram'])?$contact['telegram']:''}}"><i
                                        class="fa fa-telegram"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="{{isset($contact['facebook'])?$contact['facebook']:''}}"><i
                                        class="fa fa-facebook"
                                        aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 mt-5 mt-lg-0">
                    <form class="contact-form-inner  mt-5 mt-md-0" method="post" action="{{route('message',$locale)}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-inner style-bg-border">
                                    @auth()
                                        <input required value="{{\Illuminate\Support\Facades\Auth::user()->first_name}}"
                                               name="first_name" type="text" placeholder="{{__("First Name")}}"
                                               readonly>
                                    @endauth
                                    @guest()
                                        <input required value="{{old('first_name')}}"
                                               name="first_name" type="text" placeholder="{{__("First Name")}}">
                                        @error('first_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    @endguest
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-inner style-bg-border">
                                    @auth()
                                        <input required value="{{\Illuminate\Support\Facades\Auth::user()->last_name}}"
                                               name="last_name" type="text" placeholder="{{__("Last Name")}}" readonly>
                                    @endauth
                                    @guest()
                                        <input required value="{{old('last_name')}}"
                                               name="last_name" type="text" placeholder="{{__("Last Name")}}">
                                        @error('last_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    @endguest
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="single-input-inner style-bg-border">
                                    @auth()
                                        <input required value="{{\Illuminate\Support\Facades\Auth::user()->email}}" name="email"
                                               type="email" placeholder="{{__('Email')}}" readonly>
                                    @endauth

                                    @guest()
                                        <input required value="{{old('email')}}" name="email" type="email"
                                               placeholder="{{__("Email")}}">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    @endguest
                                </div>
                            </div>


                            <div class="col-sm-6 col-12">
                                <div class="single-input-inner style-bg-border">
                                    <p>{{__("Certificate status")}}</p>

                                    <input required style="height: fit-content; width: fit-content" value="2" id="certificate_status_1" name="certificate_status" type="radio" @if(old('certificate_status') == 2) checked @endif>
                                    <label for="certificate_status_1">{{__('Yes')}}</label> &nbsp&nbsp

                                    <input style="height: fit-content; width: fit-content" value="1" id="certificate_status_2" name="certificate_status" type="radio" @if(old('certificate_status') == 1) checked @endif>
                                    <label for="certificate_status_2">{{__('No')}}</label>

                                    @error('certificate_status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-sm-6 col-12">
                                <div class="single-input-inner style-bg-border">
                                    @auth()
                                        <input required value="{{\Illuminate\Support\Facades\Auth::user()->phone_number}}" name="phone_number_1"
                                               type="text" placeholder="{{__('Phone Number'.' 1')}}" readonly>
                                    @endauth

                                    @guest()
                                        <input required value="{{old('phone_number_1')}}" name="phone_number_1" type="text"
                                               placeholder="{{__("Phone Number").' 1'}}">
                                        @error('phone_number_1')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    @endguest
                                </div>
                            </div>

                            <div class="col-sm-6 col-12">
                                <div class="single-input-inner style-bg-border">
                                        <input value="{{old('phone_number_2')}}" name="phone_number_2" type="text"
                                               placeholder="{{__("Phone Number").' 2 ('.__('Optional').')'}}">
                                        @error('phone_number_2')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <input required value="{{old('subject')}}" name="subject" type="text"
                                           placeholder="{{__('Subject')}}">
                                    @error('subject')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <textarea value="{{old('message')}}" name="message"
                                              placeholder="{{__("Message")}}"></textarea>
                                    @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-base">{{__("Send_message")}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- counter area end -->

    <!-- contact area start -->
    <div class="contact-g-map">
        @php

            $branch = \App\Models\Branch::where('id',$contact->branch_id)->select('google_map_link')->first();

            echo $branch->google_map_link;

        @endphp
    </div>
    <!-- contact area end -->

@endsection

@section('js')
    <script>
        $(document).ready(function () {

            var maxHeight = 0;

            $(".contact-list-inner").each(function () {
                if ($(this).height() > maxHeight) {
                    maxHeight = $(this).height();
                }
            });

            $(".contact-list-inner").height(maxHeight);

        });

        @if(session()->has('success'))

        alert('{{__('Message sent successfully!')}}');

        @endif
        @if(session()->has('fail'))

        alert('{{__('Error occured in sending message! Plase try again!')}}');

        @endif
    </script>

@endsection

