<?php
header('Access-Control-Allow-Origin:*');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//设备登录接口
Route::post('/devicelogin' , 'DeviceController@login');
//设备握手接口
Route::post('/devicetrace' , 'DeviceController@trace');
//设备上传探测记录接口
Route::post('/dataupload' , 'DataController@upload');
//设备上传上网行为ID接口
Route::post('/usridsupload' , 'UsrController@idsupload');
//设备上传上网行为记录接口
Route::post('/usrurlupload' , 'UsrController@urlupload');
//设备上传周边AP记录接口
Route::post('/apsupload' , 'ApsController@apsupload');
//设备上传SSID记录接口
Route::post('/apsupload' , 'ApsController@ssidupload');


//设备远程配置下发及升级接口
Route::post('/checkupdate' , 'UpdateController@checkUpdate');
