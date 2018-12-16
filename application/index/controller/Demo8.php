<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/16
 * Time: 15:14
 */

namespace app\index\controller;


use think\Controller;
class Demo8 extends Controller
{
    public function test1()
    {
        return $this->view->fetch();
    }
}