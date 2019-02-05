<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2019/2/5
 * Time: 13:15
 */

namespace app\admin\controller;


use app\admin\common\controller\Base;
use think\Request;

class User extends Base
{

    private $password = ''; //临时存放用户密码


    //渲染登录界面
    public function login()
    {
        $this->view->assign('title','管理员登录');
        return $this->view->fetch('login');
    }


}