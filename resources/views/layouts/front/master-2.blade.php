<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ISS agency</title>
    <link rel=icon href="{{asset('front/assets/img/logo-iss-favicon.png')}}" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('front/assets/css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/responsive.css')}}">
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        .dropdown-content p {
            font-size: 13px;
            font-weight: bold;
        }

        .dropdown-content a {
            margin: 0;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
    @yield('css')
</head>
<body>

<!-- preloader area start -->
<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->

<!-- search popup start-->
<div class="td-search-popup" id="td-search-popup">
    <form method="get" action="{{route('search',$locale)}}" class="search-form">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search...">
        </div>
        <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
    </form>
</div>
<!-- search popup end-->
<div class="body-overlay" id="body-overlay"></div>

<!-- navbar start -->
<div class="navbar-area">
    <!-- navbar top start -->
    <div class="navbar-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-md-left text-center">
                    <ul>
                        <li><p>
                                <i class="fa fa-map-marker"></i> {{isset($contact['address_'.$locale])?$contact['address_'.$locale]:''}}
                            </p></li>
                        <li><p><i class="fa fa-envelope-o"></i> {{isset($contact['email'])?$contact['email']:''}}</p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="topbar-right text-md-right text-center">
                        <li class="social-area">
                            <a href="{{isset($contact['instagram'])?$contact['instagram']:''}}"><i
                                    class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="{{isset($contact['telegram'])?$contact['telegram']:''}}"><i class="fa fa-telegram"
                                                                                                 aria-hidden="true"></i></a>
                            <a href="{{isset($contact['facebook'])?$contact['facebook']:''}}"><i class="fa fa-facebook"
                                                                                                 aria-hidden="true"></i></a>
                            @php
                                $currentName = \Illuminate\Support\Facades\Route::currentRouteName();
                            @endphp

                            <a class="current-lang" onclick="langSwitch()"><img style="width: 17px; margin-top: -1px"
                                                                                src="{{asset('front/assets/img/flags/flag'.$locale.'.svg')}}"
                                                                                alt="">
                                <p style="display: inline; font-size: 12px">
                                    {{strtoupper($locale)}}</p></a>
                            @php
                                $languages = ['uz','ru','en'];
                            @endphp
                            @foreach($languages as $language)
                                @if($language != $locale)
                                    <a class="next-lang" href="{{route('home',$language)}}"><img
                                            style="width: 17px; margin-top: -1px;"
                                            src="{{asset('front/assets/img/flags/flag'.$language.'.svg')}}" alt="">
                                        <p style="display: inline; font-size: 12px">
                                            {{strtoupper($language)}}</p></a>
                                @endif
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar bg-white navbar-area-1 navbar-area navbar-expand-lg">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <button class="menu toggle-btn d-block d-lg-none" data-target="#edumint_main_menu"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-left"></span>
                    <span class="icon-right"></span>
                </button>
            </div>
            <div class="logo">
                <a href="{{route('home',$locale)}}"><img src="{{asset('front/assets/img/logo-iss-2.png')}}"
                                                         alt="img"></a>
            </div>
            <div class="nav-right-part nav-right-part-mobile">
                @guest()
                    <a class="signin-btn" href="{{route('sign-in',$locale)}}">{{__('Login')}}</a>
                    <a class="btn btn-base" href="{{route('sign-up',$locale)}}">{{__('Register')}}</a>
                @endguest
                @auth()
                    <a class="dashboard"
                       title="{{\Illuminate\Support\Facades\Auth::user()->first_name.' '.\Illuminate\Support\Facades\Auth::user()->last_name}}"
                       href="{{route('dashboard',$locale)}}"><i class="fa fa-user"></i></a>
                    <a class="logout" href="{{route('user-logout',$locale)}}"><i class="fa fa-sign-out"></i></a>
                @endauth
                <a class="search-bar" href="#"><i class="fa fa-search"></i></a>
            </div>
            <div class="collapse navbar-collapse" id="edumint_main_menu">
                <ul class="navbar-nav menu-open">
                    <li>
                        <a href="{{route('home',$locale)}}">{{__('Home')}}</a>
                    </li>
                    <li>
                        <a class="programs" href="{{route('programs',$locale)}}">{{__('Programs')}}</a>
                    </li>
                    <li>
                        <a href="{{route('news',$locale)}}">{{__('News')}}</a>
                    </li>
                    <li>
                        <a href="{{route('gallery',$locale)}}">{{__('Gallery')}}</a>
                    </li>

                    <li class="menu-item-has-children">
                        <a href="{{route('about',$locale)}}">{{__('About_us')}}</a>
                        <ul class="sub-menu">
                            <li><a href="{{route('contact',$locale)}}">{{__('Contact')}}</a></li>
                            <li><a href="{{route('faq',$locale)}}">{{__('FAQ')}}</a></li>
                            <li><a href="{{route('cooperation',$locale)}}">{{__('Cooperation')}}</a></li>
                            @if(\App\Models\Branch::all()->count() > 1)
                                <li><a href="{{route('branch',$locale)}}">{{__('Branch')}}</a></li>
                            @endif                        </ul>
                    </li>
                </ul>
            </div>
            <div class="nav-right-part nav-right-part-desktop">
                @guest()
                    <a class="signin-btn" href="{{route('sign-in',$locale)}}">{{__('Login')}}</a>
                    <a class="btn btn-base" href="{{route('sign-up',$locale)}}">{{__('Register')}}</a>
                @endguest
                @auth()
                    <div class="dropdown">
                        <a class="dashboard"
                           title="{{\Illuminate\Support\Facades\Auth::user()->first_name.' '.\Illuminate\Support\Facades\Auth::user()->last_name}}"
                           href="{{route('dashboard',$locale)}}"><i class="fa fa-user"></i></a>
                        <div class="dropdown-content">
                            <a href="{{route('dashboard',$locale)}}"><p>{{__("My Profile")}}</p></a>
                            <a href="{{route('my-documents',$locale)}}"><p>{{__("My Documents")}}</p></a>
                            <a href="{{route('my-messages',$locale)}}"><p>{{__("My Applications")}}</p></a>
                            <a href="{{route('my-offers',$locale)}}"><p>{{__("My Offers")}}</p></a>
                        </div>
                    </div>
                    <a class="logout" href="{{route('user-logout',$locale)}}"><i class="fa fa-sign-out"></i></a>
                @endauth
                <a class="search-bar" href="#"><i class="fa fa-search"></i></a>
            </div>
            <div class="hidden-div"></div>
            <div style="margin-top: 10px" class="wrapper-large-menu">
                <div class="large-menu">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="country-title">
                                {{__('Programs')}}
                            </div>
                            <ul class="category-list">
                                @foreach($programs as $program)
                                    <li class="item">
                                        <a href="{{route('programs',$locale).'?program='.$program->id}}"
                                           class="link active">{{$program['name_'.$locale]}} </a>                                                  </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="country-title">
                                {{__('Countries')}}
                            </div>
                            <div class="row">
                                @foreach(\App\Models\Country::join('universities','universities.country_id','countries.id')->select('countries.*')->orderBy('countries.name_en','asc')->get()->unique() as $country)
                                    <div class="col-md-3">
                                        <a href="{{route('programs',$locale).'?country='.$country->id}}"
                                           class="large-menu-item">
                                            <img src="{{$country->country_logo->getUrl()}}" alt="">
                                            <span class="title">
                                                    {{$country['name_'.$locale]}}                                                </span>
                                        </a>
                                    </div>
                                @endforeach
                                <div class="col-md-12">
                                    <a href="{{route('programs',$locale)}}" class="large-menu-item">
                                        <span
                                            class="title">{{__('All Programs')}}</span>                                                </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- navbar end -->

@yield('main')

<!-- footer area start -->
<footer class="footer-area footer-area-2 bg-gray">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="widget widget_about text-center">
                        <a href="{{route('home',$locale)}}"><img src="{{asset('front/assets/img/logo-iss-2.png')}}"
                                                                 alt="img"></a>
                        <div class="details">
                            <p>{{\App\Models\AboutUs::first()['footer_text_'.$locale]}}</p>
                            <ul class="social-media">
                                <li><a href="{{isset($contact['instagram'])?$contact['instagram']:''}}"><i
                                            class="fa fa-instagram"></i></a></li>
                                <li><a href="{{isset($contact['telegram'])?$contact['telegram']:''}}"><i
                                            class="fa fa-telegram"></i></a></li>
                                <li><a href="{{isset($contact['facebook'])?$contact['facebook']:''}}"><i
                                            class="fa fa-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget widget_contact">
                        <h4 class="widget-title">{{__('Contact_us')}}</h4>
                        <ul class="details">
                            <li>
                                <i class="fa fa-map-marker"></i> {{isset($contact['address_'.$locale])?$contact['address_'.$locale]:''}}
                            </li>
                            <li><i class="fa fa-envelope"></i> {{isset($contact['email'])?$contact['email']:''}}</li>
                            <li>
                                <i class="fa fa-phone"></i> {{isset($contact['phone_number'])?$contact['phone_number']:''}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget widget_blog_list">
                        <h4 class="widget-title">{{__('News')}}</h4>
                        <ul>
                            @foreach($news as $blog)
                                <li>
                                    <h6><a href="blog-details.html">{{$blog['title_'.$locale] ?? ''}}</a></h6>
                                    <span class="date"><i class="fa fa-calendar"></i>{{$blog->created_at->format('d.m.Y') ?? ''}}</span>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget widget_nav_menu">
                        <h4 class="widget-title">{{__('Programs')}}</h4>
                        <ul>
                            @foreach($programs->take(5) as $program)
                                <li>
                                    <a href="{{route('programs',$locale).'$?program='.$program->id}}">{{$program['name_'.$locale]}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-5 align-self-center">
                    <p>Website made by ByWeb.uz</p>
                </div>
                <div class="col-md-7 text-md-right align-self-center mt-md-0 mt-2">
                    <div class="widget_nav_menu">
                        <ul>
                            <li><a href="{{route('home',$locale)}}">{{__('Home')}}</a></li>
                            <li><a href="{{route('programs',$locale)}}">{{__('Programs')}}</a></li>
                            <li><a href="{{route('news',$locale)}}">{{__('News')}}</a></li>
                            <li><a href="{{route('gallery',$locale)}}">{{__('Gallery')}}</a></li>
                            <li><a href="{{route('about',$locale)}}">{{__('About_us')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->


<!-- all plugins here -->
<script src="{{asset('front/assets/js/vendor.js')}}"></script>
<!-- main js  -->
<script src="{{asset('front/assets/js/main.js')}}"></script>
<script>
    let boolean = false;

    function langSwitch() {
        var lang1 = document.getElementsByClassName('next-lang')[0];
        var lang2 = document.getElementsByClassName('next-lang')[1];
        if (boolean == false) {
            lang1.style.display = 'inline';
            lang2.style.display = 'inline';
            boolean = true;
        } else if (boolean == true) {
            lang1.style.display = 'none';
            lang2.style.display = 'none';
            boolean = false;
        }
    }

    $(function () {
        $('.programs').hover(function () {
            $('.wrapper-large-menu').css('display', 'block');
            $('.hidden-div').css('display', 'block');
        }, function () {
            // on mouseout, reset the background colour
            $('.wrapper-large-menu').css('display', 'none');
            $('.hidden-div').css('display', 'none');
        });
    });

    $(function () {
        $('.wrapper-large-menu').hover(function () {
            $('.wrapper-large-menu').css('display', 'block');
            $('.hidden-div').css('display', 'block');
        }, function () {
            // on mouseout, reset the background colour
            $('.wrapper-large-menu').css('display', 'none');
            $('.hidden-div').css('display', 'none');
        });
    });

    $(function () {
        $('.hidden-div').hover(function () {
            $('.wrapper-large-menu').css('display', 'block');
            $('.hidden-div').css('display', 'block');
        }, function () {
            // on mouseout, reset the background colour
            $('.wrapper-large-menu').css('display', 'none');
            $('.hidden-div').css('display', 'none');
        });
    });


</script>
<script src="//code-ya.jivosite.com/widget/6Y8woH0Xth" async></script>

@yield('js')
</body>
</html>
