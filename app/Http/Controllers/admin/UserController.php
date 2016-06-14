<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

class UserController extends Controller{

	//用户列表
	public function user_list(){
		return view('admin/user_list');
	}
	//用户添加
	public function user_add(){
		return view('admin/user_add');
	}
}
