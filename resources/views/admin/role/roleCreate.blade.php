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


    <div class="form-group">
        <label for="exampleInputEmail1">角色名称</label>
        <input type="text" class="form-control" id="role_name" placeholder="请输入角色名称...">

    </div>

    <button type="submit" class="btn btn-primary" id="add">添加</button>

</body>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click','#add',function(){
            var role_name=$("#role_name").val();
            if(role_name==''){

                alert('角色名称不能为空');
                return false;
            }
            var data={};
            data.role_name=role_name;

            var url="/role/roleStore";
            $.ajax({
                url:url,
                data:data,
                type:'post',
                dataType:'json',
                success:function(result){
                    if(result['code']==200){
                        alert(result['message']);
                        location.href="/role/roleIndex";
                    }else{
                        alert(result['message']);
                        location.href="/role/roleCreate";
                    }
                }
            })
        })
    })
</script>
</html>