<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>REGISTER</title>
    <link rel="stylesheet" href="/tp3/zjm/Public/Css/register/register.css" />
</head>
<body>
<div id="register">
    <form action="do_register" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend id="legend">注册</legend>
            <table align="center">
                <tr>
                    <td>用户名&nbsp;<input type="type" name="uname" placeholder="请输入用户名" autofocus required></td>
                </tr>
                <tr>
                    <td>密&nbsp;&nbsp;&nbsp;码&nbsp;<input type="password" name="pwd" placeholder="请输入密码" required></td>
                </tr>
                <tr>
                    <td>邮&nbsp;&nbsp;&nbsp;箱&nbsp;<input type="email" name="email" placeholder="请输入邮箱地址" required></td>
                </tr>
                <tr>
                    <td>电&nbsp;&nbsp;&nbsp;话&nbsp;<input type="tel" name="tel" placeholder="请输入电话号码" required></td>
                </tr>
                <tr>
                    <td>性&nbsp;&nbsp;&nbsp;别&nbsp;
                        <input type="radio" name="sex" checked="checked" value="1">男
                        <input type="radio" name="sex" value="0"/>女&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td><input type="file" name="file" value="上传头像"></td>
                </tr>
                <tr>
                    <td>验证码&nbsp;<input type='code' name='code' placeholder='请输入验证码'></td>
                </tr>
                <tr>
                    <td align="center"><img src=<?php echo U('verify');?> alt="验证码" id="code" onclick="this.src = this.src + '?'"/></td>
                </tr>
                <tr><td align="center"><font size="2">看不清？点击图片换一张</font></td></tr>
                <tr>
                <tr>
                    <td><input type="submit" name="submit" value="注册">
                        <input type="reset" name="reset" value="重置"></td>
                </tr>
                <tr align="left">
                    <td><br/>已经注册?去<a href="login">登录</a></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>
</body>
</html>