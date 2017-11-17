@extends('layouts.topbar')
<link rel="stylesheet" href="{{ asset("/src/css/jquery-ui.min.css") }}" />
@include('layouts.sidebar2')
{{--@include('articles.sidebarCategory',['categories'=>$categories, 'types'=>$types, 'tag'=>$tags, 'currentAction'=>$currentAction])--}}
@section('content')
    @include('vendor.ueditor.assets')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12" style="margin-top: 25px">
                <h1 class="page-header">新建文章</h1>

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
                    {!! Form::open(array('url' => 'admin/article/', 'class' => 'form', 'method'=>'put', 'enctype'=>'multipart/form-data')) !!}
                    <div class="form-group  col-lg-12 col-md-12 col-sm-12" >


                        {{--<div>--}}
                            {{--<label class="col-lg-1 col-md-1 col-sm-1" style="margin-bottom: 55px">选择栏目</label>--}}
                            {{--<div class="col-md-2" style="margin-bottom: 55px">--}}
                                {{--<select class="col-lg-12 col-md-12 col-sm-12 form-control" name="category_id">--}}
                                    {{--@if(Auth::user()->hasAnyRole([ 'auth_editor']))--}}
                                        {{--@foreach($categories as $category)--}}
                                            {{--@if($category->id == 5 || $category->id == 6 || $category->id == 7)--}}
                                                {{--<option value="{{$category->id}}">--}}
                                                    {{--{{$category->name}}--}}
                                                {{--</option>--}}
                                            {{--@endif--}}
                                        {{--@endforeach--}}
                                    {{--@else--}}
                                        {{--@foreach($categories as $category)--}}
                                            {{--<option value="{{$category->id}}">--}}
                                                {{--{{$category->name}}--}}
                                            {{--</option>--}}
                                        {{--@endforeach--}}
                                    {{--@endif--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}

                        {{--@if( !Auth::user()->hasAnyRole([ 'auth_editor']))--}}
                            {{--<div class="{{ isset($errors) && $errors->has('authname') ? 'has-error clearfix' : 'clearfix' }}" style="margin-bottom: 55px" >--}}
                                {{--<label class="col-lg1-1 col-md-1 col-sm-1">作者</label>--}}
                                {{--<div class="col-md-2">--}}
                                    {{--<input class="col-lg-3 col-md-3 col-sm-3 form-control" type="text" id="authname" name="authname"  />--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endif--}}

                        {{--<div>--}}
                            {{--<label class="col-lg-1 col-md-1 col-sm-1">简介</label>--}}
                            {{--<div class="col-md-11">--}}
                                {{--<textarea class="col-lg-12 col-md-12 col-sm-12 form-control" type="text" id="description" name="description" placeholder="限140字" maxlength="140"></textarea>--}}
                            {{--</div>--}}

                            {{--@if ($errors->has('description'))--}}
                                {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('description') }}</strong>--}}
                                    {{--</span>--}}
                            {{--@endif--}}
                        {{--</div><br>--}}

                        {{--@if( !Auth::user()->hasAnyRole([ 'auth_editor']))--}}
                        {{--{!! Form::label('template_label', '首页模版', array('class'=>'col-md-1', 'style'=>'margin-top: 55px')) !!}--}}

                        {{--<form id="template_form" >--}}
                            {{--<div class="col-md-8" style="margin-top: 55px">--}}
                                {{--<select class="col-lg-12 col-md-12 col-sm-12 form-control" name="temmplate_radio" id="temmplate_radio">--}}
                                {{--@foreach ($templates as $temp)--}}
                                    {{--<input type="radio" style="margin-left: 30px" name="temmplate_radio" id="temmplate_radio"  value="{{$temp->id}}" @if(1 == $temp->id) checked="checked" @endif />{{$temp->name}}--}}
                                    {{--<option value="{{$temp->id}}" @if($template == $temp->id) selected = 'selected' @endif>{{$temp->name}}</option>--}}
                                {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                        {{--<div class="clearfix"></div>--}}
                        {{--@endif--}}

                        {{--<div>--}}
                            {{--<label class="col-lg-1 col-md-1 col-sm-1" style="margin-top: 75px">首页图片</label>--}}

                            {{--<form style="position:relative">--}}
                                {{--<div id="image_container1" class="col-md-3"  style=" margin-top: 55px;">--}}
                                    {{--<input type="file" class="col-md-12 form-control-file" id="images1" name="images1"  style="display:none"/>--}}
                                    {{--                                {!! Form::file('images', '', array('class'=>'col-md-12 form-control-file form-control', 'id'=>'images', 'required'=>'required')) !!}--}}
                                    {{--<label for="images1">　　--}}
                                        {{--　　　　　　--}}
                                        {{--<img src="/photos/add_image.jpg" id="image1" width="200" />--}}
                                        {{--　　--}}
                                        {{--　　</label>--}}
                                {{--</div>--}}

{{--                            @if($template==3)--}}
                                {{--<div id="image_container2" class="col-md-3"  style=" margin-top: 55px; display:none">--}}
                                    {{--<input type="file" class="col-md-12 form-control-file" id="images2" name="images2" style="display:none"/>--}}
                                    {{--                                {!! Form::file('images', '', array('class'=>'col-md-12 form-control-file form-control', 'id'=>'images', 'required'=>'required')) !!}--}}
                                    {{--<label for="images2">　　--}}
                                        {{--　　　　　　--}}
                                        {{--<img src="/photos/add_image.jpg" id="image2" width="200"/>--}}
                                        {{--　　--}}
                                        {{--　　</label>--}}
                                {{--</div>--}}

                                {{--<div id="image_container3" class="col-md-3"  style=" margin-top: 55px; display:none">--}}
                                    {{--<input type="file" class="col-md-12 form-control-file" id="images3" name="images3" style="display:none"/>--}}
                                    {{--                                {!! Form::file('images', '', array('class'=>'col-md-12 form-control-file form-control', 'id'=>'images', 'required'=>'required')) !!}--}}
                                    {{--<label for="images3">　　--}}
                                        {{--　　　　　　--}}
                                        {{--<img src="/photos/add_image.jpg" id="image3" width="200" />--}}
                                        {{--　　--}}
                                        {{--　　</label>--}}
                                {{--</div>--}}
                            {{--@endif--}}


                            {{--</form>--}}

                        {{--</div>--}}
                        {{--<div class="clearfix"/>--}}

                        {{--@if( !Auth::user()->hasAnyRole([ 'auth_editor']))--}}
                            {{--<div>--}}
                                {{--<label class="col-md-3 published_label" style="margin-top: 60px">--}}
                                    {{--<input class="published" type="checkbox" name="watermark" id="watermark" /> 添加水印--}}
                                {{--</label>--}}
                            {{--</div>--}}
                        {{--@endif--}}

                        <div class="{{ isset($errors) && $errors->has('title') ? 'has-error clearfix' : 'clearfix' }}" style="margin-bottom: 0px" >
                            {{--<label class="col-lg-1 col-md-1 col-sm-1">标题</label>--}}
                            <div class="col-md-12">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                                <input class="col-lg-12 col-md-12 col-sm-12 form-control" type="text" id="title" name="title"
                                       {{--required maxlength="35"  --}}
                                       placeholder="标题"/>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="{{ isset($errors) && $errors->has('content') ? 'has-error clearfix' : 'clearfix' }}">
                            {{--<label class="col-lg-12 col-md-12 col-sm-12 clearfix">内容</label>--}}
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                {{--<textarea class="col-lg-12 col-md-12 col-sm-12 form-control clearfix" id="content" name="content" height="50"></textarea>--}}
                                <!-- 编辑器容器 -->
                                    <script id="container" name="content" type="text/plain"></script>
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
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
                        <input type="submit" id="submit" value="保存" class="btn btn-primary" />
                    </div>
                    <div>
                        <label class="col-md-3 published_label" style="margin-top: 30px">
                            <input class="published" type="checkbox" name="published"  /> 发布
                        </label>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ url('/src/js/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container',{
            //这里可以选择自己需要的工具按钮名称,此处仅选择如下五个
            toolbars:[['FullScreen', 'Undo', 'Redo',
                'customstyle', //自定义标题
                'fontfamily', //字体
                'fontsize', //字号
                'paragraph', //段落格式
                'bold',
                'italic', //斜体
                'forecolor', //字体颜色
                'underline', //下划线
                'strikethrough', //删除线
                'indent', //首行缩进
                'formatmatch', //格式刷
                'pasteplain', //纯文本粘贴模式
                'selectall', //全选
                'preview', //预览
                'horizontal', //分隔线
                'date', //日期
                'time', //时间
                'link', //超链接
                'unlink', //取消链接

                'inserttable', //插入表格
                'mergeright', //右合并单元格
                'mergedown', //下合并单元格
                'mergecells', //合并多个单元格
                'insertparagraphbeforetable', //"表格前插入行"
                'insertrow', //前插入行
                'insertcol', //前插入列
                'deleterow', //删除行
                'deletecol', //删除列
                'deletetable', //删除表格
                'splittorows', //拆分成行
                'splittocols', //拆分成列
                'splittocells', //完全拆分单元格
                'deletecaption', //删除表格标题
                'inserttitle', //插入标题
                'edittable', //表格属性
                'edittd', //单元格属性
                'charts', // 图表

                'simpleupload', //单图上传
                'insertimage', //多图上传
                'wordimage', //图片转存

                'emotion', //表情
                'spechars', //特殊字符
                'searchreplace', //查询替换
                'lineheight', //行间距
                'justifyleft', //居左对齐
                'justifyright', //居右对齐
                'justifycenter', //居中对齐
                'justifyjustify', //两端对齐
                'imageleft', //左浮动
                'imageright', //右浮动
//                'attachment', //附件
                'imagecenter', //居中
                'rowspacingtop', //段前距
                'rowspacingbottom', //段后距
                'pagebreak', //分页

                'edittip ', //编辑提示
                'autotypeset', //自动排版
                'background', //背景
                'backcolor', //背景色

                'cleardoc', //清空文档
                'removeformat', //清除格式

            ]],
            //focus时自动清空初始化时的内容
            autoClearinitialContent:true,
            //关闭字数统计
            wordCount:false,
            //关闭elementPath
            elementPathEnabled:false,
            //默认的编辑区域高度
            initialFrameHeight:500
            //更多其他参数，请参考ueditor.config.js中的配置项
        });
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });
    </script>

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

    <script>
//    var sampleApp = angular.module('myapp', [], function($interpolateProvider) {
//        $interpolateProvider.startSymbol('<%');
//        $interpolateProvider.endSymbol('%>');
//    });
</script>

    <script src="{{ url('/src/js/jQuery.min.2.2.4.js') }}" ></script>

<script>
    var editor_config = {
        language:'zh_CN',
        height: "350",

        path_absolute : "{{ URL::to('/') }}/",
        selector: "textarea#content",
        plugins : ['link image imagetools preview', 'paste'],
        menubar: false,
        toolbar: 'undo redo | image | removeformat | bold italic underline strikethrough | alignleft aligncenter alignright | link',
        relative_urls: false,
        object_resizing: true,
        automatic_uploads: true,
        removeformat: [
            {selector: 'b,strong,em,i,font,u,strike', remove : 'all', split : true, expand : false, block_expand: true, deep : true},
            {selector: 'span', attributes : ['style', 'class'], remove : 'empty', split : true, expand : false, deep : true},
            {selector: '*', attributes : ['style', 'class'], split : false, expand : false, deep : true}
        ],

        paste_auto_cleanup_on_paste : true,
        paste_remove_styles: true,
        paste_remove_styles_if_webkit: true,
        paste_strip_class_attributes: true,
        invalid_styles: 'width',

        file_browser_callback_types: 'image media',
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            {{--var cmsURL = editor_config.path_absolute + '{{ Auth::user()->phone }}?field_name=' + field_name;--}}
//            win.document.getElementById(field_name).value = cmsURL;
            console.log(cmsURL);
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);

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

{{--<script>--}}
    {{--//autocomplete--}}
    {{--jQuery( function() {--}}
        {{--var availableTags = {!! json_encode($tagArray) !!}--}}
        {{--function split( val ) {--}}
            {{--return val.split( /,\s*/ );--}}
        {{--}--}}
        {{--function extractLast( term ) {--}}
            {{--return split( term ).pop();--}}
        {{--}--}}

        {{--jQuery('#tags').on( "keydown", function( event ) { console.log('click');--}}
            {{--if ( event.keyCode === jQuery.ui.keyCode.TAB &&--}}
                    {{--jQuery( this ).autocomplete( "instance" ).menu.active ) {--}}
                {{--event.preventDefault();--}}
            {{--}--}}
        {{--}).autocomplete({--}}
            {{--minLength: 0,--}}
            {{--source: function( request, response ) {--}}
                {{--// delegate back to autocomplete, but extract the last term--}}
                {{--response( jQuery.ui.autocomplete.filter(--}}
                        {{--availableTags, extractLast( request.term ) ) );--}}
            {{--},--}}
            {{--focus: function() {--}}
                {{--// prevent value inserted on focus--}}
                {{--return false;--}}
            {{--},--}}
            {{--select: function( event, ui ) {--}}
                {{--var terms = split( this.value );--}}
                {{--// remove the current input--}}
                {{--terms.pop();--}}
                {{--// add the selected item--}}
                {{--terms.push( ui.item.value );--}}
                {{--// add placeholder to get the comma-and-space at the end--}}
                {{--terms.push( "" );--}}
                {{--this.value = terms.join( ", " );--}}
                {{--return false;--}}
            {{--}--}}
        {{--});--}}
    {{--} );--}}
{{--</script>--}}

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

    $(document).ready(function() {
        $('input[name=temmplate_radio]').change(function(){
//            alert('raido value: ' + $(this).val());
            if ($(this).val()==3) {
                $('#image_container2').css('display', 'block');
                $('#image_container3').css('display', 'block');
            } else {
                $('#image_container2').css('display', 'none');
                $('#image_container3').css('display', 'none');
            }
            $('#template_form').submit();
        });
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

{{--配置项里用竖线 ‘|’ 代表分割线--}}
{{--完整的按钮列表--}}

{{--toolbars: [--}}
{{--[--}}
{{--'anchor', //锚点--}}
{{--'undo', //撤销--}}
{{--'redo', //重做--}}
{{--'bold', //加粗--}}
{{--'indent', //首行缩进--}}
{{--'snapscreen', //截图--}}
{{--'italic', //斜体--}}
{{--'underline', //下划线--}}
{{--'strikethrough', //删除线--}}
{{--'subscript', //下标--}}
{{--'fontborder', //字符边框--}}
{{--'superscript', //上标--}}
{{--'formatmatch', //格式刷--}}
{{--'source', //源代码--}}
{{--'blockquote', //引用--}}
{{--'pasteplain', //纯文本粘贴模式--}}
{{--'selectall', //全选--}}
{{--'print', //打印--}}
{{--'preview', //预览--}}
{{--'horizontal', //分隔线--}}
{{--'removeformat', //清除格式--}}
{{--'time', //时间--}}
{{--'date', //日期--}}
{{--'unlink', //取消链接--}}
{{--'insertrow', //前插入行--}}
{{--'insertcol', //前插入列--}}
{{--'mergeright', //右合并单元格--}}
{{--'mergedown', //下合并单元格--}}
{{--'deleterow', //删除行--}}
{{--'deletecol', //删除列--}}
{{--'splittorows', //拆分成行--}}
{{--'splittocols', //拆分成列--}}
{{--'splittocells', //完全拆分单元格--}}
{{--'deletecaption', //删除表格标题--}}
{{--'inserttitle', //插入标题--}}
{{--'mergecells', //合并多个单元格--}}
{{--'deletetable', //删除表格--}}
{{--'cleardoc', //清空文档--}}
{{--'insertparagraphbeforetable', //"表格前插入行"--}}
{{--'insertcode', //代码语言--}}
{{--'fontfamily', //字体--}}
{{--'fontsize', //字号--}}
{{--'paragraph', //段落格式--}}
{{--'simpleupload', //单图上传--}}
{{--'insertimage', //多图上传--}}
{{--'edittable', //表格属性--}}
{{--'edittd', //单元格属性--}}
{{--'link', //超链接--}}
{{--'emotion', //表情--}}
{{--'spechars', //特殊字符--}}
{{--'searchreplace', //查询替换--}}
{{--'map', //Baidu地图--}}
{{--'gmap', //Google地图--}}
{{--'insertvideo', //视频--}}
{{--'help', //帮助--}}
{{--'justifyleft', //居左对齐--}}
{{--'justifyright', //居右对齐--}}
{{--'justifycenter', //居中对齐--}}
{{--'justifyjustify', //两端对齐--}}
{{--'forecolor', //字体颜色--}}
{{--'backcolor', //背景色--}}
{{--'insertorderedlist', //有序列表--}}
{{--'insertunorderedlist', //无序列表--}}
{{--'fullscreen', //全屏--}}
{{--'directionalityltr', //从左向右输入--}}
{{--'directionalityrtl', //从右向左输入--}}
{{--'rowspacingtop', //段前距--}}
{{--'rowspacingbottom', //段后距--}}
{{--'pagebreak', //分页--}}
{{--'insertframe', //插入Iframe--}}
{{--'imagenone', //默认--}}
{{--'imageleft', //左浮动--}}
{{--'imageright', //右浮动--}}
{{--'attachment', //附件--}}
{{--'imagecenter', //居中--}}
{{--'wordimage', //图片转存--}}
{{--'lineheight', //行间距--}}
{{--'edittip ', //编辑提示--}}
{{--'customstyle', //自定义标题--}}
{{--'autotypeset', //自动排版--}}
{{--'webapp', //百度应用--}}
{{--'touppercase', //字母大写--}}
{{--'tolowercase', //字母小写--}}
{{--'background', //背景--}}
{{--'template', //模板--}}
{{--'scrawl', //涂鸦--}}
{{--'music', //音乐--}}
{{--'inserttable', //插入表格--}}
{{--'drafts', // 从草稿箱加载--}}
{{--'charts', // 图表--}}
{{--]--}}
{{--]--}}