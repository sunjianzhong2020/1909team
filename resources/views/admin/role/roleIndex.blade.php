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
<form action="/role/roleIndex">
    <input type="text" name="role_name" placeholder="请输入角色名称.." value="{{$role_name}}"><button>搜索</button>
</form>
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

            <td field="role_name">
                <span class="span_name">{{$v->role_name}}</span>
                <input type="text" class="changRole" value="{{$v->role_name}}" style="display:none">

            </td>
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
        //即点即改功能
         //给span 标签绑定一个点击事件
         $(document).on('click','.span_name',function(){
            //获取当前点击的span标签
             var _this=$(this);
             //获取当前点击的span标签的文本
             var span_val=_this.text();
              //当前点击的span标签做隐藏 input 标签携带span标签的文本值做显示
             _this.hide()
             _this.next('input').val(span_val).show();
         })
           //给input标签绑定一个失去焦点事件
        $(document).on('blur','.changRole',function(){
            //获取当前失去焦点的input标签
            var _this=$(this);
            //获取当前失去焦点input 标签的  新值
            var new_value=_this.val();
            //获取下标
            var field=_this.parents('td').attr('field');
           //获取id值
            var role_id=_this.parents('tr').attr('role_id');
           //发送ajax请求
            var data={};
            data.new_value=new_value;
            data.field=field;
            data.role_id=role_id;
           var url="/role/changeRole";
            $.ajax({
                url:url,
                data:data,
                type:'post',
                dataType:'json',
                success:function(result){
                    if(result['code']==200){
                        _this.hide();
                        _this.prev('span').text(new_value).show();
                    }else{
                        _this.hide();
                        _this.prev('span').show();
                        alert(result['message']);
                    }
                }
            })
        })
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