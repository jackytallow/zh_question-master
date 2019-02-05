<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/19
 * Time: 19:05
 */

namespace app\common\controller;


use think\Controller;
use think\facade\Session;

/**
 * 用户控制器应继承自这个基础公共控制器
 * 该控制器继承自Controller.php
 * 用户可以将一些公共操作放在这个公共控制器
 * Class Base
 * @package app\common\controller
 */
class Base extends Controller
{


    /**
     *初始化方法
     * 1.在所有方法之前调用
     * 2.常用来创建常量，公共方法等
     */
    protected function initialize()
    {

        //检测站点是否已关闭
        $this->is_open();
    }

    //检查是否已登录：防止重复登录：放在登录验证方法中调用
    protected function logined()
    {
        if (Session::has('user_id')){
            $this->error('客官，你已经登录啦~~','index/index');
        }
    }

    //检测是否未登录:放在需要登录操作的方法的最前面，例如发布文章
    protected function isLogin()
    {
        if (!Session::has('user_id')){
            $this->error('客官，您是不是忘记登录啦~~','user/login');
        }
    }


    //检测站点是否已关闭：在公共控制器初始化方法中调用
    public function is_open()
    {
        //1.获取但当前站点的状态

    }
}