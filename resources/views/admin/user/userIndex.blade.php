<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>后台管理员用户列表展示</title>
    <script src="/jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
          crossorigin="anonymous">
</head>
<body>
<table class="table table-striped">

    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">用户名称</th>
        <th scope="col">添加时间</th>
        <th scope="col">操作</th>

    </tr>
    </thead>
    <tbody>
    @foreach($user_data as $k=>$v)
        <tr admin_id="{{$v->admin_id}}">
            <th scope="row">{{$v->admin_id}}</th>
            <td>{{$v->admin_name}}</td>
            <td>{{Date("Y-m-d",$v->add_time)}}</td>
            <th>
                <button type="button" class="btn btn-success" id="del">删除</button>
                <button type="button" class="btn btn-info" id="edit">修改</button>
                <button type="button" class="btn btn-primary" id="userAddRole" >添加角色</button>
                <button type="button" class="btn btn-danger" id="userRole">用户角色</button>
            </th>
        </tr>
    @endforeach


    </tbody>
</table>

</body>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        //查看用户角色
        $(document).on('click','#userRole',function(){
            var admin_id=$(this).parents('tr').attr('admin_id');
            location.href="/user/userRoleIndex/"+admin_id;
        })
        //给用户添加角色
        $(document).on('click','#userAddRole',function(){
            var admin_id=$(this).parents('tr').attr('admin_id');
            location.href="/user/userAddRole/"+admin_id;
        })
        //删除
     $(document).on('click','#del',function(){
         var admin_id=$(this).parents('tr').attr('admin_id');
         if(window.confirm("是否确认删除")){
              var data={};
             data.admin_id=admin_id;
             var url="/user/userDel";
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
         }
     })
        //修改
        $(document).on('click','#edit',function(){
            var admin_id=$(this).parents('tr').attr('admin_id');
            location.href="/user/userEdit/"+admin_id;
        })
    })
</script>
</html>