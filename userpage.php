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

if($_GET['id'] && is_numeric($_GET['id'])) {
    $user_login = "";
    $sql = "SELECT login FROM users WHERE id = ".$_GET['id']." ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_login = $row['login'];
    } else {
        // user not exists
    }
    $parent_id = $_GET['id'];
} else {
    $user_login = $_SESSION['user_login'];
    $parent_id = $_SESSION['user_id'];
}

?>
<?php require("include/block-header.php");?>
<?php require("include/block-footer.php");?>
<div class="userpage">
    <a href="" class="user_login"><?php echo $user_login ?></a>
<div class="content">
    <?php
    if($parent_id == $_SESSION['user_id']) {
        ?>
        <form action="functions/post.php" method="post">
            <textarea name="new_post" id="new_post" cols="30" rows="10" placeholder="Whats new?" style="width: 100%" required></textarea>
            <input type="hidden" name="action" value="send_new_post"/>
            <?php
            if($_GET['result'] == "added") {
                echo "Post published";
            }
            ?>

            <button type="submit" style="float:right;">Send Post</button>
        </form>
    <?php
    }
    ?>
        <ul>
            <?php
            $sql = "SELECT id, text, date_add FROM posts WHERE parent_id = ".$parent_id." ORDER BY id DESC ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $row['date'] = date('d.m.Y', strtotime($row['date_add']));

                    ?>
                    <li>
                        <span><?php echo $row['date']; ?></span>
                        <p><?php echo $row['text']; ?></p>
                    </li>

                    <?php
                }
            }
            $conn->close();
            ?>
        </ul>
</div>
</div>
</body>
</html>