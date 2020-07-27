<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品添加</title>
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
                    <a href="#home" data-toggle="tab">商品添加</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">商品名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  ng-model="entity.name" name="goods_name" placeholder="商品名称" value="">
                        </div>

                        <div class="col-md-2 title">商品价格</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.mobile"  name="goods_price" placeholder="商品价格" value="">
                        </div>

                        <div class="col-md-2 title">商品图片</div>
                        <div class="col-md-10 data">
                            <input type="file" class="form-control" id="goods_img" name="goods_img" ng-model="entity.mobile" value="">
                        </div>

                        <div class="col-md-2 title">商品描述</div>
                        <div class="col-md-10 data">
                            <textarea type="text" class="form-control"  name="goods_desc" ng-model="entity.telephone"  placeholder="商品描述" value=""></textarea>
                        </div>

                        <div class="col-md-2 title">是否最新</div>
                        <div class="col-md-10 data">
                            <input type="radio"  name="is_new" ng-model="entity.mobile" value="1" checked>是
                            <input type="radio"  name="is_new" ng-model="entity.mobile" value="2">否
                        </div>

                        <div class="col-md-2 title">是否显示</div>
                        <div class="col-md-10 data">
                            <input type="radio"  name="is_show" ng-model="entity.mobile" value="1" checked>是
                            <input type="radio"  name="is_show" ng-model="entity.mobile" value="2">否
                        </div>

                        <div class="col-md-2 title">是否热卖</div>
                        <div class="col-md-10 data">
                            <input type="radio"  name="is_best" ng-model="entity.mobile" value="1" checked>是
                            <input type="radio"  name="is_best" ng-model="entity.mobile" value="2">否
                        </div>


                        <div class="col-md-2 title">商品库存</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  name="goods_num" ng-model="entity.linkmanMobile"   placeholder="商品库存" value="">
                        </div>

                        <div class="col-md-2 title">商品货号</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  name="goods_sn" ng-model="entity.linkmanEmail"  placeholder="商品货号" value="">
                        </div>

                        <div class="col-md-2 title">所属分类</div>
                        <div class="col-md-10 data">
                            <select name="c_id" type="text" class="form-control" ng-model="entity.taxNumber" value="">
                                <option value="">请选择</option>
                                   @foreach($cate as $v)
                                     <option value="{{$v->c_id}}">{{$v->c_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="goods_img2" value="">
                        <div class="col-md-2 title">所属品牌</div>
                        <div class="col-md-10 data">
                            <select name="b_id" type="text" class="form-control" ng-model="entity.taxNumber"  value="">
                                <option value="">请选择</option>
                                    @foreach($brand as $v)
                                        <option value="{{$v->b_id}}">{{$v->b_name}}</option>
                                    @endforeach
                            </select>
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
        <button name="btn" ng-click="submit()" data-toggle="modal" class="btn btn-danger">提交</button>
    </div>
</section>
<!-- 正文区域 /-->
</body>
</html>
<script>
    $(document).ready(function(){
        $('#goods_img').uploadify({
            'swf':  "/js/uploadify/uploadify.swf",
            'uploader' : "/admin/uploads",
            'buttonText':"选择图片",
            onUploadSuccess : function(msg,newFilePath,info){
                // console.log(newFilePath);
                // return false;
                // $("input[name='goods_img2']").val(newFilePath);
                goods_img2=newFilePath;
            }

        })
    })

    $(document).ready(function(){
         $("button[name='btn']").click(function(){
             // alert(111);
             data = {};
             data.goods_name = $("input[name='goods_name']").val();
             data.goods_price = $("input[name='goods_price']").val();
             data.goods_desc = $("textarea[name='goods_desc']").val();
             data.goods_img2 = goods_img2;
             data.is_new = $("input[name='is_new']:checked").val();
             data.is_show = $("input[name='is_show']:checked").val();
             data.is_best = $("input[name='is_best']:checked").val();
             data.goods_num = $("input[name='goods_num']").val();
             data.goods_sn = $("input[name='goods_sn']").val();
             data.c_id = $("select[name='c_id']").val();
             data.b_id = $("select[name='b_id']").val();
             var url = '/admin/goodsAdd_do';
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
    });
</script>