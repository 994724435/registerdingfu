<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>系统公告</title>
	<link rel="stylesheet" href="/register/Public/Home/css/aui.min.css">
	<link rel="stylesheet" href="/register/Public/Home/css/style.css">
	<script type="text/javascript" src="/register/Public/Home/js/aui.js"></script>
	
	<style type="text/css">
		.mui-content{background: #fff;padding: 8px 10px;}
		.mui-content img{display: block;width: 90%;margin:10px auto;}
		.title{height: 50px;line-height: 50px;color: #000;text-align: center;font-size: 16px;}
	</style>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
	  <a class="mui-icon mui-icon-left-nav mui-pull-left mui-action-back"></a>
	  <h1 class="mui-title">系统公告</h1>
	</header>
	<div class="mui-content">
		<p class="title"><?php echo ($res["title"]); ?></p>
		<!--<img src="img/1.png" alt="">-->
		<p class="content">
			<?php echo ($res["cont"]); ?>
		</p>	
	</div>

</body>
</html>