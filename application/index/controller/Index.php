<?php
namespace app\index\controller;


use think\Controller;
class Index extends Controller
{



    //直接生成首页
    public function index(){

        return $this->view->fetch();
    }

}
