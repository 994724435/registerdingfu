<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>我的收益</title>
	<link rel="stylesheet" href="/register/Public/Home/css/aui.min.css">
	<link rel="stylesheet" href="/register/Public/Home/css/financial.css">
	<style type="text/css">

	</style>
</head>
<body>
	<header class="mui-bar mui-bar-nav">	
		<h1 class="mui-title">我的理财</h1>
	</header>
	<div class="mui-content">
		<ul class="tab">
			 <li class="selected"><span>待支付</span></li>
			 <li><span>收益中</span></li>
			 <li><span>已完成</span></li>
		</ul>
		<div class="tabContent">
			<div>
				<ul class="list">
					<?php if(is_array($res["wait"])): foreach($res["wait"] as $key=>$v): ?><li>
								<img src="<?php echo ($v["pic"]); ?>" class="img">
								<ul>
									<li><?php echo ($v["orderid"]); ?></li>
									<li><?php echo ($v["producename"]); ?></li>
								</ul>
								<span>¥<?php echo ($v["total"]); ?></span>
								<a href="/register/index.php/Home/Product/orderDetail/orderid/<?php echo ($v["orderid"]); ?>">去支付</a>
							</li><?php endforeach; endif; ?>
				</ul>
			</div>	
			<div class="hidden">
				<ul class="list">
					<?php if(is_array($res["coming"])): foreach($res["coming"] as $key=>$v): ?><li>
							<img src="<?php echo ($v["pic"]); ?>" class="img">
							<ul>
								<li><?php echo ($v["orderid"]); ?></li>
								<li><?php echo ($v["producename"]); ?></li>
							</ul>
							<span>¥<?php echo ($v["productmoney"]); ?>*<?php echo ($v["num"]); ?></span>
							<!-- <a href="#">去支付</a> -->
						</li><?php endforeach; endif; ?>
				</ul>
			</div>	
			<div class="hidden">
				<ul class="list">
					<?php if(is_array($res["comoever"])): foreach($res["comoever"] as $key=>$v): ?><li>
							<img src="<?php echo ($v["pic"]); ?>" class="img">
							<ul>
								<li><?php echo ($v["orderid"]); ?></li>
								<li><?php echo ($v["producename"]); ?></li>
							</ul>
							<span>¥<?php echo ($v["productmoney"]); ?></span>
							<a href="#">已完成</a>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>	
		</div>
	</div>
	<nav class="mui-bar mui-bar-tab">
    <a class="mui-tab-item" data-href="/register/index.php/Home/Index/index.html">
        <span class="mui-icon <?php if($function == 1): ?>mui-active<?php endif; ?>"><img src="/register/Public/Home/images/7.png" alt=""></span>
        <span class="mui-tab-label">首页</span>
    </a>
    <a class="mui-tab-item <?php if($function == 2): ?>mui-active<?php endif; ?> " data-href="/register/index.php/Home/Index/financial.html">
        <span class="mui-icon" style="width: 20px;"><img src="/register/Public/Home/images/81.png" alt=""></span>
        <span class="mui-tab-label">我的产品</span>
    </a>
    <a class="mui-tab-item <?php if($function == 3): ?>mui-active<?php endif; ?>" data-href="/register/index.php/Home/Product/product.html">
        <span class="mui-icon"><img src="/register/Public/Home/images/91.png" alt=""></span>
        <span class="mui-tab-label">鼎福黄金屋</span>
    </a>
    <a class="mui-tab-item <?php if($function == 4): ?>mui-active<?php endif; ?>" data-href="/register/index.php/Home/User/user.html">
        <span class="mui-icon"><img src="/register/Public/Home/images/10.png" alt=""></span>
        <span class="mui-tab-label">个人中心</span>
    </a>
</nav>
	<script src="/register/Public/Home/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript">
	$("nav a").click(function() {
		   var href=$(this).attr('data-href');
		   if(href){
		   	   window.location.href=href;
		   }
	});
		$(".tab li").click(function() {
			$(this).addClass('selected').siblings().removeClass('selected');
			$(".tabContent div").addClass("hidden").eq($(this).index()).removeClass("hidden");
		});
	  
	</script>
</body>
</html>