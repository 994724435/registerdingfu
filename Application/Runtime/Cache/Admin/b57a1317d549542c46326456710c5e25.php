<?php if (!defined('THINK_PATH')) exit();?>


<!DOCTYPE HTML>
<html>
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="/register/Public/Admin/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="/register/Public/Admin/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="/register/Public/Admin/css/lines.css" rel='stylesheet' type='text/css' />
<link href="/register/Public/Admin/css/font-awesome.css" rel="stylesheet">
<!-- jQuery -->
<script src="/register/Public/Admin/js/jquery.min.js"></script>
<link href="/register/Public/Admin/css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="/register/Public/Admin/js/metisMenu.min.js"></script>
<script src="/register/Public/Admin/js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="/register/Public/Admin/js/d3.v3.js"></script>
<script src="/register/Public/Admin/js/rickshaw.js"></script>
   <script src="/register/Public/Admin/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">当前登录员：<font color=red><?php echo ($names); ?></font></a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
        
      </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="/register/index.php/Admin/Index/main"><i class="fa fa-dashboard fa-fw nav_icon"></i>管理员列表</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-indent nav_icon"></i>理财产品管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/register/index.php/Admin/Index/addproduct">添加产品</a>
                                </li>
                                <li>
                                    <a href="/register/index.php/Admin/Index/productlist">产品管理</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-indent nav_icon"></i> 订单管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/register/index.php/Admin/Index/select">订单查询</a>
                                </li>
                                <!--<li>-->
                                    <!--<a href="/register/index.php/Admin/Index/userlist">所有签到</a>-->
                                <!--</li>-->
                                <!--<li>-->
                                    <!--<a href="/register/index.php/Admin/Index/send">考勤提请</a>-->
                                <!--</li>-->
                                <!--<li>-->
                                    <!--<a href="/register/index.php/Admin/Index/addsign">添加补签</a>-->
                                <!--</li>-->
                            </ul>                         
                        </li>
                      <li>
                            <a href="#"><i class="fa fa-indent nav_icon"></i>用户管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                  <li>
                                    <a href="/register/index.php/Admin/Menber/select">用户列表</a>
                                </li>
                                <!--<li>-->
                                    <!--<a href="/register/index.php/Admin/Index/setstime">时间规则</a>-->
                                <!--</li>-->
                                <!--<li>-->
                                    <!--<a href="/register/index.php/Admin/Menber/scope">范围规则</a>-->
                                <!--</li>-->
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-indent nav_icon"></i>资金明细<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/register/index.php/Admin/Menber/usermessage">资金列表</a>
                                </li>
                                <li>
                                    <a href="/register/index.php/Admin/Menber/tixiansheng">提现审核</a>
                                </li>
                                <li>
                                    <a href="/register/index.php/Admin/Menber/chargesheng">充值审核</a>
                                </li>
                                <li>
                                    <a href="/register/index.php/Admin/Menber/charge">用户充值</a>
                                </li>
                                <li>
                                    <a href="/register/index.php/Admin/User/crontab">手动刷新</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-indent nav_icon"></i>文章管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/register/index.php/Admin/Article/lists">公告管理</a>
                                </li>
                            </ul>
                        </li>
                          <li>
                            <a href="/register/index.php/admin/User/logOut"><i class="fa fa-flask fa-fw nav_icon"></i>退出系统</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
           
        
        <div id="page-wrapper">
        <div class="graphs">	  
    <div class="content_bottom">
     <div class="col-md-12 span_3">
		  <div class="bs-example1" data-example-id="contextual-table">
		    <table class="table">
		      <thead>
		        <tr style="text-align: center;">
		           <h3> <span><a href="/register/index.php/Admin/Index/addproduct">添加产品</a></h3>
		        </tr>
		        <tr>
		          <th>编号</th>
					<th>名称</th>
		          <th style="width: 300px">描述</th>
		          <th>logo</th>
					<th>价格</th>
					<th>每日收益</th>
				  <th>每日出售量</th>
					<th>状态</th>
					<th>操作</th>
		        </tr>
		      </thead>
		      <tbody>	      
		      <?php  $i = 1; ?>
		      <?php if(is_array($res)): foreach($res as $key=>$v): if(($i%2)==1){ echo "<tr class='active'>"; }else{ echo "<tr class='info'>"; } ?>
		        
		          <th scope="row"><?php echo ($v["id"]); ?></th>
				  <th><?php echo ($v["name"]); ?></th>
		          <th style="width: 300px"><?php echo ($v["cont"]); ?></th>
		          <th><img src="<?php echo ($v["pic"]); ?>" style="width: 100px;"></th>
				  <th><?php echo ($v["price"]); ?></th>
				  <th><?php echo ($v["daycome"]); ?></th>
				  <th><?php echo ($v["daynum"]); ?></th>
				   <th><?php if($v["state"] == 1): ?>出售中<?php elseif($v["state"] == 2): ?>已下架<?php endif; ?></th>
				  <th><a href="/register/index.php/Admin/Index/editeproduct/id/<?php echo ($v["id"]); ?>">修改</a>|<?php if($v["state"] == 1): ?><a href="javascript:if(confirm('确认下架吗?'))window.location='/register/index.php/Admin/Index/deleteproduct/id/<?php echo ($v["id"]); ?>'">下 架</a><?php elseif($v["state"] == 2): ?><a href="javascript:if(confirm('确认上架吗?'))window.location='/register/index.php/Admin/Index/deleteproduct/id/<?php echo ($v["id"]); ?>'">上 架</a><?php endif; ?> </th>
		        </tr>
		      	<?php $i++ ; endforeach; endif; ?>		      
		      </tbody>
		    </table>
		   </div>
	   </div>
		<div class="clearfix"> </div>
	    </div>
		<div class="copy">
            <p>Copyright &copy; 2016  All rights reserved.</p>
	    </div>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="/register/Public/admin/js/bootstrap.min.js"></script>
</body>
</html>