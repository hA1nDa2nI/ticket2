<?php
/**
 * Created by PhpStorm.
 * User: hA1nDa2nI
 * Date: 2019/6/21
 * Time: 12:51
 */

namespace Home\Model;
use Think\Model\ViewModel;

class DetailViewModel extends ViewModel
{
    public $viewFields=array(
        'ord'=>array('ordno','ordtime','quantity','price','addprice'),
        'user'=>array('id','username','tel','email','img','_on'=>'user.id=ord.user_id'),
        'detail'=>array('detail_id','intro','time','address','_on'=>'detail.detail_id=ord.detail_id')
    );
}
