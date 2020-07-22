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

<form>
    <div class="form-group">
        <label for="exampleInputEmail1">权限名称</label>
        <input type="text" class="form-control" id="priv_name"  value="{{$priv_data->priv_name}}">
        <input type="hidden" id="priv_id" value="{{$priv_data->priv_id}}">

    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">权限路由</label>
        <input type="text" class="form-control" id="priv_url"  value="{{$priv_data->priv_url}}">

    </div>


    <button type="submit" class="btn btn-primary" id="edit">修改</button>
</form>

</body>
<Script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        // //权限列表展示
        // $(document).on('click','#priv_show',function(){
        //     location.href="/priv/privIndex";
        // })
        $(document).on('click','#edit',function(){
            var priv_name=$("#priv_name").val();
            var priv_url=$("#priv_url").val();
            var priv_id=$("#priv_id").val();
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
            data.priv_id=priv_id;

            var url="/priv/privEditDo";
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
                        location.href="/priv/privIndex";
                    }
                }
            })
        })
    })
</Script>
</html>