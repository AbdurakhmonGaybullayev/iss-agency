@extends('layouts.front.master-2')

@section('main')

    <!-- blog area start -->
    <div style="margin-top: 100px" class="blog-area pd-top-120 pd-bottom-120">
        <div class="container">

            <form class="contact-form-inner  mt-5 mt-md-0" method="post" action="{{route('message',$locale)}}">
                @csrf
                <div class="row">
                    <div class="col-lg-10">
                        <div class="single-input-inner style-bg-border">
                            <input name="search" type="text" placeholder="{{__("Search...")}}">

                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="single-input-inner style-bg-border">
                            <button type="submit" class="btn btn-base">{{__("Search")}}</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-blog-inner style-border row">
                        <div style="padding: 0" class="thumb col-lg-4">
                            <img style="height: 100%" src="{{asset('front/assets/img/blog/5.png')}}" alt="img">
                        </div>
                        <div class="details col-lg-8">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user"></i> BY ADMIN</li>
                                <li><i class="fa fa-calendar-check-o"></i> 28 JANUARY, 2020</li>
                            </ul>
                            <h3 class="title"><a href="blog-details.html">Flock by when MTV ax quiz prog quiz graced</a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt ut labore et dolore magna aliquyam erat, sed diam</p>
                            <a class="read-more-text" href="blog-details.html">READ MORE <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="single-blog-inner style-border">
                        <div class="thumb  col-lg-">
                            <img style="width: 100%" src="{{asset('front/assets/img/blog/5.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user"></i> BY ADMIN</li>
                                <li><i class="fa fa-calendar-check-o"></i> 28 JANUARY, 2020</li>
                            </ul>
                            <h3 class="title"><a href="blog-details.html">Quisque suscipit ipsum est, eu venen leo</a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt ut labore et dolore magna aliquyam erat, sed diam</p>
                            <a class="read-more-text" href="blog-details.html">READ MORE <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="single-blog-inner style-border">
                        <div class="thumb">
                            <img src="assets/img/blog/6.png" alt="img">
                        </div>
                        <div class="details">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user"></i> BY ADMIN</li>
                                <li><i class="fa fa-calendar-check-o"></i> 28 JANUARY, 2020</li>
                            </ul>
                            <h3 class="title"><a href="blog-details.html">When MTV ax quiz prog Flock by graced</a></h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt ut labore et dolore magna aliquyam erat, sed diam</p>
                            <a class="read-more-text" href="blog-details.html">READ MORE <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <nav class="td-page-navigation">
                        <ul class="pagination">
                            <li class="pagination-arrow"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">3</a></li>
                            <li class="pagination-arrow"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="td-sidebar">
                        <div class="widget widget_search">
                            <form class="search-form">
                                <div class="form-group">
                                    <input type="text" placeholder="Search">
                                </div>
                                <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget widget_catagory">
                            <h4 class="widget-title">Catagory</h4>
                            <ul class="catagory-items">
                                <li><a href="#">Tempor lorem interdum <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="#">Auctor mattis lacus <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="#">Dolor proin <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="#">Pharetra amet <i class="fa fa-caret-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="widget widget-recent-post">
                            <h4 class="widget-title">Recent News</h4>
                            <ul>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="assets/img/widget/1.png" alt="blog">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <h5 class="title"><a href="single-blog.html">Integer at faucibus urna.
                                                    Nullam condtum</a></h5>
                                            <div class="post-info"><i class="fa fa-calendar"></i><span>15 October</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="assets/img/widget/2.png" alt="blog">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <h5 class="title"><a href="single-blog.html">Custom Platform for an Audit
                                                    Insurance</a></h5>
                                            <div class="post-info"><i class="fa fa-calendar"></i><span>15 October</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="assets/img/widget/3.png" alt="blog">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <h5 class="title"><a href="single-blog.html">Famous app Developers and
                                                    Designer</a></h5>
                                            <div class="post-info"><i class="fa fa-calendar"></i><span>15 October</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget_price">
                            <h4 class="widget-title">Price</h4>
                            <label class="single-checkbox">
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                                Free Courses
                            </label>
                            <label class="single-checkbox">
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                                Paid Courses
                            </label>
                            <label class="single-checkbox">
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                                Only Subscription
                            </label>
                        </div>
                        <div class="widget widget_level">
                            <h4 class="widget-title">Level</h4>
                            <label class="single-checkbox">
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                                Beginner
                            </label>
                            <label class="single-checkbox">
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                                Intermediate
                            </label>
                            <label class="single-checkbox">
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                                Advanced
                            </label>
                        </div>
                        <div class="widget widget_tags mb-0">
                            <h4 class="widget-title">Tags</h4>
                            <div class="tagcloud">
                                <a href="#">Art</a>
                                <a href="#">Creative</a>
                                <a href="#">Article</a>
                                <a href="#">Designer</a>
                                <a href="#">Portfolio</a>
                                <a href="#">Project</a>
                                <a href="#">Personal</a>
                                <a href="#">Landing</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->

@endsection
