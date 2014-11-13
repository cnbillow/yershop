<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title><?php echo C('WEB_SITE_TITLE');?></title>
<link href="/Public/static/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/Public/static/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="/Public/static/bootstrap/css/index.css" rel="stylesheet">
<link href="/Public/static/bootstrap/css/onethink.css" rel="stylesheet">


<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/Public/static/bootstrap/js/html5shiv.js"></script>
<![endif]-->

<script type="text/javascript" src="/Public/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/static/js/menudown.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
<!--<![endif]-->
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>


</head>
<body>
<!-- 工具条 -->
	<!-- 导航条
================================================== -->

<div class="top">
  <div class="top_main"><a href="<?php echo U('index/index');?>" title="页">首页</a>   
                   
              <span class="toolbar"style="float:right"><a rel="nofollow" href='<?php echo U("center/allorder");?>'>我的订单</a><a rel="nofollow" href='<?php echo U("shopcart/index");?>'>我的购物车</a><a rel="nofollow" href='<?php echo U("center/collect");?>'>我的收藏</a><a rel="nofollow" href='<?php echo U("center/index");?>'>个人中心</a></span> </div></div>
	<!-- /工具条 -->
	<!-- 头部 -->
	<!-- 导航条
================================================== -->


<form action="<?php echo U("Search/index");?>" name="Searchform"  method="post" ><div class="header"><a href="" class="logo" title="稻壳儿">www.docer.com</a><a href="http://www.docer.com/zhuanti/national.html?from=gif" class="gif_ad"><img src="http://www.docer.com/application/styles/images/gif_ad.gif" alt=""></a><div class="header_conter" style="display:" data-searchbar-value="" data-searchbar-radiovalue="所有" data-searchbar-readioselector="#searchRadio" data-searchbar-tags="" data-searchbar-saletype="0"><div class="search"><input type="text" name="words" placeholder="输入您想要的商品" class="search_input"><a rel="nofollow" href="javascript:vod(0)" class="search_btn"></a></div><div class="tag">热门搜索：
</form>
<?php if(is_array($hotsearch)): foreach($hotsearch as $key=>$vo): ?><a href="<?php echo U('Search/index?words='.$vo);?>"><?php echo ($vo); ?></a><?php endforeach; endif; ?>

</div></div><div class="top_right"><a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="shopping_cart" id="shopping_cart" style="display:">购物车<span id="docerCartBtn" class="yellow"></span></a><?php if(is_login()): if(empty($usercart)): ?><div class="sc_goods"  id="goods" style="display:none;"><ul class="sc_goods_ul">
<p class="sc_goods_none" >您的购物车还是空的，赶紧行动吧！</p></ul>
<div class="sc_goods_foot" style="display: none;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="my_shopping_cart_btn">查看我的购物车</a>
</div>
</div>
<?php else: ?>
<div class="sc_goods" id="goods" style="display: none;"><ul class="sc_goods_ul">
<?php if(is_array($usercart)): $i = 0; $__LIST__ = $usercart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Article/detail?id='.$vo['goodid']);?>"><img src="<?php echo (get_cover(get_cover_id($vo["goodid"]),'path')); ?>" width='40' height='40'/> <?php echo (get_good_name($vo["goodid"])); ?></a><span class="red"style="text-align:left">  <?php echo (get_good_price($vo["goodid"])); ?>元</span> <a name="<?php echo ($vo["goodid"]); ?>" rel="del" href="javascript:vod(0);"  class="red" onclick="delcommon(event)">删除</a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul>
<div class="sc_goods_foot" style="display:block;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="my_shopping_cart_btn">查看我的购物车</a>
</div>
</div><?php endif; ?>
<div class="top_login">


<div class="top_lg_info"  style="display: block;">欢迎您，<a href="<?php echo U('center/information');?>" id="div1"><?php echo get_username();?> </a>
<ul id="div2" class="top_lg_info_down" style="display: none;"><li><a rel="nofollow" href="<?php echo U('center/index');?>">我的订单</a></li><li><a rel="nofollow" href="<?php echo U('center/collect');?>">我的收藏</a></li><li><a rel="nofollow" href="<?php echo U('User/profile');?>">修改密码</a></li><li><a rel="nofollow"  href="<?php echo U('User/logout');?>">退出登录</a></li></ul></div>

 <?php else: ?>
<div class="top_lg_link" > <a href="<?php echo U('User/register');?>" style="padding-left:0;padding-right:0">注册</a>  <a href="<?php echo U('User/login');?>">登录</a></div>

 
</div><div id="goods" class="sc_goods2" style="display: none;">
<?php if(empty($usercart)): ?><ul class="sc_goods_ul">
<p class="sc_goods_none" >您的购物车还是空的，赶紧行动吧！</p>

</ul><div class="sc_goods_foot" style="display: none;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="my_shopping_cart_btn">查看我的购物车</a>
</div>
<?php else: ?>

<ul class="sc_goods_ul">
 <?php if(is_array($usercart)): foreach($usercart as $key=>$vo): ?><li> <a href="<?php echo U('Article/detail?id='.$vo['id']);?>"><img src="<?php echo (get_cover(get_cover_id($vo["id"]),'path')); ?>" width='40' height='40'/> <?php echo (get_good_name($vo["id"])); ?></a><span class="red"style="text-align:left">  <?php echo (get_good_price($vo["id"])); ?>元</span> <a name="<?php echo ($vo["id"]); ?>" rel="del" href="javascript:vod(0);" class="red" onclick="delcommon(event)">删除</a></li><?php endforeach; endif; ?></ul><div class="sc_goods_foot" style="display:block;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>"  class="my_shopping_cart_btn">查看我的购物车</a>
</div><?php endif; ?>
</div><?php endif; ?>
</div><div class="cb"></div></div>
	
	<!-- /头部 -->

	<!-- 菜单 -->
	<!-- 导航条
================================================== -->

 <div class="menu-wrapper" >
    <div class="nav-all">
       <div class="all_class" id="all-class">
        <h2> <a>商品分类<span class="all_class_arrow"></span></a> </h2>
      </div>
      <div class="all-goods" style="display: none;" id="all-goods">
<?php if(is_array($categoryq)): $i = 0; $__LIST__ = $categoryq;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><div class="item">
          <div class="product"><h4><a href="<?php echo U('home/article/index/category/'.$cate['name']);?>"><?php echo ($cate["title"]); ?></a> </h4><s></s> </div>
            <?php if($cate['child'] != false): ?><div class="product-wrap pos"> 
            <!--手提袋-->
            <div class="cf">
              <div class="fl wd252 pr20">
                <h2><a href="<?php echo U('home/article/index/category/'.$cate['name']);?>"><?php echo ($cate["title"]); ?></a> </h2>
                <p class="lh30">纸质手提袋定制，设计印刷全部搞定。</p>
                <ul class="cf">
                <?php if(is_array($cate['child'])): $i = 0; $__LIST__ = $cate['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate_sub): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('home/article/index/category/'.$cate_sub['name']);?>"><?php echo ($cate_sub["title"]); ?><i class="icon-chevron-right"></i> </a>
                    
              
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
</div>
              <dl class="fl wd185 pl20 blee">
                <dt class="lh36">促销活动</dt>
                <dd id="stdads"><a href="http://www.xwcms.net" target="_blank" title="手提袋"><img src="/Public/static/bootstrap/img/0934218124.jpg"></a></dd>
              </dl>
            </div> </div><?php endif; ?>
       
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
        
      </div></div>
    
    
    <ul class="menu-list cf">
      <?php $__NAV__ = M('Channel')->field(true)->where("status=1")->order("sort")->select(); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if(($nav["pid"]) == "0"): ?><li>
                            <a href="<?php echo (get_nav_url($nav["url"])); ?>" target="<?php if(($nav["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>"><?php echo ($nav["title"]); ?></a>
                      </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    
  </div>
	<!-- /菜单 -->


	<!-- 主体 -->
	<div  class="wrapper">

 

<div class="main"><div class="main_nav"><a rel="nofollow" href="/">首页</a>&gt;<p class="red fwb">个人中心</p></div><div class="main_center"><div class="center_left"><dl><dt><a rel="nofollow">订单中心</a></dt><dd><a rel="nofollow" href='<?php echo U("center/index");?>'>主页</dd>
<dd><a rel="nofollow" href='<?php echo U("center/coupon");?>'>优惠券</dd><dd><a rel="nofollow" href='<?php echo U("center/allorder");?>'>我的全部订单</a></dd>
<dd><a rel="nofollow" href='<?php echo U("center/finished");?>'>已完成订单</a></dd>
</dl><dl class="last"><dt><a rel="nofollow">个人中心</a></dt><dd><a href='<?php echo U("center/information");?>'>账户信息</a></dd><dd><a rel="nofollow" href='<?php echo U("shopcart/index");?>'>我的购物车</a></dd><dd><a rel="nofollow" href='<?php echo U("center/collect");?>'>我的收藏</a></dd></dl></div><div class="center_right" style="display: none;"><div class="center_right_loading"></div></div><div id="memberCenter" style="display: block;"><!-- 个人中心 初始状态 start -->
<div class="center_right" id="MemberCenterCtrl" style="display: block;">

	<span class="red" style="display: block;padding:15px;font-size:17px;">我的优惠券</span>

	<?php if(empty($couponlist)): ?><div class="personal_info_none_goods">
				<p>没有优惠券，<a href='<?php echo U("center/coupon");?>' class="red">快去领取吧</a></p>
			
				<div class="cb"></div>
			</div>
	<?php else: ?>
     <ul class="userhas" id="cuser">
	 <?php if(is_array($couponlist)): $i = 0; $__LIST__ = $couponlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="javascript:vod(0);"><img src="<?php echo (get_cover(get_icon($vo["couponid"]),'path')); ?>"  width="170" height="170"/></a></p>
				<p><a href="javascript:vod(0);"><span class="red"><?php echo (get_coupon_name($vo["couponid"])); ?></span></a>[<?php echo ($vo["info"]); ?>]</p> 
				<p>优惠券代码：<?php echo (get_coupon_code($vo["couponid"])); ?></a></p> 
                 <p>价值：<span class="red"><?php echo (get_coupon_price($vo["couponid"])); ?>元</span>
                 </p><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul><?php endif; ?>
	<span class="red" style="display: block;padding:15px;font-size:17px;">优惠券</span>
	 <ul class="userhas">
	  <?php if(is_array($fcouponlist)): $i = 0; $__LIST__ = $fcouponlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><p><img src="<?php echo (get_cover($vo["icon"],'path')); ?>"  width="170px" height="170px"/>
				</p> 
                   <p><a href="javascript:vod(0)"><?php echo ($vo["title"]); ?></a></p>

                 <a   rel="<?php echo ($vo["id"]); ?>" onclick="getcoupon(event)" href="javascript:vod(0)" class="btn text">领取</a><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	<div style="display: block;" class="tab_view">
		


</div>
<script type="text/javascript"> 
//这时obj就是触发事件的对象，购物车动态删除
	function delcommon(event) { //获取事件源
event = event ? event : window.event; 
var obj = event.srcElement ? event.srcElement : event.target; 
//这时obj就是触发事件的对象，可以使用它的各个属性 
//还可以将obj转换成jquery对象，方便选用其他元素 
str = obj.innerHTML.replace(/<\/?[^>]*>/g,''); //去除HTML tag

	var $obj = $(obj);
	
	if(obj.rel=="del")
{ var gid=obj.name;
var array=$("#div2 li");//登录用户显示的li的个数
var arr=$("#goods li");//未登录用户显示的li的个数
	//全选的实现 定义删的发送路径
	if(array.length!==4){
		var del='<?php echo U("Shopcart/delItem");?>';
	
	}
else{
var del='<?php echo U("Shopcart/delItemByuid");?>';
	
	}
$.ajax({
type:'post', //传送的方式,get/post
url:del, //发送数据的地址
data:{id:gid},
 dataType: "json",
success:function(data)
{var $obj = $(obj);
	$obj.parent().remove();

	if(data.num=="0"){  //判断购物车数量是否为0，为0则隐藏底部查看工具
						$("div.sc_goods_foot").hide();
						var html='<p class="sc_goods_none" >您的购物车还是空的，赶紧行动吧！</p>';
					$("ul.sc_goods_ul").html(html);
				
	
	}
	else{$("div.sc_goods_foot").show();}

},
error:function (event, XMLHttpRequest, ajaxOptions, thrownError) {
alert(XMLHttpRequest+thrownError); }
		})
}
	
	} 
//购物车删除结束
 	function getcoupon(event) { 
event = event ? event : window.event; 
var obj = event.srcElement ? event.srcElement : event.target; 
//这时obj就是触发事件的对象，可以使用它的各个属性 
//还可以将obj转换成jquery对象，方便选用其他元素 
str = obj.innerHTML.replace(/<\/?[^>]*>/g,''); //去除HTML tag

	var $obj = $(obj);
	var id=obj.rel;
var b='<?php echo U("User/getcoupon");?>';
  $.ajax({
             type: "post",
             url: "<?php echo U("User/getcoupon");?>",
             data: {couponid:id},
             dataType: "json",
             success: function(data){
                        alert(data.msg);
						if(data.status=="1"){
					window.location.reload();}
						
                      }
         });

	
	}


	require(['memberCenter'], function() {
		var el = document.getElementById('MemberCenterCtrl');
		avalon.scan(el);
		avalon.nextTick(function() {
			el.style.display = 'block';
		});
	});
</script>
<!-- 个人中心 初始状态 end --></div><div id="memberInfo" style="display: none;"></div><div id="memberWealth" style="display: none;"></div><div id="myCollection" style="display: none;"></div><div id="myEarnings" style="display: none;"></div><div id="modifyPassword" style="display: none;"></div><div id="myCoupons" style="display: none;"></div><div class="cb"></div></div></div>
    <script type="text/javascript">_init_area();</script>
        <hr/>
        <?php echo hook('documentDetailAfter',$info);?>
   

 </div>
	<!-- /主体 -->

	<!-- 底部 -->
	
    <!-- 底部
    ================================================== -->
    <script type="text/javascript" src="/Public/static/bootstrap/js/ajaxcart.js"></script>
	<script>//购物车显示与隐藏
	var a= document.getElementById('shopping_cart');
  var b = document.getElementById('goods');
            var timerr = null;//定义定时器变量
            //鼠标移入div1或div2都把定时器关闭了，不让他消失
            a.onmouseover = b.onmouseover = function ()
            {
                b.style.display = 'block';
                clearTimeout(timerr);
            }
            //鼠标移出div1或div2都重新开定时器，让他延时消失
            a.onmouseout = b.onmouseout = function ()
            {
                //开定时器
                timerr= setTimeout(function () { 
                    b.style.display = 'none'; }, 500);
            }
			
			
			</script>
	<footer class="footer">
	<div class="container">
          <p style="height：30px;font-size:18px;color:#f0f"> 友情链接 :<a href="http://m.kuaidi100.com" target="_blank">快递查询</a> </p>
      </div>
      <div class="container">
          <p> 本站由 <strong><a href="http://www.ijquery.net/" target="_blank">yershop</a></strong> 强力驱动</p>
      </div>
    </footer>

<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "", //当前网站地址
		"APP"    : "/index.php?s=", //当前项目地址
		"PUBLIC" : "/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>

	<!-- /底部 -->
</body>
</html>