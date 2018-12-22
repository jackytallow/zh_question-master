<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/19
 * Time: 19:07
 */

namespace app\index\controller;


use app\common\controller\Base;

class User extends Base
{

    //注册

    public function register()
    {
//        echo '你好';
        $this->assign('title','用户注册');
     //渲染注册页面
        return $this->fetch();

    }
}