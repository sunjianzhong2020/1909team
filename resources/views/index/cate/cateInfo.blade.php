@include('index/public/header')

		<link rel="stylesheet" type="text/css" href="/index/css/pages-list.css" />
	<!--list-content-->
	<div class="main">
		<div class="py-container">
			<!--bread-->
{{--			<div class="bread">--}}
{{--				<ul class="fl sui-breadcrumb">--}}
{{--					<li>--}}
{{--						<a href="#">全部结果</a>--}}
{{--					</li>					--}}
{{--					<li class="active">智能手机</li>					--}}
{{--				</ul>--}}
{{--				<ul class="tags-choose">--}}
{{--					<li class="tag">全网通<i class="sui-icon icon-tb-close"></i></li>--}}
{{--					<li class="tag">63G<i class="sui-icon icon-tb-close"></i></li>--}}
{{--				</ul>--}}
{{--				<form class="fl sui-form form-dark">--}}
{{--					<div class="input-control control-right">--}}
{{--						<input type="text" />--}}
{{--						<i class="sui-icon icon-touch-magnifier"></i>--}}
{{--					</div>--}}
{{--				</form>--}}
{{--				<div class="clearfix"></div>--}}
{{--			</div>--}}
			<!--selector-->
			<div class="clearfix selector">
				<div class="type-wrap logo">
					<div class="fl key brand">品牌</div>

					<div class="value logos">
						<ul class="logo-list">
						 @foreach($brand as $k=>$v)
							<li><a href="{{$v->b_url}}"><img src="{{$v->b_img}}"/></a></li>
						@endforeach
						</ul>
					</div>

					<div class="ext">
						<a href="javascript:void(0);" class="sui-btn">多选</a>
						<a href="javascript:void(0);">更多</a>
					</div>
				</div>
				@foreach($shop_sku_name as $k=>$v)
				<div class="type-wrap">
					<div class="fl key">{{$v->sku_name_name}}</div>
					<div class="fl value">
						<ul class="type-list">
							@foreach($shop_sku_val as $vv)
								@if($v->sku_name_id==$vv->sku_name_id)
							<li>
								<a sku_val_id="{{$vv->sku_val_id}}" class="sku">{{$vv->sku_val_name}}</a>
							</li>
								@endif
							@endforeach
						</ul>
					</div>
				</div>
				@endforeach

			</div>
			<!--details-->
			<div class="details" >
				<div class="sui-navbar">
					<div class="navbar-inner filter">
						<ul class="sui-nav">
							<li class="active">
								<a href="#" class="field" field="">综合</a>
							</li>
							<li>
								<a href="#" field="is_new" class="field">新品</a>
							</li>
							<li>
								<a href="#" field="is_best" class="field">热卖</a>
							</li>

						</ul>
					</div>
				</div>
				<div class="goods-list" id="info">
					<ul class="yui3-g">
						@foreach($goods as $k=>$v)
						<li class="yui3-u-1-5">
							<div class="list-wrap">
								<div class="p-img">
									<a href="{{url('/goods/goodsInfo/'.$v->goods_id)}}" target="_blank"><img src="{{$v->goods_img}}" /></a>
								</div>
								<div class="price">
									<strong>
											<em>￥</em>
											<i>{{$v->goods_price}}</i>
										</strong>
								</div>
								<div class="attr">
									<em>{{$v->goods_name}}</em>
								</div>
								<div class="cu">
									<em><span>促</span>{{$v->goods_desc}}</em>
								</div>
								<div class="commit">
									<i class="command">已有2000人评价</i>
								</div>

							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
			<!--hotsale-->
			<div class="clearfix hot-sale">
				<h4 class="title">热卖商品</h4>
				<div class="hot-list">
					<ul class="yui3-g">
						@foreach($goods as $v)
						<li class="yui3-u-1-4">
							<div class="list-wrap">

								<div class="p-img">
									<a href="{{url('/goods/goodsInfo/'.$v->goods_id)}}" target="_blank"><img src="{{$v->goods_img}}" /></a>
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
								<div class="commit">
									<i class="command">{{$v->goods_desc}}</i>
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
@include('index/public/footer')
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
					<div onclick="cartPanelView.tabItemClick('cart')" class="toolbar-tab tbar-tab-cart" data="购物车" tag="cart">
						<i class="tab-ico"></i>
						<em class="tab-text"></em>
						<span class="tab-sub J-count " id="tab-sub-cart-count">0</span>
					</div>
					<div onclick="cartPanelView.tabItemClick('follow')" class="toolbar-tab tbar-tab-follow" data="我的关注" tag="follow">
						<i class="tab-ico"></i>
						<em class="tab-text"></em>
						<span class="tab-sub J-count hide">0</span>
					</div>
					<div onclick="cartPanelView.tabItemClick('history')" class="toolbar-tab tbar-tab-history" data="我的足迹" tag="history">
						<i class="tab-ico"></i>
						<em class="tab-text"></em>
						<span class="tab-sub J-count hide">0</span>
					</div>
				</div>

				<div class="toolbar-footer">
					<div class="toolbar-tab tbar-tab-top">
						<a href="#"> <i class="tab-ico  "></i> <em class="footer-tab-text">顶部</em> </a>
					</div>
					<div class="toolbar-tab tbar-tab-feedback">
						<a href="#" target="_blank"> <i class="tab-ico"></i> <em class="footer-tab-text ">反馈</em> </a>
					</div>
				</div>

				<div class="toolbar-mini"></div>

			</div>

			<div id="J-toolbar-load-hook"></div>

		</div>
	</div>
	<!--购物车单元格 模板-->
	<script type="text/template" id="tbar-cart-item-template">
		<div class="tbar-cart-item">
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
		<script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>
		<script type="text/javascript">
			$(function() {
				$("#service").hover(function() {
					$(".service").show();
				}, function() {
					$(".service").hide();
				});
				$("#shopcar").hover(function() {
					$("#shopcarlist").show();
				}, function() {
					$("#shopcarlist").hide();
				});

			})
		</script>
		<script type="text/javascript" src="/index/js/model/cartModel.js"></script>
		<script type="text/javascript" src="/index/js/czFunction.js"></script>
		<script type="text/javascript" src="/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
		<script type="text/javascript" src="/index/js/plugins/sui/sui.min.js"></script>
		<script type="text/javascript" src="/index/js/widget/cartPanelView.js"></script>
	</body>

</html>
<script>
	$(document).ready(function(){
		$(document).on('click','.sku',function(){

			//获取当前点击的
			var _this=$(this);
			var sku_val_id=_this.attr('sku_val_id');
			var data={};
			data.sku_val_id=sku_val_id;
			var url="/skuList";
			$.ajax({
				url:url,
				data:data,
				type:'post',
				dataType:'html',
				success:function(result){
					$('#info').html(result);
//					console.log(result);return false;
//					if(result['code']==200){
//						console.log(result['resault']);
//					}else{
//						alert(result['message']);
//					}
				}
			})
		})
		$(document).on('click','.field',function(){
			var _this=$(this);
			var field=_this.attr('field');
			if(field==''){
				return false;
			}
			_this.parent('li').addClass('active');
			_this.parent('li').siblings('li').removeClass('active');
			var data={};
			data.field=field;
			var url="/cateIs"
			$.ajax({
				url:url,
				data:data,
				type:'post',
				dataType:'html',
				success:function(result){
					$('#info').html(result);
				}
			})
		})

	})
</script>