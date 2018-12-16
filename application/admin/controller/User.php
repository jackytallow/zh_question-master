<?php
namespace app\admin\controller;
use think\facade\Config;

class User{


    public function get(){

        //获取全部配置
   //     dump(Config::get());


        //仅获取app下的一级配置项
     //   dump(Config::get('app.'));


        //获取某个app下的二级配置项
        dump(Config::get('app.app_debug'));

        //查看当前的语言
        dump(Config::get('default_lang'));


       dump(Config::has('default_lang'));

    }


    public function set()
    {
//        Config::set('database.hostname','localhost');
//        dump(Config::set('database.hostname'));
    }


}