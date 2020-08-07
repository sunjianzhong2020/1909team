
    <div class="goods-list">
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