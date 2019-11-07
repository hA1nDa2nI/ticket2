<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UPDATE</title>
    <link rel="stylesheet" href="/tp3/zjm/Public/Css/register/register.css" />
</head>
<body>
<div id="register">
<form action="do_update?userid=<?php echo ($list1[0][id]); ?>&ordid=<?php echo ($list2[0][ordno]); ?>" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend id="legend">修改</legend>
        <table align="center">
            <tr>
                <td><br/>用户名&nbsp;&nbsp;<input type="text" name="name" value="<?php echo ($list1[0][username]); ?>" autofocus required></td>
            </tr>
            <tr>
                <td><br/>电&nbsp;&nbsp;&nbsp;话&nbsp;<input type="text" name="tel" value="<?php echo ($list1[0][tel]); ?>" required></td>
            </tr>
            <tr>
                <td><br/>邮&nbsp;&nbsp;&nbsp;箱&nbsp;<input type="text" name="email" value="<?php echo ($list1[0][email]); ?>" required></td>
            </tr>
            <tr><td><br/>价&nbsp;&nbsp;&nbsp;格&nbsp;￥
                    <select name="price">
                        <option value="<?php echo ($price[0]); ?>"><?php echo ($price[0]); ?></option>
                        <option value="<?php echo ($price[1]); ?>"><?php echo ($price[1]); ?></option>
                        <option value="<?php echo ($price[2]); ?>"><?php echo ($price[2]); ?></option>
                        <option value="<?php echo ($price[3]); ?>"><?php echo ($price[3]); ?></option>
                        <option value="<?php echo ($price[4]); ?>"><?php echo ($price[4]); ?></option>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
            <tr>
                <td><br/>数&nbsp;&nbsp;&nbsp;量&nbsp;<input name="quantity" type="text" value="<?php echo ($list2[0][quantity]); ?>">张</td>
            </tr>
            <tr>
                <td><br/><input type="submit" name="submit" value="修改">
                    <input type="reset" name="reset" value="重置"></td>
            </tr>
        </table>
    </fieldset>
</form>
</div>
</body>
</html>