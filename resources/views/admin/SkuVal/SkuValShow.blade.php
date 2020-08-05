<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品分类展示</title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>

</head>

<body class="hold-transition skin-red sidebar-mini"  >
<!-- .box-body -->

<div class="box-header with-border">
    <h3 class="box-title">商品属性值展示</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <div class="box-tools pull-right">
            <div class="has-feedback">
                名称：<input><button class="btn btn-default" >查询</button>
            </div>
        </div>
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="" style="padding-right:0px">
                    <input id="selall" type="checkbox" class="icheckbox_square-blue">
                </th>
                <th class="sorting_asc">商品属性值id</th>
                <th class="sorting_asc">所属商品属性</th>
                <th class="sorting">商品属性值名称</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $v)
            <tr id="{{$v->sku_val_id}}">
                <td><input  type="checkbox"></td>
                <td>{{$v->sku_val_id}}</td>
                <td>{{$v->sku_name_name}}</td>
                <td>{{$v->sku_val_name}}</td>
                <td class="text-center">
                    <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal">修改</button>
                    <button type="button" name="del" class="btn bg-olive btn-xs" data-toggle="modal">删除</button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <!--数据列表/-->
    </div>
    <!-- 数据表格 /-->
</div>
<!-- /.box-body -->
<!-- 分页 -->
{{$data->links()}}

<!-- 编辑窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">广告分类编辑</h3>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-striped"  width="800px">
                    <tr>
                        <td>分类名称</td>
                        <td><input  class="form-control" placeholder="分类名称">  </td>
                    </tr>
                    <tr>
                        <td>分组</td>
                        <td><input  class="form-control" placeholder="分组">  </td>
                    </tr>
                    <tr>
                        <td>KEY</td>
                        <td><input  class="form-control" placeholder="KEY">  </td>
                    </tr>
                    <tr>
                        <td>是否有效</td>
                        <td>
                            <input type="checkbox" class="icheckbox_square-blue" >
                        </td>
                    </tr>
                </table>

            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">保存</button>
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        $("button[name='del']").click(function(){
            // alert(11);
            // return false;
            data = {};
            data.id = $(this).parents('tr').attr('id');
            // alert(data.id);
            // return false;
            var url = "/admin/SkuValDel";
            $.ajax({
                type:'post',
                url:url,
                data:data,
                dataType:'json',
                success:function(res){
                    if(res.code=='200'){
                        alert(res.message);
                        window.location.href='/admin/SkuValShow';
                    }
                }
            })
        })
    })
</script>