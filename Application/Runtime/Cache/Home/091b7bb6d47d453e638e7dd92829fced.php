<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>个人中心</title>
	<link rel="stylesheet" href="/register/Public/Home/css/aui.min.css">
	<link rel="stylesheet" href="/register/Public/Home/css/user.css">
	<style type="text/css">
		body{background: url('/register/Public/Home/images/bgg.jpg') no-repeat;background-size: 100%; }
		header a{margin-top: 10px;color: #fff;}
	</style>
</head>
<body>
<!-- <img src="img/bgg.jpg" alt="" class="bg"> -->
<header class="mui-bar mui-bar-nav">
	<a class="mui-pull-left" href="jieshao.html">公司介绍</a>
	<h1 class="mui-title">个人中心</h1>
	<a class="mui-pull-right" href="adList.html">系统公告</a>
	<!-- <img src="img/31.png" alt="" class="note mui-pull-right"> -->
</header>

<div class="mui-content">

	<div class="title">
		<img src="/register/Public/Home/images/34.jpg" alt="" class="photo">
		<ul class="info">
			<li>
				<!--张三--><?php echo ($username); ?>
				<!--<span class="tel"><?php echo ($username); ?></span>-->
			</li>
			<li style="font-size: 12px;"><?php echo ($usertype); ?></li>
			<li class="btns">
				<a href="addMoney.html" class="chongzhi"><img src="/register/Public/Home/images/29.png" alt="">充值</a>
				<a href="drawCash.html" class="cash"><img src="/register/Public/Home/images/30.png" alt="">提现</a>
			</li>
		</ul>
	</div>
	<ul class="tab">
		<li data-href="group.html">
			<ul>
				<li><img src="/register/Public/Home/images/22.png" alt=""></li>
				<li>我的团队</li>
			</ul>
		</li>
		<li data-href="mySwitchMoney.html">
			<ul>
				<li><img src="/register/Public/Home/images/23.png" alt="" style="width: 18%;"></li>
				<li>我要转账</li>
			</ul>
		</li>
		<li data-href="regNext.html">
			<ul>
				<li><img src="/register/Public/Home/images/24.png" alt="" style="width: 17%;"></li>
				<li>注册下级</li>
			</ul>
		</li>
		<!-- 	<li>
                <ul>
                    <li><img src="img/26.png" alt="" style="width: 18%;"></li>
                    <li>网站公告</li>
                </ul>
            </li> -->
	</ul>
	<ul>
		<ul class="list" style="margin-bottom: 20px;">
			<li data-href="payRecord.html">
				<img src="/register/Public/Home/images/25.png" alt="">
				充值记录
			</li>
			<li data-href="cashRecord.html">
				<img src="/register/Public/Home/images/26.png" alt="">
				提现记录
			</li>
			<li data-href="cashDetail.html">
				<img src="/register/Public/Home/images/27.png" alt="">
				资金明细
			</li>
			<li  data-href="switchMoney.html">
				<img src="/register/Public/Home/images/27.png" alt="">
				钱包互转
			</li>

			<li data-href="modifyPwd.html">
				<img src="/register/Public/Home/images/28.png" alt="">
				修改密码
			</li>
			<li data-href="/register/index.php/Home/Login/login">
				<img src="/register/Public/Home/images/28.png" alt="">
				退出登录
			</li>
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

</script>
</body>
</html>