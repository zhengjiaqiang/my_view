<?php 
namespace Home\Controller;
use Think\Controller;

class TuController extends Controller
{
	/*图片 标题 入库*/
	public function add()
	{
		set_time_limit(0);
		$url='http://neihanshequ.com/pic/';
		$html=file_get_contents($url);
        $preg='#<div class="content-wrapper">.*<p>(.*)</p>.*<img .*data-src="(.*)".*>.*</div>#isU';
        preg_match_all($preg, $html, $arr);
		$data=array();
		
		foreach ($arr[1] as $k => $v) 
		{
		 $data['title']=$v;
		 $data['img']=$arr[2][$k];
		 $data['content']='';
		 print_r($data);
		 M('tu')->add($data);
		}
		
	}
   /*列表展示*/
   public function show()
   {
   	$tu_list=M('tu')->select();
   	$this->assign('tu_list',$tu_list);
   	$this->display();
   }
}
 ?>
