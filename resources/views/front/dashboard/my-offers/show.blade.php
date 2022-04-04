@extends('layouts.front.master-2')

@section('main')

    <!-- counter area start -->
    <div style="padding-top: 210px" class="counter-area pd-bottom-120 pd-top-120">
        <div class="container">
            <div class="row">
                    <form>
                        <div class="col-lg-12">
                            <p class="form-title">{{__('Your company information')}}</p>
                        </div>
                        <div class="col-lg-12 mt-5 mt-lg-0">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-inner style-bg-border">
                                        <input type="text" name="company_name" value="{{$offer->company_name}}" placeholder="{{__('Company Name')}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-input-inner style-bg-border">
                                        <input type="tel" name="position" value="{{$offer->position}}" placeholder="{{__('Occupation')}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single-input-inner style-bg-border">
                                        <input type="text" name="address" value="{{$offer->address}}" placeholder="{{__('Address')}}">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="single-input-inner style-bg-border">
                                        <textarea name="message" placeholder="{{__('Message')}}">{{$offer->message}}</textarea>
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

@section('js')
    <script>
        @if(session()->has('success'))

        alert('{{__('Invitation sent successfully!')}}');

        @endif
        @if(session()->has('fail'))

        alert('{{__('Error occured in sending invitation! Plase try again!')}}');

        @endif
    </script>
@endsection
