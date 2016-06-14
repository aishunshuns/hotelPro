<?php
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
class UseraccountController extends Controller{

	//我的格子
	public function userAccount()
	{
		return view('home.user_account');
	}

	//我的信息
	public function myList()
	{
		return view('home.my_list');
	}

	//礼品兑换
	public function myGift()
	{
		return view('home.my_gift');
	}
}