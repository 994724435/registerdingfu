<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>我的团队</title>
	<link rel="stylesheet" href="/register/Public/Home/css/aui.min.css">
	<link rel="stylesheet" href="/register/Public/Home/css/style.css">
	<script type="text/javascript" src="/register/Public/Home/js/aui.js"></script>
	<style type="text/css">
		table,tbody,tr{display: block;width: 100%;}
		td{text-align: center;width: 33.3%;}
		tr{padding:10px 0;border-bottom: 1px solid #eee;}
		/* .th{font-weight: bold;font-size: 15px;} */
		.flex{display: flex;border-bottom: 1px solid #eee;}
		.flex li{flex:1 1 auto;padding: 10px 0;text-align: center;}
		.time{color: #797575;font-size: 13px;}
	</style>
</head>
<body>
    <header class="mui-bar mui-bar-nav">
	  <a class="mui-icon mui-icon-left-nav mui-pull-left mui-action-back"></a>
	  <h1 class="mui-title">我的团队</h1>
	</header>
	<div class="mui-content">
		<form class="mui-input-group" style="margin-top: 20px;">
		     <ul class="mui-table-view">
				<li class="mui-table-view-divider">一级下线</li>
			</ul>
			<ul class="flex">
				<li style="margin-left: 0px;">会员账号</li>
				<li>开通VIP等级</li>
				<li>注册时间</li>
			</ul>
			<?php if(is_array($one)): foreach($one as $key=>$v): ?><ul class="flex">
					<li><?php echo ($v["name"]); ?></li>
					<li><?php if($v["type"] == 1): ?>普卡会员<?php elseif($v["type"] == 2): ?>银卡会员<?php elseif($v["type"] == 3): ?>金卡会员<?php elseif($v["type"] == 4): ?>钻卡会员<?php endif; ?></li>
					<li class="time"><?php echo ($v["addymd"]); ?></li>
				</ul><?php endforeach; endif; ?>
			  <ul class="mui-table-view">
				<li class="mui-table-view-divider">二级下线</li>
			</ul>
			<ul class="flex">
				<li>会员账号</li>
				<li>开通VIP等级</li>
				<li>注册时间</li>
			</ul>
			<?php if(is_array($two)): foreach($two as $key=>$v): ?><ul class="flex">
				<li><?php echo ($v["name"]); ?></li>
				<li><?php if($v["type"] == 1): ?>普卡会员<?php elseif($v["type"] == 2): ?>银卡会员<?php elseif($v["type"] == 3): ?>金卡会员<?php elseif($v["type"] == 4): ?>钻卡会员<?php endif; ?></li>
				<li class="time"><?php echo ($v["addymd"]); ?></li>
			</ul><?php endforeach; endif; ?>

		</form>
	</div>
</body>
</html>