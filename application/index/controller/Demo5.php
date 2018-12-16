<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2018/12/9
 * Time: 12:09
 */

namespace app\index\controller;


use think\Db;

class Demo5
{

      //1.单条查询
    public function find(){

        $res = Db::table('o2o_city')
                 ->where('id','=',2)->find();


        dump(is_null($res)? '没有找到': $res);
    }


    //2.多条查询
    public function select()
    {

        //select()找到返回二维数组，没有找到返回空数据

        $res = Db::table('o2o_city')
            ->field('id,name,uname,parent_id,is_default,listorder,status')
            ->where([
                ['parent_id','=','4'],
                ['status','=','1']
            ])->select();

        if (empty($res)){
            return '没有满足条件的数据';
        }else{
            foreach ($res as $row){
                dump($row);
            }
        }
    }

    //1.单条插入
       public function insert(){

         //insert():成功返回自增主键，失败返回false；
           //准备要插入到表中的数据，以数组的方式
           $data = [
               'name' => '广东',
               'uname' => 'guangdong',
               'parent_id' => 0 ,
                'is_default' => 0,
               'listorder' => 0,
                'status' => 1,
               'create_time'=>time(),  //新增时,添加时间与更新时间是一致的
               'update_time'=>time(),
           ];

           return  Db::table('o2o_city')->insert($data,true);

//           if ($res){
//               echo  '插入成功';
//           }
//           else{
//               echo '插入失败';
//           }

       }



       //多条插入
    public function insertAll()
    {
        $data = [
           ['name'=>'井冈山','uname'=>'jingangshang','parent_id'=>4,'is_default'=>0,'status'=>1],
            ['name'=>'宜春','uname'=>'yichun','parent_id'=>4,'is_default'=>0,'status'=>1]
        ];

        return Db::table('o2o_city')->data($data)->insertAll($data,true); //推荐
    }


    //更新数据
    public function update()
    {

        //设置更新条件[数组实现]与更新数据
        $map[] = ['id','=',12];
        $data = ['name'=> '九江'];
        return Db::table('o2o_city')->where($map)->update($data);

       //替换掉原来的更新条件，需要将原来的条件注释掉
        //$data = ['name'=>'宜春']；
        //如果更新条件师主键，可以直接写道跟新数据中去，会自动识别
      //  return Db::table('o2o_city')->update($data);
     }


     //删除数据
    public function delete(){

        //delete():成功了返回删除的数量，失败返回false
        //与更新一种相似，必须设置删除条件
        //删除相关的记录，主键可以直接作为参数
        //条件可以使用where()的子句

        return Db::table('o2o_city')->where('id',10)->delete();
    //无条件删除所有记录：极其危险操作我就不执行了，因为表中数据后面还需要使用,对此我们不必做出修改

    }


    //下面师tp5.1自带原生查询：查询操作
    public function query()
    {
        dump(Db::query("SELECT name,uname FROM o2o_city WHERE id IN (1,2,3,4)"));

    }

    //添加;失败，更新与删除
    public function execute()
    {
        //更新操作
        //调用think\db\Query.php中的execute()方法实现
        //更新操作
        // return Db::execute("UPDATE `student` SET `grade`=99 WHERE `id` = 20");
        //添加操作
        // return Db::execute("INSERT `student` SET `grade`=99,`name`='PeterZhu'");
        //删除操作
        // return Db::execute("DELETE FROM `student` WHERE `id` = 29");
    }
}