<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>理财产品</title>
	<link rel="stylesheet" href="css/aui.min.css">
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
			<li>	
             	<img src="/register/Public/Home/images/p_1.jpg" alt="" class="liImg">
             	<span>钱付壹号</span>
             	<ul>
             		<li class="time">有效天数：20天</li>
             		<li class="money">每日收益：7.8元</li>
             		<li class="sales">销量3份</li>
             	</ul>
             	<img src="/register/Public/Home/images/6.png" alt="" class="add">
			</li>
			<li>	
             	<img src="/register/Public/Home/images/p_2.jpg" alt="" class="liImg">
             	<span>钱付贰号</span>
             	<ul>
             		<li class="time">有效天数：20天</li>
             		<li class="money">每日收益：16.8元</li>
             		<li class="sales">销量13份</li>
             	</ul>
             	<img src="/register/Public/Home/images/6.png" alt="" class="add">
			</li>
			<li>	
             	<img src="/register/Public/Home/images/p_3.jpg" alt="" class="liImg">
             	<span>钱付叁号</span>
             	<ul>
             		<li class="time">有效天数：20天</li>
             		<li class="money">每日收益：60元</li>
             		<li class="sales">销量23份</li>
             	</ul>
             	<img src="/register/Public/Home/images/6.png" alt="" class="add">
			</li>
			<li>	
             	<img src="/register/Public/Home/images/p_4.jpg" alt="" class="liImg">
             	<span>钱付肆号</span>
             	<ul>
             		<li class="time">有效天数：20天</li>
             		<li class="money">每日收益：16.8元</li>
             		<li class="sales">销量13份</li>
             	</ul>
             	<img src="/register/Public/Home/images/6.png" alt="" class="add">
			</li>
			<!-- <li>	
             	<img src="	img/5.png" alt="" class="liImg">
             	<span>钱付伍号</span>
             	<ul>
             		<li class="time">有效天数：20天</li>
             		<li class="money">每日收益：60元</li>
             		<li class="sales">销量23份</li>
             	</ul>
             	<img src="img/6.png" alt="" class="add">
			</li>
 -->
			
		</ul>
	</div>
	<nav class="mui-bar mui-bar-tab">
    <a class="mui-tab-item" data-href="/register/index.php/Home/Index/index.html">
        <span class="mui-icon"><img src="/register/Public/Home/images/7.png" alt=""></span>
        <span class="mui-tab-label">首页</span>
    </a>
    <a class="mui-tab-item  mui-active" data-href="/register/index.php/Home/Index/financial.html">
        <span class="mui-icon" style="width: 20px;"><img src="/register/Public/Home/images/81.png" alt=""></span>
        <span class="mui-tab-label">我的产品</span>
    </a>
    <a class="mui-tab-item" data-href="/register/index.php/Home/Product/product.html">
        <span class="mui-icon"><img src="/register/Public/Home/images/91.png" alt=""></span>
        <span class="mui-tab-label">鼎福黄金屋</span>
    </a>
    <a class="mui-tab-item" data-href="my1.html">
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
	$(".list li").click(function() {
		window.location.href="./detail.html";
	});
		// $(".list>li").height($(".liImg").height())
	</script>
</body>
</html>