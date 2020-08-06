<!DOCTYPE html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>设置-地址添加</title>
    <link rel="icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="css/pages-seckillOrder.css" />
</head>

<body>
<!-- 头部栏位 -->
<!--页面顶部-->
<div id="nav-bottom">
    <!--顶部-->
    <div class="nav-top">
        <div class="top">
            <div class="py-container">
                <div class="shortcut">
                    <ul class="fr">
                        <li class="f-item"><a href="/index/index">我的品优购</a></li>
                        <li class="f-item space"></li>
                        <li class="f-item"><a href="/index/address">地址添加</a></li>
                        <li class="f-item space"></li>
                        <li class="f-item"><a href="/index/consumerAdd">个人信息</a></li>
                        <li class="f-item space"></li>
                        <li class="f-item" id="service">
                            <span>客户服务</span>
                            <ul class="service">
                                <li><a href="https://www.suning.com/">合作招商</a></li>
                                <li><a href="https://www.dcdapp.com/">商家后台</a></li>
                            </ul>
                        </li>
                        <li class="f-item space"></li>
                        <li class="f-item"><a href="/index/lybadd" >留言板</a></li>
                        {{--</li>--}}
                    </ul>
                </div>
            </div>
        </div>

        <!--头部-->
        <div class="header">
            <div class="py-container">
                <div class="yui3-g Logo">
                    <div class="yui3-u Left logoArea">
                        <a class="logo-bd" title="品优购" href="JD-index.html" target="_blank"></a>
                    </div>
                    <div class="yui3-u Center searchArea">
                        <div class="search">
                            <form action="" class="sui-form form-inline">
                                <!--searchAutoComplete-->
                                <div class="input-append">
                                    <input type="text" id="autocomplete" type="text" class="input-error input-xxlarge" />
                                    <button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
                                </div>
                            </form>
                        </div>
                        <div class="hotwords">
                            <ul>
                                <li class="f-item">品优购首发</li>
                                <li class="f-item">亿元优惠</li>
                                <li class="f-item">9.9元团购</li>
                                <li class="f-item">每满99减30</li>
                                <li class="f-item">亿元优惠</li>
                                <li class="f-item">9.9元团购</li>
                                <li class="f-item">办公用品</li>

                            </ul>
                        </div>
                    </div>
                    <div class="yui3-u Right shopArea">
                        <div class="fr shopcar">
                            <div class="show-shopcar" id="shopcar">
                                <span class="car"></span>
                                <a class="sui-btn btn-default btn-xlarge" href="cart.html" target="_blank">
                                    <span>我的购物车</span>
                                    <i class="shopnum">0</i>
                                </a>
                                <div class="clearfix shopcarlist" id="shopcarlist" style="display:none">
                                    <p>"啊哦，你的购物车还没有商品哦！"</p>
                                    <p>"啊哦，你的购物车还没有商品哦！"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="yui3-g NavList">
                    <div class="yui3-u Left all-sort">
                        <h4>全部商品分类</h4>
                    </div>
                    <div class="yui3-u Center navArea">
                        <ul class="nav">
                            <li class="f-item">服装城</li>
                            <li class="f-item">美妆馆</li>
                            <li class="f-item">品优超市</li>
                            <li class="f-item">全球购</li>
                            <li class="f-item">闪购</li>
                            <li class="f-item">团购</li>
                            <li class="f-item">有趣</li>
                            <li class="f-item"><a href="seckill-index.html" target="_blank">秒杀</a></li>
                        </ul>
                    </div>
                    <div class="yui3-u Right"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        $("#service").hover(function(){
            $(".service").show();
        },function(){
            $(".service").hide();
        });
        $("#shopcar").hover(function(){
            $("#shopcarlist").show();
        },function(){
            $("#shopcarlist").hide();
        });

    })
</script>
<script type="text/javascript" src="js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="js/widget/nav.js"></script>
<script type="text/javascript" src="pages/userInfo/distpicker.data.js"></script>
<script type="text/javascript" src="pages/userInfo/distpicker.js"></script>
<script type="text/javascript" src="pages/userInfo/main.js"></script>
</body>
<!--header-->
<div id="account">
    <div class="py-container">
        <div class="yui3-g home">
            <!--左侧列表-->
            <div class="yui3-u-1-6 list">

                <div class="person-info">
                    <div class="person-photo"><img src="img/_/photo.png" alt=""></div>
                    <div class="person-account">
                        <span class="name">Michelle</span>
                        <span class="safe">账户安全</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="list-items">
                    <dl>
                        <dt><i>·</i> 订单中心</dt>
                        <dd ><a href="home-index.html"   >我的订单</a></dd>
                        <dd><a href="home-order-pay.html" >待付款</a></dd>
                        <dd><a href="home-order-send.html"  >待发货</a></dd>
                        <dd><a href="home-order-receive.html" >待收货</a></dd>
                        <dd><a href="home-order-evaluate.html" >待评价</a></dd>
                    </dl>
                    <dl>
                        <dt><i>·</i> 我的中心</dt>
                        <dd><a href="home-person-collect.html" >我的收藏</a></dd>
                        <dd><a href="home-person-footmark.html" >我的足迹</a></dd>
                    </dl>
                    <dl>
                        <dt><i>·</i> 物流消息</dt>
                    </dl>
                    <dl>
                        <dt><i>·</i> 设置</dt>
                        <dd><a href="home-setting-info.html" >个人信息</a></dd>
                        <dd><a href="home-setting-address.html" class="list-active" >地址管理</a></dd>
                        <dd><a href="home-setting-safe.html" >安全管理</a></dd>
                    </dl>
                </div>
            </div>
            <!--右侧主内容-->
            <div class="yui3-u-5-6">
                <div class="body userAddress">
                    <div class="address-title">
                        <span class="title">地址管理</span>
                        <a data-toggle="modal" data-target=".edit" data-keyboard="false"   class="sui-btn  btn-info add-new">添加新地址</a>
                        <span class="clearfix"></span>
                    </div>
                    <div class="address-detail">
                        <table class="sui-table table-bordered">
                            <thead>
                            <tr>
                                <th>姓名</th>
                                <th>地址</th>
                                <th>联系电话</th>
                                <th>邮箱</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($xym as $k=>$v)
                            <tr>
                                <td>{{$v['shop_address_name']}}</td>
                                <td>{{$v['shop_address_province']}}{{$v['shop_address_city']}}{{$v['shop_address_area']}}{{$v['shop_address_address']}}</td>
                                <td>{{substr($v['shop_address_tel'],0,3)}}****{{substr($v['shop_address_tel'],7,11)}}</td>
                                <td>{{$v['shop_address_email']}}</td>
                                <td>
                                    <a href="{{url('/index/dizhiedit/'.$v['shop_address_id'])}}"><button>编辑</button></a>
                                    <a href="{{url('/index/dizhidel/'.$v['shop_address_id'])}}"><button>删除</button></a>
                                    <a href=""><button>默认地址</button></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--新增地址弹出层-->
                    <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit" style="width:580px;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
                                    <h4 id="myModalLabel" class="modal-title">新增地址</h4>
                                </div>
                                <div class="modal-body">
                                    {{--<form action="{{url('index/dizhiadd')}}"  method="post" >--}}
                                    <div class="control-group">
                                        <label class="control-label">收货人：</label>
                                        <div class="controls">
                                            <input type="text" class="input-medium" id="shop_address_name">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">所在地区：</label>
                                        <div class="controls">
                                            <div data-toggle="distpicker">
                                                <div class="form-group area">
                                                    <select class="form-control changearea"  id="shop_address_province">
                                                        <option value="0">--请选择--</option>
                                                        @foreach($area as $k=>$v)
                                                            <option value="{{$v->id}}">{{$v->name}}</option>
                                                        @endforeach
                                                        <select>
                                                </div>
                                                <div class="form-group area">
                                                    <select name="city" id="shop_address_city" >
                                                        <option value="" selected="selected">--请选择--</option>
                                                        <select>
                                                </div>
                                                <div class="form-group area">
                                                    <select name="area" id="shop_address_area">
                                                        <option value="" selected="selected">--请选择--</option>
                                                        <select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">详细地址：</label>
                                        <div class="controls">
                                            <input type="text" class="input-large" id="shop_address_address">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">联系电话：</label>
                                        <div class="controls">
                                            <input type="text" class="input-medium" id="shop_address_tel">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">邮箱：</label>
                                        <div class="controls">
                                            <input type="text" class="input-medium" id="shop_address_email">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="btn">添加</button>
                                    <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
                                </div>
                                {{--</form>--}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- 底部栏位 -->
<!--页面底部-->
<div class="clearfix footer">
    <div class="py-container">
        <div class="footlink">
            <div class="Mod-service">
                <ul class="Mod-Service-list">
                    <li class="grid-service-item intro  intro1">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item  intro intro2">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item intro  intro3">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item  intro intro4">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item intro intro5">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                </ul>
            </div>
            <div class="clearfix Mod-list">
                <div class="yui3-g">
                    <div class="yui3-u-1-6">
                        <h4>购物指南</h4>
                        <ul class="unstyled">
                            <li>购物流程</li>
                            <li>会员介绍</li>
                            <li>生活旅行/团购</li>
                            <li>常见问题</li>
                            <li>购物指南</li>
                        </ul>

                    </div>
                    <div class="yui3-u-1-6">
                        <h4>配送方式</h4>
                        <ul class="unstyled">
                            <li>上门自提</li>
                            <li>211限时达</li>
                            <li>配送服务查询</li>
                            <li>配送费收取标准</li>
                            <li>海外配送</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>支付方式</h4>
                        <ul class="unstyled">
                            <li>货到付款</li>
                            <li>在线支付</li>
                            <li>分期付款</li>
                            <li>邮局汇款</li>
                            <li>公司转账</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>售后服务</h4>
                        <ul class="unstyled">
                            <li>售后政策</li>
                            <li>价格保护</li>
                            <li>退款说明</li>
                            <li>返修/退换货</li>
                            <li>取消订单</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>特色服务</h4>
                        <ul class="unstyled">
                            <li>夺宝岛</li>
                            <li>DIY装机</li>
                            <li>延保服务</li>
                            <li>品优购E卡</li>
                            <li>品优购通信</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>帮助中心</h4>
                        <img src="img/wx_cz.jpg">
                    </div>
                </div>
            </div>
            <div class="Mod-copyright">
                <ul class="helpLink">
                    <li>关于我们<span class="space"></span></li>
                    <li>联系我们<span class="space"></span></li>
                    <li>关于我们<span class="space"></span></li>
                    <li>商家入驻<span class="space"></span></li>
                    <li>营销中心<span class="space"></span></li>
                    <li>友情链接<span class="space"></span></li>
                    <li>关于我们<span class="space"></span></li>
                    <li>营销中心<span class="space"></span></li>
                    <li>友情链接<span class="space"></span></li>
                    <li>关于我们</li>
                </ul>
                <p>地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</p>
                <p>京ICP备08001421号京公网安备110108007702</p>
            </div>
        </div>
    </div>
</div>
<!--页面底部END-->


<script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    //三级联动
$(document).on("change","select",function(){
    var pid = $(this).val();
    //接收到点击地区的id
    var obj = $(this);
    $.ajax({
        type:"post",
        data:{id:pid},
        url:"/index/gitcity",
        dataType:"json",
        success:function(res){

            var _option = "<option value=''>请选择</option>";
            $.each(res,function(k,v){
                _option += "<option value='"+v.id+"'>"+v.name+"</option>";
            });

            obj.parent().next().find('select').html(_option);
        }
    })
})
//ajax接值验证非空
$(document).on('click','#btn',function(){
    var shop_address_name = $('#shop_address_name').val();
    var shop_address_province = $('#shop_address_province').val();
    var shop_address_city = $('#shop_address_city').val();
    var shop_address_area = $('#shop_address_area').val();
    var shop_address_address = $('#shop_address_address').val();
    var shop_address_tel = $('#shop_address_tel').val();
    var shop_address_email = $('#shop_address_email').val();
//     alert(shop_address_email);
    if(!shop_address_name){
        alert('用户名不能为空');
        return false;
    }
    if(!shop_address_address){
        alert('详细地址不能为空');
        return false;
    }
    if(!shop_address_tel){
        alert('联系方式不能为空');
        return false;
    }
    if(!(/^1(3|4|5|6|7|8|9)\d{9}$/.test(shop_address_tel))){
        alert("手机号码有误，请重填");
        return false;
    }
    if(!shop_address_email){
        alert('邮箱不能为空');
        return false;
    }
    var t  = /^[A-Za-zd0-9]+([-_.][A-Za-zd]+)*@([A-Za-zd]+[-.])+[A-Za-zd]{2,5}$/;
    if(!(t.test(shop_address_email)))
    {
        alert('邮箱格式有误，请重填');
        return false;
    }
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

    $.ajax({
        url:"/index/dizhiadd",
        data:{'shop_address_name':shop_address_name,'shop_address_province':shop_address_province,'shop_address_city':shop_address_city,'shop_address_area':shop_address_area,'shop_address_address':shop_address_address,'shop_address_tel':shop_address_tel,'shop_address_email':shop_address_email},
        type:"post",
        dataType:'json',
        success:function(res){
            console.log(res);
//                return false;
            if(res['errno']=='00000'){
                alert(res['msg']);
                location.href="/index/address";
            }else{
                alert(res['msg']);
                location.href="/index/address";
            }

        }
    })

})
</script>

</html>