<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class UpdateController extends Controller
{
    public function checkUpdate (Request $request)
    {
        //参数验证
        $messages = [
            'required'    =>   ':attribute 项是必要的'
        ];
        $this->validate($request,[
            'DevId'       =>        'required',
            'DevMAC'      =>        'required',
            'DevIP'       =>        'required',
        ],$messages);

        //查询文件
        $up_dir = 'update/up/';
        $conf_dir = 'update/conf/';
        $up_file = $this->findFile($up_dir);
        $conf_file = $this->findFile($conf_dir);

        //判断文件是否存在
        if($up_file == [] && $conf_file == []){
            return response()->json([
                'code' => '1',
                'data'  => [
                    'error' => '没有升级文件或配置文件'
                ],
            ]);
        }elseif($up_file == []){
            $config_dir = 'update/conf/' . $conf_file[0];
            $config_v = basename($config_dir , '.bin');
            //判断配置文件版本
            if($request->ConfigVer < $config_v){
                return response()->json([
                    'code' => '0',
                    'data'  => [
                        'ConfigureAdd' => $config_dir ,
                        'ConfigureMD5' => MD5($config_dir),
                    ],
                ]);
            }else{
                return response()->json([
                    'code' => '2',
                    'data'  => [
                        'error' => '配置文件版本号过低'
                    ],
                ]);
            }
        }elseif($conf_file == []){
            $update_dir = 'update/up/' . $up_file[0];
            $update_v = basename($update_dir , '.bin');
            //判断升级文件版本
            if($request->FirmwareVer < $update_v){
                return response()->json([
                    'code' => '0',
                    'data'  => [
                        'FirmwareAdd'  => $update_dir ,
                        'FirmwareMD5'  => MD5($update_dir),
                    ],
                ]);
            }else {
                return response()->json([
                    'code' => '3',
                    'data' => [
                        'error' => '升级文件版本过低'
                    ],
                ]);
            }
        }else{
            $update_dir = 'update/up/' . $up_file[0];
            $config_dir = 'update/conf/' . $conf_file[0];
            $update_v = basename($update_dir , '.bin');
            $config_v = basename($config_dir , '.bin');
            //判断升级文件和配置文件版本
            if($request->ConfigVer < $config_v && $request->FirmwareVer < $update_v){
                return response()->json([
                    'code' => '0',
                    'data'  => [
                        'FirmwareAdd'  => $update_dir ,
                        'FirmwareMD5'  => MD5($update_dir),
                        'ConfigureAdd' => $config_dir ,
                        'ConfigureMD5' => MD5($config_dir),
                    ],
                ]);
            }else{
                return response()->json([
                    'code' => '4',
                    'data' => [
                        'error' => '升级文件或配置文件版本过低'
                    ],
                ]);
            }
        }
    }

    public function findFile ($dir)
    {
        //1、先打开要操作的目录，并用一个变量指向它
        $handler = opendir($dir);
        //定义用于存储文件名的数组
        $array_file = array();
        //2、循环的读取目录下的所有文件
        while( ($filename = readdir($handler)) !== false ) {
            //3、目录下都会有两个文件，名字为’.'和‘..’，不要对他们进行操作
            if($filename != "." && $filename != ".."){
                //4、进行处理
                //这里简单的用echo来输出文件名
                $array_file[] = $filename;
            }
        }
        //5、关闭目录
        closedir($handler);
        return $array_file;
    }
}