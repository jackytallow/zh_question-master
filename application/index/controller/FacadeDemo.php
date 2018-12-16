<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/3
 * Time: 11:59
 */

namespace app\index\controller;


class FacadeDemo
{

    public function index($name = 'ThinkPHP'){


       return \app\facade\Test::hello($name);
    }

}