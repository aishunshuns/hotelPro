<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

class PowerController extends Controller{

	//权限列表
	public function power_list(){
		return view('admin/power_list');
	}
	//权限添加
	public function power_add(){
		return view('admin/power_add');
	}
}