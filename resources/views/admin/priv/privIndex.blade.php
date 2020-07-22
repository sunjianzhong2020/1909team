<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>权限列表展示</title>
    <script src="/jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
          crossorigin="anonymous">
</head>
<body>
<table class="table table-striped">

    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">权限名称</th>
        <th scope="col">权限url</th>
        <th scope="col">添加时间</th>
        <th scope="col">操作</th>

    </tr>
    </thead>
    <tbody>
    @foreach($priv_data as $k=>$v)
        <tr priv_id="{{$v->priv_id}}">
            <th scope="row">{{$v->priv_id}}</th>
            <td>{{$v->priv_name}}</td>
            <td>{{$v->priv_url}}</td>
            <td>{{Date("Y-m-d",$v->add_time)}}</td>
            <th>
                <button type="button" class="btn btn-success" id="del">删除</button>
                <button type="button" class="btn btn-info" id="edit">修改</button>

            </th>
        </tr>
    @endforeach


    </tbody>
</table>
{{$priv_data->links()}}
</body>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
//        //添加
//        $(document).on('click','#priv_add',function(){
//            location.href="/priv/privCreate";
//        })
        //删除
        $(document).on('click','#del',function(){
            var priv_id=$(this).parents('tr').attr('priv_id');
            if(window.confirm('是否确认删除')){
                var data={};
                data.priv_id=priv_id;
                var url="/priv/privDel";
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
            }
        })
        //修改
        $(document).on('click','#edit',function(){
            var priv_id=$(this).parents('tr').attr('priv_id');

            location.href="/priv/privEdit/"+priv_id;
        })
    })
</script>
</html>