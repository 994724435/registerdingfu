<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="/register/Public/Admin/js/themes/default/default.css" />
	<link rel="stylesheet" href="/register/Public/Admin/plugins/code/prettify.css" />
	<script charset="utf-8" src="/register/Public/Admin/js/kindeditor.js"></script>
	<script charset="utf-8" src="/register/Public/Admin/js/lang/zh_CN.js"></script>
	<script charset="utf-8" src="/register/Public/Admin/js/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content1"]', {
				cssPath : '/register/Public/Admin/js/plugins/code/prettify.css',
				uploadJson : '/register/Public/Admin/js/php/upload_json.php',
				fileManagerJson : '/register/Public/Admin/js/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
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
	     <div class="xs">
  	       <h3>发布公告</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">标题</label>
									<div class="col-sm-8">
										<input type="text" name="title"  value="<?php echo ($res["title"]); ?>" class="form-control1" id="focusedinput" placeholder="">
									</div>
									<div class="col-sm-2">
										<p class="help-block"></p>
									</div>
								</div>

								<!--<div class="form-group">-->
									<!--<label for="focusedinput" class="col-sm-2 control-label">上传图片</label>-->
									<!--<div class="col-sm-8">-->
										<!--<input type="file" onchange="previewImage(this)" name="thumb"/>-->
									<!--</div>-->
									<!--<div class="col-sm-2">-->
										<!--<p class="help-block"></p>-->
									<!--</div>-->
								<!--</div>-->

								<br />
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">内容</label>
									<div class="col-sm-8">
										<textarea name="content1" style="width:700px;height:200px;visibility:hidden;"><?php echo htmlspecialchars($res['cont']); ?></textarea>
									</div>
									<div class="col-sm-2">
										<p class="help-block"></p>
									</div>
								</div>
							      <div class="panel-footer">
									<div class="row">
										<div class="col-sm-8 col-sm-offset-2">
											<button class="btn-success btn">Submit</button>
										</div>
									</div>
								 </div>
								
								
							</form>
						</div>
					</div>

 
	
  </div>
  <div class="copy_layout">
      <p>Copyright &copy; 2016 name All rights reserved.</p>
  </div>
  </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="/register/Public/admin/css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="/register/Public/admin/js/metisMenu.min.js"></script>
<script src="/register/Public/admin/js/custom.js"></script>
 <script src="/register/Public/admin/js/bootstrap.min.js"></script>
</body>
</html>