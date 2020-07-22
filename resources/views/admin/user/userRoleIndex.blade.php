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
        <th scope="col">所属角色</th>


    </tr>
    </thead>
    <tbody>
    @foreach($admin_role_data as $k=>$v)
        <tr admin_id="{{$v->admin_id}}">
            <th scope="row">{{$v->admin_id}}</th>
            <td>{{$v->admin_name}}</td>
            <td>{{$v->role_name}}</td>

        </tr>
    @endforeach


    </tbody>
</table>

</body>
<script>

</script>
</html>