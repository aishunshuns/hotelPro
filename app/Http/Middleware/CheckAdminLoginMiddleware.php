<?php
namespace App\Http\Middleware;

use Closure;
use Cookie;
use Redirect;
use View;
use Session;
use DB;
use Illuminate\Contracts\Routing\Middleware;

/**
 * 检查用户登陆中间件
 * @author Robin
 *
 */
class CheckAdminLoginMiddleware implements Middleware
{

    public function handle($request, Closure $next)
    {
        echo Session::get('act');
        if(Session::get('act') != 'admin'){
            echo "<script>alert('请先登录！'); parent.location.href='".url('admin')."';</script>";
        } else {
            $id = Session::get('user_id');
            $arr = DB::table('users as u')
                ->join('role_user as r_u', 'u.user_id', '=', 'r_u.user_id')
                ->join('role_privilege as r_p', 'r_u.role_id', '=', 'r_p.role_id')
                ->join('privilege as p', 'r_p.privilege_id', '=', 'p.privilege_id')
                ->where('u.user_id',$id)
                ->select('privilege_route','privilege_name','p.privilege_id','privilege_pid')
                ->get();
                // dd($arr);
            foreach ($arr as $key => $v) {
                $privilege_pid[] = $v['privilege_pid'];
            }
            $arrs = array_unique(array_unique($privilege_pid));
             $count = count($arrs);
             for($i=0;$i<=$count;$i++){
                $arrs = array_values($arrs);
                if(!empty($arrs)){
                    $str = $arrs['0'];
                    foreach($arrs as $key => $v){
                        if($str > $v){
                            $str = $v;
                        }
                    }
                    foreach($arrs as $key => $v){
                        if($str == $v){
                            unset($arrs[$key]);
                        }
                    }
                    $arr_pid[$i] = $str;
                }
             }
            $data = array();
            foreach ($arr_pid as $keyPid =>$valPid ) {
                $data[$keyPid]['parent'] = DB::table('privilege')->where('privilege_id',$valPid)->pluck('privilege_name');
                //dd($data);
                foreach ($arr as $key => $val) {
                    if ( $val['privilege_pid'] == $valPid) {
                        $data[$keyPid]['son'][] = $val;
                    }
                }
            }

            //dd($data);
            view()->share('dataLeft', $data);
            return $next($request);
        }
    }
}

?>