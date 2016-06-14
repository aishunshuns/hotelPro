<?php
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
class GiftController extends Controller{

	//礼品商城
	public function Gift()
	{
		return view('home.gift');
	}
}