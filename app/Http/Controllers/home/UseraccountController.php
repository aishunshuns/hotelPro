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
		$u_id=Session::get('user_id');
		$sql="select * from lat_gift join lat_users_gift on lat_gift.gift_id=lat_users_gift.gift_id where user_id='$u_id'";
		$res=DB::select($sql);
		return view('home.my_gift',['arr'=>$res]);
	}

	//用户退出
	public function out()
	{
		Session::flush();
		return Redirect(url('Login'));
	}
}