<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class IndexController extends CommonController {
//	public function _initialize(){
//		if($_GET['openid']){
//			$menber =M('menber');
//			$user=$menber->where(array('openid'=>$_GET['openid']))->select();
//			S('name',$user[0]['name']);
//			S('userid',$user[0]['id']);
//			S('nickname',$user[0]['nickname']);
//		}
//	}
   //主页
	public function index(){
		$menber =M('menber');
		$userinfo =$menber->where(array('uid'=>session('uid')))->select();
		$order =M('orderlog');
		$neworder = $order->order('logid DESC')->limit(10)->select();
		$incomelog =M('incomelog');
		//昨日收入
		$yesterday =date("Y-m-d",strtotime("-1 day"));
		$yesterday_res = $incomelog->where(array('addymd'=>$yesterday,'userid'=>session('uid')))->select();
		$yesterday_income =0;
		foreach($yesterday_res as $k=>$v){
			$yesterday_income =$yesterday_income+$v['income'];
		}
		//资金变动  tu do
		$maps['userid'] =session('uid');
//		$maps['type'] =array('gt'=>0);
		$incomechange= $incomelog->order('id DESC')->where($maps)->select();
		$this->assign('incomechange',$incomechange);
		$this->assign('yesterincome',$yesterday_income);
		$this->assign('orderinfo',$neworder);
		$this->assign('userinfo',$userinfo[0]);
		$this->display();
	}

	//我的产品
	public function financial(){
		$orderlog =M('orderlog');
		$result  = $orderlog->join('p_product ON p_orderlog.productid=p_product.id')->where(array('userid'=>session('uid')))->select();
		foreach($result as $k=>$v){
			if($v['states']==0){
				$v['total'] = $v['prices'] *$v['num'];
				$data['wait'][] =$v;
			}
			if($v['states']==1){
				$v['total'] = $v['prices'] *$v['num'];
				$data['coming'][] =$v;
			}
			if($v['states']==2){
				$v['total'] = $v['prices'] *$v['num'];
				$data['comoever'][] =$v;
			}
		}
		$this->assign('res',$data);
		$this->display();
	}



	/**
	 * 获取当前页面完整URL地址
	 */
	private function get_url() {
		$sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
		$php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
		$path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
		$relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
		return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
	}


	private function getlists($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		return json_decode($result, true);
	}

	private function curlget($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
//		执行并获取HTML文档内容
		$output = curl_exec($ch);
		//释放curl句柄
		curl_close($ch);
		return json_decode($output, true);
	}
}