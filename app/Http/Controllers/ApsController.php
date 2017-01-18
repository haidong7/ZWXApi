<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApsController extends Controller
{
    public function upload (Request $request)
    {
        //获取上传文件数据
        $file = $request->file();
        if(!$file){
            return response()->json([
                'state' => 'error',
                'msg' => '文件上传失败'
            ]);
        }else{
            //设置目录
            $dirName = 'upload/apsupload/' . date('Ymd');
            if (!is_dir($dirName))	{
                mkdir($dirName,0777,true);
                chmod($dirName,0777);
            }
            //取得上传文件名、后缀名、真实路径
            foreach($file as $k=>$v){
                $fileName = $file[$k] -> getClientOriginalName();
                $entension = $file[$k] -> getClientOriginalExtension();
                $realPath = $file[$k] -> getRealPath();
                //判断文件后缀名
                if($entension == 'gz'){
                    //解压gz包
                    $open_gz = gzopen($realPath, 'r');
                    $read_result = gzread($open_gz,100000);
                    $fileName = date('his',time()) . $fileName;
                    $fileName = substr($dirName . '/' . $fileName , 0,-3);
                    $myfile = fopen($fileName,"w");
                    fwrite($myfile, $read_result);
                    fclose($myfile);
                    gzclose($open_gz);
                }else{
                    $fileName = date('his',time()) . $fileName;
                    $file[$k]->move($dirName,$fileName);
                }
//                $file[$k]->move($dirName,$fileName);
//                $path = public_path();
//                $dir_new = str_replace('\\' , '/',$path) . '/' .  $dirName .  '/' . $fileName;
            }
            return response()->json([
                'state' => 'success',
                'msg' => 'success'
            ]);
        }
    }

    public function ssidupload (Request $request)
    {
        //获取上传文件数据
        $file = $request->file();
        //判断文件是否存在
        if(!$file){
            return response()->json([
                'state' => 'error',
                'msg' => '文件上传失败'
            ]);
        }else{
            //设置目录
            $dirName = 'upload/ssidupload/' . date('Ymd');
            if (!is_dir($dirName))	{
                mkdir($dirName,0777,true);
                chmod($dirName,0777);
            }
            //取得上传文件名
            foreach($file as $k=>$v){
                $fileName = $file[$k] -> getClientOriginalName();
                $fileName = date('his',time()) . $fileName;
                //移动文件到指定文件夹
                $file[$k]->move($dirName,$fileName);
                //获取文件绝对路径
                $path = app_path();
                $dir_new = str_replace('\\' , '/',$path) . $dirName .  '/' . $fileName;
            }
            return response()->json([
                'state' => 'success',
                'msg' => 'success'
            ]);
        }
    }
}