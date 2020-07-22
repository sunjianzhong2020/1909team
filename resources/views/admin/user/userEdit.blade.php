<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>用户修改</title>
    <script src="/jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


</head>
<body>

<form>
    <div class="form-group">
        <label for="exampleInputEmail1">用户名称</label>
        <input type="text" class="form-control" id="admin_name" placeholder="请输入用户名称" value="{{$user_data->admin_name}}">
<input type="hidden" id="admin_id" value="{{$user_data->admin_id}}">
    </div>

    <button type="submit" class="btn btn-primary" id="edit">修改</button>
</form>
</body>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
   $(document).on('click','#edit',function(){
       var admin_name=$("#admin_name").val();
       var admin_id=$("#admin_id").val();
       var data={};
       data.admin_name=admin_name;
       data.admin_id=admin_id;
       var url="/user/userEditDo";
       $.ajax({
           url:url,
           data:data,
           type:'post',
           dataType:'json',
           success:function(result){
               if(result['code']==200){
                   alert(result['message']);
                   location.href="/user/userIndex";
               }else{
                   alert(result['message']);
                   location.href="/user/userIndex";
               }
           }
       })
   })

    })
</script>
</html>