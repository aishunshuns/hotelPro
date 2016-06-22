<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use DB,Redirect,Request,Validator,Input;

class GiftController extends Controller{

	/*
	加载礼品列表页面
	 */
	public function gift_list()
	{
		//查询礼品信息
		$res['arr']=DB::table('gift')->paginate(3);
		//print_r($res);
		$res['gift_name']='';
		$res['gift_start_time']='';
		$res['gift_end_time']='';
		return view('admin/gift_list',['arr'=>$res]);
	}
	/*
	加载礼品添加页面
	 */
	public function gift_add()
	{

		return view('admin/gift_add');
	}




	/*
	礼品添加
	 */
	public function gift_addpro()
	{	
		//接收表单的值
		$data=Request::all();
		//unset($data['gift_img']);
		$file = Input::file('gift_img');
		if($file -> isValid()){
		    //检验一下上传的文件是否有效.
		    $clientName = $file -> getClientOriginalName();

		    $tmpName = $file ->getFileName(); // 缓存在tmp文件夹中的文件名 例如 php8933.tmp 这种类型的.
		    $realPath = $file -> getRealPath(); 
		    // echo $realPath;die;
		    $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
		    //echo $entension;die;
		     // echo app_path();die;
		    $newName=time().rand(0,9999).'.'.$entension;
		    $mimeTye = $file -> getMimeType();
		    $path1 = $file -> move('gife',$newName);
		    //$path2 = substr($path1,4,1);
		    //echo $path2;die;
		    //$path=str_replace('\','/',$path1);
		    //echo $path;die;
		    $path = substr_replace($path1,'/',4,1);
		    	//echo $path;die;

		}


		$validator=Validator::make(
			$data,

				[
					'gift_name' => 'required',
					'gift_img' => 'required',
					'gift_integral' => 'required',
					'gift_start_time' => 'required|date',
					'gift_end_time' => 'required|date',
					'gift_stock' => 'required'
				]

			);
		 if ($validator->fails())
    	{
        
        $messages = $validator->messages();
        return $messages;

    	}else{
    	
    	$res=DB::table('gift')->insert(array(
			'gift_name'=>$data['gift_name'],
			'gift_img'=>$path,
			'gift_integral'=>$data['gift_integral'],
			'gift_start_time'=>$data['gift_start_time'],
			'gift_end_time'=>$data['gift_end_time'],
			'gift_stock'=>$data['gift_stock'],
			'gift_brand'=>$data['gift_brand'],
			'gift_model'=>$data['gift_model'],
			'gift_color'=>$data['gift_color']

			));
    	if($res){
    		echo "<script>alert('添加成功')</script>";
    		return Redirect('admin/gift_list');
    	}
		
    }
			
	
	}



	/*
	礼品删除
	 */
	public function del()
	{
		$gift_id=$_GET['gift_id'];
		//print_r($res);die;
		DB::table('gift')->where('gift_id',$gift_id)->delete();
		return Redirect('admin/gift_list');
	}




	/*
	礼品编辑查询
	 */
	public function up()
	{
		$gift_id=$_GET['gift_id'];
		$re=DB::table('gift')->where('gift_id',$gift_id)->first();
		return view('admin/gift_update',['arr'=>$re]);
	}




	 /*
	 礼品编辑
	  */
	 public function gift_up()
	 {
	 	$data=Request::all();
	 	DB::table('gift')->where('gift_id',$data['gift_id'])->update(array(
	 		'gift_name'=>$data['gift_name'],
			'gift_img'=>$data['gift_img'],
			'gift_integral'=>$data['gift_integral'],
			'gift_start_time'=>$data['gift_start_time'],
			'gift_end_time'=>$data['gift_end_time'],
			'gift_stock'=>$data['gift_stock']
	 		));
	 	return Redirect('admin/gift_list');
	 }



	 /*
	 礼品多条件搜索
	  */
	 public function giftSer()
	 {
	 	$gift_name=$_GET['gift_name'];
	 	//print_r($gift_name);die;
	 	$gift_start_time=$_GET['gift_start_time'];
	 	//转换为时间戳
	 	//$s_time=strtotime($gift_start_time);
	 	$gift_end_time=$_GET['gift_end_time'];
	 	//$e_time=strtotime($gift_end_time);
	 	//获取当前时间
	 	//$time=date('Y-m-d H:i:s',time());
		//$time=strtotime($time1);
	 	//print_r($time);die;
	 	
	 	if(empty($gift_name)&&empty($gift_start_time)&&empty($gift_end_time)){
	 		return Redirect('admin/gift_list');
	 	}
	 	elseif(empty($gift_name)&&!empty($gift_start_time)&&empty($gift_end_time)){
	 		return Redirect('admin/gift_list');
	 	}
	 	elseif(empty($gift_name)&&empty($gift_start_time)&&!empty($gift_end_time)){
	 		return Redirect('admin/gift_list');
	 	}


	 	elseif(!empty($gift_name)&&empty($gift_start_time)&&empty($gift_end_time)){
	 		$res['arr']=DB::table('gift')->where('gift_name', 'like',"%$gift_name%")->paginate(2);
	 	}
	 	elseif(empty($gift_name)&&!empty($gift_start_time)&&!empty($gift_end_time)){
	 		$res['arr']=DB::table('gift')->where('gift_start_time','<=',$gift_start_time)->where('gift_end_time','>=',$gift_start_time)->paginate(2);

	 	}
	 	
	 	elseif(!empty($gift_name)&&!empty($gift_start_time)&&!empty($gift_end_time)){
	 	$res['arr']=DB::table('gift')->where('gift_name','like',"%$gift_name%")->where('gift_start_time','<=',$gift_start_time)->where('gift_end_time','>=',$gift_start_time)->paginate(2);
	 	}
	 	$res['gift_name']=$gift_name;
	 	$res['gift_start_time']=$gift_start_time;
	 	$res['gift_end_time']=$gift_end_time;
	 	return view('admin/gift_list',['arr'=>$res]);

	 }



	 /*
	 礼品即点即改
	  */
	
	 function gift_dian()
	 {
	 	$gift_id=$_GET['gift_id'];
	 	//echo $gift_id;die;
	 	$gift_integral=$_GET['gift_integral'];

	 	$sql="update lat_gift set gift_integral='$gift_integral' where gift_id='$gift_id'";
	 	DB::update($sql);
	 }


}
