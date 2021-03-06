
@include('index/public/header')
<link rel="stylesheet" type="text/css" href="/index/css/pages-seckill-item.css" />

<script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>
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
{{--<script type="text/javascript" src="/index/js/widget/cartPanelView.js"></script>--}}
<script type="text/javascript" src="/index/js/model/cartModel.js"></script>
<script type="text/javascript" src="/index/js/czFunction.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery.jqzoom/jquery.jqzoom.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery.jqzoom/zoom.js"></script>
<script type="text/javascript">
    $(function(){
        $("ul.btn-choose li a.btn-xlarge").click(function(){
            alert("钻中");
        });
        $("#star").click(function(){
            alert("关注成功");
        })
    })
</script>
</body>
<div class="py-container">
    <div id="item">
        <div class="crumb-wrap">
            <ul class="sui-breadcrumb">
                <li>
                    <a href="#">手机、数码、通讯</a>
                </li>
                <li>
                    <a href="#">手机</a>
                </li>
                <li>
                    <a href="#">Apple苹果</a>
                </li>
                <li class="active">iphone 6S系类</li>
            </ul>
        </div>
        <!--product-info-->
        <div class="product-info">
            <div class="fl preview-wrap">
                <!--放大镜效果-->
                <div class="zoom">
                    <!--默认第一个预览-->

                    <div id="preview" class="spec-preview">

                        <span class="jqzoom">

                            <img jqimg="{{$goods_info->goods_img}}" src="{{$goods_info->goods_img}}" style="width: 412px; height: 412px;" />

                        </span>

                    </div>

                    <!--下方的缩略图-->
                    <div class="spec-scroll">
                        <a class="prev">&lt;</a>
                        <!--左右按钮-->
                        <div class="items">
                            <ul>
                                <li><img src="{{$goods_info->goods_img}}" bimg="{{$goods_info->goods_img}}" onmousemove="preview(this)" /></li>
                                {{--<li><img src="{{$goods_info->goods_img}}" bimg="{{$goods_info->goods_img}}" onmousemove="preview(this)" /></li>--}}
                                {{--<li><img src="{{$goods_info->goods_img}}" bimg="{{$goods_info->goods_img}}" onmousemove="preview(this)" /></li>--}}
                                <li><img src="{{$goods_info->goods_img}}" bimg="{{$goods_info->goods_img}}" onmousemove="preview(this)" /></li>
                                <li><img src="{{$goods_info->goods_img}}" bimg="{{$goods_info->goods_img}}" onmousemove="preview(this)" /></li>
                                <li><img src="{{$goods_info->goods_img}}" bimg="{{$goods_info->goods_img}}" onmousemove="preview(this)" /></li>
                                <li><img src="{{$goods_info->goods_img}}" bimg="{{$goods_info->goods_img}}" onmousemove="preview(this)" /></li>
                                <li><img src="{{$goods_info->goods_img}}" bimg="{{$goods_info->goods_img}}" onmousemove="preview(this)" /></li>


                            </ul>
                        </div>
                        <a class="next">&gt;</a>
                    </div>
                </div>
                <div class="product-collect">
                    <a href="javascript:;" id="star"><img src="/index/img/_/shi_heart.png" alt=""> 收藏</a>
                </div>
            </div>
            <div class="fr itemInfo-wrap">
                <div class="sku-name">
                    <h4>{{$goods_info->goods_name}}</h4>
                </div>
                <div class="news">
                    <span><img src="/index/img/_/clock.png"/>品优秒杀</span>
                    <span class="overtime">距离结束：01:56:78</span>
                </div>
                <div class="summary">
                    <div class="summary-wrap">

                        <div class="fl title">
                            <i>价　　格</i>
                        </div>
                        <div class="fl price">
                            <i>¥</i>
                            <em ><span class="goods_price" id="pp" >{{$goods_info->goods_price}}</span></em>
                        </div>
                        <div class="fr remark">
                            <i>累计评价</i><em>612188</em>
                        </div>
                    </div>
                    <div class="summary-wrap">
                        <div class="fl title">
                            <i>促　　销</i>
                        </div>
                        <div class="fl fix-width">
                            <i class="red-bg">加价购</i>
                            <em class="t-gray">满999.00另加20.00元，或满1999.00另加30.00元，或满2999.00另加40.00元，即可在购物车换购热销商品</em>
                        </div>
                    </div>
                </div>
                <div class="support">
                    <div class="summary-wrap">
                        <div class="fl title">
                            <i>支　　持</i>
                        </div>
                        <div class="fl fix-width">
                            <em class="t-gray">以旧换新，闲置手机回收  4G套餐超值抢  礼品购</em>
                        </div>
                    </div>
                    <div class="summary-wrap">
                        <div class="fl title">
                            <i>配 送 至</i>
                        </div>
                        <div class="fl fix-width">
                            <em class="t-gray">满999.00另加20.00元，或满1999.00另加30.00元，或满2999.00另加40.00元，即可在购物车换购热销商品</em>
                        </div>
                    </div>
                </div>
                <div class="clearfix choose">
                    <div id="specification" class="summary-wrap clearfix">
                        @foreach($n_data as $v)
                            <dl>
                                <dt>
                                <div class="fl title">
                                    <i class="sku_name_id">{{$v->sku_name_name}}</i>
                                </div>
                                </dt>
                                @foreach($data as $vv)
                                    @if($v['sku_name_id'] == $vv['sku_name_id'])
                                        <dd  sku_val_id="{{$vv['sku_val_id']}}">
                                            <a href="javascript:;" class="" id="sku" sku_val_id="{{$vv['sku_val_id']}}"  name="yanshi">{{$vv['sku_val_name']}}
                                                <span title="点击取消选择">&nbsp;</span>
                                            </a>
                                        </dd>
                                    @endif
                                @endforeach
                            </dl>
                        @endforeach


                    </div>




                    <div class="summary-wrap">
                        <div class="fl title">
                            <div class="control-group">
                                <div class="controls" goods_num="{{$goods_info->goods_num}}" >
                                    <input autocomplete="off"  id="buy_number" type="text" value="1" minnum="1" class="itxt" />
                                    <a href="javascript:void(0)" class="increment plus" id="add">+</a>
                                    <a href="javascript:void(0)" class="increment mins" id="less">-</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl">
                            <ul class="btn-choose unstyled">
                                <li goods_id="{{$goods_info->goods_id}}">
                                    <a href="javascript:;" class="sui-btn  btn-danger addshopcar cartAdd"  >加入购物车</a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



                </div>
            </div>
        </div>
        <!--product-detail-->
        <div class="clearfix product-detail">
            <div class="fl aside">
                <div class="shop">
                    <span class="fl">三星旗舰店</span><span class="fr"><a href="shop.html" target="_blank" class="sui-btn btn-bordered btn-danger">进入店铺</a></span>
                </div>
                <div class="clearfix"></div>
                <ul class="sui-nav nav-tabs tab-wraped">
                    <li class="active">
                        <a href="#index" data-toggle="tab">
                            <span>相关分类</span>
                        </a>
                    </li>
                    <li>
                        <a href="#profile" data-toggle="tab">
                            <span>推荐品牌</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content tab-wraped">
                    <div id="index" class="tab-pane active">
                        <ul class="part-list unstyled">
                            <li>手机</li>
                            <li>手机壳</li>
                            <li>内存卡</li>
                            <li>Iphone配件</li>
                            <li>贴膜</li>
                            <li>手机耳机</li>
                            <li>移动电源</li>
                            <li>平板电脑</li>
                        </ul>
                        <ul class="goods-list unstyled">
                            @foreach($f_data as $k=>$v)
                            <li>
                                <div class="list-wrap">
                                    <div class="p-img">
                                        <img src="{{$v->goods_img}}"  style="width:153px;height:126px"/>
                                    </div>
                                    <div class="attr">
                                        <em>{{$v->goods_name}}</em>
                                    </div>
                                    <div class="price">
                                        <strong>
                                            <em>¥</em>
                                            <i>{{$v->goods_price}}</i>
                                        </strong>
                                    </div>
                                    <div class="operate">
                                        <a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
                                    </div>
                                </div>
                            </li>
                           @endforeach
                        </ul>
                    </div>
                    <div id="profile" class="tab-pane">
                        @foreach($brand_data as $k=>$v)
                        <p>{{$v->b_name}}</p>
                            @endforeach
                    </div>
                </div>
            </div>
            <div class="fr detail">
                <div class="clearfix fitting">
                    <h4 class="kt">选择搭配</h4>
                    <div class="good-suits">
                        <div class="fl master">
                            <div class="list-wrap">
                                <div class="p-img">
                                    <img src="/index/img/_/l-m01.png" />
                                </div>
                                <em>￥5299</em>
                                <i>+</i>
                            </div>
                        </div>
                        <div class="fl suits">
                            <ul class="suit-list">
                                <li class="">
                                    <div id="">
                                        <img src="/index/img/_/dp01.png" />
                                    </div>
                                    <i>Feless费勒斯VR</i>
                                    <label data-toggle="checkbox" class="checkbox-pretty">
                                        <input type="checkbox"><span>39</span>
                                    </label>
                                </li>
                                <li class="">
                                    <div id=""><img src="/index/img/_/dp02.png" /> </div>
                                    <i>Feless费勒斯VR</i>
                                    <label data-toggle="checkbox" class="checkbox-pretty">
                                        <input type="checkbox"><span>50</span>
                                    </label>
                                </li>
                                <li class="">
                                    <div id=""><img src="/index/img/_/dp03.png" /></div>
                                    <i>Feless费勒斯VR</i>
                                    <label data-toggle="checkbox" class="checkbox-pretty">
                                        <input type="checkbox"><span>59</span>
                                    </label>
                                </li>
                                <li class="">
                                    <div id=""><img src="/index/img/_/dp04.png" /></div>
                                    <i>Feless费勒斯VR</i>
                                    <label data-toggle="checkbox" class="checkbox-pretty">
                                        <input type="checkbox"><span>99</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="fr result">
                            <div class="num">已选购0件商品</div>
                            <div class="price-tit"><strong>套餐价</strong></div>
                            <div class="price">￥5299</div>
                            <button name="cart" class="sui-btn  btn-danger addshopcar">加入购物车</button>
                        </div>
                    </div>
                </div>
                <div class="tab-main intro">
                    <ul class="sui-nav nav-tabs tab-wraped">
                        <li class="active">
                            <a href="#one" data-toggle="tab">
                                <span>商品介绍</span>
                            </a>
                        </li>
                        <li>
                            <a href="#two" data-toggle="tab">
                                <span>规格与包装</span>
                            </a>
                        </li>
                        <li>
                            <a href="#three" data-toggle="tab">
                                <span>售后保障</span>
                            </a>
                        </li>
                        <li>
                            <a href="#four" data-toggle="tab">
                                <span>商品评价</span>
                            </a>
                        </li>
                        <li>
                            <a href="#five" data-toggle="tab">
                                <span>手机社区</span>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="tab-content tab-wraped">
                        <div id="one" class="tab-pane active">
                            <ul class="goods-intro unstyled">
                                <li>分辨率：1920*1080(FHD)</li>
                                <li>后置摄像头：1200万像素</li>
                                <li>前置摄像头：500万像素</li>
                                <li>核 数：其他</li>
                                <li>频 率：以官网信息为准</li>
                                <li>品牌： Apple</li>
                                <li>商品名称：APPLEiPhone 6s Plus</li>
                                <li>商品编号：1861098</li>
                                <li>商品毛重：0.51kg</li>
                                <li>商品产地：中国大陆</li>
                                <li>热点：指纹识别，Apple Pay，金属机身，拍照神器</li>
                                <li>系统：苹果（IOS）</li>
                                <li>像素：1000-1600万</li>
                                <li>机身内存：64GB</li>
                            </ul>
                            <div class="intro-detail">
                                <img src="/index/img/_/intro01.png" />
                                <img src="/index/img/_/intro02.png" />
                                <img src="/index/img/_/intro03.png" />
                            </div>
                        </div>
                        <div id="two" class="tab-pane">
                            <p>规格与包装</p>
                        </div>
                        <div id="three" class="tab-pane">
                            <p>售后保障</p>
                        </div>
                        <div id="four" class="tab-pane">
                            <p>商品评价</p>
                        </div>
                        <div id="five" class="tab-pane">
                            <p>手机社区</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--like-->
        <div class="clearfix"></div>
        <div class="like">
            <h4 class="kt">猜你喜欢</h4>
            <div class="like-list">
                <ul class="yui3-g">
                    @foreach($like_data as $k=>$v)
                    <li class="yui3-u-1-6">
                        <div class="list-wrap">
                            <div class="p-img">
                                <a href="{{url('/goods/goodsInfo/'.$v->goods_id)}}">
                                    <img src="{{$v->goods_img}}" />
                                </a>

                            </div>
                            <div class="attr">
                                <em>{{$v->goods_desc}}</em>
                            </div>
                            <div class="price">
                                <strong>
                                    <em>¥</em>
                                    <i>{{$v->goods_price}}</i>
                                </strong>
                            </div>
                            <div class="commit">
                                <i class="command">已有6人评价</i>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- 底部栏位 -->
<!--页面底部-->
@include('index/public/footer');
<!--页面底部END-->
<!--侧栏面板开始-->
<div class="J-global-toolbar">
    <div class="toolbar-wrap J-wrap">
        <div class="toolbar">
            <div class="toolbar-panels J-panel">

                <!-- 购物车 -->
                <div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-cart toolbar-animate-out">
                    <h3 class="tbar-panel-header J-panel-header">
                        <a href="" class="title"><i></i><em class="title">购物车</em></a>
                        <span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('cart');" ></span>
                    </h3>
                    <div class="tbar-panel-main">
                        <div class="tbar-panel-content J-panel-content">
                            <div id="J-cart-tips" class="tbar-tipbox hide">
                                <div class="tip-inner">
                                    <span class="tip-text">还没有登录，登录后商品将被保存</span>
                                    <a href="#none" class="tip-btn J-login">登录</a>
                                </div>
                            </div>
                            <div id="J-cart-render">
                                <!-- 列表 -->
                                <div id="cart-list" class="tbar-cart-list">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 小计 -->
                    <div id="cart-footer" class="tbar-panel-footer J-panel-footer">
                        <div class="tbar-checkout">
                            <div class="jtc-number"> <strong class="J-count" id="cart-number">0</strong>件商品 </div>
                            <div class="jtc-sum"> 共计：<strong class="J-total" id="cart-sum">¥0</strong> </div>
                            <a class="jtc-btn J-btn" href="#none" target="_blank">去购物车结算</a>
                        </div>
                    </div>
                </div>

                <!-- 我的关注 -->
                <div style="visibility: hidden;" data-name="follow" class="J-content toolbar-panel tbar-panel-follow">
                    <h3 class="tbar-panel-header J-panel-header">
                        <a href="#" target="_blank" class="title"> <i></i> <em class="title">我的关注</em> </a>
                        <span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('follow');"></span>
                    </h3>
                    <div class="tbar-panel-main">
                        <div class="tbar-panel-content J-panel-content">
                            <div class="tbar-tipbox2">
                                <div class="tip-inner"> <i class="i-loading"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="tbar-panel-footer J-panel-footer"></div>
                </div>

                <!-- 我的足迹 -->
                <div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-history toolbar-animate-in">
                    <h3 class="tbar-panel-header J-panel-header">
                        <a href="#" target="_blank" class="title"> <i></i> <em class="title">我的足迹</em> </a>
                        <span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('history');"></span>
                    </h3>
                    <div class="tbar-panel-main">
                        <div class="tbar-panel-content J-panel-content">
                            <div class="jt-history-wrap">
                                <ul>
                                    <!--<li class="jth-item">
                                        <a href="#" class="img-wrap"> <img src=".portal/img/like_03.png" height="100" width="100" /> </a>
                                        <a class="add-cart-button" href="#" target="_blank">加入购物车</a>
                                        <a href="#" target="_blank" class="price">￥498.00</a>
                                    </li>
                                    <li class="jth-item">
                                        <a href="#" class="img-wrap"> <img src="portal/img/like_02.png" height="100" width="100" /></a>
                                        <a class="add-cart-button" href="#" target="_blank">加入购物车</a>
                                        <a href="#" target="_blank" class="price">￥498.00</a>
                                    </li>-->
                                </ul>
                                <a href="#" class="history-bottom-more" target="_blank">查看更多足迹商品 &gt;&gt;</a>
                            </div>
                        </div>
                    </div>
                    <div class="tbar-panel-footer J-panel-footer"></div>
                </div>

            </div>

            <div class="toolbar-header"></div>

            <!-- 侧栏按钮 -->
            <div class="toolbar-tabs J-tab">
                <div onclick="cartPanelView.tabItemClick('cart')" class="toolbar-tab tbar-tab-cart" data="购物车" tag="cart" >
                    <i class="tab-ico"></i>
                    <em class="tab-text"></em>
                    <span class="tab-sub J-count " id="tab-sub-cart-count">0</span>
                </div>
                <div onclick="cartPanelView.tabItemClick('follow')" class="toolbar-tab tbar-tab-follow" data="我的关注" tag="follow" >
                    <i class="tab-ico"></i>
                    <em class="tab-text"></em>
                    <span class="tab-sub J-count hide">0</span>
                </div>
                <div onclick="cartPanelView.tabItemClick('history')" class="toolbar-tab tbar-tab-history" data="我的足迹" tag="history" >
                    <i class="tab-ico"></i>
                    <em class="tab-text"></em>
                    <span class="tab-sub J-count hide">0</span>
                </div>
            </div>

            <div class="toolbar-footer">
                <div class="toolbar-tab tbar-tab-top" > <a href="#"> <i class="tab-ico  "></i> <em class="footer-tab-text">顶部</em> </a> </div>
                <div class="toolbar-tab tbar-tab-feedback" > <a href="#" target="_blank"> <i class="tab-ico"></i> <em class="footer-tab-text ">反馈</em> </a> </div>
            </div>

            <div class="toolbar-mini"></div>

        </div>

        <div id="J-toolbar-load-hook"></div>

    </div>
</div>
<!--购物车单元格 模板-->
<script type="text/template" id="tbar-cart-item-template">
    <div class="tbar-cart-item" >
        <div class="jtc-item-promo">
            <em class="promo-tag promo-mz">满赠<i class="arrow"></i></em>
            <div class="promo-text">已购满600元，您可领赠品</div>
        </div>
        <div class="jtc-item-goods">
            <span class="p-img"><a href="#" target="_blank"><img src="{2}" alt="{1}" height="50" width="50" /></a></span>
            <div class="p-name">
                <a href="#">{1}</a>
            </div>
            <div class="p-price"><strong>¥{3}</strong>×{4} </div>
            <a href="#none" class="p-del J-del">删除</a>
        </div>
    </div>
</script>
<!--侧栏面板结束-->
undefined

</html>
<script>
    $(document).ready(function(){
        //给+绑定一个点击事件
        $(document).on('click','#add',function(){
            //获取当前点击+的按钮
            var _this=$(this);
            //获取购买的数量
            var buy_number=parseInt(_this.prev('input').val());
            //获取库存
            var goods_num=parseInt(_this.parents('div').attr('goods_num'));
            //如果input 框的值(都卖数量)>商品库存量 input框的值为库存量
            if(buy_number>=goods_num){
                _this.prev('input').val(goods_num);
            }else{
                //购买数量+1
                buy_number=buy_number+1;
                _this.prev('input').val(buy_number);
            }
            //获取价格

        })
        //给-绑定一个点击事件
        $(document).on('click','#less',function(){
            //获取当前点击的-按钮
            var _this=$(this);
            //获取购买的数量
            var buy_number=parseInt(_this.prev().prev('input').val());
            //获取库存
            var goods_num=parseInt(_this.parents('div').attr('goods_num'));
            //如果购买的数量<=1  购买数量input框显示1
            if(buy_number<=1){
                _this.prev().prev('input').val(1);
            }else{
                buy_number=buy_number-1;
                _this.prev().prev('input').val(buy_number);
            }
        })
        //给购买数量input框绑定一个失去焦点事件
        $(document).on('blur','#buy_number',function(){
            //获取当前失去焦点的input框
            var _this=$(this);
            //获取购买的数量‘
            var buy_number=_this.val();
            //获取库存量
            var goods_num=_this.parents('div').attr('goods_num');
            var reg=/^\d+$/;
            //检测库存
            if(buy_number==""){
                _this.val(1);
            }else if(!reg.test(buy_number)){
                //检测input框里面的是否是 数字
                _this.val(1);
            }else if(buy_number<=1){
                //如果库存量<=1
                _this.val(1);
            }else if(parseInt(buy_number)>=goods_num){
                //如果购买数量大于商品库存
                _this.val(goods_num);
            }else{
                _this.val(parseInt(buy_number));
            }
        })
        //给sku属性添加一个点击事件
        $(document).on('click','#sku',function(){
            //获取当前点击的sku属性框
            var _this=$(this);
            //添加selected属性
            _this.parents('dl').find("[name='yanshi']").prop("class",'');
            _this.prop("class",'selected');
            //获取当前点击的属性值id
//            var sku_val_id=_this.attr('sku_val_id');
//            console.log(sku_val_id);
            var attr_id = new Array();
            $(".selected").each(function(res){
                attr_id.push($(this).attr('sku_val_id'));
            })
            var sku_name_id = $(".sku_name_id").length;
            var selected = $(".selected").length;
//            console.log(sku_name_id);
//            console.log(selected);
            var data={};
            data.attr_id=attr_id;
//            console.log(data);return false;

            var url="/goods/goodsSku";
            if(sku_name_id==selected){
                $.ajax({
                    url:url,
                    data:data,
                    type:'post',
                    dataType:'json',
                    success:function(result){

                        if(result['code']==200){
                                $('.goods_price').text(result['resault']['goods_price']);
                        }else{
                            $('.goods_price').text('该型号货物卖空了，我们正在努力备货，请看看其他的吧。亲');
                        }
                    }
                })
            }


        })
        //给添加购物车按钮 绑定一个点击事件
        $(document).on('click','.cartAdd',function(){
            var selected = $(".selected").length;
            if(selected<=0){
                alert('请选择商品属性');
                window.location.reload();
                return false;
            }
            //获取商品id
            //获取当前点击的购物车按钮
            var _this=$(this);
            var goods_id=_this.parent().attr('goods_id');
            //获取购买的数量
            var buy_number=$('#buy_number').val();
            //获取该商品的价格
            var str=$('#pp').text();
            var goods_price=str.split('￥');
            var reg=/^\d+$/;
            if(!reg.test(goods_price)){
                alert('该型号缺货了，我们正在备货，看看本店其他款式吧');
                return false;
            }
          //获取sku
            var attr_id = new Array();
            $(".selected").each(function(res){
                attr_id.push($(this).attr('sku_val_id'));
            })
            var sku_name_id = $(".sku_name_id").length;
            var selected = $(".selected").length;
            var data={};
            data.goods_id=goods_id;
            data.buy_number=buy_number;
            data.goods_price=goods_price;
            data.attr_id=attr_id;
//            console.log(data);return false;
            var url="/cart/cartAdd";
            if(sku_name_id==selected){
                $.ajax({
                    url:url,
                    data:data,
                    type:'post',
                    dataType:'json',
                    success:function(result){
//                        console.log(result);return false;
                        if(result.code==200){
                           alert(result.message);
                        }else if(result.message=='请登录'){
                            alert('请登录');
                            window.location.href="/index/logAdd/";
                        }else{
                            alert(result.message);
                            // window.location.href="/cart_pay/cart_pay_add/";
                        }
                    }
                })
            }else{
                alert('您有属性还未选择，请选择商品属性');
                return false;
            }

        })

    })
</script>