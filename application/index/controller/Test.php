<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/16
 * Time: 18:33
 */

namespace app\index\controller;

/**
 * 测试类
 */
use app\common\controller\Base;

class Test extends Base
{


    //测试用户的验证器
    public function test1()
    {
        $data =[
            'name'=>'jackytallow',
            'email'=> '3434481891@qq.com',
            'mobile'=>'15817351625',
            'password'=>'adb123cd',
        ];

      $rule = 'app\common\validate\User';

      //第一个参数是当前数据,第二个参数是当前规则
      return $this->validate($data,$rule);
    }
}