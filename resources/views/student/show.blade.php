<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <script src="/jquery.min.js"></script>

    	<table border="1">
    		<tr>
    			<td>id</td>
    			<td>学生名称</td>
    			<td>学生性别</td>
    			<td>学生年龄</td>
    			<td>班级</td>
    			<td>操作</td>
    		</tr>
    		@foreach($data as $v)
    		<tr id="{{$v->s_id}}">
    			<td>{{$v->s_id}}</td>
    			<td>{{$v->s_name}}</td>
    			<td>{{$v->s_sex == 1 ? '男' : '女'}}</td>
    			<td>{{$v->s_age}}</td>
    			<td>{{$v->c_id}}</td>
    			<td>
    				<button name="btn">删除</button>
    				<button name="upl">修改</button>
    			</td>
    		</tr>
    		@endforeach
    	</table>
    </body>
</html>
<script>
	$(document).ready(function(){
		$("button[name='btn']").click(function(){
			// alert(123);
			data={};
			data.s_id=$(this).parents('tr').attr('id');
			// alert(data.s_id);
			var url="/student/del";
			$.ajax({
				url:url,
				data:data,
				type:'post',
				dataType:'json',
				success:function(res){
					if(res.code="200"){
						alert(res.message)
						window.location.href="/student/show";
					}
				}
			})
		})

		$("button[name='upl']").click(function(){
			var s_id = (this).parents('tr').attr('')
		})
	});
</script>