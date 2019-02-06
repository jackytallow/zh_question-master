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

        //登录成功后默认跳转到文章列表界面
        return $this->redirect('artlist');
    }

    //文章列表:仅允许查看自己发布的文章,超级管理员可以查看全部文章
    public function artList()
    {
        //1. 检测是否登录
        $this->isLogin();

        //2.获取当前用户id 和用户级别
        $userId = Session::get('user_id');
        $isAdmin = Session::get('is_admin');

        //3.获取当前用户发布的文章
        $artList = ArtModel::where('user_id', $userId)->paginate(5);

        //4.如果是超级管理员就获取全部文章
        if ($isAdmin == 1) {
            $artList = ArtModel::paginate(5);
        }


        //3.设置必要的模板变量
        $this->view->assign('title', '文章管理');
        $this->view->assign('empty','<span style="red">没有任何文章</span>');
        $this->view->assign('artList', $artList);

        //4.渲染出分类列表
        return $this->view->fetch('artlist');
    }




}