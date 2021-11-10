@extends('layouts.front.master-2')

@section('main')

    <!-- event area start -->
    <div style="padding-top: 210px" class="event-area pd-top-120 pd-bottom-120">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>{{__("My Applications")}}</h3>
                </div>
                <div class="col-lg-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">{{__('Subject')}}</th>
                            <th scope="col">{{__('Seen')}}</th>
                            <th scope="col">{{__('Sent At')}}</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applications as $application)
                            <tr>
                                <th scope="row">{{$application->id}}</th>
                                <td>{{$application->subject}}</td>
                                <td>{{$application->status == 1?__('Yes'):__('No')}}</td>
                                <td>{{$application->created_at}}</td>
                                <td><a style="height: 30px; line-height: 30px" class="btn btn-info" href="{{route('my-messages-show',['lang'=>$locale,'id'=>$application->id])}}">{{__('View')}}</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="col-12">
                    {{$applications->links('layouts.pagination.index',['query'=>$applications])}}
                </div>
            </div>
        </div>
    </div>
    <!-- event area end -->

@endsection
