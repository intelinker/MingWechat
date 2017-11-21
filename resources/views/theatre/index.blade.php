@extends('layouts.topbar')
@include('layouts.sidebar2')

@section('content')

    <div class="container" style="margin-left: 200px">

        <!-- Main component for a primary marketing message or call to action -->
        <div class="jumbotron" style="margin-top: 55px">
            <h2>剧场管理
                <a class="btn btn-lg btn-primary pull-right" href="/theatres/create" role="button">新建剧场</a>
            </h2>
        </div>

        <div class="row">
            <div class="col-md-9" role="main">
                @foreach($theatres as $theatre)
                    <div class="media">
                        {{--<div class="media-left">--}}
                        {{--<a href="#">--}}
                        {{--<img class="media-object img-circle" width="64" alt="图标" src="{{$article['content']['news_item'][0]['thumb_url']}}">--}}
                        {{--                                                            {!! gettype($article['content']['news_item'][0]['thumb_url']) !!}--}}
                        {{--</a>--}}
                        {{--</div>--}}
                        <div class="media-body">
                            <h4 class="media-heading"><a href="theatre/edit">{{$theatre->name}}: {{$theatre->lines}}排{{$theatre->rows}}列 </a></h4>
                            {{$theatre->description}}
                            {{--                        回复:{{count($diary->comments)}}--}}
                        </div>

                    </div>

                @endforeach

            </div>

            {{--<div class="col-lg-12 col-md-12 col-sm-12 clearfix">--}}
            {{--<span class="totalpage pagination">文章总数：{{ count($articles) }}篇</span>   {!! $articles->links() !!}--}}
            {{--</div>--}}
        </div>
    </div>

@endsection