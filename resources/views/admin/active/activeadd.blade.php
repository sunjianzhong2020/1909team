<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商家完善资料</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="../plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>


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
                    <a href="#home" data-toggle="tab">猜你喜欢</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">猜你喜欢名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  ng-model="entity.name"  placeholder="猜你喜欢名称" value="" name="a_name">
                        </div>

                        <div class="col-md-2 title">猜你喜欢链接url</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.mobile"  placeholder="猜你喜欢链接url" value="" name="a_url">
                        </div>

                        <div class="col-md-2 title">是否显示</div>
                        <div class="col-md-10 data">
                            <input type="radio"  ng-model="entity.mobile"   value="1" name="is_show" checked>是
                            <input type="radio"  ng-model="entity.mobile"   value="2" name="is_show">否
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
        <a ng-click="submit()" data-toggle="modal" class="btn btn-danger" id="btn">提交</a>
    </div>

</section>
<!-- 正文区域 /-->


</body>

</html>
<script>
    $(document).ready(function(){
        $(document).on('click','#btn',function(){
            //alert(123);
           	data={};
           	data.a_name=$("input[name='a_name']").val();
           	data.a_url=$("input[name='a_url']").val();
           	data.is_show=$("input[name='is_show']").val();

           	//alert(data.a_url);
           	var url='/admin/activedo';
           	$.ajax({
           		url:url,
           		type:'post',
           		data:data,
           		dataType:'json',
           		success:function(res){
           			if(res['code']=="200"){
           				alert(res.message);
           				window.location.href="/admin/activeshow";
           			}
           		}
           	});
         });
    });

</script>
