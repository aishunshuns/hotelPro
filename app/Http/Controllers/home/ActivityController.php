<?php
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
class ActivityController extends Controller{

	//选择喜欢的格子
	public function News()
	{	
		$id=$_GET['id'];
		$res=DB::table('activity')->where('act_id','=',$id)->first();
		return view('home.news')->with('v',$res);
	}
}