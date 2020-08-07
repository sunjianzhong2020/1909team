
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
                        <h3 class="box-title">导航栏</h3>
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

										  <th class="sorting_asc">id</th>
									      <th class="sorting">导航栏名称</th>									  
									      <th class="sorting">导航栏url</th>		
									      <th class="sorting">是否显示</th>		
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
			                          @foreach($data as $v)
			                          <tr id="{{$v->b_id}}">
			                          	<td>{{$v->b_id}}</td>
			                          	<td>{{$v->b_name}}</td>
			                          	<td>{{$v->b_url}}</td>
			                          	<td>{{$v->is_show == 1 ? "是" : "否"}}</td>

										<td>
										<button class="btn bg-olive btn-xs bto" name='del'>删除</button>
										</td>
			                          </tr>
			                          @endforeach
			                      </tbody>
			                  </table>
			                  <!--数据列表/-->                        
							  {{$data -> links()}}
							 
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
			<h3 id="myModalLabel">导航栏编辑</h3>
		</div>
		<div class="modal-body">		
			<table class="table table-bordered table-striped"  width="800px">
		      	<tr>
		      		<td>导航栏名称</td>
		      		<td><input  class="form-control" placeholder="导航栏名称" >  </td>
		      	</tr>		      	
		      	<tr> 
		      		<td>导航栏地址</td>
		      		<td><input  class="form-control" placeholder="导航栏地址">  </td>
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
        $("button[name='del']").click(function(){
            // alert(1111);
            data={};
			data.b_id = $(this).parents('tr').attr('id');
			//alert(data.b_id);
			var url = "/admin/bannerdel";
			$.ajax({
				url:url,
				type:'post',
				data:data,
				dataType:'json',
				success:function(res){
					if(res.code=='200'){
						alert(res.message);
						window.location.href = '/admin/bannershow';
					}
				}
			})
        })
	})
</script>