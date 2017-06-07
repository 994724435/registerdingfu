<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>我要转账</title>
	<link rel="stylesheet" href="/register/Public/Home/css/aui.min.css">
	<link rel="stylesheet" href="/register/Public/Home/css/style.css">
	<script type="text/javascript" src="/register/Public/Home/js/aui.js"></script>
	<style type="text/css">
	.tile{font-size: 16px;text-indent: 10px;}
	</style>
</head>
<body>
    <header class="mui-bar mui-bar-nav">
	  <a class="mui-icon mui-icon-left-nav mui-pull-left mui-action-back"></a>
	  <h1 class="mui-title">钱包互转</h1>
	</header>
	<div class="mui-content">
	   
		  <form class="mui-input-group" action="" method="post" style="margin-top: 20px;" enctype="multipart/form-data">
			<div class="tile">充值钱包转入到收益钱包</div>
		    <div class="mui-input-row">
		        <!-- <label>充值钱包</label> -->
		        <input type="number" name="chargebag" class="mui-input-clear" placeholder="请输入金额">
		    </div>
			  <button class="mui-btn mui-btn-block">确认</button>
		</form>

		 <form class="mui-input-group" action="" method="post" style="margin-top: 20px;" enctype="multipart/form-data">
			<div class="tile">收益钱包转入到充值钱包</div>
		    <div class="mui-input-row">
		        <!-- <label>充值钱包</label> -->
		        <input type="number" name="incomebag" class="mui-input-clear" placeholder="请输入金额">
		    </div>
			 <button class="mui-btn mui-btn-block">确认</button>
		</form>


	</div>
</body>
</html>