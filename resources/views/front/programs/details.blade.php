@extends('layouts.front.master-2')

@section('main')
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url({{$university->image->getUrl()}}); background-size: cover;
        background-position: center;">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">{{$university['name_'.$locale]}}</h2>
                    <ul class="page-list">
                        <li><a href="{{route('home',$locale)}}">{{__('Home')}}</a></li>
                        <li><a href="{{route('programs',$locale)}}">{{__('Programs')}}</a></li>
                        <li>{{$university['name_'.$locale]}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- course-single area start -->
    <div class="course-single-area pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course-course-detaila-inner">
                        <div class="details-inner">
                            <div class="emt-user">
                                <span
                                    style="background-image: url({{$university->country->country_logo->getUrl()}}); background-size: cover; background-position: left;"
                                    class="u-thumb"><img style="opacity: 0;"
                                                         src="{{asset('front/assets/img/author/1.png')}}"
                                                         alt="img"></span>
                                <span class="align-self-center">{{$university->country['name_'.$locale]}}</span>
                            </div>
                            <h3 class="title"><a href="course-details.html">{{$university['name_'.$locale]}}</a></h3>
                        </div>
                        <div class="thumb">
                            <img src="{{$university->image->getUrl()}}" alt="img">
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                <div class="course-details-content">
                                    @php echo $university['article_description_'.$locale]; @endphp
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                <div class="course-details-content">
                                    <h4 class="title">Overview</h4>
                                    <p>The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog.
                                        Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz,
                                        bad nymph, for quick jigs vex! Fox nymphs grab</p>
                                    <div id="accordion" class="accordion-area mt-4">
                                        <div class="card single-faq-inner style-no-border">
                                            <div class="card-header" id="ff-one">
                                                <h5 class="mb-0">
                                                    <button class="btn-link" data-toggle="collapse" data-target="#f-one"
                                                            aria-expanded="true" aria-controls="f-one">
                                                        01. What does you simply dummy in do ?
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="f-one" class="show collapse" aria-labelledby="ff-one"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    What does you dummy text of free available in market printing has
                                                    industry been industry's standard dummy text ever.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card single-faq-inner style-no-border">
                                            <div class="card-header" id="ff-two">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" data-toggle="collapse"
                                                            data-target="#f-two" aria-expanded="true"
                                                            aria-controls="f-two">
                                                        02. What graphics dummy of free design ?
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="f-two" class="collapse" aria-labelledby="ff-two"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    What graphics simply dummy text of free available in market printing
                                                    industry has been industry's standard dummy text ever.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card single-faq-inner style-no-border">
                                            <div class="card-header" id="ff-three">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" data-toggle="collapse"
                                                            data-target="#f-three" aria-expanded="true"
                                                            aria-controls="f-three">
                                                        03. Why we are the best ?
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="f-three" class="collapse" aria-labelledby="ff-three"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    Why we are dummy text of free available in market printing industry
                                                    has been industry's standard dummy text ever.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card single-faq-inner style-no-border">
                                            <div class="card-header" id="ff-four">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" data-toggle="collapse"
                                                            data-target="#f-four" aria-expanded="true"
                                                            aria-controls="f-four">
                                                        04. What industries dummy covered ?
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="f-four" class="collapse" aria-labelledby="ff-four"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    What industries text of free available in market printing industry
                                                    has been industry's standard dummy text ever.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                <div class="course-details-content">
                                    <h4 class="title">Overview</h4>
                                    <p>The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog.
                                        Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz,
                                        bad nymph, for quick jigs vex! Fox nymphs grab</p>
                                    <div id="accordion-1" class="accordion-area mt-4">
                                        <div class="card single-faq-inner style-header-bg">
                                            <div class="card-header" id="ff-five">
                                                <h5 class="mb-0">
                                                    <button class="btn-link" data-toggle="collapse"
                                                            data-target="#f-five" aria-expanded="true"
                                                            aria-controls="f-five">
                                                        01. What does you simply dummy in do ?
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="f-five" class="show collapse" aria-labelledby="ff-five"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    What does you dummy text of free available in market printing has
                                                    industry been industry's standard dummy text ever.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card single-faq-inner style-header-bg">
                                            <div class="card-header" id="ff-six">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" data-toggle="collapse"
                                                            data-target="#f-six" aria-expanded="true"
                                                            aria-controls="f-six">
                                                        02. What graphics dummy of free design ?
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="f-six" class="collapse" aria-labelledby="ff-six"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    What graphics simply dummy text of free available in market printing
                                                    industry has been industry's standard dummy text ever.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card single-faq-inner style-header-bg">
                                            <div class="card-header" id="ff-seven">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" data-toggle="collapse"
                                                            data-target="#f-seven" aria-expanded="true"
                                                            aria-controls="f-seven">
                                                        03. Why we are the best ?
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="f-seven" class="collapse" aria-labelledby="ff-seven"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    Why we are dummy text of free available in market printing industry
                                                    has been industry's standard dummy text ever.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card single-faq-inner style-header-bg">
                                            <div class="card-header" id="ff-eight">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" data-toggle="collapse"
                                                            data-target="#f-eight" aria-expanded="true"
                                                            aria-controls="f-eight">
                                                        04. What industries dummy covered ?
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="f-eight" class="collapse" aria-labelledby="ff-eight"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    What industries text of free available in market printing industry
                                                    has been industry's standard dummy text ever.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                                <div class="ratings-list-inner mb-4">
                                    <div class="row">
                                        <div class="col-md-4 align-self-center text-center">
                                            <div class="total-avarage-rating">
                                                <h2>5.0</h2>
                                                <div class="rating-inner">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p>Rated 5 out of 3 Ratings</p>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <span class="counter-label"><i class="fa fa-star"></i>5</span>
                                                        <span class="progress-bar-inner">
                                                            <span class="progress">
                                                                <span class="progress-bar" role="progressbar"
                                                                      aria-valuenow="100"
                                                                      aria-valuemin="0" aria-valuemax="100"
                                                                      style="width:100%"></span>
                                                            </span>
                                                        </span>
                                                        <span class="counter-count">100%</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="counter-label"><i class="fa fa-star"></i>4</span>
                                                        <span class="progress-bar-inner">
                                                            <span class="progress">
                                                                <span class="progress-bar" role="progressbar"
                                                                      aria-valuenow="80"
                                                                      aria-valuemin="0" aria-valuemax="100"
                                                                      style="width:0%"></span>
                                                            </span>
                                                        </span>
                                                        <span class="counter-count">0%</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="counter-label"><i class="fa fa-star"></i>3</span>
                                                        <span class="progress-bar-inner">
                                                            <span class="progress">
                                                                <span class="progress-bar" role="progressbar"
                                                                      aria-valuenow="0"
                                                                      aria-valuemin="0" aria-valuemax="100"
                                                                      style="width:0%"></span>
                                                            </span>
                                                        </span>
                                                        <span class="counter-count">0%</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="counter-label"><i class="fa fa-star"></i>2</span>
                                                        <span class="progress-bar-inner">
                                                            <span class="progress">
                                                                <span class="progress-bar" role="progressbar"
                                                                      aria-valuenow="0"
                                                                      aria-valuemin="0" aria-valuemax="100"
                                                                      style="width:0%"></span>
                                                            </span>
                                                        </span>
                                                        <span class="counter-count">0%</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="counter-label"><i class="fa fa-star"></i>1</span>
                                                        <span class="progress-bar-inner">
                                                            <span class="progress">
                                                                <span class="progress-bar" role="progressbar"
                                                                      aria-valuenow="0"
                                                                      aria-valuemin="0" aria-valuemax="100"
                                                                      style="width:0%"></span>
                                                            </span>
                                                        </span>
                                                        <span class="counter-count">0%</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="td-sidebar">
                        <div class="widget widget_feature">
                            <h4 class="widget-title">{{__('University Features')}}</h4>
                            <ul>
                                <li><i class="fa fa-globe"></i><span>{{__('Country')}}:</span> {{$university->country['name_'.$locale]}}
                                </li>
                                <li><i class="fa fa-clipboard"></i><span>{{__('IELTS')}}:</span> @if($university->ielts == 0){{__('Not need')}}@else{{$university->ielts}}@endif
                                </li>
                                <li><i class="fa fa-clone"></i><span>{{__('Programs')}}:</span>
                                    @php $i = 0; @endphp
                                    @foreach($universityPrograms as $key => $universityProgram)
                                        @php $i = $i + 1; @endphp
                                        @if($i == $universityPrograms->count())
                                            {{$universityProgram['name_'.$locale]}}
                                        @else
                                            {{$universityProgram['name_'.$locale].','}}
                                        @endif
                                    @endforeach
                                </li>
                            </ul>

                            <div class="price-wrap text-center">
                                <h5>{{__('Price')}}:<span>${{$university->price}}</span></h5>
                                <a class="btn btn-base btn-radius" href="{{route('admission',['lang'=>$locale,'id'=>$university->id])}}">{{__('Admission')}}</a>
                            </div>
                        </div>
                        <div class="widget widget_catagory">
                            <div class="widget widget_catagory">
                                @if($countries->count() != 0)
                                    <h4 class="widget-title">{{__('Countries')}}</h4>
                                @endif
                                <ul class="catagory-items">
                                    @foreach($countries as $country)
                                        <li><a href="{{route('programs',$locale).'?country='.$country->id}}">{{$country['name_'.$locale]}} <i class="fa fa-caret-right"></i></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget widget_tags mb-0">
                                @if($programs->count() != 0)
                                    <h4 class="widget-title">{{__('Directions')}}</h4>
                                    <div class="tagcloud">
                                        @foreach($programs as $program)
                                            <a href="{{route('programs',$locale).'?program='.$program->id}}">{{$program['name_'.$locale]}}</a>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center pd-top-100">
                @foreach($universities as $university)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-course-inner">
                            <div
                                style="background-image: url({{$university->image->getUrl()}}); background-size: cover; background-position: center;"
                                class="thumb">
                                <a href="{{route('program-details',['lang'=>$locale,'id'=>$university->id])}}"><img
                                        style="opacity: 0;" src="{{asset('front/assets/img/course/2.png')}}"
                                        alt="img"></a>
                            </div>
                            <div class="details">
                                <div class="details-inner">
                                    <div class="emt-user">
                                                <span class="u-thumb"
                                                      style="background-image: url({{$university->country->image->getUrl()}}); background-size: cover; background-position: left;"><img
                                                        style="opacity: 0;"
                                                        src="{{asset('front/assets/img/author/2.png')}}"
                                                        alt="img"></span>
                                        <span
                                            class="align-self-center">{{$university->country['name_'.$locale]}}</span>
                                    </div>
                                    <h6>
                                        <a href="{{route('program-details',['lang'=>$locale,'id'=>$university->id])}}">{{$university['name_'.$locale]}}</a>
                                    </h6>
                                </div>
                                <div class="emt-course-meta">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="rating">
                                                IELTS:<span>{{$university->ielts}}</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="price text-right">
                                                Price: <span>${{$university->price}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- course-single area end -->
@endsection
