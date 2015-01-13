yershop
=======

  it‘s a shop system,created by onethink.it can realize data staticsing in back ,include 6 modules，such as order management，coupon management,
  member management,data mannagement,Report function being maked with highcharts,and Interface
Function，the system support palpay ,alipay,tenpay,unionpay,yeepay,kuaiqian paying online.
简介
=======
 基于onethink(thinkphp3.2.3 beta版本)的b2c商城系统，分类可自动添加调用，不需要手动添加，购物车实时显示，积分优惠券管理，可使用积分优惠券抵消现金，支持货到付款和在线支付，在线支付支持自动配置账号，集成了快递查询接口，支持物流查询，支持在线发货，退货，取消订单，可添加确认收货操作，后台集成了强大的数据统计功能，能对会员的访问时间、访问明细，浏览习惯分析，报表统计，图表统计，销量、利润按月，按日，按周统计。
 
环境要求
=======
 apache+php5.3(必须5.3以上)+mysql，windows服务器会产生登陆注册的json bug,导致登录成功后页面无跳转

=======
 
本地wamp环境安装方法
将安装包Application/user/conf/下的config.php配置文件剪切到一个文件夹，先按流程安装onethink，安装完成后，清空mySQL数据库,导入目录下的one.sql文件，将剪切的config.php覆盖安装完成后的自动生成的config.php，登陆后台，账号123密码123，此前安装时的用户名密码已无效

服务器安装方法
安装onethink，清空L数据库,导入目录下的one.sql数据库文件
修改安装完成后的Application/user/conf/config.php第三行加密码为
define('UC_AUTH_KEY', '?<U[ePB.Gp*+/Vi!;,4kfL"^gXuYN8-EnJHz:$h~'); //加密KEY


