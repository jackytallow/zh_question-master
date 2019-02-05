<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2019/2/5
 * Time: 13:12
 */

namespace app\admin\common\model;


use think\Model;

class User extends Model
{

    protected $pk = 'id';
    public $table = 'zh_user';
}