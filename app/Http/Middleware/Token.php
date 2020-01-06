<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserModel;

class Token
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->input("token");
        if (!$token){
            echo  json_encode(['code'=>201,'msg'=>'token不能为空']);die;
        }
        //校验token (根据token查询数据库)
        $userData = UserModel::where(['token'=>$token])->first();
        if (!$userData){
            echo json_encode(['code'=>202,'msg'=>'token错误']);die;
        }
        return $next($request);
    }
}
