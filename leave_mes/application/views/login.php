

<html>
    <head>
        <meta charset="UTF-8">
        <title>用户登陆</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

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
            echo '<li role="presentation" class="active"><a href="' . site_url() . '/login/index">登陆</a></li>';
        }
        ?>
        <li role="presentation"><a href="<?php echo site_url(); ?>/register/index">注册</a></li>


    </ul>
    <?php echo validation_errors(); ?>
    <?php echo form_open('login/query'); ?>
    <?php if (isset($warning)) {
        echo '<p>' . $warning . '</p>';
        }
        if (isset($result)) {
            var_dump($result);
        }
        else {
            echo '<p>不存在warning</p>';
    } ?>
    <table>
        <tr>
            <td align="right">用户名：</td>
            <td><input name="user_name" type="text" placeholder="请输入昵称" value="<?php echo set_value('user_name') ?>"/></td>
        </tr>
        <tr>
            <td align="right">密码：</td>
            <td><input name="user_password" type="password" placeholder="请输入6-16位密码" value="<?php echo set_value('user_password') ?>" /></td>
        </tr>

        <tr>
            <td><input name="submit" type="submit" value="登陆" /></td>
        </tr>

    </table>

    </form>

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>
</html>
