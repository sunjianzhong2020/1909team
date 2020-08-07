
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>品牌管理</title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="../plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../css/style.css">
	<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>

    
</head>
<body class="hold-transition skin-red sidebar-mini">
  <!-- .box-body -->
                    <div class="box-header with-border">
                        <h3 class="box-title">友情链接</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">

                                </div>
                            </div>
                            <div class="box-tools pull-right">
                                <div class="has-feedback">
							                                         
                                </div>
                            </div>
                            <!--工具栏/-->

			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>

										  <th class="sorting_asc">友情链接ID</th>
									      <th class="sorting">友情链接名称</th>									  
									      <th class="sorting">友情链接url</th>								
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
			                          @foreach($data as $v)
			                          <tr>
			                          	<td>{{$v->f_id}}</td>
			                          	<td>{{$v->f_name}}</td>
			                          	<td>{{$v->f_url}}</td>
										<td>
										<button class="btn bg-olive btn-xs bto" add="{{$v->f_id}}">删除</button>
										</td>
			                          </tr>
			                          @endforeach
			                      </tbody>
			                  </table>
			                  <!--数据列表/-->                        
							  {{$data->links()}}
							 
                        </div>
                        <!-- 数据表格 /-->
                        
                        
                        
                        
                     </div>
                    <!-- /.box-body -->
         
<!-- 编辑窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">品牌编辑</h3>
		</div>
		<div class="modal-body">		
			<table class="table table-bordered table-striped"  width="800px">
		      	<tr>
		      		<td>品牌名称</td>
		      		<td><input  class="form-control" placeholder="品牌名称" >  </td>
		      	</tr>		      	
		      	<tr>
		      		<td>首字母</td>
		      		<td><input  class="form-control" placeholder="首字母">  </td>
		      	</tr>		      	
			 </table>				
		</div>
		<div class="modal-footer">						
			<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">保存</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
	  </div>
	</div>
</div>
   
</body>
</html>
<script>
	$(document).ready(function(){
		$('.bto').click(function(){
			data={};
			data.f_id = $(this).attr('add');
			//alert(data.f_id);
			var url='/admin/friend_del';
			$.ajax({
				url:url,
				type:'post',
				data:data,
				dataType:'json',
				success:function(res){
					if(res.code=='200'){
						alert(res.message);
						window.location.href = '/admin/friendShow';
					}	
				}
			});
		})
	})
</script>