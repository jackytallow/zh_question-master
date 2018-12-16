<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/16
 * Time: 18:16
 */


/**
 * zh_user表中的用户模型
 */
namespace app\common\model;
use think\Model;

class User extends Model
{

    //手工指定
   protected $pk =  'id';

    /**
     * @var string
     * 如果已经指定了数据库前缀，这里就不需要指定
     */
   //protected $table = 'zh_user';
   
}