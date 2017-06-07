<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>修改密码</title>
	<link rel="stylesheet" href="/register/Public/Home/css/aui.min.css">
	<link rel="stylesheet" href="/register/Public/Home/css/style.css">
	<script type="text/javascript" src="/register/Public/Home/js/aui.js"></script>
</head>
<body>
     <header class="mui-bar mui-bar-nav">
	  <a class="mui-icon mui-icon-left-nav mui-pull-left mui-action-back"></a>
	  <a class="mui-icon mui-icon-reply mui-pull-right"></a>
	  <h1 class="mui-title">修改密码</h1>
	</header>
	<div class="mui-content">
		<form class="mui-input-group" style="margin-top: 20px;" action="" method="post" enctype="multipart/form-data">
		    <div class="mui-input-row">
		        <label>原密码</label>
		        <input type="password" name="oldpwd" class="mui-input-password" placeholder="请输入原密码">
		    </div>
		    <div class="mui-input-row">
		        <label>新密码</label>
		        <input type="password" name="pwd" class="mui-input-password" placeholder="请输入新密码">
		    </div>
		     <div class="mui-input-row">
		        <label>确认新密码</label>
		        <input type="password" name="pwd1" class="mui-input-password" placeholder="请重新输入新密码">
		    </div>
			<div class="mui-input-row">
				<label>二级密码</label>
				<input type="password" name="pwd2" class="mui-input-password" placeholder="请重新输入新密码">
			</div>
		<button class="mui-btn mui-btn-block">确认</button>
		</form>
	</div>

    
</body>
</html>