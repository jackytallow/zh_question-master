<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/4
 * Time: 22:17
 */

namespace app\index\controller;
use think\Db;

class Demo4
{

    public function conn1(){

     return  Db::table('o2o_city')
            ->where('id',13)
            ->value('name');



//     //查看数据源
//        return Db::table('o2o_deal')
//            ->where('id',1)
//            ->value('name');
    }


    public function conn2(){

        return Db::table('o2o_deal')
            ->where('id',1)
            ->value('current_price');
    }
}