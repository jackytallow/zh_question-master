<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/16
 * Time: 17:56
 */

namespace app\common\controller;

/**
 * Class Base
 * @package app\common\controller
 * 基础控制器
 * 1.必须继承think\controller.php
 */

use think\Controller;
class Base extends Controller
{
       /**
        * 初始化方法
        * 创建常量，公共方法
        * 在所有方法之前被调用
        */

       protected function initialize()
       {

       }
}