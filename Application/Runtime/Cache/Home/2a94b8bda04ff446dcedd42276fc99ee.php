<?php if (!defined('THINK_PATH')) exit(); echo '<?'; ?>
xml version="1.0" encoding="UTF-8"?>

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<style>
/*分页*/
.pageSelect { position: relative; height: 74px; margin: 0 2%; float: left;}
.pageSelect span { display: inline-block; width: 41px; height: 33px;border: 1px solid #e6e6e6; text-align: center; color: black; line-height: 33px; margin: 0 3px; background: #c9c9c9;}
.pageSelect span b { font-weight: normal; color: #f23e47;}
.pageSelect .pageWrap { text-align: center; padding-top: 21px;}
.pageSelect .pageWrap a { display: inline-block; width: 41px; height: 33px;border: 1px solid #e6e6e6; text-align: center; color: #919191; line-height: 33px; margin: 0 3px; background: #c9c9c9;}
.pageSelect .pageWrap a i { cursor: pointer;}
.pageSelect .pageWrap a.cur ,.pageSelect .pageWrap a:hover { background: #81848b; color: #fff; border-radius: 1px; -moz-border-radius: 1px; -webkit-border-radius: 1px;}
.pageSelect .pageWrap a i.ico-pre { display: block; width: 8px; height: 33px; background: url(../images/ico_fabu_page.png) no-repeat 0 10px; margin: 0 auto; }
.pageSelect .pageWrap a i.ico-next { display: block; width: 8px; height: 33px; background: url(../images/ico_fabu_page.png) no-repeat 0 -29px; margin: 0 auto;}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<meta xmlns="http://www.w3.org/1999/xhtml" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />



<meta xmlns="http://www.w3.org/1999/xhtml" name="MobileOptimized" content="240" />

<meta name="apple-itunes-app" content="app-id=716585349, app-argument=http://appdp:275">

<meta name="MobileOptimized" content="470" />

<title>仿派代网自适应触屏版手机wap门户网站模板论坛首页</title>
<!-- 样式引入 -->
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
<div class="nav">

<!-- <a class=" c96 font14 fl nav_list b25" href="home.html" title="首页">首页</a> -->

<a class="black bold c96 font14 fl nav_list " href="<?php echo U('Index/index');?>" title="首页">首页</a>

<a class=" c96 font14 fl nav_list " href="bbs.html" title="商道">商道</a>

<a class=" c96 font14 fl nav_list "  href="event.html" title="活动">活动</a>

<a class=" c96 font14 fl nav_list  last"  href="jobs.html" title="招聘">招聘</a>

<p class="clear"></p>

</div>

<link rel="stylesheet" href="styles/shouwei/bbslist.css?v=2013013007" type="text/css" />
<div class="nav_sec">
<a class="c96 fl c_green navSec_firList" href="index.html" title="帖子">帖子</a>
<a class="c96 fl " href="index.html?act=follow" title="关注">关注</a>
<a class="c96 fl " href="index.html?act=gan" title="干货">干货</a>
<a class="c96 fr navSec_lastList " href="index.html?act=hui" title="版块">版块</a>
<p class="clear"></p>
</div>

<div id="main">
<div class="bbsdata_list loads">
<!--列表开始-->
<?php foreach ($list as $k => $v): ?>
<dl>
<dt>
<font class="rpy two_num fl"><?php echo ($v["jok_id"]); ?></font><a href="<?php echo U('Views/bbsdata',('jok_id='.$v['jok_id']));?>" title="5年过去了，淘宝依然那么好做，累死累趴下的人知道自己问题在哪吗？"><?php echo ($v["title"]); ?></a>&nbsp;&nbsp;
<p class="clear"></p>
</dt>
<dd class="bbsdata_info">
<a href="user.html?act=usershow&id=270324"><?php echo ($v["add_man"]); ?></a>&nbsp;&nbsp;
<font><?php echo (date('Y-m-d ',$v["add_time"])); ?></font>
<span class="read_num"><?php echo ($v["read_num"]); ?></span>
<a href="javascript:void(0)">
<span class="collect_num zan" jok_id="<?php echo ($v["jok_id"]); ?>" ><?php echo ($v["zan"]); ?></span>
</a>
</dd>
</dl>
<?php endforeach ?>
<!--列表结束-->
<div class="clear"></div>
</div>
<div id="more" class="mt10">
<h2>
<?php if($pagetotal > 1): ?><a class="more fl font14 c64 get_more"  href="javascript:void(0)"opt="<?php echo ($pagetotal); ?>" >更&nbsp;多</a>
<?php else: ?>无更多资源<?php endif; ?>
</h2>
<p class="clear"></p>
</div>
<div class="clear"></div>
</div>
<!-- 分页 -->
<div class="pageSelect" >
<div class="pageWrap">
<?php echo ($show); ?>
</div>
</div>
<!--尾部-->
<div id="foot">
<div class="foot_left fl" style="margin-left: 2%;">
<a class="font13  mr12 c64" title="电脑版" href="javascript:void(0)">电脑版</a>
<a class="font13  mr12 c64" title="触屏版" href="javascript:void(0)">触屏版</a>
<a href="<?php echo U('Login/login');?>" title="登录" class="font13 mr12 c64">登&nbsp;录</a>
<p style="font-size: 9px;">Copyright © 2007- 2014 Paidai.com All Rights Reserved</p>
</div>
<div class="foot_right fr" style="margin-right: 2%;">
<a class="font13 fr c64 to_top" title="回顶部" href="javascript:void(0)">顶部</a>
</div>

<p class="clear"></p>
</div>

<script>

window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["weixin","qzone","tsina","tqq","tieba"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","tieba"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='../bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
window._bd_share_config = {
share : [{
"tag" : "share_2",
"bdSize" : 32,			
}]
};

</script>
</body>
</html>
<script src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(function () {
/*点赞*/
$('.zan').click(function(){
var _this=$(this);
var num=_this.html();//点击数
var jok_id= _this.attr('jok_id');
num1=parseInt(num)+1;//点击数+1
var url="<?php echo U('Views/ding');?>";
$.post(url,{num1:num1,jok_id:jok_id},function(data){
if(data.status==1)
{
alert('感谢您的支持');
_this.html(num1);
}
else
{
alert('您已经点过赞啦!');
}
},'json')
})
/*加载更多*/
var p=1;//当前页
var str='';
var url="<?php echo U('Index/load');?>";
$('.get_more').click(function(){
p+=1;
$.post(url,{p:p},function(data){
$.each(data,function(k,v){
str+='<div class="bbsdata_list ">'
str+='<dl>'
str+='<dt>'
str+='<font class="rpy two_num fl">'+v.jok_id+'</font>'
str+='<a href="#">'+v.title+'</a>'
str+='<p class="clear"></p>'
str+='</dt>'
str+='<dd class="bbsdata_info">'
str+='<a href="#">'+v.add_man+'</a>'
str+='<font>'+v.add_time+'</font>'
str+='<span class="read_num">'+v.read_num+'</span>'
str+='<span class="collect_num">15</span>'
str+='</dd>'
str+='</dl>'
str+='<div class="clear"></div>'
str+='</div>'	
})
$('.get_more').before(str);
if(p>$('.get_more').attr('opt')) $('.get_more').parent().html('无更多资源');
str='';
},'json')
})

});
</script>