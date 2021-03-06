<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// |  Author: 烟消云散 <1010422715@qq.com> 
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 $url= $_SERVER[HTTP_HOST]; //获取当前域名  
 */
class IndexController extends HomeController {
 

	//系统首页
    public function index(){
		
		/**
 * 菜单调用
 *//*首页统计代码实现*/
 if(1==C('IP_TONGJI')){
	    $id="index";
	    $record=IpLookup("",1,$id); 
	   }
   $cate=M('Category');
  $catelist=$this->menulist()	;
    $this->assign('categoryq', $catelist);

 $this->assign('page',D('Document')->page);//分页
 $user=M('category');
     $id=$user->where('display=1 and pid=0')->getField('id',true);
    $this->assign('arrr',$id);//文章列表
	/** 幻灯片调用* */
     $slide=get_slide();
   $this->assign('slide',$slide);//文章列表
	/** 限时抢购调用* */

	$timelist=$this->timelist();
   $this->assign('timelist',$timelist);
   /**
 * 最新上架调用
 */
   $bytime=$this->bytime();
   $this->assign('bytime',$bytime);
   $totalsales=$this->totalsales();
    /**
 * 热卖调用
 */
   $this->assign('totalsales',$totalsales);
   $Carousel=$this->Carousel();
   $this->assign('carousel',$Carousel);
    /**
 * 热词调用
 */
   $hotsearch=$this->getHotsearch();
   $this->assign('hotsearch',$hotsearch);
       /**
 * 购物车调用
 */
   $cart=R("shopcart/usercart");
   $this->assign('usercart',$cart);
   if(!session('user_auth')){$usercart=$_SESSION['cart'];
        $this->assign('usercart',$usercart);
   
   }
  $adlist=$this->goodlist() ;
  
   $this->assign('articlelist',$adlist);
   
   
    $this->display();
	}
	/**
 * 无限极分类菜单调用
 */
public function menulist(){
  $field = 'id,name,pid,title';
    $categoryq = D('Category')->field($field)->order('id')->where('display="1"and ismenu="1" ')->select();
    $catelist = $this->unlimitedForLevel($categoryq);
    return $catelist;
}
/**
 *限时抢购
 */
public function timelist(){
 
$time=M('document_product')->order('id desc')->where('mark="2"')->limit("6")->select();
 return $time;

}
/**
 *幻灯片
 */
public function Carousel(){
 
$Carousel=M('document')->where('position="4"')->select();
 return $Carousel;

}

/**
 *最新上架
 */
public function bytime(){
 
$bytime=M('document_product')->order('id desc')->limit("6")->select();
 return $bytime;

}
/**
 *热卖商品
 */
public function totalsales(){
 
$totalsales=M('document_product')->order('totalsales desc')->limit("6")->select();
 return $totalsales;

}
public function unlimitedForLevel($cate,$name = 'child',$pid = 0){
    $arr = array();
    foreach ($cate as $key => $v) {
        //判断，如果$v['pid'] == $pid的则压入数组Child
        if ($v['pid'] == $pid) {
            //递归执行
            $v[$name] = self::unlimitedForLevel($cate,$name,$v['id']);
            $arr[] = $v;
        }
    }
    return $arr;
}

/**
 *分类商品
 */
public function goodlist(){
  
    $str=M('brand')->where('status="1"')->order('ypid')->select();
	return $str;
   
}


/**
 *热词
 */
public function getHotsearch(){
    $arr = array();
    $str=M('config')->where('id="40"')->getField("value");
	$hotsearch=explode(",",$str);
	return $hotsearch;
   
}
/**
 *二级，三级分类调用
 */
public function getarticle(){
       $category=D("category");
	  $list=$category->getparent();
	 $detail=M("document");
	 foreach($list as $n=> $val){
       $list[$n]['id']=$detail->where('category_id=\''.$val['id'].'\'')->select();
 
     }
	 $pa=$category->parent();
foreach($pa as $n=> $val){
		 $list[$n]['id']=$detail=M("document")->where('category_id=\''.$val['id'].'\'')->select();
		array_push($arr[$i],$detail);}

	
   return $list;
}

}