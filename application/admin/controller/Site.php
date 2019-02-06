<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2019/2/6
 * Time: 16:51
 */

namespace app\admin\controller;

use app\admin\common\model\Site as SiteModel;
use app\admin\common\controller\Base;

class Site extends Base
{

    //站点管理首页
    public function index()
    {

        //1.获取站点信息
        $siteInfo  = SiteModel::get(['status'=>1]);

        //2.模板赋值
        $this->view->assign('siteInfo',$siteInfo);

        //3.渲染模板
        return $this->view->fetch('index');
    }

    //保存站点修改
    public function save()
    {
        //1.获取要更新的数据
        $data = Request::param();

        //2.更新数据
        if (SiteModel::update($data)){
            $this->success('更新成功','index');
        }

        //3.无更新或更新失败
        $this->error('无更新或更新失败','index');
    }
}