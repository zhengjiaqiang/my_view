<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller 
{
	/*前台首页*/
    public function index()
    {
    $model=M('jokes');
    $count=$model->count();//数据总条数
    $pageNum=3;
    $pagetotal=ceil($count/$pageNum);
    $Page = new \Think\Page($count,$pageNum);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show= $Page->show();// 分页显示输出
	$list=$model->limit($Page->firstRow.','.$Page->listRows)->select();
	$this->assign('list',$list);
	$this->assign('show',$show);
	$this->assign('pagetotal',$pagetotal);
	$this->display(); 
    }
    /*加载更多*/
    public function load()
    {
	$model=M('jokes');
	$page=I('post.p')?I('post.p'):1;//当前页
	$page_num=3;
	$limit=($page-1)*$page_num;
    $loadList=$model->limit($limit,$page_num)->select();
	echo json_encode($loadList);
    }
}