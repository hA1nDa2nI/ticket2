<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DETAIL</title>
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
        <div id="hh">
            <table border="1" align="center">
                <th>头像</th><th>用户名</th><th>下单内容</th><th>单价</th><th>数量</th><th>总价</th><th>下单时间</th><th>联系方式</th><th>修改</th><th>删除</th>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                        <td rowspan="2"><img src="/tp3/zjm/Public/Image/user/pic/<?php echo ($item["img"]); ?>" width="60px;" height="60px;"></td>
                        <td rowspan="2"><?php echo ($item["username"]); ?></td>
                        <td rowspan="2"><?php echo ($item["intro"]); ?><br/><?php echo ($item["address"]); ?><br/><?php echo ($item["time"]); ?></td>
                        <td rowspan="2"><?php echo ($item["price"]); ?>元</td>
                        <td rowspan="2"><?php echo ($item["quantity"]); ?>张</td>
                        <td rowspan="2"><?php echo ($item["addprice"]); ?>元</td>
                        <td rowspan="2"><?php echo ($item["ordtime"]); ?></td>
                        <td>邮箱：<?php echo ($item["email"]); ?></td>
                        <td rowspan="2"><input type="button" value="修改订单" onclick="window.location.href='/tp3/zjm/index.php/Home/Index/update?ordid=<?php echo ($item["ordno"]); ?>&userid=<?php echo ($item["id"]); ?>&detail_id=<?php echo ($item["detail_id"]); ?>'"/></td>
                        <td rowspan="2"><button onClick="if(confirm('确实取消此次订单吗？')) return (location.href ='/tp3/zjm/index.php/Home/Index/delete?ordid=<?php echo ($item["ordno"]); ?>&detail_id=<?php echo ($item["detail_id"]); ?>');else return false;" class=/"button/";>取消订单</button></td>
                    </tr>
                    <tr><td>电话号码：<?php echo ($item["tel"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                <tr><td align="center" colspan="10"><p><?php echo ($page); ?></p></td></tr>
            </table>
        </div>
    </div>
    <div id="foot">
        17240045赵家敏
    </div>
</div>
</body>
</html>