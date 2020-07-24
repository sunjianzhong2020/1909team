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
    <link rel="stylesheet" href="/js/uploadify/uploadify.css">
    <script src="/js/uploadify/jquery.js"></script>
    <script src="/js/uploadify/jquery.uploadify.js"></script>
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
                    <a href="#home" data-toggle="tab">商品品牌添加</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">商品品牌名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" name="b_name"  ng-model="entity.name"  placeholder="商品品牌名称" value="">
                        </div>
                        <div class="col-md-2 title">商品所属分类</div>
                        <div class="col-md-10 data">
                            <select type="text" class="form-control"  name="c_id" ng-model="entity.mobile"  placeholder="商品品牌网址" value="">
                                <option value="">请选择</option>
                                @foreach($cate as $v)
                                <option value="{{$v -> c_id}}">{{$v->c_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 title">商品品牌图片</div>
                        <div class="col-md-10 data">
                            <input type="file" class="form-control" name="b_img"  id="b_img" ng-model="entity.name"  placeholder="商品品牌图片" value="">
                        </div>

                        <div class="col-md-2 title">商品品牌网址</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  name="b_url" ng-model="entity.mobile"  placeholder="商品品牌网址" value="">
                        </div>

                        <div class="col-md-2 title">是否显示</div>
                        <div class="col-md-10 data">
                            <input type="radio"  name="is_show" ng-model="entity.mobile" value="1" checked>是
                            <input type="radio"  name="is_show" ng-model="entity.mobile" value="2">否
                        </div>

                        <div class="col-md-2 title">商品品牌描述</div>
                        <div class="col-md-10 data">
                            <textarea type="text" class="form-control"  name="b_desc" ng-model="entity.mobile"  placeholder="商品品牌描述" value=""></textarea>
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
        $('#b_img').uploadify({
            'swf':  "/js/uploadify/uploadify.swf",
            'uploader' : "/admin/upload",
            'buttonText':"选择图片",
            onUploadSuccess : function(msg,newFilePath,info){
                  // console.log(newFilePath);
                b_img2 = newFilePath;
            }

        })
    })
    $(document).ready(function(){
        $("button[name='btn']").click(function(){
            // alert(111);
            data = {};
            data.b_name = $("input[name='b_name']").val();
            data.b_img2 = b_img2;
            data.c_id = $("select[name='c_id']").val();
            data.b_url = $("input[name='b_url']").val();
            data.is_show = $("input[name='is_show']:checked").val();
            data.b_desc = $("textarea[name='b_desc']").val();
            var url = "/admin/brandAdd_do";
            $.ajax({
                type:'post',
                url:url,
                data:data,
                dataType:'json',
                success:function(res){
                    if(res.code=='200'){
                        alert(res.message);
                        window.location.href='/admin/brandShow';
                    }
                }
            })
        })
    })
</script>
