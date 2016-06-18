<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//首页页面路由
Route::get('/', 'home\IndexController@Index');
Route::get('CityList', 'home\IndexController@CityList');
Route::get('ActiVitys', 'home\IndexController@ActiVitys');
Route::get('GiftList', 'home\IndexController@GiftList');
Route::get('Help', 'home\IndexController@Help');
Route::get('MyOrder', 'home\IndexController@MyOrder');
Route::get('Help', 'home\IndexController@Help');

//预定酒店路由
Route::get('HotelList', 'home\CitylistController@HotelList');
Route::get('Hotel', 'home\CitylistController@Hotel');
Route::get('HotelInfo', 'home\CitylistController@HotelInfo');
Route::get('HotelMap', 'home\CitylistController@HotelMap');
Route::get('HotelReview', 'home\CitylistController@HotelReview');

//最新活动路由
Route::get('News', 'home\ActivityController@News');


//注册及登陆路由
Route::get('Register', 'home\RegisterController@Register');
Route::get('register_shu', 'home\RegisterController@Register_shu');
Route::post('register_add', 'home\RegisterController@Register_add');
Route::get('Login', 'home\RegisterController@Login');
Route::post('Login_yz', 'home\RegisterController@Login_yz');

//我的订单
Route::get('myOrder', 'home\MyorderController@myOrder');

//我的格子
Route::get('userAccount', 'home\UseraccountController@userAccount');
Route::get('myList', 'home\UseraccountController@myList');
Route::get('myGift', 'home\UseraccountController@myGift');

//礼品商城
Route::get('Gift', 'home\GiftController@Gift');





//后台
Route::get('admin/index','admin\AdminController@index');

//后台登陆页面
Route::get('admin', 'admin\LoginController@adminLogin');
Route::post('admin/login_yz','admin\LoginController@login_yz');

//邮件找回密码
Route::post('admin/email','admin\LoginController@email');


//后台用户管理
Route::get('admin/user_add','admin\UserController@user_add');
Route::post('admin/user_addpro','admin\UserController@user_addpro');
Route::get('admin/user_list','admin\UserController@user_list');
Route::get('admin/del','admin\UserController@user_del');
Route::get('admin/upd','admin\UserController@user_upd');
Route::get('/admin/user_search','admin\UserController@user_search');


//后台用户管理分页
Route::get('admin/user_lista','admin\UserController@user_lista');

//后台酒店列表
Route::get('admin/hotel_list','admin\HotelController@hotel_list');
//后台酒店添加
Route::get('admin/hotel_add','admin\HotelController@hotel_add');


//后台户型添加
Route::get('admin/house_add','admin\HouseController@house_add');
//后台户型列表
Route::get('admin/house_list','admin\HouseController@house_list');


//后台地区添加
Route::get('admin/address_add','admin\AddressController@address_add');
//后台地区列表
Route::get('admin/address_list','admin\AddressController@address_list');

//后台权限添加
Route::get('admin/power_add','admin\PowerController@power_add');
//后台权限列表
Route::get('admin/power_list','admin\PowerController@power_list');



//后台礼物添加
Route::get('admin/gift_add','admin\GiftController@gift_add');
//后台礼物列表
Route::get('admin/gift_list','admin\GiftController@gift_list');


//订单列表
Route::get('admin/cart_list','admin\CartController@cart_list');
//订单添加
Route::get('admin/cart_add','admin\CartController@cart_add');