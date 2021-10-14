@extends('layouts.front.master-2')


@section('main')


    <div class="breadcrumb-area bg-overlay" style="background-image:url('{{asset('front/assets/img/bg/3.png')}}')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">Contact</h2>
                    <ul class="page-list">
                        <li><a href="{{route('home',$locale)}}">{{__('Home')}}</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

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
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2998.416455186988!2d69.19898885092606!3d41.27803997917255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8b35e74a7935%3A0x3135212ba7b9a28a!2sIss%20agensy%20Otabek!5e0!3m2!1sru!2s!4v1634195660277!5m2!1sru!2s" ></iframe>
    </div>
    <!-- contact area end -->

@endsection
