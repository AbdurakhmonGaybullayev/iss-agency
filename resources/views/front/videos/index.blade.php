@extends('layouts.front.master-2')

@section('main')

    <!-- Button trigger modal start-->
    <button style="display: none;" type="button" id="modal-alert-button2" class="btn btn-primary" data-toggle="modal"
            data-target="#exampleModalCenter2">
        Launch demo modal
    </button>
    <!-- Button trigger modal end-->

    <!-- Modal start-->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-width" role="document">
            <div style="padding: 0 10px 10px 10px" class="modal-content">
                <div id="modal-header" class="modal-header">
                    <h5 style="margin: 0" id="exampleModalLongTitle2"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <video id="video" class="d-block w-100" autoplay controls>
                    <source id="source-1" src="" type="video/mp4">
                    <source id="source-2" src="" type="video/ogg">
                    Your browser does not support HTML video.
                </video>
            </div>

        </div>
    </div>
    <!-- Modal end-->

    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay"
         style="background-image:url({{\App\Models\Header::first()->gallery->getUrl()}}); background-size: cover;
             background-position: center;">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">{{__('Videos')}}</h2>
                    <ul class="page-list">
                        <li><a href="{{route('home',$locale)}}">{{__('Home')}}</a></li>
                        <li>{{__('Videos')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- gallery area start -->
    <div class="team-area pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">

                @foreach($videos as $video)
                    @if($video->type == 1)
                        @if(\App\Models\Video::where('parent_id',$video->id)->count() > 0)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-gallery-inner">
                                    <div
                                        style="background-image: url({{$video->cover->getUrl()}}); background-size: cover; background-position: center;"
                                        class="thumb">
                                        <img style="opacity: 0;" src="{{asset('front/assets/img/course/2.png')}}"
                                             alt="img">
                                    </div>
                                    <div class="details">
                                        <h4>
                                            <a href="{{route('videos-detail',['lang'=>$locale,'id'=>$video->id])}}">{{$video['title_'.$locale]}}</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    @if($video->type == 0)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-gallery-inner">
                                <div
                                    style="background-image: url({{$video->cover->getUrl()}}); background-size: cover; background-position: center;"
                                    class="thumb">
                                    <img style="opacity: 0;" src="{{asset('front/assets/img/course/2.png')}}"
                                         alt="img">
                                    <a class="play-icon" href="javascript:void(0)"
                                       onclick="playVideo('{{$video->file->getUrl()}}','{{$video['title_'.$locale]}}')"><i
                                            class="fa fa-play-circle"></i></a>

                                </div>
                                <div style="padding-bottom: 10px" class="details">
                                    <h6 style="color: white">
                                        <a href="javascript:void(0)"
                                           onclick="playVideo('{{$video->file->getUrl()}}','{{$video['title_'.$locale]}}')">{{$video['title_'.$locale]}}</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
            <div style="width: 100%">
                <div style="margin: 0 auto; width: fit-content">
                    {{$videos->links('layouts.pagination.index',['query' => $videos])}}
                </div>
            </div>
        </div>
    </div>
    <!-- gallery area end -->

@endsection

@section('js')
    <script>
        function playVideo(src, title) {
            document.getElementById('source-1').src = src;
            document.getElementById('source-2').src = src;
            document.getElementById('exampleModalLongTitle2').innerHTML = title;
            document.getElementById('modal-alert-button2').click();
            document.getElementById('video').load();
        }
    </script>
@endsection
