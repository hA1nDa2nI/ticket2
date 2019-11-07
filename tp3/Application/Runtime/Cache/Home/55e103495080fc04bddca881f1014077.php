<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PURCHASE</title>
    <link rel="stylesheet" href="/tp3/zjm/Public/Css/purchase/purchase.css" />
</head>
<body>
<div id="container">
    <div id="top">
        <div id="logo">
            <img src="/tp3/zjm/Public/Image/index/1.gif" height="120">
        </div>
        <div id="shu">
            <div id="st">
                <img src="/tp3/zjm/Public/Image/index/aa.jpg" width="100%">
            </div>
            <div id="navi">
                <a href="/tp3/zjm/index.php/Home/Index/logout">注销</a>
                <a href="/tp3/zjm/index.php/Home/Index/upload">上传票源</a>
                <a href="/tp3/zjm/index.php/Home/Index/detail">订单详情</a>
                <a href="/tp3/zjm/Home/User/login">登录注册</a>
                <a href="/tp3/zjm/index.php/Home/Index/index">首页</a>
            </div>
        </div>
    </div>
    <div id="po">
        <div id="pic">
            <img src="/tp3/zjm/Public/Image/index/img1/<?php echo ($data[0][img]); ?>" height="300px">
        </div>
        <div id="detail">
            <form action="do_purchase?id=<?php echo ($data[0][detail_id]); ?>" method="post">
                <table border="1" align="center" width="80%">
                    <tr><td colspan="2"><?php echo ($data[0][intro]); ?></td></tr>
                    <tr><td>主演/团体</td><td><?php echo ($data[0][name]); ?></td></tr>
                    <tr><td>时间</td><td><?php echo ($data[0][time]); ?></td></tr>
                    <tr><td>地址</td><td><?php echo ($data[0][address]); ?></td></tr>
                    <tr><td>价格</td>
                        <td><font size="4">￥</font>
                            <select name="price">
                                <option value="<?php echo ($price[0]); ?>"><?php echo ($price[0]); ?></option>
                                <option value="<?php echo ($price[1]); ?>"><?php echo ($price[1]); ?></option>
                                <option value="<?php echo ($price[2]); ?>"><?php echo ($price[2]); ?></option>
                                <option value="<?php echo ($price[3]); ?>"><?php echo ($price[3]); ?></option>
                                <option value="<?php echo ($price[4]); ?>"><?php echo ($price[4]); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr><td>数量</td><td><input name="quantity" type="text" style="width: 40px;">张</td></tr>
                    <tr><td colspan="2"><button name="submit">确定购买</button></td></tr>
                </table>
            </form>
        </div>
    </div>
    <div id="foot">
        17240045赵家敏
    </div>
</div>
</body>
</html>