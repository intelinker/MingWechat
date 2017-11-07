{{--<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->--}}
{{--<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}

{{--<li>--}}
    {{--<span class="glyphicon glyphicon-modal-window" aria-hidden="true"></span>--}}
    {{--<span class="glyphicon-class">glyphicon glyphicon-modal-window</span>--}}
{{--</li>--}}

<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<!doctype html>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
{{--<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}

{{--<html lang="{{ app()->getLocale() }}">--}}

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}

    <title>选座购票</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 10vh;
            margin: 0;
            max-width:800px;
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
            /*width: 15%;*/
            /*height: auto;*/
        }

        .seat_row {
            margin-right: 43px;
        }

        .seat_line {
            margin-right: 10px;
            text-align: center;
        }

        .plat {
            /*border-style: solid;*/
            /*border: 10px;*/
            /*border-color: #2ab27b;*/
            padding-left: 50px;
            padding-right: 50px;
            padding-top: 10px;
            padding-bottom: 10px;
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

    <div class="content">
        <div class="title m-b-md">
            选 座 购 票
        </div>

        {{--<div class="jumbotron">--}}
        {{--<img class="media-object" width="150" height="100" alt="舞台" src="/photos/actors.png" >--}}
        {{--</div>--}}

        <label class="plat">舞台</label>

        <div style="margin-bottom: 20px; margin-top: 20px">
            <label class="seat_row"></label>
            <label class="seat_row">A</label>
            <label class="seat_row">B</label>
            <label class="seat_row">C</label>
            <label class="seat_row">D</label>
            <label class="seat_row">E</label>
        </div>

        {{--@for($i=0; $i<count($seats); $i++)--}}
            {{--if--}}
            {{--@for($j=0)--}}
                {{--<a class="seat" onclick="event.cancelBubble=true;buyTicket({{$comment->id}})"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat.png" ></a>--}}
            {{--@endforeach--}}
        {{--@endforeach--}}
        {{--<form method="get">--}}
            <div class="form-group">
            <div>
                <label class="seat_line">1</label>
                @foreach($seats as $seat)
                    @if($seat->line == 1)
                        {{--<form method="get">--}}

                        <label class="btn btn-primary">
                            <img id="'seat_1_' + {{$seat->row}}" @if($seat->available == 1) src="/photos/seat.png" class="seat img-thumbnail img-check" @else src="/photos/seat_unavailable.png" class="seat img-thumbnail" @endif alt="..." onclick="buyTicket({{$seat}})">
                            <input type="checkbox" name="check_1_' + {{$seat->row}}" id="check_1_' + {{$seat->row}}" value="val1" class="checkbox" autocomplete="off">
                        </label>
                        {{--<input type="submit" style="display:none" value="Check Item" class="btn btn-success">--}}

                        {{--</form>--}}

                        {{--<input type='checkbox' name='thing' value='valuable' id="thing"/><label for="thing"></label>--}}

                        {{--<label  for="'seat_1_' + {{$seat->row}}">--}}
                            {{--<img  class="seat"  width="40" height="40" alt="选中" @if($seat->available == 1) src="/photos/seat.png" @else src="/photos/seat_unavailable.png" @endif id="'check_1_' + {{$seat->row}}" onclick="buyTicket({{$seat}})">--}}
                        {{--</label>--}}
                        {{--<input type="checkbox"  style="" id= "'check_1_' + {{$seat->row}}" checked="checked">--}}

                        {{--<a class="seat" onclick="">--}}
                        {{--<img id="'1_' + {{$seat->row}}" class="media-object" width="40" height="40" alt="座位" @if($seat->available == 1) src="/photos/seat.png" @else src="/photos/seat_unavailable.png" @endif>--}}
                        {{--</a>--}}
                    @endif
                @endforeach
            </div>

            <div>
                <label class="seat_line">2</label>
                @foreach($seats as $seat)
                    @if($seat->line == 2)
                        <label class="btn btn-primary">
                            <img id="'seat_2_' + {{$seat->row}}" @if($seat->available == 1) src="/photos/seat.png" class="seat img-thumbnail img-check" @else src="/photos/seat_unavailable.png" class="seat img-thumbnail @endif alt="..."  onclick="buyTicket({{$seat}}, {{$seats}})">
                            <input type="checkbox" name="check_2_' + {{$seat->row}}" id="check_2_' + {{$seat->row}}" value="val1" class="checkbox" autocomplete="off">
                        </label>
                        {{--<a class="seat" onclick="event.cancelBubble=true;buyTicket({{$seat}})">--}}
                            {{--<img id="'2_' + {{$seat->row}}" class="media-object" width="40" height="40" alt="座位" @if($seat->available == 1) src="/photos/seat.png" @else src="/photos/seat_unavailable.png" @endif>--}}
                        {{--</a>--}}
                        {{--<input type="checkbox"  style="display:none" id="agree" checked="checked">--}}
                    @endif
                @endforeach
            </div>

            <div>
                <label class="seat_line">3</label>
                @foreach($seats as $seat)
                    @if($seat->line == 3)
                        <label class="btn btn-primary">
                            <img id="'seat_3_' + {{$seat->row}}" @if($seat->available == 1) src="/photos/seat.png" class="seat img-thumbnail img-check" @else src="/photos/seat_unavailable.png" class="seat img-thumbnail" @endif alt="..." onclick="buyTicket({{$seat}})">
                            <input type="checkbox" name="check_3_' + {{$seat->row}}" id="check_3_' + {{$seat->row}}" value="val1" class="checkbox" autocomplete="off">
                        </label>
                        {{--<a class="seat" onclick="event.cancelBubble=true;buyTicket({{$seat}})">--}}
                            {{--<img id="'3_' + {{$seat->row}}" class="media-object" width="40" height="40" alt="座位" @if($seat->available == 1) src="/photos/seat.png" @else src="/photos/seat_unavailable.png" @endif>--}}
                        {{--</a>--}}
                        {{--<input type="checkbox"  style="display:none" id="agree" checked="checked">--}}
                    @endif
                @endforeach
            </div>

            </div>
        {{--</form>--}}



        {{--<button type="button" class="btn btn-default" aria-label="Left Align">--}}
        {{--<span class="glyphicon glyphicon-modal-window"  aria-hidden="true"></span>--}}
        {{--</button>--}}

        {{--<div class="links">--}}
        {{--<a onclick="event.cancelBubble=true;buyTicket({{$comment->id}})">Documentation</a>--}}
        {{--<a href="https://laracasts.com">Laracasts</a>--}}
        {{--<a href="https://laravel-news.com">News</a>--}}
        {{--<a href="https://forge.laravel.com">Forge</a>--}}
        {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
        {{--</div>--}}
    </div>
</div>

<script src="{{ url('/src/js/jQuery.min.2.2.4.js') }}" ></script>

<script>

    jQuery(document).ready(function() {

        var tables = document.getElementsByTagName('img');
//        document.getElementsByClassName('content')[0].style.width = 100%;
//        alert(tables);
        for (var i = 0; i < tables.length; i++) {  // 逐个改变
            tables[i].style.width = '15%';  // 宽度改为15%
            tables[i].style.height = 'auto';
        }
    });

//    $(document).ready(function(e){
//        var imgCheck = $(".img-check");
//        imgCheck.click(function(){
//            $(this).toggleClass("check");
//            alert(JSON.stringify($(".check")));
//        });
//    });

//    document.getElementById(".check").onclick = function (e) {
//        alert(JSON.stringify($(this)));
//    };

//    $(document).ready(function () {
//        $('.img-check').change( function () {
//            alert($(this).val());
//        })
//    })
    function buyTicket($seat, $seats) {
//        var checkimg = $("#seat_" + $seat['line'] + "_" + $seat['row']); //document.getElementById("seat_" + $seat['line'] + "_" + $seat['row']);
//        var checkbox = $("#check_" + $seat['line'] + '_' + $seat['row']);
//        if(checkbox.is(':checked')){
//            checkbox.attr("checked","unchecked");
//            checkimg.src="/photos/seat_checked.png";
//            checkimg.alt="未选";
//        } else{
//            checkbox.attr("checked","checked");
//            checkimg.src="/photos/seat.png";
//            checkimg.alt="选中";
//        }

//        $se = document.getElementsByClassName("img-check");
//        alert(JSON.stringify($se));


        if ($seat['available'] == 1) {
//            var id = $seat['line'] + "_" + $seat['row'];
//            var checkimg = document.getElementById(id);
//            $('#' + id).src("/photos/seat_checked.png");
////            if (checkimg.src == "/photos/seat.png")
////                checkimg.src = "/photos/seat_checked.png";
////            else
////                checkimg.src = "/photos/seat.png";
//

            if (confirm('您要购买茶位' + $seat['description'] + '?')) {
                location.assign("/orderseat/" + $seat['id']);

//                alert('谢谢支持!');
//            $assign = "/api/delcomment?commentid=";
//            $.ajax({
//
//                type: 'GET',
//
//                url: $assign,
//
//                data: { commentid : $commentid},
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
////                    alert('Ajax error!')
//                }
//
//            });
            } else  {
//                alert('取消删除!');
            }


        }

    }
</script>
{{--@endsection--}}
</body>


{{--</html>--}}
