<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

class CartController extends Controller{

	//订单列表
	public function cart_list(){
		return view('admin/cart_list');
	}
	//订单添加
	public function address_add(){
		return view('admin/cart_add');
	}
}