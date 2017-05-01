<?php

?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>个人中心</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <style type="text/css">
            div.user_image{
                position: relative;
                left: 500px;
            }
        </style>
        <script type="text/javascript">
            function get_width() {
                var width = window.innerWidth;
                alert("屏幕宽度是" + width);
            }

        </script>
    </head>
    <body>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="#"><span class="glyphicon glyphicon-home"></span>主页</a></li>

        <?php
        if (isset($_SESSION['user_name'])) {
            echo '<li role="presentation"><a href="' . site_url() . '/my_message/index">我的帖子</a></li>
            <li role="presentation"><a href="#">我的回复</a></li>
            <li role="presentation"><a href="' . site_url() . '/create_mes/index">发帖</a> </li>';
            echo '<li role="presentation" class="active"><a href="' . site_url() . '/user_page/index">个人中心</a></li>';

        }
        else {
            echo '<li role="presentation"><a href="' . site_url() . '/login/index">登陆</a></li>';
        }
        ?>
        <li role="presentation"><a href="<?php echo site_url(); ?>/register/index">注册</a></li>


    </ul>
        <div id="container">
            <h1>个人中心</h1>
           <!-- <table id="information">
                <tr>
                    <td class="left">昵称</td>
                    <td class="center"></td>
                </tr>
                <tr>
                    <td class="left">性别</td>
                    <td class="center"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td class="center"></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td class="center"></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td class="center"></td>
                    <td class="right"></td>
                </tr>
            </table>-->
            <div class="user_image"><img src="http://localhost/leave_mes/user_img/<?php echo $user_name; ?>.jpg" width="150px" height="160px">
                <p><a href="<?php echo site_url('change_user_image/index'); ?>">修改头像</a></p></div>
            <a href="<?php echo site_url('user_exit/index'); ?>">退出</a>
            <form action="" method="post" onclick="get_width()">
                <input type="submit" value="获取屏幕宽度" name="submit">
            </form>

        </div>

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>
</html>
