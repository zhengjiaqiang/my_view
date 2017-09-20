<?php if (!defined('THINK_PATH')) exit();?>
<dl class="replies" id="link">
<dd class="reply_con" >
<a href="javascript:void(0)">
<img src="/Public/home/images/timg.jpg" alt="I love you" width='60p'>
</a>
</dd>
<dd class="reply_con" >
<span class="c96 font12 fl ml5"><?php echo (date("Y-m-d H:i:s",$data["comment_time"])); ?></span>                
<a class="fr reply_btn c64 font12" href="javascript:void(0)" title="回复">回复</a>
<p class="clear"></p>
<p class="reply_text font14 c64"><?php echo ($data["comment_text"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;</p>
</dd>
</dl>