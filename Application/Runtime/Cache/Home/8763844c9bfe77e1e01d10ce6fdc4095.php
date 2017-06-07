<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>公告列表</title>
	<link rel="stylesheet" href="/register/Public/Home/css/aui.min.css">
	<link rel="stylesheet" href="/register/Public/Home/css/style.css">
	<script type="text/javascript" src="/register/Public/Home/js/aui.js"></script>
</head>
<body>
	 <header class="mui-bar mui-bar-nav">
	  <a class="mui-icon mui-icon-left-nav mui-pull-left mui-action-back"></a>
	  <h1 class="mui-title">公告列表</h1>
	</header> 
	<div class="mui-content">
		 <ul class="mui-table-view">
			 <?php if(is_array($res)): foreach($res as $key=>$v): ?><a href="/register/index.php/Home/User/gonggao/id/<?php echo ($v["aid"]); ?>">
					<li class="mui-table-view-cell"><span class="mui-ellipsis-2" style="color: black"><?php echo ($v["title"]); ?></span>
				</li>
				</a><?php endforeach; endif; ?>
		</ul>

	</div>
</body>

</html>