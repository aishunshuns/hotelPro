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
		$arr = DB::table('hotel')->lists('city_id');
		$data = array();
		$res = array();
foreach($arr as $k => $v){
			$data[] = explode(',',$v);
		}	
		// dd($data);die;
		foreach($data as $k => $v){
			$res[] = $v[1];
		}
		// print_r($res);die;

		$result = DB::table('region')->whereIn('region_id',$res)->lists('region_name','region_id');
		//dd($result);
		return view('home.CityList')->with('result',$result);

	}

	//最新活动首页
	public function ActiVitys()
	{
		$res=DB::table('activity')
		->where('act_start_time','<=',time())
		->where('act_end_time','>=',time())
		->get();
		//print_r($res);die;
		return view('home.Activitys')->with('res',$res);
	}

	//礼品商城
	public function GiftList()

	{	
		$sql="select * from lat_gift";
		$res=DB::select($sql);
		return view('home.GiftList',['arr'=>$res]);
}

}
