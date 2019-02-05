<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/19
 * Time: 19:05
 */

namespace app\common\controller;


use app\admin\controller\Site;
use app\common\model\ArtCate;
use think\Controller;
use think\facade\Session;

/**
 * 用户控制器应继承自这个基础公共控制器
 * 该控制器继承自Controller.php
 * 用户可以将一些公共操作放在这个公共控制器
 * Class Base
 * @package app\common\controller
 */
class Base extends Controller
{


    /**
     *初始化方法
     * 1.在所有方法之前调用
     * 2.常用来创建常量，公共方法等
     */
    protected function initialize()
    {

        //检测站点是否已关闭
        $this->is_open();
    }

    //检查是否已登录：防止重复登录：放在登录验证方法中调用
    protected function logined()
    {
        if (Session::has('user_id')){
            $this->error('客官，你已经登录啦~~','index/index');
        }
    }

    //检测是否未登录:放在需要登录操作的方法的最前面，例如发布文章
    protected function isLogin()
    {
        if (!Session::has('user_id')){
            $this->error('客官，您是不是忘记登录啦~~','user/login');
        }
    }


    //显示分类导航
    protected function shawNav()
    {
        //1.查询分类表所得到所有的分类信息，该方法要在初始化方法中调用
        $cateList = ArtCate::all(function($query){
            $query->where('status',1)->order('sort','asc');

        });

        //2.将分类信息赋值给模板啊：nav.html调用
        $this->view->assign('cateList',$cateList);
    }

    //检测站点是否已关闭：在公共控制器初始化方法中调用
    public function is_open()
    {
        //1.获取但当前站点的状态
        $isOpen = Site::where('status', 1)->value('is_open');

        //2.如果站点是关闭状态,那我们只允许关闭前台模块,后台模块必须仍然可以访问
        if ($isOpen == 0 && Request::module() == 'index') {
            //或者写上:此域名出售
            $info = <<<'INFO'
            <body style="background-color:#333">
            <h1 style="color:#eee;text-align:center;margin:200px">站点维护中...</h1>
            </body>
INFO;
            exit($info);
        }
    }



}