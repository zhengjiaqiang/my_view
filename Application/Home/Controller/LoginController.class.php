<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
class LoginController extends Controller 
{
	/*登陆*/
public function login()

{
if(!empty($_POST))
{
$model=M('login');
$uname=I('post.uname');
$upwd=I('post.upwd');
//判断用户名是否存在
$info=$model->where(['uname'=>$uname])->find();
if($info['uname'])
{
if($info['upwd']==$upwd)
{
//存储用户信息
cookie('uname',$info['uname']);
session('user_id',$info['id']);
$this->success('登陆成功,用户名与密码输入正确',U('Index/index'));
}
else
{
$this->error('密码输入有误');
}
}
else
{
$this->error('该用户不存在');
}
}
else
{
$this->display();
}
    	
}
//退出
public function out()
{
cookie('uname',null);
session('user_id',null);
$this->success("退出成功",U('Login/login'));
}
/* 生成验证码 */  
public function verify()
{

$config = [
'fontSize'    =>    30,    // 验证码字体大小   
'length'      =>    3,     // 验证码位数    
'useNoise'    =>    false, // 关闭验证码杂点
];
$Verify = new Verify($config);
$Verify->entry();
}


/* 验证码校验 */ 
function check_verify($id='')
{   
$code=I('post.idenCode');
$verify = new Verify();    
$res=$verify->check($code, $id);
$this->ajaxReturn($res, 'json');	
} 
/*注册*/
public function regist()
{
if(!empty($_POST))
{
$post_data=I('post.');
$post_data['create_time']=time();
$model=M('login');
$res=$model->add($post_data);
if($res)
{
$this->success('注册成功',U('Login/login'));
}
else
{
$this->error('注册失败');
}
}
else
{
$this->display();
}
}
}