
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    </head>

    <body>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="#"><span class="glyphicon glyphicon-home"></span>主页</a></li>

        <?php
        if (isset($_SESSION['user_name'])) {
            echo '<li role="presentation"><a href="' . site_url() . '/my_message/index">我的帖子</a></li>
            <li role="presentation"><a href="#">我的回复</a></li>
            <li role="presentation" class="active"><a href="' . site_url() . '/create_mes/index">发帖</a> </li>';
            echo '<li role="presentation"><a href="' . site_url() . '/user_page/index">个人中心</a></li>';

        }
        else {
            echo '<li role="presentation"><a href="' . site_url() . '/login/index">登陆</a></li>';
        }
        ?>
        <li role="presentation"><a href="<?php echo site_url(); ?>/register/index">注册</a></li>


    </ul>
        <?php echo validation_errors(); ?>
        <?php echo form_open('create_mes/create'); ?>
            标题：<input name="title" type="text" value="" /><br>
            内容：<input name="content" type="textarea" value="" /><br>
            <input name="submit" type="submit" value="发帖" />
        </form>

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>
</html>