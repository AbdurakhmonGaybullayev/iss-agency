@extends('layouts.front.master-2')

@section('main')

    <!-- event area start -->
    <div style="padding-top: 210px" class="event-area pd-top-120 pd-bottom-120">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>{{__("My Documents")}}</h3>
                </div>
                <div class="col-lg-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">{{__('University')}}</th>
                            <th scope="col">{{__('Direction')}}</th>
                            <th scope="col">{{__('Seen')}}</th>
                            <th scope="col">{{__('Sent At')}}</th>
                            <th scope="col"> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($documents as $document)
                            <tr>
                                <th scope="row">{{$document->id}}</th>
                                <td>{{$document->university['name_'.$locale]}}</td>
                                <td>{{$document->direction['name_'.$locale]}}</td>
                                <td>{{$document->status==1?__('Yes'):__('No')}}</td>
                                <td>{{$document->created_at}}</td>
                                <td><a style="height: 30px; line-height: 30px" class="btn btn-info" href="{{route('my-documents-show',['lang'=>$locale,'id'=>$document->id])}}">{{__('View')}}</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="col-12">
                    {{$documents->links('layouts.pagination.index',['query'=>$documents])}}
                </div>
            </div>
        </div>
    </div>
    <!-- event area end -->

@endsection
