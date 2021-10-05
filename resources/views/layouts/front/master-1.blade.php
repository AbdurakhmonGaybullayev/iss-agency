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
    <form action="{{route('home',$locale)}}" class="search-form">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search.....">
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
                        <li class="social-area"><p>
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
                            <a class="current-lang" onclick="langSwitch()"><img style="width: 17px; margin-top: -1px" src="{{asset('front/assets/img/flags/flag'.$locale.'.svg')}}" alt=""><p style="display: inline; font-size: 12px">
                                {{strtoupper($locale)}}</p></a>
                            @php
                             $languages = ['uz','ru','en'];
                            @endphp
                            @foreach($languages as $language)
                                @if($language != $locale)
                                    <a class="next-lang" href="/{{$language}}"><img style="width: 17px; margin-top: -1px" src="{{asset('front/assets/img/flags/flag'.$language.'.svg')}}" alt=""><p style="display: inline; font-size: 12px">
                                            {{strtoupper($language)}}</p></a>
                                @endif
                            @endforeach

                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-area-2 navbar-area navbar-expand-lg">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <button class="menu toggle-btn d-block d-lg-none" data-target="#edumint_main_menu"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-left"></span>
                    <span class="icon-right"></span>
                </button>
            </div>
            <div class="logo">
                <a href="{{route('home',$locale)}}"><img src="{{asset('front/assets/img/logo-iss.png')}}" alt="img"></a>
            </div>
            <div class="nav-right-part nav-right-part-mobile">
                <a class="signin-btn" href="signin.html">{{__('Login')}}</a>
                <a class="btn btn-base" href="signup.html">{{__('Register')}}</a>
                <a class="search-bar" href="#"><i class="fa fa-search"></i></a>
            </div>
            <div class="collapse navbar-collapse" id="edumint_main_menu">
                <ul class="navbar-nav menu-open">
                    <li class="menu-item-has-children current-menu-item">
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
                        <a href="#">{{__('About_us')}}</a>
                        <ul class="sub-menu">
                            <li><a href="{{route('faq',$locale)}}">{{__('FAQ')}}</a></li>
                            <li><a href="{{route('cooperation',$locale)}}">{{__('Cooperation')}}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="nav-right-part nav-right-part-desktop style-black">
                <a class="signin-btn" href="signin.html">{{__('Login')}}</a>
                <a class="btn btn-base" href="blog.html">{{__('Register')}}</a>
                <a class="search-bar" href="#"><i class="fa fa-search"></i></a>
            </div>
            <div class="hidden-div"></div>
            <div class="wrapper-large-menu">
                <div class="large-menu">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="country-title">
                                Yo'nalishlar
                            </div>
                            <ul class="category-list">
                                <li class="item">
                                    <a href="#"
                                       class="link active">Bakalavriat </a>                                                  </a>
                                </li>
                                <li class="item">
                                    <a href="#"
                                       class="link active">Bakalavriat </a>                                                  </a>
                                </li>
                                <li class="item">
                                    <a href="#"
                                       class="link active">Bakalavriat </a>                                                  </a>
                                </li>
                                <li class="item">
                                    <a href="#"
                                       class="link active">Bakalavriat </a>                                                  </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="country-title">
                                Davlatlar
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="/post/country/south_korea" class="large-menu-item">
                                        <img src="https://world.uz/files/south-korea.png_943150df.png" alt="">
                                        <span class="title">
                                                    Janubiy Koreya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/usa" class="large-menu-item">
                                        <img src="https://world.uz/files/united-states-of-america.png_942942ku.png"
                                             alt="">
                                        <span class="title">
                                                    AQSH                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/spain" class="large-menu-item">
                                        <img src="https://world.uz/files/spain.png_942612nh.png" alt="">
                                        <span class="title">
                                                    Ispaniya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/england" class="large-menu-item">
                                        <img src="https://world.uz/files/england.png_942411dk.png" alt="">
                                        <span class="title">
                                                    Angliya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/ireland" class="large-menu-item">
                                        <img src="https://world.uz/files/ireland.png_942597ni.png" alt="">
                                        <span class="title">
                                                    Irlandiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/scotland" class="large-menu-item">
                                        <img src="https://world.uz/files/scotland.png_943135tq.png" alt="">
                                        <span class="title">
                                                    Shotlandiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/germany" class="large-menu-item">
                                        <img src="https://world.uz/files/germany.png_942499cv.png" alt="">
                                        <span class="title">
                                                    Germaniya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/france" class="large-menu-item">
                                        <img src="https://world.uz/files/france.png_943013za.png" alt="">
                                        <span class="title">
                                                    Frantsiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/australia" class="large-menu-item">
                                        <img src="https://world.uz/files/australia.png_856883fe.png" alt="">
                                        <span class="title">
                                                    Avstraliya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/austria" class="large-menu-item">
                                        <img src="https://world.uz/files/austria.png_942337yj.png" alt="">
                                        <span class="title">
                                                    Avstriya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/hungary" class="large-menu-item">
                                        <img src="https://world.uz/files/hungary.png_942484cw.png" alt="">
                                        <span class="title">
                                                    Vengriya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/poland" class="large-menu-item">
                                        <img src="https://world.uz/files/republic-of-poland.png_942885bm.png" alt="">
                                        <span class="title">
                                                    Polsha                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/denmark" class="large-menu-item">
                                        <img src="https://world.uz/files/denmark.png_942563dn.png" alt="">
                                        <span class="title">
                                                    Daniya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/canada" class="large-menu-item">
                                        <img src="https://world.uz/files/canada.png_942651rm.png" alt="">
                                        <span class="title">
                                                    Kanada                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/latvia" class="large-menu-item">
                                        <img src="https://world.uz/files/latvia.png_942704lp.png" alt="">
                                        <span class="title">
                                                    Latviya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/malaysia" class="large-menu-item">
                                        <img src="https://world.uz/files/malaysia.png_942720wz.png" alt="">
                                        <span class="title">
                                                    Malaysiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/new_zealand" class="large-menu-item">
                                        <img src="https://world.uz/files/new-zealand.png_942759kb.png" alt="">
                                        <span class="title">
                                                    Yangi Zelandiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/india" class="large-menu-item">
                                        <img src="https://world.uz/files/india.png_942581hq.png" alt="">
                                        <span class="title">
                                                    Xindiston                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/switzerland" class="large-menu-item">
                                        <img src="https://world.uz/files/switzerland.png_943083ai.png" alt="">
                                        <span class="title">
                                                    Shveytsariya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/japan" class="large-menu-item">
                                        <img src="https://world.uz/files/japan.png_943164hl.png" alt="">
                                        <span class="title">
                                                    Yaponiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/czech" class="large-menu-item">
                                        <img src="https://world.uz/files/czech-republic.png_943034mz.png" alt="">
                                        <span class="title">
                                                    Chexiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/turkey" class="large-menu-item">
                                        <img src="https://world.uz/files/turkey.png_942981ze.png" alt="">
                                        <span class="title">
                                                    Turkiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/cyprus" class="large-menu-item">
                                        <img src="https://world.uz/files/cyprus.png_942669po.png" alt="">
                                        <span class="title">
                                                    Kipr                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/singapore" class="large-menu-item">
                                        <img src="https://world.uz/files/singapore.png_942923kp.png" alt="">
                                        <span class="title">
                                                    Singapur                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/andorra" class="large-menu-item">
                                        <img src="https://world.uz/files/andorra.png_942320ni.png" alt="">
                                        <span class="title">
                                                    Andorra                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/malta" class="large-menu-item">
                                        <img src="https://world.uz/files/malta.png_942739zy.png" alt="">
                                        <span class="title">
                                                    Malta                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/netherlands" class="large-menu-item">
                                        <img src="https://world.uz/files/netherlands.png_942542cl.png" alt="">
                                        <span class="title">
                                                    Gollandiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/thailand" class="large-menu-item">
                                        <img src="https://world.uz/files/thailand.png_942962nb.png" alt="">
                                        <span class="title">
                                                    Tayland                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/belgium" class="large-menu-item">
                                        <img src="https://world.uz/files/belgium.png_942427mz.png" alt="">
                                        <span class="title">
                                                    Belgiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/greece" class="large-menu-item">
                                        <img src="https://world.uz/files/greece.png_942513cd.png" alt="">
                                        <span class="title">
                                                    Gretsiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/italy" class="large-menu-item">
                                        <img src="https://world.uz/files/italy.png_942633it.png" alt="">
                                        <span class="title">
                                                    Italiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/china" class="large-menu-item">
                                        <img src="https://world.uz/files/china.png_942686lj.png" alt="">
                                        <span class="title">
                                                    Xitoy                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/uae" class="large-menu-item">
                                        <img src="https://world.uz/files/united-arab-emirates.png_942779gh.png" alt="">
                                        <span class="title">
                                                    BAA                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/portugal" class="large-menu-item">
                                        <img src="https://world.uz/files/portugal.png_942902ja.png" alt="">
                                        <span class="title">
                                                    Portugaliya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/finland" class="large-menu-item">
                                        <img src="https://world.uz/files/finland.png_942997hx.png" alt="">
                                        <span class="title">
                                                    Finlandiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/switzerland" class="large-menu-item">
                                        <img src="https://world.uz/files/switzerland.png_943056dl.png" alt="">
                                        <span class="title">
                                                    Shveytsariya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/index?slug=lithuania+" class="large-menu-item">
                                        <img src="https://world.uz/files/lithuania.png_943183zr.png" alt="">
                                        <span class="title">
                                                    Litva                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/russia" class="large-menu-item">
                                        <img src="https://world.uz/files/russia.png_943197ey.png" alt="">
                                        <span class="title">
                                                    Rossiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/georgia" class="large-menu-item">
                                        <img src="https://world.uz/files/georgia.png_942149nh.png" alt="">
                                        <span class="title">
                                                    Gruziya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/azerbaijan" class="large-menu-item">
                                        <img src="https://world.uz/files/azerbaijan.png_693885sw.png" alt="">
                                        <span class="title">
                                                    Ozarbayjon                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/belarus" class="large-menu-item">
                                        <img src="https://world.uz/files/belarus.png_942185uu.png" alt="">
                                        <span class="title">
                                                    Belarus                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/kazakhstan" class="large-menu-item">
                                        <img src="https://world.uz/files/kazakhstan.png_942203nx.png" alt="">
                                        <span class="title">
                                                    Qozog'iston                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/kyrgyzstan" class="large-menu-item">
                                        <img src="https://world.uz/files/kyrgyzstan.png_942278wv.png" alt="">
                                        <span class="title">
                                                    Qirgʻiziston                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/ukraine" class="large-menu-item">
                                        <img src="https://world.uz/files/ukraine.png_942254kv.png" alt="">
                                        <span class="title">
                                                    Ukraina                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/tajikistan" class="large-menu-item">
                                        <img src="https://world.uz/files/tajikistan.png_942295kg.png" alt="">
                                        <span class="title">
                                                    Tojikiston                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/romania" class="large-menu-item">
                                        <img src="https://world.uz/files/romania.png_488168bp.png" alt="">
                                        <span class="title">
                                                    Ruminiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/grenada" class="large-menu-item">
                                        <img src="https://world.uz/files/grenada.png_293639gd.png" alt="">
                                        <span class="title">
                                                    Grenada                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post/country/slovakia" class="large-menu-item">
                                        <img src="https://world.uz/files/slovakia.png_293616rj.png" alt="">
                                        <span class="title">
                                                    Slovakiya                                                </span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/post" class="large-menu-item">
                                            <span class="title">
                                                    Barcha dasturlar                                                </span>
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
                            <p>Edumint tetur sadipscing elitr tempor invidunt ut labore et dolore magna aliquyam erat,
                                sed diam voluptua.</p>
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
                            @foreach($programs as $program)
                                <li><a href="course.html">{{$program['name_'.$locale]}}</a></li>
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
                            <li><a href="about.html">{{__('About_us')}}</a></li>
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

    function langSwitch(){
        var lang1 = document.getElementsByClassName('next-lang')[0];
        var lang2 = document.getElementsByClassName('next-lang')[1];
        if (lang1.style.display == 'none' || lang2.style.display == 'none'){
            lang1.style.display = 'inline';
            lang2.style.display = 'inline';
        }else{
            lang1.style.display = 'none';
            lang2.style.display = 'none';
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
@yield('js')
</body>
</html>
