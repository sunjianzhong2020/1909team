<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>个人注册</title>


    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-register.css" />
</head>

<body>
<div class="register py-container ">
    <!--head-->
    <div class="logoArea">
        <a href="" class="logo"></a>
    </div>
    <!--register-->
    <div class="registerArea">
        <h3>注册新用户<span class="go">我有账号，去<a href="login.html" target="_blank">登陆</a></span></h3>
        <div class="info">
            <form class="sui-form form-horizontal">
                <div class="control-group">
                    <label class="control-label">用户名：</label>
                    <div class="controls">
                        <input type="text" placeholder="请输入你的用户名" name="user_name" class="input-xfat input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputPassword" class="control-label">登录密码：</label>
                    <div class="controls">
                        <input type="password" placeholder="设置登录密码" name="user_pwd" class="input-xfat input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputPassword" class="control-label">确认密码：</label>
                    <div class="controls">
                        <input type="password" placeholder="再次确认密码" name="user_new_pwd" class="input-xfat input-xlarge">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">手机号：</label>
                    <div class="controls">
                        <input type="text" placeholder="请输入你的手机号" name="phone" class="input-xfat input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputPassword" class="control-label">短信验证码：</label>
                    <div class="controls">
                        <input type="text" placeholder="短信验证码" name="code" class="input-xfat input-xlarge">  <a href="#" name="code">获取短信验证码</a>
                    </div>
                </div>

                <div class="control-group">
                    <label for="inputPassword" class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <div class="controls">
                        <input name="m1" type="checkbox" value="2" checked=""><span>同意协议并注册《品优购用户协议》</span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls btn-reg">
                        <a name='btn' class="sui-btn btn-block btn-xlarge btn-danger" href="#">完成注册</a>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--foot-->
    <div class="py-container copyright">
        <ul>
            <li>关于我们</li>
            <li>联系我们</li>
            <li>联系客服</li>
            <li>商家入驻</li>
            <li>营销中心</li>
            <li>手机品优购</li>
            <li>销售联盟</li>
            <li>品优购社区</li>
        </ul>
        <div class="address">地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</div>
        <div class="beian">京ICP备08001421号京公网安备110108007702
        </div>
    </div>
</div>


<script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/index/js/pages/register.js"></script>
</body>
</html>
<script>
    $(document).ready(function(){

        /**
         * 计时器
         */
        function gotime(){
            var second = $("a[name='code']").text();
            //把一个变量转化成整数
            second = parseInt(second);
            // console.log(second);
            if(second==0){
                clearInterval(set);
                $("a[name='code']").text("获取短信验证码");
                $("a[name='code']").css('pointer-events','auto');
            }else{
                second = second -1;
                $("a[name='code']").text(second+'s');
                $("a[name='code']").css('pointer-events','none');
            }
        }


        $("a[name='code']").click(function() {
            // alert(111);
            $(this).text('60s');
            set = setInterval(gotime,1000);
            data = {};
            data.phone = $("input[name='phone']").val();
            // alert(data.phone);
            var url = "/index/verify";
            $.ajax({
                url:url,
                data:data,
                type:"post",
                dataType:'json',
                success:function(res){
                    alert(res.message);
                    // console.log(res);
                }
            });
        })

        $("a[name='btn']").click(function(){
            // alert(111);
            data = {};
            data.user_name = $("input[name='user_name']").val();
            data.user_pwd = $("input[name='user_pwd']").val();
            data.user_new_pwd = $("input[name='user_new_pwd']").val();
            data.phone = $("input[name='phone']").val();
            data.code = $("input[name='code']").val();
            // alert(data.user_name);
            var url = "/index/regAdd_do";
            $.ajax({
                url:url,
                data:data,
                type:"post",
                dataType:'json',
                success:function(res){
                    if(res.code==200){
                        alert(res.message);
                        window.location.href = '/index/logAdd';
                    }else{
                        alert(res.message);
                        window.location.href = '/index/reg';
                    }
                }
            });
        })
    })
</script>
