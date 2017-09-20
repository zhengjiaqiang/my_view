<?php
namespace Home\Controller;
use Think\Controller;
class ViewsController extends Controller 
{
	
	/*详情页*/
    public function bbsdata ()
    {
    $jok_id=I('get.jok_id');//帖子id
    $read_num=M('jokes')->where('jok_id='.$jok_id)->setInc('read_num');//阅读量+1
    $detaList=M('jokes')->where('jok_id='.$jok_id)->find();
    $user_id=session('user_id');
    //查看评论
    $comList=M('comment')->where(['user_id'=>$user_id,'jok_id'=>$jok_id])->order("comment_time desc ")->select();
   foreach ($comList as $key => $value) 
   {
      $comList[$key]['reply']=M('reply')->where(['comm_id'=>$value['comment_id']])->select();
   }
   //print_r($comList);die;
    $this->assign('comList',$comList);
    $this->assign('read_num',$read_num);//浏览数
    $this->assign('detaList',$detaList);
    $this->display();
    }
    /*赞*/
    public function ding()
    {
    $m=M('jokes');
    $data['jok_id']=I('post.jok_id');
    if(!isset($_COOKIE[I('post.jok_id')+100])&&$m->where(['jok_id'=>$data['jok_id']])->setInc('zan'))
    {
    $cookiename=I('post.jok_id')+100;
    setcookie($cookiename,'666',time()+60*60);
    $data['status']=1;
    $data['msg']=ok;
    $this->ajaxReturn($data);
    }
    else
    {
     $data['status']=0;
     $data['msg']=fail;
     $this->ajaxReturn($data);
    }
    }
    /*评论*/
    public function common()
    {
     //防非法评论
     if(!isset($_SESSION['user_id']))
     {
        echo 0;
        exit();
     }
     $data=I('post.');
     $data['comment_time']=time();
     $data['user_id']=session('user_id');
     $res=M('comment')->add($data);
     if($res)
     {
        $this->assign('data',$data);
        $this->display();
     }
     else
     {
        echo 'fail';
     }
    }
    /*回复*/
    public function reply()
    {
      $data=I('post.');  
      $data['reply_time']=time();
      $info=M('reply')->add($data);
      if($info)
      {
       echo 0;
      }
      else
      {
        echo 1;
      }
    }
   /*收藏*/
   public function collect()
   {
    if(!isset($_SESSION['user_id']))
    {
    $info['status']=3;
    $info['msg']='fail';
    $this->ajaxReturn($info,'json');
    exit();  
    }
    $data['user_id']=session('user_id');
    $data['jok_id']=I('post.jok_id');
    $data['collect_time']=time();
    $status=I('post.status')?I('post.status'):0;
    if($status==0)
    {
     //判断该看点是否收藏
     $is_sel=M('collect')->where(['jok_id'=>$data['jok_id']])->find();
     if($is_sel)
     {
        $info['status']=2;
        $info['msg']='fail';
        $this->ajaxReturn($info,'json');
        exit();
     }
     $collectList=M('collect')->add($data);
     $info['status']=0;
     $info['msg']='收藏';
     $this->ajaxReturn($info,'json');
    }
    else
    {
     M('collect')->where(['jok_id'=>$data['jok_id']])->delete();
     $info['status']=1;
     $info['msg']='取消收藏';
     $this->ajaxReturn($info,'json');  
    }
   }
}
