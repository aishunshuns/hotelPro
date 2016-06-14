<?php
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
class IndexController extends Controller{

	//页面首页
	public function Index()
	{
		return view('home.index');
	}

	//预定酒店首页
	public function CityList()
	{
		return view('home.CityList');
	}

	//最新活动首页
	public function ActiVitys()
	{
		return view('home.Activitys');
	}

	//礼品商城
	public function GiftList()
	{
		return view('home.GiftList');
	}

	//帮助咨询
	public function Help()
	{
		return view('home.help');
	}

	

}
