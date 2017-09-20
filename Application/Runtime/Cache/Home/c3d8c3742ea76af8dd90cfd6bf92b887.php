<?php if (!defined('THINK_PATH')) exit();?>
<?php echo '<?'; ?>
xml version="1.0" encoding="UTF-8"?>

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta xmlns="http://www.w3.org/1999/xhtml" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />

<meta xmlns="http://www.w3.org/1999/xhtml" name="MobileOptimized" content="240" />

<meta name="apple-itunes-app" content="app-id=716585349, app-argument=http://appdp:275">

<meta name="MobileOptimized" content="470" />

<title>论坛正文</title>
<base href="/Public/home/" />
<link type="text/css" rel="stylesheet" href="styles/shouwei/jobs/gbolbal_20141010.css" />

<script language="javascript">

if (top.location != location) top.location.href = location.href;

</script>

</head>

<body>	
<style>
#link img{ max-width: 100%;}

#oTop img{ max-width: 100%;}

#oTop{width:100%; position:relative;}

#oLink1{ position:absolute; top:0px; left:0px; width:14%; height:35%;}

#oLink2{ position:absolute; top:0px; right:0px; width:86%; height:100%;}

.nav a{width:20%;}

.nav a.last{

border-right:none;}



</style>

<script language="javascript">



var ua = navigator.userAgent,

isIphone = /iPhone/.test(ua),

isIpad = /iPad/.test(ua),

isSafari = /Version/i.test(ua),

version = /OS[7-9](_\d+){2}/i.test(ua),<!--/OS [7-9]_\d[_\d]/i.test(ua)-->

isAndroid = /Android/i.test(ua) || /Linux/.test(ua);

isMobile = /AppleWebKit.*Mobile.*/.test(ua); //是否是移动终端

if(isIphone && !isIpad && !isSafari && version){

var oLink = document.createElement('a');				

oLink.id='link';

oLink.style.width="100%";

oLink.href='http://www.17sucai.com/';

oLink.innerHTML = '<img width="640" src="images/shouwei/WAP-IOS.jpg">';

var logo = document.getElementById('top');

document.body.insertBefore(oLink,logo);

}

if(isMobile && isAndroid && !isIpad){

var oTop = document.createElement('div');

oTop.id = 'oTop';

active_br.innerHTML = '<a href="http://www.17sucai.com/"><img style="width:100%; max-width:100%" src="images/shouwei/WAP-Android-new.jpg"></a><a href="javascript:;" id="oLink1"></a>';

document.getElementById('oLink1').onclick = function(){

active_br.style.display = 'none';

}

}



</script>

<link rel="stylesheet" href="styles/shouwei/bbslist.css?v=2013013007" type="text/css" />
<div id="main" style="background-color:#EEE;">

<!--商论详细内容页面-->

<h1 class="font16 c32"><?php echo ($detaList["title"]); ?></h1>

<div class="bbsdata_info border-bottom">

<a href="user.html?act=usershow&id=270324"><?php echo ($detaList["add_man"]); ?></a>&nbsp;&nbsp;

<font><?php echo (date('Y-m-d',$detaList["add_time"])); ?></font>
<?php if($detaList["status"] > 0): ?><a class="col_art fr collect" href="javascript:void(0)" jok_id='<?php echo ($detaList["jok_id"]); ?>' status='<?php echo ($detaList["status"]); ?>'>取消收藏</a>
<?php else: ?><a class="col_art fr collect" href="javascript:void(0)" jok_id='<?php echo ($detaList["jok_id"]); ?>' status='<?php echo ($detaList["status"]); ?>'>收藏</a><?php endif; ?>
<p class="clear"></p>

</div>

<div class="content font16 c32"><?php echo ($detaList["content"]); ?></div>
<div id='box'>
<input type="text"/ style="font-size: 18px;" class='comment_text'>
<input type="button" value="评论"  class='common' jok_id='<?php echo ($detaList["jok_id"]); ?>'/>
</div>
<p class="clear"></p>
<dl class="replies" id="link">
<?php foreach ($comList as $k => $v): ?>
<dd class="reply_con" >
<img src="/Public/home/images/timg.jpg" alt="I love you" width='60p'>
</dd>
<dd class="reply_con" >
<span class="c96 font12 fl ml5"><?php echo (date("Y-m-d H:i:s",$v["comment_time"])); ?></span>                
<a class="fr reply_btn c64 font12 reply" href="javascript:void(0)" title="回复" >回复</a>
<div style='display:none;'>
<textarea name="" class="reply_text" cols="55" rows="2"></textarea>&nbsp;&nbsp;&nbsp;&nbsp;
<a class="fr reply_btn c64 font12 replyBtn " href="javascript:void(0)" title="提交" opt='<?php echo ($v["comment_id"]); ?>'>提交</a>
</div>
<?php foreach ($v['reply'] as $key => $value): ?>
<p class="clear">
</p>
<?php endforeach ?>
匿名:<p class="clear"><?php echo ($value["reply_text"]); ?></p>
<p class="reply_text font14 c64"><?php echo ($v["comment_text"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;</p>
</dd>
<?php endforeach ?>
</dl>
<div class="clear"></div>
</div>
</body>
</html>
<script src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
/*收藏*/
$('.collect').click(function(){
var _this=$(this);
 var jok_id=_this.attr('jok_id');
 var status=_this.attr('status');//0收藏 1 取消收藏
 var url="<?php echo U('Views/collect');?>";
 $.post(url,{jok_id:jok_id,status:status},function(data){
 	//alert(data.status);
  if(data.status==3)
  {
  	alert('亲,登录后才可以收藏哦!');
  	location.href="<?php echo U('Login/login');?>";
  	return;
  }
  //判断该看点是否收藏
  if(data.status==2)
  {
  	alert('您已经收藏过啦!');
  	return;
  }
  if(data.status==0)
  {
  	_this.html('取消收藏');
  	 _this.attr('status',1)
  }
  else
  {
  _this.html('收藏');
  _this.attr('status',0)	
  }
 },'json')
})





/*评论*/
$('.common').click(function(){
var _this=$(this);
 var jok_id=_this.attr('jok_id');//评论id
 var comment_text=$('.comment_text').val();//评论内容
 var url="<?php echo U('Views/common');?>";
 if(comment_text=='')
 {
 	alert('评论的内容不能为空!');
 	return;
 }
 $.post(url,{jok_id:jok_id,comment_text:comment_text},function(msg){
 	if(msg==0)
 	{
 		alert('亲,登录后才可以发表评论哦!')
 		location.href="<?php echo U('Login/login');?>";
 	}
  $('#box').after(msg);
 })
})
/*回复框*/
$('.reply').click(function(){
	$(this).next().toggle('normal');
})
/*提交回复*/
$('.replyBtn').click(function(){
var _this=$(this)
var reply_text=$('.reply_text').val();//回复内容
var comment_id=$(this).attr('opt');//评论ID
 var url="<?php echo U('Views/reply');?>";
 $.post(url,{reply_text:reply_text,comm_id:comment_id},function(data){
 if(reply_text=='')
 {
 	alert('你还没有评论');
 	return;
 }
 if(data)
 {
   var html='<p>匿名:'+reply_text+'</p>'
   _this.after(html);
 }
 })

})
</script>