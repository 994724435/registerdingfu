<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>理财产品</title>
	<link rel="stylesheet" href="/register/Public/Home/css/aui.min.css">
	<link rel="stylesheet" href="/register/Public/Home/css/product.css">
	<style type="text/css">

	</style>
</head>
<body>
	<header class="mui-bar mui-bar-nav">	
		<h1 class="mui-title">理财产品</h1>
	</header>
	<div class="mui-content">	
		<ul class="list">
			<?php if(is_array($res)): foreach($res as $key=>$v): ?><li data-href="/register/index.php/Home/Product/detail/id/<?php echo ($v["id"]); ?>">
					<img src="<?php echo ($v["pic"]); ?>" alt="" class="liImg">
					<span><?php echo ($v["name"]); ?></span>
					<ul>
						<li class="time">有效天数：<?php echo ($v["effectdays"]); ?>天</li>
						<li class="money">每日收益：<?php echo ($v["daycome"]); ?>元</li>
						<li class="sales">销量<?php echo ($v["salenum"]); ?>份</li>
					</ul>
					<img src="/register/Public/Home/images/6.png" alt="" class="add">
				</li><?php endforeach; endif; ?>
		</ul>
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
	$("nav a,.list>li,.tab li").click(function() {
		   var href=$(this).attr('data-href');
		   if(href){
		   	   window.location.href=href;
		   }
	});
	$(".list li").click(function() {
		var href=$(this).attr('data-href');
		if(href){
			window.location.href=href;
		}
	});
		// $(".list>li").height($(".liImg").height())
	</script>
</body>
</html>