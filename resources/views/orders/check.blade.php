<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<!DOCTYPE html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
{{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
<link rel="stylesheet" href="{{ asset("src/assets/stylesheets/styles.css") }}" />


<title>选座购票</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购票支付</title>

</head>
<body>


<div align="center">
    <div class="flex-center full-height container">
        @if(count($order) > 0)
            <h3>验 证 成 功</h3>

            <div>
                <p>{{$order->title}}</p>
                <p>开场时间：{{$order->detail}}</p>
            </div>
        @else
            <h3>验 证 失 败</h3>

            <div>
                <p style="color: red">票据无效或已过期</p>
            </div>
        @endif

    </div>
</div>