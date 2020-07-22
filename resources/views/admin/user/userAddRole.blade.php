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
        <label for="exampleInputEmail1">用户名</label>
        <input type="text" class="form-control" id="role_name" aria-describedby="emailHelp" value="{{$user_data->admin_name}}">
            <input type="hidden" id="admin_id" value="{{$user_data->admin_id}}">
    </div>
    <div class="form-group">
        <label>角色</label><br>
        @foreach($role_data as $k=>$v)
        <input type="checkbox" name="role_name"   id="role_id" value="{{$v->role_id}}">{{$v->role_name}}
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary" id="add">添加</button>
</form>
</body>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click','#add',function(){
            var admin_id=$("#admin_id").val();
           var role_id=[];
            $("#role_id:checked").each(function(){
                 role_id.push($(this).val());
            })

           var data={};
            data.admin_id=admin_id;
            data.role_id=role_id;
          var url="/user/userAddRoleDo";
            $.ajax({
                url:url,
                data:data,
                type:'post',
                dataType:'json',
                success:function(result){
                    if(result['code']==200){
                        alert(result.message);
                        location.href="/user/userRoleIndex/"+admin_id;
                    }else{
                        alert(result.message);
                        location.href="/user/userAddRole/{id}";
                    }
                }
            })
        })

    })
</script>
</html>