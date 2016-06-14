<?php
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
class RegisterController extends Controller{

	//注册页面
	public function Register()
	{
		return view('home.Register');
	}

	//登陆页面
	public function Login()
	{
		return view('home.login');
	}

}