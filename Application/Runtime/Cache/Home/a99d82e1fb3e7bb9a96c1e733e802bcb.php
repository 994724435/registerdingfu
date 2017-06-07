<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>充值记录</title>
	<link rel="stylesheet" href="/register/Public/Home/css/aui.min.css">
	<link rel="stylesheet" href="/register/Public/Home/css/style.css">
	<script type="text/javascript" src="/register/Public/Home/js/aui.js"></script>
	<style type="text/css">
		 .my-left {
		    float: left;
		}
		.my-right {
		    float: right;
		    font-size: 14px;color: #ccc;
		}
	</style>
</head>
<body>
    <header class="mui-bar mui-bar-nav">
	  <a class="mui-icon mui-icon-left-nav mui-pull-left mui-action-back"></a>
	  <h1 class="mui-title">充值记录</h1>
	</header>
	<div class="mui-content">

		  <ul class="mui-table-view" id="list-data">
			  <?php if(is_array($res)): foreach($res as $key=>$v): ?><li class="mui-table-view-cell">
					<span class="my-left"><?php echo ($v["income"]); ?></span>
					<span class="my-right"><?php echo ($v["addtime"]); ?></span>
				</li><?php endforeach; endif; ?>
	       </ul>
	</div>
</body>
</html>