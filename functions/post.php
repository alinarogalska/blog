<?php
/**
 * Created by PhpStorm.
 * User: AlinaR
 * Date: 17.05.2015
 * Time: 19:14
 */
require_once '../include/db_connect.php';
require_once 'functions.php';


$json = file_get_contents("../conf.json");
$conf= json_decode($json, true);


switch ($_POST['action']) {
    case 'send_new_post':
        if($_POST['new_post']) {
            $sql = "INSERT INTO posts (parent_id, text, date_add)
            VALUES ('".$_SESSION['user_id']."', '".$_POST['new_post']."', NOW())";
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: ".$conf['BASE_URL']."/userpage.php?result=added");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
}

switch ($_GET['action']) {
    case 'ajax':

        $sql = "SELECT posts.id, posts.parent_id, posts.text, posts.date_add, users.login FROM posts LEFT JOIN users ON posts.parent_id=users.id ORDER BY posts.id DESC LIMIT 20";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $posts = array();
            while ($row = $result->fetch_assoc()) {
                $row['date'] = date('d.m.Y', strtotime($row['date_add']));
                $posts[] = $row;
            }

            echo json_encode($posts);
        }

        break;
}

?>