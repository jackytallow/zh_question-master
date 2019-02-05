<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2019/2/5
 * Time: 13:04
 */

namespace app\admin\common\model;


use think\Model;

class Article extends Model
{
   protected $pk = 'id';
   protected $table =  'zh_article';
}