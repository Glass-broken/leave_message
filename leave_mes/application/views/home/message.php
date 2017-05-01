<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style type="text/css" >
        table {
            margin-left:auto;
            margin-right: auto;
        }
        td {
            width: 150px;
            height: 40px;
        }
        td.img {
            background-color: #666;
        }
        td.info {
            background-color: #777;
        }

        td.content {
            background-color: #888;
            text-align: center;
        }
        td.name {
            background-color: #999;
            text-align: center;
        }
        div#body {

        }
    </style>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <title>留言板</title>
</head>
<body>

<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-home"></span>主页</a></li>

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
    <li role="presentation"><a href="<?php echo site_url(); ?>/register/index">注册</a></li>


</ul>

    <table>
    <?php
    $this->load->model('database_use');
    $i = 1;
    foreach($result->result_array() as $row) {
        echo '
                     <tr>
                        <td class="no">' . $i++ . '</td>';
                   if (isset($_SESSION['user_name']))
                            echo '<td><a href="'. site_url() . '/reply_mes/index?id=' . $row['id'] . '">回复  </a><a href="http://localhost/leave_mes/index.php/delete_mes/delete?id=' . $row['id'] . '">删除</a></td>';
                   echo ' </tr>
                    <tr>
                        <td 
                        <td class="img" rowspan="4"><img src="'. base_url() . 'user_img/' . $row['user_name'] . '.jpg" width="150px" height="160px"> </td>
                        <td class="info" colspan="3">' . $row['title'] . '</td>
                    </tr>
                    <tr>
                        <td class="content" rowspan="4" colspan="3">' . $row['content'] . '</td>
                        <td></td>
                    </tr>
                    <tr>
			            <td></td>

                    </tr>
                    <tr>
                        <td></td>
            
                    </tr>
                    <tr>
                        <td class="name">' . $row['user_name'] . '</td>
            
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                ';
        if ($this->database_use->is_reply($row['id'])) {
            $reply_arr = $this->database_use->select_reply($row['id']);
            foreach ($reply_arr->result_array() as $reply) {
                echo '
                            <tr>
                                <td>回复：</td>
                            </tr>
                            <tr>
                                <td class="re_name">' . $reply['user_name'] . ':</td>
                                <td class="re_content">' . $reply['re_content'] . '</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="re_time">' . $reply['re_time'] . '</td>
                            </tr>
                        ';
            }
        }
    }

    ?>

    </table>

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>

</html>