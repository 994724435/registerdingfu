<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>我的收益</title>
	<link rel="stylesheet" href="/register/Public/Home/css/aui.min.css">
	<link rel="stylesheet" href="/register/Public/Home/css/index.css">

	<!-- <script type="text/javascript" src="js/aui.js"></script> -->
	<style type="text/css">
	</style>
</head>
<body>
	<header class="mui-bar mui-bar-nav">	
		<h1 class="mui-title">我的收益</h1>
	</header>
	<div class="mui-content">
		<ul class="tab">
			<li>
				<ul>
					<li>充值钱包</li>
					<li><?php echo ($userinfo["chargebag"]); ?><span>(元)</span></li>
				</ul>
			</li>
			<li>
				<ul>
					<li>收益钱包</li>
					<li><?php echo ($userinfo["incomebag"]); ?><span>(元)</span></li>
				</ul>
			</li>
			<li>
				<ul>
					<li>昨日收益</li>
					<li style="color: #04b6d4;"><?php echo ($yesterincome); ?></li>
				</ul>
			</li>

		</ul>
		<p class="title">购买记录</p>
		<div style="position: relative;height: 170px;">
		<div id="scrollbox">
			<ul class="maiList" id="scrollpic">
				<?php if(is_array($orderinfo)): foreach($orderinfo as $key=>$v): ?><li>
					<?php echo ($v["orderid"]); ?>：<?php echo ($v["addtime"]); ?>  成功购买<span><?php echo ($v["productname"]); ?></span>
				</li><?php endforeach; endif; ?>
			</ul>
			<ul id="scrollpic-copy" class="maiList"></ul>
			<ul id="scrollpic-copy1" class="maiList"></ul>
		</div>
		</div>
		
		<p class="title">最新资金变动</p>
		<table>
			<?php if(is_array($incomechange)): foreach($incomechange as $key=>$v): ?><tr>
				<td class="kind"><?php echo ($v["reson"]); ?></td>
				<td class="monry"><?php if($v["state"] == 2): ?>-<?php endif; ?>¥ <?php echo ($v["income"]); if($v["state"] == 0): ?>(待审核)<?php elseif($v["state"] == 3): ?>失败<?php endif; ?></td>
				<td class="time"><?php echo ($v["addtime"]); ?></td>
			</tr><?php endforeach; endif; ?>

		</table>
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
        <span class="mui-tab-label">汇福源黄金理财</span>
    </a>
    <a class="mui-tab-item <?php if($function == 4): ?>mui-active<?php endif; ?>" data-href="/register/index.php/Home/User/user.html">
        <span class="mui-icon"><img src="/register/Public/Home/images/10.png" alt=""></span>
        <span class="mui-tab-label">个人中心</span>
    </a>
</nav>
	<script src="/register/Public/Home/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript">
	$("nav a").click(function() {
		   var href=$(this).attr('data-href');
		   if(href){
		   	   window.location.href=href;
		   }
	});
	var speed = 50;
	var direction="top";
	var tab = document.getElementById("scrollbox");
	var tab1 = document.getElementById("scrollpic");
	var tab2 = document.getElementById("scrollpic-copy");
	var tab3 = document.getElementById("scrollpic-copy1");
	tab2.innerHTML = tab1.innerHTML;
	tab3.innerHTML = tab1.innerHTML;
	function marquee(){
	    switch(direction){
	        case "top":
	            if(tab2.offsetHeight - tab.scrollTop <= 0){
	                tab.scrollTop -= tab1.offsetHeight;
	            }
	            else{
	                tab.scrollTop++;
	            }
	        break;
	        case "bottom":
	            if(tab.scrollTop <= 0){
	                tab.scrollTop += tab2.offsetHeight;
	            }
	            else{
	                tab.scrollTop--;
	            }
	        break;
	    }

	}
	function changeDirection(dir){
	   direction = dir;
	}
	var timer = setInterval(marquee,speed);
	  
	</script>
</body>
</html>