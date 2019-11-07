<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
    <link rel="stylesheet" href="/tp3/zjm/Public/Css/login/login.css" />
</head>
<body>
<div id='login'>
    <form action='do_login' method='post'>
        <fieldset>
            <legend id='legend'>登录</legend>
            <table align='center'>
                <tr>
                    <td><br/>用户名&nbsp;<input type='type' name='uname' placeholder='请输入用户名' autofocus required></td>
                </tr>
                <tr>
                    <td><br/>密&nbsp;&nbsp;&nbsp;码&nbsp;<input type='password' name='pwd' placeholder='请输入密码' required></td>
                </tr>
                <tr>
                    <td><br/>验证码&nbsp;<input type='code' name='code' placeholder='请输入验证码'></td>
                </tr>
                <tr>
                    <td align="center"><br/><img src=<?php echo U('verify');?> alt="验证码" id="code" onclick="this.src = this.src + '?'"/></td>
                </tr>
                <tr><td align="center"><font size="2">看不清？点击图片换一张</font></td></tr>
                <tr>
                    <td>
                        <br/><input type='submit' name='submit' value='登录'>
                        <input type='reset' name='reset' value='重置'>
                    </td>
                </tr>
                <tr align='left'>
                    <td><br/>还没注册?去<a href='register'>注册</a></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>
</body>
</html>