@extends('layouts.topbar')
<link rel="stylesheet" href="{{ asset("/src/css/jquery-ui.min.css") }}" />

@include('layouts.sidebar2')

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
{{--@include('articles.sidebarCategory',['categories'=>$categories, 'types'=>$types, 'tag'=>$tags, 'currentAction'=>$currentAction])--}}
@section('content')
    @include('vendor.ueditor.assets')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12" style="margin-top: 25px">
                <h1 class="page-header">新建场次</h1>

                @if($theatres == null || count($theatres) == 0)
                    <div class="center-align title">
                        您还没有创建剧场
                        <a class="btn btn-lg btn-primary pull-right" href="/theatre/create" role="button">新建剧场</a>
                    </div>
                @else
                    @if ($fail = Session::get('warning'))
                        <div class="col-md-12 bs-example-bg-classes" >
                            <p class="bg-danger">
                                {{ $fail }}
                            </p>
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <span class="help-block">
                         <strong>
                            @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                        </strong>
                    </span>
                    @endif

                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 55px">
                        {!! Form::open(array('url' => 'scenes', 'class' => 'form', 'method'=>'post', 'enctype'=>'multipart/form-data')) !!}
                        <div class="form-group  col-lg-12 col-md-12 col-sm-12" >


                            {{--<div>--}}
                            {{--<label class="col-lg-1 col-md-1 col-sm-1" style="margin-bottom: 55px">选择剧场</label>--}}
                            {{--<div class="col-md-2" style="margin-bottom: 55px">--}}
                            {{--<select class="col-lg-12 col-md-12 col-sm-12 form-control" name="category_id">--}}
                            {{--@foreach($theatres as $theatre)--}}
                            {{--<option value="{{$theatre->id}}">--}}
                            {{--{{$theatre->name}}--}}
                            {{--</option>--}}
                            {{--@endforeach--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="clearfix"></div>--}}

                            <div>
                                <label class="col-lg-1 col-md-1 col-sm-1" style="margin-bottom: 55px">剧场</label>
                                <div class="col-md-2" style="margin-bottom: 55px">
                                    <select class="col-lg-11 col-md-11 col-sm-11 form-control" name="theatre_id" id="theatre_id">
                                        @foreach($theatres as $theatre)
                                            <option value="{{$theatre->id}}" {{ $theatre->id == $selectedTheatre->id ? 'selected' : '' }}>
                                                {{$theatre->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="{{ isset($errors) && $errors->has('theme') ? 'has-error clearfix' : 'clearfix' }} " style="margin-bottom: 0px" >
                                <label class="col-lg-1 col-md-1 col-sm-1"  style="margin-bottom: 55px">主题</label>
                                <div class="col-md-11">
                                    @if ($errors->has('theme'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('theme') }}</strong>
                                    </span>
                                    @endif
                                    <input class="col-lg-11 col-md-11 col-sm-11 form-control" type="text" id="theme" name="theme" placeholder="主题"/>
                                </div>
                            </div>

                            <div class="{{ isset($errors) && $errors->has('description') ? 'has-error clearfix' : 'clearfix' }}" style="margin-bottom: 0px" >
                                <label class="col-lg-1 col-md-1 col-sm-1"  style="margin-bottom: 55px">说明</label>
                                <div class="col-md-11">
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                    <input class="col-lg-12 col-md-12 col-sm-12 form-control" type="text" id="description" name="description" placeholder="说明"/>
                                </div>
                            </div>

                            <div>
                                <label class="col-lg-1 col-md-1 col-sm-1" style="margin-bottom: 55px">座位数量</label>
                                <div class="col-md-2" style="margin-bottom: 55px">
                                    <select class="col-lg-1 col-md-1 col-sm-1 form-control" name="lines">
                                        @for($i = 1; $i <= $selectedTheatre->lines; $i++)
                                            <option value="{{$i}}">
                                                {{$i}}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-1">排</div>

                                <div class="col-md-2" style="margin-bottom: 55px">
                                    <select class="col-lg-12 col-md-12 col-sm-12 form-control" name="rows">
                                        @for($i = 1; $i <= $selectedTheatre->rows; $i++)
                                            <option value="{{$i}}">
                                                {{$i}}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-1">列</div>
                            </div>
                            <div class="clearfix"></div>


                            <div >
                                <label class="col-lg1-1 col-md-1 col-sm-1">开场时间</label>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" value="{{date("Y-m-d h:i")}}" id="playtime" name="playtime"/>

                                    {{--<input size="16" type="text" value="{{date("Y-m-d h:i")}}" readonly class="form_datetime">--}}

                                    {{--<script type="text/javascript">--}}
                                        {{--$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});--}}
                                    {{--</script>--}}
                                </div>
                            </div>
                            {{--<div class="clearfix"></div>--}}


                            <div>
                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            <label class="col-lg-1 col-md-1 col-sm-1">演出时长</label>
                            <div class="col-md-1">
                                <input class="col-lg-1 col-md-1 col-sm-1 form-control" type="text" id="duration" name="duration"></input>
                            </div>
                                    <div class="col-md-1">分钟</div>

                            </div>
                            <div class="clearfix"></div>

                            <div  style="margin-top: 55px">
                                <label class="col-lg-1 col-md-1 col-sm-1">票价</label>
                                <div class="col-md-1">
                                    <input class="col-lg-1 col-md-1 col-sm-1 form-control" type="text" id="price" name="price"></input>
                                </div>
                                <div class="col-md-1">元</div>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            {{--<div>--}}
                            {{--<label class="col-lg-12 col-md-12 col-sm-12">选择类型</label>--}}
                            {{--<div class="col-md-12">--}}
                            {{--<select class="col-lg-12 col-md-12 col-sm-12 form-control" name="type_id">--}}
                            {{--@foreach ($articletypes as $type)--}}
                            {{--<option value="{{$type->id}}">{{$type->name}}</option>--}}
                            {{--@endforeach--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div>--}}
                            {{--<label class="col-lg-1 col-md-1 col-sm-1">选择标签</label>--}}
                            {{--<div class="col-md-11">--}}
                            {{--<input id="tags" name="tags" class="col-lg-12 col-md-12 col-sm-12 form-control" placeholder="(必填) 多个关键字之间用逗号隔开"  />--}}
                            {{--<div class="col-lg-12 col-md-12 col-sm-12 highlight"  style="margin-top: 5px">--}}
                            {{--<span><small>提示现有的标签: {!! $tagString !!}</small></span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                        </div>
                        {!! Form::token() !!}
                        <div class=" col-lg-1 col-md-1 col-sm-1" style="margin-top: 25px">
                            <input type="submit" id="submit" value="保存" class="btn btn-primary pull-right" />
                        </div>
                        {{--<div>--}}
                            {{--<label class="col-md-3 published_label" style="margin-top: 30px">--}}
                                {{--<input class="published" type="checkbox" name="published"  /> 发布--}}
                            {{--</label>--}}
                        {{--</div>--}}
                        </form>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <script>
        document.getElementById("images1").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("image1").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };

        document.getElementById("images2").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("image2").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };

        document.getElementById("images3").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("image3").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    </script>
{{--@endsection--}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $('#playtime').datetimepicker({
            format: 'YYYY-MM-DD hh:mm',
//            format: 'YYYY-MM-DD HH:mm:ss'
        });
//    var sampleApp = angular.module('myapp', [], function($interpolateProvider) {
//        $interpolateProvider.startSymbol('<%');
//        $interpolateProvider.endSymbol('%>');
//    });
</script>

    <script src="{{ url('/src/js/jQuery.min.2.2.4.js') }}" ></script>

<script>
    var changeFlag=false;
    //标识文本框值是否改变，为true，标识已变
    jQuery(document).ready(function(){
//        jQuery("#images").change(function() {
//            console.log('changes');
//            var reader = new FileReader();
//            reader.onload = function (e) {
//                console.log('onload');
//                // get loaded data and render thumbnail.
//                jQuery("#image").src = e.target.result;
//            };
//
//            // read the image file as a data URL.
//            reader.readAsDataURL(this.files[0]);
//        });

        jQuery('#title').blur(function(){
            var title =  jQuery('#title').val();
            console.log(title.length);
            if (title.length > 35) {
                jQuery('#title').append('<span><strong>文章标题太长</strong></span>');
                alert('文章标题超过35个字');
                return false;
            }
        });

        //文本框值改变即触发
        jQuery("input[type='text']").change(function(){
            changeFlag=true;
        });
        //文本域改变即触发
        jQuery("textarea").change(function(){
            changeFlag=true;
        });
    });

    //离开页面时保存文档
    //        jQuery('#submit').submit(
    //        window.onbeforeunload = function() {
    //            if(changeFlag ==true){
    //                return confirm("页面值已经修改，是否要保存？");
    //            }
    //        })
</script>

<script src="{{ url('/src/js/jQuery.min.2.2.4.js') }}" ></script>
    <script type="text/javascript">
        var val = document.getElementByIdx("temmplate_radio").value;
        alert('checked value: ' + val);

        $('#temmplate_radio').each(function(){
//            $('#temmplate_radio').ajaxForm(options).submit()
            var val;
            if($(this).attr("checked")){
                val=$(this).attr("value")
            }
            alert('checked value: ' + val);

        });
//    jQuery('#temmplate_radio').change(function(){
    $(document).ready(function() {
        var options = {
            beforeSubmit: setTemplate,
            success:      showResponse,
//            dataType: json,
        }
        $('#temmplate_radio').each(function(){
//            $('#temmplate_radio').ajaxForm(options).submit()
            var val;
            if($(this).attr("checked")){
                val=$(this).attr("value")
            }
            alert('checked value: ' + val);

        });

        function setTemplate() {
//            alert('value changed' + $('#temmplate_radio').val());
            if ($('#temmplate_radio').val()==3) {
                $('#image2').css('display', 'block');
                $('#image3').css('display', 'block');
            } else {
                $('#image2').css('display', 'none');
                $('#image3').css('display', 'none');
            }
        }

        function showResponse() {
//            alert('value changed' + $('#temmplate_radio').val());
            if ($('#temmplate_radio').val()==3) {
                $('#image2').css('display', 'block');
                $('#image3').css('display', 'block');
            } else {
                $('#image2').css('display', 'none');
                $('#image3').css('display', 'none');
            }
        }
    }

        {{--$(".temmplate_radio").empty();--}}

{{--// 实际的应用中，这里的option一般都是用循环生成多个了--}}

{{--//            var option = $("<option>").val(1).text("pxx");--}}
{{--//--}}
{{--//            $(".temmplate_radio").append(option);--}}
        {{--console.log($("#temmplate_radio").val());--}}
        {{--var temmplate_radiourl = "/admin/article/create?template="+$("#temmplate_radio").val()+"&authname="+$("#authname").val();--}}
        {{--jQuery(window.location).attr('href', temmplate_radiourl);--}}
//    });
</script>
<script src="{{ url('/src/js/jQuery.min.2.2.4.js') }}" ></script>
<script type="text/javascript">

    jQuery('#theatre_id').change(function(){
//        alert($("#theatre_id").val());
        var url = "/createtheatre/"+$("#theatre_id").val();
        jQuery(window.location).attr('href', url);
    });
//    $("[name=template_id]").each(function(i,v){
//        var dep2 = $(this).val();
//        alert(dep2);
////        if(data.dep == dep2) $(this).prop("checked",true);
//    });

//    jQuery('#template_id').each(function(){
//        alert('$("#template_id").val()');
////        $(".template_id").empty();
////        console.log($("#template_id").val());
////        var temmplate_radiourl = "/admin/article/create?template="+$("#template_id").val();
////        jQuery(window.location).attr('href', temmplate_radiourl);
//    });
</script>


@stop
