<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>角色添加</title>
    <script src="/jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


</head>
<body>


<form>
    <div class="form-group">
        <label for="exampleInputEmail1">角色名称</label>
        <input type="text" class="form-control" id="role_name"  value="{{$role_data->role_name}}">
        <input type="hidden" id="role_id" value="{{$role_data->role_id}}">

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
        $(document).on('click','#edit',function(){
            var role_name=$("#role_name").val();
            var role_id=$("#role_id").val();
            if(role_name==''){
                alert('角色名称不能为空');
                return false;
            }
            var data={};
            data.role_name=role_name;
            data.role_id=role_id;
            var url="/role/roleEditDo";
            $.ajax({
                url:url,
                data:data,
                type:'post',
                dataType:'json',
                success:function(result){

                    if(result['code']==200){
                        alert(result.message);
                        location.href="/role/roleIndex";
                    }else{
                        alert(result.message);
                        location.href="/role/roleIndex";
                    }
                }
            })
        })
    })
</Script>
</html>