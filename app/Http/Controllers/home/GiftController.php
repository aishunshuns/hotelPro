<?php
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
class GiftController extends Controller{

	/*
	礼品商城
	 */
	public function Gift()
	{	
		$gift_id=$_GET['gift_id'];
		Session::put('gift_id',$gift_id);
		//print_r($gift_id);die;
		$sql="select * from lat_gift where gift_id='$gift_id'";
		$row=DB::select($sql);
		//查询用户的剩余积分
		$user_id=Session::get('user_id');
		$sql="select * from lat_users where user_id='$user_id'";
		$row1=DB::select($sql);
		//查询收藏礼品的用户数量				
		$num=DB::table('collection')->where('gift_id','=',$gift_id)->get();
		$count=count($num);
		 //print_r($count);die;
		return view('home/gift')->with('arr',$row)->with('arr1',$row1)->with('arr2',$count);
	}


	/*
	礼品收藏
	 */
	public function Collection()
	{
		$g_id=Session::get('gift_id');
		$u_id=Session::get('user_id');
		// print_r($u_id);die;
		if(empty($u_id)){
			return "<script>alert('您还没登陆,请先登录');location.href='Login'</script>";

		}else{
		//判断是否已收藏
		$sql="select h_id from lat_collection where gift_id='$g_id' && user_id='$u_id'";
		//echo $sql;die;
		$cc=DB::select($sql);
		//print_r($cc);die;
		

		if($cc){
			$h_id=$cc[0]['h_id'];
			$sql="delete from lat_collection where h_id='$h_id'";
			$cc=DB::delete($sql);
			return "<script>alert('取消收藏');location.href='Gift?gift_id=$g_id'</script>";die;
		}
		$aa=DB::table('gift')->where('gift_id','=',$g_id)->first();
		//print_r($aa);die;
		$gift_id=$aa['gift_id'];
		//print_r($gift_id);die;
		$add_time=date('Y-m-d H:i:s',time());
		$re=DB::table('collection')->insert(array(
			'gift_id'=>$gift_id,
			'add_time'=>$add_time,
			'user_id'=>$u_id
			));
		if($re){
			return "<script>alert('收藏成功');location.href='Gift?gift_id=$g_id'</script>";
		}

		}
	}



	/*
	礼品积分兑换
	 */
	public function Convert()
	{
		
		$u_id=Session::get('user_id');
		//print_r($u_id);die;
		if(empty($u_id)){
			return "<script>alert('您还没登陆,请先登录');location.href='Login'</script>";

		}else{
		$convert=Request::input('convert');
		//print_r($convert);die;

		//获取用户积分
		$sql="select * from lat_users where user_id='$u_id'";
		$data=DB::select($sql);
		//print_r($data);die;
		$user_intergral=$data[0]['user_intergral'];
		//获取兑换礼品所需的积分
		$sqll="select * from lat_gift where gift_id='$convert'";
		$data1=DB::select($sqll);
		//print_r($data1);die;
		$gift_integral=$data1[0]['gift_integral'];
			if($user_intergral>=$gift_integral){
			$sql="update lat_users set user_intergral=$user_intergral-$gift_integral where user_id='$u_id'";
			DB::update($sql);
			$sqll=DB::table('users_gift')->insert(array(
				'user_id'=>$u_id,
				'gift_id'=>$convert
				));
			return "<script>alert('兑换成功');location.href='GiftList'</script>";
		}else{
			return "<script>alert('您的积分不足');location.href='GiftList'</script>";
		}
	}
	
	}


	/*
	礼品详情页返回首页
	 */
	public function shou()
	{
		return view('home/index');
	}
	
}


