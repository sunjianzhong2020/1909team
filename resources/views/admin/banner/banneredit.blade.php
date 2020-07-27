<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商家完善资料</title>
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


<form>
<!-- 正文区域 -->
<section class="content">

    <div class="box-body">

        <!--tab页-->
        <div class="nav-tabs-custom">

            <!--tab头-->
            <ul class="nav nav-tabs">

                <li class="active">
                    <a href="#home" data-toggle="tab">导航栏修改</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
						<input type="hidden" id="b_id" value="{{$data->b_id}}">
                        <div class="col-md-2 title">导航栏链接名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  ng-model="entity.name"  id="b_name" placeholder="导航栏链接名称"  name="b_name" value="{{$data->b_name}}">
                        </div>

                        <div class="col-md-2 title">导航栏链接url</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.mobile" id="b_url" placeholder="导航栏链接url"  name="b_url"  value="{{$data->b_url}}">
                        </div>

                        <div class="col-md-2 title">是否显示</div>
                        <div class="col-md-10 data">
                            <input type="radio"  ng-model="entity.mobile"  id="is_show" value="{{$data->is_show}}  value="1" name="is_show" checked>是
                            <input type="radio"  ng-model="entity.mobile"  id="is_show" value="{{$data->is_show}}  value="2" name="is_show">否
                        </div>

                    </div>
                </div>




            </div>
            <!--tab内容/-->
            <!--表单内容/-->

        </div>




    </div>
    <div class="btn-toolbar list-toolbar">
        <!-- <button class="btn btn-primary" ng-click="save()"><i class="fa fa-save"></i>保存</button> -->
        <a ng-click="submit()" data-toggle="modal" class="btn btn-danger" id="kko">修改</a>
    </div>

</section>
<!-- 正文区域 /-->

</form>
</body>

</html>
<script>
    $(document).ready(function(){
        $(document).on('click','#kko',function(){
            //alert(123);
            var b_name=$("#b_name").val();
            var b_url=$("#b_url").val();
            var is_sho=$("#is_show").val();
            if(b_name==""){
            	alert("导航栏名称必填");
            	return false;
        	 }

        	if(b_url==""){
        		alert("导航栏url必填");
        		return false;
        	}

        	var data={};
        	data.b_name=b_name;
        	data.b_url=b_url;
        	data.is_show=is_show;
        	var url = "/admin/bannereditdo";
        	$.ajax({
        		url:url,
        		data:data,
        		type:'post',
        		dataType:'json',
        		success:function(res){
        			if(res['code']==200){
        				alert(res.message);
        				location.href="/admin/bannershow";
        			}else{
        				alert(res.message);
        				location.href="/admin/bannershow";
        			}
        		}
        	});
      });
   });
</script>
