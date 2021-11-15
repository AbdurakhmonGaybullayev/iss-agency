@extends('layouts.front.master-2')

@section('main')

    <!-- event area start -->
    <div style="padding-top: 210px" class="event-area pd-top-120 pd-bottom-120">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>{{__("My Offers")}}</h3>
                </div>
                <div class="col-lg-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">{{__('Company')}}</th>
                            <th scope="col">{{__('Message')}}</th>
                            <th scope="col">{{__('Seen')}}</th>
                            <th scope="col">{{__('Sent At')}}</th>
                            <th scope="col"> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offers as $offer)
                            <tr>
                                <th scope="row">{{$offer->id}}</th>
                                <td>{{$offer->company_name}}</td>
                                <td>{{substr($offer->message,0,20).'...'}}</td>
                                <td>{{$offer->status == 1?__('Yes'):__('No')}}</td>
                                <td>{{$offer->created_at}}</td>
                                <td><a style="height: 30px; line-height: 30px" class="btn btn-info" href="{{route('my-offers-show',['lang'=>$locale,'id'=>$offer->id])}}">{{__('View')}}</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="col-12">
                    {{$offers->links('layouts.pagination.index',['query'=>$offers])}}
                </div>
            </div>
        </div>
    </div>
    <!-- event area end -->

@endsection
