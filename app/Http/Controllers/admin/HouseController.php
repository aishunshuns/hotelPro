<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

class HouseController extends Controller{

	//户型列表
	public function house_list(){
		return view('admin/house_list');
	}
	//户型添加
	public function house_add(){
		return view('admin/house_add');
	}
}