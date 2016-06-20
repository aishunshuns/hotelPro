<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use DB;
class UserController extends Controller{

	//用户列表
	public function user_list(){
		
		$page = isset($_GET['page'])?$_GET['page']:1;
		$length = 5 ;
		$limit = ($page-1)*$length;
		$arr = DB::select("select * from lat_users");
		$count = count($arr);
		$count_wei = ceil($count/$length);
		$up = $page-1<1?$page:$page-1;
		$down = $page+1>$count_wei?$count_wei:$page+1;
		$ye = "<a href='javascript:void(0)' onclick='fun(1)'>首页</a>
			   <a href='javascript:void(0)' onclick='fun($up)'>上一页</a>
			   <a href='javascript:void(0)' onclick='fun($down)'>下一页</a>
			   <a href='javascript:void(0)' onclick='fun($count_wei)'>尾页</a>
		";
		$users = DB::select("select * from lat_users limit $limit,$length");
		return view('admin/user_list',['users'=>$users,'ye'=>$ye]);
	}
	

	//删除用户
	public function user_del()
	{
		$id = $_GET['id'];
		$users = DB::table('users')->where('user_id', '=', $id)->delete();
		return redirect('admin/user_list');

	}

	//用户添加
	public function user_add(){
		return view('admin/user_add');
	}

	public function user_addpro()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$idcard = $_POST['idcard'];
		$arr = DB::table('users')->insert(
            array('user_name'=>$username,'user_pwd'=>$password,'user_phone' => $email,'user_idcard'=>$idcard)
        );
        return redirect('admin/user_list');
	}
	public function user_upd()
	{
		$id = $_GET['id'];
		$arr = DB::select("select * from lat_users where user_id='$id'");
		$name = $arr[0]['user_name'];
		$email = $arr[0]['user_phone'];
		$idcard = $arr[0]['user_idcard'];
		echo 
				"<table>
                    <tr>
                      <th>UserName</th>
                      <td><input type='text' id='username' value='$name'></td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td><input type='text' id='email' value='$email'></td>
                    </tr>
                    <tr>
                      <th>Idcard</th>
                      <td><input type='text' id='idcard' value='$idcard'></td>
                    </tr>
                    <tr>
                      <td><input type='reset' value='重置'></td>
                      <input type='hidden' value='$id'>
                      <td><input type='button' onclick='fun_upd();'  value='修改'></td>
                    </tr>
                  </table>";
	}
	public function user_update()
	{
		$id = $_GET['id'];
		$uname = $_GET['uname'];
		$email = $_GET['email'];
		$idcard = $_GET['idcard'];
		DB::table('users')
            ->where('user_id', $id)
            ->update(['user_name' => $uname,'user_phone'=>$email,'user_idcard'=>$idcard]);
        return redirect('admin/user_list');
	}

	public function user_search(){
		$val = $_GET['val'];
		$arr = DB::select("select * from lat_users where user_name like '%$val%'");
		$str['val'] = $val;
		print_r($arr);
		
	}
}
