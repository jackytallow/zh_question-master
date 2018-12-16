<?php 
namespace app\index\controller;

use think\Controller;
// use think\Request;
// use think\facade\Request;

/**
 * 正常情况下,控制器不依赖控制器父类Controller.php
 * 但是推荐继承父类,这样可以很方便的使用在父类中已经封装好的一些方法和属性
 * Controller.php是没有静态代理类的
 * 请求对象 \think\Request.php 是有静态代理的,推荐使用
 * 控制器中的所有输出,字符串全部用return直接输出即可,不要用echo
 * 如果输出的是复合类型,可以用dump()函数,以后学了视图后,可以使用视图模板输出
 * 默认输出来html格式,可以指定输出格式,例如:json
 */
class Demo3 extends Controller
{

	function test(Request $request)
	{
		//如果创建了Request的静态代理,就可以直接用静态代理类,静态调用其中所有方法
		// dump(Request::get());

		//如果没有的话,就必须实例化请求对象再调用里面的方法
		// dump((new Request)->get());

		//如果继承了控制器的父类Controller,可以直接使用封装好的请求对象实例属性
		// dump($this->request->get());

		return json_encode($this->request->param());


	}
}