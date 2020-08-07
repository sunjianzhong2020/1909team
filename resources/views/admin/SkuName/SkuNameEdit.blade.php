<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>属性修改</title>
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
                    <a href="#home" data-toggle="tab">sku修改</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">商品属性名</div>
                        <div class="col-md-10 data">
                            <input type="hidden" name="sku_name_id" value="{{$res->sku_name_id}}">
                            <input type="text" class="form-control" name="sku_name_name"  ng-model="entity.name"  placeholder="属性名称" value="{{$res->sku_name_name}}">
                        </div>

                    </div>
                </div>




            </div>
            <!--tab内容/-->
            <!--表单内容/-->

        </div>

    </div>
    <div class="btn-toolbar list-toolbar">
        <button ng-click="submit()" data-toggle="modal" name="btn" class="btn btn-danger">修改</button>
    </div>

</section>
<!-- 正文区域 /-->
</body>
</html>
<script>
    $(document).ready(function(){
        $("button[name='btn']").click(function(){


            var sku_name_name=$("input[name='sku_name_name']").val();
            var sku_name_id=$("input[name='sku_name_id']").val();
            if(sku_name_name==''){
                alert('商品属性名称不能为空');
                return false;
            }
            var data={};
            data.sku_name_name=sku_name_name;
            data.sku_name_id=sku_name_id;

            var url = "/admin/SkuNameUpd";
            $.ajax({
                type:'post',
                url:url,
                data:data,
                dataType:'json',
                success:function(res){
                    if(res.code=='200'){
                        alert(res.message);
                        window.location.href='/admin/SkuNameShow';
                    }
                }
            })
        })
    })
</script>

