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
//主页
Route::get('/', "IndexController@index");
//验证码
Route::get('captcha/show', "CaptchaController@show");

Route::group(['namespace' => 'Admin'], function () {
    // 后台首页
    Route::get('admin/login', 'AdminController@adminlogin');
    Route::get('admin/logout', 'AdminController@adminlogout');
    Route::post('admin/check', 'AdminController@admincheck');
    Route::get('admin/home', 'AdminController@AdHomePage')->middleware('login');
    Route::get('user/oper', "User\UserController@oper");
// 用户管理
    Route::get('user/alter/{id}', "User\UserController@alter")->middleware('login');
    Route::get('user/alteroff/{id}', "User\UserController@alteroff")->middleware('login');
    Route::get('user/delete/{id}', "User\UserController@delete")->middleware('login');
// 分类管理
    Route::get('type/add', 'Type\TypeController@add')->middleware('login');
    Route::post('type/save', 'Type\TypeController@save')->middleware('login');
    Route::get('type/oper', 'Type\TypeController@oper')->middleware('login');
    Route::get('type/del/{id}', 'Type\TypeController@del')->middleware('login');
    Route::get('type/update/{id}', 'Type\TypeController@update')->middleware('login');
    Route::post('type/usave', 'Type\TypeController@usave')->middleware('login');
// 商品管理
    Route::get('product/add', 'Product\ProductController@add')->middleware('login');
    Route::post('product/save', 'Product\ProductController@save')->middleware('login');
    Route::get('product/oper', 'Product\ProductController@oper')->middleware('login');
    Route::get('product/update/{id}', "Product\ProductController@update")->middleware('login');
    Route::post('product/usave', 'Product\ProductController@usave')->middleware('login');
    Route::get('product/delimage', "Product\ProductController@delimage")->middleware('login');
    Route::get('product/del/{id}', 'Product\ProductController@del')->middleware('login');
});
//前台
Route::group(['namespace' => 'Home'], function () {
//用户登录
    Route::get('UserLogin', 'Account\UserController@Login');
    Route::post('login/check', "Account\UserController@check");
    Route::get('UserLogout', 'Account\UserController@UserLogout');
    //用户注册
    Route::get('UserRegister', 'Account\UserController@register');
    Route::post('user/save', "Account\UserController@save");
    // 分类菜单
    Route::get('product/lister/{pid}', "Product\ProductController@lister");
    Route::get('product/detail/{id}', "Product\ProductController@detail");
    // 个人中心
    Route::get('center/userinfo', "Center\UserinfoController@userinfo")->middleware('center');
    Route::post('userinfo/pwdsave', "Center\UserinfoController@pwdsave")->middleware('center');
    Route::post('userinfo/infosave', "Center\UserinfoController@infosave")->middleware('center');
    //地址管理
    Route::get('center/address', "Center\AddressController@address")->middleware('center');
    Route::post('address/save', "Center\AddressController@save")->middleware('center');
    Route::post('address/update', "Center\AddressController@update")->middleware('center');
    Route::get('address/selected/{id}', "Center\AddressController@selected")->middleware('center');
    Route::get('address/del/{id}', "Center\AddressController@del")->middleware('center');
    //
    Route::get('center/dingdan', "Center\CenterController@dingdan")->middleware('center');
    Route::get('center/message', "Center\CenterController@message")->middleware('center');
    Route::get('center/shoucang', "Center\CenterController@shoucang")->middleware('center');
    //我的购物车
    Route::get('center/cartlist', "Center\CartlistController@list")->middleware('center');
    //商品数量修改
    Route::post('center/cartchangeNum', "Center\CartlistController@changeNum")->middleware('center');
    Route::get('center/delPro', "Center\CartlistController@delPro")->middleware('center');
    Route::get('center/clearPro', "Center\CartlistController@clearPro")->middleware('center');
    //购物车添加
    Route::post('cart/add', "Cart\CartController@add")->middleware('center');

});
