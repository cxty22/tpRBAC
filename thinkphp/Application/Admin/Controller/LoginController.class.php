<?php
namespace Admin\Controller;
use Think;
use Think\Controller;
use Org\Util\Rbac;
class loginController extends Controller {
    public function indexAction() {
        $this->assign('verifyErr', session('verifyErr'));
        $this->assign('userErr', session('userErr'));
        $this->assign('pwdErr', session('pwdErr'));
        $this->display();
        session('verifyErr', null);
        session('userErr', null);
        session('pwdErr', null);
    }
    public function loginAction() {
        if(IS_POST){
            $Verify = new \Think\Verify();
            if(!$Verify->check(I('post.verify'))){
                //处理验证码错误
                session('verifyErr', '验证码错误');
                redirect(U('index'));
                return;
            }
            if(!empty($_POST)){
                $User = M('user');
                $data=$User->create();
                //dump($data);die;
                //$pwd = md5(I('post.password'));
                $username = $data['username'];
                $pwd = I('post.password');
                $info = $User->where(array(username => I('post.username')))->find();
                if(!$info){
                    session('userErr', '用户名错误');
                    redirect(U('index'));
                    return;
                }else{
                    if($info['password'] === $pwd){
                        $data = array(
                                'id' => $info['id'],
                                'logintime' => time(),
                                'loginip' => get_client_ip(),
                            );
                        M('user')->save($data);//更新用户登陆信息
                        session(C('USER_AUTH_KEY'),$info['id']);
                        if($username == C('RBAC_SUPERADMIN')){
                            session(C('ADMIN_AUTH_KEY'), true);
                          }
                        Rbac::saveAccessList();
                        //dump($_SESSION);die;
                        redirect(U('Admin/index/index', '', ''));
                        return;
                    }
                    //处理密码错误 
                    session('pwdErr', '密码错误');
                    redirect(U('index'));
                    return;
                }
            }
        }
        $this->display();
        /*if(IS_POST){
            $Verify = new \Think\Verify();
            if($Verify->check(I('verify'))){
                if(I('username') != '' && I('password') != ''){
                    $data = array (
                        $username => I('username')
                    );
                    $password = I('password');
                    $Model = new \Think\Model();
                    $user = $Model->query('select * from user where username = "'.I('username').'"');
                    //$user = M('user')->where($data)->find();
                    if($user) {
                        if($user[0]['password'] == md5($password)){
                             session('uid', $user[0]['id']);
                             session('username', $user[0]['username']);
                             redirect(U('Home/index/index', '', ''));
                        }else{
                            //密码错误
                            $pwderr = '密码错误';
                            $this->assign('pwderr', $pwderr);
                            $this->display();
                        }
                    }else {
                        //用户名不存在
                        $nouser = ' 用户名不存在';
                        $this->assign('nouser', $nouser);
                        $this->display();
                    }
                }
            }else{
                //验证码错误
                $verifyErr = '验证码错误';
                $this->assign('verifyErr', $verifyErr);
                $this->display();
            }
        }else {
            $this->display();
        }*/
    }
    public function verifyAction() {
        $Verify = new Think\Verify(C('verifyconfig'));
        $Verify->entry();
    }
    public function logoutAction() {
        session(null);
        $this->success(U('index'));
    }
}