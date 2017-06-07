<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>我要充值</title>
	<link rel="stylesheet" href="/register/Public/Home/css/aui.min.css">
	<link rel="stylesheet" href="/register/Public/Home/css/style.css">
	<script type="text/javascript" src="/register/Public/Home/js/aui.js"></script>
	<style type="text/css">
		.tipTitle{font-size: 15px;font-weight: bold;margin-top: 10px;color: #000;padding:0 10px;}
		.tip{padding:0 10px;font-size: 14px;}
	</style>
</head>
<body>
     <header class="mui-bar mui-bar-nav">
	  <a class="mui-icon mui-icon-left-nav mui-pull-left mui-action-back"></a>
	  <a class="mui-icon mui-icon-reply mui-pull-right"></a>
	  <h1 class="mui-title">我要充值</h1>
	</header>
	<div class="mui-content">
		<form class="mui-input-group" action="" method="post" style="margin-top: 20px;" enctype="multipart/form-data">
		    <div class="mui-input-row">
		        <label>充值金额</label>
		        <input type="number" name="num" class="mui-input-clear" placeholder="请输入充值金额">
		    </div>
		    <div class="mui-input-row">
		        <label>用户账户</label>
		        <input type="text" name="name" class="mui-input-clear" placeholder="请输入用户账户">
		    </div>
		     

		<button class="mui-btn mui-btn-block">确认</button>
		</form>
	</div>
	<p class="tipTitle">充值说明：</p>
	<ul class="tip">

		<li>1、使用微信充值请使用微信扫描充值二维码</li>
		<li>2、使用支付宝充值请使用手机支付宝扫描支付宝充值二维码</li>
		<li>3、充值成功后及时联系客服</li>
	</ul>

    
</body>
</html>