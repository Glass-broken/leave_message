<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <title>注册</title>
</head>
<body>
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="#"><span class="glyphicon glyphicon-home"></span>主页</a></li>

    <?php
    if (isset($_SESSION['user_name'])) {
        echo '<li role="presentation"><a href="' . site_url() . '/my_message/index">我的帖子</a></li>
            <li role="presentation"><a href="#">我的回复</a></li>
            <li role="presentation"><a href="' . site_url() . '/create_mes/index">发帖</a> </li>';
        echo '<li role="presentation"><a href="' . site_url() . '/user_page/index">个人中心</a></li>';

    }
    else {
        echo '<li role="presentation"><a href="' . site_url() . '/login/index">登陆</a></li>';
    }
    ?>
    <li role="presentation" class="active"><a href="<?php echo site_url(); ?>/register/index">注册</a></li>


</ul>
<?php echo validation_errors(); ?>
<?php echo form_open('register'); ?>
<table>
    <tr>
        <td align="right">昵称：</td>
        <td><input name="user_name" type="text" placeholder="昵称不超过10个字符" value="<?php echo set_value('user_name') ?>"/></td>
    </tr>
    <tr>
        <td align="right">密码：</td>
        <td><input name="user_password" type="password" placeholder="密码6-16位" value="<?php echo set_value('user_password') ?>" /></td>
    </tr>
    <tr>
        <td align="right">确认密码：</td>
        <td><input name="user_password1" type="password" placeholder="请确认密码" value="<?php echo set_value('user_password1') ?>" /></td>
    </tr>
    <tr>
        <td align="right">性别：</td>
        <td>男<input name="user_sex" type="radio" value="男" />
            女<input name="user_sex" type="radio" value="女" /></td>
    </tr>
    <tr>
        <td align="right">邮箱：</td>
        <td><input name="user_email" type="text" placeholder="请填写有效邮箱" value="<?php echo set_value('user_email') ?>" /></td>
    </tr>
    <tr>
        <td align="right">真实姓名：</td>
        <td><input name="user_realname" type="text" placeholder="请填写真实姓名" value="<?php echo set_value('user_realname') ?>" /></td>
    </tr>
    <tr>
        <td><input name="submit" type="submit" value="注册" /></td>
    </tr>

</table>

</form>




<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>
</html>