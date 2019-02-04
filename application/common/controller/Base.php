<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/19
 * Time: 19:05
 */

namespace app\common\controller;


use think\Controller;
use think\Session;

class Base extends Controller
{


    /**
     *检测用户是否登录
     * 调用位置：
     * 1.后台首页的admin/index/index()
     */
    protected function initialize()
    {
        if (!Session::has('user_id')){
            $this->error('请先登录','admin/user/login');
        }

    }
}