<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2019/2/6
 * Time: 12:27
 */

namespace app\admin\controller;

use app\admin\common\model\Cate as CateModel;
use app\admin\common\controller\Base;

class Cate extends Base
{

    //分类管理首页
    public function index()
    {
        //检测是否登录
        $this->isLogin();

        //登录成功后默认跳转到用户管理界面
        return $this->redirect('catelist');

    }


    //分类列表
    public function cateList()
    {
        //1.检测是否登录
        $this->isLogin();

        //2.获取所有分类
        $cateList = CateModel::all();

        //3.设置必要的模板变量
        $this->view->assign('title','分类管理');
        $this->view->assign('empty','<span style="red">没有任何分类</span>');
        $this->view->assign('cateList', $cateList);

        //4.渲染出分类列表
        return $this->view->fetch('catelist');
    }
}