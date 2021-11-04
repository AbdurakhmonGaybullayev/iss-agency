@extends('layouts.front.master-2')

@section('main')
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url({{\App\Models\Header::first()->cooperation->getUrl()}}); background-size: cover;
        background-position: center;">
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

                @guest()

                    <div class="col-lg-12 pd-bottom-30">
                        <div class="section-title mb-0" style="padding-bottom: 20px">
                            <h4 class="title">{{__('Please register for cooperation')}}</h4>
                            <a class="btn btn-info" href="{{route('sign-in',$locale)}}">{{__('Login')}}</a>
                            <a class="btn btn-base" href="{{route('sign-up',$locale)}}">{{__('Register')}}</a>

                        </div>
                    </div>

                @endguest

                @auth()
                <form action="{{route('cooperation',$locale)}}" method="post">
                    @csrf
                <div class="col-lg-12">
                    <p class="form-title">Kompaniyangiz ma’lumotlari</p>
                </div>
                <div class="col-lg-12 mt-5 mt-lg-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" name="company_name" value="{{old('company_name')}}" placeholder="Company Name" required>
                                    @error('company_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="tel" name="position" value="{{old('position')}}" placeholder="Occupation">
                                    @error('position')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" name="address" value="{{old('address')}}" placeholder="Address">
                                    @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <textarea name="message" placeholder="Message">{{old('message')}}</textarea>
                                    @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-base">Jo'natish</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endauth
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
