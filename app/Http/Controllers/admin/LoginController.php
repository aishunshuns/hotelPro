<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
class LoginController extends Controller{

	//后台登陆页面
	public function adminLogin()
	{
		return view('admin.login');
	}

	//后台展示页面
	public function adminIndex()
	{
		return view('admin.index');
	}
}