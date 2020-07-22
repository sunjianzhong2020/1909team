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
                    <a href="#home" data-toggle="tab">分类添加</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">分类名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" name="c_name"  ng-model="entity.name"  placeholder="分类名称" value="">
                        </div>

                        <div class="col-md-2 title">分类关键字</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  name="c_words" ng-model="entity.mobile"  placeholder="分类关键字" value="">
                        </div>

                        <div class="col-md-2 title">分类描述</div>
                        <div class="col-md-10 data">
                            <textarea name="c_desc" class="form-control"  ng-model="entity.telephone"  placeholder="分类描述" value=""></textarea>
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
            data.c_name = $("input[name='c_name']").val();
            data.c_words = $("input[name='c_words']").val();
            data.c_desc = $("textarea[name='c_desc']").val();
            var url = "/admin/cateAdd_do";
            $.ajax({
                type:'post',
                url:url,
                data:data,
                dataType:'json',
                success:function(res){
                    if(res.code=='200'){
                        alert(res.message);
                        window.location.href='/admin/cateShow';
                    }
                }
            })
        })
    })
</script>