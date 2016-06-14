<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

class GiftController extends Controller{

	//礼品列表
	public function gift_list(){
		return view('admin/gift_list');
	}
	//礼品添加
	public function gift_add(){
		return view('admin/gift_add');
	}
}
