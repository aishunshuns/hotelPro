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
Route::get('Login', 'home\RegisterController@Login');


//我的订单
Route::get('myOrder', 'home\MyorderController@myOrder');

//我的格子
Route::get('userAccount', 'home\UseraccountController@userAccount');
Route::get('myList', 'home\UseraccountController@myList');
Route::get('myGift', 'home\UseraccountController@myGift');

//礼品商城
Route::get('Gift', 'home\GiftController@Gift');

/*后台*/
 
Route::get('admin/index','admin\AdminController@index');

//后台登陆页面
Route::get('admin', 'admin\LoginController@adminLogin');


//后台酒店管理
Route::get('admin/hotel_list','admin\HotelController@hotel_list');
Route::get('admin/hotel_add','admin\HotelController@hotel_add');





/***
 *
 *后台酒店管理系统
 *
 */
// 后台酒店展示页面
Route::get('admin/hotel_list','admin\HotelController@hotelList');
// 后台酒店添加页面
Route::get('admin/hotel_add','admin\HotelController@hotel_add');
// 后台酒店添加操作
Route::post('hotelAdd','admin\HotelController@hotelAdd');
// 后台酒店删除操作
Route::get('hotelDel','admin\HotelController@hotelDel');
// 后台酒店修改页面
Route::get('hotelSave','admin\HotelController@hotelSave');
// 后台酒店修改操作
Route::post('hotelUpdate','admin\HotelController@hotelUpdate');

/***
 *
 *后台酒店户型管理系统
 *
 */
//后台户型添加
Route::get('admin/house_add','admin\HouseController@house_add');
//后台户型列表
Route::get('admin/house_list','admin\HouseController@house_list');
// 后台酒店户型添加操作
Route::post('houseAdd','admin\HouseController@houseAdd');
// 后台酒店户型删除操作
Route::get('houseDel','admin\HouseController@houseDel');
// 后台酒店户型修改页面
Route::get('houseSave','admin\HouseController@houseSave');
// 后台酒店户型修改操作
Route::any('houseUpdate','admin\HouseController@houseUpdate');


//后台地区添加
Route::get('admin/address_add','admin\AddressController@address_add');
//后台地区列表
Route::get('admin/address_list','admin\AddressController@address_list');

//后台权限添加
Route::any('admin/power_add','admin\PowerController@power_add');
//后台权限列表
Route::get('admin/power_list','admin\PowerController@power_list');
//后台角色添加
Route::any('admin/role_add','admin\PowerController@role_add');
//后台角色列表
Route::any('admin/role_list','admin\PowerController@role_list');



//加载后台礼物添加页面
Route::get('admin/gift_add','admin\GiftController@gift_add');
//加载后台礼物列表页面
Route::get('admin/gift_list','admin\GiftController@gift_list');
//后台礼品添加
Route::post('admin/gift_addpro','admin\GiftController@gift_addpro');
//后台礼品删除
Route::get('admin/del','admin\GiftController@del');
//后台礼品编辑查询
Route::get('admin/up','admin\GiftController@up');
//后台礼品编辑
Route::post('admin/gift_up','admin\GiftController@gift_up');
//后台礼品搜索
Route::get('admin/giftSer','admin\GiftController@giftSer');
//后台投票即点即改
Route::get('admin/gift_dian','admin\GiftController@gift_dian');



//订单列表
Route::get('admin/cart_list','admin\CartController@cart_list');
//订单添加
Route::get('admin/cart_add','admin\CartController@cart_add');


//后台网络配置
//活动
Route::get('admin/activity','admin\ActivityController@Index');
Route::any('admin/activityAdd','admin\ActivityController@activityAdd');
Route::get('admin/activityShow','admin\ActivityController@activityShow');
Route::get('admin/activityDel','admin\ActivityController@activityDel');
Route::get('admin/activityUpdate','admin\ActivityController@activityUpdate');
Route::post('admin/activityUp','admin\ActivityController@activityUp');
Route::get('admin/activityJson','admin\ActivityController@activityJson');
Route::get('admin/activitySearch','admin\ActivityController@activitySearch');
//帮助 
Route::get('admin/help','admin\HelpController@Index');
Route::post('admin/helpAdd','admin\HelpController@helpAdd');
Route::get('admin/helpShow','admin\HelpController@helpShow');
Route::get('admin/helpUpdate','admin\HelpController@helpUpdate');
Route::get('admin/helpDel','admin\HelpController@helpDel');
Route::post('admin/helpUp','admin\HelpController@helpUp');
Route::get('admin/helpJson','admin\HelpController@helpJson');
Route::get('admin/helpSearch','admin\HelpController@helpSearch');