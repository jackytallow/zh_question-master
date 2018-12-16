<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/11
 * Time: 20:58
 */

namespace app\index\controller;


//这里我们不需要模板进行输出
use app\index\model\City;
use think\facade\View;


class Demo7
{
    //不需要模板,内容直接输出: display()
    public function first()
    {
        $content = '<h3 style="color:red">轻聊欢迎您~~</h3>';
        /**
         * 直接输出内容到浏览器,使用视图类的display()方法
         * 在控制器类Controller中已经封装好了display()可直接用
         * 必须使用return 才可以将内容返回给用户
         */
        // return $this->display($content);
       // 可以使用Controller类中的视图属性来调用
      //   return $this->view->display($content);

//        //使用视图类的静态代理也可以渲染页面
        return View::display($content);
    }


    public function second(){

        //模板赋值：assign()
        //1.普通变量
        //单个赋值
        $this->view->assign('name','Jackytallow');
        $this->view->assign('age',20);
        //批量赋值
        $this->view->assign([
            'sex'=> '男',
            'salary'=>12000
        ]);
        //2.数组
        $this->view->assign('goods',[
            'id'=>1,
            'name'=>'手机',
            'model'=>'华为Meta10',
            'price'=>1999
        ]);

        //3.对象
        $obj = new \stdClass;
        $obj->name = '北京';
        $obj->uname = 'Beijing';
        $this->view->assign('siteinfo',$obj);


        //4.常量
        define('SITE_NAME','轻聊网');

        //我们需要在模板中输出相应的变量
        //模板默认位于当前模板目录下的view目录中，所在目录与控制器同名，模板与方法同名。


        return $this->view->fetch();

    }


    //常用模板标签
    public function third()
    {
        $data = City::all();

        $this->view->assign('data',$data);

        return View::fetch();
    }


    //实用技术：分页输出
    public function fouth()
    {

        //获取分页数据的方法是Query.php类中的
        //这里每页显示5条数据
        $data = City::paginate(5);

        $this->view->assign('data',$data);

        return $this->view->fetch();
    }


    //视图过滤：filter(callback)
    public function five()
    {

        $content = '我是jackytallow';

        $callback = function()
        {
            str_replace(search,replace,subject);
        };
    }





}