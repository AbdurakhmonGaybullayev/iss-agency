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
                        <h3 class="title">{{$cooperation_text['title_'.$locale]}}</h3>
                        <p class="content pb-3">{{$cooperation_text['offer_'.$locale]}}
                    </div>
                </div>

                @guest()

                    <div class="col-lg-12 pd-bottom-30">
                        <div class="section-title mb-0" style="padding-bottom: 20px">
                            <h4 class="title">{{__('Please register for cooperation')}}</h4>
                            <a class="btn btn-info" href="{{route('sign-in-for-cooperation',$locale)}}">{{__('Login')}}</a>
                            <a class="btn btn-base" href="{{route('sign-up-for-cooperation',$locale)}}">{{__('Register')}}</a>

                        </div>
                    </div>

                @endguest

                @auth()
                <form action="{{route('cooperation',$locale)}}" method="post">
                    @csrf
                <div class="col-lg-12">
                    <p class="form-title">{{__('Your company information')}}</p>
                </div>
                <div class="col-lg-12 mt-5 mt-lg-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" name="company_name" value="{{old('company_name')}}" placeholder="{{__('Company Name')}}" required>
                                    @error('company_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="tel" name="position" value="{{old('position')}}" placeholder="{{__('Occupation')}}">
                                    @error('position')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" name="address" value="{{old('address')}}" placeholder="{{__('Address')}}">
                                    @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <textarea name="message" placeholder="{{__('Message')}}">{{old('message')}}</textarea>
                                    @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-base">{{__('Send')}}</button>
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
        @php
            if (session()->has('success')){
                  echo "document.getElementById('modal-alert-button').click(); document.getElementById('exampleModalLongTitle').style.color = 'green'; document.getElementById('exampleModalLongTitle').innerHTML = '".__('Invitation sent successfully!')."';";
            }elseif (session()->has('fail')){
                  echo "document.getElementById('modal-alert-button').click(); document.getElementById('exampleModalLongTitle').style.color = 'red'; document.getElementById('exampleModalLongTitle').innerHTML = '".__('Error occured in sending invitation! Plase try again!')."';";
            }
        @endphp
    </script>
@endsection
