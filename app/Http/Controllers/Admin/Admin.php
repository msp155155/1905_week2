<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Cache;

class Admin extends Controller
{
    public function  index()
    {
        return view('admin.index');
    }

    public function  addUser()
    {
        return view('admin.addUser');
    }

    public function addUserDo(Request $request)
    {
        $data = $request->input();
        $res = UserModel::create($data);
        if ($res){
            echo "成功";
        }
    }

    public function userList()
    {
        $data = UserModel::get();
        return view('admin.userList',['data'=>$data]);
    }

    public function editUser()
    {
        $id=Request()->id;
        UserModel::where('id',$id)->update([
            'number'=>0
        ]);
    }
}
