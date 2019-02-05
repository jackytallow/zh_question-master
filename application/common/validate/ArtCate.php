<?php

/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2019/2/5
 * Time: 13:52
 */
namespace app\common\validate;

use think\Validate;

class ArtCate extends Validate
{
    protected $rule = [
        'title|栏目名称'=> 'require|length:3,20|chsAlpha'
    ];
}