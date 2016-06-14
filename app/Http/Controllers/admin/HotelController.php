<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

class HotelController extends Controller{

	//酒店添加
	public function hotel_add(){
		return view('admin/hotel_add');
	}
	//用户列表
	public function hotel_list(){
		return view('admin/hotel_list');
	}
}
