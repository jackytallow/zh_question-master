<?php
namespace app\index\controller;



use app\common\controller\Base;
//导入公共控制器

class Index extends Base
{



    //直接生成首页
    public function index(){

        return $this->fetch('index',['name'=>'Jacky']);
    }

}
