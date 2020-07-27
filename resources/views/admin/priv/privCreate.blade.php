<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>权限添加</title>
    <script src="/jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


</head>
<body>


<div class="form-group">
        <label for="exampleInputEmail1">权限名称</label>
        <input type="text" class="form-control" id="priv_name" aria-describedby="emailHelp" placeholder="请输入权限名称...">

    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">权限路由</label>
        <input type="text" class="form-control" id="priv_url" aria-describedby="emailHelp" placeholder="请输入权限路由...">

    </div>


    <button type="submit" class="btn btn-primary" id="add">添加</button>


</body>
<Script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click','#add',function(){
            var priv_name=$("#priv_name").val();
            var priv_url=$("#priv_url").val();
            if(priv_name==''){
                alert('权限名称不能为空');
                return false;
            }
            if(priv_url==''){
                alert('权限路由不能为空');
                return false;
            }

            var data={};
           data.priv_name=priv_name;
            data.priv_url=priv_url;
            var url="/priv/privStore";
            $.ajax({
                url:url,
                data:data,
                type:'post',
                dataType:'json',
                success:function(result){
                    if(result['code']==200){
                        alert(result.message);
                        location.href="/priv/privIndex";
                    }else{
                        alert(result.message);
                        location.href="/priv/privCreate";
                    }
                }
            })
        })
    })
</Script>
</html>