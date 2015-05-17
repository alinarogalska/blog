<?php
/**
 * Created by PhpStorm.
 * User: AlinaR
 * Date: 17.05.2015
 * Time: 18:29
 */

require_once '../include/db_connect.php';
require_once 'functions.php';
$json = file_get_contents("../conf.json");
$conf= json_decode($json, true);

if($_POST['login'] && $_POST['pass']) {

    $sql = "SELECT id, password, salt FROM users WHERE login = '".$_POST['login']."' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();

        $password = md5($_POST['pass']);
        $hash = md5($password . $row['salt']);

        if($hash == $row['password']) {
            // password correct

            $_SESSION['user_id'] = $row['id'];
            header("Location: ".$conf['BASE_URL']."/userpage.php");
        } else {
            echo "password incorrect";
        }
    } else {
        echo "0 results";
    }


} else {
    echo "podaj login i hasło";
}

?>