<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>角色列表展示</title>
    <script src="/jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
          crossorigin="anonymous">
</head>
<body>
<table class="table table-striped">

    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">角色名称</th>
        <th scope="col">添加时间</th>
        <th scope="col">操作</th>

    </tr>
    </thead>
    <tbody>
    @foreach($role_data as $k=>$v)
        <tr role_id="{{$v->role_id}}">
            <th scope="row">{{$v->role_id}}</th>
            <td>{{$v->role_name}}</td>
            <td>{{Date("Y-m-d",$v->add_time)}}</td>
           <th>
               <button type="button" class="btn btn-success" id="del">删除</button>
               <button type="button" class="btn btn-info" id="edit">修改</button>
               <button type="button" class="btn btn-primary" id="roleAddPriv">添加权限</button>
               <button type="button" class="btn btn-danger" id="rolePrivIndex">查看权限</button>

           </th>
        </tr>

    @endforeach


    </tbody>
</table>

    {{$role_data->links()}}

</body>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        //查看权限
        $(document).on('click','#rolePrivIndex',function(){
             var role_id=$(this).parents('tr').attr('role_id');
              location.href="/role/rolePrivIndex/"+role_id;
        })
      //添加权限
        $(document).on('click','#roleAddPriv',function(){
            var role_id=$(this).parents('tr').attr('role_id');
            location.href="/role/roleAddPriv/"+role_id;
        })
        //删除
       $(document).on('click','#del',function(){
          var role_id=$(this).parents('tr').attr('role_id');
         if(window.confirm('是否确认删除')){
             var data={};
             data.role_id=role_id;
             var url="/role/roleDel";
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
         }
       })
        //修改
        $(document).on('click','#edit',function(){
            var role_id=$(this).parents('tr').attr('role_id');
            location.href="/role/roleEdit/"+role_id;
        })
    })
</script>
</html>