<?php

namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class UserController extends CommonController{
    public function user(){
        $this->display();
    }

    public function addMoney(){  //充值
        if($_POST){
            if($_POST['num']<=0){
                echo "<script>alert('请输入正确金额在');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/addMoney';";
                echo "</script>";
                exit;
            }
            $menber =M('menber');
            $res_user = $menber->where(array('name'=>$_POST['name']))->select();
            if($res_user[0]){
                $uid =$res_user[0]['uid'];
                $income =M('incomelog');
                $data['type'] =0;
                $data['state'] =0;
                $data['reson'] ='充值';
                $data['addymd'] =date('Y-m-d',time());
                $data['addtime'] =date('Y-m-d H:i:s',time());
                $data['orderid'] =session('uid');
                $data['userid'] =$uid;
                $data['income'] =$_POST['num'];
                $income->add($data);
                $resreson ="充值".$_POST['num']."元";
                echo "<script>alert('".$resreson."待管理员确认');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/addMoney';";
                echo "</script>";
                exit;
            }else{
                echo "<script>alert('用户名不存在');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/addMoney';";
                echo "</script>";
                exit;
            }
            print_r($_POST);die;
        }
        $this->display();
    }

    public function drawCash(){  //提现
        if($_POST){

            if($_POST['num']<=0){
                echo "<script>alert('金额不正确');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/drawCash';";
                echo "</script>";
                exit;
            }
            if($_POST['type']=='银行卡'){
               if(!$_POST['carnum']||!$_POST['carmame']||!$_POST['carhang']||!$_POST['caraddr']){
                   echo "<script>alert('请将信息填写完整');";
                   echo "window.location.href='".__ROOT__."/index.php/Home/User/drawCash';";
                   echo "</script>";
                   exit;
               }
            }

            if(!$_POST['type']||!$_POST['account']){
                echo "<script>alert('请将信息填写完整');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/drawCash';";
                echo "</script>";
                exit;
            }
            $menber =M('menber');
            $res_user = $menber->where(array('uid'=>session('uid')))->select();
            if($res_user[0]['pwd2']!=$_POST['pwd']){
                echo "<script>alert('密码不正确');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/drawCash';";
                echo "</script>";
                exit;
            }
            $allmoney =$res_user[0]['chargebag']+$res_user[0]['incomebag'];
            if($allmoney<$_POST['num']){
                echo "<script>alert('钱包余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/drawCash';";
                echo "</script>";
                exit;
            }


            //处理自己
            if($res_user[0]['incomebag']<$_POST['num']){
               $chargebags =  $allmoney-$_POST['num'];
               $datas1['chargebag'] = $chargebags;
               $datas1['incomebag']  =0;
            }else{
                $datas1['incomebag'] =$res_user[0]['incomebag']-$_POST['num'];
            }
//            $chargebagmy = $res_user[0]['chargebag'] -$_POST['num'];
            $menber->where(array('uid'=>session('uid')))->save($datas1);
            $income =M('incomelog');
            $logdata['type'] =3 ;
            $logdata['state'] =0 ;
            $logdata['reson'] =$_POST['type'].'提现' ;
            $logdata['addymd'] =date('Y-m-d',time()) ;
            $logdata['addtime'] =date('Y-m-d H:i:s',time()) ;
            $logdata['orderid'] =$_POST['name'].','.$_POST['account'].','.$_POST['carnum'].','.$_POST['carmame'].','.$_POST['carhang'].','.$_POST['caraddr'] ;
            $logdata['userid'] =session('uid');
            $logdata['income'] =$_POST['num'];
            $income->add($logdata);
            echo "<script>alert('等待管理员确认');";
            echo "window.location.href='".__ROOT__."/index.php/Home/User/drawCash';";
            echo "</script>";
            exit;
        }
        $this->display();
    }

    public function group(){  //我的团队
        // 一级
        $menber =M('menber');
        $one = $menber->where(array('fuid'=>session('uid')))->select();
        $two =array();
        foreach($one as $k=>$v){
            $twos =  $menber->where(array('fuid'=>$v['uid']))->select();
            if($twos){
                foreach($twos as $k1=>$v1){
                    array_push($two,$v1);
                }
            }
        }
        $this->assign('one',$one);
        $this->assign('two',$two);
        $this->display();
    }

    public function mySwitchMoney(){  //我要转账
        if($_POST){
            if($_POST['num']<=0){
                echo "<script>alert('金额不正确');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/mySwitchMoney';";
                echo "</script>";
                exit;
            }
            $menber =M('menber');
            $res_user = $menber->where(array('uid'=>session('uid')))->select();
            if($res_user[0]['pwd2']!=$_POST['pwd']){
                echo "<script>alert('密码不正确');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/mySwitchMoney';";
                echo "</script>";
                exit;
            }
            $res_user1 = $menber->where(array('name'=>$_POST['name']))->select();
            if(!$res_user1[0]){
                echo "<script>alert('账户不正确');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/mySwitchMoney';";
                echo "</script>";
                exit;
            }
            if($res_user[0]['chargebag']<$_POST['num']){
                echo "<script>alert('充值钱包余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/mySwitchMoney';";
                echo "</script>";
                exit;
            }
            if($res_user[0]['name']==$_POST['name']){
                echo "<script>alert('自己不能给自己转账');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/mySwitchMoney';";
                echo "</script>";
                exit;
            }
            //处理自己
            $chargebagmy = $res_user[0]['chargebag'] -$_POST['num'];
            $menber->where(array('uid'=>session('uid')))->save(array('chargebag'=>$chargebagmy));
            $income =M('incomelog');
            $logdata['type'] =4 ;
            $logdata['state'] =2 ;
            $logdata['reson'] ='转账' ;
            $logdata['addymd'] =date('Y-m-d',time()) ;
            $logdata['addtime'] =date('Y-m-d H:i:s',time()) ;
            $logdata['orderid'] =$res_user1[0]['uid'] ;
            $logdata['userid'] =session('uid');
            $logdata['income'] =$_POST['num'];
            $income->add($logdata);
            //处理他人
            $chargebaghim = $res_user1[0]['chargebag'] +$_POST['num'];
            $menber->where(array('name'=>$_POST['name']))->save(array('chargebag'=>$chargebaghim));
            $logdata['type'] =4 ;
            $logdata['state'] =1 ;
            $logdata['reson'] ='转账' ;
            $logdata['addymd'] =date('Y-m-d',time()) ;
            $logdata['addtime'] =date('Y-m-d H:i:s',time()) ;
            $logdata['orderid'] =session('uid');
            $logdata['userid'] =$res_user1[0]['uid'];
            $logdata['income'] =$_POST['num'];
            $income->add($logdata);
            echo "<script>alert('转账成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/User/mySwitchMoney';";
            echo "</script>";
            exit;
        }
        $this->display();
    }

    public function regNext(){  //注册下级
        if($_POST['name']&&$_POST['pwd']){
            if(preg_match("/^1[34578]{1}\d{9}$/",$_POST['name'])){

            }else{
                echo "<script>alert('请用手机号码注册');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/regNext';";
                echo "</script>";
                exit;
            }
//            if($_POST['pwd']!=$_POST['pwd1']){
//                echo "<script>alert('密码不一致');";
//                echo "window.location.href='".__ROOT__."/index.php/Home/User/regNext';";
//                echo "</script>";
//                exit;
//            }
            $menber =M('menber');
            //  用户名
            $res_user =$menber->where(array('name'=>$_POST['name']))->select();
            if($res_user[0]){
                echo "<script>alert('用户名已存在');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/regNext';";
                echo "</script>";
                exit;
            }
            //  金额
            $res_menber =$menber->where(array('uid'=>session('uid')))->select();
            if($res_menber[0]['chargebag']<$_POST['radio1']){
                echo "<script>alert('充值钱包余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/regNext';";
                echo "</script>";
                exit;
            }
            $data['name'] =$_POST['name'];
            $data['pwd'] =$_POST['pwd'];
            $data['pwd2'] =$_POST['pwd1'];
            $data['type'] =0;
            $data['fuid'] =session('uid');
            $data['addtime'] =date('Y-m-d H:i:s',time());
            $data['addymd'] = date('Y-m-d',time());
            $data['chargebag'] =$_POST['radio1'];
            $data['incomebag'] =0;
            $res =$menber->add($data);
            if($res){
                $chargebag =$res_menber[0]['chargebag']-$_POST['radio1'];
                $menber->where(array('uid'=>session('uid')))->save(array('chargebag'=>$chargebag));
                // 上家金额记录
                $datas['state'] = 2;
                $datas['reson'] = "注册下级";
                $datas['type'] = 5;
                $datas['addymd'] = date('Y-m-d',time());
                $datas['addtime'] = date('Y-m-d H:i:s',time());
                $datas['orderid'] = $res;
                $datas['userid'] = session('uid');
                $datas['income'] = $_POST['radio1'];
                $this->savelog($datas);
                //下家金额记录
                $data1['state'] = 1;
                $data1['reson'] = "注册收入";
                $data1['type'] = 1;
                $data1['addymd'] = date('Y-m-d',time());
                $data1['addtime'] = date('Y-m-d H:i:s',time());
                $data1['orderid'] = session('uid');     // 注册上家
                $data1['userid'] =$res;
                $data1['income'] = $_POST['radio1'];
                $this->savelog($data1);
            }
            echo "<script>alert('用户".$_POST['name']."注册成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/User/regNext';";
            echo "</script>";
            exit;

        }
//        else{
//            echo "<script>alert('户名和密码不为空');";
//            echo "window.location.href='".__ROOT__."/index.php/Home/User/regNext';";
//            echo "</script>";
//            exit;
//        }

        $this->display();
    }

    private function changetype($num){
        if($num==800){
            return 1;
        }
        if($num==1500){
            return 2;
        }
        if($num==3000){
            return 3;
        }
        if($num==6000){
            return 4;
        }
    }

    private function savelog($data){
        $incomelog =M('incomelog');
        return $incomelog->add($data);
    }

    public function payRecord(){  //充值记录
        $incomelog =M('incomelog');
        $condtion['userid'] =session('uid');
        $condtion['type']=2;
        $condtion['state']=1;
        $res = $incomelog->order('id DESC')->where($condtion)->select();
        $this->assign('res',$res);
        $this->display();
    }

    public function cancel(){
        $incomelog =M('incomelog');
        $condtion['uid'] =session('uid');
        $condtion['id']  =$_GET['id'];
        $res = $incomelog->where($condtion)->select();
        $income =$res[0]['income'];
        if($income<=0){
            echo "<script>alert('取消失败');";
            echo "window.location.href='".__ROOT__."/index.php/Home/User/cashRecord';";
            echo "</script>";
            exit;
        }
        $menber =M('menber');
        $useinfo = $menber->where(array('uid'=>session('uid')))->select();
        $res_usermoney = $useinfo[0]['incomebag']+$income;
        $menber->where(array('uid'=>session('uid')))->save(array('incomebag'=>$res_usermoney));
        $incomelog->where(array('id'=>$_GET['id']))->save(array('state'=>3));
        echo "<script>alert('操作成功');";
        echo "window.location.href='".__ROOT__."/index.php/Home/User/cashRecord';";
        echo "</script>";
        exit;
    }

    public function cashRecord(){  //提现记录
        $incomelog =M('incomelog');
        $condtion['userid'] =session('uid');
        $condtion['type']=3;
//        $condtion['state']=2;
        $res = $incomelog->order('id DESC')->where($condtion)->select();
        $this->assign('res',$res);
        $this->display();
    }

    public function cashDetail(){  //资金明细
        $incomelog =M('incomelog');
        $condtion['userid'] =session('uid');
        $condtion['type']   =array('gt',0);
        $res = $incomelog->order('id DESC')->where($condtion)->select();
        $this->assign('res',$res);
        $this->display();
    }

    public function switchMoney(){  //钱包互转
        if($_POST['chargebag']){  // 处理充值钱包转入到收益钱包
            if($_POST['chargebag']<=0){
                echo "<script>alert('请输入正确金额');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/switchMoney';";
                echo "</script>";
                exit;
            }
            // 处理充值钱包转入到收益钱包
            $menber =M('menber');
            $useinfo =$menber->where(array('uid'=>session('uid')))->select();
            if($useinfo[0]['chargebag']>$_POST['chargebag']){
                $chargebag =$useinfo[0]['chargebag']-$_POST['chargebag'];
                $data['chargebag']=$chargebag;
                $incomebag =$useinfo[0]['incomebag']+$_POST['chargebag'];
                $data['incomebag']=$incomebag;
                $menber->where(array('uid'=>session('uid')))->save($data);
                echo "<script>alert('转入成功');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/index';";
                echo "</script>";
                exit;
            }else{
                echo "<script>alert('账户余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/switchMoney';";
                echo "</script>";
                exit;
            }
        }
        //收益钱包转入到充值钱包
        if($_POST['incomebag']){
            if($_POST['incomebag']<=0){
                echo "<script>alert('请输入正确金额');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/switchMoney';";
                echo "</script>";
                exit;
            }
            // 处理充值钱包转入到收益钱包
            $menber =M('menber');
            $useinfo =$menber->where(array('uid'=>session('uid')))->select();
            if($useinfo[0]['incomebag']>$_POST['incomebag']){
                $chargebag =$useinfo[0]['chargebag']+$_POST['incomebag'];
                $data['chargebag']=$chargebag;
                $incomebag =$useinfo[0]['incomebag']-$_POST['incomebag'];
                $data['incomebag']=$incomebag;
                $menber->where(array('uid'=>session('uid')))->save($data);
                echo "<script>alert('转入成功');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/index';";
                echo "</script>";
                exit;
            }else{
                echo "<script>alert('账户余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/switchMoney';";
                echo "</script>";
                exit;
            }
        }
        $this->display();
    }

    public function modifyPwd(){  //修改密码
        if($_POST['oldpwd']){
            $menber =M('menber');
            $men_res = $menber->where(array('uid'=>session('uid')))->select();
            if($men_res[0]['pwd']==$_POST['oldpwd']){
                if($_POST['pwd1']){
                    if($_POST['pwd']==$_POST['pwd1']){
                        if($_POST['pwd2']){
                            $data['pwd2'] =$_POST['pwd2'];
                        }
                        $data['pwd'] =$_POST['pwd'];
                        $menber->where(array('uid'=>session('uid')))->save($data);
                        echo "<script>alert('修改成功');";
                        echo "window.location.href='".__ROOT__."/index.php/Home/User/modifyPwd';";
                        echo "</script>";
                        exit;
                    }else{
                        echo "<script>alert('两次密码不一致');";
                        echo "window.location.href='".__ROOT__."/index.php/Home/User/modifyPwd';";
                        echo "</script>";
                        exit;
                    }
                }
                if($_POST['pwd2']){
                    $data['pwd2'] =$_POST['pwd2'];
                    $menber->where(array('uid'=>session('uid')))->save($data);
                    echo "<script>alert('修改成功');";
                    echo "window.location.href='".__ROOT__."/index.php/Home/User/modifyPwd';";
                    echo "</script>";
                    exit;
                }
            }else{
                echo "<script>alert('密码错误');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/modifyPwd';";
                echo "</script>";
                exit;
            }
        }
        $this->display();
    }

    public function jieshao(){
        $article =M('article');
        $res= $article->where(array('aid'=>1))->select();
        $this->assign('res',$res[0]);
        $this->display();
    }

    public function gonggao(){
        $article =M('article');
        $res= $article->where(array('aid'=>$_GET['id']))->select();
        $this->assign('res',$res[0]);
        $this->display();
    }

    public function adList(){
        $article =M('article');
        $res= $article->where(array('type'=>1))->order('aid DESC')->select();
        $this->assign('res',$res);
        $this->display();
    }
}