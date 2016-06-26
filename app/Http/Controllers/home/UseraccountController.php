<?php
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
class UseraccountController extends Controller{

	//我的格子
	public function userAccount()
	{
		//取得登录人
    	$user_id = Session::get('user_id'); 
    	$user_name = Session::get('user_name');
    	   	
    	$res = DB::table('users')->where('user_id',$user_id)->get();

		return view('home.user_account')->with('arr',$res);
	}

	//我的信息
	public function myList()
	{
		//取得登录人
    	$user_id = Session::get('user_id'); 
    	$user_name = Session::get('user_name');
    	 
    	
    	$res = DB::table('users')->where('user_id',$user_id)->get();
		return view('home.my_list')->with('arr',$res);
	}

	//礼品兑换
	public function myGift()
	{
		return view('home.my_gift');
	}
     
    //收藏
	public function collect(){
				//取得登录人
    	$user_id = Session::get('user_id'); 
    	$user_name = Session::get('user_name');
    	    	
    	$res = DB::table('collection')->where('user_id',$user_id)->get();
        
        //取出礼品收藏
        $arr=array();
        $arr1=array();
    	for ($i=0; $i < count($res); $i++) { 
    		$arr[$i]=$res[$i]['gift_id'];
    		$arr1[$i]=$res[$i]['hotel_id'];
    	}
    	$data['gift'] = DB::table('gift')
                    ->whereIn('gift_id', $arr)->get();

        //取出酒店收藏      
		$data['hotel'] = DB::table('hotel')
		    ->whereIn('hotel_id', $arr1)->get();

        


		return view('home.collect')->with('arr',$data);
	}
    
    //头像上传
    public function file(){

        $user_id=$_POST['user_id'];
        $files=Request::file('photo');
        
        $img_name=$files->getClientOriginalName();

   

        //后缀
        $type=substr(strrchr($img_name, '.'), 1);

        //重命名
        $myfile=uniqid().'.'.$type;
        

        //移动图片
        Request::file('photo')->move('./home/', $myfile);
        $res=DB::table('users')
            ->where('user_id', $user_id)
            ->update(['user_file' => $myfile]);

        if($res){
           return redirect('userAccount');
        }
        else{
           return redirect('userAccount');
        }

    }
}