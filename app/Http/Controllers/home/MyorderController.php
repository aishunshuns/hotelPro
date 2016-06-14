<?php
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
class MyOrderController extends Controller{


	//我的订单
	public function myOrder()
	{
		return view('home.my_order');
	}
}
