<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <script src="/jquery.min.js"></script>
    <body>
    	学生添加：<input type="text" name="s_name"><br>
    	学生性别:<input type="radio" name="s_sex" value="1" checked="checked">男
    	        <input type="radio" name="s_sex" value="2">女<br>
    	学生年龄: <input type="text" name="s_age"><br>
    	班级: <select name="c_id" id="">
    		     <option value="">请选择</option>
    		     @foreach($data as $v)
    		     <option value="{{$v->c_id}}">{{$v->c_name}}</option>
    		     @endforeach
    	     </select><br>
    	<button class="btn">提交</button>
    </body>
</html>	
<script>
	$(document).ready(function(){
		$(document).on('click','.btn',function(){
			// alert(123);
			data={};
			data.s_name=$("input[name='s_name']").val();
			//alert(data.s_name);
			data.s_sex=$("input[name='s_sex']:checked").val();
			//alert(data.s_sex);
			data.s_age=$("input[name='s_age']").val();
			// alert(data.s_age);
			data.c_id = $("select[name='c_id']").val();
			// alert(data.c_id);
			var url="/student/add_do";
			$.ajax({
				url:url,
				type:'post',
				data:data,
				dataTypr:'json',
				success:function(res){
					if(res['code']=="200"){
						alert(res.message);
						window.location.href="/student/show";
					}
				}
			})
		})
	})
</script>