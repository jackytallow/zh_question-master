<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/19
 * Time: 19:07
 */

namespace app\index\controller;


use app\common\controller\Base;
use think\facade\Request;
use app\common\model\User as UserModel;

class User extends Base
{

    //注册

    public function register()
    {
//        echo '你好';
        $this->assign('title','用户注册');
     //渲染注册页面
        return $this->fetch();

    }

    //处理用户提交的注册信息
    public function insert()
    {
        if (Request::isAjax()){

            //使用模型来创建数据
            //获取用户通过表单提交过来的数据
            $data = Request::except('password_confirm','post');
            if (UserModel::create($data)){
                return ['status'=>1,'message'=>'恭喜，注册成功'];
            }else{
                return ['status'=>0,'message'=>'注册失败，请检查'];
            }

        } else {
            $this->error("请求类型错误",'register');
        }
    }

}