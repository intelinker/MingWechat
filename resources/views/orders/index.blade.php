@extends('layouts.topbar')
@include('layouts.sidebar2')

@section('content')

    <div class="container" style="margin-left: 200px">


        <div class="row">
            <div class="col-md-9" role="main">
                @foreach($orders as $order)
                    <div class="media">
                        {{--<div class="media-left">--}}
                        {{--<a href="#">--}}
                        {{--<img class="media-object img-circle" width="64" alt="图标" src="{{$diary->user->avatar}}">--}}
                        {{--                                {!! gettype($diary->user->avatar) !!}--}}
                        {{--</a>--}}
                        {{--</div>--}}
                        <div class="media-body">
                            <h4 class="media-heading"><a href="/orders/{{$order->id}}">{{$order->title}} 开场时间：{{$order->detail}}</a></h4>
                            购票人： {{$order->buyer->name}}
                            {{--                        回复:{{count($diary->comments)}}--}}
                        </div>

                    </div>

                @endforeach

            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 clearfix">
                <span class="totalpage pagination">订单总数：{{ ($totalOrders) }}</span>   {!! $orders->links() !!}
            </div>
        </div>
    </div>

@endsection