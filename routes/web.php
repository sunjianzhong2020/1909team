<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/admin/index');
});

Route::get('/home', function () {
    return view('/admin/public/home');
});


Route::any("ment/cateadd","Admin\MentController@cateadd");
Route::any("ment/cateadddo","Admin\MentController@cateadddo");
Route::any("ment/catelist","Admin\MentController@catelist");
Route::any('ment/catelist','Admin\MentController@catelist');
Route::get('ment/catedel/{id}','Admin\MentController@catedel');
Route::get('ment/cateedit/{id}','Admin\MentController@cateedit');
Route::post('ment/cateupdate','Admin\MentController@cateupdate');
Route::any('ment/mentlist','Admin\MentController@mentlist');
Route::any('ment/mentadd','Admin\MentController@mentadd');
Route::get('ment/mentdel/{id}','Admin\MentController@mentdel');
Route::get('ment/mentedit/{id}','Admin\MentController@mentedit');
Route::post('ment/mentupdate','Admin\MentController@mentupdate');

Route::any('ment/mentupload','Admin\MentController@mentupload');

Route::any('ment/changevalue','Admin\MentController@changevalue');


//角色增删改查
Route::group(['namespace'=>'Admin','prefix'=>'role'],function(){
    //角色添加
    Route::any('roleCreate','RoleController@roleCreate');
    Route::any('roleStore','RoleController@roleStore');
    //展示
    Route::any('roleIndex','RoleController@roleIndex');
    //删除
    Route::any('roleDel','RoleController@roleDel');
    //修改
    Route::any('roleEdit/{id}','RoleController@roleEdit');
    Route::any('roleEditDo','RoleController@roleEditDo');
    //角色名称的即点即改
    Route::any('changeRole','RoleController@changeRole');
    //角色添加权限
    Route::any('roleAddPriv/{id}','RoleController@roleAddPriv');
    Route::any('roleAddPrivDo','RoleController@roleAddPrivDo');
    Route::any('rolePrivIndex/{id}','RoleController@rolePrivIndex');
});
//权限的增删改查
Route::group(['namespace'=>'Admin','prefix'=>'priv'],function(){
    //权限添加
    Route::any('/privCreate','PrivController@privCreate');
    Route::any('/privStore','PrivController@privStore');
    //权限展示
    Route::any('/privIndex','PrivController@privIndex');
    //权限删除
    Route::any('/privDel','PrivController@privDel');
    //权限修改
    Route::any('/privEdit/{id}','PrivController@privEdit');
    Route::any('/privEditDo','PrivController@privEditDo');
    //权限的即点即改
    Route::any('/changePriv','PrivController@changePriv');
});
//用户角色权限管理
Route::group(['namespace'=>'Admin','prefix'=>'user'],function(){

    Route::any('/userIndex','UserController@UserIndex');
    //用户删除
    Route::any('/userDel','UserController@UserDel')->middleware('checkLogin');
    //用户修改
    Route::any('/userEdit/{id}','UserController@UserEdit')->middleware('checkLogin');
    Route::any('/userEditDo','UserController@UserEditDo')->middleware('checkLogin');
    //给用户添加角色
    Route::any('/userAddRole/{id}','UserController@UserAddRole');
    Route::any('/userAddRoleDo','UserController@UserAddRoleDo');
    //用户角色展示
    Route::any('/userRoleIndex/{id}','UserController@UserRoleIndex');
    //后台用户名称的即点即改功能
    Route::any('/changeAdmin','UserController@changeAdmin');
});
//后台管理员注册
Route::group(['namespace'=>'Admin','prefix'=>'user'],function(){
    Route::any('/register','RegisterController@register');
    Route::any('/registerDo','RegisterController@registerDo');
});

#品牌添加
Route::any('admin/brandAdd','Admin\BrandController@brandAdd');
#品牌执行添加
Route::any('admin/brandAdd_do','Admin\BrandController@brandAdd_do');
#品牌展示
Route::any('admin/brandShow','Admin\BrandController@brandShow');
#品牌删除
Route::any('admin/brandDel','Admin\BrandController@brandDel');
#文件上传
Route::any('admin/upload','Admin\BrandController@upload');
#分类添加
Route::any('admin/cateAdd','Admin\CateController@cateAdd');
#分类执行添加
Route::any('admin/cateAdd_do','Admin\CateController@cateAdd_do');
#分类展示
Route::any('admin/cateShow','Admin\CateController@cateShow');
#分类删除
Route::any('admin/cateDel','Admin\CateController@cateDel');

#sku属性添加
Route::any('admin/SkuNameAdd','Admin\SkuNameController@SkuNameAdd');
#sku属性执行添加
Route::any('admin/SkuNameAdd_do','Admin\SkuNameController@SkuNameAdd_do');
#sku属性展示
Route::any('admin/SkuNameShow','Admin\SkuNameController@SkuNameShow');
#sku属性值删除
Route::any('admin/SkuNameDel','Admin\SkuNameController@SkuNameDel');

#sku属性值添加
Route::any('admin/SkuValAdd','Admin\SkuValController@SkuValAdd');
#sku属性值执行添加
Route::any('admin/SkuValAdd_do','Admin\SkuValController@SkuValAdd_do');
#sku属性值展示
Route::any('admin/SkuValShow','Admin\SkuValController@SkuValShow');
#sku属性值删除
Route::any('admin/SkuValDel','Admin\SkuValController@SkuValDel');


#sku添加
Route::any('admin/skuAdd','Admin\SkuController@skuAdd');
Route::any('admin/skuAdd_do','Admin\SkuController@skuAdd_do');



#商品添加
Route::any('admin/goodsAdd','Admin\GoodsController@goodsAdd');
#商品执行添加
Route::any('admin/goodsAdd_do','Admin\GoodsController@goodsAdd_do');
#商品图片上传
Route::any('admin/uploads','Admin\GoodsController@uploads');
#商品展示
Route::any('admin/goodsShow','Admin\GoodsController@goodsShow');
#商品删除
Route::any('admin/goodsDel','Admin\GoodsController@goodsDel');

//后台登录
Route::group(['namespace'=>'Admin','prefix'=>'user'],function(){
    Route::any('login','LoginController@login');
    Route::any('loginDo','LoginController@loginDo');
    //退出
    Route::any('quit','LoginController@quit');
});

//友情链接
Route::any('admin/friendAdd','Admin\FriendController@friendAdd');
Route::any('admin/friendAdd_do','Admin\FriendController@friendAdd_do');
Route::any('admin/friendShow','Admin\FriendController@friendShow');
Route::any('admin/friend_del','Admin\FriendController@friend_del');

//导航栏
Route::any('admin/banneradd','Admin\BannerController@banneradd');
Route::any('admin/bannerdo','Admin\BannerController@bannerdo');
Route::any('admin/bannershow','Admin\BannerController@bannershow');
Route::any('admin/bannerdel','Admin\BannerController@bannerdel');

