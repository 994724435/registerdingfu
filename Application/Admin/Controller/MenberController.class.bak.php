<?php
namespace Admin\Controller;
use Think\Controller;
class MenberController extends CommonController {
	public function select(){
        $menber = M('menber');
        if($_GET['name']){
            $map['name']=array('like','%'.$_GET['name'].'%');
            $users= $menber->where($map)->select();
        }else{
            $users= $menber->select();
        }
        $this->assign('users',$users);
        $this->display();
    }

    public function charge(){
        $menber = M('menber');
        $users= $menber->select();
        if($_POST['user']&&$_POST['num']){
            if($_POST['num']<=0){
                echo "<script>alert('请输入正确金额');window.location.href = '".__ROOT__."/index.php/Admin/Menber/charge';</script>";exit();
            }
            $user = $menber->where(array('uid'=>$_POST['user']))->select();
            $chargebag= $user[0]['chargebag']+$_POST['num'];
            $res = $menber->where(array('uid'=>$_POST['user']))->save(array('chargebag'=>$chargebag));

            $datas['state'] = 1;
            $datas['reson'] = "充值";
            $datas['type'] = 2;
            $datas['addymd'] = date('Y-m-d',time());
            $datas['addtime'] = date('Y-m-d H:i:s',time());
            $datas['orderid'] = $_SESSION['uname'];
            $datas['userid'] = $_POST['user'];
            $datas['income'] = $_POST['num'];
            $comelog =M('incomelog');
            $comelog->add($datas);
            if($res){
                $message =$user[0]['name'].'成功充值'.$_POST['num'].'元';
                echo "<script>alert('$message');";
                echo "window.location.href = '".__ROOT__."/index.php/Admin/Menber/charge';";
                echo "</script>";
                exit;
            }

        }
        $this->assign('users',$users);
        $this->display();
    }

    public function usermessage(){
        $incomelog = M('incomelog');
//        if($_GET['productid']){
////            $map['name']=array('like','%'.$_GET['name'].'%');
//            $map['productid'] =$_GET['productid'];
//        }
        if($_GET['uid']){
            $map['userid'] =$_GET['uid'];
        }
        if($_GET['type']){
            $map['type'] =$_GET['type'];
        }
        if($_GET['mindate']&&$_GET['maxdate']){
            $map['addymd'] =array(array('elt',$_GET['maxdate']),array('egt',$_GET['mindate']),'and');;
        }
        $users= $incomelog->order('userid asc')->where($map)->select();

        $this->assign('users',$users);
        $this->display();
    }

    public function userupdate(){
        $menber = M('menber');
        if($_POST){
            $data['name'] =$_POST['name'];
            $data['address'] =$_POST['address'];
            $data['sex'] =$_POST['sex'];
            $data['ismanager'] =$_POST['ismanager'];
            $data['group'] =$_POST['group'];
            $result = $menber->where(array('id'=>$_GET['id']))->save($data);
            if($result){
                echo "<script>alert('更新成功');window.location.href = '".__ROOT__."/index.php/Admin/Menber/select';</script>";exit();
            }else{
                echo "<script>alert('更新失败');window.location.href = '".__ROOT__."/index.php/Admin/Menber/select';</script>";exit();
            }
        }
        $user= $menber->where(array('id'=>$_GET['id']))->select();
        $this->assign('user',$user[0]);
        $this->display();
    }

//    删除用户
    public function userdelete(){
        $menber = M('menber');
        $result = $menber->where(array('id'=>$_GET['id']))->delete();
        if($result){
            echo "<script>window.location.href = '".__ROOT__."/index.php/Admin/Menber/select';</script>";exit();
        }else{
            echo "<script>alert('更新失败');window.location.href = '".__ROOT__."/index.php/Admin/Menber/select';</script>";exit();
        }
    }

    //充值审核
    public function chargesheng(){
        $income =M('incomelog');
        $data['p_incomelog.type'] =0;
        $data['p_incomelog.state'] =0;
        $data['p_incomelog.reson'] ='充值';
        $data['p_incomelog.addtime'] =array('gt',0);
        $result =$income->field('p_incomelog.addtime as addtimes,p_incomelog.addymd as addymds,p_menber.name,p_incomelog.userid,income,id')->join('p_menber ON p_incomelog.userid=p_menber.uid')->where($data)->select();
        $this->assign('res',$result);
        $this->display();
    }

    public function ischarge(){
        $income =M('incomelog');
        $result = $income->where(array('id'=>$_GET['id']))->select();
        if($result[0]){
            if($_GET['state']==1){
                $data['type'] =2;
                $data['state'] =1;
                $income->where(array('id'=>$_GET['id']))->save($data);
                $menber =M('menber');
                $user= $menber->where(array('uid'=>$result[0]['userid']))->select();
                $chargebag =$user[0]['chargebag']+$result[0]['income'];
                $menber->where(array('uid'=>$result[0]['userid']))->save(array('chargebag'=>$chargebag));
                echo "<script>alert('更新成功');window.location.href = '".__ROOT__."/index.php/Admin/Menber/chargesheng';</script>";exit();
            }
            if($_GET['state']==2){
                $data['type'] =2;
                $data['state'] =0;
                $income->where(array('id'=>$_GET['id']))->save($data);
                echo "<script>window.location.href = '".__ROOT__."/index.php/Admin/Menber/chargesheng';</script>";exit();
            }
        }
    }

    public function tixiansheng(){
        $income =M('incomelog');
        $data['p_incomelog.type'] =3;
        $data['p_incomelog.state'] =0;
        $data['p_incomelog.addtime'] =array('gt',0);
        $result =$income->field('p_incomelog.addtime as addtimes,p_incomelog.addymd as addymds,p_menber.name,p_incomelog.userid,income,id,orderid,reson')->join('p_menber ON p_incomelog.userid=p_menber.uid')->where($data)->select();

        foreach($result as $k=>$v){
            if($v['orderid']){
                $account =explode(',',$v['orderid']);
                $result[$k]['accountname'] =$account[0];
                $result[$k]['accountnum'] =$account[1];
                $result[$k]['carnum'] =$account[2];
                $result[$k]['carmame'] =$account[3];
                $result[$k]['carhang'] =$account[4];
                $result[$k]['caraddr'] =$account[5];
            }
        }
//        print_r($result);die;
        $this->assign('res',$result);
        $this->display();
    }

    public function istixian(){
        $income =M('incomelog');
        $result = $income->where(array('id'=>$_GET['id']))->select();

        if($result[0]){
            if($_GET['state']==1){
                // 提取 70 %
                $income =$result[0]['income'];
                $mine =  bcmul($income,0.7,2);
                $left =  bcmul($income,0.3,2);

                // 30% 放入复投钱包
                $userid = $result[0]['userid'];
                $menber = M('menber');
                $useresult = $menber->where(array('uid'=>$userid))->select();
                $recast =  bcadd($useresult[0]['recast'],$left,2);
                $menber->where(array('uid'=>$userid))->save(array('recast'=>$recast));

                $data['income']=$mine;
                $data['type'] =3;
                $data['state'] =2;
                $income->where(array('id'=>$_GET['id']))->save($data);
                echo "<script>alert('更新成功');window.location.href = '".__ROOT__."/index.php/Admin/Menber/tixiansheng';</script>";exit();
            }
            if($_GET['state']==2){
                $menber =M('menber');
                $user= $menber->where(array('uid'=>$result[0]['userid']))->select();
                $chargebag =$user[0]['chargebag']+$result[0]['income'];
                $menber->where(array('uid'=>$result[0]['userid']))->save(array('chargebag'=>$chargebag));

                $data['type'] =3;
                $data['state'] =3;
                $income->where(array('id'=>$_GET['id']))->save($data);
                echo "<script>window.location.href = '".__ROOT__."/index.php/Admin/Menber/tixiansheng';</script>";exit();
            }
        }
    }
}



 ?>