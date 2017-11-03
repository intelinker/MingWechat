<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<!doctype html>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
{{--<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
            }

            .title {
                font-size: 24px;
                font-weight: 400;
                margin-top: 80px;
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
                margin: 10px;
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
        </style>
    </head>

    <body>
        <div class="flex-center full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

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

                <div>
                    <label class="seat_line">1</label>

                    <a class="seat" href="https://laravel.com/docs"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat.png" ></a>
                    <a class="seat" href="https://laravel.com/docs"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat.png" ></a>
                    <a class="seat" href="https://laravel.com/docs"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat_unavailable.png" ></a>
                    <a class="seat" href="https://laravel.com/docs"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat.png" ></a>
                    <a class="seat" href="https://laravel.com/docs"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat_unavailable.png" ></a>
                </div>

                <div>
                    <label class="seat_line">2</label>

                    <a class="seat" href="https://laravel.com/docs"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat_unavailable.png" ></a>
                    <a class="seat" href="https://laravel.com/docs"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat.png" ></a>
                    <a class="seat" href="https://laravel.com/docs"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat.png" ></a>
                    <a class="seat" href="https://laravel.com/docs"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat.png" ></a>
                    <a class="seat" href="https://laravel.com/docs"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat_unavailable.png" ></a>
                </div>

                <div>
                    <label class="seat_line">3</label>

                    <a class="seat" href="https://laravel.com/docs"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat.png" ></a>
                    <a class="seat" href="https://laravel.com/docs"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat_unavailable.png" ></a>
                    <a class="seat" href="https://laravel.com/docs"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat.png" ></a>
                    <a class="seat" href="https://laravel.com/docs"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat.png" ></a>
                    <a class="seat" href="https://laravel.com/docs"><img class="media-object" width="40" height="40" alt="座位" src="/photos/seat_unavailable.png" ></a>
                </div>


                {{--<button type="button" class="btn btn-default" aria-label="Left Align">--}}
                    {{--<span class="glyphicon glyphicon-modal-window"  aria-hidden="true"></span>--}}
                {{--</button>--}}

                {{--<div class="links">--}}
                    {{--<a href="https://laravel.com/docs">Documentation</a>--}}
                    {{--<a href="https://laracasts.com">Laracasts</a>--}}
                    {{--<a href="https://laravel-news.com">News</a>--}}
                    {{--<a href="https://forge.laravel.com">Forge</a>--}}
                    {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
                {{--</div>--}}
            </div>
        </div>
    </body>
</html>
