@extends('layouts.front.master-2')

@section('main')
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url({{asset('front/assets/img/bg/3.png')}})">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">{{__('Cooperation')}}</h2>
                    <ul class="page-list">
                        <li><a href="{{route('home',$locale)}}">{{__('Home')}}</a></li>
                        <li>{{__('Cooperation')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- counter area start -->
    <div class="counter-area pd-bottom-120 pd-top-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pd-bottom-30">
                    <div class="section-title mb-0" style="padding-bottom: 20px">
                        <h6 class="sub-title right-line">{{__('Get in touch')}}</h6>
                        <h2 class="title">{{__('Fill the form')}}</h2>
                        <p class="content pb-3">Biz hamkorlarimiz bilan muntazam ravishda barcha muloqot usullar orqali aloqadamiz va ular bilan muvaffaqiyatli hamkorlikni rivojlantirib kelayabmiz. Biz sizning savollar va fikr mulohazalaringizga javob berishga doimo tayyormiz. Siz hozirgi kundagi hamkorimizmisiz yoki kelajakdagi bo'lajak hamkormi, biz siz bilan hamkorlik qilishdan doimo hursandmiz.
                    </div>
                </div>
                <div class="col-lg-12">
                    <p class="form-title">Shaxsiy ma’lumotlaringiz</p>
                </div>
                <div class="col-lg-12 mt-5 mt-lg-0">
                    <form class="contact-form-inner  mt-5 mt-md-0" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text"name="full_name" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="tel" name="phone_number" placeholder="901234567" pattern="[0-9]{9}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="single-input-inner style-bg-border">
                                    <select name="region">
                                        <option value="volvo">Volvo</option>
                                        <option value="saab">Saab</option>
                                        <option value="mercedes">Mercedes</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-12">
                    <p class="form-title">Kompaniyangiz ma’lumotlari</p>
                </div>
                <div class="col-lg-12 mt-5 mt-lg-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" name="company_name" placeholder="Company Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="tel" name="occupation" placeholder="Occupation">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" name="address" placeholder="Address">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <textarea name="message" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-base">Jo'natish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- counter area end -->
@endsection
