<?php

namespace App\Http\Controllers;

use App\Login;
use App\Trace;
use Illuminate\Http\Request;
use Illuminate\Routing\Matching\ValidatorInterface;


class DeviceController extends Controller
{
    public function login (Request $request)
    {
        //参数验证
        $messages = [
            'required'    => ':attribute 项是必要的。',
        ];
        $this->validate($request, [
            'deviceName'        => 'required',
            'deviceMac'         => 'required',
            'deviceSn'          => 'required',
            'deviceType'        => 'required',
        ],$messages);
        //获取所有参数
        $data = $request->all();
        //实例化Login表
        $model = new Login;
        foreach($data as $key=>$value){
            $model->$key = $value;
        }
        //存入数据库
        $result = $model->save();
        //返回数据
        if($result){
            return response()->json([
                'data' => ['heartInterval' => 20],
                'state' => 'success',
                'msg' => 'success'
            ]);
        }else{
            return response()->json([
                'data' => ['heartInterval' => 20],
                'state' => 'error',
                'msg' => '连接错误'
            ]);
        }
    }

    public function trace (Request $request)
    {
        //参数验证
        $messages = [
            'required'    => ':attribute 项是必要的。',
        ];

        $this->validate($request, [
            'deviceName'        => 'required',
            'deviceMac'         => 'required',
            'deviceSn'          => 'required',
            'deviceType'        => 'required',
        ],$messages);
        //获取所有参数
        $data = $request->all();
        //实例化Trace表
        $model = new Trace;
        foreach($data as $key=>$value){
            $model->$key = $value;
        }
        //存入数据库
        $result = $model->save();
        //返回数据
        if($result){
            return response()->json([
                'state' => 'success',
                'msg' => 'success'
            ]);
        }else{
            return response()->json([
                'state' => 'error',
                'msg' => '连接错误'
            ]);
        }
    }
}