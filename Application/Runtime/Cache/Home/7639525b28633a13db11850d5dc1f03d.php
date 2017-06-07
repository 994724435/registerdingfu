<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>订单详情</title>
	<link rel="stylesheet" href="/register/Public/Home/css/aui.min.css">
	<link rel="stylesheet" href="/register/Public/Home/css/style.css">
	<script type="text/javascript" src="/register/Public/Home/js/aui.js"></script>
	<style type="text/css">
		 .my-left {
		    float: left;
		}
		.my-right {
		    float: right;
		}
	</style>
</head>
<body>
    <header class="mui-bar mui-bar-nav">
	  <a class="mui-icon mui-icon-left-nav mui-pull-left mui-action-back"></a>
	  <h1 class="mui-title">订单详情</h1>
	</header>
	<div class="mui-content">
		 <ul class="mui-table-view" id="list-data">
        <li class="mui-table-view-cell">
            <span class="my-left">订单流水号</span>
            <span class="my-right"><?php echo ($res["orderid"]); ?></span>
        </li>
        <li class="mui-table-view-cell">
            <span class="my-left">产品名</span>
            <span class="my-right"><?php echo ($res["productname"]); ?></span>
        </li>
        <li class="mui-table-view-cell">
            <span class="my-left">购买数量</span>
            <span class="my-right"><?php echo ($res["num"]); ?></span>
        </li>
        <li class="mui-table-view-cell">
            <span class="my-left">需支付</span>
            <span class="my-right"><?php echo ($res["total"]); ?>元</span>
        </li>
    </ul>
		<a href="/register/index.php/Home/Product/dealorder/orderid/<?php echo $_GET['orderid']; ?>"><button class="mui-btn mui-btn-block">确认订单</button></a>
		<a href="/register/index.php/Home/Product/deleteorder/orderid/<?php echo $_GET['orderid']; ?>"><button class="mui-btn mui-btn-block">删除订单</button></a>
	</div>
</body>
</html>