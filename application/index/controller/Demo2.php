<?php 
namespace app\index\controller;

class Demo2
{
	public function index($name='Hello Jacky')
	{


//       $test =  new \app\common\Test();
//             return $test->hello('PHP');

		/**
         * Test直接访问hello方法
		 * 如果想静态调用一个动态方法,就需要给当前的类绑定一个静态代理类
		 * 如果设置了静态代理类,那么要访问原类中的方法,就必须要通过静态代理类来进行
		 * \app\facade\Test 是  \app\common\Test 的静态代理类
		 * 可以使用use 来简化静态代理类名称
		 * 如果没有在静态代理类中显示指定要绑定的类,可以动态绑定一下
		 * \think\Facade::bind('app\facade\Test','app\common\Test');
         *
		 */
		//echo \app\facade\Test::hello($name);
     		return \app\facade\Test::hello($name);
	}

	
}