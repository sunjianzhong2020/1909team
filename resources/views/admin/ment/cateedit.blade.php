<meta name="csrf-token" content="{{ csrf_token() }}">
<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>广告分类修改管理</title>
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
    <h3 class="box-title">广告分类修改管理</h3>
</div>


<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                </div>
            </div>
        </div>
        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            @csrf
            <thead>
            <tr>
                {{--<th class="" style="padding-right:0px">--}}
                {{--<input id="selall" type="checkbox" class="icheckbox_square-blue">--}}
                {{--</th>--}}
                <th class="sorting_asc">请添加您的广告类型:</th>
                <td><input type="hidden" id="shop_ment_cate_id"  value="{{$res->shop_ment_cate_id}}"></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                {{--<td><input  type="checkbox" ng-click="updateSelection($event,entity.id)"></td>--}}

                <td><input type="text" name="shop_ment_cate_name" id="shop_ment_cate_name" value="{{$res->shop_ment_cate_name}}">
                    <button class="btn btn-primary" id="btn" type="button">修改</button>
                </td>
            </tr>
            </tbody>
        </table>
        <!--数据列表/-->
    </div>
    <!-- 数据表格 /-->
</div>
<!-- /.box-body -->
<!-- 分页 -->


{{--<!-- 编辑窗口 -->--}}
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
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(document).on('click','#btn',function(){
        var shop_ment_cate_id = $('#shop_ment_cate_id').val();
        var shop_ment_cate_name = $('#shop_ment_cate_name').val();
//        alert(shop_ment_cate_id);false;
        if(!shop_ment_cate_name){
            alert('广告类型不能为空');
            return false;
        }
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        $.ajax({
            url:"/ment/cateupdate",
            data:{'shop_ment_cate_id':shop_ment_cate_id,'shop_ment_cate_name':shop_ment_cate_name},
            type:"post",
            dataType:'json',
            success:function(res){
                console.log(res);
//                return false;
                if(res['errno']==00000){
                    alert(res['msg']);
                    location.href="/ment/catelist";
                }else{
                    alert(res['msg']);
                    location.href="/ment/catelist";
                }

            }
        })

    })
</script>