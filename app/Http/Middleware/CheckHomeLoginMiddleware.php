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
class CheckHomeLoginMiddleware implements Middleware
{

    public function handle($request, Closure $next)
    {
        if(Session::get('act') != 'home'){
            echo "<script>alert('请先登录！'); parent.location.href='".url('Login')."';</script>";
        } else {
            return $next($request);
        }
    }
}

?>