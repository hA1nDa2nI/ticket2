<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UPLOAD</title>
    <link rel="stylesheet" href="/tp3/zjm/Public/Css/register/register.css" />
</head>
<body>
<div id="register">
<form action="do_UPLOAD" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend id="legend">UPLOAD</legend>
        <table align="center">
            <tr>
                <td><br/>主&nbsp;&nbsp;&nbsp;题&nbsp;<input type="text" name="intro" placeholder="请输入主题" autofocus required></td>
            </tr>
            <tr>
                <td><br/>嘉&nbsp;&nbsp;&nbsp;宾&nbsp;<input type="text" name="name" placeholder="请输入出演嘉宾" required></td>
            </tr>

            <tr>
                <td><br/>价&nbsp;&nbsp;&nbsp;格&nbsp;<input type="text" name="price" placeholder="请输入价格" required></td>
            </tr>
            <tr>
                <td><br/>时&nbsp;&nbsp;&nbsp;间&nbsp;<input type="text" name="time" placeholder="请输入演出时间" required></td>
            </tr>
            <tr>
                <td><br/>地&nbsp;&nbsp;&nbsp;址&nbsp;<input type="text" name="address" placeholder="请输入演出地址" required></td>
            </tr>
            <tr>
                <td><br/><input type="file" name="file" value="上传头像"></td>
            </tr>
            <tr>
                <td><br/><input type="submit" name="submit" value="上传">
                    <input type="reset" name="reset" value="重置"></td>
            </tr>
        </table>
    </fieldset>
</form>
</div>
</body>
</html>