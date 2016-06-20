<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Request, DB;

class PowerController extends Controller{

	//权限列表
	public function power_list(){

		//权限分配角色
		if (Request::input('act') == 'power_role') {
			$privilege_id = Request::input('id');
			// dd($privilege_id);
			$pid = (DB::table('privilege')->where('privilege_id', $privilege_id)->pluck('privilege_pid'));
			if ($pid == '0') {
				echo 0;die;
			} else {
				$arr = DB::table('role') -> get();
				$arr_user_id = DB::table('role_privilege') -> where('privilege_id',$privilege_id) -> select('role_id') -> get();
				foreach ($arr as $key => $v) {
					$arr[$key]['checked'] = "";
					foreach ($arr_user_id as $user_v) {
						if ($v['role_id'] == $user_v['role_id']) {
							$arr[$key]['checked'] = 'true';
						}
					}
				}
				$arr['id'] = $privilege_id;
				// dd($arr);
				return json_encode($arr);
			}
		}

		//权限分配角色 添加关联表
		elseif (Request::input('act')  == 'role_privilege_add') {
			$arr_role_id = Request::input('role_id');
			$privilege_id = Request::input('id');
			DB::table('role_privilege')->where('privilege_id',$privilege_id)->delete();
			foreach ($arr_role_id as $key => $v) {
				DB::table('role_privilege')->insert(['role_id' => $v, 'privilege_id' => $privilege_id]);
			}

			return 'true';
		}

		//判断该权限下是否有角色  没有删除  有返回false
		elseif (Request::input('act') == 'privilege_del') {
			$id = Request::input('id');
			$num = DB::table('role_privilege')->where('privilege_id',$id)->count();
			if ($num == '0') {
				$pid = DB::table('privilege')->where('privilege_id',$id)->pluck('privilege_pid');
				// dd($pid);
				if ($pid == '0') {
					$num = DB::table('privilege')->where('privilege_pid',$id)->count();
					// dd($num);
					if ($num == '0') {
						DB::table('privilege')->where('privilege_id',$id)->delete();

						return 'true';
					} else {

						return '1';
					}
				} else {
					DB::table('privilege')->where('privilege_id',$id)->delete();

					return 'true';
				}
			} else {

				return 'false';
			}
		}

		//删除权限且删除该之关联的角色关联表
		elseif (Request::input('act') == 'privilege_del_ok') {
			$id = Request::input('id');
			$a1 = DB::table('privilege')->where('privilege_id',$id)->delete();
			$a2 = DB::table('role_privilege')->where('privilege_id',$id)->delete();
		}

		//展示权限列表
		else {
			$data=DB::table("privilege")->get();
			$data=$this->noLimitCate($data,$parent_id=0,$level=0);
			return view('admin/power_list',['arr' => $data]);
		}
	}

	//权限管理
	public function power_add(){
		// echo 1;die;

		//权限添加
		if (Request::input('act') == 'power_add') {
			$arr = Request::only('privilege_route','privilege_pid','privilege_name');
			$bool = (DB::table('privilege')->insert($arr));
			$data = DB::table('privilege')->get();
			return redirect('admin/power_list');
		} 

		//验证唯一
		elseif (Request::input('act') == 'formCheck') {
			$name = Request::input('name');
			$num = DB::table('privilege')->where('privilege_name', $name)->count();
			return $num;
		}

		else {
			$data=DB::table("privilege")->select('privilege_id','privilege_pid','privilege_name')->get();
		  	$data=$this->noLimitCate($data,$parent_id=0,$level=0);
			return view('admin/power_add',['arr' => $data]);
		}
	}

	public function noLimitCate($data,$privilege_id=0,$level=0){
        //对数组进行遍历
        //定义一个静态数组 $lists
        static $lists=array();
        // dd($data);
        foreach ($data as $key => $v) {
        	// dd($v);
             if($v['privilege_pid']==$privilege_id){
             	 $v['level']=$level;
             	 $lists[]=$v;
             	 // dd($lists);
             	 //子类拥有和父类相同的方法
				 $this->noLimitCate($data,$v["privilege_id"],$level+1);
             }
         } 
        return $lists;
     }

	//角色添加
	public function role_add()
	{
		//角色添加
		if (Request::input('act') == 'add') {
			$name = Request::input('role_name');
			$bool = DB::table('role')->insert(['role_name' => $name]);
			if ($bool) {
				return redirect('admin/role_list');
			}
		} elseif (Request::input('act') == 'formCheck') {
			$role_name = Request::input('role_name');
			$num = DB::table('role')->where('role_name',$role_name)->count();
			return $num;
		} else {
			return view('admin/role_add');
		}
	}

	//角色列表
	public function role_list(){
		//用户添加角色展示
		if (Request::input('act') == 'role_user_select'){
			$id = Request::input('id');
			$arr = DB::table('users') -> get();
			$arr_user_id = DB::table('role_user') -> where('role_id',$id) -> select('user_id') -> get();
			foreach ($arr as $key => $v) {
				$arr[$key]['checked'] = "";
				foreach ($arr_user_id as $user_v) {
					if ($v['user_id'] == $user_v['user_id']) {
						$arr[$key]['checked'] = 'true';
					}
				}
			}
			$arr['id'] = $id;

			return json_encode($arr);
		} 

		//角色下的增删
		elseif (Request::input('act') == 'role_user_add') {
			$arr_id = Request::input('user_id');
			$role_id = Request::input('id');
			$bool = DB::table('role_user')->where('role_id',$role_id)->delete();
			foreach ($arr_id as $key => $v) {
				$bool = DB::table('role_user')->insert(['role_id' => $role_id, 'user_id' => $v]);
			}
			return "true";
		} 

		//删除角色，验证该角色是否有用户
		elseif (Request::input('act') == 'role_del') {
			$id = Request::input('id');
			$num = DB::table('role_user')->where('role_id',$id)->count();
			if ($num == 0) {
				DB::table('role')->where('role_id',$id)->delete();
				return 'true';
			} else {
				return 'false';
			}
		}

		//删除角色及角色与用户关联表
		elseif (Request::input('act') == 'role_del_ok') {
			$id = Request::input('id');
			DB::table('role')->where('role_id',$id)->delete();
			$num = DB::table('role_user')->where('role_id',$id)->delete();
			return $num;
		}

		//验证唯一性
		elseif (Request::input('act') == 'checkSave') {
			$name = Request::input('name');
			$id = Request::input('id');
			$num = DB::table('role')->where('role_name', $name)->count();
			if ($num == '0') {
				DB::table('role')->where('role_id', $id)->update(['role_name' => $name]);
				return 'true';
			} else {
				return 'false';
			}
		}

		//展示角色
		else {
			$arr = DB::table('role')->get();
			return view('admin/role_list',['arr' => $arr]);
		}
	}

	
}