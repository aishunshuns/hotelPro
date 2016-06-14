<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

class AdminController extends controller{
	//访问后台首页
	public function index(){
		return view('admin/index');
	}
}