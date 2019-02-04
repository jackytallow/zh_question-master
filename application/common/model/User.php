<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/19
 * Time: 19:06
 */

namespace app\common\model;


use think\Model;

class User extends Model
{

      protected $pk = 'id'; //默认主键
      protected $table = 'zh_user'; //默认数据表

      protected $autoWriteTimestamp = true;//开启自动时间戳
    //定义时间戳字段名，默认为create_time和create_time，如果一致可省略
    //如果想关闭某个时间戳字段，将值设置为false即可，$creat_time= false
   protected $createTime = 'create_time';
   protected $updateTime = 'update_time';
   protected $dataFormat = 'Y年m月d日';

   //用户状态获取器
    public function getStatusAttr($value){

        $status = ['1'=>'启用','0'=>'禁用'];
        return $status[$value];
    }

//    //用户类型获取器
//    public function getIsAdminAttr($value){
//        $status = ['1'=>'管理员','0'=>'注册会员'];
//        return $status[$value];
//    }

    //用户密码修改器
    public function setPasswordAttr($value)
    {
      return sha1($value);
    }
}