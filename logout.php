<?php
/**
 * Created by PhpStorm.
 * User: AlinaR
 * Date: 17.05.2015
 * Time: 19:03
 */


require_once "include/db_connect.php";
session_destroy();
$json = file_get_contents("conf.json");
$conf= json_decode($json, true);
header("Location: ".$conf['BASE_URL']."/");
?>