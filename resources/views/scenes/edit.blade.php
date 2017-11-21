@extends('layouts.topbar')
@include('layouts.sidebar2')

<!doctype html>
@section('content')
    <div class="container" style="margin-left: 200px">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}

            <title>座位设置</title>

            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="{{ asset("/src/assets/stylesheets/mbox.css") }}" /><!--背景样式 弹框样式-->

            <!-- Styles -->
            <style>
                html, body {
                    background-color: #fff;
                    color: #636b6f;
                    font-family: 'Raleway', sans-serif;
                    font-weight: 100;
                    height: 10vh;
                    margin: 0;
                    margin: 0 auto;
                }

                .full-height {
                    height: 100vh;
                }

                .flex-center {
                    align-items: center;
                    display: flex;
                    justify-content: center;
                }

                .position-ref {
                    position: relative;
                }

                .top-right {
                    position: absolute;
                    right: 10px;
                    top: 18px;
                }

                .content {
                    text-align: center;
                    /*width: 80%;*/
                }

                .title {
                    font-size: 24px;
                    font-weight: 400;
                    margin-top: 50px;
                }

                .links > a {
                    color: #636b6f;
                    padding: 0 25px;
                    font-size: 12px;
                    font-weight: 600;
                    letter-spacing: .1rem;
                    text-decoration: none;
                    text-transform: uppercase;
                }

                .m-b-md {
                    margin-bottom: 30px;
                }

                .seat {
                    margin: 1%;
                    width: {{100/$rows - 4}}%;
                    height: auto;
                    max-width: 80px;
                }

                /*.seat_row {*/
                    /*margin-right: 43px;*/
                /*}*/

                .seat_line {
                    margin-right: 10px;
                    text-align: center;
                }

                .seat_row {
{{--                    width: {{100/$rows}}%;--}}

                    padding-right: {{100/($rows + 15)}}%;
                    padding-left: {{100/($rows + 15)}}%;
                    /*margin-bottom: 30px;*/
                    margin-top: 30px;
                    text-align: center;
                }

                .plat {
                    /*border-style: solid;*/
                    /*border: 10px;*/
                    /*border-color: #2ab27b;*/
                    padding-left: 150px;
                    padding-right: 150px;
                    padding-top: 30px;
                    padding-bottom: 30px;
                    border:2px solid #2ab27b;
                }

                .check
                {
                    opacity:0.3;
                    color:#996;

                }

                .checkbox {
                    display:none
                }

                /*input[type=checkbox] {*/
                /*display:none;*/
                /*}*/

                /*input[type=checkbox] + label*/
                /*{*/
                /*background-image: url(/photos/seat_checked.png) no-repeat;*/
                /*background-size: 50%;*/
                /*height: 250px;*/
                /*width: 250px;*/
                /*display:inline-block;*/
                /*padding: 0 0 0 0px;*/
                /*}*/
                /*input[type=checkbox]:checked + label*/
                /*{*/
                /*background: url("/photos/seat.png") no-repeat;*/
                /*background-size: 50%;*/
                /*height: 250px;*/
                /*width: 250px;*/
                /*display:inline-block;*/
                /*padding: 0 0 0 0px;*/
                /*}*/
            </style>
        </head>

        {{--@section('content')--}}

        <body>

        <div class="flex-center full-height">
            {{--@if (Route::has('login'))--}}
            {{--<div class="top-right links">--}}
            {{--@auth--}}
            {{--<a href="{{ url('/home') }}">Home</a>--}}
            {{--@else--}}
            {{--<a href="{{ route('login') }}">Login</a>--}}
            {{--<a href="{{ route('register') }}">Register</a>--}}
            {{--@endauth--}}
            {{--</div>--}}
            {{--@endif--}}

            <div class="content"  style="margin-top: 55px">
                <div class="title m-b-md">
                    剧 场 设 置
                </div>

                {{--<div class="jumbotron">--}}
                {{--<img class="media-object" width="150" height="100" alt="舞台" src="/photos/actors.png" >--}}
                {{--</div>--}}

                <label class="plat">舞台</label>
                <div class="clearfix"></div>
                <div class="seat_row">
                    {{--<label class="seat_row"></label>--}}
                    {{--<label class="seat_row"></label>--}}
                    @php $alphaBetas = array('A', 'B', 'C', 'E', 'F', 'G', 'H', 'I', 'J', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
                    @endphp
                    @for($i=1; $i<=$rows; $i++)
                        <label class="seat_row">{{$alphaBetas[$i-1]}}</label>
                    @endfor
                </div>

                <div class="form-group">
                    <div>
                        @for($i=1; $i <= $lines; $i++)
                            <label class="seat_line">{{$i}}</label>
                            @foreach($seats as $seat)
                                @if($seat->line == $i)
                                    {{--<form method="get">--}}

                                    {{--<label class="btn btn-primary">--}}
                                    <img id="'seat_'+ {{$i}} +'_' + {{$seat->row}}" @if($seat->available == 1) src="/photos/seat.png" class="seat img-thumbnail img-check" @else src="/photos/seat_unavailable.png" class="seat" @endif alt="..." onclick="setSeat({{$seat}})">
                                    {{--<input type="checkbox" name="check_'+ {{$i}} +'_' + {{$seat->row}}" id="check_'+ {{$i}} +'_' + {{$seat->row}}" value="val1" class="checkbox" autocomplete="off">--}}
                                    {{--</label>--}}
                                @endif
                            @endforeach
                            <div class="clearfix"></div>
                        @endfor
                    </div>

                </div>
            </div>
        </div>
            <script src="{{ url('/src/js/jQuery.min.2.2.4.js') }}" ></script>

            <script type="text/javascript" src="/src/js/jquery-1.10.2.min.js" ></script><!--jquery库-->
            <script type="text/javascript" src="/src/js/jm-qi.js" ></script><!--自定义弹框大小，提示信息，样式，icon。。。。-->
            <script>

                //    jQuery(document).ready(function() {
                //
                //        var tables = document.getElementsByTagName('img');
                ////        document.getElementsByClassName('content')[0].style.width = 100%;
                ////        alert(tables);
                //        for (var i = 0; i < tables.length; i++) {  // 逐个改变
                //            tables[i].style.width = '15%';  // 宽度改为15%
                //            tables[i].style.height = 'auto';
                //        }
                //    });

                function setSeat($seat) {
                    $url = '/seatavailable/' + $seat['id'] + '/' + ($seat['available'] ? 0 : 1);
                    location.assign($url);
//        $.ajax({
//
//                type: 'GET',
//
//                url: $url,
//
//                data: {'avaliable' : $seat['available'] ? 0 : 1},
//
//                dataType: "json",
//
//                success: function(data){
//
////                console.log(data);
//
//                    window.location.reload();
//                },
//
//                error: function(xhr, type){
//                    alert('Ajax error!' + type.toString());
//                }
//
//            });





                }
            </script>
        </body>
    </div>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
{{--<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}

{{--<html lang="{{ app()->getLocale() }}">--}}


@endsection


{{--</html>--}}
