<?php
?>

<?php

?>

<html leng="en">
<meta charset="UTF-8">
<head>
    <title>我的帖子</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>
<body>
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="#"><span class="glyphicon glyphicon-home"></span>主页</a></li>

    <?php
    if (isset($_SESSION['user_name'])) {
        echo '<li role="presentation" class="active"><a href="' . site_url() . '/my_message/index">我的帖子</a></li>
            <li role="presentation"><a href="#">我的回复</a></li>
            <li role="presentation"><a href="' . site_url() . '/create_mes/index">发帖</a> </li>';
        echo '<li role="presentation"><a href="' . site_url() . '/user_page/index">个人中心</a></li>';

    }
    else {
        echo '<li role="presentation"><a href="' . site_url() . '/login/index">登陆</a></li>';
    }
    ?>
    <li role="presentation"><a href="<?php echo site_url(); ?>/register/index">注册</a></li>


</ul>
<table>
    <?php
    $i = 1;
    echo validation_errors();
    echo form_open('reply_mes/reply?id='. $id);
    foreach($result->result_array() as $row) {
        if ($id == $row['id']) {
            echo '
                     <tr>
                        <td>' . $i++ . '</td>
                    </tr>
                    <tr>
                        <td>' . $row['user_name'] . '</td>
                        <td>' . $row['title'] . '</td>
                    </tr>
                    <tr>
                        <td>' . $row['createtime'] . '</td>
                        <td>' . $row['content'] .'</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="reply_info" value=""></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="回复"></td>
                    </tr>
                   
                ';
        }
        else {
            echo '
                     <tr>
                        <td>' . $i++ . '</td>
                        <td><a href="http://localhost/leave_mes/index.php/reply_mes/index?id=' . $row['id'] . '">回复  </a><a href="http://localhost/leave_mes/index.php/delete_mes/delete?id=' . $row['id'] . '">删除</a></td>
                    </tr>
                    <tr>
                        <td>' . $row['user_name'] . '</td>
                        <td>' . $row['title'] . '</td>
                    </tr>
                    <tr>
                        <td>' . $row['createtime'] . '</td>
                        <td>' . $row['content'] .'</td>
                    </tr>
                   
                ';
        }

    }
    echo '</form>';

    ?>

</table>

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>
</html>

