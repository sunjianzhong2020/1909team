<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/js/uploadify/uploadify.css">
    <script src="/js/uploadify/jquery.js"></script>
    <script src="/js/uploadify/jquery.uploadify.js"></script>

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" >×</button>
                <h3 id="myModalLabel">广告修改</h3>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-striped"  width="800px">
                    <tr>
                        <td>广告分类</td>
                        <td>
                            <select class="form-control" ng-model="entity.categoryId" ng-options="item.id as item.name for item in options['content_category'].data"
                                    name="shop_ment_cate_id" id="shop_ment_cate_id">
                                @foreach($res as $k => $v)
                                    <option value="{{$v->shop_ment_cate_id}}">{{$v->shop_ment_cate_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>标题</td>
                        <td><input  class="form-control" placeholder="标题" ng-model="entity.title" name="shop_ment_title" id="shop_ment_title" value="{{$rec->shop_ment_title}}">  </td>
                        <td><input type="hidden" id="shop_ment_id"  value="{{$rec->shop_ment_id}}"></td>
                    </tr>
                    <tr>
                        <td>URL</td>
                        <td><input  class="form-control" placeholder="URL" ng-model="entity.url" name="shop_ment_url" id="shop_ment_url" value="{{$rec->shop_ment_url}}"></td>
                    </tr>
                    <tr>
                        <td>广告图片</td>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <input type="file" id="shop_ment_img" />
                                        <img src="" alt="" id="imgs">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>有效</td>
                        <td>
                            <input type="radio" class="checkbox_square-blue" checked name="shop_ment_del" name="shop_ment_del" id="shop_ment_del" value="2">是&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" class="checkbox_square-blue" name="shop_ment_del" name="shop_ment_del" id="shop_ment_del" value="1">否
                        </td>
                    </tr>
                </table>

            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true" id="btn">修改</button>
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
            <script>
                $(document).ready(function(){
                    $('#shop_ment_img').uploadify({
                        'swf':  "/js/uploadify/uploadify.swf",
                        'uploader' : "/ment/mentupload",
                        'buttonText':"选择图片",
                        onUploadSuccess : function(msg,newFilePath,info){
//                console.log(newFilePath);
                            img2 = newFilePath;
                        }

                    })
                })
                $(document).on('click','#btn',function(){
                    var shop_ment_id = $('#shop_ment_id').val();
                    var shop_ment_cate_id = $('#shop_ment_cate_id').val();
                    var shop_ment_title = $('#shop_ment_title').val();
                    var shop_ment_url = $('#shop_ment_url').val();
                    var shop_ment_img = img2;
//                   alert(shop_ment_img)
//                    return
                    var shop_ment_del = $('#shop_ment_del:checked').val();
                    //alert(shop_ment_del);false;
                    if(!shop_ment_title){
                        alert('标题不能为空');
                        return false;
                    }
                    if(!shop_ment_url){
                        alert('网址不能为空');
                        return false;
                    }
                    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

                    $.ajax({
                        url:"/ment/mentupdate",
                        data:{'shop_ment_id':shop_ment_id,'shop_ment_cate_id':shop_ment_cate_id,'shop_ment_title':shop_ment_title,'shop_ment_url':shop_ment_url,'shop_ment_del':shop_ment_del,'shop_ment_img':shop_ment_img},
                        type:"post",
                        dataType:'json',
                        success:function(res){
                            console.log(res);
//                return false;
                            if(res['errno']==00000){
                                alert(res['msg']);
                                location.href="/ment/mentlist";
                            }else{
                                alert(res['msg']);
                                location.href="/ment/mentlist";
                            }

                        }
                    })

                })

            </script>