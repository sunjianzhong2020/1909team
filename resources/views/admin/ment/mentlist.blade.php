<!DOCTYPE html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>广告管理</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/js/uploadify/uploadify.css">
    <script src="/js/uploadify/jquery.js"></script>
    <script src="/js/uploadify/jquery.uploadify.js"></script>

</head>

<body class="hold-transition skin-red sidebar-mini">
<!-- .box-body -->

<div class="box-header with-border">
    <h3 class="box-title">广告管理</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 添加</button>
                    <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                </div>
            </div>
        </div>
        <div class="box-tools pull-right">
            <div class="has-feedback">

            </div>
        </div>
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">广告ID</th>
                <th class="sorting">广告类型</th>
                <th class="sorting">标题</th>
                <th class="sorting">URL</th>
                <th class="sorting">状态是否有效</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($res as $k => $v)
            <tr shop_id="{{$v->shop_ment_id}}">
                <td>{{$v->shop_ment_id}}</td>
                <td>{{$v->shop_ment_cate_name}}</td>
                <td shop_title="shop_ment_title">
                    <span class="span_title">{{$v->shop_ment_title}}</span>
                <input type="text" class="input_title" value="{{$v->shop_ment_title}}" style="display:none">
                </td>
                <td>{{$v->shop_ment_url}}</td>
                <td>{{$v->shop_ment_del==1?'否':'是'}}</td>
                <td class="text-center">
                    <a href="{{url('/ment/mentedit/'.$v->shop_ment_id)}}"><button type="button" class="btn btn-primary">修改</button></a>
                    <a href="{{url('ment/mentdel/'.$v->shop_ment_id)}}"><button type="button" class="btn btn-danger">删除</button></a>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        {{$res->links()}}
        <!--数据列表/-->
    </div>
    <!-- 数据表格 /-->
</div>
<!-- /.box-body -->


<!-- 编辑窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">广告编辑</h3>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-striped"  width="800px">
                    <tr>
                        <td>广告分类</td>
                        <td>
                            <select class="form-control" ng-model="entity.categoryId" ng-options="item.id as item.name for item in options['content_category'].data"
                                    name="shop_ment_cate_id" id="shop_ment_cate_id">
                                    @foreach($mentcate as $k => $v)
                                        <option value="{{$v->shop_ment_cate_id}}">{{$v->shop_ment_cate_name}}</option>
                                    @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>标题</td>
                        <td><input  class="form-control" placeholder="标题" ng-model="entity.title" name="shop_ment_title" id="shop_ment_title">  </td>
                    </tr>
                    <tr>
                        <td>URL</td>
                        <td><input  class="form-control" placeholder="URL" ng-model="entity.url" name="shop_ment_url" id="shop_ment_url">  </td>
                    </tr>
                    <tr>
                        <td>广告图片</td>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <input type="file" name="shop_ment_img" id="shop_ment_img"/>
                                        {{--<button class="btn btn-primary" type="button" ng-click="uploadFile()">--}}
                                            {{--上传--}}
                                        {{--</button>--}}
                                    </td>
                                    <td>
                                        <img  src="" width="200px" height="100px">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>有效</td>
                        <td>
                            <input type="radio" class="checkbox_square-blue" checked name="shop_ment_del" name="shop_ment_del" id="shop_ment_del" value="2">是&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" class="checkbox_square-blue" name="shop_ment_del" name="shop_ment_del" id="shop_ment_del" value="1">否
                        </td>
                    </tr>
                </table>

            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true" id="btn">添加</button>
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
        </div>
    </div>
</div>

</body>

</html>

<script>
    $(document).ready(function(){
        $('#shop_ment_img').uploadify({
            'swf':  "/js/uploadify/uploadify.swf",
            'uploader' : "/ment/mentupload",
            'buttonText':"选择图片",
            onUploadSuccess : function(msg,newFilePath,info){
                console.log(newFilePath);
            }

        })
    })
    $(document).on('click','#btn',function(){
        var shop_ment_cate_id = $('#shop_ment_cate_id').val();
        var shop_ment_title = $('#shop_ment_title').val();
        var shop_ment_url = $('#shop_ment_url').val();
        var shop_ment_del = $('#shop_ment_del:checked').val();
        //alert(shop_ment_del);false;
        if(!shop_ment_title){
            alert('标题不能为空');
            return false;
        }
        if(!shop_ment_url){
            alert('网址不能为空');
            return false;
        }
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        $.ajax({
            url:"/ment/mentadd",
            data:{'shop_ment_cate_id':shop_ment_cate_id,'shop_ment_title':shop_ment_title,'shop_ment_url':shop_ment_url,'shop_ment_del':shop_ment_del},
            type:"post",
            dataType:'json',
            success:function(res){
                console.log(res);
//                return false;
                if(res['errno']=='00000'){
                    alert(res['msg']);
                    location.href="mentlist";
                }else{
                    alert(res['msg']);
                    location.href="mentlist";
                }

            }
        })

    })
    //根据点击事件获取span标签
    $(document).on('click',".span_title",function(){
        //获取span标签
       var _this = $(this);
        //获取span标签的值
        var _zjx = _this.text();
        //对span标签进行隐藏
        _this.hide();
        //让input框携带span值对input框进行展示
        _this.next('input').val(_zjx).show();
    })
    //然后使用鼠标失去焦点事件对标题进行修改
    $(document).on('blur',".input_title",function(){
        //获取到这个input框
        var _this = $(this);
        //获取到这个input框的新值
        var new_value = _this.val();
        //根据input框找到它的父节点 获取到父节点的值 因为要改他的标题
        var shop_title = _this.parent('td').attr('shop_title');
        //根据input框找到它的父节点 获取到祖先节点的值 因为要根据id进行修改
        var shop_id = _this.parents('tr').attr('shop_id');
        //console.log(shop_id);
        $.ajax({
            url:"/ment/changevalue",
            data:{'new_value':new_value,'shop_title':shop_title,'shop_id':shop_id},
            type:"post",
            dataType:'json',
            success:function(res){
                if(res['errno']=='00000'){
                    alert(res['msg']);
                    _this.hide();
                   _this.prev('span').text(new_value).show();
                }else{
                    alert(res['msg']);
                    _this.hide();
                    _this.prev('span').show();
                    location.href="mentlist";
                }

            }
        })
    })

</script>