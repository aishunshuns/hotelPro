<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use DB,Session,Redirect,Input,Request;

class HouseController extends Controller{

	//户型列表
	public function house_list(){
		$house_id=isset($_GET['house_id'])?$_GET['house_id']:'';
		$hotel_id=isset($_GET['hotel_id'])?$_GET['hotel_id']:'';
		$array = DB::table('house')->get();
		$data = DB::table('hotel')->lists('hotel_name');
		//dd($data);die;
		$data1 = DB::table('hotel')->lists('hotel_id');
		$res = array();
		foreach($data as $k => $v){
			$res[$k]['hotel_id'] = $data1[$k];
			$res[$k]['hotel_name'] = $data[$k];
		}
		if(!empty($house_id)&&!empty($hotel_id)){
			$arr = DB::table('hotel_house')
					->join('hotel','hotel_house.hotel_id','=','hotel.hotel_id')
					->join('house','hotel_house.house_id','=','house.house_id')
					->where('hotel_house.house_id',$house_id)
					->where('hotel_house.hotel_id',$hotel_id)
					->paginate(5);
		} else if (!empty($house_id)&&empty($hotel_id)){
			$arr = DB::table('hotel_house')
					->join('hotel','hotel_house.hotel_id','=','hotel.hotel_id')
					->join('house','hotel_house.house_id','=','house.house_id')
					->where('hotel_house.house_id',$house_id)
					->paginate(5);
		} else if (empty($house_id)&&!empty($hotel_id)){
			$arr = DB::table('hotel_house')
					->join('hotel','hotel_house.hotel_id','=','hotel.hotel_id')
					->join('house','hotel_house.house_id','=','house.house_id')
					->where('hotel_house.hotel_id',$hotel_id)
					->paginate(5);
		} else {
			$arr = DB::table('hotel_house')
					->join('hotel','hotel_house.hotel_id','=','hotel.hotel_id')
					->join('house','hotel_house.house_id','=','house.house_id')
					->paginate(5);
		}
		if($arr){
			return view('admin/house_list')->with('arr',$arr)
										   ->with('res',$res)
										   ->with('array',$array)
										   ->with('house_id',$house_id)
										   ->with('hotel_id',$hotel_id);
		} else {
			return "<div class='alert alert-warning'>
					   <a href='#'' class='close' data-dismiss='alert'>
					      &times;
					   </a>
					   <strong>警告！</strong>您搜索的条件不存在。
					</div>" ;
		}
		
	}
	//户型添加
	public function house_add(){
		$arr = DB::table('house')->get();
		$data = DB::table('hotel')->lists('hotel_name');
		//dd($data);die;
		$data1 = DB::table('hotel')->lists('hotel_id');
		$res = array();
		foreach($data as $k => $v){
			$res[$k]['hotel_id'] = $data1[$k];
			$res[$k]['hotel_name'] = $data[$k];
		}	
		//dd($res);die;
		return view('admin/house_add')->with('arr',$arr)->with('data',$res);
	}

	// 户型添加操作
	public function houseAdd()
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
		unset($arr['_token']);
		$arr['house_img'] = $path;
		//echo $arr['hotel_img'];die;
		//print_r($arr);die;
		$res=DB::table('hotel_house')->insert($arr);
		if ($res) {
			return "<script>alert('添加成功');location.href='admin/house_list'</script>" ;
		}else{
			return "<script>alert('添加失败');location.href='house_add'</script>" ;
		}
	}

	// 酒店户型列表删除操作
	public function houseDel()
	{
		$id = Request::input('h_id');
		//dd($id);die;
		$res = DB::table('hotel_house')->where('h_id','=',$id)->delete();
		if ($res) {
			return "<script>alert('删除成功');location.href='admin/house_list'</script>" ;
		}else{
			return "<script>alert('删除失败');location.href='admin/house_list'</script>" ;
		}
	}

	// 后台酒店户型修改页面
	public function houseSave()
	{
		$id = Request::input('h_id');
		$arr = DB::table('hotel_house')
					->join('hotel','hotel_house.hotel_id','=','hotel.hotel_id')
					->join('house','hotel_house.house_id','=','house.house_id')
					->where('h_id',$id)
					->first();
		$array = DB::table('house')->get();
		$data = DB::table('hotel')->lists('hotel_name');
		//dd($data);die;
		$data1 = DB::table('hotel')->lists('hotel_id');
		$res = array();
		foreach($data as $k => $v){
			$res[$k]['hotel_id'] = $data1[$k];
			$res[$k]['hotel_name'] = $data[$k];
		}
		$info['arr'] = $arr; 
		$info['house'] = $array; 
		$info['hotel'] = $res; 
		//dd($info);
		return view('admin/house_save')->with('arr',$info);
	}

	//  后台酒店户型修改操作
	public function houseUpdate()
	{
		$id = Request::input('h_id');
		$file = Input::file('myfile');
		//dd($id);
		$arr = Request::input();
		unset($arr['_token']);
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
			  $arr['house_img'] = $path;		  
			}
		}
		// dd($arr);
		$res=DB::table('hotel_house')->where('h_id',$id)->update($arr);
		if ($res) {
			return "<script>alert('修改成功');location.href='admin/house_list'</script>" ;
		}else{
			return "<script>alert('修改失败');location.href='houseSave'</script>" ;
		}
	}
}