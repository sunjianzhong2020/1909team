<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>品优购，优质！优质！</title>
    <link rel="icon" href="/index/assets/img/favicon.ico">

    <link rel="icon" href="/assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-JD-index.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/widget-jquery.autocomplete.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/widget-cartPanelView.css" />





    <link rel="stylesheet" type="text/css" href="/index/css/pages-zoom.css" />
    <!-- <link rel="stylesheet" type="text/css" href="/index/css/pages-seckill-item.css" /> -->


</head>
    <link rel="stylesheet" type="text/css" href="/index/css/pages-zoom.css" />
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
                    <ul class="fl">
                        @if($user_info!=[])
                        <li class="f-item">品优购欢迎您！</li>{{$user_info->user_name}}&nbsp;先生/女士&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('/index/logAdd')}}">退出</a>
                        @else
                        <li class="f-item">请<a href="{{url('/index/logAdd')}}">登录</a>　<span><a href="{{url('/index/reg')}}" target="_blank">免费注册</a></span></li>
                        @endif
                    </ul>
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
                                @foreach($active as $v)
                                    <a href="{{$v->a_url}}"><li class="f-item">{{$v->a_name}}</li></a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="yui3-u Right shopArea">
                        <div class="fr shopcar">
                            <div class="show-shopcar" id="shopcar">
                                <span class="car"></span>
                                <a class="sui-btn btn-default btn-xlarge" href="/cart_pay/cart_pay_add">
                                    <span>我的购物车</span>
                                    <i class="shopnum">0</i>
                                </a>
                              <!--   <div class="clearfix shopcarlist" id="shopcarlist" style="display:none">
                                    <p>"啊哦，你的购物车还没有商品哦！"</p>
                                    <p>"啊哦，你的购物车还没有商品哦！"</p>
                                </div> -->
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
                            @foreach($banner as $v)
                            <li class="f-item"><a href="{{$v->b_url}}">{{$v->b_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="yui3-u Right"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>
