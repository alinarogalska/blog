<?php
require("include/db_connect.php");
$json = file_get_contents("conf.json");
$conf= json_decode($json, true);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="main.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <title><?php echo $conf['title'] ?></title>
</head>
<body>

    <?php
    require("include/block-header.php");
    require("include/block-footer.php");
    require("include/block-news.php");
    ?>


</body>

</html>