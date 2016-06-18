<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use DB,Session,Redirect,Input,Request;

class HotelController extends Controller
{

	//酒店添加页面
	public function hotel_add()
	{
		$arr = DB::table('lat_hotel_type')->get();
		return view('admin/hotel_add')->with('arr',$arr);
	}

	//  后台酒店添加操作
	public function hotelAdd()
	{
		$file = Input::file('myfile');
		//print_r($file);die;
		// 上传文件接值
		if($file -> isValid()){
			  //检验一下上传的文件是否有效.
			  $clientName = $file -> getClientOriginalName();

			  $tmpName = $file ->getFileName(); // 缓存在tmp文件夹中的文件名 例如 php8933.tmp 这种类型的.

			  $realPath = $file -> getRealPath();    //这个表示的是缓存在tmp文件夹下的文件的绝对路径

			  $extension = $file -> getClientOriginalExtension(); //上传文件的后缀.

			  $mimeTye = $file -> getMimeType();

			  $newName = md5(date('ymdhis').$clientName).".".$extension;

			  $path = $file -> move('storage\uploads\hotel',$newName);
			  //echo $path;die;		  
		}
		//echo $path;die;
		$arr = Request::input();
		$arr['city_id'] = $arr['pro'].','.$arr['city'].','.$arr['county']; 
		unset($arr['_token']);
		unset($arr['pro']);
		unset($arr['city']);
		unset($arr['county']);
		$arr['hotel_img'] = $path;
		//echo $arr['hotel_img'];die;
		//print_r($arr);die;
		$res=DB::table('lat_hotel')->insert($arr);
		if ($res) {
			return "<script>alert('添加成功');location.href='admin/hotel_list'</script>" ;
		}else{
			return "<script>alert('添加失败');location.href='hotel_add'</script>" ;
		}
	}

	//酒店列表
	public function hotelList()
	{	
		$search=isset($_GET['search'])?$_GET['search']:'';
		//echo $search;
		if (!empty($search)) {
			$arr = DB::table('lat_hotel')
			->where('hotel_name','like',"%$search%")->get();;
			
		}else{
			$arr = DB::table('lat_hotel')->get();
		}
		
		//dd($arr);die;
		$data = array();
		$local = array();
		foreach($arr as $k => $v) {
			$data[] = explode(',',$v['city_id']);
		}
		//print_r($data);die;	
		foreach($data as $v){
			$local[] = DB::table('lat_region')->whereIn('region_id',$v)->lists('region_name');
		}
		//print_r($local);die;
		foreach($local as $k => $v) {
			$arr[$k]['city'] = implode(',',$v);
		}
		// 计算总条数
		$sum = count($arr);
		// 接取当前页数
		$page = isset($_GET['page'])?$_GET['page']:1;
		// 每页显示条数
		$num = 5;
		// 计算总页数
		$pagesum = ceil($sum/$num);
		// 上一页
		$last = $page-1<1?1:$page-1;
		// 下一页
		$next = $page+1>$pagesum?$pagesum:$page+1;
		$array = array_slice($arr,($page-1)*$num,$num);
		$res['array'] = $array;
		$res['last'] = $last;
		$res['next'] = $next;
		$res['pagesum'] = $pagesum;
		return view('admin/hotel_list')->with('arr',$res)->with('search',$search);
	}

	// 酒店列表删除操作
	public function hotelDel()
	{
		$id = Request::input('hotel_id');
		//dd($id);die;
		$res = DB::table('lat_hotel')->where('hotel_id','=',$id)->delete();
		if ($res) {
			return "<script>alert('删除成功');location.href='admin/hotel_list'</script>" ;
		}else{
			return "<script>alert('删除失败');location.href='admin/hotel_list'</script>" ;
		}
	}

<<<<<<< HEAD
	//酒店添加
	public function hotel_add()
	{
		return view('admin/hotel_add');
	}

	//酒店列表
	public function hotel_list()
	{
		return view('admin/hotel_list');
=======
	// 酒店修改页面
	public function hotelSave()
	{
		$id = Request::input('hotel_id');
		$arr = DB::table('lat_hotel')->where('hotel_id','=',$id)->first();
		$city = explode(',',$arr['city_id']);
		$arr['pro'] = $city[0];
		$arr['city'] = $city[1];
		$arr['county'] = $city[2];
		$type = DB::table('lat_hotel_type')->get();
		$arr['type'] = $type;
		// dd($arr);die;
		return view('admin.hotel_save')->with('arr',$arr);
	}

	//  后台酒店修改操作
	public function hotelUpdate()
	{
		$id = Request::input('hotel_id');
		$file = Input::file('myfile');
		//dd($file);die;
		$arr = Request::input();
		unset($arr['_token']);
		if(!empty($arr['pro'])){
			$arr['city_id'] = $arr['pro'].','.$arr['city'].','.$arr['county']; 	
		}
			unset($arr['pro']);
			unset($arr['city']);
			unset($arr['county']);
		//print_r($file);die;
		// 上传文件接值
		if(isset($file)){
			if($file -> isValid()){
			  //检验一下上传的文件是否有效.
			  $clientName = $file -> getClientOriginalName();

			  $tmpName = $file ->getFileName(); // 缓存在tmp文件夹中的文件名 例如 php8933.tmp 这种类型的.

			  $realPath = $file -> getRealPath();    //这个表示的是缓存在tmp文件夹下的文件的绝对路径

			  $extension = $file -> getClientOriginalExtension(); //上传文件的后缀.

			  $mimeTye = $file -> getMimeType();

			  $newName = md5(date('ymdhis').$clientName).".".$extension;

			  $path = $file -> move('storage\uploads\hotel',$newName);
			  //echo $path;die;
			  $arr['hotel_img'] = $path;		  
			}
		}
		// dd($arr);die;
		$res=DB::table('lat_hotel')->where('hotel_id',$id)->update($arr);
		if ($res) {
			return "<script>alert('修改成功');location.href='admin/hotel_list'</script>" ;
		}else{
			return "<script>alert('修改失败');location.href='hotelSave'</script>" ;
		}
>>>>>>> origin/lyt
	}
}
