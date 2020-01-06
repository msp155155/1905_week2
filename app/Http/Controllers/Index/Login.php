<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Admin\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Cache;

class Login extends Controller
{
    public function  login()
    {
        return view('index.login');
    }

    public function  loginDo()
    {
        $data = Request()->input();
        $res=UserModel::where('name',$data['name'])->first();
        if ($res){

            Request()->session()->put('login',$res);return redirect('/Admin/index');
        }
//        dd(Request()->session()->get('login'));

    }
    public function updateInfo(Request $request)
    {
        $value = $request->session()->get('login');
        return json_encode($value);
    }

    public  function  edit()
    {
        $id=Request()->id;
        $name = Request()->name;
        $data = UserModel::where('id',$id)->first();
        if (time()<($data['time']+7200) && $data['number']<3){
            $res=UserModel::where('id',$id)->update([
                'name'=>$name,
                'time'=>time()
            ]);
            $res=UserModel::where('id',$id)->increment('number',1);
            if ($res){
                return json_encode(['msg'=>'成功']);
            }
        }else{
            return json_encode(['msg'=>'失败']);
        }


    }
}
