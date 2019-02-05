<?php
namespace app\index\controller;

use app\common\controller\Base;
use app\common\model\Article;
use think\Db;
use think\facade\Request;

class Index extends Base
{

    //首页
    public function index()
    {
        //设置全局查询条件
        $map = [];
        //条件1：显示状态必须为1
        $map = ['status','=',1]; //等号必须要有，不允许省略

        //实现搜索功能
        $keywords = Request::param('keywords');
        if (!empty($keywords)){
            //条件2：模糊匹配查询条件
            $map[] = ['title','like','%'.$keywords.'%'];
        }

        //分类信息显示
      //1.获取到URL中的分类ID

        $cateId = Request::param('cate_id');
        //如果当前存在分类ID，再进行查询获取到分类名称
        if (isset($cateId)){
            //条件3: 当前列表与当前栏目id对应,此时$map[]条件数组生成完毕
            $map[] = ['cate_id','=', $cateId];
            $res = ArtCate::get($cateId);
            //文章列表分页显示,分页仅显示三条
            $artList = Db::table('zh_article')
                ->where($map)
                ->order('create_time','desc')->paginate(4);
            $this->view->assign('cateName',$res->name);

        }else{
            //如果当前没有分类ID,就是首页啦
            $this->view->assign('cateName','全部文章');
            $artList = Db::table('zh_article')
                // ->where('status',1)s
                ->where($map)
                ->order('create_time','desc')->paginate(4);
        }

        $this->view->assign('empty','<h3>没有文章</h3>');
        $this->view->assign('artList', $artList);

        //渲染首页模板
        return $this->fetch('index',['title'=>'社区问答']) ;
    }


    //详情页
    public function detail()
    {
        $artId = Request::param('id');
        $art = Article::get(function ($query) use ($artId){
            $query->where('id','=',$artId)->setInc('pv');
        });
        if (!is_null($art)){

            $this->view->assign('art',$art);
        }

        $this->view->assign('title','详情页');
        return $this->view->fetch('detail');
    }

    //用户收藏
    public function fav()
    {

        if (!Request::isAjax()){
            return ['status'=>-1, 'message'=> '请求类型错误'];
        }

        $data = Request::param();
        //1.先查询fav收藏表中是否有这条收藏记录，如果有，表示已收藏过了
        //halt($data);
        //
        if (empty($data['session_id'])){
            return ['status'=>-2,'message'=>'请登录后再收藏'];
        }
        $map[] = ['user_id','=',$data['user_id']];
        $map[] = ['article_id','=',$data['article_id']];

        $fav = Db::table('zh_user_fav')->where($map)->find();

        if (is_null($fav)){

            Db::table('zh_user_fav')
                ->data([
                    'user_id'=>$data['user_id'],
                    'article_id'=>$data['article_id']
                ])->insert();
            return ['status'=>1,'message'=>'收藏成功'];

        }else{

            Db::table('zh_user_fav')->where($map)->delete();
           return ['status'=>0,'message'=>'取消收藏'];
        }
    }
}
