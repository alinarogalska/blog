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


?>
<?php require("include/block-header.php");?>
<?php require("include/block-footer.php");?>
<div class="userpage">
    <a href="" class="user_login">Search</a>
    <div class="content">
        <ul>
            <?php
            $sql = "SELECT posts.id, posts.parent_id, posts.text, posts.date_add, users.login FROM posts LEFT JOIN users ON posts.parent_id=users.id WHERE text LIKE '%".$_GET['keyword']."%' ORDER BY posts.id DESC ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $row['date'] = date('d.m.Y', strtotime($row['date_add']));

                    ?>
                    <li>
                        <span><?php echo $row['date']; ?></span>
                        <a href="userpage.php?id=<?php echo $row['parent_id']; ?>"><?php echo $row['login']; ?></a>
                        <p><?php echo $row['text']; ?></p>
                    </li>

                <?php
                }
            } else {
                echo "nothing";
            }
            $conn->close();
            ?>
        </ul>
    </div>
</div>
</body>
</html>