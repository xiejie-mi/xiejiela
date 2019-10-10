<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Foot;

class Foot1 extends Controller
{
    public function show(Request $request)
    {
        $name = $request['name'];
        $pwd = $request['pwd'];
        $emali = $request['emali'];
        $pwdd=$request['pwdd'];

        $model = new Foot();

        $ss = $model->where('emali',$emali)->get();

        if($pwd!=$pwdd){
            return ['code'=>'1','msg'=>'密码必须与确认密码保持一致','data'=>null];
        }

        $this->validate($request, [
            'emali' => 'required|unique:foot|max:20',
            'emali' => 'required|max:6'
           
        ]);

        

        return ['code'=>'1','msg'=>'添加成功','data'=>null];
    

    }

    public function showadd(){
        $model = new Foot();

        $data = $model->paginate(2);

      

        return view('foot', ['data' =>$data]);
    }
}
