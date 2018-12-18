<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/18
 * Time: 20:46
 */

namespace app\index\controller;
use app\common\controller\Base;


class User extends Base
{

    //注册页面
    public function user()
    {
        $this->assign('title','用户注册');
        return $this->fetch();
    }
}