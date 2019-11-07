<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
header('Content-type:text/html;charset=utf-8');
class UserController extends Controller {
    public function register(){
        $this->display();
    }
    public function do_register()
    {
        $upload = new \Think\Upload();
        $upload->maxSize = 3145728;
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath = './Public/';
        $upload->savePath = 'Image/user/pic/';
        $upload->autoSub = false;
        $uname = I('post.uname');
        $pwd = I('post.pwd');
        $email = I('post.email');
        $tel = I('post.tel');
        $sex = I('post.sex');
        $code = I('post.code');
        if ($sex == 1)
            $sex = '男';
        else
            $sex = '女';
        $m = M('user');
        if ($uname == "" || $pwd == "" || $email == "" || $tel == "" || $sex == "" || $code == "")
            $this->error("请输入完整信息！", U('login'), 2);
        elseif (check_verify($code) === false)
            $this->error("验证码输入错误，请重新输入！", U('register'), 2);
        $user=$m->where(array('username'=>$uname))->find();
        if (!empty($user)){
            $this->error('用户已存在');
        }
        if ($_FILES['file']['name']) {
            $info=$upload->upload();
            if (!$info) {
                $this->error($upload->getError() );
            }else {
                $_POST["file"] = $info["file"]["savepath"] . $info["file"]["savename"];
                $data = array(
                    'username' => $uname,
                    'password' => $pwd,
                    'email' => $email,
                    'tel' => $tel,
                    'sex' => $sex,
                    'img' => $info["file"]["savename"]
                );
                $m->add($data);
                $this->success("注册成功!", U('login'), 1);
            }
        }
    }
    public function verify(){
        $config = array(
            'imageW'=>150,
            'imageH'=>45,
            'fontSize'=>20,
            'length'=>4,
            'bg'=>array(254,214,100),
            'useNoise'=>false,
            'codeSet'=>'0123456789'
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    public function login(){
        $this->display();
    }
    public function do_login(){
        $uname=I('post.uname');
        $pwd=I('post.pwd');
        $code=I('post.code');
        $m=M('user');
        $data=$m->where("username='%s'",$uname)->find();
        if($uname==""||$pwd==""||$code=="")
            $this->error("用户名或密码或验证码为空，请重新输入！",U('login'),2);
        elseif(check_verify($code)===false)
            $this->error("验证码输入错误，请重新输入！",U('login'),2);
        elseif($data==null)
            $this->error("用户不存在，请重新输入！",U('login'),2);
        elseif ($data[password]!=$pwd)
            $this->error("密码不正确，请重新输入！",U('login'),2);
        else {
            session('user.userId', $data['id']);
            session('user.username', $data['username']);
            $this->success("登录成功!",U('index/index'),1);
        }
    }
}