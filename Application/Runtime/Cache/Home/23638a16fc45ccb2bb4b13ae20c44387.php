<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>注册下级</title>
	<link rel="stylesheet" href="/register/Public/Home/css/aui.min.css">
	<link rel="stylesheet" href="/register/Public/Home/css/style.css">
	<script type="text/javascript" src="/register/Public/Home/js/aui.js"></script>
</head>
<body>
    <header class="mui-bar mui-bar-nav">
	  <a class="mui-icon mui-icon-left-nav mui-pull-left mui-action-back"></a>
	  <h1 class="mui-title">注册下级</h1>
	</header>
	<div class="mui-content">
		<form class="mui-input-group" action="" method="post" style="margin-top: 20px;" enctype="multipart/form-data">
		    <div class="mui-input-row">
	        <label>用户名</label>
	        <input type="text" name="name" class="mui-input-clear" placeholder="请输入用户名">
		    </div>
	       <div class="mui-input-row">
		        <label>密码</label>
		        <input type="password" name="pwd" class="mui-input-password" placeholder="请输入密码">
		    </div>
		    <div class="mui-input-row">
		        <label>二级密码</label>
		        <input type="password" name="pwd1" class="mui-input-password" placeholder="请输入二级密码">
		    </div>
		<button class="mui-btn mui-btn-block">确认注册</button>
		<!--</form>-->
		 <!--<form class="mui-input-group">-->
			<div class="mui-input-row mui-radio mui-left">
				<label>普卡会员（800）</label>
				<input name="radio1" value="800" type="radio" checked>
			</div>
			<div class="mui-input-row mui-radio mui-left">
				<label>银卡会员（1500）</label>
				<input name="radio1" value="1500" type="radio">
			</div>
			<div class="mui-input-row mui-radio mui-left">
				<label>金卡会员（3000）</label>
				<input name="radio1" value="3000" type="radio">
			</div>
			<div class="mui-input-row mui-radio mui-left">
				<label>钻卡会员（6000）</label>
				<input name="radio1" value="6000" type="radio">
			</div>
		</form>

	</div>
</body>
</html>