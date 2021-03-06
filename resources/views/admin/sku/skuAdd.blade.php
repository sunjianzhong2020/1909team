<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>分类添加</title>
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

<!-- 正文区域 -->
<section class="content">

    <div class="box-body">

        <!--tab页-->
        <div class="nav-tabs-custom">

            <!--tab头-->
            <ul class="nav nav-tabs">

                <li class="active">
                    <a href="#home" data-toggle="tab">商品sku</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title" style="position: relative" left:-11px>商品名称</div>
                        <div class="col-md-10 data">
                                <select type="text" class="form-control" name="goods_id"  ng-model="entity.name" value="">
                                    <option value="">请选择</option>
                                    @foreach($goods as $v)
                                        <option value="{{$v->goods_id}}">{{$v->goods_name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        @foreach($sku_name as $v)
                            <div class="row data-type" id="name">
                                <div class="col-md-2 title">{{$v->sku_name_name}}</div>
                                    <div class="col-md-10 data">
                                        <select type="text" class="form-control" name="sku_name_id"  ng-model="entity.name" value="">
                                            <option value="">请选择</option>
                                               @foreach($v['a'] as $vv)
                                                <option value="{{$vv->sku_val_id}}">{{$vv->sku_val_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                        @endforeach

                        <div class="col-md-2 title">商品价格</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" name="goods_price"  ng-model="entity.name"  placeholder="商品名称" value="">
                        </div>

                        <div class="col-md-2 title">商品库存</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" name="goods_num"  ng-model="entity.name"  placeholder="商品库存" value="">
                        </div>


                    </div>
                </div>




            </div>
            <!--tab内容/-->
            <!--表单内容/-->

        </div>

    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" ng-click="save()"><i class="fa fa-save"></i>保存</button>
        <button ng-click="submit()" data-toggle="modal" name="btn" class="btn btn-danger">提交</button>
    </div>

</section>
<!-- 正文区域 /-->
</body>
</html>
<script>
    $(document).ready(function(){
        $("button[name='btn']").click(function(){
            // alert(111);
            data = {};
            data.goods_id = $("select[name='goods_id']").val();
            data.goods_price = $("input[name='goods_price']").val();
            data.goods_num = $("input[name='goods_num']").val();
            var arr=[];
           $("select[name=sku_name_id]").each(function () {
                 var bb=$(this).val();
                     arr.push(bb);
            });
            data.arr = arr;
            var url = "/admin/skuAdd_do";
            $.ajax({
                type:'post',
                url:url,
                data:data,
                dataType:'json',
                success:function(res){
                    if(res.code=='200'){
                        alert(res.message);
                        // window.location.href='/admin/SkuValShow';
                    }
                }
            })
            // alert(data.aa);
            // data.sku_name_id = $("c[name='sku_name_id']").find("option:selected").text();
            // alert(data.sku_name_id);
            // var name =
            // alert(name.length);
        })
    })
</script>

