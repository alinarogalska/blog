<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="main.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <title>Login</title>
</head>
<body>
<?php
require_once "include/db_connect.php";
$json = file_get_contents("conf.json");
$conf= json_decode($json, true);

if(!$_SESSION['user_id']) {
    header("Location: ".$conf['BASE_URL']);
}

?>
<?php require("include/block-header.php");?>
<?php require("include/block-footer.php");?>
<div class="userpage">
    <a href="" class="user_login">Login</a>
<div class="content">
    <form action="functions/post.php" method="post">
        <textarea name="new_post" id="new_post" cols="30" rows="10" placeholder="Whats new?" style="width: 100%" required></textarea>
        <input type="hidden" name="action" value="send_new_post"/>
        <button type="submit" style="float:right;">Send Post</button>
    </form>

        <ul>
            <li>
                <span>08.05.2015</span>
                <p>my blog</p>
            </li>

            <li>
                <span>08.05.2015</span>
                <p>my blog</p>
            </li>

            <li>
                <span>08.05.2015</span>
                <p>my blog</p>
            </li>

            <li>
                <span>08.05.2015</span>
                <p>my blog</p>
            </li>

            <li>
                <span>08.05.2015</span>
                <p>my blog</p>
            </li>

            <li>
                <span>08.05.2015</span>
                <p>my blog</p>
            </li>

            <li>
                <span>08.05.2015</span>
                <p>my blog</p>
            </li>
        </ul>
</div>
</div>
</body>
</html>