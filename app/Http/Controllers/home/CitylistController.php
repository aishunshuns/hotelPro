<?php
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
class CitylistController extends Controller{

	//酒店列表
	public function HotelList()
	{
		return view('home.HotelList');
	}

	//酒店房型
	public function Hotel()
	{
		return view('home.Hotel');
	}

	//酒店简介
	public function HotelInfo()
	{
		return view('home.HotelInfo');
	}

	//酒店地图
	public function HotelMap()
	{
		echo "ditu"; 
	}

	//酒店评论
	public function HotelReview()
	{
		return view('home.HotelReview');
	}
}