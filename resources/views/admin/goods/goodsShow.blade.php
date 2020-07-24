<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品管理</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>

</head>

<body class="hold-transition skin-red sidebar-mini" >
<!-- .box-body -->

<div class="box-header with-border">
    <h3 class="box-title">商品展示</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">
        <div class="box-tools pull-right">
            <div class="has-feedback">
                状态：<select>
                    <option value="">全部</option>
                    <option value="0">未申请</option>
                    <option value="1">申请中</option>
                    <option value="2">审核通过</option>
                    <option value="3">已驳回</option>
                </select>
                商品名称：<input >
                <button class="btn btn-default" >查询</button>
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
                <th class="sorting_asc">商品ID</th>
                <th class="sorting">商品名称</th>
                <th class="sorting">商品图片</th>
                <th class="sorting">商品价格</th>
                <th class="sorting">商品描述</th>
                <th class="sorting">是否最新</th>
                <th class="sorting">是否显示</th>
                <th class="sorting">是否热卖</th>
                <th class="sorting">商品库存</th>
                <th class="sorting">商品货号</th>
                <th class="sorting">所属分类</th>
                <th class="sorting">所属品牌</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $v)
            <tr id="{{$v->goods_id}}">
                <td><input  type="checkbox"></td>
                <td>{{$v->goods_id}}</td>
                <td><img src="{{$v->goods_img}}"  width="40px" alt=""></td>
                <td>{{$v->goods_name}}</td>
                <td>{{$v->goods_price}}</td>
                <td>{{$v->goods_desc}}</td>
                <td>{{$v->is_new == 1 ? "√" : "×"}}</td>
                <td>{{$v->is_show == 1 ? "√" : "×"}}</td>
                <td>{{$v->is_best == 1 ? "√" : "×"}}</td>
                <td>{{$v->goods_num}}</td>
                <td>{{$v->goods_sn}}</td>
                <td>{{$v->c_name}}</td>
                <td>{{$v->b_name}}</td>
                <td class="text-center">
                    <button type="button" class="btn bg-olive btn-xs">修改</button>
                    <button type="button" name="del" class="btn bg-olive btn-xs">删除</button>
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
</body>
</html>
<script>
    $(document).ready(function(){
        $("button[name='del']").click(function(){
            // alert(111);
            data = {};
            data.id = $(this).parents('tr').attr('id');
            // alert(data.id);
            var url = '/admin/goodsDel';
            $.ajax({
                type:'post',
                url:url,
                data:data,
                dataType:'json',
                success:function(res){
                    if(res.code=='200'){
                        alert(res.message);
                        window.location.href='/admin/goodsShow';
                    }
                }
            })
        })
    })
</script>
