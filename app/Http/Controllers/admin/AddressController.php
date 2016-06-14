<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

class AddressController extends Controller{

	//地区列表
	public function address_list(){
		return view('admin/address_list');
	}
	//地区添加
	public function address_add(){
		return view('admin/address_add');
	}
}