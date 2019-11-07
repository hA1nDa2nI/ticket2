<?php
namespace Home\Controller;
use Home\Model\DetailViewModel;
use Think\Controller;
use Think\Page;
use Think\Model;
header('Content-type:text/html;charset=utf-8');
class IndexController extends Controller {
    public function checkLogin(){
        if (!session('user.userId')){
            $this->error('请先登录!',U('User/login'),1);
        }
    }
    public function logout(){
        if (!session('user.userId')){
            $this->error('请登陆!');
        }
        session_destroy();
        echo"<script>alert('退出成功!');history.go(-1);</script>";
    }
    public function index(){
        $m=M('detail');
        $data=$m->select();
        $this->assign(data,$data);
        $num=$m->count();
        $p=new Page($num,10);
        $show=$p->show();
        $list=$m->order('detail_id desc')->limit($p->firstRow.','.$p->listRows)->select();
        $this->assign('page',$show);
        $this->assign('list',$list);
        $date=date('Y.m.d');
        $detail['time'] = array('like', "$date%");
        $ri_num=$m->where($detail)->count();
        $ri_p=new Page($ri_num,4);
        $ri_show=$ri_p->show();
        $ri=$m->where($detail)->order('time desc')->select();
        $this->assign('date',$date);
        $this->assign('num',$ri_num);
        $this->assign('ri_show',$ri_show);
        $this->assign('ri',$ri);
        $this->display();
    }
    public function do_index(){
        $search=I('post.search');
        $m=M('detail');
        $data=$m->where('LOCATE("'.$search.'","name")')->select();
        print_r($data);
    }
    public function purchase(){
        $this->checkLogin();
        $id=I('get.id');
        $m=M('detail');
        $data=$m->where("detail_id='%s'",$id)->select();
        $p=$data[0][price];
        $price=explode(",",$p);
        $this->assign(price,$price);
        $this->assign(data,$data);
        $this->display();
    }
    public function do_purchase(){
        $id=I('get.id');
        $m=M('ord');
        $quantity=I('post.quantity');
        $price=I('post.price');
        $addprice=$quantity * $price;
        $data=array(
            'user_id'=>session('user.userId'),
            'detail_id'=>$id,
            'price'=>$price,
            'quantity'=>$quantity,
            'addprice'=>$addprice,
        );
        $m->add($data);
        $this->success("购买成功!", U('index'), 1);
    }
    public function upload(){
        $this->checkLogin();
        if (session('user.username')!='zjm')
            echo"<script>alert('非管理员操作(zjm)，不能上传！');history.go(-1);</script>";
        $this->display();
    }
    public function do_upload(){
        $upload = new \Think\Upload();
        $upload->maxSize=3145728 ;
        $upload->exts=array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath='./Public/';
        $upload->savePath='Image/index/img1/';
        $upload->autoSub=false;
        $name=I('post.name');
        $intro=I('post.intro');
        $price=I('post.price');
        $time=I('post.time');
        $address=I('post.address');
        $m=M('detail');
        if ($_FILES['file']['name'])
        {
            $info=$upload->upload();
            if (!$info)
            {
                $this->error($upload->getError() );
            }
            else
            {
                $_POST["file"] = $info["file"]["savepath"] . $info["file"]["savename"];
                $data=array(
                    'name'=>$name,
                    'intro'=>$intro,
                    'price'=>$price,
                    'time'=>$time,
                    'address'=>$address,
                    'img' => $info["file"]["savename"]
                );
                $m->add($data);
                $this->success("上传成功,2秒后跳转到页面!", U('index'), 2);
            }
        }
    }
    public function detail(){
        $this->checkLogin();
        $m=new DetailViewModel();
        $num=$m->count();
        $p=new Page($num,4);
        $show=$p->show();
        $list=$m->order('ordtime desc')->limit($p->firstRow.','.$p->listRows)->select();
        $this->assign('page',$show);
        $this->assign('list',$list);
        $this->display();
    }
    public function delete(){
        $ordid=I('get.ordid');
        $detail_id=I('get.detail_id');
        if ($ordid==''||$detail_id==''){
            $this->error('缺少参数');
        }
        $this->checkLogin();
        $m=new Model('ord');
        if (!$m->where(array('ord_id'=>$ordid,'user_id'=>session('user.userId'),'detail_id'=>$detail_id))->delete()){
            $this->error('非本人操作，取消失败！',U('index/detail'));
        }
        $this->success('取消成功！',U('detail'));
    }
    public function update(){
        $detail_id=I('get.detail_id');
        $ord_id=I('get.ordid');
        $user_id=I('get.userid');
        if ($ord_id==''||$user_id==''||$detail_id==''){
            $this->error('缺少参数');
        }
        $this->checkLogin();
        $l=M('detail');
        $m=M('user');
        $n=M('ord');
        if ($user_id!=session('user.userId'))
            $this->error('非本人操作，不能修改！',U('index/detail'));
        $data=$l->where("detail_id='%s'",$detail_id)->select();
        $p=$data[0][price];
        $price=explode(",",$p);
        $this->assign(price,$price);
        $list1=$m->where("id='%s'",$user_id)->select();
        $list2=$n->where("ordno='%s'",$ord_id)->select();
        $this->assign(list1,$list1);
        $this->assign(list2,$list2);
        $this->display();
    }
    public function do_update(){
        $user_id=I('get.userid');
        $ordno=I('get.ordid');
        $name=I('post.name');
        $tel=I('post.tel');
        $email=I('post.email');
        $price=I('post.price');
        $quantity=I('post.quantity');
        $addprice=$quantity * $price;
        $user=array(
            'id'=>$user_id,
            'username'=>$name,
            'tel'=>$tel,
            'email'=>$email
        );
        $ord=array(
            'ordno'=>$ordno,
            'price'=>$price,
            'quantity'=>$quantity,
            'addprice'=>$addprice
        );
        $m=M('user');
        $n=M('ord');
        $m->save($user);
        $n->save($ord);
        $this->success('修改成功！',U('detail'));
    }
}