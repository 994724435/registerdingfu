<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
		// 所有方法调用之前，先执行
	public function _initialize(){
		if(!$_SESSION['uname']){
			echo "<script>alert('请登录');";
	            echo "window.location.href = '".__ROOT__."/index.php/Admin/User/login';";
	            echo "</script>";
				exit;
		}
		$user = M('user');
		$result= $user->where(array('name'=>$_SESSION['uname']))->select();
		$_SESSION['manager'] =$result[0]['manager'];
		$this->assign('names',$_SESSION['uname']);
		$this->assign('manager',$result[0]['manager']);
	}
}