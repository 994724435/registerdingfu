<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
	public function login(){
        if(IS_POST){
            $name = I('post.name');
            $pwd = I('post.pwd');
            $user = M('user');
            $result= $user->where(array('name'=>$name,'password'=>$pwd))->select();
            if($result[0]){
                $_SESSION['uname']=$name;
                echo "<script>window.location.href = '".__ROOT__."/index.php/Admin/Index/main';</script>";
            }else{
                    echo "<script>alert('用户名或密码不存在');";
                    echo "window.history.go(-1);";
                    echo "</script>";
                }
        }
        $this->display();
    }

    public function logOut(){
        session('uname',null);
        cookie('is_login',null);
        echo "<script>window.location.href = '".__ROOT__."/index.php/Admin/User/login';</script>";
    }

    public function crontab(){  //我的团队
        $incomelog =M('incomelog');
        $res = $incomelog->where(array('addymd'=>date('Y-m-d'),'type'=>1,'reson'=>'每日利息'))->select();
        if($res[0]){
            print_r('今日受益已结算');die;
        }
        $menber =M('menber');
        //所有
        $alluser = $menber->select();
        foreach($alluser as $key=>$val){
            //自己受益
            $res_own = $this->getusernums($val['uid'],$val['type']);
            if(!$res_own){
                continue;
            }
            $imcometype = $this->changetype($val['type']);
            $imcomelinv =$this->changemylinv($val['type']);
            $income =bcmul($imcometype,$imcomelinv,2);
            $data['state'] = 1;
            $data['reson'] = "每日利息";
            $data['type'] = 1;
            $data['addymd'] = date('Y-m-d',time());
            $data['addtime'] = date('Y-m-d H:i:s',time());
            $data['orderid'] = 0;     // 每日利息
            $data['userid'] =$val['uid'];
            $data['income'] = $income;
            if($income>0){
                $this->savelog($data);
            }
            $userincomebag =bcadd($val['incomebag'],$income,2);
            $menber->where(array('uid'=>$val['uid']))->save(array('incomebag'=>$userincomebag));
            // 一级
            $one = $menber->where(array('fuid'=>$val['uid']))->select();
            if($one[0]){
                foreach($one as $k1=>$v1){
                    $imcometypeone = $this->changetype($v1['type']);   // 下级的
                    $imcomelinvone =$this->changemyone($val['type']);   // 自己的等级
                    $incomeone =bcmul($imcometypeone,$imcomelinvone,2);
                    if($incomeone<=0){
                        continue;
                    }
                    $data1['state'] = 1;
                    $data1['reson'] = "一级下线受益";
                    $data1['type'] = 1;
                    $data1['addymd'] = date('Y-m-d',time());
                    $data1['addtime'] = date('Y-m-d H:i:s',time());
                    $data1['orderid'] = 0;     // 一级下线受益
                    $data1['userid'] =$val['uid'];
                    $data1['income'] = $incomeone;

                    $this->savelog($data1);
                    $userones= $menber->where(array('uid'=>$val['uid']))->select();
                    $userone =bcadd($userones[0]['incomebag'],$incomeone,2);
                    $menber->where(array('uid'=>$val['uid']))->save(array('incomebag'=>$userone));
                }

                foreach($one as $k2=>$v2){
                    $two =  $menber->where(array('fuid'=>$v2['uid']))->select();
                    if($two[0]){
                        foreach($two as $k3=>$v3){
                            $imcometypetwo = $this->changetype($v3['type']);
                            $imcomelinvtwo =$this->changemytwo($val['type']);
                            $incometwo =bcmul($imcometypetwo,$imcomelinvtwo,2);
                            if($incometwo==0){
                                continue;
                            }
                            $data1['state'] = 1;
                            $data1['reson'] = "二级下线受益";
                            $data1['type'] = 1;
                            $data1['addymd'] = date('Y-m-d',time());
                            $data1['addtime'] = date('Y-m-d H:i:s',time());
                            $data1['orderid'] = 0;     // 二级下线受益
                            $data1['userid'] =$val['uid'];
                            $data1['income'] = $incometwo;
                            $this->savelog($data1);
                            $userones= $menber->where(array('uid'=>$val['uid']))->select();
                            $userone =bcadd($userones[0]['incomebag'],$incometwo,2);
                            $menber->where(array('uid'=>$val['uid']))->save(array('incomebag'=>$userone));
                        }
                    }
                }
            }
        }
        echo '成功';
    }

    /**
     * @return int
     * 是否有每日收益
     */
    public function getusernums($userid,$type){
//        $userid =1;
//        $type = 1;
        $income =M('incomelog');
        $daycomelogs = $income->where(array('type'=>1,'userid'=>$userid,'reson'=>'每日利息'))->select();
        $daycome =0;
        foreach($daycomelogs as $k=>$v){
            $daycome=bcadd($daycome,$v['income'],2);
        }
        $onecome =0;
        $onelog =$income->where(array('type'=>1,'userid'=>$userid,'reson'=>'一级下线受益'))->select();
        foreach($onelog as $k1=>$v1){
            $onecome=bcadd($onecome,$v1['income'],2);
        }
        $twocome =0;
        $twolog =$income->where(array('type'=>1,'userid'=>$userid,'reson'=>'二级下线受益'))->select();
        foreach($twolog as $k2=>$v2){
            $twocome=bcadd($twocome,$v2['income'],2);
        }
        $all =bcadd($daycome,$onecome,2); //
        $all =bcadd($all,$twocome,2);
        $maycome =$this->getlogtimes($type);

        if($all>=$maycome){
            return 0;
        }else{
            return 1;
        }
    }

    private function getlogtimes($type){  // tu do
        if($type==1){
            return 1600;
        }elseif($type==2){
            return 3000;
        } elseif($type==3){
            return 6000;
        }elseif($type==4){
            return 12000;
        }else{
            return 0;
        }
    }

    //一级利率
    private function changemyone($num){
        if($num==1){
            return 0.007;
        }elseif($num==2){
            return 0.008;
        } elseif($num==3){
            return 0.009;
        }elseif($num==4){
            return 0.01;
        }else{
            return 0;
        }
    }
    //二级利率
    private function changemytwo($num){
        if($num==1){
            return 0.005;
        }elseif($num==2){
            return 0.006;
        }elseif($num==3){
            return 0.007;
        } elseif($num==4){
            return 0.008;
        }else{
            return 0;
        }
    }

    private function changemylinv($num){
        if($num==1){       //6.4
            return 0.008;
        }
        if($num==2){       //15
            return 0.01;
        }
        if($num==3){       //36
            return 0.012;
        }
        if($num==4){       //90
            return 0.015;
        }
    }
    private function savelog($data){
        $incomelog =M('incomelog');
        return $incomelog->add($data);
    }

    private function changetype($num){
        if($num==1){
            return 800;
        }
        if($num==2){
            return 1500;
        }
        if($num==3){
            return 3000;
        }
        if($num==4){
            return 6000;
        }
    }

    public function crantabUserIncome(){
        $menber =M('menber');
        $income =M('incomelog');
        if($_GET['uid']){
            $map['uid']  = $_GET['uid'];
        }else{
            $map['uid']  = array('gt',9);
        }
        $result_user = $menber->where($map)->select();
        foreach($result_user as $k=>$v){
            $chargebag = $v['chargebag'];
            $incomebag = $v['incomebag'];
            $allIncome =bcadd($chargebag,$incomebag,2);  // 所有钱包

            $daycomelogs = $income->where(array('state'=>1,'userid'=>$v['uid']))->select();
            $userIncome = 0;
            foreach($daycomelogs as $k1=>$v1){         // 收益
                $userIncome =bcadd($userIncome,$v1['income'],2);
            }
            if($_GET['uid']){
                print_r("每日收益==》".$userIncome);
            }
            $dayoutlogs = $income->where(array('state'=>2,'userid'=>$v['uid']))->select();

            $userOut = 0;                              // 支出
            foreach($dayoutlogs as $k2=>$v2){
                $userOut =bcadd($userOut,$v2['income'],2);
            }
            if($_GET['uid']){
                print_r("<br>总支出==》".$userOut);
            }
            $allIncomesUser =bcsub($userIncome,$userOut,2);      // 总收入
            if($allIncomesUser < 0){
                print_r("userID".$v['uid']."收入日志异常");
            }
            $layout =$allIncomesUser-$allIncome;
            if($layout!=0){
               print_r("用户ID：".$v['uid']."<br>");
               print_r("钱包总额：".$allIncome."<br>");
               print_r("收入总额：".$allIncomesUser."<br><br><br>");
            }
        }
//        print_r($result_user);die;
    }
}



 ?>