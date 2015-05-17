<?php
/**
 * Created by PhpStorm.
 * User: AlinaR
 * Date: 17.05.2015
 * Time: 17:45
 */

require_once '../include/db_connect.php';
require_once 'functions.php';


$json = file_get_contents("../conf.json");
$conf= json_decode($json, true);


if($_POST['reg_login'] && $_POST['reg_pass'] && $_POST['reg_firstname'] && $_POST['reg_lastname'] &&  $_POST['reg_email']) {
    // do bazy

    $password = $_POST['reg_pass'];
    $password = md5($password);
    $salt = generateRandomString(32);
    $hash = md5($password . $salt);


    $sql = "INSERT INTO users (login, email, first_name, last_name, password, salt, date_reg)
    VALUES ('".$_POST['reg_login']."', '".$_POST['reg_email']."', '".$_POST['reg_firstname']."', '".$_POST['reg_lastname']."', '".$hash."', '".$salt."', NOW())";

    if ($conn->query($sql) === TRUE) {
        header("Location: ".$conf['BASE_URL']."/login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else {
    echo "Brak danych. Uzupełnij wszystkie pola!";
}




?>