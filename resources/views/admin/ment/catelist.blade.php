<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>广告分类管理</title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="../plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>

</head>

<body class="hold-transition skin-red sidebar-mini"  >
<!-- .box-body -->

<div class="box-header with-border">
    <h3 class="box-title">广告分类类型展示修改与删除</h3>
</div>


<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        {{--<div class="pull-left">--}}
            {{--<div class="form-group form-inline">--}}
                {{--<div class="btn-group">--}}
                    {{--<button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ng-click="toAdd()"><i class="fa fa-file-o"></i> 新建</button>--}}
                    {{--<button type="button" class="btn btn-default" title="删除" ng-click="dele()"><i class="fa fa-trash-o"></i> 删除</button>--}}
                    {{--<button type="button" class="btn btn-default" title="开启" onclick='confirm("你确认要开启吗？")'><i class="fa fa-check"></i> 开启</button>--}}
                    {{--<button type="button" class="btn btn-default" title="屏蔽" onclick='confirm("你确认要屏蔽吗？")'><i class="fa fa-ban"></i> 屏蔽</button>--}}
                    {{--<button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="box-tools pull-right">--}}
            {{--<div class="has-feedback">--}}
                {{--名称：<input >	<button class="btn btn-default" >查询</button>--}}
            {{--</div>--}}
        {{--</div>--}}
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="" style="padding-right:0px">
                    <input id="selall" type="checkbox" class="icheckbox_square-blue">
                </th>
                <th class="sorting_asc">分类类型ID</th>
                <th class="sorting">分类类型名称</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($arr as $k => $v)
            <tr>
                <td><input  type="checkbox" ng-click="updateSelection($event,entity.id)"></td>
                <td>{{$v->shop_ment_cate_id}}</td>
                <td>{{$v->shop_ment_cate_name}}</td>
                <td class="text-center">
                    <a href="{{url('ment/cateedit/'.$v->shop_ment_cate_id)}}"><button type="button" class="btn btn-primary">编辑</button></a>
                    <button type="button" class="btn btn-danger"><a href="{{url('ment/catedel/'.$v->shop_ment_cate_id)}}">删除</a></button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{$arr->links()}}
        <!--数据列表/-->
    </div>
    <!-- 数据表格 /-->
</div>
<!-- /.box-body -->
<!-- 分页 -->


<!-- 编辑窗口 -->
{{--<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
    {{--<div class="modal-dialog" >--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                {{--<h3 id="myModalLabel">广告分类编辑</h3>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}

                {{--<table class="table table-bordered table-striped"  width="800px">--}}
                    {{--<tr>--}}
                        {{--<td>分类名称</td>--}}
                        {{--<td><input  class="form-control" placeholder="分类名称">  </td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>分组</td>--}}
                        {{--<td><input  class="form-control" placeholder="分组">  </td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>KEY</td>--}}
                        {{--<td><input  class="form-control" placeholder="KEY">  </td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>是否有效</td>--}}
                        {{--<td>--}}
                            {{--<input type="checkbox" class="icheckbox_square-blue" >--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--</table>--}}

            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">保存</button>--}}
                {{--<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}


</body>

</html>