<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/16
 * Time: 18:19
 */


/**
 * user表的验证器
 */
namespace app\common\validate;


use think\Validate;

class User extends Validate
{

    protected $rule =[
        'name|用户名' => 'require|length;5,20|chsAlphaNum',
        'email|邮箱' => 'require|email|unique:zh_user',
        'mobile|手机号' => 'require|mobile|unique:zh_user',
        'password|密码' => 'require|length;6,20|alphaNum|confirm',
    ];
}