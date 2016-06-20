<?php
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
class RegisterController extends Controller{

	//注册页面
	public function Register()
	{
		return view('home.Register');
	}

	//判断用户名在数据库中是否存在
	public function Register_shu()
	{
		$username = isset($_GET['username'])?$_GET['username']:'';
		$email = isset($_GET['email'])?$_GET['email']:'';
		$idcard = isset($_GET['id_card'])?$_GET['id_card']:'';
		$arr = DB::select("select * from lat_users where user_name='$username' || user_phone='$email' || user_idcard='$idcard'");
		if($arr)
		{
			echo 1;
		}else
		{
			echo 0;
		}
	}

	//添加用户信息
	public function Register_add()
	{
		$mobile_phone = $_POST['mobile_phone'];
		$id_card = $_POST['id_card'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$arr = DB::table('lat_users')->insert(
            array('user_name'=>$username,'user_pwd'=>$password,'user_phone' => $mobile_phone,'user_idcard'=>$id_card)
        );
        return redirect('Login');
	}
	
	//登陆页面
	public function Login()
	{
		return view('home.login');
	}

	//验证登陆
	public function Login_yz()
	{
		$txtusername = $_POST['txtUserName'];
		$txtpassword = $_POST['txtPassword'];
		$act = $_POST['act'];
		$arr = DB::select("select * from lat_users where user_phone='$txtusername' || user_name='$txtusername' || user_idcard='$txtusername'");
		if($arr){
			foreach($arr as $Key=>$v){
				if($txtpassword== $v['user_pwd']){
					session(['user_id'=>$v['user_id']]);
					session(['user_name'=>$v['user_name']]);
					session(['act'=>$act]);
					echo "<script> alert('登陆成功');parent.location.href='/'; </script>"; 
				}else{
					echo "<script> alert('登陆失败');parent.location.href='/Login'; </script>";
				}
			}
		}else{
			echo "<script> alert('登陆失败');parent.location.href='/Login'; </script>";
		}
	
	}
}