<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2019/2/5
 * Time: 10:05
 */

namespace app\admin\common\controller;


//后台公共控制器
use think\Controller;
use think\facade\Session;

class Base extends Controller
{

    //初始化
    protected function initialize()
    {

    }


    /**
     * 检测用启是否登录
     * 调用位置:
     * 1.后台首页的admin/index/index()
     */
    protected function isLogin()
    {
        if (!Session::has('user_id')){
            $this->error('请先登录','admin/user/login');
        }
    }
}