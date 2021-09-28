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
                    <li class="menu-item-has-children">
                        <a href="#">{{__('Programs')}}</a>
                        <ul class="sub-menu">
                            <li><a href="course.html">Course</a></li>
                            <li><a href="course-details.html">Course Single</a></li>
                        </ul>
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
                        <a href="{{route('home',$locale)}}"><img src="{{asset('front/assets/img/logo-iss-2.png')}}" alt="img"></a>
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
                            <li><a href="about.html">{{__('Programs')}}</a></li>
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

@yield('js')
</body>
</html>
