<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
use Mail;
class LoginController extends Controller{

	//后台登陆页面
	public function adminLogin()
	{
		return view('admin.login');
	}

	//验证登陆
	public function login_yz()
	{
		$txtusername = $_POST['username'];
		$txtpassword = $_POST['password'];
		$arr = DB::select("select * from lat_users where user_phone='$txtusername' || user_name='$txtusername' || user_idcard='$txtusername'");
		if($arr){
			foreach($arr as $Key=>$v){
				if($txtpassword == $v['user_pwd']){
					Session::put('user_id', $v['user_id']);
					Session::put('user_name', $v['user_name']);
					Session::put('admin_act', $act);
					Session::save();
					echo "<script> alert('登陆成功');parent.location.href='".url('admin/index')."'; </script>"; 
				}else{
					echo "<script> alert('登陆失败');parent.location.href='".url('admin')."'; </script>";
				}
			}
		}else{
			echo "<script> alert('登陆失败');parent.location.href='".url('admin')."'; </script>";
		}
	}

	//判断要找回的账号是否存在该邮件  存在找回密码
	public function email()
	{
		$email = '229002790@qq.com';
		$name = 'chenhaifeng';
		$uid = '1';
		$code = 'haha';
		$data = ['email'=>$email, 'name'=>$name, 'uid'=>$uid, 'activationcode'=>$code];
		Mail::send('/admin/Email', $data, function($message) use($data)
		{
		    $message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！');
		});
	}

	//后台展示页面
	public function adminIndex()
	{
		return view('admin.index');
	}

}