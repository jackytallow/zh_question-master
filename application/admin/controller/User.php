<?php
namespace app\admin\controller;

use app\admin\common\controller\Base;
use app\admin\common\model\User as UserModel;
use think\facade\Request;
use think\facade\Session;

class User extends Base
{

    private $password = '';  //临时存放用户密码

    //渲染登录界面
    public function login()
    {
        $this->view->assign('title','管理员登录');
        return $this->view->fetch('login');
    }

    //验证用户登录
    public function checkLogin()
    {
        $data = Request::param();

        $map[] = ['email','=',$data['email']];
        $map[] = ['password','=',sha1($data['password'])];

        $result = UserModel::where($map)->find();
        if($result){
            Session::set('user_id',$result['id']);
            Session::set('user_name',$result['name']);
            Session::set('is_admin',$result['is_admin']);
            $this->success('登录成功','admin/user/userList');
        }

        $this->error('登录失败');
    }

    //退出登录
    public function logout()
    {
        //1.清除全部session
        Session::clear();

        //2.退出登录并跳转到登录页面
        $this->success('退出成功','login');
    }





}

















