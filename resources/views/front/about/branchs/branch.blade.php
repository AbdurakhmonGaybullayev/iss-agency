@extends('layouts.front.master-2')


@section('main')
    <!-- contact list start -->
    <div class="contact-list pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="contact-list-inner">
                        <div class="media">
                            <div class="media-left">
                                <img src="{{asset('front/assets/img/icon/17.png')}}" alt="img">
                            </div>
                            <div class="media-body align-self-center">
                                <h5>Our Phone</h5>
                                <p>000 2324 39493</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-list-inner">
                        <div class="media">
                            <div class="media-left">
                                <img src="{{asset('front/assets/img/icon/18.png')}}" alt="img">
                            </div>
                            <div class="media-body align-self-center">
                                <h5>Our Email</h5>
                                <p>name@website.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-list-inner">
                        <div class="media">
                            <div class="media-left">
                                <img src="{{asset('front/assets/img/icon/16.png')}}" alt="img">
                            </div>
                            <div class="media-body align-self-center">
                                <h5>Our Address</h5>
                                <p>2 St, Loskia, amukara.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact list end -->

    <!-- contact area start -->
    <div class="contact-g-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d29208.601361499546!2d90.3598076!3d23.7803374!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1589109092857!5m2!1sen!2sbd"></iframe>
    </div>
    <!-- contact area end -->

@endsection
