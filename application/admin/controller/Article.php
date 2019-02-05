<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2019/2/5
 * Time: 13:54
 */

namespace app\admin\controller;


use app\admin\common\controller\Base;

class Article extends Base
{

    //文章管理首页
    public function index()
    {
        //检测是否登录
        $this->isLogin();

    }
}