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
use think\Session;

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

    //处理用户提交的注册信息,并写到zh_user表中
    public function insert()
    {//前端提交的必须是Ajax请求再进行验证与新增操作
        if (Request::isAjax()) {
            //1.数据验证
            $data = Request::post();//要验证的数据
            $rule = 'app\common\validate\User'; //自定义的验证器


            //开始验证：$res 中保存错误信息，成功返回true
            $res = $this->validate($data, $rule);

            //验证失败
            if (true != $res) {
                return ['status' => -1, 'message' => $res];

            } else {//验证成功
                //2.将数据写入到数据表zh_user中，并对写入结果进行判断
                if ($user = UserModel::create($data)) {
                    //注册成功后，实现自动登录
                    $courentUser = UserModel::get($user->id);
                    Session::set('user_id', $courentUser->id);
                    Session::set('user_name', $courentUser->id);
                    Session::set('is_admin', $courentUser->is_admin);

                    return ['status' => 1, 'message' => '恭喜,注册成功~~'];
                } else {
                    return ['status' => 0, 'message' => '注册失败~~'];
                }
            }
        } else {
            $this->error('请求类型错误', 'register');
        }

    }
//            //使用模型来创建数据
//            if (UserModel::create($data)){
//                return ['status'=>1,'message'=>'恭喜，注册成功'];
//            }else{
//                return ['status'=>0,'message'=>'注册失败，请检查'];
//            }
//
//        } else {
//            $this->error("请求类型错误",'register');
//        }



        //渲染登录页面
        public function login()
    {

        //验证是否已经登录
        $this->logined();
        return $this->view->fetch('login',['title'=>'用户登录']);
    }



    //用户登录验证与查询:复用部分注册代码
        public function loginCheck(){

        //前端提交的必须是Ajax请求再进行验证与新增操作
            if (Request::isAjax()){

                //1.数据验证
                $data = Request::post();   //要验证的数据
                //halt($data); //查询获取到的数据
                $rule = ['email|邮箱'=>'require|email','password|密码'=>'require|alphaNum']; //自定义的验证器

                //开始验证:$res 中保存错误信息，成功返回true
                $res=  $this->validate($data,$rule);
                //dump($res);die();
                if (true != $res){ //验证失败
                    return ['status'=> -1, 'message'=>$res];
                }else{//验证成功
                    //2.查询数据表zh_user中，并对结果进行判断
                    $result = UserModel::get(
                        function ($query) use ($data){
                            $query->where('email',$data['email'])
                                ->where('password',sha1($data['password']));
                        }
                    );

                    //halt($result); //测试查询结果
                    if (null == $result){
                        return ['status'=>0,'message'=>'邮箱或密码不正确，请检查~~'];
                    }else{
                        //将用户ID写入session中
                        Session::set('user_id',$result);
                        Session::set('user_name', $result->name);
                        Session::set('is_admin', $result->is_admin);
                        return ['status'=>1, 'message'=>'恭喜,登录成功~~'];
                    }
                }
            }else{
                $this->error('请求类型错误','login');//跳转到登录页面
            }
    }
}