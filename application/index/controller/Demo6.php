<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/9
 * Time: 18:42
 */

namespace app\index\controller;


use app\index\model\City;
use app\index\model\O2o_city;
use think\Db;

//模型是和一张数据表绑定在一起的
/**
 * Class Demo6
 * @package app\index\controller
 * 模式创建
 */
class Demo6
{


    //模型初始化
    protected static function init()
    {
        //初始化内容,通常使用注册模型的事件操作


    }

   public function get()
   {
          // dump(City::get('4'));

           //用查询更加复杂的数据进行查询数据

//       $res = City::field('name,uname,uname,listorder,status')
//               ->where('id',4)
//               ->find();

       $res = Db::table('o2o_city')
           ->field('name,uname,uname,listorder,status')
           ->where('id',4)
           ->find();

           dump($res);

           //来检测一下,返回一个对象
      // dump($res instanceof O2o_city);

   }


   //获取多条数据，model
    public function all()
    {
        // dump(City::all());


         $res = City::field('name,uname,uname,listorder,status')
              ->where('id','in' ,'1,4,2')
               ->find();
         dump($res);
    }

}