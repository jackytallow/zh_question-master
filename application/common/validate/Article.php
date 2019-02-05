<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2019/2/5
 * Time: 10:27
 */

namespace app\common\validate;


use think\Validate;

class Article extends Validate
{

    protected $rule = [
        'title|标题' => 'require|length:5,50',
        'content|文章内容'=>'require|length'
    ]
}