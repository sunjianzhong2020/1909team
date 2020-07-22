<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>角色权限添加</title>
    <script src="/jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


</head>
<body>

<form>
    <div class="form-group">
        <label for="exampleInputEmail1">角色名称</label>
        <input type="text" class="form-control" id="role_name" aria-describedby="emailHelp" value="{{$role_data->role_name}}">
        <input type="hidden" id="role_id" value="{{$role_data->role_id}}">
    </div>
    <div class="form-group">
        <label>权限</label><br>
      @foreach($priv_data as $k=>$v)
      <input type="checkbox" id="priv_id" name="priv_name"  value="{{$v->priv_id}}">{{$v->priv_name}}
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
            var role_id=$("#role_id").val();

            var priv_id=[];
            $("#priv_id:checked").each(function(){
                priv_id.push($(this).val());
            })
//console.log(priv_id);return false;
            var data={};
            data.role_id=role_id;
            data.priv_id=priv_id;
            var url="/role/roleAddPrivDo";
            $.ajax({
                url:url,
                data:data,
                type:'post',
                dataType:'json',
                success:function(result){
                    if(result['code']==200){
                        alert(result.message);
                        location.href="/role/rolePrivIndex/"+role_id;
                    }else{
                        alert(result.message);
                        location.href="/role/roleAddPriv/"+role_id;
                    }
                }
            })
        })

    })
</script>
</html>