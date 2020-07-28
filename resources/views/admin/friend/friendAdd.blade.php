<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商家完善资料</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
  
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="../plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../css/style.css">
	<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
   
    
</head>

<body class="hold-transition skin-red sidebar-mini" >



            <!-- 正文区域 -->
            <section class="content">

                <div class="box-body">

                    <!--tab页-->
                    <div class="nav-tabs-custom">

                        <!--tab头-->
                        <ul class="nav nav-tabs">
                       		
                            <li class="active">
                                <a href="#home" data-toggle="tab">友情链接</a>                             
                            </li>                            
                        </ul>
                        <!--tab头/-->
						
                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">                                  

                                    <div class="col-md-2 title">友情链接名称</div>
                                    <div class="col-md-10 data">
                                        <input type="text" class="form-control"  ng-model="entity.name"  placeholder="友情链接名称" value="" name="f_name">
                                    </div>
									
									<div class="col-md-2 title">友情链接url</div>
                                    <div class="col-md-10 data">
                                        <input type="text" class="form-control" ng-model="entity.mobile"  placeholder="友情链接url" value="" name="f_url">
                                    </div>
                                    

                                </div>
                            </div>
                            
                            
                           
                            
                        </div>
                        <!--tab内容/-->
						<!--表单内容/-->
							 
                    </div>
                 	
                 	
                 	
                 	
                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button class="btn btn-primary" ng-click="save()"><i class="fa fa-save"></i>保存</button>
				      <a ng-click="submit()" data-toggle="modal" class="btn btn-danger" id="btn">提交</a>
				  </div>
			
            </section>
            <!-- 正文区域 /-->
			
       
</body>

</html>
<script>
	$(document).ready(function(){
		$(document).on('click','#btn',function(){
		  // alert(123);
		  	data={};
		  	data.f_name = $("input[name='f_name']").val();
		  	data.f_url = $("input[name='f_url']").val();
		  	var url = '/admin/friendAdd_do';
		  	$.ajax({
		  		url:url,
		  		type:'post',
		  		data:data,
		  		dataType:"json",
		  		success:function(res){
                     if(res['code']=="200"){
                     	alert(res.message);
                     	 window.location.href = '/admin/friendShow';
                     }
		  		}
		  	});
		});
	})
	
</script>